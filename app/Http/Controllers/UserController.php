<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Plans;
use App\Models\User;
use App\Models\Withdraw;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function dashboard()
    {
        $user = auth()->user();

    
        $withdraw_method=Withdraw::all();
        $plan=Plans::all();
        $count_user=User::count();
        $pending = Payment::where('status',0)->count();
        $total = Payment::where('status',1)->sum('amount');
        // $user_data = Payment::where('status',1)->where('id',Auth::id())->sum('amount');
        $combinedData = DB::table('plans')
        ->leftJoin('payments', 'plans.id', '=', 'payments.plan_id')
        ->select(
            'plans.id',
            'plans.name',
            'plans.direct',
            'plans.indirect',
            DB::raw('SUM(payments.amount) as total_amount')
        )
        ->where('payments.status', 1)->where('payments.user_id',Auth::id())
        ->groupBy('plans.id', 'plans.name', 'plans.direct', 'plans.indirect')
        ->get();


        $accept_approval = Payment::where('status',1)->count();


        return view('backend.admin.index',compact('count_user','pending','total','accept_approval','plan','user','combinedData','withdraw_method'));

    }
   
    public function index(Request $request)
    {
        $data = User::orderBy('id','ASC')->paginate(10);
        return view('backend.admin.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('backend.admin.users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'refral' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.admin.users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('backend.admin.users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'refral' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function user_cash_list(Request $request)
    {
        $user=User::latest()->paginate(10);
        return view('backend.admin.add_cash.index',compact('user'))
        ->with('i', ($request->input('page', 1) - 1) * 5);;
    }


    public function user_cash_form(User $user)
    {

        return view('backend.admin.add_cash.form',['user' => $user]);
    }

    public function user_cash_save(Request $request,User $user)
    {
        // dd($request->all());
        $request->validate([
            'balance' => 'required|numeric|min:0.00', 
        ]);
        
    
        
        $balanceToAdd = $request->balance;
    
        
        $user->balance+= $balanceToAdd;
        $user->save();
    
        // Redirect back or to wherever you want
        return redirect()->route('user.cash.list')->with('success', 'Balance added successfully.');
    }

    public function user_list_delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.cash.list')
                        ->with('success','User deleted successfully');
    }


    public function user_edit()
{
    $user = Auth::user(); // Assuming you're using Laravel's built-in authentication
    return view('backend.admin.users.edit_profile', compact('user'));
}

public function user_update(Request $request)
{
    $user = Auth::user(); // Assuming you're using Laravel's built-in authentication

    $request->validate([
        'name' => 'required',
        'username' => 'required',
        'phone' => 'required',
       
        'email' => 'required|email',
        'password' => 'required|same:confirm-password',
      

        // Add other fields' validation rules here
    ]);

    $user->update($request->all());

    return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
}
    
}

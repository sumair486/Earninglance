<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:payment-list|payment-delete', ['only' => ['show']]);
         $this->middleware('permission:payment-list', ['only' => ['show']]);
        //  $this->middleware('permission:paymentmethod-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
    $plan=Plans::latest()->paginate(5);;
    return view('backend.admin.package.index',compact('plan'));
    }

    public function create($id)
    {
        $item = Plans::find($id);
        $payment_method=PaymentMethod::all();
        return view('backend.admin.payments.create', [
                'item' => $item,'payment_method'=>$payment_method
            ]);
    }

    public function store(Request $request)
    {
        $payment=new Payment();
        $payment->plan_id=$request->plan_id;
        $payment->user_id=Auth::id();
        $payment->amount=$request->amount;
        $payment->method_id=$request->method_id;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('payment',$imagename);
        $payment->image=$imagename;
       
       
        $payment->save();
    
    
    session()->flash('message', "You've signed up successfully! Your payment will be approved in 2 working days.");
        return redirect('dashboard')->with('success','payment Successfully');

    }

    public function show()
    {
        $payment=Payment::all();
        return view('backend.admin.payments.payment_list',compact('payment'));
    }

   

    public function destroy($id)
    {
        $data=Payment::find($id);
        if(!is_null($data)){
            $data->delete();
            return redirect()->back()->with('success','Payment has been delete successfully');
        }
        return redirect()->back()->with('fail','Something went wrong');
    }

    public function approved($id)
    {
        $payment=Payment::find($id);
        $payment->status=1;
        $payment->save();
        return redirect()->back()->with('sucess','Arroved Sucessfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraw_method=Withdraw::latest()->paginate(10);
        return view('backend.admin.withdraw_method.index',compact('withdraw_method'))
        ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function create()
    {
        return view('backend.admin.withdraw_method.form');
    }

    public function store(Request $request)
    {
        $withdraw_method=new Withdraw();
        $withdraw_method->name=$request->name;
        $withdraw_method->save();
        return redirect()->route('withdraw.list')
                        ->with('success','Method successfully added');
    }

    public function destroy(Withdraw $withdraw)
    {
        $withdraw->delete();
    
        return redirect()->back()
                        ->with('success','Method deleted successfully');
    }
}

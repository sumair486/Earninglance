<?php

namespace App\Http\Controllers;

use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawRequestMail;
use App\Models\Message;

class WitdrawRequestController extends Controller
{

    public function index()
    {
        $withdraw_request=WithdrawRequest::latest()->paginate(7);
        return view('backend.admin.withdraw_request.index',compact('withdraw_request'));
    }

    public function store(Request $request)
    {
        $user = Auth()->user();
        $user->balance -= $request->amount;
        $user->save();
    
        // Create a new withdrawal request
        $withdraw_request = new WithdrawRequest();
        $withdraw_request->method_id = $request->method_id;
        $withdraw_request->user_id = Auth::id();
        $withdraw_request->account_no = $request->account_no;
        $withdraw_request->account_title = $request->account_title;
        $withdraw_request->amount = $request->amount; // Make sure to set the amount field
    
        $withdraw_request->save();

        $withdrawalData = [
            'name' => Auth()->user()->name,
            'username' => Auth()->user()->username,
            'contact' => Auth()->user()->phone,
            'user_id' => Auth()->user()->email,
            'method_id' => $request->method_id,
            'account_no' => $request->account_no,
            'account_title' => $request->account_title,
            'amount' => $request->amount,
        ];

        // $message = new Message([
        //     'user_id' => Auth()->id(),
        //     'name' => Auth()->user()->name,
        //     'username' => Auth()->user()->username,
        //     'phone' => Auth()->user()->phone,
        //     'email' => Auth()->user()->email,
        //     'method' => $request->method_id,
        //     'subject' => 'New Withdrawal Request',
        //     'account_no' => $request->account_no,
        //     'account_title' => $request->account_title,
        //     'amount' => $request->amount,
        // ]);
        // $message->save();
    
        // Send an email to the admin with the data
        Mail::to('sumairshah802@gmail.com')->send(new WithdrawRequestMail($withdrawalData));    
        return redirect()->back()
                        ->with('success','Successfully Send');
    }

    public function destroy($id)
    {
        $data=WithdrawRequest::find($id);
        if(!is_null($data)){
            $data->delete();
           
            return redirect()->back()->with('success','Withdraw has been delete successfully');
        }
        return redirect()->back()->with('fail','Something went wrong');
    
    }


    public function approved($id)
    {
        $withdraw_request=WithdrawRequest::find($id);
        $withdraw_request->status=1;
        $withdraw_request->save();
        return redirect()->back()->with('success','Approved Sucessfully');
    }
}

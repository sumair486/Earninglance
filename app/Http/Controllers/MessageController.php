<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $message=Message::latest()->paginate(10);
        return view('backend.admin.messages.index',compact('message'))
        ->with('i', ($request->input('page', 1) - 1) * 5);;
    }

    public function destroy($id)
    {
        $data=Message::find($id);
        if(!is_null($data)){
            $data->delete();
           
            return redirect()->back()->with('success','Message has been delete successfully');
        }
        return redirect()->back()->with('fail','Something went wrong');
    
    }
}

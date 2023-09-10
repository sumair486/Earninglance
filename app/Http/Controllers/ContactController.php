<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:contact-list|contact-delete', ['only' => ['index']]);
        //  $this->middleware('permission:contact-create', ['only' => ['create','store']]);
         $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $contacts = Contact::latest()->paginate(8);
        return view('backend.admin.contacts.index',compact('contacts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
  
        Contact::create($request->all());
  
        return redirect()->back()->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
    
        return redirect()->route('contact.list')
                        ->with('success','contact deleted successfully');
    }
}

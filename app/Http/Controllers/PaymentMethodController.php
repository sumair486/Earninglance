<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
class PaymentMethodController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:paymentmethod-list|paymentmethod-create|paymentmethod-edit|paymentmethod-delete', ['only' => ['index','show']]);
         $this->middleware('permission:paymentmethod-create', ['only' => ['create','store']]);
         $this->middleware('permission:paymentmethod-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:paymentmethod-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentmethods = PaymentMethod::latest()->paginate(10);
        return view('backend.admin.payment_methods.index',compact('paymentmethods'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.payment_methods.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',

        ]);
    
        PaymentMethod::create($request->all());
    
        return redirect()->route('paymentmethods.index')
                        ->with('success','Payment Method created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentmethod)
    {
        return view('backend.admin.payment_methods.show',compact('paymentmethod'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentmethod)
    {
        return view('backend.admin.payment_methods.edit',compact('paymentmethod'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentmethod)
    {
         request()->validate([
            'name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
        ]);
    
        $paymentmethod->update($request->all());
    
        return redirect()->route('paymentmethods.index')
                        ->with('success','Payment Method  updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentmethod)
    {
        $paymentmethod->delete();
    
        return redirect()->route('paymentmethods.index')
                        ->with('success','Payment Method  deleted successfully');
    }
}

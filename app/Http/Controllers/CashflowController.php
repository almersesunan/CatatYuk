<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
// use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class CashflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashflow = auth()->user()->cashflow;
        // $cashflow = Cashflow::all();
        return view('cashflow', compact('cashflow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|not_in:0',
            'tr_date' => 'required|date',
            'category' => 'required|max:20',
            'description' => 'required|max:255',
            'tr_amount' => 'required|numeric|min:0',
            'invoice' => 'mimes:jpeg,jpg,png|max:5048'
        ],[
            'tr_amount.required' => 'The amount field is required',
            'tr_amount.numeric' => 'The amount must be a number'
        ]);

        $input = $request->all();
        if($request->hasFile('invoice')){
            $destination_path = 'public/images/invoices';
            $invoice = $request->file('invoice');
            $invoice_name = $invoice->getClientOriginalName();
            $request->file('invoice')->storeAs($destination_path, $invoice_name);
            
            $input['invoice'] = $invoice_name;
        }

        $input['user_id'] = Auth::user()->id;
        Cashflow::create($input);

        return redirect('cashflow')->with('status','Add data successfull!');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cashflow  $cashflow
     * @return \Illuminate\Http\Response
     */
    public function show(Cashflow $cashflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cashflow  $cashflow
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cashflow = Cashflow::find($id);
        return view('editCashflow', compact('cashflow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cashflow  $cashflow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type_edit' => 'required|not_in:0',
            'tr_date_edit' => 'required|date',
            'category_edit' => 'required|max:20',
            'description_edit' => 'required|max:255',
            'tr_amount_edit' => 'required|numeric|min:0',
            'invoice_edit' => 'mimes:jpeg,jpg,png|max:5048'
        ],[
            'tr_amount_edit.required' => 'The amount field is required',
            'tr_amount_edit.numeric' => 'The amount must be a number'
        ]);

        // Cashflow::where('tr_id', $cashflow->tr_id)->update([
        //     'type' => $request->type_edit,
        //     'tr_date' => $request->tr_date_edit,
        //     'category' => $request->category_edit,
        //     'description' => $request->description_edit,
        //     'tr_amount' => $request->tr_amount_edit
        // ]);

        $input = Cashflow::find($id);
        if($request->hasFile('invoice_edit')){
            $destination_path = 'public/images/invoices';
            $invoice = $request->file('invoice_edit');
            $invoice_name = $invoice->getClientOriginalName();
            $request->file('invoice_edit')->storeAs($destination_path, $invoice_name);
            
            $input['invoice'] = $invoice_name;
        }

        $cashflow = $input;
        $cashflow->type = $request->type_edit;
        $cashflow->tr_date = $request->tr_date_edit;
        $cashflow->category = $request->category_edit;
        $cashflow->description = $request->description_edit;
        $cashflow->tr_amount = $request->tr_amount_edit;
        $cashflow->save();
        return redirect('cashflow')->with('status','Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cashflow  $cashflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashflow $cashflow)
    {
        Cashflow::destroy($cashflow->tr_id);
        return redirect('cashflow')->with('status','Delete data successfull!');
    }

    //import your models
    

    //create a function which takes the id of the first table as a parameter
    // public function archive()
    // {
    //     $first = auth()->user()->cashflow;//this will select the row with the given id

    //     //now save the data in the variables;
    //     $sn = $first->serialnumber;
    //     $cust = $first->customer;
    //     $lendon = $first->lend_on;
    //     $first->delete();

    //     $second = new Archive();
    //     $second->serialnumber = $sn;
    //     $second->customer = $cust;
    //     $second->lend_on = $lendon;
    //     $second->save();

    //     //then return to your view or whatever you want to do
    //     return view('someview');

    // }

}

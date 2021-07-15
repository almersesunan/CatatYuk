<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use Illuminate\Http\Request;
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
        $cashflow = Cashflow::all();
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
            'tr_amount' => 'required|numeric|min:0'
        ]);

        Cashflow::create($request->all());
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
            'tr_amount_edit' => 'required|numeric|min:0'
        ]);

        // Cashflow::where('tr_id', $cashflow->tr_id)->update([
        //     'type' => $request->type_edit,
        //     'tr_date' => $request->tr_date_edit,
        //     'category' => $request->category_edit,
        //     'description' => $request->description_edit,
        //     'tr_amount' => $request->tr_amount_edit
        // ]);

        $cashflow = Cashflow::find($id);
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
}

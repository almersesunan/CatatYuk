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
            'tr_date' => 'required',
            'category' => 'required',
            'description' => 'required',
            'tr_amount' => 'required|integer|min:0'
        ]);

        Cashflow::create($request->all());
        return redirect('cashflow')->with('status','Add data successfull!');
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
    public function edit(Cashflow $cashflow)
    {
        //
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
        // $request->validate([
        //     'tipe_edit' => 'required|not_in:0',
        //     'tanggal_edit' => 'required',
        //     'kategori_edit' => 'required',
        //     'deskripsi_edit' => 'required',
        //     'nominal_edit' => 'required|min:0'
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

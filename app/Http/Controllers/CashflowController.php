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
            'tipe' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required'
        ]);

        Cashflow::create($request->all());
        return redirect('cashflow')->with('status','Data Berhasil Ditambahkan!');;
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
    public function update(Request $request, Cashflow $cashflow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cashflow  $cashflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashflow $cashflow)
    {
        //
    }
}

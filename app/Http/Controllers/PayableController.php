<?php

namespace App\Http\Controllers;

use App\Models\Payable;
use Illuminate\Http\Request;

class PayableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payable = Payable::all();
        return view('lending', compact('payable'));
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
            'py_name' => 'required',
            'py_date' => 'required',
            'due_date' => 'required',
            'description' => 'required',
            'py_amount' => 'required|integer|min:0'
        ]);

        Payable::create($request->all());
        return redirect('payable')->with('status','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payable  $payable
     * @return \Illuminate\Http\Response
     */
    public function show(Payable $payable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payable  $payable
     * @return \Illuminate\Http\Response
     */
    public function edit(Payable $payable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payable  $payable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $payable = Payable::find($id);
        $payable->py_name = $request->py_name_edit;
        $payable->py_date = $request->py_date_edit;
        $payable->due_date = $request->due_date_edit;
        $payable->description = $request->description_edit;
        $payable->py_amount = $request->py_amount_edit;
        $payable->save();
        return redirect('payable')->with('status','Data Berhasil Diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payable  $payable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payable $payable)
    {
        Payable::destroy($payable->py_id);
        return redirect('payable')->with('status','Data Berhasil Dihapus!');
    }
}

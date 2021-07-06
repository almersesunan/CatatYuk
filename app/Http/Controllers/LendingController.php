<?php

namespace App\Http\Controllers;

use App\Models\Payable;
use App\Models\Receivable;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payable = Payable::all();
        $receivable = Receivable::all();
        return view('lending', compact('payable','receivable'));
    }

    public function __construct()
    {
        $this->middleware('auth');
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
    public function storePayable(Request $request)
    {
        $request->validate([
            'py_name' => 'required',
            'py_date' => 'required',
            'due_date' => 'required',
            'description' => 'required',
            'py_amount' => 'required|integer|min:0'
        ], [
            'py_name.required' => 'Nama tidak boleh kosong',
            'py_date.required' => 'Tanggal tidak boleh kosong',
            'due_date.required' => 'Jatuh Tempo tidak boleh kosong',
            'description.required' => 'Keterangan tidak boleh kosong',
            'py_amount.required' => 'Jumlah tidak boleh kosong'
        ]);

        Payable::create($request->all());
        return redirect('lending')->with('status','Data Berhasil Ditambahkan!');
    }

    public function storeReceivable(Request $request)
    {
        $request->validate([
            'rc_name' => 'required',
            'rc_date' => 'required',
            'rc_due_date' => 'required',
            'rc_description' => 'required',
            'rc_amount' => 'required|integer|min:0'
        ], [
            'rc_name.required' => 'Nama tidak boleh kosong',
            'rc_date.required' => 'Tanggal tidak boleh kosong',
            'rc_due_date.required' => 'Jatuh Tempo tidak boleh kosong',
            'rc_description.required' => 'Keterangan tidak boleh kosong',
            'rc_amount.required' => 'Jumlah tidak boleh kosong'
        ]);

        Receivable::create($request->all());
        return redirect('lending')->with('status','Data Berhasil Ditambahkan!');
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
    public function updatePayable(Request $request, $id)
    {
        $request->validate([
            'py_name_edit' => 'required',
            'py_date_edit' => 'required',
            'due_date_edit' => 'required',
            'description_edit' => 'required',
            'py_amount_edit' => 'required|integer|min:0'
        ], [
            'py_name_edit.required' => 'Nama tidak boleh kosong',
            'py_date_edit.required' => 'Tanggal tidak boleh kosong',
            'due_date_edit.required' => 'Jatuh Tempo tidak boleh kosong',
            'description_edit.required' => 'Keterangan tidak boleh kosong',
            'py_amount_edit.required' => 'Jumlah tidak boleh kosong'
        ]);

        $payable = Payable::find($id);
        $payable->py_name = $request->py_name_edit;
        $payable->py_date = $request->py_date_edit;
        $payable->due_date = $request->due_date_edit;
        $payable->description = $request->description_edit;
        $payable->py_amount = $request->py_amount_edit;
        $payable->save();
        return redirect('lending')->with('status','Data Berhasil Diupdate!');

    }

    public function updateReceivable(Request $request, $id)
    {
        $request->validate([
            'rc_name_edit' => 'required',
            'rc_date_edit' => 'required',
            'rc_due_date_edit' => 'required',
            'rc_description_edit' => 'required',
            'rc_amount_edit' => 'required|integer|min:0'
        ], [
            'rc_name_edit.required' => 'Nama tidak boleh kosong',
            'rc_date_edit.required' => 'Tanggal tidak boleh kosong',
            'rc_due_date_edit.required' => 'Jatuh Tempo tidak boleh kosong',
            'rc_description_edit.required' => 'Keterangan tidak boleh kosong',
            'rc_amount_edit.required' => 'Jumlah tidak boleh kosong'
        ]);

        $receivable = Receivable::find($id);
        $receivable->rc_name = $request->rc_name_edit;
        $receivable->rc_date = $request->rc_date_edit;
        $receivable->rc_due_date = $request->rc_due_date_edit;
        $receivable->rc_description = $request->rc_description_edit;
        $receivable->rc_amount = $request->rc_amount_edit;
        $receivable->save();
        return redirect('lending')->with('status','Data Berhasil Diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payable  $payable
     * @param  \App\Models\Receivable  $payable
     * @return \Illuminate\Http\Response
     */
    public function destroyPayable(Payable $payable)
    {
        Payable::destroy($payable->py_id);
        return redirect('lending')->with('status','Data Berhasil Dihapus!');
    }

    public function destroyReceivable(Receivable $receivable)
    {
        Receivable::destroy($receivable->rc_id);
        return redirect('lending')->with('status','Data Berhasil Dihapus!');
    }
}

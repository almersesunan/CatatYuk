<?php

namespace App\Http\Controllers;

use App\Models\Payable;
use App\Models\Receivable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payable = auth()->user()->payable;
        $receivable = auth()->user()->receivable;
        // $payable = Payable::all();
        // $receivable = Receivable::all();
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
            'due_date' => 'required|after_or_equal:py_date',
            'description' => 'required',
            'py_amount' => 'required|numeric|min:0'
        ], [
            'py_name.required' => 'Name field is required',
            'py_date.required' => 'Date field is required',
            'due_date.required' => 'Due date field is required',
            'due_date.after_or_equal' => 'Due date must less than or equal date',
            'description.required' => 'Description field is required',
            'py_amount.required' => 'Amount field is required',
            'py_amount.numeric' => 'Amount field must be a number'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Payable::create($data);
        return redirect('lending')->with('status','Data added successfully!');
    }

    public function storeReceivable(Request $request)
    {
        $request->validate([
            'rc_name' => 'required',
            'rc_date' => 'required',
            'rc_due_date' => 'required|after_or_equal:rc_date',
            'rc_description' => 'required',
            'rc_amount' => 'required|numeric|min:0'
        ], [
            'rc_name.required' => 'Name field is required',
            'rc_date.required' => 'Date field is required',
            'rc_due_date.required' => 'Due date field is required',
            'rc_due_date.after_or_equal' => 'Due date must less than or equal date',
            'rc_description.required' => 'Description field is required',
            'rc_amount.required' => 'Amount field is required',
            'rc_amount.numeric' => 'Amount field must be a number'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Receivable::create($data);
        return redirect('lending')->with('status','Data added successfully!');
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
    public function editPayable($id)
    {
        $payable = Payable::find($id);
        return view('editPayable', ['payable' => $payable]);
    }

    public function editReceivable($id)
    {
        $receivable = Receivable::find($id);
        return view('editReceivable', ['receivable' => $receivable]);
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
        $this->validate($request,[
            'py_name_edit' => 'required',
            'py_date_edit' => 'required',
            'due_date_edit' => 'required|after_or_equal:py_date_edit',
            'description_edit' => 'required',
            'py_amount_edit' => 'required|numeric|min:0'
        ], [
            'py_name_edit.required' => 'Name field is required',
            'py_date_edit.required' => 'Date field is required',
            'due_date_edit.required' => 'Due date field is required',
            'due_date_edit.after_or_equal' => 'Due date must less than or equal date',
            'description_edit.required' => 'Description field is required',
            'py_amount_edit.required' => 'Amount field is required',
            'py_amount_edit.numeric' => 'Amount field must be a number'
        ]);

        $payable = Payable::find($id);
        $payable->py_name = $request->py_name_edit;
        $payable->py_date = $request->py_date_edit;
        $payable->due_date = $request->due_date_edit;
        $payable->description = $request->description_edit;
        $payable->py_amount = $request->py_amount_edit;
        $payable->save();
        return redirect('lending')->with('status','Data has been updated!');

    }

    public function updateReceivable(Request $request, $id)
    {
        $this->validate($request,[
            'rc_name_edit' => 'required',
            'rc_date_edit' => 'required',
            'rc_due_date_edit' => 'required|after_or_equal:rc_date_edit',
            'rc_description_edit' => 'required',
            'rc_amount_edit' => 'required|numeric|min:0'
        ], [
            'rc_name_edit.required' => 'Name field is required',
            'rc_date_edit.required' => 'Date field is required',
            'rc_due_date_edit.required' => 'Due date field is required',
            'rc_due_date_edit.after_or_equal' => 'Due date must less than or equal date',
            'rc_description_edit.required' => 'Description field is required',
            'rc_amount_edit.required' => 'Amount field is required',
            'rc_amount_edit.numeric' => 'Amount field must be a number'
        ]);

        $receivable = Receivable::find($id);
        $receivable->rc_name = $request->rc_name_edit;
        $receivable->rc_date = $request->rc_date_edit;
        $receivable->rc_due_date = $request->rc_due_date_edit;
        $receivable->rc_description = $request->rc_description_edit;
        $receivable->rc_amount = $request->rc_amount_edit;
        $receivable->save();
        return redirect('lending')->with('status','Data has been updated!');

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
        return redirect('lending')->with('status','Data deleted successfully!');
    }

    public function destroyReceivable(Receivable $receivable)
    {
        Receivable::destroy($receivable->rc_id);
        return redirect('lending')->with('status','Data deleted successfully!');
    }
}

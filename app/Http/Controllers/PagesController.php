<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payable;
use App\Models\Receivable;
use App\Models\User;
use App\Models\Cashflow;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use function PHPSTORM_META\type;

class PagesController extends Controller
{
    public function __invoke()
    {
        // ...
    }
    
    public function dashboard()
    {
        // Nearest Due Date
        //$payable = auth()->user()->payable->sortBy('due_date')->take(3);//where('due_date', Receivable::min('due_date'))->orderBy('created_at','desc')->get();
        //$receivable = auth()->user()->receivable->sortBy('rc_due_date')->take(3);//where('rc_due_date', Receivable::min('rc_due_date'))->orderBy('created_at','desc')->get();
        //$past_payable = DB::select("select * from payables inner join users on user_id = id where CURRENT_TIMESTAMP > due_date order by due_date asc");
        //$past_receivable = DB::select("select * from receivables inner join users on user_id = id where CURRENT_TIMESTAMP > rc_due_date order by rc_due_date asc");
        $payable = Payable::select('*')->whereRaw('CURRENT_TIMESTAMP < due_date')->where('user_id', Auth::user()->id)->orderBy('due_date')->take(3)->get();
        $receivable = Receivable::select('*')->whereRaw('CURRENT_TIMESTAMP < rc_due_date')->where('user_id', Auth::user()->id)->orderBy('rc_due_date')->take(3)->get();
        $payable_past = Payable::select('*')->whereRaw('CURRENT_TIMESTAMP > due_date')->where('user_id', Auth::user()->id)->orderBy('due_date')->get();
        $receivable_past = Receivable::select('*')->whereRaw('CURRENT_TIMESTAMP > rc_due_date')->where('user_id', Auth::user()->id)->orderBy('rc_due_date')->get();
        //dd($receivable);
        
        //Cashflow Chart
        // $income = Cashflow::WhereYear('tr_date', now()->year)->whereMonth('tr_date', now()->month)->where('type','Income')->get();
        // $expense = Cashflow::WhereYear('tr_date', now()->year)->whereMonth('tr_date', now()->month)->where('type','Expense')->get();
        $temp = Cashflow::select(['type', DB::raw("DATE_FORMAT(tr_date,'%Y-%M') as month"), DB::raw('SUM(tr_amount) as amount')])->where('user_id', Auth::user()->id)->groupBy('type')->groupBy('month')->orderBy('tr_date')->get();
        //DB::raw("DATE_FORMAT(tr_date,'%Y') as year")
        $cashflow = [];
        $temp->each(function($item) use (&$cashflow){
            $cashflow[$item->month][$item->type] = [
                'amount' => $item->amount
            ];
        } );
        
        $cash = array();
        $income = array();
        $expense = array();
        $total_income = 0;
        $total_expense = 0;
        //$test = array();

        $type = $temp->pluck('type')->sortBy('type')->unique();
        //$year = $temp->pluck('year')->sortBy('year')->unique();

        foreach ($cashflow as $month => $values){
            array_push($cash, Carbon::parse($month)->format('F Y'));
            //array_push($test, Carbon::parse($month)->format('Y'));
            foreach ($type as $types){
                if ($types == 'Income'){
                    array_push($income, $cashflow[$month]['Income']['amount'] ??  '0');
                }
                elseif ($types == 'Expense'){
                    array_push($expense, $cashflow[$month]['Expense']['amount'] ?? '0');
                }
            }
        }
        //cashflow summary
        $total_income = array_sum($income);
        $total_expense = array_sum($expense);

        $revenue = $total_income - $total_expense;
        //dd($expense);

        //Stok barang chart
        $stock = auth()->user()->stock;
        $item_name = array();
        $item_count = array();
        //$minimum = array();

        foreach($stock as $stocks){
            array_push($item_name, $stocks->item_name);
            array_push($item_count, $stocks->available);
            //array_push($minimum, $stocks->minimum);
        }

        //dd($minimum);

        return view('dashboard')->with(compact('payable','receivable','cashflow','type','cash','income','expense','item_name','item_count','total_income','total_expense','revenue','payable_past','receivable_past'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('profile');
    }
    
    public function feedback()
    {
        return view('feedback');
    }
}
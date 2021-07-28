<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payable;
use App\Models\Receivable;
use App\Models\User;
use App\Models\Cashflow;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
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
        $payable = Payable::all()->sortBy('due_date')->take(3);//where('due_date', Receivable::min('due_date'))->orderBy('created_at','desc')->get();
        $receivable = Receivable::all()->sortBy('rc_due_date')->take(3);//where('rc_due_date', Receivable::min('rc_due_date'))->orderBy('created_at','desc')->get();
        
        //Cashflow Chart
        // $income = Cashflow::WhereYear('tr_date', now()->year)->whereMonth('tr_date', now()->month)->where('type','Income')->get();
        // $expense = Cashflow::WhereYear('tr_date', now()->year)->whereMonth('tr_date', now()->month)->where('type','Expense')->get();
        $temp = Cashflow::select(['type',DB::raw("DATE_FORMAT(tr_date,'%Y-%M') as month"), DB::raw('SUM(tr_amount) as amount')])->groupBy('type')->groupBy('month')->orderBy('tr_date')->get();
        //DB::raw("DATE_FORMAT(tr_date,'%Y') as year")
        $cashflow= [];
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
        $total_income = array_sum($income);
        $total_expense = array_sum($expense);

        $revenue = $total_income - $total_expense;
        //dd($expense);

        //Stok barang chart
        $stock = Stock::all();
        $item_name = array();
        $item_count = array();
        //$minimum = array();

        foreach($stock as $stocks){
            array_push($item_name, $stocks->item_name);
            array_push($item_count, $stocks->available);
            //array_push($minimum, $stocks->minimum);
        }

        //dd($minimum);

        return view('dashboard')->with(compact('payable','receivable','cashflow','type','cash','income','expense','item_name','item_count','total_income','total_expense','revenue'));
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
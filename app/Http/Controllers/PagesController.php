<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payable;
use App\Models\Receivable;
use App\Models\User;
use App\Models\Cashflow;
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
        
        $payable = Payable::where('created_at', Payable::max('created_at'))->orderBy('created_at','desc')->get();
        $receivable = Receivable::where('created_at', Receivable::max('created_at'))->orderBy('created_at','desc')->get();
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
    
    //dd($expense);

        return view('dashboard')->with(compact('payable','receivable','cashflow','type','cash','income','expense'));
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
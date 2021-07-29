<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashflow;
use App\Models\Stock;
use App\Models\Payable;
use App\Models\Receivable;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PdfController extends Controller
{
    public function generateCashflow(){
        $cashflow = auth()->user()->cashflow;
        $temp = Cashflow::select(['type',DB::raw("DATE_FORMAT(tr_date,'%Y-%M') as month"), DB::raw('SUM(tr_amount) as amount')])->where('user_id', Auth::user()->id)->groupBy('type')->groupBy('month')->orderBy('tr_date')->get();
        //DB::raw("DATE_FORMAT(tr_date,'%Y') as year")
        $cashflow_summary= [];
        $temp->each(function($item) use (&$cashflow_summary){
            $cashflow_summary[$item->month][$item->type] = [
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

        foreach ($cashflow_summary as $month => $values){
            array_push($cash, Carbon::parse($month)->format('F Y'));
            //array_push($test, Carbon::parse($month)->format('Y'));
            foreach ($type as $types){
                if ($types == 'Income'){
                    array_push($income, $cashflow_summary[$month]['Income']['amount'] ??  '0');
                }
                elseif ($types == 'Expense'){
                    array_push($expense, $cashflow_summary[$month]['Expense']['amount'] ?? '0');
                }
            }
        };
        $total_income = array_sum($income);
        $total_expense = array_sum($expense);

        $revenue = $total_income - $total_expense;

        // //chart->img
        // $data = file(getClientOriginalName());
        // $imgUrl = 'http://export.highcharts.com/' + data;
        // $destination_path = 'public/images/charts';
        // $cashflow_chart = $imgUrl->file(data);
        // $cashflow_chart_name = $cashflow_chart->getClientOriginalName();
        // $imgUrl->file(data)->storeAs($destination_path, $invoice_name);

        $fileName = 'Cashflow.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
    
        $html = View::make('pdf.cashflowPdf')->with(compact('cashflow','cashflow_summary','type','cash','total_income','total_expense','income','expense','revenue'));
        $html = $html->render();

        $mpdf->SetHTMLHeader('
            <div style="text-align: center; font-weight: bold;">
                Cashflow
            </div>');
        $mpdf->SetHTMLFooter('
            <table width="100%">
                <tr>
                    <td width="33%">{DATE j-m-Y}</td>
                    <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                    <td width="33%" style="text-align: right;">catatyuknew.herokuapp.com</td>
                </tr>
            </table>');

        $stylesheet = file_get_contents('css/pdf.css');
        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
      
        $mpdf->Output($fileName, 'I');
    }

    public function generateStock(){
        $stock = auth()->user()->stock;
        $fileName = 'Stock.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
    
        $html = View::make('pdf.stockPdf')->with('stock', $stock);
        $html = $html->render();

        $mpdf->SetHTMLHeader('
            <div style="text-align: center; font-weight: bold;">
                Stock
            </div>');
        $mpdf->SetHTMLFooter('
            <table width="100%">
                <tr>
                    <td width="33%">{DATE j-m-Y}</td>
                    <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                    <td width="33%" style="text-align: right;">catatyuknew.herokuapp.com</td>
                </tr>
            </table>');

        $stylesheet = file_get_contents('css/pdf.css');
        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
      
        $mpdf->Output($fileName, 'I');
    }

    public function generateLending(){
        $payable = auth()->user()->payable;
        $receivable = auth()->user()->receivable;
        $fileName = 'Lending.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
    
        $html = View::make('pdf.lendingPdf')->with(compact('payable','receivable'));
        $html = $html->render();

        $mpdf->SetHTMLHeader('
            <div style="text-align: center; font-weight: bold;">
                Lending
            </div>');
        $mpdf->SetHTMLFooter('
            <table width="100%">
                <tr>
                    <td width="33%">{DATE j-m-Y}</td>
                    <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                    <td width="33%" style="text-align: right;">catatyuknew.herokuapp.com</td>
                </tr>
            </table>');

        $stylesheet = file_get_contents('css/pdf.css');
        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
      
        $mpdf->Output($fileName, 'I');
    }
}

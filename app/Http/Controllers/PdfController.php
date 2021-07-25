<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashflow;
use App\Models\Stock;
use App\Models\Payable;
use App\Models\Receivable;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
    public function generateCashflow(){
        $cashflow = Cashflow::get();
        $fileName = 'Cashflow.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
    
        $html = View::make('pdf.cashflowPdf')->with('cashflow', $cashflow);
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
                    <td width="33%" style="text-align: right;">catatyuk.herokuapp.com</td>
                </tr>
            </table>');

        $stylesheet = file_get_contents('css/pdf.css');
        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
      
        $mpdf->Output($fileName, 'I');
    }

    public function generateStock(){
        $stock = Stock::get();
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
                    <td width="33%" style="text-align: right;">catatyuk.herokuapp.com</td>
                </tr>
            </table>');

        $stylesheet = file_get_contents('css/pdf.css');
        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
      
        $mpdf->Output($fileName, 'I');
    }

    public function generateLending(){
        $payable = Payable::get();
        $receivable = Receivable::get();
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
                    <td width="33%" style="text-align: right;">catatyuk.herokuapp.com</td>
                </tr>
            </table>');

        $stylesheet = file_get_contents('css/pdf.css');
        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
      
        $mpdf->Output($fileName, 'I');
    }
}

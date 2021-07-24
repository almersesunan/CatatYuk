<?php

require_once(realpath(dirname( __DIR__) . '/vendor/autoload.php'));

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Summary</h2>
<div class="table-responsive">
  <table id="table-hutang" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Month</th>';
        foreach ($type as $types){
            $html .= '<th>Amount '. $types["type"] .'</th>
            </tr>';
        }
    
    $html .='</thead>';
    foreach ($cashflow as $month => $values){
        $html .= '<tr>
        <td> '.\Carbon\Carbon::parse($month)->format('F Y') .' </td>';
    }
        foreach ($type as $types){
            $html .= '<td> '. $cashflow[$month][$types]['amount'] ?? '0' .'</td>
            </tr>';
        }
  $html .= '</table>
    </div>
    </body>
    </html>';
$mpdf->WriteHTML($html);
$mpdf->Output();
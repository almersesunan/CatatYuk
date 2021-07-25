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
<table id="table" class="table table-striped table-bordered" style="width:100%">

<thead>
  <tr align=center>
    <th>No</th>
    <th>Transaction Type</th>
    <th>Transaction Date</th>
    <th>Category</th>
    <th>Description</th>
    <th>Amount</th>
    <th>Invoice</th>

  </tr>
</thead>
<tbody>';
    $i = 1;
  foreach ($cashflow as $cashflow){
      $html .= '<tr>
      <td align=center>'. $i++ .'</td>
      <td>'. $cashflow["type"] .'</td>
      <td align=center>'. $cashflow["tr_date"] .'</td>
      <td>'. $cashflow["category"] .'</td>
      <td>'. $cashflow["description"] .'</td>
      <td align=right>'. $cashflow["tr_amount"] .'</td>
      <td>'. $cashflow["invoice"] .'</td>
    </tr>';
  }
  $html .= '</tbody>
  </table>
  </body>
  </html>';
$mpdf->WriteHTML($html);
$mpdf->Output();
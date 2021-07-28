<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Cashflow</title> --}}

    {{-- CSS --}}
    <link href="/css/pdf.css" rel="stylesheet">
    
</head>
<body>
    <br>
    <br>
    <br>
    <table class="blueTable">
        <thead>
          <tr align=center>
            <th>No</th>
            <th>Transaction Type</th>
            <th>Transaction Date</th>
            <th>Category</th>
            <th>Description</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cashflow as $cashflow)
            <tr>
              <td align=center>{{$loop->iteration}}</td>
              <td>{{$cashflow->type}}</td>
              <td align=center>{{$cashflow->tr_date}}</td>
              <td>{{$cashflow->category}}</td>
              <td>{{$cashflow->description}}</td>
              <td align=right>Rp. {{$cashflow->tr_amount}}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <table class="blueTable">
      <thead>
        <tr>
          <th>Month</th>
          @foreach ($type as $types)
            <th>Amount {{ $types }}</th>
          @endforeach
        </tr>
      </thead>
      @foreach ($cashflow_summary as $month => $values)
        <tr>
          <td>{{ \Carbon\Carbon::parse($month)->format('F Y') }}</td>
          @foreach ($type as $types)
              <td align="right">Rp. {{ $cashflow_summary[$month][$types]['amount'] ?? '0' }}</td>
          @endforeach
        </tr>
      @endforeach
      <tr>
        <th>Total</th>
        <td align="right" style="font-weight: bold">Rp. {{ $total_income }}.00</td>
        <td align="right" style="font-weight: bold">Rp. {{ $total_expense }}.00</td>
      </tr>
    </table>
    <br>
    <div class="revenue" style="text-align: right;display: inline-block;">
      @if ($revenue<0)
        <p style="font-weight: bold;">Revenue : <span style="font-weight: bold;color: red;">Loss Rp. {{ abs($revenue) }}.00</span></p>
      @else
        <p style="font-weight: bold;">Revenue : <span style="font-weight: bold;color: green;">Profit Rp. {{ abs($revenue) }}.00</span></p>
      @endif
    </div>

    {{-- <br>
    <br>
    <br>
    <div class="card border-dark mb-3" style="max-width: 100%;">
      <div class="card-body text-dark">
        <div id="cashflowchart"></div>
      </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
      var income = {!! json_encode($income, JSON_NUMERIC_CHECK) !!};
      var expense = {!! json_encode($expense, JSON_NUMERIC_CHECK) !!};
      var month = {!! json_encode($cash) !!};
      Highcharts.chart('cashflowchart', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Cashflow'
      },
      credits: {
          enabled: false
      },
      xAxis: {
          categories: month,
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Amount'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:3px">{series.name}: </td>' +
              '<td style="padding:3px"><b>Rp. {point.y:.2f}</b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{
          name: 'Income',
          color: 'green',
          data: income
      },
      {
          name: 'Expense',
          color: 'red',
          data: expense
      }]
    });
    </script>

    <script>
      var chart = $('#cashflowchart').highcharts();
      var opts = chart.options;        // retrieving current options of the chart
      opts = $.extend(true, {}, opts); // making a copy of the options for further modification
      delete opts.chart.renderTo;      // removing the possible circular reference

      /* Here we can modify the options to make the printed chart appear */
      /* different from the screen one                                   */

      var strOpts = JSON.stringify(opts);

      $.post(
          'http://export.highcharts.com/',
          {
              content: 'options',
              options: strOpts ,
              type:    'image/svg+xml',
              width:   '1000px',
              scale:   '1',
              constr:  'Chart',
              async:   true
          },
          function(data){
              var imgUrl = 'http://export.highcharts.com/' + data;
              /* Here you can send the image url to your server  */
              /* to make a PDF of it.                            */
              /* The url should be valid for at least 30 seconds */
              
          }
      );
    </script> --}}
</body>
</html>
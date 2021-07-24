@extends('layouts/main')

@section('title', 'CatatYuk - Dashboard')

@section('container')
<head>
  <style>
    @media print{
      .tools{
        display: none;
      }
    }
  </style>
</head>
      <h1 class="h2">Summary</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="tools btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <a type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print()" target="_blank">Export</a>
          {{-- <input type="text" id="calendar" class="btn btn-sm btn-outline-primary dropdown-toggle" placeholder="Year"> --}}
        </div>
      </div>
    </div>

    <div class="card border-dark mb-3" style="max-width: 100%;">
      <div class="card-body text-dark">
        <div id="cashflowchart"></div>
      </div>
    </div>
    <br>
    <div class="card border-dark mb-3" style="max-width: 100%;">
      <div class="card-body text-dark">
        <h2>Summary</h2>
        <div class="table-responsive">
          <table id="table-hutang" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Month</th>
                @foreach ($type as $types)
                  <th>Amount {{ $types }}</th>
                @endforeach
              </tr>
            </thead>
            @foreach ($cashflow as $month => $values)
              <tr>
                <td>{{ \Carbon\Carbon::parse($month)->format('F Y') }}</td>
                @foreach ($type as $types)
                    <td>{{ $cashflow[$month][$types]['amount'] ?? '0' }}</td>
                @endforeach
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    <br>
    <div class="card border-dark mb-3" style="max-width: 100%;">
      <div class="card-body text-dark">
        <div id="stokbarangchart"></div>
      </div>
    </div>
    <br>
    <div class="card border-dark mb-3" style="max-width: 100%;">
      <div class="card-body text-dark">
        <h2>Lending - Nearest Due Date</h2>
        <br>
        <div class="table-responsive">
          <table id="table-hutang" class="table table-striped table-bordered" style="width:100%">
            {{-- <a href="#" style="float: right">Download to PDF</a> --}}
            <colgroup>
              <col span="1" style="width: 15%;">
              <col span="1" style="width: 15%;">
              <col span="1" style="width: 15%;">
              <col span="1" style="width: 15%;">
              <col span="1" style="width: 15%;">
           </colgroup>
            <label for="pwd">Payable</label>
            <thead>
              <tr align=center>
                <th>Name</th>
                <th>Date</th>
                <th>Due Date</th>
                <th>Description</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($payable as $payable)
              <tr>
                <td>{{$payable->py_name}}</td>
                <td align=center>{{$payable->py_date}}</td>
                <td align=center>{{$payable->due_date}}</td>
                <td>{{$payable->description}}</td>
                <td align=right>{{$payable->py_amount}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <br>
          <table id="table-piutang" class="table table-striped table-bordered" style="width:100%">
            {{-- <a href="#" style="float: right">Download to PDF</a> --}}
            <colgroup>
              <col span="1" style="width: 15%;">
              <col span="1" style="width: 15%;">
              <col span="1" style="width: 15%;">
              <col span="1" style="width: 15%;">
              <col span="1" style="width: 15%;">
           </colgroup>
            <label for="pwd">Receivable</label>
            <thead>
              <tr align=center>
                <th>Name</th>
                <th>Date</th>
                <th>Due Date</th>
                <th>Description</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($receivable as $receivable)
                <tr>
                    <td>{{$receivable->rc_name}}</td>
                    <td align=center>{{$receivable->rc_date}}</td>
                    <td align=center>{{$receivable->rc_due_date}}</td>
                    <td>{{$receivable->rc_description}}</td>
                    <td align=right>{{$receivable->rc_amount}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
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
    var name_item = {!! json_encode($item_name) !!};
    var count = {!! json_encode($item_count, JSON_NUMERIC_CHECK) !!};
    Highcharts.chart('stokbarangchart', {
      chart: {
          type: 'bar'
      },
      title: {
          text: 'Item Stock'
      },
      xAxis: {
          categories: name_item,
          title: {
              text: null
          }
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Quantity',
              align: 'high'
          },
          labels: {
              overflow: 'justify'
          }
      },
      tooltip: {
          valueSuffix: ' Item(s)'
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'top',
          x: -40,
          y: 80,
          floating: true,
          borderWidth: 1,
          backgroundColor:
              Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
          shadow: true
      },
      credits: {
          enabled: false
      },
      plotOptions: {
         bar: {
             zones: [{
                 value: 10, // Values up to 10 (not including) ...
                  name: 'Low',
                  color: 'red' // ... have the color orangered.
              },{
                value: 20,
                name: 'Med',
                 color: 'yellow' // Values from 20 (including) and up have the color gold
              },{
                  name: 'High',
                 color: 'green' // Values from 10 (including) and up have the lightgreen
              }]
          }
      },
      series: [{
          showInLegend: false,
          name: 'Quantity',
          data: count
      }]
    });
  </script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<style>
    .ui-datepicker-calendar {
       display: none;
    }
    .ui-datepicker-month {
       display: none;
    }
    .ui-datepicker-prev{
       display: none;
    }
    .ui-datepicker-next{
       display: none;
    }
</style>
  <script>
    $(function() {
      $('#calendar').datepicker({
          changeYear: true,
          showButtonPanel: true,
          dateFormat: 'yy',
          onClose: function(dateText, inst) { 
              var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
              $(this).datepicker('setDate', new Date(year, 1));
          }
    });
    $("#calendar").focus(function () {
           $(".ui-datepicker-month").hide();
       });
    });
  </script>
@endsection




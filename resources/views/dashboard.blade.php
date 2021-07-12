@extends('layouts/main')

@section('title', 'CatatYuk - Dashboard')
    
@section('container')
      <h1 class="h2">Summary</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          Year
        </button>
      </div>
    </div>

    <div class="card border-dark mb-3" style="max-width: 100%;">
      <div class="card-body text-dark">
        <div id="cashflowchart"></div>
      </div>
    </div><br>
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
    <div class="card border-dark mb-3" style="max-width: 100%;">
      <div class="card-body text-dark">
        <div id="stokbarangchart"></div>
      </div>
    </div>
    <br>
    <div class="card border-dark mb-3" style="max-width: 100%;">
      <div class="card-body text-dark">
        <h2>Lending</h2>
        <div class="table-responsive">
          <table id="table-hutang" class="table table-striped table-bordered" style="width:100%">
            <a href="#" style="float: right">Download to PDF</a>
            <label for="pwd">Hutang Terakhir</label><br>
            <thead>
              <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jatuh Tempo</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($payable as $payable)
              <tr>
                <td>{{$payable->py_name}}</td>
                <td>{{$payable->py_date}}</td>
                <td>{{$payable->due_date}}</td>
                <td>{{$payable->description}}</td>
                <td>{{$payable->py_amount}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <table id="table-piutang" class="table table-striped table-bordered" style="width:100%">
            <a href="#" style="float: right">Download to PDF</a>
            <label for="pwd">Piutang Terakhir</label><br>
            <thead>
              <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jatuh Tempo</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($receivable as $receivable)
                <tr>
                    <td>{{$receivable->rc_name}}</td>
                    <td>{{$receivable->rc_date}}</td>
                    <td>{{$receivable->rc_date}}</td>
                    <td>{{$receivable->rc_description}}</td>
                    <td>{{$receivable->rc_amount}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>

  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script>
    var income = {!! json_encode($income, JSON_NUMERIC_CHECK) !!};
    var expense = {!! json_encode($expense, JSON_NUMERIC_CHECK) !!};
    var 
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
        categories: {!! json_encode($cash) !!},
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
@endsection




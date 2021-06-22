@extends('layouts/main')

@section('title', 'CatatYuk')
    
@section('container')
<div class="container all-summary mt-5 mb-5">
  <div class="frame" style="border-style: hidden">
    <a href="#">Download to PDF</a><br>
    <div class="summary-item">
      <label for="uname">Laporan Kas</label><br>
      <label><input type="radio" name="cashflow" value="pemasukan" checked>Pemasukan</label>
      <label><input type="radio" name="cashflow" value="pengeluaran">Pengeluaran</label>
      <div id="cashflowchart"></div>
    </div>
    <div class="summary-item">
      <label for="pwd">Stok Barang</label><br>
      <div id="stokbarangchart"></div>
    </div>
    <div class="summary-item">
      <label for="pwd">Hutang</label><br>
      <div style="height:390px;overflow:auto;">
        <table id="table-hutang" class="table table-striped table-bordered" style="width:100%">
          <a href="#" style="float: right">Download to PDF</a>
          <label for="pwd">Hutang</label><br>
          <thead>
            <tr>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Jatuh Tempo</th>
              <th>Keterangan</th>
              <th>Jumlah</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Danny</td>
              <td>4/6/2021</td>
              <td>7/6/2021</td>
              <td>Test</td>
              <td>Rp.1000000</td>
              <td align="center">
                <button id="edit_htng" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
              </td>
            </tr>
            <tr>
                <td>Bagus</td>
                <td>4/6/2021</td>
                <td>7/6/2021</td>
                <td>Test</td>
                <td>Rp.1000000</td>
                <td align="center">
                  <button id="edit_htng" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i> Edit</button>
                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                </td>
            </tr>
            <tr>
              <td>Tono</td>
              <td>4/6/2021</td>
              <td>7/6/2021</td>
              <td>Test</td>
              <td>Rp.150000</td>
              <td align="center">
                <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
              </td>
            </tr>
            <tr>
              <td>Tono</td>
              <td>4/6/2021</td>
              <td>7/6/2021</td>
              <td>Test</td>
              <td>Rp.150000</td>
              <td align="center">
                <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
       </div>
    </div>
    <div class="summary-item">
      <label for="pwd">Piutang</label><br>
      <div style="height:390px;overflow:auto;">
        <table id="table-piutang" class="table table-striped table-bordered" style="width:100%">
          <a href="#" style="float: right">Download to PDF</a>
          <label for="pwd">Piutang</label><br>
          <thead>
            <tr>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Jatuh Tempo</th>
              <th>Keterangan</th>
              <th>Jumlah</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Danny</td>
              <td>4/6/2021</td>
              <td>7/6/2021</td>
              <td>Test</td>
              <td>Rp.1000000</td>
              <td align="center">
                <button id="edit_ptng" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit1"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
              </td>
            </tr>
            <tr>
              <td>Tono</td>
              <td>4/6/2021</td>
              <td>7/6/2021</td>
              <td>Test</td>
              <td>Rp.150000</td>
              <td align="center">
                <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
       </div>
    </div>
  </div>    
    
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('cashflowchart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pemasukan'
    },
    credits: {
        enabled: false
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Bulan',
        data: [100000, 150000, 350000, 200000, 440000, 570000, 630000, 550000, 450000, 330000, 720000, 920000]
    }]
  });
</script>

<script>
  Highcharts.chart('stokbarangchart', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Stok Barang'
    },
    xAxis: {
        categories: ['Gula', 'Kopi', 'Indomi', 'Kacang Hijau', 'Roti', 'Terigu', 'Rokok'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah',
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
                color: 'orangered' // ... have the color orangered.
            },{
              value: 20,
               color: 'gold' // Values from 20 (including) and up have the color gold
            },{
               color: 'lightgreen' // Values from 10 (including) and up have the lightgreen
            }]
        }
    },
    series: [{
        name: '',
        color: 'white',
        data: [10, 5, 2, 14, 25, 9, 30]
    }]
  });
</script>
</div>

<!--JANGAN DIAPA APAIN-->
{{-- <script src="{{asset('js/jquery.min.js')}}"></script>
<script src="/js/main.js"></script>
<script>
  $(document).ready(function(){
    $('#cashflow').on('change', function(){
    var n = $(this).val();
    switch(n)
    {
            case '1':
                  document.getElementById('#show').innerHTML="1st radio button";
                  break;
            case '2':
                  document.getElementById('#show').innerHTML="2nd radio button";
                  break;
            case '3':
                  document.getElementById('#show').innerHTML="3rd radio button";
                  break;
        }
    });
</script> --}}

@endsection

@section('footer')

@endsection
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
      <div style="height:200px;overflow:auto;">
        <table class="table table-sm table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Lend Date</th>
              <th scope="col">Due Date</th>
              <th scope="col">Status</th>
              <th scope="col">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
          </tbody>
        </table>
       </div>
    </div>
    <div class="summary-item">
      <label for="pwd">Piutang</label><br>
      <div style="height:200px;overflow:auto;">
        <table class="table table-sm table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Date</th>
              <th scope="col">Due Date</th>
              <th scope="col">Status</th>
              <th scope="col">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>Mark Otto</td>
              <td>11 January 2021</td>
              <td>13 December 2021</td>
              <td>Ongoing</td>
              <td>Rp. 12.000.000</td>
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

@endsection

@section('footer')

@endsection
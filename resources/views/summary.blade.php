@extends('layouts/main')

@section('title', 'CatatYuk')
    
@section('container')
  <div class="frame">
    <a href="#">Download to PDF</a><br>
    <div class="summary-item">
      <label for="uname">Laporan Kas</label><br>
      <label><input type="radio" name="cashflow" value="pemasukan">Pemasukan</label>
      <label><input type="radio" name="cashflow" value="pengeluaran">Pengeluaran</label>
      <div id="cashflowchart"></div>
    </div>
    <div class="summary-item">
      <label for="pwd">Stok Barang</label><br>
      <div id="stokbarangchart"></div>
    </div>
    <div class="summary-item">
      <label for="pwd">Hutang</label><br>
      <table style="width:100%">
        <tr>
          <th>Name</th>
          <th>Date</th>
          <th>Due Date</th>
          <th>Status</th>
          <th>Nominal</th>
        </tr>
        <tr>
          <td>Jill</td>
          <td>Smith</td>
          <td>50</td>
          <td>Done</td>
          <td>5000000</td>
        </tr>
        <tr>
          <td>Eve</td>
          <td>Jackson</td>
          <td>94</td>
          <td>Ongoing</td>
          <td>3000000</td>
        </tr>
      </table>
    </div>
    <div class="summary-item">
      <label for="pwd">Piutang</label><br>
      <table style="width:100%">
        <tr>
          <th>Name</th>
          <th>Date</th>
          <th>Due Date</th>
          <th>Status</th>
          <th>Nominal</th>
        </tr>
        <tr>
          <td>Jill</td>
          <td>Smith</td>
          <td>50</td>
          <td>Done</td>
          <td>5000000</td>
        </tr>
        <tr>
          <td>Eve</td>
          <td>Jackson</td>
          <td>94</td>
          <td>Ongoing</td>
          <td>3000000</td>
        </tr>
      </table>
    </div>
  </div>    
@endsection

@section('footer')
    
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('cashflowchart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pemasukan'
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
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
        name: 'Jumlah',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

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
        categories: ['Gula', 'Kopi', 'Indomi', 'Kacang Hijau', 'Roti'],
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
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
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
    series: [{
        name: 'Jumlah',
        data: [107, 31, 635, 203, 2]
    }]
    
});
</script>

@endsection
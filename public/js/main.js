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
        data: [100000, 150000, 350000, 200000, 440000, 570000, 630000, 550000, 450000, 330000, 720000, 920000]
    },
    {
        name: 'Expense',
        color: 'red',
        data: [2000000, 100000, 370000, 1500000, 250000, 50000, 100000, 750000, 350000, 80000, 100000, 30000]
    }]
  });

Highcharts.chart('stokbarangchart', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Item Stock'
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
                color: 'red' // ... have the color orangered.
            },{
              value: 20,
               color: 'yellow' // Values from 20 (including) and up have the color gold
            },{
               color: 'green' // Values from 10 (including) and up have the lightgreen
            }]
        }
    },
    series: [{
        name: 'Low',
        color: 'red',
        data: [10, 5, 2, 14, 25, 9, 30]
    },{
        name: 'Med',
        color: 'yellow'
    },{
        name: 'High',
        color: 'green'
    }]
  });

  
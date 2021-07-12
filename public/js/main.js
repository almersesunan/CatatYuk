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

  
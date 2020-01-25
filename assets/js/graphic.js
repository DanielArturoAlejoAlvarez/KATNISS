var base_url = "http://127.0.0.1/CISALE/";
var currentYear = (new Date).getFullYear();

$(function() {
    dataDraw(base_url,currentYear);
    selectToYearFromDrawView();
});

function selectToYearFromDrawView() {
    $("#year").on("change", function() {
        $yearselect = $(this).val();
        dataDraw(base_url,$yearselect);
    });
}

function dataDraw(baseUrl,year) {
    
    nameMonth = [
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
    ];
    $.ajax({
        url: baseUrl + "dashboard/getData",
        type: "POST",
        data: {year: year},
        dataType: "json",
        success: function(data) {
            var months = new Array();
            var amounts = new Array();
            var colors = new Array();

            $.each(data, function(key,value) {
                months.push(nameMonth[value.month - 1]);
                var valor = Number(value.amount);
                amounts.push(valor);
            });
            drawingColumn(months,amounts,year);
            drawingPie(months,amounts,year)
            drawingLine(months,amounts,year)
            drawingArea(months,amounts,year)
        }
    });
}


function drawingColumn(months,amounts,year){
    Highcharts.chart('drawStatsColumns', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Amount accumulated by sales in the months'
        },
        subtitle: {
            text: 'Year:' + year
        },
        xAxis: {
            categories: months,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Amount accumulated ($)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">Amount: </td>' +
                '<td style="padding:0"><b>$/.{point.y:.2f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },
            series: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Highcharts.numberFormat(this.y,2)
                    }
                }
            }
        },
        series: [{
            name: 'Months',
            data: amounts
        }]
    });
}

function drawingPie(months,amounts,year) {
    Highcharts.chart('drawStatsPie', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Amount accumulated by sales in the months ' + year
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">Amount: </td>' +
                '<td style="padding:0"><b>$/.{point.y:.2f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    formatter: function() {                    
                        x = this.point.x;
                        return 'Month: ' + months[x] + '<br>' +  Math.round(this.percentage*100)/100 + ' %';
                    }   
                }
            }
        },
        series: [{
            name: 'Months',
            colorByPoint: true,
            data: amounts           
        }]
    });
}

function drawingLine(months,amounts,year) {
    Highcharts.chart('drawStatsLine', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Amount accumulated by sales in the months'
        },
        subtitle: {
            text: 'Year: ' + year
        },
        xAxis: {
            categories: months
        },
        yAxis: {
            title: {
                text: 'Amounts ($/.)'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Months',
            data: amounts
        }]
    });
}

function drawingArea(months,amounts,year) {
    
    Highcharts.chart('drawStatsArea', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Amount accumulated by sales in the months ' + year
        },
        xAxis: {
            categories: months
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Months',
            data: amounts
        }]
    });
}
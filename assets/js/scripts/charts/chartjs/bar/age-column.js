// Column chart
// ------------------------------
$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#age-column-chart");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        legend: {
            display:false
            // position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],

            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                },
                ticks: {
                    beginAtZero: true,
                    stepSize: 10,
                    min: 0,
                    max: 100
                }
            }]
        },
        title: {
            display: false,
            text: 'Age-wise Cases Registered(%)'
        },
        tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
                label: function(tooltipItems, data) { 
                    return tooltipItems.yLabel + ' %';
                }
            }
        }
    };

    // Chart Data
    var chartData = {
        labels: ["0-10","10-20","20-30","30-40","40-50","50-60","60-70","70-80","80-90","90-100"],
        datasets: [{
            label: "Age-wise Cases Registered(in %)",
            data: dis_age
            // backgroundColor: ["#4286f4"]
        }]
    };
    // var chartData = {
    //     labels: ["January", "February", "March", "April", "May"],
    //     datasets: [{
    //         label: "My First dataset",
    //         data: [65, 59, 80, 81, 56],
    //         backgroundColor: "#673AB7",
    //         hoverBackgroundColor: "rgba(103,58,183,.9)",
    //         borderColor: "transparent"
    //     }, {
    //         label: "My Second dataset",
    //         data: [28, 48, 40, 19, 86],
    //         backgroundColor: "#E91E63",
    //         hoverBackgroundColor: "rgba(233,30,99,.9)",
    //         borderColor: "transparent"
    //     }]
    // };

    var config = {
        type: 'bar',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var lineChart = new Chart(ctx, config);
});
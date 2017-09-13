
$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#diaseases-pie-chart");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
                label: function(tooltipItems, data) { 
                var indice = tooltipItems.index;  
                return  data.labels[indice] +':'+ dis_no[indice]+' ('+ parseFloat(data.datasets[0].data[indice]).toFixed(2) + ' %'+')';
                }
            }
        },
        legend:{
            position:'bottom'
        }
    };
    // console.log(dis_no_p);
    // Chart Data
    var chartData = {
        labels: dis_names,
        datasets: [{
            label: "Disease-wise Cases Registered",
            data: dis_no_p,
            backgroundColor: ["#99B898","#FECEA8","#FF847C","#E84A5F","#2A363B","#4286f4","#86f441","#aaaa00","#bbbbbc","#d1a300","#035b3e","#8d937f","#372960","#280447"]
        }]
    };

    var config = {
        type: 'pie',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var diseasesPieChart = new Chart(ctx, config);
});
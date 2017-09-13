
$(window).on("load", function(){

    var ctx = $("#sex-pie-chart");
 // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        legend:{
            position:'bottom'
        }
    };
    var chartData = {
        labels: ["Males","Females","Others"],
        datasets: [{
            label: "Sex-wise Cases Registered",
            data: [males, females,other],
            backgroundColor: ["#0000ff","#ff0000","#ffff00"]
        }]
    };

    var config = {
        type: 'pie',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var agePieChart = new Chart(ctx, config);

});
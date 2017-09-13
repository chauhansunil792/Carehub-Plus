
$(window).on("load", function(){

    var ctx = $("#age-pie-chart");
 // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
    };
    var chartData = {
        labels: ["0-10","10-20","20-30","30-40","40-50"],
        datasets: [{
            label: "Age-wise Cases Registered",
            data: dis_age,
            backgroundColor: ["#4286f4","#86f441","#a041f4","#abbaaa","#d1a300","#035b3e","#8d937f","#372960","#280447","#99B898","#FECEA8","#FF847C","#E84A5F","#2A363B"]
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
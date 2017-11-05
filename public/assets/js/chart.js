function chart() {
    var chart = new CanvasJS.Chart("chartContainer",
    {
    title:{
    text: name,
    fontFamily: "Helvetica"
    },
    legend: {
    fontFamily: "Helvetica"
    },

    axisX:{
    title: "timeline",
    gridThickness: 2
    },
    axisY: {
    title: unit
    },
    data: [
    {
    type: "area",
    xValueType: "dateTime",
    dataPoints: points

    }
    ]


    });

    chart.render();
    }
 /*function myFunction() {
     document.getElementById("demo").innerHTML = "Paragraph changed.";
 }*/
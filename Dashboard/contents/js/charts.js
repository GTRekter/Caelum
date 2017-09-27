/*!
 * Login Page 
 * Author: Ivan Porta
 */

/* ===== GLOABL ===== */

window.onload = function() {
    
    var MONTHS = ["January", "February", "March", 
        "April", "May", "June", "July", "August", 
        "September", "October", "November", "December"];
    
    var configAreaChart = {
        type: 'line',   
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                backgroundColor: "#000",  
                borderColor: "#767",
                data: [
                    10,
                    11,
                    12,
                    1,
                    5,
                    8,
                    22
                ],
                fill: false,
            }, 
            {
                label: "My Second dataset",
                fill: false,
                backgroundColor: "#555",
                borderColor: "#090",
                data: [
                    7,
                    3,
                    22,
                    16,
                    8,
                    4,
                    33
                ],
            }]
        },
        options: {
            responsive: true,
            title:{
                display: false,
            },  
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }

        }
    };
    var contextAreaChart = document.getElementById("area-chart").getContext("2d");
    window.myLine = new Chart(contextAreaChart, configAreaChart);

};
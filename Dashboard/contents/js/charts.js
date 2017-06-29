(function(window) { 'use strict';


	/* ==== START: GLOBAL ==== */
	var randomScalingFactor = function() {
      return Math.round(Math.random() * 100);
    };

	var lineChartData = {
      labels: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
      datasets: [{
        label: "My First dataset",
		backgroundColor: "rgba(38, 185, 154, 0.38)",
        data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
      }, {
        label: "My Second dataset",
		backgroundColor: "rgba(3, 88, 106, 0.38)",
        data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
      }]
    };
	/* ==== END: GLOBAL ==== */

	/* ==== START: FUNCTIONS ==== */
	/* ==== END: FUNCTIONS ==== */


	// window.count = 0;
	var ctx = $("[data-element-id='chart']")[0].getContext('2d');
	ctx.canvas.height = 280;
	var myDoughnut = new Chart(ctx, {
		type: 'line',
		data: lineChartData,
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			title:{
				display: false
			},
			tooltips: {
				enabled: false
			},
			scales: {
				yAxes: [{
					gridLines : {
						display: true,
						color: "rgba(51, 51, 51, 0.06)"
					}
				}],
				xAxes: [{
					gridLines : {
						display: true,
						color: "rgba(51, 51, 51, 0.06)"
					}
				}]
			} 
		},
	});

})(); 
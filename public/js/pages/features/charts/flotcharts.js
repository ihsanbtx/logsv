"use strict";

// Class definition
var KTFlotchartsDemo = function() {

	// Private functions

	var demo10 = function() {
		var data = [
            {label: "Google", data: 20, color:  KTApp.getSettings()['colors']['theme']['base']["primary"]},
            {label: "Twitter", data: 35, color:  KTApp.getSettings()['colors']['theme']['base']["success"]},
            {label: "Linkedin", data: 20, color:  KTApp.getSettings()['colors']['theme']['base']["danger"]},
            {label: "Instagram", data: 25, color:  KTApp.getSettings()['colors']['theme']['base']["warning"]},
            {label: "Facebook", data: 10, color:  KTApp.getSettings()['colors']['theme']['base']["info"]}
        ];

		$.plot($("#kt_flotcharts_10"), data, {
			series: {
				pie: {
					show: true,
					radius: 2,
					label: {
						show: true,
						radius: 1,
						formatter: function(label, series) {
							return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
						},
						background: {
							opacity: 0.8
						}
					}
				}
			},
			legend: {
				show: false
			}
		});
	}

	return {
		// public functions
		init: function() {
			// default charts
			
			// pie charts
			
			demo10();
		}
	};
}();

jQuery(document).ready(function() {
	KTFlotchartsDemo.init();
});

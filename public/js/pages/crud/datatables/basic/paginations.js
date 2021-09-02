"use strict";
var KTDatatablesBasicPaginations = function() {

	var initTable1 = function() {
		var table = $('#kt_datatable');
		var caTable = $('#kt_cadatatable');

		// begin first table
		table.DataTable({
			responsive: true,
			pagingType: 'full_numbers',
			columnDefs: [
				{
					targets: 1,
					width : '50px',
				},
				{
					targets: 2,
					width : '300px',
				},
				{
					targets: 3,
					width : '200px',
				},
				{
					targets: 4,
					width: '300px'
				},
				{
					targets: 5,
					width: '150px'
				},
				{
					targets: -1,
					width: '200px',
					title: 'Actions',
				},
			],
		});

		caTable.DataTable({
			responsive: true,
			pagingType: 'full_numbers',
			columnDefs: [
				{
					targets: 1,
					width : '600px',
				},
				{
					targets: 2,
					width : '400px',
				},
				{
					targets: 3,
					width : '200px',
				},
				{
					targets: -1,
					width: '200px',
					title: 'Actions',
				},
			],
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesBasicPaginations.init();
});

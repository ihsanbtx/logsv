"use strict";
var KTDatatablesExtensionsResponsive = function() {

	var initTable1 = function() {
		var table = $('#kt_datatable');
		var caTable = $('#kt_cadatatable');
		var activityTable = $('#kt_activitydatatable');
		var svopTable = $('#kt_svopdatatable');
		var tgTable = $('#kt_targetgroupdatatable');
		var providerTable = $('#kt_providerdatatable');
		var bandTable = $('#kt_banddatatable');
		var provinceTable = $('#kt_provincedatatable');
		var districtTable = $('#kt_districtdatatable');
		var subdistrictTable = $('#kt_subdistrictdatatable');
		var villageTable = $('#kt_villagedatatable');
		var vehicleTable = $('#kt_vehicledatatable');
		var target = $('#kt_target');

		// begin first table
		table.DataTable({
			responsive: true,
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

		svopTable.DataTable({
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
					targets: -1,
					width: '200px',
					title: 'Actions',
				},
			],
		});

		activityTable.DataTable({
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
					targets: -1,
					width: '200px',
					title: 'Actions',
				},
			],
		});

		tgTable.DataTable({
			responsive: true,
		});

		providerTable.DataTable({
			responsive: true,
		});

		bandTable.DataTable({
			responsive: true,
		});

		provinceTable.DataTable({
			responsive: true,
			pagingType: 'full_numbers',
			columnDefs: [
				{
					targets: 0,
					width : '50px',
				},
				{
					targets: -1,
					width: '150px',
					title: 'Actions',
				},
			],
		});

		districtTable.DataTable({
			responsive: true,
			pagingType: 'full_numbers',
			columnDefs: [
				{
					targets: 0,
					width : '50px',
				},
				{
					targets: -1,
					width: '150px',
					title: 'Actions',
				},
			],
		});

		subdistrictTable.DataTable({
			responsive: true,
			pagingType: 'full_numbers',
			columnDefs: [
				{
					targets: 0,
					width : '50px',
				},
				{
					targets: -1,
					width: '150px',
					title: 'Actions',
				},
			],
		});

		villageTable.DataTable({
			responsive: true,
			pagingType: 'full_numbers',
			columnDefs: [
				{
					targets: 0,
					width : '50px',
				},
				{
					targets: -1,
					width: '150px',
					title: 'Actions',
				},
			],
		});

		vehicleTable.DataTable({
			responsive: true,
		});

		target.DataTable({
			responsive: true,
			pagingType: 'full_numbers',
		});

	};

	return {
		//main function to initiate the module
		init: function() {
			initTable1();
		}
	};
}();

jQuery(document).ready(function() {
	KTDatatablesExtensionsResponsive.init();
});

"use strict";

// Class Definition
var KTImportVehicle = function() {
    //var _login;

    var _handleImportVehicleForm = function(e) {
        var validation;
        var form = KTUtil.getById('importVehicle');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			form,
			{
				fields: {
					uploadFile: {
						validators: {
							/*file: {
								extension: 'xlsx,xls,csv',
								type: 'application/vnd.ms-excel, application/excel, application/x-excel, application/x-msexcel, application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .csv',
								message: 'Please choose a .xls file'
							}*/
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#ImportVehicleButton').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    swal.fire({
		                text: "All is cool! Now you submit this form",
		                icon: "success",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				} else {
					swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

      
    }


	
	
    // Public Functions
    return {
        // public functions
        init: function() {
            //_login = $('#kt_login');
            _handleImportVehicleForm();
        }
    };
}();
// Class Initialization
jQuery(document).ready(function() {
    KTImportVehicle.init();
	//KTUserEdit.init();
});

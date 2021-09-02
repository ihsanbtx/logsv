"use strict";

// Class Definition
var KTAddTarget = function() {
    //var _login;

    var _handleAddTargetForm = function(e) {
        var validation;
        var form = KTUtil.getById('addTarget');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			form,
			{
				fields: {
					nik: {
						validators: {
							digits : {
								message: 'NIK must be a digit'
							},
							stringLength: {
								min :16,
								max : 16,
								message : 'NIK must be 16 digit'
							}
						}
					},
					gender:
					{
						validators: {
							notEmpty: {
								message: 'Gender is required'
							}
						}
					},
					asknownas:
					{
						validators: {
							notEmpty: {
								message: 'As Known As is required'
							}
						}
					},
					avatar:
					{
						validators: {
							file: {
								extension: 'jpeg,jpg,png',
								type: 'image/jpeg,image/png',
								maxSize: 300000,   // 2048 * 1024
								message: 'The selected file is not valid'
							},
						}
					}

				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#addTargetButton').on('click', function (e) {
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
            _handleAddTargetForm();
        }
    };
}();
// Class Initialization
jQuery(document).ready(function() {
    KTAddTarget.init();
	//KTUserEdit.init();
});

"use strict";

// Class Definition
var KTChangePassword = function() {
    //var _login;

    var _handleChangePasswordForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			form,
			{
				fields: {
					currentPassword: {
						validators: {
							notEmpty: {
								message: 'Current Password is required'
							},
							
						}
					},
					newPassword: {
						validators: {
							notEmpty: {
								message: 'New Password is required'
							},
							stringLength : {
								min: 6,
								message: 'Password must be more than 6 characters'
							}
						}
					},
					cpassword: {
						validators: {
							notEmpty: {
								message: 'Confirm Password is required'
							},
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="newPassword"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
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

        $('#changePassword').on('click', function (e) {
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
            _handleChangePasswordForm();
        }
    };
}();
// Class Initialization
jQuery(document).ready(function() {
    KTChangePassword.init();
	//KTUserEdit.init();
});

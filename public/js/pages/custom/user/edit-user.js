"use strict";

// Class Definition
var KTEditUser = function() {
    //var _login;

    var _handleEditUserForm = function(e) {
        var validation;
        var form = KTUtil.getById('editUser');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			form,
			{
				fields: {
					fullname: {
						validators: {
							notEmpty: {
								message: 'Full Name is required'
							}
						}
					},
					nrp: {
						validators: {
							notEmpty: {
								message: 'NRP is required'
							},
							digits : {
								message: 'NRP must be a digit'
							},
							stringLength: {
								min :8,
								max : 8,
								message : 'NRP must be 8 digit'
							}
				
						}
					},
					caseagent: {
						validators: {
							notEmpty: {
								message: 'Case Agent is required'
							}
						}
					},
					usertype: {
						validators: {
							notEmpty: {
								message: 'User Type is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
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

        $('#editUserButton').on('click', function (e) {
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

            _handleEditUserForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTEditUser.init();
});

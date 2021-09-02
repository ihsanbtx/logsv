
"use strict";

// Class Definition
var KTAddActivity = function() {
    //var _login;

    var _handleAddActivityForm = function(e) {
        var addActivity;
		var editActivity;
        var form = KTUtil.getById('kt_addactivity');
		var form2 = KTUtil.getById('kt_formEdit');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        /*addActivity = FormValidation.formValidation(
			form,
			{
				fields: {
					activityName: {
						validators: {
							notEmpty: {
								message: 'Activity is required'
							}
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
		);*/

		editActivity = FormValidation.formValidation(
			form2,
			{
				fields: {
					activityName: {
						validators: {
							notEmpty: {
								message: 'Activity is required'
							}
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
/*
        $('#addActivity').on('click', function (e) {
            e.preventDefault();

            addActivity.validate().then(function(status) {
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
*/
      
    }


	
	
    // Public Functions
    return {
        // public functions
        init: function() {
            //_login = $('#kt_login');
            _handleAddActivityForm();
        }
    };
}();

// Class Definition
var KTChangePassword = function() {
    //var _login;

    var _handleChangePasswordForm = function(e) {
        var changePassword;
        var form = KTUtil.getById('kt_changepassword');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        changePassword = FormValidation.formValidation(
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

            changePassword.validate().then(function(status) {
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

	var _handleAddActivityForm = function(e) {
        var addActivity;
        var form = KTUtil.getById('kt_addactivity');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        addActivity = FormValidation.formValidation(
			form,
			{
				fields: {
					activityName: {
						validators: {
							notEmpty: {
								message: 'Activity is required'
							}
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

        $('#addActivity').on('click', function (e) {
            e.preventDefault();

            addActivity.validate().then(function(status) {
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
			_handleAddActivityForm();
            //_handleChangePasswordForm();
			
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
	
		KTAddActivity.init();
	
});



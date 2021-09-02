"use strict";

// Class Definition
var KTAddUser = function() {
    //var _login;

    var _handleAddUserForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_form');

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
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							},
							stringLength: {
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
                                    return form.querySelector('[name="password"]').value;
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

        $('#submitUser').on('click', function (e) {
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
            _handleAddUserForm();
        }
    };
}();

/*
var KTUserEdit = function() {
    //var _login;

	var _handleEditUserForm = function(e) {
        var validation2;
        var form = KTUtil.getById('kt_formEdit');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation2 = FormValidation.formValidation(
			form2,
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

        $('#editUser').on('click', function (e) {
            e.preventDefault();

            validation2.validate().then(function(status) {
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
*/

// Class Initialization
jQuery(document).ready(function() {
    KTAddUser.init();
	//KTUserEdit.init();
});


/*"use strict";

// Class Definition
var KTAddUser = function () {
	// Private Variables
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _avatar;
	var _validations = [];

	// Private Functions
	var _initWizard = function () {
		
		// Submit event
		_wizardObj.on('submit', function (wizard) {
			Swal.fire({
				text: "All is good! Please confirm the form submission.",
				icon: "success",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, submit!",
				cancelButtonText: "No, cancel",
				customClass: {
					confirmButton: "btn font-weight-bold btn-primary",
					cancelButton: "btn font-weight-bold btn-default"
				}
			}).then(function (result) {
				if (result.value) {
					_formEl.submit(); // Submit form
				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "Your form has not been submitted!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-primary",
						}
					});
				}
			});
		});
	}
	
	

	var _initValidations = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/

		// Validation Rules For Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
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
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
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
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

	}

	

	return {
		// public functions
		init: function () {
			_formEl = KTUtil.getById('kt_form');
			_initWizard();
			_initValidations();
		}
	};
}();

jQuery(document).ready(function () {
	KTAddUser.init();
});*/

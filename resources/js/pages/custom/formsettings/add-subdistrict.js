"use strict";

// Class Definition
var KTAddSubsubdistrict = function() {
    //var _login;

    var _handleAddSubsubdistrictForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			form,
			{
				fields: {
					subdistrictName: {
						validators: {
							notEmpty: {
								message: 'Subsubdistrict is required'
							}
						}
					},
					province: {
						validators: {
							notEmpty: {
								message: 'Province is required'
							}
						}
					},
					district: {
						validators: {
							notEmpty: {
								message: 'District is required'
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

        $('#addSubsubdistrict').on('click', function (e) {
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
            _handleAddSubsubdistrictForm();
        }
    };
}();
// Class Initialization
jQuery(document).ready(function() {
    KTAddSubsubdistrict.init();
	//KTUserEdit.init();
});

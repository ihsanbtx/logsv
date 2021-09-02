"use strict";

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
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
			var form1 = document.forms.kt_form;
			var formData = new FormData(form1);
			var targetGroup = formData.get('targetGroup');

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

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

		//function
		const activityTimeVal = {
			validators: {
				notEmpty: {
					message: 'Time is required'
				}
			}
		};
		const latitudeVal = {
			validators: {
				regexp: {
					regexp : '^[\-\.0-9]*$',
					message: 'Wrong latitude format'
				}
			}
		};
		const longitudeVal = {
			validators: {
				regexp: {
					regexp : '^[\.0-9]*$',
					message: 'Wrong longitude format'
				}
			}
		};
		const vn1Val = {
			validators: {
				stringLength: {
					max : 2,
					message: 'Max 2 letter'
				},
				stringCase: {
					message: 'Must be in uppercase',
					'case': 'upper'
				}
			}
		};
		const vn2Val = {
			validators: {
				stringLength: {
					max : 4,
					message: 'Max 4 number'
				},
				digits : {
					message : 'Must digits'
				}
			}
		};
		const vn3Val = {
			validators: {
				stringLength: {
					max : 3,
					message: 'Max 3 letter'
				},
				stringCase: {
					message: 'Must be in uppercase',
					'case': 'upper'
				},
				regexp: {
					regexp : '^[A-Z]{1,3}$',
					message: 'Must letters'
				}
			}
		};

		// Validation Rules For Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					activityDate: {
						validators: {
							notEmpty: {
								message: 'Date is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					// Step 2
					activityTime: {
						validators:{
							notEmpty:
							{
								message: 'Time required'
							}
						}
					},
					
					latitude: {
						validators: {
							regexp: {
								regexp : '^[\-\.0-9]*$',
								message: 'Wrong latitude format'
							}
						}
					},
					longitude: {
						validators: {
							regexp: {
								regexp : '^[\.0-9]*$',
								message: 'Wrong longitude format'
							}
						}
					},
					vehicleNumber1: {
						validators: {
							stringLength: {
								max : 2,
								message: 'Max 2 letter'
							},
							stringCase: {
								message: 'Must be in uppercase',
								'case': 'upper'
							}

						}
					},
					vehicleNumber2: {
						validators: {
							stringLength: {
								max : 4,
								message: 'Max 4 number'
							},
							digits : {
								message : 'Must digits'
							}
						}
					},
					vehicleNumber3: {
						validators: {
							stringLength: {
								max : 3,
								message: 'Max 3 letter'
							},
							stringCase: {
								message: 'Must be in uppercase',
								'case': 'upper'
							}
						}
					},
					'data[0][activityTime]': activityTimeVal,
					'data[0][latitude]': latitudeVal,
					'data[0][longitude]': longitudeVal,
					'data[0][vehicleNumber1]': vn1Val,
					'data[0][vehicleNumber2]': vn2Val,
					'data[0][vehicleNumber3]': vn3Val,

				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					caseAgentName: {
						validators: {
							notEmpty: {
								message: 'Please select case agent'
							}
						}
					},
					svteam: {
						validators: {
							notEmpty: {
								message: 'Please select surveillance team'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
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
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
			_initValidations();
		}
	};
}();

jQuery(document).ready(function () {
	KTAddUser.init();
});

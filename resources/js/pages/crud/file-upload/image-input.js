'use strict';

// Class definition
var KTImageInputDemo = function () {
	// Private functions
	var initDemos = function () {

		// Example 5
		var avatar5 = new KTImageInput('kt_image_5');

		avatar5.on('cancel', function(imageInput) {
			
		});

		avatar5.on('change', function(imageInput) {
			
		});

		avatar5.on('remove', function(imageInput) {
			
		});
	}

	return {
		// public functions
		init: function() {
			initDemos();
		}
	};
}();

KTUtil.ready(function() {
	KTImageInputDemo.init();
});

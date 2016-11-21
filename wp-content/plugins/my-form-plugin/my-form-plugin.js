(function(){
	jQuery(document).ready(($) => {
		validateForm($);
		setFormHandler($);
	});

	function validateForm($) {
		$('form').validate({
			rules: {
				firstName: {
					required: true
				},

				surname: {
					required: true
				},

				jobTitle: {
					required: true
				},

				company: {
					required: true
				},

				email: {
					required: true,
					email: true
				},

				phone: {
					required: true
				}
			}
		});
	}

	function setFormHandler($) {
		console.log(window.ajax_object.ajax_url);
		$('form').submit((event) => {
			if($('form').valid()) {
				event.preventDefault();
				var profile = {};
				profile.name = $('#name-input').val();
				profile.surname = $('#surname-input').val();
				profile.job = $('#job-input').val();
				profile.company = $('#company-input').val();
				profile.email = $('#email-input').val();
				profile.phone = $('#phone-input').val();
				profile.country = $('#country-select').val();
				profile.area = $('#area-select').val();
				profile.action = 'submit_form';
				$.post(window.ajax_object.ajax_url, profile, (resp)=>{ console.log(resp); });
			}
		});
	}

})();

function recaptchaCallback() {
	jQuery(document).ready(($) => {
		$('#submit-button').removeAttr('disabled');
	});
};

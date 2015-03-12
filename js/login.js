var Login = function () {

	var handleLogin = function() {

		$('.login-form').validate({
			errorElement: 'div', //default input error message container
			errorClass: 'help-block', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			rules: {
				'LoginForm[login]': {
					required: true
				},
				'LoginForm[password]': {
					required: true
				},
				'LoginForm[verify_code]': {
					required: true
				}
			},

			messages: {
				'LoginForm[login]': {
					required: '请输入用户名'
				},
				'LoginForm[password]': {
					required: '请输入登录密码'
				},
				'LoginForm[verify_code]': {
					required: '请输入验证码'
				}
			},

			//invalidHandler: function (event, validator) { //display error alert on form submit   
			//	$('.alert-danger', $('.login-form')).show();
			//	console.log('invalidHandler');
			//},

			highlight: function (element) { // hightlight error inputs
				$(element)
					.closest('.form-group').addClass('has-error');
			},

			success: function (label) {
				label.closest('.form-group').removeClass('has-error');
	            label.remove();
			},

			errorPlacement: function (error, element) {
				error.insertAfter(element.parent());
			},

			submitHandler: function (form) {
				form.submit(); // form validation success, call ajax form submit
			}
		});

		$('.login-form input').keypress(function (e) {
			if (e.which == 13) {
				if ($('.login-form').validate().form()) {
					$('.login-form').submit(); //form validation success, call ajax form submit
				}
				return false;
			}
		});
		
		$('#verify_captcha').click(function(){
			$.get( '/site/captcha?refresh=1', function(data) {
					console.log(data);
					$('#verify_captcha').attr('src', data['url']);
					$('body').data('captcha.hash', [data['hash1'], data['hash2']]);
				}, 'json'
			);
			return false;
		});

	};
    
    return {
        init: function () {
            handleLogin();
			$.backstretch([
		        "/images/bg/1.jpg",
		        "/images/bg/2.jpg",
		        "/images/bg/3.jpg",
		        "/images/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 20000
		    });
        }

    };

}();
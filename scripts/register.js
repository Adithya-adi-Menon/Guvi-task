$(document).ready(function(){
    var data = $("register-form").serialize();
    $("#register-form").validate({
		rules:
		{
			username: {
				required: true,
				minlength: 3
			},
			password: {
				required: true,
				minlength: 8,
				maxlength: 15
			},
			
			cpassword: {
				required: true,
				equalTo: '#user_password'
			},
			email: {
				required: true,
				email: true
			},
			errorPlacement: function(error, element) {
				error.appendTo('#err');
			}
		},
		messages:
		{
			user_name: "please enter user name",
			user_password: {
				required: "please provide a password",
				minlength: "password at least have 8 characters"
			},
			email: "please enter a valid email address",
			user_linkedin: "please enter a valid url",
			cpassword: {
				required: "please retype your password",
				equalTo: "password doesn't match !"
			}
		},
		submitHandler: formHandler
	});
    function formHandler(){
    // $('#register').click(function(event){
        event.preventDefault();
        $.ajax({
            url: "user_reg.php",
            method: "post",
            data: $('form').serialize(),
            success: function(strmessage){
                $('#message').text(strmessage);
            }
    
        })
        $.ajax({
            method: 'POST',
            url: 'createjson.php',
            data: $('form').serialize(),
            success: function (strmessage) {
                
                    $('#message').text(strmessage);
                
            }
        });
    // })
    }
    
})
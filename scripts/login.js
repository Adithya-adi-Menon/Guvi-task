$(document).ready(function() {
    $("#submit").click(function() {
        var user_email = $("#email").val();
        var user_password = $("#password").val();
        var dataString = 'user_email1=' + user_email + '&user_password1=' + user_password;
        if (user_email == '' || user_password == '') {
            $('#message1').text("Please enter the data");
        } else {
            $.ajax({
                type: "POST",
                url: "login.php",
                data: dataString,
                cache: false,
                success: function(response) {
                    if (response == "LoginSuccess") {
                        var lEmail = localStorage.setItem('email', user_email);
                        window.location.href = "loggedin.html";
                    } else if (response == "Fail") {
                        $('#message1').text("Username or password is incorrect");
                    }
                }
            });
        }
        return false;
    });
});
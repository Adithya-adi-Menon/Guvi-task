$(document).ready(function () {
    $.ajax({
        url: 'profile_logic.php',
        method: 'post',
        dataType: 'json',
        success: function (data) {
            let string = '';
            $.each(data, function (key, value) {
                string += `
                <div class="group">
        <div class="col-1">
            <label for="f-name">Username</label>
        </div>
        <div class="col-2">
            <input type="text" id="f-name" name="" placeholder="Username" value="${value['username']}" />
        </div>
    </div>
    <div class="group">
    <div class="col-1">
        <label for="l-name">Email</label>
    </div>
    <div class="col-2">
        <input type="text" id="l-name" placeholder="Email" value="${value['email']}" />
    </div>
</div>
<!-- Password -->
<div class="group">
    <div class="col-1">
        <label for="password">Age</label>
    </div>
    <div class="col-2">
        <input type="text" id="password" placeholder="Age" value="${value['age']}" />
    </div>
</div>
<!-- Email -->
<div class="group">
    <div class="col-1">
        <label for="email">Dob</label>
    </div>
    <div class="col-2">
        <input type="date" id="email" placeholder="Dob" value="${value['dob']}" />
    </div>
</div>
<div class="group">
    <div class="col-1">
        <label for="email">Contact</label>
    </div>
    <div class="col-2">
        <input type="phone" id="email" placeholder="contact" value="${value['contact']}"/>
    </div>
</div>

                `;
            });
            $('#Append').append(string);
        },
        error: {
        }
    });
});
if (localStorage.email) {
    console.log("ADITHYA LOGEED IN")
    
     $('#Logout').append(`<a class="btn btn-warning btn-sm" href="logout.php" role="button" onclick="localStorage.clear();">Logout</a>`);
}else {
   
    $('#Login').append(`<a class="btn btn-primary btn-sm" href="login.php" role="button">Login</a>`);
}
$(document).ready(function () {
    $.ajax({
        url: 'fetch.php',
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
            <input type="text" id="f-name" name="username" placeholder="Username" value="${value['username']}" disabled />
        </div>
    </div>
    <div class="group">
    <div class="col-1">
        <label for="l-name">Email</label>
    </div>
    <div class="col-2">
        <input type="text" id="l-name" name="email" placeholder="Email" value="${value['email']}" disabled />
    </div>
</div>
<!-- Password -->
<div class="group">
    <div class="col-1">
        <label for="password">Age</label>
    </div>
    <div class="col-2">
        <input type="text" id="password" name="age" placeholder="Age" value="${value['age']}" />
    </div>
</div>
<!-- Email -->
<div class="group">
    <div class="col-1">
        <label for="email">Dob</label>
    </div>
    <div class="col-2">
        <input type="date" id="email" name="dob" placeholder="Dob" value="${value['dob']}" />
    </div>
</div>
<div class="group">
    <div class="col-1">
        <label for="email">Contact</label>
    </div>
    <div class="col-2">
        <input type="phone" id="email" name="contact" placeholder="contact" value="${value['contact']}"/>
    </div>
</div>
                `;
            });
            $('#Welcome').append(string);
        },
        error: {
        }
    });
});
$('document').ready(function () {
   
        
        $('#update').click(function(event){
            event.preventDefault();
    
        $.ajax({
            method: 'POST',
            url: 'update.php',
            data:  $('#updateform').serialize(),
            success: function (response) {
                $('#Message').text(response);
                location.href="profile.html"
            }
        });
        
         })
});
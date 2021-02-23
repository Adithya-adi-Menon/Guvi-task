<?php
session_start();
include("dbconfig.php");
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email1']);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password1']);
    $result = mysqli_query($conn, "SELECT * FROM login WHERE email = '" . $user_email . "' and password = '" . $user_password . "'");
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['email'] = $row['email'];
        $_SESSION["loggedin"]= true;
        echo "LoginSuccess";
    } else {
        echo "Fail";
    }
?>
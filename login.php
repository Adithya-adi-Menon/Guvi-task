<?php
session_start();
include("dbconfig.php");
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email1']);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password1']);
    $sql = "SELECT * FROM login WHERE email=? and password=?";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ss",$user_email,$user_password);
    $stmt->execute();
    $result =$stmt->get_result();
    // $result = mysqli_query($conn, "SELECT * FROM login WHERE email = '" . $user_email . "' and password = '" . $user_password . "'");
    if ($row = $result->fetch_assoc()) {
        $_SESSION['email'] = $row['email'];
        $_SESSION["loggedin"]= true;
        echo "LoginSuccess";
    } else {
        echo "Fail";
    }
?>
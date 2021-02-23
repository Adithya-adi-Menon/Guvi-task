<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id16226696_guvii');
define('DB_PASSWORD', 'Password@21#');
define('DB_NAME', 'id16226696_guvi');
// define('DB_PORT','3306');
 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
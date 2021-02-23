<?php
include_once("dbconfig.php");

    $email=$_POST['email'];
	$age = $_POST['age'];
	$dob = $_POST['dob'];
	$contact = $_POST['contact'];
	
		$stmt = $conn->prepare("UPDATE login SET age=?, dob=?, contact=? WHERE email='$email'");
		$stmt->bind_param("sss", $age, $dob, $contact);
		$stmt->execute();
    if($stmt->execute()==true){
        echo "Updated";
    }
    else{
        echo "Failed";
    }
	

?>
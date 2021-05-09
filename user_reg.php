<?php
session_start();
include_once("dbconfig.php");
// if(isset($_POST['register'])) {
	$user_name = $_POST['username'];
	$user_email = $_POST['email'];
	$user_password = $_POST['password'];
    $age='';
    $dob='';
    $contact='';
	$sql = "SELECT * FROM login WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$user_email);
    $stmt->execute();
    $result = $stmt->get_result();
	
	$row = $result->fetch_assoc();
	if(!isset($row['email'])){
		$stmt = $conn->prepare("INSERT INTO login (username, email,password,age,dob,contact) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $user_name, $user_email, $user_password,$age,$dob,$contact);
		$stmt->execute();
		echo "Registration Successful.";

	} else {
		echo "Email Already Exists";
	}

   
    
        $sql = "SELECT username,email FROM login ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) > 0){
            $result_array = array();
            while($row = $result->fetch_assoc()){
                array_push($result_array, $row);
            }
            $final_data = json_encode($result_array);
        if (file_put_contents('profile.json', $final_data)) {
            $message = "<label class='text-success'>File Appended Success fully</p>";
        }
        }
       
       
        
    
// }


?>

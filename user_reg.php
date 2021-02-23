<?php
session_start();
include_once("dbconfig.php");
// if(isset($_POST['register'])) {
	$user_name = $_POST['username'];
	$user_email = $_POST['email'];
	$user_password = $_POST['password'];
	$sql = "SELECT * FROM login WHERE email='$user_email'";
	$resultset = mysqli_query($conn, $sql) ;
	$row = mysqli_fetch_assoc($resultset);
	if(!isset($row['email'])){
		$stmt = $conn->prepare("INSERT INTO login (username, email,password) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $user_name, $user_email, $user_password);
		$stmt->execute();
		echo "Registration Successful.";

	} else {
		echo "Email Already Exists";
	}

   
    
        $sql = "SELECT username,email FROM login ";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res) > 0){
            $result_array = array();
            while($row = mysqli_fetch_assoc($res)){
                array_push($result_array, $row);
            }
        }
       
       
        $final_data = json_encode($result_array);
        if (file_put_contents('profile.json', $final_data)) {
            $message = "<label class='text-success'>File Appended Success fully</p>";
        }
    
// }


?>

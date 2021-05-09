<?php
session_start();
?>
<?php
    include_once("dbconfig.php");
    $sess = $_SESSION['email'];
    if ($sess != '') {
        $sql = "SELECT * FROM login WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$_SESSION['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) > 0){
            $result_array = array();
            while($row = $result->fetch_assoc()){
                array_push($result_array, $row);
            }
        }
        echo json_encode($result_array);
    }
?>
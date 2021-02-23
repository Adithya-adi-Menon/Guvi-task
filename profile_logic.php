<?php
session_start();
?>
<?php
    include_once("dbconfig.php");
    $sess = $_SESSION['email'];
    if ($sess != '') {
        $sql = "SELECT * FROM login WHERE email = '{$_SESSION['email']}'";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res) > 0){
            $result_array = array();
            while($row = mysqli_fetch_assoc($res)){
                array_push($result_array, $row);
            }
        }
        echo json_encode($result_array);
    }
?>
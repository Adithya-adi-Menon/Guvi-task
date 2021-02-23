<?php session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}else{



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.scss">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="scripts/update.js"></script>
    
    
</head>
<body>
    <!-- Form -->
<form method="POST" class="form" id="updateform" >
<?php
    include_once("dbconfig.php");
    $sql = "SELECT * FROM login WHERE email = '{$_SESSION['email']}'";
    $res = mysqli_query($conn, $sql);
    $red = "";
    while ($row = mysqli_fetch_array($res)) {
        $red  = $row['email'];
    }
    if ($red == $_SESSION['email']) {
        $sql1 = "SELECT * FROM login WHERE email = '{$_SESSION['email']}'";
        $res1 = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($res1)) {
     
    ?>
    <h6><?php echo "<script>window.localStorage.getItem('email');</script> ";?></h6>
<div class="group">
        <div class="col-1">
            <label for="f-name">Username</label>
        </div>
        <div class="col-2">
            <input type="text" id="f-name" name="username" placeholder="Username" value="<?php echo $row["username"]?>" />
        </div>
    </div>
    <div class="group">
    <div class="col-1">
        <label for="l-name">Email</label>
    </div>
    <div class="col-2">
        <input type="text" id="l-name" name="email" placeholder="Email" value="<?php echo $row["email"]?>" />
    </div>
</div>
<!-- Password -->
<div class="group">
    <div class="col-1">
        <label for="password">Age</label>
    </div>
    <div class="col-2">
        <input type="text" id="password" name="age" placeholder="Age" value="<?php echo $row["age"]?>" />
    </div>
</div>
<!-- Email -->
<div class="group">
    <div class="col-1">
        <label for="email">Dob</label>
    </div>
    <div class="col-2">
        <input type="date" id="email" name="dob" placeholder="Dob" value="<?php echo $row["dob"]?>" />
    </div>
</div>
<div class="group">
    <div class="col-1">
        <label for="email">Contact</label>
    </div>
    <div class="col-2">
        <input type="phone" id="email" name="contact" placeholder="contact" value="<?php echo $row["contact"]?>"/>
    </div>
</div>
   <?php
}
    }
        ?>


    <!-- Submit button -->
    <input type="submit" name="submit" class="submit" id="update" value="Update" />
</form>

   
   

    <!-- Submit button -->
    

    <div id="Message"></div>
<div id="Login"></div>
</body>
</html>
<?php
}
?>
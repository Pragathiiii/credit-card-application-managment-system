<?php
session_start();

//fetching input

$saemail = $_POST["saemail"];
$sapassword = $_POST["sapassword"];
$msg = "";
$status = "";

//check in table

try {


    $conn = new PDO("mysql:host=localhost;dbname=creditcard", "root", null);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //build sql statements

    $stmt = $conn->prepare("select * from subadmin where email=? and password=? ");

    $stmt->bindParam(1, $saemail);
    $stmt->bindParam(2, $sapassword);
    $stmt->execute();

    $c = $stmt->rowcount();

    if ($c == 1) { //store data in session and go to homepage
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["saemail"] = $saemail;
        $_SESSION["sapassword"] = $sapassword;


        header('location:subadmin/admintemplate/index.php');
    } else {
        $msg = "Invalid deatils";
        header("location:admintemplate/output.php?msg=$msg");
    }
} catch (Exception $e) {
    $msg = $e->getMessage() . "," . "loginFailed";
    header("location:admintemplate/output.php?msg=$msg");
}
?>
<html>

<body>
    <?php 
    // echo $msg;
     ?>
</body>

</html>
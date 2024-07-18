<?php
session_start();

//fetching input

$customeremail = $_POST["customeremail"];
$password = $_POST["password"];

$msg = "";
// $status="";

//check in table

try {


    $conn = new PDO("mysql:host=localhost;dbname=creditcard", "root", null);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //build sql statements

    $stmt = $conn->prepare("select * from application where email=? and password=? ");
    $stmt->bindParam(1, $customeremail);
    $stmt->bindParam(2, $password);

    $stmt->execute();

    $c = $stmt->rowcount();

    if ($c == 1) { //store data in session and go to homepage
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["email"] = $customeremail;
        $_SESSION["password"] = $password;
        $_SESSION["aadharno"] = $row["aadharno"];

        $stmt1 = $conn->prepare("select customercode from customer where aadharno=?");
        $stmt1->bindParam(1, $_SESSION["aadharno"]);

        $stmt1->execute();

        $d = $stmt1->rowcount();
        
        if ($d == 1) {
                //storing cc in session
                $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
        
            $_SESSION["customercode"] = $row1["customercode"];
           

            header('location:customer/admintemplate/customerhome.php');
        } else {
            // $msg = "login failed";
          
            header('location:admintemplate/applicationhome.php');
        }
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
    //  echo $msg; 
    ?>
</body>

</html>
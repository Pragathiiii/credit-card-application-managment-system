<?php
session_start();

//fetching input

$currentpassword=$_POST["currentpassword"];
$newpassword=$_POST["newpassword"];
$confirmpassword=$_POST["confirmpassword"];
$msg="";
if($_SESSION["password"]==$currentpassword)
{
    if($newpassword==$confirmpassword)
    {
                //building connection
        $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     try{
            //update and store new password in session
          $stmt=$conn->prepare("update admin set password=? where email=? ");

                $stmt->bindParam(1,$newpassword);
                $stmt->bindParam(2,$_SESSION["email"]);
                $stmt->execute();
                $c=$stmt->rowcount();
                if($c>0)
                {
                        //changing session password
                        $_SESSION["password"]=$newpassword;
                        $msg="Password updated successfully";
                        header("location:adminoutput.php?msg=$msg");

                }
                else
                {
                    $msg="password update failed";
                    header("location:adminoutput.php?msg=$msg");
                }
         }
                catch(exception $e)
                {
                    $msg="password update failed".$e->getMessage();
                }
       

    }
    else
    {
        $msg= "new password doesnt match confirm password";
        header("location:adminoutput.php?msg=$msg");
    }
}
else
{
    $msg= "Invalid current password";
    header("location:adminoutput.php?msg=$msg");
}

?>

<html>
    <head><title> change password</title></head>
    <body>
        <?php
        // echo $msg;
       
        ?>
</body>

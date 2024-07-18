<?php
session_start();

//fetching input

$currentpassword=$_POST["currentpassword"];
$newpassword=$_POST["newpassword"];
$confirmpassword=$_POST["confirmpassword"];
$msg="";
if($_SESSION["sapassword"]==$currentpassword)
{
    if($newpassword==$confirmpassword)
    {
                //building connection
        $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     try{
            //update and store new password in session
          $stmt=$conn->prepare("update subadmin set password=? where email=? ");

                $stmt->bindParam(1,$newpassword);
                $stmt->bindParam(2,$_SESSION["saemail"]);
                $stmt->execute();
                $c=$stmt->rowcount();
                if($c>0)
                {
                        //changing session password
                        $_SESSION["sapassword"]=$newpassword;

                        $msg="Password updated successfully";
                        header("location:subadminoutput.php? msg=$msg");

                }
                else
                {
                    $msg="password update failed";
                    header("location:subadminoutput.php?msg=$msg");
                }
         }
                catch(exception $e)
                {
                    $msg="password update failed".$e->getMessage();
                    header("location:subadminoutput.php?msg=$msg");
                }
       

    }
    else
    {
        // echo "new password doesnt match comfirm password";
        $msg ="new password doesnt match confirm password";
        header("location:subadminoutput.php?msg=$msg");

    }
}
else
{
    $msg= "Invalid current password";
    header("location:subadminoutput.php?msg=$msg");
}

?>

<html>
    <head><title> change password</title></head>
    <body>
        <?php
        // echo $msg;

        ?>
</body>

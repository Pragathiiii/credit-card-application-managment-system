<?php
session_start();

//fetching input

$email=$_POST["email"];
$password=$_POST["password"];
$msg="";
$status="";

//check in table

try{

    
$conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


//build sql statements

$stmt=$conn->prepare("select * from admin where email=? and password=?");
$stmt->bindParam(1,$email);
$stmt->bindParam(2,$password);
$stmt->execute();

$c=$stmt->rowcount();

if($c==1)
{//store data in session and go to homepage
  $row=$stmt->fetch(PDO::FETCH_ASSOC);
  $_SESSION["email"]=$email;
  $_SESSION["password"]=$password;
  
  
 header('location:admin/admintemplate/index.php');
}
else
{
    $msg="Invalid deatils";
    header("location:admintemplate/output.php?msg=$msg");
}
}

catch(Exception $e)
{
    $msg=$e->getMessage().","."loginFailed";
    header("location:admintemplate/output.php?msg=$msg");
}
?>
 <html>    
  <body>   
       <?php  echo $msg; ?>
     </body>
 </html>

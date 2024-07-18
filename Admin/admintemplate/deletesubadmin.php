<?php
$msg="";
$c=0;
$saemail=$_POST["saemail"];

try{

    //conncetion to database

    $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //building sql statements

    $stmt=$conn->prepare("delete from subadmin where email=?");
    $stmt->bindParam(1,$saemail);
    $stmt->execute();
    $c=$stmt->rowcount();
    if($c>0)
    {
         $msg= "deletion Successfull!";
         header("location:adminoutput.php?msg=$msg");

       
    }
    else
    {
        $msg="no data found";
        header("location:adminoutput.php?msg=$msg");
    }
}
catch(Exception $e)
{
    $msg=$e->getMessage();
    header("location:adminoutput.php?msg=$msg");
}
?>

<!DOCTYPE html>
<html lang="en">
<body>

    <?php
    //  echo $msg;
    ?>
    
</body>
</html>
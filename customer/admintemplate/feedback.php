<?php
session_start();
try
{
            
                //fetch input
            $desc=$_POST["desc"];
            $rate=$_POST["rate"];
            $fbdate=Date('Y/m/d h:i:sAs');
            

            $msg="";

          //connect to database
         $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //building sql statements
            $stmt=$conn->prepare("insert into feedback(fbdesc,rating,fbdate,customercode)value (?,?,?,?)");
            $stmt->bindParam(1,$desc);
            $stmt->bindParam(2,$rate);
            $stmt->bindParam(3,$fbdate);
            $stmt->bindParam(4,$_SESSION["customercode"]);
            $stmt->execute();
            $c = $stmt->rowcount();

            if($c>0)
            {
                $msg="rows created";
                header("location:customeroutput.php?msg=$msg");
            }
            else
            {
                $msg="rows creation failed";
                header("location:customeroutput.php?msg=$msg");
            }
}
catch (exception $e)
{
$msg=$e->getMessage();
header("location:customeroutput.php?msg=$msg");
}

?>
<html>
    <body>
    <?php  
    
    ?>
   
    </body>
</html>


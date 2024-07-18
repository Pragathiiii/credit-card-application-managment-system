<?php
try
{

                //fetch input
            $name=$_POST["sname"];
            $saemail=$_POST["saemail"];
            $sapassword=$_POST["sapassword"];
            $registrationdate=Date('Y/m/d h:i:sAs');
            $msg="";

          //connect to database
         $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //building sql statements
            $stmt=$conn->prepare("insert into subadmin (name,email,password,registrationdate)value (?,?,?,?)");
            $stmt->bindParam(1,$name);
            $stmt->bindParam(2,$saemail);
            $stmt->bindParam(3,$sapassword);
            $stmt->bindParam(4,$registrationdate);
            $stmt->execute();
            $c=$stmt->rowcount();

           
            if($c>0)
            {
                $msg="Subadmin Added";
                header("location:adminoutput.php?msg=$msg");
            }
            else
            {
                $msg="subadmin creation failed";
                header("location:adminoutput.php?msg=$msg");
            }
}
catch (exception $e)
{
$msg=$e->getMessage();
header("location:adminoutput.php?msg=$msg");
}

?>
<html>
    <body>
    <?php 
    //  echo $msg; 
     ?>
   
    </body>

</html>


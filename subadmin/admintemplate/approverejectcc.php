<?php
$appno=$_POST["appno"];
$aadharno=$_POST["aadharno"];
$status=$_POST["status"];
$remarks=$_POST["remarks"];
$maxlimit=$_POST["maxlimit"];
$approvedate=date('Y/m/d h:i:sAs');
$msg="";
$msg2="";

try
{

        //connect to database

        $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);

        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //update query to application table
            $stmt=$conn->prepare("update application set status=? ,remarks=? ,approveddate=? where appno=? and aadharno=?");
            $stmt->bindParam(1,$status);
            $stmt->bindParam(2,$remarks);
            $stmt->bindParam(3,$approvedate);
            $stmt->bindParam(4,$appno);
             $stmt->bindParam(5,$aadharno);
            $stmt->execute();
            $msg="Status Updated";
            //  header("location:updatemail.php?msg=$aadharno");
            header("location:subadminoutput.php?msg=$msg2");

            $c=$stmt->rowcount();
            if($c>0)
        {
            //insert into customer if $status='A' 
                if($status=='A')
                {       //insert query
                    $stmt=$conn->prepare("insert into customer (appno,maxlimit,approveddate,aadharno)value(?,?,?,?)");
                    $stmt->bindParam(1,$appno);
                    $stmt->bindParam(2,$maxlimit);  
                    $stmt->bindParam(3,$approvedate);  
                    $stmt->bindParam(4,$aadharno);  
                    $stmt->execute();
                    $c=$stmt->rowcount();
                     if($c>0)
                     {
                        $msg2="Inserted to customer table Customer Table ";
                        header("location:subadminoutput.php?msg=$msg2");
                     }
                     else
                     {
                        $msg2="Insertion failed";
                        header("location:subadminoutput.php?msg=$msg2");
                     }
                }

            $msg="Application updated";
            // header("location:subadminoutput.php?msg=$msg");
            header("location:updatemail.php?msg=$aadharno");
        }
        else
        {
            $msg="rows Updation failed";
            header("location:subadminoutput.php?msg=$msg");
        }
    
    
}
catch(Exception $e)
{
    $msg=$e->getMessage();
    header("location:subadminoutput.php?msg=$msg");
}

?>
<html>
    <body>
    <?php 
    //  echo $msg;
     ?>
   
    </body>
</html>
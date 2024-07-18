<?php
try
{

                //fetch input
            $aadharno=$_POST["aadharno"];
            $loanaccno=$_POST["loanaccno"];
            $bankname=$_POST["bankname"];
            $loanamt=$_POST["loanamt"];
            // $emiamt=$_POST["emiamt"];
            $paidemi=$_POST["paidemi"];
            $overdueemi=$_POST["overdueemi"];
            $delayedemi=$_POST["delayedemi"];
            $loandate=Date('Y/m/d h:i:sAs');
            $time=$_POST["time"];
            $intrest=$_POST["intrest"];
            $si=($loanamt*$time*$intrest)/100;
            $totalamt=$loanamt+$si;
            $months=$time*12;
            $emiamt=$totalamt/$months;
            $totalemi=$totalamt/$emiamt;
            $score=600;
            

            if($overdueemi==0)
            {
                $score+=100;
            }
            else
            {
              $score=$score-($overdueemi*10);
            }
            if( $delayedemi==0)
            {
                $score+=100;
            }
            else
            {
                    $score=$score-($delayedemi*5);
            }
          
            $msg="";

          //connect to database
         $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //building sql statements
            $stmt=$conn->prepare("insert into cibilloan(aadharno,loanaccno,bankname,loanamt,emiamt,paidemi,overdueemi,delayedemi,loandate,score,time,intrest,totalamt,totalemi)value (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$aadharno);
            $stmt->bindParam(2,$loanaccno);
            $stmt->bindParam(3,$bankname);
            $stmt->bindParam(4,$loanamt);
            $stmt->bindParam(5,$emiamt);
            $stmt->bindParam(6,$paidemi);
            $stmt->bindParam(7,$overdueemi);
            $stmt->bindParam(8,$delayedemi);
            $stmt->bindParam(9,$loandate);
            $stmt->bindParam(10,$score);
            $stmt->bindParam(11,$time);
            $stmt->bindParam(12,$intrest);
            $stmt->bindParam(13,$totalamt);
            $stmt->bindParam(14,$totalemi);
            
            $stmt->execute();
            $c=$stmt->rowcount();

            if($c>0)
            {
                $msg="Loan form created";

                header("location:subadminoutput.php?msg=$msg");
            }
            else
            {
                $msg="Loan Form creation failed";
                header("location:subadminoutput.php?msg=$msg");
            }
}
catch (exception $e)
{
$msg=$e->getMessage();
header("location:subadminoutput.php?msg=$msg");
}

?>
<html>
    <body>
    <?php  ?>
   
    </body>
</html>


<?php 
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


      $to=$_POST["emailid"];
      $conn=new PDO("mysql:host=localhost;dbname=Creditcard","root",null);
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $stmt=$conn->prepare("select password from application where email=? ");
      $stmt->bindParam(1,$to);
      $stmt->execute();
      $c=$stmt->rowCount();
      
      if($c==1)
      {
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
          $password=$row["password"];
          $mail=new PHPMailer(true);
          $mail->isSMTP();

          $mail->Host='smtp.gmail.com';
          $mail->Port=465;

          $mail->Password='rxrsfxkmfauhyuzc';  //smtp password
          $mail->SMTPSecure="ssl";
          $mail->SMTPAuth= true;

          //send info
          $mail->Username='pragathiishettyy@gmail.com';
          $mail-> setFrom('pragathiishettyy@gmail.com','Pragati');

          //add a recipient
          $mail->addAddress($to);

          //set email format to HTML
          $mail->Subject='Email from localhost';

          //mail body content
          $bodyContent="Forgot Password ";
          $bodyContent .=" Your Password is ".$password;
          $mail->Body =$bodyContent;

          //send  email
          if(!$mail->send())
          {
            echo 'Message could not be sent.Mailer Error: ' .$mail->ErrorInfo;
          }
          else{
            echo "<h3 style='margin-left:467px; margin-top:217px; background-color: #567d92; padding:24px; width:fit-content;color:white;border-radius:8px;' >"."Your Password has been sent to your Respective Email"."</h3><br><a href='customerloginform.php' style='text-decoration: none;'><h4  style='margin-left:467px;   background-color: white; width:fit-content;color:#567d92; padding:11px; border-radius:19px; border:2px solid #567d92'> Go back to Login page</h4></a>";
         

            // header("location:customerloginform.php");
             
          }
        }
      else
      {
        echo "<h3 style='margin-left:517px; margin-top:217px; background-color: #567d92; padding:24px; width:fit-content;color:white;border-radius:8px;' >"."⚠ No Such Email ID is registered with us."."</h3>";
 

      }
      ?>
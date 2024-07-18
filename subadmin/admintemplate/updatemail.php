<?php 
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



    $to="";
      $conn=new PDO("mysql:host=localhost;dbname=Creditcard","root",null);
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $stmt=$conn->prepare("select email from application where aadharno=? ");
      $stmt->bindParam(1,$_REQUEST["msg"]);
    //   $stmt->bindParam(1,$to);
      $stmt->execute();
      $c=$stmt->rowCount();
      
      if($c==1)
      {
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
          $to=$row["email"];
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
          $mail->Subject='Email from CredEz';

          //mail body content
          $bodyContent="Status Update Alert : ";
          $bodyContent .= " Your Application for Credit card from CredEz has been Updated. Please Login as Customer to Check your Status.
          ThankYou";
          $mail->Body =$bodyContent;

          //send  email
          if(!$mail->send())
          {
            echo 'Message could not be sent.Mailer Error: ' .$mail->ErrorInfo;
          }
          else{
            echo "<h3 style='margin-left:467px; margin-top:217px; background-color: #567d92; padding:24px; width:fit-content;color:white;border-radius:8px;' >"."Application has been updated and mail has been sent to respective customer"."</h3><br><a href='index.php' style='text-decoration: none;'><h4  style='margin-left:467px;   background-color: white; width:fit-content;color:#567d92; padding:11px; border-radius:19px; border:2px solid #567d92'> Go back</h4></a>";
          }
        }
      else
      {
        echo "no such emailid is is registered with us.";
      }
      ?>
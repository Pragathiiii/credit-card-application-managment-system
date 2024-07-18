<?php
session_start();

include('includes/header.php');
include('includes/navbar2.php');
$msg="";
$c=0;
$aadharimage="";
$panimage="";
$app_array=array();
try{

    //conncetion to database

    $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //building sql statements

    $stmt=$conn->prepare("select application.*,cibilloan.score,customer.maxlimit,customer.approveddate,customer.customercode
    from application 
    left join cibilloan on cibilloan.aadharno=application.aadharno left join customer on
     customer.aadharno=application.aadharno  where email=?");
      $stmt->bindParam(1, $_SESSION["email"]);

    $stmt->execute();
    $c=$stmt->rowcount();
    if($c>0)
    {
            //loop throught rows and push into array

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($app_array,$row);
        }
        $aadharimage="../../".$app_array[0]["aadhar"];
        $panimage="../../".$app_array[0]["pan"];

    }
    else
    {
        $msg="no data found";
        header("location:customeroutput.php?msg=$msg");
    }
}
catch(Exception $e)
{
    $msg=$e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Status</title>

    <style>
    .table{
          margin-top: 90px;
            padding:3px;
            background-color:aliceblue;
            /* width:10px; */
            height: 10px;
            margin-left: -90px;
           
        }
        tr,td,img{
        /* width:110px; */
        /* height: 110px; */
      border: 2px solid lightgray;
         font-weight: 700;
         color:grey;
        }
        thead,th{
            font-size: 18px;
            color:#1a75ff;
            font-weight: 900;
        }
        /* .linkk{
            background-color: #1a75ff; color: white; padding:4px; border: 2px solid grey;border-radius:5px;font-weight:700;
        }
        .linkk:hover{background-color: white;color: #1a75ff; font-weight: 900;text-decoration:none;} */
        h3{
            font-weight: 900;
            font-size: 29px;
            margin-left: 62px;
            margin-top: 22px;
        }
    </style>
</head>
<body>
    <h3 align="center">Status</h3>
    <?php
        if($c>0)
        {
    ?>
    <table border=1 align=center class="table">
        <thead> 
            <tr>
        <th>application no.</th>
     <td><?php echo $app_array[0]["appno"];?> </td>
         <th>Name</th>
        <td><?php echo $app_array[0]["name"];?> </td>
        </tr>
        <tr>
        <th>Phone</th>
        <td><?php echo $app_array[0]["phone"];?> </td>
         <th>Email</th>
        <td><?php echo $app_array[0]["email"];?> </td>
        </tr>
        <tr>
        <th>Password</th>
        <td><?php echo $app_array[0]["password"];?> </td>
             <th>AADHAR Number</th>
            <td><?php echo $app_array[0]["aadharno"];?> </td>
        </tr>
        <tr>
        <th>Pincode</th>
        <td><?php echo $app_array[0]["pincode"];?> </td>
         <th>State</th>
        <td><?php echo $app_array[0]["state"];?> </td>
        </tr>
        <tr>
        <th>Occupation</th>
        <td><?php echo $app_array[0]["occupation"];?> </td>
         <th>Income</th>
        <td><?php echo $app_array[0]["income"];?> </td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo $app_array[0]["status"];?> </td>
             <th>Remark</th>
            <td><?php echo $app_array[0]["remarks"];?> </td>
        </tr>
        <tr>
            <th>Credit Score</th>
            <td><?php echo $app_array[0]["score"];?> </td>
             <th>Max limit</th>
            <td><?php echo $app_array[0]["maxlimit"];?> </td>
        </tr>
        <tr>
            <th>customer code</th>
            <td><?php echo $app_array[0]["customercode"];?> </td>
             <th>Updated Date</th>
            <td><?php echo $app_array[0]["approveddate"];?> </td>
        </tr>




        <tr>
            <th>Application Date</th>
            <td><?php echo $app_array[0]["appdate"];?> </td>
        </tr>
        <tr>
            <th>Aadhar card</th>
            <td><img src=<?php echo $aadharimage;?> height="350" width="350"> </td>
         <th>PAN card</th>
        <td><img src=<?php echo $panimage;?> height="350" width="350"></td>
        </tr>
        <tr></tr>
        
        <tr><td><h4 style= font-weight:600;font-size:21px; >Status Notations:</td><td><br>1. A : Application Accepted <br>2. N :Application Pending<br>3. R : Application Rejected </h4></td>
        <td><h4 style= font-weight:600;font-size:21px;>Credit Score Range:</td><td><br> i. 660 to 739 - Fair <br>ii. 740 to 799 - Good <br>iii. 800 to above - Excellent <br>Applicants below 660 credit score are not Eligible </h4></td></tr>
        
        
    </tr>
    </thead>

    </table>
    <?php
        }
        // echo $msg;

        include('includes/scripts.php');
    include('includes/footer.php');
        ?>

        <br>
        <br>
      
</body>
</html>
<?php



include('includes/header.php');
include('includes/navbar.php');

        $msg="";
        $c=0;

        $customer_array=array();
            try
        {

                //conncetion to database

                $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //building sql statements

                $stmt=$conn->prepare("select cibilloan.score,customer.customercode,customer.appno,customer.approveddate,customer.maxlimit
                from customer inner join cibilloan on cibilloan.aadharno=customer.aadharno");
                $stmt->execute();
                $c=$stmt->rowcount();
                 if($c>0)
             {
            //loop throught rows and push into array

                 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                 array_push($customer_array,$row);
                }

             }
                 else
             {
                $msg="no data found";
                header("location:subadminoutput.php?msg=$msg");
             }
        }
        catch(Exception $e)
        {
            $msg=$e->getMessage();
            header("location:subadminoutput.php?msg=$msg");
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customers list</title>
    <style>

    .table
        {   margin-top: 90px;
            padding:3px;
            background-color:aliceblue;
            width:900px;
            height: 10px;
            margin-left: -190px;
           
        }
        tr,td{
        width:110px;
        height: 40px;
      border: 2px solid lightgray;
      font-weight: 700;
        }
        thead,th{
            font-size: 18px;
            color:#1a75ff;
            font-weight: 900;
        }
    
        h3{
            font-weight: 900;
            font-size: 29px;
            margin-left: 62px;
            margin-top: 32px;
        }
        </style>
</head>
<body>
    <h3 align="center">Customers list</h3>
    <?php
        if($c>0)
        {
    ?>
        <table border=1 align="center" class="table">
        <thead> 
        <th>Customer Code</th>
        <th>Application No</th>
        <th>Approved Date</th>
        <th>Maximum Limit</th>    
    </thead>
    <?php
    for($i=0;$i<count($customer_array);$i++)
    {
        echo "<tr>";
        echo "<td>".$customer_array[$i]["customercode"]."</td>";
        echo "<td>".$customer_array[$i]["appno"]."</td>";
        echo "<td>".$customer_array[$i]["approveddate"]."</td>";
        echo "<td>".$customer_array[$i]["maxlimit"]."</td>";
     echo "</tr>";
    }
    ?>

    </table>
    <?php
        }
        // echo $msg;
        include('includes/scripts.php');
include('includes/footer.php');

        ?>
    
</body>
</html>
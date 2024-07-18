<?php
$msg="";
$c=0;

include('includes/header.php');
include('includes/navbar.php');
$app_array=array();
try{

    //conncetion to database

    $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //building sql statements

    $stmt=$conn->prepare("select * from application");
    $stmt->execute();
    $c=$stmt->rowcount();
    if($c>0)
    {
            //loop throught rows and push into array

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($app_array,$row);
        }

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
<head>

    <title>application list</title>
    <style>
    .table{
          margin-top: 90px;
            padding:3px;
            background-color:aliceblue;
            width:10px;
            height: 10px;
            margin-left: -290px;
           
        }
        tr,td,img{
        width:110px;
        height: 110px;
      border: 2px solid lightgray;
         font-weight: 700;
        }
        thead,th{
            font-size: 18px;
            color:#1a75ff;
            font-weight: 900;
        }
        .linkk{
            font-weight: 900;
            font-size: 19px;
        }
        h3{
            font-weight: 900;
            font-size: 29px;
            margin-left: 62px;
            margin-top: 22px;
        }
    </style>
</head>
<body>

    <h3>Applications_List</h3>
    <?php
        if($c>0)
        {
    ?>
    <table border=1 class="table" >
        <thead> 
        <th>application no.</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Password</th>
        <th>Pincode</th>
        <th>State</th>
        <th>Occupation</th>
        <th>Income</th>
        <th>PAN card</th>
        <th>Aadhar card</th>
        <th>Status</th>
        <th>Remark</th>
        <th>Application Date</th>
        <th>AADHAR Number</th>
    
    </thead>
    <?php
    for($i=0;$i<count($app_array);$i++)
    {
        echo "<tr>";
        echo "<td>".$app_array[$i]["appno"]."</td>";
        echo "<td>".$app_array[$i]["name"]."</td>";
        echo "<td>".$app_array[$i]["phone"]."</td>";
        echo "<td>".$app_array[$i]["email"]."</td>";
        echo "<td>".$app_array[$i]["password"]."</td>";
        echo "<td>".$app_array[$i]["pincode"]."</td>";
        echo "<td>".$app_array[$i]["state"]."</td>";
        echo "<td>".$app_array[$i]["occupation"]."</td>";
        echo "<td>".$app_array[$i]["income"]."</td>";
        echo "<td><img src=../../".$app_array[$i]["pan"]." height=150 width=150></td>";
        echo "<td><img src=../../".$app_array[$i]["aadhar"]." height=150 width=150></td>";
        echo "<td>".$app_array[$i]["status"]."</td>";
        echo "<td>".$app_array[$i]["remarks"]."</td>";
        echo "<td>".$app_array[$i]["appdate"]."</td>";
        echo "<td>".$app_array[$i]["aadharno"]."</td>";
        // echo "<td>nhjkkjdes</td>";
    }

    include('includes/scripts.php');
    include('includes/footer.php');
    


    ?>

    </table>
    <?php
        }
        // echo $msg;
        ?>
    
</body>
</html>
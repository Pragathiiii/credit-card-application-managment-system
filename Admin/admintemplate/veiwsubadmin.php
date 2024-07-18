<?php
$msg="";
$c=0;
include('includes/header.php');
        include('includes/navbar.php');

$sub_array=array();
try{

    //conncetion to database

    $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //building sql statements

    $stmt=$conn->prepare("select * from subadmin");
    $stmt->execute();
    $c=$stmt->rowcount();
    if($c>0)
    {
            //loop throught rows and push into array

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($sub_array,$row);
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
    <title>Subadmin list</title>
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
    <h3 align="center">Sub-Admin list</h3>
    <?php
        if($c>0)
        {
    ?>
    <table border=1 align="center" class="table">
        <thead> 
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Registration Date</th>
    
    </thead>
    <?php
    for($i=0;$i<count($sub_array);$i++)
    {
        echo "<tr>";
        echo "<td>".$sub_array[$i]["name"]."</td>";
        echo "<td>".$sub_array[$i]["email"]."</td>";
        echo "<td>".$sub_array[$i]["password"]."</td>";
        echo "<td>".$sub_array[$i]["registrationdate"]."</td>";
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
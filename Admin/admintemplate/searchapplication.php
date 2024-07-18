<?php
$msg="";
$c=0;
$appno=$_POST["appno"];

include('includes/header.php');
include('includes/navbar.php');

$app_array=array();
try{

    //conncetion to database

    $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //building sql statements

    $stmt=$conn->prepare("select * from application where appno=?");
    $stmt->bindParam(1,$appno);
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
        $msg="No Data Found";
        // header("location:adminoutput.php?msg=$msg");
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

    .table
        { 
            width: auto;
            height: auto;
            margin-top: 80px;
            margin-left: 100px;
            padding:3px;
            background-color:aliceblue;
            width:400px;
         
        }
        tr,td,img{
       
      border: 2px solid lightgrey;
        }
        thead,th{
            font-size: 18px;
            color:#1a75ff;
            font-weight: 800;
            
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
    <h3>List of applications</h3>
    <?php
        if($c>0)
        {
    ?>
    <table border=1 class="table">
        <thead> 
            <tr>
        <th>application no.</th>
     <td><?php echo $app_array[0]["appno"];?> </td>
        </tr>
        <tr>
        <th>Name</th>
        <td><?php echo $app_array[0]["name"];?> </td>
        </tr>
        <tr>
        <th>Phone</th>
        <td><?php echo $app_array[0]["phone"];?> </td>
        </tr>
        <tr>
        <th>Email</th>
        <td><?php echo $app_array[0]["email"];?> </td>
        </tr>
        <tr>
        <th>Password</th>
        <td><?php echo $app_array[0]["password"];?> </td>
        </tr>
        <tr>
        <th>Pincode</th>
        <td><?php echo $app_array[0]["pincode"];?> </td>
        </tr>
        <tr>
        <th>State</th>
        <td><?php echo $app_array[0]["state"];?> </td>
        </tr>
        <tr>
        <th>Occupation</th>
        <td><?php echo $app_array[0]["occupation"];?> </td>
        </tr>
        <tr>
        <th>Income</th>
        <td><?php echo $app_array[0]["income"];?> </td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo $app_array[0]["status"];?> </td>
        </tr>
        <tr>
            <th>Remark</th>
            <td><?php echo $app_array[0]["remarks"];?> </td>
        </tr>
        <tr>
            <th>Application Date</th>
            <td><?php echo $app_array[0]["appdate"];?> </td>
        </tr>
        <tr>
            <th>AADHAR Number</th>
            <td><?php echo $app_array[0]["aadharno"];?> </td>
        </tr>
        <tr >
        <th>PAN card</th>
        <?php echo "<td><img src=../../".$app_array[0]["pan"]." height=150 width=150></td>";?>
        </tr>
        <tr>
        <th>Aadhar card</th>
        <?php echo "<td><img src=../../".$app_array[0]["aadhar"]." height=150 width=150></td>";?> 
       
        </tr>
    
    </thead>

    </table>
    <?php
        }
  
        
        echo "<h2 style='
        font-size: 31px;
        font-weight: 900;
        height: fit-content;
      
        margin: 240px;
        padding: 55px 55px 55px 55px;
      
        color: navy;'>".$msg."</h2>";

            
include('includes/scripts.php');
include('includes/footer.php');

?>
    
</body>

</html>
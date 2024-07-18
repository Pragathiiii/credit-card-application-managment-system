<?php

include('includes/header.php');
include('includes/navbar.php');

$appno=$_REQUEST["appno"];
$aadharno=$_REQUEST["aadharno"];
$msg="";
$cibil_array=array();
try{

    //conncetion to database

    $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //building sql statements

    $stmt=$conn->prepare("select * from cibilloan where aadharno=?");
    $stmt->bindParam(1,$aadharno);

    $stmt->execute();
    $c=$stmt->rowcount();
    if($c>0)
    {
            //loop throught rows and push into array

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($cibil_array,$row);
        }

    }
    else
    {
        $msg="no data found";
        // header("location:subadminoutput.php?msg=$msg");
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
    <title>CIBIL loan table</title>
    <style>
       
        .table1{
            margin-left:400px ;
            margin-top: -350px;
            display: block;
            height: 120px;
            width: 90px;
            border:none;
            color: #1a75ff;
            text-align: center;
            font-weight: 800;
            padding: 4px;
           
        }
        tr,td,th{
            border:2px solid grey;
            background-color: aliceblue;
        }
        thead{
            border-bottom: 3px solid grey;
        }
        .form{
            padding: 4px;
            border: 2px solid grey;
            background-color: powderblue;
        }
       
    .table
        {  
             margin-top: 60px;
            margin-left: 12px;
            padding:3px;
            background-color:aliceblue;
            border:2px solid grey;
            width: 4px;
            height: 1px;
            
        }
        th{
            color: #1a75ff;
        }
        h2{
            margin-left: 60px;
            display: block;
            color: #1a75ff;
            font-weight: 800;
        }
        .btn{
           background-color: #1a75ff;
           color: white;
        font-weight: 800; }
           .btn:hover{
            background-color: white;
            color: #1a75ff;
            font-weight: 800;
           }
     
        
     
    </style>
</head>
<body>
   <!-- <div > <h2>CIBIL_loan_Table</h2></div> -->
    <?php
        if($c>0)
        {
    ?>
    <table border=1 class="table">
        <thead> 
            <th>AADHAR Number</th>
        <th>Loan account number</th>
        <th>Bank Name</th>
        <th>Loan Amount</th>
        <th>EMI Amount</th>
        <th>Total EMI</th>
        <th>Paid EMI</th>
        <th>Overdue EMI</th>
        <th>Delayed EMI</th>
        <th>Time</th>
        <th>Rate of Intrest</th>
        <th>Total Amount to be Paid</th>
        <th>CIBIL Score</th>
        <th>Loan Date</th>
    
    </thead>
    <?php
    for($i=0;$i<count($cibil_array);$i++)
    {
    echo "<tr>";
    echo "<td>".$cibil_array[$i]["aadharno"]."</td>";
    echo "<td>".$cibil_array[$i]["loanaccno"]."</td>";
    echo "<td>".$cibil_array[$i]["bankname"]."</td>";
    echo "<td>".$cibil_array[$i]["loanamt"]."</td>";
    echo "<td>".$cibil_array[$i]["emiamt"]."</td>";
    echo "<td>".$cibil_array[$i]["totalemi"]."</td>";
    echo "<td>".$cibil_array[$i]["paidemi"]."</td>";
    echo "<td>".$cibil_array[$i]["overdueemi"]."</td>";
    echo "<td>".$cibil_array[$i]["delayedemi"]."</td>";
    echo "<td>".$cibil_array[$i]["time"]."</td>";
    echo "<td>".$cibil_array[$i]["intrest"]."</td>";
    echo "<td>".$cibil_array[$i]["totalamt"]."</td>";
    echo "<td>".$cibil_array[$i]["score"]."</td>";
    echo "<td>".$cibil_array[$i]["loandate"]."</td>";
    echo "</tr>";
    }
 ?>

 </table>

    <?php
        }
        echo "<h2 style='font-weight:800;color:blue;margin-top:12px;height:fit-content;'>".$msg."</h2>";
        
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>
          
          <table border=2 class="table1">
            
                  <form action="approverejectcc.php" method="POST" class="form">

            
                <tr><td><label>AADHAR NUMBER</label></td>
                   <td> <input type="number" name="aadharno" id="aadharno" value=<?php echo $aadharno;?>></td>
                <td><label>APPLICATION NUMBER</label></td>
                   <td> <input type="number" name="appno" id="appno" value=<?php echo $appno;?>></td>
                </tr>
                <tr><td><label>APPLICATION STATUS</label></td>
                <td>Accept Application<input type="radio" name="status" id="accept" value="A">
                    <br>Reject Application<input type="radio" name="status" id="reject" value="R">
                </td><td><label>Remarks</label></td>
                <td><textarea name="remarks" id="remarks" rows="6" col="15"></textarea></td></tr>
                <tr><td><label>Max limit</label></td>
                <td><input type="number" name="maxlimit" id="maxlimit"></td><td><button name="Submit" id="Submit" class="btn">Submit</td></tr>

                
            </form>
            </table>

              <div style= "margin-top:-160px; margin-left:280px;color:#1a75ff"> <h3 style="font-weight:900;">CIBIL loan Table</h3></div>
   
</body>
</html>
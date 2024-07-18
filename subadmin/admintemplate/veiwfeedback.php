<?php


include('includes/header.php');
include('includes/navbar.php');
        $msg="";
        $c=0;

        $feedback_array=array();
            try
        {

                //conncetion to database

                $conn=new PDO("mysql:host=localhost;dbname=creditcard","root",null);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //building sql statements

                $stmt=$conn->prepare("select * from feedback");
                $stmt->execute();
                $c=$stmt->rowcount();
                 if($c>0)
             {
            //loop throught rows and push into array

                 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                 array_push($feedback_array,$row);
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
    <title>Feebacks List</title>
    <style>

    .table
        {  
             margin-top: 80px;
             margin-left: -180px;
            padding:3px;
            background-color:aliceblue;
        
        }
        
        td,tr{ 
        padding: 3px;
      border: 2px solid lightgrey;
      font-weight: 700;
     
        }
        
        thead,th{
            font-size: 18px;
            color:#1a75ff;
            font-weight: 900;
            border: 2px solid lightgrey;
        }
       
        h2{
            font-weight: 900;
            font-size: 31px;
            margin-left: 62px;
            margin-top: 9px;
     } 
    
    </style>
</head>
<body>
   <div><h2>Feedbacks</h2></div>
    <?php
        if($c>0)
        {
    ?>
        <table border=1 align="center" class="table">
        <thead> 
        <th>Customer Code</th>
        <th>Feedback date</th>
        <th>Feedback description</th>
        <th>Ratings</th>    
        <th>feedback ID</th>    
    </thead>
    <?php
    for($i=0;$i<count($feedback_array);$i++)
    {
        echo "<tr>";
        echo "<td>".$feedback_array[$i]["customercode"]."</td>";
        echo "<td>".$feedback_array[$i]["fbdate"]."</td>";
        echo "<td>".$feedback_array[$i]["fbdesc"]."</td>";
        echo "<td>".$feedback_array[$i]["rating"]."</td>";
        echo "<td>".$feedback_array[$i]["feedbackid"]."</td>";
     echo "</tr>";
    }
   

    ?>

    </table>
    <?php
        }

        include('includes/scripts.php');
        include('includes/footer.php');
        
        echo $msg;
        ?>
    
</body>
</html>
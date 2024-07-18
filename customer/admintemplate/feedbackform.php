<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <?php
include('includes/header.php');
include('includes/navbar.php');
?>
    <style>
    .form{
            margin-left: 260px;
            margin-top:60px;   
        }
        label
        {
            font-weight: 800;
            font-size: 21px;
            padding:4px;
            color: #1a75ff;
        }
    
        #desc,#rate{
            border: #e6f0ff;
            border-radius: 9px;
            padding:8px;
            width:356px;
            text-align: center;
            color:#1a75ff;
            
        }

        .table
        {
            border: 1px solid #e8f0f2;
            padding:2px;
            margin-top: 5px;
            background-color:#e6f0ff;
            border: 2px solid grey;
        }
        tr,td,textarea{  border: 1px solid grey;

        }
        .sbutton{
            margin-top: 12px;
                width:340px;
                padding: 5px;
                font-weight: 700;
                border-radius: 7px;
                background-color:  #1a75ff;
                color:aliceblue;
        }
        .sbutton:hover{
            background-color:  whitesmoke;
            color: #1a75ff;
            font-weight: 800;
        }
   
</style>
</head>
<body>

    <h2 align="center" style="font-weight:bold; margin-left: 32px;">Feedback</h2>
    <div class="form">

        <table border=1 align="center" class="table">
            <form action="feedback.php" method="POST" align="center">
            <tr><td><label>Feedback</label></td></tr>  
                <tr><td><textarea name="desc" id="desc" cols="30" rows="10" placeholder="Give your Feedback"></textarea></td></tr>
                <tr><td><label>Ratings(1-5)</label></td></tr>   
                <tr><td><input type="number" max="5" min="0"  name="rate" id="rate" ></td></tr>
                <tr><td><button type="submit" name="submit" id="submit" class="sbutton" >Submit</td></tr>
                
            </form>
            
        </table>
    </div>
</body>
</html>
<?php  include('includes/scripts.php');
    include('includes/footer.php');
    ?>
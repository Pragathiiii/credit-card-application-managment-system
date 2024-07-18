<!DOCTYPE html>
<html lang="en">
<head>
<?php
include('includes/header.php');
include('includes/navbar.php');
?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delet6e sub-admin</title>
    <style>
    .form{
            margin-left: -390px;
            margin-top:210px;
            /* width:320px;  */
        }
        label
        {
            font-weight: 800;
            font-size: 21px;
            padding:2px;
            color: #1a75ff;
        }
    
       #saemail{
            border: 2px solid #e6f0ff;
            border-radius: 9px;
            padding:8px;
            width:386px;
            text-align: center;
            color:#1a75ff;
            
        }

        .table
        {
            border: 2px solid #e8f0f2;
            padding:3px;
            margin-top: 5px;
            background-color:#e6f0ff;
            border-radius: 6px;
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
            /* align:right; */
        }
    </style>
</head>
<body>
<h2 align="left" style="margin-bottom: 31px; margin-top:150px;margin-left:482px; font-weight: 800; background-color: white; color:#1a75ff;">SubAdmin Delete Form</h2>

    <div class="form">

        <form action="deletesubadmin.php" align="center" id="form1" method="POST">
            <table border=1 align="center" class="table">
             
                <tr><td><label>Enter Sub-Admin email</label></td></tr>
                <tr><td><input type="email" id="saemail" name="saemail"></td></tr>
                <tr><td><input type="submit" id="submit" name="submit" class="sbutton" onclick="check()" value="delete"></td></tr>
                
            </table>
        </form>
    </div>
</body>
<script>

    function check()
    {
        let text="u Sure to dlt?";
        if(confirm(text)==false)
        {
            return false;
            
        }
        // else
        // {

        //     document.getElementById("form1").submit();
        
        // }
       
        
    }

</script>
</html><?php
include('includes/scripts.php');
include('includes/footer.php');
?>
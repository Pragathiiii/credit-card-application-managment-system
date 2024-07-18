<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
    <style>
       .form{
            margin-left: 460px;
            margin-top:60px; 
        }
        label
        {
            font-weight: 800;
            font-size: 21px;
            padding:4px;
            color: #1a75ff;
        }
    
        #currentpassword,#newpassword,#confirmpassword{
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
            padding:3px;
            margin-top: 5px;
            background-color:#e6f0ff;
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
    <div class='form' >
        <h2 align="center" style="margin-bottom: 31px; font-weight: 800; background-color: white; color:#1a75ff;">Change Sub-Admin Password</h2>
    <form action="sachangepass.php" method="POST" align="center">
             <table border=1  align="center" class="table" >
                      <tr><td><label>Enter Current Password</label></td></tr>
                    <tr><td><input type="password" name="currentpassword" id="currentpassword" placeholder="Enter current Password"></td></tr>
                   <tr><td><label>Enter New Password</label></td></tr>
                    <tr><td><input type="password" name="newpassword" id="newpassword" placeholder="Enter your new Password"></td></tr>
                   <tr><td><label>Confirm Password</label></td></tr>
                    <tr><td><input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm your Password"></td></tr>


                    <tr><td><button name="Submit" id="Submit" class="sbutton" >SUBMIT</button></td></tr>
                    <tr><td><label ></label></td></tr>
                    </table>
        </form>
        </div>

    
</body>
</html>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
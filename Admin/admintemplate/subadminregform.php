
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
    <title>subadmin registration</title>
    <script>  
function validateform(){  
    var sname=document.myform.sname.value;  
    var password=document.myform.sapassword.value;  
    var cpassword=document.myform.cpassword.value;  
    // let text="Sure?";
  
if (sname==null || sname==""){  
  alert("Name can't be blank");  
  return false;  
}else if(password.length<6 && cpassword.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }  else if(document.getElementById('sapassword').value != document.getElementById('cpassword').value)
  {
    alert("Donot match");
    return false;
  }


}
</script> 
    <style>
    .form{
            margin-left: 460px;
            margin-top:60px; 
        }
        label
        {
            font-weight: 800;
            font-size: 21px;
            /* padding:2px; */
            color: #1a75ff;
        }
    
        #sapassword,#cpassword,#saemail,#sname{
            border: 2px solid #e6f0ff;
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
    <div class="form">

        <form action="subadminreg.php" method="POST" align="center" onsubmit="return validateform()" name="myform">
            <h2 align="center" style="margin-bottom: 31px; font-weight: 800; background-color: white; color:#1a75ff;">Sub-admin regististration Form</h2>
            <table border=1  align="center" class="table">
                <tr><td><label>Subadmin Name</label></td></tr>
                <tr><td><input type="text" name=sname id=sname placeholder="subadmin name"></td></tr>
             <tr><td><label>E-mail</label></td></tr>
             <tr> <td><input type="email" name="saemail" id="saemail" placeholder="Enter Email">  </td></tr>

                   <tr><td><label>Enter password</label></td></tr>
                    <tr><td><input type="password" name="sapassword" id="sapassword" placeholder="Enter your Password"></td></tr>
                   <tr><td><label>confirm password</label></td></tr>
                    <tr><td><input type="password" name="cpassword" id="cpassword" placeholder="confirm Password"></td></tr>
                    <tr><td><button name="Submit" id="Submit" class="sbutton">submit</button></td></tr>
                    </table>
        </form>
        
    
    </div>
</body>
</html>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
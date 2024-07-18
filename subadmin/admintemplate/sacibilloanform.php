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
    <title>cibil loan form</title>
    <style>
        p,h7{
            display:inline;
        }
        h7{
            background-color:#1a75ff;
            color:white;
            padding: 4px;
            border: 2px solid grey;
            font-weight: 600;
            border-radius: 7px;
            
        }
        h7:hover{
            color:#1a75ff;
            background-color: white;
            cursor: pointer;
        }
        h2{
            font-weight: 800;
            color: #1a75ff;
        }
        .table
        {
            border: 4px solid grey;
            padding:2px;
            margin-top: 5px;
            margin-left:180px;
            background-color:#e6f0ff;
            width: 800px;
           
        }
        .sbutton{
            margin-top: 12px;
                width:140px;
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
        tr,td{
            color:#1a75ff;
            padding:8px;
            border:2px solid grey;

        }
        label{
            font-weight: 800;
            padding: 1px;
            font-size: 19px;
        }
        input,select{
            padding: 9px;
        }
        
    </style>
</head>
<body>
    <form action="sacibilloan.php" method="POST" enctype="multipart/form-data">
                 <h2 align="center">CIBIL loan Form</h2>
             <table border='1'  align="center" class="table">

                <tr><td><label>AADHAR No</label>  </td>
                   <td><input type="text" name="aadharno" id="aadharno" placeholder="AADHAR No"></tr>  </td>

                <tr><td><label>Loan Account No</label></td>
                    <td><input type="text" name="loanaccno" id="loanaccno" placeholder="Loan account No" size="6" maxlength="6" style ="width:206px;">  </td></tr>

                  

                   <tr><td><label>Bank Name</label></td>
                    <td><select name="bankname" id="bankname" >
                        <option value="">Select your Bank</option>
                   
                    <option value="sbi">State bank of India</option>
                    <option value="iob">Indian Overseas Bank</option>
                    <option value="canara">Canara Bank</option>
                    <option value="karnataka">Karnataka Bank</option>
                    <option value="rbi">Reserve Bank of India</option>
                    <option value="hdfc">HDFC</option>
                   </option>
                    </select>
                    </tr>
                    <tr><td><label>Loan Amount</label></td>
                    <td><input type="number" name="loanamt" id="loanamt" placeholder="Loan Amount"></td></tr>


            
<!-- 
                <tr><td><label>EMI amount</label></td>
               <td><input type="number" name="emiamt" id="emiamt" placeholder="EMI amount"></td></tr> -->
               <tr><td><label>Time period</label></td>
               <td><input type="number" name="time" id="time" placeholder="time period(year)"></td></tr>
                <tr><td><label>Rate of intrest</label></td>
                <td><input type="number" name="intrest" id="intrest" placeholder="intrest(percentage)"></td></tr>
                <tr><td><h7 name="enter" id="enter" onclick="emi()" >Calculate Total EMI</h7></td></tr>
                <script>
                            function emi()
                            {
                            var loanamt=document.getElementById("loanamt").value;
                            var time=document.getElementById("time").value;
                             var intrest=document.getElementById("intrest").value;
                             var si=(loanamt*time*intrest)/100;
                             var totalamt=+loanamt+ +si;
                             var months=time*12;
                             var emiamt= totalamt/ months;
                             var totalemii=totalamt/emiamt;
                             document.getElementById("totalemi").value = totalemii;
                            }
                            </script>
                
                
                <tr><td><label ><p>Total EMI</p></label></td>
                <td><input type="number" name="totalemi" id="totalemi" placeholder="Total EMI" readonly></td></tr>

                
                <tr><td><label>Paid EMI</label></td>
                <td><input type="number" name="paidemi" id="paidemi" placeholder="Paid EMI"></td></tr>
                <tr><td><label>Overdue EMI</label></td>
                <td><input type="number" name="overdueemi" id="overdueemi" placeholder="OverDue EMI"></td></tr>
                <tr><td><label>Delayed EMI</label></td>
                <td><input type="number" name="delayedemi" id="delayedemi" placeholder="Delayed EMI"></td></tr>
                
                
               

                <tr><td><button name="Submit" id="Submit" class="sbutton">Submit</td></tr>
              


                
               
            </table>
        </form>

    
</body>
</html>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
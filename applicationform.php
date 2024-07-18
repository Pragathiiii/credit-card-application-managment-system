<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include("home_link.php");
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register here</title>
</head>
<body>
<?php
    include("home_header.php");
    ?>
    
    <form action="application.php" method="POST" enctype="multipart/form-data">
                 <h2 align="center" >Registration Form</h2>
             <table border=1  align="center">

                <tr><td><label>Name</label>  </td></tr>
                  <tr>  <td><input type="text" name="uname" id="uname" placeholder="Enter your Name"></tr>  </td>

                <tr><td><label>Mobile Number</label></td></tr>
                  <tr>  <td><input type="tel" name="phone" id="phone" placeholder="Enter your Phone Number">  </td></tr>

                    <tr><td><label>E-mail</label></td></tr>
                   <tr> <td><input type="email" name="email" id="email" placeholder="Enter your Email">  </td></tr>

                   <tr><td><label>Enter password</label></td></tr>
                    <tr><td><input type="password" name="password" id="password" placeholder="Enter your Password"></td></tr>

                    <tr><td><label>Confirm password</label></td></tr>
                   <tr> <td><input type="password" name="cpassword" id="cpassword" placeholder="Confirm your Password"></td></tr>

                   <tr><td><label>Pincode</label></td></tr>
                    <tr><td><input type="number" name="pincode" id="pincode" placeholder="PINCODE"></td></tr>


                   <tr><td><label>State</label></td></tr>
                  <tr>  <td><select name="state" id="state" >
                        <option value="">Select your State</option>
                   
                    <option value="Andrapradesh">Andra Pradesh</option>
                    <option value="Arunachalpradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachalpradesh">Himachal Pradesh</option>
                    <option value="jammukashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="kerela">kerela</option>
                    <option value="Madhyapradesh">Madhya pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkhim">Sikkhim</option>
                    <option value="TamilNadu">TamilNadu</option>
                    <option value="Telengana">Telengana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="UttarPradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="WestBengal">West Bengal</option>
                    </select>
</tr>

                <tr><td><label>Occupation</label></td></tr>
                <tr> <td><select name="occupation" id="occupation">
                <option value="">Select your Occupation type</option>
                <option value="student">Student</option>
                        <option value="bussiness">Bussiness</option>
                        <option value="government">Government servent</option>
                        <option value="private">private sector</option>
                        <option value="freelancer">freelancer</option>
                        <option value="other">other</option>
                </select>
            </td>
                </tr>

                <tr><td><label>Enter your Annual income</label></td></tr>
                <tr><td><input type="number" name="income" id="income" placeholder="your income"></td></tr>


                <tr><td><label>Upload your PAN Card</label></td></tr>
                <tr><td><input type="file" name="pan" id="pan" ></td></tr>

                <tr><td><label>Upload your AADHAR Card</label></td></tr>
                <tr><td><input type="file" name="aadhar" id="aadhar" ></td></tr>

                <tr><td><label> AADHAR number</label></td></tr>
                <tr><td><input type="number" name="aadharno" id="aadharno" ></td></tr>

                <tr><td><button name="Submit" id="Submit">Submit</td></tr>



                
               
            </table>
        </form>

        
 
</body>
</html>
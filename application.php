<?php
//fetch input
$name = $_POST["uname"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$pincode = $_POST["pincode"];
$state = $_POST["state"];
$occupation = $_POST["occupation"];
$income = $_POST["income"];
$aadharno = $_POST["aadharno"];
$applicationdate = Date('Y/m/d h:i:sAs');

$msg = "";
$status = "";

try {
    if (isset($_FILES["pan"]["type"])) {
        $validextensions = array("jpeg", "jpg", "png");
        //split file,extension and store into $temporary
        $temporary = explode(".", $_FILES["pan"]["name"]);
        //get file extension from $temporary variable
        $file_extension = end($temporary);
        //check the mine type provided by the browser
        if ((($_FILES["pan"]["type"] == "image/png")
                || ($_FILES["pan"]["type"] == "image/jpg")
                || ($_FILES["pan"]["type"] == "image/jpeg"))
            && ($_FILES["pan"]["size"] < 5000000000)
            && in_array($file_extension, $validextensions)
        ) {
            //if file was not upload correctly or partially uploaded,rreturns 0 if valid
            if ($_FILES["pan"]["error"] > 0)
                $msg = $_FILES["pan"]["error"];
            //check if file is already uploaded
            else if (file_exists("photos/" . $_FILES["pan"]["name"])) {
                $msg = "this file already exists.";
                header("location:output2.php?msg=$msg");
            }
                
            else {
                $sourcePath = $_FILES['pan']['tmp_name'];
                $targetPath = "photos/" . $_FILES['pan']['name'];
                move_uploaded_file($sourcePath, $targetPath);
                $pan = $targetPath;
                $status = "ok";
            }
        } else {
            $msg = "invalid file size or type";
            header("location:output2.php?msg=$msg");
        }
    } else {
        $msg = "please select file";
        header("location:output2.php?msg=$msg");
    }
    if ($status == "ok") {
        if (isset($_FILES["aadhar"]["type"])) {
            $validextensions = array("jpeg", "jpg", "png");
            //split file,extension and store into $temporary
            $temporary = explode(".", $_FILES["aadhar"]["name"]);
            //get file extension from $temporary variable
            $file_extension = end($temporary);
            //check the mine type provided by the browser
            if ((($_FILES["aadhar"]["type"] == "image/png")
                    || ($_FILES["aadhar"]["type"] == "image/jpg")
                    || ($_FILES["aadhar"]["type"] == "image/jpeg"))
                && ($_FILES["aadhar"]["size"] < 5000000000)
                && in_array($file_extension, $validextensions)
            ) {
                //if file was not upload correctly or partially uploaded,rreturns 0 if valid
                if ($_FILES["aadhar"]["error"] > 0)
                    $msg = $_FILES["aadhar"]["error"];
                //check if file is already uploaded
                else if (file_exists("photos/" . $_FILES["aadhar"]["name"])) {
                    $msg = "this file already exists.";
                    header("location:output2.php?msg=$msg");
                }
                else {
                    $sourcePath = $_FILES['aadhar']['tmp_name'];
                    $targetPath = "photos/" . $_FILES['aadhar']['name'];
                    move_uploaded_file($sourcePath, $targetPath);
                    $aadhar = $targetPath;
                    $status = "ok";
                }
            } else {
                $msg = "invalid file size or type";
                header("location:output2.php?msg=$msg");
            }
        } else {
            $msg = "please select aadhar file";
            header("location:output2.php?msg=$msg");
        }

        //connect to database

        $conn = new PDO("mysql:host=localhost;dbname=creditcard", "root", null);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //build sql statements

        $stmt = $conn->prepare("insert into application (name,phone,email,password,pincode,state,occupation,income,pan,aadhar,appdate,aadharno,status)value (?,?,?,?,?,?,?,?,?,?,?,?,'New')");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $phone);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $password);
        $stmt->bindParam(5, $pincode);
        $stmt->bindParam(6, $state);
        $stmt->bindParam(7, $occupation);
        $stmt->bindParam(8, $income);
        $stmt->bindParam(9, $pan);
        $stmt->bindParam(10, $aadhar);
        $stmt->bindParam(11, $applicationdate);
        $stmt->bindParam(12, $aadharno);
        $stmt->execute();
        $msg = " application added";

        $c = $stmt->rowcount();

        if ($c > 0) {
        $msg = "Applied Successfully";
        
            header("location:output2.php?msg=$msg");
        } else {
            $msg = "Application failed";
            header("location:output2.php?msg=$msg");
        }
    } else {
        $mg = "registration failed";
        header("location:output2.php?msg=$msg");
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    header("location:output2.php?msg=$msg");
}

?>
<html>

<body>
    <?php
    //  echo $msg;
     ?>

</body>

</html>
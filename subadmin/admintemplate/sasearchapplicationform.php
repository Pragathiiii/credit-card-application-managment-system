<?php
// include('admintemplate/includes/header.php');
include('admintemplate/includes/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search application</title>
</head>
<body>
    <form action="sasearchapplication.php" align="center" method="POST">
        <table border=1 align="center">
          <label><h2>Search Here</h2></label>
          <tr><td><label>Enter Application Number</label></td>
          <td><input type="number" id="appno" name="appno"></td></tr>
          <tr><td><input type="submit" id="submit" name="submit"></td></tr>

        </table>
    </form>
</body>
</html>


<?php
include('admintemplate/includes/scripts.php');
include('admintemplate/includes/footer.php');
?>
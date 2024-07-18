<html>
<body>
    <title>subadmin output page</title>
    <style>
    .msg{
            margin-left: 430px;
            font-size: 31px;
            font-weight: 900;
            height: fit-content;
            border: 2px solid navy;
            margin-top: 240px;
            padding: 55px 55px 55px 55px;
            background-color: #0066cc;
            color: white;
             }
             </style>
</body>
    
    <?php
include('includes/header.php');
include('includes/navbar.php');
?>
<?php
$msg=$_REQUEST["msg"];
echo "<h2 class='msg'>".$msg."</h2>";
?>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
</html>
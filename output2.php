<html>
    <style>
       .msg{
            margin-left: 460px;
            font-size: -12px;
            width: 390px;
            /* font-weight: 800; */
            /* height: fit-content; */
            border: none;
            border-radius: 8px;
            background-color: (9,9,9,0.8);
            margin-top: 190px;
            margin-bottom: 500px;
            padding: 35px ;
            background-color:#567d92;
            color: white;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
             }
    </style>
<body>
    <title> output page</title>
</body>
    
    <?php
include('home_header.php');
include('home_link.php');

// include('includes/navbar2.php');
?>
<?php
$msg =$_REQUEST["msg"];

echo "<h3 class='msg'>".$msg."!<h3>";
?>
<?php

include('home_footer2.php');
?>
</html>
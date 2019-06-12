<?php
include ('../../include/db.php');
if (isset($_POST['submit'])){
    $name=mysqli_real_escape_string($connection,$_POST['name']);
    $sql="INSERT INTO `brand`(`name`) VALUES ('$name')";
    if ($result=mysqli_query($connection,$sql)){
        header("Location: ../../add_brand.php?msg=1");
    }
}



?>
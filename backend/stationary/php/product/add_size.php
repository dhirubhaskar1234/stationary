<?php
include ('../../include/db.php');
if (isset($_POST['submit'])){
    $name=trim(mysqli_real_escape_string($connection,$_POST['name']));
    $sql="INSERT INTO `size`(`name`) VALUES ('$name')";
    if ($result=mysqli_query($connection,$sql)){
        header("Location: ../../add_size.php?msg=1");
    }
}



?>
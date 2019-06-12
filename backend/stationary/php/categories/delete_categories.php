<?php
include("../../include/db.php");
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM `categories` WHERE `id`=$id";
    if($result=mysqli_query($connection,$sql)){
        header("location: ../../add_sub_categories.php?msg=3");
    }

}
?>
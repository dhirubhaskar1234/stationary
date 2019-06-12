<?php
include("../../include/db.php");
if (isset($_POST['submit'])){
    $main_cat=$_POST['main_cat'];
    $main_cat_id=$_POST['main_cat_id'];
    $sql="UPDATE `categories` SET `cat_name`='$main_cat' WHERE `id`=$main_cat_id";
    if($result=mysqli_query($connection,$sql)){
        header("Location: ../../add_categories.php?msg=2&id=$main_cat_id");
    }

}
?>
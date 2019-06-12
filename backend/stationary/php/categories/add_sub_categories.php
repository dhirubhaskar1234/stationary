<?php
include("../../include/db.php");
if (isset($_POST['submit'])){
    $sub_cat=$_POST['sub_cat'];
    $main_cat_id=$_POST['main_cat_id'];
    $sql="INSERT INTO `categories`(`cat_name`, `parrent_id`, `sub_cat_id`) VALUES ('$sub_cat',2,'$main_cat_id')";
    if($result=mysqli_query($connection,$sql)){
        header("Location: ../../add_sub_categories.php?msg=1&id=$main_cat_id");
    }

}
?>
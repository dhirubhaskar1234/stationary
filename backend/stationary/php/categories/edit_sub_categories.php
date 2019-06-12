<?php
include("../../include/db.php");
if (isset($_POST['submit'])){
    $sub_cat=$_POST['sub_cat'];
    $sub_cat_id=$_POST['sub_cat_id'];
    $sql_id="SELECT * FROM `categories` WHERE `id`=$sub_cat_id";

    $result_id=mysqli_query($connection,$sql_id);
    $row_id=mysqli_fetch_assoc($result_id);
    $id=$row_id['sub_cat_id'];

    $sql="UPDATE `categories` SET `cat_name`='$sub_cat' WHERE `id`=$sub_cat_id";
    if($result=mysqli_query($connection,$sql)){
        header("Location: ../../add_sub_categories.php?msg=2&id=$id");
    }

}
?>
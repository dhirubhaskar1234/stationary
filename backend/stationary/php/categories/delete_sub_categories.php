<?php
include("../../include/db.php");
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $sql_id="SELECT * FROM `categories` WHERE `id`=$id";

    $result_id=mysqli_query($connection,$sql_id);
    $row_id=mysqli_fetch_assoc($result_id);
    $id_main=$row_id['sub_cat_id'];
    $sql="DELETE FROM `categories` WHERE `id`=$id";
    if($result=mysqli_query($connection,$sql)){
        header("location: ../../add_sub_categories.php?msg=3&id=$id_main");
    }

}
?>
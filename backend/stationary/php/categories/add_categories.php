<?php
    include("../../include/db.php");
    if (isset($_POST['submit'])){
        $main_cat=$_POST['main_cat'];
        $sql="INSERT INTO `categories`(`cat_name`, `parrent_id`, `sub_cat_id`) VALUES ('$main_cat',1,0)";
        if($result=mysqli_query($connection,$sql)){
            header("Location: ../../add_categories.php?msg=1");
        }

    }
?>
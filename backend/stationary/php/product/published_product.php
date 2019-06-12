<?php
include("../../include/db.php");
if (isset($_GET['id'], $_GET['status'])) {
    $id=$_GET['id'];
    $status=$_GET['status'];
    if ($status=='draft'){
        $sql="UPDATE `products` SET `active`=1 WHERE `id`=$id";
        if ($result=mysqli_query($connection,$sql)){
            header("location: ../../view_product.php");
        }
    }elseif ($status=='published'){
        $sql="UPDATE `products` SET `active`=0 WHERE `id`=$id";
        if ($result=mysqli_query($connection,$sql)){
            header("location: ../../view_product.php");
        }
    }

}



?>
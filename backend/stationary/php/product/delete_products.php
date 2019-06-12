<?php
include("../../include/db.php");
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT * FROM `products` WHERE `id`=$id";
        if ($result=mysqli_query($connection,$sql)){
            $row=mysqli_fetch_assoc($result);
            $name=$row['image'];
            $path_a="../../uploads/$name";
            $path_b="../../product_image/$name";
            if( file_exists($path_a)){

                unlink($path_a);
            }
            if( file_exists($path_b)){

                unlink($path_b);
            }
        }
        $sql_image="SELECT * FROM `images` WHERE `product_id`=$id";
        if ($result_image=mysqli_query($connection,$sql_image)){
            while ($row_image=mysqli_fetch_assoc($result_image)){
                $name=$row_image['name'];
                $path_a="../../uploads/$name";
                $path_b="../../product_image/$name";
                if( file_exists($path_a)){

                    unlink($path_a);
                }
                if( file_exists($path_b)){

                    unlink($path_b);
                }

            }
        }
        $sql_delete="DELETE FROM `products` WHERE `id`=$id";
        if ($result_delete=mysqli_query($connection,$sql_delete)){
            header("Location: ../../view_product.php?msg=5");
        }


    }
?>
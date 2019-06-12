<?php
include("../../include/db.php");
function mysql_entities_fix_string($string){
    return htmlentities(mysql_fix_string($string));
}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc())
        $string = stripslashes($string);
    return $string;
}
function clean($variable)
{
    global $connection;
    $variable = mysqli_real_escape_string($connection,mysql_entities_fix_string($variable));
    return $variable;
}
if(isset($_POST['submit'])){
    $id=clean($_POST['id']);
    $product_name=clean($_POST['product_name']);
    $product_code=clean($_POST['product_code']);
    $product_description=mysqli_real_escape_string($connection,$_POST['product_description']);
    $img=clean($_FILES['img']);
    $gst=clean($_POST['gst']);
    $min_order=clean($_POST['min_order']);
    $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product_name)));
    $sql_update="UPDATE `products` SET `product_name`='$product_name',`product_code`='$product_code',`product_description`='$product_description',`slug`='$url',`gst`='$gst',`min_order`='$min_order' WHERE `id`=$id";
    if ($result_update=mysqli_query($connection,$sql_update)){

    }
    if (isset($_FILES['img'])) {
        $images = $_FILES['img'];
        if ($images["type"] == 'image/jpg' || $images["type"] == 'image/JPG' || $images["type"] == 'image/JPEG' || $images["type"] == 'image/jpeg' || $images["type"] == 'image/png') {
            $image_name = uniqid() . date('now') . $images["name"];
            $bannerpath="../../product_image/".$image_name;
            //echo "<br>".$bannerpath."<br>";
            //echo "<br>".$images["tmp_name"][$i]."<br>";
            move_uploaded_file($images["tmp_name"],$bannerpath);
            include_once("ak_php_img_lib_1.0.php");
            $thumb_path = "../../uploads/".$image_name;
            $wmax = 500;
            $hmax = 500;
            $ext=null;
            ak_img_resize($bannerpath,$thumb_path, $wmax, $hmax, $ext);
            $sql_image="UPDATE `products` SET `image`='$image_name' WHERE `id`=$id";
            if ($result_image=mysqli_query($connection,$sql_image)){

            }

        }else{
            header("location: ../../edit_products.php?msg=2&id=$id");
        }

    }
    header("Location: ../../view_product.php?msg=1");
}



?>
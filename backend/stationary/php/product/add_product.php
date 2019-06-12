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
if (isset($_POST['submit'])){
    $product_name=clean($_POST['product_name']);
    $product_code=clean($_POST['product_code']);
    $main_cat=clean($_POST['main_cat']);
    $sub_cat=clean($_POST['sub_cat']);
    $product_description=mysqli_real_escape_string($connection,$_POST['product_description']);
    $url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product_name)));
    $size_name=$_POST['size_name'];
    $size_stock=$_POST['size_stock'];
    $size_price=$_POST['size_price'];
    $size_discount=$_POST['size_discount'];
    $brand=$_POST['brand'];
    $gst=clean($_POST['gst']);
    $min_order=clean($_POST['min_order']);

    $sql_product_insert="INSERT INTO `products`(`product_name`, `product_code`, `product_description`, `main_cat`, `sub_cat`, `slug`,`brand`,`min_order`,`gst`) VALUES ('$product_name','$product_code','$product_description','$main_cat','$sub_cat','$url','$brand','$min_order','$gst')";
    if($result_product_insert=mysqli_query($connection,$sql_product_insert)){
        $insert_id=mysqli_insert_id($connection);
        if (isset($_FILES['img'])) {
            $images = $_FILES['img'];
            $fileCount = count($images["name"]);
            $main_image= null;
            for ($i = 0; $i < $fileCount; $i++) {
                // echo $images["type"][$i];

                if ($images["type"][$i] == 'image/jpg' || $images["type"][$i] == 'image/JPG' || $images["type"][$i] == 'image/JPEG' || $images["type"][$i] == 'image/jpeg' || $images["type"][$i] == 'image/png') {
                    $image_name = uniqid().date('now').$images["name"][$i];
                    // $image = $images["tmp_name"][$i];
                    $bannerpath="../../product_image/".$image_name;
                    //echo "<br>".$bannerpath."<br>";
                    //echo "<br>".$images["tmp_name"][$i]."<br>";
                    move_uploaded_file($images["tmp_name"][$i],$bannerpath);
                    include_once("ak_php_img_lib_1.0.php");
                    $thumb_path = "../../uploads/".$image_name;
                    $wmax = 500;
                    $hmax = 500;
                    $ext=null;
                    ak_img_resize($bannerpath,$thumb_path, $wmax, $hmax, $ext);
                    if ($i==0) {
                        $main_image= $image_name;
                    }


                    $sql = "INSERT INTO `images`(`product_id`, `name`) VALUES ('$insert_id','$image_name')";
                    $query_add_product_image=mysqli_query($connection,$sql);
                    if ($query_add_product_image) {
                        echo "product image inserted";
                    }else{
                        echo "product image not inserted";
                    }
                }else{
                    $sql_delete="DELETE FROM `products` WHERE `id`=$insert_id";
                    if ($result_delete=mysqli_query($connection,$sql_delete)) {
                        header("Location: ../../add_product.php?msg=3");
                    }
                }
            }

            $sql_product_image="UPDATE `products` SET `image`='$main_image' WHERE `id`=$insert_id";
            $query_add_product_image=mysqli_query($connection,$sql_product_image);
        }
            if(!empty($size_name) || !empty($size_stock) || !empty($size_price) || !empty($size_discount)){

               $count_size=count($size_name);


                   for ($i = 0; $i < $count_size; $i++) {
                       //print_r($size_price[$i]);
                       $main_price[$i] = $size_price[$i] - $size_discount[$i];
                       //print_r($main_price);


                       $int = (int)$main_price[$i];

                       $sql_stock = "INSERT INTO `stock`(`product_id`, `size_id`, `stock`, `price`, `discount_price`, `main_price`) VALUES ('$insert_id','$size_name[$i]','$size_stock[$i]','$size_price[$i]','$size_discount[$i]','$int')";
                       if ($result_stock = mysqli_query($connection, $sql_stock)) {
                           header("Location: ../../add_product.php?msg=1");
                       }
                   }
            }
    }
    
}






?>
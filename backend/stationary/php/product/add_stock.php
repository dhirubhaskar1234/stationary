<?php
    include("../../include/db.php");
    $id=$_POST['id'];
    $size_name=$_POST['size_name'];
    $size_stock=$_POST['size_stock'];
    $size_price=$_POST['size_price'];
    $size_discount=$_POST['size_discount'];
    if(!empty($size_name) || !empty($size_stock) || !empty($size_price) || !empty($size_discount)){
        $count_size=count($size_name);
        for ($i = 0; $i < $count_size; $i++) {
            $main_price[$i] = $size_price[$i] - $size_discount[$i];
            $int = (int)$main_price[$i];
            $sql_stock = "INSERT INTO `stock`(`product_id`, `size_id`, `stock`, `price`, `discount_price`, `main_price`) VALUES ('$id','$size_name[$i]','$size_stock[$i]','$size_price[$i]','$size_discount[$i]','$int')";
            if ($result_stock = mysqli_query($connection, $sql_stock)) {
                header("Location: ../../view_stock.php?msg=1&id=$id");
            }
        }
    }

?>

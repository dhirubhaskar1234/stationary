<?php
session_start();
include ('../../backend/stationary/include/db.php');
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
if (!empty($_SESSION['user_id'])) {
    if (isset($_POST['submit'])){
        $p_id=clean($_POST['p_id']);
        $size=clean($_POST['size']);
        $quan=clean($_POST['quan']);
        $sql_check="SELECT * FROM `cart` WHERE `size_id`='$size' AND `product_id`='$p_id' AND `user_id`='$_SESSION[user_id]'";
        echo $sql_check;
        if ($result_check=mysqli_query($connection,$sql_check)) {
            $count = mysqli_num_rows($result_check);
            if ($count == 0) {
                $sql = "INSERT INTO `cart`(`product_id`, `size_id`, `user_id`, `product_quan`) VALUES ('$p_id','$size','$_SESSION[user_id]','$quan')";
                if ($result = mysqli_query($connection, $sql)) {
                    header("Location: ../../cart");
                }
            }else{
                header("Location: ../../cart");
            }
        }
    }
}elseif (empty($_SESSION['user_id'])) {
    if (!isset($_SESSION['cart'])) {
        $cart = [];
    } else {
        $cart = $_SESSION['cart'];
    }
    if($_POST['p_id'] &&  $_POST['size']){
        $quan=clean($_POST['quan']);
        $p_id=clean($_POST['p_id']);
        $size=clean($_POST['size']);
        $cart[$p_id]=array('quantity' => $quan,'size_id' =>$size );
    }
    $_SESSION['cart']=$cart;
    header("Location: ../../cart");

}







?>
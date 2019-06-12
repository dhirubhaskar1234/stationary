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
if (isset($_POST['update'])){
    $c_id=clean($_POST['c_id']);
    $quan=clean($_POST['quan']);
    //echo $quan;

     $sql="UPDATE `cart` SET `product_quan`='$quan' WHERE `user_id`='$_SESSION[user_id]' AND `id`=$c_id";

     if ($result=mysqli_query($connection,$sql)){
         header("Location: ../../cart");
     }
    //print_r($_SESSION['cart']);

}
if (isset($_POST['remove'])){
    $c_id=clean($_POST['c_id']);
    $sql="DELETE FROM `cart` WHERE `id`='$c_id' AND `user_id`='$_SESSION[user_id]'";
    if ($result=mysqli_query($connection,$sql)){
        header("Location: ../../cart");
    }


}
if (isset($_GET['id'])){
    $id=clean($_GET['id']);

    $sql="DELETE FROM `cart` WHERE `product_id`=$id";


    if ($result=mysqli_query($connection,$sql)) {
        header("Location: ../../home");
    }


}


?>
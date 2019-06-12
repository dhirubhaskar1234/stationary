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
    $p_id=clean($_POST['p_id']);
    $quan=clean($_POST['quan']);
    //echo $quan;

    $_SESSION['cart'][$p_id]['quantity']=$quan;
    //print_r($_SESSION['cart']);
    header("Location: ../../cart");
}
if (isset($_POST['remove'])){
    $p_id=clean($_POST['p_id']);
    $quan=clean($_POST['quan']);
    unset($_SESSION['cart'][$p_id]);
    header("Location: ../../cart");
}
if (isset($_GET['id'])){
    $id=clean($_GET['id']);
    unset($_SESSION['cart'][$id]);
    header("Location: ../../home");


}

?>
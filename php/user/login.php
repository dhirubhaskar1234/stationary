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
    if (isset($_POST['submit'])){
        $user_email=clean($_POST['user_email']);
        $user_password=clean($_POST['user_password']);
        $location=clean($_POST['location']);


        $sql="SELECT * FROM `users` WHERE `user_email`='$user_email'";
        if ($result=mysqli_query($connection,$sql)){
            $count=mysqli_num_rows($result);
            if ($count==1){
                $row=mysqli_fetch_assoc($result);
                $db_password=$row['user_password'];
                if (password_verify($user_password, $db_password)) {
                    $_SESSION['user_name']=$row['name'];
                    $_SESSION['user_id']=$row['id'];
                    if (!empty($_SESSION['user_id'])) {
                        foreach ($_SESSION['cart'] as $product => $value) {
                            $size = $value['size_id'];
                            $quan = $value['quantity'];
                            $p_id = $product;
                             $sql="INSERT INTO `cart`(`product_id`, `size_id`, `user_id`, `product_quan`) VALUES ('$p_id','$size','$_SESSION[user_id]','$quan')";
                             if ($result=mysqli_query($connection,$sql)){

                             }
                        }
                        unset($_SESSION['cart']);
                    }
                    if ($location=='checkout') {
                        header("Location: ../../address");
                    }else{
                        header("Location: ../../home");
                    }
                }else{
                  header("Location: ../../login/2");
                }
            }else{
                header("Location: ../../login/2");
            }
        }
    }


?>
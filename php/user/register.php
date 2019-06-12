<?php
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
        $user_name=clean($_POST['name']);
        $ref_mobile=clean($_POST['ref_mobile']);
        $user_email=clean($_POST['user_email']);
        $user_mobile=clean($_POST['user_mobile']);
        $user_password=clean($_POST['user_password']);
        $user_confirm_password=clean($_POST['user_confirm_password']);
        if (!empty($ref_mobile)){
            $sql_ref="SELECT * FROM `users` WHERE `user_mobile`='$ref_mobile'";
            if ($result_ref=mysqli_query($connection,$sql_ref)){
                $count=mysqli_num_rows($result_ref);
                if($count==0){
                    header("Location: ../../register/4");
                    die();
                }

            }
        }
        $sql="SELECT * FROM `users` WHERE `user_email`='$user_email' OR `user_mobile`='$user_mobile'";
        if ($result=mysqli_query($connection,$sql)){
            $count=mysqli_num_rows($result);
            if ($count==0){
                if ($user_password==$user_confirm_password){
                    $password_encrypted = password_hash($user_password, PASSWORD_BCRYPT);
                    $sql_insert="INSERT INTO `users`(`name`,`user_email`, `user_mobile`, `user_password`,`ref_mobile`) VALUES ('$user_name','$user_email','$user_mobile','$password_encrypted','$ref_mobile')";
                    if ($result_insert=mysqli_query($connection,$sql_insert)){
                        header('location: ../../login/1');
                    }
                }else{
                    header("Location: ../../register/3");
                }
            }else{
                header("Location: ../../register/2");
            }
        }


    }



?>
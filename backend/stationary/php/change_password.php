<?php
include("../include/db.php");
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
if (isset($_POST['submit'])) {
	$user_name=clean($_POST['user_name']);
	$password=clean($_POST['password']);
	$user_password=md5($password);
	if (!empty($user_name) && !empty($password)) {
		$sql_insert="UPDATE `user` SET `email`='$user_name',`password`='$user_password' WHERE `id`=1";
		if($result=mysqli_query($connection,$sql_insert)){
			header("Location: ../change_password.php?msg=1");
		}
	}else{
			header("Location: ../change_password.php");
	}
}




?>
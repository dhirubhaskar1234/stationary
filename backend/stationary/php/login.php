<?php
	session_start();
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

		$sql_check="SELECT * FROM `user` WHERE BINARY `email`='$user_name' AND `password`='$user_password'";
	
		if ($result=mysqli_query($connection,$sql_check)) {
			$count=mysqli_num_rows($result);
			$row=mysqli_fetch_assoc($result);
			$db_user_name=$row['email'];
			if ($count==0) {
				header("Location: ../login.php?msg=1");
			}elseif ($count==1) {
				$_SESSION['user_name']=$row['email'];
				header("Location: ../index.php");
			}
			
		}
	}



?>
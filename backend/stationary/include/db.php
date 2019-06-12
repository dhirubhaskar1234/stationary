<?php
$db=array("db_host"=>"localhost","db_user"=>"root","db_pass"=>"","db_name"=>"stationary");
foreach ($db as $key => $value) {
	# code...
define(strtoupper($key), $value);
}
$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
?>
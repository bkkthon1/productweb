<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php 
session_start();
?>
<meta charset="utf-8" />
<?php
include('include/connect.php');
session_register('u_username');
session_register('u_password');
$u_username=$_POST[u_username];
$u_password=$_POST[u_password];

$sql=mysql_query("SELECT * FROM t_user WHERE u_username='$u_username' && u_password='$u_password'");

$row=mysql_num_rows($sql);
$result=mysql_fetch_array($sql);

if($row>0){
	$_SESSION['u_username']=$result['u_username'];
	$_SESSION['u_password']=$result['u_password'];
	
	echo "<script>";
	echo "alert('Welcome')";
	echo "window.location='index.php'";
	echo "</script>";
	exit();
}else{
    echo "<script>";
	echo "alert('Username or Password Incorrect')";
	echo "window.location='login.php'";
	echo "</script>";
	exit();
}

?>
</body>
</html>


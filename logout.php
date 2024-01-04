<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or another appropriate location
header("Location: select_product.php");
exit;
?>

<?php /* 
<title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #6C0;
}
</style>
</head>
<body>

<?php  
echo "<script>";
echo "alert('already logged out');";
echo "window.location='select_product.php';";
echo "</script>";

*/
 ?>

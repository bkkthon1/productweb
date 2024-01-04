<meta charset=”utf-8”>
<?php
$u_username=$_GET['u_username'];

//*************************
if($u_username==''){
echo '<br>'.'สวัสดีคุณ  :  ' .$u_username;
echo '<br>คุณยังอยู่ใน session น้ะครับ'.'<br>';
}
?>

<?php
session_start();
session_register("u_username");
session_register("u_password");
?>


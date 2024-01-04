<meta charset=”utf-8”>
<?php    
$p_id=$_POST['p_id'];
$p_pass=$_POST['p_pass'];
$p_passC=$_POST['p_passC'];
$p_email=$_POST['p_email'];

//***********************************
echo 'ชื่อผู้ใช้งาน :' .$p_id. '<br>'; 
echo 'รหัสผ่าน : ' .$p_pass.'<br>'; 
echo 'ยืนยันรหัสผ่าน : '.$p_passC. '<br>';
echo 'Email : '.$p_email. '<br>'; 
?>

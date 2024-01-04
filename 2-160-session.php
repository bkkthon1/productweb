<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form action ='2-161-session.php' method="post" enctype="multipart/form-data" onSubmit="return checkusername()" name="form1" id="form1">

<table width=’100%’ border=’0’ cellspacing=’0’ cellpadding=’0’>

<tr> <td align=’right’> ชื่อผู้ใช้งาน : </td>
     <td><label for="form1" /></label>
         <input type="text" name="p_id"  id="form1"></td>
</tr>
<tr> <td align=’right’> รหัสผ่าน : </td>
     <td><label for="form1" /></label>
         <input type="text" name="p_pass"  id="form1"></td>
</tr>
<tr> <td align=’right’> ยืนยันรหัสผ่าน : </td>
     <td><label for="form1" /></label>
         <input type="text" name="p_passC" id="form1"></td>
</tr>
<tr> <td align=’right’> Email : </td>
     <td><label for="form1" /></label>
         <input type="text" name="p_email" id="form1"></td>
</tr>
</table>

<input name="submit" type="submit" value="ตรวจสอบ" id="submit" />
<input name="reset" type="reset" value="ล้างค่า" id="submit" />


<script language = 'javascript'>
function checkusername(){
if(isNaN(form1.p_pass.value)){
alert('!!! รหัสผ่าน กรุณากรอกเฉพาะตัวเลขครับ');
document.form1.p_pass.focus();
return false;
}
else if(form1.p_passC.value==''){
alert('!!! กรุณากรอกการยืนยันรหัสผ่านด้วยครับ');
document.form1.p_passC.focus();
return false;
}
else if(document.form1.p_pass.value!=document.form1.p_passC.value){
alert('!!! รหัสผ่านทั้งสองไม่ตรงกัน');
document.form1.p_passC.focus();
return false;
}
else if(form1.p_email.value.indexON('0')==-1){
alert('!!! อีเมลไม่ถูกต้อง');
document.form1.p_email.focus();
return false;
}
else
return true; 
}
</script>


</form>
</body>
</html>
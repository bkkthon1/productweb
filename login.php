<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ส่งไป session</title>
    <script type="text/javascript">
        function checkpostcode() {
            var username = document.getElementById('u_username').value;
            var password = document.getElementById('u_password').value;

            // Check if the fields are not empty
            if (username.trim() === '' || password.trim() === '') {
                alert('กรุณากรอกชื่อผู้ใช้งานและรหัสผ่าน');
                return false;
            }

            // You can add more validation logic here if needed

            // If all validations pass, return true to submit the form
            return true;
        }
    </script>
</head>

<body>

    <form action='session.php' method='post' enctype='multipart/form-data' onSubmit='return checkpostcode()' name='frm1' id='frm1'>

        <table rows='4' columns='2' width='50%' border='0' cellspacing='0' cellpadding='0'>

            <tr>
                <td align='right'> ชื่อผู้ใช้งาน : </td>
                <td><input name='u_username' type='text' id='u_username' value='' size='25' /></td>
            </tr>
            <tr>
                <td align='right'> รหัสผ่าน : </td>
                <td><input name='u_password' type='password' id='u_password' value='' size='25' /></td>
            </tr>
        </table>

        <input name='submit' type='submit' value='เข้าสู่ระบบ' id='submit' />
        <input name='reset' type='reset' value='ยกเลิก' id='reset' />

    </form>

</body>

</html>

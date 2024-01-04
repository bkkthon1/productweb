<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>

    <form action="add_new_topic.php" method="post" enctype="multipart/form-data" onsubmit="return check()" name="new_topic" id="new_topic">

        <table width="74%" border="1">
            <tr>
                <td>topic</td>
                <td><input name="topic" type="text" size="50" /></td>
            </tr>
            <tr>
                <td>detail</td>
                <td><textarea name="detail" cols="50" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>creator</td>
                <td><input name="name" type="text" size="50" /></td>
            </tr>
            <tr>
                <td>all topic</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input name="submit" type="submit" value="save" />
                    <input name="submit2" type="reset" value="clear" />
                </td>
            </tr>
        </table>

        <script language="javascript">
            function check() {
                if (new_topic.topic.value == "") {
                    alert('!!! ');
                    new_topic.topic.focus();
                    return false;
                }
                else
                    return true;
            }
        </script>
    </form>

</body>
</html>

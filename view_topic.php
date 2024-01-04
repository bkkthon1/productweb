<?php
include('include/connect.php');
$sql = "SELECT * FROM questions WHERE id='{$_GET['id']}'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_assoc($query);

// answer
$sql_a = "SELECT * FROM answers WHERE question_id='{$_GET['id']}'";
$query_a = mysqli_query($connect, $sql_a);
$rows_a = mysqli_num_rows($query_a);
// update view
/* $sql_u="UPDATE questions SET view=view+1 WHERE id='{$_GET['id'}'";
mysqli_query($sql_u); */
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
  <?php /*  <link href='css/stylesheet.css' rel='stylesheet' type='text/css'>
*/ ?>
    <link href="css/bootstrap.css" rel="bootstrap" type="text/css"> 
    <link href="css/bootstrap.min.css" rel="bootstrap">
    <link href="css/bootstrap-responsive.min.css" rel="bootstrap">

    <title>detail topic</title>
    <style type="text/css">
        body {
            font-size: 13px;
        }

        body, td, th {
            color: #000;
        }
    </style>
</head>
<body>

    <table width="500%" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
            <td>
                <table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
                    <tr>
                        <td colspan="3" bgcolor="#ffffff">
                            <span class="Text-Comment1">
                                <img src="images/my_normal_topic.gif" width="52" height="52" /> topic name : <?php echo $result['topic']; ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <span class="Text-Comment1">
                                <img src="images/bullet.gif" width="11" height="14">detail : <?php echo nl2br($result['detail']); ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="Text-Comment11">
                                <strong>name:</strong><?php echo $result['name']; ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right">
                            <span class="Text-Comment15">
                                <strong>date create:</strong><?php echo $result['created']; ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <?php
    if ($rows_a > 0) {
        $i = 1;
        while ($result_a = mysqli_fetch_assoc($query_a)) {
    ?>

            <table width="500%" border="1" align="center" cellpadding="0" cellspacing="#000000" style="margin-top:10px;">
                <tr>
                    <td>

                        <table width="100%" border="1" cellpadding="3" cellpadding="1" bgcolor="#ffffff">

                            <tr>
                                <td width="30%" class="Text-Comment1" style="text-align:right;"><strong>name reply</strong></td>
                                <td width="70%"><?php echo $result_a['name']; ?></td>
                            </tr>

                            <tr>
                                <td class="Text-Comment1" style="text-align:right;"><strong>detail reply</strong></td>
                                <td><?php echo nl2br($result_a['detail']); ?></td>
                            </tr>

                        </table>

                    </td>
                </tr>
            </table>

        <?php
            }
        } else {
        ?>
        <p class="Text-Comment8" style="text-align:center; color:red;"> no answer</p>
    <?php
    }
    ?>

    <form action="add_answer.php" method="post" enctype="multipart/form-data" name="add_answer" onsubmit="return check()">

        <table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="blue" style="margin-top:15px;">
            <tr>
                <td>

                    <table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
                        <tr>
                            <td colspan="3" bgcolor="ffffff">
                                <img src="images/reply.jpg" width="130" height="30">
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" class="Text-Comment37" style="text-align:right;"><strong>detail</strong></td>
                            <td><textarea name="detail" cols="50" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <td class="Text-Comment37" style="text-align:right;"><strong>answer name</strong></td>
                            <td><input name="name" type="text" size="50" /></td>
                        </tr>
                        <td>&nbsp;</td>
                        <td>
                            <input name="submit" type="submit" value="ok" style="width:120px; height:50px;" />
                            <input name="submit2" type="button" value="return" onClick="history.back();" style="width:120px; height:50px;" />
                        </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
    </form>

    <script language="javascript">
        function check() {
            if (add_answer.detail.value == "") {
                alert('!!! ');
                add_answer.detail.focus();
                return false;
            } else
                return true;
        }
    </script>

</body>

</html>

<?php
mysqli_close($connect);
?>

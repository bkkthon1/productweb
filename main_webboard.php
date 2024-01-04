<?php
include("include/connect.php");
$sql = "SELECT * FROM questions ORDER BY id DESC";
$query = mysqli_query($connect, $sql); // Assuming $connect is your database connection

?>
<table width="100%" border="1">
  <tr>
    <td>ลำดับ</td>
    <td>หัวข้อกระทู้</td>
    <td>ผู้ตั้งกระทู้</td>
    <td>ตอบ</td>
    <td>วันที่ตั้งกระทู้</td>
  </tr>
  <?php
  $i = 1;
  while ($result = mysqli_fetch_assoc($query)) {
  ?>
    <tr class="Text-Comment2">
      <td class="Text-Comment29" style="text-align:center;"><?php echo $i; ?></td>
      <td class="Text-Comment8"><a href="view_topic.php?id=<?php echo $result['id']; ?>"><?php echo $result['topic']; ?></a></td>
      <td class="Text-Comment29" style="text-align:center;"><?php echo $result['name']; ?></td>
      <td class="Text-Comment29" style="text-align:center;"><?php echo $result['reply']; ?></td>
      <td class="Text-Comment29" style="text-align:center;"><?php echo $result['created']; ?></td>
    </tr>
  <?php $i++;
  } ?>
</table>

<?php
mysqli_close($connect);
?>
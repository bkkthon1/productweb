<form action='searchproduct.php' method='post' enctype='multipart/form-data' name='searchform' id='searchform'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td>ระบุชื่อสินค้า&nbsp;<input name='psearch' type='text' size='50' id="psearch" />&nbsp;<input name='submit' type='submit' value='ค้นหา'  /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="100%" border="1" cellpadding="10">
  <tr>
    <td>pic</td>
    <td>num</td>
    <td>name</td>
    <td>detail</td>
    <td>unitleft</td>
    <td>price</td>
  </tr>
  
  <?php
    /*
     include('Connections/connect.php');  
     $keyword=$GET[keyword];
     
     $sql=mysqli_query("select*form t_product p, t_type t where p type_id=type_id && p.p_name LIKE '%$keyword%' order by p.p_id desc");
     
	 while($row=mysqli_fetch_array($sql)){
     
	 */
    ?>
     
     <?php
	 require('include/connect.php');
	 
	 $sql="select * from t_product where p_name like '%{$_POST['psearch']}%'";
	 $query=mysqli_query($sql);
     ?>
	 
     <?php $i=1; while($result=mysqli_fetch_assoc($query))   {?>
   <tr>
    <td><img src='photo/<?php echo $result['p_photo'];?>' border='0'></td>
    <td><?php echo $result['p_id'];?></td>
    <td> <?php echo $result['p_name'];?></td>
    <td> <?php echo $result['p_desc'];?></td>
    <td> <?php echo $result['p_unit'];?></td>
    <td> <?php echo number_format($result['p_price'],2);?></td>
    </tr>
    <?php $i++;}?>

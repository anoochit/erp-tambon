<?
include('config.inc.php');
if($del =='del1'){
	 	$sql_del = "DELETE FROM useful WHERE u_id=$u_id";
		$result_del = mysql_query($sql_del);
		echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=add_sale.php?c_id=$c_id\">\n";
}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" src="include/calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<link rel="stylesheet" type="text/css" href="default.css">
<style type="text/css">
<!--
.style2 {font-size: 12px; font-family: Tahoma; }
.style3 {font-size: 12px}
-->
</style>
<script language="JavaScript">
function del_confirm()
{
	if (confirm("คุณต้องการลบไฟล์นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<link href="style2.css" rel="stylesheet" type="text/css">
<body>
<?
$sql = "SELECT * FROM code
Where  c_id = '$c_id' 
group by code order by code";
$result = mysql_query($sql);
$rs1=mysql_fetch_array($result);

?><br>
<form action="" method="post" name="f22" enctype="multipart/form-data" >
<table width="98%" border="0" cellspacing="1" cellpadding="0" align="center"style="border-collapse:collapse;">
  <tr  >
    <td height="30" colspan="6" bgcolor="#FFFF99" align="center"  class="lgBar" style="border: #000000 1px solid;" ><span class="style5">การหาผลประโยชน์ในพัสดุ &nbsp;&nbsp;[ <a href="#" onClick="javascript:window.open('sample_13.php?c_id=<?=$c_id?>&tab=add','sample_13','scrollbars=yes,width=450,height=300')">เพิ่ม</a> ]</span></td>
  </tr>
  <tr class="style3" bgcolor="#33CCFF">
    <td width="16%" height="28" align="center"  style="border: #000000 1px solid;" >
 พ.ศ.</td>
    <td width="23%" align="center" style="border: #000000 1px solid;" >
    รายการ</td>
    <td width="42%" align="center" style="border: #000000 1px solid;" >ผลประโยชน์ (บาท) ที่ได้รับ<br />เป็นรายเดือนหรือรายปี</td>

	  <td width="9%" align="center" style="border: #000000 1px solid;" >&nbsp;แก้ไข</td>
	    <td width="10%" align="center" style="border: #000000 1px solid;" >&nbsp;ลบ</td>
  </tr>
  <?
 $sql = "SELECT * FROM useful where c_id = '$c_id' order by year ";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#FFFFFF';
elseif( $i%2 ==1) $bg ='#CCCCCC';

  ?>
  <tr bgcolor="<?=$bg?>" class="style3">
    <td  height="28"  align="center" style="border: #000000 1px solid;" >&nbsp;<?=$rs1[year]?></td>
    <td  style="border: #000000 1px solid;" >&nbsp;<?  echo $rs1["item"]?></td>
    <td style="border: #000000 1px solid;" >&nbsp;<?=$rs1["useful"]?></td>
	<td align="center" style="border: #000000 1px solid;" ><a href="#" onClick="javascript:window.open('sample_13.php?u_id=<?=$rs1["u_id"]?>&tab=edit','sample_13','scrollbars=yes,width=450,height=300')"><img src="images/Modify.png" border="0" /></a></td>
    <td align="center" style="border: #000000 1px solid;" >&nbsp;<a  href="?del=del1&u_id=<?=$rs1["u_id"]?>&c_id=<?=$c_id?>" onClick="return godel();"><img src="images/Delete.png" border="0" /></a></td>
  </tr>
  <? 
  	$i++;
  }?>
</table>
</form> 
</body>
</html>
<script language="javascript">

function godel()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>
<?
function find_move_id($c_id) {
	
		$sql = "Select max(m_id) as max  from move  where c_id ='$c_id' ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		return $recn['max'];
	}
?>
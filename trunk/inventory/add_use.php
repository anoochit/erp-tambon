<?
include('config.inc.php');
if($OK <>'' ){
						$sql_insert="UPDATE code SET  status ='".$status."'
						where c_id = '".$c_id." '
						";
						echo "\$sql_insert  ".$sql_insert."<br>";
						$result_insert  = mysql_query($sql_insert); 
			
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>
<?
}
if($del <>''){
	 	$sql_del = "DELETE FROM move WHERE m_id=$m_id";
		$result_del = mysql_query($sql_del);
		
		echo "<meta http-equiv='refresh' content='0; url=add_use.php?c_id=$c_id'>";
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
<table width="98%" border="0" cellspacing="1" style="border-collapse:collapse;" align="center">
	  <tr  class="lgBar" >
    <td height="30"style="border: #000000 1px solid;"   colspan="6"   align="left">&nbsp;&nbsp;ชื่อผู้ใช้ - ดูแล - รับผิดชอบพัสดุ &nbsp;&nbsp;[ <a href="#" onClick="javascript:window.open('sample_12.php?c_id=<?=$c_id?>&tab=add','sample_12','scrollbars=yes,width=450,height=350')">เพิ่ม</a> ]</td>
  </tr>
  <tr class="style3" bgcolor="#33CCFF">
    <td width="10%" height="28"  align="center" style="border: #000000 1px solid;"  >
     พ.ศ.</td>
    <td width="22%" align="center" style="border: #000000 1px solid;"  >
     ชื่อส่วนราชการ</td>
    <td width="24%" align="center" style="border: #000000 1px solid;"  >
      ชื่อผู้ใช้พัสดุ</td>
    <td width="27%" align="center" style="border: #000000 1px solid;"  >
   ชื่อหัวหน้าส่วนราชการ</td>
	  <td width="10%" align="center" style="border: #000000 1px solid;"  >&nbsp;แก้ไข</td>
	    <td width="7%" align="center" style="border: #000000 1px solid;"  >&nbsp;ลบ</td>
  </tr>
  <?
  $sql = "SELECT * FROM move Where c_id = '$c_id' order by  year ";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#FFFFFF';
elseif( $i%2 ==1) $bg ='#CCCCCC';

  ?>
  <tr bgcolor="<?=$bg?>" class="style3">
    <td  height="28"  align="center" style="border: #000000 1px solid;"  >&nbsp;<?=$rs1[year]?></td>
    <td class="style3" style="border: #000000 1px solid;"  >&nbsp;<?  echo find_div_name($rs1["department"]) //$rs1["department"]?></td>
    <td style="border: #000000 1px solid;"  >&nbsp;<?=$rs1["user"]?></td>
    <td style="border: #000000 1px solid;"  >&nbsp;<?=$rs1["name_head"]?></td>
	<td align="center" style="border: #000000 1px solid;"  ><a href="#" onClick="javascript:window.open('sample_12.php?m_id=<?=$rs1["m_id"]?>&tab=edit','sample_12','scrollbars=yes,width=450,height=350')"><img src="images/Modify.png" border="0" /></a></td>
    <td align="center" style="border: #000000 1px solid;"  ><a  href="?del=del&m_id=<?=$rs1["m_id"]?>&c_id=<?=$c_id?>" onClick="return godel();"><img src="images/Delete.png" border="0" /></a></td>
  </tr>
  <? 
  	$i++;
  }?>
  <tr><td colspan="6" background="images/hdot2.gif"> </td></tr>

<tr>
                    <td height="30"  align="center" colspan="10">
                    <input type="reset" name="formbutton2" value="ปิดหน้านี้" onClick="window.close();" class="buttom">    </td>
                </tr>
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
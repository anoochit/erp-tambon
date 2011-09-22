<?
include('config.inc.php');
if($OK <>'' ){
			$sql_insert="UPDATE code SET  status ='".$status."' where c_id = '".$c_id." ' ";
			echo "\$sql_insert  ".$sql_insert."<br>";
			$result_insert  = mysql_query($sql_insert); 
			
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>
<?
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

?>
<form action="" method="post" name="f22" enctype="multipart/form-data" >
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center">
<tr class="lgBar" >
			   <td  height="32" colspan="9" align="center"><div class="style2">&nbsp;&nbsp;&nbsp;<strong>สภาพ</strong></div></td> 
    </tr>
<tr class="bmText"  >
<td width="41%"  height="30" ><div align="center" class="style2">
  <div align="left"><b>เลขครุภัณฑ์</b></div>
</div></td>
	<td width="59%" height="30"><div align="left" class="style2">&nbsp;
	<?=$rs1[code]?>  
    </div></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText"  >
	<td width="41%"  height="30"><div align="center" class="style2">
	  <div align="left"><b>สภาพ</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
	<input type="radio" name="status" value="0"  <? if($rs1['status']==0) echo "checked"?>/> ดี <br>
	<input type="radio" name="status" value="1"  <? if($rs1['status']==1) echo "checked"?>/>  พอใช้<br>
	<input type="radio" name="status" value="2"  <? if($rs1['status']==2) echo "checked"?>/> ชำรุด<br>
	<input type="radio" name="status" value="3"  <? if($rs1['status']==3) echo "checked"?>/> สิ้นสภาพ <br>
	</div></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value=" บันทึก "  onClick="return godel();"   class="buttom">&nbsp;
                    <input type="reset" name="formbutton2" value="ยกเลิก" onClick="window.close();" class="buttom">    </td>
                </tr>
</table>
</td>
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
function pro_name($od_id){
	$sql1 ="select  *  from order1_detail where od_id =  '$od_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[product];
}
function r_amount($id){
	$sql1 ="select  *  from receive_order1 where id =  '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[r_amount];
}
function amount($pro_name){
	$sql1 ="select  *  from product where pro_name =  '$pro_name'  and status = 0";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[amount];
}
?>


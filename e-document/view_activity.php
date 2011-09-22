<meta http-equiv="Content-Type" content="text/html; charset=windows-874"><?
$ac_date2 = date_format_sql($_REQUEST["ac_date"]);

if($ac_id <>''){

	$sql_add = "DELETE FROM activity WHERE a_id='$ac_id'";
	//echo $sql_add;
	$result_add = mysql_query($sql_add);
}
?>
<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">
<tr>
	<td width="657" valign="top" background="images/bg_1.gif">
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="100%"><b>กิจกรรมวันที่ <?=date_format_th($ac_date2)?> </b>
		</td>
	</tr>
</table>
<center>
<?
$sql2 = "SELECT * FROM activity WHERE ac_date='$ac_date2'";
$result2 = mysql_query($sql2);
while($rs2 = mysql_fetch_array($result2)){
?>
<br>
<table width="70%" bgcolor="" border="0" cellpadding="1" cellspacing="1">
<tr>
<td height="129" style="border: #000000 1px solid;" valign="top"> <div><br>
<?
$ac_time_arr = explode('to',$rs2["ac_time"]);
?>
<b>เวลา </b><?=$ac_time_arr[0]?> ถึง <?=$ac_time_arr[1]?> <br><br>
<b>กิจกรรม </b><?=$rs2["ac_detail"]?>
<?
if($_SESSION["username"] != ""){
?>
<br><br><a href='index.php?action=edit_ac&ac_id=<?=$rs2["a_id"]?>'>[แก้ไข]</a> <a href='index.php?action=view_ac&ac_date=<?=date_format_th($ac_date2)?>&ac_id=<?=$rs2["a_id"]?>' onclick="return del_confirm1();">[ยกเลิก]</a>
<?
}
?>
</div>
</td>
</tr>
</table>
<?}?>
</center>
	</td>
	
</tr>
</table>
</center>
<script language="JavaScript" type="text/javascript">
function del_confirm1()
{
	if (confirm("คุณต้องการลบข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
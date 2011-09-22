<?
//---------------------------------------------------------------------------------------------------------- บันทึกข้อมูล
$ac_id = $_REQUEST["ac_id"];
$ac_date = date_format_sql($_REQUEST["ac_date"]);
$ac_time = $_REQUEST["ac_time_start"]."to".$_REQUEST["ac_time_finish"];
$topic = $_REQUEST["topic"];

if($_REQUEST["b_submit"] != "") {
	$sql_add = "DELETE FROM activity WHERE a_id='$ac_id'";
	$result_add = mysql_query($sql_add);
	?>
	<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">
<tr>
	<td width="657" valign="top">
<center>
<br>
<b><font color="#0000CC">ดำเนินการเรียบร้อยแล้ว</font></b>
<br><br>
<? if($_REQUEST["id"] != ""){ ?>
<a href="index.php?action=view&file_name=<?echo $_REQUEST["id"]?>" target="_blank">ดูข้อมูล</a>
<?}?>
</center>
	</td>	
</tr>
</table>
</center>
<?
}else {
$sql_d = "SELECT * FROM activity WHERE a_id='$ac_id'";
$result_d = mysql_query($sql_d);
$rs_d = mysql_fetch_array($result_d);
?>
<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">
<tr>
	<td width="657" valign="top"  background="images/bg_1.gif">
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="100%">ยกเลิกปฏิทินกิจกรรมนี้
		</td>
	</tr>
</table>
<!--//--------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<div align="center">
<form name="borrow" action="index.php?action=del_ac&ac_id=<?=$ac_id?>" method="post">
<table width="600">
<tr>
	<td width="150">
	วันที่
	</td>
	<td>
	<input type="text" name="ac_date" value="<?echo date_format_th($rs_d["ac_date"])?><?//echo date_format_th(DATE(Y."-".m."-".d));?>" size="10" maxlength="100" readonly="readonly"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="">
	</td>
</tr>
<tr>
	<td width="150">
	เวลา
	</td>
	<td>
	<?$ac_time_arr = explode('to',$rs_d["ac_time"]);?>
	<input type="text" name="ac_time_start" size="10" maxlength="10" value="<?= $ac_time_arr[0]?>" readonly="readonly"> ถึง <input type="text" name="ac_time_finish" size="10" maxlength="10" value="<?= $ac_time_arr[1]?>" readonly="readonly">
	</td>
</tr>
<tr>
	<td width="150">
	ชื่อกิจกรรม
	</td>
	<td>
	<input type="text" name="topic" size="90" maxlength="255" value="<?= $rs_d["ac_detail"]?>" readonly="readonly">
	</td>
</tr>
<tr>
	<td width="150">
	ชื่อผู้บันทึก
	</td>
	<td>
	<?echo $_SESSION["username"]?>
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" name="b_submit" value="บันทึก">
	</td>
</tr>
</table>
</form>
</div>
	</td>	
</tr>
</table>
</center>
<? }?>
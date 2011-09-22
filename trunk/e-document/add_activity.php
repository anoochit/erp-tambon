<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
$ac_date = $_REQUEST["ac_date"];
$ac_time = $_REQUEST["ac_time_start"]."to".$_REQUEST["ac_time_finish"];
$topic = $_REQUEST["topic"];

if($_REQUEST["b_submit"] != "") {
	$sql_add = "INSERT INTO activity (ac_date,ac_detail,ac_time) VALUES('".date_format_sql($ac_date)."','$topic','$ac_time')";
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
<meta http-equiv="Refresh" content="2;URL=index.php? action=view_ac&ac_date=<? echo $ac_date?>">
<? if($_REQUEST["id"] != ""){
	?>
<a href="index.php?action=view&file_name=<?echo $_REQUEST["id"]?>" target="_blank">ดูข้อมูล</a>
<? }?>
</center>
	</td>
	</tr>
</table>
</center>
<?
}else {

?>
<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">
<tr>
	<td width="657" valign="top" background="images/bg_1.gif">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="100%">เพิ่มปฏิทินกิจกรรม
		</td>
	</tr>
</table>
<div align="center">
<form name="borrow" action="index.php?action=add_calander" method="post">
<table width="600">
<tr>
	<td width="150">
	วันที่
	</td>
	<td>
	<input type="text" name="ac_date" value="<? echo DATE('d/m/Y');?><? //echo date_format_th(DATE(Y."-".m."-".d));?>" size="10" maxlength="100"  id="ac_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onClick="showCalendar('ac_date','DD/MM/YYYY');">
	</td>
</tr>
<tr>
	<td width="150">
	เวลา
	</td>
	<td>
	<input type="text" name="ac_time_start" size="10" maxlength="10"> ถึง <input type="text" name="ac_time_finish" size="10" maxlength="10">
	</td>
</tr>
<tr>
	<td width="150">
	ชื่อกิจกรรม
	</td>
	<td>
	<input type="text" name="topic" size="90" maxlength="255">
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
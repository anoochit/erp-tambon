<meta http-equiv="Content-Type" content="text/html; charset=windows-874" >
<?
$borrow_date = date_format_sql($_REQUEST["borrow_date"]);
$carryback_date = date_format_sql($_REQUEST["carryback_date"]);
$b_name = $_REQUEST["b_name"];
$file_name = $_REQUEST["file_name"];
$file_id= $_REQUEST["file_id"];
if($_REQUEST["b_submit"] != "") {
	$sql_add = "INSERT INTO borrow_list (file_name,file_id, b_date, l_date ,b_name ,owner,carryback) VALUES('$file_name','$file_id','$borrow_date','$carryback_date','$b_name','".$_SESSION["username"]."','no')";
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
<meta http-equiv="Refresh" content="2;URL=index.php?action=view&file_id=<? echo $_REQUEST["file_id"]?>">
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
	<td width="772" valign="top">
<div align="center">
<form name="borrow" action="index.php?action=borrow" method="post">
ยืมเอกสาร
<table width="600">
<tr>
	<td width="150">
	เอกสาร
	</td>
	<td>
	<a href="files_data/<? echo $_REQUEST["file_name"]?>" target="_blank" ><? echo $_REQUEST["file_name"]?></a>
	<input type="hidden" name="file_name" value="<? echo $_REQUEST["file_name"]?>">
	<input type="hidden" name="file_id" value="<? echo $_REQUEST["file_id"]?>">
	</td>
</tr>
<tr>
	<td width="150">
	ชื่อผู้ยืม
	</td>
	<td>
	<input type="text" name="b_name" size="50" maxlength="100">
	</td>
</tr>
<tr>
	<td width="150">
	วันที่ยืม
	</td>
	<td><input type="text" name="borrow_date" value="<? echo DATE('d/m/Y');?>" size="10" maxlength="100"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('borrow_date','DD/MM/YYYY')">	
	</td>
</tr>
<tr>
	<td width="150">
	ชื่อผู้ให้ยืม
	</td>
	<td>
	<? echo $_SESSION["username"]?>
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
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
$borrow_date = date_format_sql($_REQUEST["borrow_date"]);
$carryback_date = date_format_sql($_REQUEST["carryback_date"]);
$b_name = $_REQUEST["b_name"];
$file_name = $_REQUEST["file_name"];
$file_id= $_REQUEST["file_id"];

if($_REQUEST["b_submit"] != "") {
	$sql_update = "UPDATE borrow_list SET c_date='$carryback_date ',carryback='yes' WHERE file_name='$file_name'" ;
	$result_update = mysql_query($sql_update);
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
<? if($_REQUEST["id"] != ""){ ?>
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
	<td width="657" valign="top">
<?
$sql1 = "SELECT * FROM borrow_list WHERE file_name='$file_name'";	
$result1 = mysql_query($sql1);
$rs1=mysql_fetch_array($result1);
?>
<div align="center">
<form name="borrow" action="index.php?action=carryback" method="post">
คืนเอกสาร
<table width="600">
<tr>
	<td width="150">
	เอกสาร
	</td>
	<td>
	<? echo $_REQUEST["file_name"]?>
	<input type="hidden" name="file_name" value="<? echo $_REQUEST["file_name"]?>">
	<input type="hidden" name="file_id" value="<? echo $_REQUEST["file_id"]?>">
	</td>
</tr>
<tr>
	<td width="150">
	ชื่อผู้ยืม
	</td>
	<td>
	<? echo $rs1["b_name"]?>
	</td>
</tr>
<tr>
	<td width="150">
	วันที่ยืม
	</td>
	<td>
	<? echo date_format_th($rs1["b_date"])?>
	</td>
</tr>
<tr>
	<td width="150">
	วันที่คืน
	</td>
	<td>
	<input type="text" name="carryback_date" value="<?echo DATE('d/m/Y');?><?//echo date_format_th(DATE(Y."-".m."-".d));?>" size="10" maxlength="100" readonly="readonly" id="carryback_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onClick="showCalendar('carryback_date','DD/MM/YYYY');">
	</td>
</tr>
<tr>
	<td width="150">
	ชื่อผู้ให้ยืม
	</td>
	<td>
	<? echo $rs1["owner"]?>
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" name="b_submit" value="คืนเอกสารนี้">
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
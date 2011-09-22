<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
$o_name = $_REQUEST["o_name"];
$o_serial = $_REQUEST["o_serial"];
$address = $_REQUEST["address"];
$tel = $_REQUEST["tel"];

if($_REQUEST["b_submit"] != "") {
	$sql_add = "UPDATE owner SET o_name='$o_name',o_address='$address',o_tel='$tel' WHERE o_serial='$o_serial' ";
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
<? }?>
</center>
	</td>
	
</tr>
</table>
</center>
<?
}else {
$sql_d = "SELECT * FROM owner";
$result_d = mysql_query($sql_d);
$rs_d = mysql_fetch_array($result_d);
?>
<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">
<tr>
	<td width="657" valign="top" background="images/bg_1.gif">
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="100%"><b>
ตั้งค่าหน่วยงาน</b>
		</td>
	</tr>
</table>
<div align="center">
<form name="borrow" action="index.php?action=setup2" method="post">
<input type="hidden" name="o_serial" value="<? echo  $rs_d["o_serial"]?>">
<br>
<br>
<table width="600" >
<tr>
	<td width="150">
	ชื่อหน่วยงาน
	</td>
	<td>
	<input type="text" name="o_name" size="90" maxlength="255" value="<?= $rs_d["o_name"]?>">
	</td>
</tr>
<tr>
	<td width="150">
	ที่อยู่
	</td>
	<td>
	<input type="text" name="address" size="90" maxlength="255" value="<?= $rs_d["o_address"]?>">
	</td>
</tr>
<tr>
	<td width="150">
	เบอร์โทรศัพท์
	</td>
	<td>
	<input type="text" name="tel" size="12" maxlength="15" value="<?= $rs_d["o_tel"]?>">
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
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
$file_name = $_REQUEST["file_name"];
$file_id= $_REQUEST["file_id"];

if($_REQUEST["ok"] != "") {
	$sql_update = "UPDATE documentary SET warning='no' WHERE file_id='$file_id'" ;
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
<? if($_REQUEST["id"] != ""){ ?>
<a href="index.php?action=view&file_id=<? echo $_REQUEST["id"]?>" target="_blank">ดูข้อมูล</a>
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
<table name="body" width="657" cellpadding="0" cellspacing="0" align="center">
<tr>
	<td width="657" valign="top">
<?
$file_id = $_REQUEST["file_id"] ;
$sql = "SELECT * FROM documentary WHERE file_id='$file_id'";
$result=mysql_query($sql);
while($rs=mysql_fetch_array($result)){
 $permission = $rs["permission"];	
?>
<br><div align="center">
ยกเลิกการเตือนเอกสารนี้
<table width="400" border="0">
	<tr>
	<td bgcolor="#C1E0FF">
		<div><b>เรื่อง </b><?echo $rs["topic"]?></div>
	</td>
	</tr>
	<tr>
	<td>
	<div><b>เลขที่เอกสาร </b><?echo $rs["doc_id"]?></div>
	<div><b>กอง </b><?echo $rs["dep_id"]?></div>
	<div><b>แฟ้มเอกสาร </b><?echo $rs["cat_id"]?></div>
	<div><b>ลงวันที่ </b><?echo date_format_th($rs["put_date_on"])?></div>
	<div><b>วันที่รับ </b><?
		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--")	{
			echo " - ";
		}else {
			echo date_format_th($rs["recieve_date"]);
		}
		?></div>
		<?
			$file_sql = "SELECT * FROM file_record WHERE file_id='$file_id'";
			$result2=mysql_query($file_sql);
			while($rs2=mysql_fetch_array($result2)){
		?>
<br>
	<div align="left"><b>ไฟล์ที่แนบมา </b><?echo $rs2["file_name"]?></div>
	<div><b>ชนิดไฟล์ </b>&nbsp;&nbsp;&nbsp;
	<?
		if($rs2["file_type"] == "application/pdf") {
			echo "<image src='images/pdf.gif' width=16 height=16 border=0>";
		}elseif($rs2["file_type"] == "application/msword") {
			echo "<image src='images/word.gif' width=16 height=16 border=0>";
		}elseif($rs2["file_type"] == "application/vnd.ms-excel") {
			echo "<image src='images/excel.gif' width=16 height=16 border=0>";
		}elseif($rs2["file_type"] == "application/x-zip-compressed" || $rs2["file_type"] == "application/octet-stream") {
			echo "<image src='images/rar.gif' width=16 height=16 border=0>";
		}else {
			echo "<image src='images/untype.gif' width=16 height=16 border=0>";
		}

		?>
	<?echo $rs2["file_type"]?></div>
	<div><b>ขนาดไฟล์ </b><?echo number_format($rs2["file_size"]/100000,2)?> Mb</div>
	<div align="center">
	<?
	// สิทธิ์การเข้าดาวน์โหลดไฟล์ไปใช้งาน	

		if($permission != "") {
			$access_for = explode(",",$permission);
			$num =count($access_for) ;
			for($i=0;$i < $num;$i++) {
				if(trim($_SESSION["de_part"]) == trim($access_for[$i])){
					$access = "yes";	
				}
			}
		}elseif(trim($permission) == "all") {
					$access = "yes";
		}else{
					$access = "";
		}
	?>
	<a href="files_data/<?echo $rs2["file_name"]?>" target="_blank" ><IMG src="images/download2.gif" width="46" height="46" border="0" alt=""><br>เปิดอ่าน หรือดาวน์โหลดไฟล์นี้ <br> 
	</a><br>
	<? }?>
<? 
if($access == "yes" ||  $_SESSION["department"] ==1 || $_SESSION['department'] =='all' ){ ?>
<br>
	<form name="cancle" action="index.php?action=cancle_warning" method="post">
	<input type="hidden" name="file_id" value="<?echo $file_id?>">
	<input type="submit" name="ok" value="บันทึกการยกเลิก">
	</form>
	<? }?></div>
	</td>
	</tr>
</table>
	</div>
<br>
</center>
	<?
}
?>
	</td>
</tr>
</table>
</center>
<? }?>
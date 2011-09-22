<?
	$file_id=$_REQUEST["file_id"];
	if($file_id <>''){
		$sql1 = "SELECT *  FROM file_record where   file_id='$file_id' ";

		$result1 = mysql_query($sql1);
		while($rs1 = mysql_fetch_array($result1)){
			unlink("files_data/$rs1[file_name]"); 
		}
			$sql = "DELETE FROM file_record WHERE file_id='$file_id'";

			$result = mysql_query($sql);
			
			$sql3 = "DELETE FROM documentary WHERE file_id='$file_id'";

			$result3 = mysql_query($sql3);
			
			$sql4 = "DELETE FROM send_doc WHERE file_id='$file_id'";
	
			$result4 = mysql_query($sql4);
	}
	

	header("Location: index.php");

?>

<center>
<table name="body" width="980" cellpadding="0" cellspacing="0">
<tr>
<td width="300" bgcolor="" valign="top" background="images/bg_1.gif">
	<?
	if($_SESSION["username"] != "") {
		?>
		<table name="menu1" cellpadding="0" cellspacing="0" width="300">
		<tr>
		<td><IMG src="images/nbar.gif" width="1" height="25" border="0" alt=""></td>
			<td background="images/bar.gif" height="25" >
		<?
		echo "<div> ".$_SESSION["username"]." เจ้าหน้าที่".$_SESSION["department"];
		
		?>
		</td>
		
		</tr>
		</table><br><div>
		<table name="menu" cellpadding="0" cellspacing="0" width="150">
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='index.php?action=add' align="center">[เพิ่มเอกสาร]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='index.php?action=dep_manage' align="center">[จัดการข้อมูลกอง]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='index.php?action=cat_manage' align="center">[จัดการข้อมูลแฟ้ม]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='index.php?action=group_manage' align="center">[จัดการข้อมูลประเภท]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif" align="center"><a href='logout.php'>ออกจากระบบ</a></td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		</table>
		<?
			echo "<br>เข้าใช้งานเมื่อ ".$_SESSION["login_date"]."<BR>";
		echo "เวลา ".$_SESSION["login_time"]." น. <BR>";
		}else {
	include("login_form.php");
	}?>
	</td>
	<td width="680" valign="top">
<center>
<br>
<b><font color="#0000CC">ดำเนินการเรียบร้อยแล้ว</font></b>
<br><br>
</center>
	</td>
	
</tr>
</table>
</center>







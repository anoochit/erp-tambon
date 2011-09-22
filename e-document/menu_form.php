<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
	if($_SESSION["username"] != "" ) {
		?>
		<table name="menu1" cellpadding="0" cellspacing="0" width="230">
		<tr>
			<td width="100%" height="25" background="images/bar.gif" >
		<?
		echo "<div><b> ".$_SESSION["username"]."</b> เจ้าหน้าที่  <b>".find_dep_name($_SESSION[de_part])."</b>";
		?>
		</td>
		<td width="10"><IMG src="images/nbar.gif" width="1" height="25" border="0" alt=""></td>
		</tr>
		</table><br><div>
		<? }?>
	<? if($_SESSION["username"] != "" && $_SESSION['de_part'] == "1") {?>
		<table name="menu" cellpadding="0" cellspacing="0" width="209">
		<tr>
			<td width="3"><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=add' align="center">[เพิ่มเอกสาร]</a>&nbsp;&nbsp;</td>
			<td width="10"><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
				 		  <tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif"  align="left" width="201">&nbsp;&nbsp;<a href='home.php?action=list_sendStamp'>[อนุมัติแล้ว<?
 if(count_stamp()  >0 ){
  echo	"(" . count_stamp()   ." ฉบับ)";
}
?>]</a></td>

 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
<tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif"  align="left" width="201">&nbsp;&nbsp;<a href='home.php?action=list_end'>[รอดำเนินการ<?
 if(find_end($_SESSION[de_part]) >0){
  echo	"(" . find_end($_SESSION[de_part]) ." ฉบับ)";
}
?>]</a></td>

 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
			<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=dep_manage' align="center">[จัดการข้อมูลกอง]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=borrow_manage' align="center">[รายการยืมเอกสาร]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=add_calander' align="center">[เพิ่มปฏิทินกิจกรรม]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=not_receive' align="center">[รายงานยังไม่ได้ลงรับ]</a></td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
			<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif" align="left">&nbsp;&nbsp;<a href='home.php?action=add_access' align="center">[รายงานรอดำเนินการ]</a></td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=add_receive_1' align="center">[รายงานลงรับ]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
	
		<? if ($_SESSION["username"] =='admin' ||  $_SESSION['de_part'] == 1){?>
				<tr >
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=setup' align="center">[ผู้ใช้งาน]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<? }?>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif" align="center"><a href='logout.php'>ออกจากระบบ</a></td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
</table>
		<?
		echo "<br>เข้าใช้งานเมื่อ ".$_SESSION["login_date"]."<BR>";
		echo "เวลา ".$_SESSION["login_time"]." น. <BR><br>";
		}elseif($_SESSION["username"] != "" && $_SESSION["username"] != "admin"){
			?>
			<div>
		 <table name="menu" cellpadding="0" cellspacing="0" width="199">
		 <? if ($_SESSION['department'] == "all"){?>
		<? }elseif ($_SESSION['department'] == 2){?>
			  <tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif"  align="left" width="191">&nbsp;<a href='home.php?action=list_stamp'>[เอกสารรออนุมัติ<?
 if(find_stamp($_SESSION[de_part]) >0){
  echo	"(" . find_stamp($_SESSION[de_part]) ." ฉบับ)";
}
?>]</a></td>

 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
		
		<? }elseif ($_SESSION['department'] <> 'all'){?>
		  <tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif"  align="left" width="191">&nbsp;<a href='home.php?action=list_receive'>[รอลงทะเบียนรับ<?
 if(find_receive($_SESSION[de_part]) >0){
  echo	"(" . find_receive($_SESSION[de_part]) ." ฉบับ)";
}
?>]</a></td>

 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
 		  <tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif"  align="left" width="191">&nbsp;<a href='home.php?action=list_end'>[รอดำเนินการ<?
 if(find_end($_SESSION[de_part]) >0){
  echo	"(" . find_end($_SESSION[de_part]) ." ฉบับ)";
}
?>]</a></td>

 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
 <? }?>
 <tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif" align="center" width="191"><a href='logout.php'>ออกจากระบบ</a></td>
 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
 
</table>

	<?
			echo "<br>เข้าใช้งานเมื่อ ".$_SESSION["login_date"]."<BR>";
		echo "เวลา ".$_SESSION["login_time"]." น. <BR><br>";
		
		}else {
	include("login_form.php");
	
	}
	
	include("calendar.php");
	?>
		<div>
	<table>
	<tr><td height="40" valign="top">*** หมายเหตุระดับการแจ้งเตือน </td></tr>
	<tr>
		<td bgcolor="#B0FFB0" align="center">
		สีเขียวอ่อน เตือนระยะที่ 1
		</td>
	</tr>
	<tr>
		<td bgcolor="#FFFFAA" align="center">
		สีเหลือง เตือนระยะที่ 2
		</td>
	</tr>
	<tr>
		<td bgcolor="#FFD6C1" align="center">
		สีส้ม เตือนระยะที่ 3 ใกล้เวลาสิ้นสุด
		</td>
	</tr>
	<tr>
		<td bgcolor="#FF9191" align="center">
		สีแดง เตือนเลยกำหนดระยะเวลาสิ้นสุด
		</td>
	</tr>

		<tr>
		<td align="center" bordercolor="#999999">
		<a href="help_doc.pdf" target="_blank"><img src="images/manual.jpg" border="1" /></a>
		</td>
	</tr>
	</table>
   </div>
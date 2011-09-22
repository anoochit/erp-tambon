<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>วิทยาลัยอาชีวะศึกษาจังหวัดอุตรดิตถ์</title>
<script language="JavaScript" src="include/calendar.js"></script>


<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css"> 
<style type="text/css">
<!--
.style3 {
	font-size: x-large;
	font-weight: bold;
}
.login {
	font-family: Tahoma;
	font-size: 12pt;
	color: #2E578A;
	font-weight: lighter;
	line-height: normal;
}
.style4 {font-size: 24px}
-->
</style>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
</head>
<body   background="images/template_01.jpg" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<center>

<table id="background_tabel" width="900" border='0' cellpadding='0' cellspacing='0'>
<tr>
	<td align='center' bgcolor='#FFFFFF'>
<?include('header.php')?>
<table id='body' width='100%' height="650" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td  width="177" valign="top" bgcolor='#B3CFEC'>
	  <? //include("menu_1.php")?>
<table width="100%"  bgcolor="#B3CFEC" border="0" cellpadding="0" cellspacing="0" align="center" >
	  <tr>
        <td  height="20" align="center" class="menuBar"background="images/menu_h_bg.jpg">หน้าหลัก</td>
      </tr>
	  <tr>
        <td height="30"  align="left"><a href="?action=center"  ><span class="catLink">- กลับสู่หน้าหลัก</span></a></td>
      </tr>
	<? if($_SESSION[u_id] <>''){?>

<tr>
        <td width="168"  height="20" align="center"  background="images/menu_h_bg.jpg" class="menuBar">ระบบควบคุม</td>
      </tr>
	      <tr valign="middle"  >
        <td  align="left" ><font size="-1"  color="#420f8d"><?=$_SESSION[uName]?></font></td>
      </tr>
	
	  <tr >
        <td height="25" align="left" ><a href="logout.php"  class="logout">ออกจากระบบ</a></td>
      </tr> 

	  <tr>
        <td width="168"  height="20" align="center"background="images/menu_h_bg.jpg" class="menuBar">ตรวจรับ</td>
      </tr>
	    <tr >
        <td height="30"  align="left"   valign="middle" ><a href="?action=new_buy" class="catLink">- รับครุภัณฑ์</a></td>
      </tr>
	
	
	    <tr >
        <td height="30"  align="left"   valign="middle" ><a href="?action=seach_edit_1" class="catLink">- แก้ไข  / ลบ รับครุภัณฑ์</a></td>
      </tr>
	   <tr>
        <td width="168"  height="20" align="center"background="images/menu_h_bg.jpg" class="menuBar">เบิกพัสดุ</td>
      </tr>
	    <tr >
        <td height="30"  align="left"   valign="middle" ><a href="?action=seach_open" class="catLink">- เพิ่ม  เบิกครุภัณฑ์</a></td>
      </tr>

  <tr >
        <td height="30"  align="left"   valign="middle" ><a href="?action=seach_edit_open" class="catLink">- แก้ไข  / ลบ เบิกครุภัณฑ์</a></td>
      </tr>
	    <tr>
        <td width="168"  height="20" align="center"background="images/menu_h_bg.jpg" class="menuBar">การย้ายครุภัณฑ์</td>
      </tr>
	 <tr >
        <td height="30"  align="left"   valign="middle" ><a href="?action=seach_move" class="catLink">- เพิ่ม การย้ายครุภัณฑ์</a></td>
      </tr> 

	  	    <tr>
        <td width="168"  height="20" align="center"background="images/menu_h_bg.jpg" class="menuBar">การซ่อมบำรุง</td>
      </tr>
	    <tr >
        <td height="35"  align="left"   valign="middle" ><a href="?action=seach_service" class="catLink">- เพิ่ม  แก้ไข  / ลบ การซ่อมบำรุง</a></td>
      </tr>
<tr>
        <td width="168"  height="20" align="center"background="images/menu_h_bg.jpg" class="menuBar">หาเลขครุภัณฑ์</td>
      </tr>
	    <tr >
        <td height="35"  align="left"   valign="middle" ><a href="#" class="catLink" onClick="javascript:window.open('search_code.php','xxx','scrollbars=yes,width=500,height=500')">- หาเลขครุภัณฑ์</a></td>
      </tr>
	  <tr>
        <td  height="20" align="center" class="menuBar"background="images/menu_h_bg.jpg">รายงาน</td>
      </tr>
	  <tr >
        <td height="35"  align="left"   valign="middle" ><a href="?action=seach_control" class="catLink">- ทะเบียนคุม</a></td>
      </tr>
	  	  <tr>
        <td height="30"  align="left"  ><a href="?action=seach_all" class="catLink">- รายงานครุภัณฑ์</a></td>
      </tr>
	   <tr>
        <td  height="20" align="center" class="menuBar"background="images/menu_h_bg.jpg"> ตั้งค่า</td>
      </tr>
	   <tr>
        <td height="25"  align="left" ><a href="?action=add_type" class="catLink">- ประเภท</a></td>
      </tr>
	   <tr>
        <td height="25"  align="left" ><a href="?action=add_shop" class="catLink">- ร้านค้า</a></td>
      </tr>
	  <tr>
        <td height="25"  align="left" ><a href="?action=add_sec" class="catLink">- แผนก </a></td>
      </tr>
	  <tr>
	    <td height="25"  align="left" ><a href="?action=add_room" class="catLink">- ห้อง </a></td>
	    </tr>
	    <tr>
        <td height="25"  align="left" ><a href="?action=add_user" class="catLink">- ผู้ใช้</a></td>
      </tr>
	   <tr>
        <td  height="20" align="center" class="menuBar"background="images/menu_h_bg.jpg"> สำรองข้อมูล</td>
      </tr>
	  <tr>
        <td height="30"  align="left" ><a href="?action=backup" class="catLink">- สำรองข้อมูล</a></td>
      </tr>
	  
	  	  <? }?>
</table>	</td>
	<td width="10"><img src="images/template2_15.jpg" width="3"></td>
    <td width="713" align="left" style="border: #7292B8 1px solid;" valign="top" >
	<?
		if($action == 'new_buy') include("new_buy_1.php"); //
		elseif($action == 'view_detail') include("view_detail.php"); // รับแล้วเบิก
		elseif($action == 'view_detail_1') include("view_detail_1.php"); // แก้ไขตรวจรับ
		elseif($action == 'open_detail') include("open_detail.php"); //
		elseif($action == 'seach_edit_1') include("seach_edit_1.php"); //ค้นหาแก้ไขตรวจรับ
		elseif($action == 'seach_open') include("seach_open.php"); //ค้นหาเพื่อเบิก
		elseif($action == 'add_open') include("add_open.php"); //เพิ่ม / แก้ไขเบิก
		elseif($action == 'seach_edit_open') include("seach_edit_open.php"); //ค้นหาเพื่อเบิก
		elseif($action == 'edit_open') include("edit_open.php"); // แก้ไขการเบิก
		elseif($action == 'seach_move') include("seach_move.php"); //ค้นหาเพื่อบันทึกโยกย้าย
		elseif($action == 'add_move') include("add_move.php"); //ค้นหา
		elseif($action == 'seach_service') include("seach_service.php"); //ค้นหาเพื่อบันทึกซ่อมบำรุง
		elseif($action == 'add_service') include("add_service.php"); //ค้นหา
		//-------------------------ท ะ เ บี ย น คุ ม-------------------------------
		elseif($action == 'seach_control') include("seach_control.php"); //ค้นหา
		elseif($action == 'show_control') include("show_control.php"); //ค้นหา
		//------------------------รายงาน--------------------------------------
		elseif($action == 'report_receive') include("report_receive.php"); //รายงานการรับครุภัณฑ์
		elseif($action == 'report_open') include("report_open.php"); //รายงานการรับครุภัณฑ์
		//------------------------ตั้งค่า--------------------------------------
		elseif($action == 'add_type') include("add_type.php"); //ประเภททรัพย์สิน
		elseif($action == 'edit_type') include("edit_type.php"); //แก้ไขประเภททรัพย์สิน
		elseif($action == 'add_shop') include("add_shop.php"); //ร้านค้า
		elseif($action == 'edit_shop') include("edit_shop.php"); //แก้ไขร้านค้า
		elseif($action == 'add_sec') include("add_sec.php"); //แผนก
		elseif($action == 'edit_sec') include("edit_sec.php"); //แก้ไขแผนก
		elseif($action == 'add_room') include("add_room.php"); //ห้อง
		elseif($action == 'edit_room') include("edit_room.php"); //แก้ไขห้อง
		
		elseif($action == 'seach_all') include("seach_all.php"); //รายงานการเบิก
		elseif($action == 'report_open') include("report_open.php"); //รายงานการรับครุภัณฑ์
		
		elseif($_REQUEST["action"] == "backup")include("backup.php"); // backup ข้อมูล
		
	if($_SESSION['u_id'] == '' ) {
	?><br>
			<br>
	<form name="ff" action="login.php" method="post">
	<table width="46%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td align="center" colspan="2" style="border: #7292B8 1px solid;">
	<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center"  bordercolor="#5FB0F7">
  <tr>
    <td height="25" colspan="2" align="center" class="menuBar_login"><strong>
			เข้าสู่ระบบ	</strong></td>
  </tr>
    <tr>
    <td width="40%" align="center" height="35" class="login">
	ชื่อพนักงาน	</td>
	 <td width="60%" align="center" >
<input  type="text" name="user_name"></td>
  </tr>
      <tr class="login">
    <td width="40%" align="center" height="35" >
	รหัสผ่าน	</td>
	 <td width="60%" align="center">
	<input type="password"name="password" >	</td>
  </tr>
  <tr>
	 <td  align="center"  colspan="2" height="50">
<input type="submit" name="go"  value="เข้าสู่ระบบ">&nbsp;&nbsp;
<input  type="reset" name="ffff" value="ยกเลิก"></td>
  </tr>
</table></td>
  </tr>
</table>
</form>
			<?
	} 
	
	?>
<br><br><br><br>
	<?// }?>	</td>
  </tr>
  </table>
	</td>
	
	
</tr>
<tr bgcolor="#FFFFFF">
	<td colspan="3" align="center">
	<? include("footer.php")?>	</td>
</tr>
</table>





</td>
</tr>

</center>
</body>
</html>
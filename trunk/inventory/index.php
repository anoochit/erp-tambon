<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>
<html>
<head>
<title><?=$site?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

</head>
<script language="JavaScript" src="include/calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<table width="900" border='0' cellpadding='0' cellspacing='0'  align="center">
<tr>
	<td  align='center' ><table id='body' width='100%' border="0" cellpadding="0" cellspacing="0" >
<tr>
  <td  width="241"  height="100%"rowspan="2" valign="top"  background="images/IM/images/IM_03.jpg">
    <? include('menu.php')?></td>
	
		<td height="75" colspan="2" valign="top" background="images/IM/images/IM_03.jpg">
  <?include('header.php')?></td></tr>
<tr>
  <td   width="657" height="447" valign="top" background="images/IM/images/IM_03.jpg"><?
	//echo $action ."<br>";
 if($_SESSION[u_id] <>''){
		if($action == 'new_buy') include("new_buy.php"); //
		elseif($action == 'new_buy_1') include("new_buy_1.php"); //
		elseif($action == 'new_buy_p') include("new_buy_p.php"); //
		elseif($action == 'new_buy_1_p') include("new_buy_1_p.php"); //
		elseif($action == 'view_detail_1_p') include("view_detail_1_p.php"); // แก้ไขตรวจรับ
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
		
		elseif($action == 'edit_password')include("edit_password.php"); //แก้ไข
		
		elseif($_REQUEST["action"] == "dep_manage")include("dep_manage.php");
		//-------------------------ท ะ เ บี ย น คุ ม-------------------------------
		elseif($action == 'seach_control') include("seach_control.php"); //ค้นหา
		elseif($action == 'show_control') include("show_control.php"); //ค้นหา
		
		elseif($action == 'seach_control_p') include("seach_control_p.php"); //ค้นหา
		elseif($action == 'show_control_p') include("show_control_p.php"); //ค้นหา
		//------------------------รายงาน--------------------------------------
		elseif($action == 'report_receive') include("report_receive.php"); //รายงานการรับครุภัณฑ์
		elseif($action == 'report_open') include("report_open.php"); //รายงานการรับครุภัณฑ์
		elseif($action == 'report_send') include("report_send.php"); //รายงานจัดสรรครุภัณฑ์
		elseif($action == 'report_all') include("report_all.php"); //รายงาน
		elseif($action == 'report_all_1') include("report_all_1.php"); //รายงาน
		elseif($action == 'report_all_p') include("report_all_p.php"); //รายงาน
		elseif($action == 'report_end_garan')include("report_end_garan.php"); //รายงานหมดอายุ
		//------------------------ตั้งค่า--------------------------------------
		elseif($action == 'division') include('division.php'); // กอง
		elseif($action == 'add_division') include('add_division.php'); // กอง
		elseif($action == 'edit_division') include('edit_division.php'); // กอง
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
		elseif($_REQUEST["action"] == "" or $_REQUEST["action"] == "center") echo "<center><br><br><br><br><br><br><br><span class='style3'>ยินดีต้อนรับเข้าสู่ระบบ</span></center>"; //
		elseif($_REQUEST["action"] == "seach_edit_2")include("seach_edit_2.php"); //ค้นหาแก้ไขตรวจรับ
	}elseif($_SESSION['u_id'] == '' ) {
	?><br>
			<br>
	<form name="ff" action="login.php" method="post">
	<table width="300" border="0" cellspacing="1" cellpadding="1" align="center"  height="200" background="images/login.png">
  <tr>
    <td align="center" width="100%" height="100%" colspan="2" valign="top">
	<table width="100%" height="100%" border="0" align="center" cellpadding="1" cellspacing="0"   >
  <tr>
    <td height="70" colspan="2" align="center" ><strong>
			เข้าสู่ระบบ	</strong></td>
  </tr>
    <tr>
    <td width="40%" align="center" height="24" class="login">
	ชื่อพนักงาน	</td>
	 <td width="60%" align="center" >
<input  type="text" name="user_name"></td>
  </tr>
      <tr class="login">
    <td width="40%" align="center" height="24" >
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
	
	?>			</td>
</tr>

<tr><td colspan="3" valign="top" background="images/IM/images/IM_03.jpg"><img src="images/IM1/images/GM_18.jpg" width="943" height="115" ></td>
</tr>
</table>

</td>
</tr>
</table>
</body>
</html>
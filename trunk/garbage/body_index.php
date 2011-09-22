<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="100%"  align="center" valign="top"  ><?
 if($_SESSION[username] <>''){
		if($action == 'new_buy') include("new_buy.php"); //
		elseif($action == 'user') include("user.php"); //ข้อมูลผู้ใช้
		elseif($action == 'add_user') include("add_user.php"); //เพิ่มข้อมูลผู้ใช้
		elseif($action == 'edit_user') include("edit_user.php"); //แก้ไขข้อมูลผู้ใช้
		
		elseif($action == 'mooban') include("mooban.php"); //ข้อมูลหมู่บ้าน
		elseif($action == 'add_mooban') include("add_mooban.php"); //เพิ่มข้อมูลหมู่บ้าน
		elseif($action == 'edit_mooban') include("edit_mooban.php"); //แก้ไขข้อมูลหมู่บ้าน
		
		elseif($action == 'type_rec') include("type_rec.php"); //ข้อมูลประเภทรายรับ
		elseif($action == 'add_type_rec') include("add_type_rec.php"); //เพิ่มข้อมูลประเภทรายรับ
		elseif($action == 'edit_type_rec') include("edit_type_rec.php"); //แก้ไขข้อมูลประเภทรายรับ
		
		elseif($action == 'type_mem') include("type_mem.php"); //ข้อมูลประเภทผู้ขอใช้บริการ
		elseif($action == 'add_type_mem') include("add_type_mem.php"); //เพิ่มข้อมูลประเภทผู้ขอใช้บริการ
		elseif($action == 'edit_type_mem') include("edit_type_mem.php"); //แก้ไขข้อมูลประเภทผู้ขอใช้บริการ
		
		elseif($action == 'start') include("start.php"); //ข้อมูลประเภทผู้ขอใช้บริการ
		elseif($action == 'add_start') include("add_start.php"); //เพิ่มข้อมูลประเภทผู้ขอใช้บริการ
		elseif($action == 'edit_start') include("edit_start.php"); //แก้ไขข้อมูลประเภทผู้ขอใช้บริการ
		
		//--------------------------รายงาน----------------------------
		elseif($action == 'report_17') include("report_17.php"); //
		elseif($action == 'Rep_Monthly0') include("Rep_Monthly0.php"); //รวมรายงานสรุปจัดเก็บประจำเดือน
		elseif($action == 'report_Monthly1') include("report_Monthly1.php");//รายงานสรุปจัดเก็บประจำเดือนรวม
		elseif($action == 'report_remain') include("report_remain.php"); //รายงานบิลคงค้าง
		elseif($action == 'report_receipt') include("report_receipt.php"); //รายงานใช้ใบเสร็จ
		elseif($action == 'report_income') include("report_income.php"); //รายงานยอดตั้งเก็บ
		elseif($action == 'report_sumincome') include("report_sumincome.php"); //รายงานยอดเก็บได้ สำนักงาน + ในตอน
		elseif($action == 'report_Monthly7') include("report_Monthly7.php");//รายงานยอดตั้งเก็บและเก็บได้ประจำเดือน
		elseif($action == 'report_Monthly8') include("report_Monthly8.php");//รายงานค้างชำระแยกตามเดือน/ปี
		elseif($action == 'report_Monthly8_2') include("report_Monthly8_2.php");//รายงานค้างชำระแยกตามเดือน/ปี
		elseif($action == 'report_Member') include("report_Member.php"); //รายงานรายชื่อผู้ใช้บริการจัดเก็บ
		elseif($action == 'report_NewMember') include("report_NewMember.php"); //รายงานรายชื่อผู้ใช้บริการจัดเก็บ (รายใหม่)
		elseif($action == 'report_P32') include("report_P32.php"); //รายงาน ป.32
		elseif($action == 'report_year') include("report_year.php"); //รายงานสรุปประจำปี
		elseif($action == 'report_MemDrop') include("report_MemDrop.php"); //รายงานรายชื่อผู้ขอยกเลิกใช้บริการจัดเก็บ
		elseif($action == 'find_remain') include("find_remain.php"); //รายงานลูกหนี้คงค้าง+พิมพ์ใบแจ้งหนี้
		elseif($action == 'report_CancelRep') include("report_CancelRep.php"); //รายงานยกเลิกใบเสร็จ
		//----------------------------------- ออกใบเสร็จ ---------------------------------------------
		elseif($action =='frm_receive') include ("frm_receive.php");
		//----------------------------------- ยืนยันใบเสร็จรับเงินที่ชำระแล้ว---------------------------------------------
		elseif($action =='frm_pay') include ("frm_pay.php");
		
		//----------------------------------- แก้ไขข้อมูลใบเสร็จรับเงิน--------------------------------------------
		elseif($action =='frm_edit') include ("frm_edit.php");
		//----------------------------------- พิมใบเสร็จย้อนหลัง-------------------------------------------
		elseif($action =='frm_pbreceive') include ("frm_pbreceive.php");
		//----------------------------------- แก้ไขข้อมูล------------------------------------------
		elseif($action =='frm_Alledit') include ("frm_Alledit.php");		
				
		//----------------------------------- สมาชิก ---------------------------------------------
		elseif($action == 'add_mem') include("add_mem.php"); //เพิ่มทะเบียนผู้ขอใช้บริการ
		elseif($action == 'edit_mem') include("edit_mem.php"); //แก้ไขทะเบียนผู้ขอใช้บริการ
		elseif($action == 'view_detail_mem') include("view_detail_mem.php"); //แก้ไขทะเบียนผู้ขอใช้บริการ
		elseif( $action =='find_mem') include("find_mem.php"); //
		elseif($action == '' or $action == 'center') echo "<center><br><br><br><br><br><br><br><span class='TextWellcome'>ยินดีต้อนรับเข้าสู่ระบบ</span></center>"; //

	}elseif($_SESSION['username'] == '' ) {
	?>
        <br>
        <br>
        <form name="ff" action="login.php" method="post">
          <table width="352" border="0" cellspacing="1" cellpadding="1" align="center"  height="212" background="images/GM/images/login.png">
            <tr>
              <td align="center" width="100%" height="100%" colspan="2" valign="top">
                  <table width="100%" height="100%" border="0" align="center" cellpadding="1" cellspacing="0"   >
                    <tr>
                      <td height="70" colspan="2" align="center" class="login" ><span class="style7">เข้าสู่ระบบ</span></td>
                    </tr>
                    <tr>
                      <td width="40%" height="32" align="center" class="login"> ชื่อพนักงาน </td>
                      <td width="60%" align="center" ><div align="left">
                          <input  type="text" name="pwd_username" size="15">
                      </div></td>
                    </tr>
                    <tr class="login">
                      <td width="40%" align="center" height="33" ><span class="login">รหัสผ่าน</span> </td>
                      <td width="60%" align="center"><div align="left">
                          <input type="password"name="pwd_passwd"  size="15">
                      </div></td>
                    </tr>
                    <tr>
                      <td height="50"  colspan="2"  align="center" valign="middle"><input type="submit" name="go"  value="เข้าสู่ระบบ">
                        &nbsp;&nbsp;
                      <input  type="reset" name="ffff" value="ยกเลิก"></td>
                    </tr>
                </table></td>
            </tr>
          </table>
        </form>
      <?
	} 
	
	?>
        <br>
      <br>
      <br>
      <br>
    </td>
  </tr>
</table>
<script language="javascript">
function Q_confirm()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
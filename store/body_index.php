<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
.login {
	font-family: Tahoma;
	font-size: 12pt;
	color: #2E578A;
	font-weight: lighter;
	line-height: normal;
}
</style>
<script language="JavaScript" src="include/calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<style type="text/css">
.style5 {color: #424027}
.style6 {color: #454126}
.style7 {
	font-size: 16px;
	font-weight: bold;
}
</style>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
          <td width="100%"  align="center" valign="top"  >
	<?
 if($_SESSION[u_id] <>''){
		if($action == 'new_buy') include("new_buy.php"); 
		elseif($action == 'new_buy_old') include("new_buy_old.php"); 
		elseif($action == 'new_buy_1') include("new_buy_1.php"); 
		elseif($action == 'new_buy_s') include("new_buy_s.php"); 
		elseif($action== 'seach_edit_1' ) include("seach_edit_1.php"); 
		elseif($action == 'view_detail_1')include("view_detail_1.php"); 
		elseif($_REQUEST["action"] == "center") echo "<center><br><br><br><br><br><span class='style3'>ยินดีต้อนรับเข้าสู่ระบบ</span></center>"; //
		elseif($action == 'seach_confirm') include("seach_confirm.php"); 
		elseif($action == 'confirm_buy') include("comfirm_buy.php"); 
		elseif($action == 'seach_confirm_s') include("seach_confirm_s.php"); 
		elseif($action == 'confirm_buy_s') include("comfirm_buy_s.php"); 
		elseif($action == 'seach_edit_confirm') include("seach_edit_confirm.php"); 
		elseif($action == 'confirm_edit_buy') include("comfirm_edit_buy.php"); 
		elseif($action == 'seach_edit_confirm_s') include("seach_edit_confirm_s.php");
		elseif($action == 'confirm_edit_buy_s') include("comfirm_edit_buy_s.php"); 
		
		elseif($action == 'seach_edit_1') include("seach_edit_1.php"); 
		elseif($action == 'edit_buy') include("edit_buy.php"); 
		elseif($action == 'seach_edit_s') include("seach_edit_s.php"); 
		elseif($action == 'edit_buy_s') include("edit_buy_s.php"); 
		
		elseif($action == 'view_detail_s')include("view_detail_s.php"); 
		elseif($action == 'view_detail')include("view_detail.php"); 
		elseif($action == 'add_type')include("add_type.php"); 
		elseif($action == 'edit_type')include("edit_type.php"); 
		
		elseif($action == 'product')include("product.php"); 
		elseif($action == 'add_product')include("add_product.php"); 
		elseif($action == 'edit_product')include("edit_product.php"); 
		
		elseif($action == 'shop')include("shop.php");
		elseif($action == 'add_shop')include("add_shop.php"); 
		elseif($action == 'edit_shop')include("edit_shop.php"); 
		
		elseif($action == 'add_user')include("add_user.php"); 
		elseif($action == 'add_user1')include("add_user1.php"); 
		elseif($action == 'edit_user')include("edit_user.php");
		
		elseif($action == 'edit_user1')include("edit_user1.php"); 
		elseif($action == 'edit_password')include("edit_password.php"); 
		
		elseif($action == 'pay_product')include("pay_product.php"); 
		elseif($action == 'find_edit_pay_product')include("find_edit_pay_product.php"); 
		elseif($action == 'edit_pay_product')include("edit_pay_product.php"); 
		elseif($action == 'view_detail_pay')include("view_detail_pay.php"); 
		//รายงาน
		elseif($action == 'report_recieve')include("report_recieve.php"); //รายงานตรวจรับ
		elseif($action == 'report_pay')include("report_pay.php"); //รายงานเบิก
		elseif($action == 'report_repay')include("report_repay.php"); //รายงานเบิก -รับ
		elseif($action == 'report_last')include("report_last.php"); //รายงานล่าสุด
		elseif($action == 'report_end')include("report_end.php"); //ใกล้หมด
		
		elseif($_REQUEST["action"] == "backup")include("backup.php"); // backup ข้อมูล
		elseif($action == 'seach_edit_2') include('seach_edit_2.php');
		elseif($action == 'new_buy_2_1') include("new_buy_2_1.php");
		elseif($action == 'new_buy_2_2') include("new_buy_2_2.php"); 
		elseif($action == 'view_detail_2')include("view_detail_2.php");
		
		elseif($action == 'seach_edit_3') include('seach_edit_3.php');
		elseif($action == 'new_buy_3_1') include("new_buy_3_1.php"); 
		elseif($action == 'new_buy_3_2') include("new_buy_3_2.php"); 
		elseif($action == 'view_detail_3')include("view_detail_3.php"); 
		
		elseif($action == 'division') include('division.php');
		elseif($action == 'add_division') include('add_division.php'); 
		elseif($action == 'edit_division') include('edit_division.php'); 
		
	}elseif($_SESSION['u_id'] == '' ) {
	?><br>
			<br>
	<form name="ff" action="login.php" method="post">
	<table width="352" border="0" cellspacing="1" cellpadding="1" align="center"  height="234" background="images/SM1/blue5-2.png">
  <tr>
    <td align="center" width="100%" height="230" colspan="2" valign="top">
	<table width="100%" height="230" border="0" align="center" cellpadding="1" cellspacing="0"   >
  <tr>
    <td height="80" colspan="2" align="center" ><span class="style7">เข้าสู่ระบบ</span></td>
  </tr>
    <tr>
    <td width="40%" height="32" align="center" class="login style5">
	ชื่อพนักงาน	</td>
	 <td width="60%" align="center" >
<input  type="text" name="user_name"></td>
  </tr>
      <tr class="login">
    <td width="40%" align="center" height="33" >
	  <span class="style6">รหัสผ่าน</span> </td>
	 <td width="60%" align="center">
	<input type="password"name="password" >	</td>
  </tr>
  <tr>
	 <td  align="center"  colspan="2" height="80">
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
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
<!--
.login {
	font-family: Tahoma;
	font-size: 12pt;
	color: #2E578A;
	font-weight: lighter;
	line-height: normal;
}
.style5 {color: #000066;
font-family: Tahoma;
font-size: 13px;
text-decoration:none;
font-style:normal;
}
.style30 {font-size: 16px}
.style31 {
	font-size: 100%;
	font-weight: bold;
}
-->
</style>
<? ?>
<table width='241' border="0" cellpadding="0" cellspacing="0" >
<tr>
		<td>
								<table width='241' height="0" border="0" cellpadding="0" cellspacing="0" >
									  <tr>
									    <td valign="middle"> <img src="images/MIS1/images/GM_01.jpg" width="242" height="127" /></td>
									  </tr>
							<tr><td  valign="top">
												<table width='241' height="0" border="0" cellpadding="0" cellspacing="0" >
													<tr>
														<td valign="top">
																	<table id="Table_01" width="241" height="237" border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="38" ><img src="images/MIS1/images/MIS_03.jpg" width="38" height="439"></td>
																		<td width="204" valign="top"  background="images/MIS1/images/MIS_04.jpg">
																		
	<table width="204"    background="images/MIS1/images/MIS_04.jpg"border="0" cellpadding="0" cellspacing="0" >
<? if($_SESSION[username] <>''){?>
 <tr>
	    <td  height="25" align="center">&nbsp;<span class="style30">หน้าหลัก</span></td>
	    </tr>
	
	  <tr >
        <td height="35"  align="left">&nbsp;&nbsp;<img src="images/purple01_next.gif">&nbsp;<a href="index.php"  ><span class="style5 style24">กลับสู่หน้าหลัก</span></a></td>
      </tr>
	
	   <tr>
	    <td  height="20" align="center"background="images/MIS1/images/MIS_04.jpg" class="menuBar">&nbsp;</td>
	    </tr>
		<? 
		if($_SESSION[username] <>'' and $_SESSION['pivilage'] != '2'){
		?> 
	   <tr>
        <td  height="40" align="center"background="images/MIS1/images/MIS_04.jpg" class="style26 menuBar"><span class="style5"> บุคลากร</span></td>
      </tr>
	    <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=find_person" class="catLink">ข้าราชการ/ลูกจ้าง/พนักงาน</a></td>
      </tr> 
	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=find_person_1" class="catLink">นายก/รองนายก/สมาชิกสภาฯลฯ</a></td>
      </tr>
<? }?>
	  <? 
	  
	  if($_SESSION[username] <>'' ){?>
	  <tr >
        <td height="35" align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"  class="logout style31">ออกจากระบบ</a></td>
      </tr> 

	  <tr>
        <td  height="35" align="center"background="images/MIS1/images/MIS_04.jpg" class="style5">รายงาน</td>
      </tr>
	  <? }?>
	  <? if($_SESSION['pivilage'] == '1' or $_SESSION['pivilage'] == '2') {?>
	  
	  	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_num_per" class="catLink">จำนวนบุคลากร</a></td>
      </tr>
	    <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_train" class="catLink">การฝึกอบรม</a></td>
      </tr>
	  	 <? } 

		 if($_SESSION['pivilage'] == '1'  or $_SESSION['pivilage'] == '0' or $_SESSION['pivilage'] == '2') {?>
	   <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_la" class="catLink">การลา / มาสาย / ขาด</a></td>
      </tr> 
	   <? } 
	   
	    if($_SESSION['pivilage'] == '1' or $_SESSION['pivilage'] == '2' ) {?>
	    <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_pay" class="catLink">เงินเดือน</a></td>
      </tr> 
	    <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_law" class="catLink">การลงโทษ</a></td>
      </tr> 
	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_coin" class="catLink">การรับเหรียญพระราชทาน</a></td>
      </tr> 
	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_dep_sec" class="catLink">ปฎิบัติราชการใช้กฎอัยการศึก</a></td>
      </tr> 
	   <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_his" class="catLink">รายงานทะเบียนประวัติ ข้าราชการ/ลูกจ้าง/พนักงาน</a></td>
      </tr>
		  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_his_h" class="catLink">รายงานทะเบียนประวัติ นายก/รองนายก/สมาชิกสภาฯลฯ</a></td>
      </tr> 
	  <? }?>
	  <? // }
	   if($_SESSION['pivilage'] == '1'   ) { ?>
	   <tr>
        <td  height="35" align="center"background="images/MIS1/images/MIS_04.jpg" class="style5"> ตั้งค่า</td>
      </tr>
	   <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=dep_manage" class="catLink">กอง</a></td>
      </tr>
	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=add_subdivision" class="catLink">ฝ่าย</a></td>
      </tr>  
	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=user" class="catLink">ผู้ใช้งาน</a></td>
      </tr>
	
	 <? }?> <? }?> <? //}?>
	  
</table>
</td></tr>
</table>
</td></tr>
<tr>
																		<td colspan="3">
																			<img src="images/MIS1/images/MIS_08.jpg" width="242" height="30" alt=""></td>
												  </tr></table>
	</td>
	</tr>
	
	</table>
	</td></tr>
	</table>
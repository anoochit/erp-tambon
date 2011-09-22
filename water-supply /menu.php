<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css">
								<table width='242' height="0" border="0" cellpadding="0" cellspacing="0" >
									  <tr>
									    <td  ><img src="images/PM1/images/GM_01.jpg"  width="242" height="135" /></td>					
							         </tr>
								  <tr><td >
												<table width='242' height="0" border="0" cellpadding="0" cellspacing="0" >
													<tr>
														<td>
																	<table id="Table_01" width="242" height="237" border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td  width="38"   background="images/PM1/images/PM_03.jpg"><img src="images/PM1/images/PM_03.jpg" width="38" height="431" /></td>
																		<td width="204"  valign="top" background="images/PM1/images/PM_04.jpg">
															<table width="204" border="0" align="right" cellpadding="0" cellspacing="0" background="images/PM1/images/PM_04.jpg">
														      <tr>
															    <td  width="204" valign="top" ><!-- ส่วนเมนูด้านซ้าย -->
	  <? //include("menu_1.php")?>
	  	  

<table width="204" height="493" border="0" align="center" cellpadding="0" cellspacing="0" >
		<? if($_SESSION[username] <>''){?>
	  <tr>
        <td width="204"  height="20"  class="menuBar" ><div align="left">&nbsp;&nbsp;&nbsp;หน้าหลัก</div></td>
      </tr>
	  <tr>
        <td height="30"  align="left"><a href="?action=center"  class="catLink" >&nbsp;&nbsp;&nbsp;&nbsp;&omicron; กลับสู่หน้าหลัก</a></td>
      </tr>


<tr>
        <td  height="20" align="center"   class="menuBar"><div align="left">&nbsp;&nbsp;&nbsp;ระบบควบคุม</div></td>
      </tr>
	  <tr >
        <td height="20" >
		<div align="left">&nbsp;&nbsp;&nbsp;&nbsp;<?=$_SESSION[pwd_username]?></font></div>
		          <a href="logout.php"  class="logout">ออกจากระบบ</a></td>
      </tr> 
	  <tr>
        <td  height="20" align="center" class="menuBar"><div align="left">&nbsp;&nbsp;&nbsp;ข้อมูลผู้ขอใช้น้ำ</div></td>
      </tr>
	  <? //if($_SESSION[div_id] =='0'){?>
	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=find_mem" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ทะเบียนผู้ขอใช้น้ำ</a></td>
      </tr>
<tr>
        <td  height="20" align="center" class="menuBar"><div align="left">&nbsp;&nbsp;&nbsp;จัดการใบเสร็จ</div></td>
      </tr>
	  <? //if($_SESSION[div_id] =='0'){?>
	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_meter2" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; บันทึกมาตรวัดน้ำประจำเดือน</a></td>
      </tr>
	  	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_receive" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ใบเสร็จรับเงิน</a></td>
      </tr>
	    	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_pay" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ยืนยันใบเสร็จรับเงินที่รับชำระแล้ว</a></td>
      </tr>
	      	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_edit" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; แก้ไขข้อมูลมาตร/ใบเสร็จรับเงิน</a></td>
      </tr>
	 	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_pbreceive" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; พิมพ์ใบเสร็จรับเงินย้อนหลัง</a></td>
      </tr>
	  	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_Alledit" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; แก้ไขข้อมูล</a></td>
      </tr>
	 <tr>
        <td  height="20" align="center" class="menuBar"><div align="left">&nbsp;&nbsp;&nbsp;รายงาน</div></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=report_17"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ป. 17</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><span class="style23"><a href="?action=report_Member"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานผู้ขอใช้น้ำประปา</a></span></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><span class="style23"><a href="?action=report_NewMember"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานผู้ขอใช้น้ำประปาใหม่</a></span></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><span class="style23"><a href="?action=report_MemDrop"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานผู้ขอยกเลิกใช้น้ำประปา</a> </span></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=find_remain"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานค้างชำระ+พิมพ์ใบเตือน</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=report_CancelRep"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานยกเลิกใบเสร็จ </a></td>
      </tr>
	   <tr>
        <td height="20"  align="left"  ><a href="?action=report_remainall"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานใบเสร็จค้างชำระ</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=Rep_FindMeter0"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานตรวจสอบเลขมาตรคงที่</a></td>
      </tr>
  <tr>
        <td height="20"  align="left"  ><a href="?action=Rep_FindMeterMax"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานตรวจสอบค่าน้ำสูง</a></td>
      </tr>	
	 <tr>
        <td height="20"  align="left"  ><a href="?action=Rep_Monthly0"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานสรุปประจำเดือน</a></td>
      </tr>
	    <tr>
        <td height="20"  align="left"  ><span class="style23"><a href="?action=report_year"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; สรุปจัดเก็บค่าน้ำประปาประจำปี</a></span></td>
      </tr>  
	  <? if($_SESSION[pwd_priv] =='2'){?>
	   <tr>
        <td  height="20" align="center" class="menuBar"> <div align="left">&nbsp;&nbsp;&nbsp;ตั้งค่า</div></td>
      </tr>
	   <tr>
        <td height="20"  align="left" ><a href="?action=user" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ข้อมูลผู้ใช้</a></td>
      </tr>
	    <tr>
        <td height="20"  align="left" ><a href="?action=start" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ข้อมูลเริ่มต้น</a></td>
      </tr>
	   <tr>
        <td height="20"  align="left" ><a href="?action=mooban" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ข้อมูลหมู่บ้าน</a></td>
      </tr>
	    <tr>
        <td height="20"  align="left" ><a href="?action=zone" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ข้อมูลหมู่เขต</a></td>
      </tr>
	   <tr>
        <td height="20"  align="left" ><a href="?action=type_mem" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ข้อมูลประเภทผู้ขอใช้บริการ</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left" ><a href="?action=service" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ค่าเช่ามาตรน้ำ(อุปกรณ์)</a></td>
      </tr>
	  	  <tr>
        <td height="20"  align="left" ><a href="?action=rate" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; อัตราค่าน้ำประปา</a></td>
      </tr>
	<? }?><? }?>
	</table>	</td>
															  </tr>
																	  </table></td>
																	</tr>
																	
																	
																	<tr>
																		<td colspan="2"><img src="images/PM1/images/PM_08.jpg" width="242" height="34" alt="" /></td>
																	</tr>
														  </table>	</td></tr>
									</table>
											</td></tr>
		  </table>

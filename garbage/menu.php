<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css">
<table width='242' border="0" cellpadding="0" cellspacing="0"   >
 <tr>
		<td  bgcolor="#FFFFFF">
								<table width='242' height="0" border="0" cellpadding="0" cellspacing="0" >
									  <tr>
									    <td width="242" height='135'   valign="middle" ><img src="images/GM1/images/GM_01.jpg" width="242" height="135" /></td>					
							         </tr>
								  <tr><td >
												<table width='230' height="0" border="0" cellpadding="0" cellspacing="0" >
													<tr>
														<td>
																	<table id="Table_01" width="233" height="237" border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="38" background="images/GM1/images/GM_03-04.jpg">
																			<img src="images/GM1/images/GM_03-04.jpg" width="38" height="431" ></td>
																		<td width="204"  valign="top" background="images/GM1/images/GM_04.jpg">
															<table width="196" border="0" align="right" cellpadding="0" cellspacing="0">
														      <tr>
																   <td  width="196" valign="top" ><!-- ส่วนเมนูด้านซ้าย -->
<table width="100%" height="493" border="0" align="center" cellpadding="0" cellspacing="0" >
		<? if($_SESSION[username] <>''){?>
	  <tr>
        <td width="193"  height="20" align="center" class="menuBar2"  ><div align="left">&nbsp;&nbsp;&nbsp;หน้าหลัก</div></td>
      </tr>
	  <tr>
        <td height="30"  align="left"><a href="?action=center"  class="catLink" >&nbsp;&nbsp;&nbsp;&nbsp;&omicron; กลับสู่หน้าหลัก</a></td>
      </tr>
<tr>
        <td  height="20" align="center"   class="menuBar2"><div align="left">&nbsp;&nbsp;&nbsp;ระบบควบคุม</div></td>
      </tr>
	  <tr >
        <td height="25">
		<div align="left"><font size="-1"  color="#00CCFF">&nbsp;&nbsp;&nbsp;&nbsp;<?=$_SESSION[pwd_username]?></font></div>
		          <a href="logout.php"  class="logout style22">ออกจากระบบ</a></td>
      </tr> 
	  <tr>
        <td  height="20" align="center" class="menuBar2"><div align="left">&nbsp;&nbsp;&nbsp;ทะเบียนผู้ขอใช้บริการ</div></td>
      </tr>
	  <tr >
        <td height="25"  align="left"   valign="middle" ><a href="?action=find_mem" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ทะเบียนผู้ขอใช้บริการ</a></td>
      </tr>
<tr>
        <td  height="20" align="center" class="menuBar2"><div align="left">&nbsp;&nbsp;&nbsp;จัดการใบเสร็จ</div></td>
      </tr>
	  <tr >
        <td height="25"  align="left"   valign="middle" ><a href="?action=frm_receive" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ใบเสร็จรับเงิน</a></td>
      </tr>
	  	  <tr >
        <td height="25"  align="left"   valign="middle" ><a href="?action=frm_pay" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ยืนยันใบเสร็จรับเงินที่ชำระแล้ว</a></td>
      </tr>
	  <? if($_SESSION[pwd_priv] =='2'){?>
	    	  <tr >
        <td height="25"  align="left"   valign="middle" ><a href="?action=frm_edit" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; แก้ไขข้อมูลใบเสร็จรับเงิน</a></td>
      </tr>
	  <tr >
        <td height="25"  align="left"   valign="middle" ><a href="?action=frm_pbreceive" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; พิมพ์ใบเสร็จรับเงินย้อนหลัง</a></td>
      </tr>
	  	  <tr >
        <td height="25"  align="left"   valign="middle" ><a href="?action=frm_Alledit" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; แก้ไขข้อมูล</a></td>
      </tr>
	  <? }?>
	  <tr>
        <td  height="20" align="center" class="menuBar2"><div align="left">&nbsp;&nbsp;&nbsp;รายงาน</div></td>
      </tr>
	 
	  <tr>
        <td height="20"  align="left"  ><a href="?action=report_17"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ป. 17</a></td>
      </tr>
	  <tr>
        <td height="25"  align="left"  ><a href="?action=Rep_Monthly0"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; สรุปจัดเก็บค่าขยะประจำเดือน</a></td>
      </tr>
	    <tr>
        <td height="20"  align="left"  ><a href="?action=report_year"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; สรุปจัดเก็บค่าขยะประจำปี</a></td>
      </tr>
	   
	    
	  <tr>
        <td height="20"  align="left"  ><a href="?action=report_Member"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานผู้ใช้บริการ</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=report_NewMember"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานผู้ขอใช้ (รายใหม่)</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=report_MemDrop"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานผู้ขอยกเลิกใช้บริการ </a></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=find_remain"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานค้างชำระ+พิมพ์ใบเตือน</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=report_CancelRep"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; รายงานยกเลิกใบเสร็จ </a></td>
      </tr>
	  <? if($_SESSION[pwd_priv] =='2'){?>
	   <tr>
        <td  height="20" align="center" class="menuBar2"> <div align="left">&nbsp;&nbsp;&nbsp;ตั้งค่า</div></td>
      </tr>
	   <tr>
        <td height="25"  align="left" ><a href="?action=user" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ข้อมูลผู้ใช้</a></td>
      </tr>
	    <tr>
        <td height="25"  align="left" ><a href="?action=start" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ข้อมูลเริ่มต้น</a></td>
      </tr>
	   <tr>
        <td height="25"  align="left" ><a href="?action=mooban" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ข้อมูลหมู่บ้าน</a></td>
      </tr>
	     <tr>
        <td height="25"  align="left" ><a href="?action=type_rec" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ข้อมูลประเภทถังขยะ</a></td>
      </tr>
	   <tr>
        <td height="25"  align="left" ><a href="?action=type_mem" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ข้อมูลประเภทผู้ขอใช้บริการ</a></td>
      </tr>
	<? }?><? }?>
	</table>	</td>
															  </tr>
																	  </table></td>
																	</tr>
																	<tr>
																		<td colspan="3">
																			<img src="images/GM1/images/GM_08.jpg" width="242" height="34" alt=""></td>
																	</tr>
														  </table>	</td></tr>
									</table>
											</td></tr>
		  </table>
	</td>
</tr>
</table>

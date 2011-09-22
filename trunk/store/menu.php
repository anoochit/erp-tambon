<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css">
<style type="text/css">
<!--
.login {
	font-family: Tahoma;
	font-size: 12pt;
	color: #2E578A;
	font-weight: lighter;
	line-height: normal;
}
-->
</style>
<table width='242' border="0" cellpadding="0" cellspacing="0"   >
 <tr>
		<td width="242" >
								<table width='242' height="0" border="0" cellpadding="0" cellspacing="0" >
									  <tr>
									    <td width="242" height='135'   valign="middle" ><img src="images/SM1/images/GM_01.jpg" width="242" height="135" /></td>					
							         </tr>
								  <tr><td >
												<table width='241' height="0" border="0" cellpadding="0" cellspacing="0" >
													<tr>
														<td width="241">
																	<table id="Table_01" width="229" height="452" border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="38" bgcolor="#FFFFFF">
																			<img src="images/SM1/images/SM_03.jpg" width="38" height="431" ></td>
																		<td width="204"   valign="top"  background="images/SM1/images/SM_04.jpg">
															<table width="204"  background="images/SM1/images/SM_04.jpg" border="0" cellpadding="0" cellspacing="0">
														      <tr>
																   <td  width="204" valign="top"  ><!-- ส่วนเมนูด้านซ้าย -->
<table width="100%" height="517" border="0" align="center" cellpadding="0" cellspacing="0"  >
		<? if($_SESSION[u_id] <>''){?>
	  <tr>
        <td width="166"  height="20" align="center"   class="catLink1"><div align="center"><strong>หน้าหลัก</strong></div></td>
      </tr>
	  <tr>
        <td height="30"  align="left"><a href="?action=center"  ><span class="catLink">&nbsp;&nbsp;> กลับสู่หน้าหลัก</span></a></td>
      </tr>
	

<tr>
        <td  height="20" align="center"   class="catLink1"><div align="center">ระบบควบคุม</div></td>
      </tr>
	  <tr >
        <td height="25">
		<div align="left">&nbsp;&nbsp;<font size="-1"   color="#6600CC"><?=$_SESSION[uName]?></font><br />
		&nbsp;&nbsp;<a href="logout.php"  class="logout"><strong>ออกจากระบบ</strong></a></div></td>
      </tr> 

 <? if($_SESSION[div_id] !='1'){?>
	  <tr>
        <td  height="20" align="center" class="catLink1"><div align="center">ตรวจรับ</div></td>
      </tr>
	  <tr >
        <td height="25"  align="left"   valign="middle" ><a href="?action=seach_edit_1" class="catLink">&nbsp;&nbsp;> ทะเบียนรับพัสดุ</a></td>
      </tr>
	   <tr>
        <td  height="20" align="center" class="catLink1"><div align="center">เบิก</div></td>
      </tr> 
	  <tr>
	  <td height="25"  align="left"   valign="middle" ><a href="?action=seach_edit_2" class="catLink">&nbsp;&nbsp;> ทะเบียนเบิกพัสดุ</a></td>
	  </tr>
	<? }?>
	  <tr>
        <td  height="20" align="center" class="catLink1"><div align="center">รายงาน</div></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=report_recieve"class="catLink">&nbsp;&nbsp;> รายงานทะเบียนรับพัสดุ</a></td>
      </tr>
	  <tr>
        <td height="25"  align="left"  ><a href="?action=report_pay"class="catLink">&nbsp;&nbsp;> รายงานทะเบียนเบิกพัสดุ</a></td>
      </tr>
	    <tr>
        <td height="20"  align="left"  ><a href="?action=report_repay"class="catLink">&nbsp;&nbsp;> รายงาน รับ - เบิก พัสดุ</a></td>
      </tr>
	   <tr>
        <td height="20"  align="left"  ><a href="?action=report_last"class="catLink">&nbsp;&nbsp;> รายงานพัสดุคงเหลือ</a></td>
      </tr>
	    <tr>
        <td height="20"  align="left"  ><a href="?action=report_end"class="catLink">&nbsp;&nbsp;> รายงานพัสดุใกล้หมด</a></td>
      </tr>
	  <? if($_SESSION[div_id] =='0'){?>
	   <tr>
        <td  height="20" align="center" class="catLink1"> <div align="center">ตั้งค่า</div></td>
      </tr>
	   <tr>
        <td height="20"  align="left" ><a href="?action=add_type" class="catLink">&nbsp;&nbsp;> ประเภทพัสดุ</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left" ><a href="?action=product" class="catLink">&nbsp;&nbsp;> พัสดุ</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left" ><a href="?action=division" class="catLink">&nbsp;&nbsp;> กอง</a></td>
      </tr>
    <tr>
        <td height="20"  align="left" ><a href="?action=add_user" class="catLink">&nbsp;&nbsp;> ผู้ใช้</a></td>
      </tr> 
	
	<? }?>     <? }?>  

	  
	
</table>	</td>
															  </tr>
																	  </table></td>
																	</tr>
																	
																	
																	<tr>
																		<td colspan="3">
																			<img src="images/SM1/images/SM_08.jpg" width="242" height="34" alt=""></td>
																	</tr>
														  </table>	</td></tr>
									</table>
											</td></tr>
								
		  </table>
	</td>
</tr>

</table>

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
.style22 {color: #000000}
.style23 {color: #0000FF}

-->
</style>
<table width='241' border="0" cellpadding="0" cellspacing="0" >
 <tr>
		<td>
								<table width='241' height="0" border="0" cellpadding="0" cellspacing="0" >
									  <tr>
									    <td  valign="middle"> <img src="images/IM1/images/GM_01.jpg" width="242" height="135" /></td>
							      </tr><tr><td >
												<table width='241' height="0" border="0" cellpadding="0" cellspacing="0" >
													<tr>
														<td>
																	<table id="Table_01" width="241" height="237" border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="38">
																			<img src="images/IM1/images/IM_03.jpg" width="38" height="431"></td>
																		<td width="204" valign="top" background="images/IM1/images/IM_04.jpg">
															<table width="204" border="0" cellpadding="0" cellspacing="0" background="images/IM1images/IM_04.jpg">
														      <? if($_SESSION[u_id] <>''){?>
															  <tr>
																   <td  height="25" align="center" class="style22"><strong>˹����ѡ</strong></td>
															  </tr>
														      <tr>
   															    <td height="25"  align="left" background="images/IM1/images/IM_04.jpg"><a href="index.php"  class="catLink">&nbsp;
																	  <img src="images/radial_white.gif" width="11" height="11" border="0"> &nbsp;��Ѻ���˹����ѡ</a></td>
   														      </tr>
															  <tr>
   																	  <td height="25"  class="menuBar" align="center">�к��Ǻ���</td>
   															  </tr>
													          <tr valign="middle"  >
   																	     <td  align="left"  height="25"background="images/IM1/images/IM_04.jpg" bgcolor="#9ED174" ><span class="style23"><font size="-1">&nbsp;&nbsp;&nbsp;
													                     <?=$_SESSION[uName]?>
   																	     </font></span></td>
      														  </tr>
															  
														     <tr >
       																	 <td height="25" align="left" background="images/IM1/images/IM_04.jpg" >&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"  class="logout"><strong>�͡�ҡ�к�</strong></a></td>
      														</tr> 
											<? }?>
										<? if($_SESSION[piv] =='0'){?>				
														   <tr>
 																       <td height="25" class="menuBar" align="center">��Ǩ�Ѻ</td>
    													  </tr>
	 													  <tr >
       																	 <td height="25"  align="left"   valign="middle" background="images/IM1/images/IM_04.jpg"  >
																		 <a href="?action=seach_edit_1" class="catLink">&nbsp;
																		 <img src="images/radial_white.gif" border="0"> &nbsp;����¹�Ѻ����ѳ��	</a></td>
      													</tr>
													   <tr >
       																	<td height="25"  align="left"   valign="middle" background="images/IM1/images/IM_04.jpg" bgcolor="#9ED174" >
																		<a href="?action=seach_edit_2" class="catLink">&nbsp;
																		<img src="images/radial_white.gif" border="0"> &nbsp;����¹�Ѻ��ѧ�������Ѿ��</a></td>
      												  </tr>
														<tr>
															<td  height="30"  class="menuBar" align="center">��ë������ا</td>
								    					</tr>
														<tr >
																<td height="45"  align="left"   valign="middle" background="images/IM1/images/IM_04.jpg"  ><a href="?action=seach_service" class="catLink">&nbsp;
																<img src="images/radial_white.gif" border="0"> &nbsp;����  ���  / ź ��ë������ا</a></td>
													   </tr>
											    	
													<? }?>
									<? if($_SESSION[piv] =='0' or $_SESSION[piv] =='1' ){?>
													<tr>
															<td  height="25"  class="menuBar" align="center">��§ҹ</td>
													</tr>
													<tr >
																	<td height="25"  align="left"   valign="middle" background="images/IM1/images/IM_04.jpg"  >
																	<a href="#" class="catLink" onClick="javascript:window.open('search_code.php','xxx','scrollbars=yes,width=500,height=700')">
																	&nbsp;<img src="images/radial_white.gif" border="0">  &nbsp;&nbsp;���Ţ����ѳ��</a></td>
													</tr>
														
													<tr >
															<td height="25"  align="left"   valign="middle" background="images/IM1/images/IM_04.jpg"  ><a href="?action=seach_control" class="catLink">&nbsp;
															<img src="images/radial_white.gif" border="0"> &nbsp;����¹����ѳ��</a></td>
													</tr>
													<tr >
															<td height="25"  align="left"   valign="middle" background="images/IM1/images/IM_04.jpg" ><a href="?action=seach_control_p" class="catLink">&nbsp;
															<img src="images/radial_white.gif" border="0"> &nbsp;����¹��ѧ�������Ѿ��</a></td>
													</tr>
														
												   <tr>
															<td height="30"  align="left" background="images/IM1images/IM_04.jpg" ><a href="?action=report_send" class="catLink">&nbsp;
															<img src="images/radial_white.gif" border="0"> &nbsp;��§ҹ�Ѵ��ä���ѳ��</a></td>
												  </tr>
												 <tr>
															<td height="25"  align="left" background="images/IM1/images/IM_04.jpg" ><a href="?action=report_all_1" class="catLink">&nbsp;
															<img src="images/radial_white.gif" border="0"> &nbsp;��§ҹ����ѳ�� </a></td>
												</tr>
											   <tr>
															<td height="25"  align="left" background="images/IM1/images/IM_04.jpg" ><a href="?action=report_all_p" class="catLink">&nbsp;
															<img src="images/radial_white.gif" border="0"> &nbsp;��§ҹ��ѧ�������Ѿ��</a></td>
											  </tr>
											 <tr>
															<td height="25"  align="left" background="images/IM1/images/IM_04.jpg" ><a href="?action=report_end_garan" class="catLink">&nbsp;
															<img src="images/radial_white.gif" border="0"> &nbsp;��§ҹ����ѳ���������</a></td>
											  </tr>
														 
														  <? }?>
														  <? if($_SESSION[piv] =='0'){?>
														   <tr>
															<td  height="25"  class="menuBar" align="center"> ��駤��</td>
														  </tr>
													
														   <tr>
															<td height="25"  align="left" background="images/IM1/images/IM_04.jpg" ><a href="?action=add_type" class="catLink">&nbsp;
															<img src="images/radial_white.gif" border="0"> &nbsp;��������Ѿ���Թ</a></td>
														  </tr>
														  <tr>
															<td height="25"  align="left" background="images/IM1/images/IM_04.jpg" ><a href="?action=division" class="catLink">&nbsp;
															<img src="images/radial_white.gif" border="0"> &nbsp;�ͧ</a></td>
														  </tr>
														  <tr >
														<td height="25"  align="left"   valign="middle" ><a href="?action=edit_password" class="catLink">&nbsp;  
														<img src="images/radial_white.gif" width="11" height="11" border="0"> &nbsp;�����</a></td>
													  </tr>
														  <? }?>
														
																	  </table></td>
																		
																	</tr>
																	
																	
																	<tr>
																		<td colspan="3">
																			<img src="images/IM1/images/IM_08.jpg" width="242" height="34" alt=""></td>
																	</tr>
																	
														  </table>	</td></tr>
									</table>
											</td></tr>
							     
							      <tr>
										  <td width="269" height='25'   valign="middle" >
										  <div   class="news_1"></div>											  </td>
									  </tr>
											
		  </table>
	</td>
</tr>

</table>                   
 
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
															    <td  width="204" valign="top" ><!-- ��ǹ���ٴ�ҹ���� -->
	  <? //include("menu_1.php")?>
	  	  

<table width="204" height="493" border="0" align="center" cellpadding="0" cellspacing="0" >
		<? if($_SESSION[username] <>''){?>
	  <tr>
        <td width="204"  height="20"  class="menuBar" ><div align="left">&nbsp;&nbsp;&nbsp;˹����ѡ</div></td>
      </tr>
	  <tr>
        <td height="30"  align="left"><a href="?action=center"  class="catLink" >&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��Ѻ���˹����ѡ</a></td>
      </tr>


<tr>
        <td  height="20" align="center"   class="menuBar"><div align="left">&nbsp;&nbsp;&nbsp;�к��Ǻ���</div></td>
      </tr>
	  <tr >
        <td height="20" >
		<div align="left">&nbsp;&nbsp;&nbsp;&nbsp;<?=$_SESSION[pwd_username]?></font></div>
		����������<a href="logout.php"  class="logout">�͡�ҡ�к�</a></td>
      </tr> 
	  <tr>
        <td  height="20" align="center" class="menuBar"><div align="left">&nbsp;&nbsp;&nbsp;�����ż�������</div></td>
      </tr>
	  <? //if($_SESSION[div_id] =='0'){?>
	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=find_mem" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ����¹��������</a></td>
      </tr>
<tr>
        <td  height="20" align="center" class="menuBar"><div align="left">&nbsp;&nbsp;&nbsp;�Ѵ��������</div></td>
      </tr>
	  <? //if($_SESSION[div_id] =='0'){?>
	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_meter2" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; �ѹ�֡�ҵ��Ѵ��ӻ�Ш���͹</a></td>
      </tr>
	  	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_receive" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ������Ѻ�Թ</a></td>
      </tr>
	    	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_pay" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; �׹�ѹ������Ѻ�Թ����Ѻ��������</a></td>
      </tr>
	      	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_edit" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��䢢������ҵ�/������Ѻ�Թ</a></td>
      </tr>
	 	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_pbreceive" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; �����������Ѻ�Թ��͹��ѧ</a></td>
      </tr>
	  	  <tr >
        <td height="20"  align="left"   valign="middle" ><a href="?action=frm_Alledit" class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��䢢�����</a></td>
      </tr>
	 <tr>
        <td  height="20" align="center" class="menuBar"><div align="left">&nbsp;&nbsp;&nbsp;��§ҹ</div></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=report_17"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; �. 17</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><span class="style23"><a href="?action=report_Member"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��§ҹ�������ӻ�л�</a></span></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><span class="style23"><a href="?action=report_NewMember"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��§ҹ�������ӻ�л�����</a></span></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><span class="style23"><a href="?action=report_MemDrop"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��§ҹ����¡��ԡ���ӻ�л�</a> </span></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=find_remain"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��§ҹ��ҧ����+��������͹</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=report_CancelRep"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��§ҹ¡��ԡ����� </a></td>
      </tr>
	   <tr>
        <td height="20"  align="left"  ><a href="?action=report_remainall"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��§ҹ����稤�ҧ����</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left"  ><a href="?action=Rep_FindMeter0"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��§ҹ��Ǩ�ͺ�Ţ�ҵä����</a></td>
      </tr>
  <tr>
        <td height="20"  align="left"  ><a href="?action=Rep_FindMeterMax"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��§ҹ��Ǩ�ͺ��ҹ���٧</a></td>
      </tr>	
	 <tr>
        <td height="20"  align="left"  ><a href="?action=Rep_Monthly0"class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��§ҹ��ػ��Ш���͹</a></td>
      </tr>
	    <tr>
        <td height="20"  align="left"  ><span class="style23"><a href="?action=report_year"class="catLink">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ��ػ�Ѵ�纤�ҹ�ӻ�лһ�Шӻ�</a></span></td>
      </tr>  
	  <? if($_SESSION[pwd_priv] =='2'){?>
	   <tr>
        <td  height="20" align="center" class="menuBar"> <div align="left">&nbsp;&nbsp;&nbsp;��駤��</div></td>
      </tr>
	   <tr>
        <td height="20"  align="left" ><a href="?action=user" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; �����ż����</a></td>
      </tr>
	    <tr>
        <td height="20"  align="left" ><a href="?action=start" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; �������������</a></td>
      </tr>
	   <tr>
        <td height="20"  align="left" ><a href="?action=mooban" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; �����������ҹ</a></td>
      </tr>
	    <tr>
        <td height="20"  align="left" ><a href="?action=zone" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; ����������ࢵ</a></td>
      </tr>
	   <tr>
        <td height="20"  align="left" ><a href="?action=type_mem" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; �����Ż������������ԡ��</a></td>
      </tr>
	  <tr>
        <td height="20"  align="left" ><a href="?action=service" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; �������ҵù��(�ػ�ó�)</a></td>
      </tr>
	  	  <tr>
        <td height="20"  align="left" ><a href="?action=rate" class="catLink style23">&nbsp;&nbsp;&nbsp;&nbsp;&omicron; �ѵ�Ҥ�ҹ�ӻ�л�</a></td>
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

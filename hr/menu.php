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
	    <td  height="25" align="center">&nbsp;<span class="style30">˹����ѡ</span></td>
	    </tr>
	
	  <tr >
        <td height="35"  align="left">&nbsp;&nbsp;<img src="images/purple01_next.gif">&nbsp;<a href="index.php"  ><span class="style5 style24">��Ѻ���˹����ѡ</span></a></td>
      </tr>
	
	   <tr>
	    <td  height="20" align="center"background="images/MIS1/images/MIS_04.jpg" class="menuBar">&nbsp;</td>
	    </tr>
		<? 
		if($_SESSION[username] <>'' and $_SESSION['pivilage'] != '2'){
		?> 
	   <tr>
        <td  height="40" align="center"background="images/MIS1/images/MIS_04.jpg" class="style26 menuBar"><span class="style5"> �ؤ�ҡ�</span></td>
      </tr>
	    <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=find_person" class="catLink">����Ҫ���/�١��ҧ/��ѡ�ҹ</a></td>
      </tr> 
	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=find_person_1" class="catLink">��¡/�ͧ��¡/��Ҫԡ������</a></td>
      </tr>
<? }?>
	  <? 
	  
	  if($_SESSION[username] <>'' ){?>
	  <tr >
        <td height="35" align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"  class="logout style31">�͡�ҡ�к�</a></td>
      </tr> 

	  <tr>
        <td  height="35" align="center"background="images/MIS1/images/MIS_04.jpg" class="style5">��§ҹ</td>
      </tr>
	  <? }?>
	  <? if($_SESSION['pivilage'] == '1' or $_SESSION['pivilage'] == '2') {?>
	  
	  	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_num_per" class="catLink">�ӹǹ�ؤ�ҡ�</a></td>
      </tr>
	    <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_train" class="catLink">��ý֡ͺ��</a></td>
      </tr>
	  	 <? } 

		 if($_SESSION['pivilage'] == '1'  or $_SESSION['pivilage'] == '0' or $_SESSION['pivilage'] == '2') {?>
	   <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_la" class="catLink">����� / ����� / �Ҵ</a></td>
      </tr> 
	   <? } 
	   
	    if($_SESSION['pivilage'] == '1' or $_SESSION['pivilage'] == '2' ) {?>
	    <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_pay" class="catLink">�Թ��͹</a></td>
      </tr> 
	    <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_law" class="catLink">���ŧ��</a></td>
      </tr> 
	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_coin" class="catLink">����Ѻ����­����Ҫ�ҹ</a></td>
      </tr> 
	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_dep_sec" class="catLink">��Ժѵ��Ҫ����顮��¡���֡</a></td>
      </tr> 
	   <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_his" class="catLink">��§ҹ����¹����ѵ� ����Ҫ���/�١��ҧ/��ѡ�ҹ</a></td>
      </tr>
		  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg"  >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=report_his_h" class="catLink">��§ҹ����¹����ѵ� ��¡/�ͧ��¡/��Ҫԡ������</a></td>
      </tr> 
	  <? }?>
	  <? // }
	   if($_SESSION['pivilage'] == '1'   ) { ?>
	   <tr>
        <td  height="35" align="center"background="images/MIS1/images/MIS_04.jpg" class="style5"> ��駤��</td>
      </tr>
	   <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=dep_manage" class="catLink">�ͧ</a></td>
      </tr>
	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=add_subdivision" class="catLink">����</a></td>
      </tr>  
	  <tr>
        <td height="35"  align="left" background="images/MIS1/images/MIS_04.jpg" >&nbsp;&nbsp;<img src="images/white01_next.gif" width="11" height="11">&nbsp;<a href="?action=user" class="catLink">�����ҹ</a></td>
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
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};
//dochange �ж١���¡������ա�����͡ ��¡�� Combobox ��觨з��������¡ AJAX ������ͧ�͢����ŶѴ仨ҡ Server
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //�Ѻ��ҡ�Ѻ��
               } 
          }
     };
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}
</script>
<style type="text/css">
.style20 {
	color: #000000;
	font-size: 13px;
	text-decoration: none;
	font-family: Tahoma;
	}
</style>
<link href="style2.css" rel="stylesheet" type="text/css">
<body>
<form name="f12" method="post"  action=""   >
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25" >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;<span class="style20">��§ҹ��èѴ�纤�Ҹ������������Ž�»�Ш���͹</span></div>	</td>
	</tr>
</table>	</td>
	</tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
	<tr class="bmText" height="25">
			<td width="7%"><strong>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dia_gray.gif" width="10" height="10"></strong></td>
                    <td  class="style20"  ><a href="?action=report_Monthly1">��§ҹ��ػ��ҨѴ��</a></td>
                  </tr>
				  <tr class="bmText" height="25">
			<td width="7%"><strong>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dia_gray.gif" width="10" height="10"></strong></td>
                    <td  class="style20"  ><a href="?action=report_remain">��§ҹ��ػ��Ҹ���������ҧ����</a></td>
                  </tr>
				  <tr class="bmText" height="25">
			<td width="7%"><strong>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dia_gray.gif" width="10" height="10"></strong></td>
                    <td  class="style20" ><a href="?action=report_receipt">��§ҹ��ػ����������</a></td>  
                  </tr>
				  <tr class="bmText" height="25">
			<td width="7%"><strong>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dia_gray.gif" width="10" height="10"></strong></td>
                    <td class="style20"  ><a href="?action=report_P32">��§ҹ �.32 (�����ŨѴ��������ѹ)</a> </td>
                  </tr>
				  <tr class="bmText" height="25">
			<td width="7%"><strong>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dia_gray.gif" width="10" height="10"></strong></td>
                    <td  class="style20" ><a href="?action=report_income">��§ҹ�ʹ�����</a></td>
                  </tr>
				  <tr class="bmText" height="25">
			<td width="7%"><strong>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dia_gray.gif" width="10" height="10"></strong></td>
                    <td class="style20"  ><a href="?action=report_sumincome">��§ҹ��ػ�ʹ�Ѵ�纻�Ш���͹(�Դ�����͹)</a></td>
                  </tr>
				  <tr class="bmText" height="25">
			<td width="7%"><strong>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dia_gray.gif" width="10" height="10"></strong></td>
                    <td class="style20"  ><a href="?action=report_Monthly7">��§ҹ�ʹ�������������Ш���͹</a></td>
                  </tr>
				  <tr class="bmText" height="25">
			<td width="7%"><strong>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/dia_gray.gif" width="10" height="10"></strong></td>
                    <td  class="style20"  ><a href="?action=report_Monthly8">��§ҹ��ػ�ʹ��ҧ����(�¡�����͹)</a></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <td colspan="2" align="center" height="35">&nbsp;</td>
  </tr>
</table>
</td></tr></table>

</form>
</body>
</html>

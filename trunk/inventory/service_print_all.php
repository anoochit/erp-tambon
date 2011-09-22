<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><?
include("config.inc.php");

?>
  <script language="JavaScript" type="text/javascript">
<!--
function printpage() {
window.print();  
}

function MM_reloadPage(init) { 
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<body onLoad="window.print();">
<div align="center"><strong>
รายงานการซ่อมบำรุง <? echo fild_code_detail($c_id) ?></strong></div>
<br><table width="100%" align="center" cellpadding="0" cellspacing="0" border="1" bordercolor="#000000">

<tr class="bmText"  >
 <td width="10%" height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">ครั้งที่</font></span></b> </div></td>
              <td width="16%" height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">วันที่ซ่อม</font></span></b> </div></td>
                                                  <td width="31%" ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">รายละเอียด</font></span></b>
    </div></td>
                                                  <td width="17%" ><div align="center">
                                                      <b><span style="font-size:9pt;"><font face="tahoma">ราคา</font></span></b>
    </div></td>
 <td width="26%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">หมายเหตุ</font></span></b>  </td>
  </tr>
<?
$sql = "SELECT * FROM service Where c_id = '$c_id'   order by time ,date_ser  desc";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){

?>
<tr  class="bmText"  >
<td height="25"><div  align="center"><span style="font-size:9pt;"><font face="tahoma">
	  <?=$rs1["time"]?>
   </font></span> </div></td>
	<td height="25"><div  align="center"><span style="font-size:9pt;"><font face="tahoma">
	  <?=date_2($rs1[date_ser])?>
   </font></span> </div></td>
	<td height="25" align="left">&nbsp;<span style="font-size:9pt;"><font face="tahoma">
	  <? echo $rs1[detail];   ?></font></span>
   </td>
	<td  align="center">&nbsp;<span style="font-size:9pt;"><font face="tahoma">
	  <? echo number_format($rs1[cost],".");   ?></font></span>
    </td>
		<td><div  align="left">&nbsp;<span style="font-size:9pt;"><font face="tahoma">
	   <?  echo $rs1[remark];	  ?></font></span>
    </div></td>

</tr>
<? }?>
	  </table>
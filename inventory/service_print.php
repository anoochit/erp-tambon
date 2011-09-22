<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><?
include("config.inc.php");

?>
  <script language="JavaScript" type="text/javascript">
<!--
function printpage() {
window.print();  
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
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
<?
$sql = "SELECT * FROM service WHERE sv_id= $sv_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
echo $rs[o_name]."<br>";

?>
<br><table width="73%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="#000000">

 <tr class="bmText_1">
   <td width="28%" height="30">&nbsp;ครั้งที่</td>
    <td width="72%"><div>&nbsp;<? echo $rs["time"];?>
    </div></td>
  </tr>
			   <tr class="bmText_1">
   <td width="28%" height="30">&nbsp;วันที่ซ่อม</td>
    <td width="72%"><div>&nbsp;<?=date_2($rs[date_ser])?></div></td>
  </tr>
  <tr class="bmText_1">
    <td height="30">&nbsp;จำนวนเงิน</td>
    <td><div>&nbsp;<?=number_format($rs[cost])?></div></td>
  </tr>
  <tr class="bmText_1">
   <td height="30">&nbsp;รายการ</td>
    <td><div>&nbsp;<?=$rs[detail]?></div></td>
  </tr>
  <tr class="bmText_1">
   <td height="30">&nbsp;หมายเหตุ</td>
    <td><div>&nbsp;<?=$rs[remark]?></div></td>
			</tr>
			
		</table>

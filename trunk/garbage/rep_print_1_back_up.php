<?
include("config.inc.php");
ob_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body topmargin="0" onLoad="window.print()">
	<?
if($start <>'' and $end <>'')
$i = 0;
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
$sql_ex =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo, ";
$sql_ex  .=  "  if(rec_status is null,'ค้างชำระ',rec_status) as rec_status, ";
$sql_ex  .=  "  if(rec_id is null,'',rec_id)as rec_id, ";
$sql_ex  .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
$sql_ex  .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
$sql_ex  .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
$sql_ex  .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
$sql_ex  .=  "  Where b.mem_id = m.mem_id and b.status = 'ปกติ'   ";
$sql_ex  .=  "  and  hocode = '" .$HOCODE. "'   ";
$sql_ex  .=  "  group by b.MCODE ";
$sql_ex  .= " LIMIT $start , $end";
$result_1 = mysql_query($sql_ex );
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
if($rs_1[rec_id] <>''){

				if($rs_1[p_num] >=1 ) $p_num = $rs_1[p_num] +1;
				else $p_num = 1;
				$sql_3 = " update receive  set print_status ='1',p_num ='" .$p_num ."' ,memo = '" .$memo. "'   where mcode = '" .$rs_1[MCODE]. "' and   rec_id = '" . $rs_1[rec_id]."'     ";
?>
<table width="70%"  cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" align="center"  >
<tr  class="style4" >
		<td valign="top" align="center" > 
		<table width="50%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
  <tr>
    	<td width="78%" height="30"  align="center" lass="style5" >&nbsp; ใบเสร็จรับเงินค่าขยะมูลฝอย </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25" class="style3">&nbsp;&nbsp;<span class="style1"><?=check_start_name( )?></span>&nbsp;&nbsp;&nbsp;<?=check_start_address( )?></td>
  </tr>
    <tr>
    <td height="25" class="style3">&nbsp;&nbsp;เลขประจำตัวผู้เสียภาษี &nbsp;&nbsp;&nbsp;<?=tax()?></td>
  </tr>
</table>
<table width="70%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td width="49%" height="25" class="style3">&nbsp;เลขที่ผู้ใช้ บ. &nbsp;&nbsp;<?=$rs_1[MCODE]?></td>
	 <td width="51%" class="style3">&nbsp;เขต</td>
  </tr>
  <tr>
    <td height="26" class="style3">&nbsp;ใบเสร็จรับเงินเลขที่ &nbsp;&nbsp;<?=$rs_1[rec_id]?></td>
	<td class="style3">&nbsp;&nbsp;&nbsp;</td>
  </tr>
    <tr>
    <td height="30"  colspan="2" class="style3">
	<table width="85%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000"  align="center">
  <tr class="style3">
    <td height="28">&nbsp; ค่าขยะมูลฝอยประจำเดือน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=mounth3($month)."&nbsp;&nbsp;".$year?>&nbsp;  </td>
  </tr>
</table>
	</td>
  </tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="15%" height="25" class="style2">&nbsp;<strong>ที่อยู่</strong></td>
	 <td width="85%" class="style2">&nbsp;<?=$rs_1[name]?>	 </td>
  </tr>
  <tr>
    <td height="28" class="style2">&nbsp;</td>
	<td height="28" class="style2">&nbsp;<?  if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1] ?>&nbsp;
	<?  echo " หมู่ที่ ".$rs_1[moo]."&nbsp;&nbsp;&nbsp;".check_start_address_mem( ) ?></td>
  </tr>
</table>
<table width="60%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="#000000">
  <tr>
    <td height="29" class="style2"  >
      <div align="center"><strong>&nbsp;จำนวน (ถัง)</strong></div></td>
	<td class="style2"  ><div align="center"><strong>&nbsp; จำนวน (เงิน)</strong></div></td>
  </tr>
  <tr>
    <td height="35"  > <div  align="center"><?=$rs_1[qty]; ?>&nbsp;&nbsp;&nbsp;&nbsp;
     </div></td>
	 <td height="35"  > <div align="right"><?=$rs_1[total]; ?>&nbsp;&nbsp;&nbsp;&nbsp;
     </div></td>
  </tr>
  <tr>
    <td height="29"  colspan="2"  > <div  align="left">&nbsp;&nbsp;&nbsp;&nbsp;<span class="style7">ตัวอักษร</span>&nbsp;&nbsp;&nbsp;<span class="style2">&nbsp;(
          <?=num2string_2digit($rs_1[total]); ?>บาทถ้วน )
     </span></div></td>
  </tr>
</table>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr valign="bottom">
    <td width="37%" height="72.5">
      <div align="center"><span class="style2">......................................<br>
          <strong>หัวหน้าส่วนการคลัง</strong><br>( <?=head_khung()?> )</span></div></td>
    <td width="38%">
      <div align="center"><span class="style2">......................................<br>
        <strong>พนักงานเก็บเงิน</strong><br>
        ( <?=receive_name()?> )</span></div></td>
    <td width="25%" >
      <div align="center"><span class="style2">......................................<br>
        <strong>หัวหน้าส่วนการคลัง</strong><br>&nbsp;</span></div></td>
  </tr>
</table>
    </td>
  </tr>  
</table>
<? 
	}
}?><script language=Javascript>
window.close(); 
</script>
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
							$end = ($end - $start)  +1;
							$start  = $start -1 ;
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
											$sql_3 = " update receive  set print_status ='1' ,p_num ='" .$p_num ."' ,memo = '" .$memo. "'   where mcode = '" .$rs_1[MCODE]. "' and   rec_id = '" . $rs_1[rec_id]."'     ";
											$result_3=mysql_query($sql_3);
								$total = (($rs_1[amount] * $rs_1[rate]) + $rs_1[amt] + $rs_1[vat]);
?>
    <table width="92%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="18%" height="390"  align="center" valign="top"><img src="images/logo.jpg" width="100" height="100"></td>
    <td width="82%"><table width="100%"  cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" align="center"  >
<tr  class="style4" >
		<td valign="top" align="center" > 
		<table width="100%" height="38" border="1" cellpadding="1" cellspacing="1" bordercolor="#000000"  >
  <tr>
    	<td width="65%" height="30"  align="center" class="style5"  >&nbsp; ใบเสร็จรับเงินค่าขยะมูลฝอย<br></td>
		 <td width="35%" height="26" colspan="2"  align="left" class="style3">&nbsp;เลขที่ใบเสร็จ &nbsp;&nbsp;<?=$rs_1[rec_id]?></td> 
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="28" class="style3">&nbsp;&nbsp;<span class="style1"><?=check_start_name( )?></span>&nbsp;&nbsp;&nbsp;<?=check_start_address( )?></td>
  </tr>
    <tr>
    <td height="28" class="style3">&nbsp;&nbsp;เลขประจำตัวผู้เสียภาษี &nbsp;&nbsp;&nbsp;<?=tax()?></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
    <tr>
    <td height="30"  colspan="2" class="style3">
	<table width="70%" border="1" cellspacing="1" cellpadding="1" bordercolor="#000000"  align="center">
  <tr class="style3">
    <td height="28" colspan="2"> <div align="center">&nbsp;ค่าขยะประจำเดือน&nbsp;&nbsp;  <?=mounth3($month)."&nbsp;&nbsp;".$year?> </div></td>
  </tr>
</table>
	</td>
  </tr>
</table>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
    <td height="28" class="style3" >&nbsp;เลขที่ผู้ใช้  &nbsp;</td>
<td width="81%" class="style3">&nbsp;<?=$rs_1[MCODE]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เขต&nbsp;&nbsp;&nbsp;<??></td>
  </tr>
  <tr>
    <td width="19%" height="27" class="style2">&nbsp;ชื่อ</td>
	 <td width="81%" class="style2">&nbsp;<?=$rs_1[name]?>	 </td>
  </tr>
  <tr>
    <td height="28" class="style2">&nbsp;ที่อยู่</td>
	<td height="28" class="style2">&nbsp;<?  if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1] ?>&nbsp;
	<?  echo " หมู่ที่ ".$rs_1[moo]."&nbsp;&nbsp;&nbsp;".check_start_address_mem( ) ?></td>
  </tr>
</table>
<table width="70%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="#000000">
  <tr><td width="65%" height="28" class="style2"  >
      <div align="center">&nbsp;ปริมาณขยะ</div></td>
	  <td width="35%" height="28" class="style2"  >
      <div align="center">&nbsp;รวมเป็นเงิน</div></td>
  </tr>
  <tr class="style2" >
	  <td height="30"  > <div  align="center"><?=type_name($rs_1[qty]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
     </div></td>
	  <td height="30"  > <div align="right"><?=number_format($rs_1[total],2); ?>&nbsp;&nbsp;&nbsp;&nbsp;
     </div></td>
  </tr>
  <tr>
    <td height="29"  colspan="7"  > <div  align="left">&nbsp;&nbsp;&nbsp;&nbsp;<span class="style7">ตัวอักษร</span>&nbsp;&nbsp;&nbsp;<span class="style2">&nbsp;(
          <?=num2string_2digit($rs_1[total]); ?>บาทถ้วน )
     </span></div></td>
  </tr>
</table><br>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr valign="bottom">
    <td width="37%" height="83">
      <div align="center"><span class="style2">......................................<br>
          หัวหน้าส่วนการคลัง<br>( <?=head_klung()?> )</span></div></td>
    <td width="38%">
      <div align="center"><span class="style2">......................................<br>
        พนักงานเก็บเงิน<br>
        ( <?=receive_name()?> )</span></div></td>
    <td width="25%" >
      <div align="center"><span class="style2">......................................<br>
        วันที่รับเงิน<br>&nbsp;</span></div></td>
  </tr>
</table>
    </td>
  </tr>  
</table>
</td>
  </tr>
</table>
<? 
	}
}?>
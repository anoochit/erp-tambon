<?
include("config.inc.php");
ob_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body topmargin="0" onLoad="window.print()">
	<?
						$sql_ex  = " Select  q.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,q.mno,";
						$sql_ex  .=  "  if(m2.mno is null,' ',m2.mno) as M ,s.amt ,rec_status,r.amt as rate,";
						$sql_ex  .=  " if(rec_id is null,'',rec_id)as rec_id,m2.rec_date ,";
						$sql_ex  .=  "  p_date ,if(amount is null,'',amount)as amount ,if(total is null,'',total)as total  ,if(sum_m is null,'',sum_m)as sum_m ,if(vat is null,'',vat)as vat ,";
						$sql_ex  .=  " m2.m_date,if(m_rate  is null,'',m_rate)as m_rate,";
						$sql_ex  .=  " if(m_amt is null,'',m_amt) as m_amt,m2.myear,m_date,monthh , m2.vat";
						$sql_ex  .=  "  from member m,service1 s,rate_water r,q_water q left join meter m2 on q.MCODE = m2.MCODE";
						$sql_ex  .=  "  Where q.mem_id = m.mem_id And s.scode = q.scode And r.tmcode = q.tmcode";
						$sql_ex  .=" and print_status = '1'";
						$sql_ex  .=  "  and q.MCODE  like   '" .$MCODE1. "'   ";
						$sql_ex  .=  "  and rec_id  like     '" .$rec_id1. "'   ";
							$result_1=mysql_query($sql_ex);
							if($result_1)
							$rs_1=mysql_fetch_array($result_1);
							$total = (($rs_1[amount] * $rs_1[rate]) + $rs_1[amt] + $rs_1[vat]);

?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="26%"  align="center" valign="top"><img src="images/logo.jpg" width="100" height="100"></td>
    <td width="74%"><table width="100%"  cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" align="center"  >
<tr  class="style4" >
		<td valign="top" align="center" > 
		<table width="100%" height="38" border="1" cellpadding="1" cellspacing="1" bordercolor="#000000" >
  <tr>
    	<td width="65%" height="30"  align="center" class="style5"  >&nbsp; ใบเสร็จรับ / ใบกำกับภาษี <br>
		การประปา<?=check_start_name( )?></td>
		 <td width="35%" height="26" colspan="2"  align="left" class="style3">&nbsp;เลขที่ใบเสร็จ &nbsp;&nbsp;<?=$rs_1[rec_id]?></td> 
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
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
    <tr>
    <td height="30"  colspan="2" class="style3">
	<table width="100%" border="1" cellspacing="1" cellpadding="1" bordercolor="#000000"  align="center">
  <tr class="style3">
    <td height="28" colspan="2"> <div align="center">&nbsp;ค่าน้ำประจำเดือน&nbsp;&nbsp;  <?=mounth3($month)."&nbsp;&nbsp;".$year?> </div></td>
	<td width="35%" height="28" colspan="2"><div align="center">&nbsp; หมายเลขมาตร&nbsp; &nbsp; <?=$rs_1[mno]?></div></td>
  </tr>
</table>
	</td>
  </tr>
</table>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
    <td height="25" class="style3" >&nbsp;เลขที่ผู้ใช้  &nbsp;</td>
<td width="81%" class="style3">&nbsp;<?=$rs_1[MCODE]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เขต&nbsp;&nbsp;&nbsp;<?=find__zone_name($HOCODE , $z_id)?></td>
  </tr>
  <tr>
    <td width="19%" height="25" class="style2">&nbsp;ชื่อ</td>
	 <td width="81%" class="style2">&nbsp;<?=$rs_1[name]?>	 </td>
  </tr>
  <tr>
    <td height="28" class="style2">&nbsp;ที่อยู่</td>
	<td height="28" class="style2">&nbsp;<?  if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1] ?>&nbsp;
	<?  echo " หมู่ที่ ".$rs_1[moo]."&nbsp;&nbsp;&nbsp;".check_start_address_mem( ) ?></td>
  </tr>
</table>
<table width="100%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="#000000">
  <tr>
  <td width="14%" height="28" class="style2"  >
      <div align="center">&nbsp;จดครั้งก่อน</div></td>
	   <td width="14%" height="28" class="style2"  >
      <div align="center">&nbsp;จดครั้งหลัง</div></td>
	<td width="14%" class="style2"  ><div align="center">&nbsp; หน่วยที่ใช้</div></td>
	 <td width="14%" height="28" class="style2"  >
      <div align="center">&nbsp;เงินค่าน้ำ</div></td>
	   <td width="14%" height="28" class="style2"  >
      <div align="center">&nbsp;เค่าเช่ามาตรวัดน้ำ</div></td>
	  <td width="15%" height="28" class="style2"  >
      <div align="center">&nbsp;ภาษีมูลค่าเพิ่ม</div></td>
	  <td width="15%" height="28" class="style2"  >
      <div align="center">&nbsp;รวมเป็นเงิน</div></td>
  </tr>
  <tr class="style2" >
  <td height="30"  > <div  align="center">&nbsp;<?=$rs_1[M] - $rs_1[amount]; ?>&nbsp;
     </div></td>
  <td height="30"  > <div  align="center">&nbsp;<?=$rs_1[M]; ?>&nbsp;
     </div></td>
	 <td height="30"  > <div align="center"><?=$rs_1[amount]; ?>&nbsp;&nbsp;&nbsp;&nbsp;
     </div></td>
	  <td height="30"  > <div align="center">&nbsp;<?=number_format($rs_1[total],2)  //number_format($rs_1[amount] * $rs_1[rate],2) ; ?>&nbsp;
     </div></td>
	 <td height="30"  > <div align="center">&nbsp;<?=rent()//$rs_1[amt]; ?>&nbsp;
     </div></td>
	  <td height="30"  > <div  align="center">&nbsp;<?=$rs_1[vat]; ?>&nbsp;
     </div></td>
	  <td height="30"  > <div align="center">&nbsp;<?=number_format($rs_1[sum_m],2)//number_format((($rs_1[amount] * $rs_1[rate]) + $rs_1[amt] + $rs_1[vat]),2); ?>&nbsp;
     </div></td>
  </tr>
  <tr>
    <td height="29"  colspan="7"  > <div  align="left">&nbsp;&nbsp;&nbsp;&nbsp;<span class="style7">ตัวอักษร</span>&nbsp;&nbsp;&nbsp;<span class="style2">&nbsp;(
          <?=num2string_2digit((($rs_1[amount] * $rs_1[rate]) + $rs_1[amt] + $rs_1[vat])); ?>
           )
     </span></div></td>
  </tr>
</table><br>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">

  <tr valign="bottom">
    <td width="37%" height="73.5">
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

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
							$sql_ex =" Select  q.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo,q.mno, ";
							$sql_ex  .=  " if(m2.mno is null,' ',m2.mno) as M ,s.amt ,if(rec_status is null,'ค้างชำระ',rec_status) as rec_status,r.amt as rate,if(rec_id is null,'',rec_id)as rec_id, m2.vat, m2.sum_m ,";
							$sql_ex  .=  " if(p_date is null,'',p_date)as p_date,if(amount is null,'',amount)as amount ,if(m2.m_date is null,'',m2.m_date) as m_date,m_rate,m_amt,print_status,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
							$sql_ex  .=  " from member m,service1 s,rate_water r,q_water q left join meter m2 on q.MCODE = m2.MCODE";
							$sql_ex  .=  " Where q.mem_id = m.mem_id And s.scode = q.scode And r.tmcode = q.tmcode ";
							$sql_ex  .=  " and q.status = 'ปกติ'  and  hocode ='" .$HOCODE. "'   ";
							$sql_ex  .=  " and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
							if($z_id <> '' ) $sql_ex  .=  "  and mid(q.MCODE,3,1) = '" .$z_id. "'  ";
							$sql_ex  .=  "  group by q.MCODE ";
							$sql_ex  .= " LIMIT $start , $end";
							$result_1 = mysql_query($sql_ex );
							if($result_1)
							while($rs_1=mysql_fetch_array($result_1)){
								$i++;
							if($rs_1[rec_id] <>''){
											if($rs_1[p_num] >=1 ) $p_num = $rs_1[p_num] +1;
											else $p_num = 1;
											$sql_3 = " update meter  set print_status ='1' ,p_num ='" .$p_num ."' ,memo = '" .$memo. "'   where mcode = '" .$rs_1[MCODE]. "' and   rec_id = '" . $rs_1[rec_id]."'     ";
											$result_3=mysql_query($sql_3);
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
    	<td width="47%" height="30"  align="center" class="style5"  >&nbsp; ใบเสร็จ<br>
		การประปา<?=check_start_name( )?></td>
		 <td width="53%" height="26" colspan="2"  align="left" class="style3">&nbsp;เลขที่ใบเสร็จ&nbsp;&nbsp;<?
		 $t1 = explode("/",$rs_1[rec_id]); 
		 echo "ปีงบ ".substr($t1[0],0,2)." เล่มที่ ".substr($t1[0],2)." เล่มที่ ".$t1[1];
		 //$rs_1[rec_id]?></td> 
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
	 <td height="30"  > <div align="center">&nbsp;<?=$rs_1[amount]; ?>&nbsp;
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
<? 
	}
}?>
<?
include("config.inc.php");
ob_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body >
<center >
<span class="style6">**
<?=check_start_name( )?>
**<br><br>
ค่าธรรมเนียมน้ำประปา<br>
<br>
รายงานใบกำกับบิล<br>
<br>
หมู่ที่ : 
<?=honame($HOCODE)?> &nbsp;&nbsp;&nbsp;&nbsp; <? if($z_id <>'') echo "&nbsp;&nbsp;เขต&nbsp;&nbsp;".find__zone_name($HOCODE , $z_id)?>
<br>
<br>
</span><strong><span class="style6">
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr class="style5">
    <td width="37%">&nbsp;วันที่พิมพ์<br>
      <?=date_2(date("Y-m-d"));?></td>
    <td width="63%"  colspan="2">&nbsp;เดือน <?=mounth3($month)."&nbsp;&nbsp;".$year?> &nbsp;&nbsp;ประจำวันที่ <?=date_2(date("Y-m-d"));?></td>

  </tr>
</table>

</span>
</strong>
</center><br>
<table width="85%"cellpadding="0" cellspacing="0" name="body" align="center">

<tr>
	<td width="100%" valign="top">
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center"  >
<tr class="style4">
		<td   colspan="8" height="1"  valign="bottom"><hr color="#666666" width=100% size=3>
		  </td></tr>
<tr class="style4">
		<td  width="10%" height="25"> <div align="center">ลำดับที่	</div></td>
		<td  width="13%"><div align="center">เลขที่ผู้ใช้น้ำ</div></td>
		<td width="12%" align="center">เลขที่บิล</td>
		<td  width="11%"> <div align="center">เงินตามบิล	</div></td>
		<td  width="16%"> <div align="center">เงินที่เก็บได้</div></td>
		<td  width="16%"><div align="center">เงินที่ค้างชำระ</div></td>
		<td  width="14%"><div align="center">ค่าบริการ</div></td>
		  <td  width="8%"><div align="center">หมายเหตุ</div></td>
	</tr>
	<tr class="style4">
		<td   colspan="8" height="1"   valign="baseline"><hr color="#666666" width=100% size=3></td>
	</tr>
	
<?
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 

					$sql_ex =" Select  q.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo,q.mno, ";
					$sql_ex  .=  " if(m2.mno is null,' ',m2.mno) as M ,s.amt ,if(rec_status is null,'ค้างชำระ',rec_status) as rec_status,r.amt as rate,if(rec_id is null,'',rec_id)as rec_id, if(sum_m is null,'',sum_m)as sum_m ,";
					$sql_ex  .=  " if(p_date is null,'',p_date)as p_date,if(amount is null,'',amount)as amount ,if(m2.m_date is null,'',m2.m_date) as m_date,m_rate,m_amt,print_status,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
					$sql_ex  .=  " from member m,service1 s,rate_water r,q_water q left join meter m2 on q.MCODE = m2.MCODE";
					$sql_ex  .=  " Where q.mem_id = m.mem_id And s.scode = q.scode And r.tmcode = q.tmcode ";
					$sql_ex  .=  " and q.status = 'ปกติ'  and  hocode ='" .$HOCODE. "'   ";
					$sql_ex  .=  " and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
					if($z_id <> '' ) $sql_ex  .=  "  and mid(q.MCODE,3,1) = '" .$z_id. "'  ";
					$sql_ex  .=  "  group by q.MCODE ";
$result1 = mysql_query($sql_ex);
$x = 1;
$i = 0;
$total=0;
while($rs_1=mysql_fetch_array($result1)){
$i++;
  if($rs_1[rec_id] ==''){
  		$rate = $rs_1[rate];
 }else {
 		$rate = $rs_1[m_rate];
}

  if($rs_1[amount] ==0) {
  		$min = S_Min();
} else {
		$min = $rs_1[amount] * $rate; 
}
 $vat = ($min*VAT()) / 100; 
 
 if($rs_1[rec_id] ==''){
	$amt = $rs_1[amt];
 }else{
 	$amt = $rs_1[m_amt];
} 
$total=$total + $rs_1[sum_m] ;
?>
<tr  class="style4" >
		
		<td  align="center"height="25" width="10%">&nbsp; <?=$i?></td>
		
		<td  width="13%"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
		
		<td  width="12%" align="center"> &nbsp; <? 

		 if($rs_1[rec_id] =='') echo "";
 else echo $rs_1[rec_id]; ?></td>
		<td  align="right"  width="11%"><?  echo number_format($rs_1[sum_m],2) ;  ?>&nbsp; 	 </td>
		<td   width="16%" align="center"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
		<td  align="center"  width="16%">&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
			<td  align="left"  width="14%">&nbsp;</td>
		<td  width="8%">&nbsp;</td>
	</tr>  
		<? }?>
		<tr class="style4">
		<td   colspan="8" height="1"  valign="bottom"><hr color="#666666" width=100% size=3></td>
	</tr>
		<tr class="style4">

		<td  width="13%" colspan="8" height="40" class="style5"  valign="middle"><div align="center">จำนวนบิล <span class="style6">&nbsp;&nbsp;&nbsp;&nbsp;<?=$i?>&nbsp;&nbsp;&nbsp;&nbsp; </span> บิล
		&nbsp;&nbsp;&nbsp;&nbsp;จำนวนเงิน&nbsp;&nbsp;&nbsp;&nbsp; <span class="style6"><?=number_format($total,2)?> </span> &nbsp;&nbsp;&nbsp;&nbsp;บาท
		</div></td>
	</tr>
	</table>
	</td>
</tr>
</table>

	



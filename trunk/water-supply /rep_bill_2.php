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

รายงานหน่วยน้ำเพื่อตรวจสอบ<br>
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
		<td   colspan="10" height="1"  valign="bottom"><hr color="#666666" width=100% size=3></td>
	</tr>
<tr class="style4">

		<td  width="13%" height="28"><div align="center">เลขทะเบียน</div></td>
		<td width="28%" align="center">ชื่อ - สกุล</td>
		<td  width="9%"> <div align="center">บ้านเลขที่	</div></td>
		<td  width="9%"> <div align="center">เดิม</div></td>
		<td  width="9%"><div align="center">ปัจจุบัน</div></td>
		<td  width="6%"><div align="center">ใช้น้ำ</div></td>
		  <td  width="6%"><div align="center">ค่าน้ำ</div></td>
		  <td  width="6%"><div align="center">ภาษี 7%</div></td>
		  <td  width="6%"><div align="center">ค่าบริการ</div></td>
		  <td  width="8%"><div align="center">รวมเป็นเงิน</div></td>
	</tr>
	<tr class="style4">
		<td   colspan="10" height="1"   valign="baseline"><hr color="#666666" width=100% size=3></td>
	</tr>
	
<?
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 

					$sql_ex =" Select  q.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo,q.mno, ";
					$sql_ex  .=  " if(m2.mno is null,' ',m2.mno) as M ,s.amt ,if(rec_status is null,'ค้างชำระ',rec_status) as rec_status,r.amt as rate,if(rec_id is null,'',rec_id)as rec_id, m2.vat , m2.sum_m  ,if(total is null,'',total)as total, ";
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
$total_amount = 0;
$total_sum = 0;
$total_amt = 0;
$total_vat = 0;
if($result1)
while($rs_1=mysql_fetch_array($result1)){
$i++;
$total_amount = $total_amount + $rs_1[amount]  ;
$total_sum = $total_sum + $rs_1[sum_m] ;
$total_amt = $total_amt + $rs_1[amt];
$total_vat = $total_vat + $rs_1[vat];
?>
<tr  class="style4" >
		<td  width="13%"  align="center" height="28">&nbsp;<? echo $rs_1[MCODE]; ?></td>
		<td  width="28%" align="left" > &nbsp; <? echo $rs_1[name];?></td>
		<td   align="center"  width="9%" ><?
   if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1]?>&nbsp; 	 </td>
		<td   width="9%" align="center"><? echo $rs_1[M] -  $rs_1[amount]?>&nbsp; 	</td>
		<td  align="center"  width="9%"><? echo $rs_1[M];?>&nbsp;</td>
			<td   align="center" width="6%">&nbsp;<? echo  $rs_1[amount]?></td>
		<td  width="6%" align="center">&nbsp;<? echo  number_format($rs_1[total],2)?></td>
		<td  width="6%" align="center">&nbsp;<?=$rs_1[vat]?></td>
		<td  width="6%" align="center">&nbsp;<?=number_format(rent(),2)?></td>
		<td  width="8%" align="center">&nbsp;<?=number_format($rs_1[sum_m],2)?></td>
	</tr>  
		<? }?>
		<tr class="style4">
		<td   colspan="10" height="1"  valign="bottom"><hr color="#666666" width=100% size=3></td>
	</tr>
		<tr class="style4">

		<td colspan="10" height="40" class="style5"  valign="middle"><div  align="left"><br>
		&nbsp;&nbsp;จำนวนหน่วยน้ำที่ใช้ทั้งสิ้น<span class="style6">&nbsp;&nbsp;&nbsp;&nbsp;<?=number_format($total_amount)?>&nbsp;&nbsp;&nbsp;&nbsp; </span> หน่วย <br><br>
		&nbsp;&nbsp;รวมจำนวนเงินทั้งสิ้น<span class="style6">&nbsp;&nbsp;&nbsp;&nbsp;<?=number_format($total_sum,2)?>&nbsp;&nbsp;&nbsp;&nbsp; </span> บาท <br><br>
		&nbsp;&nbsp;รวมค่าบริการ<span class="style6">&nbsp;&nbsp;&nbsp;&nbsp;<?=number_format($total_amt,2)?>&nbsp;&nbsp;&nbsp;&nbsp; </span> บาท <br><br>
		&nbsp;&nbsp;รวมภาษี<span class="style6">&nbsp;&nbsp;&nbsp;&nbsp;<?=number_format($total_vat,2)?>&nbsp;&nbsp;&nbsp;&nbsp; </span> บาท <br><br>
		&nbsp;&nbsp;รวมจำนวนผู้ใช้น้ำ<span class="style6">&nbsp;&nbsp;&nbsp;&nbsp;<?=number_format($i)?>&nbsp;&nbsp;&nbsp;&nbsp; </span> ราย <br><br>
		</div></td>
	</tr>
	</table>
	</td>
</tr>
</table>

	



<?
include("config.inc.php");
ob_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body >
<center >
<table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tr class="style5">
    <td width="50%" height="30">&nbsp;ประจำวันที่  <?=date_2(date("Y-m-d"));?></td>
    <td width="50%"  colspan="2">&nbsp; <?=honame($HOCODE)?>&nbsp;&nbsp;&nbsp;&nbsp; <? if($z_id <>'') echo "&nbsp;&nbsp;เขต&nbsp;&nbsp;".find__zone_name($HOCODE , $z_id)?> </td>
  </tr>
  <tr class="style5">
    <td height="30" colspan="2">&nbsp;รายงานบิลค้างชำระ </td>
  </tr>
</table>
</center><br>
<table width="80%" name="body" align="center" cellspacing="1" border="0" style="border-collapse:collapse;">
<tr>
	<td width="100%" valign="top">
<table width="100%" align="center"  cellspacing="1" border="0" style="border-collapse:collapse;">
<tr class="style4">
		<td  width="7%" height="25" style="border: #000000 1px solid;"> <div align="center">ที่	</div></td>
		<td  width="16%" style="border: #000000 1px solid;" ><div align="center">เลขทะเบียน</div></td>
		<td  width="26%" style="border: #000000 1px solid;" ><div align="center">ชื่อ - สกุล</div></td>
		<td width="18%" align="center" style="border: #000000 1px solid;">เลขที่ใบเสร็จ</td>
		<td  width="18%" style="border: #000000 1px solid;"> <div align="center">รวมเงิน	</div></td>
<td  width="15%" style="border: #000000 1px solid;"> <div align="center">สถานะ</div></td>
	</tr>
<?
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
			$sql = " Select  q.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo,q.mno,";
			 $sql .=  "   if(m2.mno is null,' ',m2.mno) as M ,s.amt ,if(rec_status is null,'ค้างชำระ',rec_status) as rec_status,r.amt as rate,if(rec_id is null,'',rec_id)as rec_id, m2.sum_m  ,if(total is null,'',total)as total,";
			 $sql .=  "   if(p_date is null,'',p_date)as p_date,if(amount is null,'',amount)as amount ,if(m2.m_date is null,'',m2.m_date) as m_date,m_rate,m_amt,print_status";
			 $sql .=  "   from member m,service1 s,rate_water r,q_water q left join meter m2 on q.MCODE = m2.MCODE";
			 $sql .=  "   Where q.mem_id = m.mem_id And s.scode = q.scode And r.tmcode = q.tmcode";
			 $sql .=  "  and  hocode = '" .$HOCODE. "' ";
			 $sql .=  "  and monthh = '" .$monthh. "'  and myear = '" .$year. "' and m2.rec_status <> 'ชำระแล้ว' ";
			if($z_id <> '' ) $sql  .=  "  and mid(q.MCODE,3,1) = '" .$z_id. "'  ";
            $sql .=  "  group by q.MCODE";
$result1 = mysql_query($sql);
$x = 1;
$i = 0;
$total=0;
while($rs_1=mysql_fetch_array($result1)){
$i++;
?>
<tr  class="style4" >
		<td  align="center"height="25" width="7%" style="border: #000000 1px solid;">&nbsp; <?=$i?></td>
		<td  width="16%"  align="center" style="border: #000000 1px solid;">&nbsp;<? echo $rs_1[MCODE]; ?></td>
		<td  width="26%" align="left" style="border: #000000 1px solid;">&nbsp;<? echo $rs_1[name]; ?></td>
		<td  width="18%" align="center" style="border: #000000 1px solid;"> &nbsp; <? 
		$rs_1[rec_id] ."cc<br>";
		 if($rs_1[rec_id] =='') echo "";
 else echo $rs_1[rec_id]; ?></td>
		<td  align="right"  width="18%" style="border: #000000 1px solid;"><? echo number_format($rs_1[sum_m],2);  ?>&nbsp; 	 </td>
<td   align="center"  width="15%" style="border: #000000 1px solid;"><? echo $rs_1[rec_status];  ?>&nbsp; 	 </td>
	</tr>  
		<? }?>
	</table>
	</td>
</tr>
</table>

	



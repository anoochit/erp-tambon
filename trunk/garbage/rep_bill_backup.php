<?
include("config.inc.php");
ob_start();
?>
<style type="text/css" media="print">
</style>
<?
if($date2=="--" || $date21== "--" || $out_Date=="" || $out_Date1==""){
	$date2=date("Y-m-d");
	$date21=date("Y-m-d");
}
$date1=explode("/",$out_Date);
$date=$date1[0];
$month=$date1[1];
$year=$date1[2];
$date2=$year."-".$month."-".$date;
$date3=date_format_th_1($date2);
$date11=explode("/",$out_Date1);
$date1=$date11[0];
$month1=$date11[1];
$year1=$date11[2];
$date21=$year1."-".$month1."-".$date1;
if($date_format <>'0000-00-00') $date33=date_format_th_1($date_format);
else $date33= "";
if($date3==543 || $date31==543){$date3="";$date31="";}
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body >
<?
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
$sql =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo, ";
$sql .=  "  if(rec_status is null,'ค้างชำระ',rec_status) as rec_status, ";
$sql .=  "  if(rec_id is null,'',rec_id)as rec_id, ";
$sql  .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
$sql  .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
$sql .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
$sql .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
$sql .=  "  Where b.mem_id = m.mem_id and b.status = 'ปกติ'   ";
$sql .=  "  and  hocode = '" .$HOCODE. "'   ";
$sql .=  "  group by b.MCODE ";
$result1 = mysql_query($sql);
$x = 1;
$i = 0;
while($rs_1=mysql_fetch_array($result1)){
$i++;
?>
<?
if($i%30 ==1 ){
?>
<center >
<strong>
<span class="style4">**<?=check_start_name( )?>**<br>
ค่าธรรมเนียมขยะมูลฝอย<br><br>
รายงานใบกำกับบิล<br><br>
หมู่ที่ : <?=honame($HOCODE)?> <br>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr class="style4">
    <td width="41%">&nbsp;วันที่พิมพ์<br>
      <?=date_2(date("Y-m-d"));?></td>
    <td width="27%" >&nbsp;เดือน <?=mounth3($month)."&nbsp;&nbsp;".$year?> &nbsp;&nbsp;ประจำวันที่ <?=date_2(date("Y-m-d"));?></td>
    <td width="32%">&nbsp;</td>
  </tr>
</table>
</span>
</strong>
</center><br>
<table width="85%" height="148" cellpadding="0" cellspacing="0" name="body" align="center">
<tr>
	<td width="100%" valign="top">
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center"  >
<tr class="style4">
		<td   colspan="8" height="1"  valign="bottom"> <div  align="left">------------------------------------------------------------------------------------------------------------------------------</div></td>
	</tr>
<tr class="style4">
		<td  width="10%" height="25"> <div align="center">ลำดับที่	</div></td>
		<td  width="13%"><div align="center">เลขทะเบียน</div></td>
		<td width="12%" align="center">เลขที่บิล</td>
		<td  width="11%"> <div align="center">เงินตามบิล	</div></td>
		<td  width="16%"> <div align="center">เงินที่เก็บได้</div></td>
		<td  width="16%"><div align="center">เงินที่ค้างชำระ</div></td>
		<td  width="14%"><div align="center">ค่าบริการ</div></td>
		  <td  width="8%"><div align="center">หมายเหตุ</div></td>
	</tr>
	<tr class="style4">
		<td   colspan="8" height="1"   valign="baseline"> <div  align="left">------------------------------------------------------------------------------------------------------------------------------</div></td>
	</tr>
<?  }?>
<tr  class="style4" >
		<td  align="center"height="25" width="10%">&nbsp; <?=$i?></td>
		<td  width="13%" >&nbsp;<? echo $rs_1[MCODE]; ?></td>
		<td  width="12%" align="center"> &nbsp; <?  if($rs_1[rec_id] =='') echo "";
 else echo $rs_1[rec_id]; ?></td>
		<td  align="left"  width="11%">&nbsp; 	 <? echo $rs_1[qty]*MONEY();  ?></td>
		<td   width="16%" align="center"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
		<td  align="center"  width="16%">&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
			<td  align="left"  width="14%">&nbsp;</td>
		<td  width="8%">&nbsp;</td>
	</tr>  
	<? if($i%30 ==0 and $i ==30){?> </table>
	</td>
</tr>
</table>
	<? //}?>
	<? }elseif($i%30 == 0 and $i >31 ){?></table>
	</td>
</tr>
</table>	<br><br><br><br>  
	<? }
	?>	
	<?
	}
	?>



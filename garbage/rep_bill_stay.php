<?
include("config.inc.php");
ob_start();
?>
<style type="text/css" media="print">
</style>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body >
<center >
<table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tr class="style5">
    <td width="50%" height="30">&nbsp;ประจำวันที่  <?=date_2(date("Y-m-d"));?></td>
    <td width="50%"  colspan="2">&nbsp; <?=honame($HOCODE)?> </td>
  </tr>
  <tr class="style5">
    <td height="30" colspan="2">&nbsp;รายงานบิลค้างชำระ </td>
  </tr>
</table>
</center><br>
<table width="60%" name="body" align="center" cellspacing="1" border="0" style="border-collapse:collapse;">
<tr>
	<td width="100%" valign="top">
<table width="100%" align="center"  cellspacing="1" border="0" style="border-collapse:collapse;">
<tr class="style4">
		<td  width="12%" height="25" style="border: #000000 1px solid;"> <div align="center">ลำดับที่	</div></td>
		<td  width="32%" style="border: #000000 1px solid;" ><div align="center">เลขทะเบียน</div></td>
		<td width="37%" align="center" style="border: #000000 1px solid;">เลขที่บิล</td>
		<td  width="19%" style="border: #000000 1px solid;"> <div align="center">เงินตามบิล	</div></td>
	</tr>
<?
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
			$sql =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo,";
			$sql .=  "  if(rec_id is null,'',rec_id)as rec_id,";
            $sql .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
            $sql .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total";
            $sql .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE";
            $sql .=  "  and monthh  = '" .$monthh. "'  and  myear = '" .$year. "' ";
            $sql .=  "  Where b.mem_id = m.mem_id ";
            $sql .=  "  and  hocode = '" .$HOCODE. "'   and rec_status = 'ค้างชำระ' ";
			if($line1 <>'') $sql  .=  "  and  b.line1 = '" .$line1. "'  ";
            $sql .=  "  group by b.MCODE";
$result1 = mysql_query($sql);
$x = 1;
$i = 0;
$total=0;
while($rs_1=mysql_fetch_array($result1)){
$total = $total + $rs_1[total];
$i++;
?>
<tr  class="style4" >
		<td  align="center"height="25" width="12%" style="border: #000000 1px solid;">&nbsp; <?=$i?></td>
		<td  width="32%"  align="center" style="border: #000000 1px solid;">&nbsp;<? echo $rs_1[MCODE]; ?></td>
		<td  width="37%" align="center" style="border: #000000 1px solid;"> &nbsp; <? 
		$rs_1[rec_id] ."cc<br>";
		 if($rs_1[rec_id] =='') echo "";
 else echo $rs_1[rec_id]; ?></td>
		<td  align="right"  width="19%" style="border: #000000 1px solid;"><? echo number_format($rs_1[total],2);  ?>&nbsp; 	 </td>
	</tr>  
		<? }?>
	</table>
	</td>
</tr>
</table>

	



<?
include("config.inc.php");
ob_start();
?>
<style type="text/css" media="print">
</style>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body >
<center >
<span class="style6">**
<?=check_start_name( )?>
**<br><br>
��Ҹ������������Ž��<br>
<br>
��§ҹ㺡ӡѺ���<br>
<br>
������ : 
<?=honame($HOCODE)?> 
<br>
<br>
</span><strong><span class="style6">
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr class="style5">
    <td width="37%">&nbsp;�ѹ�������<br>
      <?=date_2(date("Y-m-d"));?></td>
    <td width="63%"  colspan="2">&nbsp;��͹ <?=mounth3($month)."&nbsp;&nbsp;".$year?> &nbsp;&nbsp;��Ш��ѹ��� <?=date_2(date("Y-m-d"));?></td>
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
		<td   colspan="8" height="1"  valign="bottom"> <div  align="left">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div></td>
	</tr>
<tr class="style4">
		<td  width="10%" height="25"> <div align="center">�ӴѺ���	</div></td>
		<td  width="13%"><div align="center">�Ţ����¹</div></td>
		<td width="12%" align="center">�Ţ�����</td>
		<td  width="11%"> <div align="center">�Թ������	</div></td>
		<td  width="16%"> <div align="center">�Թ�������</div></td>
		<td  width="16%"><div align="center">�Թ����ҧ����</div></td>
		<td  width="14%"><div align="center">��Һ�ԡ��</div></td>
		  <td  width="8%"><div align="center">�����˵�</div></td>
	</tr>
	<tr class="style4">
		<td   colspan="8" height="1"   valign="baseline"> <div  align="left">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div></td>
	</tr>
<?
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
$sql =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo, ";
$sql .=  "  if(rec_status is null,'��ҧ����',rec_status) as rec_status, ";
$sql .=  "  if(rec_id is null,'',rec_id)as rec_id, ";
$sql  .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
$sql  .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
$sql .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
$sql .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
$sql .=  "  Where b.mem_id = m.mem_id and b.status = '����'   ";
$sql .=  "  and  hocode = '" .$HOCODE. "'   ";
if($line1 <>'') $sql  .=  "  and  b.line1 = '" .$line1. "'  ";
$sql .=  "  group by b.MCODE ";
$result1 = mysql_query($sql);
$x = 1;
$i = 0;
$total=0;
while($rs_1=mysql_fetch_array($result1)){
$total=$total + ($rs_1[qty]*MONEY());
$i++;
?>
<tr  class="style4" >
		<td  align="center"height="25" width="10%">&nbsp; <?=$i?></td>
		<td  width="13%"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
		<td  width="12%" align="center"> &nbsp; <? 
		$rs_1[rec_id] ."cc<br>";
		 if($rs_1[rec_id] =='') echo "";
 else echo $rs_1[rec_id]; ?></td>
		<td  align="right"  width="11%"><? echo number_format($rs_1[qty]*MONEY(),2);  ?>&nbsp; 	 </td>
		<td   width="16%" align="center"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
		<td  align="center"  width="16%">&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
			<td  align="left"  width="14%">&nbsp;</td>
		<td  width="8%">&nbsp;</td>
	</tr>  
		<? }?>
		<tr class="style4">
<tr class="style4">
		<td   colspan="8" height="1"   valign="baseline"> <div  align="left">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div></td>
	</tr>
		<td  width="13%" colspan="8" height="40" class="style5"  valign="middle"><div align="center">�ӹǹ��� <span class="style6">&nbsp;&nbsp;&nbsp;&nbsp;<?=$i?>&nbsp;&nbsp;&nbsp;&nbsp; </span> ���
		&nbsp;&nbsp;&nbsp;&nbsp;�ӹǹ�Թ&nbsp;&nbsp;&nbsp;&nbsp; <span class="style6"><?=number_format($total)?> </span> &nbsp;&nbsp;&nbsp;&nbsp;�ҷ
		</div></td>
	</tr>
	</table>
	</td>
</tr>
</table>

	



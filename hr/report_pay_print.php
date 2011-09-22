<?
include("config.inc.php");
ob_start();
?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<style type="text/css">
<!--
.style4 { font-family:"Microsoft Sans Serif" font-size: 7px; }
.style13 {font-family: "Microsoft Sans Serif"; font-size: 12px; }
-->
</style>
<script language="JavaScript" type="text/javascript">
<!--
function printpage() {
	window.print();  
	
}
function MM_reloadPage(init) { 
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth;
	 document.MM_pgH=innerHeight; 
	 onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH)
   location.reload();
}
MM_reloadPage(true);
//-->
</script>
<body onLoad="window.print();">

<center>
<strong>รายงานเงินเดือนล่าสุด<br>
<br>
		<? if($div_id <>'') echo " &nbsp;กอง&nbsp; ".find_div_name1($div_id);
		if($sub_id <>'') echo " &nbsp;ฝ่าย&nbsp; ".find_sub_name1($sub_id)?>
		<br>
		<? if($cat_id <>'') echo " &nbsp;ประเภท&nbsp; ".find_cat_name($cat_id);
		if($type_id <>'') echo " &nbsp;ระดับ/หมวด&nbsp; ".find_type_name($type_id)?>
		</strong><br>
</center>
<table width="90%" cellpadding="0" cellspacing="0" border="1" align="center" bordercolor="#333333">

	<tr  class="style13" >
	<td  align="center" height="25" width="75" >ที่	</td>
		<td  align="center" height="25" width="396"> ชื่อ - ตำแหน่ง	</td>
		<td width="150"  align="center">เงินเดือน</td>
	   <td width="132"  align="center">ค่าครองชีพ<br />
      ชั่วคราว</td>
			<td width="135"  align="center">ค่าตอบแทน<br />
	  พิเศษ</td>
			<td width="135"  align="center">เงินประจำ<br />
	  ตำแหน่ง</td>
<td width="140"  align="center">รวม</td>
	</tr>

<?

 $sql="SELECT w.*,p.ps_tname_id,p.name,p.user_id as user_id1,ps.*  FROM person  p, ps_tname_ref ps , work w 
WHERE 1=1    and w.user_id =p.user_id  
and p.ps_tname_id = ps.ps_tname_id
 ";
if($div_id  <>'')$sql .= " AND w.div_id ='$div_id' ";
if($sub_id  <>'')$sql .= " AND w.sub_id ='$sub_id' ";
if($cat_id  <>'')$sql .= " AND w.cat_id ='$cat_id' ";
if($type_id  <>'')$sql .= " AND w.type_id ='$type_id' ";

if(find_w_id($div_id,$sub_id,$cat_id,$type_id) <>''){
		$sql .= "	 and  w.w_id in(".find_w_id($div_id,$sub_id,$cat_id,$type_id).")";
}
$sql .= "	 AND p.status =0  and p.type_mem = 0  ";
$sql .= "	 group by p.user_id  ";
$sql .= "  order by  w.w_id ";
$result1 = mysql_query($sql);

$x = 1;
$i = 0;
	if($Page >= 2 ){
			$i=$Page_start ;
		}else{
			$i =0;
		}
while($rs=mysql_fetch_array($result1)){

if($i%2 == 0) $bg ='#CCCCCC';
elseif($i%2 ==1) $bg ='#FFFFFF';
$i++;
$total_all = $rs[pay] +$rs[pay_live] +$rs[pay_special]+$rs[pay_posi];
?>

<tr  class="style13" >
		<td  align="center" height="25" width="75"><? echo $i?>&nbsp;</td>
		<td align="left" height="25" width="396">&nbsp; <? 
		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo $rs["name"]?><br />
	&nbsp;<? echo $rs["position"]?></td>
		
		

<td align="center"><?=number_format($rs[pay],2)?>&nbsp;</td>
			<td align="center"><?=number_format($rs[pay_live],2)?>&nbsp;</td>
			<td align="center"><?=number_format($rs[pay_special],2)?>&nbsp;</td>
			<td align="center"><?=number_format($rs[pay_posi],2)?>&nbsp;</td>
<td  align="center" height="25" width="140">&nbsp; <? echo number_format($total_all,2)?></td>
  </tr>  
		
	<? } 
?>	

</table>
	

<?
function find_pay($w_id){
		$sql1="SELECT * FROM work  where w_id ='$w_id' ";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	$rs1[pay]."^".$rs1[pay_live]."^".$rs1[pay_special]."^".$rs1[pay_posi]."^".$rs1[position]."^".$rs1[per_id];
}
function find_w_id($div_id,$sub_id,$cat_id,$type_id){
 $sql="SELECT max(w.w_id)as w_id 
FROM person p, ps_tname_ref ps, work w  
WHERE 1=1 and w.user_id =p.user_id  
and p.ps_tname_id = ps.ps_tname_id
 ";
		if($div_id  <>'')$sql .= " AND w.div_id ='$div_id' ";
		if($sub_id  <>'')$sql .= " AND w.sub_id ='$sub_id' ";
		if($cat_id  <>'')$sql .= " AND w.cat_id ='$cat_id' ";
		if($type_id  <>'')$sql .= " AND w.type_id ='$type_id' ";

		$sql .= "	 AND p.status =0  ";
		$sql .= "	 group by p.user_id  ";
		$sql .= "  order by  w.w_id ";
		$result1 = mysql_query($sql);
		$dd ="";
		while($rs1=mysql_fetch_array($result1)){
		if($rs1[w_id] <>''){
					$dd .= ",".$rs1[w_id];
		}
				
		}
		
		return substr($dd,1,strlen($dd)-1) ;
}?>
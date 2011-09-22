<?
ob_start();
include("config.inc.php");
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
<strong>บัญชีแสดงวันลา<?=$site_name?><br>
 &nbsp;<?  
	if($date_begin1 <>'') echo " ระหว่างวันที่ วันที่ ".date_2(date_format_sql($date_begin1));
	if($date_begin2 <>'')  echo "  &nbsp;ถึง&nbsp;  ". date_2(date_format_sql($date_begin2))?><br>
		<? if($div_id <>'') echo " &nbsp;กอง&nbsp; ".find_div_name1($div_id);
		if($sub_id <>'') echo " &nbsp;ฝ่าย&nbsp; ".find_sub_name1($sub_id)?>
		<br>
		<? if($cat_id <>'') echo " &nbsp;ประเภท&nbsp; ".find_cat_name($cat_id);
		if($type_id <>'') echo " &nbsp;ระดับ/หมวด&nbsp; ".find_type_name($type_id)?>
		</strong><br>
</center>
<table width="100%" cellpadding="0" cellspacing="0" border="1" align="center" bordercolor="#333333">

	<tr  class="style13" >
	<td  align="center" height="30" width="46" rowspan="2">ที่	</td>
		<td  align="center" height="25" width="171" rowspan="2"> ชื่อ - ตำแหน่ง	</td>
		<td  align="center" height="25" width="53" rowspan="2"> จำนวน<br />
		  ครั้งที่ลา</td>
		<td align="center" height="25"   colspan="7"> จำนวนวันลา</td>
		<td width="68" height="25"   rowspan="2"   align="center">ขาด ครั้ง </td>
        <td width="90" height="25"   rowspan="2"   align="center">มาสาย ครั้ง </td>
	</tr>
		<tr  class="style13" >
	<? 
	$sql1 ="SELECT * FROM ps_latype where status = 0 order by ps_latype_id";

		$result1 = mysql_query($sql1);
		while($rs1=mysql_fetch_array($result1)){
	
	?>
	<td  align="center" height="25"><?=$rs1[ps_latype_item]?>&nbsp;	</td>
<? }?>
		<td   align="center" height="25" > รวมวันลา	</td>

	</tr>
<?

$sql="SELECT *,p.user_id as user_id1 FROM (person p, ps_tname_ref ps)
left join  work w  on w.user_id =p.user_id  ";
if($div_id <>''  or $sub_id <>'' or $cat_id <>''  or   $type_id <>'' ) $sql .= " and w.w_id in(".find_w_id().") "; 
$sql .= " left join vacation v on v.user_id =p.user_id
left join come_late c on c.user_id = p.user_id
WHERE  p.ps_tname_id = ps.ps_tname_id   ";
if($div_id  <>'')$sql .= " AND w.div_id ='$div_id' ";
if($sub_id  <>'')$sql .= " AND w.sub_id ='$sub_id' ";
if($cat_id  <>'')$sql .= " AND w.cat_id ='$cat_id' ";
if($type_id  <>'')$sql .= " AND w.type_id ='$type_id' ";

if($date_begin1 <> '' and $date_begin2 <>''){
	$sql .= " 
	AND ((v.date_begin >= '".date_format_sql($date_begin1)."'  AND v.date_begin <=  '".date_format_sql($date_begin2)."'  )
	 or (c.date_late >='".date_format_sql($date_begin1)."' AND c.date_late <=  '".date_format_sql($date_begin2)."'  ))
 ";
}
$sql .= "	 AND p.status =0 ";
$sql .= "	 and p.type_mem = 0  group by p.user_id  ";
$result1 = mysql_query($sql);

$x = 1;
$i = 0;
	if($Page >= 2 ){
			$i=$Page_start ;
		}else{
			$i =0;
		}
		if($result1)
while($rs=mysql_fetch_array($result1)){

if($i%2 == 0) $bg ='#CCCCCC';
elseif($i%2 ==1) $bg ='#FFFFFF';
$i++;
?>

<tr   class="style13">
		<td  align="left" height="30" width="46">&nbsp; <? echo $i?></td>
		<td align="left" height="25" width="171">&nbsp; <? 
		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo $rs["name"]?><br />
		<? echo $rs["position"]?></td>
		
		<td  align="center"height="25" width="53" >&nbsp; <? 
		echo find_la_all($rs[user_id1],$date_begin1,$date_begin2)?></td>
			<? 
	$sql2 ="SELECT * FROM ps_latype where status = 0 order by ps_latype_id";

		$result2 = mysql_query($sql2);
		$total_all = 0;
		while($rs2=mysql_fetch_array($result2)){
		$total_all =$total_all + find_la_all_sub($rs[user_id1],$date_begin1,$date_begin2,$rs2[ps_latype_id]);
	?>
		<td   align="center" height="25" width="91">&nbsp; <? echo find_la_all_sub($rs[user_id1],$date_begin1,$date_begin2,$rs2[ps_latype_id])?></td>
	<? }?>
<td  align="center" height="25" width="87">&nbsp; <? echo $total_all?></td>
<td width="34" height="25"   align="center" >&nbsp; <? echo find_late_all1($rs[user_id1],$date_begin1,$date_begin2)?></td>
        <td width="38" height="25"   align="center" >&nbsp; <? echo find_late_all2($rs[user_id1],$date_begin1,$date_begin2)?></td>

  </tr>  
		
	<? } 
?>	

</table>
	

<?
function find_la_all($user_id,$date_begin,$date_end){
		$sql1="SELECT count(*) as sum FROM vacation  where user_id ='$user_id' 
		AND (date_begin >= '".date_format_sql($date_begin)."'  AND date_begin <=  '".date_format_sql($date_end)."'  ) ";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	$rs1[sum];
}
function find_la_all_sub($user_id,$date_begin,$date_end,$la_type){
		$sql1="SELECT *,TO_DAYS(date_end) - TO_DAYS(date_begin) as sum FROM vacation  where user_id ='$user_id' 
		and ps_latype_id ='$la_type'
		AND date_begin >= '".date_format_sql($date_begin)."'  AND date_begin <=  '".date_format_sql($date_end)."'   ";
		$result1 = mysql_query($sql1);
		$sum = 0;
		while($rs1=mysql_fetch_array($result1)){
				$sum = $sum + ($rs1[sum] + 1);
		}
		return 	$sum;
}

function find_late_all($user_id,$date_begin,$date_end){
		$sql1="SELECT count(*) as sum FROM come_late  where user_id ='$user_id' 
		AND (date_late >= '".date_format_sql($date_begin)."'  AND date_late <=  '".date_format_sql($date_end)."'  )  ";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	$rs1[sum];
}
function find_late_all1($user_id,$date_begin,$date_end){
		$sql1="SELECT count(*) as sum FROM come_late  where user_id ='$user_id' 
		AND (date_late >= '".date_format_sql($date_begin)."'  AND date_late <=  '".date_format_sql($date_end)."'  )  and time_late = 1 ";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	$rs1[sum];
}
function find_late_all2($user_id,$date_begin,$date_end){
		$sql1="SELECT count(*) as sum FROM come_late  where user_id ='$user_id' 
		AND (date_late >= '".date_format_sql($date_begin)."'  AND date_late <=  '".date_format_sql($date_end)."'  )  and time_late = 0";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	$rs1[sum];
}
function find_w_id(){
			$sql2="select max(start_work) as start_work ,user_id from work group by user_id ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd ="";
				while($rs2=mysql_fetch_array($result2)){
							 $sql="select  user_id,w_id from work where start_work = '$rs2[start_work]' and user_id ='$rs2[user_id]'  group by user_id ";
									$result1 = mysql_query($sql);
									if($result1)
									$rs1=mysql_fetch_array($result1);
											if($rs1[w_id] <>''){
												$dd .= $rs1[w_id].",";
											}
					}
					return substr($dd,0,strlen($dd)-1) ;
}

?>
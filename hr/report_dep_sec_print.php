<? ob_start(); ?>
<?
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



<table width="100%" cellpadding="0" cellspacing="0" border="1" align="center" bordercolor="#333333">
	<tr  class="style13" >
		<td align="center" height="30" colspan="6"> <strong>รายงานประวัติปฎิบัติราชการใช้กฎอัยการศึก   &nbsp;<?  
		if($date_begin1 <>'') echo " วันที่ ".date_2(date_format_sql($date_begin1));
		if($date_begin2 <>'')  echo "  &nbsp;ถึง&nbsp;  ". date_2(date_format_sql($date_begin2))?><br>
		<? if($div_id <>'') echo " &nbsp;&nbsp; ".find_div_name1($div_id);
		if($sub_id <>'') echo " &nbsp;&nbsp; ".find_sub_name1($sub_id)?>
		</strong></td>


	</tr>
	<tr   class="style13">
		<td  align="center" height="25" width="99"> เลขที่พนักงาน	</td>
		<td  align="center" height="25" width="152"> ชื่อ - สกุล</td>
		<td  align="center" height="25" width="193"> ตำแหน่ง</td>
		<td align="center" height="25" width="141"> วันที่</td>
		<td align="center" height="25" width="131"> ถึงวันที่</td>
		<td   align="center" height="25" width="189">หมายเหตุ</td>


	</tr>
	
<?


  $sql="SELECT p.*,l.* ,w.per_id,ps.ps_tname_item,w.user_id as user_id1,w.position
 FROM person  p, ps_tname_ref ps , work w , dep_sec l 
WHERE 1=1    and w.user_id =p.user_id   and p.user_id =l.user_id
and p.ps_tname_id = ps.ps_tname_id
 ";
if($date_begin1 <> '' and $date_begin2 <>''){
	$sql .= " AND l.date_begin >= '".date_format_sql($date_begin1)."' AND l.date_begin <= '".date_format_sql($date_begin2)."'  ";
}
if($div_id <>''){
	$sql .= " and w.div_id = '$div_id'  ";
}
if($sub_id <>''){
	$sql .= " and w.sub_id = '$sub_id'  ";
}

$sql .= "  and p.type_mem = 0 ";
$sql .= "  and w.w_id in(".find_w_id($div_id,$sub_id,$date_begin1,$date_begin2).") group by l.d_id  order by  w.per_id ";


$result1 = mysql_query($sql);
if($result1)
while($rs=mysql_fetch_array($result1)){

?>

<tr  class="style13" >
		
		<td align="left" height="25" width="99">&nbsp; <?
		echo $rs[per_id]?></td>
		
		<td   align="left"height="25" width="152" >&nbsp; <? 

		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo $rs["name"]?></td>
		<td    align="left"height="25" width="193">&nbsp; <?=$rs[position]?></td>
		<td   align="center" height="25" width="141">&nbsp; <? if($rs[date_begin] <>'0000-00-00')echo date_2($rs[date_begin]);else echo ""; ?></td>
		<td   align="center" height="25" width="131">&nbsp; <? if($rs[date_end] <>'0000-00-00')echo date_2($rs[date_end]);else echo ""; ?></td>
		<td   a align="left" height="25" width="189">&nbsp; <?=$rs[remark]?></td>
	</tr>  
		
	<? } 
?>	

</table>
	

<?
function find_w_id($div_id,$sub_id,$date_begin1,$date_begin2){
		$sql="SELECT max(w.w_id) as w_id FROM person  p, ps_tname_ref ps , dep_sec l,work w WHERE 
		p.user_id =l.user_id  and p.ps_tname_id = ps.ps_tname_id
		and w.user_id =p.user_id 
		and p.status =0   ";
		if($date_begin1 <> '' and $date_begin2 <>''){
				$sql .= " AND l.date_begin >= '".date_format_sql($date_begin1)."' AND l.date_begin <= '".date_format_sql($date_begin2)."'  ";
		}
		if($div_id <>''){
				$sql .= " and w.div_id = '$div_id'  ";
		}
		if($sub_id <>''){
				$sql .= " and w.sub_id = '$sub_id'  ";
		}

		$sql .= "  group by l.d_id  order by  w.per_id ";
		$result1 = mysql_query($sql);
		$dd ="";
		while($rs1=mysql_fetch_array($result1)){
				$dd .= $rs1[w_id].",";
		}
		return substr($dd,0,strlen($dd)-1) ;
}
?>
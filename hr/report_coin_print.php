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



<table width="100%" cellpadding="0" cellspacing="0" border="1" align="center" bordercolor="#333333">
	<tr  class="style13" >
		<td align="center" height="30" colspan="5"> <strong>รายงานประวัติรับเหรียญพระราชทาน  &nbsp;<?  
		if($date_begin1 <>'') echo " วันที่ ".date_2(date_format_sql($date_begin1));
		if($date_begin2 <>'')  echo "  &nbsp;ถึง&nbsp;  ". date_2(date_format_sql($date_begin2))?><br>
		<? if($div_id <>'') echo " &nbsp;&nbsp; ".find_div_name1($div_id);
		if($sub_id <>'') echo " &nbsp;&nbsp; ".find_sub_name1($sub_id)?>
		</strong></td>


	</tr>
	<tr   class="style13">
		<td  align="center" height="30" width="109"> เลขที่พนักงาน	</td>
		<td  align="center" height="25" width="195"> ชื่อ - สกุล</td>
		<td  align="center" height="25" width="243"> ตำแหน่ง</td>
		<td align="center" height="25" width="146"> วันที่</td>
		<td   align="center" height="25" width="214">ประเภท</td>


	</tr>
	
<?

$sql="SELECT p.*,l.* ,w.per_id,ps.ps_tname_item,w.user_id as user_id1,w.position FROM (person  p, ps_tname_ref ps , coin l)
 left join  work w  on w.user_id =p.user_id    ";
if($div_id <>''  or $sub_id <>'' or $cat_id <>''  or   $type_id <>'' ) $sql .= " and w.w_id in(".find_w_id().") "; 
$sql .= " WHERE p.user_id =l.user_id  and p.ps_tname_id = ps.ps_tname_id ";

if($date_begin1 <> '' and $date_begin2 <>''){
	$sql .= " AND l.co_date >= '".date_format_sql($date_begin1)."' AND l.co_date <= '".date_format_sql($date_begin2)."'  ";
}
if($div_id <>''){
	$sql .= " and w.div_id = '$div_id'  ";
}
if($sub_id <>''){
	$sql .= " and w.sub_id = '$sub_id'  ";
}

$sql .= " and p.type_mem = 0   group by l.co_id  order by  w.per_id ";

$result1 = mysql_query($sql);


while($rs=mysql_fetch_array($result1)){


?>

<tr  class="style13" >
		
		<td align="left" height="30" width="109">&nbsp; <?
		echo $rs[per_id]?></td>
		
		<td   align="left"height="25" width="195" >&nbsp; <? 

		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo $rs["name"]?></td>
		<td    align="left"height="25" width="243">&nbsp; <?=$rs[position]?></td>
		<td   align="center" height="25" width="146">&nbsp; <? if($rs[co_date] <>'0000-00-00')echo date_2($rs[co_date]);else echo ""; ?></td>
		<td    align="left" height="25" width="214">&nbsp; <?=$rs[detail]?></td>
	</tr>  
	<? } 
?>	
</table>
<?
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
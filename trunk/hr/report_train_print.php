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
		<td align="center" height="30" colspan="5"> <strong>รายงานการฝึกอบรม  &nbsp;<?  
		if($date_begin1 <>'') echo " วันที่ ".date_2(date_format_sql($date_begin1));
		if($date_begin2 <>'')  echo "  &nbsp;ถึง&nbsp;  ". date_2(date_format_sql($date_begin2))?><br>
		<? if($div_id <>'') echo " &nbsp;&nbsp; ".find_div_name1($div_id);
		if($sub_id <>'') echo " &nbsp;&nbsp; ".find_sub_name1($sub_id)?>
		</strong></td>


	</tr>
	<tr class="style13"  >
		<td  align="center"  height="30" width="179"> เลขที่พนักงาน	</td>
		<td  align="center" height="30" width="203"> ชื่อ - สกุล</td>
		<td align="center" height="30" width="186"> วันที่ฝึกอบรม</td>
		<td   align="center" height="30" width="178">ถึงวันที่</td>
		<td   align="center" height="30" width="205"> สถานที่	</td>

	</tr>
	
<?

$sql="SELECT p.*,t.* ,w.per_id,ps.ps_tname_item,w.user_id as user_id1 FROM (person  p, ps_tname_ref ps , training t) 
left join  work w  on w.user_id =p.user_id   ";
if($div_id <>''  or $sub_id <>'' or $per_id <>'' ) $sql .= " and w.w_id in(".find_w_id().") "; 
$sql .= " WHERE p.user_id =t.user_id  and p.ps_tname_id = ps.ps_tname_id
and p.status =0  ";
if($date_begin1 <> '' and $date_begin2 <>''){
	$sql .= " AND t.date_begin >= '".date_format_sql($date_begin1)."' AND t.date_begin <= '".date_format_sql($date_begin2)."'  ";
}
if($div_id <>''){
	$sql .= " and w.div_id = '$div_id'  ";
}
if($sub_id <>''){
	$sql .= " and w.sub_id = '$sub_id'  ";
}

$sql .= " and p.type_mem = 0   group by t.t_id  order by  w.per_id ";
$result1 = mysql_query($sql);

$x = 1;
$i = 0;
while($rs=mysql_fetch_array($result1)){

if($i%2 == 0) $bg ='#CCCCCC';
elseif($i%2 ==1) $bg ='#FFFFFF';
$i++;
?>

<tr class="style13" >
		
		<td align="left" height="30" width="179">&nbsp; <? 
		echo $rs[per_id]?></td>
		
		<td   align="left"height="30" width="203" >&nbsp; <? 
		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo $rs["name"]?></td>
		
		<td   align="center" height="30" width="186">&nbsp; <? if($rs[date_begin] <>'0000-00-00')echo date_2($rs[date_begin]);else echo ""; ?></td>
		<td   align="center" height="30" width="178">&nbsp; <? if($rs[date_end] <>'0000-00-00')echo date_2($rs[date_end]);else echo "";?></td>
		<td  align="left" height="30" width="205">&nbsp; <? echo $rs[place]?></td>
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
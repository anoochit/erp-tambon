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
</style><script language="JavaScript" type="text/javascript">
<!--
function printpage() {
	window.print();  
	
}
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
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



<table width="70%" cellpadding="0" cellspacing="0" border="1" align="center" bordercolor="#333333">
	<tr  class="style13" >
		<td align="center" height="30" colspan="2"> <strong>รายงานจำนวนบุคลากร</strong></td>


	</tr>
	<tr  class="style13" >
		<td align="center" height="25" width="552"> กอง / ฝ่าย</td>
		<td   align="center" height="25" width="104"> จำนวน</td>

	</tr>
	
<?
$sql="SELECT * FROM division  order by div_id";

$result = mysql_query($sql);
while($rs=mysql_fetch_array($result)){
?>
	<tr   class="style13"  >
		<td  align="left" height="25" width="552" bgcolor="#CCCCCC"><? echo find_div_name1($rs[div_id])?>&nbsp;</td>
		<td   align="center" height="25" width="104" bgcolor="#CCCCCC"><? echo find_div($rs[div_id])?>&nbsp;</td>
	</tr>  
		<?
		$sql1 ="SELECT * FROM subdivision where div_id ='$rs[div_id]'  order by sub_id";

		$result1 = mysql_query($sql1);
		while($rs1=mysql_fetch_array($result1)){
		?>
				<tr   class="style13"  >
				<td  align="left" height="25" width="552">&nbsp;&nbsp;&nbsp; <? echo find_sub_name1($rs1[sub_id])?></td>
				<td   align="center" height="25" width="104"><? echo find_sub($rs1[sub_id])?>&nbsp;</td>
			</tr>  
	<? } 
	}?>	

</table>
	

<?
function  find_div($div_id){
		$sql="SELECT max(w.w_id) as w_id FROM person p
		left join  work w  on w.user_id =p.user_id  and w.w_status =0
		WHERE  1 = 1  ";
		$sql .= " AND w.div_id ='$div_id' ";
		$sql .= "	 AND p.status =0 group by w.user_id  ";
		
		$result1 = mysql_query($sql);
		return mysql_num_rows($result1) ;
}
function find_sub($sub_id){
		$sql="SELECT max(w.w_id) as w_id FROM person p
		left join  work w  on w.user_id =p.user_id  and w.w_status =0
		WHERE  1 = 1  ";
		$sql .= " AND w.sub_id ='$sub_id' ";
		$sql .= "	 AND p.status =0 group by w.user_id  ";
		$result1 = mysql_query($sql);
		return mysql_num_rows($result1) ;
}
?>
<? ob_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();
include("config.inc.php");

?>
  <script language="JavaScript" type="text/javascript">
function printpage() {
window.print();  
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
</script>
<body onLoad="window.print();" >
<div align="center"><strong>
รายงานทะเบียนรับพัสดุ</strong></div>
<br><br>
<table width="100%"   border="1"align="center" cellspacing="0"  cellpadding="0"  bordercolor="#000000">
 <tr class="bmText"  >
        <td width="4%"  height="31" align="center"><strong>ที่</strong></td>
	<td width="10%"  height="31"><div align="center"><strong>เลขที่ใบส่งของ</strong></div></td>
		<td width="12%"  height="31"><div align="center"><strong>ทะเบียนเลขที่รับ</strong></div></td>
         <td width="11%" ><div align="center"><strong>วันที่รับ</strong></div></td>
    <td width="46%" ><div align="center"><strong>ชื่อ / จำนวนที่รับพัสดุ</strong></div></td>
    <td width="17%"  align="center"><strong>หมายเหตุ</strong></td> 
  </tr>
<?

$sql="SELECT  r.*,rd.*,r.r_id as r_id1,rd.rd_id as rd_id1 from receive r
left outer join receive_detail rd on  r.r_id = rd.r_id 
left outer join product p on  p.p_id = rd.p_id

WHERE 1 = 1   "; 
if($_SESSION[div_id] !=1) $sql .= " AND r.div_id = '$_SESSION[div_id]'  ";
if($num_id  <> '' ){
	$sql .= " AND r.num_id like '$num_id%'  ";
}
if($paper_id  <> '' ){
	$sql .= " AND r.paper_id like '$paper_id%'  ";
}
if($rd_name <> '' ){
	$sql .= " AND p.pro_name like '$rd_name%'  ";
}
if($type_id <> '' ){
	$sql .= " AND p.t_id = '$type_id'  ";
}
if($p_id <> '' ){
	$sql .= " AND p.p_id ='$p_id'  ";
}
if($date_receive <> '' and $date_receive1 <> ''){
	$sql .= " AND r.date_receive >= '".date_format_sql($date_receive)."' and r.date_receive <= '".date_format_sql($date_receive1)."'  ";
}
if($year <> '' ){
	$sql .= " AND r.paper_id like'%-".substr($year,2)."%' ";
}
$sql .= " group by r.num_id ";
$sql .= " order by r.date_receive desc ";

$result1 = mysql_query($sql);

while($rs=mysql_fetch_array($result1)){

	$i++;
?>       
<tr class="bmText" >
 <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $i; ?></font></font></td>
  <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $rs[num_id]; ?></font></font></td>
  <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $rs[paper_id]; ?></font></font></td>
 <td  align="center"><font size="2">&nbsp;<? echo date_2($rs[date_receive]);  ?></font></td>
                                         
 <td  ><div align="left"><font size="2"><?=code_1($rs[r_id1])?>&nbsp;</font></div></td>                                 
 <td  >&nbsp;<font size="2"><?=$rs[remark]?></font></td>
</tr>
<? }?>	  
  </table>
	  
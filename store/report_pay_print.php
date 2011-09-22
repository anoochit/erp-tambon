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
รายงานทะเบียนเบิกพัสดุ</strong></div>
<br><br>
<table width="100%"   border="1"align="center" cellspacing="0"  cellpadding="0"  bordercolor="#000000">
 <tr class="bmText"  >
        <td width="3%"  height="31" align="center"><strong>ที่</strong></td>
		<td width="11%"  height="31"  align="center"><strong>เลขที่เบิก</strong></td>
		<td width="12%"  height="31"  align="center"><strong>ทะเบียนเลขที่เบิก</strong></td>
         <td width="16%"  align="center"><strong>วันที่เบิก</strong></td>
		<td width="19%"  align="center"><strong>หน่วยงาน / ชื่อผู้เบิก</strong></td> 
         <td width="28%"  align="center"><strong>ชื่อพัสดุ</strong></td>
    <td width="11%"  align="center"><strong>หมายเหตุ</strong></td> 
  </tr>
<?
$sql="SELECT  p.*,pd.*,p.p_id as p_id1,pd.pd_id as pd_id1  from pay p
left outer join pay_detail pd on  p.p_id = pd.p_id 
left outer join product pt on  pt.p_id = pd.product_id
left outer join type t on  pt.t_id = t.t_id
WHERE 1 = 1   ";
$sql="SELECT  p.*,pd.*,p.p_id as p_id1,pd.pd_id as pd_id1  from pay p
left outer join pay_detail pd on  p.p_id = pd.p_id 
left outer join product pt on  pt.p_id = pd.product_id
left outer join type t on  pt.t_id = t.t_id
WHERE 1 = 1   ";
if($_SESSION[div_id] !=1)  $sql .= " AND p.div_id = '$_SESSION[div_id]'  ";
if($dep_name <>'') $sql .= " AND p.dep_name = '$dep_name'  ";
if($pay_id  <> '' ){
	$sql .= " AND p.pay_id like '$pay_id%'  ";
}
if($paper_id  <> '' ){
	$sql .= " AND p.paper_id like '$paper_id%'  ";
}
if($rd_name <> '' ){
	$sql .= " AND pt.pro_name like '$rd_name%'  ";
}
if($type_id <> '' ){
	$sql .= " AND pt.t_id = '$type_id'  ";
}
if($p_id <> '' ){
	$sql .= " AND pt.p_id ='$p_id'  ";
}
if($pay_date <> '' and $pay_date1 <> ''){
	$sql .= " AND p.pay_date >= '".date_format_sql($pay_date)."' and p.pay_date <= '".date_format_sql($pay_date1)."'  ";
}
if($year <> '' ){
	$sql .= " AND p.paper_id like'%-".substr($year,2)."%' ";
}
$sql .= " group by p.paper_id ";
$sql .= " order by p.pay_date desc ";


$result1 = mysql_query($sql);


while($rs=mysql_fetch_array($result1)){

	$i++;

?>       

<tr class="bmText" >
 <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $i; ?></font></font></td>
  <td  height="25"   align="left"><font size="2">&nbsp;<font size="2"><? echo $rs[pay_id]; ?></font></font></td>
  <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $rs[paper_id]; ?></font></font></td>
 <td  align="center"><font size="2">&nbsp;<? echo date_2($rs[pay_date]);  ?></font></td>
<td  align="left"><font size="2">&nbsp;<? 
if($_SESSION[div_id]=='0' or $_SESSION[div_id]=='1'){
	echo find_div_name($rs[dep_name])."/<br>&nbsp;".$rs[open_name];
}else{
    echo $rs[open_name];
}	
	  ?> </font>&nbsp;</td> 
                                              
 <td   align="left"><font size="2"><?=code_2($rs[p_id1])?>&nbsp;&nbsp;</font></td>
 <td  align="left"><font size="2">&nbsp;<? echo $rs[detail];  ?> </font></td> 
          </tr>
<? }?>	  
  </table>
	  
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
<style type="text/css">
.style3 {font-family: "Microsoft Sans Serif"; font-weight: bold; font-size: 14px; }
.style5 {font-family: "Microsoft Sans Serif"; font-size: 14px; }
</style>
<body onLoad="window.print();" >
<div align="center"><strong>
รายงาน รับ - เบิก พัสดุ</strong></div>
<br><br>

<table width="90%" align="center" cellspacing="0"  border="1" cellpadding="0"  bordercolor="#333333"style="border-collapse:collapse;">

  <tr class="bmText"  >
         <td width="16%"  rowspan="2" height="30"><div align="center" class="style3">วัน เดือน ปี</div></td>
         <td width="32%" rowspan="2"><div align="center" class="style3">รายการ</div></td>
		  <td colspan="3"  height="28"><div align="center" class="style3">จำนวน</div></td>
    <td width="11%"  align="center" rowspan="2"><span class="style3">หมายเหตุ</span></td> 
  </tr>
		    <tr class="bmText" >
         <td width="15%"   height="28"><div align="center" class="style3">รับ</div></td>
		  <td width="13%" ><div align="center" class="style3">จ่าย</div></td>
    <td width="13%"  align="center"><span class="style3">คงเหลือ</span></td> 
          </tr>
<?
$sql="SELECT  *,s.amount as amount1 from stock_card  s,  product p 
WHERE 1 = 1 and s.status = 0    and p.status = 0 and s.p_id = p.p_id "; 
if($_SESSION[div_id] !=1)   $sql .= " AND s.div_id = '$_SESSION[div_id]'  ";
if($p_id <> '' ){
	$sql .= " AND s.p_id ='$p_id'  ";
}
if($type <> '' ){
	$sql .= " AND s.s_type ='$type'  ";
}
if($type_id <> '' ){
	$sql .= " AND p.t_id = '$type_id'  ";
}
if($pro_name <> '' ){
	$sql .= " AND p.pro_name like '%$pro_name%'  ";
}
if($s_date <> '' and $s_date1 <> ''){
	$sql .= " AND s.s_date >= '".date_format_sql($s_date)."' and s.s_date <= '".date_format_sql($s_date1)."'  ";
}
if($year <> '' ){
	$sql .= " AND r.paper_id like'%-".substr($year,2)."%' ";
}
$sql .= " group by s.id  order by s.p_id ,s.s_date asc,s.id  asc ";

$result1 = mysql_query($sql);

while($rs=mysql_fetch_array($result1)){
		$i++;
?>       
<?
if(($pro_name_old <> $rs[pro_name]) and $i !=1){
?>
<tr >
<td  height="30"   align="left" colspan="6"><span class="style5"><font color="#FF0000"><strong>&nbsp;&nbsp;<? echo $rs[pro_name];  ?></strong></font>&nbsp;</span></td>
</tr>
<?
	}elseif($i ==1){?>
	<tr >
<td  height="30"  align="left"colspan="6"><span class="style5"><font color="#FF0000"><strong>&nbsp;&nbsp;<? echo $rs[pro_name];  ?></strong></font>&nbsp;</span></td>
</tr>
<? }?>
<tr class="bmText" >
 <td  height="28" align="center"><span class="style5">&nbsp;<? echo date_2($rs[s_date]);  ?></span></td>   
 <td   align="left"><span class="style5">&nbsp;
      <?
 if($rs[s_type] == 'R') echo " ใบรับเลขที่ ".find_paper_id($rs[num_id]);
 if($rs[s_type] == 'P') echo " ใบเบิกเลขที่ ".find_paper_id1($rs[num_id]);
 
 ?>
   &nbsp;</span></td>                                 
 <td   align="center"><span class="style5">&nbsp;
     <?  if($rs[s_type] == 'R') echo $rs[amount1]; ?>
 </span></td>
  <td   align="center"><span class="style5">&nbsp;
      <?  if($rs[s_type] == 'P') echo $rs[amount1]; ?>
  </span></td>
   <td   align="center"><span class="style5">&nbsp;
      <?  echo $rs[remain]; ?>
   </span></td>
      <td  align="center" ><span class="style5">&nbsp;
      <?  echo $rs[remark]; ?>
      </span></td>
  </tr>

 <? 
	$pro_name_old = $rs[pro_name];
	}
?>
        </table>

	 <?
function find_paper_id($rd_id){
		$sql = "Select  * from  receive  r, receive_detail rd
		 where r.r_id = rd.r_id and rd.rd_id ='$rd_id' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[paper_id];
}
function find_paper_id1($rd_id){
		$sql = "Select  * from  pay  p, pay_detail pd
		 where p.p_id = pd.p_id and pd.pd_id ='$rd_id' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[paper_id];
}
?> 
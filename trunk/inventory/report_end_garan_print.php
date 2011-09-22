<? ob_start();?>
<?
include("config.inc.php");

?>
<style type="text/css" media="print">
@page
{
size: landscape;
margin: 2cm;
}

</style>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<style type="text/css">
<!--
.style5 {
	font-size: 15px;
	font-family: "tahoma";
}
.style6 {
	font-size: 16px;
	font-family: "tahoma";
	font-weight: bold;
}
-->
</style>
<body onLoad="window.print()">
<br>
<center>
  <span class="style6">รายงานครุภัณฑ์หมดอายุ</span>
</center><br>
<br />

<table width="100%" align="center" cellspacing="1" border="1" cellpadding="1" bordercolor="#000000" >
  <tr  class="style6" >
        <td width="5%"  height="31" align="center"><strong>ที่</strong></td>
		<td width="24%" align="center"><strong>ชื่อครุภัณฑ์</strong></td>
         <td width="20%" align="center"><strong>รหัสครุภัณฑ์</strong></td>
		 <td width="15%" align="center"><strong>วันที่หมดอายุ</strong></td>
	<td width="12%"  align="center" ><strong>หมายเลขเครื่อง</strong></td> 
         <td width="13%" align="center"><strong>หมายเลขจอ</strong></td>
    <td width="11%"  align="center" ><strong>หมายเหตุ</strong></td> 
  </tr>
<?
$sql="SELECT c.code, c.num_machine , c.screen,rd.rd_name ,rd.endDate_garan , c.c_id as c_id1  from (receive r ,code c)
left  join receive_detail rd on  r.r_id = rd.r_id 
WHERE 1 = 1  and c.rd_id = rd.rd_id ";

if($endDate_garan <> '' and $endDate_garan <> ''){
		$sql .= " AND rd.endDate_garan >= '".date_format_sql($endDate_garan)."'  AND rd.endDate_garan <= '".date_format_sql($endDate_garan1)."'  ";
}else{
		$sql .= "  AND rd.endDate_garan <= '".date("Y-d-m")."'  ";
}
$sql .= " and r.type = 0 ";
$sql .= " group by c.c_id ";
$sql .= "  order by   rd.rd_name,abs(mid(c.code,9) ) desc ";
$result = mysql_query($sql);
if($result)
$i =0;
while($rs=mysql_fetch_array($result)){
$i++;
?>       

<tr  class="style5">
 <td  height="25"  align="center" >&nbsp;<? echo $i; ?></td>
 <td  height="25" align="left" >&nbsp;<? echo $rs[rd_name]; ?></td> 
 <td  align="left" >&nbsp; <? echo $rs[code];  ?></td>
 <td  height="25" align="center" >&nbsp;<? echo date_2($rs[endDate_garan]); ?></td> 
   <td align="center" >&nbsp;<? echo $rs[num_machine];  ?>  </td>
              <td  align="center" >&nbsp;<?=$rs[screen]?></td>                                 
 <td  >&nbsp;<?=$rs[remark]?></td>
  </tr>

 <? 

	}
?>
</table>
</div>

</center>


<script language="JavaScript" type="text/javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("คุณต้องการลบข้อมูลทั้งหมดนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<?
function check_stock_1($s_date,$p_id){
		$sql = "Select s_date ,max(id),amount from stock_card  where p_id = '$p_id' and s_date <= '$s_date' group by amount
		order by s_date desc ,id desc  limit 1";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['amount'].",".$arr['id'];
}
function check_id($num_id){
		$sql = "Select id from stock_card  where num_id = '$num_id' and s_type = 'P' ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['id'];
}
	function update_stock( $s_date , $amount , $p_id ,$num_id ,$id ){ 
		$sql = "Select *  from stock_card  where p_id ='$p_id' and 
		((s_date = '$s_date' and id >  $id) or s_date > '$s_date' )
		 and status = 0  ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - $amount;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' ";
				$result_up = mysql_query($sql_up); 
		}
}

function find_amount($num_id){
		$sql = "Select amount from stock_card  where num_id = '$num_id' and s_type = 'P' ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['amount'];
}
function remain($pay_date,$p_id,$product_id , $div_id ){
		$sql = "Select * from stock_card  where num_id = '$p_id' and s_type = 'P' and s_date = '$pay_date' and p_id = '$product_id'  
		and div_id = '$div_id' and status = 0";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'];
}
?>
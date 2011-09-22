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
.style5 {
	font-size: 15px;
	font-family: "tahoma";
}
.style6 {
	font-size: 16px;
	font-family: "tahoma";
	font-weight: bold;
}

</style>
<body onLoad="window.print()">
<br>
<center>
  <span class="style6">ใบเบิกพัสดุ</span>
</center><br>
<table width="98%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #000000 1px solid;" >
	<?
	$p_id = $_REQUEST["p_id"] ;

$sql = "SELECT * FROM pay WHERE p_id= $p_id";

$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
	$p_id = $rs[p_id];
	?>
	
	<div><b><span class="style5">เลขที่เบิก</span></b>
	  <span class="style5">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["pay_id"]?></span></div>
	<span class="style5"><br>
	</span>
	<div class="style5"><b>ทะเบียนเอกสาร</b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["paper_id"]?></div>
	<span class="style5"><br>
	</span>
	<div class="style5"><b>วันที่เบิก</b>&nbsp;&nbsp;&nbsp;&nbsp;
	<?=date_2($rs["pay_date"])?></div>
	<span class="style5"><br>
	</span>
<? if($_SESSION[div_id] == '0'){ ?>
	<div class="style5"><b>หน่วยงานที่เบิก</b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo find_div_name($rs["dep_name"])?></div>
	<? }?>
	<div class="style5"><b>ผู้เบิก</b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["open_name"]?></div>
	<span class="style5"><br>
	</span>
	<div class="style5"><b>ประเภทการเบิก</b>
	&nbsp;&nbsp;&nbsp;&nbsp;
<? 
if($rs["pay_type"] == 0) echo "การเบิกจ่ายใช้งานตามปกติ " ;
if($rs["pay_type"] == 1) echo "การโอนให้";
if($rs["pay_type"] == 2) echo "การยืมและการคืน ";
		?> </div>
	<span class="style5"><br>
	</span>
	<div class="style5"><b>รายละเอียด</b>&nbsp;&nbsp;&nbsp;&nbsp;
	<? echo $rs["detail"] ;?>	</div>	</td>
  </tr>
</table>
<br />

<table width="98%" align="center" cellspacing="1" border="0" style="border-collapse:collapse;">

<tr  class="style5">
     
                                                  <td width="45%"  height="28"   align="center"style="border: #000000 1px solid;"  >
                                                     <b>รายการ</b>           </td>
	
                                                  <td width="18%"   align="center"style="border: #000000 1px solid;"  >
                                                      <b>จำนวนที่เบิก</b>             </td>
			            <td width="21%"   align="center"style="border: #000000 1px solid;"  >
                                                      <b>จำนวนคงเหลือ</b>             </td>
                                                  
              <td width="16%"  align="center" style="border: #000000 1px solid;"  ><b>หน่วยนับ</b></td>


  </tr>
<?
$sql = "Select pd.*,p.pro_name,pd.unit from pay_detail pd
left outer join product p on  p.p_id = pd.product_id
where pd.p_id ='$p_id'  ";

$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
$total = $total + ($rs1[cost] * $rs1[amount] );
?>
<tr  class="style5" >
	<td height="28" style="border: #000000 1px solid;"   align="left">&nbsp;
	  <?=$rs1[pro_name]?>   </td>		

	<td style="border: #000000 1px solid;"  align="center" >
	  <? echo $rs1[amount];   ?>
   </td>

<td style="border: #000000 1px solid;"  align="center" >
	  <? echo  remain($rs["pay_date"],$rs1[pd_id],$rs1[product_id],$_SESSION[div_id]);  ?>
   </td>
	<td  style="border: #000000 1px solid;"   align="center">
	  <?=$rs1[unit]?>&nbsp;
   </td>

</tr>
<? 

	$i++;
}?>
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
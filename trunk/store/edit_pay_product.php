<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();

if($del == 'del'){

		$amount =  check_product_m($product) + $amount ;
		
		$sql_up = "UPDATE product  SET  amount = $amount
		 WHERE  pro_name  ='$product'  and status =0";
		$result_up = mysql_query($sql_up); //$order_num[$i]
		//echo $sql_up."<br>";
		$sql_del = "DELETE FROM pay_detail WHERE id=$id";
		//echo $sql_del;
		$result_del = mysql_query($sql_del);
		
		$sql_l = "DELETE  FROM  listControl_p   WHERE  n_id ='$id'  and list = 'ใบขอเบิก' ";
		$result_l = mysql_query($sql_l); //$order_num[$i]
				
		//print "<meta http-equiv=\"refresh\" content=\"0;URL=?action=edit_pay_product&p_id=$p_id\">\n";
}
if($delete <> ''){
	$sql = "SELECT * FROM pay_detail Where p_id = '$p_id'   ";
		//echo $sql ."<br>";
		$result = mysql_query($sql);
		while($rs=mysql_fetch_array($result)){
			$amount =  check_product_m($rs[product]) + $rs[amount] ;
		
			$sql_up = "UPDATE product  SET  amount = $amount
			 WHERE  pro_name  ='$rs[product]'  and status =0";
			 //echo $sql_up ."<br>";
			$result_up = mysql_query($sql_up); //$order_num[$i]
		}
	$sql_del = "DELETE FROM pay WHERE p_id=$p_id";
	//echo $sql_del."<br>";
	$result_del = mysql_query($sql_del);
	
	$sql_del1 = "DELETE FROM pay_detail WHERE p_id=$p_id";
	//echo $sql_del1."<br>";
	$result_del1 = mysql_query($sql_del1);
	
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?action=find_edit_pay_product\">\n";
}

$p_id = $_REQUEST["p_id"] ;

$sql = "SELECT * FROM pay WHERE p_id= $p_id";
//echo $sql."<br>";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
	$p_id = $rs[p_id];
	?>
<style type="text/css">
<!--
.style1 {
	font-family: Tahoma;
	font-weight: bold;
	font-size: 14px;
	color: #000000;
}
-->
</style>
<link href="style2.css" rel="stylesheet" type="text/css" />
<div align="center">
<br />
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td align="center" colspan="2" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div >แก้ไข การเบิก </div>	</td>
	</tr>
</table></td>
</tr>
</table>
<form name="save"  method="post" enctype="multipart/form-data">
<input type="hidden" name="p_id" value="<?=$p_id?>">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td align="center" colspan="2" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td bgcolor="#C1E0FF" class="lgBar" >
		<div><b>ราการเบิกพัสดุ </b></div>	</td>
	</tr>
	<tr class="bmText" align="left">
	<td>
	<div><b>เลขที่เบิก </b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["pay_id"]?></div>
	<div><b>วันที่เบิก  </b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo date_format_th_1($rs["pay_date"])?></div>
	<div><b>ประเภทการเลิก  </b>&nbsp;&nbsp;&nbsp;&nbsp;<?
	if($rs["pay_type"] ==0) echo "การเบิกจ่ายใช้งานตามปกติ";
	elseif($rs["pay_type"] ==1) echo "การโอนให้";
	elseif($rs["pay_type"] ==2) echo "การยืมและการคืน";
	?></div>
	<div><b>ชื่อผู้เบิก </b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["open_name"]?></div>
	<div><b>หน่วยงาน </b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["dep_id"]?></div>
	<div><b>ชื่อผู้จ่าย </b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["user_add"] ?></div>
	<div><b>แผนงาน  </b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["plan_work"]?></div>
	<div><b>ชื่อโครงการ </b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo  $rs["project_name"]?></div>
	<div><b>ชื่อผู้รับ </b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["receive_name"]?></div>
	<div><b>รายละเอียด</b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["detail"]?></div>
<div align="center"><input   type="button" name="add" value=" แก้ไข " onClick="javascript:window.open('Sample11.php?p_id=<?=$rs["p_id"]?>&tab=1','xxx','scrollbars=yes,width=700,height=500')">
&nbsp;&nbsp;&nbsp;<input   type="submit" name="delete" value="ลบใบเบิก"  onclick="return godel_1();"></div>
<? //}?>	</td>
	</tr>
	<tr align="left">
	<td bgcolor="#C1E0FF" class="lgBar" >
		<div><b>รายละเอียดพัสดุที่ขอเบิก &nbsp;&nbsp;&nbsp;<input   type="button" name="add" value=" เพิ่ม " onClick="javascript:window.open('Sample11.php?p_id=<?=$p_id?>&tab=2','xxx','scrollbars=yes,width=600,height=500')"> </b></div>	</td>
	</tr>
	<tr>
	<td height="10">	</td>
	</tr>
<tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="center">
<tr class="bmText"  bgcolor="#C1E0FF">
                    <td width="35%" ><div align="center"> <b><span style="font-size:11pt;"><font face="MS Sans Serif">รายละเอียดพัสดุที่ขอเบิก</font></span></b> </div></td>
                                                  <td width="24%" ><div align="center">
                                                     <b><span style="font-size:11pt;"><font face="MS Sans Serif">ประเภท</font></span></b>
                    </div></td>
                                               
                    <td width="13%" ><div align="center"><b><span style="font-size:11pt;"><font face="MS Sans Serif">จำนวน</font></span></b></div></td> <td width="21%" ><div align="center"><b><span style="font-size:11pt;"><font face="MS Sans Serif">หน่วยนับ</font></span></b></div></td>
                       <!--<td width="8%" align="center"></td>    --> 
                                                 <td width="7%" align="center"></td> 
                                                  
                                            <!--      <td width="5%" style=""><p align="center">ลบ</p></td> -->
                  </tr>
<?
$sql = "SELECT * FROM pay_detail Where p_id = '$p_id'   ";
///echo $sql ."<br>";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
?>
<tr  class="bmText" >
	<td height="25"><div align="left">
	  <?=$rs1[product]?>
    </div></td>
	<td height="25"><div align="left">
	  <?=find_type($rs1[p_type])?>
    </div></td>
	

	<td  ><div  align="center">
	  <?=$rs1["amount"]?>
    </div></td>
	<td><div  align="center">
	  <?=$rs1["unit"]?>
    </div></td>
<!--	<td width="8%" align="center"><a href="#" onClick="javascript:window.open('Sample11.php?p_id=<?=$p_id?>&id=<?=$rs1["id"]?>&tab=3','xxx','scrollbars=yes,width=600,height=500')">แก้ไข</a></td>  -->   
      <td width="7%" align="center"><a href="?action=edit_pay_product&del=del&p_id=<?=$p_id?>&id=<?=$rs1["id"]?>&amount=<?=$rs1["amount"]?>&product=<?=$rs1["product"]?>" onclick="return godel();">ลบ</a></td> 
</tr>
<? 
	//$total = $total + ($rs1["amount"]*$rs1["cost"]);
	$i++;
}?>
</table>	</td>
	</tr>
	<tr>
	<td height="10">	</td>
	</tr>
</table>
</td></tr></table>
</form>

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
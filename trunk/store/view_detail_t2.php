<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();

if($delete_1 <> ''){

	$sql = "DELETE FROM pay WHERE p_id=$p_id";
	$result = mysql_query($sql);
	
	$sql_del = "DELETE FROM pay_detail WHERE p_id=$p_id";
	$result_del = mysql_query($sql_del);
	
	echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=seach_edit_t1\">\n";
}

if($del == 'del'){

	$sql_del = "DELETE FROM pay_detail WHERE pd_id=$pd_id";
	$result_del = mysql_query($sql_del);
	
	// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
	$id = check_id($pd_id);
	$amount = find_amount($pd_id);
	update_stock($pay_date,$amount,$product_id , $pd_id  , $id);
	//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card			
	$sql = "UPDATE stock_card SET status = 1  WHERE num_id=$pd_id and s_type = 'P' ";
	$result = mysql_query($sql);
	
	$sql_in = "INSERT delete_detail (id , date_time , type ) values ( '$pd_id' , NOW() , 'P' )  ";
	$result = mysql_query($sql_in);
	
	echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=view_detail_t2&p_id=$p_id&type_id=$type_id\">\n";
}
	?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<br />
<div align="center">
<? 
if($type_id ==10){
	$na = 'วัสดุสำนักงาน';
}elseif($type_id ==11){
	$na = 'วัสดุงานบ้านงานครัว';
}
?>
<form name="save"  method="post" enctype="multipart/form-data">

<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td colspan="2" align="center"  style="border: #7292B8 1px solid;" >
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		แก้ไข / ลบ เบิก<?=$na?></td>
	</tr>
</table></td>
</tr>
</table><br />

<table width="98%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;" >
	<?
	$p_id = $_REQUEST["p_id"] ;

$sql = "SELECT * FROM pay WHERE p_id= $p_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
	$p_id = $rs[p_id];
	?>
	
	<div><b><font color="#FF0066" >เลขที่เบิก</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["pay_id"]?></div>
	<div><b><font color="#FF0066" >ทะเบียนเอกสาร</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["paper_id"]?></div>
	<div><b><font color="#FF0066" >วันที่เบิก</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<?=date_2($rs["pay_date"])?></div>
	<div><b><font color="#FF0066" >ผู้เบิก</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["open_name"]?></div>
	<div><b><font color="#FF0066" >ประเภทการเบิก</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;
<? 
if($rs["pay_type"] == 0) echo "การเบิกจ่ายใช้งานตามปกติ " ;
if($rs["pay_type"] == 1) echo "การโอนให้";
if($rs["pay_type"] == 2) echo "การยืมและการคืน ";
		?> </div>
	<div><b><font color="#FF0066" >รายละเอียด</font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<? echo $rs["detail"] ;?>

	</div>

<div align="center"><input   type="button" name="add" value=" แก้ไข " onClick="javascript:popup('sample_1_p.php?p_id=<?=$rs["p_id"]?>','',500,300)" class="buttom">

&nbsp;&nbsp;&nbsp;

</div>


	</td>
	</tr>
</table>
<br />
<table width="98%" align="center" cellspacing="1" border="0" style="border-collapse:collapse;">
<tr bgcolor="#C9D4E1"   ><td colspan="7" height="30" style="border: #000000 1px solid;"  align="left" >&nbsp;&nbsp;[ 
 <a href="#" onClick="javascript:popup('sample_9_p.php?p_id=<?=$rs["p_id"]?>&pay_date=<?=$rs["pay_date"]?>&type_id=<?=$type_id?>','',550,230)"  class="bar_add">เพิ่มรายการ</a>  ] &nbsp;&nbsp;[ 
 <a href="view_detail_2_print.php?p_id=<?=$rs["p_id"]?>&type_id=<?=$type_id?>"  class="bar_add" target="_blank">พิมพ์หน้านี้</a>  ] 
</td>
</tr>
<tr class="bmText"  bgcolor="#DEE4EB">
     
                                                  <td width="36%"  height="25"   align="center"style="border: #000000 1px solid;"  >
                                                     <b>รายการ</b>           </td>
	 <td width="9%"  align="center" style="border: #000000 1px solid;"  ><b>หน่วยนับ</b></td>
	 <td width="13%"  align="center" style="border: #000000 1px solid;"  ><b>ราคาต่อหน่วย</b></td>
                                                  <td width="13%"   align="center"style="border: #000000 1px solid;"  >
                                                      <b>จำนวนที่เบิก</b>             </td>
			            <td width="14%"   align="center"style="border: #000000 1px solid;"  >
                                                      <b>จำนวนคงเหลือ</b>             </td>
                           <td width="9%"   align="center"style="border: #000000 1px solid;"  >
                                                      <b>ราคาบาท</b>             </td>                        
             

<td width="6%" align="center" style="border: #000000 1px solid;"  ><b>ลบ</b></td> 
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
<tr  class="bmText"   >
	<td height="25" style="border: #000000 1px solid;"   align="left">&nbsp;
	  <?=$rs1[pro_name]?>
   </td>		
<td  style="border: #000000 1px solid;"   align="center">
	  <?=$rs1[unit]?>&nbsp;
   </td>
   <td  style="border: #000000 1px solid;"   align="center">
	  <?=price_product($rs1[product_id])?>&nbsp;
   </td>
	<td style="border: #000000 1px solid;"  align="center" >
	  <? echo $rs1[amount];   ?>
   </td>

<td style="border: #000000 1px solid;"  align="center" >
	  <? echo number_format(remain($rs["pay_date"],$rs1[pd_id],$rs1[product_id]));   ?>
   </td>
	<td style="border: #000000 1px solid;"  align="center" >
	  <? echo number_format( $rs1[amount] * price_product($rs1[product_id]));   ?>
   </td>
		<td  style="border: #000000 1px solid;"   align="center">
		<a href="?action=view_detail_t2&del=del&p_id=<?=$p_id?>&pd_id=<?=$rs1["pd_id"]?>&pay_date=<?=$rs["pay_date"]?>&product_id=<?=$rs1[product_id]?>&type_id=<?=$type_id?>"  onclick="return godel()"><img src="images/Delete.png" border="0" /></a>
<!--&amount=<?=$rs1[amount]?> -->
</td>
</tr>
<? 

	$i++;
}?>
</table>
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
function remain($pay_date,$p_id,$product_id){
		$sql = "Select * from stock_card  where num_id = '$p_id' and s_type = 'P' and s_date = '$pay_date' and p_id = '$product_id'  and status = 0";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'];
}
?><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  

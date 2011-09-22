<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
	<?
session_start();

if($del == 'del'){
	
	// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
	$id = check_id($pd_id,$_SESSION[div_id],$product_id);
	$amount = find_amount($pd_id,$_SESSION[div_id],$product_id);
	update_stock($pay_date,$amount,$product_id , $pd_id  , $id ,$_SESSION[div_id]);
	//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card			

	$sql = "UPDATE stock_card SET status = 1  WHERE num_id = '$pd_id' and s_type = 'P' 
	and div_id = '".$_SESSION[div_id]."' and p_id = '$product_id'   "; 
	$result = mysql_query($sql);
	
	$detail1  = pay($p_id);
	$detail2  = pay_detail($pd_id);
	$sql_in = "INSERT delete_detail (detail1 , detail2 , date_time , type ) values ( '$detail1','$detail2' ,NOW() , 'P' )  ";
	$result = mysql_query($sql_in);
	
	$sql_del = "DELETE FROM pay_detail WHERE pd_id=$pd_id";
	$result_del = mysql_query($sql_del);

	
	if($dep_name <>'0'){
			$rd_id = find_receive_id($pd_id);
			$r_id = find_receive_id1($pd_id);
			$id = check_id_p($rd_id ,$dep_name,$product_id);
			$amount = find_amount_p($rd_id ,$dep_name,$product_id);
			update_stock_p($pay_date,$amount,$product_id , $rd_id  , $id ,$dep_name);
			//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card			
			$sql = "UPDATE stock_card SET status = 1  WHERE num_id= '$rd_id' and s_type = 'R' and div_id = '$dep_name' and p_id = '$product_id'   ";
			$result = mysql_query($sql);
	
			$detail1  = receive($r_id);
			$detail2  = receive_detail($rd_id);
			$sql_in = "INSERT delete_detail (detail1 , detail2 , date_time , type ) values ( '$detail1','$detail2' , NOW() , 'R' )  ";
			$result = mysql_query($sql_in);
			
			$sql_del = "DELETE FROM receive_detail WHERE rd_id='$rd_id' ";
			$result_del = mysql_query($sql_del);
	
	}
	
	
	echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=view_detail_2&p_id=$p_id\">\n";
}

if($delete_1  <>'' ){

						$sql_f = "Select *  from pay_detail pd , pay  p 
						where p.p_id = pd.p_id  and  p.p_id ='".$p_id."' group by pd.pd_id  ";
						
						$result_f  = mysql_query($sql_f );

						while($rs_f =mysql_fetch_array($result_f )){
		
							// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
		
							$id = check_id($rs_f[pd_id],$_SESSION[div_id],$rs_f[product_id]);
							$amount = find_amount($rs_f[pd_id],$_SESSION[div_id],$rs_f[product_id]);
							update_stock($rs_f[pay_date],$amount,$rs_f[product_id] , $rs_f[pd_id]  , $id ,$_SESSION[div_id]);
							
							//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card			

							$sql = "UPDATE stock_card SET status = 1  WHERE num_id = '".$rs_f[pd_id]."' and s_type = 'P' 
							and div_id = '".$_SESSION[div_id]."'  and p_id = '".$rs_f[product_id]."'   "; 
							$result = mysql_query($sql);
							
							$detail1  = pay($p_id);
							$detail2  = pay_detail($rs_f[pd_id]);
							$sql_in = "INSERT delete_detail (detail1 , detail2 , date_time , type ) values ( '$detail1','$detail2' ,NOW() , 'P' )  ";
							$result = mysql_query($sql_in);
							
							if($rs_f[dep_name] <>'0'){
												$rd_id = find_receive_id($rs_f[pd_id]);
												$r_id = find_receive_id1($rs_f[pd_id]);
												
												$id = check_id_p($rd_id ,$rs_f[dep_name],$rs_f[product_id]);
												$amount = find_amount_p($rd_id ,$rs_f[dep_name],$rs_f[product_id]);
												update_stock_p($rs_f[pay_date],$amount,$rs_f[product_id] , $rd_id  , $id ,$rs_f[dep_name]);	
												
												$sql = "UPDATE stock_card SET status = 1  WHERE num_id= '$rd_id' and s_type = 'R' and div_id = '$rs_f[dep_name]' and p_id = '$rs_f[product_id]'   ";
												$result = mysql_query($sql);
												
												$detail1  = receive($r_id);
												$detail2  = receive_detail($rd_id);
												
												$sql_in = "INSERT delete_detail (detail1 , detail2 , date_time , type ) values ( '$detail1','$detail2' , NOW() , 'R' )  ";
												$result = mysql_query($sql_in);
												
												$sql_del = "DELETE FROM receive_detail WHERE rd_id='$rd_id' ";
												$result_del = mysql_query($sql_del);
										
											}
										
										$sql_del = "DELETE FROM pay_detail WHERE pd_id= '$rs_f[pd_id]'";
										$result_del = mysql_query($sql_del);
							}
							$sql_del_1 = "DELETE FROM pay WHERE p_id ='".$p_id."'  ";
							$result_del_1 = mysql_query($sql_del_1);
							
							$sql_del_2 = "DELETE FROM receive  WHERE pay_id ='".$p_id."'  ";
							$result_del_2 = mysql_query($sql_del_2);
							
							echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
							print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=seach_edit_2\">\n";

}
	?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<br />
<div align="center">

<form name="save"  method="post" enctype="multipart/form-data">
<input type="hidden" name="p_id" value="<?=$p_id?>"> 
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td colspan="2" align="center"  style="border: #7292B8 1px solid;" >
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		แก้ไข / ลบ เบิกพัสดุ</td>
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
//echo $sql."<br>";
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
	<? if($_SESSION[div_id] == '0'){ ?>
	<div><b><font color="#FF0066" >หน่วยงานที่เบิก</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo find_div_name($rs["dep_name"])?></div>
	<? }?>
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

<? if($_SESSION[div_id] !='1'){?>
<div align="center"><input   type="button" name="add" value=" แก้ไข " onClick="javascript:popup('sample_1_p.php?p_id=<?=$rs["p_id"]?>','',550,350)" class="buttom">
&nbsp;&nbsp;&nbsp;<input   type="submit" name="delete_1" value=" ยกเลิกใบเบิก "  onclick="return godel_1();" class="buttom"> 

</div>

<? }?>
	</td>
	</tr>
</table>
<br />
<table width="98%" align="center" cellspacing="1" border="0" style="border-collapse:collapse;">
<? if($_SESSION[div_id] !='1'){?>
<tr bgcolor="#C9D4E1"   ><td colspan="5" height="30" style="border: #000000 1px solid;"  align="left" >&nbsp;&nbsp;[ 
 <a href="#" onClick="javascript:popup('sample_9_p.php?p_id=<?=$rs["p_id"]?>&pay_date=<?=$rs["pay_date"]?>&div_id1=<?=$rs["dep_name"]?>','',550,230)"  class="bar_add">เพิ่มรายการ</a>  ] &nbsp;&nbsp;[ 
 <a href="view_detail_2_print.php?p_id=<?=$rs["p_id"]?>"  class="bar_add" target="_blank">พิมพ์หน้านี้</a>  ] 
</td>
</tr>
<? }?>
<tr class="bmText"  bgcolor="#DEE4EB">
     
                                                  <td width="39%"  height="25"   align="center"style="border: #000000 1px solid;"  >
                                                     <b>รายการ</b>           </td>
	
                                                  <td width="16%"   align="center"style="border: #000000 1px solid;"  >
                                                      <b>จำนวนที่เบิก</b>             </td>
			            <td width="18%"   align="center"style="border: #000000 1px solid;"  >
                                                      <b>จำนวนคงเหลือ</b>             </td>
                                                  
              <td width="17%"  align="center" style="border: #000000 1px solid;"  ><b>หน่วยนับ</b></td>
<? if($_SESSION[div_id] !='1'){?>
<td width="10%" align="center" style="border: #000000 1px solid;"  ><b>ลบ</b></td> 
<? }?>
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

	<td style="border: #000000 1px solid;"  align="center" >
	  <? echo $rs1[amount];   ?>
   </td>

<td style="border: #000000 1px solid;"  align="center" >
	  <? echo remain($rs["pay_date"],$rs1[pd_id],$rs1[product_id],$_SESSION[div_id]);   ?>
   </td>
	<td  style="border: #000000 1px solid;"   align="center">
	  <?=$rs1[unit]?>&nbsp;
   </td>
   <? if($_SESSION[div_id] !='1'){?>
		<td  style="border: #000000 1px solid;"   align="center">
		<a href="?action=view_detail_2&del=del&p_id=<?=$p_id?>&pd_id=<?=$rs1["pd_id"]?>&pay_date=<?=$rs["pay_date"]?>&product_id=<?=$rs1[product_id]?>&dep_name=<?=$rs["dep_name"]?>"  onclick="return godel()"><img src="images/Delete.png" border="0" /></a>
</td>
<? }?>
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
	if (confirm("คุณต้องการยกเลิกใบเบิกนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<?
function check_stock_1($s_date,$p_id){
		$sql = "Select s_date ,max(id),amount from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0  group by amount
		order by s_date desc ,id desc  limit 1";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['amount'].",".$arr['id'];
}
function check_id($num_id , $div_id ,$p_id ){
		$sql = "Select id from stock_card  where num_id = '$num_id' and s_type = 'P' and div_id = '$div_id' and p_id ='$p_id' and status = 0 ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['id'];
}
	function update_stock( $s_date , $amount , $p_id ,$num_id ,$id  , $div_id  ){ 
		$sql = "Select *  from stock_card  where p_id ='$p_id' and 
		((s_date = '$s_date' and id >  $id) or s_date > '$s_date' ) and div_id ='$div_id'
		 and status = 0  ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - $amount;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' ";
				$result_up = mysql_query($sql_up); 
		}
}

function find_amount($num_id  , $div_id ,$p_id){
		$sql = "Select amount from stock_card  where num_id = '$num_id' and s_type = 'P' and div_id = '$div_id' and p_id = '$p_id' and status = 0 ";
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

function check_id_p($num_id ,$div_id , $product_id ){
		$sql = "Select id from stock_card  where num_id = '$num_id' and s_type = 'R' and div_id = '$div_id' and p_id ='$product_id' and status = 0  ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['id'];
}
function find_amount_p($num_id , $div_id ,$product_id){
		$sql = "Select amount from stock_card  where num_id = '$num_id' and s_type = 'R'  and div_id = '$div_id' and p_id = '$product_id'  and status = 0 ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['amount'];
}
	function update_stock_p( $s_date , $amount , $product_id ,$num_id , $id   , $div_id){ 
		$sql = "Select *  from stock_card  where p_id ='$product_id' and 
		((s_date = '$s_date' and id >  $id) or s_date > '$s_date' )  and div_id ='$div_id'
		 and status = 0   ";
		$result = mysql_query($sql); 

		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - ($amount );
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]'  and status = 0 ";
				$result_up = mysql_query($sql_up); 
		}
}

function find_receive_id($pd_id){
	$sql1 ="select *  from receive_detail  where pd_id = '$pd_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['rd_id'];

}
function find_receive_id1($pd_id){
	$sql1 ="select *  from receive_detail  where pd_id = '$pd_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['r_id'];

}
function num_row($p_id){
	$sql1 = "Select pd.* from pay_detail pd where p_id ='$p_id'  ";
	$result = mysql_query($sql1);
	return mysql_num_rows($result);

}

function receive($r_id){
			$sql1 ="Select  *  from receive  where r_id ='$r_id' ";
			$result = mysql_query($sql1);
			$rs = mysql_fetch_array($result);
			return "ใบส่งของที่ ".$rs['num_id']."*ทะเบียนเอกสาร ".$rs['paper_id']."*จากร้าน ".$rs['shop_name']."*วันที่รับ ".$rs['date_receive'];
}
function receive_detail($rd_id){
			$sql1 ="Select rd.*,p.pro_name,rd.unit from receive_detail rd
		left outer join product p on  p.p_id = rd.p_id
		where rd.rd_id ='$rd_id' ";
			$result = mysql_query($sql1);
			$rs = mysql_fetch_array($result);
			return $rs['pro_name']."*จำนวน ".$rs['amount']."*หน่วย ".$rs['unit']."*ราคาต่อหน่วย ".$rs['cost'];
}

function pay($p_id){
			$sql1 ="Select  *  from pay  where p_id ='$p_id' ";
			$result = mysql_query($sql1);
			$rs = mysql_fetch_array($result);
			return "เลขที่เบิก ".$rs['pay_id']."*ทะเบียนเอกสาร ".$rs['paper_id']."*วันที่เบิก ".$rs['pay_date']."*หน่วยงานที่เบิก ".$rs['dep_name']."*ผู้เบิก ".$rs['open_name']."*ประเภทการเบิก ".$rs['pay_type'];
}
function pay_detail($pd_id){
			$sql1 ="Select pd.*,p.pro_name,pd.unit from pay_detail pd
			left outer join product p on  p.p_id = pd.product_id
			where pd.pd_id ='$pd_id'  ";
			$result = mysql_query($sql1);
			$rs = mysql_fetch_array($result);
			return $rs['pro_name']."*จำนวนที่เบิก ".$rs['amount']."*หน่วย ".$rs['unit'];
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

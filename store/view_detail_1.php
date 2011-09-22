<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
	<?
session_start();
if($del == 'del'){

	// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
	$id = check_id($rd_id,$_SESSION[div_id],$p_id);
	$amount = find_amount($rd_id,$_SESSION[div_id],$p_id);
	update_stock($date_receive,$amount,$p_id , $rd_id , $id ,$_SESSION[div_id]);
	//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card			
	$sql = "UPDATE stock_card SET status = 1  WHERE num_id=$rd_id and s_type = 'R' and div_id ='".$_SESSION[div_id]."' ";
	$result = mysql_query($sql);
	
	$detail1  = receive($r_id);
	$detail2  = receive_detail($rd_id);
	$sql_in = "INSERT delete_detail (detail1 , detail2 , date_time , type ) values ( '$detail1','$detail2' , NOW() , 'R' )  ";
	$result = mysql_query($sql_in);
	
	$sql_del = "DELETE FROM receive_detail WHERE rd_id=$rd_id";
	$result_del = mysql_query($sql_del);
	
	if($pay_id <>'0'  ){			
	
			// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
			$id2 = check_id_2($pd_id,'0',$p_id);
			$amount = find_amount_2($pd_id,'0',$p_id);
			update_stock_2($date_receive,$amount,$p_id , $pd_id  , $id2 ,'0');
			//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card			

			$sql = "UPDATE stock_card SET status = 1  WHERE num_id = '$pd_id' and s_type = 'P' 
			and div_id = '0' and p_id = '$p_id'   "; 
			$result = mysql_query($sql);
	
				$detail1  = pay($pay_id);
				$detail2  = pay_detail($pd_id);
				$sql_in = "INSERT delete_detail (detail1 , detail2 , date_time , type ) values ( '$detail1','$detail2' ,NOW() , 'P' )  ";
				$result = mysql_query($sql_in);
			
			$sql_del = "DELETE FROM pay_detail WHERE pd_id=$pd_id ";
			$result_del = mysql_query($sql_del);
	
	}
	
	echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=view_detail_1&r_id=$r_id\">\n";
}

if($delete_1  <>'' ){

						$sql_f = "Select *  from receive_detail rd , receive  r 
						where r.r_id = rd.r_id  and  rd.r_id ='".$r_id."' group by rd.rd_id  ";
						
						$result_f  = mysql_query($sql_f );
						while($rs_f =mysql_fetch_array($result_f )){
																
												// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
												$id = check_id($rs_f[rd_id],$_SESSION[div_id],$rs_f[p_id]);
												$amount = find_amount($rs_f[rd_id],$_SESSION[div_id],$rs_f[p_id]);
												update_stock($rs_f[date_receive],$amount,$rs_f[p_id] , $rs_f[rd_id] , $id ,$_SESSION[div_id]);
												//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card			
												$sql = "UPDATE stock_card SET status = 1  WHERE num_id='".$rs_f[rd_id]."' and s_type = 'R' and div_id ='$_SESSION[div_id]' ";
												$result = mysql_query($sql);
												
												$detail1  = receive($r_id);
												$detail2  = receive_detail($rs_f[rd_id]);
												$sql_in = "INSERT delete_detail (detail1 , detail2 , date_time , type ) values ( '$detail1','$detail2' , NOW() , 'R' )  ";											
												$result = mysql_query($sql_in);
												if($rs_f[pay_id] <>'0'  ){
														
														$detail1  = pay($rs_f[pay_id]);
														$detail2  = pay_detail($rs_f[pd_id]);
														$sql_in = "INSERT delete_detail (detail1 , detail2 , date_time , type ) values ( '$detail1','$detail2' ,NOW() , 'P' )  ";
														$result = mysql_query($sql_in);
												
														// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
														$id2 = check_id_2($rs_f[pd_id],'0',$rs_f[p_id]);
														$amount = find_amount_2($rs_f[pd_id],'0',$rs_f[p_id]);
														update_stock_2($date_receive,$amount,$rs_f[p_id] , $rs_f[pd_id]  , $id2 ,'0');
														//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card			
											
														$sql = "UPDATE stock_card SET status = 1  WHERE num_id = '".$rs_f[pd_id]."' and s_type = 'P' 
														and div_id = '0' and p_id = '$rs_f[p_id]'   "; 
														$result = mysql_query($sql);
												
															
														$sql_del = "DELETE FROM pay_detail WHERE pd_id='".$rs_f[pd_id]."'";
														$result_del = mysql_query($sql_del);							
														
														
												}
												$sql_del = "DELETE FROM receive_detail WHERE rd_id='".$rs_f[rd_id]."' ";
												$result_del = mysql_query($sql_del);
	
							}
							$sql_del_1 = "DELETE FROM receive WHERE r_id ='".$r_id."'  ";
							$result_del_1 = mysql_query($sql_del_1);
	
							$sql_del_2 = "DELETE FROM pay WHERE p_id ='".$pay_id."'  ";
							$result_del_2 = mysql_query($sql_del_2);
					echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
					print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=seach_edit_1\">\n";
					
	
}
	?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.style1 {
	font-family: "MS Sans Serif";
	font-weight: bold;
}
</style>
<div align="center">

	<?
	$r_id = $_REQUEST["r_id"] ;

$sql = "SELECT * FROM receive WHERE r_id= $r_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
	$r_id = $rs[r_id];
	?>
<form name="save"  method="post" enctype="multipart/form-data">
<input type="hidden" name="o_id" value="<?=$o_id?>">

<input type="hidden" name="date_receive" value="<?=$rs["date_receive"]?>">  
<input type="hidden" name="pay_id" value="<?=$rs["pay_id"]?>">  
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td colspan="2" align="center"  style="border: #7292B8 1px solid;" >
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		แก้ไข / ลบ รับพัสดุ</td>
	</tr>
</table></td>
</tr>
</table>
<br />

<table width="98%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;" >

	
	<div><b><font color="#FF0066" >ใบส่งของที่</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["num_id"]?></div>
	<div><b><font color="#FF0066" >ทะเบียนเอกสาร</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["paper_id"]?></div>
	<div><b><font color="#FF0066" >จากร้าน</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<? 
	echo $rs["shop_name"]?></div>
	<div><b><font color="#FF0066" >วันที่รับ</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<?=date_2($rs["date_receive"])?></div>
	<div><b><font color="#FF0066" >หมายเหตุ </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<? echo $rs["remark"] ;?></div>

<? if($_SESSION[div_id] !='1'){?>
<div align="center"><input   type="button" name="add" value=" แก้ไข " onClick="javascript:popup('sample_1.php?r_id=<?=$rs["r_id"]?>','',600,300)" class="buttom"> &nbsp;&nbsp;<input   type="submit" name="delete_1" value="ยกเลิกใบตรวจรับ"  onclick="return godel_1();" class="buttom"> 

&nbsp;&nbsp;&nbsp;

</div>
<? }?>

	</td>
	</tr>
</table>
<br />
<table width="98%" align="center" cellspacing="1" border="0" style="border-collapse:collapse;">
<? if($_SESSION[div_id] !='1'){?>
<tr bgcolor="#C9D4E1"   ><td colspan="6" height="30" style="border: #000000 1px solid;"  align="left">&nbsp;&nbsp;[ 
 <a href="#" onClick="javascript:popup('sample_9.php?r_id=<?=$rs["r_id"]?>&date_receive=<?=$rs["date_receive"]?>&pay_id=<?=$rs["pay_id"]?>','',550,280)"  class="bar_add">เพิ่มรายการ</a> ]
</td></tr>
<? }?>
<tr class="bmText"  bgcolor="#DEE4EB">
                                                  <td width="42%"  height="28" style="border: #000000 1px solid;" ><div align="center">
                                                     <b>ชื่อพัสดุ</b>
        </div></td>
			  <td width="14%"  align="center" style="border: #000000 1px solid;" ><b>ราคา</b>  </td>
                                                  <td width="9%" style="border: #000000 1px solid;" align="center" >
                                                      <b>จำนวน</b>        </td>
                                                  
              <td width="12%"  align="center" style="border: #000000 1px solid;" ><b>หน่วยนับ</b></td>
	 <td width="16%"  align="center" style="border: #000000 1px solid;" ><b>รวมเงิน</b></td>
				 <? if($_SESSION[div_id] !='1'){?>
<td width="7%" align="center" style="border: #000000 1px solid;" ><b>&nbsp;ลบ</b></td> 
<? }?>
      </tr>
<?

$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
$sql = " Select rd.*,p.pro_name,rd.unit from receive_detail rd
left outer join product p on  p.p_id = rd.p_id
where rd.r_id ='$r_id'  ";

$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){

if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
$total = $total + ($rs1[cost] * $rs1[amount] );
?>
<tr  class="bmText"  >
	<td height="25" align="left" style="border: #000000 1px solid;">&nbsp;&nbsp;
	  <?=$rs1[pro_name]?>
    </td>		
	<td style="border: #000000 1px solid;" align="center">&nbsp;
	   <?  echo number_format($rs1[cost],2);	  ?>
    </td>
	<td style="border: #000000 1px solid;" align="center">&nbsp;
	  <? echo $rs1[amount];   ?>
    </td>
	<td  style="border: #000000 1px solid;" align="center">
	  <?=$rs1[unit]?>&nbsp;
    </td>
	<td style="border: #000000 1px solid;"  align="right"><?=number_format($rs1[cost] * $rs1[amount],2)?>&nbsp;
   </td>

	<? if($_SESSION[div_id] !='1'){?>
		<td  style="border: #000000 1px solid;" align="center">
		<a href="?action=view_detail_1&del=del&r_id=<?=$r_id?>&rd_id=<?=$rs1["rd_id"]?>&date_receive=<?=$rs["date_receive"]?>&p_id=<?=$rs1[p_id]?>&pd_id=<?=$rs1["pd_id"]?>&pay_id=<?=$rs["pay_id"]?>"  onclick="return godel()"><img src="images/Delete.png" border="0" /></a>
</td>
<? }?>
</tr>
<? 

	$i++;
}?>
<tr class="bmText"  bgcolor="#DEE4EB">
 <td align="right"colspan="4" height="25" style="border: #000000 1px solid;"><b>รวมทั้งสิ้น&nbsp;</b></td>
<td style="border: #000000 1px solid;"><p align="right"><b><? echo number_format($total,2);  ?>&nbsp;</b></td>
<? if($_SESSION[div_id] !='1'){?>
<td style="border: #000000 1px solid;"><p align="right"><font size="2">&nbsp;</font></td>
<? }?>
                                                </tr>
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
	if (confirm("คุณต้องการยกเลิกใบตรวจรับนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<?
function check_stock_1($s_date,$p_id){
		$sql = "Select s_date ,max(id),amount from stock_card  where p_id = '$p_id' and s_date <= '$s_date'  and status = 0 
		group by amount order by s_date desc ,id desc  limit 1";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['amount'].",".$arr['id'];
}
function check_id($num_id , $div_id ,$p_id  ){
		$sql = "Select id from stock_card  where num_id = '$num_id' and s_type = 'R' and div_id = '$div_id' and p_id = '$p_id' and status = 0  ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['id'];
}
function find_amount($num_id , $div_id ,$p_id){
		$sql = "Select amount from stock_card  where num_id = '$num_id' and s_type = 'R' and div_id = '$div_id' and p_id = '$p_id' and status = 0  ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['amount'];
}
	function update_stock( $s_date , $amount , $p_id ,$num_id , $id , $div_id  ){ 
		$sql = "Select *  from stock_card  where p_id ='$p_id' and 
		((s_date = '$s_date' and id >  $id) or s_date > '$s_date' ) and div_id ='$div_id'
		 and status = 0   ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - ($amount );
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]'  and div_id ='$div_id' and status = 0 ";
				$result_up = mysql_query($sql_up); 
		}
}

function check_id_2($num_id , $div_id ,$p_id ){
		$sql = "Select id from stock_card  where num_id = '$num_id' and s_type = 'P' and div_id = '$div_id' and p_id ='$p_id'  and status = 0  ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['id'];
}
	function update_stock_2( $s_date , $amount , $p_id ,$num_id ,$id  , $div_id  ){ 
		$sql = "Select *  from stock_card  where p_id ='$p_id' and 
		((s_date = '$s_date' and id >  $id) or s_date > '$s_date' ) and div_id ='$div_id'
		 and status = 0  ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){	
				$amount_1 = $recn[remain] - $amount;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' and status = 0  ";
				$result_up = mysql_query($sql_up); 
		}
}

function find_amount_2($num_id  , $div_id ,$p_id){
		$sql = "Select amount from stock_card  where num_id = '$num_id' and s_type = 'P' and div_id = '$div_id' and p_id = '$p_id' and status = 0  ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['amount'];
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
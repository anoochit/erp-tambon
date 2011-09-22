<?
session_start();
include('config.inc.php');
if($OK <> '' ){
				$date_receive = $date_receive;
				$rd_id1 = find_max_rd_id($r_id);		
				if($sel == 0) {
						$unit = $unit1;
						$a_unit = $a_unit1;
				}
				if($sel == 1){
						$unit = $unit2;
						$a_unit = $a_unit2;
				}
					$pd_id1 = find_max_pd_id($pay_id);	
				// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
				$a_amount = $amount * $a_unit;
				update_stock($date_receive,$a_amount,$p_id , $_SESSION[div_id]);
				//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card
				$k = explode(",",check_stock_1($date_receive,$p_id , $_SESSION[div_id] ));
				$amount_1 =  $k[0] + $a_amount;
				$sql_add2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain,div_id  ) 
				VALUES('".$date_receive."',NOW() , '$rd_id1' , 'R' ,'$p_id','$a_amount','$amount_1','$_SESSION[div_id]' )";
				$result_add2 = mysql_query($sql_add2); 
				$sql_add = "INSERT INTO receive_detail (r_id , rd_id  , p_id  , amount , cost , a_cost , unit   , pd_id) 
				VALUES('$r_id', '$rd_id1' ,'$p_id','$amount','$cost','$c_cost','$unit' , '$pd_id1' )";
				$result_add = mysql_query($sql_add); 
				if($pay_id <>'0' ){
							update_stock_2($date_receive,$a_amount,$p_id , '0');
							//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card
							$k = explode(",",check_stock_2($date_receive,$p_id ,'0'));
							$amount_1 =  $k[0] - $amount;
							$sql_add2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain , div_id  ) 
							VALUES('".$date_receive."',NOW() , '$pd_id1' , 'P' ,'$p_id','-$a_amount','$amount_1' ,'0' )";
							$result_add2 = mysql_query($sql_add2); 
							$sql_add = "INSERT INTO pay_detail (p_id , pd_id  , product_id  , amount  , unit ) 
							VALUES('$pay_id', '$pd_id1' ,'$p_id','$amount' ,'$unit'  )";
			    			$result_add = mysql_query($sql_add); 
				}
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 
		<?
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style2.css">
<link href="style.css" rel="stylesheet" type="text/css">
<body>
<form action="" method="post" name="f22"  onSubmit="return check(this);" >
<br>
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
	<table width="100%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
		<tr bgcolor="#99CCFF" class="lgBar">				
    <td height="35"  colspan="6"  style="border: #000000 1px solid;">&nbsp;&nbsp;ข้อมูลผู้ขอใช้บริการ&nbsp;&nbsp;&nbsp;</div></td>
    </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="10%"  height="31" align="center" style="border: #000000 1px solid;"><strong>เลขขอที่ใช้</strong></td>	
		<td width="9%"  height="31" align="center"style="border: #000000 1px solid;"><strong>คำนำหน้าชื่อ</strong></td>
		<td width="18%"  height="31" align="center" style="border: #000000 1px solid;"><strong>ชื่อ - สกุล</strong></td>
         <td width="11%"  align="center" style="border: #000000 1px solid;"><strong>วันที่ขอใช้</strong></td>
		 <td width="8%"  align="center" style="border: #000000 1px solid;"><strong>จำนวนเงิน</strong></td>
		<td width="11%"  align="center" style="border: #000000 1px solid;"><strong>สถานะ</strong></td>
    </tr>
		   <?
		$sql_1 =" Select  q.TMCODE,MCODE,q.mem_id,pren,name,surn,q.RDATE,HNO,HNO1,MOO,ROAD,
		SOI,q.HOCODE,TEL,LINE1,REGIEN,qty,amt,type1,status,honame,tmname
		from m_bin q,member m,house h,type_mem t 
		where q.mem_id = m.mem_id and q.hocode = h.hocode and t.tmcode = q.tmcode    ";
		 $sql_1 .="  	and q.mem_id = '" .$mem_id."'  ";
	 	$sql_1 .="  order by MCODE   ";
		$result_1 = mysql_query($sql_1);
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center" style="border: #000000 1px solid;">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left" style="border: #000000 1px solid;">&nbsp;<? echo $rs_1[pren]; ?></td>
<td  height="25"   align="left" style="border: #000000 1px solid;">&nbsp;<? echo $rs_1[name] ."  ".$rs_1[surn]; ?></td>
 <td  align="center" style="border: #000000 1px solid;">&nbsp;<?=date_2($rs_1[RDATE])  ?></td>
 <td style="border: #000000 1px solid;"> <div align="center">&nbsp;<? echo $rs_1[qty];  ?> </div></td>
 <td style="border: #000000 1px solid;"> <div align="center">&nbsp; <? if($rs_1[status] == 'ยกเลิก') echo "<font color=red>".$rs_1[status]."</font>";
 else  echo $rs_1[status] ?>   </div></td>
</tr>
 <? 
	}
?>
  </table></td>
			</tr>
		</table>
	</td>
</tr>
</table>
<br>
</form> 
</body>
</html>
<script language="javascript">
function godel()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<script language="javascript">
function doNext(el)
{
	if (el.value.length < el.getAttribute('maxlength')) 
	return;
	var f = el.form;
	var els = f.elements;
	var x, nextEl;
	for (var i=0, len=els.length; i<len; i++){
		x = els[i];
		if (el == x && (nextEl = els[i+1]))
		{
			nextEl.value="";
			if (nextEl.focus) 
			nextEl.value="";
			nextEl.focus();
		}
	}
}
</script>
  <script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function check(theForm) 
	{
		if (  document.f22.product.value=='' || document.f22.product.value==' ' )
           {
           alert("กรุณากรอกรายละเอียดพัสดุที่ขอซื้อ");
           document.f22.product.focus();           
           return false;
           }
		      if (  document.f22.p_id.value=='' || document.f22.p_id.value==' ' )
           {
           alert("กรุณากรอกรายละเอียดพัสดุที่ขอซื้อให้ถูกต้อง");
           document.f22.product.focus();      
           return false;
           }
		   if (  document.f22.cost.value=='' || document.f22.cost.value==' ' )
           {
          	 alert("กรุณากรอกราคาต่อหน่วย");
          	 document.f22.cost.focus();           
          	 return false;
           }
		   if (  document.f22.amount.value=='' || document.f22.amount.value==' ' )
           {
          	 alert("กรุณากรอกจำนวน");
          	 document.f22.amount.focus();           
          	 return false;
           }
		   if (  document.f22.sel[0].checked == false  && document.f22.sel[1].checked == false)
           {
          	 alert("กรุณาเลือกหน่วยนับ");
          	 return false;
           }
		   if (confirm("คุณต้องการเพิ่มข้อมูล ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}
}
</script>
<?
function insert_code($rd_id,$code){
		$sql_add = "INSERT INTO code (rd_id,code) 
		VALUES('$rd_id','$code')";
		$result_add = mysql_query($sql_add); 
}
function find_max_rd_id($r_id) {
		$sql = "Select max(rd_id) as max  from receive_detail  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1; //gene ค่า sale_id 
		}
		return $rd_id;
	}
	function update_stock( $s_date , $amount , $p_id , $div_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0 and div_id = '$div_id' ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] + $amount ;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' and status = 0";
				$result_up = mysql_query($sql_up); 
		}
}
function check_stock_1($s_date,$p_id,$div_id){
		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		 and div_id ='$div_id'
		group by id
		order by s_date desc ,id desc   limit 1 ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];
}
function check_stock_2($s_date,$p_id ,$div_id){
		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		and div_id = '$div_id'
		group by id
		order by s_date desc ,id desc   limit 1  ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];
}
function update_stock_2(  $s_date , $amount , $p_id , $div_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0 and div_id = '$div_id' ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - $amount ;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' and status = 0 ";
				$result_up = mysql_query($sql_up); 
		}
}
function find_max_pd_id($p_id) {
		$sql = "Select max(pd_id) as max  from pay_detail  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$pd_id = "1";
		} else{
			$pd_id =  $max + 1; //gene ค่า sale_id 
		}
		return $pd_id;
	}
?>
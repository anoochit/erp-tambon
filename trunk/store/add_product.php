
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
function godel()
{
	if (confirm("คุณต้องการยกเลิกรายการนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<script language="JavaScript" type="text/javascript">
	function validate(theForm) 
	{
	if (  document.product.t_id.value=='' || document.product.t_id.value==' ' )
           {
           alert("กรุณากรอกประเภทพัสดุ");
           document.product.t_id.focus();           
           return false;
           }
		   if (  document.product.pro_name.value=='' || document.product.pro_name.value==' ' )
           {
           alert("กรุณากรอกชื่อพัสดุ");
           document.product.pro_name.focus();           
           return false;
           }
		
		   if (  document.product.unit1.value=='' || document.product.unit1.value==' ' )
           {
           		alert("กรุณากรอกหน่วยนับย่อย");
           		document.product.unit1.focus();           
           		return false;
           }
		    if (  document.product.a_unit1.value=='' || document.product.a_unit1.value==' ' )
           {
           		alert("กรุณากรอกจำนวนหน่วยนับย่อย");
           		document.product.a_unit1.focus();           
           		return false;
           }
	
			return true;
	}

</script>
<?

if($save_add <>'' and  find_p_id($t_id,$pro_name) <=0){
	$query=" INSERT INTO product (t_id , pro_name,c_cost,amount,unit1 , a_unit1,unit2 , a_unit2 ,limite )
		 VALUES ('$t_id' ,'$pro_name','$c_cost','$amount','$unit1' ,'$a_unit1' ,'$unit2' ,'$a_unit2' ,'$limite')";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
       print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=product\">\n";
}elseif($save_add <>'' and  find_p_id($t_id,$pro_name) > 0){
		echo "<br><br><center><font color=darkgreen>รายการที่กรอกซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
}

if($del =='del'){
	 	$sql="UPDATE  product  SET  status='1'  WHERE  p_id=$p_id";
  		 $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขสถานะของข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_product\">\n";

}
	
	$sql1 ="select  max(p_id) as max from product ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	if($rs["max"] =='' or $rs["max"] == NULL) {
		$p_id ="1";
	}else{
	 	$p_id = $rs["max"] +1;
	}
?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<br />
<form name="product"  method="post">
  <br />
<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" >
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>เพิ่มพัสดุใหม่</td>
  			</tr>
			<tr>
  <td  align="right" width="25%"  class="bmText">
ประเภทพัสดุ</td>
	<td width="75%" align="left">&nbsp;<?
			$query  ="select * from type where status =0  group by p_type  order by t_id ,p_type ";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?><select name="t_id"  >
        <option value=''>----------กรุณาเลือก----------</option>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[t_id];?>"
		<?
		if($t_id == $d[t_id]) echo "selected";
		?>
		><? echo $d[p_type];?></option>
                        <? }?>
              </select>	  </td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td  align="right" width="25%"  class="bmText">
  ชื่อพัสดุ</td>
<td width="75%" align="left">&nbsp;<input name="pro_name" type="text" id="pro_name" value="<?=$pro_name?>" size="40"  maxlength="200" />	  </td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="25%" >หน่วยนับย่อย</td>
	<td align="left">&nbsp;<input name="unit1" type="text" id="unit1" value="<?=$unit1?>" size="20" maxlength="50" />	  
	  &nbsp;
	  <input name="a_unit1" type="hidden" id="a_unit1" value="1" size="10" maxlength="50" />
 </td>
</tr>  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr  class="bmText">
  <td a align="right" width="25%">หน่วยนับใหญ่</td>
	<td align="left">&nbsp;<input name="unit2" type="text" id="unit2" value="โหล" size="20" maxlength="50" /> &nbsp;จำนวน  / หน่วย&nbsp;
	   <input name="a_unit2" type="text" id="a_unit2" value="12" size="10" maxlength="50" />	  </td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td  align="right" width="25%"  class="bmText">
  จำนวนขั้นต่ำ</td>
<td width="75%" align="left">&nbsp;<input name="limite" type="text" id="limite" value="<?=$limite?>" size="10"  maxlength="200" />	  </td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr>
	<td height="35" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()" class="buttom"/>	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_product')" class="buttom">     </td>
</tr>
</table>
</td></tr></table>
</form>
<br />
</body>
</html>
<?
function find_p_id( $t_id ,$pro_name){
	$sql1 ="select * from product  where pro_name= '$pro_name'  and t_id = '$t_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}

?>
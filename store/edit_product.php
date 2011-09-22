
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
			if (  document.edit_product.t_id.value=='' || document.edit_product.t_id.value==' ' )
           {
           alert("กรุณากรอกประเภทพัสดุ");
           document.edit_product.t_id.focus();           
           return false;
           }
		   if (  document.edit_product.pro_name.value=='' || document.edit_product.pro_name.value==' ' )
           {
           alert("กรุณากรอกชื่อพัสดุ");
           document.edit_product.pro_name.focus();           
           return false;
           }
		   if (  document.edit_product.unit1.value=='' || document.edit_product.unit1.value==' ' )
           {
           		alert("กรุณากรอกหน่วยนับย่อย");
           		document.edit_product.unit1.focus();           
           		return false;
           }
		    if (  document.edit_product.a_unit1.value=='' || document.edit_product.a_unit1.value==' ' )
           {
           		alert("กรุณากรอกจำนวนหน่วยนับย่อย");
           		document.edit_product.a_unit1.focus();           
           		return false;
           }
		    if (  document.edit_product.unit2.value=='' || document.edit_product.unit2.value==' ' )
           {
           		alert("กรุณากรอกหน่วยนับใหญ่");
           		document.edit_product.unit2.focus();           
           		return false;
           }
		    if (  document.edit_product.a_unit2.value=='' || document.edit_product.a_unit2.value==' ' )
           {
           		alert("กรุณากรอกจำนวนหน่วยนับใหญ่");
           		document.edit_product.a_unit2.focus();           
           		return false;
           }
			return true;
	}

</script>
<?

if($save_add <>''  ){
	if(find_p_id($pro_name,$p_id ,$t_id) <=0){
		$sql="UPDATE product SET pro_name='$pro_name',c_cost='$c_cost',amount='$amount',unit1='$unit1' ,unit2='$unit2'
		,a_unit1='$a_unit1', a_unit2='$a_unit2' ,t_id = '$t_id' , limite= '$limite'  WHERE p_id=$p_id";
  	 $result=mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=product\">\n";
	}elseif( find_p_id($pro_name,$p_id , $t_id ) > 0){
		echo "<br><br><center><font color=darkgreen>ข้อมูลซ้ำ บันทึกข้อมูลใหม่</font></center><br><br>";
	}
}

//-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM product WHERE p_id=$p_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
   $p_id = $d["p_id"];
   $pro_name = $d["pro_name"];
   $pro_name2 = $d["pro_name"];
   $c_cost = $d["c_cost"];
   $c_cost2 = $d["c_cost"];
   $amount = $d["amount"];
   $amount2 = $d["amount"];
   $unit = $d["unit"];
   $unit2 = $d["unit"];
   $unit1 = $d["unit1"];
    $unit2 = $d["unit2"];
	 $a_unit1 = $d["a_unit1"];
	 $a_unit2 = $d["a_unit2"]; 
 ?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<br />
<form name="edit_product"  method="post">
  <table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>แก้ไขพัสดุ</div></td>
  			</tr>
<tr>
  <td  align="right" width="27%"  class="bmText">
ประเภทพัสดุ</td>
	<td width="73%" align="left">&nbsp;<?
			$query  ="select * from type where status =0  group by p_type  order by t_id ,p_type ";
			$result=mysql_query($query);
			?><select name="t_id"   >
        <option value=''>----------กรุณาเลือก----------</option>
        <?
			while($d1 =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d1[t_id];?>"
		<?
		if($d[t_id] == $d1[t_id]) echo "selected";
		?>
		><? echo $d1[p_type];?></option>
                        <? }?>
              </select><input type="hidden" name="p_id" value="<?=$p_id?>">
	  </td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right"  class="bmText">ชื่อพัสดุ</td>
  <td align="left">&nbsp;<input name="pro_name" type="text" id="pro_name" value="<?=$pro_name?>" size="30" maxlength="100" />
    <input type="hidden" name="pro_name2" value="<?=$pro_name2?>" ></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="27%" >หน่วยนับย่อย</td>
	<td align="left">&nbsp;<input name="unit1" type="text" id="unit1" value="<?=$unit1?>" size="20" maxlength="50" />
	     <input name="a_unit1"  type="hidden"id="a_unit1" value="<?=$a_unit1?>" size="10" />
	  </td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr  class="bmText">
  <td a align="right" width="27%">หน่วยนับใหญ่</td>
	<td align="left">&nbsp;<input name="unit2" type="text" id="unit2" value="<?=$unit2?>" size="20" maxlength="50" /> &nbsp;จำนวน  / หน่วย&nbsp;
	   <input name="a_unit2" type="text" id="a_unit2" value="<?=$a_unit2?>" size="10" maxlength="50" />
	  </td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td  align="right" width="27%"  class="bmText">
  จำนวนขั้นต่ำ</td>
<td width="73%" align="left">&nbsp;<input name="limite" type="text" id="limite" value="<?=$d[limite]?>" size="10"  maxlength="200"/>
	  </td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td height="30" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล" onClick="return validate()"  class="buttom"/>
	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก "  onClick="window.navigate('index.php?action=add_product')" class="buttom">
	</td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>
<?
function find_p_id($pro_name,$p_id , $t_id ){
	$sql1 ="select * from product where pro_name= '$pro_name' and  p_id != '$p_id' and t_id = '$t_id'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
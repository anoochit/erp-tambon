
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
		   if (  document.shop.shop_name.value.length == 0 || document.shop.shop_name.value==' ' )
           {
           alert("กรุณากรอกชื่อร้าน");
           document.shop.shop_name.focus();           
           return false;
           }
		      if (  document.shop.shop_address.value.length == 0 || document.shop.shop_address.value==' ' )
           {
           alert("กรุณากรอกที่อยู่");
           document.shop.shop_address.focus();           
           return false;
           }
			return true;
	}

</script>
<?
require_once('config.inc1.php');
if($save_add <>'' and  find_id($shop_name,$pre_shop_name,$shop_address) <=0){
	$id = find_max_id();
	$query=" INSERT INTO shop (id,shop_name,shop_address,tel ,pre_shop_name )
		 VALUES ('$id','$shop_name','$shop_address','$tel','$pre_shop_name' )";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
       print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=shop\">\n";
}elseif($save_add <>'' and  find_id($shop_name,$pre_shop_name) > 0){
	echo "<br><br><center><font color=darkgreen>ชื่อร้านซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
}

//----------ลบ--------------
if($del =='del'){
		$sql="DELETE FROM shop  WHERE  id=$id";
  		 $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขสถานะข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_shop\">\n";

}

?>
<link href="style2.css" rel="stylesheet" type="text/css" />

<form name="shop"  method="post">

<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" >
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>เพิ่มร้านค้าใหม่</div></td>
  			</tr>
	<tr>
  <td a align="right" width="21%"  class="bmText">คำนำหน้าชื่อร้านค้า</td>
	<td width="79%" align="left">&nbsp;&nbsp;
	  <input name="pre_shop_name" type="text" id="pre_shop_name" value="<?=$pre_shop_name?>" size="40" maxlength="255" /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="21%"  class="bmText">ชื่อร้านค้า</td>
	<td width="79%" align="left">&nbsp;&nbsp;
	  <input name="shop_name" type="text" id="shop_name" value="<?=$shop_name?>" size="40" maxlength="255" /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="21%"  class="bmText">ที่อยู่</td>
	<td width="79%" align="left">&nbsp;&nbsp;
	  <input name="shop_address" type="text" id="shop_address" value="<?=$shop_address?>" size="60" maxlength="255" /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="21%"  class="bmText">เบอร์โทร</td>
	<td width="79%" align="left">&nbsp;&nbsp;
	  <input name="tel" type="text" id="tel" value="<?=$tel?>" size="20" maxlength="50" /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()"/ class="buttom">	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_shop')" class="buttom">

     </td>
</tr>
</table>
</td></tr></table>
</form>
<br />
</body>
</html>
<?
function find_id($shop_name ,$pre_shop_name,$shop_address){
	$sql1 ="select * from shop where shop_name= '$shop_name'  and pre_shop_name = '$pre_shop_name' and shop_address like '%$shop_address%'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_max_id() {
	
		$sql = "Select max(id) as max  from shop  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1; //gene ค่า 
		}
		return $rd_id;
	}
?>
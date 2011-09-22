
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript">
	function validate(theForm) 
	{
		   if (  document.edit_shop.shop_name.value.length == 0 || document.edit_shop.shop_name.value==' ' )
           {
           alert("กรุณากรอกชื่อร้านค้า");
           document.edit_shop.shop_name.focus();           
           return false;
           }
		   if (  document.edit_shop.shop_address.value.length == 0 || document.edit_shop.shop_address.value==' ' )
           {
           alert("กรุณากรอกที่อยู่");
           document.edit_shop.shop_address.focus();           
           return false;
           }
			return true;
	}
</script>
<?

if($save_add <>''  ){
	if(find_id($shop_name,$pre_shop_name,$id,$shop_address) <=0){
		$sql="UPDATE shop SET shop_name='$shop_name',pre_shop_name='$pre_shop_name',shop_address = '$shop_address',tel ='$tel' WHERE id=$id";
  	 	$result=mysql_query($sql);
		
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=add_shop\">\n";
		mysql_close($connect);	
	}elseif(find_id($shop_name,$pre_shop_name,$id) > 0){
	echo "<br><br><center><font color=darkgreen>ชื่อร้านซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}

   $sql="SELECT * FROM shop WHERE id=$id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
 ?><br />
<form name="edit_shop"  method="post">
  <table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>แก้ไขข้อมูลร้านค้า</div></td>
  			</tr>
	<tr>
  <td a align="right" width="19%"  class="bmText">คำนำหน้าชื่อร้านค้า</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="pre_shop_name" type="text" id="pre_shop_name" value="<?=$d[pre_shop_name]?>" size="40" maxlength="255" /></td>
</tr>
<tr>
  <td a align="right" width="19%"  class="bmText">ชื่อร้านค้า</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="shop_name" type="text" id="shop_name" value="<?=$d[shop_name]?>" size="40" maxlength="255" /></td>
</tr>
<tr>
  <td a align="right" width="19%"  class="bmText">ที่อยู่</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="shop_address" type="text" id="shop_address" value="<?=$d[shop_address]?>" size="60" maxlength="255" /></td>
</tr>
<tr>
  <td a align="right" width="19%"  class="bmText">เบอร์โทร</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="tel" type="text" id="tel" value="<?=$d[tel]?>" size="20" maxlength="50" /></td>
</tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()"/>	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_shop')">

     </td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>
<?
function find_id($shop_name,$pre_shop_name,$id,$shop_address){
	$sql1 ="select * from shop where shop_name= '$shop_name'  and pre_shop_name ='$pre_shop_name'  and shop_address like '%$shop_address%'and  id != '$id' ";
	//echo $sql1 ."<br>";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
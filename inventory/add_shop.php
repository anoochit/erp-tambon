
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
	//------------------------------function  นี้มาจาก form-------------------------
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

//-----------บันทึก-------------------
if($save_add <>'' and  find_id($shop_name,$pre_shop_name,$shop_address) <=0){
	$id = find_max_id();
	$query=" INSERT INTO shop (id,shop_name,shop_address,tel ,pre_shop_name )
		 VALUES ('$id','$shop_name','$shop_address','$tel','$pre_shop_name' )";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
       print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_shop\">\n";
		mysql_close($connect);	
}elseif($save_add <>'' and  find_id($shop_name,$pre_shop_name) > 0){//end save
	echo "<br><br><center><font color=darkgreen>ชื่อร้านซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
}

//----------ลบ--------------
if($del =='del'){
		$sql="DELETE FROM shop  WHERE  id=$id";
  		 $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขสถานะข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_shop\">\n";
		mysql_close();	

}

?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<br />
<form name="shop"  method="post">
  <table width="75%" border="0" cellspacing="0" cellpadding="0" align="center">
  
      <tr>
        <td align="center"><input type="text" name="word" value="<?=$word?>" />&nbsp;<input type="submit" name="search" value=" ค้นหา "  class="buttom"/></td>
      </tr>
  </table><br />
<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>เพิ่มร้านค้าใหม่</div></td>
  			</tr>
	<tr>
  <td a align="right" width="19%"  class="bmText">คำนำหน้าชื่อร้านค้า</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="pre_shop_name" type="text" id="pre_shop_name" value="<?=$pre_shop_name?>" size="40" maxlength="255" /></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="19%"  class="bmText">ชื่อร้านค้า</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="shop_name" type="text" id="shop_name" value="<?=$shop_name?>" size="40" maxlength="255" /></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="19%"  class="bmText">ที่อยู่</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="shop_address" type="text" id="shop_address" value="<?=$shop_address?>" size="60" maxlength="255" /></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="19%"  class="bmText">เบอร์โทร</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="tel" type="text" id="tel" value="<?=$tel?>" size="20" maxlength="50" /></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()" class="buttom"/>	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_shop')" class="buttom">

     </td>
</tr>
</table>
</td></tr></table>
</form>
<?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM shop  ";
	if($search <>'' and $word <>''){
		$sql .=" where (shop_name like '%$word%' or shop_address like '%$word%' )";
	}
	 $sql .=" order by shop_name ";
	$Per_Page =10;
	if(!$Page){$Page=1;} 
	$Prev_Page = $Page-1;
	$Next_Page = $Page+1;

	$result = mysql_query($sql);
	$Page_start = ($Per_Page*$Page)-$Per_Page;
	$Num_Rows = mysql_num_rows($result);

	if($Num_Rows<=$Per_Page)
	$Num_Pages =1;
	else if(($Num_Rows % $Per_Page)==0)
	$Num_Pages =($Num_Rows/$Per_Page) ;
	else 
	$Num_Pages =($Num_Rows/$Per_Page) +1;

	$Num_Pages = (int)$Num_Pages;

	if(($Page>$Num_Pages) || ($Page<0))

	print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
	$sql .= " LIMIT $Page_start , $Per_Page";
	$result1 = mysql_query($sql);
		?>
<table  width="96%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
     <tr bgcolor="#99CCFF" class="lgBar">				
	 <td width="14%" height="30" style="border: #000000 1px solid;"><div align="center">คำนำหน้าชื่อร้าน</div></td>
	  <td width="26%" height="30" style="border: #000000 1px solid;"><div align="center">ชื่อร้าน</div></td>
	  <td width="50%" height="30" style="border: #000000 1px solid;"> <div align="center">ที่อยู่ / เบอร์โทร</div></td>
      <td width="10%" style="border: #000000 1px solid;"><div align="center">&nbsp;</div></td>
     
	 </tr>
	 <?
	 $r=0;
		while ($d =mysql_fetch_array($result1)){
	$r++;
	?>
		<tr class="bmText">
	     <?=$d[id]?></td> -->
		  <td  align="left" height="30" style="border: #000000 1px solid;">&nbsp;&nbsp;<?=$d[pre_shop_name]?>	     &nbsp;&nbsp;</td>
	   <td  align="left" height="30" style="border: #000000 1px solid;">&nbsp;&nbsp;<?=$d[shop_name]?>	     &nbsp;&nbsp;</td>
		   <td  align="left" height="30" style="border: #000000 1px solid;">&nbsp;&nbsp;
	     <?=$d[shop_address]."<br>&nbsp;&nbsp;".$d[tel]?></td>
	   <td   align="center" style="border: #000000 1px solid;">
	 
         <a href="?action=edit_shop&id=<? echo $d[id] ?>">แก้ไข</a>
        &nbsp;</td>
   	   </tr>
	   <? }?>
	 </table>
</td></tr></table>
<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp; รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=add_shop&Page=$Prev_Page&search=$search&word=$word'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=add_shop&Page=$i&search=$search&word=$word'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=add_shop&Page=$Next_Page&search=$search&word=$word'> หน้าถัดไป>> </a>";

?>
</FONT></center></div>
<? 
		mysql_close();	
?>
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
			$rd_id =  $max + 1; //gene ค่า sale_id 
		}
		return $rd_id;
	}
?>
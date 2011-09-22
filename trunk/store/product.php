
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
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

//dochange จะถูกเรียกเมื่อมีการเลือก รายการ Combobox ซึ่งจะทำให้ไปเรียก AJAX เพื่อร้องขอข้อมูลถัดไปจาก Server
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>

<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
	if (  document.product.t_id.value=='' || document.product.t_id.value==' ' )
           {
           alert("กรุณากรอกประเภทพัสดุ");
           document.product.t_id.focus();           
           return false;
           }
		   if (  document.product.c_cost.value=='' || document.product.c_cost.value==' ' )
           {
           alert("กรุณากรอกราคาซื้อ");
           document.product.c_cost.focus();           
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

//-----------บันทึก-------------------
if($save_add <>'' and  find_p_id($t_id,$pro_name) <=0){
	$query=" INSERT INTO product (t_id , pro_name,c_cost,amount,unit1 , a_unit1,unit2 , a_unit2 ,limite )
		 VALUES ('$t_id' ,'$pro_name','$c_cost','$amount','$unit1' ,'$a_unit1' ,'$unit2' ,'$a_unit2' ,'$limite')";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=product\">\n";
		mysql_close($connect);	
}elseif($save_add <>'' and  find_p_id($t_id,$pro_name) > 0){
		echo "<br><br><center><font color=darkgreen>รายการที่กรอกซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";

}

//----------ลบ--------------
if($del =='del'){
	 	$sql="UPDATE  product  SET  status='1'  WHERE  p_id=$p_id";
  		 echo $query."<br>"; 
		 $result = mysql_query($sql);
		
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขสถานะของข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=product\">\n";
}
?>
<link href="style2.css" rel="stylesheet" type="text/css" />

<form name="product"  method="post">
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div ><img src="images/Search.png" align="absmiddle">&nbsp;&nbsp; ค้นหาพัสดุ</div>	</td>
	</tr>
</table>	</td>
	</tr> 

  <tr class="bmText" height="25">
                    <td width="20%"><strong>&nbsp;&nbsp;ประเภทพัสดุ</strong></td>
			
                    <td width="80%"><div><?
			$query  ="select * from type where status =0  group by p_type  order by t_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?><select name="type_id"  onchange="dochange('product1', this.value);">
        <option value=''>----------กรุณาเลือก----------</option>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[t_id];?>"
		<?
		if($type_id == $d[t_id]) echo "selected";
		?>
		><? echo $d[p_type];?></option>
                        <? }?>
            </select></div>				</td>
    </tr>
	 <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ชื่อพัสดุ</strong></td>
    <td><div id="product1"    ><?	if($type_id <>''){
		$query  ="select *  from product
        where  t_id ='$type_id'  and status = 0
        order by pro_name ";
		 $result = mysql_query($query);
          echo "<select name='p_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[p_id]' ";
		if($p_id ==   $fetcharr['p_id'] ) echo "selected";
			    echo " >$fetcharr[pro_name]</option> \n" ;
          }
		 echo "</select>\n";  

}else{
	 $query  ="select *  from product where 1 = 1 and status = 0
        order by pro_name ";
		 $result = mysql_query($query);
          echo "<select name='p_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[p_id]' ";
		if($p_id ==   $fetcharr['p_id'] ) echo "selected";
			    echo " >$fetcharr[pro_name]</option> \n" ;
          }
		 echo "</select>\n";  

 }?>

	</div>	</td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ชื่อพัสดุ</strong></td>
    <td><div><input  type="text" name="pro_name" size="20" value="<?=$pro_name?>"></div></td></tr>
  <tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>
</td></tr></table><br />
</form>
<?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM product  where 1 = 1";
	if($p_id <> '' ){
		$sql .= " AND p_id ='$p_id'  ";
	}
	if($type_id <> '' ){
		$sql .= " AND t_id = '$type_id'  ";
	}
	if($pro_name <> '' ){
	$sql .= " AND pro_name like '%$pro_name%'  ";
}
	$sql .=" order by t_id,pro_name  ";
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
	 <table width="98%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
	 <tr bgcolor="#99CCFF" class="lgBar">				
    <td height="30"  colspan="9"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp;&nbsp;[ <a href="?action=add_product" class="catLink">	เพิ่มพัสดุ </a> ]</div></td> 
	 </tr>
     <tr bgcolor="#99CCFF" class="lgBar">				
    <td width="15%" style="border: #000000 1px solid;"  align="center">ประเภทพัสดุ</td> 
	  <td width="24%" height="30"   align="center"style="border: #000000 1px solid;" >ชื่อพัสดุ</td>
	   <td width="11%"  align="center" style="border: #000000 1px solid;" >จำนวนขั้นต่ำ / หน่วยใหญ่</td>
	   <td width="9%"  align="center" style="border: #000000 1px solid;" >หน่วยใหญ่</td>
	  <td width="13%" align="center"  style="border: #000000 1px solid;" >จำนวน/หน่วยย่อย</td>
	  <td width="9%"  align="center" style="border: #000000 1px solid;" >จำนวนย่อย</td>
	 <td width="7%"  align="center" style="border: #000000 1px solid;" >สถานะ</td>
	 <td width="6%"   align="center"style="border: #000000 1px solid;"  >&nbsp;แก้ไข</td>
 <td width="6%"   align="center"style="border: #000000 1px solid;" >&nbsp;ลบ</td>
	 </tr>
	 <?
	 $r=0;
		while ($d =mysql_fetch_array($result1)){
	$r++;
	?>
		<tr class="bmText">
  <td  style="border: #000000 1px solid;"  height="30"   align="left" >&nbsp;&nbsp;<?=find_type($d[t_id])?>&nbsp;&nbsp;</td>
	   <td  style="border: #000000 1px solid;"  align="left"  height="30">&nbsp;&nbsp;<?=$d[pro_name]?>&nbsp;&nbsp;</td>
		<td  style="border: #000000 1px solid;"  align="center">&nbsp;&nbsp;<?=$d[limite]?></td>
		<td  style="border: #000000 1px solid;"  align="center">&nbsp;&nbsp;<?=$d[unit2]?></td>
		   <td  style="border: #000000 1px solid;"  align="center">&nbsp;&nbsp;<?=$d[a_unit2]?></td>
		   <td   style="border: #000000 1px solid;" align="center">&nbsp;&nbsp;<?=$d[unit1]?></td>
          <td  style="border: #000000 1px solid;" align="center" >
		  <? if($d[status]==1){
echo "<font color=red>ยกเลิก</font>";
}else{
echo "ใช้งาน";
}
?></td>
          <td align="center"  style="border: #000000 1px solid;" >
		  <?  if($d[status]==0){?>
		  <a href="?action=edit_product&p_id=<?=$d[p_id]?>"><img src="images/Modify.png" border="0" /></a>
		  <? }?>&nbsp;		  </td>
	 <td align="center"  style="border: #000000 1px solid;" ><?  if($d[status]==0){?>
	 <a href="?action=product&del=del&p_id=<?=$d[p_id]?>" onClick="return godel()" ><img src="images/Delete.png" border="0" /></a>
	   <? }?>&nbsp;	   </td> 
   	   </tr>
	   <? }?>
	   
	   <tr>
	   <td colspan="9"   style="border: #000000 1px solid;" >
	   <br>
<center><FONT size="2"  face="Tahoma">จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=product&Page=$Prev_Page&search=$search&word=$word&type_id=$type_id&p_id=$p_id&pro_name=$pro_name'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[ <a href='$PHP_SELF?action=product&Page=$i&search=$search&word=$word&type_id=$type_id&p_id=$p_id&pro_name=$pro_name'>$i</a> ]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=product&Page=$Next_Page&search=$search&word=$word&type_id=$type_id&p_id=$p_id&pro_name=$pro_name'> หน้าถัดไป>> </a>";

?>
</FONT></center>	   </td></tr>
	 </table>

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

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
		   if (  document.type.p_type.value=='' || document.type.p_type.value==' ' )
           {
           alert("กรุณากรอกชื่อประเภทพัสดุ");
           document.type.p_type.focus();           
           return false;
           }
			return true;
	}

</script>
<?

//-----------บันทึก-------------------
if($save_add <>'' and  find_id($p_type) <=0){
	$query=" INSERT INTO type (p_type)
		 VALUES ('$p_type')";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_type\">\n";

}elseif($save_add <>'' and  find_id($p_type) > 0){
	echo "<br><br><center><font color=darkgreen>รหัสหรือชื่อประเภทพัสดุซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
}

//----------ลบ--------------
if($del =='del'){
	 	$sql="UPDATE  type  SET  status='1'  WHERE  t_id=$t_id";
  		 $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขสถานะข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_type\">\n";

}
	
	$sql1 ="select  max(id) as max from type ";
	$result = mysql_query($sql1);
	 if($result)
	$rs = mysql_fetch_array($result);
	if($rs["max"] =='' or $rs["max"] == NULL) {
		$id ="1";
	}else{
	 	$id = $rs["max"] +1;
	}
?>
<link href="style2.css" rel="stylesheet" type="text/css" /><br />
<form name="type"  method="post">
<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" >
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>เพิ่มประเภทพัสดุใหม่</div></td>
  			</tr>
<tr>
  <td width="40%" height="30" align="right"  class="bmText" a>ชื่อประเภทพัสดุ</td>
	<td align="left">&nbsp;&nbsp;
	  <input name="p_type" type="text" id="p_type" value="<?=$p_type?>" size="30" maxlength="100" /></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr> 
<tr>
	<td height="30" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()"/ class="buttom">	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_type')" class="buttom">

     </td>
</tr>
</table>
</td></tr></table>
</form>
<?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM type order by p_type ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
	 <table width="80%" cellspacing="1" border="0" style="border-collapse:collapse;" align="center">
     <tr bgcolor="#99CCFF" class="lgBar">				
	  <td width="49%" height="30" style="border: #000000 1px solid;" align="center" >ชื่อประเภทพัสดุ</td>
      <td width="20%" style="border: #000000 1px solid;"  align="center">สถานะ</td>
      <td width="15%" style="border: #000000 1px solid;"  align="center">แก้ไข</td>
 <td width="16%" style="border: #000000 1px solid;"  align="center">ลบ</td>
     
	 </tr>
	 <?
	 $r=0;
	 if($result)
		while ($d =mysql_fetch_array($result)){
	$r++;
	?>
		<tr class="bmText">
	   <td  align="left" height="30" style="border: #000000 1px solid;" >&nbsp;&nbsp;
	     <?=$d[p_type]?>	     &nbsp;&nbsp;</td>
	   <td  align="center" style="border: #000000 1px solid;" ><? if($d[status]==1){
echo "<font color=red>ยกเลิก</font>";
}else{
echo "ใช้งาน";
}
?></td>
	   <td style="border: #000000 1px solid;"   align="center">&nbsp;&nbsp;
	     <?  if($d[status]==0){?>
         <a href="?action=edit_type&t_id=<? echo $d[t_id] ?>"><img src="images/Modify.png" border="0" /></a>
         <? }?></td>
	     <td style="border: #000000 1px solid;" align="center" ><?  if($d[status]==0){?>
	 <a href="?action=add_type&del=del&t_id=<? echo $d[t_id] ?>" onClick="return godel()" ><img src="images/Delete.png" border="0" /></a>
	   <? }?>
	   &nbsp;
	   </td> 
   	   </tr>
	   <? }?>
	 </table>
</body>
</html>
<?
function find_id($p_type){
	$sql1 ="select * from type where  p_type= '$p_type' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}

?>
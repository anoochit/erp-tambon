
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
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
		if (  document.division.div_id1.value=='' || document.division.div_id1.value==' ' )
           {
           alert("กรุณากรอกรหัสกอง");
           document.division.div_id1.focus();           
           return false;
           }
		   if (  document.division.div_name.value=='' || document.division.div_name.value==' ' )
           {
           alert("กรุณากรอกชื่อกอง");
           document.division.div_name.focus();           
           return false;
           }
			return true;
	}
</script>
<?

//-----------บันทึก-------------------
if($save_add <>'' and  find_div_id($div_id1,$div_name) <=0){
	$query=" INSERT INTO division (div_id,div_name)
		 VALUES ('$div_id1','$div_name')";
		//echo $query."<br>";
		$result=mysql_query($query);
	//	echo "<center><img src=\"images_/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=division\">\n";
		//mysql_close($connect);	
}elseif($save_add <>'' and  find_div_id($div_id,$div_name) > 0){//end save
	echo "<br><br><center><font color=darkgreen>รหัสหรือชื่อกองซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
       // print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_division\">\n";
}

//----------ลบ--------------
if($del =='del'){
	 	 $sql = "DELETE FROM  division WHERE div_id=$div_id1";
  		 $result = mysql_query($sql);
		 
		 $sql_sub="DELETE FROM  subdivision WHERE div_id='$div_id1' ";
		//echo $sql_sub."<br>";
  	 	$result_sub=mysql_query($sql_sub);
		
		/*$sql_pos="DELETE FROM  position  WHERE div_id='$div_id' ";
		//echo $sql_pos."<br>";
  	 	$result_pos=mysql_query($sql_pos);*/
		
		$sql_user ="DELETE FROM  user  WHERE div_id ='$div_id1' ";
		//echo $sql_user."<br>";
  	 	$result_user=mysql_query($sql_user);
		
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการลบข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_division\">\n";
	//	mysql_close();	

}
	// หาเลข div_id
	
	$sql1 ="select  max(div_id) as max from division ";
	//echo $sql1 ."<br>";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	if($rs["max"] =='' or $rs["max"] == NULL) {
		$div_id1 ="51001";
	}else{
	 	$div_id1 = $rs["max"] +1;
	}
?>
<form name="division"  method="post"><br />
<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>เพิ่มกอง</div></td>
  			</tr>
			
<tr>
  <td  align="right" width="40%"  class="bmText">
  รหัสกอง</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="div_id1" value="<?=$div_id1?>" size="20"  maxlength="5" />
	  </td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr> 
<tr>
  <td a align="right" width="40%"  class="bmText">ชื่อกอง</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="div_name" value="<?=$div_name?>" size="30" maxlength="100" /></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr> 
<tr>
	<td height="30" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_division')">

     </td>
</tr>
</table>
</td></tr></table>
</form>

</body>
</html>
<?
function find_div_id($div_id,$div_name){
	$sql1 ="select * from division where (div_id= '$div_id' or div_name= '$div_name' )";
	//echo $sql1 ."<br>";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}

?>
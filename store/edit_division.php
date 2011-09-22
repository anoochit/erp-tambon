
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		   if (  document.edit_division.div_name.value=='' || document.edit_division.div_name.value==' ' )
           {
           alert("กรุณากรอกชื่อกอง");
           document.edit_division.div_name.focus();           
           return false;
           }
			return true;
	}
</script>
<?


if($save_add <>''  ){
	if(find_div_id($div_name,$div_name2) <=0){
		// แก้ไข   edit_division
		$sql="UPDATE division SET  div_name='$div_name' WHERE div_id=$div_id1";
  	 	$result=mysql_query($sql);

		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=division\">\n";
	}elseif( find_div_id($div_name,$div_name2) > 0){
	echo "<br><br><center><font color=darkgreen>ชื่อกองซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}

//-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM division WHERE div_id='$div_id1'";
   $result = mysql_query($sql);
   $d =mysql_fetch_array($result);
   $div_id1 = $d["div_id"];
   $div_name = $d["div_name"];
   $div_name2 = $d["div_name"];
 ?>
<form name="edit_division"  method="post"><br />
  <table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>แก้ไขกอง</div></td>
  			</tr>
<tr>
  <td  align="right" width="40%"  class="bmText">
  รหัสกอง</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="div_id1" value="<?=$div_id1?>" size="20" maxlength="5" disabled="disabled"/>
	    <input type="hidden" name="div_id1" value="<?=$div_id1?>"></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr> 
<tr>
  <td a align="right" width="40%"  class="bmText">ชื่อกอง</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="div_name" value="<?=$div_name?>" size="30" maxlength="100" />
	  <input type="hidden" name="div_name2" value="<?=$div_name2?>" >
	  </td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr> 
<tr>
	<td height="30" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล" onClick="return validate()" />	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก "  onClick="window.navigate('index.php?action=add_division')">
	</td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>
<?
function find_div_id($div_name,$div_name2){
	$sql1 ="select * from division where div_name= '$div_name' and  div_name != '$div_name2' ";
	//echo $sql1 ."<br>";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
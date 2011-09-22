<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($save_add <>'' ){
		if(check_edit_type($TRCODE,$TRNAME) <=0){
		// แก้ไข   user
   $sql_user=" UPDATE type_rece SET   TRNAME = '$TRNAME' , cost ='$cost' where TRCODE ='$TRCODE'  ";
  	 	$result_user=mysql_query($sql_user);
		echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
     print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=type_rec\">\n";
}else{
		echo "<br><br><center><font color=darkgreen>ชื่อประเภทรายรับซ้ำกรุณาบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}
//-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM type_rece WHERE TRCODE = '$TRCODE' ";
   $result = mysql_query($sql);
   $d =mysql_fetch_array($result);
 ?>
 <script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		     if (  document.edit_.TRNAME.value=='' || document.edit_.TRNAME.value==' ' )
           {
           alert("กรุณากรอกชื่อปริมาณขยะ");
           document.edit_.TRNAME.focus();           
           return false;
           }
		       if (  document.edit_.cost.value=='' || document.edit_.cost.value==' ' )
           {
           alert("กรุณากรอกจำนวนเงิน");
           document.edit_.cost.focus();           
           return false;
           }
		 if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}
	}
	// STOP HIDING FROM OTHER BROWSERS -->
</script>
<form name="edit_"  method="post">
  <table width="40%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;แก้ข้อมูลประเภทถังขยะ</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="37%"  >รหัส</td>
	<td width="63%" align="left">&nbsp;&nbsp;
	  <input type="text" name="TRCODE1" value="<?=$d[TRCODE]?>" size="10" maxlength="100"  disabled="disabled" />
	  <input  type="hidden" name="TRCODE" value="<?=$d[TRCODE]?>" size="20"  />
	  </td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="37%"  >ปริมาณขยะ</td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="TRNAME" value="<?=$d[TRNAME]?>" size="20" maxlength="50"  /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
  <td a align="right" width="37%"  >จำนวนเงิน</td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="cost" value="<?=$d[cost]?>" size="5" maxlength="7"  /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td colspan="2" align="center" height="35">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล" onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " >	  </td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>

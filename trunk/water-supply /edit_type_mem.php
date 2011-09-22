<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($save_add <>'' ){
		if(check_edit_typemem($TMCODE,$TMNAME) <=0){
   $sql_user=" UPDATE type_mem SET   TMNAME = '$TMNAME' where TMCODE ='$TMCODE'  ";
  	 	$result_user=mysql_query($sql_user);
		echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
     print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=type_mem\">\n";
}else{
		echo "<br><br><center><font color=darkgreen>ชื่อประเภทรายรับซ้ำกรุณาบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}
//-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM type_mem WHERE TMCODE = '$TMCODE' ";
   $result = mysql_query($sql);
   $d =mysql_fetch_array($result);
 ?>
 <script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		     if (  document.edit_.TMNAME.value=='' || document.edit_.TMNAME.value==' ' )
           {
           alert("กรุณากรอกชื่อประเภทผู้ขอใช้บริการ");
           document.edit_.TMNAME.focus();           
           return false;
           }
		 if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}
	}
</script>
<form name="edit_"  method="post">
  <table width="40%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;แก้ข้อมูลประเภทผู้ขอใช้บริการ</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
  <td a align="right" width="37%"  >รหัส</td>
	<td width="63%" align="left">&nbsp;&nbsp;
	  <input type="text" name="TMCODE1" value="<?=$d[TMCODE]?>" size="10" maxlength="100"  disabled="disabled" />
	  <input  type="hidden" name="TMCODE" value="<?=$d[TMCODE]?>" size="20"  />
	  </td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="37%"  >ชื่อประเภทผู้ขอใช้บริการ บ</td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="TMNAME" value="<?=$d[TMNAME]?>" size="20" maxlength="50"  /></td>
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

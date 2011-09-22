<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($save_add <>'' ){
		if(check_edit_service($scode,$sname) <=0){
   $sql_user=" UPDATE service1 SET   sname = '$sname' ,  amt = '$amt'   where scode ='$scode'  ";
  	 	$result_user=mysql_query($sql_user);
		echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
     print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=service\">\n";
}else{
		echo "<br><br><center><font color=darkgreen>ชื่อประเภทค่าเช่าซ้ำกรุณาบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}
//-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM service1 WHERE scode = '$scode' ";
   $result = mysql_query($sql);
   $d =mysql_fetch_array($result);
 ?>
 <script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		     if (  document.edit_.sname.value=='' || document.edit_.sname.value==' ' )
           {
           alert("กรุณากรอกชื่อประเภทค่าเช่า");
           document.edit_.sname.focus();           
           return false;
           }
		        if (  document.edit_.amt.value=='' || document.edit_.amt.value==' ' )
           {
           alert("กรุณากรอกค่าเช่า");
           document.edit_.amt.focus();           
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
 <link href="style.css" rel="stylesheet" type="text/css" />
<form name="edit_"  method="post">
  <table width="40%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;แก้ข้อมูลประเภทค่าเช่า</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
  <td a align="right" width="29%"  >รหัส</td>
	<td width="71%" align="left">&nbsp;&nbsp;
	  <input type="text" name="scode1" value="<?=$d[scode]?>" size="10" maxlength="100"  disabled="disabled" />
	  <input  type="hidden" name="scode" value="<?=$d[scode]?>" size="20"  />
	  </td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
  <td a align="right" width="29%"  >ประเภทค่าเช่า</td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="sname" value="<?=$d[sname]?>" size="25" maxlength="50"  /></td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="29%"  >ค่าเช่า</td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="amt" value="<?=$d[amt]?>" size="10" maxlength="10"  /></td>
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

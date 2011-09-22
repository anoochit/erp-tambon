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
		    if (  document.add_user.username1.value=='' || document.add_user.username1.value==' ' )
           {
           alert("กรุณากรอก Username");
           document.add_user.username1.focus();           
           return false;
           }
		   if (  document.add_user.password1.value=='' || document.add_user.password1.value==' ' )
           {
           alert("กรุณากรอก Password");
           document.add_user.password1.focus();           
           return false;
           }
		    if (  document.add_user.re_password.value=='' || document.add_user.re_password.value==' ' )
           {
           alert("กรุณากรอก re_password");
           document.add_user.re_password.focus();           
           return false;
           }
		    if (  document.add_user.password1.value != document.add_user.re_password.value )
           {
           alert("กรุณากรอก password และ re_password ให้ถูกต้อง");
           document.add_user.re_password.focus();           
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
<?
//-----------บันทึก-------------------
if($save_add <>''){
	if(find_user_u($username1) <=0){
	$query=" INSERT INTO passwd (pwd_username,pwd_passwd , pwd_priv)
		 VALUES ('$username1','$password1' , '$pwd_priv1')";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=user\">\n";
	}else{
		echo "<br><br><center><font color=darkgreen>Username  ซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_user\">\n";
	}
}
//----------ลบ--------------
if($del =='del'){
$sql = "DELETE FROM  user WHERE user_id=$user_id";
   $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการลบข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_user\">\n";
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="add_user"  method="post">
<table width="60%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;เพิ่มผู้ใช้</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
  <td a align="right" width="40%"  >Username</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="username1" value="<?=$username1?>" size="20" maxlength="100" /></td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="40%"  >Password</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="password" name="password1" value="<?=$password1?>" size="20" maxlength="100"  /></td>
</tr>
 <tr class="bmText">
   <td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="40%"  >RE - Password</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="password" name="re_password" value="<?=$re_password?>" size="20" maxlength="100" /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr>
  <td  align="right" width="40%"  class="bmText">
  ระดับผู้ใช้งาน</td>
	<td align="left">
&nbsp;&nbsp;
<select name="pwd_priv1"  >
<!--<option value=''>- เลือกระดับ -</option>  -->
    <option value="1"		<? if($pwd_priv1 == '' or $pwd_priv1 =='1' ) echo "selected";?>>บันทึกข้อมูลทั่วไป</option>
	<option value="2"		<? if($pwd_priv1 =='2' ) echo "selected";?>>Admin</option>
</select></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td colspan="2" align="center" height="35">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล" onClick="return validate()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " >
	  </td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>

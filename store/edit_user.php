
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?

if($save_add <>'' ){
	if(find_user_u($div_id1,$username1,$user_id) <=0){
   		$sql_user="UPDATE user SET div_id = '$div_id1',username='$username1', password='$password',firstname='$firstname', lastname='$lastname' WHERE u_id=$user_id";
  	 	$result_user=mysql_query($sql_user);
		
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_user\">\n";
}else{
		echo "<br><br><center><font color=darkgreen>Username หรือ กอง ซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}
//-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM user WHERE u_id=$user_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
   $username1 = $d["username"];
   $password = $d["password"];
   $div_id1 = $d["div_id"];
   $firstname = $d["firstname"];
   $lastname = $d["lastname"];

 ?>
 <script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		if (  document.edit_user.div_id1.value=='' || document.edit_user.div_id1.value==' ' )
           {
           alert("กรุณาเลือกกอง");
           document.edit_user.div_id1.focus();           
           return false;
           }
		  
		    if (  document.edit_user.firstname.value=='' || document.edit_user.firstname.value==' ' )
           {
           alert("กรุณากรอกชื่อผู้ใช้");
           document.edit_user.firstname.focus();           
           return false;
           }
		    if (  document.edit_user.lastname.value=='' || document.edit_user.lastname.value==' ' )
           {
           alert("กรุณากรอกนามสกุลผู้ใช้");
           document.edit_user.lastname.focus();           
           return false;
           }
		    if (  document.edit_user.username1.value=='' || document.edit_user.username1.value==' ' )
           {
           alert("กรุณากรอก Username");
           document.edit_user.username1.focus();           
           return false;
           }
		   if (  document.edit_user.password.value=='' || document.edit_user.password.value==' ' )
           {
           alert("กรุณากรอก Password");
           document.edit_user.password.focus();           
           return false;
           }
			return true;
	}
</script>
<form name="edit_user"  method="post"><br />
  <table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>แก้ไขผู้ใช้</div></td>
  			</tr>
		<tr>
  <td  align="right" width="40%"  class="bmText">
  ชื่อกอง</td>
	<td align="left">
&nbsp;&nbsp;
<?
			$query="SELECT div_name,div_id FROM division GROUP BY div_id ";
			$result1=mysql_query($query);
?>
<select name="div_id1"  >
<option value=''>- เลือกชื่อกอง -</option> 
  <?
			while($d1 =mysql_fetch_array($result1)){
				
?>
  <option value="<? echo $d1[div_id];?>"
		<?
		if($div_id1 == $d1[div_id]  ) echo "selected";
		?>
		><? echo $d1[div_name];?></option>
  <? }?>
  <option value='0' <? if($div_id1 == '0' ) echo "selected";?>>ผู้ดูแลระบบ</option> 
</select></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr>
  <td a align="right" width="40%"  class="bmText">ชื่อผู้ใช้</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="firstname" value="<?=$firstname?>" size="30" maxlength="100"  /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="40%"  class="bmText">นามสกุล</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="lastname" value="<?=$lastname?>" size="30" maxlength="100"  /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="40%"  class="bmText">Username</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="username1" value="<?=$username1?>" size="30" maxlength="100"  />
</td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="40%"  class="bmText">Password</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="password" value="<?=$password?>" size="30" maxlength="100"  /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr>
	<td colspan="3" align="center"><br />
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล" onClick="return validate()" />	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก "  onClick="window.navigate('?action=add_user')">
	  <br />
      <br /></td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>
<?
function find_user_u($div_id,$username,$user_id){
	$sql1 ="select * from user where (username= '$username' or div_id = '$div_id') and u_id != '$user_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}

?>
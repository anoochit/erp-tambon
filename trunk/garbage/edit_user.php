<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($save_add <>'' ){
		if(find_edit_user($username1,$username_old) <=0){
		// ���   user
   $sql_user=" UPDATE passwd SET  pwd_username = '$username1' , pwd_passwd  , pwd_priv)
		 VALUES (,'$password1' , '$pwd_priv1' where  pwd_username= '$username_old'   ";
 	 	$result_user=mysql_query($sql_user);
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ����䢢�����</font></center><br><br>";
}else{
		echo "<br><br><center><font color=darkgreen>Username ��Ӻѹ�֡����������</font></center><br><br>";
	}
}
//-----------���¡������-------------------
   $sql="SELECT * FROM passwd WHERE pwd_username = '$u_ser'";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
   $username1 = $d["pwd_username"];
   $password1 = $d["pwd_passwd"];
   $re_password = $d["pwd_passwd"];
   $pwd_priv1 = $d["pwd_priv"];
 ?>
 <script language="JavaScript" type="text/javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
		    if (  document.edit_user.username1.value=='' || document.edit_user.username1.value==' ' )
           {
           alert("��سҡ�͡ Username");
           document.edit_user.username1.focus();           
           return false;
           }
		   if (  document.edit_user.password1.value=='' || document.edit_user.password1.value==' ' )
           {
           alert("��سҡ�͡ Password");
           document.edit_user.password1.focus();           
           return false;
           }
		    if (  document.edit_user.re_password.value=='' || document.edit_user.re_password.value==' ' )
           {
           alert("��سҡ�͡ re_password");
           document.edit_user.re_password.focus();           
           return false;
           }
		    if (  document.edit_user.password1.value != document.edit_user.re_password.value )
           {
           alert("��سҡ�͡ password ��� re_password ���١��ͧ");
           document.edit_user.re_password.focus();           
           return false;
           }
		   if (confirm("�س��ͧ��úѹ�֡������ ���������"))
			{
					return true;
			}else{
					return false;
			}
	}
</script>
<form name="edit_user"  method="post">
  <table width="60%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" >
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>��䢼����</div></td>
  			</tr>
		<tr class="bmText">
  <td a align="right" width="40%"  >Username</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="username1" value="<?=$username1?>" size="20" maxlength="100" />
	  <input  type="hidden" name="username_old" value="<?=$u_ser?>" size="20" /></td>
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
  �дѺ�����ҹ</td>
	<td align="left">
&nbsp;&nbsp;
<select name="pwd_priv1"  >
    <option value="1"		<? if($pwd_priv1 == '' or $pwd_priv1 =='1' ) echo "selected";?>>�ѹ�֡�����ŷ����</option>
	<option value="2"		<? if($pwd_priv1 =='2' ) echo "selected";?>>Admin</option>
</select></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td colspan="3" align="center" height="35">
	  <input name="save_add" type="submit"  value="�ѹ�֡������" onClick="return validate()" />	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ¡��ԡ "  onClick="window.navigate('?action=edit_user')">
	  </td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>

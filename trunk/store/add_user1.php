
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
function godel()
{
	if (confirm("�س��ͧ���ź�����Ź�� ���������"))
	{
		return true;
	}
		return false;
}
</script>

<script language="JavaScript" type="text/javascript">
	function validate(theForm) 
	{
		if (  document.add_user.div_id1.value=='' || document.add_user.div_id1.value==' ' )
           {
           alert("��س����͡�ͧ");
           document.add_user.div_id1.focus();           
           return false;
           }
		    if (  document.add_user.firstname.value=='' || document.add_user.firstname.value==' ' )
           {
           alert("��سҡ�͡���ͼ����");
           document.add_user.firstname.focus();           
           return false;
           }
		    if (  document.add_user.lastname.value=='' || document.add_user.lastname.value==' ' )
           {
           alert("��سҡ�͡���ʡ�ż����");
           document.add_user.lastname.focus();           
           return false;
           }
		    if (  document.add_user.username1.value=='' || document.add_user.username1.value==' ' )
           {
           alert("��سҡ�͡ Username");
           document.add_user.username1.focus();           
           return false;
           }
		   if (  document.add_user.password.value=='' || document.add_user.password.value==' ' )
           {
           alert("��سҡ�͡ Password");
           document.add_user.password.focus();           
           return false;
           }
			return true;
	}
</script>
<?
//-----------�ѹ�֡-------------------
if($save_add <>''){
	if(find_user_u($username1,$div_id1) <=0){
	$query=" INSERT INTO user (username,password,div_id,firstname,lastname)
		 VALUES ('$username1','$password','$div_id1','$firstname','$lastname')";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ�úѹ�֡������</font></center><br><br>";
     print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=add_user\">\n";
	}else{
		echo "<br><br><center><font color=darkgreen>Username ���� �ͧ ��Ӻѹ�֡����������</font></center><br><br>";
	}
}

if($del =='del'){
		$sql = "DELETE FROM  user WHERE user_id=$user_id";
   		$result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ��ź������</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_user\">\n";
}
?>
<form name="add_user"  method="post"><br />
<table width="70%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;���������</div></td>
  			</tr>
<tr>
  <td  align="right" width="40%"  class="bmText">
  ���ͧ͡</td>
	<td align="left">
&nbsp;&nbsp;
<?
			$query="SELECT div_name,div_id FROM division GROUP BY div_id ";
			$result=mysql_query($query);
?>
<select name="div_id1"  >
<option value=''>- ���͡���ͧ͡ -</option> 
  <?
			while($d =mysql_fetch_array($result)){
?>
  <option value="<? echo $d[div_id];?>"
		<?
		if($div_id1 == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
  <option value='0'>�������к�</option> 
</select></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="40%"  class="bmText">���ͼ����</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="firstname" value="<?=$firstname?>" size="30" maxlength="100" /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="40%"  class="bmText">���ʡ��</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="lastname" value="<?=$lastname?>" size="30" maxlength="100" /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="40%"  class="bmText">Username</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="username1" value="<?=$username1?>" size="30" maxlength="100" /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
  <td a align="right" width="40%"  class="bmText">Password</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="password" value="<?=$password?>" size="30" maxlength="100" /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td colspan="3" align="center"><br />
	  <input name="save_add" type="submit"  value="�ѹ�֡������" onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ¡��ԡ " >
	  <br />
      <br /></td>
</tr>
</table>
</td></tr></table>
</form>

</body>
</html>
<?
function find_div_id($div_id){
	$sql1 ="select * from division where div_id= '$div_id'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_user_u($username , $div_id){
	$sql1 ="select * from user where username= '$username' or div_id = '$div_id'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}

?>
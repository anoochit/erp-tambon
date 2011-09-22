<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<br>
<form name="add" action="setup_save.php"  method="post"   >
<table  border="0" cellpadding="0" cellspacing="0">
<tr>
    <td colspan="2"><div  align="center" ><strong>เพิ่ม User</strong></div></td>
  </tr>
  <tr>
    <td width="184"><div align="right">Username : &nbsp;&nbsp;&nbsp;</div></td>
    <td width="310">
      <div align="left">
        <input type="text" name="user_name" value="<? echo $user_name?>" >
      </div></td>
  </tr>
  <tr>
    <td><div align="right">User_pwd : &nbsp;&nbsp;&nbsp;</div></td>
    <td><div align="left">
      <input type="text" name="user_pwd" value="<? echo $user_pwd?>">
    </div></td>
  </tr>
  <tr>
    <td><div align="right">ชื่อ : &nbsp;&nbsp;&nbsp;</div></td>
    <td><div align="left"> <input type="text" name="firsname" value="<? echo $firsname?>"></div></td>
  </tr>
  <tr>
    <td><div align="right">สกุล : &nbsp;&nbsp;&nbsp;</div></td>
    <td><div align="left"> <input type="text" name="surname" value="<? echo $surname?>"></div></td>
  </tr>
  <tr>
    <td><div align="right">หน่วยงาน : &nbsp;&nbsp;&nbsp;</div></td>
    <td><div align="left"> 
<?
  $sql = "SELECT * From department ";
	$result = mysql_query($sql);
	?>
	<select name="dep_id">
	<option value="all" <? if($dep_id == 'all') echo "selected"?>>ทั้งหมด</option>
<?
	while($rs=mysql_fetch_array($result)){
		echo "<option value='$rs[dep_id]'";
		if($dep_id == $rs[dep_id]) echo "selected";
		echo " >$rs[dep_name]</option>";
	}
	?>
	</select></div></td>
  </tr>
  <tr>
    <td height="45" colspan="2" ><div align="center">
      <input type="submit" name="edit" value=" ตกลง " onClick="return validate()">&nbsp;&nbsp; 
    </div></td>
  </tr>
</table>
</form>
<script language="JavaScript" type="text/javascript">
	function validate(theForm) 
	{
		if (  document.add.user_name.value=='' || document.add.user_name.value==' ' )
           {
           alert("กรุณากรอก Username");
           document.add.user_name.focus();           
           return false;
           }		  
		     if (  document.add.user_pwd.value=='' || document.add.user_pwd.value==' ' )
           {
           		alert("กรุณากรอก User_pwd");
           		document.add.user_pwd.focus();           
           		return false;
           }
		   if (  document.add.firsname.value=='' || document.add.firsname.value==' ' )
           {
           		alert("กรุณากรอก Firsname");
           		document.add.firsname.focus();           
           		return false;
           }
		     if (  document.add.dep_id.value=='' || document.add.dep_id.value==' ' )
           {
           		alert("กรุณาเลือกหน่วยงาน");
           		document.add.dep_id.focus();           
           		return false;
           }

			return true;
	}
</script>

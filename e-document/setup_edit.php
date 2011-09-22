<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?

  $sql = "SELECT * From user_account  where user_id = '$u_id'";
// echo $sql."<br>";
	$result = mysql_query($sql);
	$rs1=mysql_fetch_array($result);
	  $user_name = $rs1[username];
	  $user_pwd = $rs1[user_pwd];
	  $firsname = $rs1[firsname];
	  $surname = $rs1[surname];
	  $dep_id = $rs1[dep_id];
?><br>
<form name="edit" action="setup_save.php"  method="post">
<input type="hidden" name="u_id" value="<? echo $u_id?>">
<table  border="0" cellpadding="0" cellspacing="0">
<tr>
    <td colspan="2"><div  align="center" ><strong>แก้ไข User</strong></div></td>
  </tr>
  <tr>
    <td width="184"><div align="right">Username : &nbsp;&nbsp;&nbsp;</div></td>
    <td width="310">
      <div align="left">
        <input type="text" name="user_name" value="<? echo $user_name?>" disabled="disabled">
		<input type="hidden" name="user_name" value="<? echo $user_name?>" />
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
 // echo $sql."<br>";
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
      <input type="submit" name="edit" value=" ตกลง ">&nbsp;&nbsp; 
	  <!--input type="submit" name="edit" value=" ยกเลิก "  onclick="window.navigate('index.php')"-->
    </div></td>
  </tr>
</table>
</form>


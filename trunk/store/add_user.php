
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
	function validate(theForm) 
	{
		if (  document.add_user.div_name.value=='' || document.add_user.div_name.value==' ' )
           {
           alert("กรุณาเลือกกอง");
           document.add_user.div_name.focus();           
           return false;
           }
		   if (  document.add_user.sub_name.value=='' || document.add_user.sub_name.value==' ' )
           {
           alert("กรุณาเลือกฝ่าย");
           document.add_user.sub_name.focus();           
           return false;
           }
		    if (  document.add_user.level.value=='' || document.add_user.level.value==' ' )
           {
           alert("กรุณาเลือกระดับการใช้งาน");
           document.add_user.level.focus();           
           return false;
           }
		    if (  document.add_user.u_name.value=='' || document.add_user.u_name.value==' ' )
           {
           alert("กรุณากรอกชื่อผู้ใช้");
           document.add_user.u_name.focus();           
           return false;
           }
		    if (  document.add_user.lastname.value=='' || document.add_user.lastname.value==' ' )
           {
           alert("กรุณากรอกนามสกุลผู้ใช้");
           document.add_user.lastname.focus();           
           return false;
           }
		    if (  document.add_user.user_name.value=='' || document.add_user.user_name.value==' ' )
           {
           alert("กรุณากรอก Username");
           document.add_user.user_name.focus();           
           return false;
           }
		   if (  document.add_user.password.value=='' || document.add_user.password.value==' ' )
           {
           alert("กรุณากรอก Password");
           document.add_user.password.focus();           
           return false;
           }
			return true;
	}
</script>
<?
//-----------บันทึก-------------------
if($save_add <>''){
	if(find_user_u($user_name) <=0){
	$query=" INSERT INTO user (username,password,div_id,sub_id,pos_name,u_name,lastname,level,status)
		 VALUES ('$user_name','$password','$div_name','$sub_name','$level','$u_name','$lastname','$level','$status')";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
    	 print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=add_user\">\n";
	}else{
		echo "<br><br><center><font color=darkgreen>Username ซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}

//----------ลบ--------------
if($del =='del'){
		$sql = "DELETE FROM  user WHERE u_id=$user_id";
		$result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการลบข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_user\">\n";
}
?>

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style2.css" rel="stylesheet" type="text/css" /><br />
<?
    	$sql="SELECT * FROM user where 1 =1 and   div_id != '1' ";
		$sql .= " order by div_id ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
		
	 <table width="98%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
	 <tr bgcolor="#99CCFF" class="lgBar">				
    <td height="30"  colspan="6"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp;&nbsp;[ <a href="?action=add_user1" class="catLink">	เพิ่มผู้ใช้ </a> ]</td> 
	 </tr>
     <tr class="lgBar">				
     <td width="23%" style="border: #000000 1px solid;"  align="center" height="30">กอง 
       </td>
	  <td width="24%" style="border: #000000 1px solid;"  align="center">ชื่อ-นามสกุล       </td>
	  <td width="17%" style="border: #000000 1px solid;"  align="center">Username       </td>
	   <td width="15%" style="border: #000000 1px solid;"  align="center">Password       </td>
     <td width="11%" style="border: #000000 1px solid;" align="center" >&nbsp;แก้ไข       </td>
	 <td width="10%" style="border: #000000 1px solid;" align="center" >&nbsp;ลบ	   </td> 
	 </tr>
	 <?
		while ($d =mysql_fetch_array($result)){
		$r++;
	?>
		<tr class="bmText">
	   <td   align="left" style="border: #000000 1px solid;" height="30" >&nbsp;<? if($d[div_id] =='0') echo "ผู้ดูแลระบบ" ;else echo find_div_name($d[div_id])?>&nbsp;&nbsp;</td>
	   <td   align="left" style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[firstname]?>&nbsp;<?=$d[lastname]?>&nbsp;&nbsp;</td>
	   <td  align="center" style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[username]?></td>
	   <td  align="center"style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[password]?></td>
	    <td align="center" style="border: #000000 1px solid;" ><a href="?action=edit_user&user_id=<? echo $d[u_id] ?>"> <img src="images/Modify.png" border="0" /></a></td>
	   <td align="center" style="border: #000000 1px solid;" ><a href="?action=add_user&del=del&user_id=<? echo $d[u_id] ?>"onClick="return godel()" ><img src="images/Delete.png" border="0" /></a></td> 
   	   </tr>
	   <? }?>

	 </table>


</body>
</html>
<?
function find_div_id($div_id){
	$sql1 ="select * from division where div_id= '$div_id'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_user_u($user_name){
	$sql1 ="select * from user where username= '$user_name' and status = 1 ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}

?>
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
		if (  document.add_user.hocode.value=='' || document.add_user.hocode.value==' ' )
           {
           alert("กรุณากรอกหมู่ที่");
           document.add_user.hocode.focus();           
           return false;
           }
		    if (  document.add_user.honame.value=='' || document.add_user.honame.value==' ' )
           {
           alert("กรุณากรอกชื่อหมู่บ้าน");
           document.add_user.honame.focus();           
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
	if(check_mooban($honame,$hocode) <=0){
	$query=" INSERT INTO house (hocode, honame , pvcode , amcode , tucode )
		 VALUES ('$hocode','$honame' , '01' , '01' , '01' )";
		$result=mysql_query($query);
	echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
	echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
   print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=mooban\">\n";
	}else{
		echo "<br><br><center><font color=darkgreen>ชื่อหมู่ที่หรือชื่อหมู่บ้านซ้ำกรุณาบันทึกข้อมูลใหม่</font></center><br><br>";
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
<table width="40%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;เพิ่มข้อมูลหมู่บ้าน</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="37%"  >หมู่ที่</td>
	<td width="63%" align="left">&nbsp;&nbsp;
	<?
		$sql="select  max(hocode) as max FROM house ";
		$result = mysql_query($sql);
		$recn=mysql_fetch_array($result);
		if($recn["max"] ==''  or $recn["max"]  ==NULL ){
			$hocode = '01';
		}else{
			$hocode  = $recn["max"] + 1;
		}
		if(strlen($hocode)==1) $hocode = '0'.$hocode;
		else $hocode = $hocode;
	?>
	  <input type="text" name="hocode" value="<?=$hocode?>" size="10" maxlength="100"  />
	  </td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="37%"  >ชื่อหมู่บ้าน</td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="honame" value="<?=$honame?>" size="20" maxlength="50"  /></td>
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

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return tmue;
	}
		return false;
}
</script>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		    if (  document.add_user.tmname.value=='' || document.add_user.tmname.value==' ' )
           {
           alert("กรุณากรอกชื่อประเภทผู้ขอใช้บริการ");
           document.add_user.tmname.focus();           
           return false;
           }
		 if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
			{
					return tmue;
			}else{
					return false;
			}
	}
</script>
<?
//-----------บันทึก-------------------
if($save_add <>''){
	if(check_tmname($tmname) <=0){
	$query=" INSERT INTO type_mem (tmcode, tmname  )
		 VALUES ('$tmcode','$tmname'  )";
		$result=mysql_query($query);
	echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
	echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
   print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=type_mem\">\n";
	}else{
		echo "<br><br><center><font color=darkgreen>ชื่อประเภทรายรับซ้ำกรุณาบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="add_user"  method="post">
<table width="50%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;เพิ่มข้อมูลประเภทรายรับ</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td><td width="1%"></tr>
<tr class="bmText">
  <td a align="right" width="31%"  >รหัส</td>
	<td width="68%" align="left">&nbsp;&nbsp;
	<?
		$sql="select  max(tmcode) as max FROM type_mem ";
		$result = mysql_query($sql);
		$recn=mysql_fetch_array($result);
		if($recn["max"] ==''  or $recn["max"]  ==NULL ){
			$tmcode = '01';
		}else{
			$tmcode  = $recn["max"] + 1;
		}
		if(strlen($tmcode)==1) $tmcode = '0'.$tmcode;
		else $tmcode = $tmcode;
	?>
	  <input type="text" name="tmcode1" value="<?=$tmcode?>" size="10" maxlength="100"  disabled="disabled" />
	  <input  type="hidden" name="tmcode" value="<?=$tmcode?>" size="20"  />
	  </td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="31%"  >ประเภทผู้ขอใช้บริการ </td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="tmname" value="<?=$tmname?>" size="30" maxlength="50"  /></td>
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

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
				    if (  document.add_user.brate.value=='' || document.add_user.brate.value==' ' )
           {
				   alert("กรุณากรอกปริมาณน้ำเริ่มต้น");
				   document.add_user.brate.focus();           
				   return false;
           }
		      if (  document.add_user.erate.value=='' || document.add_user.erate.value==' ' )
           {
				   alert("กรุณากรอกปริมาณน้ำ");
				   document.add_user.erate.focus();           
				   return false;
           }
		if (  document.add_user.amt.value=='' || document.add_user.amt.value==' ' )
           {
				   alert("กรุณากรอกอัตราค่าน้ำ");
				   document.add_user.amt.focus();           
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
		$sql="select  max(tmcode) as max FROM rate_water ";
		$result = mysql_query($sql);
		$recn=mysql_fetch_array($result);
		if($recn["max"] ==''  or $recn["max"]  ==NULL ){
			$tmcode = '01';
		}else{
			$tmcode  = $recn["max"] + 1;
		}
		if(strlen($tmcode)==1) $tmcode = '0'.$tmcode;
		else $tmcode = $tmcode;
	$query=" INSERT INTO rate_water (moo1, brate ,erate , amt , tmcode )
		 VALUES ( '$moo1', '$brate' ,'$erate' , '$amt' , '$tmcode')";
		echo $query."<br>";
		$result=mysql_query($query);
		echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
   		print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=rate\">\n";
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="add_user"  method="post">
<table width="70%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="4"><div>&nbsp;&nbsp;&nbsp;เพิ่มข้อมูลอัตราค่าน้ำปะปา</div></td>
  			</tr>
  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
  <td width="22%" height="30" align="right" a  >ชื่อหมู่บ้าน </td>
	<td align="left" colspan="3">&nbsp;&nbsp;
	  <select name="moo1"  ><?
			$query  ="select hocode , honame from house order by hocode";
			$result=mysql_query($query);
			?>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[hocode];?>"
		<?
		if($moo1 == $d[hocode]) echo "selected";
		?>
		><? echo $d[honame];?></option>
                        <? }?>
            </select>
	  </td>
</tr>
  <tr class="bmText"><td  colspan="4" background="images/hdot2.gif"> </td>
  </tr>
<tr class="bmText">
  <td width="22%" height="28" align="right" >ปริมาณน้ำเริ่มต้น</td>
	<td width="24%" align="left">&nbsp;&nbsp;
	  <input  type="text" name="brate" value="<?=$brate?>" size="10" maxlength="50"  /></td>
  <td a align="right" width="20%"  >ปริมาณน้ำถึง</td>
	<td width="34%" align="left">&nbsp;&nbsp;
	  <input  type="text" name="erate" value="<?=$erate?>" size="10" maxlength="10"  /></td>
</tr>
  <tr class="bmText"><td colspan="4" background="images/hdot2.gif"> </td>
  </tr>
<tr class="bmText">
  <td width="22%" height="28" align="right"   >อัตราค่าน้ำ</td>
	<td width="24%" align="left">&nbsp;&nbsp;
	  <input  type="text" name="amt" value="<?=$amt?>" size="10" maxlength="50"  /></td>
</tr>
  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr>
	<td colspan="4" align="center" height="35">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล" onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " >	  </td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>

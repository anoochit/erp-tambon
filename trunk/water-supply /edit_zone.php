<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($save_add <>'' ){
		if(check_edit_zone($hocode , $z_id ,$z_name) <=0){
  		 $sql_user=" update zone  set z_name='" .$z_name. "'  where z_id = '".$z_id. "'  and hocode = '" .$hocode. "'    ";
  	    $result_user=mysql_query($sql_user);
		echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=zone&hocode=$hocode\">\n";
}else{
		echo "<br><br><center><font color=darkgreen>ชื่อเขตซ้ำกรุณาบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}
//-----------เรียกข้อมูล-------------------
   $sql="Select  z.hocode,honame,z_id,z_name from zone z,house h 
   where z.hocode = h.hocode 
   and z.z_id = '$z_id'  and z.hocode ='$hocode' ";
   $result = mysql_query($sql);
   $dd =mysql_fetch_array($result);
 ?>
 <script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		     if (  document.edit_.honame.value=='' || document.edit_.honame.value==' ' )
           {
           alert("กรุณากรอกชื่อเขต");
           document.edit_.z_name.focus();           
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
 <link href="style.css" rel="stylesheet" type="text/css" />
<form name="edit_"  method="post">
  <table width="40%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;แก้ไขข้อมูลเขต</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText" height="25">
			<td width="21%"  a align="right" ><strong>&nbsp;&nbsp;หมู่บ้าน</strong></td>
                    <td width="79%"  ><div>&nbsp;&nbsp;
					<select name="hocode1"  class="text" disabled="disabled"><?
			$query  ="select * from house  order by hocode";
			$result=mysql_query($query);
			?>
  <option value=''>----------เลือกหมู่บ้าน----------</option>  
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[hocode];?>"
		<?
		if($dd[hocode] == $d[HOCODE]) echo "selected";
		?>
		><? echo $d[HONAME];?></option>
                        <? }?>
            </select></div><input  type="hidden" name="hocode" value="<?=$dd[hocode]?>" /></td>
          </tr>
				  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="21%"  ><strong>รหัส</strong></td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="z_id1" value="<?=$dd[z_id]?>" size="10" maxlength="50"  disabled="disabled" class="text"/>
	   <input   type="hidden" name="z_id" value="<?=$dd[z_id]?>" size="10" maxlength="50" class="text"/></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
  <td a align="right" width="21%"  ><strong>ชื่อเขต</strong></td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="z_name" value="<?=$dd[z_name]?>" size="20" maxlength="50"  class="text" /></td>
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


<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript">
	function validate(theForm) 
	{
		 	function validate(theForm) 
	{
		   if (  document.type.type_name.value.length == 0 || document.type.type_name.value==' ' )
           {
           alert("กรุณากรอกชื่อประเภททรัพย์สิน");
           document.type.type_name.focus();           
           return false;
           }
			return true;
	}
</script>
<?

if($save_add <>''  ){
	if(find_id($type_name,$t_id) <=0){
		// แก้ไข   edit_type
		$sql="UPDATE type SET type_name='$type_name' ,time_use='$time_use' ,degen='$degen' , type_id ='$type_id' WHERE t_id=$t_id";
  	 	$result=mysql_query($sql);

		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=add_type\">\n";
		mysql_close($connect);	
	}elseif( find_id($type_name,$t_id) > 0){//end save
	echo "<br><br><center><font color=darkgreen>ชื่อประเภทซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}

   $sql="SELECT * FROM type WHERE t_id=$t_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
 ?>
 <link href="style2.css" rel="stylesheet" type="text/css" />
<br />
<form name="type"  method="post">
  <table width="70%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>แก้ไขประเภททรัพย์สิน</div></td>
  			</tr>
			<tr>
              <td a align="right"  class="bmText">หมวด</td>
              <td width="73%" align="left">&nbsp;&nbsp;
<select name="type_id">
<option value="0" <? if($d[type_id] == 0) echo "selected"?>>สังหาริมทรัพย์</option>
<option value="1" <? if($d[type_id] == 1) echo "selected"?>>อสังหาริมทรัพย์</option>
</select>
</td>
            </tr>
			<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
            <tr>
              <td a align="right"  class="bmText">ประเภททรัพย์สิน</td>
              <td width="73%" align="left">&nbsp;&nbsp;
<input name="type_name" type="text" id="type_name" value="<?=$d[type_name]?>" size="50" maxlength="255" /></td>
            </tr>
			
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()" class="buttom"/>	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_type')" class="buttom">

     </td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>
<?
function find_id($type_name,$t_id){
	$sql1 ="select * from type where type_name= '$type_name' and  t_id != '$t_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
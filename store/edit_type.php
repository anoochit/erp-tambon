
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		   if (  document.edit_type.p_type.value=='' || document.edit_type.p_type.value==' ' )
           {
           alert("กรุณากรอกชื่อประเภทพัสดุ");
           document.edit_type.p_type.focus();           
           return false;
           }
			return true;
	}
</script>
<?

if($save_add <>''  ){
	if(find_id($p_type,$t_id) <=0){
		$sql="UPDATE type SET p_type='$p_type' WHERE t_id=$t_id";
  	 	$result=mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=add_type\">\n";
	}elseif( find_id($p_type,$t_id) > 0){
	echo "<br><br><center><font color=darkgreen>ชื่อประเภทซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}

//-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM type WHERE t_id=$t_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
   $t_id = $d["t_id"];
   $p_type = $d["p_type"];
   $p_type2 = $d["p_type"];
 ?>
<link href="style2.css" rel="stylesheet" type="text/css" /><br />
<form name="edit_type"  method="post">
  <table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" >
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>แก้ไขประเภทพัสดุ</div></td>
  			</tr>
<input name="t_id" type="hidden" id="t_id" value="<?=$t_id?>">
<tr>
  <td width="40%" height="30" align="right"  class="bmText" a>ชื่อประเภทพัสดุ</td>
	<td align="left">&nbsp;&nbsp;
	  <input name="p_type" type="text" id="p_type" value="<?=$p_type?>" size="30" maxlength="100" />
	  </td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr> 
<tr>
	<td height="30" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล" onClick="return validate()"  class="buttom"/>
	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก "  onClick="window.navigate('index.php?action=add_type')" class="buttom">
	</td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>
<?
function find_id($p_type,$t_id){
	$sql1 ="select * from type where p_type= '$p_type' and  t_id  != '$t_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
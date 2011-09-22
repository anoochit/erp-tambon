
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript">
	function validate(theForm) 
	{
		 if (  document.edit_sec.sec_name.value.length == 0 || document.edit_sec.sec_name.value==' ' )
           {
           alert("กรุณากรอกชื่อแผนก");
           document.edit_sec.sec_name.focus();           
           return false;
           }
			return true;
	}
</script>
<?

if($save_add <>''  ){
	if(find_id($sec_name,$s_id) <=0){
		$sql="UPDATE section SET sec_name='$sec_name' WHERE s_id=$s_id";
  	 	$result=mysql_query($sql);
		
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=add_sec\">\n";
		mysql_close($connect);	
	}elseif( find_id($sec_name,$s_id) > 0){
		echo "<br><br><center><font color=darkgreen>ชื่อแผนกซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}

   $sql="SELECT * FROM section WHERE s_id=$s_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);

 ?><br />
<form name="edit_sec"  method="post">
  <table width="60%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>แก้ไขแผนก</div></td>
  			</tr>
            <tr>
              <td width="16%" align="right"  class="bmText" a>ชื่อแผนก</td>
              <td width="84%" align="left">&nbsp;&nbsp;
<input name="sec_name" type="text" id="sec_name" value="<?=$d[sec_name]?>" size="50" maxlength="255" /></td>
            </tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()"/>	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_sec')">     </td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>
<?
function find_id($sec_name,$s_id){
	$sql1 ="select * from section where sec_name= '$sec_name' and  s_id != '$s_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
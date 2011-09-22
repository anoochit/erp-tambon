
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript">
	function validate(theForm) 
	{
		   if (  document.room.s_id.value.length == 0 || document.room.s_id.value==' ' )
           {
           alert("กรุณาเลือกแผนก");
           document.room.s_id.focus();           
           return false;
           }
		    if (  document.room.room.value.length == 0 || document.room.room.value==' ' )
           {
           alert("กรุณากรอกเลขห้อง");
           document.room.room.focus();           
           return false;
           }
		     if (  document.room.room_name.value.length == 0 || document.room.room_name.value==' ' )
           {
           alert("กรุณากรอกชื่อห้อง");
           document.room.room_name.focus();           
           return false;
           }
			return true;
	}
</script>
<?

if($save_add <>''  ){
	if(find_id($room,$r_id) <=0){
		$sql="UPDATE room SET s_id = '$s_id',room='$room',room_name ='$room_name' ,ta_room = '$ta_room' WHERE r_id=$r_id";
  	 	$result=mysql_query($sql);
		
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=add_room\">\n";
		mysql_close($connect);	
	}elseif(find_id($room,$r_id) > 0){
	echo "<br><br><center><font color=darkgreen>ชื่อห้องซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
	}
}

   $sql="SELECT * FROM room WHERE r_id=$r_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);

 ?><br />
<form name="room"  method="post">
  <table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>แก้ไขข้อมูลห้อง</div></td>
  			</tr>
			<tr>
  <td a align="right" width="19%"  class="bmText">ห้อง</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <?
			$query  ="select * from section ";
			$query  .=" order by sec_name ";
			$result=mysql_query($query);
			?><select name="s_id"  >
		   <option value=""> - - - - กรุณาเลือก - - - - - </option>
	    <?
			while($d1 =mysql_fetch_array($result)){
				
	?>
	    <option value="<? echo $d1[s_id];?>"
		<?
		if($d[s_id] == $d1[s_id] ) echo "selected";
		?>
		><? echo $d1[sec_name];?></option>
	            <? }?>
	    </select></td>
</tr>
<tr>
  <td a align="right" width="19%"  class="bmText">เลขห้อง</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="room" type="text" id="room" value="<?=$d[room]?>" size="20" maxlength="255" /></td>
</tr>
<tr>
  <td a align="right" width="19%"  class="bmText">ชื่อห้อง</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="room_name" type="text" id="room_name" value="<?=$d[room_name]?>" size="60" maxlength="255" /></td>
</tr>
<tr>
  <td a align="right" width="19%"  class="bmText">อาจารย์ผู้ควบคุม</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input   type="text" name="ta_room" id="ta_room" value="<?=$d[ta_room]?>" size="40" maxlength="50" /></td>
</tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()"/>	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_room')">

     </td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>
<?
function find_id($room,$r_id){
	$sql1 ="select * from room where room= '$room' and  r_id != '$r_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
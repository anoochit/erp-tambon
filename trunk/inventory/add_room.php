
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
function godel()
{
	if (confirm("คุณต้องการยกเลิกรายการนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
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

if($save_add <>'' and  find_id($room) <=0){
		$r_id = find_max_id();
		$query=" INSERT INTO room (r_id,s_id,room,room_name,ta_room) VALUES ('$r_id','$s_id','$room','$room_name','$ta_room')";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_room\">\n";
		mysql_close($connect);	
}elseif($save_add <>'' and  find_id($room) > 0){
	echo "<br><br><center><font color=darkgreen>ชื่อห้องซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
     print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_room\">\n";
}


//----------ลบ--------------
if($del =='del'){
	 	$sql="DELETE FROM  section   WHERE  s_id = $s_id";
		//echo 	$sql."<br>";
  		 $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_room\">\n";
		mysql_close();	

}

?><br />
<form name="room"  method="post">
<table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
  
      <tr>
        <td align="center"><input type="text" name="word" value="<?=$word?>" />&nbsp;<input type="submit" name="search" value=" ค้นหา " /></td>
      </tr>
  </table><br />
<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>เพิ่มห้องใหม่</div></td>
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
			while($d =mysql_fetch_array($result)){
				
	?>
	    <option value="<? echo $d[s_id];?>"
		<?
		if($s_id == $d[s_id] ) echo "selected";
		?>
		><? echo $d[sec_name];?></option>
	            <? }?>
	    </select></td>
</tr>
<tr>
  <td a align="right" width="19%"  class="bmText">เลขห้อง</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="room" type="text" id="room" value="<?=$room?>" size="20" maxlength="255" /></td>
</tr>
<tr>
  <td a align="right" width="19%"  class="bmText">ชื่อห้อง</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="room_name" type="text" id="room_name" value="<?=$room_name?>" size="60" maxlength="255" /></td>
</tr>
<tr>
  <td a align="right" width="19%"  class="bmText">อาจารย์ผู้ควบคุม</td>
	<td width="81%" align="left">&nbsp;&nbsp;
	  <input name="ta_room" type="text"id="ta_room" value="<?=$ta_room?>" size="40" maxlength="50" /></td>
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
<?


   $sql="SELECT * FROM room r,section s  where r.s_id = s.s_id ";
   if($search <>'' and $word <>''){
		$sql .=" and (s.sec_name like '%$word%' or r.room like '%$word%'  or r.room_name like '%$word%' ) ";
	}
	 $sql .=" order by s.sec_name,r.room_name ";
   
	$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))

print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql .= " LIMIT $Page_start , $Per_Page";
	

		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
<table width="90%" border="1" cellpadding="1" cellspacing="1"  bordercolor="#7292B8" align="center">
  <tr bgcolor="#99CCFF" class="lgBar">
  <td width="29%"><div align="center">แผนก</div></td>
    <td width="8%"><div align="center">เลขห้อง</div></td>
    <td width="31%"><div align="center">ชื่อห้อง</div></td>
	<td width="23%"><div align="center">อาจารย์ผู้ควบคุม</div></td>
    <td width="9%"><div align="center">&nbsp;</div></td>
  </tr>
  <?
	 $r=0;
		while ($d =mysql_fetch_array($result)){
	$r++;
	?>
  <tr class="bmText">
  <td  align="left" height="30">&nbsp;
        <?=$d[sec_name]?></td>
    <td   align="center" height="30">&nbsp;
        <?=$d[room]?></td>
		 <td  align="left" height="30">&nbsp;
        <?=$d[room_name]?></td>
		 <td  align="left" height="30">&nbsp;
        <?=$d[ta_room]?></td>
    <td align="center">
        <a href="?action=edit_room&r_id=<? echo $d[r_id] ?>">แก้ไข</a>
</td>
  </tr>
  <? }?>
</table>
<? 
		mysql_close();	
?>
<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด<b>
<?= $Num_Rows;?>
</b>&nbsp;ฉบับ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? 
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=add_room&Page=$Prev_Page&search=$search&word=$word'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=add_room&Page=$i&search=$search&word=$word'>$i</a>]";
else 
echo "<b> $i </b>";
}

if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=add_room&Page=$Next_Page&search=$search&word=$word'> หน้าถัดไป>> </a>";

?>
</FONT>
</center></div> 
</body>

</html>
<?
function find_id($room){
	$sql1 ="select * from room where  room= '$room' ";
	
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
	function find_max_id() {
	
		$sql = "Select max(r_id) as max  from room  ";
		
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ 
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1;  
		}
		return $rd_id;
	}
?>
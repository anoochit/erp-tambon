
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
		   if (  document.type.sec_name.value.length == 0 || document.type.sec_name.value==' ' )
           {
           alert("กรุณากรอกชื่อแผนก");
           document.type.sec_name.focus();           
           return false;
           }
			return true;
	}
</script>
<?

if($save_add <>'' and  find_id($sec_name) <=0){
		$s_id = find_max_id();
		$query=" INSERT INTO section (s_id,sec_name) VALUES ('$s_id','$sec_name')";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_sec\">\n";
		mysql_close($connect);	
}elseif($save_add <>'' and  find_id($sec_name) > 0){
	echo "<br><br><center><font color=darkgreen>ชื่อแผนกซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
     print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_sec\">\n";
}


if($del =='del'){
	 	$sql="DELETE FROM  section   WHERE  s_id = $s_id";
  		 $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการแก้ไขข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_sec\">\n";
		mysql_close();	

}

?><br />
<form name="type"  method="post">
<table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
  
      <tr>
        <td align="center"><input type="text" name="word" value="<?=$word?>" />&nbsp;<input type="submit" name="search" value=" ค้นหา " /></td>
      </tr>
  </table><br />
<table width="60%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>เพิ่มแผนก</div></td>
  			</tr>
            <tr>
              <td width="16%" align="right"  class="bmText" a>ชื่อแผนก</td>
              <td width="84%" align="left">&nbsp;&nbsp;
<input name="sec_name" type="text" id="sec_name" value="<?=$sec_name?>" size="50" maxlength="255" /></td>
            </tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()"/>	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_sec')">     </td>
</tr>
</table>
</td></tr></table>
</form>
<?

   $sql="SELECT * FROM section  ";
   if($search <>'' and $word <>''){
		$sql .=" where sec_name like '%$word%' ";
	}
	 $sql .=" order by sec_name ";
   
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
	
	//echo $sql;
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
<table width="60%" border="1" cellpadding="1" cellspacing="1"  bordercolor="#7292B8" align="center">
  <tr bgcolor="#99CCFF" class="lgBar">
    <td width="88%"><div align="center">ชื่อแผนก</div></td>
    <td width="12%"><div align="center">&nbsp;</div></td>
  </tr>
  <?
	 $r=0;
		while ($d =mysql_fetch_array($result)){
	$r++;
	?>
  <tr class="bmText">
    <td  align="left" height="30">&nbsp;
        <?=$d[sec_name]?></td>
    <td align="center"><? // if($d[status]==0){?>
        <a href="?action=edit_sec&s_id=<? echo $d[s_id] ?>">แก้ไข</a>
        <? // }?></td>
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
echo " <a href='$PHP_SELF?action=add_sec&Page=$Prev_Page&search=$search&word=$word'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=add_sec&Page=$i&search=$search&word=$word'>$i</a>]";
else 
echo "<b> $i </b>";
}
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=add_sec&Page=$Next_Page&search=$search&word=$word'> หน้าถัดไป>> </a>";

?>
</FONT>
</center></div> 
</body>

</html>
<?
function find_id($sec_name){
	$sql1 ="select * from section where  sec_name= '$sec_name' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
	function find_max_id() {
	
		$sql = "Select max(s_id) as max  from section  ";
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
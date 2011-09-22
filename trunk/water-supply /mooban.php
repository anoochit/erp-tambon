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
<?
//----------ลบ--------------
if($del =='del'){
$sql = "DELETE FROM  passwd WHERE pwd_username ='$u_ser' ";
   $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการลบข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=user\">\n";
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<?
//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM house where 1 =1  ";
	$sql .= " order by abs(hocode) asc";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
	 <table width="60%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
	 <tr bgcolor="#99CCFF" class="lgBar">				
    <td height="30"  colspan="6"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp;&nbsp;[ <a href="?action=add_mooban" class="catLink1">	เพิ่มหมู่บ้าน</a> ]</td> 
	 </tr>
     <tr class="lgBar" bgcolor="#99CCFF">					 
	  <td width="20%" height="28"  align="center" style="border: #000000 1px solid;">หมู่ที่      </td>
	   <td width="64%" style="border: #000000 1px solid;"  align="center">ชื่อหมู่บ้าน      </td>

     <td width="16%" style="border: #000000 1px solid;" align="center" >&nbsp;แก้ไข       </td>
	 </tr>
	 <?
if($result)
		while ($d =mysql_fetch_array($result)){
		$r++;
	?>
		<tr class="bmText" >
	   <td  align="center" style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[HOCODE]?></td>
	   <td  align="left" style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[HONAME]?></td>
		<td align="center" style="border: #000000 1px solid;" ><a href="?action=edit_mooban&hocode=<? echo $d[HOCODE]?>"> <img src="images/Modify.png" border="0" /></a></td>
   	   </tr>
	   <? }?>
    <?

?>
	 </table>
</body>
</html>

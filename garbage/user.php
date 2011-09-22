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
    $sql="SELECT * FROM passwd where 1 =1  ";
	$sql .= " order by pwd_priv  desc";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
		
	 <table width="70%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
	 <tr bgcolor="#99CCFF" class="lgBar">				
    <td height="30"  colspan="6"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp;&nbsp;[ <a href="?action=add_user" class="catLink1">	เพิ่มผู้ใช้ </a> ]</div></td> 
	 </tr>
     <tr class="lgBar" bgcolor="#99CCFF">					 
	  <td width="29%" height="28"  align="center" style="border: #000000 1px solid;">Username       </td>
	   <td width="22%" style="border: #000000 1px solid;"  align="center">Password       </td>
	    <td width="29%" style="border: #000000 1px solid;"  align="center">ระดับการใช้งาน       </td>
	 <td width="10%" style="border: #000000 1px solid;" align="center" >&nbsp;ลบ	   </td> 
	 </tr>
	 <?
if($result)
		while ($d =mysql_fetch_array($result)){
		$r++;
	?>
		<tr class="bmText" >
	   <td   align="left" style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[pwd_username]?></td>
	   <td  align="center"style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[pwd_passwd]?></td>
	    <td align="center" style="border: #000000 1px solid;" ><? 
		if($d[pwd_priv] == 2) echo "admin";
		if($d[pwd_priv] == 1) echo "บันทึกข้อมูลทั่วไป";
		?></a></td>
	   <td align="center" style="border: #000000 1px solid;" ><a href="?action=user&del=del&u_ser=<? echo $d[pwd_username]?>"onClick="return godel()" ><img src="images/Delete.png" border="0" /></a></td> 
   	   </tr>
	   <? }?>
	 </table>
</body>
</html>

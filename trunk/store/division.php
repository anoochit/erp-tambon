
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<br />
<?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM division order by div_id   ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
	  <table width="80%" cellspacing="1" border="0" style="border-collapse:collapse;"   align="center">
     <tr  class="lgBar">		<td colspan="5" height="30" style="border: #000000 1px solid;"  >&nbsp;&nbsp;&nbsp;[ <a href="?action=add_division" class="catLink">	เพิ่มกอง </a> ]</td>	</tr>
     <tr  class="lgBar">				
     <td width="13%"  height="30" style="border: #000000 1px solid;"  ><div align="center">ลำดับที่</div></td>
	  <td width="14%" style="border: #000000 1px solid;"  ><div align="center">รหัสกอง</div></td>
     <td width="42%" style="border: #000000 1px solid;"  ><div align="center">ชื่อกอง</div></td>
 	<td width="8%" style="border: #000000 1px solid;"  ><div align="center">แก้ไข</div></td>
	 </tr>
	 <?
	 $r=0;
		while ($d =mysql_fetch_array($result)){
	$r++;
	?>
		<tr class="bmText">
	   <td  align="center"  height="30" style="border: #000000 1px solid;"  >&nbsp;&nbsp;<?php echo $r?>&nbsp;&nbsp;</td>
	   <td  align="center" style="border: #000000 1px solid;"  >&nbsp;&nbsp;<?=$d[div_id]?>&nbsp;&nbsp;</td>
	   <td  align="left" style="border: #000000 1px solid;"   >&nbsp;&nbsp;<?=$d[div_name]?></td>
	    <td align="center" style="border: #000000 1px solid;"  ><a href="?action=edit_division&div_id1=<? echo $d[div_id] ?>"><img src="images/Modify.png" border="0" /></a></td>
   	   </tr>
	   <? }?>
	 </table>
</body>
</html>
<?
function find_div_id($div_id,$div_name){
	$sql1 ="select * from division where (div_id= '$div_id' or div_name= '$div_name' )";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style.css" rel="stylesheet" type="text/css">
<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">
<tr>
	<td width="657" valign="top" background="images/bg_1.gif">
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td background="images/bar.gif"  align="left" height="25"  colspan="8">
		  <strong>&nbsp;&nbsp;&nbsp;รายงานยืมเอกสาร</strong> </td>
	</tr>
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="450"> ชื่อเอกสาร
		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="100"> ผู้ยืม
		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="90"> วันที่ยืม
		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="90"> กำหนดคืน
		</td>
	</tr>
<?
include("day_func.php");
$sql = "SELECT * FROM borrow_list WHERE  carryback='no' ";
$result = mysql_query($sql);
$x = 1;
while($rs=mysql_fetch_array($result)){
	if((($x)%2) == 1) {
				$color = "#FFFFFF";
			}else {
				$color = "#D1D1D1";
			} 
?>
<tr bgcolor="<?echo $color?>" onmouseover="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onmouseout="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
		<td align="center" height="25" width="1">
		</td>
		<?
	$sql_2 = "SELECT topic FROM documentary WHERE file_id='".$rs["file_id"]."' ";
	$result_2 = mysql_query($sql_2);
	$rs2=mysql_fetch_array($result_2);
?>
		<td align="left" height="25" width="">&nbsp; <a href="index.php?action=view&file_id=<?echo $rs["file_id"]?>" target="_blank" class="catLink5"><? echo $rs2["topic"]?></a>
		</td>
		<td align="center" height="25" width="1">
		</td>
		<td  align="left" height="25" width=""> <?echo $rs["b_name"]?> 
		</td>
		<td  align="center" height="25" width="1"> 
		</td>
		<td align="center" height="25" width="90"> <?echo date_time($rs["b_date"])?>
		</td>
		<td  align="center" height="25" width="1"> 
		</td>
		<td align="center" height="25" width="90">
		<?
		if($rs["l_date"] == "" || $rs["l_date"] == "--"  || $rs["l_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["l_date"]);
		}
		?>
		</td>
	</tr>
	<?$x = $x +1; }?>
	<tr>
		<td colspan="6">
		<br>
		<div><b></b></div><br>
		</td>
	</tr>
</table>
	</td>
</tr>
</table>
</center>
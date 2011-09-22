<meta http-equiv="Content-Type" content="text/html; charset=windows-874" >
<link href="style.css" rel="stylesheet" type="text/css" />
<table name="body" width="671"  height="450" cellpadding="0" cellspacing="0" align="center"  > 
<tr valign="top">
<td height="403"  valign="top">
	<table cellpadding="0" cellspacing="0" border="0"  background="images/bg_1.gif" width="100%">
<tr>
	<td width="655"   align="top">
	<table cellpadding="0" cellspacing="0" border="0"  background="images/bg_1.gif" width="100%">
	<tr valign="top">
		<td background="images/bar.gif" align="center"  valign="top"height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">	</td>
		<td background="images/bar.gif"height="25" width="678"><strong>จำนวนเอกสารรับเข้าของแต่หน่วยงาน	</strong> </td>
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		</tr>
		<tr>
		<td colspan="3" valign="top">
		<?
	if($_SESSION[user_id] =='' || $_SESSION['department'] =='admin' || $_SESSION['department'] =='all' || $_SESSION['de_part'] ==1 ){ 
	$sql_dep = "SELECT *  FROM department 
	group by dep_id 
	ORDER BY dep_id ";
	$result1 = mysql_query($sql_dep);
	while($rs1 = mysql_fetch_array($result1)){
	?>
	&nbsp;&nbsp;&nbsp;<a href='index.php?action=show_index&dep_id=<?=$rs1[dep_id]?>'  align="center" >
	<?
	echo "- ".$rs1[dep_name]. " ";
		$sql = "SELECT count(*) as sum
		FROM 	documentary 
		WHERE dep_id like '%$rs1[dep_id]%' and type_doc = 'รับเข้า'
		Group by  dep_id ";
		$result = mysql_query($sql);
		$x = 1;
		$rs=mysql_fetch_array($result);
		if($rs[sum] > 0) $sum = $rs[sum];
		else $sum = 0;
		echo "  จำนวน  ".$sum . "  ฉบับ";
		echo	"( ยังไม่ได้ลงรับ " . find_receive($rs1[dep_id]) ." ฉบับ)";
		?>
		</a><br><br>
		<?
	}
		?>
		&nbsp;&nbsp;&nbsp;<a href='index.php?action=show_index&dep_id=<?=$rs1[dep_id]?>'  align="center"  >- 20 อันดับเอกสารล่าสุด </a>
		 </td>
		</tr>
		</table>
		</td></tr>
	  </table>
<? }elseif($_SESSION[user_id] <>'' and $_SESSION[user_id] <>'admin' and $_SESSION[user_id] <>'demo'){
		header("Location: index.php?action=show_index");
	}
?>
	</td>
</tr>
</table>

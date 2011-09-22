<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style.css" rel="stylesheet" type="text/css" />
<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">
<tr>
	<td width="657" valign="top">
	<form name="search" method="post">
<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" background="images/bg_1.gif">
	<tr>

		<td background="images/bar.gif"  align="left" height="25"  colspan="4">
		  <strong>&nbsp;&nbsp;&nbsp;รายงานเอกสารยังไม่ได้ลงรับ</strong> </td>

	</tr>
	<tr>
	<td width="28%"  height="30" >&nbsp;</td>
	<td colspan="2"><strong>ค้นหา </strong></td>
<td width="59%">
<select name="dep">	
<option value="all" <? if($dep== 'all' ) echo "selected"?>>ทั้งหมด</option>
<?
	$sql= "SELECT * FROM department order by dep_name";
	$result = mysql_query($sql);
	$i = 0;
	while($rs1 = mysql_fetch_array($result)){
	$i++;

?>	
<option value="<?=$rs1["dep_id"]?>" <? if($dep ==$rs1["dep_id"] ) echo "selected"?>><? 
	echo $rs1["dep_name"];
		?></option>
<? }?>
</select></td>
	</tr>
		<tr >
		<td>&nbsp;</td>
	<td colspan="3" height="30" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search" value=" ค้นหา "> </td>
	</tr>
</table>
</form>
	<? if($search <> ''){?>
	<table cellpadding="0" cellspacing="0" border="0"  width="100%">
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="111"> เลขที่เอกสาร		</td>
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="112"> เลขที่รับเอกสาร		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="258"> เรื่อง		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="109"> ลงวันที่		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td  background="images/bar.gif" align="center" height="25" width="99"> หน่วยงาน		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="82">วันที่ส่ง		</td>
	</tr>
	
<?
include("day_func.php");
$sql = "SELECT d.doc_id,d.topic,d.put_date_on,d.recieve_date,d.finish_date,d.file_id,d.warning,d.receive_id ,s.send_date,s.send_id
FROM documentary d, send_doc s
Where d.file_id = s.file_id ";
if($dep <>'all'){
	$sql  .="and s.send_id = ".$dep ; 
}
$sql .= "  and d.type_doc = 'รับเข้า' ";
$sql  .= " and s.status = 'ยังไม่ได้ลงรับ'
group by s.file_id,s.send_id
ORDER BY d.file_id,s.send_date desc ";
$result = mysql_query($sql);
$x = 1;
while($rs=mysql_fetch_array($result)){

if($rs["finish_date"] != ""){

	$start_date = date_format_th($rs["put_date_on"]);
	$finish_date = date_format_th($rs["finish_date"]);
	$date_long = count_day($start_date,$finish_date);
	$green_date = green_day($finish_date,$date_long);
	$orange_date = orange_day($finish_date,$date_long);
	$red_date = red_day($finish_date,$date_long);
	$cur_date =  DATE('d/m/Y');
	if(trim($rs["warning"]) == "no"){ // เลยวันสิ้นสุด
		if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
	}else	if(date_diff1($cur_date,$finish_date) > 0 && trim($rs["warning"]) == "yes"){ // เลยวันสิ้นสุด // แดง
			$color = "#FF9191";
	}elseif(date_diff1($cur_date,$finish_date) <=0 && date_diff1($cur_date,$red_date) > 0 && trim($rs["warning"]) == "yes"){   //ส้ม
			$color = "#FFD6C1";
	}elseif( date_diff1($cur_date,$red_date) <= 0  && date_diff1($cur_date,$green_date)  > 0  && trim($rs["warning"]) == "yes"){  //เหลือง
			$color = "#FFFFAA";
	}elseif(date_diff1($cur_date,$green_date) <=0 && date_diff1($cur_date,$start_date) >= 0  && trim($rs["warning"]) == "yes"){  // วันเขียว
			$color = "#B0FFB0";
	}else {
		 if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
	}
}else {
		$color = "#FFFFFF";
}
?>
<tr bgcolor="<? echo $color?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#E0FFFF'" onmouseout="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
		<td align="center" height="25" width="1">		</td>
		<td align="left" height="25" width="111">&nbsp; <?echo $rs["doc_id"]?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="left" height="25" width="112">&nbsp; <?echo $rs["receive_id"]?>		</td>
		<td align="center" height="25" width="1">		</td>
		<td  align="left" height="25" width="258"><a href="index.php?action=view&file_id=<?echo $rs["file_id"]?>"   target="_blank" class="catLink5"><?echo $rs["topic"]?></a> <!-- <?=$green_date?>  <?=$orange_date?>  <?=$red_date?> <?= date_diff1($cur_date,$green_date) ?> /<?= date_diff1($cur_date,$orange_date) ?>/ <?= date_diff1($cur_date,$red_date) ?>/ <?= date_diff1($cur_date,$finish_date) ?> -->		</td>
		<td  align="center" height="25" width="10">		</td>
		<td align="center" height="25" width="109"> <?echo date_time($rs["put_date_on"])?>		</td>
		<td  align="center" height="25" width="10">		</td>
		<td align="left" height="25" width="99">
		<?
		echo find_dep_name($rs[send_id]);
		?>		</td>
		<td  align="center" height="25" width="10">		</td>
		<td align="center" height="25" width="82">
		<?
		if($rs["send_date"] == "" || $rs["send_date"] == "--" || $rs["send_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["send_date"]);
		}
		?>		</td>
	</tr>
	<? $x = $x +1; }?>
</table>
<? }?>
	</td>
</tr>
</table>
</center>

	
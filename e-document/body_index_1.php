<meta http-equiv="Content-Type" content="text/html; charset=windows-874" >
<center>
<table name="body" width="980" cellpadding="0" cellspacing="0">
<tr>
<td width="300" bgcolor="" valign="top" background="images/bg_1.gif">
	<? include("menu_form.php");?>
	</td>
	<td width="680" valign="top">
	<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="150"> เลขที่เอกสาร
		</td>
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="150"> เลขที่รับเอกสาร
		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="350"> เรื่อง
		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="80"> ลงวันที่
		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="80"> วันที่รับ
		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="80"> วันที่สิ้นสุด
		</td>
	</tr>
<?
include("day_func.php");
$sql = "SELECT doc_id,topic,put_date_on,recieve_date,finish_date,file_id,warning,receive_id FROM documentary ORDER BY finish_date DESC, put_date_on DESC  LIMIT 0,20";
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
			$color = "#FFFFFF";
	}else	if(date_diff($cur_date,$finish_date) >= 0 && trim($rs["warning"]) == "yes"){ // เลยวันสิ้นสุด
			$color = "#FF9191";
	}elseif(date_diff($cur_date,$finish_date) <0 && date_diff($cur_date,$red_date) < 0 && date_diff($cur_date,$orange_date) >= 0 ){   //
			$color = "#FFD6C1";
	}elseif(date_diff($cur_date,$finish_date) <0 && date_diff($cur_date,$red_date) < 0 && date_diff($cur_date,$orange_date) < 0 && date_diff($cur_date,$green_date)  >= 0  ){  //
			$color = "#FFFFAA";
	}elseif(date_diff($cur_date,$finish_date) <0 && date_diff($cur_date,$red_date) < 0 && date_diff($cur_date,$orange_date) < 0 && date_diff($cur_date,$green_date)  < 0  ){  // วันเขียว
			$color = "#EAFFEF";
	}else {
		$color = "#FFFFFF";
	}
}else {
		$color = "#FFFFFF";
}
?>
<a href="home.php?action=view&file_id=<? echo $rs["file_id"]?>" target="_blank">
<tr bgcolor="<?echo $color?>" onmouseover="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onmouseout="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
		<td align="center" height="25" width="1">
		</td>
		<td align="left" height="25" width="">&nbsp; <? echo $rs["doc_id"]?>
		</td>
		<td  align="center" height="25" width="1"> 
		</td>
		<td align="left" height="25" width="">&nbsp; <? echo $rs["receive_id"]?>
		</td>
		<td align="center" height="25" width="1">
		</td>
		<td  align="left" height="25" width="350">&nbsp; <? echo $rs["topic"]?> 
		</td>
		<td  align="center" height="25" width="1"> 
		</td>
		<td align="center" height="25" width="80">&nbsp; <? echo date_format_th($rs["put_date_on"])?>
		</td>
		<td  align="center" height="25" width="1"> 
		</td>
		<td align="center" height="25" width="80">
		<?
		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--" || $rs["recieve_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_format_th($rs["recieve_date"]);
		}
		?>
		</td>
		<td  align="center" height="25" width="1"> 
		</td>
		<td align="center" height="25" width="80">
		<?
		if($rs["finish_date"] == "" || $rs["finish_date"] == "--" ||  $rs["finish_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_format_th($rs["finish_date"]);
		}
		?>
		</td>
	</tr></a>
	<? $x = $x +1; }?>
	<tr>
		<td colspan="6">
		<br>
		<div><b>แฟ้มเอกสารล่าสุด 20 ลำดับ</b></div><br>
		</td>
	</tr>
</table>
	</td>
	
</tr>
</table>
</center>
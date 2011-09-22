<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style.css" rel="stylesheet" type="text/css">
<table name="body" width="100%"cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="101"> เลขที่เอกสาร		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>	
		<td background="images/bar.gif" align="center" height="25" width="101"> เลขที่รับเอกสาร		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="101"> กอง		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="404"> เรื่อง		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="91"> ลงวันที่		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="91"> วันที่รับ		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="91"> วันที่สิ้นสุด		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="79"> จากหน่วยงาน		</td>
	</tr>
<?
if($_REQUEST["action"] == "search"){

$n_page = 20; //จำนวนต่อหน้า

$page = $_REQUEST["page"];
$page_limit = $_REQUEST["page_limit"];
$orderby = $_REQUEST["orderby"];
$option = $_REQUEST["option"];
$option_by = $_REQUEST["option_by"];
$back = $_REQUEST["back"];
$page = $_REQUEST["page"];
if($key_next ==''){
		$key_word = $_REQUEST["key"];
		$doc_id = $_REQUEST["doc_id"];
		$receive_id = $_REQUEST["receive_id"];
		$sdep_id = $_REQUEST["sdep_id"];
		$start_date = $_REQUEST["start_date"];
		$end_date = $_REQUEST["end_date"];
		$dep_ref = $_REQUEST["dep_ref"];
		$recieve_date_start = $_REQUEST["recieve_date_start"];
		$recieve_date_end = $_REQUEST["recieve_date_end"];
		$finish_date_start = $_REQUEST["finish_date_start"];
		$finish_date_end = $_REQUEST["finish_date_end"];
		$status = $_REQUEST["status"];
		 $key_next = $key.",".$doc_id.",".$receive_id.",".$sdep_id.",".$scat_id.",".$start_date.",".$end_date.",".$dep_ref.",".$recieve_date_start.",".$recieve_date_end.",".$finish_date_start.",".$finish_date_end.",".$status.",".$type_doc;
}else{
		$d = explode(",",$key_next);
		$key_word = $d[0];
		$doc_id = $d[1];
		$receive_id = $d[2];
		$sdep_id = $d[3];
		$scat_id = $d[4];
		$start_date = $d[5];
		$end_date = $d[6];
		$dep_ref = $d[7];
		$recieve_date_start = $d[8];
		$recieve_date_end = $d[9];
		$finish_date_start = $d[10];
		$finish_date_end = $d[11];
		$status = $d[12];
		$type_doc = $d[13];
}
if ($page=="") {
	$page=0;
}
else {
	$page=$page;
}

if($page_limit=="") {
	$page_limit=$n_page;
}
else {
	$page_limit=$page_limit;
}
# กำหนดการเรียงลำดับ
if($orderby=="") {
	$orderby="  abs(mid(receive_id,1,2) )desc,abs(mid(receive_id,4) ) desc, recieve_date desc";
}
else {
	$orderby=$orderby;
}
if($_REQUEST["advance_search"] == "yes"){
	//--- ทำการค้นหาแบบละเอียด
	$key_array = array($sdep_id,$scat_id,$sgroup_id,$key_word,$receive_id,$doc_id,$dep_ref,$status,$type_doc);
	$index_array = array("dep_id","cat_id","group_id","topic","receive_id","doc_id","dep_ref","status","type_doc");
	$num_item = count($key_array);
	$order_index = 0;
	
	$sql_1 = "";
	For($i=0;$i<$num_item;$i++) {
		if($order_index > 0) {
			$sql_1 = $sql_1." AND ";
			$order_index--;
		}
			if(trim($index_array[$i]) == "doc_id") {
			$sql_1 .=  $index_array[$i]." LIKE '%".$key_array[$i]."%' ";
			$order_index++;
		}elseif(trim($index_array[$i]) == "topic") {
			$sql_1 .=  $index_array[$i]." LIKE '%".$key_array[$i]."%' ";
			$order_index++;
		}elseif(trim($index_array[$i]) == "dep_ref") {
			$sql_1 .=  $index_array[$i]." LIKE '%".$key_array[$i]."%' ";
			$order_index++;
		}else	if(trim($key_array[$i]) != ""){
			$sql_1 .=  $index_array[$i]."='".$key_array[$i]."' ";
			$order_index++;
		}
	}
	if($start_date != "" && $end_date !=""){
		$sql_1 = $sql_1." AND put_date_on BETWEEN '".date_format_sql($start_date)."' AND '" .date_format_sql($end_date)."' " ;
	}elseif($start_date == "" && $end_date !="") {
		$sql_1 = $sql_1." AND put_date_on ='".date_format_sql($end_date)."' ";
	}elseif($start_date != "" && $end_date =="") {
		$sql_1 = $sql_1." AND put_date_on ='".date_format_sql($start_date)."' ";
	}
	if($recieve_date_start != "" && $recieve_date_end !=""){
		$sql_1 = $sql_1." AND recieve_date BETWEEN '".date_format_sql($recieve_date_start)."' AND '" .date_format_sql($recieve_date_end)."' " ;
	}elseif($recieve_date_start == "" && $recieve_date_end !="") {
		$sql_1 = $sql_1." AND recieve_date ='".date_format_sql($recieve_date_end)."' ";
	}elseif($recieve_date_start != "" && $recieve_date_end =="") {
		$sql_1 = $sql_1." AND recieve_date ='".date_format_sql($recieve_date_start)."' ";
	}
	if($finish_date_start != "" && $finish_date_end !=""){
		$sql_1 = $sql_1." AND finish_date BETWEEN '".date_format_sql($finish_date_start)."' AND '" .date_format_sql($finish_date_end)."' " ;
	}elseif($finish_date_start == "" && $finish_date_end !="") {
		$sql_1 = $sql_1." AND finish_date ='".date_format_sql($finish_date_end)."' ";
	}elseif($finish_date_start != "" && $recieve_date_end =="") {
		$sql_1 = $sql_1." AND finish_date ='".date_format_sql($finish_date_start)."' ";
	}

}else{
	$sql_1 = "topic LIKE '%".$key_word."%' OR put_date_on LIKE '%".$key_word."%' OR dep_id LIKE '%".$key_word."%' OR doc_id LIKE  '%".$key_word."%'  OR receive_id LIKE  '%".$key_word."%'  OR dep_ref LIKE  '%".$key_word."%'" ;

}
	
	if($_REQUEST["action"] == "search"){
		$query ="SELECT COUNT(doc_id)  FROM documentary WHERE ".$sql_1." ORDER BY finish_date , put_date_on DESC";
		$result_id=mysql_query($query);
		$total=mysql_result($result_id,0);

		# หน้า
		$lest=$total%$page_limit;
		$totalpage=(($total-$lest) / $page_limit);

		if($lest!=0) { 
			$totalpage =$totalpage+1; 
		}
		else {
			$totalpage =$totalpage; 
		}
		$begin=$page*$page_limit; // Begin 


// ค้นหา ----------------------------------------------------------
		include("day_func.php");

			$sql = "SELECT * FROM documentary WHERE ". $sql_1 ;
			$sql .= " ORDER BY $orderby   ";
			$sql .= " LIMIT $begin,$page_limit";
			$result = mysql_query($sql);
		
		$x = 1;

		while($rs = mysql_fetch_array($result)){
			if((($x)%2) == 1) {
				$color = "#FFFFFF";
			}else {
				$color = "#D1D1D1";
			}

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
	}else	if(date_diff1($cur_date,$finish_date) >= 0 && trim($rs["warning"]) == "yes"){ // เลยวันสิ้นสุด
			$color = "#FF9191";
	}elseif(date_diff1($cur_date,$finish_date) <0 && date_diff1($cur_date,$red_date) < 0 && date_diff1($cur_date,$orange_date) >= 0 ){   //วันส้ม
			$color = "#FFD6C1";
	}elseif(date_diff1($cur_date,$finish_date) <0 && date_diff1($cur_date,$red_date) < 0 && date_diff1($cur_date,$orange_date) < 0 && date_diff1($cur_date,$green_date)  >= 0  ){  // วันเหลือง
			$color = "#FFFFAA";
	}elseif(date_diff1($cur_date,$finish_date) <0 && date_diff1($cur_date,$red_date) < 0 && date_diff1($cur_date,$orange_date) < 0 && date_diff1($cur_date,$green_date)  < 0  ){  // วันเขียว
			$color = "#B0FFB0";
	}else {
		 if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
	}
}else {
		$color = "#FFFFFF";
}
			?>
	<tr bgcolor="<?echo $color?>" onMouseOver="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#E0FFFF'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''" >
		<td><div>&nbsp;<? echo $rs["doc_id"]?></div>
		</td>
			<td>
		</td>
		<td><div>&nbsp;<? echo $rs["receive_id"]?></div>
		</td>
		<td>
		</td>
		<td><div>&nbsp;<? echo find_dep_name($rs["dep_id"])?></div>
		</td>
		<td>
		</td>
		<td width="404"><div><a href="index.php?action=view&file_id=<? echo $rs["file_id"]?>" target="_blank" class="catLink5"><? if(strlen($rs["topic"]) >100) echo substr($rs["topic"],0,100)."...";
		else echo $rs["topic"];?></a></div>
	  </td>		
		<td>
		</td>
		<td align="center"><div><? echo date_time($rs["put_date_on"])?></div>
		</td>
		<td>
		</td>
		<td align="center"><div>
		<?
		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--" || $rs["recieve_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["recieve_date"]);
		}
		?></div>
		</td>	
		<td>
		</td>
		<td align="center"><div>
		<?
		if($rs["finish_date"] == "" || $rs["finish_date"] == "--" ||  $rs["finish_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["finish_date"]);
		}
		?></div>
		</td>	
		<td>
		</td>
		<td><div><?echo $rs["dep_ref"]?></div></td>
	</tr>			
<?
		$x = $x +1; 
			
		}
}

?>
	<tr bgcolor="#FFFFFF">
		<td colspan="20" align="center"><div><br>
		<? if($_REQUEST["key"] =="" && $_REQUEST["advance_search"] == ""){echo "<H>กรุณากรอก คำค้น(Key word) เพื่อทำการค้นหา</H><br>";};?>
		<? if($total < 1){echo "<H>ไม่พบข้อมูลที่ท่านต้องการค้นหา</H><br>";};?>
		<? if($total > 0){?>
		ผลการค้นหา <b><?
		if($sdep_id != "") {
		echo $sdep_id." ";
		}
	
		if($key != "") {
		echo $key." ";
		}
		if($start_date != "" && $end_date != "") {
		echo "ลงวันที่ระหว่าง ".$start_date." ถึง ".$end_date." ";
		}
		
		?></b> พบทั้งหมด <b><?echo $total;?></b>&nbsp; รายการ<br>
		หน้า 
		<?
		# < Back Page
if ($page>0) {
	$back=$page-1;
	echo "<a href=\"index.php?action=search&advance_search=yes&key_next=$key_next&page=$back&page_limit=$page_limit&orderby=$orderby&option=$option&n_type=information\">&lt;&lt; ก่อนหน้า</a>\n";
}
else {
	echo "\n";
}
# All Link
for ($i=0;$i<$totalpage;$i++) {
	if ($i==$page) {
		echo " <b>[<font color=\"#FF6600\">",$i+1,"</font>]</b> ";
	}
	else {
		echo "  <a href=\"index.php?action=search&advance_search=yes&key_next=$key_next&page=$i&page_limit=$page_limit&orderby=$orderby&option=$option&n_type=information\">",$i+1,"</a>  ";
	}
}
# Next Page >
$next=$page+1;
if ($next<$totalpage) {
	echo "<a href=\"index.php?action=search&advance_search=$advance_search&key_next=$key_next&page=$next&page_limit=$page_limit&orderby=$orderby&option=$option&n_type=information\">ถัดไป &gt;&gt;</a>\n";
}
else {
	echo "<br>\n";
}
	}	?><br>
	
<input  type="submit" name="print" value=" พิมพ์ "  onclick="window.open('print_doc.php?key_next=<?=$key_next?>&orderby=<?=$orderby?>&option=<?=$option?>&action=search&advance_search=<?=$advance_search?>')">		</div>
		</td>
	</tr>
<? }?>
</table>




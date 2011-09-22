<?
include("config.inc.php");
include("date_time.php");
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename="testing.csv"'); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<? echo "ทะเบียนหนังสือรับ,\n";  ?>
<? echo "ลำดับที่,เลขทะเบียนรับ,เลขที่เอกสาร,ลงวันที่,จาก,ถึง,เรื่อง,การปฏิบัติ(วันที่รับ),หมายเหตุ(กอง),\n";  ?>
  <?
if($key_next ==''){
		$key_word = $_REQUEST["key"];
		$doc_id = $_REQUEST["doc_id"];
		$receive_id = $_REQUEST["receive_id"];
		$sdep_id = $_REQUEST["sdep_id"];
		$scat_id = $_REQUEST["scat_id"];
		$start_date = $_REQUEST["start_date"];
		$end_date = $_REQUEST["end_date"];
		$dep_ref = $_REQUEST["dep_ref"];
		$recieve_date_start = $_REQUEST["recieve_date_start"];
		$recieve_date_end = $_REQUEST["recieve_date_end"];
		$finish_date_start = $_REQUEST["finish_date_start"];
		$finish_date_end = $_REQUEST["finish_date_end"];
		 $key_next = $key.",".$doc_id.",".$receive_id.",".$sdep_id.",".$scat_id.",".$start_date.",".$end_date.",".$dep_ref.",".$recieve_date_start.",".$recieve_date_end.",".$finish_date_start.",".$finish_date_end;
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
}

if($orderby=="") {
	$orderby="receive_id,recieve_date";
}
else {
	$orderby=$orderby;
}
if ($option=="") {
	$option="DESC";
}
else {
	$option=$option;
}
if ($option=="ASC") {
	$option_by="DESC";
}
else {
	$option_by="ASC";
}


if($_REQUEST["advance_search"] == "yes"){
	//--- ทำการค้นหาแบบละเอียด
	$key_array = array($sdep_id,$scat_id,$sgroup_id,$key_word,$receive_id,$doc_id,$dep_ref);
	$index_array = array("dep_id","cat_id","group_id","topic","receive_id","doc_id","dep_ref");
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


	$sql_1 = "topic LIKE '%".$key_word."%' OR put_date_on LIKE '%".$key_word."%' OR cat_id LIKE '%".$key_word."%' OR dep_id LIKE '%".$key_word."%' OR doc_id LIKE  '%".$key_word."%' OR group_id LIKE  '%".$key_word."%' OR receive_id LIKE  '%".$key_word."%' " ;

}


		$query ="SELECT COUNT(doc_id)  FROM documentary WHERE ".$sql_1." ORDER BY finish_date , put_date_on DESC";
		include("day_func.php");

			$sql = "SELECT * FROM documentary WHERE ". $sql_1 ;
			$sql .= " ORDER BY $orderby $option ";
		$result = mysql_query($sql);

		$x = 1;
$i =1;
		while($rs = mysql_fetch_array($result)){
echo "$i,$rs[receive_id],$rs[doc_id],date_format_th($rs[put_date_on]),$rs[dep_ref],,$rs[topic],";
		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--" || $rs["recieve_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_format_th($rs["recieve_date"]);
		}
echo ",$rs[dep_id],\n";  

			?>
<?
$i++;
}

?>



<? ob_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();
include('config.inc.php');
$depart=$_REQUEST["depart"];
$catagory=$_REQUEST["catagory"];
$grouptype=$_REQUEST["grouptype"];
$doc_topic=$_REQUEST["doc_topic"];
$author=$_REQUEST["author"];
$gp=$_REQUEST["gp"];
$dep_ref=$_REQUEST["dep_ref"];
$status=$_REQUEST["status"];
$put_on = date_format_sql($_REQUEST["put_date"]);
$recieve_date = date_format_sql($_REQUEST["recieve_date"]);
$finish_date = $_REQUEST["finish_date"];
$send_date = date_format_sql($_REQUEST["send_date"]);
$file_att1=$_FILES['file_att1']['name'];
$file_att2=$_FILES['file_att2']['name'];
$file_att3=$_FILES['file_att3']['name'];
$file_att4=$_FILES['file_att4']['name'];
$file_att5=$_FILES['file_att5']['name'];
$file_att6=$_FILES['file_att6']['name'];
$file_att7=$_FILES['file_att7']['name'];
$file_att8=$_FILES['file_att8']['name'];
$file_att9=$_FILES['file_att9']['name'];
$file_att10=$_FILES['file_att10']['name'];
if($_REQUEST["doc_id"] != "") {
$doc_id=$_REQUEST["doc_id"];
}else {
	$doc_id = "-";
}
if($_REQUEST["receive_id"] != "") {
$receive_id=$_REQUEST["receive_id"];
}else {
	$receive_id = "-";
}
if($_REQUEST["add_cat"] == "add" && $_REQUEST["cat_name"] != ""){
	
	$sql_ck = "SELECT COUNT(cat_name) FROM catagory WHERE cat_name='".$_REQUEST["cat_name"]."' AND dep_name='$depart'";
	$result_ck = mysql_query($sql_ck);
	$ck = mysql_result($result_ck,0);

	if($ck > 0){
		echo "<br><br><center><font color=red>ชื่อแฟ้มซ้ำกับที่มีอยู่แล้ว กรุณาเปลี่ยนใหม่</font><br><br>";
		echo "<input type='button' onClick=\"javascript:history. back()\" value='ย้อนกลับ'>";
		exit();
	}
	echo $ck;

	$sql = "INSERT INTO catagory (dep_name,cat_name) VALUES('$depart','".$_REQUEST["cat_name"]."') ";
	$result = mysql_query($sql);
	$catagory=$_REQUEST["cat_name"];
}
if($_REQUEST["add_group"] == "add" && $_REQUEST["group_name"] != ""){
	$sql = "SELECT cat_id FROM catagory WHERE cat_name='$catagory' ";
	$result = mysql_query($sql);
	$rs = mysql_fetch_array($result);
	$cat_id2 = $rs["cat_id"];

	$sql = "INSERT INTO grouptype (cat_id, group_name) VALUES('".$cat_id2."' ,'".$_REQUEST["group_name"]."' )";
	$result = mysql_query($sql);
	$catagory=$_REQUEST["cat_name"];
	$grouptype=$_REQUEST["group_name"];

}
$max_file_id = file_id();
if($finish_date =='00/00/0000' or  trim($finish_date) ==''){
	$warning = 'no';
	$finish_date = '';
}else{
	$warning = 'yes';
	$finish_date = date_format_sql($_REQUEST["finish_date"]);
}
	if ($file_att1 <> "") { // แทรกไฟล์
		include("include/add_news_files1.php");
		add_file($max_file_id,$file_att1,$file_att_type1,$file_att_size1,$name_file1);
	}
	if ($file_att2 <> "") { // แทรกไฟล์
		include("include/add_news_files2.php");
		add_file($max_file_id,$file_att2,$file_att_type2,$file_att_size2,$name_file2);
	}
	if ($file_att3 <> "") { // แทรกไฟล์
		include("include/add_news_files3.php");
		add_file($max_file_id,$file_att3,$file_att_type3,$file_att_size3,$name_file3);
	}
	if ($file_att4 <> "") { // แทรกไฟล์
		include("include/add_news_files4.php");
		add_file($max_file_id,$file_att4,$file_att_type4,$file_att_size4,$name_file4);
	}
	if ($file_att5 <> "") { // แทรกไฟล์
		include("include/add_news_files5.php");
		add_file($max_file_id,$file_att5,$file_att_type5,$file_att_size5,$name_file5);
	}
	if ($file_att6 <> "") { // แทรกไฟล์
		include("include/add_news_files6.php");
		add_file($max_file_id,$file_att6,$file_att_type6,$file_att_size6,$name_file6);
	}
	if ($file_att7 <> "") { // แทรกไฟล์
		include("include/add_news_files7.php");
		add_file($max_file_id,$file_att7,$file_att_type7,$file_att_size7,$name_file7);
	}
	if ($file_att8 <> "") { // แทรกไฟล์
		include("include/add_news_files8.php");
		add_file($max_file_id,$file_att8,$file_att_type8,$file_att_size8,$name_file8);
	}
	if ($file_att9 <> "") { // แทรกไฟล์
		include("include/add_news_files9.php");
		add_file($max_file_id,$file_att9,$file_att_type9,$file_att_size9,$name_file9);
	}
	if ($file_att10 <> "") { // แทรกไฟล์
		include("include/add_news_files10.php");
		add_file($max_file_id,$file_att10,$file_att_type10,$file_att_size10,$name_file10);
	}
	
	if($gp == 'owner'){
		$gp = "";
		for ($ii=0;$ii<=$total_gp;$ii++) {
				if ($gp_only[$ii] != "") { 
						$gp .= $gp_only[$ii].",";			
				}
		
		}
	}

$query="INSERT INTO documentary (doc_id, dep_id,  topic, author, put_date_on,recieve_date ,finish_date ,permission,file_id,warning,receive_id,dep_ref,status,rep_from,a_status,c_status,send_from , type_doc)   VALUES('$doc_id','$depart','$doc_topic','$author','$put_on','$recieve_date','$finish_date','$gp','$max_file_id',
'$warning','$receive_id','$dep_ref','$status','$rep_from','$a_status','$c_status','$send_from' , '$type_doc')";
$result=mysql_query($query);	
if($type_doc =='รับเข้า'){
				if($send =='ไม่ส่ง'){
					$sql_insert="INSERT INTO send_doc (file_id,send_date,send_dateTime,rep_id,send_id,status,remark,stamp_date ,stamp_dateTime)
				VALUES ('$max_file_id','$send_date',NOW(),'".$_SESSION["username"]."','".$_SESSION['de_part']."','ลงรับแล้ว','$remark','$send_date',NOW())";
					$result_insert  = mysql_query($sql_insert); 	
				}elseif ($send == "ส่ง") { 
					$send_id = '0'	;
					$sql_insert="INSERT INTO send_doc (file_id,send_date,send_dateTime,rep_id,send_id,status,remark)
				VALUES ('$max_file_id','$send_date',NOW(),'".$_SESSION["username"]."','$send_id','รออนุมัติ','$remark')";
					$result_insert  = mysql_query($sql_insert); 
					
				}elseif ($send == "ส่ง_1") { 
				
				if($total <> '' and $chk <>''){
					for ($i=0;$i<=$total;$i++) {
						if ($chk[$i] != "") { 
						if($chk[$i] == '1'){
								$status ='กำลังดำเนินการ';
							}else{
								$status = 'ยังไม่ได้ลงรับ';
							}
							$sql_insert="INSERT INTO send_doc (file_id,send_date,send_dateTime,rep_id,send_id,status,remark) VALUES ('$max_file_id','$send_date',NOW(),'".$_SESSION["username"]."','".$chk[$i]."','$status','$remark')";
							$result_insert  = mysql_query($sql_insert); 
						}
					}
		}
	}
}
mysql_close($connect);
header("Location: index.php?file_id=$max_file_id&action=success");
?>
<?
function file_id(){
	$sql1 = "SELECT max(file_id) as max FROM documentary  ";
	$result1 = mysql_query($sql1);
	$rs1 = mysql_fetch_array($result1);
	if($rs1["max"] == '' or $rs1["max"] == ''){
		return 1;
	}else{
		return $rs1["max"] + 1;
	}
}
function add_file($max_file_id,$file_att,$file_att_type,$file_att_size,$name_file){
	$query="INSERT INTO file_record (file_id,  file_name, file_type, file_size,name_file ) VALUES('$max_file_id','$file_att','$file_att_type','$file_att_size','$name_file')";
	$result=mysql_query($query);	
}
?>
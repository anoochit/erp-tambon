<?
ob_start();
session_start();
include('config.inc.php');

$depart=$_REQUEST["depart"];
$catagory=$_REQUEST["catagory"];
$grouptype=$_REQUEST["grouptype"];
$doc_topic=$_REQUEST["doc_topic"];
$author=$_SESSION["username"];
$gp=$_REQUEST["gp"];
$file_id=$_REQUEST["file_id"];
$receive_id=$_REQUEST["receive_id"];
$old_file1 = $_REQUEST["old_file1"];
$old_file2 = $_REQUEST["old_file2"];
$old_file3 = $_REQUEST["old_file3"];
$old_file4 = $_REQUEST["old_file4"];
$old_file5 = $_REQUEST["old_file5"];
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
$status=$_REQUEST["status"];
$send=$_REQUEST["send"];


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
	$sql = "INSERT INTO catagory (dep_name,cat_name) VALUES('".$depart."','".$_REQUEST["cat_name"]."') ";
	$result = mysql_query($sql);
	$catagory=$_REQUEST["cat_name"];
}


if($finish_date =='00/00/0000' ||  trim($finish_date) =='' || $finish_date =='-' || $finish_date == '//' || $finish_date == '--'){
	$warning = 'no';
	$finish_date = '';
}else{
	$warning = 'yes';
	$finish_date = date_format_sql($_REQUEST["finish_date"]);
}

	if ($file_att1 <> "" and $old_file1 <>'') { // แทรกไฟล์
		unlink("files_data/$old_file1"); 
		include("include/add_news_files1.php");
		up_file($old_file1,$file_att1,$file_att_type1,$file_att_size1,$name_file1);
	}elseif($file_att1 <> "" and $old_file1 ==''){
		include("include/add_news_files1.php");
		add_file($file_id,$file_att1,$file_att_type1,$file_att_size1,$name_file1);
	}
	if ($file_att2 <> "" and $old_file2 <>'') { // แทรกไฟล์
		unlink("files_data/$old_file2"); 
		include("include/add_news_files2.php");
		up_file($old_file2,$file_att2,$file_att_type2,$file_att_size2,$name_file2);
	}elseif($file_att2 <> "" and $old_file2 ==''){
		include("include/add_news_files2.php");
		add_file($file_id,$file_att2,$file_att_type2,$file_att_size2,$name_file2);
	}
	 if ($file_att3 <> "" and $old_file3 <>'') { // แทรกไฟล์
	 	unlink("files_data/$old_file3"); 
		include("include/add_news_files3.php");
		up_file($old_file3,$file_att3,$file_att_type3,$file_att_size3,$name_file3);
	}elseif($file_att3 <> "" and $old_file3 ==''){
		include("include/add_news_files3.php");
		add_file($file_id,$file_att3,$file_att_type3,$file_att_size3,$name_file3);
	}
	  if ($file_att4 <> "" and $old_file4 <>'') { // แทรกไฟล์
	 	unlink("files_data/$old_file4"); 
		include("include/add_news_files4.php");
		up_file($old_file4,$file_att4,$file_att_type4,$file_att_size4,$name_file4);
	}elseif($file_att4 <> "" and $old_file4 ==''){
		include("include/add_news_files4.php");
		add_file($file_id,$file_att4,$file_att_type4,$file_att_size4,$name_file4);
	}
	 if ($file_att5 <> "" and $old_file5 <>'') { // แทรกไฟล์
	 	unlink("files_data/$old_file5"); 
		include("include/add_news_files5.php");
		up_file($old_file5,$file_att5,$file_att_type5,$file_att_size5,$name_file5);
	}elseif($file_att5 <> "" and $old_file5 ==''){
		include("include/add_news_files5.php");
		add_file($file_id,$file_att5,$file_att_type5,$file_att_size5,$name_file5);
	}
	 if ($file_att6 <> "" and $old_file6 <>'') { // แทรกไฟล์
	 	unlink("files_data/$old_file6"); 
		include("include/add_news_files6.php");
		up_file($old_file6,$file_att6,$file_att_type6,$file_att_size6,$name_file6);
	}elseif($file_att6 <> "" and $old_file6 ==''){
		include("include/add_news_files6.php");
		add_file($file_id,$file_att6,$file_att_type6,$file_att_size6,$name_file6);
	}
	 if ($file_att7 <> "" and $old_file7 <>'') { // แทรกไฟล์
	 	unlink("files_data/$old_file7"); 
		include("include/add_news_files7.php");
		up_file($old_file7,$file_att7,$file_att_type7,$file_att_size7,$name_file7);
	}elseif($file_att7 <> "" and $old_file7 ==''){
		include("include/add_news_files7.php");
		add_file($file_id,$file_att7,$file_att_type7,$file_att_size7,$name_file7);
	}
 	if ($file_att8 <> "" and $old_file8 <>'') { // แทรกไฟล์
	 	unlink("files_data/$old_file8"); 
		include("include/add_news_files8.php");
		up_file($old_file8,$file_att8,$file_att_type8,$file_att_size8,$name_file8);
	}elseif($file_att8 <> "" and $old_file8 ==''){
		include("include/add_news_files8.php");
		add_file($file_id,$file_att8,$file_att_type8,$file_att_size8,$name_file8);
	}	
if ($file_att9 <> "" and $old_file9 <>'') { // แทรกไฟล์
	 	unlink("files_data/$old_file9"); 
		include("include/add_news_files9.php");
		up_file($old_file9,$file_att9,$file_att_type9,$file_att_size9,$name_file9);
	}elseif($file_att9 <> "" and $old_file9 ==''){
		include("include/add_news_files9.php");
		add_file($file_id,$file_att9,$file_att_type9,$file_att_size9,$name_file9);
	}		
	if ($file_att10 <> "" and $old_file10 <>'') { // แทรกไฟล์
	 	unlink("files_data/$old_file10"); 
		include("include/add_news_files10.php");
		up_file($old_file10,$file_att10,$file_att_type10,$file_att_size10,$name_file10);
	}elseif($file_att10 <> "" and $old_file10 ==''){
		include("include/add_news_files10.php");
		add_file($file_id,$file_att10,$file_att_type10,$file_att_size10,$name_file10);
	}		

if($gp == 'owner'){
		$gp = "";

		for ($ii=0;$ii<=$total_gp;$ii++) {
				if ($gp_only[$ii] != "") { 

						$gp .= $gp_only[$ii].",";
						
				}
		
		}

}

$query="UPDATE documentary SET doc_id='$doc_id', topic='$doc_topic',dep_id='$depart', author='$author' , put_date_on='$put_on',recieve_date='$recieve_date',finish_date='$finish_date', permission='$gp',warning='$warning',receive_id ='$receive_id',status ='$status'
,rep_from ='$rep_from' ,a_status ='$a_status' ,c_status = '$c_status',dep_ref = '$dep_ref',send_from ='$send_from',type_doc ='$type_doc'
 WHERE file_id=$file_id";
echo $query."<br>";
$result=mysql_query($query);	
if($type_doc =='รับเข้า'){
if($send =='ไม่ส่ง'){
	$sql = "DELETE FROM send_doc WHERE file_id='$file_id'";

	$result = mysql_query($sql);
	
	$sql_insert="INSERT INTO send_doc (file_id,send_date,send_dateTime,rep_id,send_id,status,remark,stamp_date ,stamp_dateTime)
VALUES ('$file_id','$send_date',NOW(),'".$_SESSION["username"]."','".$_SESSION['user_id']."','ลงรับแล้ว','$remark','$send_date',NOW() )";
	echo "\$sql_insert  ".$sql_insert."<br>";
	$result_insert  = mysql_query($sql_insert); 

}elseif ($send == "ส่ง") { 

	$send_id = '0'	;
	if(find_dep_send($file_id,0) >0){
		$sql_insert="UPDATE  send_doc SET send_date ='$send_date' ,
		send_dateTime = NOW(),rep_id ='".$_SESSION["username"]."' ,
		remark ='$remark' 
		 WHERE file_id = $file_id and send_id = 0
		 ";
		echo "\$sql_insert  ".$sql_insert."<br>";
		$result_insert  = mysql_query($sql_insert); 
	
	}else{
		$sql = "DELETE FROM send_doc WHERE file_id='$file_id'";
		echo $sql."<br>";
		$result = mysql_query($sql);
		
		$sql_insert="INSERT INTO send_doc(file_id,send_date,send_dateTime,rep_id,send_id,status,
		remark) VALUES
		 ('$file_id','$send_date',NOW(),'".$_SESSION["username"]."','$send_id','รออนุมัติ','$remark')";
		echo "\$sql_insert  ".$sql_insert."<br>";
		$result_insert  = mysql_query($sql_insert); 
	}
}elseif ($send == "ส่ง_1") {
	$sql = "DELETE FROM send_doc WHERE file_id='$file_id'";
	echo $sql."<br>";
	$result = mysql_query($sql);
				
if($total <> '' and $chk <>''){
	for ($i=0;$i<=$total;$i++) {

		if ($chk[$i] != "") { 
			if(find_up($chk[$i],$file_id) > 0){
				$sql_update="UPDATE send_doc SET send_date ='$send_date' ,send_dateTime = NOW(),
				rep_id ='".	$_SESSION["username"]."' ,remark = '$remark'
				WHERE send_id = ".$chk[$i]." and file_id = $file_id ";
				echo "\$sql_update  ".$sql_update."<br>";
				$result_update  = mysql_query($sql_update); 
			}else{

				if($chk[$i] == '1'){
					$status ='กำลังดำเนินการ';
				}else{
					$status = 'ยังไม่ได้ลงรับ';
				}

				$sql_insert="INSERT INTO send_doc(file_id,send_date,send_dateTime,rep_id,send_id,status,
				remark) 
				VALUES ('$file_id','$send_date',NOW(),'".$_SESSION["username"]."','".$chk[$i]."','$status','$remark')";
				echo "\$sql_insert  ".$sql_insert."<br>";
				$result_insert  = mysql_query($sql_insert); 
			}
		}
		if ($chk[$i] == "" and $c_hk[$i] <>'' and find_up($c_hk[$i] ,$file_id) > 0 ) {
			
			$sql_del = "DELETE FROM send_doc WHERE file_id=$file_id and send_id = ".$c_hk[$i]."";
			echo $sql_del."<br>";
			$result = mysql_query($sql_del);
		}
	}
}

} 
}

?>
<?

header("Location: index.php?action=success&file_id=$file_id");
?>
<?
function find_up($send_id,$file_id){
		$sql1 ="select * from send_doc where file_id = $file_id and send_id = $send_id";

		$result = mysql_query($sql1);
		$rs = mysql_num_rows($result);
		return $rs;
}

	
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
function up_file($old_file,$file_att,$file_att_type,$file_att_size,$name_file){
	$query="UPDATE file_record SET file_name='$file_att' , file_type='$file_att_type' ,
	file_size='$file_att_size',name_file ='$name_file'
	 WHERE file_name='$old_file'";
	echo $query."<br>";
	$result=mysql_query($query);	

}
function add_file($max_file_id,$file_att,$file_att_type,$file_att_size,$name_file){
	$query="INSERT INTO file_record (file_id,  file_name, file_type, file_size,name_file ) VALUES('$max_file_id','$file_att','$file_att_type','$file_att_size','$name_file')";
	echo $query."<br>";
	$result=mysql_query($query);	

}

function find_dep_send($file_id,$send_id){
	$sql1 ="select * from send_doc where file_id = $file_id and send_id =$send_id ";

	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}

?>
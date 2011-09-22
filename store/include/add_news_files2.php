<?php

if ($_FILES['file_att2']['name'] !=none) {
	$file_att_path ="./files_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['file_att2']['type']=="image/gif") {
		$file_attType2="gif";
	}
	elseif (($_FILES['file_att2']['type']=="image/pjpeg") || ($_FILES['file_att2']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType2="jpg";
	}
	elseif ($_FILES['file_att2']['type']=="image/x-png") {
		$file_attType2="png";
	}
	elseif ($_FILES['file_att2']['type']=="image/bmp") {
		$file_attType2="bmp";
	}
	elseif ($_FILES['file_att2']['type']=="application/msword") {
		$file_attType2="doc";
	}
	elseif ($_FILES['file_att2']['type']=="application/pdf") {
		$file_attType2="pdf";
	}
	elseif ($_FILES['file_att2']['type']=="application/x-zip-compressed") {
		$file_attType2="zip";
	}
	elseif ($_FILES['file_att2']['type']=="application/octet-stream") {
		$file_attType2="rar";
	}
	elseif ($_FILES['file_att2']['type']=="application/vnd.ms-powerpoint") {
		$file_attType2="ppt";
	}
	elseif ($_FILES['file_att2']['type']=="application/vnd.ms-excel") {
		$file_attType2="xls";
	}
	else {
		$file_attType2="";
	}
	$name_array =  explode(".",$_FILES['file_att2']['name']);
	$name = $name_array[0];
	$file_att_name_new2="[b".time()."].$file_attType2";
	if (copy($_FILES['file_att2']['tmp_name'],"$file_att_path/$file_att_name_new2")) {
	
	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	# Unlink file_att from Temp
	unlink ($_FILES['file_att2']['tmp_name']); 
	$file_att2="$file_att_name_new2";
	$file_att_size2 = $_FILES['file_att2']['size'];
	$file_att_type2 = $_FILES['file_att2']['type'];
}
else {
	if ($file_att_name2=="") {
		print "ไม่มีไฟล์แนบ <br>\n";
	}
	elseif (!ereg("^image",$file_att_type2) || !ereg("application/msword",$file_att_type2) || !ereg("application/pdf",$file_att_type2) || !ereg("application/x-zip-compressed",$file_att_type2) || !ereg("application/octet-stream",$file_att_type2)  || !ereg("application/application/vnd.ms-powerpoint",$file_att_type2)  || !ereg("application/vnd.ms-excel",$file_att_type2)) {
		print "ไม่ใช่ไฟล์ชนิดที่จะอัพโหลดได้<br>\n";
	}
	else {
		print "ขนาดไฟล์ใหญ่เกินไป Kb<br>\n";
	}
	$file_att2="";
}
# End Upload file_att
?>


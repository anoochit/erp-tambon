<?php

if ($_FILES['file_att3']['name'] !=none) {
	$file_att_path ="./files_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['file_att3']['type']=="image/gif") {
		$file_attType3="gif";
	}
	elseif (($_FILES['file_att3']['type']=="image/pjpeg") || ($_FILES['file_att3']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType3="jpg";
	}
	elseif ($_FILES['file_att3']['type']=="image/x-png") {
		$file_attType3="png";
	}
	elseif ($_FILES['file_att3']['type']=="image/bmp") {
		$file_attType3="bmp";
	}
	elseif ($_FILES['file_att3']['type']=="application/msword") {
		$file_attType3="doc";
	}
	elseif ($_FILES['file_att3']['type']=="application/pdf") {
		$file_attType3="pdf";
	}
	elseif ($_FILES['file_att3']['type']=="application/x-zip-compressed") {
		$file_attType3="zip";
	}
	elseif ($_FILES['file_att3']['type']=="application/octet-stream") {
		$file_attType3="rar";
	}
	elseif ($_FILES['file_att3']['type']=="application/vnd.ms-powerpoint") {
		$file_attType3="ppt";
	}
	elseif ($_FILES['file_att3']['type']=="application/vnd.ms-excel") {
		$file_attType3="xls";
	}
	else {
		$file_attType3="";
	}
	$name_array =  explode(".",$_FILES['file_att3']['name']);
	$name = $name_array[0];
	$file_att_name_new3="[c".time()."].$file_attType3";
	if (copy($_FILES['file_att3']['tmp_name'],"$file_att_path/$file_att_name_new3")) {
		
	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	# Unlink file_att from Temp
	unlink ($_FILES['file_att3']['tmp_name']); 
	$file_att3="$file_att_name_new3";
	$file_att_size3 = $_FILES['file_att3']['size'];
	$file_att_type3 = $_FILES['file_att3']['type'];
}
else {
	if ($file_att_name3=="") {
		print "ไม่มีไฟล์แนบ <br>\n";
	}
	elseif (!ereg("^image",$file_att_type3) || !ereg("application/msword",$file_att_type3) || !ereg("application/pdf",$file_att_type3) || !ereg("application/x-zip-compressed",$file_att_type3) || !ereg("application/octet-stream",$file_att_type3)  || !ereg("application/application/vnd.ms-powerpoint",$file_att_type3)  || !ereg("application/vnd.ms-excel",$file_att_type3)) {
		print "ไม่ใช่ไฟล์ชนิดที่จะอัพโหลดได้<br>\n";
	}
	else {
		print "ขนาดไฟล์ใหญ่เกินไป Kb<br>\n";
	}
	$file_att3="";
}
# End Upload file_att
?>


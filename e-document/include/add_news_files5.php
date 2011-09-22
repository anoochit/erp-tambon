<?php

if ($_FILES['file_att5']['name'] !=none) {
	$file_att_path ="./files_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['file_att5']['type']=="image/gif") {
		$file_attType5="gif";
	}
	elseif (($_FILES['file_att5']['type']=="image/pjpeg") || ($_FILES['file_att5']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType5="jpg";
	}
	elseif ($_FILES['file_att5']['type']=="image/x-png") {
		$file_attType5="png";
	}
	elseif ($_FILES['file_att5']['type']=="image/bmp") {
		$file_attType5="bmp";
	}
	elseif ($_FILES['file_att5']['type']=="application/msword") {
		$file_attType5="doc";
	}
	elseif ($_FILES['file_att5']['type']=="application/pdf") {
		$file_attType5="pdf";
	}
	elseif ($_FILES['file_att5']['type']=="application/x-zip-compressed") {
		$file_attType5="zip";
	}
	elseif ($_FILES['file_att5']['type']=="application/octet-stream") {
		$file_attType5="rar";
	}
	elseif ($_FILES['file_att5']['type']=="application/vnd.ms-powerpoint") {
		$file_attType5="ppt";
	}
	elseif ($_FILES['file_att5']['type']=="application/vnd.ms-excel") {
		$file_attType5="xls";
	}
	else {
		$file_attType5="";
	}
	$name_array =  explode(".",$_FILES['file_att5']['name']);
	$name = $name_array[0];
	$file_att_name_new5="[e".time()."].$file_attType5";
	if (copy($_FILES['file_att5']['tmp_name'],"$file_att_path/$file_att_name_new5")) {
	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	# Unlink file_att from Temp
	unlink ($_FILES['file_att5']['tmp_name']); 
	$file_att5="$file_att_name_new5";
	$file_att_size5 = $_FILES['file_att5']['size'];
	$file_att_type5 = $_FILES['file_att5']['type'];
}
else {
	if ($file_att_name5=="") {
		print "ไม่มีไฟล์แนบ <br>\n";
	}
	elseif (!ereg("^image",$file_att_type5) || !ereg("application/msword",$file_att_type5) || !ereg("application/pdf",$file_att_type5) || !ereg("application/x-zip-compressed",$file_att_type5) || !ereg("application/octet-stream",$file_att_type5)  || !ereg("application/application/vnd.ms-powerpoint",$file_att_type5)  || !ereg("application/vnd.ms-excel",$file_att_type5)) {
		print "ไม่ใช่ไฟล์ชนิดที่จะอัพโหลดได้<br>\n";
	}
	else {
		print "ขนาดไฟล์ใหญ่เกินไป Kb<br>\n";
	}
	$file_att5="";
}
# End Upload file_att
?>


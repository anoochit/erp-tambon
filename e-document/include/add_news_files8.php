<?php

if ($_FILES['file_att8']['name'] !=none) {
	$file_att_path ="./files_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['file_att8']['type']=="image/gif") {
		$file_attType8="gif";
	}
	elseif (($_FILES['file_att8']['type']=="image/pjpeg") || ($_FILES['file_att8']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType8="jpg";
	}
	elseif ($_FILES['file_att8']['type']=="image/x-png") {
		$file_attType8="png";
	}
	elseif ($_FILES['file_att8']['type']=="image/bmp") {
		$file_attType8="bmp";
	}
	elseif ($_FILES['file_att8']['type']=="application/msword") {
		$file_attType8="doc";
	}
	elseif ($_FILES['file_att8']['type']=="application/pdf") {
		$file_attType8="pdf";
	}
	elseif ($_FILES['file_att8']['type']=="application/x-zip-compressed") {
		$file_attType8="zip";
	}
	elseif ($_FILES['file_att8']['type']=="application/octet-stream") {
		$file_attType8="rar";
	}
	elseif ($_FILES['file_att8']['type']=="application/vnd.ms-powerpoint") {
		$file_attType8="ppt";
	}
	elseif ($_FILES['file_att8']['type']=="application/vnd.ms-excel") {
		$file_attType8="xls";
	}
	else {
		$file_attType8="";
	}
	$name_array =  explode(".",$_FILES['file_att8']['name']);
	$name = $name_array[0];
	$file_att_name_new8="[h".time()."].$file_attType8";
	if (copy($_FILES['file_att8']['tmp_name'],"$file_att_path/$file_att_name_new8")) {
	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	# Unlink file_att from Temp
	unlink ($_FILES['file_att8']['tmp_name']); 
	$file_att8="$file_att_name_new8";
	$file_att_size8 = $_FILES['file_att8']['size'];
	$file_att_type8 = $_FILES['file_att8']['type'];
}
else {
	if ($file_att_name8=="") {
		print "ไม่มีไฟล์แนบ <br>\n";
	}
	elseif (!ereg("^image",$file_att_type8) || !ereg("application/msword",$file_att_type8) || !ereg("application/pdf",$file_att_type8) || !ereg("application/x-zip-compressed",$file_att_type8) || !ereg("application/octet-stream",$file_att_type8)  || !ereg("application/application/vnd.ms-powerpoint",$file_att_type8)  || !ereg("application/vnd.ms-excel",$file_att_type8)) {
		print "ไม่ใช่ไฟล์ชนิดที่จะอัพโหลดได้<br>\n";
	}
	else {
		print "ขนาดไฟล์ใหญ่เกินไป Kb<br>\n";
	}
	$file_att8="";
}
# End Upload file_att
?>


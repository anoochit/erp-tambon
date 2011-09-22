<?php

if ($_FILES['file_att10']['name'] !=none) {
	$file_att_path ="./files_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['file_att10']['type']=="image/gif") {
		$file_attType10="gif";
	}
	elseif (($_FILES['file_att10']['type']=="image/pjpeg") || ($_FILES['file_att10']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType10="jpg";
	}
	elseif ($_FILES['file_att10']['type']=="image/x-png") {
		$file_attType10="png";
	}
	elseif ($_FILES['file_att10']['type']=="image/bmp") {
		$file_attType10="bmp";
	}
	elseif ($_FILES['file_att10']['type']=="application/msword") {
		$file_attType10="doc";
	}
	elseif ($_FILES['file_att10']['type']=="application/pdf") {
		$file_attType10="pdf";
	}
	elseif ($_FILES['file_att10']['type']=="application/x-zip-compressed") {
		$file_attType10="zip";
	}
	elseif ($_FILES['file_att10']['type']=="application/octet-stream") {
		$file_attType10="rar";
	}
	elseif ($_FILES['file_att10']['type']=="application/vnd.ms-powerpoint") {
		$file_attType10="ppt";
	}
	elseif ($_FILES['file_att10']['type']=="application/vnd.ms-excel") {
		$file_attType10="xls";
	}
	else {
		$file_attType10="";
	}
	$name_array =  explode(".",$_FILES['file_att10']['name']);
	$name = $name_array[0];
	$file_att_name_new10="[j".time()."].$file_attType10";
	if (copy($_FILES['file_att10']['tmp_name'],"$file_att_path/$file_att_name_new10")) {
		
	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	# Unlink file_att from Temp
	unlink ($_FILES['file_att10']['tmp_name']); 
	$file_att10="$file_att_name_new10";
	$file_att_size10 = $_FILES['file_att10']['size'];
	$file_att_type10 = $_FILES['file_att10']['type'];
}
else {
	if ($file_att_name10=="") {
		print "ไม่มีไฟล์แนบ <br>\n";
	}
	elseif (!ereg("^image",$file_att_type10) || !ereg("application/msword",$file_att_type10) || !ereg("application/pdf",$file_att_type10) || !ereg("application/x-zip-compressed",$file_att_type10) || !ereg("application/octet-stream",$file_att_type10)  || !ereg("application/application/vnd.ms-powerpoint",$file_att_type10)  || !ereg("application/vnd.ms-excel",$file_att_type10)) {
		print "ไม่ใช่ไฟล์ชนิดที่จะอัพโหลดได้<br>\n";
	}
	else {
		print "ขนาดไฟล์ใหญ่เกินไป Kb<br>\n";
	}
	$file_att10="";
}
# End Upload file_att
?>

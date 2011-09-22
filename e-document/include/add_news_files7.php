<?php

if ($_FILES['file_att7']['name'] !=none) {
	$file_att_path ="./files_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['file_att7']['type']=="image/gif") {
		$file_attType7="gif";
	}
	elseif (($_FILES['file_att7']['type']=="image/pjpeg") || ($_FILES['file_att7']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType7="jpg";
	}
	elseif ($_FILES['file_att7']['type']=="image/x-png") {
		$file_attType7="png";
	}
	elseif ($_FILES['file_att7']['type']=="image/bmp") {
		$file_attType7="bmp";
	}
	elseif ($_FILES['file_att7']['type']=="application/msword") {
		$file_attType7="doc";
	}
	elseif ($_FILES['file_att7']['type']=="application/pdf") {
		$file_attType7="pdf";
	}
	elseif ($_FILES['file_att7']['type']=="application/x-zip-compressed") {
		$file_attType7="zip";
	}
	elseif ($_FILES['file_att7']['type']=="application/octet-stream") {
		$file_attType7="rar";
	}
	elseif ($_FILES['file_att7']['type']=="application/vnd.ms-powerpoint") {
		$file_attType7="ppt";
	}
	elseif ($_FILES['file_att7']['type']=="application/vnd.ms-excel") {
		$file_attType7="xls";
	}
	else {
		$file_attType7="";
	}
	$name_array =  explode(".",$_FILES['file_att7']['name']);
	$name = $name_array[0];
	$file_att_name_new7="[g".time()."].$file_attType7";
	if (copy($_FILES['file_att7']['tmp_name'],"$file_att_path/$file_att_name_new7")) {
	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	# Unlink file_att from Temp
	unlink ($_FILES['file_att7']['tmp_name']); 
	$file_att7="$file_att_name_new7";
	$file_att_size7 = $_FILES['file_att7']['size'];
	$file_att_type7 = $_FILES['file_att7']['type'];
}
else {
	if ($file_att_name7=="") {
		print "ไม่มีไฟล์แนบ <br>\n";
	}
	elseif (!ereg("^image",$file_att_type7) || !ereg("application/msword",$file_att_type7) || !ereg("application/pdf",$file_att_type7) || !ereg("application/x-zip-compressed",$file_att_type7) || !ereg("application/octet-stream",$file_att_type7)  || !ereg("application/application/vnd.ms-powerpoint",$file_att_type7)  || !ereg("application/vnd.ms-excel",$file_att_type7)) {
		print "ไม่ใช่ไฟล์ชนิดที่จะอัพโหลดได้<br>\n";
	}
	else {
		print "ขนาดไฟล์ใหญ่เกินไป Kb<br>\n";
	}
	$file_att7="";
}
# End Upload file_att
?>


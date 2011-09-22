<?php

if ($_FILES['file_att6']['name'] !=none) {
	$file_att_path ="./files_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['file_att6']['type']=="image/gif") {
		$file_attType6="gif";
	}
	elseif (($_FILES['file_att6']['type']=="image/pjpeg") || ($_FILES['file_att6']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType6="jpg";
	}
	elseif ($_FILES['file_att6']['type']=="image/x-png") {
		$file_attType6="png";
	}
	elseif ($_FILES['file_att6']['type']=="image/bmp") {
		$file_attType6="bmp";
	}
	elseif ($_FILES['file_att6']['type']=="application/msword") {
		$file_attType6="doc";
	}
	elseif ($_FILES['file_att6']['type']=="application/pdf") {
		$file_attType6="pdf";
	}
	elseif ($_FILES['file_att6']['type']=="application/x-zip-compressed") {
		$file_attType6="zip";
	}
	elseif ($_FILES['file_att6']['type']=="application/octet-stream") {
		$file_attType6="rar";
	}
	elseif ($_FILES['file_att6']['type']=="application/vnd.ms-powerpoint") {
		$file_attType6="ppt";
	}
	elseif ($_FILES['file_att6']['type']=="application/vnd.ms-excel") {
		$file_attType6="xls";
	}
	else {
		$file_attType6="";
	}
	$name_array =  explode(".",$_FILES['file_att6']['name']);
	$name = $name_array[0];
	$file_att_name_new6="[f".time()."].$file_attType6";
	if (copy($_FILES['file_att6']['tmp_name'],"$file_att_path/$file_att_name_new6")) {
	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	# Unlink file_att from Temp
	unlink ($_FILES['file_att6']['tmp_name']); 
	$file_att6="$file_att_name_new6";
	$file_att_size6 = $_FILES['file_att6']['size'];
	$file_att_type6 = $_FILES['file_att6']['type'];
}
else {
	if ($file_att_name6=="") {
		print "ไม่มีไฟล์แนบ <br>\n";
	}
	elseif (!ereg("^image",$file_att_type6) || !ereg("application/msword",$file_att_type6) || !ereg("application/pdf",$file_att_type6) || !ereg("application/x-zip-compressed",$file_att_type6) || !ereg("application/octet-stream",$file_att_type6)  || !ereg("application/application/vnd.ms-powerpoint",$file_att_type6)  || !ereg("application/vnd.ms-excel",$file_att_type6)) {
		print "ไม่ใช่ไฟล์ชนิดที่จะอัพโหลดได้<br>\n";
	}
	else {
		print "ขนาดไฟล์ใหญ่เกินไป Kb<br>\n";
	}
	$file_att6="";
}
# End Upload file_att
?>

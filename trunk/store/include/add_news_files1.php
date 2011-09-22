<?php

if ($_FILES['file_att1']['name'] !=none) {
	$file_att_path ="./files_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['file_att1']['type']=="image/gif") {
		$file_attType1="gif";
	}
	elseif (($_FILES['file_att1']['type']=="image/pjpeg") || ($_FILES['file_att1']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType1="jpg";
	}
	elseif ($_FILES['file_att1']['type']=="image/x-png") {
		$file_attType1="png";
	}
	elseif ($_FILES['file_att1']['type']=="image/bmp") {
		$file_attType1="bmp";
	}
	elseif ($_FILES['file_att1']['type']=="application/msword") {
		$file_attType1="doc";
	}
	elseif ($_FILES['file_att1']['type']=="application/pdf") {
		$file_attType1="pdf";
	}
	elseif ($_FILES['file_att1']['type']=="application/x-zip-compressed") {
		$file_attType1="zip";
	}
	elseif ($_FILES['file_att1']['type']=="application/octet-stream") {
		$file_attType1="rar";
	}
	elseif ($_FILES['file_att1']['type']=="application/vnd.ms-powerpoint") {
		$file_attType1="ppt";
	}
	elseif ($_FILES['file_att1']['type']=="application/vnd.ms-excel") {
		$file_attType1="xls";
	}
	else {
		$file_attType1="";
	}
	$name_array =  explode(".",$_FILES['file_att1']['name']);
	$name = $name_array[0];
	$file_att_name_new1="[a".time()."].$file_attType1";
	if (copy($_FILES['file_att1']['tmp_name'],"$file_att_path/$file_att_name_new1")) {
	
	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	# Unlink file_att from Temp
	unlink ($_FILES['file_att1']['tmp_name']); 
	$file_att1="$file_att_name_new1";
	$file_att_size1 = $_FILES['file_att1']['size'];
	$file_att_type1 = $_FILES['file_att1']['type'];
}
else {
	if ($file_att_name1=="") {
		print "ไม่มีไฟล์แนบ <br>\n";
	}
	elseif (!ereg("^image",$file_att_type1) || !ereg("application/msword",$file_att_type1) || !ereg("application/pdf",$file_att_type1) || !ereg("application/x-zip-compressed",$file_att_type1) || !ereg("application/octet-stream",$file_att_type1)  || !ereg("application/application/vnd.ms-powerpoint",$file_att_type1)  || !ereg("application/vnd.ms-excel",$file_att_type1)) {
		print "ไม่ใช่ไฟล์ชนิดที่จะอัพโหลดได้<br>\n";
	}
	else {
		print "ขนาดไฟล์ใหญ่เกินไป Kb<br>\n";
	}
	$file_att1="";
}
# End Upload file_att
?>

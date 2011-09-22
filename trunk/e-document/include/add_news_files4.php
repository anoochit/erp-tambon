<?php

if ($_FILES['file_att4']['name'] !=none) {
	$file_att_path ="./files_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['file_att4']['type']=="image/gif") {
		$file_attType4="gif";
	}
	elseif (($_FILES['file_att4']['type']=="image/pjpeg") || ($_FILES['file_att4']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType4="jpg";
	}
	elseif ($_FILES['file_att4']['type']=="image/x-png") {
		$file_attType4="png";
	}
	elseif ($_FILES['file_att4']['type']=="image/bmp") {
		$file_attType4="bmp";
	}
	elseif ($_FILES['file_att4']['type']=="application/msword") {
		$file_attType4="doc";
	}
	elseif ($_FILES['file_att4']['type']=="application/pdf") {
		$file_attType4="pdf";
	}
	elseif ($_FILES['file_att4']['type']=="application/x-zip-compressed") {
		$file_attType4="zip";
	}
	elseif ($_FILES['file_att4']['type']=="application/octet-stream") {
		$file_attType4="rar";
	}
	elseif ($_FILES['file_att4']['type']=="application/vnd.ms-powerpoint") {
		$file_attType4="ppt";
	}
	elseif ($_FILES['file_att4']['type']=="application/vnd.ms-excel") {
		$file_attType4="xls";
	}
	else {
		$file_attType4="";
	}
	$name_array =  explode(".",$_FILES['file_att4']['name']);
	$name = $name_array[0];
	$file_att_name_new4="[d".time()."].$file_attType4";
	if (copy($_FILES['file_att4']['tmp_name'],"$file_att_path/$file_att_name_new4")) {
	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	# Unlink file_att from Temp
	unlink ($_FILES['file_att4']['tmp_name']); 
	$file_att4="$file_att_name_new4";
	$file_att_size4 = $_FILES['file_att4']['size'];
	$file_att_type4 = $_FILES['file_att4']['type'];
}
else {
	if ($file_att_name4=="") {
		print "ไม่มีไฟล์แนบ <br>\n";
	}
	elseif (!ereg("^image",$file_att_type4) || !ereg("application/msword",$file_att_type4) || !ereg("application/pdf",$file_att_type4) || !ereg("application/x-zip-compressed",$file_att_type4) || !ereg("application/octet-stream",$file_att_type4)  || !ereg("application/application/vnd.ms-powerpoint",$file_att_type4)  || !ereg("application/vnd.ms-excel",$file_att_type4)) {
		print "ไม่ใช่ไฟล์ชนิดที่จะอัพโหลดได้<br>\n";
	}
	else {
		print "ขนาดไฟล์ใหญ่เกินไป Kb<br>\n";
	}
	$file_att4="";
}
# End Upload file_att
?>

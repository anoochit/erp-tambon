<?php

if ($_FILES['file_att9']['name'] !=none) {
	$file_att_path ="./files_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['file_att9']['type']=="image/gif") {
		$file_attType9="gif";
	}
	elseif (($_FILES['file_att9']['type']=="image/pjpeg") || ($_FILES['file_att9']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType9="jpg";
	}
	elseif ($_FILES['file_att9']['type']=="image/x-png") {
		$file_attType9="png";
	}
	elseif ($_FILES['file_att9']['type']=="image/bmp") {
		$file_attType9="bmp";
	}
	elseif ($_FILES['file_att9']['type']=="application/msword") {
		$file_attType9="doc";
	}
	elseif ($_FILES['file_att9']['type']=="application/pdf") {
		$file_attType9="pdf";
	}
	elseif ($_FILES['file_att9']['type']=="application/x-zip-compressed") {
		$file_attType9="zip";
	}
	elseif ($_FILES['file_att9']['type']=="application/octet-stream") {
		$file_attType9="rar";
	}
	elseif ($_FILES['file_att9']['type']=="application/vnd.ms-powerpoint") {
		$file_attType9="ppt";
	}
	elseif ($_FILES['file_att9']['type']=="application/vnd.ms-excel") {
		$file_attType9="xls";
	}
	else {
		$file_attType9="";
	}
	$name_array =  explode(".",$_FILES['file_att9']['name']);
	$name = $name_array[0];
	$file_att_name_new9="[i".time()."].$file_attType9";
	if (copy($_FILES['file_att9']['tmp_name'],"$file_att_path/$file_att_name_new9")) {

	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	# Unlink file_att from Temp
	unlink ($_FILES['file_att9']['tmp_name']); 
	$file_att9="$file_att_name_new9";
	$file_att_size9 = $_FILES['file_att9']['size'];
	$file_att_type9 = $_FILES['file_att9']['type'];
}
else {
	if ($file_att_name9=="") {
		print "ไม่มีไฟล์แนบ <br>\n";
	}
	elseif (!ereg("^image",$file_att_type9) || !ereg("application/msword",$file_att_type9) || !ereg("application/pdf",$file_att_type9) || !ereg("application/x-zip-compressed",$file_att_type9) || !ereg("application/octet-stream",$file_att_type9)  || !ereg("application/application/vnd.ms-powerpoint",$file_att_type9)  || !ereg("application/vnd.ms-excel",$file_att_type9)) {
		print "ไม่ใช่ไฟล์ชนิดที่จะอัพโหลดได้<br>\n";
	}
	else {
		print "ขนาดไฟล์ใหญ่เกินไป Kb<br>\n";
	}
	$file_att9="";
}
# End Upload file_att
?>


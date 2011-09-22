<?php

if ($_FILES['n_file']['name'] !=none) {
	$file_att_path ="./file_data"; //ชื่อโพลเดอร์ที่จะอัพไว้

	if ($_FILES['n_file']['type']=="image/gif") {
		$file_attType1="gif";
	}
	elseif (($_FILES['n_file']['type']=="image/pjpeg") || ($_FILES['n_file']['type']=="image/jpeg")) { // IE & Firefox
		$file_attType1="jpg";
	}
	elseif ($_FILES['n_file']['type']=="image/x-png") {
		$file_attType1="png";
	}
	elseif ($_FILES['n_file']['type']=="image/bmp") {
		$file_attType1="bmp";
	}
	elseif ($_FILES['n_file']['type']=="application/msword") {
		$file_attType1="doc";
	}
	elseif ($_FILES['n_file']['type']=="application/pdf") {
		$file_attType1="pdf";
	}
	elseif ($_FILES['n_file']['type']=="application/x-zip-compressed") {
		$file_attType1="zip";
	}
	elseif ($_FILES['n_file']['type']=="application/octet-stream") {
		$file_attType1="rar";
	}
	elseif ($_FILES['n_file']['type']=="application/vnd.ms-powerpoint") {
		$file_attType1="ppt";
	}
	elseif ($_FILES['n_file']['type']=="application/vnd.ms-excel") {
		$file_attType1="xls";
	}
	else {
		$file_attType1="";
	}
	$name_array =  explode(".",$_FILES['n_file']['name']);
	$name = $name_array[0];
	$file_att_name_new1="[a".time()."].$file_attType1";
	if (copy($_FILES['n_file']['tmp_name'],"$file_att_path/$file_att_name_new1")) {
	}
	else {
		print "ไม่สามารถแทรกไฟล์ได้ <br>\n";
	}
	unlink ($_FILES['n_file']['tmp_name']); 
	$n_file="$file_att_name_new1";
	$file_att_size1 = $_FILES['n_file']['size'];
	$file_att_type1 = $_FILES['n_file']['type'];
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
	$n_file="";
}
?>
<?
?>

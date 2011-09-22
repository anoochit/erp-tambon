<?
$host="localhost"; // Hostname
$rootadmin="root"; // DB User
$rootpassword=""; // DB Passwd
$dbname="sipa_e-documentary"; // DB Name
$site="ระบบงานสารบรรณสำหรับองค์กรปกครองส่วนท้องถิ่น";

$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
mysql_query("SET NAMES 'tis620' ");

function date_format_th($dmy){ // ฟังก์ชั่นแปลงวันที่ เป็นวันที่รูปแบบ วัน/เดือน/ปี
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("-",$dmy);
	$dmy = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
	return($dmy);
} 
function date_format_sql($dmy){  //ฟังก์ชั่นแปลงวันที่ เป็นวันที่รูปแบบ Sql  0000-00-00
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("/",$dmy);
	$dmy = (trim($dmyarr[2])."-".trim($dmyarr[1])."-".(trim($dmyarr[0]) ));
	return($dmy);
}
function find_num($file_id){ //ฟังก์ชั่นหาจำนวนเอกสาร
	$sql1 ="select * from send_doc where file_id = '$file_id'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_receive($u_id){ //ฟังก์ชั่นหาจำนวนเอกสารที่ยังไม่ได้ลงรับ
	$sql1 ="select * from send_doc where send_id = '$u_id' and  status ='ยังไม่ได้ลงรับ' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_stamp($u_id){ //ฟังก์ชั่นหาจำนวนเอกสารรออนุมัติ
	$sql1 ="select * from send_doc where send_id = 0 and  status ='รออนุมัติ' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function count_stamp(){ //ฟังก์ชั่นหาจำนวนเอกสารอนุมติแล้ว
	$sql1 ="select * from send_doc where  status = 'อนุมัติแล้ว'  and s_status ='0' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_end($u_id){ //ฟังก์ชั่นหาจำนวนเอกสารอนุมติแล้ว
	$sql1 ="select * from send_doc where send_id = '$u_id' and  status like '%กำลังดำเนินการ%' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function d_name($dep_id){  // ฟังก์ชั่นหาชื่อผู้ใช้
	$sql1 ="select * from user_account where user_id = $dep_id ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	if(strstr($rs["firsname"],"หัวหน้า") ==true){
		return substr($rs["firsname"],7);
	}else{
		return $rs["firsname"];
	}
}
function dep_name($dep_id){ // ฟังก์ชั่นหาชื่อกองของผู้ใช้
	$sql1 ="select * from user_account where user_id = $dep_id ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs["dep_id"];
}
function find_depart($dep_id){ // ฟังก์ชั่นหาเลขที่ผู้ใช้
	$sql1 ="select * from user_account where dep_id = '$dep_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[user_id];
}
function find_depart_name($user_id){ // ฟังก์ชั่นหากองผู้ใช้
	$sql1 ="select * from user_account where user_id = '$user_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[dep_id];
}
function find_status($file_id){ // ฟังก์ชั่นหาสถานะเอกสาร
	$sql1 ="select * from send_doc where file_id = '$file_id'";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[status].",".$rs[stamp_date];
} 
function find_dep_name($dep_id){ // ฟังก์ชั่นหาชื่อกอง
	$sql1 ="select * from department where dep_id = '$dep_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[dep_name];
} 
function find_dep_name1($dep_id){ // ฟังก์ชั่นหาชื่อกอง
	$sql1 ="select * from department where dep_id = '$dep_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[dep_name];
}
function find_cat_name1($cat_id){ // ฟังก์ชั่นหาชื่อหมวด
	$sql1 ="select * from catagory where cat_id = '$cat_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[cat_name];
}
function date_time($date) // ฟังก์ชั่นแปลงวันที่เป็นวันที่ไทย
{
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth($date_n[1])."".($date_n[0]+'543');
	return $d_date;
}
function date_time2($date) // ฟังก์ชั่นแปลงวันที่เป็นวันที่ไทย
{
	$date_n = explode("/",$date);
	$d_date =  $date_n[0]." ".mounth($date_n[1])." ".($date_n[2]+'543');
	return $d_date;
}
function mounth($ddate)// ฟังก์ชั่นหาชื่อย่อเดือนแบบไทย
{
	if($ddate == '1')
	{
		$printmonth = "ม.ค.";
	}
	if($ddate == '2')
	{
		$printmonth = "ก.พ.";
	}
	if($ddate == '3')
	{
		$printmonth = "มี.ค.";
	}
	if($ddate == '4')
	{
		$printmonth = "เม.ย.";
	}
	if($ddate == '5')
	{
		$printmonth = "พ.ค.";
	}
	if($ddate == '6')
	{
		$printmonth = "มิ.ย.";
	}
	if($ddate == '7')
	{
		$printmonth = "ก.ค.";
	}
	if($ddate == '8')
	{
		$printmonth = "ส.ค.";
	}
	if($ddate == '9')
	{
		$printmonth = "ก.ย.";
	}
	if($ddate == '10')
	{
		$printmonth = "ต.ค.";
	}
	if($ddate == '11')
	{
		$printmonth = "พ.ย.";
	}
	if($ddate == '12')
	{
		$printmonth = "ธ.ค.";
	}
	return $printmonth;
}

?>
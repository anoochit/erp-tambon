
<?
$host="localhost"; 
$rootadmin="root"; // DB User
$rootpassword=""; // DB Passwd
$dbname="sipa_mis"; // DB Name

$site = 'ระบบงานบุคลากรสำหรับองค์กรปกครองส่วนท้องถิ่น';

$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
mysql_query("SET NAMES 'tis620' ");



function date_2($date1){  // แปลงวันที่เป็นภาษาไทย
	$date_n = explode("-",$date1);
	$ex = substr($date_n[2],0,1);
	if($ex =='0') $day = substr($date_n[2],1);
	else $day = $date_n[2];
	$d_date =  $day." ".thai_month1($date_n[1])." ".($date_n[0]+'543');
	return $d_date;
}
function date_format_th_1($date)  // แปลงวันที่เป็นภาษาไทย
{
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth2($date_n[1])."  ".($date_n[0]+'543');
	return $d_date;
}
function date_format_sql($dmy){  // แปลงวันที่เป็น format Sql
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("/",$dmy);
	$dmy = (trim($dmyarr[2])."-".trim($dmyarr[1])."-".(trim($dmyarr[0]) ));
	return($dmy);
}
function mounth2($ddate) // หาเดือนเป็นชื่อภาษาไทย
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
function date_format_th($dmy){ // แปลงวันที่ เป็นรูปแบบ 00/00/0000
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("-",$dmy);
	$dmy = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
	return($dmy);
}
function find_edu($id){  // หาชื่อการศึกษา
	$sql1 ="select *  from ps_edu_ref where ps_edu_id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['ps_edu_item'];
}

function find_la($id){ //หาประเภทการลา
	$sql1 ="select *  from ps_latype where ps_latype_id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['ps_latype_item'];
}
function find_div_name1($div_id){ // หาชื่อกอง
	$sql1 ="select * from division where div_id = '$div_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['div_name'];
}
function find_sub_name1($sub_id){ // หาชื่อฝ่าย
	$sql1 ="select * from subdivision where sub_id = '$sub_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['sub_name'];
}

function find_cat_name($cat_id){
	$sql1 ="select * from category where cat_id = '$cat_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['cat_name'];
}
function find_type_name($cat_id){
	$sql1 ="select * from type where type_id = '$cat_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['type_name'];
}
function find_medal_name($m_id){
	$sql1 ="select *  from ps_medal_ref  where  ps_medid  ='$m_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['ps_meditem'];
}
function find_wrong_name($l_id){
	$sql1 ="select *  from ps_wrong_ref  where  ps_wrong_id  ='$l_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['ps_writem'];
}

function thai_month1($ddate)
{
	if($ddate == '01')
	{
		$printmonth = "มกราคม";
	}
	if($ddate == '02')
	{
		$printmonth = "กุมภาพันธ์";
	}
	if($ddate == '03')
	{
		$printmonth = "มีนาคม";
	}
	if($ddate == '04')
	{
		$printmonth = "เมษายน";
	}
	if($ddate == '05')
	{
		$printmonth = "พฤษภาคม";
	}
	if($ddate == '06')
	{
		$printmonth = "มิถุนายน";
	}
	if($ddate == '07')
	{
		$printmonth = "กรกฎาคม";
	}
	if($ddate == '08')
	{
		$printmonth = "สิงหาคม";
	}
	if($ddate == '09')
	{
		$printmonth = "กันยายน";
	}
	if($ddate == '10')
	{
		$printmonth = "ตุลาคม";
	}
	if($ddate == '11')
	{
		$printmonth = "พฤศจิกายน";
	}
	if($ddate == '12')
	{
		$printmonth = "ธันวาคม";
	}
	return $printmonth;
}
?>

<?
$host="localhost"; // Hostname
$rootadmin="root"; // DB User
$rootpassword=""; // DB Passwd
$dbname="sipa_store"; // DB Name
$site = 'ระบบคลังวัสดุภัณฑ์สำหรับองค์กรปกครองส่วนท้องถิ่น';

$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
mysql_query("SET NAMES 'tis620' ");

function date_2($date1){ // แปลงเป็นวันที่ไทย
	$date_n = explode("-",$date1);
	$ex = substr($date_n[2],0,1);
	if($ex =='0') $day = substr($date_n[2],1);
	else $day = $date_n[2];
	$d_date =  $day." ".mounth2($date_n[1])." ".($date_n[0]+'543');
	return $d_date;
}
function date_format_th_1($date) // แปลงเป็นวันที่ไทย
{
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth2($date_n[1])."  ".($date_n[0]+'543');
	return $d_date;
}
function date_format_sql($dmy){ // แปลงวันที่เป็น format sql
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("/",$dmy);
	$dmy = (trim($dmyarr[2])."-".trim($dmyarr[1])."-".(trim($dmyarr[0]) ));
	return($dmy);
}
function mounth2($ddate) // หาชื่อเดือนถาษาไทย
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
function date_format_th($dmy){ // หาวันที่เป็นรูปแบบ 00/00/0000
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("-",$dmy);
	$dmy = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
	return($dmy);
}

function find_type($id){ // หาชื่อประเภทพัสดุ
	$sql1 ="select * from type where t_id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['p_type'];
}
function check_product($product){ // หาจำนวนพัสดุ
	$sql1 ="select  *  from product where pro_name =  '$product'  and status = 0 ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[amount];
}
function check_product_m($p_id){ // หาจำนวนพัสดุ
	$sql1 ="select  *  from product where pro_name =  '$p_id'   and status =0 ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[amount];
}
function code_1($r_id){ // หารายการรับพัสดุ
		$sql = "Select rd.*,p.pro_name,rd.unit from receive_detail rd
		left outer join product p on  p.p_id = rd.p_id
		 where rd.r_id ='$r_id' ";
		$result = mysql_query($sql); 
		$code ="";
		while($recn=mysql_fetch_array($result)){
			$code .= "&nbsp;&nbsp;<font color=red>".$recn[pro_name]. "</font> &nbsp;&nbsp;จำนวน&nbsp;&nbsp;". $recn[amount]. "&nbsp;&nbsp;".$recn[unit]."<br>";
		}
		return $code;
}

function code_2($p_id){ // หารายการเบิกพัสดุ
		$sql = "Select pd.*,p.pro_name,pd.unit from pay_detail pd
		left outer join product p on  p.p_id = pd.product_id
		 where pd.p_id ='$p_id' ";
		$result = mysql_query($sql); 
		$code ="";
		while($recn=mysql_fetch_array($result)){
			$code .= "&nbsp;&nbsp;<font color=red>".$recn[pro_name]. "</font> &nbsp;&nbsp;จำนวน&nbsp;&nbsp;". $recn[amount]. "&nbsp;&nbsp;".$recn[unit]."<br>";
		}
		return $code;
}
function find_div_name($div_id){ //หาชื่อกอง
	$sql1 ="select * from division where div_id = '$div_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['div_name'];
}
?>
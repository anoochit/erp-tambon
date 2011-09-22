<?
function date_format_th_1($date)
{
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth2($date_n[1])."  ".($date_n[0]+'543');
	return $d_date;
}
function date_format_th_2($date)
{
	$date_n = explode("/",$date);
	$d_date =  $date_n[0]." ".mounth2($date_n[1])."  ".($date_n[2]+'543');
	return $d_date;
}
function date_2($date1){
	$date_n = explode("-",$date1);
	$ex = substr($date_n[2],0,1);
	if($ex =='0') $day = substr($date_n[2],1);
	else $day = $date_n[2];
	$d_date =  $day." ".mounth2($date_n[1])." ".($date_n[0]+'543');
	return $d_date;
}
function mounth2($ddate)
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
function date_format_th($dmy){
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("-",$dmy);
	$dmy = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
	return($dmy);
}
function date_format_th2($dmy){
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth2($date_n[1])."  ".($date_n[0]+'543');
	return $d_date;
}
function date_format_sql($dmy){
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("/",$dmy);
	$dmy = (trim($dmyarr[2])."-".trim($dmyarr[1])."-".(trim($dmyarr[0]) ));
	return($dmy);
}
function find($m){
	$num = array("0","1","2","3","4","5","6","7","8","9");
	for($i=0;$i<count($num);$i++){
		if($num[$i]==$m)  {
			$m1 = $m;
		}elseif($num[$i] != $m  ){
		$m1 =  0;
		}
	}
return $m1;
}
function find_user_u($username){
	$sql1 ="select * from passwd where pwd_username= '$username' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
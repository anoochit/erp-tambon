
<?
$host="localhost"; 
$rootadmin="root"; // DB User
$rootpassword=""; // DB Passwd
$dbname="sipa_mis"; // DB Name

$site = '�к��ҹ�ؤ�ҡ�����Ѻͧ��û���ͧ��ǹ��ͧ���';

$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
mysql_query("SET NAMES 'tis620' ");



function date_2($date1){  // �ŧ�ѹ�����������
	$date_n = explode("-",$date1);
	$ex = substr($date_n[2],0,1);
	if($ex =='0') $day = substr($date_n[2],1);
	else $day = $date_n[2];
	$d_date =  $day." ".thai_month1($date_n[1])." ".($date_n[0]+'543');
	return $d_date;
}
function date_format_th_1($date)  // �ŧ�ѹ�����������
{
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth2($date_n[1])."  ".($date_n[0]+'543');
	return $d_date;
}
function date_format_sql($dmy){  // �ŧ�ѹ����� format Sql
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("/",$dmy);
	$dmy = (trim($dmyarr[2])."-".trim($dmyarr[1])."-".(trim($dmyarr[0]) ));
	return($dmy);
}
function mounth2($ddate) // ����͹�繪���������
{
	if($ddate == '1')
	{
		$printmonth = "�.�.";
	}
	if($ddate == '2')
	{
		$printmonth = "�.�.";
	}
	if($ddate == '3')
	{
		$printmonth = "��.�.";
	}
	if($ddate == '4')
	{
		$printmonth = "��.�.";
	}
	if($ddate == '5')
	{
		$printmonth = "�.�.";
	}
	if($ddate == '6')
	{
		$printmonth = "��.�.";
	}
	if($ddate == '7')
	{
		$printmonth = "�.�.";
	}
	if($ddate == '8')
	{
		$printmonth = "�.�.";
	}
	if($ddate == '9')
	{
		$printmonth = "�.�.";
	}
	if($ddate == '10')
	{
		$printmonth = "�.�.";
	}
	if($ddate == '11')
	{
		$printmonth = "�.�.";
	}
	if($ddate == '12')
	{
		$printmonth = "�.�.";
	}
	return $printmonth;
}
function date_format_th($dmy){ // �ŧ�ѹ��� ���ٻẺ 00/00/0000
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("-",$dmy);
	$dmy = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
	return($dmy);
}
function find_edu($id){  // �Ҫ��͡���֡��
	$sql1 ="select *  from ps_edu_ref where ps_edu_id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['ps_edu_item'];
}

function find_la($id){ //�һ����������
	$sql1 ="select *  from ps_latype where ps_latype_id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['ps_latype_item'];
}
function find_div_name1($div_id){ // �Ҫ��ͧ͡
	$sql1 ="select * from division where div_id = '$div_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['div_name'];
}
function find_sub_name1($sub_id){ // �Ҫ��ͽ���
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
		$printmonth = "���Ҥ�";
	}
	if($ddate == '02')
	{
		$printmonth = "����Ҿѹ��";
	}
	if($ddate == '03')
	{
		$printmonth = "�չҤ�";
	}
	if($ddate == '04')
	{
		$printmonth = "����¹";
	}
	if($ddate == '05')
	{
		$printmonth = "����Ҥ�";
	}
	if($ddate == '06')
	{
		$printmonth = "�Զع�¹";
	}
	if($ddate == '07')
	{
		$printmonth = "�á�Ҥ�";
	}
	if($ddate == '08')
	{
		$printmonth = "�ԧ�Ҥ�";
	}
	if($ddate == '09')
	{
		$printmonth = "�ѹ��¹";
	}
	if($ddate == '10')
	{
		$printmonth = "���Ҥ�";
	}
	if($ddate == '11')
	{
		$printmonth = "��Ȩԡ�¹";
	}
	if($ddate == '12')
	{
		$printmonth = "�ѹ�Ҥ�";
	}
	return $printmonth;
}
?>
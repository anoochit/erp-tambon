<?
$host="localhost"; // Hostname
$rootadmin="root"; // DB User
$rootpassword=""; // DB Passwd
$dbname="sipa_e-documentary"; // DB Name
$site="�к��ҹ��ú�ó����Ѻͧ��û���ͧ��ǹ��ͧ���";

$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
mysql_query("SET NAMES 'tis620' ");

function date_format_th($dmy){ // �ѧ�����ŧ�ѹ��� ���ѹ����ٻẺ �ѹ/��͹/��
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("-",$dmy);
	$dmy = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
	return($dmy);
} 
function date_format_sql($dmy){  //�ѧ�����ŧ�ѹ��� ���ѹ����ٻẺ Sql  0000-00-00
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("/",$dmy);
	$dmy = (trim($dmyarr[2])."-".trim($dmyarr[1])."-".(trim($dmyarr[0]) ));
	return($dmy);
}
function find_num($file_id){ //�ѧ�����Ҩӹǹ�͡���
	$sql1 ="select * from send_doc where file_id = '$file_id'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_receive($u_id){ //�ѧ�����Ҩӹǹ�͡��÷���ѧ�����ŧ�Ѻ
	$sql1 ="select * from send_doc where send_id = '$u_id' and  status ='�ѧ�����ŧ�Ѻ' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_stamp($u_id){ //�ѧ�����Ҩӹǹ�͡�����͹��ѵ�
	$sql1 ="select * from send_doc where send_id = 0 and  status ='��͹��ѵ�' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function count_stamp(){ //�ѧ�����Ҩӹǹ�͡���͹��������
	$sql1 ="select * from send_doc where  status = '͹��ѵ�����'  and s_status ='0' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_end($u_id){ //�ѧ�����Ҩӹǹ�͡���͹��������
	$sql1 ="select * from send_doc where send_id = '$u_id' and  status like '%���ѧ���Թ���%' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function d_name($dep_id){  // �ѧ�����Ҫ��ͼ����
	$sql1 ="select * from user_account where user_id = $dep_id ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	if(strstr($rs["firsname"],"���˹��") ==true){
		return substr($rs["firsname"],7);
	}else{
		return $rs["firsname"];
	}
}
function dep_name($dep_id){ // �ѧ�����Ҫ��ͧ͡�ͧ�����
	$sql1 ="select * from user_account where user_id = $dep_id ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs["dep_id"];
}
function find_depart($dep_id){ // �ѧ�������Ţ�������
	$sql1 ="select * from user_account where dep_id = '$dep_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[user_id];
}
function find_depart_name($user_id){ // �ѧ�����ҡͧ�����
	$sql1 ="select * from user_account where user_id = '$user_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[dep_id];
}
function find_status($file_id){ // �ѧ������ʶҹ��͡���
	$sql1 ="select * from send_doc where file_id = '$file_id'";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[status].",".$rs[stamp_date];
} 
function find_dep_name($dep_id){ // �ѧ�����Ҫ��ͧ͡
	$sql1 ="select * from department where dep_id = '$dep_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[dep_name];
} 
function find_dep_name1($dep_id){ // �ѧ�����Ҫ��ͧ͡
	$sql1 ="select * from department where dep_id = '$dep_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[dep_name];
}
function find_cat_name1($cat_id){ // �ѧ�����Ҫ�����Ǵ
	$sql1 ="select * from catagory where cat_id = '$cat_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[cat_name];
}
function date_time($date) // �ѧ�����ŧ�ѹ������ѹ�����
{
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth($date_n[1])."".($date_n[0]+'543');
	return $d_date;
}
function date_time2($date) // �ѧ�����ŧ�ѹ������ѹ�����
{
	$date_n = explode("/",$date);
	$d_date =  $date_n[0]." ".mounth($date_n[1])." ".($date_n[2]+'543');
	return $d_date;
}
function mounth($ddate)// �ѧ�����Ҫ��������͹Ẻ��
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

?>
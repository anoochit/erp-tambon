
<?
$host="localhost"; // Hostname
$rootadmin="root"; // DB User
$rootpassword=""; // DB Passwd
$dbname="sipa_store"; // DB Name
$site = '�к���ѧ��ʴ��ѳ������Ѻͧ��û���ͧ��ǹ��ͧ���';

$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
mysql_query("SET NAMES 'tis620' ");

function date_2($date1){ // �ŧ���ѹ�����
	$date_n = explode("-",$date1);
	$ex = substr($date_n[2],0,1);
	if($ex =='0') $day = substr($date_n[2],1);
	else $day = $date_n[2];
	$d_date =  $day." ".mounth2($date_n[1])." ".($date_n[0]+'543');
	return $d_date;
}
function date_format_th_1($date) // �ŧ���ѹ�����
{
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth2($date_n[1])."  ".($date_n[0]+'543');
	return $d_date;
}
function date_format_sql($dmy){ // �ŧ�ѹ����� format sql
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("/",$dmy);
	$dmy = (trim($dmyarr[2])."-".trim($dmyarr[1])."-".(trim($dmyarr[0]) ));
	return($dmy);
}
function mounth2($ddate) // �Ҫ�����͹������
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
function date_format_th($dmy){ // ���ѹ������ٻẺ 00/00/0000
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("-",$dmy);
	$dmy = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
	return($dmy);
}

function find_type($id){ // �Ҫ��ͻ�������ʴ�
	$sql1 ="select * from type where t_id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['p_type'];
}
function check_product($product){ // �Ҩӹǹ��ʴ�
	$sql1 ="select  *  from product where pro_name =  '$product'  and status = 0 ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[amount];
}
function check_product_m($p_id){ // �Ҩӹǹ��ʴ�
	$sql1 ="select  *  from product where pro_name =  '$p_id'   and status =0 ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[amount];
}
function code_1($r_id){ // ����¡���Ѻ��ʴ�
		$sql = "Select rd.*,p.pro_name,rd.unit from receive_detail rd
		left outer join product p on  p.p_id = rd.p_id
		 where rd.r_id ='$r_id' ";
		$result = mysql_query($sql); 
		$code ="";
		while($recn=mysql_fetch_array($result)){
			$code .= "&nbsp;&nbsp;<font color=red>".$recn[pro_name]. "</font> &nbsp;&nbsp;�ӹǹ&nbsp;&nbsp;". $recn[amount]. "&nbsp;&nbsp;".$recn[unit]."<br>";
		}
		return $code;
}

function code_2($p_id){ // ����¡���ԡ��ʴ�
		$sql = "Select pd.*,p.pro_name,pd.unit from pay_detail pd
		left outer join product p on  p.p_id = pd.product_id
		 where pd.p_id ='$p_id' ";
		$result = mysql_query($sql); 
		$code ="";
		while($recn=mysql_fetch_array($result)){
			$code .= "&nbsp;&nbsp;<font color=red>".$recn[pro_name]. "</font> &nbsp;&nbsp;�ӹǹ&nbsp;&nbsp;". $recn[amount]. "&nbsp;&nbsp;".$recn[unit]."<br>";
		}
		return $code;
}
function find_div_name($div_id){ //�Ҫ��ͧ͡
	$sql1 ="select * from division where div_id = '$div_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['div_name'];
}
?>
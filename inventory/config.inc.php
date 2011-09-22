
<?
$host="localhost"; // Hostname
$rootadmin="root"; // DB User
$rootpassword=""; // DB Passwd
$dbname="sipa_inven"; // DB Name

$site ='ระบบงานครุภัณฑ์สำหรับองค์กรปกครองส่วนท้องถิ่น';

$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
mysql_query("SET NAMES 'tis620' ");


function date_2($date1){
	$date_n = explode("-",$date1);
	$ex = substr($date_n[2],0,1);
	if($ex =='0') $day = substr($date_n[2],1);
	else $day = $date_n[2];
	$d_date =  $day." ".mounth2($date_n[1])." ".($date_n[0]+'543');
	return $d_date;
}
function date_format_th_1($date)
{
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
function mounth_2($ddate)
{
	if($ddate == '01') $printmonth = "ม.ค.";
	if($ddate == '02') $printmonth = "ก.พ.";
	if($ddate == '03') $printmonth = "มี.ค.";
	if($ddate == '04') $printmonth = "เม.ย.";
	if($ddate == '05') $printmonth = "พ.ค.";
	if($ddate == '06') $printmonth = "มิ.ย.";
	if($ddate == '07') $printmonth = "ก.ค.";
	if($ddate == '08') $printmonth = "ส.ค.";
	if($ddate == '09') $printmonth = "ก.ย.";
	if($ddate == '10') $printmonth = "ต.ค.";
	if($ddate == '11') $printmonth = "พ.ย.";
	if($ddate == '12') $printmonth = "ธ.ค.";
	return $printmonth;
}

function date_format_th($dmy){
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("-",$dmy);
	$dmy = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
	return($dmy);
}
function shop_id($id){
	$sql1 ="select *  from shop where id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['pre_shop_name']."  ".$rs['shop_name']."  ที่อยู่ ".$rs['shop_address'];
}
function shop_id2($id){
	$sql1 ="select *  from shop where id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['shop_name']."<br> ".$rs['shop_address'];
}
function shop_name($id){
	$sql1 ="select *  from shop where id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['shop_name'];
}
function shop_addr($id){
	$sql1 ="select *  from shop where id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['shop_address'] ." &nbsp;&nbsp;โทรศัพท์ &nbsp;&nbsp;".$rs['tel'];
}
function shop_show($id){
	$sql1 ="select *  from shop where id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	$dd =  $rs['shop_name'] ."<br>".$rs['shop_address'];
	if($rs['tel'] <>'') $dd .=" &nbsp;Tel.&nbsp; ".$rs['tel'];
	return $dd;
	
}
function code_1($r_id){
		$sql = "Select * from receive_detail  where r_id ='$r_id' ";
		$result = mysql_query($sql); 
		$code ="";
		while($recn=mysql_fetch_array($result)){
			$code .= $recn[rd_name]. " &nbsp;&nbsp; ".code($recn[rd_id])."<br>";
		}
		return $code;
}

function code_3($r_id){
		$sql = "Select * from receive_detail  where r_id ='$r_id' ";
		$result = mysql_query($sql); 
		$code ="";
		while($recn=mysql_fetch_array($result)){
			$code .= $recn[rd_name]. " &nbsp;&nbsp; ".code($recn[rd_id])."<br>";
		}
		return $code;
}

function code($rd_id){
		$sql = "Select max(code) as max,min(code)  as min from code   where rd_id ='$rd_id' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		if($recn["max"] == $recn["min"]){
			return $recn["max"];
		}else{
			$s = explode("-",$recn["max"]);
			return $recn["min"] ."  ถึง ". $s[3];
		}
}

function find_code($o_id,$rd_id){
		$sql = "Select max(code) as max,min(code)  as min from code   where o_id ='$o_id' and rd_id = '$rd_id' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		if($recn["max"] == $recn["min"]){
			return $recn["max"];
		}else{
			$s = explode("-",$recn["max"]);
			return $recn["min"] ."  ถึง ". $s[3];
		}
}

function find_code_open($rd_id){
	$sql = "SELECT * FROM code Where rd_id = '$rd_id'   ";
	$result = mysql_query($sql);
	$j = 0;
	while($rs=mysql_fetch_array($result)){
		if($rs[o_id]<> "0" and $rs[o_id]<> "") $j++;
	}
	if($j <=0) return "true";
	else return "false" ;
}
function find_sum_code($rd_id){
	$sql = "SELECT * FROM code Where rd_id = '$rd_id'   ";
	$result = mysql_query($sql);
	$j = 0;
	while($rs=mysql_fetch_array($result)){
		if($rs[o_id]<> "0" and $rs[o_id]<> "") $j++;
	}
	 return $j;

}
function find_code_open_all($r_id){
	$sql = "SELECT c.* FROM code c,receive r,receive_detail rd 
	Where  c.rd_id = rd.rd_id
	and r.r_id = rd.r_id
	and r.r_id = '$r_id'   ";
	$result = mysql_query($sql);
	$j = 0;
	while($rs=mysql_fetch_array($result)){
		if($rs[o_id]<> "0" and $rs[o_id]<> "") $j++;
	}
	if($j <=0) return "true";
	else return "false" ;
}
function room($r_id){
	$sql1 ="select *  from section s,room r where s.s_id = r.s_id and r.r_id = '$r_id' group by r.r_id ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['sec_name']."  ห้อง  ".$rs['room']."/".$rs['room_name'];
}

function room_1($r_id){
	$sql1 ="select *  from section s,room r where s.s_id = r.s_id and r.r_id = '$r_id' group by r.r_id ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['sec_name']."  ห้อง  ".$rs['room']."/<br>".$rs['room_name'];
}
function room_2($r_id){
	$sql1 ="select *  from section s,room r where s.s_id = r.s_id and r.r_id = '$r_id' group by r.r_id ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['sec_name']."*".$rs['room']."/".$rs['room_name'];
}
function find_code_full($rd_id){
	$sql = "SELECT * FROM code Where rd_id = '$rd_id'   ";
	$result = mysql_query($sql);
	$j = 0;
	$i=0;
	while($rs=mysql_fetch_array($result)){
		$i++;
		if($rs[o_id]<> "0" and $rs[o_id]<> "") $j++;
	}
	if($j == $i) return "true";
	else return "false" ;
}

function fild_detail_open($o_id){
	$sql1 ="select  *  from open where o_id =  '$o_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[open_date]."^".$rs[div_id]."^".$rs[sub_id]."^".$rs[name_head]."^".$rs[detail];

}

function fild_type($t_id){
	$sql1 ="select  *  from type where t_id =  '$t_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[type_name];
}

function fild_time($t_id){
	$sql1 ="select  *  from type where t_id =  '$t_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[time_use]."^".$rs[degen];
}
function fild_code_detail($c_id){
	$sql1 = "SELECT  rd.*,c.* from receive_detail rd,code c  WHERE  c.rd_id = rd.rd_id 
	and c_id = '$c_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return " &nbsp;&nbsp;รายการ&nbsp;&nbsp;".$rs[rd_name]." &nbsp;&nbsp;เลขครุภัณฑ์ &nbsp;&nbsp;".$rs[code];

}
	function code_open_all($o_id,$rd_id){
	$sql = "SELECT c.* FROM code c,receive_detail rd 
	Where  c.rd_id = rd.rd_id
	and rd.rd_id = '$rd_id' 
	and c.o_id = $o_id  ";
	$result = mysql_query($sql);
	$i = 0;
	while($rs=mysql_fetch_array($result)){
		if($i%5==0 and $i <>0) $br ="<br>";
		else $br="";
			if($i ==0 ) {
					$str .= $rs[code];
			}else {
					$dd= explode("-",$rs[code]);
					$str .= ",".$dd[3].$br; 
			}

		 	$i++;
	}
	 return  $str;
}

function max_time($c_id){
	$sql = "SELECT max(time) as max FROM  service  where c_id = $c_id";
	$result = mysql_query($sql);
	$j = 0;
	$rs=mysql_fetch_array($result);
	if($rs["max"] =='' or $rs["max"] =='0' ) $max = 1;
	else  $max = $rs["max"] +1;
	 return $max ;
}
function find_div($div_id){
	$sql1 ="select * from division where div_id = '$div_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['div_name'];
}
function find_sub($sub_id){
	$sql1 ="select * from subdivision where sub_id = '$sub_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['sub_name'];
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

function find_div_name($div_id){
	$sql1 ="select * from division where div_id = '$div_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['div_name'];
}
?>
<?php
?>
<?
$host="localhost"; // Hostname
$rootadmin="root"; // DB User
$rootpassword="444253"; // DB Passwd
$dbname="sipa_water"; // DB Name
$site ='ระบบงานประปาสำหรับองค์กรปกครองส่วนท้องถิ่น ';
$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
mysql_query("SET NAMES 'tis620' ");
?><?
function date_format_th_1($date) // การแปลงวันที่เป็นวันที่ไทย
{
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth2($date_n[1])."  ".($date_n[0]+'543');
	return $d_date;
}
function date_format_th_2($date) // การแปลงวันที่เป็นวันที่ไทย
{
	$date_n = explode("/",$date);
	$d_date =  $date_n[0]." ".mounth2($date_n[1])."  ".($date_n[2]+'543');
	return $d_date;
}
function date_2($date1){ // การแปลงวันที่เป็นวันที่ไทย
	$date_n = explode("-",$date1);
	$ex = substr($date_n[2],0,1);
	if($ex =='0') $day = substr($date_n[2],1);
	else $day = $date_n[2];
	$d_date =  $day." ".mounth2($date_n[1])." ".($date_n[0]+'543');
	return $d_date;
}
function mounth2($ddate) // การแปลงเดือนเป็นเดือนไทยแบบย่อ
{
	if($ddate == '1') $printmonth = "ม.ค.";
	if($ddate == '2')$printmonth = "ก.พ.";
	if($ddate == '3')$printmonth = "มี.ค.";
	if($ddate == '4')$printmonth = "เม.ย.";
	if($ddate == '5')$printmonth = "พ.ค.";
	if($ddate == '6')$printmonth = "มิ.ย.";
	if($ddate == '7')$printmonth = "ก.ค.";
	if($ddate == '8')$printmonth = "ส.ค.";
	if($ddate == '9')$printmonth = "ก.ย.";
	if($ddate == '10')$printmonth = "ต.ค.";
	if($ddate == '11')$printmonth = "พ.ย.";
	if($ddate == '12')$printmonth = "ธ.ค.";
	return $printmonth;
}
function mounth3($ddate) {  // การแปลงเดือนเป็นเดือนไทย
	if($ddate== '01')  $ddate = "มกราคม";
	if($ddate== '02')$ddate = "กุมภาพันธ์";
	if($ddate== '03')$ddate = "มีนาคม";
	if($ddate== '04')$ddate = "เมษายน";
	if($ddate== '05')$ddate = "พฤษภาคม";
	if($ddate== '06')$ddate = "มิถุนายน";
	if($ddate== '07')$ddate = "กรกฎาคม";
	if($ddate== '08')$ddate = "สิงหาคม";
	if($ddate== '09')$ddate = "กันยายน";
	if($ddate== '10')$ddate = "ตุลาคม";
	if($ddate== '11')$ddate = "พฤศจิกายน";
	if($ddate== '12') $ddate = "ธันวาคม";
	return $ddate;
}
function date_format_th($dmy){  // การแปลงวันที่เป็นรูปแบบ ดด/วว/ปปปป
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("-",$dmy);
	$dmy = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
	return($dmy);
}
function date_format_th2($dmy){ // การแปลงวันที่เป็นวันที่ไทย
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth2($date_n[1])."  ".($date_n[0]+'543');
	return $d_date;
}
function date_format_sql($dmy){ // การแปลงวันที่เป็นรูปแบบ sql
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("/",$dmy);
	$dmy = (trim($dmyarr[2])."-".trim($dmyarr[1])."-".(trim($dmyarr[0]) ));
	return($dmy);
}
function find($m){ // การหาค่าบวกเพิ่มขึ้น
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
function find_user_u($username){ // การหาชื่อผู้ใช้
	$sql1 ="select * from passwd where pwd_username= '$username' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_edit_user($username , $username_old){  // การหาชื่อผู้ใช้เพื่อแก้ไข
	$sql1 ="select * from passwd where username != '$username_old'  and  username = '$username'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_mooban($honame , $hocode){  // การหาจำนวนจำนวนหมู่บ้าน
	$sql1 ="select * from house where honame = '$honame' or hocode='$hocode' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_edit_mooban($hocode,$honame ,$hocode_old,$honame_old){ //การหาชื่อหมู่บ้านเพื่อทำการแก้ไข
	$sql1 ="select * from house where (honame = '$honame' or hocode = '$hocode' ) and (honame != '$honame_old' and hocode != '$hocode_old') ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_trname($trname){ //การหาประเภทค่าเช่ามาตร
	$sql1 ="select * from type_rece where trname = '$trname' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_sname($sname){ // การหาค่าเช่ามาตร
	$sql1 ="select * from service1 where sname = '$sname' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_edit_type($trcode,$trname){ //การหาประเภทค่าเช่ามาตรเพื่อแก้ไข
	$sql1 ="select * from type_rece where TRNAME = '$trname' and  TRCODE !='$trcode'  ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_edit_service($scode,$sname){ // การหาค่าเช่ามาตรเพื่อแก้ไข
	$sql1 ="select * from service1 where sname = '$sname' and  scode !='$scode'  ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_tmname($tmname){ //การหาประเภทผู้ขอใช้บริการ
	$sql1 ="select * from type_mem where tmname = '$tmname' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_tmcode($tmcode){ //  การหาค่าหน่วยน้ำ
	$sql1 ="select * from rate_water where tmcode = '$tmcode' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_edit_typemem($tmcode,$tmname){ // การหาประเภทผู้ขอใช้น้ำเพื่อแก้ไข
	$sql1 ="select * from type_mem where TMNAME = '$tmname' and  TMCODE !='$tmcode'  ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function MONEY(){  // หาค่าหน่วยน้ำ
	$sql1 ="select * from start ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[money];
}
function VAT(){ // หาค่าภาษี
	$sql1 ="select * from start ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[VAT];
}
function S_Min(){ //ค่าน้ำ 0 หน่วย 
	$sql1 ="select * from start ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[mins];
}
 function num_to_char($num) // คิดจำนวนเงินเป็นตัวหนังสือ
 {
  $digit=Array("หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ด","แปด","เก้า");
  $unit=Array("สิบ","ร้อย","พัน","หมื่น","แสน");

  if($num==0)
   return "ศูนย์บาทถ้วน";
  if(strpos($num,".")==0)
   $num.=".00";
  $tmp=substr($num,0,strpos($num,"."));
  while(strlen($tmp)>6)
  {
   $cut=strlen($tmp)%6;
   if($cut==0)$cut=6;
   $data=substr($tmp,0,$cut);
   for($i=0;$i<strlen($data)-2;$i++)
   {
    if($data[$i]==0)
     continue;
    $ans.=$digit[$data[$i]-1].$unit[strlen($data)-$i-2];
   }
   $ans.=num2string_2digit(substr($data,strlen($data)-2))."ล้าน";
   $tmp=substr($tmp,$cut);
  }
  for($i=0;$i<strlen($tmp)-2;$i++)
  {
   if($tmp[$i]==0)
    continue;
   $ans.=$digit[$tmp[$i]-1].$unit[strlen($tmp)-$i-2];
  }
  $ans.=num2string_2digit(substr($tmp,strlen($tmp)-2))."บาท";

  $tmp=substr($num,strpos($num,".")+1);
  if(substr($tmp,0,2)=="00")
   return $ans."ถ้วน";

  return $ans.num2string_2digit($tmp)."สตางค์";
 }
 function num2string_2digit($number){   // คิดจำนวนเงินเป็นตัวหนังสือ
					$txtnum1 =  array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');  
					$txtnum2 =  
					array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');  
					$number = str_replace(",","",$number);  
					$number = str_replace(" ","",$number);  
					$number = str_replace("บาท","",$number);  
					$number = explode(".",$number);  
					if(sizeof($number)>2){  
					return 'ทศนิยมหลายตัวนะจ๊ะ';  
					exit;  
					}  
					$strlen = strlen($number[0]);  
					$convert = '';  
					for($i=0;$i<$strlen;$i++){  
					$n = substr($number[0], $i,1);  
					if($n!=0){  
					if($i==($strlen-1) AND $n==1){ $convert .=  'เอ็ด'; }  
					elseif($i==($strlen-2) AND $n==2){  
					$convert .= 'ยี่'; }  
					elseif($i==($strlen-2) AND $n==1){  
					$convert .= ''; }  
					else{ $convert .= $txtnum1[$n]; }  
					$convert .= $txtnum2[$strlen-$i-1];  
					}  
					}  
					$convert .= 'บาท';  
					if($number[1]=='0' OR $number[1]=='00' OR  $number[1]==''){  
					$convert .= 'ถ้วน';  
					}else{  
					$strlen = strlen($number[1]);  
					for($i=0;$i<$strlen;$i++){  
					$n = substr($number[1], $i,1);  
					if($n!=0){  
					if($i==($strlen-1) AND $n==1){$convert .= 'เอ็ด';}  
					elseif($i==($strlen-2) AND  
					$n==2){$convert .= 'ยี่';}  
					elseif($i==($strlen-2) AND  
					$n==1){$convert .= '';}  
					else{ $convert .= $txtnum1[$n];}  
					$convert .= $txtnum2[$strlen-$i-1];  
					}  
					}  
					$convert .= 'สตางค์';  
					}  
					return $convert;  
}  
function check_member($mem_id , $name , $surn ){ // หาเลขที่สมาชิก
	$sql1 ="select * from member where mem_id = '$mem_id'  and name = '$name' and surn = '$surn' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[mem_id];
}
function check_member_1($pren , $name , $surn ){ // หาเลขที่สมาชิก
		$sql1 ="select * from member where pren = '$pren'  and name = '$name' and surn = '$surn' ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[mem_id];
}
function check_start_name( ){ // หาชื่อหน่วยงาน
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[NAME];
}
function honame($hocode){ // หาชื่อหมู่บ้าน
		$sql1 ="select * from house where hocode = '$hocode' ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[HOCODE]."-".$rs[HONAME];
}
function check_start_address( ){ // หาที่อยู่หน่วยงาน
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		$mas =  "";
		if($rs[TUMBOL] <>'') $mas .=  " ".$rs[TUMBOL];
		if($rs[AMPHER] <>'') $mas .=  " ".$rs[AMPHER];
		if($rs[PROVINCE] <>'') $mas .=  " จังหวัด".$rs[PROVINCE];
		return $mas;
}
function check_start_address_mem( ){ // หาที่อยู่หน่วยงาน
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		$mas =  "";
		if($rs[TUMBOL] <>'') $mas .=  " ".$rs[TUMBOL];
		if($rs[AMPHER] <>'') $mas .=  " ".$rs[AMPHER];
		if($rs[PROVINCE] <>'') $mas .=  " จังหวัด".$rs[PROVINCE];
		return $mas;
}
function check_start_hposition( ){ // หาชื่อตำแหน่งผู้ตรวจสอบข้อมูล
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[h_position];
}
function min_hocode( ){ //หาเลขรหัสหมู่บ้าน
		$query  ="select  min(hocode) as mini from house   ";
		$result = mysql_query($query);
		$rs = mysql_fetch_array($result);
		return $rs[mini];
}
function min_z_id( ){ // หาเลขรหัสโซน
		$query  ="select  min(z_id) as mini from zone  where hocode ='".min_hocode()."' ";
		$result = mysql_query($query);
		$rs = mysql_fetch_array($result);
		return $rs[mini];
}
function max_mem_id(){ //หาเลขที่สมาชิกใหม่
	$sql1 =" SELECT max(mem_id) as max  FROM member ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	if($rs[max]=='' or $rs[max] == NULL){
			$mem_id = 1;
	}else{
			$mem_id = $rs[max] + 1;
	}
			return $mem_id;
}
function check_zone($hocode , $z_name ){  //หาชื่อเขต 
	$sql1 ="select * from zone where  hocode = '$hocode' and z_name = '$z_name' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_edit_zone($hocode, $z_id ,$z_name){ //หาชื่อเขต เพื่อแก้ไข
	$sql1 ="select * from zone where  z_name = '$z_name'  and hocode = '$hocode' and z_id != '$z_id'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function max_hocode1(){ // หารหัสหมู่บ้าน
	$sql1 ="SELECT max(hocode) as house FROM zone   ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[max];
}

function zone_name($hocode,$z_id){ // หาชื่อเขต 
	$sql1 ="SELECT *  FROM zone    where hocode = '$hocode'  and  z_id = '$z_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[z_name];
}
function MYEAR(){ // หาปีงบประมาณ
	$sql1 ="select * from start ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[MYEAR];
}
function head_klung( ){ // หาชื่อหัวหน้าส่วนการคลัง
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[head_klung];
} 
function tax( ){ // หาเลขที่ผู้เสียภาษี
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[tax];
} 
function receive_name( ){  //หาชื่อพนักงานเก็บเงิน
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[receive_name];
} 
function find__zone_name($hocode , $z_id){ //  หาชื่อเขต 
	$sql1 ="select * from zone where HOCODE = '$hocode'  and  z_id = '$z_id'";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[z_name];
}

function rate_water($hocode){ // หาเรตการใช้น้ำ
	$sql1 ="select * from rate_water where moo1= '$hocode' order by tmcode";
	$result = mysql_query($sql1);
	$i = 0;
	$ss = "";
	while($rs = mysql_fetch_array($result)){
		$ss .= $rs[AMT]."*";
	}
	return $ss;
}
function rent(){ //ค่าน้ำ 0 หน่วย 
	$sql1 ="select * from start ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[rent];
}
?>
<?
$host="localhost"; // Hostname
$rootadmin="root"; // DB User
$rootpassword="444253"; // DB Passwd
$dbname="sipa_water"; // DB Name
$site ='�к��ҹ��л�����Ѻͧ��û���ͧ��ǹ��ͧ��� ';
$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
mysql_query("SET NAMES 'tis620' ");
?><?
function date_format_th_1($date) // ����ŧ�ѹ������ѹ�����
{
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth2($date_n[1])."  ".($date_n[0]+'543');
	return $d_date;
}
function date_format_th_2($date) // ����ŧ�ѹ������ѹ�����
{
	$date_n = explode("/",$date);
	$d_date =  $date_n[0]." ".mounth2($date_n[1])."  ".($date_n[2]+'543');
	return $d_date;
}
function date_2($date1){ // ����ŧ�ѹ������ѹ�����
	$date_n = explode("-",$date1);
	$ex = substr($date_n[2],0,1);
	if($ex =='0') $day = substr($date_n[2],1);
	else $day = $date_n[2];
	$d_date =  $day." ".mounth2($date_n[1])." ".($date_n[0]+'543');
	return $d_date;
}
function mounth2($ddate) // ����ŧ��͹����͹��Ẻ���
{
	if($ddate == '1') $printmonth = "�.�.";
	if($ddate == '2')$printmonth = "�.�.";
	if($ddate == '3')$printmonth = "��.�.";
	if($ddate == '4')$printmonth = "��.�.";
	if($ddate == '5')$printmonth = "�.�.";
	if($ddate == '6')$printmonth = "��.�.";
	if($ddate == '7')$printmonth = "�.�.";
	if($ddate == '8')$printmonth = "�.�.";
	if($ddate == '9')$printmonth = "�.�.";
	if($ddate == '10')$printmonth = "�.�.";
	if($ddate == '11')$printmonth = "�.�.";
	if($ddate == '12')$printmonth = "�.�.";
	return $printmonth;
}
function mounth3($ddate) {  // ����ŧ��͹����͹��
	if($ddate== '01')  $ddate = "���Ҥ�";
	if($ddate== '02')$ddate = "����Ҿѹ��";
	if($ddate== '03')$ddate = "�չҤ�";
	if($ddate== '04')$ddate = "����¹";
	if($ddate== '05')$ddate = "����Ҥ�";
	if($ddate== '06')$ddate = "�Զع�¹";
	if($ddate== '07')$ddate = "�á�Ҥ�";
	if($ddate== '08')$ddate = "�ԧ�Ҥ�";
	if($ddate== '09')$ddate = "�ѹ��¹";
	if($ddate== '10')$ddate = "���Ҥ�";
	if($ddate== '11')$ddate = "��Ȩԡ�¹";
	if($ddate== '12') $ddate = "�ѹ�Ҥ�";
	return $ddate;
}
function date_format_th($dmy){  // ����ŧ�ѹ������ٻẺ ��/��/����
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("-",$dmy);
	$dmy = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
	return($dmy);
}
function date_format_th2($dmy){ // ����ŧ�ѹ������ѹ�����
	$date_n = explode("-",$date);
	$d_date =  $date_n[2]." ".mounth2($date_n[1])."  ".($date_n[0]+'543');
	return $d_date;
}
function date_format_sql($dmy){ // ����ŧ�ѹ������ٻẺ sql
	$dmyarr = array();
	$dmy = substr($dmy,0,10);
	$dmyarr = explode("/",$dmy);
	$dmy = (trim($dmyarr[2])."-".trim($dmyarr[1])."-".(trim($dmyarr[0]) ));
	return($dmy);
}
function find($m){ // ����Ҥ�Һǡ�������
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
function find_user_u($username){ // ����Ҫ��ͼ����
	$sql1 ="select * from passwd where pwd_username= '$username' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_edit_user($username , $username_old){  // ����Ҫ��ͼ�����������
	$sql1 ="select * from passwd where username != '$username_old'  and  username = '$username'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_mooban($honame , $hocode){  // ����Ҩӹǹ�ӹǹ�����ҹ
	$sql1 ="select * from house where honame = '$honame' or hocode='$hocode' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_edit_mooban($hocode,$honame ,$hocode_old,$honame_old){ //����Ҫ��������ҹ���ͷӡ�����
	$sql1 ="select * from house where (honame = '$honame' or hocode = '$hocode' ) and (honame != '$honame_old' and hocode != '$hocode_old') ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_trname($trname){ //����һ������������ҵ�
	$sql1 ="select * from type_rece where trname = '$trname' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_sname($sname){ // ����Ҥ������ҵ�
	$sql1 ="select * from service1 where sname = '$sname' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_edit_type($trcode,$trname){ //����һ������������ҵ��������
	$sql1 ="select * from type_rece where TRNAME = '$trname' and  TRCODE !='$trcode'  ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_edit_service($scode,$sname){ // ����Ҥ������ҵ��������
	$sql1 ="select * from service1 where sname = '$sname' and  scode !='$scode'  ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_tmname($tmname){ //����һ������������ԡ��
	$sql1 ="select * from type_mem where tmname = '$tmname' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_tmcode($tmcode){ //  ����Ҥ��˹��¹��
	$sql1 ="select * from rate_water where tmcode = '$tmcode' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_edit_typemem($tmcode,$tmname){ // ����һ��������������������
	$sql1 ="select * from type_mem where TMNAME = '$tmname' and  TMCODE !='$tmcode'  ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function MONEY(){  // �Ҥ��˹��¹��
	$sql1 ="select * from start ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[money];
}
function VAT(){ // �Ҥ������
	$sql1 ="select * from start ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[VAT];
}
function S_Min(){ //��ҹ�� 0 ˹��� 
	$sql1 ="select * from start ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[mins];
}
 function num_to_char($num) // �Դ�ӹǹ�Թ�繵��˹ѧ���
 {
  $digit=Array("˹��","�ͧ","���","���","���","ˡ","��","Ỵ","���");
  $unit=Array("�Ժ","����","�ѹ","����","�ʹ");

  if($num==0)
   return "�ٹ��ҷ��ǹ";
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
   $ans.=num2string_2digit(substr($data,strlen($data)-2))."��ҹ";
   $tmp=substr($tmp,$cut);
  }
  for($i=0;$i<strlen($tmp)-2;$i++)
  {
   if($tmp[$i]==0)
    continue;
   $ans.=$digit[$tmp[$i]-1].$unit[strlen($tmp)-$i-2];
  }
  $ans.=num2string_2digit(substr($tmp,strlen($tmp)-2))."�ҷ";

  $tmp=substr($num,strpos($num,".")+1);
  if(substr($tmp,0,2)=="00")
   return $ans."��ǹ";

  return $ans.num2string_2digit($tmp)."ʵҧ��";
 }
 function num2string_2digit($number){   // �Դ�ӹǹ�Թ�繵��˹ѧ���
					$txtnum1 =  array('�ٹ��','˹��','�ͧ','���','���','���','ˡ','��','Ỵ','���','�Ժ');  
					$txtnum2 =  
					array('','�Ժ','����','�ѹ','����','�ʹ','��ҹ');  
					$number = str_replace(",","",$number);  
					$number = str_replace(" ","",$number);  
					$number = str_replace("�ҷ","",$number);  
					$number = explode(".",$number);  
					if(sizeof($number)>2){  
					return '�ȹ������µ�ǹШ��';  
					exit;  
					}  
					$strlen = strlen($number[0]);  
					$convert = '';  
					for($i=0;$i<$strlen;$i++){  
					$n = substr($number[0], $i,1);  
					if($n!=0){  
					if($i==($strlen-1) AND $n==1){ $convert .=  '���'; }  
					elseif($i==($strlen-2) AND $n==2){  
					$convert .= '���'; }  
					elseif($i==($strlen-2) AND $n==1){  
					$convert .= ''; }  
					else{ $convert .= $txtnum1[$n]; }  
					$convert .= $txtnum2[$strlen-$i-1];  
					}  
					}  
					$convert .= '�ҷ';  
					if($number[1]=='0' OR $number[1]=='00' OR  $number[1]==''){  
					$convert .= '��ǹ';  
					}else{  
					$strlen = strlen($number[1]);  
					for($i=0;$i<$strlen;$i++){  
					$n = substr($number[1], $i,1);  
					if($n!=0){  
					if($i==($strlen-1) AND $n==1){$convert .= '���';}  
					elseif($i==($strlen-2) AND  
					$n==2){$convert .= '���';}  
					elseif($i==($strlen-2) AND  
					$n==1){$convert .= '';}  
					else{ $convert .= $txtnum1[$n];}  
					$convert .= $txtnum2[$strlen-$i-1];  
					}  
					}  
					$convert .= 'ʵҧ��';  
					}  
					return $convert;  
}  
function check_member($mem_id , $name , $surn ){ // ���Ţ�����Ҫԡ
	$sql1 ="select * from member where mem_id = '$mem_id'  and name = '$name' and surn = '$surn' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[mem_id];
}
function check_member_1($pren , $name , $surn ){ // ���Ţ�����Ҫԡ
		$sql1 ="select * from member where pren = '$pren'  and name = '$name' and surn = '$surn' ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[mem_id];
}
function check_start_name( ){ // �Ҫ���˹��§ҹ
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[NAME];
}
function honame($hocode){ // �Ҫ��������ҹ
		$sql1 ="select * from house where hocode = '$hocode' ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[HOCODE]."-".$rs[HONAME];
}
function check_start_address( ){ // �ҷ������˹��§ҹ
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		$mas =  "";
		if($rs[TUMBOL] <>'') $mas .=  " ".$rs[TUMBOL];
		if($rs[AMPHER] <>'') $mas .=  " ".$rs[AMPHER];
		if($rs[PROVINCE] <>'') $mas .=  " �ѧ��Ѵ".$rs[PROVINCE];
		return $mas;
}
function check_start_address_mem( ){ // �ҷ������˹��§ҹ
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		$mas =  "";
		if($rs[TUMBOL] <>'') $mas .=  " ".$rs[TUMBOL];
		if($rs[AMPHER] <>'') $mas .=  " ".$rs[AMPHER];
		if($rs[PROVINCE] <>'') $mas .=  " �ѧ��Ѵ".$rs[PROVINCE];
		return $mas;
}
function check_start_hposition( ){ // �Ҫ��͵��˹觼���Ǩ�ͺ������
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[h_position];
}
function min_hocode( ){ //���Ţ���������ҹ
		$query  ="select  min(hocode) as mini from house   ";
		$result = mysql_query($query);
		$rs = mysql_fetch_array($result);
		return $rs[mini];
}
function min_z_id( ){ // ���Ţ����⫹
		$query  ="select  min(z_id) as mini from zone  where hocode ='".min_hocode()."' ";
		$result = mysql_query($query);
		$rs = mysql_fetch_array($result);
		return $rs[mini];
}
function max_mem_id(){ //���Ţ�����Ҫԡ����
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
function check_zone($hocode , $z_name ){  //�Ҫ���ࢵ 
	$sql1 ="select * from zone where  hocode = '$hocode' and z_name = '$z_name' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_edit_zone($hocode, $z_id ,$z_name){ //�Ҫ���ࢵ �������
	$sql1 ="select * from zone where  z_name = '$z_name'  and hocode = '$hocode' and z_id != '$z_id'";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function max_hocode1(){ // �����������ҹ
	$sql1 ="SELECT max(hocode) as house FROM zone   ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[max];
}

function zone_name($hocode,$z_id){ // �Ҫ���ࢵ 
	$sql1 ="SELECT *  FROM zone    where hocode = '$hocode'  and  z_id = '$z_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[z_name];
}
function MYEAR(){ // �һէ�����ҳ
	$sql1 ="select * from start ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[MYEAR];
}
function head_klung( ){ // �Ҫ������˹����ǹ��ä�ѧ
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[head_klung];
} 
function tax( ){ // ���Ţ�������������
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[tax];
} 
function receive_name( ){  //�Ҫ��;�ѡ�ҹ���Թ
		$sql1 ="select * from start  ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[receive_name];
} 
function find__zone_name($hocode , $z_id){ //  �Ҫ���ࢵ 
	$sql1 ="select * from zone where HOCODE = '$hocode'  and  z_id = '$z_id'";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[z_name];
}

function rate_water($hocode){ // ���õ�������
	$sql1 ="select * from rate_water where moo1= '$hocode' order by tmcode";
	$result = mysql_query($sql1);
	$i = 0;
	$ss = "";
	while($rs = mysql_fetch_array($result)){
		$ss .= $rs[AMT]."*";
	}
	return $ss;
}
function rent(){ //��ҹ�� 0 ˹��� 
	$sql1 ="select * from start ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[rent];
}
?>
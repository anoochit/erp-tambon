<?
include("config.inc.php");
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename="testing.csv"'); 
?>
<? 
	echo "  ,,,,,,����¹";
	if($cat ==1) echo "�ѧ�������Ѿ��";
	else echo "��ѧ�������Ѿ�� ";
	echo "\n,,,,,,".fild_type($t_id) ."\n\n"; 
	echo " �ӴѺ��� , ������ , �Ţ��� / ���� ,  ������ ��Դ Ẻ ��Ҵ  , �ѹ��͹�� ���������Է��� ,  �����Ţ��з���¹, ˹��¹Ѻ ,�Ҥҵ��˹��� (�ҷ),  �Ըա�����ҫ�觡����Է���,  �Ţ����͡��� ,  ���Шӷ�� , ��¡������¹�ŧ ,  �Ţ��� ,  �����˵� \n\n"; 
$sql="SELECT  r.* ,rd.*,c.*,m.* , c.c_id as c_id1  from receive r
left outer join receive_detail rd on  r.r_id = rd.r_id 
left outer join code c on  c.rd_id = rd.rd_id
left outer join move m on  c.m_id = m.m_id
left outer join type t on  t.t_id = rd.type_id
WHERE 1 = 1   ";
if($num_id  <> '' )$sql .= " AND r.num_id like '$num_id%'  ";
if($paper_id  <> '' )$sql .= " AND r.paper_id like '$paper_id%'  ";
if($rd_name <> '' )$sql .= " AND rd.rd_name like '$rd_name%'  ";
if($t_id <> '' )$sql .= " AND rd.type_id = '$t_id'  ";
if($cat <> '' )$sql .= " AND t.type_id = '$cat'  ";
if($code1 <> '' )$sql .= " AND c.code like '$code1%'  ";
if($date_receive <> '')$sql .= " AND r.date_receive = '".date_format_sql($date_receive)."'  ";
if($year <> '' )$sql .= " AND r.paper_id like'%-".substr($year,2)."%' ";

$sql .= " order by abs(r.paper_id) desc ";
		$result=mysql_query($sql);
		$i = 0;
		$total_price = 0;
		$num_row = mysql_num_rows($result);
		while($rs =mysql_fetch_array($result)){
				$i++;
				$total_price = $total_price + $rs[price];
				echo $i.",";
				echo $rs[rd_name].",".$rs[code].","; 
			  if($rs[type] ==0  and $rs[brand_name] <>'')  {echo $rs[brand_name]." / ". $rs[type_name]; }
  			 elseif($rs[type] ==1  and $rs[brand_name] <>'')   { echo $rs[brand_name]; }
				echo ",".date_2($rs["date_receive"]).",-,";
				if($rs[unit]<> '') echo $rs[unit];
				else echo " ";
				echo ",".$rs[price].",";		
				if($rs["come_in"] =='0')echo '�����' ;
				else if($rs["come_in"] =='1')echo '�ش˹ع' ;
				else if($rs["come_in"] =='2')echo '��ԨҤ' ;
				else if($rs["come_in"] =='3')echo '�Թ���' ;
				else if($rs["come_in"] =='4')echo '����' ;
				else "&nbsp;";
				echo ",,";
				  if($rs[type] ==0) echo $rs[user];
   				else  echo $rs[garan_at];
				echo ",,,\n";	
		 } 
		 echo "\n,,,,,,��������� ,$total_price,\n";	
 
 ?>
 
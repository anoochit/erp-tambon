<? ob_start();?>
<?
include("config.inc.php");
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename="testing.csv"'); 
?>
<? echo " ,,,,,,,,,����¹��ѧ�������Ѿ�� \n ,,,,,,,,,,�ͧ$site  ,\n\n";  

	echo "�ӴѺ���,������,�Ţ��� / ����,������ ��Դ Ẻ ��Ҵ,�ѹ��͹�� ���������Է��� ,�����Ţ��з���¹,�Ҥҵ��˹��� (�ҷ),�Ըա������ ��觡����Է���,���Ш�,��¡������¹�ŧ,�Ţ-���,�����˵� ,\n\n"; 

$sql="SELECT  r.* ,rd.*,t.type_name,t.t_id,rd.type_name as type_name1  from (receive r , receive_detail rd )

left outer join type t on  t.t_id = rd.type_id
WHERE 1 = 1   and  r.r_id = rd.r_id   ";
	$sql .= " AND r.type = 1 ";
if($num_id  <> '' ){
	$sql .= " AND r.num_id like '$num_id%'  ";
}
if($paper_id  <> '' ){
	$sql .= " AND r.paper_id like '$paper_id%'  ";
}
if($rd_name <> '' ){
	$sql .= " AND rd.rd_name like '$rd_name%'  ";
}
if($t_id <> '' ){
	$sql .= " AND rd.type_id = '$t_id'  ";
}
if($cat <> '' ){
	$sql .= " AND t.type_id = '$cat'  ";
}
if($code1 <> '' ){
	$sql .= " AND c.code like '$code1%'  ";
}
if($date_receive <> ''){
	$sql .= " AND r.date_receive = '".date_format_sql($date_receive)."'  ";
}
if($year <> '' ){
	$sql .= " AND r.paper_id like'%-".substr($year,2)."%' ";
}
$sql .= " order by  t.t_id asc, rd.rd_name desc";
		$result=mysql_query($sql);
		$i = 0;
		$j =1;
		$total_price = 0;
		$total_name = 0;
		$num_row = mysql_num_rows($result);
		while($rs =mysql_fetch_array($result)){
				$i++;
				
					$total_price = $total_price + $rs[price];

	if(($rs[t_id]<> $tId_old) and $i !=1  ){
			echo  "\n,,,,,����Թ, ".$total_name.",�ҷ\n"	;
			$total_name = 0;
			$j = 1;
	}

	if(($rs[t_id]<> $tId_old ) and $i !=1){
		echo  "".$rs[type_name]."\n"	;
	}elseif($i ==1){
		echo  "".$rs[type_name]."\n"	;
	 }
				echo $j.",".$rs[rd_name] .",,";
				   if($rs[type] ==0  and $rs[brand_name] <>'') {
   					echo $rs[brand_name]." / ". $rs[type_name1];
 				  }elseif($rs[type] ==1  and $rs[brand_name] <>'')   {
   					echo $rs[brand_name];
 				  }
				 if($rs[date_receive] <>'' and  $rs[date_receive] <>'0000-00-00') echo ",".date_2($rs[date_receive]) ;else echo ","; 
				 echo ",-".",".$rs[price].",";
				if($rs["come_in"] =='0')echo '�����'."," ;
				else if($rs["come_in"] =='1')echo '�ش˹ع'."," ;
				else if($rs["come_in"] =='2')echo '��ԨҤ'."," ;
				else if($rs["come_in"] =='3')echo '�Թ���'."," ;
				else if($rs["come_in"] =='4')echo '����'."," ;
				 if($rs[type] ==0) {echo $rs[user]."," ;} else { echo $rs[garan_at]."," ;}
				echo $rs[list_edit].",,".$rs[remark];
				
		$tId_old = $rs[t_id] ;
		 if(($rs[t_id] == $tId_old) or $i ==1){
				$j++;
				$total_name = $total_name + $rs[price];		
		}
		
		if( $i == $num_row){
				echo "\n,,,,,����Թ, ".$total_name.",�ҷ";
		}

		echo "\n";
}
	echo "\n\n,,,,,����Թ������,".$total_price .",�ҷ";
 ?>


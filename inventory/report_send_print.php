<? ob_start()?>
<?
include("config.inc.php");
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename="testing.csv"'); 
?>
<? 
	echo " ที่ , ชื่อผู้ได้รับการจัดสรร , รหัสครุภัณฑ์ ,  หมายเลขเครื่อง  , หมายเลขจอ ,  หมายเหตุ  \n\n"; 
	
		$sql="SELECT  mid(c.code,2,3) as code ,mid(c.code,6,2) as code1 ,mid(c.code,9,4) as code2 ,m.user,c.num_machine , c.screen , m.remark
		from (receive r ,code c)
		left outer join receive_detail rd on  r.r_id = rd.r_id 
		left outer join move m on  c.c_id = m.c_id
		WHERE 1 = 1  and c.rd_id = rd.rd_id ";
		if($num_id  <> '' ){
			$sql .= " AND r.num_id like '$num_id%'  ";
		}
		if($paper_id  <> '' ){
			$sql .= " AND r.paper_id like '$paper_id%'  ";
		}
		if($department <> '' ){
	$sql .= " AND m.department ='$department'  ";
}
		if($rd_name <> '' ){
			$sql .= " AND m.user like '%$rd_name%'  ";
		}
		if($type_id <> '' ){
			$sql .= " AND rd.type_id = '$type_id'  ";
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
		$sql .= " and r.type = 0 ";
		$sql .= " order by abs(r.paper_id) desc ";
		$result=mysql_query($sql);
		$i = 0;
		while($rs =mysql_fetch_array($result)){
				$i++;
				echo $i.",";
				echo $rs[user].",".$rs[code]."-".$rs[code1]."-".$rs[code2].",".$rs[num_machine].",";
				echo $rs[screen].",".$rs[remark].",\n";		

 }
 
 ?>
 
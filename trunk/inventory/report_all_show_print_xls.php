<? ob_start();?>
<?
include("config.inc.php");
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename="testing.csv"'); 
?>
<? echo " ,,,,,,,,,ทะเบียนสังหาริมทรัพย์ \n ,,,,,,,,,ของ$site  ,\n\n ".fild_type($t_id)."";  

	echo "ลำดับที่ ,ประเภทครุภัณฑ์ ,เลขที่ / รหัส,ยี่ห้อ ชนิด แบบ ขนาด,วันเดือนปี ที่ได้กรรมสิทธิ์,หมายเลขและทะเบียน,หน่วยนับ,จำนวนเงิน (บาท),วิธีการได้มา ซึ่งกรรมสิทธิ์,ผู้รับผิดชอบ,ใช้ประจำ,,สภาพ,,รายการ เปลี่ยนแปลง,เลข-ที่ ,หมายเหตุ ,\n\n"; 
	echo ",,,,,,,,,,,ดี ,พอใช้ ,ชำรุด,สิ้นสภาพ ,,,,\n";
	
		$sql="SELECT  r.* ,rd.*,c.*,m.* , c.c_id as c_id1,t.type_name,t.t_id,rd.type_name as type_name1 ,c.remark as remark1
 from (receive r , receive_detail rd , code c) 
left outer join move m on  c.c_id = m.c_id
left outer join type t on  t.t_id = rd.type_id
WHERE 1 = 1   and  r.r_id = rd.r_id  and c.rd_id = rd.rd_id ";
	$sql .= " AND r.type = 0  ";
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
$sql .= "  order by  t.t_id asc, rd.rd_name desc ";
		$result=mysql_query($sql);
		$i = 0;
		$j =1;
		$total_price = 0;
		$total_name = 0;
		$num_row = mysql_num_rows($result);
		while($rs =mysql_fetch_array($result)){
				$i++;
				
				$total_price = $total_price + $rs[price];
				$d = explode("-",$rs[code]);
				$code =  $d[0]."-".$d[1];
				if(($code<> $code_old) and $i !=1  ){
					 echo "\n,,,,,, รวมเงิน,".$total_name.",บาท\n\n";
					 	$total_name = 0;
						$j = 1;
				}	
				if(($rs[t_id]<> $tId_old ) and $i !=1){
					echo "\n".$rs[type_name]."\n\n";
				}elseif($i ==1){
					echo "\n".$rs[type_name]."\n\n";
				}
				echo $j.",".$rs[rd_name].",".$rs[code].",";
				if($rs[type] ==0  and $rs[brand_name] <>'') {
   					echo $rs[brand_name]." / ". $rs[type_name1];
   				}elseif($rs[type] ==1  and $rs[brand_name] <>'')   {
   					echo $rs[brand_name];
  				 }
				 if($rs[date_receive] <>'' and  $rs[date_receive] <>'0000-00-00') echo ",".date_2($rs[date_receive]) ;else echo ","; 
				 echo ",-".",".$rs[unit].",".$rs[price].",";
				if($rs["come_in"] =='0')echo 'รายได้'."," ;
				else if($rs["come_in"] =='1')echo 'อุดหนุน'."," ;
				else if($rs["come_in"] =='2')echo 'บริจาค'."," ;
				else if($rs["come_in"] =='3')echo 'เงินกู้'."," ;
				else if($rs["come_in"] =='4')echo 'อื่นๆ'."," ;
				echo  find_div_name($rs["department"]).",";
				 if($rs[type] ==0) echo $rs[user].",";
   				else  echo $rs[garan_at].",";
				 if($rs['status']==0) echo "/,";
				 if($rs['status']==1) echo "/,";
				 if($rs['status']==2) echo "/,";
				 if($rs['status']==3) echo "/,";
				echo $rs['list_edit'].",,".$rs['remark'].",";
			$tId_old = $rs[t_id] ;
			$code_old = $d[0]."-".$d[1];
			if(($code == $code_old) or $i ==1){
				$j++;
				$total_name = $total_name + $rs[price];		
		}
		if( $i == $num_row){
			echo "\n\n,,,,,,รวมเงิน,".$total_name.",บาท\n\n";
		}
		echo "\n";
}
	echo ",,,,,,รวมเงินทั้งหมด,".$total_price .",บาท\n";
 ?>


<?
include("config.inc.php");
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename="testing.csv"'); 
?>
<? echo "รายงานครุภัณฑ์  ,\n\n";  

	echo "NO.,วัน เดือนปี , ร้านค้า,  หมายเลขครุภัณฑ์ ,, รายการ,  จำนวน, หน่วยนับ ,ราคา ,กอง/ฝ่าย  ,ใบเบิก,สถานะ ,หมายเหตุ ,\n\n"; 
	
		$sql="SELECT * from receive r,receive_detail rd,code c 
		left outer join open o on c.o_id = o.o_id
 		WHERE 1 = 1 and r.r_id = rd.r_id and c.rd_id = rd.rd_id  ";
		if($div_id <> '' ) $sql .= " AND o.div_id = '$div_id'  ";
		if($sub_id <> '' ) $sql .= " AND o.sub_id = '$sub_id'  ";
		if($rd_name <> '' )$sql .= " AND rd.rd_name like '%$rd_name%'  ";
		if($code1 <> '' ) $sql .= " AND c.code like '%$code1%'  ";
		if($status <> '' )$sql .= " AND c.status = $status  ";
		if($open_date <> '' and $open_date1 <>'') $sql .= " AND o.open_date >= '".date_format_sql($open_date)."'
		 AND o.open_date <= '".	date_format_sql($open_date1)."'  ";
		if($type <> '' )$sql .= " AND rd.type_id = '$type'  ";
		$sql .= " order by c.code,rd.rd_name  ";
		$result=mysql_query($sql);
		$i = 0;
		$total_price = 0;
		$num_row = mysql_num_rows($result);
		while($rs =mysql_fetch_array($result)){
				$i++;
				$d = explode("-",$rs[code]);
				if(($d[0]."-".$d[1]."-".$d[2] <> $code_old) and $i !=1){
					 echo "\n,,,,,จำนวน,".$j.",รวมราคา,".$total_name.",บาท\n";
					$total_name = 0;
					$j = 0;
				}
				if(($d[0]."-".$d[1]."-".$d[2] <> $code_old) and $i !=1){
					echo "\n,,,".$rs[rd_name]."\n\n";
				}elseif($i ==1){
					echo "\n,,,".$rs[rd_name]."\n\n";
				}
				echo $i.",";
				if($rs[date_receive] <>'' and  $rs[date_receive] <>'0000-00-00') echo date_2($rs[date_receive]) ;else echo ""; 
				echo ",".shop_show_x($rs[shop_id]).",";
				$d = explode("-",$rs[code]);
				$total_price = $total_price + $rs[price];
				echo $d[0]."-".$d[1]."-".$d[2].",".$d[3];
				echo ",".$rs[rd_name].",1,".$rs[unit].",".$rs[price].",";
				if($rs["div_id"] <>'') echo find_div1($rs["div_id"]); else echo "";
				if($rs["sub_id"] <>'') echo "/".find_sub1($rs["sub_id"]); else echo "";
				echo ",";
				if($rs[num_id] <>'') echo $rs[num_id]." / ".$rs[paper_id]; 
				else echo "";
				if($rs[status]==1 ) echo ",รอจำหน่าย,";
				if($rs[status]==2 ) echo ",จำหน่ายแล้ว,";
				if($rs[status]==0 ) echo ",ใช้งานอยู่,";
				echo $rs[remark].",\n";
				
			$code_old = $d[0]."-".$d[1]."-".$d[2] ;
		 if(($d[0]."-".$d[1]."-".$d[2] == $code_old) or $i ==1){
				$j++;
				$total_name = $total_name + $rs[price];		
		}
		if( $i == $num_row){
			echo "\n,,,,,จำนวน,".$j.",รวมราคา,".$total_name.",บาท\n";		
		}
 } 
 echo "\n\n,,,,จำนวนทั้งหมด,".$i.",รวมราคา,".$total_price.",บาท";
  function find_div1($div_id){
	$sql1 ="select * from division where div_id = '$div_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['div_name'];
}
function find_sub1($sub_id){
	$sql1 ="select * from subdivision where sub_id = '$sub_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['sub_name'];
}
 function shop_show_x($id){
	$sql1 ="select *  from shop where id = '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	$dd =  $rs['shop_name'] ;
	return $dd;
	
}
?>
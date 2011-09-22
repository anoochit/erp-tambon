<?
ob_start();
include("config.inc.php");

header('Content-type: application/ms-word');
header('Content-Disposition: attachment; filename="testing.doc"'); 
?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
<!--
.style19 {font-size: 11; font-weight: bold; }
.style20 {font-size: 11;  }
-->
</style>
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr  class="style19">
      <td  height="40" colspan="18" style="border: #000000 1px solid;"><div  align="center"><br><font size="3">ทะเบียนสังหาริมทรัพย์<br>
	  ของ<?=$site?>
	  <br><? echo fild_type($t_id) ?><br></div></td>
          </tr>
  <tr class="style19"  >
        <td width="4%"  height="31" align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">ลำดับที่</span></td>
		<td width="9%"  height="31" align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">ประเภทครุภัณฑ์</span></td>
         <td width="5%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">เลขที่ / รหัส</span></td>
		  <td width="4%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">ยี่ห้อ ชนิด แบบ ขนาด</span></td>
	<td width="8%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">วันเดือนปี<br>
	  ที่ได้กรรมสิทธิ์</span></td> 
      <td width="7%" align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">หมายเลข<br>
        และทะเบียน</span></td>
	 <td width="5%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">หน่วยนับ</span></td> 
	<td width="6%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">จำนวนเงิน <br>
	  (บาท)</span></td> 
	<td width="7%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">วิธีการได้มา<br>
	  ซึ่งกรรมสิทธิ์</span></td> 
	<td width="7%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">ผู้รับผิดชอบ</span></td> 
	<td width="5%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">ใช้ประจำ</span></td> 
	<td  align="center" style="border: #000000 1px solid;" colspan="4"><span class="style19">สภาพ</span></td>
	<td width="7%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">รายการ<br>
	  เปลี่ยนแปลง</span></td> 
	<td width="3%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">เลข-ที่</span></td> 
    <td width="5%"  align="center" style="border: #000000 1px solid;" rowspan="2"><span class="style19">หมายเหตุ</span></td> 
  </tr>
		    <tr class="style19"  >
        <td width="2%"  height="31" align="center" style="border: #000000 1px solid;"><strong>ดี</strong></td>
		<td width="4%"  height="31" align="center" style="border: #000000 1px solid;"><strong>พอใช้</strong></td>
         <td width="3%"  align="center" style="border: #000000 1px solid;"><strong>ชำรุด</strong></td>
		  <td width="5%"  align="center" style="border: #000000 1px solid;"><strong>สิ้นสภาพ</strong></td>
          </tr>
<?
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

$result1 = mysql_query($sql);

$j =1;
$total_price = 0;
$total_name = 0;

$num_row = mysql_num_rows($result1);

while($rs=mysql_fetch_array($result1)){

	$i++;

	$total_price = $total_price + $rs[price];
	$d = explode("-",$rs[code]);
	$code =  $d[0]."-".$d[1];
?>   
<? 

if(($code<> $code_old) and $i !=1  ){
?>

<tr class="style19">
 <td   colspan="7" height="30" align="right" style="border: #000000 1px solid;"> 
 <strong>
 รวมเงิน&nbsp;&nbsp;</strong></td>
  <td  align="right" style="border: #000000 1px solid;"><?  echo number_format($total_name,2);	  ?>&nbsp;</td>
   <td   colspan="10" style="border: #000000 1px solid;">&nbsp;</td>
 </tr>
<?
		$total_name = 0;
		$j = 1;
	}
?>   
<?
if(($rs[t_id]<> $tId_old ) and $i !=1){
?>
		<tr >
				<td  height="30"   align="left" colspan="18" style="border: #000000 1px solid;">&nbsp;&nbsp;<font color="#FF0000"><strong><? echo $rs[type_name];  ?></strong>&nbsp;</td>
		</tr>
<?
	}elseif($i ==1){?>
	<tr >
<td  height="30"   align="left" colspan="18" style="border: #000000 1px solid;">&nbsp;&nbsp;<font color="#FF0000"><strong><? echo $rs[type_name];  ?></strong>&nbsp;</td>
</tr>
<? }?>


<tr class="style20" b>
 <td  height="25"  align="center" style="border: #000000 1px solid;">&nbsp;<? echo $j; ?></td>
  <td  height="25" align="left" style="border: #000000 1px solid;">&nbsp;<? echo $rs[rd_name] //fild_type($rs[type_id]); ?></td>
 <td  align="left" style="border: #000000 1px solid;">&nbsp;<? echo $rs[code];  ?></td>
   <td  align="left" style="border: #000000 1px solid;">&nbsp;<? 
   
   if($rs[type] ==0  and $rs[brand_name] <>'') {
   			echo $rs[brand_name]." / ". $rs[type_name1];
   }elseif($rs[type] ==1  and $rs[brand_name] <>'')   {
   			echo $rs[brand_name];
   }
 ?>  </td>
              <td  align="center" style="border: #000000 1px solid;">&nbsp;<?=date_2($rs["date_receive"])?></td>                                 
 <td  style="border: #000000 1px solid;">&nbsp;<?="-"?></td>
  <td   align="center" style="border: #000000 1px solid;">&nbsp;<?=$rs[unit]?></td>
    <td  align="right" style="border: #000000 1px solid;"><?  echo number_format($rs[price],2);	  ?>&nbsp;</td>
   <td   align="center" style="border: #000000 1px solid;">&nbsp;<? 
	if($rs["come_in"] =='0')echo 'รายได้' ;
	else if($rs["come_in"] =='1')echo 'อุดหนุน' ;
	else if($rs["come_in"] =='2')echo 'บริจาค' ;
	else if($rs["come_in"] =='3')echo 'เงินกู้' ;
	else if($rs["come_in"] =='4')echo 'อื่นๆ' ;
	?></td>
	   <td  style="border: #000000 1px solid;">&nbsp;<?= find_div_name($rs["department"])?></td>
	  <td  align="left"style="border: #000000 1px solid;">&nbsp;<?
   if($rs[type] ==0) echo $rs[user];
   else  echo $rs[garan_at];
?></td>
 		<td  style="border: #000000 1px solid;" align="center">&nbsp;<? if($rs['status']==0) echo "/"?></td>
 		<td  style="border: #000000 1px solid;" align="center">&nbsp;<? if($rs['status']==1) echo "/"?></td>
  		<td  style="border: #000000 1px solid;" align="center">&nbsp;<? if($rs['status']==2) echo "/"?></td>
  		<td  style="border: #000000 1px solid;" align="center">&nbsp;<? if($rs['status']==3) echo "/"?></td>
  		<td  style="border: #000000 1px solid;">&nbsp;<?  echo $rs['list_edit']?></td>
		<td  style="border: #000000 1px solid;">&nbsp;</td>
		<td  style="border: #000000 1px solid;">&nbsp;<?  echo $rs['remark']?></td>
  </tr>

<? 
	
 	$tId_old = $rs[t_id] ;
	$code_old = $d[0]."-".$d[1];
	 if(($code == $code_old) or $i ==1){
				$j++;
				$total_name = $total_name + $rs[price];		
		}
if( $i == $num_row){
	?>
	<tr class="style19">
 <td   colspan="7" height="30" align="right" style="border: #000000 1px solid;">  <strong>
 รวมเงิน&nbsp;&nbsp;</strong></td>
  <td  align="right" style="border: #000000 1px solid;"><?  echo number_format($total_name,2);	  ?>&nbsp;</td>
   <td   colspan="10" style="border: #000000 1px solid;">&nbsp;</td>
 </tr>
	<?
	}
	
	}
?>

		  <tr class="style19"bgcolor="<? echo $bg?>" >
 <td   colspan="7" height="30" align="right" style="border: #000000 1px solid;"> <strong>รวมเงินทั้งหมด&nbsp;&nbsp;</strong></td>
  <td  align="right" style="border: #000000 1px solid;"><?  echo number_format($total_price,2);	  ?>&nbsp;</td>
   <td   colspan="10" style="border: #000000 1px solid;">&nbsp;</td>
</tr>
        </table>

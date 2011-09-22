<?
ob_start();
include("config.inc.php");

header('Content-type: application/ms-word');
header('Content-Disposition: attachment; filename="testing.doc"'); 
?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
<!--
.style18 {font-family: "Angsana New"; font-size: 14; }
.style19 {font-family: "Angsana New"; font-size: 14; }
.style21 {font-family: "Angsana New"; font-size: 14; font-weight: bold; }
-->
</style>
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
      <td  height="40" colspan="12" style="border: #000000 1px solid;"><div  align="center"><br><font size="3">ทะเบียนอสังหาริมทรัพย์<br>
	  ของ<?=$site?>
	  <br><? echo fild_type($t_id) ?></font><br></div></td>
          </tr>
  <tr class="style19"  >
        <td width="6%"  height="31" align="center" style="border: #000000 1px solid;" ><span class="style21">ลำดับที่</span></td>
		<td width="11%"  height="31" align="center" style="border: #000000 1px solid;" ><span class="style21">ประเภท</span></td>
         <td width="6%"  align="center" style="border: #000000 1px solid;" ><span class="style21">เลขที่ / รหัส</span></td>
		  <td width="10%"  align="center" style="border: #000000 1px solid;" ><span class="style21">ยี่ห้อ ชนิด แบบ ขนาด</span></td>
	<td width="10%"  align="center" style="border: #000000 1px solid;" ><span class="style21">วันเดือนปี<br>
	  ที่ได้กรรมสิทธิ์</span></td> 
      <td width="9%" align="center" style="border: #000000 1px solid;" ><span class="style21">หมายเลข<br>
        และทะเบียน</span></td>
	<td width="10%"  align="center" style="border: #000000 1px solid;" ><span class="style21">ราคาต่อหน่วย <br>
	  (บาท)</span></td> 
	<td width="9%"  align="center" style="border: #000000 1px solid;" ><span class="style21">วิธีการได้มา<br>
	  ซึ่งกรรมสิทธิ์</span></td> 

	<td width="9%"  align="center" style="border: #000000 1px solid;" ><span class="style21">ใช้ประจำ</span></td> 
	<td width="9%"  align="center" style="border: #000000 1px solid;" ><span class="style21">รายการ<br>
	  เปลี่ยนแปลง</span></td> 
	<td width="4%"  align="center" style="border: #000000 1px solid;" ><span class="style21">เลข-ที่</span></td> 
    <td width="7%"  align="center" style="border: #000000 1px solid;" ><span class="style21">หมายเหตุ</span></td> 
  </tr>
		   
<?
$sql="SELECT  r.* ,rd.*,t.type_name,t.t_id,rd.type_name as type_name1  from (receive r , receive_detail rd) 

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

$j =1;
$total_price = 0;
$total_name = 0;
$result1 = mysql_query($sql);

$num_row = mysql_num_rows($result1);

while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif($i%2 ==1) $bg ='#ffffff';
	$total_price = $total_price + $rs[price];
?>   
<? 
if(($rs[t_id]<> $tId_old) and $i !=1  ){
?>

<tr class="style19"  >
 <td   colspan="6" height="30" align="right" style="border: #000000 1px solid;"> 
   <span class="style21">
รวมเงิน&nbsp;&nbsp;</span></td>
  <td  align="right" style="border: #000000 1px solid;"><span class="style21">
    <?  echo number_format($total_name,2);	  ?>
    &nbsp;</span></td>
   <td   colspan="5" style="border: #000000 1px solid;"><span class="style19"></span></td>
 </tr>
<?
		$total_name = 0;
		$j = 1;
	}
?>   
<?
if(($rs[t_id]<> $tId_old ) and $i !=1){
?>
<tr class="style19" >
<td  height="30"   align="left" colspan="12" style="border: #000000 1px solid;"><span class="style19">&nbsp;&nbsp;<font color="#FF0000"><strong><? echo $rs[type_name];  ?></strong></font>&nbsp;</span></td>
</tr>
<?
	}elseif($i ==1){?>
	<tr class="style19" >
<td  height="30"   align="left" colspan="12" style="border: #000000 1px solid;"><span class="style19">&nbsp;&nbsp;<font color="#FF0000"><strong><? echo $rs[type_name];  ?></strong></font>&nbsp;</span></td>
</tr>
<? }?>

<tr class="style19" >
 <td  height="25"  align="center" style="border: #000000 1px solid;"><span class="style19">&nbsp;<? echo $j  //$i; ?></span></td>
  <td  height="25" align="left" style="border: #000000 1px solid;"><span class="style19">&nbsp;<? echo $rs[rd_name] //fild_type($rs[type_id]); ?></span></td>
 <td  align="left" style="border: #000000 1px solid;"><span class="style19">&nbsp;
     <? //echo $rs[code];  ?>
 </span></td>
   <td  align="left" style="border: #000000 1px solid;"><span class="style19">&nbsp;
      <? 
   
   if($rs[type] ==0  and $rs[brand_name] <>'') {
   			echo $rs[brand_name]." / ". $rs[type_name1];
   }elseif($rs[type] ==1  and $rs[brand_name] <>'')   {
   			echo $rs[brand_name];
   }
 ?> 
     </span></td>
              <td  align="center" style="border: #000000 1px solid;"><span class="style19">&nbsp;
              <?=date_2($rs["date_receive"])?>
              </span></td>                                 
 <td  style="border: #000000 1px solid;"><span class="style19">&nbsp;
     <?="-"?>
 </span></td>
    <td  align="right" style="border: #000000 1px solid;"><span class="style19">
      <?  echo number_format($rs[price],2);	  ?>
    &nbsp;</span></td>
   <td   align="center" style="border: #000000 1px solid;"><span class="style19">&nbsp;
      <? 
	if($rs["come_in"] =='0')echo 'รายได้' ;
	else if($rs["come_in"] =='1')echo 'อุดหนุน' ;
	else if($rs["come_in"] =='2')echo 'บริจาค' ;
	else if($rs["come_in"] =='3')echo 'เงินกู้' ;
	else if($rs["come_in"] =='4')echo 'อื่นๆ' ;
	?>
   </span></td>
	  <td   align="left" style="border: #000000 1px solid;"><span class="style19">&nbsp;
      <?
   if($rs[type] ==0) echo $rs[user];
   else  echo $rs[garan_at];
?>
	  </span></td>
	 <td  style="border: #000000 1px solid;"><span class="style19">&nbsp;<? echo $rs[list_edit];  ?></span></td>
	  <td  style="border: #000000 1px solid;"><span class="style19"></span></td>
	   <td  style="border: #000000 1px solid;"><span class="style19">&nbsp;<? echo $rs[remark];  ?></span></td>
  </tr>

<? 
	
 	$tId_old = $rs[t_id] ;
		 if(($rs[t_id] == $tId_old) or $i ==1){
				$j++;
				$total_name = $total_name + $rs[price];		
		}
if( $i == $num_row){
	?>
	<tr>
 <td   colspan="6" height="30" align="right" style="border: #000000 1px solid;">  <span class="style19"><strong>
รวมเงิน&nbsp;&nbsp;</strong></span></td>
  <td  align="right" style="border: #000000 1px solid;"><span class="style21">
    <?  echo number_format($total_name,2);	  ?>
    &nbsp;</span></td>
   <td   colspan="5" style="border: #000000 1px solid;"><span class="style19"></span></td>
 </tr>
	<?
	}

	
	}
?>

		  <tr  >
 <td   colspan="6" height="30" align="right" style="border: #000000 1px solid;"> <span class="style21"><strong>รวมเงินทั้งหมด&nbsp;&nbsp;</strong></span></td>
  <td  align="right" style="border: #000000 1px solid;"><span class="style21">
    <?  echo number_format($total_price,2);	  ?>
    &nbsp;</span></td>
   <td   colspan="5" style="border: #000000 1px solid;"><span class="style19"></span></td>
</tr>
        </table>

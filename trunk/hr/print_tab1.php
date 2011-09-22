<? ob_start();?>
<?
include("config.inc.php");
//session_start();
ob_start();
header('Content-type: application/ms-word');
header('Content-Disposition: attachment; filename="testing.doc"'); 
?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
<!--
.style1 {
	font-family: "Angsana New";
	font-weight: bold;
	font-size: 20px;
}
.style2 {
	font-family: "Angsana New";
	font-size: 18px;
}
-->
</style>
<body>

<table width="100%" align="center" border="0" acellpadding="0" cellspacing="0" bordercolor="#000000">
                                                <tr class="lgBar">
                                                  <td  height="31" colspan="2"><div align="center" class="style1"> แบบขอรับบำเน็จหรือบำนาญ</div></td>
                                             
                                                  
                                                </tr>
<?
$sql=" SELECT * FROM person p , ps_tname_ref ps WHERE p.ps_tname_id = ps.ps_tname_id and p.user_id=$user_id ";
$result1 = mysql_query($sql);
$rs=mysql_fetch_array($result1);
$n = explode(" ",$rs[name]);
$birthday  = $rs[birthday] ;
?>   
<tr >
 <td  height="30"   align="right" colspan="2"><span class="style2">บ.ท.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>
</tr>
<tr >
 <td  height="30"  colspan="2"align="center"><span class="style2">&nbsp;เรื่องขอรับ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="checkbox" size="10" name="check">&nbsp;&nbsp;บำเหน็จปกติ
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="checkbox" size="10" name="check">&nbsp;&nbsp;บำนาญปกติ
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="checkbox" size="10" name="check">&nbsp;&nbsp;บำนาญพิเศษ
 </span></td>
</tr>
<tr >
 <td width="48%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;ชื่อ&nbsp;&nbsp;&nbsp;&nbsp;<?=$n[0] ?>
 </span></td>
  <td width="52%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;สกุล&nbsp;&nbsp;&nbsp;&nbsp;<?=$n[1] .$n[2].$n[3].$n[4].$n[5].$n[6]?>  
 </span></td>
</tr>
<tr >
 <td  height="30"   colspan="2"align="left"><span class="style2">&nbsp;&nbsp;ตำแหน่งสุดท้าย&nbsp;&nbsp;&nbsp;&nbsp;<?=work_max($user_id) ?>
 </span></td>

</tr>
<tr >
 <td  height="30"  align="left"><span class="style2">&nbsp;&nbsp;1. ชื่อเดิม&nbsp;&nbsp;&nbsp;&nbsp;<?//=$n[0] ?>
 </span></td>
  <td  height="30"  align="left"><span class="style2">&nbsp;&nbsp;ชื่อสกุลเดิม&nbsp;&nbsp;&nbsp;&nbsp;<?//=$n[1] ?>  
 </span></td>
</tr>
<tr >
 <td  height="30"  align="left" colspan="2"><span class="style2">&nbsp;&nbsp;2. เกิดวันที่&nbsp;&nbsp;&nbsp;&nbsp;<? if($birthday<>"" and $birthday<>"0000-00-00"  ){echo date_2($birthday);}else{echo "";} ?> &nbsp;&nbsp;&nbsp;&nbsp;
 ตรงกับวัน &nbsp;&nbsp;<? 
 $d = explode("-",$birthday);
 echo date("L", mktime(0, 0, 0,  $d[1],  $d[2], $d[0])); ?>
 </span></td>
</tr>
<tr >
 <td width="48%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;3. ชื่อบิดา&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs[fa_name] ?>
 </span></td>
  <td width="52%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;ชื่อมารดา&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs[mo_name] ?>
 </span></td>
</tr>
<tr >
 <td  colspan="2"height="30"  align="left"><span class="style2">&nbsp;&nbsp;4. ให้ลงรายการเพื่อเริ่มเข้ารับราชการ ดังนี้&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>

</tr> 
<? $sql1 = "SELECT * FROM work WHERE user_id=$user_id order by  start_work asc limit 1";
   		$result1 = mysql_query($sql1);
   		$d1 =mysql_fetch_array($result1);
?>
<tr >
 <td  colspan="2"height="30"  align="left">

 <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ก. ตำแหน่ง &nbsp;&nbsp;<?=$d1[position]?>
 </span></td>

</tr>
<tr >
 <td  colspan="2"height="30"  align="left">

 <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข. สังกัด &nbsp;&nbsp;<?=$d1[place]?>
 </span></td>

</tr>
<tr >
 <td  colspan="2"height="30"  align="left">

 <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ค. เมื่อวันที่ &nbsp;&nbsp;<?=date_2($d1[start_work])?>
 </span></td>

</tr>
<tr >
 <td  colspan="2"height="30"  align="left">

 <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ง. อายุ &nbsp;&nbsp;<?
 echo number_format((strtotime("$d1[start_work]") - strtotime("$birthday"))/  ( 60 * 60 * 24 *365)); 
?> &nbsp;ปี
 </span></td>

</tr>
<tr >
 <td  colspan="2"height="30"  align="left">

 <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จ. ได้รับเงินเดือน หรือเงินประเภทใด เดือนละเท่าใด <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้รับเงินเดือน&nbsp;&nbsp; เดือนละ
  <? echo number_format($d1[pay]); ?> &nbsp;&nbsp;บาท
 </span></td>

</tr>
<tr >
 <td  colspan="2"height="30"  align="left"><span class="style2">&nbsp;&nbsp;5. ระหว่างเข้ารับราชการ&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>

</tr>
                                              </table>
  <?
function work_max($user_id){
  	 	$sql="SELECT * FROM work WHERE user_id=$user_id order by  start_work desc limit 1";
   		$result = mysql_query($sql);
   		$d =mysql_fetch_array($result);
   		return $d[position]." ".find_type_name($d[type_id])." ".find_div_name1($d[div_id])." "."องค์การบริหารส่วนจังหวัดพะเยา  จังหวัดพะเยา";
  }
 ?>
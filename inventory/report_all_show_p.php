<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css">
<body><br>
<form name="f12" method="post"  action=""   >


<br>
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

$Per_Page =20;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))

print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$result1 = mysql_query($sql);

?>
<center>
<input  type="button" name="print" value=" ส่งออก Word "  onclick="window.open('report_all_show_p_print.php?num_id=<?=$num_id?>&code1=<?=$code1?>&date_receive=<?=$date_receive?>&rd_name=<?=$rd_name?>&t_id=<?=$t_id?>&year=<?=$year?>&cat=<?=$cat?>')" class="buttom"/> 
&nbsp;&nbsp;&nbsp;
<input  type="button" name="print" value=" ส่งออก Excel "  onclick="window.open('report_all_show_p_print_xls.php?num_id=<?=$num_id?>&code1=<?=$code1?>&date_receive=<?=$date_receive?>&rd_name=<?=$rd_name?>&t_id=<?=$t_id?>&year=<?=$year?>&cat=<?=$cat?>')" class="buttom"/> 
</center><br>
<table  width="1200"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
      <td  height="40" colspan="20" style="border: #000000 1px solid;"><div  align="center"><br><font size="3">ทะเบียนอสังหาริมทรัพย์<? //if($cat ==1) echo "สังหาริมทรัพย์";else echo "อสังหาริมทรัพย์"?><br>
	  ของ<?=$site?>
	  <br><? echo fild_type($t_id) ?><!--รายงานจัดสรรครุภัณฑ์ <? echo fild_type($t_id) ?> --></font><br></div></td>
          </tr>
  <tr class="bmText_1"  bgcolor="#C1E0FF">
        <td width="6%"  height="31" align="center" style="border: #000000 1px solid;" ><strong>ลำดับที่</strong></td>
		<td width="11%"  height="31" align="center" style="border: #000000 1px solid;" ><strong>ประเภท</strong></td>
         <td width="4%"  align="center" style="border: #000000 1px solid;" ><strong>เลขที่ / รหัส</strong></td>
		  <td width="16%"  align="center" style="border: #000000 1px solid;" ><strong>ยี่ห้อ ชนิด แบบ ขนาด</strong></td>
	<td width="8%"  align="center" style="border: #000000 1px solid;" ><strong>วันเดือนปี<br>
	  ที่ได้กรรมสิทธิ์</strong></td> 
      <td width="6%" align="center" style="border: #000000 1px solid;" ><strong>หมายเลข<br>
        และทะเบียน</strong></td>
	<td width="8%"  align="center" style="border: #000000 1px solid;" ><strong>ราคาต่อหน่วย <br>
	  (บาท)</strong></td> 
	<td width="7%"  align="center" style="border: #000000 1px solid;" ><strong>วิธีการได้มา<br>
	  ซึ่งกรรมสิทธิ์</strong></td> 

	<td width="17%"  align="center" style="border: #000000 1px solid;" ><strong>ใช้ประจำ</strong></td> 
	<td width="7%"  align="center" style="border: #000000 1px solid;" ><strong>รายการ<br>
	  เปลี่ยนแปลง</strong></td> 
	<td width="3%"  align="center" style="border: #000000 1px solid;" ><strong>เลข-ที่</strong></td> 
    <td width="7%"  align="center" style="border: #000000 1px solid;" ><strong>หมายเหตุ</strong></td> 
          </tr>
		   
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}

$j =1;
$total_price = 0;
$total_name = 0;

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

<tr class="bmText" bgcolor="#C1E0FF" >
 <td   colspan="6" height="30" align="right" style="border: #000000 1px solid;"> 
 <strong>
 รวมเงิน&nbsp;&nbsp;</strong></td>
  <td  align="right" style="border: #000000 1px solid;"><?  echo number_format($total_name,2);	  ?>&nbsp;</td>
   <td   colspan="11" style="border: #000000 1px solid;">&nbsp;</td>
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
<td  height="30"   align="left" colspan="19" style="border: #000000 1px solid;">&nbsp;&nbsp;<font color="#FF0000"><strong><? echo $rs[type_name];  ?></strong></font>&nbsp;</td>
</tr>
<?
	}elseif($i ==1){?>
	<tr >
<td  height="30"   align="left" colspan="19" style="border: #000000 1px solid;">&nbsp;&nbsp;<font color="#FF0000"><strong><? echo $rs[type_name];  ?></strong></font>&nbsp;</td>
</tr>
<? }?>
<a href="index.php?action=view_detail_1_p&r_id=<?=$rs[r_id]?>&rd_id=<?=$rs[rd_id]?>" target="_blank" >

<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#FFCC00'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center" style="border: #000000 1px solid;"><font size="2">&nbsp;<font size="2"><? echo $j ?></font></font></td>
  <td  height="25" align="left" style="border: #000000 1px solid;"><font size="2">&nbsp;<font size="2"><a href="index.php?action=view_detail_1_p&r_id=<?=$rs[r_id]?>&rd_id=<?=$rs[rd_id]?>" target="_blank" ><? echo $rs[rd_name] ?></a></font></font></td>
 <td  align="left" style="border: #000000 1px solid;">&nbsp;<font size="2"><? //echo $rs[code];  ?></font></td>
   <td  align="left" style="border: #000000 1px solid;">&nbsp;<font size="2"><? 
   
   if($rs[type] ==0  and $rs[brand_name] <>'') {
   			echo $rs[brand_name]." / ". $rs[type_name1];
   }elseif($rs[type] ==1  and $rs[brand_name] <>'')   {
   			echo $rs[brand_name];
   }
 ?> </font> </td>
              <td  align="center" style="border: #000000 1px solid;">&nbsp;<font size="2"><?=date_2($rs["date_receive"])?></font></td>                                 
 <td  style="border: #000000 1px solid;">&nbsp;<font size="2"><?="-"?></font></td>
    <td  align="right" style="border: #000000 1px solid;"><font size="2"><?  echo number_format($rs[price],2);	  ?></font>&nbsp;</td>
   <td   align="center" style="border: #000000 1px solid;">&nbsp;<font size="2"><? 
	if($rs["come_in"] =='0')echo 'รายได้' ;
	else if($rs["come_in"] =='1')echo 'อุดหนุน' ;
	else if($rs["come_in"] =='2')echo 'บริจาค' ;
	else if($rs["come_in"] =='3')echo 'เงินกู้' ;
	else if($rs["come_in"] =='4')echo 'อื่นๆ' ;
	?></font></td>
	  <td   align="left" style="border: #000000 1px solid;">&nbsp;<font size="2"><?
   if($rs[type] ==0) echo $rs[user];
   else  echo $rs[garan_at];
?></font></td>
	 <td  style="border: #000000 1px solid;">&nbsp;<? echo $rs[list_edit];  ?></td>
	  <td  style="border: #000000 1px solid;">&nbsp;</td>
	   <td  style="border: #000000 1px solid;">&nbsp;<? echo $rs[remark];  ?></td>
          </tr>
</a>
<? 

 	$tId_old = $rs[t_id] ;
		 if(($rs[t_id] == $tId_old) or $i ==1){
				$j++;
				$total_name = $total_name + $rs[price];		
		}
if( $i == $num_row){
	?>
	<tr class="bmText" bgcolor="#C1E0FF" >
 <td   colspan="6" height="30" align="right" style="border: #000000 1px solid;">  <strong>
 รวมเงิน&nbsp;&nbsp;</strong></td>
  <td  align="right" style="border: #000000 1px solid;"><?  echo number_format($total_name,2);	  ?>&nbsp;</td>
   <td   colspan="11" style="border: #000000 1px solid;">&nbsp;</td>
 </tr>
	<?
	}

	}
?>

		  <tr class="bmText" bgcolor="<? echo $bg?>" >
 <td   colspan="6" height="30" align="right" style="border: #000000 1px solid;"> <strong>รวมเงินทั้งหมด&nbsp;&nbsp;</strong></td>
  <td  align="right" style="border: #000000 1px solid;"><?  echo number_format($total_price,2);	  ?>&nbsp;</td>
   <td   colspan="11" style="border: #000000 1px solid;">&nbsp;</td>
</tr>
        </table>
	  </td>
    </tr>
  </table>
</form>
<center>
<input  type="button" name="print" value=" ส่งออก Word "  onclick="window.open('report_all_show_p_print.php?num_id=<?=$num_id?>&code1=<?=$code1?>&date_receive=<?=$date_receive?>&rd_name=<?=$rd_name?>&t_id=<?=$t_id?>&year=<?=$year?>&cat=<?=$cat?>')" class="buttom"/> &nbsp;&nbsp;&nbsp;
<input  type="button" name="print" value=" ส่งออก Excel "  onclick="window.open('report_all_show_p_print_xls.php?num_id=<?=$num_id?>&code1=<?=$code1?>&date_receive=<?=$date_receive?>&rd_name=<?=$rd_name?>&t_id=<?=$t_id?>&year=<?=$year?>&cat=<?=$cat?>')" class="buttom"/> 
</center>

<BR></body>
</html>

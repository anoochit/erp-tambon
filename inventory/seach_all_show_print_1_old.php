<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><?
include("config.inc.php");

?>
  <script language="JavaScript" type="text/javascript">
<!--
function printpage() {
window.print();  
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script><!---->
<body onLoad="window.print();" >
<div align="center"><strong>
รายงานครุภัณฑ์</strong></div>
<br><br>
<table width="1000"   border="1"align="center" cellspacing="0"  cellpadding="0" >
 <tr class="lgBar"  >
  <td width="3%"  height="31"><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">NO.</font></span></b> </div></td>
<td width="7%"  height="31"><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">วัน เดือน ปี</font></span></b> </div></td>
      <td width="7%" ><div align="center">
                                                      <b><span style="font-size:9pt;"><font face="tahoma">ร้านค้า</font></span></b>
    </div></td>
      <td  colspan="2"><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">หมายเลขครุภัณฑ์</font></span></b>
      </div></td>
	    <td width="9%" ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">รายการ</font></span></b>
    </div></td>
      <td width="4%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">จำนวน</font></span></b></td>
 <td width="6%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">หน่วยนับ</font></span></b></td>
  <td width="4%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">ราคา</font></span></b></td>
   <td width="9%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">กอง / ฝ่าย  </font></span></b></td>
    <td width="8%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">ใบเบิก</font></span></b></td>
    <td width="6%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">สถานะ</font></span></b></td>
	 <td width="14%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">หมายเหตุ</font></span></b></td>
  </tr>
<?
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
$j =0;
$total_price = 0;
$total_name = 0;
$num_row = mysql_num_rows($result);
while($rs=mysql_fetch_array($result)){
$i++;

if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
$total_price = $total_price + $rs[price];


$d = explode("-",$rs[code]);
?>   
<!----------------------------------------------------แสดงผลรวมของแต่ละรายการ------------------------------------>
<?
if(($d[0]."-".$d[1]."-".$d[2] <> $code_old) and $i !=1){
//echo $j."<br>";
?>
<tr >
<td  height="30"  align="center" colspan="14"><b>จำนวน&nbsp;&nbsp;<font color="#FF0000"><?=$j?></font>&nbsp;&nbsp;รวมราคา&nbsp;&nbsp;<font color="#FF0000">
<?=number_format($total_name,2)?></font>&nbsp;&nbsp;บาท</b>
</td>
</tr>
<?
		$total_name = 0;
		$j = 0;
	}
?>
<!----------------------------------------------------แสดงหัวของรายการ------------------------------------>
<?
if(($d[0]."-".$d[1]."-".$d[2] <> $code_old ) and $i !=1){
?>
<tr >
<td  height="30"  align="center" colspan="14"><font color="#FF0000"><strong><? echo $rs[rd_name];  ?></strong></font>&nbsp;
</td>
</tr>
<?
	}elseif($i ==1){?>
	<tr >
<td  height="30"  align="center" colspan="14"><font color="#FF0000"><strong><? echo $rs[rd_name];  ?></strong></font>&nbsp;
</td>
</tr>
<? }?>
<!----------------------------------------------------แสดงรายการ------------------------------------>
<tr >
<td  height="25"  align="center"><font style="font-size:9pt;">&nbsp;<? echo $i; ?></font></td>
 <td  height="25"  align="center"><font style="font-size:9pt;">&nbsp;<? if($rs[date_receive] <>'' and  $rs[date_receive] <>'0000-00-00') echo date_2($rs[date_receive]); ?>
 <input  type="hidden" name='chk[<?=$i?>]' value="<? echo $rs["c_id"]?>"></font></td>
 <td align="left"><font style="font-size:9pt;">&nbsp;<? echo shop_name($rs[shop_id]); ?></font></td><? 

		$aa = $d[0]."-".$d[1]."-".$d[2];
		$bb = $d[3];
 ?>
<td width="9%" align="center"><font style="font-size:9pt;">&nbsp;<?=$aa;?></font> </td>
<td width="5%"   align="left"><font style="font-size:9pt;"><?=$bb;?>&nbsp;</font> </td>
<td   align="left"><font style="font-size:9pt;">&nbsp;<? echo $rs[rd_name];  ?> </font> </td>
<td align="center" ><font style="font-size:9pt;">1</font></td>
<td  align="center" ><font style="font-size:9pt;"><?=$rs[unit]?></font></td>
<td align="center" ><font style="font-size:9pt;"><? echo number_format($rs[price],2);  ?></font></td>
<? //$f = explode("*", room_2($rs[room_id]))?>
<td  align="left" ><font style="font-size:9pt;">&nbsp;<? echo find_div($rs["div_id"])."/<br>".find_sub($rs["sub_id"])   ?></font></td>
<td  align="center" ><font style="font-size:9pt;">&nbsp;<? if($rs[num_id] <>'') echo $rs[num_id].",".$rs[paper_id]?></font></td>
<td  align="left"><font style="font-size:9pt;" >&nbsp;<? 
if($rs[status]==1 ) echo "รอจำหน่าย";
				if($rs[status]==2 ) echo "จำหน่ายแล้ว";
				if($rs[status]==0 ) echo "ใช้งานอยู่";
?></font>
</td>
<td  align="left"><font style="font-size:9pt;">&nbsp;<? 
	echo $rs["remark"];
?>
</font></td>
</tr>
<? 
		$code_old = $d[0]."-".$d[1]."-".$d[2] ;
		 if(($d[0] == $code_old) or $i ==1){
				$j++;
				$total_name = $total_name + $rs[price];		
		}
if( $i == $num_row){
	?>
	<tr >
<td  height="30"  align="center" colspan="14"><b>จำนวน &nbsp;&nbsp;<font color="#FF0000"><?=$j?></font>&nbsp;&nbsp;รวมราคา&nbsp;&nbsp;<font color="#FF0000">
<?=number_format($total_name,2)?></font>&nbsp;&nbsp;บาท</b>
</td>
</tr>
	<?
	}
}
?> <input type="hidden" name="total" value="<? echo $i?>">
<tr >
<td  height="30"  align="center" colspan="14"><font style="font-size:12pt;">&nbsp;
<b>จำนวนทั้งหมด &nbsp;&nbsp;<font color="#FF0000"><?=$i?></font>&nbsp;&nbsp;รวมราคา&nbsp;&nbsp;<font color="#FF0000">
<?=number_format($total_price,2)?></font>&nbsp;&nbsp;บาท</b>
</font></td>
</tr>
  </table>
	  
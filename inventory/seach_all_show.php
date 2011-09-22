<? ob_start();?>
<?
session_start();
include('config.inc.php');

	if($_POST[save] <>''){
			for ($i=0;$i<=$total;$i++) {
					if ($status[$i] != "") { 
							$sql_up = "UPDATE code SET status = '$status[$i]' WHERE c_id =$chk[$i] ";
							$result_up  = mysql_query($sql_up); 
					}
					if ($remark[$i] != "") { 
							$sql_up = "UPDATE code SET remark = '$remark[$i]' WHERE c_id =$chk[$i] ";
							$result_up  = mysql_query($sql_up); 
					}
			}
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<br>
<?
if($search <>''){
	$sql="SELECT * from receive r,receive_detail rd,code c  
	left outer join open o on c.o_id = o.o_id
 WHERE 1 = 1 and r.r_id = rd.r_id and c.rd_id = rd.rd_id   ";
if($div_id <> '' ){
	$sql .= " AND o.div_id = '$div_id'  ";
}
if($sub_id <> '' ){
	$sql .= " AND o.room_id = '$sub_id'  ";
}
if($rd_name <> '' ){
	$sql .= " AND rd.rd_name like '%$rd_name%'  ";
}
if($code1 <> '' ){
	$sql .= " AND c.code like '%$code1%'  ";
}
if($open_date <> '' and $open_date1 <>''){
	$sql .= " AND o.open_date >= '".date_format_sql($open_date)."' AND o.open_date <= '".date_format_sql($open_date1)."'  ";
}
if($type <> '' ){
	$sql .= " AND rd.type_id = '$type'  ";
}
if($status <> '' ){
	$sql .= " AND c.status = $status  ";
}
$sql .= " order by c.code,rd.rd_name  ";

$Per_Page =10;
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
}
$result1 = mysql_query($sql);
?>
<form name="f5" method="post"  action=""    >
<input type="hidden" name="search" value="<?=$search?>">
<input type="hidden" name="code1" value="<?=$code1?>">
<input type="hidden" name="rd_name" value="<?=$rd_name?>">
<input type="hidden" name="div_id" value="<?=$div_id?>">
<input type="hidden" name="sub_id" value="<?=$sub_id?>">
<input type="hidden" name="open_date" value="<?=$open_date?>">
<input type="hidden" name="open_date1" value="<?=$open_date1?>">
<input type="hidden" name="type" value="<?=$type?>">
<input type="hidden" name="status" value="<?=$status?>">
<div align="center"><strong>
รายงานครุภัณฑ์</strong></div>
<br><br>
<table width="100%"   border="1"align="center" cellspacing="0"  cellpadding="0" >
 <tr class="lgBar"  bgcolor="#C1E0FF">
  <td width="5%"  height="31"><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">NO.</font></span></b> </div></td>

      <td  ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">หมายเลขครุภัณฑ์</font></span></b>
      </div></td>
	  <td width="16%"  height="31"><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">วัน เดือน ปี</font></span></b> </div></td>
	    <td width="21%" ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">รายการ</font></span></b>
      </div></td>

  <td width="13%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">ราคา</font></span></b></td>
   <td width="26%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">กอง / ฝ่าย </font></span></b></td>
    </tr>
<?
$i = 0;
$j =0;
$total_price = 0;
$total_name = 0;
$num_row = mysql_num_rows($result1);
while($rs=mysql_fetch_array($result1)){
$i++;

if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
$total_price = $total_price + $rs[price];
$d = explode("-",$rs[code]);
?>   
<!----------------------------------------------------แสดงผลรวมของแต่ละรายการ------------------------------------>
<?


if(($d[0]."-".$d[1]."-".$d[2]<> $code_old) and $i !=1){
?>
<tr >
<td  height="30"  align="center" colspan="14"><b>จำนวน&nbsp;&nbsp;<font color="#FF0000"><?=$j?></font>&nbsp;&nbsp;รวมราคา&nbsp;&nbsp;<font color="#FF0000">
<?=number_format($total_name,2)?></font>&nbsp;&nbsp;บาท</b></td>
</tr>
<?
		$total_name = 0;
		$j = 0;
	}
?>
<!----------------------------------------------------แสดงหัวของรายการ------------------------------------>
<?
if(($d[0]."-".$d[1]."-".$d[2]<> $code_old ) and $i !=1){
?>
<tr >
<td  height="30"  align="center" colspan="14"><font color="#FF0000"><strong><? echo $rs[rd_name];  ?></strong></font>&nbsp;</td>
</tr>
<?
	}elseif($i ==1){?>
	<tr >
<td  height="30"  align="center" colspan="14"><font color="#FF0000"><strong><? echo $rs[rd_name];  ?></strong></font>&nbsp;</td>
</tr>
<? }?>
<!----------------------------------------------------แสดงรายการ------------------------------------>
<tr >
<td  height="25"  align="center"><font style="font-size:9pt;">&nbsp;<? echo $i; ?></font></td>
<? 

		$aa = $d[0]."-".$d[1]."-".$d[2];
		$bb = $d[3];
//echo $rs[code];  ?>
<td width="19%"   align="left"><font style="font-size:9pt;">&nbsp;<?=$aa."-".$bb;?></font> </td>

 <td  height="25"  align="center"><font style="font-size:9pt;">&nbsp;<? if($rs[date_receive] <>'' and  $rs[date_receive] <>'0000-00-00') echo date_2($rs[date_receive]); ?>
 <input  type="hidden" name='chk[<?=$i?>]' value="<? echo $rs["c_id"]?>"></font></td>
<td   align="left"><font style="font-size:9pt;">&nbsp;<? echo $rs[rd_name];  ?> </font> </td>

<td align="center" ><font style="font-size:9pt;"><? echo number_format($rs[price],2);  ?></font></td>
<td  align="left" ><font style="font-size:9pt;">&nbsp;<? echo find_div($rs["div_id"])." / ".find_sub($rs["sub_id"]) ?></font></td>
</tr>
<? 
	
		$code_old = $d[0]."-".$d[1]."-".$d[2] ;
		 if(($d[0]."-".$d[1]."-".$d[2] == $code_old) or $i ==1){
				$j++;
				$total_name = $total_name + $rs[price];		
		}
if( $i == $num_row){
	?>
	<tr >
<td  height="30"  align="center" colspan="14"><b>จำนวน &nbsp;&nbsp;<font color="#FF0000"><?=$j?></font>&nbsp;&nbsp;รวมราคา&nbsp;&nbsp;<font color="#FF0000">
<?=number_format($total_name,2)?></font>&nbsp;&nbsp;บาท</b></td>
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
<div align="center">
	 <br>
     <input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('seach_all_show_print_1.php?search=<?=$search?>&code1=<?=$code1?>&rd_name=<?=$rd_name?>&div_id=<?=$div_id?>&sub_id=<?=$sub_id?>&open_date=<?=$open_date?>&open_date1=<?=$open_date1?>&type=<?=$type?>&status=<?=$status?>')"/>&nbsp;&nbsp;
</div>			  
</form>
<script language="javascript">
function q_confirm()
{
	if (confirm("ยืนยันการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
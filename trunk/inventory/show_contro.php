<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css"> 

<? 
	$sql="SELECT  r.*,o.*,rd.*,c.* from receive r,receive_detail rd,code c 
	left outer join open o on c.o_id = o.o_id
 WHERE  r.r_id = rd.r_id and c.rd_id = rd.rd_id   and c.c_id ='$c_id'";
$result1 = mysql_query($sql);
$rs=mysql_fetch_array($result1);
?>
<br />
<form name="save"  method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td colspan="2" align="center" bgcolor="#66CC99" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left" >
	<td  height="25"  >
		ทะเบียนพัสดุครุภัณฑ์</td>
	</tr>
</table></td>
</tr>
</table><br />
<center><input type="submit" name="print" value=" พิมพ์ทะเบียนพัสดุครุภัณฑ์" onclick="window.open('show_control_print.php?c_id=<?=$c_id?>')"/></center>
<br />
<table width="100%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table name="add" cellpadding="1" cellspacing="1" border="0"  bgcolor="#C7E3F1" width="100%">
 <tr >
    <td width="29%" height="30">ประเภท</td>
    <td width="22%" bgcolor="#FFFFFF"><div><?=fild_type($rs[type_id])?></div></td>
	    <td width="29%">เลขรหัสพัสดุ</td>
    <td width="25%" bgcolor="#FFFFFF"><div><? echo $rs[code];?>
      </div></td>
  </tr>
	<tr >
    <td width="29%" height="30">ชื่อพัสดุ</td>
    <td width="22%" bgcolor="#FFFFFF"><div><?=fild_type($rs[type_id])?></div></td>
	    <td>ซื้อ / จ้าง / ได้มา จาก</td>
    <td bgcolor="#FFFFFF"><div><? echo shop_name($rs[shop_id]);?>
		</div></td>
  </tr>
  <tr >
    <td width="29%" height="30">ใบส่งของที่</td>
    <td width="22%" bgcolor="#FFFFFF"><div><?=fild_type($rs[type_id])?></div></td>
	    <td>ซื้อ / จ้าง / ได้มา วันที่</td>
    <td bgcolor="#FFFFFF"><div><? echo shop_name($rs[shop_id]);?>
		</div></td>
  </tr>
    <tr >
    <td width="29%" height="30">ชื่อ / ยี่ห้อผู้ทำหรือผลิต</td>
    <td width="22%" bgcolor="#FFFFFF"><div><?=fild_type($rs[type_id])?></div></td>
	    <td>แบบ / ชนิด / ลักษณะ</td>
    <td bgcolor="#FFFFFF"><div><? echo shop_name($rs[shop_id]);?>
		</div></td>
  </tr>
	    <tr >
		<td>ราคา</td>
    <td bgcolor="#FFFFFF"><div><? echo shop_name($rs[shop_id]);?>
		</div></td>
      <td width="29%" height="30">ใช้งบประมาณของ</td>
    <td  bgcolor="#FFFFFF"><div><?=$rs[come_in]?></div></td>
  </tr>
      <tr >
    <td width="29%" height="30">หมายเลขลำดับ</td>
    <td width="22%" bgcolor="#FFFFFF"><div><?=fild_type($rs[type_id])?></div></td>
	    <td>หมายเลขเครื่อง</td>
    <td bgcolor="#FFFFFF"><div><? echo shop_name($rs[shop_id]);?>
		</div></td>
  </tr>
        <tr >
    <td width="29%" height="30">หมายเลขกรอบ</td>
    <td width="22%" bgcolor="#FFFFFF"><div><?=fild_type($rs[type_id])?></div></td>
	    <td>หมายเลขจดทะเบียน</td>
        <td bgcolor="#FFFFFF"><div><? echo shop_name($rs[shop_id]);?>
		</div></td>
  </tr>
        <tr >
    <td width="29%" height="30">สีของพัสดุ</td>
    <td width="22%" bgcolor="#FFFFFF"><div><?=fild_type($rs[type_id])?></div></td>
	    <td>อื่นๆ</td>
        <td bgcolor="#FFFFFF"><div><? echo shop_name($rs[shop_id]);?>
		</div></td>
  </tr>
      <tr  >
    <td width="29%" height="30" colspan="4" bgcolor="#FFFF99">เงื่อนไข - การประกัน</td>
  </tr>
      <tr >
    <td width="29%" height="30">พัสดุรับประกันถึงวันที่</td>
    <td width="22%" bgcolor="#FFFFFF"><div><?=fild_type($rs[type_id])?></div></td>
	    <td>พัสดุประกันไว้ที่บริษัท</td>
        <td bgcolor="#FFFFFF"><div><? echo shop_name($rs[shop_id]);?>
		</div></td>
  </tr>
    <tr >
    <td width="29%" height="30">วันที่ประกันพัสดุ</td>
    <td width="22%" bgcolor="#FFFFFF" colspan="3"><div><?=fild_type($rs[type_id])?></div></td>
  </tr>
  <tr  >
    <td width="29%" height="30" colspan="4" bgcolor="#FFFF99">ชื่อผู้ใช้ - ดูแล -รับผิดชอบพัสดุ</td>
  </tr>
  <tr >
    <td width="29%" height="30"  bgcolor="#FFFFFF"colspan="4">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" height="28">
      <div align="center">วันที่เบิก / ย้าย</div></td>
    <td width="25%">
      <div align="center">ชื่อส่วนราชการ</div></td>
    <td width="19%">
      <div align="center">ชื่อผู้ใช้</div></td>
    <td width="31%">
      <div align="center">ชื่อหัวหน้าส่วนราชการ</div></td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	</td>
  </tr>      
        </table>
</td>
</tr>
</table>
<br />
<center><input type="submit" name="show_ser" value=" ดูประวัติซ่อม " onclick="window.open('sample_8.php?c_id=<?=$rs["c_id"]?>','xxx','scrollbars=yes,width=650,height=400')"/></center><br />
<table width="100%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="left">
<tr   bgcolor="#C1E0FF">
            <td width="10%"  height="30" align="center"> <b><span style="font-size:10pt;"><font face="tahoma">วัน เดือน ปี</font></span></b> </div></td>
			
	<td width="5%"  height="30" align="center"><b><span style="font-size:10pt;"><font face="tahoma">อัตรา<br />
	  ค่าเสื่อม<br />ราคา</font></span></b></td>
						<td width="10%" align="center"   height="30" ><b><span style="font-size:10pt;"><font face="tahoma">ค่าเสื่อมราคา<br />
						ประจำปี</font></span></b></td> 
						<td width="10%" align="center"   height="30" ><b><span style="font-size:10pt;"><font face="tahoma">ค่าเสื่อมราคา<br />
			สะสม</font></span></b></td> 
											<td width="8%"   height="30" align="center"><b><span style="font-size:10pt;"><font face="tahoma">มูลค่าสุทธิ</font></span></b></td> 
														<td width="8%"  align="center"  height="30"><b><span style="font-size:10pt;"><font face="tahoma">หมายเหตุ</font></span></b></td> 
</tr>
<? 
$dd = explode("^",fild_time($rs[type_id]));
$sum = 0;
$sum_low = 0;
for($i=0;$i<=$dd[0]+1;$i++){
	$mm = explode("-",$rs[date_receive]);

?>
<tr   bgcolor="#C1E0FF">
           	  <td width="10%" align="center"><span style="font-size:9pt;"><?  
			  
			  if($i==0) { // บันทัดแรก แสดงปกติ
			  		echo date_2($rs[date_receive]);
			  }elseif($i<$dd[0]+1){ // บันทัดต่อไป
			  		$day  = explode(" ",date_2($rs[date_receive]));
					if($mm[1] <=9){ // ยังอยู่ในปี งบ ก.ย. 
						echo "30 ก.ย. ".($day[2]+$i -1);
					}else{ // เลยเดือน กย ไป
						echo "30 ก.ย. ".($day[2]+$i);
					}
			  }elseif($i==$dd[0]+1){ // บันทัดสุดท้าย
			  		if($mm[1] <=9){
						echo "30 ".mounth_2((11+ $mm[1])%12)." ".($day[2]+$i -1);
					}else{		
						echo "30 ".mounth_2($mm[1] -1)." ".($day[2]+$i);
					}
			  }
			  ?></span></td>                                  
		
				<td width="5%" align="center"><span style="font-size:9pt;">&nbsp;<?  if($i==0) echo  $dd[1]?></span></td>
				 <td align="right"><span style="font-size:9pt;"><?
				 if($i ==1){
				 	$ss =($rs[price]/$dd[0]);
				 	if($mm[1] <=9){
						$mon = ( (10 - $mm[1])/12);
						echo number_format($ss*$mon,2);
						$sum = $sum +($ss*$mon) ;
					}else{
						$mon = ( (22 - $mm[1])/12);
						echo number_format($ss*$mon,2);
						$sum = $sum +($ss*$mon) ;
					}
				}elseif($i >1 and $i < ($dd[0]+1) ){
						echo number_format(($rs[price] / $dd[0]),2);
						$sum = $sum +($rs[price] / $dd[0]) ;
				}elseif( $i ==($dd[0]+1) ){ // แถวสุดท้าย
						if($mm[1] <=9){
							 $ss =($rs[price]/$dd[0]);
							$mon =  (12-(9 - $mm[1] +1))   /12;
							$sum_last = $ss*$mon;
							echo number_format($ss*$mon,2);
					}else{		
							$ss =($rs[price]/$dd[0]);
							$mon =  (12-(22 - $mm[1]))   /12;
							$sum_last = $ss*$mon;
							echo number_format($ss*$mon,2);
					}
						
				}
				
				?>&nbsp;</span></td>
				<td  align="right"><span style="font-size:9pt;"><?
				if($i >0 and $i < ($dd[0]+1) ){
						echo number_format($sum,2);
				}elseif( $i ==($dd[0]+1) ){
						if($rs[status] <>'2') $drop =  1;
						else $drop =  0;
						echo  number_format($sum + $sum_last -$drop ,2);
				}
				?>&nbsp;</span></td>
				<td align="right"><span style="font-size:9pt;">
				<?
				if($i >=0 and $i < ($dd[0]+1) ){
						echo number_format($rs[price] - $sum,2); 
				}elseif( $i ==($dd[0]+1) ){
						if($rs[status] <>'2') echo "1";
						else echo  number_format($rs[price] - ($sum + $sum_last),2) ;
				}
				?>&nbsp;</span>
				</td>
				<td>&nbsp;<?//=$rs[price]?></td>
		  </tr>


<?
}
?>

</table>
	</td>
</tr></table>
</form>
</div>
<script language="JavaScript" type="text/javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("คุณต้องการลบข้อมูลทั้งหมดนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>

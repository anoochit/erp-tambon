<? ob_start()?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<? 
session_start();
include('config.inc.php');
?>

<style type="text/css">

.style14 {font-family: Tahoma; font-size: 11px; }
.style15 {
	font-family: "MS Sans Serif";
	font-size: 16px;
	color: #000000;
}

-->
</style>
  
  <center>
    <span class="style15">รายงานทะเบียนประวัติ นายก/รองนายก/สมาชิกสภาฯลฯ</span>
  </center>
  <br />
<table width="1500" border="0"  >
  <tr>
    <td width="100%"  style="border: #7292B8 1px solid;"  >
<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td width="100%" >
	<table width="100%" cellpadding="0" cellspacing="0" border="1"   bordercolor="#FFFFFF">

	  <tr  bgcolor="#60c0ff"  class="style14">
        <td width="101" height="28"   ><div align="center">ชื่อ - สกุล </div></td>
        <td width="75"     > <div align="center">เลขประจำตัว<br>
          ประชาชน</div></td>
        <td width="52" ><div align="center">ว/ด/ป/เกิด</div></td>
        <td width="120" ><div align="center">ที่อยู่ตามบัตรประชาชน</div></td>
		<td width="144" ><div align="center">ที่อยู่ปัจจุบันที่ติดต่อได้</div></td>
		<td width="83"  ><div align="center">หมายเลขโทรศัพท์</div></td>
		<td width="86"  ><div align="center">ชื่อบิดา</div></td>
		<td width="85"  ><div align="center">ชื่อมารดา</div></td>
		<td width="84"   ><div align="center">ชื่อคู่สมรส</div></td>
		<td width="49"   ><div align="center">จำนวนบุตร</div></td>
		<td width="34"     ><div align="center">อายุ</div></td>
		<td width="37"  ><div align="center">เพศ</div></td>
		<td width="46"   ><div align="center">กรุ๊ปเลือด</div></td>
		<td width="80" ><div align="center">ตำแหน่ง</div></td>
		<td width="59" ><div align="center">อาชีพก่อน<br />การเลือกตั้ง</div></td>
		<td width="62"   ><div align="center">อาชีพ<br />ปัจจุบัน</div></td>
		<td width="72"  ><div align="center">วันที่ได้รับ<br />การเลือกตั้ง</div></td>
		<td width="71"  ><div align="center">วันที่ กกต. <br />รับรอง</div></td>
		<td width="60"  ><div align="center">วับครบวาระ</div></td>
		<td width="48"  ><div align="center">สถานะ</div></td>
      </tr>
      <?
if($go_search  <> "" ){
		$sql1="SELECT *,p.user_id as user_id1 FROM (person p, ps_tname_ref ps) left outer join  work w on w.user_id =p.user_id   ";
		$sql1 .= " and w.w_id in(".find_w_id().") "; 
		$sql1 .= " WHERE 1=1  and p.ps_tname_id = ps.ps_tname_id"; 
		if($status <>'') $sql1 .="  and  p.status = $status ";
		if($type =='0') $sql1 .="  and  position like  '%นายก%' ";
		if($type =='1') $sql1 .="  and  position not like  '%นายก%' ";
 		$sql1 .=" and p.type_mem = 1 group by p.user_id  ";

		
$Per_Page =20;
if(!$Page){$Page=1;}
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql1);
$Page_start = ($Per_Page*$Page)-$Per_Page;
if($result)
$Num_Rows = mysql_num_rows($result);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))

print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อมูล<b></center>";
$sql1 .= " order by  pay desc,w.position asc";
$sql1 .= " LIMIT $Page_start , $Per_Page";
	$result1 = mysql_query($sql1);
	if($Page >= 2 ){
			$i=$Page_start ;
		}else{
			$i =0;
		}
if($result1)		
	while($rs=mysql_fetch_array($result1)){
			if($i%2 == 0) $bg ='#CCCCCC';
			elseif($i%2 ==1) $bg ='#FFFFFF';
			$i++;
?>
    <tr  bgcolor="<?=$bg?>" class="style14">
        <td height="28"   >&nbsp;<a href="index.php?action=personnel_story_h&user_id=<? echo $rs["user_id1"]?>"  target="_blank"><? 
		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]."";
		  else "";
		echo ""?><?=$rs[name]?></a></td>
        <td    align="center"> &nbsp;<?=$rs[id_person]?></td>
        <td   align="center"> <? if($rs[birthday]<>"" and $rs[birthday]<>"0000-00-00"  ){echo date_2($rs[birthday]);}else{echo "";}?>&nbsp;</td>
        <td   align="left">&nbsp;<?
		if($rs[num_address] <>'' and $rs[num_address] <>'-') echo $rs[num_address];
		if($rs[moo] <>'' and $rs[moo] <>'-')echo  " หมู่ ".$rs[moo];
		if($rs[road] <>'' and $rs[road] <>'-')echo  " ถนน ".$rs[road];
		if($rs[subdistrict] <>'' and $rs[subdistrict] <>'-')echo  " ต. ".$rs[subdistrict];
		if($rs[district] <>'' and $rs[district] <>'-') echo " อ. ".$rs[district];
		?></td>
		<td   align="left" >&nbsp;<?
		if($rs[place_con] <>'' and $rs[place_con] <>'-') echo $rs[place_con]." ";
		if($rs[num_address] <>'' and $rs[num_address] <>'-') echo $rs[num_address_con];
		if($rs[moo] <>'' and $rs[moo] <>'-')echo " หมู่ ". $rs[moo_con];
		if($rs[road] <>'' and $rs[road] <>'-')echo " ถนน ". $rs[road_con];
		if($rs[subdistrict] <>'' and $rs[subdistrict] <>'-') echo " ต. ".$rs[subdistrict_con];
		if($rs[district] <>'' and $rs[district] <>'-') echo " อ. ".$rs[district_con];
		?></td>
        <td      >&nbsp;<?=$rs[mobile_con]?>&nbsp;</td>
		<td   >&nbsp;<?=$rs[fa_name]?>&nbsp;</td>
		<td   ><?=$rs[mo_name]?>&nbsp;</td>
		<td    align="center"><?=$rs[mate_name] ?>&nbsp;</td>
		<td   align="center" ><?=find_child($rs["user_id1"])?>&nbsp;</td>

		<td   align="center" ><?
		$tt = explode("-",$rs[birthday]);
		$mk2=mktime(0, 0, 0, $tt[1], $tt[2], $tt[0]);
		$mk1=mktime(0, 0, 0, date("m"),date("d"), date("Y"));
		echo (1970 - gmstrftime("%Y",$mk2 - $mk1) ); 
		?>
</td>
		<td   align="center" ><? echo $rs[sex]?>&nbsp;</td>
		<td   align="center" ><? echo $rs[blood]?>&nbsp;</td>
		<td   ><? echo $rs[position]?>&nbsp;</td>
		<td    align="center"><? echo $rs[occu_old]?>&nbsp;</td>
		<td   >&nbsp;<? echo $rs[occu_new]?>&nbsp;</td>
		<td   align="center"><? if($rs[start_work] <>"0000-00-00" and  $rs[start_work] <>""  and $rs[start_work] <> NULL )echo date_format_th_1($rs[start_work]);?>&nbsp;</td>
			<td  align="center"  >&nbsp;<? if($rs[confirm_date] <>"0000-00-00"  and  $rs[confirm_date] <>""  and $rs[confirm_date] <> NULL)echo date_format_th_1($rs[confirm_date]);?></td>
			<td  align="center"  >&nbsp;<? if($rs[end_work] <>"0000-00-00"  and  $rs[end_work] <>""  and $rs[end_work] <> NULL)echo date_format_th_1($rs[end_work]);?></td>
			<td  align="center"  >&nbsp;<?
		 if($rs[status] =='0') echo "ปกติ";
		 if($rs[status] =='1') echo "ลาออก";
		 if($rs[status] =='2') echo "ไล่ออก";
		 if($rs[status] =='3') echo "เกษียณ";
		 if($rs[status] =='4') echo "ย้าย";
		 if($rs[status] =='5') echo "หมดวาระ";
		?></td>
      </tr>  
      <? 	
	  }
} 
	 
	 ?>
    </table></td>
</tr>
</table>
</td></tr> </table>
<div ><br>
<center><FONT size="2" >จำนวน ทั้งหมด <B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='report_his_result.php?Page=$Prev_Page&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&cat_id=$cat_id&type_id=$type_id&status=$status'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='report_his_result.php?Page=$i&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&cat_id=$cat_id&type_id=$type_id&status=$status'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='report_his_result.php?Page=$Next_Page&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&cat_id=$cat_id&type_id=$type_id&status=$status'> หน้าถัดไป>> </a>";

?>
<br />

</font>
</center>
</div> 
</form>
<center>
<br>
<input type="submit" name="print" value=" พิมพ์ " onclick="window.open('report_his_result_h_print.php?div_id=<?=$div_id?>&sub_id=<?=$sub_id?>&cat_id=<?=$cat_id?>&type_id=<?=$type_id?>&status=<?=$status?>&type=<?=$type?>')"/>
</center>

<?

function find_edu1($user_id){
		$sql1="SELECT  *  FROM education, ps_edu_ref where education.ps_edu_id = ps_edu_ref.ps_edu_id and education.user_id ='$user_id'  order by  education.ps_edu_id desc limit 1";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	array($rs1[ps_edu_item],$rs1[grade],$rs1[academy]);
}
function find_work($user_id){
		$sql1="SELECT  *  FROM work  where user_id ='$user_id'  order by start_work desc limit 1";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	array($rs1[position],$rs1[start_work],$rs1[type_id],number_format($rs1[pay]));
}
function find_law($user_id){
		$sql1="SELECT * FROM law  where user_id ='$user_id'  order by date_add desc limit 1";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	array($rs1[ps_wrong_id],$rs1[date_add]);
}
function find_me($user_id){
		$sql1="SELECT * FROM medal  where user_id ='$user_id'  order by date_add desc limit 1";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	array($rs1[ps_medid],$rs1[date_add]);
}

function find_w_id(){
					
				$sql2="select max(start_work) as start_work ,user_id from work group by user_id ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd ="";
				while($rs2=mysql_fetch_array($result2)){
							 $sql="select  user_id,w_id from work where start_work = '$rs2[start_work]' and user_id ='$rs2[user_id]'  group by user_id ";
									$result1 = mysql_query($sql);
									if($result1)
									$rs1=mysql_fetch_array($result1);
											if($rs1[w_id] <>''){
												$dd .= $rs1[w_id].",";
											}
					}
					return substr($dd,0,strlen($dd)-1) ;
}

function find_child($user_id){
		$sql1="SELECT  *  FROM children where   user_id ='$user_id'  group by cd_id ";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return mysql_num_rows($result1)	;
}
?>
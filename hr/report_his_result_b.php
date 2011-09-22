
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<? 
session_start();
include('config.inc.php');
?>

<style type="text/css">

.style14 {font-family: Tahoma; font-size: 12; }

-->
</style>
  <br />
<table width="1500" border="0"  >
  <tr>
    <td width="100%"  style="border: #7292B8 1px solid;"  >
<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td width="100%" >
	<table width="100%" cellpadding="0" cellspacing="0" border="1"   bordercolor="#FFFFFF">
      <tr  bgcolor="#60c0ff" class="style14" >
        <td   width="61" rowspan="2"  ><div align="center">ลำดับที่ </div></td>
        <td   colspan="4" height="30" ><div align="center">ข้อมูลบุคคล </div></td>
        <td   colspan="3"> <div align="center">การศึกษา</div></td>
        <td  colspan="6" > <div align="center">ปฏิบัติบัติราชการ</div></td>
        <td  colspan="2"><div align="center">โทษทางวินัย</div></td>
        <td  colspan="2"  align="center"><div align="center">เครื่องราชฯ</div></td>
      </tr>
	  <tr  bgcolor="#60c0ff"  class="style14">
        <td width="56"  height="30"><div align="center">คำนำ<br />
          หน้าชื่อ</div></td>
        <td width="107"   ><div align="center">ชื่อ - สกุล </div></td>
        <td width="94"     > <div align="center">เลขประจำตัว<br>
          ประชาชน</div></td>
        <td width="84" ><div align="center">ว/ด/ป/เกิด</div></td>
        <td width="97" ><div align="center">วุฒิการศึกษา</div></td>
		<td width="47"  ><div align="center">สาขา</div></td>
		<td width="89"  ><div align="center">จากสถาบัน</div></td>
		<td width="74"  ><div align="center">ตำแหน่ง<br>
		  ปัจจุบัน</div></td>
		<td width="113"   ><div align="center">ว/ด/ป <br>
		  ที่ดำรงตำแหน่ง</div></td>
		<td width="44"   ><div align="center">ระดับ</div></td>
		<td width="68"     ><div align="center">เงินเดือน</div></td>
		<td width="125"  ><div align="center">ว/ด/ป <br>
		  ที่เข้ารับราชการ</div></td>
		<td width="76"   ><div align="center">ปีเกษียณ <br />
		  พ.ศ.</div></td>
		<td width="85" ><div align="center">ร้ายแรง / <br />
		  ไม่ร้ายแรง</div></td>
		<td width="77" ><div align="center">ว/ด/ปที่<br />
		  ถูกลงโทษ</div></td>
		<td width="47"   ><div align="center">รับขั้น<br />
		  สูงสุด</div></td>
		<td width="108"  ><div align="center">รับเมื่อ <br />
		  (ราชกิจจา)</div></td>
      </tr>
      <?
if($go_search  <> ""){
$sql="SELECT max(w_id)as w_id FROM   work   
WHERE 1=1  ";
if($div_id  <>'')$sql .= " AND div_id ='$div_id' ";
if($sub_id  <>'')$sql .= " AND sub_id ='$sub_id' ";
if($cat_id  <>'')$sql .= " AND cat_id ='$cat_id' ";
if($type_id  <>'')$sql .= " AND type_id ='$type_id' ";

		$sql .= "	 group by user_id  order by  div_id,cat_id ,type_id  desc   ";
		echo $sql."<br>";
		$result = mysql_query($sql);
		$i =0;
		while($rs1=mysql_fetch_array($result)){
				$i++;
					$sql1="SELECT *,p.user_id as user_id1 FROM person p, ps_tname_ref ps, work w  
					WHERE 1=1  and w.user_id =p.user_id  
					and p.status =0
					and p.ps_tname_id = ps.ps_tname_id
					and w.w_id = '$rs1[w_id]'
 					group by p.user_id  
					";

				echo $sql1."<br>" ;
			$result1 = mysql_query($sql1);
	 		$rs=mysql_fetch_array($result1);
			if($i%2 == 0) $bg ='#CCCCCC';
			elseif($i%2 ==1) $bg ='#FFFFFF';
?>
    <tr  bgcolor="<?=$bg?>" class="style14">
	<td   height="30" align="center"><?=$i?></td>
        <td   >&nbsp;<? echo $rs1[w_id]."  u :".$rs["user_id1"] ;
		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo ""?></td>
        <td   >&nbsp;<a href="index.php?action=personnel_story&user_id=<? echo $rs["user_id1"]?>"  target="_blank"><?=$rs[name]?></a></td>
        <td    align="center"> &nbsp;<?=$rs[id_person]?></td>
        <td   align="center"> <? if($rs[birthday]<>"" and $rs[birthday]<>"0000-00-00"  ){echo date_format_th_1($rs[birthday]);}else{echo "";}?></td>
		<? 
		$ed = find_edu1($rs[user_id1]);
		?>
        <td  align="center"  >&nbsp;<?=$ed[0]?></td>
        <td      >&nbsp;<?=$ed[1]?></td>
		<td   >&nbsp;<?=$ed[2]?></td>
		<? 		$w = find_work($rs[user_id1]); ?>
		<td   ><?=$w[0]?></td>
		<td    align="center"><? if($w[1]<>"" and $w[1]<>"0000-00-00"  ){echo date_format_th_1($w[1]);}else{echo "";} ?></td>
		<td   align="center" ><?=find_type_name($w[2])?></td>
		<td   align="center" ><?=$w[3]?></td>
		<td   align="center" ><? if($rs[date_contain]<>"" and $rs[date_contain]<>"0000-00-00"  ){echo date_format_th_1($rs[date_contain]);}else{echo "";} ?></td>
		<td   align="center" ><?
	if($rs[birthday]<>"0000-00-00"  ){
		$k =explode("-",$rs[birthday]) ;
		if($k[1] <10){
			 $bb = $k[0] + 60;
			 echo $bb;
		}else {
				$bb = $k[0]  + 61;
				echo $bb;
		}
	}
		?></td>
		<? $law = find_law($rs[user_id1]);?>
		<td   ><?=find_wrong_name($law[0])?></td>
		<td   ><?=$law[1]?></td>
		<? $me = find_me($rs[user_id1]);?>
		<td   >&nbsp;<?=find_medal_name($me[0])?></td>
		<td   align="center"><? if($me[1]<>"" and $me[1]<>"0000-00-00"  ){echo date_format_th_1($me[1]);}else{echo "";} ?></td>
      </tr>  
      <?  }
	}  
	 ?>
    </table></td>
</tr>
</table>
</td></tr> </table>
<div ><br>
<center><FONT size="2" >จำนวน ทั้งหมด <B><?= $Num_Rows;?></B>&nbsp;ฉบับ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='?action=report_la&Page=$Prev_Page&go_search=$go_search&date_begin1=$date_begin1&date_begin2=$date_begin2'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='?action=report_la&Page=$i&go_search=$go_search&date_begin1=$date_begin1&date_begin2=$date_begin2'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='?action=report_la&Page=$Next_Page&go_search=$go_search&date_begin1=$date_begin1&date_begin2=$date_begin2'> หน้าถัดไป>> </a>";

?>
<br />

</font>
</center>
</div> 
</form>
<center>
<br>
<input type="submit" name="print" value=" พิมพ์" onClick="window.open('report_la_print.php?date_begin1=<?=$date_begin1?>&date_begin2=<?=$date_begin2?>&div_id=<?=$div_id?>&sub_id=<?=$sub_id?>&cat_id=<?=$cat_id?>&type_id=<?=$type_id?>')"/>
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
function find_w_id($div_id,$sub_id,$pos_id,$name,$per_id){
		$sql="SELECT max(w.w_id)as w_id FROM person p, ps_tname_ref ps
left outer join  work w  on w.user_id =p.user_id  
WHERE 1=1 
and p.status =0
and p.ps_tname_id = ps.ps_tname_id
 ";
if($div_id  <>'')$sql .= " AND w.div_id ='$div_id' ";
if($sub_id  <>'')$sql .= " AND w.sub_id ='$sub_id' ";
if($pos_id  <>'')$sql .= " AND w.pos_id ='$pos_id' ";
if($name  <>'')$sql .= " AND p.name  like '%$name%' ";
if($per_id <>''){
	$sql .= " AND w.per_id ='$per_id' ";
}
		$sql .= "	 group by p.user_id  ";
		$sql .= "  order by  w.w_id ";
		$result1 = mysql_query($sql);
		$dd ="";
		while($rs1=mysql_fetch_array($result1)){
				if($rs1[w_id] <>''){
					$dd .= $rs1[w_id].",";
				}
		}
		return substr($dd,0,strlen($dd)-1) ;
}

?>
<? ob_start();?>
<?
include("config.inc.php");

header('Content-type: application/ms-word');
header('Content-Disposition: attachment; filename="testing.doc"'); 
?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">


<style type="text/css">

.style14 {font-family: Tahoma; font-size: 12; }
.style15 {font-family: Tahoma; font-size: 14; }

-->
</style>
  <br />
  <center>
    <span class="style15">แบบรายงานตามกรอบอัตรากำลังข้าราชการ / พนักงาน <br />
</span>
  </center>
  <br />
<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td width="100%" >
	<table width="100%" cellpadding="0" cellspacing="0" border="1"    bordercolor="#000000">
      
	  <tr  class="style14" >
        <td   width="48" rowspan="2"  ><div align="center">ลำดับที่ </div></td>
        <td   colspan="4" height="30" ><div align="center">ข้อมูลบุคคล </div></td>
        <td   colspan="3"> <div align="center">การศึกษา</div></td>
        <td  colspan="6" > <div align="center">ปฏิบัติบัติราชการ</div></td>
        <td  colspan="2"><div align="center">โทษทางวินัย</div></td>
        <td  colspan="2"  align="center"><div align="center">เครื่องราชฯ</div></td>
      </tr>
	  <tr   class="style14">
        <td width="56"  height="30"><div align="center">คำนำ<br />
          หน้าชื่อ</div></td> 
        <td width="120"   ><div align="center">ชื่อ - สกุล </div></td>
        <td width="81"     > <div align="center">เลขประจำตัว<br>
          ประชาชน</div></td>
        <td width="92" ><div align="center">ว/ด/ป/เกิด</div></td>
        <td width="114" ><div align="center">วุฒิการศึกษา</div></td>
		<td width="44"  ><div align="center">สาขา</div></td>
		<td width="86"  ><div align="center">จากสถาบัน</div></td>
		<td width="71"  ><div align="center">ตำแหน่ง<br>
		  ปัจจุบัน</div></td>
		<td width="111"   ><div align="center">ว/ด/ปที่เข้า <br>
		  ที่ดำรงตำแหน่ง</div></td>
		<td width="42"   ><div align="center">ระดับ</div></td>
		<td width="66"     ><div align="center">เงินเดือน</div></td>
		<td width="122"  ><div align="center">ว/ด/ป ที่เข้า <br>
		  ที่เข้ารับราชการ</div></td>
		<td width="74"   ><div align="center">ปีเกษียณ <br />
		  พ.ศ.</div></td>
		<td width="82" ><div align="center">ร้ายแรง / <br />
		  ไม่ร้ายแรง</div></td>
		<td width="76" ><div align="center">ว/ด/ปที่<br />
		  ถูกลงโทษ</div></td>
		<td width="61"   ><div align="center">รับขั้น<br />
		  สูงสุด</div></td>
		<td width="102"  ><div align="center">รับเมื่อ <br />
		  (ราชกิจจา)</div></td>
      </tr>
      <?

		$sql1="SELECT *,p.user_id as user_id1 FROM (person p, ps_tname_ref ps)
			left outer join  work w on w.user_id =p.user_id   ";
		if($div_id <>''  or $sub_id <>'' or $per_id <>'' or $cat_id <>''  or $type_id <>'' )$sql1 .= " and w.w_id in(".find_w_id().") "; 
			$sql1 .= " WHERE 1=1  
			and p.ps_tname_id = ps.ps_tname_id"; 
					if($status <>'') $sql1 .="  and  p.status = $status ";
					if($div_id <>'') $sql1 .= " and w.div_id ='$div_id' ";
					if($sub_id <>'') $sql1 .= " and  w.sub_id ='$sub_id' ";
					if($cat_id <>'') $sql1 .= " and  w.cat_id ='$cat_id' ";
					if($type_id <>'') $sql1 .= " and  w.type_id ='$type_id' ";
 					$sql1 .=" and p.type_mem = 0 group by p.user_id  ";

			$result1 = mysql_query($sql1);

	while($rs=mysql_fetch_array($result1)){
			$i++;
?>
    <tr  bgcolor="<?=$bg?>" class="style14">
	<td   height="30" align="center"><?=$i?></td>
      <td  align="center"  >&nbsp;<? 
		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo ""?></td> 
        <td   >&nbsp;<a href="index.php?action=personnel_story&user_id=<? echo $rs["user_id1"]?>"  target="_blank"><? 
		?><?=$rs[name]?></a></td>
        <td    align="center"> &nbsp;<?=$rs[id_person]?></td>
        <td   align="center"> <? if($rs[birthday]<>"" and $rs[birthday]<>"0000-00-00"  ){echo date_format_th_1($rs[birthday]);}else{echo "";}?>&nbsp;</td>
		<? 
		$ed = find_edu1($rs[user_id1]);
		?>
        <td  align="center"  >&nbsp;<?=$ed[0]?></td>
        <td      >&nbsp;<?=$ed[1]?>&nbsp;</td>
		<td   >&nbsp;<?=$ed[2]?>&nbsp;</td>
		<? 		$w = find_work($rs[user_id1]); ?>
		<td   ><?=$w[0]?>&nbsp;</td>
		<td    align="center"><? if($w[1]<>"" and $w[1]<>"0000-00-00"  ){echo date_format_th_1($w[1]);}else{echo "";} ?>&nbsp;</td>
		<td   align="center" ><?=find_type_name($w[2])?>&nbsp;</td>
		<td   align="center" ><?=$w[3]?>&nbsp;</td>
		<td   align="center" ><? if($rs[date_contain]<>"" and $rs[date_contain]<>"0000-00-00"  ){echo date_format_th_1($rs[date_contain]);}else{echo "";} ?>&nbsp;</td>
		<td   align="center" ><?
	if($rs[birthday]<>"0000-00-00"  ){
		$k =explode("-",$rs[birthday]) ;
		if($k[1] <10){
			 $bb = $k[0] + 60;
			 echo $bb + 543 ;
		}else {
				$bb = $k[0]  + 61;
				echo $bb + 543;
		}
	}
		?>&nbsp;</td>
		<? $law = find_law($rs[user_id1]);?>
		<td   ><?=find_wrong_name($law[0])?>&nbsp;</td>
		<td    align="center"><? if($law[1] <>'0000-00-00' and $law[1] <>''  )echo date_format_th_1($law[1])?>&nbsp;</td>
		<? $me = find_me($rs[user_id1]);?>
		<td   >&nbsp;<?=find_medal_name($me[0])?>&nbsp;</td>
		<td   align="center"><? if($me[1]<>"" and $me[1]<>"0000-00-00"  ){echo date_format_th_1($me[1]);}else{echo "";} ?>&nbsp;</td>
      </tr>  
      <? 	
} 
	 
	 ?>
	     <tr  class="style14" >
	<td   height="30" align="center">รวม</td>
        <td    align="center">&nbsp;<?=$i?></td>
        <td    align="center">&nbsp;คน </td>
        <td   align="center">&nbsp;</td>
		<? 
		$ed = find_edu1($rs[user_id1]);
		?>
        <td  align="center"  >&nbsp;</td>
        <td      >&nbsp;&nbsp;</td>
		<td   >&nbsp;&nbsp;</td>
		<? 		$w = find_work($rs[user_id1]); ?>
		<td   >&nbsp;</td>
		<td    align="center">&nbsp;</td>
		<td   align="center" >&nbsp;</td>
		<td   align="center" >&nbsp;</td>
		<td   align="center" >&nbsp;</td>
		<td   align="center" >&nbsp;</td>
		<td   >&nbsp;</td>
		<td    align="center">&nbsp;</td>
		<td   >&nbsp;&nbsp;</td>
		<td   align="center">&nbsp;</td>
		<td   align="center">&nbsp;</td>
      </tr>  
    </table></td>
</tr>
</table>
</form>
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
function find_w_id($div_id,$sub_id,$pos_id,$name,$per_id,$status){
$sql="SELECT max(w.w_id)as w_id 
FROM person p, ps_tname_ref ps, work w  
WHERE 1=1 
and w.user_id =p.user_id  
and p.ps_tname_id = ps.ps_tname_id
 ";
if($status <>'') $sql .="  and  p.status = $status ";
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
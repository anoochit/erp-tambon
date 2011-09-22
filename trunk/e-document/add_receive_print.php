<?
header('Content-type: application/ms-word');
header('Content-Disposition: attachment; filename="testing.doc"'); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
include('config.inc.php');
?>
<style type="text/css">
.style1 {font-family: "Microsoft Sans Serif"; font-size: 16px; }
.style7 {font-family: "Microsoft Sans Serif"; font-size: 12px; }
.style9 {font-family: "Microsoft Sans Serif"; font-size: 12px; font-weight: bold; }
</style>
<center>
<div class="style1">รายงานหนังสือรับ <br><br> หน่วยงาน  <? if($dep == 'all') echo "ทั้งหมด";else echo find_depart_name($dep) ?>  วันที่ <?=$recieve_date?></div>
<br>
</center>
<table cellpadding="0" cellspacing="0" border="1"  width="100%" bordercolor="#000000" >
	<tr>
		<td  align="center" height="25" width="96"><span class="style9"> กองที่รับผิดชอบ	</span></td>			
		<td  align="center" height="25" width="94"><span class="style9"> เลขที่		</span></td>
		<td  align="center" height="25" width="86"><span class="style9">ที่	</span></td>
		<td  align="center" height="25" width="86"><span class="style9"> วันที่รับ		</span></td>
		<td   align="center" height="25" width="182"><span class="style9"> เรื่อง		</span></td>
		<td  align="center" height="25" width="117"><span class="style9">รายละเอียด	</span></td>
		<td  align="center" height="25" width="59"><span class="style9">จาก	</span></td>
	</tr>
<?
include("day_func.php");
$sql = "SELECT d.doc_id,d.topic,d.put_date_on,d.recieve_date,d.finish_date,d.file_id,d.warning,d.receive_id ,u.dep_id,s.send_date,s.stamp_date,s.send_id,d.rep_from,d.dep_ref
FROM documentary d, send_doc s,user_account u
Where d.file_id = s.file_id 
and s.send_id = u.user_id ";
if($dep <>'all'){
	$sql  .=" and s.send_id = ".$dep ; 
}
if($recieve_date <>''){
	$sql  .=" and s.stamp_date  = '".date_format_sql($recieve_date)."'" ; 
}
$sql  .= " and (s.status = 'ลงรับแล้ว' or s.status = 'ดำเนินการแล้ว' )
group by s.file_id,s.send_id
ORDER BY s.stamp_date DESC ";
$result = mysql_query($sql);
$x = 1;
while($rs=mysql_fetch_array($result)){
	$start_date = date_format_th($rs["put_date_on"]);
	$finish_date = date_format_th($rs["finish_date"]);
	$date_long = count_day($start_date,$finish_date);
	$green_date = green_day($finish_date,$date_long);
	$orange_date = orange_day($finish_date,$date_long);
	$red_date = red_day($finish_date,$date_long);
	$cur_date =  DATE('d/m/Y');
?>
<tr  class="" bgcolor="<? echo $color?>" >
		  <td align="left" height="25" width="96"><span class="style7">&nbsp; <? echo $rs["dep_id"]?>		</span></td>
		  <td align="left" height="25" width="94"><span class="style7">&nbsp; <? echo $rs["receive_id"]?>		</span></td>
		  <td  align="left" height="25" width="86"> <span class="style7">&nbsp;<? echo $rs["doc_id"]?>    </span></td>
		  <td align="center" height="25" width="86"><span class="style7">&nbsp;<? echo date_format_th($rs["recieve_date"])?></span></td>
		  <td align="left" height="25" width="182"  valign="middle"><span class="style7">&nbsp;&nbsp; <? echo $rs[topic]; ?>	 </span></td>
		  <td  align="left" height="25" width="117"><span class="style7">&nbsp;<? remark($rs["file_id"]); ?>
		  </span></td>
		  <td align="center" height="25" width="59"><span class="style7">&nbsp;<? echo $rs["dep_ref"]?>		</span></td></tr>
	<? }?>
    </table>
<?
function remark($file_id){
	$sql1 ="select * from send_doc where file_id = $file_id group by id ";
	$result = mysql_query($sql1);
	while($rs = mysql_fetch_array($result)){
		if( $rs[remark] <>'' or $rs[remark] <> NULL){
			echo find_depart_name($rs[send_id])."    ".$rs[remark]."<br>";
		}
	}
}

?>
	
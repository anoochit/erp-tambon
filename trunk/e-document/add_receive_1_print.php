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
<div class="style1">รายงานหนังสือรับ <br><br> หน่วยงาน  <? if($dep == 'all') echo "ทั้งหมด";else echo find_depart_name($dep) ?>  วันที่ <?
	if($recieve_date == "" || $recieve_date == "--" || $recieve_date == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time(date_format_sql($recieve_date));
		}
?></div>
<br>
</center>
<table cellpadding="0" cellspacing="0" border="1"  width="950" bordercolor="#000000"  align="center">
	<tr>
		<td  align="center" height="25" width="95"><span class="style9"> กองที่รับผิดชอบ	</span></td>
		<td  align="center" height="25" width="93"><span class="style9"> เลขที่		</span></td>
		<td  align="center" height="25" width="85"><span class="style9">ที่	</span></td>
		<td  align="center" height="25" width="85"><span class="style9"> วันที่ลงรับ		</span></td>
		<td   align="center" height="25" width="181"><span class="style9"> เรื่อง		</span></td>
		<td  align="center" height="25" width="91"><span class="style9">ข้อความต่อท้าย	</span></td>
		<td  align="center" height="25" width="89"><span class="style9">จาก	</span></td>
	</tr>
<?
include("day_func.php");
$sql = "SELECT d.doc_id,d.topic,d.put_date_on,d.recieve_date,d.finish_date,d.file_id,d.warning,d.receive_id ,s.stamp_date,s.send_id ,s.remark , s.stamp_dateTime
FROM documentary d, send_doc s
Where d.file_id = s.file_id ";
 if($dep <>'all'){
	$sql  .="and s.send_id = '". find_dep_id($dep)."'"; 
}
if($recieve_date <>'' and  $dep <>'all'){
		$sql  .=" and s.stamp_date = '".date_format_sql($recieve_date)."'" ; 
}else{
		$sql  .=" AND recieve_date ='".date_format_sql($recieve_date)."'";
}
$sql .= "  and d.type_doc = 'รับเข้า' ";
$sql .= " group by d.file_id ORDER BY recieve_date desc,abs(mid(receive_id,1,2) )desc ,abs(mid(receive_id,4) ) desc ";
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
		  <td align="left" height="25" width="95"><span class="style7">&nbsp; <?  echo find_dep_name($rs["send_id"])?>		</span></td>
		  <td align="left" height="25" width="93"><span class="style7">&nbsp; <? if($rs["receive_id"] <>'' or $rs["receive_id"] <> 0) echo $rs["receive_id"];else echo "-"?>		</span></td>
		  <td  align="left" height="25" width="85"> <span class="style7">&nbsp;<? echo $rs["doc_id"]?>    </span></td>
		  <td align="center" height="25" width="85"><span class="style7">&nbsp;<? 
		  	if($dep <>'all'){
		  if($rs["stamp_date"] <>'0000-00-00'){
		 		 echo date_time($rs["stamp_date"]) ;
				 $time = explode(" ",$rs["stamp_dateTime"]);
				 echo "&nbsp;/&nbsp;".$time[1];
		  }
	}else{
		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--" || $rs["recieve_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["recieve_date"]);
		}
	}
?></span></td>
		  <td align="left" height="25" width="181"  valign="middle"><span class="style7">&nbsp;&nbsp;<? echo $rs[topic]; ?>	</span></td>
		  <td  align="left" height="25" width="91"><span class="style7">&nbsp;<? echo $rs["remark"]?> </span></td>
		  <td align="left"  height="25" width="89"><span class="style7">&nbsp;<? echo $rs["dep_ref"]?>		</span></td>
  </tr>
	<? }?>
    </table>
<?
function remark($file_id){
	$sql1 ="select * from send_doc where file_id = $file_id group by remark ";
	$result = mysql_query($sql1);
	while($rs = mysql_fetch_array($result)){
		if(trim($rs[remark]) <>'' or trim($rs[remark]) <> NULL){
			echo find_depart_name($rs[send_id])."    ".$rs[remark]."<br>";
		}
	}
}
function find_dep_id($dep_name){
	$sql1 ="select * from user_account where dep_id = '$dep_name' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[user_id];
}
?>
	
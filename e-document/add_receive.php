<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style.css" rel="stylesheet" type="text/css">

<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">

<tr>
	<td width="657" valign="top">
	<form name="search" method="post">
<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" background="images/bg_1.gif">
	<tr>

		<td background="images/bar.gif"  align="left" height="25"  colspan="4">
		  <strong>&nbsp;&nbsp;&nbsp;รายงานลงรับแล้ว</strong> </td>
	</tr>
	<tr>
	<td colspan="4" height="30"><div align="center"><strong>ค้นหา </strong></div></td>
	</tr>
	<tr>
	<td width="14%"  height="30" >&nbsp;</td>
	<td colspan="2" align="center"><div align="right"><strong>หน่วยงาน </strong></div></td>
<td width="52%">
  <div align="left">
    <select name="dep">	
      <option value="all" <? if($dep== 'all' ) echo "selected"?>>ทั้งหมด</option>
      <?
	$sql_user = "SELECT * FROM user_account WHERE username !='demo' and  username !='admin' 
	 and  dep_id !='all'  ORDER BY dep_id";
	$result = mysql_query($sql_user);
	$i = 0;
	while($rs1 = mysql_fetch_array($result)){
	$i++;
?>	
      <option value="<?=$rs1["user_id"]?>" <? if($dep ==$rs1["user_id"] ) echo "selected"?>>
        <? 
	if(strstr($rs1["firsname"],"หัวหน้า") ==true){
		echo substr($rs1["firsname"],7);
	}else{
		echo $rs1["firsname"];
	}
		?>
        </option>
      <? }?>
    </select>
  </div></td>
	</tr>
	<tr>
	<td width="14%"  height="30" >&nbsp;</td>
	<td colspan="2" align="center"><div align="right"><strong>วันที่ </strong></div></td>
<td width="52%">
  <div align="left">
    <input type="text" name="recieve_date" value="<?  if($recieve_date =='') echo date('d/m/Y') ; else echo $recieve_date?>" size="10" maxlength="100"  id="recieve_date"> 
    <IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('recieve_date','DD/MM/YYYY');"></div></td>
	</tr>
		<tr >
	<td colspan="4" height="30" align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search" value=" ค้นหา "> </td>
	</tr>
</table>
</form>
<br>
	<? if($search <> ''){?>
	<table cellpadding="0" cellspacing="0" border="0"  >
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="124"> กองที่รับผิดชอบ	</td>
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="67"> เลขที่		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="77">ที่	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="89"> วันที่รับ		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td  background="images/bar.gif" align="center" height="25" width="151"> เรื่อง		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="93">รายละเอียด	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="72">จาก	</td>	
	</tr>
<?
include("day_func.php");
$sql = "SELECT d.doc_id,d.topic,d.put_date_on,d.recieve_date,d.finish_date,d.file_id,d.warning,d.receive_id ,u.dep_id,s.send_date,s.stamp_date,s.send_id,d.rep_from,d.dep_ref
FROM documentary d, send_doc s,user_account u
Where d.file_id = s.file_id
and s.send_id = u.user_id
 ";
if($dep <>'all'){
	$sql  .="and s.send_id = ".$dep ; 
}
if($recieve_date <>''){
	$sql  .=" and s.stamp_date  = '".date_format_sql($recieve_date)."'" ; 
}
$sql  .= "  and (s.status = 'ลงรับแล้ว' or s.status = 'ดำเนินการแล้ว' )
group by s.file_id,s.send_id
ORDER BY s.stamp_date DESC ";
$result = mysql_query($sql);
$x = 1;
while($rs=mysql_fetch_array($result)){

if($rs["finish_date"] != ""){

	$start_date = date_format_th($rs["put_date_on"]);
	$finish_date = date_format_th($rs["finish_date"]);
	$date_long = count_day($start_date,$finish_date);
	$green_date = green_day($finish_date,$date_long);
	$orange_date = orange_day($finish_date,$date_long);
	$red_date = red_day($finish_date,$date_long);
	$cur_date =  DATE('d/m/Y');
	if(trim($rs["warning"]) == "no"){ // เลยวันสิ้นสุด
			$color = "#FFFFFF";
	}else	if(date_diff($cur_date,$finish_date) > 0 && trim($rs["warning"]) == "yes"){ // เลยวันสิ้นสุด // แดง
			$color = "#FF9191";
	}elseif(date_diff($cur_date,$finish_date) <=0 && date_diff($cur_date,$red_date) > 0 && trim($rs["warning"]) == "yes"){   //ส้ม
			$color = "#FFD6C1";
	}elseif( date_diff($cur_date,$red_date) <= 0  && date_diff($cur_date,$green_date)  > 0  && trim($rs["warning"]) == "yes"){  //เหลือง
			$color = "#FFFFAA";
	}elseif(date_diff($cur_date,$green_date) <=0 && date_diff($cur_date,$start_date) >= 0  && trim($rs["warning"]) == "yes"){  // วันเขียว
			$color = "#B0FFB0";
	}else {
		$color = "#FFFFFF";
	}
}else {
		$color = "#FFFFFF";
}
?>
<a href="index.php?action=view&file_id=<?echo $rs["file_id"]?>"   target="_blank">
<tr  class="" bgcolor="<? echo $color?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
  <td align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="124">&nbsp; <? echo $rs["dep_id"]?>		</td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="67">&nbsp; <? echo $rs["receive_id"]?>		</td>
		  <td align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="77">&nbsp; <? echo $rs["doc_id"]?> </td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="center" height="25" width="89">&nbsp; <? echo date_format_th($rs["recieve_date"])?></td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="151">&nbsp; <? echo $rs[topic];?>	</td>
		  <td  align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="93">&nbsp; <? remark($rs["file_id"]); ?></td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="center" height="25" width="72">&nbsp; <? echo $rs["dep_ref"]?>		</td>
	  </tr></a><? $x = $x +1; }?>
	<tr><td colspan="20" align="center" height="30">
	<input type="submit" name="print" value=" พิมพ์ "  onclick="window.open('add_receive_print.php?dep=<?=$dep?>&recieve_date=<?=$recieve_date?>')">
	</td> </tr>
    </table>
<? }?>
</td>
</tr>
</table>
</center>
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
	
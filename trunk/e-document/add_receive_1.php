<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style.css" rel="stylesheet" type="text/css">
<table name="body" width="657" cellpadding="0" cellspacing="0"   align="center">
<tr>
	<td width="657"  >
	<form name="search" method="post">
<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" background="images/bg_1.gif">
	<tr>
		<td background="images/bar.gif"  align="left" height="25"  colspan="4">
		  <strong>&nbsp;&nbsp;&nbsp;รายงานเอกสารลงรับแล้ว</strong> </td>
	</tr>
	<tr>
	<td colspan="4" height="30"><div align="center"><strong>ค้นหา </strong></div></td>
	</tr>
	<tr>
	<td width="14%"  height="30" >&nbsp;</td>
	<td colspan="2" align="center"><div align="right"><strong>หน่วยงาน </strong></div></td>
<td width="52%">
  <div align="left">
  <?
  	$sql_user = "SELECT * FROM department order by dep_name";
	$result = mysql_query($sql_user);
  ?>
    <select name="dep">	
      <option value="all" <? if($dep== 'all' ) echo "selected"?>>สารบรรณกลางรับ</option>
      <?
	$i = 0;
	while($rs1 = mysql_fetch_array($result)){
	$i++;
?>	
      <option value="<?=$rs1["dep_id"]?>" <? if($dep ==$rs1["dep_id"] ) echo "selected"?>>
	<?=$rs1["dep_name"]?>
        </option>
      <? }?>
    </select>
  </div></td>
	</tr>
	<tr>
	<td width="14%"  height="30" >&nbsp;</td>
	<td colspan="2" align="center"><div align="right"><strong>วันที่ลงรับ </strong></div></td>
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
	<? if($search <> ''){?>
	<table cellpadding="0" cellspacing="0" border="0"  width="100%" >
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="176"> กองที่รับผิดชอบ	</td>
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="69"> เลขที่		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="87">ที่	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="121"> วันที่ลงรับ / เวลา		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td  background="images/bar.gif" align="center" height="25" width="159"> เรื่อง		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="163">ข้อความต่อท้าย	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="102">จาก	</td>	
	</tr>
<?
include("day_func.php");
$sql = "SELECT d.doc_id,d.topic,d.put_date_on,d.recieve_date,d.finish_date,d.file_id,d.warning,d.receive_id ,s.stamp_date,s.send_id ,s.remark , s.stamp_dateTime
FROM documentary d, send_doc s
Where d.file_id = s.file_id  ";
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

if($rs["finish_date"] != ""){

	$start_date = date_format_th($rs["put_date_on"]);
	$finish_date = date_format_th($rs["finish_date"]);
	$date_long = count_day($start_date,$finish_date);
	$green_date = green_day($finish_date,$date_long);
	$orange_date = orange_day($finish_date,$date_long);
	$red_date = red_day($finish_date,$date_long);
	$cur_date =  DATE('d/m/Y');
	if(trim($rs["warning"]) == "no"){ // เลยวันสิ้นสุด
			if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
	}else	if(date_diff1($cur_date,$finish_date) > 0 && trim($rs["warning"]) == "yes"){ // เลยวันสิ้นสุด // แดง
			$color = "#FF9191";
	}elseif(date_diff1($cur_date,$finish_date) <=0 && date_diff1($cur_date,$red_date) > 0 && trim($rs["warning"]) == "yes"){   //ส้ม
			$color = "#FFD6C1";
	}elseif( date_diff1($cur_date,$red_date) <= 0  && date_diff1($cur_date,$green_date)  > 0  && trim($rs["warning"]) == "yes"){  //เหลือง
			$color = "#FFFFAA";
	}elseif(date_diff1($cur_date,$green_date) <=0 && date_diff1($cur_date,$start_date) >= 0  && trim($rs["warning"]) == "yes"){  // วันเขียว
			$color = "#B0FFB0";
	}else {
		if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
	}
}else {
		$color = "#FFFFFF";
}

if((($x)%2) == 1) {
				$color = "#FFFFFF";
			}else {
				$color = "#D1D1D1";
			}

?>
<tr bgcolor="<? echo $color?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#E0FFFF'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
  <td align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="176">&nbsp; <? echo find_dep_name($rs["send_id"])?>		</td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="69">&nbsp; <? if($rs["receive_id"] <>'' or $rs["receive_id"] <> 0) echo $rs["receive_id"];else echo "-"?>		</td>
		  <td align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="87">&nbsp; <? echo $rs["doc_id"]?>     </td>
		  <td  align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="121">&nbsp;<? 
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
?></td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="159"><a href="index.php?action=view&file_id=<?echo $rs["file_id"]?>"   target="_blank" class="catLink5"><? echo $rs[topic]; ?></a>	</td>
		  <td  align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="163">&nbsp;<? echo  $rs["remark"]?></td>
		  <td  align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="102">&nbsp;<? echo $rs["dep_ref"]?>		</td>
	  </tr></a>
	<? $x = $x +1; }?>
	<? if(mysql_num_rows($result) > 0){?>
	<tr><td colspan="20" align="center" height="30"><input type="submit" name="print" value=" พิมพ์ "  onclick="window.open('add_receive_1_print.php?dep=<?=$dep?>&recieve_date=<?=$recieve_date?>')">
	</td> </tr>
	<? }?>
    </table>
<? }?>
</td>
</tr>
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
	
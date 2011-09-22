<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style.css" rel="stylesheet" type="text/css">


<table name="body" width="100%" cellpadding="0" cellspacing="0"   align="center">
<tr>
	<td width="100%"  >
	<form name="search" method="post">
<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" background="images/bg_1.gif">
	<tr>

		<td background="images/bar.gif"  align="left" height="25"  colspan="4">
		  <strong>&nbsp;&nbsp;&nbsp;รายงานการแจ้งเตือน</strong> </td>
	</tr>
	<tr>
	<td  height="30" colspan="2"><div align="center"><strong>ค้นหา </strong></div></td>
	</tr>
	<tr>

	<td width="44%" align="center"><div align="right"><strong>เลขที่เอกสาร</strong></div></td>
<td width="56%">
  <div align="left">
 <input type="text" name="doc_id" value="<? if($_REQUEST["doc_id"] != ""){echo $_REQUEST["doc_id"];} ?>" size="30"> </div></td>
	</tr>
	<tr>

	<td align="center"><div align="right"><strong>เรื่อง</strong></div></td>
<td width="56%">
  <div align="left">
    <input type="text" name="topic" value="<? if($_REQUEST["topic"] != ""){echo $_REQUEST["topic"];} ?>" size="50"> </div></td>
	</tr>
	<!--<tr>

	<td width="44%" align="center"><div align="right"><strong>ลงวันที่</strong></div></td>
<td width="56%">
  <div align="left">
    <input type="text" name="put_date" value="<? if($put_date =='') echo date('d/m/Y') ; else echo $put_date?>" size="10" maxlength="100"  id="put_date"> 
    <IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('put_date','DD/MM/YYYY');"> &nbsp;&nbsp;ถึง&nbsp;&nbsp; <input type="text" name="put_date1" value="<? if($put_date1 =='') echo date('d/m/Y') ; else echo $put_date1?>" size="10" maxlength="100"  id="put_date1"> 
    <IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('put_date1','DD/MM/YYYY');"> </div></td>
	</tr>
	<tr>

	<td align="center"><div align="right"><strong>วันที่สิ้นสุด</strong></div></td>
<td width="56%">
  <div align="left">
    <input type="text" name="f_date" value="<? echo $f_date //  if($f_date =='') echo date('d/m/Y') ; else echo $f_date?>" size="10" maxlength="100"  id="f_date"> 
    <IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('f_date','DD/MM/YYYY');"> &nbsp;&nbsp;ถึง&nbsp;&nbsp; <input type="text" name="f_date1" value="<? echo $f_date1 //if($f_date1 =='') echo date('d/m/Y') ; else echo $f_date1?>" size="10" maxlength="100"  id="f_date1"> 
    <IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('f_date1','DD/MM/YYYY');"> </div></td>
	</tr> -->
		<tr >
	<td colspan="4" height="30" align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search" value=" ค้นหา "> </td>
	</tr>
</table>
</form>
	<? //if($search <> ''){?>
	<table cellpadding="0" cellspacing="0" border="0"  width="100%" >
	<tr>
<!--		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="176"> กองที่รับผิดชอบ	</td> -->
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="69"> เลขที่		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="87">เลขที่เอกสาร	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="121"> วันที่ลงรับ 	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="121"> ลงวันที่	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="121"> วันที่สิ้นสุด	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td  background="images/bar.gif" align="center" height="25" width="159"> เรื่อง		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<!--<td background="images/bar.gif" align="center" height="25" width="126">สิ่งที่ส่งมาด้วย	</td> -->
<!--		<td background="images/bar.gif" align="center" height="25" width="163">ข้อความต่อท้าย	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="102">จาก	</td> -->
		
	
	</tr>
	
<?
include("day_func.php");

$sql = "SELECT doc_id,topic,put_date_on,recieve_date,finish_date,file_id,warning,receive_id
FROM documentary d Where 1 =  1 and  warning = 'yes' ";
if($doc_id  <>'' ){
		$sql  .=" and doc_id like '%".$doc_id."%' " ; 
}
if($topic  <>'' ){
		$sql  .=" and topic like '%".$topic."%' " ; 
}
if($put_date <>'' and  $put_date1 <>''){
		$sql  .=" and put_date_on >= '".date_format_sql($put_date)."' and put_date_on <= '".date_format_sql($put_date1)."'" ; 
}
if($f_date <>'' and  $f_date1 <>''){
		$sql  .=" and finish_date >= '".date_format_sql($put_date)."' and finish_date <= '".date_format_sql($put_date1)."'" ; 
}
$sql .= "  and type_doc = 'รับเข้า' ";

$sql .= " group by file_id ORDER BY put_date_on desc,abs(mid(receive_id,1,2) )desc ,abs(mid(receive_id,4) ) desc ";


$Per_Page =20;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
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

print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql .= " LIMIT $Page_start , $Per_Page";
//echo $sql ."<br>";
$result = mysql_query($sql);
$x = 1;
if($result)
while($rs=mysql_fetch_array($result)){

if($rs["finish_date"] != ""){

	$start_date = date_format_th($rs["put_date_on"]);
	$finish_date = date_format_th($rs["finish_date"]);
	$date_long = count_day($start_date,$finish_date);
//echo count_day($start_date,$finish_date)."<br>";
	$green_date = green_day($finish_date,$date_long);
	$orange_date = orange_day($finish_date,$date_long);
	$red_date = red_day($finish_date,$date_long);
//echo $green_date."  ".$orange_date."  ".$red_date;
	$cur_date =  DATE('d/m/Y');
	//echo date_diff1($cur_date,$finish_date)."<br>";
	if(date_diff1($cur_date,$finish_date) > 0 ){ // เลยวันสิ้นสุด // แดง
			$color = "#FF9191";
	}elseif(date_diff1($cur_date,$finish_date) <=0 && date_diff1($cur_date,$red_date) > 0 ){   //ส้ม
			$color = "#FFD6C1";
	}elseif( date_diff1($cur_date,$red_date) <= 0  && date_diff1($cur_date,$green_date)  > 0  ){  //เหลือง
			$color = "#FFFFAA";
	}elseif(date_diff1($cur_date,$green_date) <=0 && date_diff1($cur_date,$start_date) >= 0  ){  // วันเขียว
			$color = "#B0FFB0";
	}else {
		//$color = "#FFFFFF";
		if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
	}
}

		/*if((($x)%2) == 1) {
				$color = "#FFFFFF";
			}else {
				$color = "#D1D1D1";
			}*/

?>
<!--<a href="index.php?action=view&file_id=<?echo $rs["file_id"]?>"   target="_blank"> -->
<tr bgcolor="<? echo $color?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#E0FFFF'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
<!--  <td align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="176">&nbsp; <? echo find_dep_name($rs["send_id"])//$rs["dep_id"]?>		</td> -->
		  <td  align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="69">&nbsp; <? if($rs["receive_id"] <>'' or $rs["receive_id"] <> 0) echo $rs["receive_id"];else echo "-"?>		</td>
		  <td align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="87"> <? echo $rs["doc_id"]?> 
		     	    </td>
		  <td  align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="121">&nbsp;<? 

		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--" || $rs["recieve_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["recieve_date"]);
		}
?></td>
	  <td  align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="121">&nbsp;<? 

		if($rs["put_date_on"] == "" || $rs["put_date_on"] == "--" || $rs["put_date_on"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["put_date_on"]);
		}
?></td>
	  <td  align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="121">&nbsp;<? 

		if($rs["finish_date"] == "" || $rs["finish_date"] == "--" || $rs["finish_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["finish_date"]);
		}
?></td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="159">&nbsp;<a href="index.php?action=view&file_id=<?echo $rs["file_id"]?>"   target="_blank" class="catLink5">
	          <?
		echo $rs[topic];
		?></a>	</td>
<!--			  <td  align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="163">
	  <? echo  $rs["remark"]//remark($rs["file_id"]);?>
		          <?
		//$rs["send_from"];
		?></td>
	  <td  align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="102"><? echo $rs["dep_ref"]?>		</td> -->
	  </tr></a>
	<? $x = $x +1; }?>
<!--	<tr><td colspan="20" align="center" height="30">
	<input type="submit" name="print" value=" พิมพ์ "  onclick="window.open('add_receive_1_print.php?dep=<?=$dep?>&recieve_date=<?=$recieve_date?>')">
	</td> </tr> -->
    </table>
<? //}?>

<!------------------------------------------------------------------ -->	</td>
</tr>

</table>
<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=report_alert&Page=$Prev_Page&doc_id=$doc_id&topic=$topic'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=report_alert&Page=$i&doc_id=$doc_id&topic=$topic'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=report_alert&Page=$Next_Page&doc_id=$doc_id&topic=$topic'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 

	
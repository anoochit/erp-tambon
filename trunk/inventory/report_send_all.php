
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body><br>
<form name="f12" method="post"  action=""   >
<br>
<?

if($search <>''){

$sql="SELECT  c.*,m.* , c.c_id as c_id1 from receive r
left outer join receive_detail rd on  r.r_id = rd.r_id 
left outer join code c on  c.rd_id = rd.rd_id
left outer join move m on  c.m_id = m.m_id
WHERE 1 = 1   ";
if($num_id  <> '' ){
	$sql .= " AND r.num_id like '$num_id%'  ";
}
if($paper_id  <> '' ){
	$sql .= " AND r.paper_id like '$paper_id%'  ";
}
if($rd_name <> '' ){
	$sql .= " AND rd.rd_name like '$rd_name%'  ";
}
if($type_id <> '' ){
	$sql .= " AND rd.type_id = '$type_id'  ";
}
if($code1 <> '' ){
	$sql .= " AND c.code like '$code1%'  ";
}
if($date_receive <> ''){
	$sql .= " AND r.date_receive = '".date_format_sql($date_receive)."'  ";
}
if($year <> '' ){
	$sql .= " AND r.paper_id like'%-".substr($year,2)."%' ";
}
$sql .= " and r.type = 0 ";
$sql .= " order by abs(r.paper_id) desc ";

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
$sql .= " LIMIT $Page_start , $Per_Page";

}
$result1 = mysql_query($sql);

?>
<table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
      <td  height="28" colspan="6"><div  align="left">&nbsp;&nbsp;รายงานจัดสรรครุภัณฑ์</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#C1E0FF">
        <td width="6%"  height="31"><div align="center"><strong>ที่</strong></div></td>
		<td width="19%"  height="31"><div align="center"><strong>โรงเรียน</strong></div></td>
         <td width="24%" ><div align="center"><strong>รหัสครุภัณฑ์</strong></div></td>
	<td width="18%"  align="center"><strong>หมายเลขเครื่อง</strong></td> 
         <td width="18%" ><div align="center"><strong>หมายเลขจอ</strong></div></td>
    <td width="15%"  align="center"><strong>หมายเหตุ</strong></td> 
          </tr>
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>       
<a href="show_control.php?c_id=<?=$rs[c_id1]?>" target="_blank" >
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#FFCC00'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $i; ?></font></font></td>
  <td  height="25" align="left"><font size="2">&nbsp;<font size="2"><? echo $rs[user]; ?></font></font></td>
 <td  align="left">&nbsp;<font size="2"><? echo $rs[code];  ?></font></td>
   <td align="center" >&nbsp;<font size="2"><? echo $rs[num_machine];  ?> </font> </td>
              <td  align="center" >&nbsp;<font size="2"><?=$rs[screen]?></font></td>                                 
 <td  >&nbsp;<font size="2"><?=$rs[remark]?></font></td>
          </tr>
</a>
 <? 

	}
?>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center">
<input  type="button" name="print" value=" ส่งออก Excel ทั้งหมด "  onclick="window.open('report_send_print.php?num_id=<?=$num_id?>&code1=<?=$code1?>&date_receive=<?=$date_receive?>&rd_name=<?=$rd_name?>&type_id=<?=$type_id?>&year=<?=$year?>')"/>
<br><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=report_send&search=$search&Page=$Prev_Page&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id&year=$year'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=report_send&search=$search&Page=$i&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id&year=$year'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=report_send&search=$search&Page=$Next_Page&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id&year=$year'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</body>
</html>

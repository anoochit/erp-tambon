
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style2.css" rel="stylesheet" type="text/css">
<body>
<form name="f12" method="post"  action=""   >
<br>
<table  width="60%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="25">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div><img src="images/Search.png"  align="absmiddle">&nbsp;&nbsp;รายงานจัดสรรครุภัณฑ์</div>	</td>
	</tr>
</table>
	</td>
	</tr>

  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;รายชื่อผู้ได้รับการจัดสรร</strong></td>
    <td>&nbsp;<input type="text" name="rd_name" value="<?=$rd_name?>" size="30"></td>
  </tr>  
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
                    <td width="41%"><strong>&nbsp;&nbsp;ปีงบประมาณ</strong></td>
			
                    <td width="59%">&nbsp;<select name="year">
	<option value="" <? if($year =='' ) echo "selected"?>>- - ทั้งหมด - -</option>
	<?
	for($i=-10;$i<=2;$i++){
	?>
	<option value="<?=date("Y") + 543+$i?>" <? if($year ==(date("Y") + 543+$i) ) echo "selected"?>><?=date("Y") + 543+$i?></option>
	<?
	}
	?>
	</select></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				    <tr class="bmText" height="25">
                    <td width="41%"><strong>&nbsp;&nbsp;ชื่อส่วนราชการ</strong></td>
    <td>&nbsp;<?
		$query="select * from division order by div_id";
			$result=mysql_query($query);
			?><select name="department"  >
          <option  value=""> - - - - ทั้งหมด - - - -</option>
          <? while($d =mysql_fetch_array($result)){		?>
          <option value="<? echo $d[div_id];?>"
		<?
		if($department == $d[div_id]  ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
          <? }?>
        </select></td>
  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>

<br>
<?

if($search <>''){

$sql="SELECT c.code, m.user,c.num_machine , c.screen , m.remark from (receive r ,code c)
left  join receive_detail rd on  r.r_id = rd.r_id 

left  join move m on  c.c_id = m.c_id
WHERE 1 = 1  and c.rd_id = rd.rd_id ";
if($num_id  <> '' ){
	$sql .= " AND r.num_id like '$num_id%'  ";
}

if($paper_id  <> '' ){
	$sql .= " AND r.paper_id like '$paper_id%'  ";
}

if($department <> '' ){
	$sql .= " AND m.department ='$department'  ";
}
if($rd_name <> '' ){
	$sql .= " AND m.user like '%$rd_name%'  ";
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
$sql .= " group by c.c_id ";
$sql .= " order by abs(r.paper_id) desc ";
//echo $sql."<br>";
$Per_Page =10;
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

}
$result = mysql_query($sql);

?>
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
      <td  height="28" colspan="6" style="border: #000000 1px solid;" ><div  align="left">&nbsp;&nbsp;รายงานจัดสรรครุภัณฑ์</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#C1E0FF">
        <td width="6%"  height="31" style="border: #000000 1px solid;" ><div align="center"><strong>ที่</strong></div></td>
		<td width="19%"  height="31" style="border: #000000 1px solid;" ><div align="center"><strong>ชื่อผู้ได้รับการจัดสรร</strong></div></td>
         <td width="24%" style="border: #000000 1px solid;" ><div align="center"><strong>รหัสครุภัณฑ์</strong></div></td>
	<td width="18%"  align="center" style="border: #000000 1px solid;" ><strong>หมายเลขเครื่อง</strong></td> 
         <td width="18%" style="border: #000000 1px solid;" ><div align="center"><strong>หมายเลขจอ</strong></div></td>
    <td width="15%"  align="center" style="border: #000000 1px solid;" ><strong>หมายเหตุ</strong></td> 
          </tr>
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
if($result)
while($rs=mysql_fetch_array($result)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>       
<a href="show_control.php?c_id=<?=$rs[c_id1]?>" target="_blank" >
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#FFCC00'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center" style="border: #000000 1px solid;" ><font size="2">&nbsp;<font size="2"><? echo $i; ?></font></font></td>
  <td  height="25" align="left" style="border: #000000 1px solid;" ><font size="2">&nbsp;<font size="2"><? echo $rs[user]; ?></font></font></td>
 <td  align="left" style="border: #000000 1px solid;" >&nbsp;<font size="2"><a href="show_control.php?c_id=<?=$rs[c_id1]?>" target="_blank" ><? echo $rs[code];  ?></font></td>
   <td align="center" style="border: #000000 1px solid;" >&nbsp;<font size="2"><? echo $rs[num_machine];  ?> </font> </td>
              <td  align="center" style="border: #000000 1px solid;" >&nbsp;<font size="2"><?=$rs[screen]?></font></td>                                 
 <td  style="border: #000000 1px solid;" >&nbsp;<font size="2"><?=$rs[remark]?></font></td>
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

<input  type="button" name="print" value=" ส่งออก Excel ทั้งหมด "  onclick="window.open('report_send_print.php?num_id=<?=$num_id?>&code1=<?=$code1?>&date_receive=<?=$date_receive?>&rd_name=<?=$rd_name?>&type_id=<?=$type_id?>&year=<?=$year?>&department=<?=$department?>')" class="buttom"/>
<br><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=report_send&search=$search&Page=$Prev_Page&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id&year=$year&department=$department'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=report_send&search=$search&Page=$i&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id&year=$year&department=$department'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=report_send&search=$search&Page=$Next_Page&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id&year=$year&department=$department'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</body>
</html>

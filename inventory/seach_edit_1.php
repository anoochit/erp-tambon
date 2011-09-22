<? //echo "asdasdasdasd"?>
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
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div > <img src="images/Search.png"  align="absmiddle">&nbsp;&nbsp;ตรวจรับครุภัณฑ์ &nbsp;&nbsp; [ <a href="?action=new_buy_1" class="catLink">เพิ่มตรวจรับครุภัณฑ์ </a>]</div>	</td>
	</tr>
</table>
	</td>
	</tr>
  <tr class="bmText">
    <td width="39%" height="28"><strong>&nbsp;&nbsp;ใบส่งของที่</strong></td>
    <td width="61%">&nbsp;<input type="text" name="num_id" value="<?=$num_id?>" size="30"></td>
  </tr>
<tr><td colspan="2" background="images/hdot2.gif" height="1"> </td></tr>
  <tr class="bmText">
    <td width="33%" height="30"><strong>&nbsp;&nbsp;ทะเบียนเลขที่รับ</strong></td>
    <td width="67%">&nbsp;<input type="text" name="paper_id" value="<?=$paper_id?>" size="30"></td>
  </tr> 
   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;วันที่รับ</strong></td>
    <td>&nbsp;<input name="date_receive" type="text" id="date_receive" value="<? echo $date_receive;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive','DD/MM/YYYY')"   width='19'  height='19'></td>
  </tr><tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
                    <td><strong>&nbsp;&nbsp;ประเภททรัพย์สิน</strong></td>
			
                    <td>&nbsp;<?
			$query  ="select * from type where type_id =0  group by type_name  order by t_id";
			$result=mysql_query($query);
			?><select name="type_id"  >
        <option value=''>----------กรุณาเลือก----------</option>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[t_id];?>"
		<?
		if($type_id == $d[t_id]) echo "selected";
		?>
		><? echo $d[type_name];?></option>
                        <? }?>
                      </select>
				</td>
                  </tr><tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ชื่อครุภัณฑ์</strong></td>
    <td>&nbsp;<input type="text" name="rd_name" value="<?=$rd_name?>" size="30"></td>
  </tr><tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;เลขครุภัณฑ์</strong></td>
    <td>&nbsp;<input type="text" name="code1" value="<?=$code1?>" size="30"></td>
  </tr><tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"   name="search" value=" ค้นหา "   class="buttom"></td>
  </tr>
</table>
</td></tr></table>
<br>
<?
if($search <>''){
$sql="SELECT  r.*,rd.*,r.r_id as r_id1 from receive r
left outer join receive_detail rd on  r.r_id = rd.r_id 
left outer join code c on  c.rd_id = rd.rd_id
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
$sql .= " and r.type = 0 ";
$sql .= " group by r.r_id ";
$sql .= " order by r.date_receive desc ";

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
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
      <td  height="28" colspan="5" style="border: #000000 1px solid;" ><div  align="left">&nbsp;&nbsp;แก้ไข / ลบ ตรวจรับครุภัณฑ์</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#C1E0FF" >
        <td width="13%"  height="31" style="border: #000000 1px solid;" ><div align="center"><strong>เลขที่ใบส่งของ</strong></div></td>
		<td width="14%"  height="31" style="border: #000000 1px solid;" ><div align="center"><strong>ทะเบียนเลขที่รับ</strong></div></td>
         <td width="15%" style="border: #000000 1px solid;" ><div align="center"><strong>วันที่รับ</strong></div></td>
         <td width="46%" style="border: #000000 1px solid;" ><div align="center"><strong>ชื่อครุภัณฑ์ / เลขครุภัณฑ์</strong></div></td>
         <td width="12%" style="border: #000000 1px solid;" >&nbsp;</td>
          </tr>
<?
$i = 0;
if($result1)
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>       
<a href="?action=view_detail_1&r_id=<?=$rs[r_id1]?>&rd_id=<?=$rs[rd_id]?>"  > 
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#FFCC00'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''" >
 <td  height="25"  align="center"   style="border: #000000 1px solid;" ><font size="2">&nbsp;<font size="2"><? echo $rs[num_id]; ?></font></font></td>
  <td  height="25"  align="center" style="border: #000000 1px solid;" ><font size="2">&nbsp;<font size="2"><? echo $rs[paper_id]; ?></font></font></td>
 <td  align="center" style="border: #000000 1px solid;" ><font size="2">&nbsp;<? echo date_2($rs[date_receive]);  ?></font></td>
                                              
 <td  style="border: #000000 1px solid;" ><div align="left"><font size="2"><?=code_1($rs[r_id])?></font></div></td>
  <td  style="border: #000000 1px solid;" ><div  align="center"><font size="2"><a href="?action=view_detail_1&r_id=<?=$rs[r_id1]?>&rd_id=<?=$rs[rd_id]?>"  >รายละเอียด</a></font></div></td>
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
<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp; รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=seach_edit_1&search=$search&Page=$Prev_Page&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=seach_edit_1&search=$search&Page=$i&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=seach_edit_1&search=$search&Page=$Next_Page&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</body>
</html>

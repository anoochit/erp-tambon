
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style2.css" rel="stylesheet" type="text/css">
<body><br>
<form name="f12" method="post"  action=""   >
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center"    >
  <tr>
    <td align="center" colspan="2" style="border: #66CCFF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div >ทะเบียนอสังหาริมทรัพย์</div>	</td>
	</tr>
</table></td>
</tr>
</table>
<br>
<table  width="60%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="25">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div > <img src="images/Search.png"  align="absmiddle">&nbsp;&nbsp;ค้นหาครุภัณฑ์ &nbsp;&nbsp;</div>	</td>
	</tr>
</table>	</td>
	</tr>
  <tr class="bmText" height="25">
                    <td><strong>&nbsp;&nbsp;ประเภททรัพย์สิน</strong></td>
			
                    <td>&nbsp;<?
			$query  ="select * from type where type_id =1  group by type_name  order by t_id";
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
                      </select>				</td>
                  </tr>
   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ชื่ออสังหาริมทรัพย์</strong></td>
    <td>&nbsp;<input type="text" name="rd_name" value="<?=$rd_name?>" size="30"></td>
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
	$sql="SELECT  r.*,rd.*,r.r_id as r_id1 from receive r
left outer join receive_detail rd on  r.r_id = rd.r_id 
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
if($date_receive <> ''){
	$sql .= " AND r.date_receive = '".date_format_sql($date_receive)."'  ";
}
$sql .= " and r.type = 1 ";
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
<table  width="80%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
      <td  height="28" colspan="2" style="border: #000000 1px solid;"><div  align="left">&nbsp;&nbsp;ทะเบียนอสังหาริมทรัพย์</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#C1E0FF">

		<td width="57%"  align="center" height="30" style="border: #000000 1px solid;"><strong>ชื่ออสังหาริมทรัพย์ </strong></td>
         <td width="43%"  align="center" style="border: #000000 1px solid;"><strong>ใช้ประจำที่</strong></td>
          </tr>
<?
$i = 0;
if($result1)
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>       
<a href="show_control_p.php?rd_id=<?=$rs[rd_id]?>" target="_blank" >
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#FFCC00'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
                                          
                                                  <td style="border: #000000 1px solid;"><div  align="left"> <font size="2">&nbsp;<a href="show_control_p.php?rd_id=<?=$rs[rd_id]?>" target="_blank" ><? echo $rs[rd_name];  ?></a> </font> </div></td>
                                              
 <td  align="left"style="border: #000000 1px solid;"><font size="2"><?=$rs[garan_at];?></font></td>
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
<B><?= $Num_Rows;?></B>&nbsp; รายการ &nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=seach_control&search=$search&Page=$Prev_Page&type_id=$type_id&rd_name=$rd_name'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=seach_control&search=$search&Page=$i&type_id=$type_id&rd_name=$rd_name'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=seach_control&search=$search&Page=$Next_Page&type_id=$type_id&rd_name=$rd_name'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</body>
</html>

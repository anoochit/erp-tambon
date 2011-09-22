
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body><br>
<form name="f12" method="post"  action=""   >
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td align="center" colspan="2" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div >บันทึก  การย้ายครุภัณฑ์</div>	</td>
	</tr>
</table></td>
</tr>
</table>
<br>
<table width="60%" border="1" cellspacing="0" cellpadding="3" align="center">
  <tr class="bmText">
    <td width="33%" height="30"><strong>&nbsp;&nbsp;ชื่อครุภัณฑ์</strong></td>
    <td width="67%">&nbsp;<input type="text" name="rd_name" value="<?=$rd_name?>" size="30"></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;เลขครุภัณฑ์</strong></td>
    <td>&nbsp;<input type="text" name="code1" value="<?=$code1?>" size="30"></td>
  </tr>
  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา " ></td>
  </tr>
</table>
<br>
<?
if($search <>''){
	$sql="SELECT  r.*,rd.*,c.* from receive r,receive_detail rd,code c,open o  WHERE 1 = 1 
and r.r_id = rd.r_id and c.rd_id = rd.rd_id and c.o_id = o.o_id ";

if($rd_name <> '' ){
	$sql .= " AND rd.rd_name like '$rd_name%'  ";
}
if($code1 <> '' ){
	$sql .= " AND c.code like '$code1%'  ";
}

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
      <td  height="28" colspan="6"><div  align="left">&nbsp;&nbsp;เพิ่ม  แก้ไข / ลบ การย้ายครุภัณฑ์</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#C1E0FF">

		<td width="53%"  align="center" height="30"><strong>ชื่อครุภัณฑ์</strong></td>
         <td width="47%"  align="center"><strong>เลขครุภัณฑ์</strong></td>
          </tr>
<?
$i = 0;
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>       
<a href="?action=add_move&c_id=<?=$rs[c_id]?>"  >
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#FFCC00'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
  <td ><div  align="left"> <font size="2">&nbsp;<? echo $rs[rd_name];  ?> </font> </div></td>
 <td align="center" ><font size="2"><? 
	    echo $rs["code"] ;  ?></font></td>
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
<B><?= $Num_Rows;?></B>&nbsp;ฉบับ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=seach_move&search=$search&Page=$Prev_Page&code1=$code1&rd_name=$rd_name'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=seach_move&search=$search&Page=$i&code1=$code1&rd_name=$rd_name'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=seach_move&search=$search&Page=$Next_Page&code1=$code1&rd_name=$rd_name'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</body>
</html>

<? 
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<div align="center">

<br />

<table width="100%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="center">
<tr class="bmText"  bgcolor="#C1E0FF">
		<td  colspan="7" align="left" height="30" ><b><span style="font-size:9pt;"><font face="tahoma"><? echo fild_code_detail($c_id) ?><br /><br />
		&nbsp;&nbsp;ประวัติการซ่อมบำรุง
		</font></span></b><br /></td>
               
            </tr>
<tr class="bmText"  bgcolor="#C1E0FF">
            <td width="19%" height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">วันที่ซ่อม</font></span></b> </div></td>
                                                  <td width="47%" ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">รายละเอียด</font></span></b>
            </div></td>
                                                  <td width="14%" ><div align="center">
                                                      <b><span style="font-size:9pt;"><font face="tahoma">ราคา</font></span></b>
            </div></td>
 <td width="20%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">หมายเหตุ</font></span></b>  </td>

                 
          </tr>
<?
$sql = "SELECT * FROM service Where c_id = '$c_id'   order by date_ser  desc";
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

$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
?>
<tr  class="bmText"  bgcolor="<?=$bg?>">
	<td height="25"><div  align="center"><span style="font-size:9pt;">
	  <?=date_2($rs1[date_ser])?>&nbsp;</span>
    </div></td>
	<td height="25" align="left"><span style="font-size:9pt;">&nbsp;
	  <? echo $rs1[detail];   ?></span>
   </td>
	<td  align="center"><span style="font-size:9pt;">&nbsp;
	  <? echo number_format($rs1[cost],".");   ?></span>
    </td>
		<td><div  align="left"><span style="font-size:9pt;">
	   <?  echo $rs1[remark];	  ?></span>
    </div></td>
</tr>
<? 

	$i++;
}?>
</table>
	</td>
</tr></table>


</div>
<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;ฉบับ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=add_service&search=$search&Page=$Prev_Page&c_id=$c_id'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=add_service&search=$search&Page=$i&c_id=$c_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=add_service&search=$search&Page=$Next_Page&c_id=$c_id'> หน้าถัดไป>> </a>";

?>
</FONT></center></div>
</div>
</center>


<script language="JavaScript" type="text/javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("คุณต้องการลบข้อมูลทั้งหมดนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>

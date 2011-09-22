<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();
if($del =='del' ){

		$sql_up = "DELETE  FROM vacation  WHERE v_id =$v_id ";
		$result_up  = mysql_query($sql_up); 
		echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"2;URL=?action=add_vacation&v_id=$v_id\">\n";
}
	?>
<style type="text/css">
<!--
.style1 {
	font-family: AngsanaUPC, "Angsana New", Terminal;
	font-size: 22px;
	font-weight: bold;
}
.style2 {font-size: 9pt}
-->
</style>
<div align="center">

<form name="save"  method="post" enctype="multipart/form-data">
<input name="user_id" type="hidden" id="user_id" value="<?=$user_id?>">
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td colspan="2" align="center" bgcolor="#66CC99" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left" >
	<td height="25"  class="lgBar1 style1"  >		เพิ่ม  แก้ไข  / ลบ ข้อมูลการลา </td>
	</tr>
</table></td>
</tr>
</table><br />

<table width="100%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="center">
<tr class="bmText"  bgcolor="#C1E0FF">
		<td  colspan="9" align="left" height="30" ><b><span style="font-size:9pt;"><font face="tahoma"><?=$user_id ?><br /><br />
		&nbsp;&nbsp;[ <a href="#" onClick="javascript:window.open('vacation.php?user_id=<?=$user_id?>&tab=add','xxx','scrollbars=yes,width=450,height=420')">เพิ่ม ข้อมูลการลา </a> ]<br />
		<br />
		</font></span></b></td>
            </tr>
<tr class="bmText"  bgcolor="#C1E0FF">
  <td width="14%" bgcolor="#C1E0FF" ><div align="center"><strong><font face="tahoma"><span class="style2">รหัสพนักงาน</span></font></strong></div></td>
 <td width="14%"><div align="center"><strong><font face="tahoma"><span class="style2">วันที่เริ่ม</span></font></strong></div></td>
              <td width="14%"><div align="center"> <span style="font-size:9pt;"><font face="tahoma"><span class="style2">ถึงวันที่</span></font></span> </div></td>
                                                  <td width="13%" ><div align="center">
                                                    <span style="font-size:9pt;"><font face="tahoma"><span class="style2">จำนวนวันลา</span></font></span>
              </div></td>
                                                  <td width="15%" ><div align="center">
                                                      <span style="font-size:9pt;"><font face="tahoma"><span class="style2">ประเภทการลา</span></font></span>
              </div></td>
 <td width="19%" align="center" ><span style="font-size:9pt;"><font face="tahoma"><span class="style2">หมายเหตุ</span></font></span></td>
<td width="6%" align="center" ><span style="font-size:9pt;"><font face="tahoma"></font></span></td>
<td width="5%" align="center" ><b><span style="font-size:9pt;"><font face="tahoma"></font></span></b></td>
            </tr>
<?
$sql = "SELECT * FROM vacation Where v_id = '$v_id'   order by date_begin  desc";
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
  <td><? echo $rs1[user_id]; ?></td>
<td height="25"><div  align="center">
	  <?=date_2($rs1[date_begin])?>
    </div></td>
	<td height="25"><div  align="center">
	  <?=date_2($rs1[date_end])?>
    </div></td>
	<td height="25" align="left"><div align="left"><? echo $rs1[num];   ?>   </div></td>
	<td bgcolor="<?=$bg?>"><div align="left">  <?  echo $rs1[leave_type];	  ?>    </div></td>
<td align="center" ><div align="left">
  <?  echo $rs1[note];	  ?>
</div>  </td>
	<td align="center" ><a href="#" onClick="javascript:window.open('vacation.php?v_id=<?=$rs1[v_id]?>&tab=edit','xxx','scrollbars=yes,width=450,height=420')">แก้ไข</a></td>
	<td align="center" ><a href="?action=add_vacation&del=del&v_id=<?=$rs1["v_id"]?>" onClick="return godel();">ลบ</a></td>
</tr>
<? 

	$i++;
}?>
<tr  class="bmText" bgcolor="#C1E0FF">
<td height="25" colspan="9"><div  align="center">
	   <input  type="button" name="print" value=" พิมพ์ทั้งหมด "  onclick="window.open('service_print_all.php?v_id=<?=$v_id?>')"/>
    </div></td>
</tr>

</table>
	</td>
</tr></table>
</form>

</div>
<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;ฉบับ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=add_vacation&search=$search&Page=$Prev_Page&v_id=$v_id'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=add_vacation&search=$search&Page=$i&v_id=$v_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=add_vacation&search=$search&Page=$Next_Page&v_id=$v_id'> หน้าถัดไป>> </a>";

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

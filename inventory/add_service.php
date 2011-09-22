<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();
if($del =='del' ){

		$sql_up = "DELETE  FROM service  WHERE sv_id =$sv_id ";
		$result_up  = mysql_query($sql_up); 
		echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"2;URL=?action=add_service&c_id=$c_id\">\n";
}
	?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<div align="center">
<br />
<form name="save"  method="post" enctype="multipart/form-data">
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center"    >
  <tr>
    <td align="center" colspan="2" style="border: #66CCFF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		เพิ่ม  แก้ไข  / ลบ การซ่อมบำรุง</td>
	</tr>
</table></td>
</tr>
</table><br />

<table width="98%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr  bgcolor="#C1E0FF">
		<td  colspan="8" align="left" height="40"  class="lgBar" style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">&nbsp;<? echo fild_code_detail($c_id) ?>
		&nbsp;&nbsp;[ <a href="#" onClick="javascript:window.open('sample_7.php?c_id=<?=$c_id?>&tab=add','xxx','scrollbars=yes,width=450,height=420')">เพิ่ม การซ่อมบำรุง</a> ]
		</font></span></b></td>
               
            </tr>
<tr class="bmText"  bgcolor="#C1E0FF">
 <td width="7%" height="30" style="border: #000000 1px solid;" ><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">ครั้งที่</font></span></b> </div></td>
              <td width="13%" height="30" style="border: #000000 1px solid;" ><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">วันที่ซ่อม</font></span></b> </div></td>
                                                  <td width="27%" style="border: #000000 1px solid;" ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">รายละเอียด</font></span></b>
              </div></td>
                                                  <td width="12%" style="border: #000000 1px solid;" ><div align="center">
                                                      <b><span style="font-size:9pt;"><font face="tahoma">ราคา</font></span></b>
              </div></td>
 <td width="24%"  align="center"style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">หมายเหตุ</font></span></b>  </td>
 <td width="7%" align="center" style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">&nbsp;พิมพ์</font></span></b></td>
<td width="6%" align="center" style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">&nbsp;แก้ไข</font></span></b></td>
<td width="4%" align="center" style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">&nbsp;ลบ</font></span></b></td>
                 
            </tr>
<?
$sql = "SELECT * FROM service Where c_id = '$c_id'   order by time ,date_ser  desc";
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
if($i%2 ==0) $bg ='#FFFFFF';
elseif( $i%2 ==1) $bg ='#CCCCCC';
?>
<tr  class="bmText"  bgcolor="<?=$bg?>">
<td height="25" style="border: #000000 1px solid;" ><div  align="center">
	  <?=$rs1["time"]?>
    </div></td>
	<td height="25" style="border: #000000 1px solid;" ><div  align="center">
	  <?=date_2($rs1[date_ser])?>
    </div></td>
	<td height="25" align="left" style="border: #000000 1px solid;" >&nbsp;
	  <? echo $rs1[detail];   ?>
   </td>
	<td  style="border: #000000 1px solid;" align="center">&nbsp;
	  <? echo number_format($rs1[cost],".");   ?>
    </td>
		<td style="border: #000000 1px solid;" ><div  align="left">
	   <?  echo $rs1[remark];	  ?>
    </div></td>
<td align="center" style="border: #000000 1px solid;" ><a href="#" onClick="javascript:window.open('service_print.php?sv_id=<?=$rs1[sv_id]?>&c_id=<?=$c_id?>')"><img src="images/Print.png" border="0" /></a></td>
	<td align="center" style="border: #000000 1px solid;" ><a href="#" onClick="javascript:window.open('sample_7.php?sv_id=<?=$rs1[sv_id]?>&tab=edit','xxx','scrollbars=yes,width=450,height=420')"><img src="images/Modify.png" border="0" /></a></td>
	<td align="center" style="border: #000000 1px solid;" ><a href="?action=add_service&del=del&sv_id=<?=$rs1["sv_id"]?>&c_id=<?=$c_id?>" onClick="return godel();"><img src="images/Delete.png" border="0" /></a></td>
</tr>
<? 

	$i++;
}?>
<tr  class="bmText" bgcolor="#C1E0FF">
<td height="25" colspan="8" style="border: #000000 1px solid;" ><div  align="center">
	   <input  type="button" name="print" value=" พิมพ์ทั้งหมด "  onclick="window.open('service_print_all.php?c_id=<?=$c_id?>')" class="buttom"/>
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

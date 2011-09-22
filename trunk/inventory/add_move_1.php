<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();
if($del =='del' ){

		$sql_up = "DELETE  FROM move  WHERE m_id =$m_id ";
		$result_up  = mysql_query($sql_up); 
		echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"2;URL=?action=add_move&c_id=$c_id\">\n";
}
	?>
<div align="center">

<form name="save"  method="post" enctype="multipart/form-data">
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td colspan="2" align="center" bgcolor="#66CC99" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		เพิ่ม  แก้ไข  / ลบ การย้ายครุภัณฑ์</td>
	</tr>
</table></td>
</tr>
</table><br />

<table width="100%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="center">
<tr class="bmText"  bgcolor="#C1E0FF">
		<td  colspan="7" align="left" height="30" ><b><span style="font-size:9pt;"><font face="tahoma"><? echo fild_code_detail($c_id) ?><br /><br />
		&nbsp;&nbsp;[ <a href="#" onClick="javascript:window.open('sample_6.php?c_id=<?=$c_id?>&tab=add','xxx','scrollbars=yes,width=450,height=420')">เพิ่ม การย้ายครุภัณฑ์</a> ]<br /><br />
		</font></span></b></td>
               
            </tr>
<tr class="bmText"  bgcolor="#C1E0FF">
              <td width="15%" ><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">วันที่ย้าย</font></span></b> </div></td>
                                                  <td width="18%" ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">แผนก / ห้อง</font></span></b>
              </div></td>
                                                  <td width="31%" ><div align="center">
                                                      <b><span style="font-size:9pt;"><font face="tahoma">รายละเอียด</font></span></b>
              </div></td>
 <td width="21%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">หมายเหตุ</font></span></b>  </td>
<td width="9%" align="center" ><b><span style="font-size:9pt;"><font face="tahoma"></font></span></b></td>
<td width="6%" align="center" ><b><span style="font-size:9pt;"><font face="tahoma"></font></span></b></td>
                 
            </tr>
<?
$sql = "SELECT * FROM move Where c_id = '$c_id'   order by date_move  desc";
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
	<td height="25"><div  align="center">
	  <?=date_2($rs1[date_move])?>
    </div></td>
	<td height="25" align="left">&nbsp;
	  <?=room($rs1[r_id])?>
   </td>
	<td align="left">&nbsp;
	  <? echo $rs1[detail];   ?>
    </td>
		<td><div  align="left">
	   <?  echo $rs1[remark];	  ?>
    </div></td>

	<td align="center" ><a href="#" onClick="javascript:window.open('sample_6.php?m_id=<?=$rs1[m_id]?>&tab=edit','xxx','scrollbars=yes,width=450,height=420')">แก้ไข</a></td>
	<td align="center" ><a href="?action=add_move&del=del&m_id=<?=$rs1["m_id"]?>&c_id=<?=$c_id?>" onClick="return godel();">ลบ</a></td>
</tr>
<? 

	$i++;
}?>
</table>
	</td>
</tr></table>
</form>
<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;ฉบับ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<?
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=add_move&search=$search&Page=$Prev_Page&c_id=$c_id'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=add_move&search=$search&Page=$i&c_id=$c_id'>$i</a>]";
else 
echo "<b> $i </b>";
}

if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=add_move&search=$search&Page=$Next_Page&c_id=$c_id'> หน้าถัดไป>> </a>";

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

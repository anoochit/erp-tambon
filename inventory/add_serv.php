<?
include('config.inc.php');
if($del =='del' ){

		$sql_up = "DELETE  FROM service  WHERE sv_id =$sv_id ";
		$result_up  = mysql_query($sql_up); 
		echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_service&c_id=$c_id\">\n";
}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" src="include/calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<link rel="stylesheet" type="text/css" href="default.css">
<style type="text/css">
<!--
.style2 {font-size: 12px; font-family: Tahoma; }
.style3 {font-size: 12px}
-->
</style>
<script language="JavaScript">
function del_confirm()
{
	if (confirm("คุณต้องการลบไฟล์นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<link href="style2.css" rel="stylesheet" type="text/css">
<body>
<?
$sql = "SELECT * FROM code
Where  c_id = '$c_id' 
group by code order by code";
//echo $sql ."<br>";
$result = mysql_query($sql);
$rs1=mysql_fetch_array($result);

?><br>
<form action="" method="post" name="f22" enctype="multipart/form-data" >
<table width="98%" border="0" cellspacing="1" style="border-collapse:collapse;" align="center">
	  <tr  bgcolor="#C1E0FF">
		<td  colspan="8" align="left" height="40"  class="lgBar" style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">&nbsp;<? echo fild_code_detail($c_id) ?>
		&nbsp;&nbsp;[ <a href="#" onClick="javascript:window.open('sample_7.php?c_id=<?=$c_id?>&tab=add','sample7','scrollbars=yes,width=450,height=420')">เพิ่ม การซ่อมบำรุง</a> ]
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

//echo $sql ."<br>";
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
	<td align="center" style="border: #000000 1px solid;" ><a href="#" onClick="javascript:window.open('sample_7.php?sv_id=<?=$rs1[sv_id]?>&tab=edit','sample_7','scrollbars=yes,width=450,height=420')"><img src="images/Modify.png" border="0" /></a></td>
	<td align="center" style="border: #000000 1px solid;" ><a href="?action=add_service&del=del&sv_id=<?=$rs1["sv_id"]?>&c_id=<?=$c_id?>" onClick="return godel();"><img src="images/Delete.png" border="0" /></a></td>
</tr>
  <? 
  	$i++;
  }?>
  <tr><td colspan="8" background="images/hdot2.gif"> </td></tr>

<tr>
                    <td height="30"  align="center" colspan="10">
                    <input type="reset" name="formbutton2" value="ปิดหน้านี้" onClick="window.close();" class="buttom">    </td>
                </tr>
</table>
<!--</td>
</tr>
</table> -->
</form> 
</body>
</html>
<script language="javascript">

function godel()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>
<?
function find_move_id($c_id) {
	
		$sql = "Select max(m_id) as max  from move  where c_id ='$c_id' ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		return $recn['max'];
	}
?>
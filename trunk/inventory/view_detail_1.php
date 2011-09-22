<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();

if($delete_1 <> ''){

	$sql1 = "SELECT * FROM receive_detail WHERE r_id=$r_id ";
	$result1=mysql_query($sql1);
	while($rs1=mysql_fetch_array($result1)){
			$sql_del = "DELETE FROM code WHERE rd_id=$rs1[rd_id] ";
			$result_del = mysql_query($sql_del);
	}

	$sql = "DELETE FROM receive WHERE r_id=$r_id";
	$result = mysql_query($sql);
	
	$sql_del = "DELETE FROM receive_detail WHERE r_id=$r_id";
	$result_del = mysql_query($sql_del);
	echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=seach_edit_1\">\n";
}
if($del == 'del'){

	$sql_del = "DELETE FROM receive_detail WHERE rd_id=$rd_id";
	$result_del = mysql_query($sql_del);
	
	$sql = "DELETE FROM code WHERE rd_id=$rd_id";
	$result = mysql_query($sql);
	echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=view_detail_1&r_id=$r_id\">\n";
}
	?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<br />
<div align="center">
<?
?>
<form name="save"  method="post" enctype="multipart/form-data">
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center"    >
  <tr>
    <td align="center" colspan="1" style="border: #66CCFF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		แก้ไข / ลบ รับครุภัณฑ์</td>
	</tr>
</table></td>
</tr>
</table><br />

<table width="98%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;" >
	<?
	$r_id = $_REQUEST["r_id"] ;

$sql = "SELECT * FROM receive WHERE r_id= $r_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
	$r_id = $rs[r_id];
	?>
	<div><b><font color="#FF0066" size="2" face="Tahoma">ใบส่งของที่</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<font size="2"><? echo $rs["num_id"]?></font></div>
	<div><b><font color="#FF0066" size="2" face="Tahoma">ทะเบียนเอกสาร</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<font size="2"><? echo $rs["paper_id"]?></font></div>
	<div><b><font color="#FF0066" size="2" face="Tahoma">จากร้าน</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><? echo $rs["shop_name"] ?></font></div>
	<div><b><font color="#FF0066" size="2" face="Tahoma">วันที่รับ</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><?=date_2($rs["date_receive"])?></font></div>
	<div><b><font color="#FF0066" size="2" face="Tahoma">วิธีการได้มา </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><? 
	if($rs["come_in"] =='0')echo 'รายได้' ;
	else if($rs["come_in"] =='1')echo 'อุดหนุน' ;
	else if($rs["come_in"] =='2')echo 'บริจาค' ;
	else if($rs["come_in"] =='3')echo 'เงินกู้' ;
	else if($rs["come_in"] =='4')echo 'อื่นๆ' ;
	?>
	</font></div>
	<div><b><font color="#FF0066" size="2" face="Tahoma">แผนงาน</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<font size="2"><? echo $rs["planname"]?></font></div>
	<div><b><font color="#FF0066" size="2" face="Tahoma">โครงการ</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><? echo $rs["project"]?></font></div>
	<div><b><font color="#FF0066" size="2" face="Tahoma">เลขที่สัญญา</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><?=$rs["rep_id"]?></font></div>
	</font>
<div align="center"><input   type="button" name="add" value=" แก้ไข " onClick="javascript:popup('sample_1.php?r_id=<?=$rs["r_id"]?>','',650,300)" class="buttom">
<? 
	if(find_code_open_all($rs["r_id"]) =="true"){
	?>
&nbsp;&nbsp;&nbsp;<input   type="submit" name="delete_1" value=" ยกเลิกใบตรวจรับ "  onclick="return godel_1();" class="buttom">

<?
 		}
 ?>
</div>
	</td>
	</tr>
</table>
<br />
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr bgcolor="#C1E0FF"   ><td colspan="7" height="35" style="border: #000000 1px solid;" class="lgBar">&nbsp;&nbsp;
[  <a href="#" onClick="javascript:window.open('sample_9.php?r_id=<?=$rs["r_id"]?>','xxx','scrollbars=yes,width=650,height=410')"  class="bar_add">เพิ่มรายการ</a> ]
</td></tr>
<tr class="bmText"  bgcolor="#C1E0FF">
              <td style="border: #000000 1px solid;"  width="19%"  height="28"><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">ประเภท</font></span></b> </div></td>
                                                  <td width="19%" style="border: #000000 1px solid;" ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">ชื่อครุภัณฑ์</font></span></b>
              </div></td>
                                                  <td width="9%" style="border: #000000 1px solid;" ><div align="center">
                                                      <b><span style="font-size:9pt;"><font face="tahoma">จำนวน</font></span></b>
              </div></td>
                                                  <td width="9%"  align="center" style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">ราคา</font></span></b>  </td>
              <td width="28%" style="border: #000000 1px solid;" ><div align="center"><b><span style="font-size:9pt;"><font face="tahoma">เลขครุภัณฑ์</font></span></b></div></td>
                    <td width="9%" align="center" style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">แก้ไข</font></span></b></td> 
<td width="7%" align="center" style="border: #000000 1px solid;"  ><b><span style="font-size:9pt;"><font face="tahoma">ลบ</font></span></b></td> 
            </tr>
<?
$sql = "SELECT * FROM receive_detail Where r_id = '$r_id'   ";

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
<tr  class="bmText" bgcolor="<?=$bg ?>">
	<td height="25" style="border: #000000 1px solid;" ><div align="left">
	  <?=fild_type($rs1[type_id])?>
    </div></td>
	<td height="25" style="border: #000000 1px solid;" ><div align="left">
	  <?=$rs1[rd_name]?>
    </div></td>
	<td style="border: #000000 1px solid;" ><div  align="center">
	  <? echo $rs1[amount];   ?>
    </div></td>
		<td style="border: #000000 1px solid;" ><div  align="center">
	   <?  echo number_format($rs1[price],2);	  ?>
    </div></td>

	<td  style="border: #000000 1px solid;" ><div  align="left"><a href="#" onClick="javascript:popup('sample_10.php?rd_id=<?=$rs1[rd_id]?>','',950,500)">
	  <?=code($rs1[rd_id])?></a>
    </div></td>
		<td  style="border: #000000 1px solid;" ><div  align="center">
	<? 
	?>
		<a href="#" onClick="javascript:popup('sample_2.php?r_id=<?=$r_id?>&rd_id=<?=$rs1["rd_id"]?>','',650,600)"> <img src="images/Modify.png" border="0" /></a>
	<? 
	?>
    </div></td>
		<td  style="border: #000000 1px solid;" ><div  align="center">
	<? 
	?>
		<a href="?action=view_detail_1&del=del&r_id=<?=$r_id?>&rd_id=<?=$rs1["rd_id"]?>"  onclick="return godel()"><img src="images/Delete.png" border="0" /></a>
	<? 
	?>
    </div></td>
</tr>
<? 

	$i++;
}?>
</table>
	</td>
</tr></table>
</form>
</div>
<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=view_detail_1&r_id=$r_id&Page=$Prev_Page'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=view_detail_1&r_id=$r_id&Page=$i'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=view_detail_1&r_id=$r_id&Page=$Next_Page'> หน้าถัดไป>> </a>";

?><br>

</FONT></center></div>
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
</script><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  

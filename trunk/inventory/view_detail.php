<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();

if($delete_1 <> ''){

	$sql = "DELETE FROM receive WHERE r_id=$r_id";
	$result = mysql_query($sql);
	
	$sql_del = "DELETE FROM receive_detail WHERE r_id=$r_id";
	$result_del = mysql_query($sql_del);
	
	
	echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"2;URL=?action=new_buy_1\">\n";
}

	?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<div align="center">
<?
?>
<form name="save"  method="post" enctype="multipart/form-data">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td colspan="2" align="center" bgcolor="#66CC99" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		ข้อมูลใบส่งของ</td>
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
	
	<div><b><font color="#FF0066" size="4" face="Tahoma">ใบส่งของที่</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<font size="4"><? echo $rs["num_id"]?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">ทะเบียนเอกสาร</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<font size="4"><? echo $rs["paper_id"]?></font></div> 
	<div><b><font color="#FF0066" size="4" face="Tahoma">จากร้าน</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><? echo shop_id($rs["shop_id"])?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">วันที่รับ</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><?=date_2($rs["date_receive"])?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">วิธีการได้มา</font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><? echo $rs["come_in"]?></font></div>
	</font>

<div align="center"><input   type="button" name="add" value=" แก้ไข " onClick="javascript:window.open('Sample_1.php?r_id=<?=$rs["r_id"]?>','xxx','scrollbars=yes,width=650,height=250')">
<? 
	if(find_code_open_all($rs["r_id"]) =="true"){
	?>
&nbsp;&nbsp;&nbsp;<input   type="submit" name="delete_1" value=" ยกเลิกใบตรวจรับ "  onclick="return godel_1();" />
<?
 		}
 ?>
</div>
	</td>
	</tr>
</table>
<br />
<table width="98%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="center">
<tr bgcolor="#C1E0FF"   ><td colspan="10" height="35">&nbsp;&nbsp;
 <a href="#" onClick="javascript:window.open('Sample_9.php?r_id=<?=$rs["r_id"]?>','xxx','scrollbars=yes,width=750,height=400')"  class="bar_add">[ เพิ่มครุภัณฑ์  ]</a>
</td></tr>
<tr class="bmText"  bgcolor="#C1E0FF">
              <td width="23%" ><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">ประเภท</font></span></b> </div></td>
                                                  <td width="13%" ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">ชื่อครุภัณฑ์</font></span></b>
              </div></td>
                                                  <td width="13%" ><div align="center">
                                                      <b><span style="font-size:9pt;"><font face="tahoma">จำนวน</font></span></b>
              </div></td>
                                                  <td width="9%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">ราคา</font></span></b>  </td>
              <td width="17%" ><div align="center"><b><span style="font-size:9pt;"><font face="tahoma">รหัสครุภัณฑ์</font></span></b></div></td> 
		
                    <td width="10%" align="center" ><b><span style="font-size:9pt;"><font face="tahoma"></font></span></b></td> 
            </tr>
<?
$sql = "SELECT * FROM receive_detail Where r_id = '$r_id'   ";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
?>
<tr  class="bmText" >
	<td height="25"><div align="left">
	  <?=fild_type($rs1[type_id])?>
    </div></td>
	<td height="25"><div align="left">
	  <?=$rs1[rd_name]?>
    </div></td>
	<td><div  align="center">
	  <? echo $rs1[amount];   ?>
    </div></td>
		<td><div  align="center">
	   <?  echo number_format($rs1[price],2);	  ?>
    </div></td>

	<td  ><div  align="left">
	  <a href="#" onClick="javascript:window.open('Sample_10.php?rd_id=<?=$rs1[rd_id]?>','xxx','scrollbars=yes,width=750,height=500')"><?=code($rs1[rd_id])?></a>
    </div></td>
		<td  ><div  align="center">
	<? 
	if(find_code_open($rs1["rd_id"]) =="true"){?>
		<a href="#" onClick="javascript:window.open('Sample_2.php?r_id=<?=$r_id?>&rd_id=<?=$rs1["rd_id"]?>','xxx','scrollbars=yes,width=850,height=500')">แก้ไข</a>
	<? }elseif(find_code_open($rs1["rd_id"]) =="false"){?>
	แก้ไขไม่ได้
	<? }?>
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

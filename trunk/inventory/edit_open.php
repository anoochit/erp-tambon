<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();

	if($del <> ''){
			for ($i=0;$i<=$total;$i++) {
						if ($chk[$i] != "") { 
								
								$sql1 = "DELETE FROM move   WHERE c_id =$chk[$i] ";
								$result1= mysql_query($sql1);
								
								$sql_up = "UPDATE code SET o_id = '' WHERE c_id =$chk[$i] ";
								$result_up  = mysql_query($sql_up); 
						}
				}
					print "<br><br><center>ระบบกำลังบันทึกข้อมูล</center><br>";
					print "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?action=seach_edit_open\">\n";
}

if($cancel <>''){
	

}
	?>
<div align="center">

<script language="JavaScript">
function selectall(){
	for (var i=0;i<document.save.elements.length;i++)
	{
		var e = document.save.elements[i];
		if (e.name != 'allbox')
			e.checked = document.save.allbox.checked;
	}
}
</script>
<form name="save"  method="post" enctype="multipart/form-data">
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td colspan="2" align="center" bgcolor="#66CC99" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		ข้อมูลใบเบิก</td>
	</tr>
</table></td>
</tr>
</table><br />

<table width="100%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;" >
	<?
	$o_id = $_REQUEST["o_id"] ;

$sql = "SELECT * FROM open WHERE o_id= $o_id";
$result=mysql_query($sql);
while($rs=mysql_fetch_array($result)){
	$o_id = $rs[o_id];
	?>
	
	<div><b><font color="#FF0066" size="4" face="Tahoma">เลขที่ใบเบิก</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<font size="4"><? echo $rs["num_id"]?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">เลขที่เอกสาร </font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><? echo $rs["paper_id"]?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">วันที่เบิก</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><?=date_2($rs["open_date"])?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">ประเภทเงิน </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><? echo $rs["mon_type"]?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">กอง / ฝ่าย </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><? echo find_div($rs["div_id"])."/".find_sub($rs["sub_id"])?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">หัวหน้ากอง </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><? echo $rs["name_head"]?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">อื่นๆ </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><? echo $rs["detail"]?></font></div>
	</font>

<div align="center"><input   type="button" name="add" value=" แก้ไข " onClick="javascript:window.open('Sample_5.php?o_id=<?=$rs["o_id"]?>','xxx','scrollbars=yes,width=650,height=350')">
&nbsp;&nbsp;<input   type="submit" name="cancel" value=" ยกใบเบิกนี้ " onclick="return godel_1();" />
<?

 }
 
 ?>
</div>


	</td>
	</tr>
</table>
<br />
<table width="80%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="center">
<tr class="bmText"  bgcolor="#46B5AF">
<td width="108" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">เลือกทั้งหมด<br />
<input type="checkbox" name="allbox" onClick="selectall();" ></font></span></b> </div></td> 
              <td width="627" height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">เลขครุภัณฑ์</font></span></b> </div></td>

            </tr>
<?
$sql = "SELECT * FROM code ,receive_detail
 Where  code.rd_id = receive_detail.rd_id
 and code.o_id ='$o_id'
and  receive_detail.rd_id = '$rd_id'    ";
//echo $sql ."<br>";
$result = mysql_query($sql);
$i = 0;
$total_vat = 0;

while($rs1=mysql_fetch_array($result)){

$bg ='#FFFFFF';

?>
<tr  class="bmText" bgcolor="<?=$bg?>"  >
<td align="center" height="30">&nbsp;<input type='checkbox' name='chk[<?=$i?>]' value="<? echo $rs1["c_id"]?>"></td>
	<td ><div align="left"><a href="#" onClick="javascript:window.open('Sample_11.php?c_id=<?=$rs1[c_id]?>','xxx','scrollbars=yes,width=450,height=400')">
	  <?=$rs1[code]?></a>
    </div></td>

</tr>
<? 

	$i++;
}?>
 <input type="hidden" name="total" value="<? echo $i?>">
<tr bgcolor="#CCCCCC"><td style="border-width:0; border-color:white; border-style:solid;"  colspan="7"  align="center" height="30"><strong><font size="2">
<input type="submit" name="del" value="&nbsp;&nbsp;&nbsp;ลบ&nbsp;&nbsp;&nbsp;"  onclick="return godel();"/>
</font></strong></td></tr>
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
	if (confirm("คุณต้องการยกเลิกใบเบิกนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>

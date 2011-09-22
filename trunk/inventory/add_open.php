<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();


	?>
<div align="center">
<?

?>
<form name="save"  method="post" enctype="multipart/form-data">
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td colspan="2" align="center" bgcolor="#66CC99" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		เบิกครุภัณฑ์</td>
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
while($rs=mysql_fetch_array($result)){
	$r_id = $rs[r_id];
	?>
	
	<div><b><font color="#FF0066" size="4" face="Tahoma">เลขที่ใบส่งของ</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<font size="4"><? echo $rs["num_id"]?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">ทะเบียนเอกสาร</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<font size="4"><? echo $rs["paper_id"]?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">ร้าน </font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><? echo shop_id($rs["shop_id"])?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">วันที่รับ</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><?=date_2($rs["date_receive"])?></font></div>
	<div><b><font color="#FF0066" size="4" face="Tahoma">วิธีการได้มา </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="4"><? echo $rs["come_in"]?></font></div>
	</font>


<?

 } 
 ?>



	</td>
	</tr>
</table>
<br />
<table width="98%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="center">
<tr class="bmText"  bgcolor="#C1E0FF">
              <td width="20%" ><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">ประเภท</font></span></b> </div></td>
                                                  <td width="19%" ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">ชื่อครุภัณฑ์</font></span></b>
              </div></td>
                                                  <td width="8%" ><div align="center">
                                                      <b><span style="font-size:9pt;"><font face="tahoma">จำนวน</font></span></b>
              </div></td>
                                                  <td width="12%"  align="center"><b><span style="font-size:9pt;"><font face="tahoma">ราคา</font></span></b>  </td>
              <td width="17%" ><div align="center"><b><span style="font-size:9pt;"><font face="tahoma">เลขครุภัณฑ์</font></span></b></div></td> <td width="13%" ><div align="center"><b><span style="font-size:9pt;"><font face="tahoma">จ.น.ที่เบิกไปแล้ว</font></span></b></div></td>
												  <td width="11%" align="center" ><b><span style="font-size:9pt;"><font face="tahoma"></font></span></b></td>
               
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
	   <?  echo $rs1[price];	  ?>
    </div></td>

	<td  ><div  align="left">
	 <a href="#" onClick="javascript:window.open('Sample_10.php?rd_id=<?=$rs1[rd_id]?>','xxx','scrollbars=yes,width=750,height=500')"> <?=code($rs1[rd_id])?></a>
    </div></td>
	<td><div  align="center">
	  <a href="#" onClick="javascript:window.open('Sample_4.php?rd_id=<?=$rs1["rd_id"]?>','xxx','scrollbars=yes,width=600,height=400')" ><?=find_sum_code($rs1[rd_id])?></a>
	</div></td>	
	<td align="center" >
	<? if(find_code_full($rs1["rd_id"]) == 'true'){?>
	เบิกหมดแล้ว
	<? }else{?>
<a href="?action=open_detail&r_id=<?=$r_id?>&rd_id=<?=$rs1["rd_id"]?>" >เบิก</a>

<? }?>
</td>
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

<?
include('config.inc.php');
if($OK <>'' ){

			for ($i=0;$i<=$total;$i++) {
					if ($chk[$i] != "") { 
						$sql_insert="UPDATE code SET  serial ='".$serial[$i]."',num_machine ='".$num_machine[$i]."'
						,num_box ='".$num_box[$i]."',num_stamp ='".$num_stamp[$i]."',colour ='".$colour[$i]."',remark ='".$remark[$i]."' ,screen = '".$screen[$i]."' 
						where c_id = '".$chk[$i]." '
						";
						echo "\$sql_insert  ".$sql_insert."<br>";
						$result_insert  = mysql_query($sql_insert); 
			
				}
		}

		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 
<?
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<style type="text/css">
<!--
.style2 {font-size: 12px; font-family: Tahoma; }
.style3 {font-size: 12px}
-->
</style>
<body>

<form action="" method="post" name="f22" >
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center">
<tr class="lgBar">
			   <td  height="32" colspan="9" align="center"><div class="style2">&nbsp;&nbsp;&nbsp;<strong>รายละเอียดเลขครุภัณฑ์</strong></div></td> 
    </tr>
<tr class="bmText"  bgcolor="#C1E0FF">
<td width="22%"  height="30"><div align="center" class="style2"><b>เลขครุภัณฑ์ที่</b></div></td>
	<td width="13%"  height="30"><div align="center" class="style2"><b>หมายเลขลำดับ</b></div></td>
	<td width="13%"  height="30"><div align="center" class="style2"><b>หมายเลขเครื่อง<br>(ถ้ามี)</b></div></td>
	<td width="13%"  height="30"><div align="center" class="style2"><b>หมายเลขกรอบ<br>(ถ้ามี)</b></div></td>
	  <td width="16%"  height="30"><div align="center" class="style2"><b>หมายเลขจดทะเบียน<br>(ถ้ามี)</b></div></td>
	<td width="11%"  height="30"><div align="center" class="style2"><b>หมายเลขจอ</b></div></td>
	<td width="12%"  height="30"><div align="center" class="style2"><b>อื่นๆ(ถ้ามีระบุ)</b></div></td>
    </tr>
<?

$sql = "SELECT * FROM code
Where  rd_id = '$rd_id' 
group by code order by code";
$result = mysql_query($sql);
$total = 0;
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
//echo $sql."<br>";
$result = mysql_query($sql);
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}

while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';

	$i++;
?>
<tr  class="bmText" bgcolor="#CCCCCC" >
	<td height="30"><div align="left" class="style2">&nbsp;
	<?=$rs1[code]?>  
	<input  type="hidden" name='chk[<?=$i?>]' value="<? echo $rs1["c_id"]?>">
    </div></td>
<td height="30"><div align="left" class="style2">
  <div align="center">
    <input  type="text" name="serial[<?=$i?>]" value="<?=$rs1[serial]?>" size="10"> 
  </div>
</div></td>
	<td height="30"><div align="left" class="style2">
	    <div align="center">
	      <input  type="text" name="num_machine[<?=$i?>]" value="<?=$rs1[num_machine]?>" size="10">  
	          </div>
	</div></td>
	<td height="30"><div align="left" class="style2">
	    <div align="center">
	      <input  type="text" name="num_box[<?=$i?>]" value="<?=$rs1[num_box]?>" size="10">
	          </div>
	</div></td>
<td height="30"><div align="left" class="style2">
	<div align="center">
	  <input  type="text" name="num_stamp[<?=$i?>]" value="<?=$rs1[num_stamp]?>" size="10">
	  </div>
</div></td>
<td height="30"><div align="left" class="style2">
	<div align="center">
	  <input  type="text" name="screen[<?=$i?>]" value="<?=$rs1[screen]?>" size="10">
	  </div>
</div></td>
<td height="30"><div align="left" class="style2">
  <div align="center">
	  <input  type="text" name="remark[<?=$i?>]" value="<?=$rs1[remark]?>" size="10">
	  </div>
</div></td>
</tr>
<? 

}?>
<input type="hidden" name="total" value="<?=$i?>">
<tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value=" บันทึก "  onClick="return godel();"  >&nbsp;
                    <input type="reset" name="formbutton2" value="ยกเลิก" onClick="window.close();">    </td>
                </tr>
				<tr>
				<td colspan="10">
				<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp; รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?&Page=$Prev_Page&rd_id=$rd_id'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?Page=$i&rd_id=$rd_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?Page=$Next_Page&rd_id=$rd_id'> หน้าถัดไป>> </a>";

?><br><br>
</FONT></center></div>
				</td>
				</tr>
</table>
</td>
</tr>
</table>
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
function pro_name($od_id){
	$sql1 ="select  *  from order1_detail where od_id =  '$od_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[product];
}
function r_amount($id){
	$sql1 ="select  *  from receive_order1 where id =  '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[r_amount];
}
function amount($pro_name){
	$sql1 ="select  *  from product where pro_name =  '$pro_name'  and status = 0";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[amount];
}
?>


<?
include('config.inc.php');

if($del == 'del'){
	
	$sql = "DELETE FROM code WHERE c_id=$c_id";
	$result = mysql_query($sql);
	
	$sql_up = "DELETE  FROM service  WHERE c_id =$c_id ";
	$result_up  = mysql_query($sql_up); 
	
	$sql_del = "DELETE FROM move WHERE c_id=$c_id";
	$result_del = mysql_query($sql_del);
		
	$sql_del = "DELETE FROM useful WHERE c_id=$c_id";
	$result_del = mysql_query($sql_del);
			
	echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=sample_10.php?rd_id=$rd_id\">\n";
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
<script language="JavaScript" type="text/javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<link href="style2.css" rel="stylesheet" type="text/css">
<body>

<form action="" method="post" name="f22" ><br>
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
      <td  height="28" colspan="7" style="border: #000000 1px solid;" ><div class="style2">&nbsp;&nbsp;&nbsp;<strong>รายละเอียดเลขครุภัณฑ์</strong></div></td> 
    </tr>
<tr class="bmText"  bgcolor="#C1E0FF">
<td width="21%"  height="28" style="border: #000000 1px solid;"  align="center"><b>เลขครุภัณฑ์ที่</b></td>
	<td width="18%"   style="border: #000000 1px solid;"  align="center">&nbsp;</td>
	<td width="13%"  style="border: #000000 1px solid;"  align="center">&nbsp;</td>
	<td width="11%"   style="border: #000000 1px solid;"  align="center">&nbsp;</td>
<td width="16%"  style="border: #000000 1px solid;"  align="center">&nbsp;</td>
<td width="14%"   style="border: #000000 1px solid;"  align="center">&nbsp;</td>
<td width="7%"   style="border: #000000 1px solid;"  align="center">&nbsp;ลบ</td>
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
	<td height="30" style="border: #000000 1px solid;" ><div align="left" class="style2">&nbsp;
	<?=$rs1[code]?>  
	<input  type="hidden" name='chk[<?=$i?>]' value="<? echo $rs1["c_id"]?>">
    </div></td>
<td height="30" style="border: #000000 1px solid;"  align="center">

    <input    type="button"  name="search" value="รายละเอียดครุภัณฑ์" class="buttom" onClick="javascript:popup('sample_11.php?c_id=<?=$rs1[c_id]?>','',500,550);" ></td>
	<td height="30" style="border: #000000 1px solid;"  align="center">
	     <input    type="button" name="search" value="สภาพ" class="buttom" onClick="javascript:popup('add_status.php?c_id=<?=$rs1[c_id]?>','',350,220);" ></td>
	<td height="30" style="border: #000000 1px solid;"  align="center">
	    <input   type="button" name="search" value="จัดสรร" class="buttom" onClick="javascript:popup('add_use.php?c_id=<?=$rs1[c_id]?>','',600,300);" ></td>
	<td height="30" style="border: #000000 1px solid;"  align="center">
	    <input   type="button" name="search" value="การซ่อมบำรุง" class="buttom" onClick="javascript:popup('add_serv.php?c_id=<?=$rs1[c_id]?>','',600,300);" ></td>
			<td height="30" style="border: #000000 1px solid;"  align="center">
	    <input    type="button"  name="search" value="การจำหน่าย" class="buttom" onClick="javascript:popup('add_sale.php?c_id=<?=$rs1[c_id]?>','',600,300);" ></td>
		<td  style="border: #000000 1px solid;" ><div  align="center">
		<a href="sample_10.php?action=view_detail_1&del=del&c_id=<?=$rs1[c_id]?>&rd_id=<?=$rd_id?>"  onclick="return godel()"><img src="images/Delete.png" border="0" /></a>

    </div></td>
</tr>
<? 

}?>
<input type="hidden" name="total" value="<?=$i?>">
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
</FONT></center></div>				</td>
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
?><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  



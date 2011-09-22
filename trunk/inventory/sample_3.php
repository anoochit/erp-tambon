<?
include('config.inc.php');
if($del =='del' ){
		$sql_up = "UPDATE code SET o_id = ''  WHERE c_id =$c_id ";
		echo "\$sql_up  ".$sql_up."<br>";
		$result_up  = mysql_query($sql_up); 
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
<script language="JavaScript">
function closewin() {
	window.opener.location.reload();
	window.close();
}
</script>
<body>

<form action="" method="post" name="f22" >
<table width="100%" align="center">
<tr class="lgBar">
			   <td  height="32" colspan="9" align="center"><div class="style2">&nbsp;&nbsp;&nbsp;<strong>เลขครุภัณฑ์ที่เบิก</strong></div></td> 
    </tr>
<tr class="bmText"  bgcolor="#C1E0FF">
	<td width="88%"  height="30"><div align="center" class="style2"><b>เลขครุภัณฑ์ที่</b></div></td>

	<td width="12%" align="center" ><span class="style3"></span></td>
    </tr>
<?
$sql = "SELECT * FROM code Where  o_id = '$o_id'  and  rd_id = '$rd_id' ";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
?>
<tr  class="bmText" bgcolor="<?=$bg?>" >
<td height="25"><div align="left" class="style2">&nbsp;
	<?=$rs1[code]?>  
    </div></td>
	<td width="12%"   align="center"><div class="style2" ><a href="?del=del&c_id=<?=$rs1["c_id"]?>&o_id=<?=$rs1["o_id"]?>&rd_id=<?=$rs1["rd_id"]?>" onClick="godel();"> ลบ</a>
    </div></td>
</tr>
<? 
	$i++;
}?>
</table>
</form> 
</body>
</html>
<script language="javascript">

function godel()
{
	if (confirm("คุณต้องการลบข้อมูล ใช่หรือไม่"))
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


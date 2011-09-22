<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($del == 'del'){
		$sql = "DELETE FROM user_account WHERE user_id='$u_id'";
		$result = mysql_query($sql);

}
?>
<? if($_SESSION["username"] !=''){?>
<table width="657" border="0" cellpadding="1" cellspacing="1" style="border-collapse:collapse;">
  <tr bgcolor="#C9D4E1" >
    <td height="30" style="border: #000000 1px solid;" colspan="5">
	&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?action=setup_add">[ เพิ่มผู้ใช้ ]</a>	</td>
  </tr>
  <tr bgcolor="#C9D4E1" >
    <td width="16%" height="30" style="border: #000000 1px solid;"><div align="center"><strong>username</strong></div></td>
    <td width="16%" style="border: #000000 1px solid;"><div align="center"><strong>user_pwd</strong></div></td>
    <td width="31%" style="border: #000000 1px solid;"><div align="center"><strong>firstname - lastname</strong></div></td>
    <td width="20%" style="border: #000000 1px solid;"><div align="center"><strong>dept_id</strong></div></td>
	<td width="17%" style="border: #000000 1px solid;"><div align="center"><strong>&nbsp;</strong></div></td>
  </tr>
  <?
  $sql = "SELECT * From user_account   where dep_id != 'all' and dep_id != 'ปลัด' ";
	$result = mysql_query($sql);
	$i =1 ;
	while($rs=mysql_fetch_array($result)){
	if($i%2 == 1){
		$bg = '#BCEDF5';
	}else{
		$bg = '#E8E8E8';
	}
  ?>
    <tr bgcolor="<? echo $bg ?>"  style="border: #000000 1px solid;">
    <td height="30" style="border: #000000 1px solid;"><div  align="center">
	<? echo $rs[username];?></div></td>
    <td align="center" style="border: #000000 1px solid;"><? echo $rs[user_pwd];?></td>
    <td style="border: #000000 1px solid;"><div align="left"><? echo $rs[firsname]."  ".$rs[surname];?></div></td>
    <td style="border: #000000 1px solid;"><div align="left"><? echo find_dep_name($rs[dep_id]);?></div></td>
	<td style="border: #000000 1px solid;"><div  align="center"><a href="index.php?action=setup_edit&u_id=<? echo $rs[user_id]?>">[ แก้ไข ]</a>&nbsp;<a href="index.php?action=setup&del=del&u_id=<? echo $rs[user_id]?>" onClick="return del_confirm1();">[ ลบ ]</a></div></td>
  </tr>
 <? 
 $i++;
 }?>
</table>
<? }else{
	header("Location: index.php");
}
?><script language="JavaScript" type="text/javascript">
function del_confirm1()
{
	if (confirm("คุณต้องการลบผู้ใช้นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
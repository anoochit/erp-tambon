
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
function godel()
{
	if (confirm("�س��ͧ���ź�����Ź�� ���������"))
	{
		return true;
	}
		return false;
}
</script>
<?
//----------ź--------------
if($del =='del'){
$sql = "DELETE FROM  passwd WHERE pwd_username ='$u_ser' ";
   $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ��ź������</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=user\">\n";
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<?
//-----------�ʴ�������-------------------
    $sql=" Select  tmcode,tmname from type_mem  order by tmcode ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
		
	 <table width="65%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
	 <tr bgcolor="#99CCFF" class="lgBar">				
    <td height="30"  colspan="6"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp;&nbsp;[ <a href="?action=add_type_mem" class="catLink1">	���������Ż������������ԡ��</a> ]</div></td> 
	 </tr>
     <tr class="lgBar" bgcolor="#99CCFF">					 
	<td width="18%" height="28"  align="center" style="border: #000000 1px solid;" > ����    </td>
	   <td width="66%" style="border: #000000 1px solid;"  align="center">�������������ԡ��      </td>

     <td width="16%" style="border: #000000 1px solid;" align="center" >&nbsp;���       </td>
	 </tr>
	 <?
if($result)
		while ($d =mysql_fetch_array($result)){
		$r++;
	?>
		<tr class="bmText" >
<td  align="center" style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[tmcode]?></td>
	   <td  align="left" style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[tmname]?></td>
	   
		<td align="center" style="border: #000000 1px solid;" ><a href="?action=edit_type_mem&TMCODE=<? echo $d[tmcode]?>"> <img src="images/Modify.png" border="0" /></a></td>
   	   </tr>
	   <? }?>

	 </table>


</body>
</html>


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
	$r = 0;
    $sql="Select  scode,sname,amt from service1  order by scode";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
<table width="60%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
       <tr bgcolor="#99CCFF" class="lgBar">
         <td height="30"  colspan="6"  style="border: #000000 1px solid;"><div align="left">&nbsp;&nbsp;&nbsp;[ <a href="?action=add_service" class="catLink1"> ���������Ť������ҵù��(�ػ�ó�)</a> ]</div></td>
       </tr>
       <tr class="lgBar" bgcolor="#99CCFF">
         <td width="15%" height="28"  align="center" style="border: #000000 1px solid;">����</td>
         <td width="54%" style="border: #000000 1px solid;"  align="center">������������</td>
         <td width="22%" style="border: #000000 1px solid;" align="center" >&nbsp;������</td>
		 <td width="9%" style="border: #000000 1px solid;" align="center" >&nbsp; ��� </td>
       </tr>
       <?
if($result)
		while ($d =mysql_fetch_array($result)){
		$r++;
	?>
       <tr class="bmText" >
	     <td  align="center" style="border: #000000 1px solid;" >&nbsp;&nbsp;
             <?=$d[scode]?></td>
			   <td  align="left"style="border: #000000 1px solid;" >&nbsp;&nbsp;
             <?=$d[sname]?></td>
         <td    align="right"style="border: #000000 1px solid;" >
             <?=$d[amt]?>&nbsp;&nbsp;</td>
         <td align="center" style="border: #000000 1px solid;" ><a href="?action=edit_service&scode=<? echo $d[scode]?>"> <img src="images/Modify.png" border="0" /></a></td>
       </tr>
       <? }?>
      
</table>
	 </body>
</html>

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
<form name="save" action=""  method="post" enctype="multipart/form-data">
<table width="35%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle"><!--<img src="PNG-32/Bar Chart.png" align="absmiddle"> -->&nbsp;&nbsp;&nbsp;����</div>	</td>
	</tr>
</table>	</td>
	</tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="23%"><strong>&nbsp;&nbsp;�����ҹ</strong></td>
                    <td width="77%"  ><div><select name="HOCODE"  ><?
			$query  ="select * from house  order by HOCODE";
			$result=mysql_query($query);
			?>
    <option value=''>----------������----------</option> 
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[HOCODE];?>"
		<?
		if($HOCODE == $d[HOCODE]) echo "selected";
		?>
		><? echo $d[HONAME];?></option>
                        <? }?>
            </select></div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ���� "  class="buttom"></td>
  </tr>
</table>
	</td>
</tr>
</table>
</form>

<?
//-----------�ʴ�������-------------------
	$r = 0;
    $sql="Select  z.hocode,honame,z_id,z_name from zone z,house h where z.hocode = h.hocode ";
	if($HOCODE <>'') $sql .= "   and  z.HOCODE = '$HOCODE' ";
	$sql .= "  order by hocode,z_id";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
	 <table width="80%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
       <tr bgcolor="#99CCFF" class="lgBar">
         <td height="30"  colspan="6"  style="border: #000000 1px solid;"><div align="left">&nbsp;&nbsp;&nbsp;[ <a href="?action=add_zone" class="catLink1"> ����������ࢵ</a> ]</div></td>
       </tr>
       <tr class="lgBar" bgcolor="#99CCFF">
	   <td width="8%" height="28"  align="center" style="border: #000000 1px solid;">���</td>
         <td width="12%" height="28"  align="center" style="border: #000000 1px solid;">����ࢵ</td>
         <td width="29%" style="border: #000000 1px solid;"  align="center">ࢵ</td>
         <td width="32%" style="border: #000000 1px solid;" align="center" >&nbsp;���������ҹ</td>
		  <td width="12%" style="border: #000000 1px solid;" align="center" >&nbsp;������</td>
		 <td width="7%" style="border: #000000 1px solid;" align="center" >&nbsp; ��� </td>
       </tr>
       <?
if($result)
		while ($d =mysql_fetch_array($result)){
		$r++;
	?>
       <tr class="bmText" >
	    <td  align="center" style="border: #000000 1px solid;" >&nbsp;&nbsp;
             <?=$r?></td>
	     <td  align="center" style="border: #000000 1px solid;" >&nbsp;&nbsp;
             <?=$d[z_id]?></td>
			   <td  align="left"style="border: #000000 1px solid;" >&nbsp;&nbsp;
             <?=$d[z_name]?></td>
         <td   align="left" style="border: #000000 1px solid;" >&nbsp;&nbsp;
             <?=$d[honame]?></td>
         <td   align="center" style="border: #000000 1px solid;" >&nbsp;&nbsp;
             <?=$d[hocode]?></td>
         <td align="center" style="border: #000000 1px solid;" ><a href="?action=edit_zone&z_id=<? echo $d[z_id]?>&hocode=<? echo $d[hocode]?>"> <img src="images/Modify.png" border="0" /></a></td>
       </tr>
       <? }?>
       <?
?>
      </table>
	 </body>
</html>

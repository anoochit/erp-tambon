
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
    $sql=" Select * from start    ";
		$result=mysql_query($sql);
		
		$d =mysql_fetch_array($result);
		?><table width="90%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
		<tr bgcolor="#99CCFF" class="lgBar">				
    <td height="35"  colspan="4"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp; ������������� <a href="?action=add_start" > <img src="images/Modify.png" border="0"  align="absmiddle"/>���</a></div></td> 
	 </tr>
  <tr>
    <td width="21%" height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;�է�����ҳ</td>
    <td  class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[MYEAR]?>
    </strong></td>
	    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;�ѵ������(%)  </td>
    <td width="32%" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[VAT]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;������Ӣ�鹵��  </td>
    <td width="27%" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[mins]?>
    </strong></td>
    <td width="20%" class="lgBar"  style="border: #000000 1px solid;">&nbsp;��Һ�ԡ��/�������ҵ�  </td>
    <td width="32%" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp; 
      <?=$d[rent]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;�����ӹѡ�ҹ</td>
    <td colspan="3" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[NAME]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;�Ţ���</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[HNO]?>
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;">&nbsp;������</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[MOO]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;���������ҹ</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[HOUSE]?>
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;">&nbsp;���</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[ROAD]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;�Ӻ�/�ǧ</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[TUMBOL]?>
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;">&nbsp;�����/ࢵ</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[AMPHER]?>
    </strong></td>
  </tr>
    <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;�ѧ��Ѵ</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[PROVINCE]?>
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;">&nbsp;������ɳ���</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[ZIPCODE]?>
    </strong></td>
  </tr>
    <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;���Ѿ��</td>
    <td  class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[TEL]?>
    </strong></td>
 
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;���˹觼���Ǩ�ͺ������</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[h_position]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;�Ţ��Шӵ�Ǽ����������</td>
    <td  class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[tax]?>
    </strong></td>
 
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;�������˹����ǹ��ä�ѧ</td>
    <td  class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[head_klung]?>
    </strong></td>
  </tr>
    <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;��ѡ�ҹ���Թ</td>
    <td  class="bmText_1" style="border: #000000 1px solid;" colspan="3"><strong>&nbsp;
      <?=$d[receive_name]?>
    </strong></td>
 

  </tr>
</table>

		</body>
</html>

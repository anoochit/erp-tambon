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
<script language="JavaScript" type="text/javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
		    if (  document.add_user.honame.value=='' || document.add_user.honame.value==' ' )
           {
           alert("��سҡ�͡���������ҹ");
           document.add_user.honame.focus();           
           return false;
           }
		 if (confirm("�س��ͧ��úѹ�֡������ ���������"))
			{
					return true;
			}else{
					return false;
			}
	}
</script>
<?
//-----------�ѹ�֡-------------------
if($save_add <>''){
	$query = "  UPDATE start  SET  vat = '$vat' , rent = '$rent' , mins = '$mins' , myear = '$year', NAME = '$NAME' , HNO = '$HNO',
     MOO = '$MOO' ,  HOUSE =  '$HOUSE' ,ROAD = '$ROAD'  ,TUMBOL = '$TUMBOL', AMPHER =  '$AMPHER'  , 
	 PROVINCE = '$PROVINCE' , ZIPCODE = '$ZIPCODE' , TEL = '$TEL' ,h_position ='$h_position' , tax = '$tax' ,receive_name = '$receive_name', head_klung = '$head_klung'  ";
		$result=mysql_query($query);
	echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ�úѹ�֡������</font></center><br><br>";
print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=start\">\n";
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="add_user"  method="post">
<?
//-----------�ʴ�������-------------------
    $sql=" Select * from start    ";
		$result=mysql_query($sql);
		$d =mysql_fetch_array($result);
		?>
<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
	<table width="100%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
		<tr bgcolor="#99CCFF" class="lgBar">				
    <td height="35"  colspan="4"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp; ��䢢������������ </div></td> 
	 </tr>
  <tr>
    <td width="17%" height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;�է�����ҳ</td>
    <? $queryMyear  ="select myear from start ";
			$result_Myear=mysql_query($queryMyear);
			if($result_Myear)
			$Myear =mysql_fetch_array($result_Myear);
			?>
	<td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
   <select name="year">
                          <? if($year ==''  ) $year =$Myear[myear];?>
                          <?
	for($i=-2;$i<=2;$i++){
	?>
                          <option value="<?=date("Y") + 543+$i?>" <?	if($year ==(date("Y") + 543+$i) ) echo "selected" ;
	?>>
                            <?=date("Y") + 543+$i?>
                          </option>
                          <?
	}
	?>
                        </select>
    </strong></td>
	    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;�ѵ������(%)  </td>
    <td width="30%" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="vat" value="<?=$d[VAT]?>" size="10"  />
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;������Ӣ�鹵�� </td>
    <td width="30%" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="mins" value="<?=$d[mins]?>" size="10"  />
    </strong></td>
    <td width="22%" class="lgBar"  style="border: #000000 1px solid;">&nbsp;��Һ�ԡ��/�������ҵ� </td>
    <td width="31%" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp; 
      <input type="text" name="rent" value="<?=$d[rent]?>" size="10"  />
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;�����ӹѡ�ҹ</td>
    <td colspan="3" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
     <input type="text" name="NAME" value="<?=$d[NAME]?>" size="20"  /> 
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;�Ţ���</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="HNO" value="<?=$d[HNO]?>" size="20"  />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;">&nbsp;������</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
    <input type="text" name="MOO" value="<?=$d[MOO]?>" size="20"  />
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;���������ҹ</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
     <input type="text" name="HOUSE" value="<?=$d[HOUSE]?>" size="20"  />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;">&nbsp;���</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="ROAD" value="<?=$d[ROAD]?>" size="20"  />
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;�Ӻ�/�ǧ</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="TUMBOL" value="<?=$d[TUMBOL]?>" size="20"  />
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;">&nbsp;�����/ࢵ</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="AMPHER" value="<?=$d[AMPHER]?>" size="20"  />
    </strong></td>
  </tr>
    <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;�ѧ��Ѵ</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="PROVINCE" value="<?=$d[PROVINCE]?>" size="20"  />
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;">&nbsp;������ɳ���</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="ZIPCODE" value="<?=$d[ZIPCODE]?>" size="20"  />
    </strong></td>
  </tr>
    <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;���Ѿ��</td>
    <td  class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="TEL" value="<?=$d[TEL]?>" size="15"  />
    </strong></td>

    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;���˹觼���Ǩ�ͺ������</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="h_position" value="<?=$d[h_position]?>" size="20"  />
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;�Ţ��Шӵ�Ǽ����������</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="tax" value="<?=$d[tax]?>" size="15"  />
    </strong></td>

    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;�������˹����ǹ��ä�ѧ</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="head_klung" value="<?=$d[head_klung]?>" size="20"  />
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;���;�ѡ�ҹ���Թ</td>
    <td colspan="3" class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="receive_name" value="<?=$d[receive_name]?>" size="20"  />
    </strong></td>
  </tr>
  <tr>
	<td colspan="4" align="center" class="lgBar" style="border: #000000 1px solid;">
	  <input name="save_add" type="submit"  value="�ѹ�֡������" onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ¡��ԡ " >	  </td>
</tr>
</table>
	  </td>
 </tr></table>
</form>
</body>
</html>

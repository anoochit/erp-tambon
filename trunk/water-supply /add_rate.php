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
				    if (  document.add_user.brate.value=='' || document.add_user.brate.value==' ' )
           {
				   alert("��سҡ�͡����ҳ����������");
				   document.add_user.brate.focus();           
				   return false;
           }
		      if (  document.add_user.erate.value=='' || document.add_user.erate.value==' ' )
           {
				   alert("��سҡ�͡����ҳ���");
				   document.add_user.erate.focus();           
				   return false;
           }
		if (  document.add_user.amt.value=='' || document.add_user.amt.value==' ' )
           {
				   alert("��سҡ�͡�ѵ�Ҥ�ҹ��");
				   document.add_user.amt.focus();           
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
		$sql="select  max(tmcode) as max FROM rate_water ";
		$result = mysql_query($sql);
		$recn=mysql_fetch_array($result);
		if($recn["max"] ==''  or $recn["max"]  ==NULL ){
			$tmcode = '01';
		}else{
			$tmcode  = $recn["max"] + 1;
		}
		if(strlen($tmcode)==1) $tmcode = '0'.$tmcode;
		else $tmcode = $tmcode;
	$query=" INSERT INTO rate_water (moo1, brate ,erate , amt , tmcode )
		 VALUES ( '$moo1', '$brate' ,'$erate' , '$amt' , '$tmcode')";
		echo $query."<br>";
		$result=mysql_query($query);
		echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ�úѹ�֡������</font></center><br><br>";
   		print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=rate\">\n";
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="add_user"  method="post">
<table width="70%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="4"><div>&nbsp;&nbsp;&nbsp;�����������ѵ�Ҥ�ҹ�ӻл�</div></td>
  			</tr>
  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
  <td width="22%" height="30" align="right" a  >���������ҹ </td>
	<td align="left" colspan="3">&nbsp;&nbsp;
	  <select name="moo1"  ><?
			$query  ="select hocode , honame from house order by hocode";
			$result=mysql_query($query);
			?>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[hocode];?>"
		<?
		if($moo1 == $d[hocode]) echo "selected";
		?>
		><? echo $d[honame];?></option>
                        <? }?>
            </select>
	  </td>
</tr>
  <tr class="bmText"><td  colspan="4" background="images/hdot2.gif"> </td>
  </tr>
<tr class="bmText">
  <td width="22%" height="28" align="right" >����ҳ����������</td>
	<td width="24%" align="left">&nbsp;&nbsp;
	  <input  type="text" name="brate" value="<?=$brate?>" size="10" maxlength="50"  /></td>
  <td a align="right" width="20%"  >����ҳ��Ӷ֧</td>
	<td width="34%" align="left">&nbsp;&nbsp;
	  <input  type="text" name="erate" value="<?=$erate?>" size="10" maxlength="10"  /></td>
</tr>
  <tr class="bmText"><td colspan="4" background="images/hdot2.gif"> </td>
  </tr>
<tr class="bmText">
  <td width="22%" height="28" align="right"   >�ѵ�Ҥ�ҹ��</td>
	<td width="24%" align="left">&nbsp;&nbsp;
	  <input  type="text" name="amt" value="<?=$amt?>" size="10" maxlength="50"  /></td>
</tr>
  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr>
	<td colspan="4" align="center" height="35">
	  <input name="save_add" type="submit"  value="�ѹ�֡������" onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ¡��ԡ " >	  </td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>

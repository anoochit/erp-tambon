<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($save_add <>'' ){
   $sql_user=" UPDATE rate_water SET brate = '$brate' ,erate = '$erate'  , amt = '$amt' ,moo1 ='$moo1'   where tmcode = '$tmcode'  ";
  	 	$result_user=mysql_query($sql_user);
		echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ����䢢�����</font></center><br><br>";
     print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=rate\">\n";
}
 ?>
 <script language="JavaScript" type="text/javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
		   if (  document.edit_.brate.value=='' || document.edit_.brate.value==' ' )
           {
				   alert("��سҡ�͡����ҳ����������");
				   document.edit_.brate.focus();           
				   return false;
           }
		      if (  document.edit_.erate.value=='' || document.edit_.erate.value==' ' )
           {
				   alert("��سҡ�͡����ҳ���");
				   document.edit_.erate.focus();           
				   return false;
           }
		if (  document.edit_.amt.value=='' || document.edit_.amt.value==' ' )
           {
				   alert("��سҡ�͡�ѵ�Ҥ�ҹ��");
				   document.edit_.amt.focus();           
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
 <link href="style.css" rel="stylesheet" type="text/css" />
 <?
 //-----------���¡������-------------------
   $sql_1="select * from rate_water where  tmcode = '$tmcode' ";
   $result1 = mysql_query($sql_1);
   
   $d22  =mysql_fetch_array($result1);
 ?>
<form name="edit_"  method="post">
  <table width="70%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="4"><div>&nbsp;&nbsp;&nbsp;��������ѵ�Ҥ�ҹ�ӻл�</div></td>
  			</tr>
  <tr class="bmText"><td colspan="4" background="images/hdot2.gif"> </td></tr>
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
		if($d22[moo1] == $d[hocode]) echo "selected";
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
	  <input  type="text" name="brate" value="<?=$d22 [BRATE]?>" size="10" maxlength="50"  /></td>

  <td a align="right" width="20%"  >����ҳ��Ӷ֧</td>
	<td width="34%" align="left">&nbsp;&nbsp;
	  <input  type="text" name="erate" value="<?=$d22 [ERATE]?>" size="10" maxlength="10"  /></td>
</tr>
  <tr class="bmText"><td colspan="4" background="images/hdot2.gif"> </td>
  </tr>
<tr class="bmText">
  <td width="22%" height="28" align="right"   >�ѵ�Ҥ�ҹ��</td>
	<td width="24%" align="left">&nbsp;&nbsp;
	  <input  type="text" name="amt" value="<?=$d22 [AMT]?>" size="10" maxlength="50"  /></td>
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

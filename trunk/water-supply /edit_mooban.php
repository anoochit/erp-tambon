<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($save_add <>'' ){
		if(check_edit_mooban($hocode,$honame,$hocode_old,$honame_old) <=0){
				   $sql_user=" UPDATE house SET   honame = '$honame'  ,hocode ='$hocode'  where honame = '$honame_old' and hocode = '$hocode_old'"; 
					$result_user=mysql_query($sql_user);
					echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ����䢢�����</font></center><br><br>";
					print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=mooban\">\n";
}else{
		echo "<br><br><center><font color=darkgreen>�������������ͪ��������ҹ��ӡ�سҺѹ�֡����������</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=edit_mooban&hocode=$hocode\">\n";
	}
}
//-----------���¡������-------------------
   $sql="SELECT * FROM house WHERE hocode = '$hocode' ";
   $result = mysql_query($sql);
   $d =mysql_fetch_array($result);
 ?>
 <script language="JavaScript" type="text/javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
		if (  document.edit_.hocode.value=='' || document.edit_.hocode.value==' ' )
           {
           alert("��سҡ�͡������");
           document.edit_.hocode.focus();           
           return false;
           }
		     if (  document.edit_.honame.value=='' || document.edit_.honame.value==' ' )
           {
           alert("��سҡ�͡���������ҹ");
           document.edit_.honame.focus();           
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
<form name="edit_"  method="post">
  <table width="40%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;������������ҹ</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="37%"  >������</td>
	<td width="63%" align="left">&nbsp;&nbsp;
	  <input type="text" name="hocode" value="<?=$d[HOCODE]?>" size="10" maxlength="100" />
	  <input  type="hidden" name="hocode_old" value="<?=$d[HOCODE]?>" size="20"  />
	  </td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="37%"  >���������ҹ</td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="honame" value="<?=$d[HONAME]?>" size="20" maxlength="50"   />
	  <input   type="hidden" name="honame_old" value="<?=$d[HONAME]?>" size="20" maxlength="50"  /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td colspan="2" align="center" height="35">
	  <input name="save_add" type="submit"  value="�ѹ�֡������" onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ¡��ԡ " >	  </td>
</tr>
</table>
</td></tr></table>
</form>
</body>
</html>

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
		   if (  document.add_user.trname.value=='' || document.add_user.trname.value==' ' )
           {
           alert("��سҡ�͡���ͻ���������Ѻ");
           document.add_user.trname.focus();           
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
	if(check_trname($trname) <=0){
	$query=" INSERT INTO type_rece (trcode, trname  )
		 VALUES ('$trcode','$trname'  )";
		$result=mysql_query($query);
	echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
	echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ�úѹ�֡������</font></center><br><br>";
   print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=type_rec\">\n";
	}else{
		echo "<br><br><center><font color=darkgreen>���ͻ���������Ѻ��ӡ�سҺѹ�֡����������</font></center><br><br>";
	}
}
//----------ź--------------
if($del =='del'){
$sql = "DELETE FROM  user WHERE user_id=$user_id";
   $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ��ź������</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_user\">\n";
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="add_user"  method="post">
<table width="40%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;���������Ż���������Ѻ</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
  <td a align="right" width="37%"  >����</td>
	<td width="63%" align="left">&nbsp;&nbsp;
	<?
		$sql="select  max(trcode) as max FROM type_rece ";
		$result = mysql_query($sql);
		$recn=mysql_fetch_array($result);
		if($recn["max"] ==''  or $recn["max"]  ==NULL ){
			$trcode = '01';
		}else{
			$trcode  = $recn["max"] + 1;
		}
		if(strlen($trcode)==1) $trcode = '0'.$trcode;
		else $trcode = $trcode;
	?>
	  <input type="text" name="trcode1" value="<?=$trcode?>" size="10" maxlength="100"  disabled="disabled" />
	  <input  type="hidden" name="trcode" value="<?=$trcode?>" size="20"  />
	  </td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="37%"  >����������Ѻ</td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="trname" value="<?=$trname?>" size="20" maxlength="50"  /></td>
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

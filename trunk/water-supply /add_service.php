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
		    if (  document.add_user.sname.value=='' || document.add_user.sname.value==' ' )
           {
           alert("��سҡ�͡���ͻ�����������");
           document.add_user.sname.focus();           
           return false;
           }
		      if (  document.add_user.amt.value=='' || document.add_user.amt.value==' ' )
           {
           alert("��سҡ�͡������");
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
	if(check_sname($sname) <=0){
	$query=" INSERT INTO service1 (scode, sname ,amt )
		 VALUES ('$scode','$sname' ,'$amt' )";
		$result=mysql_query($query);
	echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
	echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ�úѹ�֡������</font></center><br><br>";
   print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=service\">\n";
	}else{
		echo "<br><br><center><font color=darkgreen>���ͻ����������ҫ�ӡ�سҺѹ�֡����������</font></center><br><br>";
	}
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="add_user"  method="post">
<table width="40%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;���������Ť������ҵù��(�ػ�ó�)</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
  <td a align="right" width="31%"  >����</td>
	<td width="69%" align="left">&nbsp;&nbsp;
	<?
		$sql="SELECT max(scode) as max FROM service1";
		$result = mysql_query($sql);
		$recn=mysql_fetch_array($result);
		if($recn["max"] ==''  or $recn["max"]  ==NULL ){
			$scode = '001';
		}else{
			$scode  = $recn["max"] + 1;
				$st ='';
				if(strlen($scode) <3){
						for($i=0;$i<(3- strlen($scode));$i++){
								$st .="0";
						}
						$scode = $st.$scode;
				}
		}
	?>
	  <input type="text" name="scode1" value="<?=$scode?>" size="10" maxlength="100"  disabled="disabled" />
	  <input  type="hidden" name="scode" value="<?=$scode?>" size="20"  />
	  </td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="31%"  >������������</td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="sname" value="<?=$sname?>" size="25" maxlength="50"  /></td>
</tr>
  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="31%"  >������</td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="amt" value="<?=$amt?>" size="10" maxlength="10"  /></td>
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

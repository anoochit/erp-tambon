<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($save_add <>'' and  find_bin($regno,$mcode) <=0){
	$query=" INSERT INTO  bin_detail(mcode,regno,damt)
		 VALUES ('$mcode','$regno','1')";
		echo $query."<br>";
		$result=mysql_query($query);
?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>    
<?	
}elseif($save_add <>'' and  find_bin($regno) > 0){
	echo "<br><br><center><font color=darkgreen>�����ū�ӡ�سҡ�͡����������</font></center><br><br>";
}
if($save_edit <>'' and  find_bin_1($regno,$regno_old)<=0){

	$query=" UPDATE  bin_detail SET regno = '$regno', damt  = '1'  WHERE mcode ='$mcode' and regno = '$regno_old' ";
		echo $query."<br>";
		$result=mysql_query($query);
?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>    
<?	
}elseif($save_edit <>'' and  find_bin_1($regno,$regno_old) > 0){
	echo "<br><br><center><font color=darkgreen>�����ū�ӡ�سҡ�͡����������</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"2;URL=add_bin_detail.php?mcode=$mcode&regno=$regno_old&edit=edit\">\n";
}
?>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
		   if (  document.add_bin.regno.value.length == 0 || document.add_bin.regno.value==' ' )
           {
				   alert("��سҡ�͡�Ţ����¹�ѧ");
				   document.add_bin.regno.focus();           
				   return false;
           }
		   if (  document.add_bin.damt.value.length == 0 || document.add_bin.damt.value==' ' )
           {
				   alert("��سҨӹǹ�Թ");
				   document.add_bin.damt.focus();           
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
<form name="add_bin"  method="post">
<? if($add <>''){ ?>
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" >
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;�����Ţ����¹�ѧ</div></td>
  			</tr>
	<tr>
  <td a align="right" width="33%"  class="bmText">�Ţ����¹�ѧ</td>
  <td width="67%" align="left">&nbsp;&nbsp;
	  <input name="regno" type="text" id="regno" value="<?=$regno?>" size="20" maxlength="20" />
</td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="�ѹ�֡������"  onClick="return validate()"/ class="buttom">	  &nbsp;
	  <input type="reset" name="reset" value=" ¡��ԡ " onClick="window.close()" class="buttom">     </td>
</tr>
</table>
</td></tr></table>
<? }elseif($edit<>''){
	$sql=" select * from bin_detail where  mcode like '$mcode' and regno = '$regno'    ";
	$result=mysql_query($sql);
	$d =mysql_fetch_array($result);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" >
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;����Ţ����¹�ѧ</div></td>
  			</tr>
	<tr>
  <td a align="right" width="33%"  class="bmText">�Ţ����¹�ѧ</td>
	<td width="67%" align="left">&nbsp;&nbsp;
	  <input name="regno" type="text" id="regno" value="<?=$d[regno]?>" size="20" maxlength="20" />
	  <input name="regno_old"  type="hidden"id="regno_old" value="<?=$d[regno]?>"  /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_edit" type="submit"  value="��䢢�����"  onClick="return validate()"/ class="buttom">
	  <input type="reset" name="reset" value=" ¡��ԡ " onClick="window.close()" class="buttom">     </td>
</tr>
</table>
</td></tr></table>
<? }?>
</form>
<br />
</body>
</html>
<?
function find_bin($regno){
	$sql1 =" select * from bin_detail where   regno = '$regno' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_bin_1($regno,$regno_old){
	$sql1 =" select * from bin_detail where   regno = '$regno' and regno != '$regno_old' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
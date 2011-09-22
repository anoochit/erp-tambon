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
	echo "<br><br><center><font color=darkgreen>ข้อมูลซ้ำกรุณากรอกข้อมูลใหม่</font></center><br><br>";
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
	echo "<br><br><center><font color=darkgreen>ข้อมูลซ้ำกรุณากรอกข้อมูลใหม่</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"2;URL=add_bin_detail.php?mcode=$mcode&regno=$regno_old&edit=edit\">\n";
}
?>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		   if (  document.add_bin.regno.value.length == 0 || document.add_bin.regno.value==' ' )
           {
				   alert("กรุณากรอกเลขทะเบียนถัง");
				   document.add_bin.regno.focus();           
				   return false;
           }
		   if (  document.add_bin.damt.value.length == 0 || document.add_bin.damt.value==' ' )
           {
				   alert("กรุณาจำนวนเงิน");
				   document.add_bin.damt.focus();           
				   return false;
           }
			 if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
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
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;เพิ่มเลขทะเบียนถัง</div></td>
  			</tr>
	<tr>
  <td a align="right" width="33%"  class="bmText">เลขทะเบียนถัง</td>
  <td width="67%" align="left">&nbsp;&nbsp;
	  <input name="regno" type="text" id="regno" value="<?=$regno?>" size="20" maxlength="20" />
</td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()"/ class="buttom">	  &nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.close()" class="buttom">     </td>
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
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;แก้ไขเลขทะเบียนถัง</div></td>
  			</tr>
	<tr>
  <td a align="right" width="33%"  class="bmText">เลขทะเบียนถัง</td>
	<td width="67%" align="left">&nbsp;&nbsp;
	  <input name="regno" type="text" id="regno" value="<?=$d[regno]?>" size="20" maxlength="20" />
	  <input name="regno_old"  type="hidden"id="regno_old" value="<?=$d[regno]?>"  /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_edit" type="submit"  value="แก้ไขข้อมูล"  onClick="return validate()"/ class="buttom">
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.close()" class="buttom">     </td>
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
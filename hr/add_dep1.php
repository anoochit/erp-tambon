<?
session_start();
include('config.inc.php');
?><meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<?

if($send <>''){

if(check_dep($div_name) <=0){
	$query=" INSERT INTO division (div_id,div_name)
		 VALUES ('$div_id','".trim($div_name)."')";
		echo $query."<br>";
		$result=mysql_query($query);	
?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 
<?
}else{
?>
<script language="JavaScript">
	alert("ชื่อกองซ้ำ กรุณาบันทึกข้อมูลใหม่");
	history. back();
</script>

<?	 }
	}
?>

<?
if($edit <>''){
if(check1($div_name,$div_id) <=0){
	    $query="UPDATE  division SET  div_name = '$div_name' WHERE  div_id ='$div_id' ";	
		echo $query."<br>";
		$result=mysql_query($query);	
?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>  
<?
}else{
?>
<script language="JavaScript">
	alert("ข้อมูลซ้ำ กรุณาบันทึกข้อมูลใหม่");
	history. back();
</script>

<?	 }
	}
?>
<script language="JavaScript" src="calendar.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style3 {
	font-family: "MS Sans Serif";
	font-weight: bold;
	font-size: 10;
}
.style7 {font-family: "MS Sans Serif"; font-size: 10; }
-->
</style>

<table border="0" width="100%" align="center" >
<tr align="left">
<td width="100%" style="border: #CACACA 1px solid;" >
<form name='add_data_itc' action='' method='post' enctype="multipart/form-data" onsubmit="return check()">
<? if($add=='add'){
	$sql1 ="select  max(div_id) as max from division ";
	//echo $sql1 ."<br>";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	if($rs["max"] =='' or $rs["max"] == NULL) {
		$div_id ="51001";
	}else{
	 	$div_id = $rs["max"] +1;
	}
?>
<table name='add_data_itc' cellpadding='0' cellspacing='1' border='0' width='100%' bgcolor="#ffcc99" >
<tr height="30" bgcolor="#ff9966" class="tbETitle">
<td  height='30'  colspan="2" style="border: #FFFFFF 1px solid;"> 
<div class="style3"  style='color: #000099;'>&nbsp;&nbsp;&nbsp;เพิ่มกอง</div></td></tr>
<tr>
  <td width='320'class="style7" align="left" height="30" >&nbsp;&nbsp;รหัสกอง :</td>
			<td width="979" >&nbsp;&nbsp;<input type="text" name="div_id" value="<?=$div_id?>" size="20"  maxlength="5"  disabled="disabled"/>
	  
	  </td>
</tr><input type="hidden" name="div_id" value="<?=$div_id?>"> 
		<tr>
			<td width='320'class="style7" align="left" height="30" >&nbsp;&nbsp;ชื่อกอง :</td>
			<td width="979" >
		    <div align="left" class="style7">&nbsp;&nbsp;<input type="text" name="div_name" value="<?=$div_name?>"  size="30"/> </div>			</td>
		</tr>
		<tr><td colspan='2' background="images/hdot2.gif"> </td></tr>
	<tr><td colspan='2'  height="40">	<center>
  <input name='type_n' type='hidden'  value='<?echo $type_n?>' />
  <input type='submit' name='send' value='เพิ่มข้อมูล' />
</center>
</td></tr>
</table>
<? }elseif($add=='edit'){
	$sql="select * from division  where div_id = '$div_id' ";	
	//echo $sql."sss<br>";
	$result=mysql_query($sql);
	$rs=mysql_fetch_array($result);
?>
<table name='add_data_itc' cellpadding='0' cellspacing='1' border='0' width='100%' bgcolor="#ffcc99" >
<tr height="30" bgcolor="#ff9966" class="tbETitle">
<td  height='30'  colspan="2" style="border: #FFFFFF 1px solid;"> 
<div class="style3"  style='color: #000099;'>&nbsp;&nbsp;&nbsp;แก้ไขกอง</div></td></tr>
<tr>
  <td width='321'class="style7" align="left" height="30" >&nbsp;&nbsp;รหัสกอง :</td>
			<td width="978" >&nbsp;&nbsp;<input type="text" name="div_id1" value="<?=$div_id?>" size="20"  maxlength="5"  disabled="disabled"/>
	  </td>
</tr>
		<tr>
			<td class="style7" align="left" height="30" >&nbsp;&nbsp;ชื่อกอง :</td>
			<td >
		    <div align="left" class="style7">&nbsp;&nbsp;<input type="text" name="div_name" value="<?=$rs[div_name]?>"  size="30"/> </div>			</td>
		</tr>
		<tr>
			<td class="style7" align="left" height="30"  colspan="2">
<center>
<input name='div_id' type='hidden'  value='<? echo $div_id?>'>
<input type='submit' name='edit' value='แก้ไข้ข้อมูล'>
</center>
</td></tr>
</table>
<? }?>
</form></td></tr></table>
<script language="JavaScript" type="text/javascript">

function del_confirm()
{
	if (confirm("คุณต้องการลบไฟล์นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<?
function find_div_id($div_name){
	$sql1 ="select * from division where div_name= '$div_name' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check_dep($div_name){
	$sql="select * from division  where div_name = '$div_name'   ";	
	$result1 = mysql_query($sql);
	$num = mysql_num_rows($result1);
	return $num;
}

function check1($div_name,$div_id){
	$sql="select * from division  where  div_name = '$div_name' and div_id != '$div_id' ";	
	$result1 = mysql_query($sql);
	$num = mysql_num_rows($result1);
	return $num;
}
?>
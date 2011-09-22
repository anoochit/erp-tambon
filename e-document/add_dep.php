<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($send <>''){
if(check_dep($type,$dep_name) <=0){
	$query="INSERT INTO department ( dep_name) VALUES('$dep_name')";	
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

<?
if($edit <>''){
if(check1($dep_name,$dep_id) <=0){
	    $query="UPDATE  department SET  dep_name = '$dep_name' WHERE  dep_id ='$dep_id' ";	
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
.style3 {
	font-family: "MS Sans Serif";
	font-weight: bold;
	font-size: 10;
}
.style7 {font-family: "MS Sans Serif"; font-size: 10; }
</style>
<table border="0" width="100%" align="center" >
<tr align="left">
<td width="100%" style="border: #CACACA 1px solid;" >
<form name='add_data_itc' action='' method='post' enctype="multipart/form-data" onsubmit="return check()">
<? if($add=='add'){?>
<table name='add_data_itc' cellpadding='0' cellspacing='1' border='0' width='100%'>
<tr height="30">
<td  height='30'  colspan="2" bgcolor="#C9D4E1" style="border: #FFFFFF 1px solid;"> 
<div class="style3"  style='color: #000099;'>&nbsp;&nbsp;&nbsp;เพิ่มกอง</div></td></tr>
		<tr>
			<td width='301'class="style7" align="left" height="30" >&nbsp;&nbsp;ชื่อกอง :</td>
			<td width="998" >
		    <div align="left" class="style7">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="dep_name" value="<?=$dep_name?>"  size="30"/> </div>			</td>
		</tr>
		<tr><td colspan='2' background="images/hdot2.gif"> </td></tr>
</table>
<center>
  <input name='type_n' type='hidden'  value='<?echo $type_n?>' />
  <input type='submit' name='send' value='เพิ่มข้อมูล' />
  <input type='reset' name='reset' value='เคลียร์'>
</center>
<? }elseif($add=='edit'){
	$sql="select * from department  where dep_id = '$dep_id' ";	
	//echo $sql."sss<br>";
	$result=mysql_query($sql);
	$rs=mysql_fetch_array($result);
?>
<table name='add_data_itc' cellpadding='0' cellspacing='3' border='0' width='100%'>
<tr height="30">
<td  height='30'  colspan="2" bgcolor="#C9D4E1" style="border: #FFFFFF 1px solid;"> 
<div class="style3"  style='color: #000099;'>&nbsp;&nbsp;&nbsp;แก้ไขกอง</div></td></tr>
		<tr>
			<td class="style7" align="left" height="30" >&nbsp;&nbsp;ชื่อกอง :</td>
			<td >
		    <div align="left" class="style7">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="dep_name" value="<?=$rs[dep_name]?>"  size="30"/> </div>			</td>
		</tr>
</table>
<center>
<input name='dep_id' type='hidden'  value='<? echo $dep_id?>'>
<input type='submit' name='edit' value='แก้ไข้ข้อมูล'>
<input type='reset' name='reset' value='เคลียร์'>
</center>
<? }?>
</form></td></tr></table>
<script language="JavaScript" type="text/javascript">
function check()
{
      var v1 = document.add_data_itc.dep_name.value;      
        if ( v1.length==0 || v1 ==''  ||  v1 ==' ')
           {
           alert("กรุณากรอกชื่อกอง");
           document.add_data_itc.dep_name.focus();           
           return false;
           }
        if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่")){
					return true;
			}else{
					return false;
			}
}

function open_windows(theURL,winName,features) { 
  window.open(theURL,winName,features);
}
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
function check_dep($type,$dep_name){
	$sql="select * from department  where dep_name = '$dep_name' ";	
	$result1 = mysql_query($sql);
	$num = mysql_num_rows($result1);
	return $num;
}
function check1($dep_name,$dep_id){
	$sql="select * from department  where  dep_name = '$dep_name' and dep_id != '$dep_id' ";	
	$result1 = mysql_query($sql);
	$num = mysql_num_rows($result1);
	return $num;
}
?>
<?
session_start();
include('config.inc.php');
$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname);
?><meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<?

if($send <>''){
if( find_sub_name(trim($no_book),trim($sub_name)) <=0){

		$query=" INSERT INTO subdivision (div_id,sub_name,sub_id)
		 VALUES ('".$div_id."','".trim($sub_name)."','".trim($no_book)."')";
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
if(check1($sub_name,$no_book,$sub_name_old,$sub_id_old) <=0){
	    $query="UPDATE  subdivision SET  sub_name = '$sub_name' ,sub_id ='$no_book' WHERE sub_name = '$sub_name_old' and sub_id ='$sub_id_old'  ";	
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

<table border="0" width="98%" align="center" >
<tr align="left">
<td width="100%" style="border: #CACACA 1px solid;" >
<form name='subdivision' action='' method='post' enctype="multipart/form-data" onsubmit="return validate()">
<!--addFile.php -->
<? if($add=='add'){?>

<table name='add_data_itc' cellpadding='0' cellspacing='1' border='0' width='100%' bgcolor="#ffcc99" >
<tr height="30" bgcolor="#ff9966" class="tbETitle">
<td  height='30'  colspan="2" style="border: #FFFFFF 1px solid;"> 
<div class="style3"  style='color: #000099;'>&nbsp;&nbsp;&nbsp;เพิ่มฝ่าย</div></td></tr>
	<tr><td colspan='2' background="images/hdot2.gif"> </td></tr>
<tr>
 <td width="38%" height="30" align="right"  class="style7" a>
    ชื่อกอง</div>
  <td width="62%" align="left">&nbsp;&nbsp;
  <?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?>
<select name="div_id"   onChange="result2('num', this.value);">
  <?
			while($d =mysql_fetch_array($result)){
				
?>
  <option value="<? echo $d[div_id];?>"
		<?
		if($div_id == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select>
</td>
</tr>

	<tr class="style7">
	  <td colspan='2' background="images/hdot2.gif"> </td></tr>
<tr>
    <td width="38%" height="30"  align="right"  class="style7">รหัสฝ่าย</div></td>
  <?
  if($no_book ==''){
 
			$sql="select  max(sub_id) as max from subdivision where div_id like  '%51001%'  ";
		$result = mysql_query($sql);
		$recn=mysql_fetch_array($result);
		$max1  = $recn["max"];
		if($max1 ==''  or $max1  ==NULL or $max1 =='-'){
			$a =explode("/",$max).".1";
			$no_book1 = $a[0];
		}else{
			$a =explode(".",$max1);
			$no_book1 = $a[0].".".($a[1] + 1);
		}

  }
  ?>
<td align="left">&nbsp;&nbsp;
<input type="text" name="no_book" value="<?=$no_book1?>" size="30" maxlength="100" />
<input type="hidden" name="no_book_1" value="<?=$no_book?>"></td>
</tr>
<tr>
  <td width="38%" height="30" align="right"  class="style7" a>ชื่อฝ่าย</div></td>
	<td align="left">&nbsp;&nbsp;
	<input type="text" name="sub_name" value="<?=$sub_name?>" size="30" maxlength="100" /></td>
</tr>
		<tr><td colspan='2' background="images/hdot2.gif"> </td></tr>

<tr><td colspan='2' >
<center>
<input name='type_n' type='hidden'  value='<?echo $type_n?>' >
<input type='submit' name='send' value='เพิ่มข้อมูล'>
</center></td></tr>

</table>
<? }elseif($add=='edit'){
	$sql= "SELECT * FROM  division d , subdivision s 
	 where 1 = 1  and   sub_id = '$sub_id' ";	
	//echo $sql."sss<br>";
	$result=mysql_query($sql);
	$rs=mysql_fetch_array($result);

?>
<table name='add_data_itc' cellpadding='0' cellspacing='1' border='0' width='100%' bgcolor="#ffcc99" >
<tr height="30" bgcolor="#ff9966" class="tbETitle">
<td  height='30'  colspan="2" style="border: #FFFFFF 1px solid;"><div class="style3"  style='color: #000099;'>&nbsp;&nbsp;&nbsp;แก้ไขฝ่าย</div></td></tr>
<tr>
 <td width="38%" height="30" align="right"  class="style7" a>ชื่อกอง :   </div>
  <td width="62%" align="left"><div align="left" class="style7">&nbsp;&nbsp;<?
			$query="select dep_id,div_name from division order by dep_id";
			$result=mysql_query($query);
?>
<select name="dep_id"    disabled="disabled">
  <?
			while($d =mysql_fetch_array($result)){
				
?>
  <option value="<? echo $d[dep_id];?>"
		<?
		if($dep_id == $d[dep_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select></div>
</td>
</tr>
	<tr class="style7">
	  <td colspan='2' background="images/hdot2.gif"> </td></tr>
<tr>
    <td width="38%" height="30"  align="right"  class="style7">รหัสฝ่าย :</div></td>

<td align="left"><div align="left" class="style7">&nbsp;&nbsp;<input type="text" name="no_book" value="<?=$rs[sub_id]?>" size="30" maxlength="100" />
</tr>
<tr><td colspan='2' background="images/hdot2.gif"> </td></tr>
		<tr>
			   <td width="38%" height="30"  align="right"  class="style7">&nbsp;&nbsp;ชื่อกอง :</td>
			<td width='635'>
		    <div align="left" class="style7">&nbsp;&nbsp;<input type="text" name="sub_name" value="<?=$rs[sub_name]?>"  size="30"/> </div>			</td>
		</tr>
		<tr><td colspan='2' background="images/hdot2.gif"> </td></tr>
			<tr><td colspan='2' > <center>
<input name='sub_id_old' type='hidden'  value='<? echo $rs[sub_id]?>'>
<input name='sub_name_old' type='hidden'  value='<? echo $rs[sub_name]?>'>
<input type='submit' name='edit' value='แก้ไข้ข้อมูล'>
</center></td></tr>

</table>



<? }?>
</form>
</td></tr></table>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		if (  document.subdivision.no_book.value=='' || document.subdivision.no_book.value==' ' )
           {
           alert("กรุณากรอกรหัสฝ่าย");
           document.subdivision.no_book.focus();           
           return false;
           }
		   if (  document.subdivision.sub_name.value=='' || document.subdivision.sub_name.value==' ' )
           {
           alert("กรุณากรอกชื่อฝ่าย");
           document.subdivision.sub_name.focus();           
           return false;
           }
			return true;
	}
</script>
<script language="javascript">
// เริ่ม XmlHttp Object
function uzXmlHttp(){
var xmlhttp = false;
try{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
try{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}catch(e){
xmlhttp = false;
}
}

if(!xmlhttp && document.createElement){
xmlhttp = new XMLHttpRequest();
}
return xmlhttp;
}
function result2(){
var num3 =document.subdivision.div_id.value;
var result;
var url = 'ajax_1.php?num3=' + num3; 
xmlhttp = uzXmlHttp();
xmlhttp.open("GET", url, false);
xmlhttp.send(null); 
result = xmlhttp.responseText;

document.subdivision.no_book.value = result;

}
</script>
<script language="JavaScript" type="text/javascript">
function open_windows(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

//-->

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
function check_dep($type,$div_name){
	$sql="select * from division  where div_name = '$div_name' ";	
	echo $sql."<br>";
	$result1 = mysql_query($sql);
	$num = mysql_num_rows($result1);
	return $num;
}

function find_dep_id( $sub_id,$sub_name){
	$sql1 ="select * from subdivision where (sub_id= '$sub_id'  )";
	echo $sql1 ."<br>";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function check1($sub_name,$sub_id,$sub_old_name,$sub_old_id ){
	$sql="select * from subdivision  where  (sub_id = '$sub_id' ) and sub_id != '$sub_old_id' ";	
	$result1 = mysql_query($sql);
	$num = mysql_num_rows($result1);
	return $num;
}
function find_sub_name($no_book,$sub_name){
	$sql1 ="select * from subdivision where (sub_name = '$sub_name' or sub_id = '$no_book' )";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
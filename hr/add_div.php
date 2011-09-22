<?
include('config.inc.php');

if($save_add <> ''){
	if( find_div_id(trim($div_name)) <=0){
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
			echo "<br><center><font color=darkgreen>ชื่อกองซ้ำค่ะ</font></center><br>";
	}
}

if($save_add_sub <> ''){
	if( find_sub_name(trim($no_book),trim($sub_name)) <=0){
		$query=" INSERT INTO subdivision (div_id,sub_name,sub_id)
		 VALUES ('".$div_id."','".trim($sub_name)."','".trim($no_book)."')";
		echo $query."<br>";
		$result=mysql_query($query);
		
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 

		<?
	}else{
			echo "<br><center><font color=darkgreen>รหัสหรือชื่อฝ่ายซ้ำค่ะ</font></center><br>";
	}
}
?>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		if (  document.division.div_id.value=='' || document.division.div_id.value==' ' )
           {
           alert("กรุณากรอกรหัสกอง");
           document.division.div_id.focus();           
           return false;
           }
		   if (  document.division.div_name.value=='' || document.division.div_name.value==' ' )
           {
           alert("กรุณากรอกชื่อกอง");
           document.division.div_name.focus();           
           return false;
           }
		   if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
			{
					return true;
			}
				return false;
	}
</script>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate1(theForm) 
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
		     if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
			{
					return true;
			}
				return false;
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
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style2.css">
<script language="JavaScript" src="calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<style type="text/css">
<!--
.style2 {
	font-size: 12;
	font-family: Tahoma;
}
.style5 {font-size: 12px; font-family: Tahoma; }
.style6 {font-family: Tahoma}
-->
</style>
<body>


<? if($action=='add'){
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
<br>
<form name="division"  method="post">
<table width="90%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#ffcc99" >
 		 	<tr bgcolor="#ff9966" class="tbETitle">
  		  		<td  height="25" colspan="2" ><div>เพิ่มกอง</div></td>
  			</tr>
<tr>
  <td  align="right" width="37%"   class="style5">
  รหัสกอง</td>
	<td width="63%" align="left">&nbsp;&nbsp;
	  <input type="text" name="div_id1" value="<?=$div_id?>" size="10"  maxlength="5"  disabled="disabled"/>
	  <input type="hidden" name="div_id" value="<?=$div_id?>">
	  </td>
</tr>
<tr>
  <td a align="right" width="37%"   class="style5">ชื่อกอง</td>
	<td align="left">&nbsp;&nbsp;
	  <input type="text" name="div_name" value="<?=$div_name?>" size="20" maxlength="100" /></td>
</tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

     </td>
</tr>
</table>
</td></tr></table>
</form>
<? }elseif($action=='sub_add'){?>
<br>
<form name="subdivision"  method="post">
<table width="90%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#ffcc99" >
 		 	<tr bgcolor="#ff9966" class="tbETitle">
  		  		<td  height="25" colspan="2" ><div>เพิ่มฝ่าย</div></td>
  			</tr>
	<tr>
 <td a align="right" width="36%"  class="style5">
    ชื่อกอง  
  </div>
  <td width="64%" align="left">
&nbsp;&nbsp;
<?
			$query="select div_id,div_name from division order by div_id";
			//echo $query."666<br>";
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
</select></td>
</tr>
<tr>
    <td  align="right" width="36%"  class="style5">รหัสฝ่าย</div></td>
  <?
 
		$sql="select  max(sub_id) as max from subdivision where div_id like  '%51001%'  ";
		//echo $sql."33<br>";
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

  ?>
<td align="left">&nbsp;&nbsp;
<input type="text" name="no_book" value="<?=$no_book1?>" size="20" maxlength="100" />
<input type="hidden" name="no_book_1" value="<?=$no_book?>"></td>
</tr>
<tr>
  <td a align="right" width="36%"  class="style5">ชื่อฝ่าย</div></td>
	<td align="left">&nbsp;&nbsp;
	<input type="text" name="sub_name" value="<?=$sub_name?>" size="20" maxlength="100" /></td>
</tr>
<tr>
	<td height="44" colspan="3" align="center">
	  <input name="save_add_sub" type="submit"  value="บันทึกข้อมูล" onClick="return validate1()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 </td>
</tr>
</table>
</td></tr></table>
</form>
<? }?>

</body>
</html>
<script language="javascript">

function godel()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("คุณต้องการบันทึกข้อมูลที่แก้ไข ใช่หรือไม่"))
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
function find_sub_name($no_book,$sub_name){
	$sql1 ="select * from subdivision where (sub_name = '$sub_name' or sub_id = '$no_book' )";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
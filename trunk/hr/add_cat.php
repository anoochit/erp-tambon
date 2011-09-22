<?
include('config.inc.php');

if($save_add <> ''){
	if( find_cat_id($cat_name) <=0){
		$query=" INSERT INTO category (cat_name)
		 VALUES ('$cat_name')";
		echo $query."<br>";
		$result=mysql_query($query);
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 
		<?
	}else{
			echo "<br><center><font color=darkgreen>ชื่อประเภทซ้ำค่ะ</font></center><br>";
	}
}
if($save_add_sub <> ''){
	//echo find_type_($cat_id,$type_name);
	if( find_type_($cat_id,$type_name) <=0){
		$query=" INSERT INTO type (cat_id,type_name)
		 VALUES ('$cat_id','$type_name')";
		echo $query."<br>";
		$result=mysql_query($query);
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 
		<?
	}else{
			echo "<br><center><font color=darkgreen>ชื่อ ระดับ / หมวดซ้ำค่ะ</font></center><br>";
	}
}
?>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		
		   if (  document.division.cat_name.value=='' || document.division.cat_name.value==' ' )
           {
           alert("กรุณากรอกชื่อประเภท");
           document.division.cat_name.focus();           
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
		if (  document.subdivision.cat_id.value=='' || document.subdivision.cat_id.value==' ' )
           {
           alert("กรุณาเลือกประเภท");
           document.subdivision.cat_id.focus();           
           return false;
           }
		   if (  document.subdivision.type_name.value=='' || document.subdivision.type_name.value==' ' )
           {
           alert("กรุณากรอกชื่อระดับ / หมวด");
           document.subdivision.type_name.focus();           
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
?>
<br>
<form name="division"  method="post">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#ffcc99" >
 		 	<tr bgcolor="#ff9966" class="tbETitle">
  		  		<td  height="25" colspan="2" ><div>เพิ่มประเภท</div></td>
  			</tr>
<tr>
  <td a align="right" width="34%"   class="style5">ชื่อประเภท</td>
	<td width="66%" align="left">&nbsp;&nbsp;
	  <input type="text" name="cat_name" value="<?=$cat_name?>" size="20" maxlength="100" /></td>
</tr>
<tr>
	<td height="54" colspan="3" align="center">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล"  onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " onClick="window.navigate('?action=add_division')">     </td>
</tr>
</table>
</td></tr></table>
</form>
<? }elseif($action=='sub_add'){
?>
<br>
<form name="subdivision"  method="post">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#ffcc99" >
 		 	<tr bgcolor="#ff9966" class="tbETitle">
  		  		<td  height="25" colspan="2" ><div>เพิ่มระดับ / หมวด</div></td>
  			</tr>
	<tr>
 <td a align="right" width="37%"  class="style5">
    ชื่อประเภท
  </div>
  <td width="63%" align="left">
&nbsp;&nbsp;
<?
			$query="select * from category order by cat_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
?>
<select name="cat_id"   >
<option  value="">- - - - - กรุณาเลือก - - - - -</option>
  <?
			while($d =mysql_fetch_array($result)){
				
?>
  <option value="<? echo $d[cat_id];?>"
		<?
		if($cat_id == $d[cat_id] ) echo "selected";
		?>
		><? echo $d[cat_name];?></option>
  <? }?>
</select></td>
</tr>

<tr>
  <td a align="right" width="37%"  class="style5">ชื่อ ระดับ / หมวด</div></td>
	<td align="left">&nbsp;&nbsp;
	<input type="text" name="type_name" value="<?=$type_name?>" size="20" maxlength="100" /></td>
</tr>
<tr>
	<td height="44" colspan="3" align="center">
	  <input name="save_add_sub" type="submit"  value="บันทึกข้อมูล" onClick="return validate1()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " >	  </td>
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
function find_cat_id($cat_name){
	$sql1 ="select * from category where cat_name= '$cat_name' ";
	//echo $sql1 ."<br>";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
function find_type_($cat_id,$type_name){
	$sql1 ="select * from type where cat_id = '$cat_id' and  type_name = '".$type_name."' ";
	//echo $sql1 ."<br>";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
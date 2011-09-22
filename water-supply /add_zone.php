<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<script language=Javascript>
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
function result1(src, val){
var result;
var url = 'ajax_1.php?data='+src+"&val="+val; 
xmlhttp = uzXmlHttp();
xmlhttp.open("GET", url, false);
xmlhttp.send(null); 
var ret = xmlhttp.responseText;
document.add_user.z_id1.value = ret ;
document.add_user.z_id.value = ret ;
}
</script>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		    if (  document.add_user.HOCODE.value=='' || document.add_user.HOCODE.value==' ' )
           {
           alert("กรุณาเลือกหมู่บ้าน");
           document.add_user.HOCODE.focus();           
           return false;
           }
		       if (  document.add_user.z_name.value=='' || document.add_user.z_name.value==' ' )
           {
           alert("กรุณากรอกชื่อเขต");
           document.add_user.z_name.focus();           
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
<?
//-----------บันทึก-------------------
if($save_add <>''){
	if(check_zone($HOCODE , $z_name) <=0){
	$query=" INSERT INTO zone (hocode,z_id,z_name)
		 VALUES ('$HOCODE', '".trim($z_id)."' , '$z_name'  )";
		$result=mysql_query($query);
		echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
  		print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=zone&HOCODE=$HOCODE\">\n";
	}else{
		echo "<br><br><center><font color=darkgreen>ชื่อเขตซ้ำกรุณาบันทึกข้อมูลใหม่</font></center><br><br>";
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
  		  		<td  height="25" colspan="2"><div>&nbsp;&nbsp;&nbsp;เพิ่มข้อมูลเขต</div></td>
  			</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr class="bmText" height="25">
			<td width="20%"  a align="right" ><strong>&nbsp;&nbsp;หมู่บ้าน</strong></td>
                    <td width="80%"  ><div>&nbsp;&nbsp;
					<select name="HOCODE"  onChange="result1('hocode1', this.value);" class="text"><?
			$query  ="select * from house  order by HOCODE";
			$result=mysql_query($query);
			?>
  <option value=''>----------เลือกหมู่บ้าน----------</option>  
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[HOCODE];?>"
		<?
		if($HOCODE == $d[HOCODE]) echo "selected";
		?>
		><? echo $d[HONAME];?></option>
                        <? }?>
            </select></div></td>
          </tr>
				  <tr class="bmText"><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
  <td a align="right" width="20%"  ><strong>รหัส</strong></td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="z_id1" value="<?=$z_id1?>" size="10" maxlength="50"  disabled="disabled" class="text"/>
	   <input   type="hidden" name="z_id" value="<?=$z_id?>" size="10" maxlength="50" class="text"/></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

<tr class="bmText">
  <td a align="right" width="20%"  ><strong>ชื่อเขต</strong></td>
	<td align="left">&nbsp;&nbsp;
	  <input  type="text" name="z_name" value="<?=$z_name?>" size="20" maxlength="50"  class="text" /></td>
</tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td colspan="2" align="center" height="35">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล" onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " >	  </td>
</tr>
</table>
</td></tr></table>
</form>

</body>
</html>

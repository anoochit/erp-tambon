
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
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
<?

//-----------บันทึก-------------------
if($save_add <>'' and  find_sub_name($no_book,$sub_name) <=0){
		$query=" INSERT INTO subdivision (div_id,sub_name,sub_id)
		 VALUES ('$div_id','$sub_name','$no_book')";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
       	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_subdivision\">\n";
		mysql_close($connect);	
}elseif($save_add <>'' and   find_sub_name($no_book,$sub_name) > 0){//end save
		echo "<br><br><center><font color=darkgreen>รหัสหรือชื่อฝ่ายซ้ำบันทึกข้อมูลใหม่</font></center><br><br>";
}

//----------ลบ--------------
if($del =='del'){

		 $sql_sub="DELETE FROM  subdivision WHERE sub_id='$sub_id' ";
  	 	$result_sub=mysql_query($sql_sub);
		
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการลบข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_subdivision\">\n";

}
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="subdivision"  method="post">
  <br />
  <table width="80%" border="1" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td  colspan="2" style="border: #00000 1px solid;"    >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2" bgcolor="#60c0ff"><div >&nbsp;&nbsp;<span class="bTitleLink">ค้นหาฝ่าย</span></div></td>
  			</tr>
	<tr>
 <td a align="right" width="40%"  >
    ชื่อกอง  
  </div>
  <td align="left">
&nbsp;&nbsp;
<?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?>
<select name="div_id"   >
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
  <td a align="right" width="40%"  >ชื่อฝ่าย</div></td>
	<td align="left">&nbsp;&nbsp;
	<input type="text" name="word" value="<?=$word?>" size="30" maxlength="100" /></td>
</tr>

<tr>
	<td height="44" colspan="3" align="center"><!--onClick="return validate()"/ -->
	  <input name="search" type="submit"  value="ค้นหา" >	  &nbsp;&nbsp;
	  	  </td>
</tr>
</table>
</td>
</tr>
</table>
</form><br />
<?
//-----------แสดงข้อมูล-------------------

	if(!isset($start)){
		$start = 0;
		}
		$limit = '20'; // แสดงผลหน้าละกี่หัวข้อ
	
		
		
    $sql  ="SELECT * FROM  division d , subdivision s  ";
	 $sql  .=" where 1 = 1  and d.div_id = s.div_id ";
	if($search <>'' and $word <>'') $sql .= " and ( d.div_name like '%$word%'  or s.sub_name like '%$word%' ) ";
	if($search <>'' and $div_id <>'') $sql .= " and d.div_id = '$div_id'  ";
	$sql .= " group by s.sub_id order by s.div_id asc,s.sub_id asc ";
	$dbquery=mysql_query($sql);
	$total = mysql_num_rows($dbquery); // หาจำนวน record 
	
	$sql .= " LIMIT $start,$limit";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table cellpadding="0" cellspacing="0" border="1" width="100%" style="border: #00000 1px solid;"   align="center"	>
	<tr  bgcolor="#60c0ff"  >
   <td width="12%" bgcolor="#60c0ff" class="font_1"><div align="center" ><strong>รหัสฝ่าย</strong></div></td>
     <td width="25%" bgcolor="#60c0ff" class="font_1"><div align="center" ><strong>ชื่อกอง</strong></div></td>
	 <td width="48%" bgcolor="#60c0ff" class="font_1"><div align="center"><strong>ชื่อฝ่าย</strong></div></td>
    <td width="15%" bgcolor="#60c0ff"><div align="center">&nbsp;<a href="#" class="catLink1" onClick="javascript:popup('add_sub.php?type=1&add=add','',400,250);">[ เพิ่ม ]</a></div></td>
	
	 </tr>
	 <?
	if(mysql_num_rows($result) <>0){
	 $r=0;
		while ($d =mysql_fetch_array($result)){
	$r++;
	?>
		<tr >
	<td  height="30" align="center" >&nbsp;&nbsp;<?=$d[sub_id]?>&nbsp;&nbsp;</td> 
	   <td   height="30" align="left" >&nbsp;&nbsp;<?=$d[div_name]?></td>
	    <td  align="left" >&nbsp;&nbsp;<?=$d[sub_name]?></td>
		 <td align="center" ><a href="#" onclick="javascript:popup('add_sub.php?add=edit&sub_id=<? echo $d["sub_id"]?>','',450,250);"  class="catLink1">[ แก้ไข ]</a> <a href="index.php?action=add_subdivision&del=del&div_id=<? echo $d["div_id"]?>&sub_id=<? echo $d["sub_id"]?>" onClick="return del_confirm1();">[ ลบ ]</a> </td>

   	   </tr>
	   <? }?>
	   <tr  ><td height="40" colspan="20"> 
  
    <?

	 echo "<center>";
	$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า
	/* เอาผลหาร มาวน เป็นตัวเลข เรียงกัน เช่น สมมุติว่าหารได้ 3 เอามาวลก็จะได้ 1 2 3 */
	for($i=1;$i<=$page;$i++){
		if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
			echo "[<a href='?action=add_subdivision&start=".$limit*($i-1)."&page=$i&j=$j&search=$search&word=$word&div_id=$div_id'> $i </A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
		}else{
			echo "[ <a href='?action=add_subdivision&start=".$limit*($i-1)."&page=$i&j=$j&search=$search&word=$word&div_id=$div_id'> $i </A> ]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
		}
	}
?>
&nbsp;&nbsp;
<?
echo "</center>";
?>
  </td>
  </tr>
   <? } else{?>
    <tr class="style6"><td colspan="10"> <div align="center">ไม่พบข้อมูล</div></td>
 </tr>
 <? }?>
</table>
</td></tr></table>
<? 
function find_sub_name($no_book,$sub_name){
	$sql1 ="select * from subdivision where (sub_name = '$sub_name' and  div_id = '$no_book' )";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
</body>
</html>
	<script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  <script language="JavaScript" type="text/javascript">
function del_confirm1()
{
	if (confirm("คุณต้องการลบฝ่าย นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
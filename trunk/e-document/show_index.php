<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript">
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
// End XmlHttp Object


</script>

<script language="JavaScript" type="text/javascript">
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

//dochange จะถูกเรียกเมื่อมีการเลือก รายการ Combobox ซึ่งจะทำให้ไปเรียก AJAX เพื่อร้องขอข้อมูลถัดไปจาก Server
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "temp.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}


</script>
<script language="JavaScript" type="text/javascript">
//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		//var v = document.add_receive.depart.value;
		var v1 = document.add_receive.catagory.value;
		/*if (  v ==''  ||  v ==' ' ||  v.length == 0  )
           {
           alert("กรุณาเลือกกอง");
           document.add_receive.depart.focus();           
           return false;
           }*/
		if ( (v1 ==''  ||  v1 ==' ' ||  v1.length == 0 ) &&  document.add_receive.add_cat.checked == false)
           {
           		alert("กรุณาเลือกแฟ้มงาน");
          	 document.add_receive.catagory.focus();           
        	   return false;
           }
		   if (document.add_receive.add_cat.checked == true && ( document.add_receive.cat_name.value =='' ||document.add_receive.cat_name.value ==' '))
           {
           		alert("กรุณาเลือกแฟ้มงานใหม่");
          	 document.add_receive.cat_name.focus();           
        	   return false;
           }
		   
			return true;
	}
	// STOP HIDING FROM OTHER BROWSERS -->
</script>
<link href="style.css" rel="stylesheet" type="text/css" />

<table name="body" width="657" cellpadding="0" cellspacing="0"   align="center">
<tr valign="top">
	<td  valign="top">
	<table cellpadding="0" cellspacing="0" border="0" width="657"  >
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="118"> เลขที่เอกสาร		</td>
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="154"> เลขที่รับเอกสาร		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="270"> เรื่อง		</td>
		<td background="images/bar.gif" align="center" height="25" width="5"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="116"> ลงวันที่		</td>
		<td background="images/bar.gif" align="center" height="25" width="4"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td  background="images/bar.gif" align="center" height="25" width="131"> วันที่รับ		</td>
		<td background="images/bar.gif" align="center" height="25" width="10"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
	<!--	<td background="images/bar.gif" align="center" height="25" width="80"> สถานะ
		</td> -->
	</tr>
<?
include("day_func.php");
$sql = "SELECT d.doc_id,d.topic,d.put_date_on,d.recieve_date,d.finish_date,d.file_id,d.warning,d.receive_id ,mid(receive_id,4)
FROM documentary d
Where   1 = 1";
if($dep_id <>''){
	$sql .= " and d.dep_id = '".$dep_id."' ";
}elseif($_SESSION[user_id] <>'' and $_SESSION[de_part] <>'1'){
	$sql .= " and d.dep_id = '".$_SESSION[de_part]."' ";
}
$sql .= "  and d.type_doc = 'รับเข้า' ";
//$sql .= " group by d.file_id ORDER BY  abs(d.receive_id) DESC,d.put_date_on ";
$sql .= " group by d.file_id ORDER BY abs(mid(receive_id,1,2) )desc,abs(mid(receive_id,4) ) desc, recieve_date desc ";
$Per_Page =20;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))

print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql .= " LIMIT $Page_start , $Per_Page";

//echo $sql."dddd<br>";

$result = mysql_query($sql);

$x = 1;

while($rs=mysql_fetch_array($result)){
if($rs["finish_date"] != ""){

	$start_date = date_format_th($rs["put_date_on"]);
	$finish_date = date_format_th($rs["finish_date"]);
	$date_long = count_day($start_date,$finish_date);
	$green_date = green_day($finish_date,$date_long);
	$orange_date = orange_day($finish_date,$date_long);
	$red_date = red_day($finish_date,$date_long);

	$cur_date =  DATE('d/m/Y');
	//echo date_diff1($cur_date,$finish_date)."<br>";
	if(trim($rs["warning"]) == "no"){ // เลยวันสิ้นสุด
			//$color = "#FFFFFF";
		 if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
	}else	if(date_diff1($cur_date,$finish_date) > 0 && trim($rs["warning"]) == "yes"){ // เลยวันสิ้นสุด // แดง
			$color = "#FF9191";
	}elseif(date_diff1($cur_date,$finish_date) <=0 && date_diff1($cur_date,$red_date) > 0 && trim($rs["warning"]) == "yes"){   //ส้ม
			$color = "#FFD6C1";
	}elseif( date_diff1($cur_date,$red_date) <= 0  && date_diff1($cur_date,$green_date)  > 0  && trim($rs["warning"]) == "yes"){  //เหลือง
			$color = "#FFFFAA";
	}elseif(date_diff1($cur_date,$green_date) <=0 && date_diff1($cur_date,$start_date) >= 0  && trim($rs["warning"]) == "yes"){  // วันเขียว
			$color = "#B0FFB0";
	}else {
		//$color = "#FFFFFF";
		 if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
	}
}else {
		/**if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';*/
		$color = "#FFFFFF";
}


?>
<!--<a href="index.php?action=view&file_id=<?echo $rs["file_id"]?>" target="_blank"> onclick="window.open('index.php?action=view&file_id=<? echo $rs["file_id"]?>')"
-->
<tr bgcolor="<? echo $color?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#E0FFFF'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''" >
		<td align="center" height="25" width="1">
		</td>
		<td align="left" height="25" width="118">&nbsp; <?echo $rs["doc_id"]?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="left" height="25" width="154">&nbsp; <?echo $rs["receive_id"]?>		</td>
		<td align="center" height="25" width="1">		</td>
		<td  align="left" height="25" width="270"><a href="index.php?action=view&file_id=<? echo $rs["file_id"]?>" class="catLink5" ><? if(strlen($rs["topic"]) >100) echo substr($rs["topic"],0,100)."...";
		else echo $rs["topic"];?><? //echo $rs["topic"]?></a>		</td>
		<td  align="center" height="25" width="5">		</td>
		<td align="center" height="25" width="116"> <? echo date_time($rs["put_date_on"])?>		</td>
		<td  align="center" height="25" width="4">		</td>
		<td align="center" height="25" width="131">
		<?
		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--" || $rs["recieve_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["recieve_date"]);
		}
		?>		</td>
		<td  align="center" height="25" width="1">		</td>
	</tr><!--</a> -->
	<? $x = $x +1; }
	?>
<tr><td colspan="12" height="25" background="images/bar.gif" ><div align="center">

<!--<FONT size="2"  face="MS Sans Serif">จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR> -->
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=show_index&search=$search&Page=$Prev_Page&dep_id=$dep_id'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=show_index&search=$search&Page=$i&dep_id=$dep_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=show_index&search=$search&Page=$Next_Page&dep_id=$dep_id'> หน้าถัดไป>> </a>";

?>
</FONT></center></div>
</td></tr>
</table>
<!------------------------------------------------------------------ -->	</td>
</tr>
</table>
</center>
<? if($permission <>'all') {?>
<script language="JavaScript" type="text/javascript">
		document.getElementById('dep_check').style.visibility='visible';
	</script> 
	<? }else{?>
<script language="JavaScript" type="text/javascript">
		document.getElementById('dep_check').style.visibility='hidden';
	</script> 
	
	<? }?>

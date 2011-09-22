<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($del == 'delete'){
	$file_name = $_REQUEST["n_file"];
	$file_id = $_REQUEST["file_id"];
	
	unlink("files_data/$file_name"); 
	$sql_del = "DELETE FROM file_record WHERE file_name='$file_name' ";
	//echo $sql_del;
	$result_del = mysql_query($sql_del);
}
?>
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

<link href="style.css" rel="stylesheet" type="text/css" />
<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">

<tr>
	<td width="657">
	<? 
	if($_REQUEST["add_add"] != "") {
		$file_id=$_REQUEST["file_id"];
		$old_file1 = $_REQUEST["old_file1"];
		$old_file2 = $_REQUEST["old_file2"];
		$old_file3 = $_REQUEST["old_file3"];
		$old_file4 = $_REQUEST["old_file4"];
		$old_file5 = $_REQUEST["old_file5"];
		$old_file6 = $_REQUEST["old_file6"];
		$old_file7 = $_REQUEST["old_file7"];
		$old_file8 = $_REQUEST["old_file8"];
		$old_file9 = $_REQUEST["old_file9"];
		$old_file10 = $_REQUEST["old_file10"];
		$file_att1=$_FILES['file_att1']['name'];
		$file_att2=$_FILES['file_att2']['name'];
		$file_att3=$_FILES['file_att3']['name'];
		$file_att4=$_FILES['file_att4']['name'];
		$file_att5=$_FILES['file_att5']['name'];
		$file_att6=$_FILES['file_att6']['name'];
		$file_att7=$_FILES['file_att7']['name'];
		$file_att8=$_FILES['file_att8']['name'];
		$file_att9=$_FILES['file_att9']['name'];
		$file_att10=$_FILES['file_att10']['name'];
		
 if($dep_id == $_SESSION['de_part'] ){	
		$query="UPDATE documentary SET  topic='".$_REQUEST[doc_topic]."', cat_id='$catagory'
 		WHERE file_id=$file_id";	
		$result=mysql_query($query);	
	}
		$stamp_date = date_format_sql($_REQUEST["stamp_date"]);
		$sql_add = "UPDATE send_doc SET stamp_date = '$stamp_date',stamp_dateTime = NOW(),access_date = '$stamp_date',access_dateTime = NOW()
		,remark ='$remark' ,status ='ดำเนินการแล้ว'
		WHERE  file_id =$file_id and send_id = ".$_SESSION[de_part]." ";
		$result_add = mysql_query($sql_add);
		 echo "<center><br><br><br><br><b><font color=\"#0000CC\">ดำเนินการเรียบร้อยแล้ว</font></b>";
		 echo "<meta http-equiv='refresh' content='1; url=index.php?action=list_end'><br><br><br><br><br><br></center>";
	}
	?>
	<? if($add =='add_receive'){
		$sql1 ="select * from send_doc s,documentary d
		 where s.file_id = d.file_id and d.file_id = $file_id  and s.send_id = ".$_SESSION[de_part]." ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		$remark =$rs['remark'];
		$doc_id = $rs["doc_id"];
		$dep_id = $rs["dep_id"];
		$dep_name = $rs["dep_name"];
		$cat_id = $rs["cat_id"];
		$group_id = $rs["group_id"];
		$topic = $rs["topic"];
		$dep_ref = $rs["dep_ref"];
		$send_from = $rs["send_from"] ;
		$put_date = date_format_th($rs["put_date_on"]);
		$recieve_date = date_format_th($rs["recieve_date"]);
		$dmyarr = explode("-",$rs["finish_date"]);
		$finish_date = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
		$file_id = $rs["file_id"];
		$permission = $rs["permission"] ;
		$receive_id = $rs["receive_id"] ;
		$rep_from = $rs["rep_from"] ;
		$a_status = $rs["a_status"];
		$c_status = $rs["c_status"];
		$status = $rs["status"] ;
			
	?>
	<form name="add_receive" method="post" enctype="multipart/form-data">
	<table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="98%">
	<tr>
	<td background="images/bar.gif"  align="left"height="30"  colspan="2" ><strong>รอดำเนินการ</strong></td>
	</tr>
	<tr>
	<td width="216"><div>
		กอง 
		</div>	</td>
	<td><input type="hidden" name="depart" value="<?=$depart?>">
	<select name="depart" onChange="dochange('catagory', this.value)"   disabled="disabled">
		<option value="">--กรุณาเลือก--</option>
	<?
	$sql= "SELECT * FROM department ORDER BY dep_name";
	$result = mysql_query($sql);
	while($rs = mysql_fetch_array($result)){
		echo "<option value='".$rs["dep_id"] ."' " ;
		if($dep_id == $rs["dep_id"] ){
			echo "selected";
		}
		echo ">".$rs["dep_name"]."</option>";
	}
	?>
	</select>	 <input type="hidden" name="dep_id" value="<?=$dep_id?>"></td>
</tr>
	<tr>
	<td width="216"><div>
		เลขที่เอกสาร 
		</div>	</td>
	<td width="601"><input type="text" name="doc_id" value="<?echo $doc_id?>" size="40" maxlength="100" disabled="disabled">	</td>
</tr>
<tr>
	<td width="216"><div>
		ลงวันที่ 
		</div>	</td>
	<td><input type="text" name="put_date" value="<?echo $put_date?>" size="10" maxlength="100" readonly="readonly"> </td>
</tr>
<tr>
	<td width="216"><div>
		เลขที่รับเอกสาร 
		</div>	</td>
	<td><input type="text" name="receive_id" value="<? echo $receive_id?>" size="40" maxlength="100" disabled="disabled">	</td>
</tr>
<tr>
	<td width="216"><div>
		วันที่รับเอกสาร 
		</div>	</td>
	<td><input type="text" name="recieve_date" value="<?echo $recieve_date?>" size="10" maxlength="100" readonly="readonly"> 	</td>
</tr>
<tr>
	<td width="216"><div>
		เรื่อง 
		</div>	</td>
	<td><input type="text" name="doc_topic" value="<? echo $topic;?>" size="80" maxlength="255" 
	<? if($dep_id <>$_SESSION['de_part'] ) echo "disabled=\"disabled\""?>></td>
</tr>
<tr>
  <th colspan="2" height="30" align="center">
    <div align="center">[&nbsp;&nbsp;<a href="javascript:popup('add_pic.php?file_id=<? echo $file_id;?>&add=add','',600,180)"   class="bar_add">เพิ่มไฟล์</a>&nbsp;&nbsp;] </div></th>
  </tr>
<?
	$i =0;
	$query=" SELECT * FROM  file_record  WHERE file_id ='$file_id'  order by id ";
	//echo $query."<br>";
	$result=mysql_query($query);
	while ($news=mysql_fetch_array($result)) {
	  $i++;
?>
<tr>
	<td width="216" height="30"><div>
		ไฟล์ <?=$i?>
		</div>	</td>
	<td>
	  <div align="left">
	    <?	if($news[file_name] != ""){ ?>
	    <a href="files_data/<?=$news[file_name]?>" target="_blank" >
	      <? 
	if($news[name_file] <>'') echo $news[name_file];
	else echo $news[file_name];
	?>
	      </a>
  &nbsp;&nbsp;<a href="?action=list_end&add=add_receive&del=delete&file_id=<? echo $file_id;?>&id=<?=$news[id] ?>&n_file=<?=$news[file_name]?>" target="_self" onClick="return del_confirm();">[ ลบไฟล์ ]</a>
	    <? }?>

	</div>	</td>
</tr>
<? }?>
<tr>
	<td width="216"><div>
		อ้างถึง 
		</div>	</td>
	<td><input type="text" name="rep_from" value="<?=$rep_from?>" size="40" maxlength="100" disabled="disabled">	</td>
</tr>
<tr>
	<td width="216"><div>
		สิ่งที่ส่งมาด้วย / หมายเหตุ
		</div>
	</td>
	<td><input type="text" name="send_from" value="<?=$send_from?>" size="40" maxlength="100" disabled="disabled">
	</td>
</tr>

<tr>
	<td width="216"><div>
		วันที่สิ้นสุด
		</div>	</td>
	<td><input type="text" name="finish_date" value="<?echo $finish_date?>" size="10" maxlength="100" readonly="readonly"> 
	</td>
</tr>
<tr>
	<td width="216"><div>
		จากหน่วยงาน 
		</div>	</td>
	<td><input type="text" name="dep_ref" value="<?echo $dep_ref?>" size="40" maxlength="150" disabled="disabled">	</td>
</tr>
<tr>
	<td width="216"><div>
		ความเร็วเอกสาร
		</div>	</td>
	<td><select name="a_status" disabled="disabled">
	<option  value="ปกติ" <? if($a_status == 'ปกติ' or $a_status == '' ) echo "selected"?>>ปกติ</option>
	<option value="ด่วน" <? if($a_status == 'ด่วน' ) echo "selected"?>>ด่วน</option>
	<option value="ด่วนมาก" <? if($a_status == 'ด่วนมาก' ) echo "selected"?>>ด่วนมาก</option>
	<option value="ด่วนที่สุด" <? if($a_status == 'ด่วนที่สุด' ) echo "selected"?>>ด่วนที่สุด</option>
	
	</select></td>
</tr>
<tr>
	<td width="216"><div>
		ระดับความลับ
		</div>	</td>
	<td><select name="c_status" disabled="disabled">
	<option  value="ปกติ" <? if($c_status == 'ปกติ' or $c_status == '' ) echo "selected"?>>ปกติ</option>
	<option value="ลับ" <? if($c_status == 'ลับ' ) echo "selected"?>>ลับ</option>
	<option value="ลับมาก" <? if($c_status == 'ลับมาก' ) echo "selected"?>>ลับมาก</option>
	<option value="ปกปิด" <? if($c_status == 'ปกปิด' ) echo "selected"?>>ปกปิด</option>
	</select></td>
</tr>
<tr>
	<td width="216"><div>
		สถานะเอกสาร 		</div>	</td>
	<td><select name="status" disabled="disabled">
	<option  value="ปกติ" <? if($status == 'ปกติ' or $status == '' ) echo "selected"?>>ปกติ</option>
	<option value="ยกเลิก" <? if($status == 'ยกเลิก' ) echo "selected"?>>ยกเลิก</option>
	</select></td>
</tr>
<tr>
	<td width="216" valign="top"><div>เผยแพร่ </div>	</td>

		<td><input type="radio" name="gp" value="all" <? if($permission =='all') echo "checked"?> onclick="Javascript: dep_check.style.visibility='hidden';" disabled="disabled"> สาธารณะ 
	<input type="radio" name="gp" value="owner" disabled="disabled"  <? if($permission <> 'all') echo "checked"?>  onclick="Javascript: dep_check.style.visibility='visible';"> เฉพาะ <br>
		<div id="dep_check" >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
	<?
	
	$dep_name = explode(",",$permission);
	$sql_dep = "SELECT * FROM department ORDER BY dep_name";
	$result = mysql_query($sql_dep);
	$g = 0;
	while($rs1 = mysql_fetch_array($result)){
	$g++;
		if($g==1 or $g%4== 1 ){?><tr><? }?>
<td>
	<input type="checkbox" name="gp_only<? echo $i?>" disabled="disabled" value="<? echo $rs1["dep_name"]?>" <? 
	for($j=0;$j<=count($dep_name);$j++){
		if(trim($rs1["dep_name"]) ==trim($dep_name[$j])) {echo "checked";} 
	}
	?>><? echo $rs1["dep_name"]?></td>
	<? 
	 if($g%4==0){?></tr><? }
?>
	<? 
			$j++;
		}
		
	?>
	</table>
	</div>
	<tr> 
	<td width="216"><div>วันที่ดำเนินการเสร็จ <strong><font color="#FF0000" >*</font></strong>
		</div>	</td>
	<td width="601">
	  <input type="text" name="stamp_date" value="<? echo DATE('d/m/Y');?>" size="10" maxlength="100"  id="stamp_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('stamp_date','DD/MM/YYYY');">	</td>
</tr>
	<tr>
	
	<td  ><div>
ข้อความต่อท้าย <strong><font color="#FF0000" >*</font></strong></div></td>
<td   >
<textarea name="remark"  cols="40" rows="5"><?=$remark?></textarea>

	</div>	</td>
</tr>
<tr>
<td height="30" >&nbsp;</td>
<td  height="30"   align="left">
<input type="submit" name="add_add" value=" บันทึก " onclick="return validate()"></td>
</tr>
	</table>
</form>
	<? }else{?>
	<!------------------------------------------------------------------ -->
	
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
	<td background="images/bar.gif"  align="left"height="25"  colspan="15" ><strong>เอกสารรอดำเนินการ</strong></td>
	</tr>
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="123"> เลขที่เอกสาร		</td>
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="99"> เลขที่รับเอกสาร		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="328"> เรื่อง		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="104"> ลงวันที่		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td  background="images/bar.gif" align="center" height="25" width="91"> วันที่รับ		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="90">วันที่ส่ง		</td>
	</tr>
	
<?
include("day_func.php");
$sql = "SELECT d.doc_id,d.topic,d.put_date_on,d.recieve_date,d.finish_date,d.file_id,d.warning,d.receive_id ,s.send_date
FROM documentary d, send_doc s
Where d.file_id = s.file_id 
and d.type_doc = 'รับเข้า' 
and s.send_id = ".$_SESSION[de_part]."
and s.status  like '%กำลังดำเนินการ%'
group by s.file_id,s.send_id
ORDER BY d.finish_date DESC, d.put_date_on DESC 
";

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
	if(trim($rs["warning"]) == "no"){ // เลยวันสิ้นสุด
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
		 if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
	}
}else {
		$color = "#FFFFFF";
}
?>
<tr bgcolor="<? echo $color?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#E0FFFF'" onmouseout="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
		<td align="center" height="25" width="1">		</td>
		<td align="left" height="25" width="123">&nbsp; <?echo $rs["doc_id"]?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="left" height="25" width="99">&nbsp; <?echo $rs["receive_id"]?>		</td>
		<td align="center" height="25" width="1">		</td>
		<td  align="left" height="25" width="328"> <a href="index.php?action=list_end&add=add_receive&file_id=<?echo $rs["file_id"]?>"  target="_self" class="catLink5"><?echo $rs["topic"]?></a> <!-- <?=$green_date?>  <?=$orange_date?>  <?=$red_date?> <?= date_diff1($cur_date,$green_date) ?> /<?= date_diff1($cur_date,$orange_date) ?>/ <?= date_diff1($cur_date,$red_date) ?>/ <?= date_diff1($cur_date,$finish_date) ?> -->		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="center" height="25" width="104"> <?echo date_time($rs["put_date_on"])?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="center" height="25" width="91">
		<?
		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--" || $rs["recieve_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["recieve_date"]);
		}
		?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="center" height="25" width="90">
		<?
		if($rs["send_date"] == "" || $rs["send_date"] == "--" || $rs["send_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["send_date"]);
		}
		?>		</td>
	</tr>
	<?$x = $x +1; }?>
</table>

<? }?>
</td>
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
	<?
function up_file($old_file,$file_att,$file_att_type,$file_att_size,$name_file){
	$query="UPDATE file_record SET file_name='$file_att' , file_type='$file_att_type' ,
	file_size='$file_att_size',name_file ='$name_file'
	 WHERE file_name='$old_file'";
	$result=mysql_query($query);	
}
function add_file($max_file_id,$file_att,$file_att_type,$file_att_size,$name_file){
	$query="INSERT INTO file_record (file_id,  file_name, file_type, file_size,name_file ) VALUES('$max_file_id','$file_att','$file_att_type','$file_att_size','$name_file')";
	$result=mysql_query($query);	
}
	
	?><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  <script language="JavaScript" type="text/javascript">
function del_confirm()
{
	if (confirm("คุณต้องการลบไฟล์นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
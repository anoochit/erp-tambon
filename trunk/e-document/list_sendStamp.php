<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($del == 'delete'){
	$file_name = $_REQUEST["n_file"];
	$file_id = $_REQUEST["file_id"];
	
	unlink("files_data/$file_name"); 
	$sql_del = "DELETE FROM file_record WHERE file_name='$file_name' ";
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
<script language="JavaScript" type="text/javascript">
//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{


if(document.add_receive.send[1].checked == true ){
		var j =0;
		var v8 = document.add_receive.total.value;
		for (i=1;i<= eval(v8) ;++i) {
			if(document.add_receive["chk["+i+"]"].checked == true){
				j++;
			}
		 }
		 if( j <= 0){
			alert("กรุณาเลือกกองที่ต้องการส่ง");
			return (false);
		}
	}

		  	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่")){
					return true;
			}else{
					return false;
			}
	}
</script>
<table name="body" width="657" cellpadding="0" cellspacing="0" align="center">

<tr>
	<td width="657" valign="top">
	<? 
	if($_REQUEST["add_add"] != "") {
		$file_id=$_REQUEST["file_id"];
		$dep_id = $_REQUEST["dep_id"];
		$old_file1 = $_REQUEST["old_file1"];
		$old_file2 = $_REQUEST["old_file2"];
		$old_file3 = $_REQUEST["old_file3"];
		$old_file4 = $_REQUEST["old_file4"];
		$old_file5 = $_REQUEST["old_file5"];
		$file_att1=$_FILES['file_att1']['name'];
		$file_att2=$_FILES['file_att2']['name'];
		$file_att3=$_FILES['file_att3']['name'];
		$file_att4=$_FILES['file_att4']['name'];
		$file_att5=$_FILES['file_att5']['name'];
	
if($_REQUEST["add_cat"] == "add" && $_REQUEST["cat_name"] != ""){
	
	$sql_ck = "SELECT COUNT(cat_name) FROM catagory WHERE cat_name='".$_REQUEST["cat_name"]."' AND dep_name='$dep_id'";
	$result_ck = mysql_query($sql_ck);
	$ck = mysql_result($result_ck,0);

	if($ck > 0){
		echo "<br><br><center><font color=red>ชื่อแฟ้มซ้ำกับที่มีอยู่แล้ว กรุณาเปลี่ยนใหม่</font><br><br>";
		echo "<input type='button' onClick=\"javascript:history. back()\" value='ย้อนกลับ'>";
		exit();
	}

	$sql = "INSERT INTO catagory (dep_name,cat_name) VALUES('$dep_id','".$_REQUEST["cat_name"]."') ";
	$result = mysql_query($sql);
	$catagory=$_REQUEST["cat_name"];
}


 if($dep_id == $_SESSION['department'] ){	
		$query="UPDATE documentary SET  topic='".$_REQUEST[doc_topic]."', cat_id='$catagory'
 		WHERE file_id=$file_id";
		$result=mysql_query($query);	
}
		
	$query="UPDATE documentary SET doc_id='$doc_id', topic='$doc_topic',dep_id='$depart', cat_id='$catagory',group_id='$grouptype', author='$author' , put_date_on='".date_format_sql($_REQUEST["put_date"])."',recieve_date='$recieve_date',finish_date='$finish_date', permission='$gp',warning='$warning',receive_id ='$receive_id',status ='$status'
,rep_from ='$rep_from' ,a_status ='$a_status' ,c_status = '$c_status',
send_from ='$send_from'
 WHERE file_id=$file_id";
$result=mysql_query($query);		
$send_id = 0;
if($send =='ไม่ส่ง'){

	$sql = "DELETE FROM send_doc WHERE file_id='$file_id' and send_id != '$send_id' ";
	$result = mysql_query($sql);
	
	$sql_update = "UPDATE send_doc  SET s_status ='$send'  WHERE file_id='$file_id' and send_id = '$send_id' ";
	$result1 = mysql_query($sql_update);
	

}else{

	$sql_update = "UPDATE send_doc  SET s_status ='$send'  WHERE file_id='$file_id' and send_id = '$send_id' ";
	$result1 = mysql_query($sql_update);
	
	if($total <> '' and $chk <>''){
		for ($i=0;$i<=$total;$i++) {
			if ($chk[$i] != "") { 
				if(find_up($chk[$i],$file_id) > 0){
					$sql_update="UPDATE send_doc SET send_date ='$send_date' ,send_dateTime = NOW(),
					rep_id ='".	$_SESSION["username"]."' ,remark = '$remark'
					WHERE send_id = ".$chk[$i]." and file_id = $file_id ";
					$result_update  = mysql_query($sql_update); 
				}else{
					if($chk[$i] == '1'){
							$status ='กำลังดำเนินการ';
					}else{
							$status = 'ยังไม่ได้ลงรับ';
					}
					
				$sql_insert="INSERT INTO send_doc(file_id,send_date,send_dateTime,rep_id,send_id,status,
				remark) 
				VALUES ('$file_id','$send_date',NOW(),'".$_SESSION["username"]."','".$chk[$i]."','$status','$remark')";
				$result_insert  = mysql_query($sql_insert); 
			}
		}if ($chk[$i] == "" and $c_hk[$i] <>'' and find_up($c_hk[$i] ,$file_id) > 0 ) {
			$sql_del = "DELETE FROM send_doc WHERE file_id=$file_id and send_id = ".$c_hk[$i]."";
			$result = mysql_query($sql_del);
		}
	}
}

} 
		 echo "<center><br><br><br><br><b><font color=\"#0000CC\">ดำเนินการเรียบร้อยแล้ว</font></b>";
		echo "<meta http-equiv='refresh' content='1; url=index.php?action=list_sendStamp'><br><br><br><br><br><br></center>";
}		

	?>
	<? if($add =='add_receive'){
		$sql1 ="select * from documentary d  where file_id = $file_id  ";
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
	<table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="680">
	<tr>
	<td background="images/bar.gif"  align="left"height="30"  colspan="15" ><strong>เอกสารอนุมัติแล้ว</strong></td>
	</tr>
	<tr>
	<td width="185"><div>
		กอง 
		</div>
	</td>
	<td>
	<select name="depart" onchange="dochange('catagory', this.value)" >
		<option value="">--กรุณาเลือก--</option>
	<?
	$sql= "SELECT * FROM department ORDER BY dep_name";
	$result = mysql_query($sql);
	while($rs = mysql_fetch_array($result)){
		//echo "<option value='".$rs["dep_name"] ."' " ;
		echo "<option value='".$rs["dep_id"] ."' " ;
		if($dep_id == $rs["dep_id"] ){
			echo "selected";
		}
		echo ">".$rs["dep_name"]."</option>";
	}
	?>
	</select> &nbsp;

	</td>
</tr>
<tr>
	<td width="185"><div>
		เลขที่เอกสาร 
		</div>
	</td>
	<td width="488"><input type="text" name="doc_id" value="<?echo $doc_id?>" size="40" maxlength="100">
	</td>
</tr>
<tr>
	<td width="185"><div>
		ลงวันที่ 
		</div>
	</td>
	<td><input type="text" name="put_date" value="<?echo $put_date?>" size="10" maxlength="100"  id="put_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('put_date','DD/MM/YYYY');">
	</td>
</tr>
<tr>
	<td width="185"><div>
		เลขที่รับเอกสาร 
		</div>
	</td>
	<td><input type="text" name="receive_id" value="<? echo $receive_id?>" size="40" maxlength="100">
	</td>
</tr>
<tr>
	<td width="185"><div>
		วันที่รับเอกสาร 
		</div>
	</td>
	<td><input type="text" name="recieve_date" value="<?echo $recieve_date?>" size="10" maxlength="100"  id="recieve_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('recieve_date','DD/MM/YYYY');">
	</td>
</tr>
<tr>
	<td width="185"><div>
		เรื่อง 
		</div>
	</td>
	<td><input type="text" name="doc_topic" value="<? echo $topic;?>" size="80" maxlength="255">
	</td>
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
	<td width="185" height="30"><div>
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
  &nbsp;&nbsp;<a href="?action=list_sendStamp&add=add_receive&del=delete&file_id=<? echo $file_id;?>&id=<?=$news[id] ?>&n_file=<?=$news[file_name]?>" target="_self" onClick="return del_confirm();">[ ลบไฟล์ ]</a>
	    <? }?>

	</div>	</td>
</tr>
<? }?>
<tr>
	<td width="185"><div>
		อ้างถึง 
		</div>
	</td>
	<td><input type="text" name="rep_from" value="<?=$rep_from?>" size="40" maxlength="100">
	</td>
</tr>
<tr>
	<td width="185"><div>
		สิ่งที่ส่งมาด้วย / หมายเหตุ
		</div>
	</td>
	<td><textarea  name="send_from"  cols="40" rows="5"><?=$rs["send_from"]?>
    </textarea>
	</td>
</tr>
<tr>
	<td width="185"><div>
		วันที่สิ้นสุด
		</div>
	</td>
	<td><input type="text" name="finish_date" value="<?echo $finish_date?>" size="10" maxlength="100"  id="finish_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('finish_date','DD/MM/YYYY');">
	</td>
</tr>
<tr>
	<td width="185"><div>
		จากหน่วยงาน 
		</div>
	</td>
	<td><input type="text" name="dep_ref" value="<?echo $dep_ref?>" size="40" maxlength="150">
	</td>
</tr>
<tr>
	<td width="185"><div>
		ความเร็วเอกสาร
		</div>
	</td>
	<td><select name="a_status">
	<option  value="ปกติ" <? if($a_status == 'ปกติ' or $a_status == '' ) echo "selected"?>>ปกติ</option>
	<option value="ด่วน" <? if($a_status == 'ด่วน' ) echo "selected"?>>ด่วน</option>
	<option value="ด่วนมาก" <? if($a_status == 'ด่วนมาก' ) echo "selected"?>>ด่วนมาก</option>
	<option value="ด่วนที่สุด" <? if($a_status == 'ด่วนที่สุด' ) echo "selected"?>>ด่วนที่สุด</option>
	
	</select></td>
</tr>
<tr>
	<td width="185"><div>
		ระดับความลับ
		</div>
	</td>
	<td><select name="c_status">
	<option  value="ปกติ" <? if($c_status == 'ปกติ' or $c_status == '' ) echo "selected"?>>ปกติ</option>
	<option value="ลับ" <? if($c_status == 'ลับ' ) echo "selected"?>>ลับ</option>
	<option value="ลับมาก" <? if($c_status == 'ลับมาก' ) echo "selected"?>>ลับมาก</option>
	<option value="ปกปิด" <? if($c_status == 'ปกปิด' ) echo "selected"?>>ปกปิด</option>
	</select></td>
</tr>
<tr>
	<td width="185"><div>
		สถานะเอกสาร 		</div>
	</td>
	<td><select name="status">
	<option  value="ปกติ" <? if($status == 'ปกติ' or $status == '' ) echo "selected"?>>ปกติ</option>
	<option value="ยกเลิก" <? if($status == 'ยกเลิก' ) echo "selected"?>>ยกเลิก</option>
	</select></td>
</tr>
<tr>
	<td width="185" valign="top"><div>เผยแพร่ </div>
	</td>

		<td><input type="radio" name="gp" value="all" <? if($permission =='all') echo "checked"?> onclick="Javascript: dep_check.style.visibility='hidden';"> สาธารณะ 
	<input type="radio" name="gp" value="owner"  <? if($permission <> 'all') echo "checked"?> onclick="Javascript: dep_check.style.visibility='visible';"> เฉพาะ <br>
		<div id="dep_check" >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
	<?
	
	$dep_name = explode(",",$permission);
	$sql_dep = "SELECT * FROM department ORDER BY dep_name";
	$result = mysql_query($sql_dep);
	$g = 0;
	while($rs1 = mysql_fetch_array($result)){
	$g++;
	if($g == 1 or $g == 5 or $g==9 or $g ==13 or $g ==17){
		echo "<tr>";
	}
	?><td>
	<input type="checkbox" name="gp_only<? echo $i?>" value="<? echo $rs1["dep_name"]?>" <? 
	for($j=0;$j<=count($dep_name);$j++){
		if(trim($rs1["dep_name"]) ==trim($dep_name[$j])) {echo "checked";} 
	}
	?>><? echo $rs1["dep_name"]?></td>
	<? 
	if($g== 4 or $g ==10 or $g ==14 or $g ==18){
		echo "</tr>";
	}
?>
	<? 
			$j++;
		}
		
	?>
	</table>
	</div>
	<tr>
	<td width="185"><div>
	รายละเอียดสั่งการ 		</div>
	</td>
	<td><?
	$remark1 =  find_for($file_id);
	?><input type="text" name="remark1" value="<?=$remark1?>"  disabled="disabled" size="80"/></td>
</tr>
	<tr bgcolor="#F5DEB3">
	<td width="185" valign="top"><div>
		ส่งต่อ <font color="#FF0000" size="1">*</font>
		</div>
	</td>
	<td>
	<input type="radio" name="send" value="ไม่ส่ง"  onclick="Javascript: send_check.style.display = 'none' " checked="checked" > ไม่ส่ง 
	<input type="radio" name="send" value="ส่ง"   onclick="Javascript: send_check.style.display = '' " > ส่ง
	</td>
	</tr>

	<tr id="send_check" bgcolor="#F5DEB3">
	
	<td  colspan="2">
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td width="15%">&nbsp;</td>
    <td width="85%">
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
		  <?
	/*$sql_user = "SELECT * FROM user_account 
	WHERE  dep_id != 'all' and dep_id != 'ปลัด' 
	ORDER BY dep_id";*/
	$sql_user = "SELECT * FROM department
	ORDER BY dep_name";
	//echo $sql_user."<br>";
	$result = mysql_query($sql_user);
	$i = 0;
	while($rs1 = mysql_fetch_array($result)){
	$i++;	
	if($i==1 or $i%4== 1 ){?><tr><? }?>
	
    <td>	<input type="hidden" name="c_hk[<?=$i?>]"   value='<? echo $rs1["dep_id"] ?>'>
	<input type='checkbox' name='chk[<?=$i?>]' value="<? echo $rs1["dep_id"] ?>" <? 
	if(find_send($rs1["dep_id"],$file_id) >0) {echo "checked";} 
	?>>&nbsp;<? 
	echo $rs1["dep_name"];
	?></td>
	<? 
		if($i%4==0){?></tr><? } 
	}?> <input type="hidden" name="total" value="<? echo  $i?>"> 
	</table>	</td>
  </tr>
  <tr>
    <td>วันที่ส่ง&nbsp;</td><td><input type="text" name="send_date" value="<? echo date("d/m/Y");?>" size="10" maxlength="100" id="send_date" > 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('send_date','DD/MM/YYYY');">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">ข้อความต่อท้าย</td>
    <td><textarea  name="remark"  cols="40" rows="5"><?=$remark?></textarea>      &nbsp;</td>
  </tr>
</table>

	</td>

	
</tr>
<tr>
	<td colspan="2" align="center" height="50">
	<input type="submit" name="add_add" value="บันทึกข้อมูล" onclick="return validate()">
	</td>
</tr>
</table>
</form>
	<? }else{?>	
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
	<td background="images/bar.gif"  align="left"height="25"  colspan="15" ><strong>เอกสารอนุมัติแล้ว</strong></td>
	</tr>
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="120"> เลขที่เอกสาร		</td>
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="125"> เลขที่รับเอกสาร		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="267"> เรื่อง		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="111"> ลงวันที่		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td  background="images/bar.gif" align="center" height="25" width="85"> วันที่รับ		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="92">วันที่ส่ง		</td>
	</tr>
	
<?
include("day_func.php");
$sql = "SELECT d.doc_id,d.topic,d.put_date_on,d.recieve_date,d.finish_date,d.file_id,d.warning,d.receive_id ,s.send_date
FROM documentary d, send_doc s
Where d.file_id = s.file_id 
and s.status  = 'อนุมัติแล้ว'
and d.type_doc = 'รับเข้า' 
and s.s_status  = '0'
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
		<td align="left" height="25" width="120">&nbsp; <?echo $rs["doc_id"]?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="left" height="25" width="125">&nbsp; <?echo $rs["receive_id"]?>		</td>
		<td align="center" height="25" width="1">		</td>
		<td  align="left" height="25" width="267"> 
		<a href="index.php?action=list_sendStamp&add=add_receive&file_id=<? echo $rs["file_id"]?>"  target="_self"  class="catLink5" ><? echo $rs["topic"]?></a></td><!-- <?=$green_date?>  <?=$orange_date?>  <?=$red_date?> <?= date_diff1($cur_date,$green_date) ?> /<?= date_diff1($cur_date,$orange_date) ?>/ <?= date_diff1($cur_date,$red_date) ?>/ <?= date_diff1($cur_date,$finish_date) ?> -->		
		<td  align="center" height="25" width="1">		</td>
		<td align="center" height="25" width="111"> <?echo date_time($rs["put_date_on"])?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="center" height="25" width="85">
		<?
		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--" || $rs["recieve_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["recieve_date"]);
		}
		?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="center" height="25" width="92">
		<?
		if($rs["send_date"] == "" || $rs["send_date"] == "--" || $rs["send_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["send_date"]);
		}
		?>		</td>
	</tr>
	<? $x = $x +1; }?>
</table>

<? }?>
</td>
</tr>
</table>

 <? if($permission <>'all') {?>
<script language="JavaScript" type="text/javascript">
		document.getElementById('dep_check').style.visibility='visible';
	</script> 
	<? }else{?>
<script language="JavaScript" type="text/javascript">
		document.getElementById('dep_check').style.visibility='hidden';
	</script> 
	
	<? }?>
<script language="JavaScript" type="text/javascript">
		document.getElementById('send_check').style.display='none';
	</script> 
	<?
	
function up_file($old_file,$file_att,$file_att_type,$file_att_size){
	$query="UPDATE file_record SET file_name='$file_att' , file_type='$file_att_type' ,file_size='$file_att_size'  WHERE file_name='$old_file'";
	$result=mysql_query($query);	
}
function add_file($max_file_id,$file_att,$file_att_type,$file_att_size){
	$query="INSERT INTO file_record (file_id,  file_name, file_type, file_size ) VALUES('$max_file_id','$file_att','$file_att_type','$file_att_size')";
	$result=mysql_query($query);	
}
	
function find_up($send_id,$file_id){
		$sql1 ="select * from send_doc where file_id = $file_id and send_id = $send_id";
		$result = mysql_query($sql1);
		$rs = mysql_num_rows($result);
		return $rs;
}
	function find_send($send_id,$file_id){
		$sql1 ="select * from send_doc where file_id = $file_id and send_id = $send_id ";
		$result = mysql_query($sql1);
		$rs = mysql_num_rows($result);
		return $rs;
	}
	function find_for($file_id){
		$sql1 ="select * from send_doc where file_id = '$file_id' ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[remark];
	}
	
	?><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
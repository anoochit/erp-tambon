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
function check_number(ch){
var sum = 0;
	for(var i=0 ; i<ch.length ; i++)
	{
		digit = ch.charAt(i);
		if(digit ==" " ){
			sum =sum+1; 
		}
	} 
	if(sum == ch.length){
		return true;
	}else{
		return false;
	}
}
	function validate(theForm) 
	{
	   
		var v1 = document.save.doc_id.value;
		var v2 = document.save.depart.value;
		var v4 = document.save.doc_topic.value;
		 if ( v2.length == 0  ||  v2 =='')
           {
           alert("กรุณาเลือกกอง");
           document.save.depart.focus();           
           return false;
           }
		 if ( v1.length == 0  ||  v1 =='')
           {
           alert("กรุณากรอกเลขที่เอกสารหรือใส่ - ");
           document.save.doc_id.focus();           
           return false;
           }
		 if (v4.length == 0   ||  v4 == '' )
           {
          		alert("กรุณากรอกชื่อเรื่อง");
		 	  document.save.doc_topic.focus();       
         	  return false;
           }
 
	if(document.save.send[2].checked == true && document.save.type_doc.value == 'รับเข้า'){
		var j =0;
		var v8 = document.save.total.value;
		for (i=1;i<= eval(v8) ;++i) {
			if(document.save["chk["+i+"]"].checked == true){
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
	
	function dochange1(val) {
			if(document.save.type_doc.value != 'รับเข้า' ){
							document.getElementById('dep_check').style.display='none';
							document.getElementById('send_check_1').style.display='none';
							document.getElementById('s_show').style.display='none';
							document.getElementById('s_show1').style.display='none';
							document.getElementById('s_show2').style.display='none';
							document.getElementById('s_show3').style.display='none';
							document.getElementById('s_show4').style.display='none';
							document.getElementById('s_show5').style.display='none';
							document.getElementById('s_show6').style.display='none';
							document.getElementById('s_show7').style.display='none';
							document.getElementById('s_show8').style.display='none';
							document.getElementById('s_show9').style.display='none';			
			}else{
						document.getElementById('dep_check').style.display='none';
						document.getElementById('send_check_1').style.display='none';
						document.getElementById('s_show').style.display='';
						document.getElementById('s_show1').style.display='';
						document.getElementById('s_show2').style.display='';
						document.getElementById('s_show3').style.display='';
						document.getElementById('s_show4').style.display='';
						document.getElementById('s_show5').style.display='';
						document.getElementById('s_show6').style.display='';
						document.getElementById('s_show7').style.display='';
						document.getElementById('s_show8').style.display='';
						document.getElementById('s_show9').style.display='';
			
			}

     };
</script>
<?
$file_name = $_REQUEST["file_name"];
$file_id = $_REQUEST["file_id"];
$sql = "SELECT d.type_doc,d.file_id,d.*,f.file_name,f.name_file FROM documentary d
left join file_record f   on  d.file_id = f.file_id  WHERE d.file_id ='$file_id'  ";
$result = mysql_query($sql);
$i =0;
$rs = mysql_fetch_array($result);
$i++;
	$doc_id = $rs["doc_id"];
	$dep_id = $rs["dep_id"];
	$dep_name = $rs["dep_name"];
	$cat_id = $rs["cat_id"];
	$group_id = $rs["group_id"];
	$topic = $rs["topic"];
	$dep_ref = $rs["dep_ref"];
	$send_from = $rs["send_from"];
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
	$type_doc = $rs["type_doc"];
	$status = $rs["status"] ;
?><form name="save" action="edit_recieve.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="file_id" value="<? echo $file_id?>">
<table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="657" align="center">
<tr bgcolor="#F5DEB3">
	<td width="152" height="28"><div>
		ประเภทเอกสาร 
	  </div>	</td>
	<td width="564"><select name="type_doc" onchange="dochange1(this.value)" >
      <option value="รับเข้า"<? if($type_doc == '' or $type_doc == 'รับเข้า' ) echo "selected"?> >รับเข้า </option>
      <option value="ภายใน"<? if($type_doc == 'ภายใน' ) echo "selected"?> >ภายใน </option>
      <option value="ส่งออก"<? if($type_doc == 'ส่งออก' ) echo "selected"?> >ส่งออก</option>
      <option value="คำสั่ง"<? if($type_doc == 'คำสั่ง' ) echo "selected"?> >คำสั่ง</option>
    </select>
	</td>
</tr>
<tr bgcolor="#F5DEB3">
	<td width="150"><div>
		กอง 
		</div>	</td>
	<td>
	<select name="depart" onchange="dochange('catagory', this.value)" >
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
	</select> &nbsp;
	 	</td>
</tr>
<tr bgcolor="#F5DEB3">
	<td width="150" ><div>
		เลขที่เอกสาร 
		</div>	</td>
	<td width="566"><input type="text" name="doc_id" value="<?echo $doc_id?>" size="40" maxlength="100">	</td>
</tr>
<tr>
	<td width="150"><div>
		ลงวันที่ 
		</div>	</td>
	<td><input type="text" name="put_date" value="<?echo $put_date?>" size="10" maxlength="100"  id="put_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onClick="showCalendar('put_date','DD/MM/YYYY');">	</td>
</tr>
<tr bgcolor="#F5DEB3"  id="s_show">
	<td width="150"><div>
		เลขที่รับเอกสาร 
		</div>	</td>
	<td><input type="text" name="receive_id" value="<? echo $receive_id?>" size="40" maxlength="100"   onkeypress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}">	</td>
</tr>
<tr   id="s_show1">
	<td width="150"><div>
		วันที่รับเอกสาร 
		</div>	</td>
	<td><input type="text" name="recieve_date" value="<?echo $recieve_date?>" size="10" maxlength="100" id="recieve_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onClick="showCalendar('recieve_date','DD/MM/YYYY');">	</td>
</tr>
<tr bgcolor="#F5DEB3">
	<td width="150"><div>
		เรื่อง 
		</div>	</td>
	<td><input type="text" name="doc_topic" value="<? echo $topic;?>" size="80" maxlength="255">	</td>
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
	<td width="150" height="30"><div>
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
  &nbsp;&nbsp;<a href="?action=edit_doc&del=delete&file_id=<? echo $file_id;?>&id=<?=$news[id] ?>&n_file=<?=$news[file_name]?>" target="_self" onClick="return del_confirm();">[ ลบไฟล์ ]</a>
	    <? }?>
	</div>	</td>
</tr>
<? }?>

<tr  id="s_show2">
	<td width="150"><div>
		อ้างถึง 
		</div>	</td>
	<td><input type="text" name="rep_from" value="<?=$rep_from?>" size="40" maxlength="100">	</td>
</tr>
<tr id="s_show3">
	<td width="150"><div>
		สิ่งที่ส่งมาด้วย / หมายเหตุ
		</div>	</td>
	<td><textarea  name="send_from"  cols="40" rows="5"><?=$send_from?>
    </textarea>	</td>
</tr>
<tr id="s_show4">
	<td width="150"><div>
		วันที่สิ้นสุด
		</div>	</td>
	<td><input type="text" name="finish_date" value="<?echo $finish_date?>" size="10" maxlength="100"  id="finish_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onClick="showCalendar('finish_date','DD/MM/YYYY');">	</td>
</tr>
<tr id="s_show5">
	<td width="150"><div>
		จากหน่วยงาน 
		</div>	</td>
	<td><input type="text" name="dep_ref" value="<?echo $dep_ref?>" size="40" maxlength="150">	</td>
</tr>
<tr id="s_show6">
	<td width="150"><div>
		ความเร็วเอกสาร
		</div>	</td>
	<td><select name="a_status">
	<option  value="ปกติ" <? if($a_status == 'ปกติ' or $a_status == '' ) echo "selected"?>>ปกติ</option>
	<option value="ด่วน" <? if($a_status == 'ด่วน' ) echo "selected"?>>ด่วน</option>
	<option value="ด่วนมาก" <? if($a_status == 'ด่วนมาก' ) echo "selected"?>>ด่วนมาก</option>
	<option value="ด่วนที่สุด" <? if($a_status == 'ด่วนที่สุด' ) echo "selected"?>>ด่วนที่สุด</option>
	
	</select></td>
</tr>
<tr id="s_show7">
	<td width="150"><div>
		ระดับความลับ
		</div>	</td>
	<td><select name="c_status">
	<option  value="ปกติ" <? if($c_status == 'ปกติ' or $c_status == '' ) echo "selected"?>>ปกติ</option>
	<option value="ลับ" <? if($c_status == 'ลับ' ) echo "selected"?>>ลับ</option>
	<option value="ลับมาก" <? if($c_status == 'ลับมาก' ) echo "selected"?>>ลับมาก</option>
	<option value="ปกปิด" <? if($c_status == 'ปกปิด' ) echo "selected"?>>ปกปิด</option>
	</select></td>
</tr>
<tr>
	<td width="150"><div>
		สถานะเอกสาร 		</div>	</td>
	<td><select name="status">
	<option  value="ปกติ" <? if($status == 'ปกติ' or $status == '' ) echo "selected"?>>ปกติ</option>
	<option value="ยกเลิก" <? if($status == 'ยกเลิก' ) echo "selected"?>>ยกเลิก</option>
	</select></td>
</tr>
<tr id="s_show8">
	<td width="150" valign="top" height="40"><div>เผยแพร่ </div>	</td>

		<td><input type="radio" name="gp" value="all" <? if($permission =='all') echo "checked"?> onClick="Javascript: dep_check.style.display = 'none';"> สาธารณะ 
	<input type="radio" name="gp" value="owner"  <? if($permission <> 'all') echo "checked"?> onClick="Javascript: dep_check.style.display = '' ;"> เฉพาะ <br>
	<tr  id="dep_check">
	<td colspan="2"><table width="100%" border="0" cellspacing="1" cellpadding="1">
	<?
	
	$dep_name = explode(",",$permission);
	$sql_dep = "SELECT * FROM department ORDER BY dep_name";
	$result = mysql_query($sql_dep);
	$g = 0;
	while($rs1 = mysql_fetch_array($result)){
	$g++;
	if($g==1 or $g%4== 1 ){?><tr><? }?>
<td>
	<input  type="checkbox" name="gp_only[<? echo $g?>]" value="<? echo $rs1["dep_name"]?>" <? 
	for($j=0;$j<=count($dep_name);$j++){
		if(trim($rs1["dep_name"]) ==trim($dep_name[$j])) {echo " checked";} 
	}
	?>><? echo $rs1["dep_name"]?></td>
	<? 
	 if($g%4==0){?></tr><? }
}
?>
	<input type="hidden" name="total_gp"  value="<?=$g?>" />
	</table></td>
	</tr>
	<tr bgcolor="#F5DEB3" id="s_show9">
	<td width="150"  height="40"><div>
		ส่งต่อ
		</div>	</td>
	<td>
	<input type="radio" name="send" value="ไม่ส่ง"  onclick="Javascript: send_check_1.style.display = 'none';"   <? if( find_num($file_id) >0  and find_num1($file_id) == 'ลงรับแล้ว') echo "checked=\"checked\""?>> ไม่ส่ง 
	<input type="radio" name="send" value="ส่ง"   onclick="Javascript: send_check_1.style.display = 'none';" <? if(find_num1($file_id) =='รออนุมัติ' ) echo "checked=\"checked\""?>> ส่งต่อให้ปลัดอนุมัติ
		<input type="radio" name="send" value="ส่ง_1"   onclick="Javascript: send_check_1.style.display = '';" <? if( find_num($file_id) >0 and find_num1($file_id) <>'รออนุมัติ' and find_num1($file_id) <> 'ลงรับแล้ว') echo "checked=\"checked\""?>> ส่งต่อให้หน่วยงาน	</td>
	</tr>

	<tr  id="send_check_1" >
  <td  colspan="2" >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#F5DEB3">
		  <?
	$sql_user = "SELECT * FROM department
	ORDER BY dep_name";
	$result = mysql_query($sql_user);
	$i = 0;
	while($rs1 = mysql_fetch_array($result)){
	$i++;
	if($i==1 or $i%4== 1 ){?><tr><? }	?>
    <td>	<input type="hidden" name="c_hk[<?=$i?>]"   value='<? echo $rs1["dep_id"]?>'>
	<input type='checkbox' name='chk[<?=$i?>]' value="<? echo $rs1["dep_id"]?>" <? 
	if(find_send($rs1["dep_id"],$file_id) >0) {echo "checked";} 
	?>>&nbsp;<? 
	echo $rs1["dep_name"];
	?></td>
	<? 
		if($i%4==0){?></tr><? } 
	}?> <input type="hidden" name="total" value="<? echo  $i?>"> 
	<tr><td colspan="4" >
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>วันที่ส่ง&nbsp;</td><td><input type="text" name="send_date" value="<? echo $send_date;?>" size="10" maxlength="100"  id="send_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onClick="showCalendar('send_date','DD/MM/YYYY');">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">ข้อความต่อท้าย</td>
    <td><textarea  name="remark"  cols="40" rows="5"><?=$remark?>
    </textarea>      &nbsp;</td>
  </tr>
</table>
	</td></tr>
	</table>  </td>
  </tr>

	<!--
	<input type="radio" name="send" value="ไม่ส่ง"  onclick="Javascript: send_check.style.visibility='hidden';"  checked="checked" <? if(find_num($file_id) <=0 ) echo "checked=\"checked\""?>> ไม่ส่ง 
	<input type="radio" name="send" value="ส่ง"   onclick="Javascript: send_check.style.visibility='visible';" <? if(find_num($file_id) >0 ) echo "checked=\"checked\""?>> ส่ง
	</td> 
	</tr>-->

	<tr>
	
	<td  colspan="2">	</td>
</tr>	
<tr>
	<td colspan="2" align="center" height="40">
	<input type="submit" value="บันทึกข้อมูล" onClick="return validate()"  >	</td>
</tr>
</table>


	</div>
	</td>

	
</tr>


</table>
</form>
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
 <? if($permission <>'all') {?>
<!--<script language="JavaScript" type="text/javascript">
		document.getElementById('dep_check').style.visibility='visible';
	</script>  -->
		<script language="JavaScript" type="text/javascript">
		document.getElementById('dep_check').style.display='';
		</script> 
	<? }else{?>
	<script language="JavaScript" type="text/javascript">
		document.getElementById('dep_check').style.display='none';
		</script> 
	<? }?>
	<? if(find_num($file_id) > 0 and find_num1($file_id) == 'ลงรับแล้ว' ){?>

	<script language="JavaScript" type="text/javascript">
		document.getElementById('send_check_1').style.display='none';
		</script> 
	<? }else if(find_num($file_id) >0  and find_num1($file_id) <> 'รออนุมัติ' ){?>

	
	<? }elseif(find_num1($file_id)=='รออนุมัติ'){?>
	<script language="JavaScript" type="text/javascript">
		document.getElementById('send_check_1').style.display='none';
		</script> 
	<? }
	
	 if($type_doc <> 'รับเข้า'){?>
	<script language="JavaScript" type="text/javascript">
		document.getElementById('s_show').style.display='none';
		document.getElementById('s_show1').style.display='none';
		document.getElementById('s_show2').style.display='none';
		document.getElementById('s_show3').style.display='none';
		document.getElementById('s_show4').style.display='none';
		document.getElementById('s_show5').style.display='none';
		document.getElementById('s_show6').style.display='none';
		document.getElementById('s_show7').style.display='none';
		document.getElementById('s_show8').style.display='none';
		document.getElementById('s_show9').style.display='none';
		document.getElementById('send_check_1').style.display='none';
		document.getElementById('dep_check').style.display='none';
		</script>
	<? }?>
	<?
	function find_send($send_id,$file_id){
		$sql1 ="select * from send_doc where file_id = $file_id and send_id = $send_id ";
		$result = mysql_query($sql1);
		$rs = mysql_num_rows($result);
		return $rs;
	}
		function find_num1($file_id){
					$sql1 ="select * from send_doc where file_id = $file_id ";
					$result = mysql_query($sql1);
					if($result)
					$rs = mysql_fetch_array($result);
					return $rs[status];
	}
	function find_for($file_id){
		$sql1 ="select * from send_doc where file_id = '$file_id' ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		return $rs[send_date]."#".$rs[for_to]."#".$rs[remark];
	}
	
	?>

	<script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
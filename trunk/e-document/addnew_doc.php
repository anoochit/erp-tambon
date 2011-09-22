<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
$doc_id = $_REQUEST["doc_id"];
?>
<script language="JavaScript" type="text/javascript">
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
function check_number(ch){
var sum = 0;
//alert(sum);
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
<table cellpadding="0" cellspacing="0" border="0" width="657" align="center" >
  <tr>
    <td background="images/bar.gif" align="center" height="25" width="100%"><b> เพิ่มเอกสารใหม่</b> </td>
  </tr>
</table>
<form name="save" action="add_recieve.php" method="post" enctype="multipart/form-data">
<table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="657" align="center">
<tr bgcolor="#F5DEB3">
	<td width="152" height="28"><div>
		ประเภทเอกสาร 
	  </div>	</td>
	<td width="564"><select name="type_doc" onchange="dochange1(this.value)"  >
	<option value="รับเข้า"<? if($type_doc == '' or $type_doc == 'รับเข้า' ) echo "selected"?> >รับเข้า </option>
	<option value="ภายใน"<? if($type_doc == 'ภายใน' ) echo "selected"?> >ภายใน </option>
	<option value="ส่งออก"<? if($type_doc == 'ส่งออก' ) echo "selected"?>>ส่งออก</option>
	<option value="คำสั่ง"<? if($type_doc == 'คำสั่ง' ) echo "selected"?>>คำสั่ง</option>
	</select>&nbsp;&nbsp;</td>
</tr>
<tr bgcolor="#F5DEB3"> 
	<td width="152"><div>
		กอง 
	  </div>	</td>
	<td>
	<select name="depart"  onchange="dochange('catagory', this.value)" >
		<option value="">--กรุณาเลือก--</option>
	<?
	$sql= "SELECT * FROM department order by dep_name";
	$result = mysql_query($sql);
	while($rs = mysql_fetch_array($result)){
		echo "<option value='".$rs["dep_id"] ." ' ";
		if($rs["dep_id"] == $_REQUEST["depart"]) {
			echo "selected";
		}
		echo ">".$rs["dep_name"]."</option>";
	}
	?>
	</select>	&nbsp;</td>
</tr>
<tr bgcolor="#F5DEB3">
	<td width="152"><div>
		เลขที่เอกสาร 
	  </div>	</td>
	<td width="564"><input type="text" name="doc_id" value="<?echo $doc_id?>" size="40" maxlength="100">	</td>
</tr>
<tr>
	<td width="152"><div>
		ลงวันที่ 
	  </div>	</td>
	<td><input type="text" name="put_date" value="<?echo DATE('d/m/Y');?>" size="10" maxlength="100"  id="put_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onClick="showCalendar('put_date','DD/MM/YYYY')">	</td>
</tr>
<tr bgcolor="#F5DEB3" id="s_show">
	<td width="152"><div>
		เลขที่รับเอกสาร 
	  </div>	</td>
	<td><? 
	$year = substr((date("Y") + 543),2);
	$receive_id = check_receive_id($year);
	?><input type="text" name="receive_id" value="<?=$receive_id?>" size="40" maxlength="100" >	</td>
</tr>
<tr   id="s_show1">
	<td width="152"><div>
		วันที่รับเอกสาร
	  </div>	</td>
	<td><input type="text" name="recieve_date" value="<? echo DATE('d/m/Y');?><?//echo date_format_th(DATE(Y."-".m."-".d));?>" size="10" maxlength="100"  id="recieve_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onClick="showCalendar('recieve_date','DD/MM/YYYY');">	</td>
</tr>
<tr bgcolor="#F5DEB3">
	<td width="152"><div>
		เรื่อง 
	  </div>	</td>
	<td><input type="text" name="doc_topic" value="" size="80" maxlength="255">	</td>
</tr>
<tr>
	<td width="152"><div>
		ไฟล์  1
	  </div>	</td>
	<td>
	<input type="file" name="file_att1" value="" size="40" maxlength="255">
&nbsp;ชื่อไฟล์&nbsp; <input type="text" name="name_file1"  size="30" maxlength="100">	</td>
</tr>	
<tr>
	<td width="152"><div>
		ไฟล์  2
	  </div>	</td>
	<td>
<input type="file" name="file_att2" value="" size="40" maxlength="255">
&nbsp;ชื่อไฟล์&nbsp; <input type="text" name="name_file2"  size="30" maxlength="100">	</td>
</tr>	
<tr>
	<td width="152"><div>
		ไฟล์  3
	  </div>	</td>
	<td>
<input type="file" name="file_att3" value="" size="40" maxlength="255">
&nbsp;ชื่อไฟล์&nbsp; <input type="text" name="name_file3"  size="30" maxlength="100">	</td>
</tr>	
<tr>
	<td width="152"><div>
		ไฟล์  4
	  </div>	</td>
	<td>
<input type="file" name="file_att4" value="" size="40" maxlength="255">
&nbsp;ชื่อไฟล์&nbsp;
<input type="text" name="name_file4"  size="30" maxlength="100" /></td>
</tr>	
<tr>
	<td width="152"><div>
		ไฟล์  5
	  </div>	</td>
	<td>
<input type="file" name="file_att5" value="" size="40" maxlength="255">
&nbsp;ชื่อไฟล์&nbsp; <input type="text" name="name_file5"  size="30" maxlength="100">	</td>
</tr>	
<tr id="s_show2">
	<td width="152"><div>
		อ้างถึง 
	  </div>	</td>
	<td><input type="text" name="rep_from" value="" size="40" maxlength="100">	</td>
</tr>
<tr id="s_show3">
	<td width="152"><div>
		สิ่งที่ส่งมาด้วย / หมายเหตุ
	  </div>	</td>
	<td><textarea name="send_from"  cols="40" rows="5"></textarea>	</td>
</tr>
<tr id="s_show4">
	<td width="152"><div>
		วันที่สิ้นสุด
	  </div>	</td>
	<td><input type="text" name="finish_date" value="" size="10" maxlength="100"  id="finish_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onClick="showCalendar('finish_date','DD/MM/YYYY');">	</td>
</tr>
<tr id="s_show5">
	<td width="152"><div>
		จากหน่วยงาน 
	  </div>	</td>
	<td><input type="text" name="dep_ref" size="40" maxlength="150">	</td>
</tr>

<tr id="s_show6">
	<td width="152"><div>
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
	<td width="152"><div>
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
	<td width="152"><div>
	  สถานะเอกสาร 		</div>	</td>
	<td><select name="status">
	<option  value="ปกติ" <? if($status == 'ปกติ' or $status == '' ) echo "selected"?>>ปกติ</option>
	<option value="ยกเลิก" <? if($status == 'ยกเลิก' ) echo "selected"?>>ยกเลิก</option>
	</select></td>
</tr>

<tr  id="s_show8">
	<td width="152" valign="top"><div>
		เผยแพร่ 
	  </div>	</td>
	<td><input type="radio" name="gp" value="all"  onclick="Javascript: dep_check.style.display = 'none' ;"  checked="checked"> สาธารณะ 
	<input type="radio" name="gp" value="owner"   onclick="Javascript: dep_check.style.display = '' "> เฉพาะ 
</td>
</tr>
<tr >
<td colspan="2" id="dep_check"  >
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
	<input type="checkbox" name="gp_only[<? echo $g?>]" value="<? echo $rs1["dep_name"]?>">&nbsp;<? echo $rs1["dep_name"]?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<? 
	 if($g%4==0){?></tr><? } ?>
	<? 
			$j++;
		}
		
	?>	<input type="hidden" name="total_gp"  value="<?=$g?>" />
	</table>
</td>
</tr>
<tr bgcolor="#F5DEB3"  id="s_show9">
	<td width="152" height="30"><div>
		ส่งต่อ
	  </div>	</td>
	<td><input type="radio" name="send" value="ไม่ส่ง"  onclick="Javascript: send_check_1.style.display = 'none';"  checked="checked"> ไม่ส่ง 
	<input type="radio" name="send" value="ส่ง"   onclick="Javascript: send_check_1.style.display = 'none' "> ส่งต่อให้ปลัดอนุมัติ
		<input type="radio" name="send" value="ส่ง_1"   onclick="Javascript: send_check_1.style.display = '' "> ส่งต่อให้หน่วยงาน	</td>
	</tr>
	<tr bgcolor="#F5DEB3" id="send_check_1">
    <td  colspan="2" >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
		  <?
	$sql_user = "SELECT * FROM department
	ORDER BY dep_name";
	$result = mysql_query($sql_user);
	$i = 0;
	while($rs1 = mysql_fetch_array($result)){
	$i++;
	
	if($i==1 or $i%4== 1 ){?><tr><? }?>

    <td><input type='checkbox' name='chk[<?=$i?>]' value="<? echo $rs1["dep_id"]?>">
	&nbsp;<? echo $rs1["dep_name"];?></td>
	<? 
	if($i%4==0){?></tr><? } 
	}?> <input type="hidden" name="total" value="<? echo  $i?>"> 
	<tr><td colspan="4" bgcolor="#FFFFFF">
	<table width="100%" border="0" cellspacing="2" cellpadding="2" bgcolor="#F5DEB3" >
  <tr>
    <td width="19%"><div>วันที่&nbsp;</div></td><td width="81%"><input type="text" name="send_date" value="<? echo DATE('d/m/Y');?>" size="10" maxlength="100" id="send_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onClick="showCalendar('send_date','DD/MM/YYYY');">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><div>ข้อความต่อท้าย</div></td>
    <td><textarea name="remark"  cols="40" rows="5"></textarea>&nbsp;</td>
  </tr>
</table>
	</td>
	</tr>
	</table>
 </td>
  </tr>
<tr>
	<td colspan="2" align="center" height="40">
	<input type="submit" value="บันทึกข้อมูล" onClick="return validate()">	</td>
</tr>
</table>

</form>
<script language="JavaScript" type="text/javascript">
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
</script> 
<script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
<?
function check_receive_id($year){
		$sql = "Select *  from documentary  where receive_id like '%$year%'  and type_doc = 'รับเข้า' order by abs(mid(receive_id,4)) desc limit 1  ";
		$result = mysql_query($sql); 
		$arr=mysql_fetch_array($result);
		$aa = explode("/",$arr[receive_id]);
		$aa = explode("/",$arr[receive_id]);
		return $year."/".($aa[1] + 1);
}
?>


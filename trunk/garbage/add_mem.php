<?
//-----------บันทึก-------------------
if($save_add <>''){
		$mcode  = trim($mcode_1)."-".trim($mcode_2);
		if(check_member($mem_id , trim($name) , trim($surn) ) <> ''){
				$sql_1 = " Insert  into m_bin (TMCODE,MCODE,mem_id,RDATE,HNO,HNO1,MOO,ROAD,SOI,HOCODE,TUCODE,
				AMCODE,PVCODE,TEL,status,LINE1,REGIEN,qty,amt,type1) values 
				('$TMCODE' , '".trim($mcode_1)."-".trim($mcode_2)."','$mem_id','".date_format_sql($RDATE)."','$HNO','$HNO1','$MOO','$ROAD',
				'$SOI','$HOCODE','01','01','01','$TEL','$status','$LINE1','$REGIEN','$qty','".$qty."','$type1') ";
				$result_1=mysql_query($sql_1);
		}elseif(check_member_1($pren , trim($name) , trim($surn) ) <>''){
				$mem_id = check_member_1($pren , trim($name) , trim($surn) );
				$sql_2 = " Insert  into m_bin (TMCODE,MCODE,mem_id,RDATE,HNO,HNO1,MOO,ROAD,SOI,HOCODE,TUCODE,
				AMCODE,PVCODE,TEL,status,LINE1,REGIEN,qty,amt,type1) values 
				('$TMCODE' , '".trim($mcode_1)."-".trim($mcode_2)."','$mem_id','".date_format_sql($RDATE)."','$HNO','$HNO1','$MOO','$ROAD',
				'$SOI','$HOCODE','01','01','01','$TEL','$status','$LINE1','$REGIEN','$qty','".$qty."','$type1') ";
				$result_2=mysql_query($sql_2);
		}else{
				$mem_id = max_mem_id();
				$sql_3 = " Insert  into member(mem_id , pren , name , surn ) values  ('$mem_id' , '$pren' , '$name' , '$surn' ) ";
				$result_3=mysql_query($sql_3);
				$sql_4 = " Insert  into m_bin (TMCODE,MCODE,mem_id,RDATE,HNO,HNO1,MOO,ROAD,SOI,HOCODE,TUCODE,
				AMCODE,PVCODE,TEL,status,LINE1,REGIEN,qty,amt,type1) values 
				('$TMCODE' , '".trim($mcode_1)."-".trim($mcode_2)."','$mem_id','".date_format_sql($RDATE)."','$HNO','$HNO1','$MOO','$ROAD',
				'$SOI','$HOCODE','01','01','01','$TEL','$status','$LINE1','$REGIEN','$qty','".$qty."','$type1') ";
				$result_4=mysql_query($sql_4);
		}				
		echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=view_detail_mem&mem_id=$mem_id&mem_id=$mem_id&mcode=$mcode\">\n";
}
?>
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
r =ret.split('^')
document.add_mem.mcode_1.value = r[0];
document.add_mem.mcode_2.value  = r[1];
}
</script>
<script language=Javascript>
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
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}
</script>
<script type="text/javascript" src="myAjax.js" ></script>
<script language="javascript">
	var CompleteDataUrl ="completeData.php";
	//ค้นหาคำใกล้เคียง
	function getHint(){ 
		var param = "name=" + document.add_mem.name.value; 
		postDataReturnText(CompleteDataUrl,param,displayHint);
	}
	//แสดงผลลัพท์การค้นหา
 	function displayHint(text){
		document.getElementById("hint").innerHTML = text;
	}
	//แสดงตัวเลือกที่ผู้ใช้เลือกในกล่องข้อความ getElementById มันเปง i ตัวใหญ่ โง่มากๆเลยตู
	function populateName(text){
		var r;
		var ret = text;
		r = ret.split(' ');
		document.add_mem.mem_id.value = r[0];
		document.add_mem.pren.value = r[1];
		r_1 = r[2].split('-')
		document.add_mem.name.value = r_1[0];
		document.add_mem.surn.value = r_1[1];
		document.getElementById("hint").innerHTML = '';
		document.getElementById('show1').style.display= '' ;
	}
</script>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		 if (  document.add_mem.mcode_1.value=='' || document.add_mem.mcode_1.value==' ' )
           {
				   alert("กรุณากรอกเลขทะเบียนก่อน");
				   document.add_mem.mcode_1.focus();           
				   return false;
           }
		   if (  document.add_mem.mcode_2.value=='' || document.add_mem.mcode_2.value==' ' )
           {
				   alert("กรุณากรอกเลขทะเบียนก่อน");
				   document.add_mem.mcode_2.focus();           
				   return false;
           }
		    if (  document.add_mem.name.value=='' || document.add_mem.name.value==' ' )
           {
				   alert("กรุณากรอกชื่อผู้ขอใช้ก่อน");
				   document.add_mem.name.focus();           
				   return false;
           }
		   if (  document.add_mem.surn.value=='' || document.add_mem.surn.value==' ' )
           {
				   alert("กรุณากรอกนามสกุลก่อน ถ้าไม่มีให้ใส่ ' - ' ");
				   document.add_mem.surn.focus();           
				   return false;
           }
		    if (  document.add_mem.qty.value=='' || document.add_mem.qty.value==' ' )
           {
				   alert("กรุณาระบุจำนวนถังขยะก่อน");
				   document.add_mem.qty.focus();           
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
<link rel="stylesheet" type="text/css" href="default.css">
<link href="style.css" rel="stylesheet" type="text/css" />
<body   onLoad="Javascript: show1.style.display = 'none'; ">
<form name="add_mem"  method="post">
<table width="95%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
	<table width="100%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
		<tr bgcolor="#99CCFF" class="lgBar">				
    <td height="35"  colspan="4"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp; เพิ่มทะเบียนผู้ขอใช้บริการ</div></td> 
	 </tr>
  <tr>
    <td width="248" height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">ประเภทผู้ขอใช้บริการ :  </div></td>
    <td class="bmText_1"   colspan="3"style="border: #000000 1px solid;"><strong>&nbsp;
<select name="TMCODE" class="text"  >	<?
			$query  ="select TMCODE,tmname from type_mem  order by TMCODE";
			$result=mysql_query($query);
			while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[TMCODE];?>"
		<?
		if($TMCODE == $d[TMCODE]) echo "selected";
		?>
		><? echo $d[tmname];?></option>
	            <? }?>
	    </select>
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">ชื่อหมู่บ้าน :  </div></td>
    <td colspan="3" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
     <select name="HOCODE" onChange="result1('hocode', this.value);" class="text"  >	<?
			$query  ="select HOCODE , honame from house  order by HOCODE";
			$result=mysql_query($query);
			while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[HOCODE];?>"<? if($HOCODE == $d[HOCODE]  or min_hocode( ) == $d[HOCODE]) echo "selected";?>>
		<? echo $d[honame];?>
		</option>
<? }?>
	    </select> 
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">เลขทะเบียน :  </div></td>
    <td width="459" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<?
if($mcode_1 ==''){
		$mcode_1 = '01';
	 	 $query  ="SELECT mid(max(mcode),4) as max1 FROM m_bin where  mid(mcode,1,2) = '" .min_hocode( )."'";
		 $result = mysql_query($query);
         $rs = mysql_fetch_array($result);
           if($rs[max1] =='' or $rs[max1] == NULL ){
		   		$mcode_2 =  "0001";
		   }else{
		   		$max = $rs[max1]+1;
				$st ='';
				if(strlen($max) <4){
						for($i=0;$i<(4- strlen($max));$i++){
								$st .="0";
						}
						$max = $st.$max;
				}
				$mcode_2 =  $max ;	
			}
	}
	?>
      <input type="text" name="mcode_1" value="<?=$mcode_1?>" size="3"  id="mcode_1" maxlength="2"  class="text"  /> - 
	   <input type="text" name="mcode_2" value="<?=$mcode_2?>" size="5"  id="mcode_2" class="text"   />
    </strong></td>
    <td width="165" class="lgBar"  style="border: #000000 1px solid;"><div align="right">คำนำหน้าชื่อ :  </div></td>
    <td width="354" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
    <select name="pren" class="text"  >
	    <option value=""<? if($pren == "") echo "selected";?>>ไม่ระบุ</option>
		<option value="นาย"<? if($pren == "นาย") echo "selected";?>>นาย</option>
		<option value="นาง"<? if($pren == "นาง") echo "selected";?>>นาง</option>
		<option value="นางสาว"<? if($pren == "นางสาว") echo "selected";?>>นางสาว</option>
		<option value="ร้าน"<? if($pren == "ร้าน") echo "selected";?>>ร้าน</option>
		<option value="คุณ"<? if($pren == "คุณ") echo "selected";?>>คุณ</option>
   </select>
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">ชื่อ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"  ><strong>&nbsp;
		  <input type="text" name="name" value="<?=$name?>" onKeyUp="getHint()" size="25"  class="text"  /><div id="hint"  ></div>	
 <input  type="hidden" name="mem_id" value="<?=$mem_id?>"     />
	   <span id="show1"><input  type="button" name="show_mem" value="รายละเอียด"  onClick="javascript:popup('show_detail.php?mem_id='+document.add_mem.mem_id.value,'',630,230)"  />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;" onMouseOut="document.getElementById('hint').innerHTML = '';"><div align="right">นามสกุล :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;" onMouseOut="document.getElementById('hint').innerHTML = '';"><strong>&nbsp;
    <input type="text" name="surn" value="<?=$surn?>" size="20" class="text"  />	  
    </strong></td>
  </tr>
  <tr onMouseOut="document.getElementById('hint').innerHTML = '';">
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">วันที่สมัคร :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input name="RDATE" type="text" id="RDATE" value="<? if($RDATE =='') echo date("d/m/Y") ;else echo $RDATE;?>"  size="10" /class="text"  >
                  &nbsp; <img  src="images/calculator_add.png" onClick="showCalendar('RDATE','DD/MM/YYYY')" align="absmiddle"   />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">บ้านเลขที่ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
    <input type="text" name="HNO" value="<?=$HNO?>" size="3" class="text"   /> / <input type="text" name="HNO1" value="<?=$HNO1?>" size="3"  class="text"  />
    </strong></td>
  </tr>
  <tr onMouseOut="document.getElementById('hint').innerHTML = '';">
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">หมู่ที่ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="MOO" value="<?=$MOO?>" size="20"  class="text"  />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">ซอย :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
    <input type="text" name="SOI" value="<?=$SOI?>" size="20"class="text"    />
    </strong></td>
  </tr>
  <tr onMouseOut="document.getElementById('hint').innerHTML = '';">
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">ถนน :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
     <input type="text" name="ROAD" value="<?=$ROAD?>" size="20"  class="text"  />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">โทรศัพท์ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="TEL" value="<?=$TEL?>" size="10" class="text"   />
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">เขต :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="REGIEN" value="<?=$REGIEN?>" size="20"  class="text"  />
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;"><div align="right">สายจัดเก็บ :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="LINE1" value="<?=$LINE1?>" size="20"  class="text"  />
    </strong></td>
  </tr>
    <tr>
    <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">จำนวนเงิน :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;" colspan="4"><strong>&nbsp;
	<select name="qty" class="text"  >	<?
			$query  ="select * from type_rece  order by trcode";
			$result=mysql_query($query);
			while($d =mysql_fetch_array($result)){
  	?>
	    <option value="<? echo $d[cost];?>"
		<?
		if($qty == $d[cost]) echo "selected";
		?>
		><? echo $d[TRNAME] ." ราคา ".$d[cost] ." บาท ";?></option>
	            <? }?>
	    </select>
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">ชำระเงิน :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input  type="radio" name="type1" value="รายเดือน" size="20" class="text"   <? if($type1 =='รายเดือน' or $type1 =='' ) echo "checked"?> /> รายเดือน
	  <input  type="radio" name="type1" value="รายปี" size="20"  class="text"  <? if($type1 =='รายปี') echo "checked"?> /> รายปี
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;"><div align="right">สถานะ :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <select name="status" class="text"  >
	    <option value="ปกติ"<? if($status == "" or $status =='ปกติ') echo "selected";?>>ปกติ</option>
		<option value="ยกเลิก"<? if($status== "ยกเลิก") echo "selected";?>>ยกเลิก</option>
   </select>
    </strong></td>
  </tr>
  <tr>
	<td colspan="4" align="center" class="lgBar" style="border: #000000 1px solid;">
	  <input name="save_add" type="submit"  value="บันทึกข้อมูล" onClick="return validate()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="reset" name="reset" value=" ยกเลิก " >	  </td>
</tr>
 </table>
 </td></tr></table>
</form>
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
</script>  

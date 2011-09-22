<? 
session_start();
?>
<?
include('config.inc.php');

if($OK =='ตกลง' ) {
	if(empty($pointer_array)){
			$pointer_array=0;
	} 
		$pointer_array =$pointer_array + 1;
	
		session_register("dd2");
		session_register("pointer_array");
		$unit = $unit1;
		$a_unit = $a_unit1;
		$dd2[] = "$product,$c_cost,$cost,$amount,$unit,$p_id,$a_unit";
		
?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>  
<?	
}
		?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css"> 
<script language="JavaScript" src="include/calendar.js"></script>
<script type="text/javascript" src="myAjax.js" ></script>
<script language="javascript">
	var CompleteDataUrl ="completeData_2.php";
	//ค้นหาคำใกล้เคียง
	function getHint(){
		var param = "product=" +  document.from12.product.value;
		postDataReturnText(CompleteDataUrl,param,displayHint);
		
	}
	
	//แสดงผลลัพท์การค้นหา
 	function displayHint(text){
		document.getElementById("hint").innerHTML = text;
	}
	function populateName(text){
		var r;
		var ret = text;
		
		r =ret.split('^')
		document.from12.product.value = r[0];
		document.from12.unit1.value = r[1];
		document.from12.unit2.value = r[2];
		document.from12.p_id.value = r[3];
		document.from12.a_unit1.value = r[4];
		document.from12.a_unit2.value = r[5];
		document.getElementById("hint").innerHTML = '';
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
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
	 //alert(val);
}
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
function time(val){
var result;
var url = 'ajax_1.php?p_id=' + val; 
xmlhttp = uzXmlHttp();
xmlhttp.open("GET", url, false);
xmlhttp.send(null); 
result = xmlhttp.responseText;

r =result.split('^');
		document.from12.product.value = r[0];
		document.from12.unit1.value = r[1];
		document.from12.unit2.value = r[2];
		document.from12.a_unit1.value = r[4];
		document.from12.a_unit2.value = r[5];
		document.from12.amount1.value = r[6];
		document.from12.amount2.value = r[6];

}
</script>

<link rel="stylesheet" type="text/css" href="default.css">
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<body>
<br />
<form name="from12" method="post"  action="#"  onSubmit="return check(this);"  >
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
      <tr> 
        <td  colspan="2" style="border: #7292B8 1px solid;"  >
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr class="lgBar">
			   <td  height="32"><div>&nbsp;&nbsp;&nbsp;รายละเอียดพัสดุ</div></td> 
            </tr>
			
            <tr>
              <td valign="top"><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
				  <tr class="bmText_1" height="25">
                    <td width="20%"><div>ประเภทพัสดุ</div></td>
			
                    <td width="80%"><div><?
			$query  ="select * from type where status =0  group by p_type  order by t_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?><select name="type_id"  onchange="dochange('product2', this.value);">
        <option value=''>----------กรุณาเลือก----------</option>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[t_id];?>"
		<?
		if($type_id == $d[t_id]) echo "selected";
		?>
		><? echo $d[p_type];?></option>
                        <? }?>
            </select></div>				</td>
    </tr>
	 <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
    <td height="30"><div>ชื่อพัสดุ</div></td>
    <td><div id="product2"    ><?	
          echo "<select name='p_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        
		 echo "</select>\n";  
?>

	</div>	</td>
  </tr><tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr class="bmText_1">
                    <td width="230"><div> จำนวนที่เบิก </div></td>
                    <td><div>
                        <input name="amount" type="text" id="amount" value="" size="10" >
                    จำนวนคงเหลือ <input name="amount1"  type="text"   value="" id="amount1" disabled="disabled"   size="5">
					    <input type="hidden" name="amount2" value="<?=$amount1?>"  id="amount2" > </div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="230" class="bmText_1"><div> หน่วยนับ </div></td>
                    <td width="511"><div id='dep_id1'>
                      <input name="unit1" type="text" id="unit1" value="" size="30" maxlength="255">
					  <input name="a_unit1"  type="hidden" id="a_unit1"  >
					  <input name="unit2" type="hidden" id="unit2" value="" size="10">
					  <input name="a_unit2"  type="hidden" id="a_unit2"  >
					    <input type="hidden" name="product" value="<?=$product?>" id="product">
                    </div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="ตกลง"  onClick="document.f12.submit();" >
                    <input type="reset" name="formbutton2" value="ยกเลิก">    </td>
                </tr>
              </table>
              </td>
            </tr>
        </table></td>
      </tr>
  </table>
  </form>
  <script language="JavaScript" type="text/javascript">
	function check(theForm) 
	{
		     if (  document.from12.type_id.value=='' || document.from12.type_id.value==' ' )
           {
           alert("กรุณาเลือกประเภทพัสดุ");
           document.from12.type_id.focus();           
           return false;
           }
		   if (  document.from12.p_id.value=='' || document.from12.p_id.value==' ' )
           {
           alert("กรุณาเลือกพัสดุ");
           document.from12.p_id.focus();           
           return false;
           }
		    if (  document.from12.amount.value=='' || document.from12.amount.value==' ' )
           {
          	 alert("กรุณากรอกจำนวน");
          	 document.from12.amount.focus();           
          	 return false;
           }
		   	if(eval(document.from12.amount.value) > eval(document.from12.amount2.value) ){
					alert("จำนวนที่เบิกมากกว่าจำนวนคงเหลือ");
					document.from12.amount.focus();  
					return false;
			}
}
</script>
<script language="javascript">
function doNext(el)
{
	if (el.value.length < el.getAttribute('maxlength')) 
	return;

	var f = el.form;
	var els = f.elements;
	var x, nextEl;
	for (var i=0, len=els.length; i<len; i++){
		x = els[i];
		if (el == x && (nextEl = els[i+1]))
		{
			nextEl.value="";
			if (nextEl.focus) 
			nextEl.value="";
			nextEl.focus();

		}
	}
}
function godel()
{
	if (confirm("คุณต้องการลบข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

function q_confirm()
{
	if (confirm("คุณต้องการเพิ่มข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function q_cencel()
{
	if (confirm("คุณต้องการยกเลิก ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>


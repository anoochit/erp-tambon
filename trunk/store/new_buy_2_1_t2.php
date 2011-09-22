
<? 
session_start();
?>
<?	
if($btnSub <>''){ // ยกเลิก
	unset($data); 
	session_unregister("data");
	
	unset($dd); 
	session_unregister("dd");
	
	unset($pointer_array); 
	session_unregister("pointer_array");
	
	unset($seri); 
	session_unregister("seri");

}
if($OK <> '' ){
		session_register("seri");
		$seri = $pay_id."~".$pay_date."~".$paper_id."~".$open_name."~".$pay_type."~".$detail;
	}else{	
		$seri = explode("~",$_SESSION[seri]);
		$pay_id=$seri[0];
		$pay_date = $seri[1];
		$paper_id =$seri[2];
		$open_name =$seri[3];
		$pay_type =$seri[4];
		$detail =$seri[5];
		 $seri = $seri[0]."~".$seri[1]."~".$seri[2]."~".$seri[3]."~".$seri[4]."~".$seri[5]; 
	}
?>

<title>ใบส่งของ</title>
<script type="text/javascript" src="myAjax.js" ></script>
<script language="javascript">
	var CompleteDataUrl ="completeData.php";
	//ค้นหาคำใกล้เคียง
	function getHint(){
		var param = "product=" + document.getElementById("product").value;
		postDataReturnText(CompleteDataUrl,param,displayHint);
		
	}
	
	//แสดงผลลัพท์การค้นหา
 	function displayHint(text){
		document.getElementById("hint").innerHTML = text;
	}
	
	function populateName(text){
		var r;
		var ret = text;
		
		r =ret.split('@')
		document.getElementById("shop_id").value = r[0];
		document.getElementById("product").value = r[1];
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
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //เบิกค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<script language="JavaScript" type="text/JavaScript">
function del_confirm(num)
{
	var x=window.confirm("ต้องการลบชื่อครุภัณฑ์ที่เลือก ใช่หรือไม่");
	return (x);
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="default.css">
<link href="style2.css" rel="stylesheet" type="text/css">
<body  >
<? 
if($type_id ==10){
	$na = 'วัสดุสำนักงาน';
}elseif($type_id ==11){
	$na = 'วัสดุงานบ้านงานครัว';
}
?>
<form name="f166" method="post"  action="?action=new_buy_2_2_t2&type_id=<?=$type_id?>"   >
<br>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td colspan="2" align="center"  style="border: #7292B8 1px solid;" >
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		ทะเบียนเบิก<?=$na?></td>
	</tr>
</table></td>
</tr>
</table>
<br>
        <table  border="0" cellpadding="1" cellspacing="1"  width="88%" align="center">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25"><div>&nbsp;&nbsp;&nbsp;เบิก<?=$na?></div></td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" width="100%">
			  <tr class="bmText">
                <td height="30"><div>เลขที่เบิก</div></td>
                <td width="171" ><div><input type="text" name="pay_id" value="<?=$pay_id?>"  size="15" /></div>                 </td>
			      <td width="88"><div>วันที่เบิก&nbsp;</div></td>
                <td width="206"><div>
                  <input type="text" name="pay_date" value="<? if($pay_date =='') echo date("d/m/Y") ;else echo $pay_date;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('pay_date','DD/MM/YYYY')"   width='19'  height='19'></div></td>
              </tr>
			  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
			    <td><div>ทะเบียนเลขที่เบิก</div></td>
			    <td  ><div><? 
			if( date("m") > '09')	{
					$year = substr((date("Y") + 543+1),2);
			}else{
					$year = substr((date("Y") + 543),2);
			}

					$paper_id = check_paper_id($year);
				?>
			      <input name="paper_id" type="text"  value="<?=$paper_id?>" size="20" maxlength="50"></div>				  </td>
		      <td><div>ชื่อผู้เบิก&nbsp; </div></td>
                <td><div><input type="text" name="open_name" value="<?=$open_name?>"  size="20" /></div>                  </td>
</tr>
<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
	<td width="112" height="30"><div>
		ประเภทการเบิก
		</div>	</td>
	<td  colspan="3"><div >
		<select name="pay_type"  >
          	<option  value="0" <? if($pay_type == 0) echo "selected"?>>การเบิกจ่ายใช้งานตามปกติ</option>
		 	<option  value="1" <? if($pay_type == 1) echo "selected"?>>การโอนให้</option>
		  	<option  value="2" <? if($pay_type == 2) echo "selected"?>>การยืมและการคืน</option>
		</select>
</div></td>

</tr>         

<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr>
	<td width="112" class="bmText"><div>
		รายละเอียด
		</div>	</td>
	<td  colspan="3"><div ><textarea name="detail" cols="50" rows="4"><?=$detail?>
</textarea>
	</div></td>
</tr>
<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="ตกลง"   onClick="return check(this)" class="buttom">&nbsp;&nbsp;
                    <input   type="button" name="formbutton2" value="ยกเลิก" class="buttom">    </td>
                </tr>
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>

</form>
</body>

</html>
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


function q_cencel()
{
	if (confirm("คุณต้องการยกเลิก ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>

<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function check(theForm) 
	{
		     if (  document.f166.paper_id.value=='' || document.f166.paper_id.value==' ' )
           {
           alert("กรุณากรอกเลขที่เบิก");
           document.f166.paper_id.focus();           
           return false;
           }
		    if (  document.f166.pay_date.value=='' || document.f166.pay_date.value==' ' )
           {
           alert("กรุณากรอกวันที่เบิก");
           document.f166.pay_date.focus();           
           return false;
           }
		    if (  document.f166.open_name.value=='' || document.f166.open_name.value==' ' )
           {
           alert("กรุณากรอกชื่อผู้เบิก");
           document.f166.open_name.focus();           
           return false;
           }
				return true;

}
</script>
<?
function find_maxid() {
	
		$sql = "Select max(r_id) as max  from pay ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$r_id = "1";
		} else{
			$r_id =  $max + 1; //gene ค่า 
		}
		return $r_id;
	}
	
	function find_max_rd_id($r_id) {
	
		$sql = "Select max(rd_id) as max  from pay_detail  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1; //gene ค่า 
		}
		return $rd_id;
	}
	function check_product_1($product){
		$sql = "Select *  from product  where pro_name ='$product' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[pro_name];
}
	function check_paper($num_id,$paper_id){
		$sql = "Select *  from pay  where (pay_id = '$pay_id' or paper_id = '$paper_id')  ";
		$result = mysql_query($sql); 
		$recn=mysql_num_rows($result);
		return $recn;
}
function check_paper_id($year){
		$sql = "Select *  from pay  where paper_id like '%$year%' order by abs(paper_id) desc  limit 1  ";
		$result = mysql_query($sql); 
		$arr=mysql_fetch_array($result);
		$aa = explode("-",$arr[paper_id]);
		return ($aa[0] + 1)."-".$year;
}
?>

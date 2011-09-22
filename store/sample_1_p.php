<?
include('config.inc.php');

if($Go <> ''){
		$sql_order = "UPDATE pay SET pay_id ='".$pay_id."', 
		pay_date = '".$pay_date1."', 
		paper_id ='".$paper_id."' ,pay_type = '".$pay_type."' ,open_name ='".$open_name."' ,detail ='".$detail."'  WHERE p_id = $p_id 
";
		echo $sql_order."<br>";
		$result_open = mysql_query($sql_order);
		
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
<link rel="stylesheet" type="text/css" href="style2.css">
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<script language="JavaScript" src="include/calendar.js"></script>
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
		//window.close();
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
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<link rel="stylesheet" type="text/css" href="default.css">
<body>

<form action="" method="post" name="f22" >

<?

$sql = "SELECT * FROM pay WHERE p_id= $p_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?><br>
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25"  class="lgBar">&nbsp; ทะเบียนเบิกพัสดุ</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
 
			  <tr class="bmText_1">
			    <td>เลขที่เบิก</td>
			    <td width="429">
			      <input name="pay_id" type="text" id="pay_id" value="<?=$rs[pay_id]?>" size="20" maxlength="50">   </td>
		      </tr>
			  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText_1">
			    <td>ทะเบียนเอกสาร</td>
			    <td width="429">
			      <input name="paper_id" type="text" id="paper_id" value="<?=$rs[paper_id]?>" size="20" maxlength="50"  disabled="disabled">		
				  <input type="hidden" name="paper_id" value="<?=$rs[paper_id]?>" >  </td>
		      </tr>
			  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr>
                <td width="297" class="bmText_1"> วันที่เบิก<font color="#FF0000"></font></td>
                <td><input name="pay_date" type="text" id="pay_date" value="<? if($rs[pay_date] =='') echo date("d/m/Y") ;else echo date_format_th($rs[pay_date]);?>"  size="10" disabled="disabled"  />
				<input type="hidden" name="pay_date1" value="<?=$rs[pay_date]?>" >
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('pay_date','DD/MM/YYYY')"   width='19'  height='19'>  </td>
				  
              </tr>
			  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText_1">
			    <td height="25">ผู้เบิก</td>
			    <td width="429">
			      <input name="open_name" type="text" id="open_name" value="<?=$rs[open_name]?>" size="40" >			   </td>
		      </tr>
			  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText_1">
			    <td>ประเภทการเบิก</td>
			    <td width="429">
			      <select name="pay_type"  >
          	<option  value="0" <? if($rs[pay_type] == 0) echo "selected"?>>การเบิกจ่ายใช้งานตามปกติ</option>
		 	<option  value="1" <? if($rs[pay_type] == 1) echo "selected"?>>การโอนให้</option>
		  	<option  value="2" <? if($rs[pay_type] == 2) echo "selected"?>>การยืมและการคืน</option>
		</select>			   </td>
		      </tr>
			  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr>
	<td width="297" class="bmText_1">
		รายละเอียด</td>
	<td>
		<textarea cols="50" rows="3" name="detail"><?=$rs[detail]?></textarea>	</td>
</tr>  
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr> 
  <tr><td colspan="2" align="center" height="35">
    <input   type="submit" name="Go" value=" บันทึก " onClick="return godel();" > &nbsp;&nbsp;
</td>
  </tr>      
            </table></td>
			</tr>
			
		</table>

	</td>

   
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

function godel()
{
	if (confirm("คุณต้องการแก้ไขข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>



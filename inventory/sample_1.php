<?
include('config.inc.php');

if($Go <> ''){
		
		$sql_order = "UPDATE receive SET num_id ='".$num_id."', 
		date_receive = '".date_format_sql($date_receive)."', 
		shop_name = '".$shop_name."' ,come_in ='".$come_in."' ,paper_id ='".$paper_id."' 
		,planname = '$planname' , project  = '$project' ,rep_id ='$rep_id' 
		WHERE r_id = $r_id ";
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
	function getHint(){
		var param = "product=" + document.f22.product.value;
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
		document.f22.shop_id.value = r[1];
		document.f22.product.value = r[0];
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
$sql = "SELECT * FROM receive WHERE r_id= $r_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?><br>
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="100%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; ใบสั่งของ</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
 
			  <tr class="bmText_1">
			    <td>ใบส่งของที่</td>
			    <td width="221" height="30">
			      <input name="num_id" type="text" id="num_id" value="<?=$rs[num_id]?>" size="20" maxlength="50"></td>
			    <td>ทะเบียนเอกสาร</td>
			    <td width="265">
			      <input name="paper_id" type="text" id="paper_id" value="<?=$rs[paper_id]?>" size="20" maxlength="50">			   </td>
		      </tr> 
			    <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText_1">
                <td>จากร้าน<font color="#FF0000"></font></td>
				
                <td colspan="3">
				
					<input type="text" name="shop_name" size="40" value="<?=$rs[shop_name]?>" >			  </td>
              </tr>
			    <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
			  <tr>
                <td width="125" height="30" class="bmText_1"> วันที่รับ<font color="#FF0000"></font></td>
                <td><input name="date_receive" type="text" id="date_receive" value="<? if($rs[date_receive] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_receive]);?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive','DD/MM/YYYY')"   width='19'  height='19'>  </td>
        
	<td width="124" class="bmText_1">
		วิธีการได้มา</td>
	<td>
		<select name="come_in">
	  <option value='' <? if($rs[come_in] =='') echo "selected"?>>----------กรุณาเลือก----------</option>
	  <option value='0' <? if($rs[come_in] =='0') echo "selected"?>>รายได้</option>
	  <option value='1' <? if($rs[come_in] =='1') echo "selected"?>>อุดหนุน</option>
	    <option value='2' <? if($rs[come_in] =='2') echo "selected"?>>บริจาค</option>
		  <option value='3' <? if($rs[come_in] =='3') echo "selected"?>>เงินกู้</option>
	  <option value='4' <? if($rs[come_in] =='4') echo "selected"?>>อื่นๆ</option>
		</select>	</td>
</tr>   
<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
			    <td height="30">แผนงาน</td>
			    <td width="221">
			      <input name="planname" type="text" id="planname" value="<?=$rs[planname]?>" size="30" ></td>
			    <td>โครงการ</td>
			    <td width="265">
			      <input name="project" type="text"  value="<?=$rs[project]?>" size="30" >
				  </td>
				  
		      </tr>
			  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
			    <td height="30">เลขที่สัญญา</td>
			    <td  colspan="3">
			      <input name="rep_id" type="text" id="rep_id" value="<?=$rs[rep_id]?>" size="20"  maxlength="50">		   </td>  
		      </tr>
			  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
  <tr><td colspan="4" align="center" height="35">
    <input   type="submit" name="Go" value=" บันทึก " onClick="return godel();"  class="buttom"> &nbsp;&nbsp;
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



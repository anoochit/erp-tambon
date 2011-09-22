<?
include('config.inc.php');

if($Go <> '' and check_num_o($num_id,$o_id) ==''){

		$sql_order = "UPDATE open SET num_id ='".$num_id."', 
		paper_id = '$paper_id',mon_type = '$mon_type',
		open_date = '".date_format_sql($open_date)."',
		div_id = '".$div_id."' ,sub_id ='".$sub_id."' ,
		name_head = '".$name_head."' ,detail ='".$detail."' WHERE o_id = $o_id 
";
		echo $sql_order."<br>";
		$result_open = mysql_query($sql_order);
		
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>
		
		<?
}elseif($Go <> '' and check_num_o($num_id,$o_id) <>''){
		echo "<br><center><font color=red size=3>เลขที่ใบเบิกซ้ำ กรุณากรอกข้อมูลใหม่</font></center><br>";			
		print "<meta http-equiv=\"refresh\" content=\"2;URL=sample_5.php?o_id=$_GET[o_id]\">\n";

}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style2.css">
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<script language="JavaScript" src="include/calendar.js"></script>
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

//dochange จะถูกเรียกเมื่อมีการเลือก รายการ Combobox ซึ่งจะทำให้ไปเรียก AJAX เพื่อร้องขอข้อมูลถัดไปจาก Server
function dochange(src, val) {

	//alert(val);
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
<body>

<form action="" method="post" name="f22" >
<?
$sql = "SELECT * FROM open WHERE o_id= $o_id";
//echo $sql."<br>";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
//echo $rs[o_name]."<br>";
?><br>
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="100%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; ข้อมูลใบเบิก</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
 
			   <tr class="bmText_1">
    <td width="11%" height="30">เลขที่ใบเบิก</td>
    <td width="35%"><div><input type="text" name="num_id" value="<?=$rs[num_id]?>" /></div></td>
	    <td width="14%">ทะเบียนเอกสาร</td>
    <td width="40%"><div><input name="paper_id" type="text" value="<? echo $rs[paper_id];?>" />
                 </div></td>
  </tr>
  <tr class="bmText_1">
   <td width="11%">วันที่เบิก</td>
    <td width="35%"><div><input name="open_date" type="text" id="open_date" value="<? if($rs[open_date] =='') echo date("d/m/Y") ;else echo date_format_th($rs[open_date]);?>"  size="10" <? if($new1 =='old')  echo "disabled='disabled'"?>/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('open_date','DD/MM/YYYY')"   width='19'  height='19'></div></td>
				   <td width="14%">ประเภทเงิน</td>
    <td width="40%"><div><select name="mon_type" >
	  <option value='' <? if($rs[mon_type] =="") echo "selected"?>> - - - - กรุณาเลือก - - - - -</option>
	   <option value='เงินงบประมาณ' <? if($rs[mon_type] =='เงินงบประมาณ') echo "selected"?>>เงินงบประมาณ</option>
	  <option value='เงินนอกงบประมาณ' <? if($rs[mon_type] =='เงินนอกงบประมาณ') echo "selected"?>>เงินนอกงบประมาณ</option>
	  <option value='เงินบริจาค/เงินช่วยเหลือ' <? if($rs[mon_type] =='เงินบริจาค/เงินช่วยเหลือ') echo "selected"?>>เงินบริจาค/เงินช่วยเหลือ</option>
	   <option value='อื่นๆ' <? if($rs[mon_type] =='อื่นๆ') echo "selected"?>>อื่นๆ</option>
	  </select></div></td>
  </tr>
 <tr class="bmText_1">
    <td>กอง</td>
    <td><div><?
			$query="select div_id,div_name from division order by div_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
?><select name="div_id"  onchange="dochange('sub_div_1', this.value);" <? if($new1 =='old')  echo "disabled='disabled'"?>>
<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
				
?>
  <option value="<? echo $d[div_id];?>"
		<?
		if($rs[div_id]== $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select> <br /><input    type="button"name="add_div"  value="เพิ่มกอง" onClick="javascript:window.open('add_div.php?action=add','','resizable=yes,width=350,height=250');" <? if($new1 =='old')  echo "disabled='disabled'"?>></div></td>
	    <td>ฝ่าย</td>
    <td><div id="sub_div_1"    ><?
	if($rs[div_id] <>''){
			      $query  ="select *  from division d,subdivision s
        where  1 = 1 and d.div_id = s.div_id
        and d.div_id like '%$rs[div_id]%' 
		group by s.sub_name
        order by s.sub_id ";
		//echo $query."<br>";
		 $result = mysql_query($query);
          echo "<select name='sub_id' ";
		   if($new1 =='old')  echo "disabled='disabled'";
		   echo ">";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[sub_id]' ";
		if($rs[sub_id] ==   $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select>\n";  
}else{
	 ?>
	 <select name='sub_id' <? if($new1 =='old')  echo "disabled='disabled'"?>>
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select>
<? }?>	  </div><input   type="button"  name="add_sub"  value="เพิ่มฝ่าย" onClick="javascript:window.open('add_div.php?action=sub_add','','resizable=yes,width=350,height=250');" <? if($new1 =='old')  echo "disabled='disabled'"?>>
</td>
  </tr>
  <tr class="bmText_1">
    <td width="11%" height="30">หัวหน้าส่วน</td>
    <td width="42%"><div><input type="text" name="name_head" value="<?=$rs[name_head]?>" size="25"/></div></td>
	    <td width="13%">อื่นๆ</td>
    <td width="34%"><div><input name="detail" type="text" value="<? echo $rs[detail];?>"size="25"/>
                 </div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35">
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
<?
function check_num_o($num_id,$o_id){
	$sql = "SELECT * FROM open  Where num_id = '$num_id'   and o_id != '$o_id'";
	$result = mysql_query($sql);
	$rs=mysql_fetch_array($result);
	return $rs[num_id];
}
?>


<?
include('config.inc.php');
if($Go <> ''){
		$sql_order = "INSERT INTO move (c_id,date_move,s_id,r_id,detail,remark) 
		VALUES('$c_id','".date_format_sql($date_move)."','$s_id','$room_id','$detail','$remark')";
		echo $sql_order."<br>";
		$result_open = mysql_query($sql_order);
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>  
		<?
}
if($Go1 <> ''){

		$sql_order = "UPDATE move SET date_move = '".date_format_sql($date_move)."',
		s_id = '".$s_id."' ,r_id ='".$room_id."',detail = '$detail',remark = '$remark'
		  WHERE m_id = $m_id ";
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
<body>
<form action="" method="post" name="f22" >
<? if($tab=='add'){?>
<br>
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; เพิ่ม การย้ายครุภัณฑ์</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
  <tr class="bmText_1">
   <td width="31%">วันที่ย้าย</td>
    <td width="69%"><div><input name="date_move" type="text" id="date_move" value="<? if($rs[date_move] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_move]);?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_move','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr class="bmText_1">
    <td>แผนก</td>
    <td><div><?
			$query  ="select * from section ";
			if($s_id <>''){
				$query  .=" where  s_id = '$s_id' ";
			}
			$query  .=" order by sec_name ";
			$result=mysql_query($query);
			?><select name="s_id" onChange="dochange('roomId', this.value)" >
		   <option value=""> - - - - กรุณาเลือก - - - - - </option>
	    <?
			while($d =mysql_fetch_array($result)){
				
	?>
	    <option value="<? echo $d[s_id];?>"
		<?
		if($rs[s_id] == $d[s_id] ) echo "selected";
		?>
		><? echo $d[sec_name];?></option>
	            <? }?>
	    </select></div></td>
  </tr>
  <tr class="bmText_1">
   <td>ห้อง</td>
    <td><div  id="roomId"  >
		<?
			$query  ="select * from room ";
			if($rs[s_id] <>''){
				$query  .=" where  s_id = '$rs[s_id]' ";
			}
			$query  .=" order by room ";
			$result=mysql_query($query);
			?><select name="room_id" >
		   <option value=""> - - - - กรุณาเลือก - - - - - </option>
	    <?
			while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[r_id];?>"
		<?
		if($rs[room_id] == $d[r_id] ) echo "selected";
		?>
		><? echo $d[room]." / ".$d[room_name];?></option>
	            <? }?>
	    </select>
		</div></td>
  </tr>
  <tr class="bmText_1">
   <td>รายละเอียด</td>
    <td><div><textarea rows="5" cols="40" name="detail"  ><?=$detail?></textarea></div></td>
  </tr>
  <tr class="bmText_1">
   <td>หมายเหตุ</td>
    <td><div><textarea rows="5" cols="40" name="remark"  ><?=$remark?></textarea></div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><!--clsControlObject('f','write'); id="btnSub"  -->
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
<? }elseif($tab=='edit'){?>
<?
$sql = "SELECT * FROM move WHERE m_id= $m_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?><br>
<input type="hidden" name="m_id" value="<?=$m_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; แก้ไข การย้ายครุภัณฑ์</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
			   <tr class="bmText_1">
   <td width="31%">วันที่ย้าย</td>
    <td width="69%"><div><input name="date_move" type="text" id="date_move" value="<? if($rs[date_move] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_move]);?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_move','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr class="bmText_1">
    <td>แผนก</td>
    <td><div><?
			$query  ="select * from section ";
			$query  .=" order by sec_name ";
			$result=mysql_query($query);
			?><select name="s_id" onChange="dochange('roomId', this.value)" >
		   <option value=""> - - - - กรุณาเลือก - - - - - </option>
	    <?
			while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[s_id];?>"
		<?
		if($rs[s_id] == $d[s_id] ) echo "selected";
		?>
		><? echo $d[sec_name];?></option>
	            <? }?>
	    </select></div></td>
  </tr>
  <tr class="bmText_1">
   <td>ห้อง</td>
    <td><div  id="roomId"  >
		<?
			$query  ="select * from room ";
			if($rs[s_id] <>''){
				$query  .=" where  s_id = '$rs[s_id]' ";
			}
			$query  .=" order by room ";
			$result=mysql_query($query);
			?><select name="room_id" >
		   <option value=""> - - - - กรุณาเลือก - - - - - </option>
	    <?
			while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[r_id];?>"
		<?
		if($rs[r_id] == $d[r_id] ) echo "selected";
		?>
		><? echo $d[room]." / ".$d[room_name];?></option>
	            <? }?>
	    </select>
		</div></td>
  </tr>
  <tr class="bmText_1">
   <td>รายละเอียด</td>
    <td><div><textarea rows="5" cols="40" name="detail"  ><?=$rs[detail]?></textarea></div></td>
  </tr>
  <tr class="bmText_1">
   <td>หมายเหตุ</td>
    <td><div><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35">
    <input   type="submit" name="Go1" value=" บันทึก " onClick="return godel();" > &nbsp;&nbsp;
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
<? }?>
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

<?
include('config.inc.php');

if($Go <> ''){

		$sql_order = "INSERT INTO service (c_id,date_ser,cost,detail,remark,time) 
		VALUES('$c_id','".date_format_sql($date_ser)."','$cost','$detail','$remark','$time')";
		
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

		$sql_order = "UPDATE service SET date_ser = '".date_format_sql($date_ser)."',
		detail = '$detail',remark = '$remark',cost = '$cost',time='$time'
		  WHERE sv_id = $sv_id ";
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
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; เพิ่ม การซ่อมบำรุง</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
			<tr class="bmText_1">
   <td width="31%">ครั้งที่</td>
    <td width="69%"><div><input name="time" type="text" id="time" value="<? echo max_time($c_id);?>"  maxlength="3" size="10"/>
                 </div></td>
  </tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
   <td width="31%">วันที่ซ่อม</td>
    <td width="69%"><div><input name="date_ser" type="text" id="date_ser" value="<? if($rs[date_ser] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_ser]);?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_ser','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
    <td>จำนวนเงิน</td>
    <td><div><input name="cost" type="text"  ></div></td>
  </tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
   <td>รายการ</td>
    <td><div><textarea rows="5" cols="40" name="detail"  ><?=$detail?></textarea></div></td>
  </tr>

  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
   <td>หมายเหตุ</td>
    <td><div><textarea rows="5" cols="40" name="remark"  ><?=$remark?></textarea></div></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr><td colspan="4" align="center" height="35">
    <input   type="submit" name="Go" value=" บันทึก " onClick="return godel_a();"  class="buttom"> &nbsp;&nbsp;
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
<? }elseif($tab=='edit'){
$sql = "SELECT * FROM service WHERE sv_id= $sv_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
echo $rs[o_name]."<br>";
?>
<input type="hidden" name="sv_id" value="<?=$sv_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; แก้ไข การซ่อมบำรุง</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
 <tr class="bmText_1">
   <td width="31%">ครั้งที่</td>
    <td width="69%"><div><input name="time" type="text" id="time" value="<? echo $rs["time"];?>" maxlength="3"  size="10"/>
                 </div></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			   <tr class="bmText_1">
   <td width="31%">วันที่ซ่อม</td>
    <td width="69%"><div><input name="date_ser" type="text" id="date_ser" value="<? if($rs[date_ser] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_ser]);?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_ser','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
    <td>จำนวนเงิน</td>
    <td><div><input name="cost" type="text" value="<?=$rs[cost]?>"  onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}"></div></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
   <td>รายการ</td>
    <td><div><textarea rows="5" cols="40" name="detail"  ><?=$rs[detail]?></textarea></div></td>
  </tr>
  
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
   <td>หมายเหตุ</td>
    <td><div><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
  </tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr><td colspan="4" align="center" height="35">
    <input   type="submit" name="Go1" value=" บันทึก " onClick="return godel();"   class="buttom"> &nbsp;&nbsp;
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
function godel_a()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

function godel()
{
	if (confirm("คุณต้องการแก้ไขข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>

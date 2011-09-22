<?
include('config.inc.php');

if($Go <> ''){

		$sql_order = "INSERT INTO vacation (v_id,date_begin,date_end,num,leave_type,note) 
		VALUES('$v_id','".date_format_sql($date_begin)."','".date_format_sql($date_end)."','$num','$leave_type','$note')";
		
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

		$sql_order = "UPDATE vacation SET date_begin = '".date_format_sql($date_begin)."',
		date_end = '".date_format_sql($date_end)."',num = '$num',leave_type = '$leave_type',note = '$note'
		  WHERE v_id = $v_id ";
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

<style type="text/css">
<!--
.style9 {font-family: Tahoma; font-size: 14px; }
-->
</style>
<body>

<form action="" method="post" name="f22" >
<? if($tab=='add'){?>
<br>
<input type="hidden" name="user_id" value="<?=$user_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td height="162"  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; เพิ่ม ข้อมุลการฝึกอบรม</td>
  			</tr>
			<tr>
			<td height="130"><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
			<tr class="bmText_1">
   <td width="31%"><span class="style9">ช่วงวันที่ฝึก</span></td>
    <td width="69%"><div>
      <input name="duration" type="text" id="duration" value="" size="40" maxlength="100" />
    </div></td>
  </tr>
  <tr class="bmText_1">
    <td><span class="style9">สถานที่</span></td>
    <td><div><input name="place" type="text" id="place"  size="40">
    </div></td>
  </tr>
  <tr class="bmText_1">
   <td><span class="style6 style17">วุฒิที่ได้รับ</span></td>
    <td><div><span class="style9">
      <input name="qualification" type="text" id="qualification" size="40" maxlength="255" />
    </span></div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><!--clsControlObject('f','write'); id="btnSub"  -->
    <input   type="submit" name="Go" value=" บันทึก " onClick="return godel_a();" > &nbsp;&nbsp;
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
$sql = "SELECT * FROM vacation WHERE v_id= $v_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
echo $rs[leave_type]."<br>";
?>
<input name="t_id" type="hidden" id="t_id" value="<?=$t_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td height="161"  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; แก้ไข ข้อมูลการฝึกอบรม</td>
  			</tr>
			<tr>
			<td height="129"><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
 <tr class="bmText_1">
   <td width="31%"><span class="style9">ช่วงวันที่ฝึก</span></td>
    <td width="69%"><div>
      <input name="duration" type="text" id="duration" value="<?=$rs[duration]?>" size="40" maxlength="100" />
    </div></td>
  </tr>
  <tr class="bmText_1">
    <td><span class="style9">สถานที่</span></td>
    <td><div>
      <input name="place" type="text" id="place" value="<?=$rs[place]?>"  size="40">
    </div></td>
  </tr>
  <tr class="bmText_1">
   <td><span class="style6 style17">วุฒิที่ได้รับ</span></td>
    <td><div>
      <input name="qualification" type="text" id="qualification" value="<?=$rs[qualification]?>"  size="40">
    </div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><!--clsControlObject('f','write'); id="btnSub"  -->
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

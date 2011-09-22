<?
include('config.inc.php');

if($Go <> ''){

		$sql = "INSERT INTO children (user_id,name,birthday,lyceum,office,remark) 
		VALUES('$user_id','$name','".date_format_sql($birthday)."','$lyceum','$office','$remark')";
		
		echo $sql."<br>";
		$result= mysql_query($sql);
		
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>   

		<?
}

if($Go_1 <> ''){

		$sql_order = "UPDATE children SET name = '$name', birthday = '".date_format_sql($birthday)."' ,
		lyceum = '$lyceum', office = '$office' ,remark ='$remark'  where cd_id ='$cd_id' ";
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
<script language="JavaScript" src="calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<style type="text/css">
<!--
.style2 {
	font-size: 12;
	font-family: Tahoma;
}
.style5 {font-size: 12px; font-family: Tahoma; }
.style6 {font-family: Tahoma}
-->
</style>
<body>

<form action="" method="post" name="f22" >
<br><center>
<font face="MS Sans Serif" color="red"><span style="font-size:11pt;" >* ใส่เครื่องหมาย < dd > เพื่อย่อหน้าใหม่ < br > เพื่อนขึ้นบันทัดใหม่</span></font>
</center>
<? if($action=='add'){?>
<br>
<input type="hidden" name="user_id" value="<?=$user_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; เพิ่ม ข้อมูลบุตร</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
			<tr class="tbETitle_1">
   <td width="33%" ><span class="style5">ชื่อ - สกุล</span></td>
    <td width="67%"><div class="style2"><input name="name" type="text"  size="30" />
                  &nbsp; </div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="33%"><span class="style5">วัน เดือน ปีเกิด</span></td>
    <td width="67%"><div class="style6"><input name="birthday" type="text" id="birthday" 
	value="<? echo date("d/m/Y");?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('birthday','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">สถานศึกษา / ที่ทำงาน</span></td>
    <td><div class="style6" >
		<input name="office" type="text"  size="35" />

		</div></td>
  </tr>

  <tr class="tbETitle_1">
   <td><span class="style5">หมายเหตุ</span></td>
    <td><div class="style6"><textarea rows="5" cols="40" name="remark"  ><?=$remark?></textarea></div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><span class="style6">
    <input   type="submit" name="Go" value=" บันทึก " onClick="return godel();" >
&nbsp;&nbsp;
  </span></td>
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
<? }elseif($action=='edit'){?>
<?
$sql = "SELECT * FROM children WHERE cd_id= $cd_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?><br>
<input type="hidden" name="cd_id" value="<?=$cd_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; แก้ไข ข้อมูลบุตร</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
			<tr class="tbETitle_1">
   <td width="32%" ><span class="style5">ชื่อ - สกุล</span></td>
    <td width="68%"><div class="style2"><input name="name" type="text"  size="30"  value="<?=$rs[name]?>"/>
                  &nbsp; </div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="32%"><span class="style5">วัน เดือน ปีเกิด</span></td>
    <td width="68%"><div class="style6"><input name="birthday" type="text" id="birthday" value="<? if($rs[birthday] =='') echo date("d/m/Y") ;else echo date_format_th($rs[birthday]);?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('birthday','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">สถานศึกษา / ที่ทำงาน</span></td>
    <td><div class="style6" >
		<input name="office" type="text"  size="35" value="<?=$rs[office]?>" />
		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">หมายเหตุ</span></td>
    <td><div class="style6"><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><span class="style6">
    <input   type="submit" name="Go_1" value=" บันทึก " onClick="return godel_1();" >
&nbsp;&nbsp;
  </span></td>
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
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("คุณต้องการบันทึกข้อมูลที่แก้ไข ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>

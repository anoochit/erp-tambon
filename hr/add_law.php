<?
include('config.inc.php');

if($Go <> ''){

		$sql = "INSERT INTO law (user_id , date_add,ps_wrong_id, remark) 
		VALUES('$user_id' , '".date_format_sql($date_add)."' , '$ps_wrong_id' , '$remark' )";
		
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

		$sql_order = "UPDATE law SET date_add ='".date_format_sql($date_add)."' ,ps_wrong_id ='$ps_wrong_id' ,remark ='$remark' 
		where ll_id ='$ll_id' ";
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
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; เพิ่ม ข้อมูลบทลงโทษ</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
			<tr class="tbETitle_1">
   <td width="31%" class="style5" >&nbsp;วันที่</td>
    <td width="69%"><div class="style2"><input name="date_add" type="text" id="date_add" 
	value="<? echo date("d/m/Y");?>"  size="10"/>&nbsp;<img src="images/calendar.png" onClick="showCalendar('date_add','DD/MM/YYYY')"   width='19'  height='19'>
                  </div></td>
  </tr>
  
  <tr class="tbETitle_1">
   <td><span class="style5">&nbsp;บทลงโทษ</span></td>
    <td><div class="style6" >
		<?
			$query="select *  from ps_wrong_ref order by ps_wrong_id ";
			$result=mysql_query($query);
			?>
            <select name="ps_wrong_id">
              <?
			while($d =mysql_fetch_array($result)){
				
	?>
              <option value="<? echo $d[ps_wrong_id];?>"
		<?
		if($ps_wrong_id == $d[ps_wrong_id] ) echo "selected";
		?>
		><? echo $d[ps_writem];?></option>
              <? }?>
            </select>

		</div></td>
  </tr><tr class="tbETitle_1">
   <td><span class="style5">&nbsp;หมายเหตุ</span></td>
    <td><div class="style6"><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
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
$sql = "SELECT * FROM law WHERE ll_id= $ll_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?><br>
<input type="hidden" name="m_id" value="<?=$m_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; แก้ไข ข้อมูลบทลงโทษ</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
			<tr class="tbETitle_1">
   <td width="31%" class="style5" >&nbsp;วันที่</td>
    <td width="69%"><div class="style2"><input name="date_add" type="text" id="date_add" 
	value="<? if($rs[date_add] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_add]);?>"  size="10"/>&nbsp; <img src="images/calendar.png" onClick="showCalendar('date_add','DD/MM/YYYY')"   width='19'  height='19'>
                  </div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">&nbsp;บทลงโทษ</span></td>
    <td><div class="style6" >
		<?
			$query="select *  from ps_wrong_ref order by ps_wrong_id ";
			$result=mysql_query($query);
			?>
            <select name="ps_wrong_id">
              <?
			while($d =mysql_fetch_array($result)){
				
	?>
              <option value="<? echo $d[ps_wrong_id];?>"
		<?
		if($rs[ps_wrong_id] == $d[ps_wrong_id] ) echo "selected";
		?>
		><? echo $d[ps_writem];?></option>
              <? }?>
            </select>

		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">&nbsp;หมายเหตุ</span></td>
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

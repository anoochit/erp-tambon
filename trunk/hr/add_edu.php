<?
include('config.inc.php');

if($Go <> ''){
				
		
		$sql = "INSERT INTO education (user_id,academy,grade,year,remark,ps_edu_id,land) 
		VALUES('$user_id','$academy','$grade','$year','$remark' ,'$ps_edu_id','$land')";
		
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

		$sql_order = "UPDATE education SET academy = '$academy', 
		grade = '$grade', year = '$year' ,remark ='$remark' ,ps_edu_id = '$ps_edu_id',land ='$land'
		 where e_id ='$e_id' ";
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
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; เพิ่ม ข้อมูลการศึกษา</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
			<tr class="tbETitle_1">
   <td><span class="style5">ระดับการศึกษา </span></td>
    <td><div class="style6" >
		<?
			$query="select *  from ps_edu_ref order by ps_edu_id ";
			$result=mysql_query($query);
			?>
            <select name="ps_edu_id">
              <?
			while($d =mysql_fetch_array($result)){
				
	?>
              <option value="<? echo $d[ps_edu_id];?>"
		<?
		if($ps_edu_id == $d[ps_edu_id] ) echo "selected";
		?>
		><? echo $d[ps_edu_item];?></option>
              <? }?>
            </select>

		</div></td>
  </tr>
			
<tr class="tbETitle_1">
   <td><span class="style5">วุฒิที่ได้รับ </span></td>
    <td><div class="style6" >
		<input name="grade" type="text"  size="35" value="<?=$rs[grade]?>" />

		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="32%" ><span class="style5">สถาบัน</span></td>
    <td width="68%"><div class="style2"><input name="academy" type="text"  size="35"  value="<?=$rs[academy]?>"/>
                  &nbsp; </div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">ปีที่สำเร็จ</span></td>
    <td><div class="style6" >
		<input name="year" type="text"  size="35" value="<?=$rs[year]?>" />

		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">ประเทศ</span></td>
    <td><div class="style6" >
		<input name="land" type="text"  size="35" value="<?
		if($rs[land] =='') echo "ไทย";
		else echo  $rs[land];?>" />

		</div></td>
  </tr>

  <tr class="tbETitle_1">
   <td><span class="style5">หมายเหตุ</span></td>
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

$sql = "SELECT * FROM education WHERE e_id= $e_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?>
<input type="hidden" name="e_id" value="<?=$e_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; แก้ไข ข้อมูลการศึกษา</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
			<tr class="tbETitle_1">
   <td><span class="style5">ระดับการศึกษา </span></td>
    <td><div class="style6" >
		<?
			$query="select *  from ps_edu_ref order by ps_edu_id ";
			$result=mysql_query($query);
			?>
            <select name="ps_edu_id">
              <?
			while($d =mysql_fetch_array($result)){
				
	?>
              <option value="<? echo $d[ps_edu_id];?>"
		<?
		if($rs[ps_edu_id] == $d[ps_edu_id] ) echo "selected";
		?>
		><? echo $d[ps_edu_item];?></option>
              <? }?>
            </select>

		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">สาขา</span></td>
    <td><div class="style6" >
		<input name="grade" type="text"  size="35" value="<?=$rs[grade]?>" />

		</div></td>
  </tr>
			<tr class="tbETitle_1">
   <td width="32%" ><span class="style5">สถาบัน</span></td>
    <td width="68%"><div class="style2"><input name="academy" type="text"  size="35"  value="<?=$rs[academy]?>"/>
                  &nbsp; </div></td>
  </tr>

  <tr class="tbETitle_1">
   <td><span class="style5">ปีที่สำเร็จ</span></td>
    <td><div class="style6" >
		<input name="year" type="text"  size="35" value="<?=$rs[year]?>" />

		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">ประเทศ</span></td>
    <td><div class="style6" >
		<input name="land" type="text"  size="35" value="<?
		if($rs[land] =='') echo "ไทย";
		else echo  $rs[land];?>" />

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
<br>
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

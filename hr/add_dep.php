<?
include('config.inc.php');

if($Go <> ''){

		$sql = "INSERT INTO dep_sec (user_id , date_begin , date_end , remark) 
		VALUES('$user_id' , '".date_format_sql($date_begin)."' , '".date_format_sql($date_end)."' , '$remark' )";
		
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

		$sql_order = "UPDATE dep_sec SET date_begin ='".date_format_sql($date_begin)."' , date_end ='".date_format_sql($date_end)."' ,remark ='$remark' 
		where d_id ='$d_id' ";
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
<font face="MS Sans Serif" color="red"><span style="font-size:11pt;" >* �������ͧ���� < dd > �������˹������ < br > ���͹��鹺ѹ�Ѵ����</span></font>
</center>
<? if($action=='add'){?>
<br>
<input type="hidden" name="user_id" value="<?=$user_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; ���� �����š�û�Ժѵ��Ҫ����顮��¡���֡</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
			<tr class="tbETitle_1">
   <td width="31%" class="style5" >&nbsp;�ѹ���</td>
    <td width="69%"><div class="style2"><input name="date_begin" type="text" id="date_begin" 
	value="<? echo date("d/m/Y");?>"  size="10"/>&nbsp;<img src="images/calendar.png" onClick="showCalendar('date_begin','DD/MM/YYYY')"   width='19'  height='19'>
                  </div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="31%" class="style5" >&nbsp;�֧�ѹ���</td>
    <td width="69%"><div class="style2"><input name="date_end" type="text" id="date_end" 
	value="<? echo date("d/m/Y");?>"  size="10"/>&nbsp;<img src="images/calendar.png" onClick="showCalendar('date_end','DD/MM/YYYY')"   width='19'  height='19'>
                  </div></td>
  </tr><tr class="tbETitle_1">
   <td><span class="style5">&nbsp;�����˵�</span></td>
    <td><div class="style6"><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><span class="style6">
    <input   type="submit" name="Go" value=" �ѹ�֡ " onClick="return godel();" >
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
$sql = "SELECT * FROM dep_sec WHERE d_id= $d_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?><br>
<input type="hidden" name="d_id" value="<?=$d_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; ��� �����š�û�Ժѵ��Ҫ����顮��¡���֡</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
			<tr class="tbETitle_1">
   <td width="31%" class="style5" >&nbsp;�ѹ���</td>
    <td width="69%"><div class="style2"><input name="date_begin" type="text" id="date_begin" 
	value="<? if($rs[date_begin] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_begin]);?>"  size="10"/>&nbsp; <img src="images/calendar.png" onClick="showCalendar('date_begin','DD/MM/YYYY')"   width='19'  height='19'>
                  </div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="31%" class="style5" >&nbsp;�֧�ѹ���</td>
    <td width="69%"><div class="style2"><input name="date_end" type="text" id="date_end" 
	value="<? if($rs[date_end] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_end]);?>"  size="10"/>&nbsp; <img src="images/calendar.png" onClick="showCalendar('date_end','DD/MM/YYYY')"   width='19'  height='19'>
                  </div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">&nbsp;�����˵�</span></td>
    <td><div class="style6"><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><span class="style6">
    <input   type="submit" name="Go_1" value=" �ѹ�֡ " onClick="return godel_1();" >
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
	if (confirm("�س��ͧ��úѹ�֡������ ���������"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("�س��ͧ��úѹ�֡�����ŷ����� ���������"))
	{
		return true;
	}
		return false;
}

</script>
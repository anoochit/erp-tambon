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
    <td height="198"  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; ���� �����źص�</td>
  			</tr>
			<tr>
			<td height="166"><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
			<tr class="bmText_1">
   <td width="31%"><span class="style9">����-ʡ��</span></td>
    <td width="69%"><div>
      <input name="name" type="text" id="name" value="" size="50" maxlength="100" />
    </div></td>
  </tr>
  <tr class="bmText_1">
   <td width="31%"><span class="style9">�ѹ�Դ</span></td>
    <td width="69%"><div><input name="birthday" type="text" id="birthday" value="<? if($rs[birthday] =='') echo date("d/m/Y") ;else echo date_format_th($rs[birthday]);?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('birthday','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr class="bmText_1">
    <td><span class="style9">ʶҹ�֡��</span></td>
    <td><div><input name="lyceum" type="text" id="lyceum"  size="40">
    </div></td>
  </tr>
  <tr class="bmText_1">
   <td><span class="style9">���ӧҹ</span></td>
    <td><div>
      <input name="office" type="text" id="office"  size="40">
    </div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35">
    <input   type="submit" name="Go" value=" �ѹ�֡ " onClick="return godel_a();" > &nbsp;&nbsp;
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
<input name="cd_id" type="hidden" id="cd_id" value="<?=$cd_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td height="200"  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; ��� �����źص�</td>
  			</tr>
			<tr>
			<td height="168"><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
 <tr class="bmText_1">
   <td width="31%"><span class="style9">����-ʡ��</span></td>
    <td width="69%"><div>
      <input name="name" type="text" id="name" value="<?=$rs[name]?>" size="50" maxlength="100" />
    </div></td>
  </tr>
			   <tr class="bmText_1">
   <td width="31%"><span class="style9">�ѹ�Դ</span></td>
    <td width="69%"><div><input name="birthday" type="text" id="birthday" value="<? if($rs[birthday] =='') echo date("d/m/Y") ;else echo date_format_th($rs[birthday]);?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('birthday','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr class="bmText_1">
    <td><span class="style9">ʶҹ�֡��</span></td>
    <td><div>
      <input name="lyceum" type="text" id="lyceum" value="<?=$rs[lyceum]?>"  size="40">
    </div></td>
  </tr>
  <tr class="bmText_1">
   <td><span class="style9">���ӧҹ</span></td>
    <td><div>
      <input name="office" type="text" id="office" value="<?=$rs[office]?>"  size="40">
    </div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><!--clsControlObject('f','write'); id="btnSub"  -->
    <input   type="submit" name="Go1" value=" �ѹ�֡ " onClick="return godel();" > &nbsp;&nbsp;
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
	if (confirm("�س��ͧ��úѹ�֡������ ���������"))
	{
		return true;
	}
		return false;
}

function godel()
{
	if (confirm("�س��ͧ�����䢢����� ���������"))
	{
		return true;
	}
		return false;
}

</script>
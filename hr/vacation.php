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
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; ���� �����š���� </td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
			<tr class="bmText_1">
   <td width="31%"><span class="style9">�ѹ��������</span></td>
    <td width="69%"><div>
      <input name="date_begin" type="text" id="date_begin" value="<? if($rs[date_begin] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_begin]);?>"  size="10"/>
&nbsp; <img src="images/calendar.png" onClick="showCalendar('date_begin','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr class="bmText_1">
   <td width="31%"><span class="style9">�֧�ѹ���</span></td>
    <td width="69%"><div><input name="date_end" type="text" id="date_end" value="<? if($rs[date_end] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_end]);?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_end','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr class="bmText_1">
    <td>�ӹǹ�ѹ��</td>
    <td><div><input name="num" type="text"  size="10">
    </div></td>
  </tr>
  <tr class="bmText_1">
   <td>�����������</td>
    <td><div>
      <select name="leave_type">
        <option value='0' <? if($leave_type ==0) echo "selected"?>>----------��س����͡----------</option>
        <option value='�һ���' <? if($leave_type =='�һ���') echo "selected"?>>�һ���</option>
        <option value='�ҡԨ' <? if($leave_type =='�ҡԨ') echo "selected"?>>�ҡԨ</option>
        <option value='�Ҿѡ��͹' <? if($leave_type =='�Ҿѡ��͹') echo "selected"?>>�Ҿѡ��͹</option>
        <option value='�Ҥ�ʹ' <? if($leave_type =='�Ҥ�ʹ') echo "selected"?>>�Ҥ�ʹ</option>
        <option value='���ػ����' <? if($leave_type =='���ػ����') echo "selected"?>>���ػ����</option>
      </select>
    </div></td>
  </tr>
  <tr class="bmText_1">
   <td>�����˵�</td>
    <td><div><textarea rows="5" cols="40" name="note"  ><?=$note?></textarea></div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><!--clsControlObject('f','write'); id="btnSub"  -->
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
<input type="hidden" name="v_id" value="<?=$v_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; ��� �����š���� </td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
 <tr class="bmText_1">
   <td width="31%"><span class="style9">�ѹ��������</span></td>
    <td width="69%"><div>
      <input name="date_begin" type="text" id="date_begin" value="<? if($rs[date_begin] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_begin]);?>"  size="10"/>
&nbsp; <img src="images/calendar.png" onClick="showCalendar('date_begin','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
			   <tr class="bmText_1">
   <td width="31%"><span class="style9">�֧�ѹ���</span></td>
    <td width="69%"><div><input name="date_end" type="text" id="date_end" value="<? if($rs[date_end] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_end]);?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_end','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr class="bmText_1">
    <td><span class="style9">�ӹǹ�ѹ��</span></td>
    <td><div><input name="num" type="text" id="num" value="<?=$rs[num]?>" size="10">
    </div></td>
  </tr>
  <tr class="bmText_1">
   <td><span class="style9">�����������</span></td>
    <td><div>
      <select name="leave_type">
        <option value='0' <? if($leave_type ==0) echo "selected"?>>----------��س����͡----------</option>
        <option value='�һ���' <? if($leave_type =='�һ���') echo "selected"?>>�һ���</option>
        <option value='�ҡԨ' <? if($leave_type =='�ҡԨ') echo "selected"?>>�ҡԨ</option>
        <option value='�Ҿѡ��͹' <? if($leave_type =='�Ҿѡ��͹') echo "selected"?>>�Ҿѡ��͹</option>
        <option value='�Ҥ�ʹ' <? if($leave_type =='�Ҥ�ʹ') echo "selected"?>>�Ҥ�ʹ</option>
        <option value='���ػ����' <? if($leave_type =='���ػ����') echo "selected"?>>���ػ����</option>
      </select>
    </div></td>
  </tr>
  <tr class="bmText_1">
   <td><span class="style9">�����˵�</span></td>
    <td><div><textarea name="note" cols="40" rows="5" id="note"  ><?=$rs[note]?></textarea>
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
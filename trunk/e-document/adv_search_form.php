<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript">
// ����� XmlHttp Object
function uzXmlHttp(){
var xmlhttp = false;
try{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
try{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}catch(e){
xmlhttp = false;
}
}

if(!xmlhttp && document.createElement){
xmlhttp = new XMLHttpRequest();
}
return xmlhttp;
}
// End XmlHttp Object
</script>

<script language="JavaScript" type="text/javascript">
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

//dochange �ж١���¡������ա�����͡ ��¡�� Combobox ��觨з��������¡ AJAX ������ͧ�͢����ŶѴ仨ҡ Server
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //�Ѻ��ҡ�Ѻ��
               } 
          }
     };
     req.open("GET", "temp.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}
</script>
<center>
<table name="body" width="657" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td>&nbsp;<a href="index.php">[˹���á]</a>
	</td>
</tr>
</table>
<form name="search" action="index.php" method="post">
<input type="hidden" name="action" value="search">
<input type="hidden" name="advance_search" value="yes">
<b><font>��ä���Ẻ�����´</font></b><br><br>
<table width="500" name="ad_se_border" cellpadding="0" cellspacing="0">
	<tr>
		<td  style="border: #B4B4B4 1px solid;" background="images/bg_1.gif">
<table border="0" width="600" name="ad_se" cellpadding="0" cellspacing="0">
<tr>
		<td width="150" bgcolor=""><div>�������͡��� </div>
		</td>
		<td bgcolor=""><div>
<select name="type_doc" >
	<option value="�Ѻ���"<? if($type_doc == '' or $type_doc == '�Ѻ���' ) echo "selected"?>>�Ѻ��� </option>
	<option value="����"<? if($type_doc == '����' ) echo "selected"?>>���� </option>
	<option value="���͡"<? if($type_doc == '���͡' ) echo "selected"?>>���͡</option>
	<option value="�����"<? if($type_doc == '�����' ) echo "selected"?>>�����</option>
	</select>
		</div>
		</td>
	</tr>
	<tr>
		<td width="150" bgcolor=""><div>�ͧ</div>
		</td>
		<td bgcolor=""><div>
		<select name="sdep_id" onChange="dochange('scat_id', this.value)" >
		<option value="">--��س����͡--</option>
		<?
		$sql= "SELECT * FROM department ORDER BY dep_name";
		$result = mysql_query($sql);
		while($rs = mysql_fetch_array($result)){
			echo "<option value='".$rs["dep_id"] ."' ";
			if($_REQUEST["sdep_id"] == $rs["dep_id"]){
				echo "selected";
			}
			echo ">".$rs["dep_name"]."</option>";
		}
		?>
		</select>
		</div>
		</td>
	</tr>
	<tr>
		<td width="150" bgcolor=""><div>ŧ�ѹ���</div>
		</td>
		<td bgcolor=""><div>
		<input type="text" name="start_date" value="<?echo $_REQUEST["start_date"]?>" size="10"  id="start_date">
		<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('start_date','DD/MM/YYYY');">
		 �֧ 
		<input type="text" name="end_date" value="<?echo $_REQUEST["end_date"]?>"  size="10"  id="end_date">
		<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('end_date','DD/MM/YYYY');">
		</div>
		</td>
	</tr>
	<tr>
		<td width="150" bgcolor=""><div>�ѹ����Ѻ</div>
		</td>
		<td bgcolor=""><div>
		<input type="text" name="recieve_date_start" value="<?echo $_REQUEST["recieve_date_start"]?>" size="10"  id="recieve_date_start">
		<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('recieve_date_start','DD/MM/YYYY');">
		 �֧ 
		<input type="text" name="recieve_date_end" value="<? echo $_REQUEST["recieve_date_end"]?>" size="10" id="recieve_date_end">
		<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('recieve_date_end','DD/MM/YYYY');">
		</div>
		</td>
	</tr>
	<tr>
		<td width="150" bgcolor=""><div>�ѹ�������ش</div>
		</td>
		<td bgcolor=""><div>
		<input type="text" name="finish_date_start" value="<? echo $_REQUEST["finish_date_start"]?>" size="10"  id="finish_date_start" >
		<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('finish_date_start','DD/MM/YYYY');">
		 �֧ 
		<input type="text" name="finish_date_end" value="<? echo $_REQUEST["finish_date_end"]?>" size="10"  id="finish_date_end">
		<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('finish_date_end','DD/MM/YYYY');">
		</div>
		</td>
	</tr>
	<tr>
		<td width="150" bgcolor=""><div>����ͧ</div>
		</td>
		<td bgcolor=""><div>
		<input type="text" name="key" value="<? if($_REQUEST["key"] != ""){echo $_REQUEST["key"];} ?>" size="50">
		</div>
		</td>
	</tr>
	<tr>
		<td width="150" bgcolor=""><div>�Ţ����͡���</div>
		</td>
		<td bgcolor=""><div>
		<input type="text" name="doc_id" value="<? if($_REQUEST["doc_id"] != ""){echo $_REQUEST["doc_id"];} ?>" size="50">
		</div>
		</td>
	</tr>
	<tr>
		<td width="150" bgcolor=""><div>�Ţ����Ѻ�͡���</div>
		</td>
		<td bgcolor=""><div>
		<input type="text" name="receive_id" value="<? if($_REQUEST["receive_id"] != ""){echo $_REQUEST["receive_id"];} ?>" size="50">
		</div>
		</td>
	</tr>
	<tr>
		<td width="150" bgcolor=""><div>�ҡ˹��§ҹ</div>
		</td>
		<td bgcolor=""><div>
		<input type="text" name="dep_ref" value="<?if($_REQUEST["dep_ref"] != ""){echo $_REQUEST["dep_ref"];} ?>" size="50">
		</div>
		</td>
	</tr>
	<tr>
		<td width="150" bgcolor=""><div>���§���</div>
		</td>
		<td bgcolor=""><div>
		<select name="orderby" >
		<option value="" <? if($orderby == '') echo "selected"?>>--��س����͡--</option>
		<option value="doc_id" <? if($orderby == 'doc_id') echo "selected"?>>�Ţ����͡���</option>
		<option value="receive_id" <? if($orderby == 'receive_id') echo "selected"?>>�Ţ����Ѻ�͡���</option>
		<option value="dep_id" <? if($orderby == 'dep_id') echo "selected"?>>�ͧ</option>
		<option value="cat_id" <? if($orderby == 'cat_id') echo "selected"?>>����ҹ</option>
		<option value="topic" <? if($orderby == 'topic') echo "selected"?>>����ͧ</option>
		<option value="put_date_on" <? if($orderby == 'put_date_on') echo "selected"?>>�ѹ���ŧ</option>
		<option value="recieve_date" <? if($orderby == 'recieve_date') echo "selected"?>>�ѹ����Ѻ</option>
		<option value="finish_date" <? if($orderby == 'finish_date') echo "selected"?>>�ѹ�������ش</option>
		<option value="dep_ref" <? if($orderby == 'dep_ref') echo "selected"?>>˹��§ҹ</option>
		</select>
		</div>
		</td>
	</tr>
	<tr>
		<td width="150" bgcolor=""><div>ʶҹ�</div>
		</td>
		<td bgcolor=""><div>
		<select name="status">
	<option  value="����" <? if($status == '����' or $status == '' ) echo "selected"?>>����</option>
	<option value="¡��ԡ" <? if($status == '¡��ԡ' ) echo "selected"?>>¡��ԡ</option>
	</select>
		</div>
		</td>
	</tr>
</table>
</td>
</tr>
</table><br />
<input type="submit" name="go_search" value="&nbsp; ���� &nbsp;">
<form>
</center><br />
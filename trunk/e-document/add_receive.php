<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style.css" rel="stylesheet" type="text/css">

<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">

<tr>
	<td width="657" valign="top">
	<form name="search" method="post">
<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" background="images/bg_1.gif">
	<tr>

		<td background="images/bar.gif"  align="left" height="25"  colspan="4">
		  <strong>&nbsp;&nbsp;&nbsp;��§ҹŧ�Ѻ����</strong> </td>
	</tr>
	<tr>
	<td colspan="4" height="30"><div align="center"><strong>���� </strong></div></td>
	</tr>
	<tr>
	<td width="14%"  height="30" >&nbsp;</td>
	<td colspan="2" align="center"><div align="right"><strong>˹��§ҹ </strong></div></td>
<td width="52%">
  <div align="left">
    <select name="dep">	
      <option value="all" <? if($dep== 'all' ) echo "selected"?>>������</option>
      <?
	$sql_user = "SELECT * FROM user_account WHERE username !='demo' and  username !='admin' 
	 and  dep_id !='all'  ORDER BY dep_id";
	$result = mysql_query($sql_user);
	$i = 0;
	while($rs1 = mysql_fetch_array($result)){
	$i++;
?>	
      <option value="<?=$rs1["user_id"]?>" <? if($dep ==$rs1["user_id"] ) echo "selected"?>>
        <? 
	if(strstr($rs1["firsname"],"���˹��") ==true){
		echo substr($rs1["firsname"],7);
	}else{
		echo $rs1["firsname"];
	}
		?>
        </option>
      <? }?>
    </select>
  </div></td>
	</tr>
	<tr>
	<td width="14%"  height="30" >&nbsp;</td>
	<td colspan="2" align="center"><div align="right"><strong>�ѹ��� </strong></div></td>
<td width="52%">
  <div align="left">
    <input type="text" name="recieve_date" value="<?  if($recieve_date =='') echo date('d/m/Y') ; else echo $recieve_date?>" size="10" maxlength="100"  id="recieve_date"> 
    <IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('recieve_date','DD/MM/YYYY');"></div></td>
	</tr>
		<tr >
	<td colspan="4" height="30" align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search" value=" ���� "> </td>
	</tr>
</table>
</form>
<br>
	<? if($search <> ''){?>
	<table cellpadding="0" cellspacing="0" border="0"  >
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="124"> �ͧ����Ѻ�Դ�ͺ	</td>
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="67"> �Ţ���		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="77">���	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="89"> �ѹ����Ѻ		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td  background="images/bar.gif" align="center" height="25" width="151"> ����ͧ		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="93">��������´	</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="72">�ҡ	</td>	
	</tr>
<?
include("day_func.php");
$sql = "SELECT d.doc_id,d.topic,d.put_date_on,d.recieve_date,d.finish_date,d.file_id,d.warning,d.receive_id ,u.dep_id,s.send_date,s.stamp_date,s.send_id,d.rep_from,d.dep_ref
FROM documentary d, send_doc s,user_account u
Where d.file_id = s.file_id
and s.send_id = u.user_id
 ";
if($dep <>'all'){
	$sql  .="and s.send_id = ".$dep ; 
}
if($recieve_date <>''){
	$sql  .=" and s.stamp_date  = '".date_format_sql($recieve_date)."'" ; 
}
$sql  .= "  and (s.status = 'ŧ�Ѻ����' or s.status = '���Թ�������' )
group by s.file_id,s.send_id
ORDER BY s.stamp_date DESC ";
$result = mysql_query($sql);
$x = 1;
while($rs=mysql_fetch_array($result)){

if($rs["finish_date"] != ""){

	$start_date = date_format_th($rs["put_date_on"]);
	$finish_date = date_format_th($rs["finish_date"]);
	$date_long = count_day($start_date,$finish_date);
	$green_date = green_day($finish_date,$date_long);
	$orange_date = orange_day($finish_date,$date_long);
	$red_date = red_day($finish_date,$date_long);
	$cur_date =  DATE('d/m/Y');
	if(trim($rs["warning"]) == "no"){ // ����ѹ����ش
			$color = "#FFFFFF";
	}else	if(date_diff($cur_date,$finish_date) > 0 && trim($rs["warning"]) == "yes"){ // ����ѹ����ش // ᴧ
			$color = "#FF9191";
	}elseif(date_diff($cur_date,$finish_date) <=0 && date_diff($cur_date,$red_date) > 0 && trim($rs["warning"]) == "yes"){   //���
			$color = "#FFD6C1";
	}elseif( date_diff($cur_date,$red_date) <= 0  && date_diff($cur_date,$green_date)  > 0  && trim($rs["warning"]) == "yes"){  //����ͧ
			$color = "#FFFFAA";
	}elseif(date_diff($cur_date,$green_date) <=0 && date_diff($cur_date,$start_date) >= 0  && trim($rs["warning"]) == "yes"){  // �ѹ����
			$color = "#B0FFB0";
	}else {
		$color = "#FFFFFF";
	}
}else {
		$color = "#FFFFFF";
}
?>
<a href="index.php?action=view&file_id=<?echo $rs["file_id"]?>"   target="_blank">
<tr  class="" bgcolor="<? echo $color?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
  <td align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="124">&nbsp; <? echo $rs["dep_id"]?>		</td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="67">&nbsp; <? echo $rs["receive_id"]?>		</td>
		  <td align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="77">&nbsp; <? echo $rs["doc_id"]?> </td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="center" height="25" width="89">&nbsp; <? echo date_format_th($rs["recieve_date"])?></td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="left" height="25" width="151">&nbsp; <? echo $rs[topic];?>	</td>
		  <td  align="center" height="25" width="1">		</td>
		  <td  align="left" height="25" width="93">&nbsp; <? remark($rs["file_id"]); ?></td>
		  <td  align="center" height="25" width="1">		</td>
		  <td align="center" height="25" width="72">&nbsp; <? echo $rs["dep_ref"]?>		</td>
	  </tr></a><? $x = $x +1; }?>
	<tr><td colspan="20" align="center" height="30">
	<input type="submit" name="print" value=" ����� "  onclick="window.open('add_receive_print.php?dep=<?=$dep?>&recieve_date=<?=$recieve_date?>')">
	</td> </tr>
    </table>
<? }?>
</td>
</tr>
</table>
</center>
<?
function remark($file_id){
	$sql1 ="select * from send_doc where file_id = $file_id group by id ";
	$result = mysql_query($sql1);
	while($rs = mysql_fetch_array($result)){
	
		if( $rs[remark] <>'' or $rs[remark] <> NULL){
			echo find_depart_name($rs[send_id])."    ".$rs[remark]."<br>";
		}
	}
}

?>
	
<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
//-----------�ѹ�֡-------------------
if($save_add <>''){
				if($m_total1 == 0 ) $m_total1 = $m_total;
				$sql_3 = " replace into cancel_reg(CYEAR,MCODE,CMONTH,C_Date,RMK,c_status)
                 values ('" .MYEAR(). "','" .$mcode."', '" .date("m"). "','" .date_format_sql($C_Date). "' ,'" .$RMK. "','" .$c_status. "' ) ";
				$result_3=mysql_query($sql_3);
				$sql_4 = " UPDATE q_water  SET Status ='$status' ,m_total = '".$m_total1. "' 
				WHERE MCODE = '$mcode' ";
				$result_4=mysql_query($sql_4);
			?>
<script language="JavaScript">
				window.opener.location.reload();
				window.close();
			</script>     
			<?	
	}
?>
<script language="JavaScript" src="calendar.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="calendar-mos.css" rel="stylesheet" type="text/css">
<form name="add_mem"  method="post">
<?
//-----------�ʴ�������-------------------
			$sql=" Select  q.TMCODE,MCODE,q.mem_id,pren,name,surn,q.RDATE,HNO,MNO,HNO1,MOO,ROAD,
			SOI,q.HOCODE,TEL,status,m_total,LINE1,REGIEN,q.scode,honame,tmname,sname
			from q_water q,member m,house h,type_mem t ,service1 s
			where q.mem_id = m.mem_id and q.hocode = h.hocode and t.tmcode = q.tmcode and q.scode = s.scode
			and q.mcode = '" .$mcode. "'  
			order by MCODE ";
			$result=mysql_query($sql);
			$rs =mysql_fetch_array($result);
		?>
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
	<table width="100%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
		<tr bgcolor="#99CCFF" class="lgBar">				
    <td height="35"  colspan="4"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp; ¡��ԡ����¹�������ԡ��</div></td> 
	 </tr>
	 <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right" class="menuBar">�ѹ���¡��ԡ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;" colspan="3"><strong>&nbsp;
	<input name="C_Date" type="text" id="C_Date" value="<? if($C_Date =='') echo date("d/m/Y") ;else echo $C_Date;?>"  size="10" /class="text"  >
                  &nbsp; <img  src="images/calculator_add.png" onClick="showCalendar('C_Date','DD/MM/YYYY')" align="absmiddle"   />
    </strong></td>
	</tr>
	 <tr>
    <td width="385" class="lgBar"  style="border: #000000 1px solid;"><div align="right" class="menuBar">�����˵� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;" colspan="3"><strong>&nbsp;
<input name="RMK" type="text" id="RMK" value="<? echo $RMK ?>"  size="60" /class="text"  >
    </strong></td>
  </tr>
  <tr>
    <td width="385" height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�Ţ��Ш��ҵ��Ѵ��� :  </div></td>
    <td class="bmText_1"   colspan="3"style="border: #000000 1px solid;"><strong>&nbsp;
   <input type="text" name="MNO" value="<?=$rs[MNO]?>"  size="15" class="text"  disabled="disabled" />	  
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">���������ҹ :  </div></td>
    <td colspan="3" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<input type="text" name="honame" value="<?=$rs[honame]?>" size="30"class="text"  disabled="disabled"   />
    </strong></td>
  </tr>
    <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">ࢵ:  </div></td>
    <td colspan="3" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<? 
	$dd = explode("-",$rs[MCODE]);
	?>
	<input type="text" name="honame" value="<?=zone_name($rs[HOCODE],substr($dd[0], strlen($rs[HOCODE])))?>" size="30"class="text"   disabled="disabled"  />
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�Ţ����¹ :  </div></td>
    <td width="374" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<?
		$dd = explode("-",$mcode);
		$mcode_1 = $dd[0];
		$mcode_2 = $dd[1];
		?>
      <input type="text" name="mcode_1" value="<?=$mcode_1?>" size="3"  id="mcode_1" maxlength="2"  class="text"  disabled="disabled" /> - 
	   <input type="text" name="mcode_2" value="<?=$mcode_2?>" size="5"  id="mcode_2" class="text" disabled="disabled"   />
    </strong></td>
    <td width="233" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�ӹ�˹�Ҫ��� :  </div></td>
    <td width="273" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
<select name="pren" class="text"  disabled="disabled" >
	    <option value=""<? if($rs[pren] == "") echo "selected";?>>����к�</option>
		<option value="���"<? if($rs[pren] == "���") echo "selected";?>>���</option>
		<option value="�ҧ"<? if($rs[pren] == "�ҧ") echo "selected";?>>�ҧ</option>
		<option value="�ҧ���"<? if($rs[pren] == "�ҧ���") echo "selected";?>>�ҧ���</option>
   </select> 
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">���� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"  ><strong>&nbsp;
      <input type="text" name="name" value="<?=$rs[name]?>" size="25"  class="text"  disabled="disabled" />
 		<input  type="hidden" name="mem_id" value="<?=$mem_id?>"     />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;" ><div align="right">���ʡ�� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;" ><strong>&nbsp;
    <input type="text" name="surn" value="<?=$rs[surn]?>" size="15" class="text"  disabled="disabled"  />	  
    </strong></td>
  </tr>
  <tr>
    <td width="385" height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�������������ԡ�� :  </div></td>
    <td class="bmText_1"   colspan="3"style="border: #000000 1px solid;"><strong>&nbsp;
<select name="TMCODE" class="text"  disabled="disabled">	<?
			$query  ="select TMCODE,tmname from type_mem  order by TMCODE";
			//echo $query."666<br>";
			$result=mysql_query($query);
			while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[TMCODE];?>"
		<?
		if($rs[TMCODE] == $d[TMCODE]) echo "selected";
		?>
		><? echo $d[tmname];?></option>
	            <? }?>
	    </select>
    </strong></td>
  </tr>
  <tr >
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�ѹ�����Ѥ� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input name="RDATE" type="text" id="RDATE" value="<? echo date_format_th($rs[RDATE]) ?>"  size="10" /class="text"   disabled="disabled">
                  &nbsp; <img  src="images/calculator_add.png" onClick="showCalendar('RDATE','DD/MM/YYYY')" align="absmiddle"   />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">��ҹ�Ţ��� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
    <input type="text" name="HNO" value="<?=$rs[HNO]?>" size="3" class="text"  disabled="disabled"  /> / <input type="text" name="HNO1" value="<?=$rs[HNO1]?>" size="3"  class="text"  disabled="disabled" />
    </strong></td>
  </tr>
  <tr onMouseOut="document.getElementById('hint').innerHTML = '';">
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">������ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="MOO" value="<?=$rs[MOO]?>" size="15"  class="text"  disabled="disabled" />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">��� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
    <input type="text" name="SOI" value="<?=$rs[SOI]?>" size="15"class="text"   disabled="disabled"  />
    </strong></td>
  </tr>
  <tr onMouseOut="document.getElementById('hint').innerHTML = '';">
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">��� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
     <input type="text" name="ROAD" value="<?=$rs[ROAD]?>" size="15"  class="text" disabled="disabled"  />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">���Ѿ�� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="TEL" value="<?=$rs[TEL]?>" size="10" class="text"   disabled="disabled" />
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">ࢵ :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="REGIEN" value="<?=$rs[REGIEN]?>" size="15"  class="text"  disabled="disabled" />
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;"><div align="right">��¨Ѵ�� :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="LINE1" value="<?=$rs[LINE1]?>" size="15"  class="text"  disabled="disabled" />
    </strong></td>
  </tr>
    <tr>
    <td width="385" height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�ѵ�Ҥ������ҵù�� :  </div></td>
    <td class="bmText_1"   colspan="3"style="border: #000000 1px solid;"><strong>&nbsp;
<select name="scode" class="text" disabled="disabled"  >	<?
			$query  ="select scode,sname from service1  ";
			$result=mysql_query($query);
			while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[scode];?>"
		<?
		if($rs[scode]== $d[scode]) echo "selected";
		?>
		><? echo $d[sname];?></option>
	            <? }?>
	    </select> 
    </strong></td>
  </tr>
  <tr>
    <td class="lgBar" style="border: #000000 1px solid;"><div align="right">ʶҹ� :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
	<select name="status" class="text"  disabled="disabled" >
	<option value="¡��ԡ"<? if($rs[status]== "¡��ԡ") echo "selected";?>>¡��ԡ</option>
   </select>
      </strong></td> <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">�Ţ�ҵõ�駵� :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="m_total" value="<?=$rs[m_total]?>" size="15"  class="text"  disabled="disabled" />
    </strong></td>
  </tr>
<tr >
    <td class="lgBar" style="border: #000000 1px solid;"><div align="right">�ѡɳС��¡��ԡ :  </div></td>
	<td  height="30"style="border: #000000 1px solid;" class="bmText"><input type="radio" name="c_status" value="0" <? if($c_status =='0' or $c_status =='') echo "checked"?> /> <strong>¡��ԡ�����&nbsp;&nbsp;
	    <input type="radio" name="c_status" value="1" <? if($c_status =='1') echo "checked"?> /> 
	    �Ѵ�ҵù��
 	</strong></td>
	 <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">�Ţ�ҵ�����ش :  </div></td>
     <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="m_total1" disabled="disabled" value="<? if(find_max($mcode) <>'') echo find_max($mcode);else echo "0"; ?>" size="15"  class="text"     />
    </strong></td>
	</tr>
  <tr>
	<td colspan="4" align="center" class="lgBar" style="border: #000000 1px solid;">
	  <input name="save_add" type="submit"  value="�ѹ�֡������" onClick="return validate()"/>	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </td>
</tr>
 </table>
 </td></tr></table>
 <br />
</form>
</body>
</html>
<script language="javascript">
function godel()
{
	if (confirm("�س��ͧ���ź�����Ź�� ���������"))
	{
		return true;
	}
		return false;
}
</script><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
<script language="JavaScript" type="text/javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
	
		    if (  document.add_mem.name.value=='' || document.add_mem.name.value==' ' )
           {
				   alert("��سҡ�͡���ͼ������͹");
				   document.add_mem.name.focus();           
				   return false;
           }
		   if (  document.add_mem.surn.value=='' || document.add_mem.surn.value==' ' )
           {
				   alert("��سҡ�͡���ʡ�š�͹ �������������� ' - ' ");
				   document.add_mem.surn.focus();           
				   return false;
           }
		      if (  document.add_mem.m_total.value=='' || document.add_mem.m_total.value==' ' )
           {
				   alert("��سҡ�͡�Ţ�ҵõ�駵�������� 0 ");
				   document.add_mem.m_total.focus();           
				   return false;
           }
		 if (confirm("�س��ͧ��úѹ�֡������ ���������"))
			{
					return true;
			}else{
					return false;
			}
	}
</script>
<?
function find_max($mcode){
			$sql=" select max(rec_id) as maxi from meter 
			where mcode = '" .$mcode. "'   and rec_status is not null and rec_status <> '¡��ԡ' 
			group by mcode  ";
			$result=mysql_query($sql);
			$rs =mysql_fetch_array($result);
							$sql_1=" select mno  from meter  Where mcode = '" .$mcode. "' and rec_id = '" .$rs[maxi].  "' and rec_status is not null and rec_status <> '¡��ԡ'  ";
							$result_1=mysql_query($sql_1);
							$rs_1 =mysql_fetch_array($result_1);
			return $rs_1[mno];
}

?>
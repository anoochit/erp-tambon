
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

//dochange �ж١���¡������ա�����͡ ��¡�� Combobox ��觨з��������¡ AJAX ������ͧ�͢����ŶѴ仨ҡ Server
function dochange(src, val) {

	//alert(val);
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //�Ѻ��ҡ�Ѻ��
               } 
          }
     };
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}

</script>
<body><br>
<form name="f12" method="post"  action="seach_all_show.php"   target="_blank" >
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td align="center" colspan="2" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div >��§ҹ����ѳ��</div>	</td>
	</tr>
</table></td>
</tr>
</table>
<br>
<table width="98%" border="1" cellspacing="0" cellpadding="3" align="center">
  <tr class="bmText">
    <td width="14%" height="30"><strong>&nbsp;���ͤ���ѳ��</strong></td>
    <td width="86%">&nbsp;&nbsp;<input type="text" name="rd_name" value="<?=$rd_name?>" size="30"></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;�Ţ����ѳ��</strong></td>
    <td>&nbsp;&nbsp;<input type="text" name="code1" value="<?=$code1?>" size="30"></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;�ͧ</strong></td>
    <td><div><?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?><select name="div_id"  onchange="dochange('sub_div_1', this.value);" <? if($new1 =='old')  echo "disabled='disabled'"?>>
<option value="">- - - - - - - - -��س����͡- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
?>
  <option value="<? echo $d[div_id];?>"
		<?
		if($div_id == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select> <br /></div></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;����</strong></td>
    <td><div id="sub_div_1"    ><?
	if($sub_id <>''){
			      $query  ="select *  from division d,subdivision s
        where  1 = 1 and d.div_id = s.div_id
        and d.div_id like '%$div_id%' 
		group by s.sub_name
        order by s.sub_id ";
		 $result = mysql_query($query);
          echo "<select name='sub_id' ";
		   if($new1 =='old')  echo "disabled='disabled'";
		   echo ">";
         echo "<option value=''>- - - - - - - - -��س����͡- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[sub_id]' ";
		if($sub_id ==   $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select>\n";  
}else{
	 ?>
	 <select name='sub_id' <? if($new1 =='old')  echo "disabled='disabled'"?>>
	<option value="">- - - - - - - - -��س����͡- - - - - - - - - </option> 
	</select>
<? }?>	 
		</div></td>
  </tr>
  <tr class="bmText" >
  <td width="14%" ><strong>&nbsp;�ѹ����ԡ</strong></td>
    <td width="86%"   >&nbsp;&nbsp;<input type="text" name="open_date" value="<?  if($open_date<>'') echo $open_date// if($open_date =='') echo date("d/m/Y") ;else echo $open_date;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('open_date','DD/MM/YYYY')"   width='19'  height='19'>  &nbsp;  �֧ &nbsp; <input type="text" name="open_date1" value="<? if($open_date1<>'')  echo $open_date1 //if($open_date1 =='') echo date("d/m/Y") ;else echo $open_date1; ?>"  size="10" />
      &nbsp; <img src="images/calendar.png" onClick="showCalendar('open_date1','DD/MM/YYYY')"   width='19'  height='19'>	  </td>
	</tr>
	<tr class="bmText" >
  <td width="14%" ><strong>&nbsp;ʶҹ�</strong></td>
    <td width="86%"   >&nbsp;&nbsp;<select name="status">
	<option  value="">------���͡ʶҹ�------</option>
	<option value="0">��ҹ����</option>
	<option value="1">�ͨ�˹���</option>
	<option value="2">��˹�������</option>
	</select>	  </td>
	</tr>

  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ���� "   ></td>
  </tr>
</table>

</form>

</body>
</html>

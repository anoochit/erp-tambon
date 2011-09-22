
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<script language=Javascript>

function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<link href="style2.css" rel="stylesheet" type="text/css">
<body><br>
<form name="f12" method="post"  action="report_all_show_p.php"   target="_blank" >
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center"    >
  <tr>
    <td align="center" colspan="2" style="border: #66CCFF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div >รายงานครุภัณฑ์</div>	</td>
	</tr>
</table></td>
</tr>
</table>
<br>
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div > <img src="images/Search.png"  align="absmiddle">&nbsp;&nbsp;
		รายงานครุภัณฑ์</div>	</td>
	</tr>
</table>	</td>
	</tr>
  <tr class="bmText">
    <td width="33%" height="28"><strong>&nbsp;&nbsp;ทะเบียนเลขที่รับ</strong></td>
    <td width="78%"><div>&nbsp;<input type="text" name="paper_id" value="<?=$paper_id?>" size="30"></div></td>
  </tr> 
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="28"><strong>&nbsp;&nbsp;วันที่ได้กรรมสิทธิ์</strong></td>
    <td><div>&nbsp;<input name="date_receive" type="text" id="date_receive" value="<? echo $date_receive;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ชื่ออสังหาริมทรัพย์</strong></td>
    <td><div>&nbsp;<input type="text" name="rd_name" value="<?=$rd_name?>" size="30"></div></td>
  </tr>

<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
                    <td><strong>&nbsp;&nbsp;ประเภททรัพย์สิน</strong></td>
			
                    <td><div id='type_'>&nbsp;<?
			$query  ="select * from type where type_id = '1'  group by type_name  order by t_id";
			$result=mysql_query($query);
			?><select name="t_id"  >
        <option value=''>----------กรุณาเลือก----------</option>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[t_id];?>"
		<?
		if($type_id == $d[t_id]) echo "selected";
		?>
		><? echo $d[type_name];?></option>
                        <? }?>
                      </select>		</div>		</td>
    </tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
                    <td><strong>&nbsp;&nbsp;ปีงบประมาณ</strong></td>
			
                    <td><div>&nbsp;<select name="year">
	<option value="" <? if($year =='' ) echo "selected"?>>- - ทั้งหมด - -</option>
	<?
	for($i=-10;$i<=2;$i++){
	?>
	<option value="<?=date("Y") + 543+$i?>" <? if($year ==(date("Y") + 543+$i) ) echo "selected"?>><?=date("Y") + 543+$i?></option>
	<?
	}
	?>
	</select></div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา " class="buttom" ></td>
  </tr>
</table>
</td>
  </tr>
</table>
</form>

</body>
</html>

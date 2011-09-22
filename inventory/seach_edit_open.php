
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

//dochange จะถูกเรียกเมื่อมีการเลือก รายการ Combobox ซึ่งจะทำให้ไปเรียก AJAX เพื่อร้องขอข้อมูลถัดไปจาก Server
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<body><br>
<form name="f12" method="post"  action=""   >
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td align="center" colspan="2" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div >แก้ไข / ลบ เบิกครุภัณฑ์</div>	</td>
	</tr>
</table></td>
</tr>
</table>
<br>
<table width="80%" border="1"  bordercolor="#000000"cellspacing="0" cellpadding="3" align="center">
  <tr class="bmText">
    <td width="31%" height="30"><strong>&nbsp;&nbsp;เลขที่ใบเบิก</strong></td>
    <td  colspan="2"><div><input type="text" name="num_id" value="<?=$num_id?>" size="30"></div></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;วันที่เบิก</strong></td>
    <td colspan="2"><div><input name="open_date" type="text" id="open_date" value="<? echo $open_date;?>"  size="10" />
      &nbsp; <img src="images/calendar.png" onClick="showCalendar('open_date','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;เลขที่เอกสาร</strong></td>
    <td colspan="2"><div><input type="text" name="paper_id" value="<?=$paper_id?>" size="30"></div></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ชื่อครุภัณฑ์</strong></td>
    <td colspan="2"><div><input type="text" name="rd_name" value="<?=$rd_name?>" size="30"></div></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;เลขครุภัณฑ์</strong></td>
    <td colspan="2"><div><input type="text" name="code1" value="<?=$code1?>" size="30"></div></td>
  </tr>
 <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;กอง</strong></td>
    <td width="53%"><div><?
			$query="select div_id,div_name from division order by div_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
?><select name="div_id"  onchange="dochange('sub_div_1', this.value);" >
<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
				
?>
  <option value="<? echo $d[div_id];?>"
		<?
		if($div_id == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select> </div>
</td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ฝ่าย</strong></td>
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
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[sub_id]' ";
		if($sub_id ==   $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select>\n";  
}else{
	 ?>
	 <select name='sub_id' >
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select>
<? }?>	  </div>
</td>
  </tr> 
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;หัวหน้าส่วน</strong></td>
    <td colspan="2"><div><input type="text" name="name_head" value="<?=$name_head?>" size="30"></div></td>
  </tr>
  <tr>
    <td colspan="3" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา " ></td>
  </tr>
</table>
<br>
<?
if($search <>''){
$sql="SELECT  o.*,rd.*
 from receive r,receive_detail rd,code c  ,open o
 WHERE 1 = 1 and r.r_id = rd.r_id and c.rd_id = rd.rd_id  and c.o_id = o.o_id ";
if($num_id  <> '' ){
	$sql .= " AND o.num_id like '$num_id%'  ";
}
if($rd_name <> '' ){
	$sql .= " AND rd.rd_name like '$rd_name%'  ";
}
if($code1 <> '' ){
	$sql .= " AND c.code like '$code1%'  ";
}
if($div_id <> '' ){
	$sql .= " AND o.div_id = '$div_id'  ";
}
if($sub_id <> '' ){
	$sql .= " AND o.sub_id = '$sub_id'  ";
}
if($open_date <> ''){
	$sql .= " AND o.open_date = '".date_format_sql($open_date)."'  ";
}
if($name_head <> '' ){
	$sql .= " AND o.name_head like '%$name_head%'  ";
}
$sql .= " group by rd.rd_id ";
$sql .= " order by o.open_date desc ";
$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);
if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;
$Num_Pages = (int)$Num_Pages;
if(($Page>$Num_Pages) || ($Page<0))
print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql .= " LIMIT $Page_start , $Per_Page";
}
$result1 = mysql_query($sql);
?>
<table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
      <td  height="28" colspan="6"><div  align="left">&nbsp;&nbsp;แก้ไข / ลบ เบิกครุภัณฑ์</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#C1E0FF">
        <td width="12%"  height="31"><div align="center"><strong>เลขที่ใบเบิก</strong></div></td>
		<td width="12%" ><div align="center"><strong>เลขที่เอกสาร</strong></div></td>
         <td width="14%" ><div align="center"><strong>วันที่เบิก</strong></div></td>
		 <td width="21%" ><div align="center"><strong>กอง / ฝ่าย</strong></div></td>
         <td width="41%" ><div align="center"><strong>ชื่อครุภัณฑ์ / เลขครุภัณฑ์</strong></div></td>
          </tr>
<?
$i = 0;
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>       
<a href="?action=edit_open&o_id=<?=$rs[o_id]?>&r_id=<?=$rs[r_id]?>&rd_id=<?=$rs[rd_id]?>"  >
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#FFCC00'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
                                                  <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $rs[num_id]; ?></font></font></td>
 <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $rs[paper_id]; ?></font></font></td>
                                                  <td  align="center"><font size="2">&nbsp;<? echo date_2($rs[open_date]);  ?></font></td>
        <td  align="left"><font size="2">&nbsp;<?  echo find_div($rs["div_id"])."/<br>".find_sub($rs["sub_id"])?> </font> </td>
                                              
 <td ><div align="left"><font size="2">&nbsp;<? 
 
	    echo $rs[rd_name]."&nbsp;&nbsp;<br>" ;
		echo code_open_all($rs[o_id],$rs[rd_id])
	 ?></font></div></td>
          </tr>
</a>
 <? 
	}
?>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=seach_edit_open&search=$search&Page=$Prev_Page&num_id=$num_id&code1=$code1&open_date=$open_date&rd_name=$rd_name&s_id=$s_id&r_id=$r_id'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=seach_edit_open&search=$search&Page=$i&num_id=$num_id&code1=$code1&open_date=$open_date&rd_name=$rd_name&s_id=$s_id&r_id=$r_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=seach_edit_open&search=$search&Page=$Next_Page&num_id=$num_id&code1=$code1&open_date=$open_date&rd_name=$rd_name&s_id=$s_id&r_id=$r_id'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</body>
</html>

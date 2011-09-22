
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language=Javascript>
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
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<link href="style2.css" rel="stylesheet" type="text/css">
<? 
if($type_id ==10){
	$na = 'วัสดุสำนักงาน';
}elseif($type_id ==11){
	$na = 'วัสดุงานบ้านงานครัว';
}
?>
<body><br>
<form name="f12" method="post"  action=""   >
<br>
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;เบิก<?=$na?>&nbsp;&nbsp; [ <a href="?action=new_buy_2_1_t2&type_id=<?=$type_id?>" class="catLink">เพิ่มเบิก<?=$na?> </a>]</div>	</td>
	</tr>
</table>
	</td>
	</tr>

  <tr class="bmText">
    <td width="26%" height="30"><strong>&nbsp;&nbsp;เลขที่เบิก</strong></td>
    <td width="74%"><div><input type="text" name="pay_id" value="<?=$pay_id?>" size="30"></div></td>
  </tr>
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td width="26%" height="30"><strong>&nbsp;&nbsp;ทะเบียนเลขที่เบิก</strong></td>
    <td width="74%"><div><input type="text" name="paper_id" value="<?=$paper_id?>" size="30"></div></td>
  </tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;วันที่เบิก</strong></td>
    <td><div><input name="pay_date" type="text" id="pay_date" value="<? echo $pay_date;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('pay_date','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
				     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ชื่อพัสดุ</strong></td>
    <td><div id="product"    ><?	if($type_id <>''){
		$query  ="select *  from product
        where  t_id ='$type_id'  and status = 0
        order by pro_name ";
		 $result = mysql_query($query);
          echo "<select name='p_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[p_id]' ";
		if($p_id ==   $fetcharr['p_id'] ) echo "selected";
			    echo " >$fetcharr[pro_name]</option> \n" ;
          }
		 echo "</select>\n";  

}else{
	 $query  ="select *  from product where status = 0
        order by pro_name ";
		 $result = mysql_query($query);
          echo "<select name='p_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[p_id]' ";
		if($p_id ==   $fetcharr['p_id'] ) echo "selected";
			    echo " >$fetcharr[pro_name]</option> \n" ;
          }
		 echo "</select>\n";  

 }?>
	</div>
	</td>
  </tr>
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>

</td>
  </tr>
</table>
<br>
<?
if($search <>''){
$sql="SELECT  p.*,pd.*,p.p_id as p_id1,pd.pd_id as pd_id1  from pay p
left outer join pay_detail pd on  p.p_id = pd.p_id 
left outer join product pt on  pt.p_id = pd.product_id
left outer join type t on  pt.t_id = t.t_id
WHERE 1 = 1   ";
if($pay_id  <> '' ){
	$sql .= " AND p.pay_id like '$pay_id%'  ";
}
if($paper_id  <> '' ){
	$sql .= " AND p.paper_id like '$paper_id%'  ";
}
if($p_id <> '' ){
	$sql .= " AND pt.p_id ='$p_id'  ";
}
if($rd_name <> '' ){
	$sql .= " AND pt.pro_name like '$rd_name%'  ";
}
if($type_id <> '' ){
	$sql .= " AND pt.t_id = '$type_id'  ";
}
if($pay_date <> ''){
	$sql .= " AND p.pay_date = '".date_format_sql($pay_date)."'  ";
}
$sql .= " group by p.paper_id ";
$sql .= " order by p.pay_date desc ";

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
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
      <td  height="28" colspan="6"><div  align="left">&nbsp;&nbsp;แก้ไข / ลบ เบิก<?=$na?></div></td>
          </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="13%"  height="31"><div align="center"><strong>เลขที่เบิก</strong></div></td>
		<td width="17%"  height="31"><div align="center"><strong>ทะเบียนเลขที่เบิก</strong></div></td>
         <td width="12%" ><div align="center"><strong>วันที่เบิก</strong></div></td>
		<td width="23%"  align="center"><strong>ชื่อผู้เบิก</strong></td> 
         <td width="35%" ><div align="center"><strong>ชื่อพัสดุ</strong></div></td>
          </tr>
<?
$i = 0;
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>       
<a href="?action=view_detail_t2&p_id=<?=$rs[p_id1]?>&pd_id=<?=$rs[pd_id1]?>&type_id=<?=$type_id?>"  >  
<tr class="bmText" bgcolor="#e8edff" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $rs[pay_id]; ?></font></font></td>
  <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $rs[paper_id]; ?></font></font></td>
 <td  align="center"><font size="2">&nbsp;<? echo date_2($rs[pay_date]);  ?></font></td>
<td  align="left"><font size="2">&nbsp;<? echo $rs[open_name];  ?> </font></td> 
                                              
 <td  ><div align="left"><font size="2"><?=code_2($rs[p_id1])?>&nbsp;</font></div></td>
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
echo " <a href='$PHP_SELF?action=seach_edit_1&search=$search&Page=$Prev_Page&pay_id=$pay_id&code1=$code1&pay_date=$pay_date&rd_name=$rd_name&type_id=$type_id&p_id=$p_id'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=seach_edit_1&search=$search&Page=$i&pay_id=$pay_id&code1=$code1&pay_date=$pay_date&rd_name=$rd_name&type_id=$type_id&p_id=$p_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=seach_edit_1&search=$search&Page=$Next_Page&pay_id=$pay_id&code1=$code1&pay_date=$pay_date&rd_name=$rd_name&type_id=$type_id&p_id=$p_id'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</body>
</html>

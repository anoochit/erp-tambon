
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style2.css" rel="stylesheet" type="text/css">

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
<style type="text/css">
<!--
.style1 {
	font-family: "MS Sans Serif";
	font-weight: bold;
}
-->
</style>
<body>
<form name="f12" method="post"  action=""   ><br>
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div ><img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;ตรวจรับพัสดุ &nbsp;&nbsp; [ <a href="?action=new_buy_1" class="catLink">เพิ่มตรวจรับพัสดุ </a>]</div>	</td>
	</tr>
</table>
	</td>
	</tr>
  <tr class="bmText">
    <td width="24%" height="30"><strong>&nbsp;&nbsp;ใบส่งของที่</strong></td>
    <td width="76%"><div><input type="text" name="num_id" value="<?=$num_id?>" size="30"></div></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td width="24%" height="30"><strong>&nbsp;&nbsp;ทะเบียนเลขที่รับ</strong></td>
    <td width="76%"><div><input type="text" name="paper_id" value="<?=$paper_id?>" size="30"></div></td>
  </tr> 
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;วันที่รับ</strong></td>
    <td><div><input name="date_receive" type="text" id="date_receive" value="<? echo $date_receive;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
                    <td><strong>&nbsp;&nbsp;ประเภทพัสดุ</strong></td>
			
                    <td><div><?
			$query  ="select * from type where status =0  group by p_type  order by t_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?><select name="type_id"  onchange="dochange('product', this.value);">
        <option value=''>----------กรุณาเลือก----------</option>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[t_id];?>"
		<?
		if($type_id == $d[t_id]) echo "selected";
		?>
		><? echo $d[p_type];?></option>
                        <? }?>
                      </select></div>
				</td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ชื่อพัสดุ</strong></td>
    <td><div id="product"    ><?	if($type_id <>''){
		$query  ="select *  from product
        where  t_id ='$type_id'  and status = 0
        order by pro_name ";
		//echo $query."<br>";
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
	 $query  ="select *  from product where 1 = 1 and status = 0
        order by pro_name ";
		//echo $query."<br>";
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
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา " class="buttom"></td>
  </tr>
</table>
</td></tr></table>

<br>
<?
if($search <>''){
$sql="SELECT  r.*,rd.*,r.r_id as r_id1,rd.rd_id as rd_id1 from receive r
left outer join receive_detail rd on  r.r_id = rd.r_id 
left outer join product p on  p.p_id = rd.p_id
left outer join type t on  p.t_id = t.t_id
WHERE 1 = 1   ";
$sql .= " AND r.div_id = '$_SESSION[div_id]'  ";

if($num_id  <> '' ){
	$sql .= " AND r.num_id like '$num_id%'  ";
}
if($paper_id  <> '' ){
	$sql .= " AND r.paper_id like '$paper_id%'  ";
}
if($rd_name <> '' ){
	$sql .= " AND p.pro_name like '$rd_name%'  ";
}
if($p_id <> '' ){
	$sql .= " AND p.p_id ='$p_id'  ";
}
if($type_id <> '' ){
	$sql .= " AND p.t_id = '$type_id'  ";
}
if($date_receive <> ''){
	$sql .= " AND r.date_receive = '".date_format_sql($date_receive)."'  ";
}
$sql .= " group by r.paper_id ";
$sql .= " order by r.date_receive desc ";

$Per_Page =5;
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
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="6" align="left">&nbsp;&nbsp;แก้ไข / ลบ ตรวจรับพัสดุ</td>
          </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="20%"  height="31" align="center"><strong>เลขที่ใบส่งของ</strong></td>
		<td width="12%"  height="31" align="center"><strong>ทะเบียนเลขที่รับ</strong></td>
         <td width="13%" align="center" ><strong>วันที่รับ</strong></td>
         <td width="46%"  align="center"><strong>ชื่อ / จำนวนที่รับพัสดุ</strong></td>
     <td width="9%" >&nbsp;</td> 
          </tr>
<?
$i = 0;
if($result1)

while($rs=mysql_fetch_array($result1)){

	$i++;

	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"   align="left"><font size="2">&nbsp;<font size="2"><? echo $rs[num_id]; ?></font></font></td>
  <td  height="25"  align="center"><font size="2">&nbsp;<font size="2"><? echo $rs[paper_id]; ?></font></font></td>
 <td  align="center"><font size="2">&nbsp;<? echo date_2($rs[date_receive]);  ?></font></td>                                              
 <td  align="left" ><font size="2"><?=code_1($rs[r_id1])?>&nbsp;</font></td>
<td align="center"><a href="?action=view_detail_1&r_id=<?=$rs[r_id1]?>&rd_id=<?=$rs[rd_id1]?>"  > แก้ไข / ลบ</a></td> </tr>

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
echo " <a href='$PHP_SELF?action=seach_edit_1&search=$search&Page=$Prev_Page&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id&p_id=$p_id'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=seach_edit_1&search=$search&Page=$i&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id&p_id=$p_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=seach_edit_1&search=$search&Page=$Next_Page&num_id=$num_id&code1=$code1&date_receive=$date_receive&rd_name=$rd_name&type_id=$type_id&p_id=$p_id'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</body>
</html>

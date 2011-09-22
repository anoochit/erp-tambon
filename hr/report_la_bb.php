
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
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<form name="save" action=""  method="post" enctype="multipart/form-data">
<table width="95%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#F4F7F9">
 		 	<tr  class="lgBar1" >
  		  		<td  height="25" colspan="4" ><div>รายงานการลา</div></td>
  			</tr>
			    <tr >
                <td width="70" class="style_h"><div> วันที่ </div></td>
                <td width="277" ><div> <input name="date_begin1" type="text" id="date_begin1" 
	value="<? if($date_begin1=='') echo date("d/m/Y"); else echo $date_begin1;?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_begin1','DD/MM/YYYY')"   width='19'  height='19'></div>           </td>
				  <td width="98" class="style_h"><div> ถึงวันที่ </div></td>
                <td width="249" ><div> <input name="date_begin2" type="text" id="date_begin2" 
	value="<? if($date_begin2=='') echo date("d/m/Y") ;else echo $date_begin2;?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_begin2','DD/MM/YYYY')"   width='19'  height='19'></div>           </td>
              </tr>
			  <tr>      
        <td   class="style_h" height="30" ><div align="left"> กอง </div></td>
		<td class="style_h"><div align="left">
           <?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?><select name="div_id"  onchange="dochange('sub_div_1', this.value);">
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
</select>
</div>
</td>
 <td   class="style_h" ><div align="left">ฝ่าย </div></td>
<td><div id="sub_div_1" align="left" >
	<select name='sub_id' >
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select>
		</div>
        </td>
      </tr>
	  <tr>      
        <td   class="style_h" height="30" ><div align="left"> ประเภท</div></td>
		<td class="style_h"><div align="left">
          <?
			$query="select *  from category order by cat_id";
			$result=mysql_query($query);
?><select name="cat_id"  onchange="dochange('cat_1', this.value);">
<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
?>
  <option value="<? echo $d[cat_id];?>"
		<?
		if($cat_id == $d[cat_id] ) echo "selected";
		?>
		><? echo $d[cat_name];?></option>
  <? }?>
</select>
</div>
</td>
 <td   class="style_h" ><div align="left">ระดับ/หมวด </div></td>
<td><div id="cat_1" align="left" >
	<select name='type_id' >
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select>
		</div>
        </td>
      </tr>
			  <tr><td colspan="4" height="35" align="center"><input type="submit" name="go_search" value="ค้นหา"></td></tr>
</table>
	</td>
</tr>
</table>
<br />
<table width="98%" border="0" cellspacing="1" cellpadding="1"  align="center">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table name="body" width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td width="100%" valign="top">

<table width="100%" cellpadding="0" cellspacing="0" border="1" align="center"  bordercolor="#FFFFFF">

	<tr  bgcolor="#60c0ff">
		<td  align="center" height="25" width="135"> เลขที่พนักงาน	</td>
		<td  align="center" height="25" width="153"> ชื่อ - สกุล</td>
		<td align="center" height="25" width="150"> วันที่ลา</td>
		<td   align="center" height="25" width="124">ถึงวันที่</td>
		<td   align="center" height="25" width="153"> ประเภทการลา	</td>

	</tr>
	
<?
if($go_search  <> ""){
$sql="SELECT * FROM person  p, ps_tname_ref ps , vacation v ,ps_latype pl WHERE 
p.user_id =v.user_id and  v.ps_latype_id = pl.ps_latype_id and p.ps_tname_id = ps.ps_tname_id ";

if($date_begin1 <> '' and $date_begin2 <>''){
	$sql .= " AND v.date_begin >= '".date_format_sql($date_begin1)."' AND v.date_begin <= '".date_format_sql($date_begin2)."'  ";
}
$sql .= " AND p.status =0  ";

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
$result1 = mysql_query($sql);
}
$x = 1;
$i = 0;
while($rs=mysql_fetch_array($result1)){

if($i%2 == 0) $bg ='#CCCCCC';
elseif($i%2 ==1) $bg ='#FFFFFF';
$i++;
?>

<tr bgcolor="<? echo $bg?>" >
		
		<td align="left" height="25" width="135">&nbsp; <? echo $rs[div_id]."-".$rs[pos_id]."-";
		$k = "";
		for($i=0;$i<(3-strlen(trim($rs[per_id])));$i++){
			$k .="0" ;
		}
		echo $k.$rs[per_id]?></td>
		
		<td   align="left"height="25" width="153" >&nbsp; <? 
		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo $rs["name"]?></td>
		
		<td  align="left" height="25" width="150">&nbsp; <? echo date_2($rs[date_begin])?></td>
		<td  align="left" height="25" width="124">&nbsp; <? echo date_2($rs[date_end])?></td>
		<td  align="left" height="25" width="153">&nbsp; <? echo $rs[ps_latype_item]?></td>

	</tr>  

	<?$x = $x +1;  }?>	

</table>
			</td>
</tr>
</table>
</td></tr> </table>
<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด <B><?= $Num_Rows;?></B>&nbsp;ฉบับ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='?action=report_la&Page=$Prev_Page&go_search=$go_search&date_begin1=$date_begin1&date_begin2=$date_begin2'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='?action=report_la&Page=$i&go_search=$go_search&date_begin1=$date_begin1&date_begin2=$date_begin2'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='?action=report_la&Page=$Next_Page&go_search=$go_search&date_begin1=$date_begin1&date_begin2=$date_begin2'> หน้าถัดไป>> </a>";

?>
<br />

</font>
</center>
</div>
</form>
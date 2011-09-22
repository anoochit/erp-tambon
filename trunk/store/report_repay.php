
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
<body>
<form name="f12" method="post"  action=""   >

<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;รายงาน รับ - เบิก พัสดุ</div>	</td>
	</tr>
</table>	</td>
	</tr>
<tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;วันที่</strong></td>
    <td><div><input name="s_date" type="text" id="s_date" value="<? echo $s_date;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('s_date','DD/MM/YYYY')"   width='19'  height='19'> <strong>ถึง วันที่ </strong>&nbsp;<input name="s_date1" type="text" id="s_date1" value="<? echo $s_date1;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('s_date1','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr> 
   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
                    <td><strong>&nbsp;&nbsp;ประเภทพัสดุ</strong></td>
			
                    <td><div><?
			$query  ="select * from type where status =0  group by p_type  order by t_id";
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
   <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ชื่อพัสดุ</strong></td>
    <td><div><input  type="text" name="pro_name" size="20" value="<?=$pro_name?>"></div></td></tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
	<tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ประเภท</strong></td>
    <td><div><select name="type">
	<option value="" <? if($type=='' ) echo "selected"?>>- - ทั้งหมด - -</option>
	<option value="R" <? if($type =='R' ) echo "selected"?>>รับเข้า</option>
	<option value="P" <? if($type =='P' ) echo "selected"?>>เบิกจ่าย</option>
	</select>
	</div></td>
  </tr>
   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>

<br>
<?

if($search <>''){

$sql="SELECT  *,s.amount as amount1 from stock_card  s,  product p 

WHERE 1 = 1 and s.status = 0    and p.status = 0 and s.p_id = p.p_id "; 
if($_SESSION[div_id] !=1)  $sql .= " AND s.div_id = '$_SESSION[div_id]'  ";
if($p_id <> '' ){
	$sql .= " AND s.p_id ='$p_id'  ";
}
if($type <> '' ){
	$sql .= " AND s.s_type ='$type'  ";
}
if($type_id <> '' ){
	$sql .= " AND p.t_id = '$type_id'  ";
}
if($s_date <> '' and $s_date1 <> ''){
	$sql .= " AND s.s_date >= '".date_format_sql($s_date)."' and s.s_date <= '".date_format_sql($s_date1)."'  ";
}
if($pro_name <> '' ){
	$sql .= " AND p.pro_name like '%$pro_name%'  ";
}
if($year <> '' ){
	$sql .= " AND r.paper_id like'%-".substr($year,2)."%' ";
}
$sql .= " group by s.id  order by s.p_id ,s.s_date asc,s.id  asc ";

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
<table width="100%" align="center" cellspacing="1"  border="0" cellpadding="1">
<tr class="lgBar">
         <td width="16%"  rowspan="2" height="30"><div align="center"><strong>วันที่รับ</strong></div></td>
         <td width="32%" rowspan="2"><div align="center"><strong>รายการ</strong></div></td>
		  <td colspan="3" align="28"><div align="center"><strong>จำนวน</strong></div></td>
    <td width="11%"  align="center" rowspan="2"><strong>หมายเหตุ</strong></td> 
          </tr>
		    <tr   class="lgBar">
         <td width="15%"   height="28"><div align="center"><strong>รับ</strong></div></td>
		  <td width="15%" ><div align="center"><strong>จ่าย</strong></div></td>
    <td width="11%"  align="center"><strong>คงเหลือ</strong></td> 
          </tr>
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
if($result1)
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#CCCCCC';
?>       
<?
if(($pro_name_old <> $rs[pro_name]) and $i !=1){
?>
<tr >
<td  height="30"   align="left" colspan="6"><font color="#FF0000"><strong>&nbsp;&nbsp;<? echo $rs[pro_name];  ?></strong></font>&nbsp;</td>
</tr>
<?
	}elseif($i ==1){?>
	<tr >
<td  height="30"  align="left"colspan="6"><font color="#FF0000"><strong>&nbsp;&nbsp;<? echo $rs[pro_name];  ?></strong></font>&nbsp;</td>
</tr>
<? }?>
<tr class="bmText" bgcolor="#DEE4EB">
 <td  height="28" align="center"><font size="2">&nbsp;<? if ($rs[s_date] <>'0000-00-00') echo date_2($rs[s_date]);  ?></font></td>   
 <td   align="left"><font size="2">&nbsp;<?
 if($rs[s_type] == 'R') echo " ใบรับเลขที่ ".find_paper_id($rs[num_id]);
 if($rs[s_type] == 'P') echo " ใบเบิกเลขที่ ".find_paper_id1($rs[num_id]);
 
 ?>&nbsp;</font></td>                                 
 <td   align="center">&nbsp;<font size="2"><?  if($rs[s_type] == 'R') echo $rs[amount1]; ?></font></td>
  <td   align="center">&nbsp;<font size="2"><?  if($rs[s_type] == 'P') echo $rs[amount1]; ?></font></td>
   <td   align="center">&nbsp;<font size="2"><?  echo $rs[remain]; ?></font></td>
      <td  align="center" >&nbsp;<font size="2"><?  echo $rs[remark]; ?></font></td>
          </tr>

 <? 
	$pro_name_old = $rs[pro_name];
	}
?>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report_repay_print.php?s_date=<?=$s_date?>&s_date1=<?=$s_date1?>&type_id=<?=$type_id?>&year=<?=$year?>&p_id=<?=$p_id?>&type=<?=$type?>&pro_name=<?=$pro_name?>')" class="buttom"/>
<br><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=report_repay&search=$search&Page=$Prev_Page&s_date=$s_date&s_date1=$s_date1&type_id=$type_id&year=$year&p_id=$p_id&type=$type&pro_name=$pro_name'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=report_repay&search=$search&Page=$i&s_date=$s_date&s_date1=$s_date1&type_id=$type_id&year=$year&p_id=$p_id&type=$type&pro_name=$pro_name'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=report_repay&search=$search&Page=$Next_Page&s_date=$s_date&s_date1=$s_date1&type_id=$type_id&year=$year&p_id=$p_id&type=$type&pro_name=$pro_name'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</form>
</body>
</html>
<?
function find_paper_id($rd_id){
		$sql = "Select  * from  receive  r, receive_detail rd
		 where r.r_id = rd.r_id and rd.rd_id ='$rd_id' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[paper_id];
}
function find_paper_id1($rd_id){
		$sql = "Select  * from  pay  p, pay_detail pd
		 where p.p_id = pd.p_id and pd.pd_id ='$rd_id' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[paper_id];
}
?>
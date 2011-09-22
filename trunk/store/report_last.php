
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
		<div ><img src="images/Search.png" align="absmiddle">&nbsp;&nbsp; รายงานพัสดุคงเหลือ</div>	</td>
	</tr>
</table>	</td>
	</tr> 

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
                      </select></div>				</td>
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

	</div>	</td>

  </tr>	
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;&nbsp;ชื่อพัสดุ</strong></td>
    <td><div><input  type="text" name="pro_name" size="20" value="<?=$pro_name?>"></div></td></tr>
	
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>

  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>

<br>
<?

if($search <>''){

$sql="SELECT  * from  product  where 1 = 1
";
if($p_id <> '' ){
	$sql .= " AND p_id ='$p_id'  ";
}
if($pro_name <> '' ){
	$sql .= " AND pro_name like '%$pro_name%'  ";
}
if($type_id <> '' ){
	$sql .= " AND t_id = '$type_id'  ";
}

	$sql .= " AND status = 0  ";

$sql .= " group by p_id  order by pro_name asc   ";

$Per_Page =20;
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
<table  width="80%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
        
         <td width="83%"  height="28"><div align="center"><strong>รายการ</strong></div></td>
 <td width="17%"  align="center"><strong>คงเหลือ (ชิ้น)</strong></td> 
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
	if( find_stock($rs[p_id] , $_SESSION[div_id]) <= $rs[limite]){
			$bg ='#FFB6C1';
	}else{
			$bg ='#DEE4EB';
	}
?>       
<tr class="bmText" bgcolor="<?=$bg?>">
 <td  height="28"  align="left"><font size="2">&nbsp;&nbsp;<? echo $rs[pro_name]  ?></font></td>   
  <td   align="center">&nbsp;<font size="2"><b><? 
  if( find_stock($rs[p_id] , $_SESSION[div_id]) <>'') echo  number_format(find_stock($rs[p_id], $_SESSION[div_id])) ;
  else echo   "0";?></b></font></td>

          </tr>

 <? 
	}
?>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center">
<br><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=report_last&search=$search&Page=$Prev_Page&type_id=$type_id&p_id=$p_id&pro_name=$pro_name'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[ <a href='$PHP_SELF?action=report_last&search=$search&Page=$i&type_id=$type_id&p_id=$p_id&pro_name=$pro_name'> &nbsp;$i&nbsp;</a> ]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=report_last&search=$search&Page=$Next_Page&type_id=$type_id&p_id=$p_id&pro_name=$pro_name'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</form>
</body>
</html>
<?
function find_stock($p_id , $div_id){
		$sql = "Select * from stock_card  where p_id = '$p_id' and status = 0 
		and div_id ='$div_id'
		group by id order by s_date desc ,id desc   limit 1";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[remain];
}

?>
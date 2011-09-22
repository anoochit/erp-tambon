
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
<form name="f12" method="post"  action=""   >

<?
			$sql = "SELECT t_id,pro_name,remain,id ,limite from stock_card s 
			left join  product p on  s.p_id = p.p_id 
			where 1 = 1 AND p.status = 0 and s.status = 0  ";
			if($_SESSION[div_id] !=1) $sql .= " and s.div_id = '".$_SESSION[div_id]."' ";
			$sql .= "group by p.p_id order by t_id,pro_name asc ";
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

			$result1 = mysql_query($sql);

?>
<table  width="80%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
       <td width="22%"  height="28" style="border: #000000 1px solid;"><div align="center"><strong>ประเภท</strong></div></td>  
         <td width="42%"  height="28" style="border: #000000 1px solid;"><div align="center"><strong>รายการ</strong></div></td>
 <td width="15%"  align="center" style="border: #000000 1px solid;"><strong>คงเหลือ (ชิ้น)</strong></td> 
 <td width="21%"  align="center" style="border: #000000 1px solid;"><strong>จำนวนที่ตั้งไว้</strong></td> 
          </tr>

<?
if($result1)
while($rs=mysql_fetch_array($result1)){

	$i++;
	if( $rs[remain]  < $rs[limite]){
			$i--;
?>       
<tr class="bmText" bgcolor="#e5e5e5">
<td  height="28"  align="left" style="border: #000000 1px solid;" ><font size="2">&nbsp;&nbsp;<? echo find_type($rs[t_id])  ?></font></td>  
 <td  height="28"  align="left" style="border: #000000 1px solid;"><font size="2">&nbsp;&nbsp;<? echo $rs[pro_name]  ?></font></td>   
 <td   align="center" style="border: #000000 1px solid;">&nbsp;<font size="2"><b><?  echo $rs[remain]?></b></font></td>
 <td   align="center" style="border: #000000 1px solid;">&nbsp;<font size="2"><b><? echo $rs[limite];?></b></font></td>
          </tr>

<? }
}
?>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center">

<br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR> 
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=report_end&search=$search&Page=$Prev_Pagee'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[ <a href='$PHP_SELF?action=report_end&search=$search&Page=$i'> &nbsp;$i&nbsp; </a> ]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=report_end&search=$search&Page=$Next_Page'> หน้าถัดไป>> </a>";

?>
</FONT></center></div> 
</form>
</body>
</html>
<?
function find_stock($p_id ,$div_id){
		$sql = "Select * from stock_card  where p_id = '$p_id' and status = 0
		and div_id = '$div_id'
		 group by id order by s_date desc ,id desc   limit 1";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[remain];
}

?>
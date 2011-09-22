
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
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="save" action=""  method="post" enctype="multipart/form-data">
<table width="50%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;ทะเบียนผู้ขอใช้บริการ</div>	</td>
	</tr>
</table>	</td>
	</tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="27%"><strong>&nbsp;&nbsp;เลขทะเบียน</strong></td>
                    <td  ><div><input type="text" size="10" name="mcode_1" value="<?=$mcode_1?>"  />- <input type="text" size="10" name="mcode_2"   value="<?=$mcode_2?>"/></div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
                    <td width="27%"><strong>&nbsp;&nbsp;ชื่อ - สกุล </strong></td>
			
            <td width="73%"><div><input type="text" size="15" name="name" value="<?=$name?>"  />- <input type="text" size="15" name="surn"  value="<?=$surn?>" /></div>				</td>
          </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>

	</td>
</tr>
</table>

<br>
 
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;ค้นหาข้อมูลผู้ขอใช้บริการ&nbsp;&nbsp;&nbsp;</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="13%"  height="31" align="center"><strong>เลขขอที่ใช้</strong></td>	
        <td width="12%"  height="31" align="center"><strong>คำนำหน้าชื่อ</strong></td>
		<td width="21%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
         <td width="14%"  align="center"><strong>วันที่ขอใช้</strong></td>
		 <td width="11%"  align="center"><strong>จำนวนถัง</strong></td>
		<td width="17%"  align="center"><strong>สถานะ</strong></td>
         <td width="12%"  align="center"><strong></strong></td>
          </tr>
		   <?

if($search <>''){

		$sql_1 =" Select  q.TMCODE,MCODE,q.mem_id,pren,name,surn,q.RDATE,HNO,HNO1,MOO,ROAD,
		SOI,q.HOCODE,TEL,LINE1,REGIEN,qty,amt,type1,status,honame,tmname
		from m_bin q,member m,house h,type_mem t 
		where q.mem_id = m.mem_id and q.hocode = h.hocode and t.tmcode = q.tmcode    ";
		if($mcode_1 <>'') $sql_1 .="  	and mid(MCODE,1,2) = '" .$mcode_1."'  ";
		if($mcode_2 <>'') $sql_1 .="  	and mid(MCODE,4) = '" .$mcode_2. "'  ";
		if($name  <> '' ) $sql_1 .=  " and m.name like   '%".$name."' ";
		if($surn  <> '' ) $sql_1 .=  " and m.surn like   '%".$surn."' ";
	 	$sql_1 .="  order by MCODE  ";


$Per_Page =20;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result_1= mysql_query($sql_1);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result_1);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))

print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql_1 .= " LIMIT $Page_start , $Per_Page";

}
$result_1 = mysql_query($sql_1);

?>
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}

if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	

?>       
<a href="?action=view_detail_mem&mcode=<?=$rs_1[MCODE]?>&mem_id=<?=$rs_1[mem_id]?>"  >  
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[pren]; ?></td>
<td  height="25"   align="left">&nbsp;<? echo $rs_1[name] ."  ".$rs_1[surn]; ?></td>
 <td  align="center">&nbsp;<?=date_2($rs_1[RDATE])  ?></td>
 <td > <div align="center">&nbsp;<? echo $rs_1[qty];  ?> </div></td>
 <td > <div align="center">&nbsp; <? if($rs_1[status] == 'ยกเลิก') echo "<font color=red>".$rs_1[status]."</font>";
 else  echo $rs_1[status] ?>   </div></td>
<td  align="center"><a href="?action=view_detail_mem&mcode=<?=$rs_1[MCODE]?>&mem_id=<?=$rs_1[mem_id]?>" >แก้ไข / ยกเลิก</a> </td></tr></a>

 <? 

	}
?>

        </table>
	  </td>
    </tr>
  </table>
<div align="center"><br>
<center>
  <FONT size="2" >มีจำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='?action=find_mem&search=$search&Page=$Prev_Page&mcode_1=$mcode_1&mcode_2=$mcode_2&name=$name&surn=$surn'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='?action=find_mem&search=$search&Page=$i&mcode_1=$mcode_1&mcode_2=$mcode_2&name=$name&surn=$surn'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='?action=find_mem&search=$search&Page=$Next_Page&mcode_1=$mcode_1&mcode_2=$mcode_2&name=$name&surn=$surn'> หน้าถัดไป>> </a>";

?>
<br />

</font>
</center>
</div>
</form>

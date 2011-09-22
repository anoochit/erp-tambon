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
<link href="style.css" rel="stylesheet" type="text/css"><body>
<form name="f12" method="post"  action=""   >
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle"><!--<img src="PNG-32/Bar Chart.png" align="absmiddle"> -->&nbsp;&nbsp;&nbsp;ค้นหา</div>	</td>
	</tr>
</table>	</td>
	</tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
                    <td width="16%"><strong>&nbsp;&nbsp;หมู่บ้าน</strong></td>
                    <td width="84%"><div><?
			$query  ="select * from house  order by HOCODE";
			$result=mysql_query($query);
			?><select name="HOCODE"  >
     <option value=''>----------ทั้งหมด----------</option> 
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[HOCODE];?>"
		<?
		if($HOCODE == $d[HOCODE]) echo "selected";
		?>
		><? echo $d[HONAME];?></option>
                        <? }?>
            </select></div>				</td>
          </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="16%"><strong>&nbsp;&nbsp;เดือน</strong></td>
                    <td  ><div><strong>
                      <select name="month" >
					  <? if($month=='') $month =date("m")?>
                        <option value="01" <? if($month =='01') echo "selected"?>>มกราคม </option>
                        <option value="02" <? if($month =='02') echo "selected"?>>กุมภาพันธ์ </option>
                        <option value="03" <? if($month =='03') echo "selected"?>>มีนาคม </option>
                        <option value="04" <? if($month =='04') echo "selected"?>>เมษายน </option>
                        <option value="05" <? if($month =='05') echo "selected"?>>พฤษภาคม </option>
                        <option value="06" <? if($month =='06') echo "selected"?>>มิถุนายน </option>
                        <option value="07" <? if($month =='07') echo "selected"?>>กรกฎาคม </option>
                        <option value="08" <? if($month =='08') echo "selected"?>>สิงหาคม </option>
                        <option value="09" <? if($month =='09') echo "selected"?>>กันยายน </option>
                        <option value="10" <? if($month =='10') echo "selected"?>>ตุลาคม </option>
                        <option value="11" <? if($month =='11') echo "selected"?>>พฤศจิกายน </option>
                        <option value="12" <? if($month =='12') echo "selected"?>>ธันวาคม </option>
                      </select>
                    &nbsp;&nbsp;ปี</strong>
                        <select name="year"><? if($year ==''  ) $year =(date("Y") + 543);?>
	<?
	for($i=-2;$i<=2;$i++){
	?>
	<option value="<?=date("Y") + 543+$i?>" <?	if($year ==(date("Y") + 543+$i) ) echo "selected" ;
	?>><?=date("Y") + 543+$i?></option>
	<?
	}
	?>
	</select></div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>
<br>
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
if($result1)
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#ffffff';
?>
 <? 
	}
?>
  </table>
  <br>
    <table  width="95%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;รายงานรายชื่อผู้ใช้บริการจัดเก็บขยะมูลฝอย (รายใหม่)</div></td>
        </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="9%"  height="31" align="center"><strong>ลำดับที่</strong></td>
		<td width="27%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
		<td width="13%"  height="31" align="center"><p><strong>เลขทะเบียน</strong><strong></strong></p></td>
         <td width="18%"  align="center"><p><strong>วันที่ขอรับบริการ</strong></p></td>
         <td width="11%"  align="center"><p><strong>บ้านเลขที่</strong></p></td>
		 <td width="10%"  align="center"><p><strong>หมู่</strong></p></td>
		 <td width="12%"  align="center"><p><strong>ปริมาณ(ลิตร)</strong></p></td>
		  <td width="10%"  align="center"><p><strong>ราคา(บาท)</strong></p></td>
	    </tr>
<?
if($search <>''){
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1 ="Select  m.mem_id,concat(pren,m.name,'   ',m.surn) as name, b.TMCODE,b.MCODE,b.mem_id,b.RDATE,b.HNO,b.HNO1,b.MOO,b.HOCODE,b.qty,b.amt,rec_id ,moo,trname
from type_rece t,member m,m_bin b left join receive m2 on b.MCODE = m2.MCODE 
where b.mem_id = m.mem_id  and cost = qty
and month(rdate) = '".$month."'  and year(rdate) = '".($year-543)."'  ";
    if($HOCODE  <> ""){ 	$sql_1.="and b.HOCODE = '".$HOCODE."'  "; }
$sql_1.=" group by b.MCODE order by rdate,MCODE ";
$Per_Page =10;
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
}
$result_1 = mysql_query($sql_1);
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
$total  = 0;
$total_qty = 0;
$total_total= 0;
$total_Find_Remain = 0;
$total_all = 0;
$total_Find_SumPay = 0;
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total_qty = $total_qty + $rs_1[qty];
	$total_total  = $total_total  + $rs_1[TOTAL];
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $i; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
  <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
 <td > <div align="center">&nbsp; <? echo substr($rs_1[RDATE],8,2)."  ".mounth3(substr($rs_1[RDATE],5, 2))."  ".(substr($rs_1[RDATE],0,4)+543); ?></div></td>
  <td > <div align="center">&nbsp;<?
 if ($rs_1[HNO1]==""or $rs_1[HNO1]=="-") { 
 echo $rs_1[HNO];
 }elseif ($rs_1[HNO]=="0"){ 
 echo "";
 }else{ 
 echo $rs_1[HNO]."/".$rs_1[HNO1];}
 ?></div></td>
 <td > <div align="center">&nbsp; <? echo ($rs_1[moo]);  ?></div></td>
  <td > <div align="center">&nbsp; <? echo ($rs_1[trname]);  ?></div></td>
  <td > <div align="center">&nbsp; <? echo ($rs_1[qty]);  ?></div></td>
 </tr>
 <? 
	}
?>
      </table>
	<table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">	  
<tr  width='70%' class="bmText"  bgcolor="#DEE4EB">
<td width="32%"  height="25"  align="left"><strong>&nbsp;&nbsp;จำนวนผู้ขอใช้ :: &nbsp; <?=$i ?> &nbsp; ราย</strong></td>
<td width="34%"  height="25"  align="left"><strong>&nbsp;&nbsp;</strong></td>
<td width="34%"  height="25"  align="left"><strong>&nbsp;&nbsp;รวมเป็นเงิน :: &nbsp; <?=number_format($total_qty*MONEY())?> &nbsp; บาท</strong></td>
</tr>
</table>	
	  </td>
    </tr>
 </table>
</form>
<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report12.php?month=<?=$month?>&year=<?=$year?>&hocode=<?=$HOCODE ?>&honame=<?=$d[HONAME]?>')"/ class="buttom">
</center></div> 
</body>
</html>

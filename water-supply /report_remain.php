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
<link href="style2.css" rel="stylesheet" type="text/css"><body>
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
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;ค้นหา</div>	</td>
	</tr>
</table>	</td>
	</tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="16%"><strong>&nbsp;&nbsp;เดือน</strong></td>
                    <td  ><div><strong><select name="month" >
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
            </select>&nbsp;&nbsp;ปีงบประมาณ</strong>
			<? $queryMyear  ="select myear from start ";
			$result_Myear=mysql_query($queryMyear);
			if($result_Myear)
			$Myear =mysql_fetch_array($result_Myear);
			?>
            <select name="year"><? if($year ==''  ) $year = $Myear[myear];?>
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
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  ><table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
      <tr class="lgBar">
        <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;รายงานสรุปค่าธรรมเนียมค้างชำระประจำเดือน</div></td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="6%"  height="31" align="center"><strong>หมู่ที่</strong></td>
        <td width="14%"  height="31" align="center"><strong>ชื่อหมู่บ้าน</strong></td>
        <td width="12%"  height="31" align="center"><strong>จำนวนราย</strong></td>
        <td width="13%"  align="center"><strong>จำนวนบิล</strong></td>
        <td width="13%"  align="center"><strong>จำนวนเงิน (บาท)</strong></td>
		<td width="13%"  align="center"><strong>รายละเอียด</strong></td>
      </tr>
<?
if($search <>''){
if($month  <> '' and $month <=9 ){
$p_date_1 = ($year-543)."-".$month."-"."31";
$YY=$year;
}else{
$p_date_1 = (($year-1)-543)."-".$month."-"."31";
$YY=$year-1;
}
$sql_1=" select hocode,honame, if(count(rec_id)is null,'0',count(rec_id)) as total1 , 
if(sum(sum_m)is null,'0',sum(sum_m)) as total2 from house left join meter on hocode = mid(mcode,1,2) 
 and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ')" ;
$sql_1.= "or p_date > '".$p_date_1."' )  " ; 
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
if($month  <> '' and $monthh <=9 ){		 
            $sql_1.= " and ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
}elseif($month  <> '' and $monthh > 9 ){	
            $sql_1.= " and ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
}
if($month  <> '' ) $sql_1 .=  " or  myear < '" .$year. "' ";
 $sql_1 .=  "  ) group by HOCODE order by HOCODE    ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
$total  = 0;
$sumtotal1  = 0;
$sumtotal2  = 0;
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#ffffff';
		$sumtotal1 = $sumtotal1  + $rs_1[total1];
		$sumtotal2  = $sumtotal2  + $rs_1[total2];
		$total_mem  = $total_mem  +  Find_mem($rs_1[hocode],$year,$month);
?>
      <tr class="bmText" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center"><font size="1">&nbsp;<font size="1"><? echo $rs_1[hocode]; ?></font></font></td>
        <td  height="25"   align="left"><font size="1">&nbsp;<font size="1"><? echo $rs_1[honame]; ?></font></font></td>
        <td  height="25"  align="center"><font size="1">&nbsp;<? echo Find_mem($rs_1[hocode],$year,$month); ?></font></td>
        <td  align="center"><font size="1">&nbsp;<? echo number_format($rs_1[total1]); ?></font></td>
        <td  align="center"><font size="1">&nbsp;
              <?=number_format($rs_1[total2],2);?>
        </font></td>
         <td  align="center"><a href="report_remain2.php?hocode=<?=$rs_1[hocode]?>&honame=<?=$rs_1[honame]?>&month=<?=$month?>&year=<?=$year?>&YY=<?=$YY?>"   target="_blank">รายละเอียด</a></td>
      </tr>
      <? 
	}}
?>
<tr class="bmText" bgcolor="#DEE4EB" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center"><strong>รวม</strong></td>
        <td  height="25"   align="left"></td>
        <td  height="25"  align="center"><strong><?=number_format($total_mem)?></strong></td>
        <td  align="center"><strong><?=number_format($sumtotal1)?></strong></td>
        <td  align="center"><strong><?=number_format($sumtotal2,2)?></strong></td>
         <td  align="center"><a href="report_remain2.php?hocode=<?=$rs_1[hocode]?>&honame=<?=$rs_1[honame]?>&month=<?=$month?>&year=<?=$year?>"   target="_blank"></a></td>
      </tr>
    </table></td>
    </tr>
  </table>
</form>
<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report2.php?month=<?=$month?>&year=<?=$year?>&year2=<?=$Yr?>')"/ class="buttom">
</FONT></center></div> 
</body>
</html>
<?
function Find_mem($hocode,$year,$month){
			$p_date_1 = ($year-543)."-".$month."-"."31";
             $sql_2=" select sum_m ,if(count(mem_id) is null,'0',count(mem_id))as total3 , mem_id from meter m ,q_water q 
        Where Mid(m.Mcode, 1, 2) = '".$hocode."' 
        and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status is not null and rec_status <> 'ยกเลิก' )
        or p_date > '".$p_date_1."'  ) and m.mcode = q.mcode " ;
		if($month  <> '' and $month <=9 ){		 
					$sql_2.= " and ((myear = '" .$year. "' and monthh < ".$month.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
		}elseif($month  <> '' and $month > 9 ){	
					$sql_2.= " and ((myear = '".$year."' and monthh >= 10 and monthh < ".$month.") ";
		}
		if($month  <> '' ) $sql_2 .=  " or  myear < '" .$year. "' ";
		 $sql_2 .=  "  ) group by mem_id order by m.mcode ";
		$result_2 = mysql_query($sql_2);
		if($result_2)
		$rs_2=mysql_fetch_array($result_2);
		return mysql_num_rows($result_2);
}
?>
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
		<div > <img src="images/Search.png" align="absmiddle"><!--<img src="PNG-32/Bar Chart.png" align="absmiddle"> -->&nbsp;&nbsp;&nbsp;ค้นหา</div>	</td>
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
			//echo $Myear[myear];
			?>
            <select name="year"><? if($year ==''  ) $year =$Myear[myear];?>
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
        <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;<strong>รายงานสรุปการยอดตั้งเก็บประจำเดือน</strong></div></td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="6%"  height="31" align="center"><strong>หมู่ที่</strong></td>
        <td width="24%"  height="31" align="center"><strong>ชื่อหมู่บ้าน</strong></td>
        <td width="9%"  height="31" align="center"><strong>ค่าเช่ามาตร</strong></td>
        <td width="9%"  align="center"><strong>ค่าน้ำ</strong></td>
        <td width="12%"  align="center"><strong>ค่าภาษี</strong></td>
		<td width="12%"  align="center"><strong>รวมเป็นเงิน</strong></td>
		<td width="12%"  align="center"><strong>จำนวนราย</strong></td>
		<td width="8%"  align="center"><strong>ออกบิล</strong></td>
		<td width="8%"  align="center"><strong>ยกเลิก</strong></td>
      </tr>
<?
if($search <>'')
$summem = 0;
$stotal1 = 0;
$stotal2 = 0;
$stotal3 = 0;
$stotal4 = 0;
$stotal5 = 0;
$stotal6 = 0;
$stotal7 = 0;
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1="select mid(mcode,1,2) as mcode, honame, sum(sum_m)as stotal ,sum(vat) as vat,sum(total) as total,sum(m_amt) as m_amt
 from meter, house where rec_status is not null and rec_status <> 'ยกเลิก' 
	and hocode = mid(mcode,1,2) and myear = '" .$year. "' and monthh = ".$month."
	group by mid(mcode,1,2) order by mid(mcode,1,2) ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
		    /////////////////////////////////////////////////////////////////////
				$sql="select if (count(rec_id) is null,0,count(rec_id)) as countr   from meter where myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[mcode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก' 
			    group by mid(mcode,1,2) ";
				$result = mysql_query($sql);
				if($result)
				while($rs=mysql_fetch_array($result)){
							////////////////////////////////////////////////////////////////////////
				$sql2=" select count(mid(mcode,1,2)) as droupm ,HOCODE 
				FROM house left join cancel_reg on HOCODE =  mid(mcode,1,2)
				and  cyear = '" .$year. "' and cmonth = ".$month."
    			where  HOCODE = '" .$rs_1[mcode]."' group by HOCODE  ";
				$result2= mysql_query($sql2);
				if($result2)
				while($rs2=mysql_fetch_array($result2)){
				$summem =  $rs[countr]-$rs2[droupm];
				$stotal1 =  $stotal1 +$rs_1[m_amt];
				$stotal2 =  $stotal2 +$rs_1[total];
				$stotal3 =  $stotal3 +$rs[countr];
				$stotal4 =  $stotal4 +$summem;
				$stotal5 =  $stotal5 +$rs2[droupm];
			    $stotal6 =  $stotal6 +$rs_1[vat];
				$stotal7 =  $stotal7 +$rs_1[stotal];
			?>
 <tr class="bmText" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center"><font size="1">&nbsp;<? echo $rs_1[mcode]; ?></font></td>
        <td  height="25"   align="left"><font size="1">&nbsp;<? echo $rs_1[honame]; ?></font></td>
		<td  align="center"><font size="1">&nbsp;<? echo number_format($rs_1[m_amt],2); ?></font></td>
        <td  align="center"><font size="1">&nbsp;<? echo number_format($rs_1[total],2);?> </font></td>
		<td  align="center"><font size="1">&nbsp;<? echo number_format($rs_1[vat],2); ?></font></td>
		<td  height="25"  align="center"><font size="1">&nbsp;<? echo number_format($rs_1[stotal],2); ?></font></td>
		<td  align="center"><font size="1">&nbsp;<? echo number_format($rs[countr]); ?></font></td>
        <td  align="center"><font size="1">&nbsp;<? echo number_format($summem);?> </font></td>
        <td  align="center"><font size="1">&nbsp;<? echo number_format($rs2[droupm]);?></font></td>
		  </tr>
			<?
			   }}}
			   ?>
      <tr class="bmText" bgcolor="#DEE4EB"  onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<strong>รวม</strong></td>
        <td  height="25"   align="left">&nbsp;</td>
        <td  height="25"  align="center"><? echo number_format($stotal1,2); ?></td>
        <td  align="center"><? echo number_format($stotal2,2); ?></td>
        <td  align="center"><? echo number_format($stotal6,2); ?></td>
		<td  align="center"><? echo number_format($stotal7,2); ?></td>
		<td  align="center"><? echo number_format($stotal3); ?></td>
		<td  align="center"><? echo number_format($stotal4); ?></td>
		<td  align="center"><? echo number_format($stotal5); ?></td>
      </tr>
    </table></td>
    </tr>
  </table>
</form>
<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report5.php?month=<?=$month?>&year=<?=$year?>&year2=<?=$Yr?>')"/ class="buttom">
</FONT></center></div> 
</body>
</html>

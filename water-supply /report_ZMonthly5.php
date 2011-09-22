
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
	<tr align="left"  bgcolor="#DEE4EB">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;ค้นหา</div>	</td>
	</tr>
</table>	</td>
	</tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
	<tr class="bmText" height="25">
                    <td width="16%"><strong>&nbsp;&nbsp;หมู่บ้าน</strong></td>
			
                    <td width="84%"><div><?
			$query  ="select * from house  order by HOCODE";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?><select name="HOCODE"  >
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
              <option value="11" <? if($month =='11') echo "selected"?>>พศจิกายน </option>
              <option value="12" <? if($month =='12') echo "selected"?>>ธันวาคม </option>
            </select>&nbsp;&nbsp;ปีงบประมาณ</strong>
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
 <table  width="93%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  ><table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
      <tr class="lgBar"  bgcolor="#DEE4EB">
        <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;<strong>รายงานสรุปการยอดตั้งเก็บประจำเดือน</strong></div></td>
      </tr>
	  <?
$sqlM="select honame  from house  where hocode = ".$HOCODE." "; 
$resultM = mysql_query($sqlM);
if ($resultM)
$rsM=mysql_fetch_array($resultM) ;
$honame = $rsM[honame];
?>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="6%"  height="31" align="center"><strong>เขตที่</strong></td>
        <td width="24%"  height="31" align="center"><strong>ชื่อเขต</strong></td>
        <td width="9%"  height="31" align="center"><strong>ค่าเช่ามาตร</strong></td>
        <td width="9%"  align="center"><strong>ค่าน้ำ</strong></td>
        <td width="12%"  align="center"><strong>ค่าภาษี</strong></td>
		<td width="12%"  align="center"><strong>รวมเป็นเงิน</strong></td>
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
$sql_1=" select mid(mcode,1,2) as mcode, z_id,z_name, sum(sum_m)as stotal ,sum(vat) as vat,
sum(total) as total,sum(m_amt) as m_amt
from  (house h,zone z)left join meter on z_id = mid(mcode,3,1)
and z.hocode = mid(mcode,1,2) 
and rec_status is not null  and rec_status <> 'ยกเลิก'
and myear =  '" .$year. "' and monthh =  ".$month."
where z.hocode = '" .$HOCODE. "' and h.hocode = z.hocode
group by z_id order by z_id  ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
				$summem =  $rs[countr]-$rs2[droupm];
				$stotal1 =  $stotal1 +$rs_1[m_amt];
				$stotal2 =  $stotal2 +$rs_1[total];
			    $stotal6 =  $stotal6 +$rs_1[vat];
				$stotal7 =  $stotal7 +$rs_1[stotal];
			?>
 <tr class="bmText" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center"><font size="1">&nbsp;<? echo $rs_1[z_id]; ?></font></td>
        <td  height="25"   align="left"><font size="1">&nbsp;<? echo $rs_1[z_name]; ?></font></td>
		<td  align="center"><font size="1">&nbsp;<? echo number_format($rs_1[m_amt],2); ?></font></td>
        <td  align="center"><font size="1">&nbsp;<? echo number_format($rs_1[total],2);?> </font></td>
		<td  align="center"><font size="1">&nbsp;<? echo number_format($rs_1[vat],2); ?></font></td>
		<td  height="25"  align="center"><font size="1">&nbsp;<? echo number_format($rs_1[stotal],2); ?></font></td>
		
		  </tr>
			<?
			   }
			   ?>
      <tr class="bmText" bgcolor="#DEE4EB" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe' " onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''" >
        <td  height="25"  align="center">&nbsp;<strong>รวม</strong></td>
        <td  height="25"   align="left">&nbsp;</td>
        <td  height="25"  align="center"><? echo number_format($stotal1,2); ?></td>
        <td  align="center"><? echo number_format($stotal2,2); ?></td>
        <td  align="center"><? echo number_format($stotal6,2); ?></td>
		<td  align="center"><? echo number_format($stotal7,2); ?></td>
		
      </tr>
     


    </table></td>
    </tr>
  </table>
</form>
<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report20.php?month=<?=$month?>&year=<?=$year?>&year2=<?=$Yr?>&HOCODE=<?=$HOCODE?>&honame=<?=$honame?>')"/ class="buttom">
</FONT></center></div> 
</body>
</html>

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
        <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;<strong>รายงานสรุปการใช้ใบเสร็จ</strong></div></td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="6%"  height="31" align="center"><strong>หมู่ที่</strong></td>
        <td width="14%"  height="31" align="center"><strong>ชื่อหมู่บ้าน</strong></td>
        <td width="12%"  height="31" align="center"><strong>เล่มที่ใบเสร็จ</strong></td>
        <td width="13%"  align="center"><strong>เลขที่ใบเสร็จ</strong></td>
        <!--<td width="13%"  align="center"><strong>จำนวนถัง</strong></td> -->
		<td width="13%"  align="center"><strong>จำนวนราย</strong></td>
		<td width="13%"  align="center"><strong>จำนวนเงิน</strong></td>
      </tr>
	  <?
if($search <>'')
$sumtotal1 = 0;
$sumtotal2=0;
$sumtotal3=0;
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1="select hocode, honame from house  order by HOCODE";
$result_1 = mysql_query($sql_1);
while($rs_1=mysql_fetch_array($result_1)){
		    /////////////////////////////////////////////////////////////////////
				$sql="select mid(rec_id,1,4) as rec1 from receive where myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[hocode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก'  group by mid(rec_id,1,4)";
				$result = mysql_query($sql);
				if ($result )
				while($rs=mysql_fetch_array($result)){
			////////////////////////////////////////////////////////////////////////".MONEY()."
				$sql2=" select min(rec_id) as minrec, max(rec_id) as maxrec, sum(total)/amt_1 as stotal1,sum(total) as stotal2 from receive 
				where rec_id like '" .$rs[rec1]. "%' and myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[hocode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก'  ";
				$result2= mysql_query($sql2);
				while($rs2=mysql_fetch_array($result2)){
		   ////////////////////////////////////////////////////////////////////////
				$sql3=" select  count(rec_id) as summem  from receive 
				where  rec_id like '" .$rs[rec1]. "%'  and myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[hocode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก' group by mid(rec_id,1,4)";
				$result3 = mysql_query($sql3);
				while($rs3=mysql_fetch_array($result3)){
				$sumtotal1 = $sumtotal1 + $rs2[stotal1];
				$sumtotal2 = $sumtotal2 +$rs3[summem];
			    $sumtotal3 = $sumtotal3 + $rs2[stotal2];		
		?>
	 <tr class="bmText" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center"><font size="1">&nbsp;<font size="1"><? echo $rs_1[hocode]; ?></font></font></td>
        <td  height="25"   align="left"><font size="1">&nbsp;<font size="1"><? echo $rs_1[honame]; ?></font></font></td>
		<td  height="25"   align="center"><font size="1">&nbsp;<font size="1"><? echo $rs[rec1]; ?></font></font></td>
		<td  height="25"  align="center"><font size="1">&nbsp;<font size="1">
		<?  if($rs2[minrec]  == $rs2[maxrec]){		 
             echo substr($rs2[minrec],5); 
}else{	
            echo substr($rs2[minrec],5)."-" .substr($rs2[maxrec],5);
}
		?></font></font></td>
        <td  align="center"><font size="1">&nbsp;<? echo $rs3[summem]; ?></font></td>
        <td  align="center"><font size="1">&nbsp;<?=number_format($rs2[stotal2]);?></font></td>
		  </tr>
			<?
			   }}}}
			   ?>
      <tr class="bmText"  onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<strong>รวม</strong></td>
        <td  height="25"   align="left"></td>
        <td  height="25"  align="center"></td>
        <td  align="center">&nbsp;</td>
		<td  align="center">&nbsp;<strong><?=number_format($sumtotal2)?></strong></td>
		<td  align="center">&nbsp;<strong><?=number_format($sumtotal3)?></strong></td>
      </tr>
        </table></td>
    </tr>
  </table>
</form>
<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report3.php?month=<?=$month?>&year=<?=$year?>&year2=<?=$Yr?>&Sumbin=<?=number_format($sumtotal1)?>&SumMoney=<?=number_format($sumtotal3)?>')"/ class="buttom">
</FONT></center></div> 
</body>
</html>

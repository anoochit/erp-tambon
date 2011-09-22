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
                    &nbsp;&nbsp;ปีงบประมาณ</strong>
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
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;รายงานยกเลิกใบเสร็จค่าขยะมูลฝอย</div></td>
        </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="8%"  height="31" align="center"><strong>ลำดับที่</strong></td>
		<td width="12%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
		<td width="16%"  height="31" align="center"><p><strong>เลขที่ใบเสร็จ</strong></p></td>
         <td width="64%"  align="center"><p><strong>หมายเหตุ</strong></p></td>
  </tr>
<?
if($search <>''){
 $ex2 = substr($month,0,1);
 if($ex2 =='0')$monthh  = substr($month ,1);	
else $monthh = $month ;	
				
$sql_1 ="Select  MCODE,rec_id,if(num_id is null,'',num_id) as num_id,memo  from receive  where p_num > 1 
and monthh = '".$monthh."'  and  myear = '".($year)."' 
 order by MCODE,rec_id ";
$result_1= mysql_query($sql_1);
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
  <td  height="25"   align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"  align="center">&nbsp;<? echo $rs_1[rec_id]; ?></td>
 <td  align="left">&nbsp;&nbsp;&nbsp;<? echo $rs_1[memo];?></td>
 </tr>
 <? 
	}}
?>
      </table>
	<table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">	  
<tr  width='70%' class="bmText"  bgcolor="#DEE4EB">
<td  height="25"  align="left"><strong>&nbsp;&nbsp;รวม :: &nbsp; <?=$i ?> &nbsp; รายการ</strong></td>
</tr>
</table>	
	  </td>
    </tr>
 </table>
</form>
<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report14.php?month=<?=$month?>&year=<?=$year?>')"/ class="buttom">
</center></div> 
</body>
</html>
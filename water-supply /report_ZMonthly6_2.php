<? ob_start();?>
<?
session_start();
include('config.inc.php');
//include('function.php');
?>
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
<style type="text/css">
<!--
.header {
	color: #000000;
	font-size:14px;
	font-family: tahoma;
	font-weight: bold;
}
.body1{
	color: #000000;
	font-family: tahoma;
	font-size:13px;
}
-->
</style>
<body>
<form name="f12" method="post"  action=""   >
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  </table>
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  
  </table>
  <? //หาชื่อเขต
$sqlM="select z_name,honame  from zone z,house h  where h.hocode = z.hocode and h.hocode = ".$HOCODE." and z_id =  ".$ZID."  "; 
$resultM = mysql_query($sqlM);
if ($resultM)
$rsM=mysql_fetch_array($resultM) ;
$Zname = $rsM[z_name];
$honame = $rsM[honame];
///////////////ปีจริง////////////////////
if ($month2 == '10' or $month2 == '11' or $month2 == '12' ) {
				$Y1=$year2-1;
}else{
				$Y1=$year2;
}
?>
  <?
	
$p_date_1 = ($year-543)."-".$month."-"."31"; 
$sql_1="select r.mcode, concat(pren,name,' ',surn) as name1, concat(hno1,'/',hno) as addr1, rec_id, sum_m, rec_date,r.monthh ,r.myear,
			total,m_amt,vat
            from q_water b, member m, meter r  where r.mcode = b.mcode and b.mem_id = m.mem_id 
            and mid(r.mcode,1,2) = '" .$HOCODE."'  and mid(r.mcode,3,1) = '" .$ZID."'
			and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' ) 
            or  p_date >'".$p_date_1."' ) and ";
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
				if ($monthh == '10' or $monthh == '11' or $monthh == '12' ) {
							$Yr = ($year+1);
				}else{
							$Yr = ($year);
				}		

		if($month  <> '' and $monthh <=9 ){		 
            $sql_1.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
		}elseif($month  <> '' and $monthh >9 ){	
            $sql_1.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
		}
if($month  <> '' ) $sql_1 .=  " or myear < '" .$year. "' ";
 $sql_1 .=  "  )  and monthh = ".$month2."  and  myear = '".$year2."' order by rec_date, r.mcode   ";	
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

$result_1 = mysql_query($sql_1);

?>
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" ><table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
      <tr class="header">
        <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;ข้อมูลบิลค้างชำระ หมู่ที่
          <?=$HOCODE."    " .$honame?>&nbsp;เขต&nbsp;<?=$ZID."    " .$Zname?>&nbsp;ประจำเดือน&nbsp;<?=mounth3($month2)."  ".$Y1?>
        </div></td>
      </tr>
      <tr class="body1"  bgcolor="#DEE4EB">
        <td width="5%"  height="31" align="center"><strong>ที่</strong></td>
        <td width="8%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
        <td width="17%"  height="31" align="center"><p><strong>ชื่อ - สกุล</strong></p></td>
        <td width="6%"  align="center"><strong>บ้านเลขที่</strong></td>
        <td width="8%"  align="center"><strong>เลขที่บิล</strong></td>
        <td width="11%"  align="center"><p><strong>วันที่ออก</strong></p>
            <p><strong>ใบเสร็จ</strong></p></td>
        <td width="8%"  align="center"><strong>ค่ามาตร</strong></td>
        <td width="9%"  align="center"><strong>ค่าน้ำ</strong></td>
        <td width="8%"  align="center"><strong>ค่าภาษี</strong></td>
        <td width="10%"  align="center"><p><strong>รวมเป็นเงิน</strong></p>
        <td width="10%"  align="center"><p><strong>ประจำเดือน</strong><strong></strong></p></td>
      </tr>
      <?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}

$total1  = 0;
$total2  = 0;
$total3  = 0;
$total_total= 0;
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total1  = $total1  + ($rs_1[m_amt]);
	$total2  = $total2 + ($rs_1[total]);
	$total3  = $total3  + ($rs_1[vat]);
	$total_total  = $total_total  + $rs_1[sum_m];

?>
      <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<? echo $i; ?></td>
        <td  height="25"   align="center">&nbsp;<? echo $rs_1[mcode]; ?></td>
        <td  height="25"  align="left">&nbsp;<? echo $rs_1[name1]; ?></td>
        <td  align="center">&nbsp;
            <?=$rs_1[addr1];  ?></td>
        <td  align="center">&nbsp;
            <?=$rs_1[rec_id];  ?></td>
        <td ><div align="center">&nbsp; <? echo date_2($rs_1[rec_date]);  ?> </div></td>
        <td ><div align="center">&nbsp;<? echo number_format($rs_1[m_amt],2);  ?></div></td>
        <td ><div align="center">&nbsp;<? echo number_format($rs_1[total],2) ;  ?> </div></td>
        <td ><div align="center">&nbsp;<? echo number_format($rs_1[vat],2);  ?></div></td>
		<td ><div align="center">&nbsp; <? echo number_format($rs_1[sum_m],2);  ?> </div></td>
        <td ><div align="center">&nbsp;<?
			if ($rs_1[monthh] == '10' or $rs_1[monthh] == '11' or $rs_1[monthh] == '12' ) {
				echo mounth2($rs_1[monthh])."  ".substr($rs_1[myear]-1,2);
			}else{
				echo mounth2($rs_1[monthh])."  ".substr($rs_1[myear],2);
			}		
		?></div></td>

      </tr>
      <? 

	}
?>
      <tr class="body1"  bgcolor="#DEE4EB">
        <td  height="25"  align="center"><strong>รวม</strong></td>
        <td  height="25"   align="center">&nbsp;</td>
        <td  height="25"  align="center"><strong>&nbsp;<? echo number_format($i)?>&nbsp;รายการ</strong></td>
        <td  align="center">&nbsp;</td>
        <td  align="center">&nbsp;</td>
        <td  align="center">&nbsp;<strong></strong></td>
        <td  align="center">&nbsp;<strong><?=number_format($total1,2)?></strong></td>
        <td  align="center">&nbsp;<strong><?=number_format($total2,2)?></strong></td>
		 <td  align="center">&nbsp;<strong><?=number_format($total3,2)?></strong></td>
        <td  align="center">&nbsp;<strong><?=number_format($total_total,2)?></strong></div></td>
        <td align="center">&nbsp;</div></td>
      </tr>
    </table></td>
    </tr>
  </table>
</form>
<div align="center">

</center></div> 
</body>
</html>
<?
function Find_Remain($mcode,$year,$month){

		$p_date_1 = ($year-543)."-".$month."-"."31";
        $sql =  "select sum(sum_m)as sum_m  from meter m  where mcode = '".$mcode."' and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' ) or  p_date >'".$p_date_1."' )and mid(mcode,1,2) = '" .$HOCODE."' and mid(mcode,3,4) = '" .$ZID."'and  ";
		$ex = substr($month,0,1);
		if($ex =='0') $monthh = substr($month,1);	
		else $monthh = $month;	 
		if($month  <> '' and $monthh <=8 ){		 
				$sql .=  " ((myear =  '".$year. "' and monthh <  ".$monthh.")  or (myear =  '" .$year. "' and monthh >= 10 and monthh <=12) ";
		}elseif($month  <> '' and $monthh > 8 ){	
				$sql .=  "  and ((myear =  '".$year. "'  and monthh >= 10 and monthh < ".$monthh.") ";
		}
		$sql .=  " or myear <  '".$year. "')  ";
		$sql .=  " group by mcode  order by rec_date, mcode ";
		$result = mysql_query($sql);
		$rs_1=mysql_fetch_array($result);
		return $rs_1[sum_m];
}


function Find_SumPay($mcode,$year,$month){

		$p_date_1 = ($year-543)."-".$month."-"."31";
		if($month == 12){ 	// ถ้าเป็นเดือนธันวาคน
				$MMM = ($year - 542) . "-01-%"; 
		}else  {
				$MMM = ($year - 543). "-";
				if(strlen(($month+1)) == 1 ) $MMM .= "0".($month+1);
				else $MMM .= $month+1;
				 $MMM .= "-%";
		}
		 // ถ้าเป็นเดือนอื่นๆ บวกอีก 1 เพื่อนเป็นเดือนถัดไป

        $sql =  "select mcode,mid(p_date,1,7),sum(sum_m) as T,p_date from meter m 
            where p_date like '" .$MMM ."' and mcode = '" .$mcode. "' and rec_status is not null and rec_status <> 'ยกเลิก' 
			group by mid(mcode,1,2) order by mcode   ";
		$result = mysql_query($sql);
		$rs_1=mysql_fetch_array($result);
		return $rs_1[T];
}
?>
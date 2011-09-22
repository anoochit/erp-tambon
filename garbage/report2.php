<? ob_start();?>
<?
session_start();
include('config.inc.php');
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
<link href="style.css" rel="stylesheet" type="text/css">
<body>
<form name="f12" method="post"  action=""   >
<?
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1="select hocode,honame, if(sum(total)is null,'0',sum(total)/amt_1) as total1 , if(sum(total) is null,'0',sum(total)) as total2  ,  if(sum(amt_1)is null,'0',amt_1) as amt_1
, if(count(rec_id)is null,'0',count(rec_id)) as numR from house left join receive on hocode = mid(mcode,1,2) 
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
 $sql_1 .=  "  ) group by HOCODE   ";
$result_1 = mysql_query($sql_1);
?>
  <table  width="90%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
  <td>
  <table width="100%" cellspacing="0"  cellpadding="0" border="0"  style="border-collapse:collapse;">
			 <tr>
            <td  height="42">&nbsp;รายงานสรุปค่าธรรมเนียมขยะมูลฝอยค้างชำระประจำเดือน <strong>
              <?=mounth3($monthh)?>&nbsp;<?=$year?>
            </strong>
<div align="center" class="style1"></div></td>
            </tr>
						 <tr>
            <td width="890"  height="15"><hr></td>
            </tr>

        </table>		
  </td></tr>
  <tr>
    <td height="160"  colspan="2"   ><table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
      <tr >
        <td  height="40" colspan="14"><div  align="left">&nbsp;&nbsp;งานด้านพัฒนาและจัดเก็บรายได้   รายงานสรุปยอดคงเหลือค้างชำระแต่ละหมู่ดังนี้</div></td>
      </tr>
      
      <?
$total  = 0;
$sumtotal1  = 0;
$sumtotal2  = 0;
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){

	$i++;
		$sumtotal1 = $sumtotal1  + $rs_1[total1];
		$sumtotal2  = $sumtotal2  + $rs_1[total2];
	 /////////////เช็คหมู่//////////////////
			 $moo1 = substr($rs_1[hocode],0,1);
			 if($moo1=='0') $moo2 = substr($rs_1[hocode],1);
			else $moo2 = $rs_1[hocode];	 
			$amt_1 = $rs_1[amt_1];
?>
      <tr >
        <td width="33%"  height="31"  align="left">&nbsp;&nbsp;&nbsp;&nbsp;<strong>หมู่ที่</strong>&nbsp;&nbsp;<? echo $moo2;?>&nbsp;<? echo $rs_1[honame] ?></td>
        <td width="10%"  height="31"  align="center">จำนวน</td>
	    <td width="15%"  height="31"  align="center">&nbsp;<? if($rs_1[numR]>0){
		echo $rs_1[numR];
		}else{
		echo "-"; }?></td>
        <td width="6%"  align="center">บิล</td>
        <td width="10%"  align="center">เป็นเงิน</td>
         <td width="16%"  align="center">&nbsp;<? if($rs_1[total2] >0){ echo number_format($rs_1[total2]);
		 }else{ echo "-"; }?></td>
		 <td width="10%"  align="center">บาท</td>
      </tr>
  <? } ?>
<tr>
        <td  height="31"  align="center"><strong>รวม</strong></td>
        <td  height="31"  align="center"><strong>จำนวน</strong></td>
        <td  height="31"  align="center"><strong>&nbsp;<?=number_format($sumtotal1)?></strong></td>
        <td  align="center">บิล</td>
		<td  align="center"><strong>เป็นเงิน</strong></td>
        <td  align="center"><strong>&nbsp;<?=number_format($sumtotal2)?></strong></td>
        <td  align="center"><strong>บาท</strong></td>
      </tr> 
    </table>
    </td>
    </tr>
  </table>
</form>
</body>
</html>
<?
function Find_Remain($mcode,$year,$month){
		$p_date_1 = ($year-543)."-".$month."-"."31";
        $sql =  "select sum(total)as total  from receive m  where mcode = '".$mcode."' and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' ) or  p_date >'".$p_date_1."' ) and  ";
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
		return $rs_1[total];
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
        $sql =  "select mcode,mid(p_date,1,7),sum(total) as T,p_date from receive m 
            where p_date like '" .$MMM ."' and mcode = '" .$mcode. "' and rec_status is not null and rec_status <> 'ยกเลิก' 
			group by mid(mcode,1,2) order by mcode   ";
		$result = mysql_query($sql);
		$rs_1=mysql_fetch_array($result);
		return $rs_1[T];
}
?>
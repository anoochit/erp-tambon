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
///////////////////////หาเลขที่ใบเสร็จ//////////////////////////////
$sql_1="select if(max(rec_id) is null,'',max(rec_id)) as maxrecid, if(min(rec_id) is null,'',min(rec_id)) as minrecid
			, if(sum(total) is null,'0',sum(total)) as sumtotal ,if(sum(total) is null,'0',sum(total)/amt_1) as sumqty, if(count(rec_id) is null,'0',count(rec_id)) as numR 
    		from receive where 1=1 "; 
    $ex = substr($month,0,1);
	if($ex =='0') $monthh = substr($month,1);	
	else $monthh = $month;	 
	if ($month == '10' or $month == '11' or $month == '12' ) {
							$Yr = ($year-1);
				}else{
							$Yr = ($year);
				}		
					if($month  <> '' and $month =='12' ){	
					    $ex2 = "01";
						$p_date_1 = ($Yr-542)."-".($ex2)."-";
				}else if ($month  <> '' and $month<'12' ){	
		        $ex2 = $month+1;
			    if($ex2 =='0') $ex2 = substr($ex2,1);	
				else $ex2 = $ex2;	
				$ex2 ="0".$ex2 ;
		    	if (strlen($ex2) =='3') $ex2 = substr($ex2,1);	
				 else $ex2 =$ex2;	
							$p_date_1 = ($Yr-543)."-".($ex2)."-";
				}
 $sql_1.= "  and myear = '".$year."' and monthh = ".$monthh." ";
 $sql_1 .= "and rec_status <> 'ยกเลิก' ";
$result_1 = mysql_query($sql_1);
if($result_1)
$rs1 =mysql_fetch_array($result_1);
///////////////////////หาจำนวนถัง / จำนวนเงินคงค้าง//////////////////////////////
$sql="select  if(sum(total)is null,'0',sum(total)/amt_1) as total1 , if(sum(total) is null,'0',sum(total)) as total2 , if(count(rec_id) is null,'0',count(rec_id)) as numR 
 from house left join receive on hocode = mid(mcode,1,2) 
 and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ')" ;
			$p_date_4 = ($Yr-543)."-".($monthh)."-31";	
			$sql.= "or p_date > '".$p_date_4."' )  and " ; 
						if($month  <> '' and $monthh <=9 ){		 
							$sql.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}if($month  <> '' ) $sql .=  " or  myear < '" .$year. "' )";
$result2 = mysql_query($sql);
if($result2)
$rs2 =mysql_fetch_array($result2);
///////////////////////หาจำนวนถัง / จำนวนเงินในเดือน(เก็บได้)//////////////////////////////
$sql3="select  if(sum(total)is null,'0',sum(total)/amt_1) as total3 , if(sum(total) is null,'0',sum(total)) as total4 , if(count(rec_id) is null,'0',count(rec_id)) as numR 
 from  receive where 1=1 ";
$p_date_2 = ($Yr-543)."-".$monthh."-"."01"; 
$p_date_3 = ($Yr-543)."-".$monthh."-"."31"; 
$sql3 .=  "and myear = '".$year."' and monthh = ".$monthh." ";
$sql3 .= "and p_date between date_add('".$p_date_2."', INTERVAL 1 MONTH) and date_add('".$p_date_3."', INTERVAL 1 MONTH) and rec_status <> 'ยกเลิก'" ;
$result3 = mysql_query($sql3);
if($result3)
$rs3 =mysql_fetch_array($result3);
//////////////////////////////หาจำนวนถัง / จำนวนเงินคงค้าง(เก็บได้)//////////////////////////////////////////
				$sql4=" select if(sum(total) is null,'0',sum(total)) as  total5, if(sum(total)is null,'0',sum(total)/amt_1) as total6 , if(count(rec_id) is null,'0',count(rec_id)) as numR 
				from  receive  where  rec_id <> '' and rec_id is not null  and p_date <> '1111-11-11'   ";
				
						 $sql4.= " and p_date  like  '" .$p_date_1. "%' and ";
						 	 $ex = substr($month,0,1);
				if($ex =='0') $monthh = substr($month,1);	
				else $monthh = $month;	 
						if($month  <> '' and $monthh <=9 ){		 
							$sql4.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql4.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}
				 $sql4.=  " or myear < '" .$year. "') and rec_status is not null and rec_status <> 'ยกเลิก' ";
				$result4 = mysql_query($sql4);
				if($result4)
				$rs4 =mysql_fetch_array($result4);
?><br>
 <table  width="95%"   border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;" >
  <tr>
    <td  colspan="2"  >
		<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="0"  style="border-collapse:collapse;" >
      <tr  >
        <td  height="28" colspan="7"  cellspacing="0"  cellpadding="0" >
		<table width="100%" cellspacing="0"  cellpadding="0" border="0"  style="border-collapse:collapse;">
		  <tr>
            <td width="890"  height="31">&nbsp;&nbsp;รายงานสรุปค่าธรรมเนียมขยะมูลฝอยประจำเดือน <strong><?=mounth3($monthh)?>&nbsp;<?=$year2?></strong>
              <div align="center" class="style1"></div></td>
            </tr>
			 <tr>
            <td  height="16"><hr ></td>
            </tr>
        </table>		</td>
      </tr>
      <tr >
        <td  height="28" colspan="7"  cellspacing="0"  cellpadding="0" ><div  align="left"></div></td>
      </tr>
      <tr>
        <td  height="31" colspan="6" align="center" style="" cellspacing="0"  cellpadding="0" ><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;งานด้านพัฒนาและจัดเก็บรายได้ ได้ดำเนินการจัดเก็บเงินค่าธรรมเนียมขยะมูลฝอยประจำเดือน  <?=mounth3($monthh)?>  พ.ศ.<?=$year2?> สรุปได้ดังนี้</div></td>
      </tr>
      <tr>
        <td width="65%"  height="31" align="center" style="" cellspacing="0"  cellpadding="0" ><div align="left">ค่าธรรมเนียมขยะมูลฝอยประจำเดือน <?=mounth3($monthh)?>  พ.ศ.<?=$Yr?> ตามใบเสร็จเล่มที่ <?=$rs1[minrecid]?> ถึง <?=$rs1[maxrecid]?></div></td>
        <td width="6%" colspan="-6"  align="center" style="">จำนวน</td>
        <td width="6%"  align="right" bgcolor="#FFFFFF" style="">&nbsp;<?=number_format($rs1[numR])?></td>
        <td width="9%"  align="center" style="">บิล     เป็นเงิน</td>
        <td width="8%"  align="right" bgcolor="#FFFFFF" style="">&nbsp;<?=number_format($rs1[sumtotal])?></td>
        <td width="6%"  align="center" style="">บาท&nbsp;</td>
      </tr>
      <tr>
        <td  height="31" align="left" style="">ค่าธรรมเนียมขยะมูลฝอยค้างชำระเดือน 
		<? 
		if($month  <> '' and $month ==1 ){		 
			echo "ธันวาคม  พ.ศ.".($Yr-1);
		}else{	
		  
		    echo (mounth3($month-1))." พ.ศ.".($Yr);
		}
		 ?>		 </td>
        <td width="6%" colspan="-6"  align="center" style="">จำนวน</td>
        <td width="6%"  align="right" bgcolor="#FFFFFF" style="">&nbsp;
          <?=number_format($rs2[numR])?></td>
        <td width="9%"  align="center" style="">บิล     เป็นเงิน</td>
        <td width="8%"  align="right" bgcolor="#FFFFFF" style="">&nbsp;<?=number_format($rs2[total2])?></td>
        <td width="6%"  align="center" style="">บาท</td>
      </tr>
      <tr>
        <td  height="31" align="center" style=""><div align="center"><strong>รวม&nbsp;&nbsp;</strong></div></td>
        <td width="6%" colspan="-6"  align="center" style="">จำนวน</td>
        <td width="6%"  align="right" bgcolor="#FFFFFF" style="">
		<strong>&nbsp;<?=number_format($rs1[numR]+$rs2[numR]);?></strong></td>
        <td width="9%"  align="center" style="">บิล     เป็นเงิน</td>
        <td width="8%"  align="right" bgcolor="#FFFFFF" style="">
		<strong>&nbsp;<?=number_format($rs1[sumtotal]+$rs2[total2]);?></strong></td>
        <td width="6%"  align="center" style="">บาท</td>
      </tr>
      <tr>
        <td  height="31" align="left" style="">จำนวนเงินที่เก็บได้ เดือน  <?=mounth3($month)?>  พ.ศ.<?=$Yr?></td>
        <td width="6%" colspan="-6"  align="center" style="">จำนวน</td>
        <td width="6%"  align="right" bgcolor="#FFFFFF" style="">&nbsp;<?=number_format($rs3[numR])?></td>
        <td width="9%"  align="center" style="">บิล     เป็นเงิน</td>
        <td width="8%"  align="right" bgcolor="#FFFFFF" style="">&nbsp;<?=number_format($rs3[total4])?></td>
        <td width="6%"  align="center" style="">บาท</td>
      </tr>
      <tr>
        <td  height="31" align="center" style=""><div align="left">จำนวนเงินค้างชำระที่เก็บได้</div></td>
        <td width="6%" colspan="-6"  align="center" style="">จำนวน</td>
        <td width="6%"  align="right" bgcolor="#FFFFFF" style="">&nbsp;<?=number_format($rs4[numR])?></td>
        <td width="9%"  align="center" style="">บิล     เป็นเงิน</td>
        <td width="8%"  align="right" bgcolor="#FFFFFF" style="">&nbsp;<?=number_format($rs4[total5])?></td>
        <td width="6%"  align="center" style="">บาท</td>
      </tr>
      <tr>
        <td  height="31" align="center" style=""><div align="left"><strong>รวมจำนวนเงินที่จัดเก็บได้ทั้งสิ้น</strong></div></td>
        <td width="6%" colspan="-6"  align="center" style="">จำนวน</td>
        <td width="6%"  align="right" bgcolor="#FFFFFF" style="">&nbsp;<strong><?=number_format($rs3[numR]+$rs4[numR]);?></strong></td>
        <td width="9%"  align="center" style="">บิล     เป็นเงิน</td>
        <td width="8%"  align="right" bgcolor="#FFFFFF" style="">&nbsp;<strong><?=number_format($rs3[total4]+$rs4[total5]);?></strong></td>
        <td width="6%"  align="center" style="">บาท</td>
      </tr>
      <tr>
        <td  height="31" align="center" style=""><div align="center"><strong>ยอดคงค้างยกไป&nbsp;&nbsp;</strong></div></td>
        <td width="6%" colspan="-6"  align="center" style="">จำนวน</td>
        <td width="6%"  align="right" bgcolor="#FFFFFF" style=""><strong>
		&nbsp;<?=number_format(($rs1[numR]+$rs2[numR])-($rs3[numR]+$rs4[numR]));?></strong></td>
        <td width="9%"  align="center" style="">บิล     เป็นเงิน</td>
        <td width="8%"  align="right" bgcolor="#FFFFFF" style=""><strong>&nbsp;<?=number_format(($rs1[sumtotal]+$rs2[total2])-($rs3[total4]+$rs4[total5]));?></strong></td>
        <td width="6%"  align="center" style="">บาท</td>
      </tr>
	   <tr >
        <td  height="31" colspan="6"  align="center" >ตัวอักษร<strong>&nbsp;&nbsp;</strong>
		  <strong><? echo "  ( ".num_to_char(($rs1[sumtotal]+$rs2[total2])-($rs3[total4]+$rs4[total5]))."  ) ";?></strong></td>
        </tr>
      <tr>
        <td  height="31" colspan="6"  align="right" style="">
		<div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามรายละเอียดที่แนบมาพร้อมนี้<strong></strong></div></td>
        </tr>
	  <tr>
        <td  height="31" colspan="6"  align="right" style=""><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดทราบ<strong></strong></div></td>
        </tr>
    </table></td>
  </tr>
  </table>
 </form>
<div align="center"></div> 
</body>
</html>

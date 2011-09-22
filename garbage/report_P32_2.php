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
<body>
<form name="f12" method="post"  action=""   >
<table  width="80%"   border="0" align="center" cellpadding="0" cellspacing="0">
		<tr class="header" align="left" >
        <td  height="28" colspan="14"  ><u><div  align="left">&nbsp;<strong>รายงาน(ป.32) ประจำวันที่ <?=date_2($p_date)?></strong></div></u>
		</td>
      </tr>
  </table>
  <table  width="80%"   border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  colspan="2"   >
	<br>
<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
<tr class="header">
      <td  height="28" colspan="14"><div  align="left">&nbsp;รายงานภาษีขาย / รายงานป.32 [สำนักงาน]</div></td>
          </tr>
  <tr class="body1"  bgcolor="#DEE4EB">
        <td width="12%"  height="31" align="center"><strong>ลำดับที่</strong></td>
		<td width="16%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
		<td width="21%"  height="31" align="center"><p><strong>เลขที่ใบเสร็จ</strong></p>		  </td>
         <td width="15%"  align="center"><strong>เงินตามบิล</strong></td>
		 <td width="15%"  align="center"><strong>เงินที่เก็บได้</strong></td>
		 <td width="20%"  align="center"><strong>ประจำเดือน</strong></td>
          </tr>
<?
$stotal1 = 0;
$i=0;
              	$sql2=" select myear, monthh,  mcode, rec_id, rec_date, total, if(p_date='1111-11-11','-',p_date) as pdate  from receive
                   where  p_date like  '" .$p_date."' and mcode like '" .$hocode."%' and  rec_id <> '' and rec_id is not null  and p_date <> '1111-11-11' and ";
				 $ex = substr($month,0,1);
				if($ex =='0') $monthh = substr($month,1);	
				else $monthh = $month;	 
				if ($rs_1[monthh] == '10' or $rs_1[monthh] == '11' or $rs_1[monthh] == '12' ) {
							$Yr = ($rs_1[myear]-1);
				}else{
							$Yr = ($year);
				}		
						if($month  <> '' and $monthh <=9 ){		 
							$sql2.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql2.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}
				 $sql2.=  " or myear < '" .$year. "') and rec_status is not null and rec_status <> 'ยกเลิก' order by rec_id,mcode ";			
				$result2= mysql_query($sql2);
				while($rs2=mysql_fetch_array($result2)){
				$i++;
	     		if($i%2 ==0) $bg ='#e8edff';
				elseif( $i%2 ==1) $bg ='#ffffff';
				$stotal1 =$stotal1 + $rs2[total];
?>       
<tr class="body1" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $i; ?></td>
 <td  height="25"   align="center">&nbsp;<? echo $rs2[mcode]; ?></td>
 <td  height="25"  align="center">&nbsp;<? echo $rs2[rec_id]; ?></td>
 <td  align="center">&nbsp;<?=$rs2[total];  ?></td>
 <td  align="center">&nbsp;<?=$rs2[total];  ?></td>
 <td  height="25"   align="center">&nbsp;
 <? if ($rs2[monthh] == '10' or $rs2[monthh] == '11' or $rs2[monthh] == '12' ) {
	 echo mounth3($rs2[monthh])."  ".($rs2[myear]-1); 
	}else{
	 echo mounth3($rs2[monthh])."  ".$rs2[myear]; 
	}		
 ?>
</td>
  </tr>
<? 
	}
?>
<tr class="body1"  bgcolor="#DEE4EB">
 <td  height="25"  align="center"><strong>รวมบิล </strong></td>
  <td  height="25"   align="center">&nbsp;
  <?
  if($i==0){ 
  echo "";
  }else{
  echo number_format($i)."  บิล";
  }
  ?>
  </td>
  <td  height="25"  align="left"><div align="center"><strong>รวมเป็นเงิน</strong></div></td>
   <td  align="center">&nbsp;<?=number_format($stotal1)?></td>
 <td  align="center">&nbsp;<?=number_format($stotal1)?></td>
 <td >&nbsp; </td>
 </tr>
        </table>
	  </td>
    </tr>
  </table>
  <br>
  <br>
  <br>
  <table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  </table>
  <table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  </table>
  <table  width="80%"   border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  colspan="2"   >
<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
<tr class="header">
      <td  height="28" colspan="14"><div  align="left">&nbsp;รายงานภาษีขาย / รายงานป.32 [ปกติ]</div></td>
          </tr>
  <tr class="body1"  bgcolor="#DEE4EB">
        <td width="6%"  height="31" align="center"><strong>ลำดับที่</strong></td>
		<td width="9%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
		<td width="18%"  height="31" align="center"><p><strong>เลขที่ใบเสร็จ</strong></p>		  </td>
         <td width="7%"  align="center"><strong>เงินตามบิล</strong></td>
		 <td width="7%"  align="center"><strong>เงินที่เก็บได้</strong></td>
		 <td width="6%"  align="center"><strong>เงินที่ค้างชำระ</strong></td>
         </tr>
<?
$Y=0;
$a=0;
$b=0;
$stotal2 = 0;
$stotal3 = 0;
$stotal4 = 0;
    $sql_1="select myear, monthh,  mcode, rec_id, rec_date, total, p_date as pdate
                    from receive where mcode like '" .$hocode."%' 
                    and rec_status is not null and rec_status <> 'ยกเลิก' 
                    and myear = '" .$year. "' and monthh = ".$monthh."
                    and (p_date like '1111-11-11' or  p_date >=  '" .$p_date."')  
                    order by mcode, rec_id";
$result_1 = mysql_query($sql_1);
while($rs_1=mysql_fetch_array($result_1)){
	if($Y%2 ==0) $bg ='#e8edff';
	elseif( $Y%2 ==1) $bg ='#ffffff';
	$stotal2 =$stotal2 + $rs_1[total];
	$Y++;
?> 
<tr class="body1" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $Y; ?></td>
 <td  height="25"   align="center">&nbsp;<? echo $rs_1[mcode]; ?></td>
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[rec_id]; ?></td>
 <td  align="center">&nbsp;<?=$rs_1[total];  ?></td>
 <td  align="center">&nbsp;
  <?
 if($rs_1[pdate]<>'1111-11-11' and $rs_1[pdate]==$p_date) {
   echo $rs_1[total]; 
   $stotal3 =$stotal3 + $rs_1[total];
   $a++;
}else{ echo "-"; 
}
 ?></td>
  <td  align="center">&nbsp;
 <?
 if($rs_1[pdate]=='1111-11-11' or  $rs_1[pdate]>$p_date) {
   echo $rs_1[total]; 
   $stotal4 =$stotal4 + $rs_1[total];
   $b++;
}else{ 
echo "-"; 
}
 ?></td>
 </tr>
  <?
 }
 ?>
<tr class="body1"  bgcolor="#DEE4EB">
 <td  height="25"  align="center"><strong>รวมบิล</strong></td>
  <td  height="25"   align="center">&nbsp;
  <? if($Y==0){
   echo "";
  }else{
  echo number_format($Y)."  บิล";
  }
  ?></td>
  <td  height="25"  align="center">&nbsp;รวมเงิน (<?=number_format($a)."/".number_format($b)?>)</td>
   <td  align="center">&nbsp;<?=number_format($stotal2)?></td>
 <td  align="center">&nbsp;<?=number_format($stotal3)?></td>
 <td align="center">&nbsp;<?=number_format($stotal4)?></td>
 </tr>
        </table>
	  </td>
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
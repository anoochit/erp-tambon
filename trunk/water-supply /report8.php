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
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  </table>
<table  width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="650"  colspan="2" >
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" >
      <tr class="header">
        <td  height="28" colspan="14" ><div  align="left">&nbsp;&nbsp;<strong>รายงานสรุปยอดบิลค้างชำระประจำเดือน   <?=mounth3($month)?>&nbsp;<?=$year?></strong></div></td>
      </tr>
      <tr class="body1"  bgcolor="#DEE4EB">
        <td width="69"  height="31" align="center"><strong>หมู่ที่</strong></td>
        <td width="93"  height="31" align="center"><strong>จำนวน(ราย)</strong></td>
		<td width="111"  height="31" align="center"><strong>จำนวน(เงิน)</strong></td>
        <? 
$sql_1="select mid(rec_date,1,4) as myear ,monthh,myear as myear2,mid(m.mcode,1,2) as moo ,sum(sum_m )  as sum1
from meter m, member mb, q_water q 
Where m.mcode = q.mcode and q.mem_id = mb.mem_id 
and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ')";
if ($month == '10' or $month == '11' or $month == '12' ) {
							$Yr = ($year-1);
				}else{
							$Yr = ($year);
				}		
					if($month  <> '' and $month =='12' ){	
					    $ex2 = "01";
						$p_date_1 = ($Yr-542)."-".($ex2)."-31";
				}else if ($month  <> '' and $month<'12' ){	
		        $ex2 = $month;
			    if($ex2 =='0') $ex2 = substr($ex2,1);	
				else $ex2 = $ex2;	
				$ex2 ="0".$ex2 ;
		    	if (strlen($ex2) =='3') $ex2 = substr($ex2,1);	
				 else $ex2 =$ex2;	
							$p_date_1 = ($Yr-543)."-".($ex2)."-31";
				}
				$p_date_2 = ($Yr-543)."-".($month)."-31";
	$sql_1.= " or p_date  >  '" .$p_date_2. "' ) and ";
	if($month  <> '' and $month <=9 ){		 
		$sql_1.= "  ((myear = '" .$year. "' and monthh < ".$month.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
	}elseif($month  <> '' and $month > 9 ){	
		$sql_1.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$month.") ";
	}
$sql_1.=  " or myear < '" .$year. "') group by  myear, monthh order by rec_date, m.mcode ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
    $hocode1 = substr($rs_1[hocode],0,1);
	if($hocode1 =='0') $hocode = substr($rs_1[hocode],1);	
	else $hocode = $rs_1[hocode];	
?>
<td width="20"  height="31" align="center" ><strong>  <?
  		if ($rs_1[monthh] == '10' or $rs_1[monthh] == '11' or $rs_1[monthh] == '12' ) {
			echo mounth2($rs_1[monthh])." ".substr($rs_1[myear2]-1,2);
		}else{
 		    echo mounth2($rs_1[monthh])." ".substr($rs_1[myear2],2);
}  ?>
</strong></td>
<? }
?>
      </tr>
<?
$SumMtotal = 0;
$Sumrec = 0;
/////////////////////////////////หาจำนวนราย/จำนวนเงินรวมค้างชำระแต่ระหมู่//////////////////////////////////////
$sql2="select hocode,if(count(rec_id)is null,'',count(rec_id))as countrec, 
if(sum(sum_m)is null,'',sum(sum_m))as sumtotal2 From house left join meter on
hocode = mid(mcode,1,2) and (((rec_id = '' or rec_id is null or p_date ='1111-11-11') 
and rec_status = 'ค้างชำระ') ";
	$sql2.= " or p_date  >  '" .$p_date_2. "' ) and ";
	if($month  <> '' and $month <=9 ){		 
		$sql2.= "  ((myear = '" .$year. "' and monthh < ".$month.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
	}elseif($month  <> '' and $month > 9 ){	
		$sql2.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$month.") ";
	}
$sql2.=  " or myear < '" .$year. "') group by hocode order by hocode ";
$result2 = mysql_query($sql2);
if ($result2)
while($rs2=mysql_fetch_array($result2)){
				$SumMtotal = $SumMtotal + $rs2[sumtotal2];
			    $Sumrec = $Sumrec +  $rs2[countrec];
?>
 <tr class="body1" >
        <td  height="25"  align="center">&nbsp;<strong><?=$rs2[hocode]?></a></strong></td>
        <td  height="25"   align="right">
		<strong><?=number_format($rs2[countrec])?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td  height="25"   align="right">
		<strong><?=number_format($rs2[sumtotal2],2)?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		
<? 
$sql_1="select mid(rec_date,1,4) as myear ,monthh, mid(m.mcode,1,2) as moo ,sum(sum_m )  as sum1
from meter m, member mb, q_water q 
Where m.mcode = q.mcode and q.mem_id = mb.mem_id 
and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ')";
		if ($month == '10' or $month == '11' or $month == '12' ) {
							$Yr = ($year-1);
				}else{
							$Yr = ($year);
				}		
					if($month  <> '' and $month =='12' ){	
					    $ex2 = "01";
						$p_date_1 = ($Yr-542)."-".($ex2)."-31";
				}else if ($month  <> '' and $month<'12' ){	
		        $ex2 = $month;
			    if($ex2 =='0') $ex2 = substr($ex2,1);	
				else $ex2 = $ex2;	
				$ex2 ="0".$ex2 ;
		    	if (strlen($ex2) =='3') $ex2 = substr($ex2,1);	
				 else $ex2 =$ex2;	
							$p_date_1 = ($Yr-543)."-".($ex2)."-31";
				}
	$sql_1.= " or p_date  >  '" .$p_date_2. "' ) and ";
	if($month  <> '' and $month <=9 ){		 
		$sql_1.= "  ((myear = '" .$year. "' and monthh < ".$month.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
	}elseif($month  <> '' and $month > 9 ){	
		$sql_1.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$month.") ";
	}
$sql_1.=  " or myear < '" .$year. "') group by  myear, monthh order by rec_date, m.mcode ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
$total = 0;
while($rs_1=mysql_fetch_array($result_1)){
    $hocode1 = substr($rs_1[hocode],0,1);
	if($hocode1 =='0') $hocode = substr($rs_1[hocode],1);	
	else $hocode = $rs_1[hocode];	
?>
<td width="20"  height="31" align="center">&nbsp;
<?
		//////////////////////////////หาค้างชำระแค่ละหมู่////////////////////////////////
$sql1=" select hocode,if(monthh is null,'',monthh)as monthh,if(mid(rec_date,1,4)is null,'',
mid(rec_date,1,4)) as myear,if(sum(sum_m)is null,'',sum(sum_m))as sumtotal
From house,meter where
hocode = mid(mcode,1,2) and (((rec_id = '' or rec_id is null or p_date ='1111-11-11') 
and rec_status = 'ค้างชำระ') ";
	$sql1.= " or p_date  >  '" .$p_date_2. "' ) and hocode = '".$rs2[hocode]."'  and ";
	if($month  <> '' and $month <=9 ){		 
		$sql1.= "  ((myear = '" .$year. "' and monthh < ".$month.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
	}elseif($month  <> '' and $month > 9 ){	
		$sql1.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$month.") ";
	}
$sql1.=  "  or myear < '" .$year. "') group by myear, monthh,hocode order by hocode ";
$result1 = mysql_query($sql1);
if ($result1)
while($rs1=mysql_fetch_array($result1)){
if(trim($rs_1[monthh]) ==  trim($rs1[monthh]) and trim($rs_1[myear]) ==  trim($rs1[myear])){
echo number_format($rs1[sumtotal],2)?>
<? }else{?>
<? }?>
<? 		
		}
?></td>
<? }
?>
 </tr>
			<?
			   }
			   ?>
      <tr class="body1" bgcolor="#DEE4EB"  onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe' " onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '' ">
        <td  height="25"  align="center" >&nbsp;<strong>รวม</strong></td>
        <td  height="25"   align="right" >
		<strong><?=number_format($Sumrec)?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		 <td  height="25"   align="right" >
		<strong><?=number_format($SumMtotal,2)?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <? 
$sql_5="select mid(rec_date,1,4) as myear ,monthh, mid(m.mcode,1,2) as moo ,sum(sum_m )  as sum1
from meter m, member mb, q_water q 
Where m.mcode = q.mcode and q.mem_id = mb.mem_id 
and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ')";
if ($month == '10' or $month == '11' or $month == '12' ) {
							$Yr = ($year-1);
				}else{
							$Yr = ($year);
				}		
					if($month  <> '' and $month =='12' ){	
					    $ex2 = "01";
						$p_date_1 = ($Yr-542)."-".($ex2)."-31";
				}else if ($month  <> '' and $month<'12' ){	
		        $ex2 = $month;
			    if($ex2 =='0') $ex2 = substr($ex2,1);	
				else $ex2 = $ex2;	
				$ex2 ="0".$ex2 ;
		    	if (strlen($ex2) =='3') $ex2 = substr($ex2,1);	
				 else $ex2 =$ex2;	
							$p_date_1 = ($Yr-543)."-".($ex2)."-31";
				}
	$sql_5.= " or p_date  >  '" .$p_date_2. "' ) and ";
	if($month  <> '' and $month <=9 ){		 
		$sql_5.= "  ((myear = '" .$year. "' and monthh < ".$month.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
	}elseif($month  <> '' and $month > 9 ){	
		$sql_5.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$month.") ";
	}
$sql_5.=  " or myear < '" .$year. "') group by  myear, monthh order by rec_date, m.mcode ";
$result_5 = mysql_query($sql_5);
if ($result_5 )
while($rs_5=mysql_fetch_array($result_5)){

?>
<td width="241"  height="31" align="center"><strong>&nbsp;<?
echo number_format($rs_5[sum1],2)
?></strong></td>
	 	<?
 }
?> </tr>
    </table>
	</td>
</tr>
  </table>
	</strong>
	<br>
	<br>
	<div align="center">
</center></div> 
</form>
</body>
</html>

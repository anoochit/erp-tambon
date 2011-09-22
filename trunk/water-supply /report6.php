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
 <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2"><table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1">
      <tr class="header">
        <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;<strong>รายงานสรุปการยอดจัดเก็บได้ประจำเดือน  <?=mounth3($month)?>&nbsp;<?=$year?></strong></div></td>
      </tr>
      <tr class="body1"  bgcolor="#DEE4EB">
        <td width="5%"  height="31" align="center"><strong>หมู่ที่</strong></td>
        <td width="24%"  height="31" align="center"><strong>ชื่อหมู่บ้าน</strong></td>
        <td width="14%"  height="31" align="center"><strong>จำนวนเงินในตอน</strong></td>
        <td width="13%"  align="center"><strong>จำนวนเงินสำนักงาน</strong></td>
        <td width="12%"  align="center"><strong>รวมเป็นเงิน</strong></td>
	     <td width="10%"  align="center"><strong>ค่ามาตร</strong></td>
        <td width="11%"  align="center"><strong>ค่าน้ำ</strong></td>
        <td width="11%"  align="center"><strong>ค่าภาษี</strong></td>
      </tr>
<?
$stotal1 = 0;
$stotal2 = 0;
$stotal3 = 0;
$stotal4 = 0;
$stotal5 = 0;
$stotal6 = 0;
$VIn = 0;
$VOut = 0;
$MIn = 0;
$MOut = 0;
$TIn = 0;
$TOut = 0;
$SumInVT = 0;
$SumOutVT =0;
$sql_1="select hocode, honame, if(sum(sum_m) is null,'0',sum(sum_m)) as stotal
, if(sum(total) is null,'0',sum(total)) as total,
if(sum(vat)is null,'0',sum(vat))as vat, if(sum(m_amt) is null,'0',sum(m_amt))as m_amt
from house left join  meter on mid(mcode,1,2) = hocode and rec_status is not null and rec_status <> 'ยกเลิก' 
and hocode = mid(mcode,1,2) and myear = '" .$year. "' and monthh = ".$month." ";
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
			$sql_1.= " and p_date  like  '" .$p_date_1. "%'  group by hocode order by hocode ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
			?>
 <tr class="body1" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<? echo $rs_1[hocode]; ?></td>
        <td  height="25"   align="left">&nbsp;<? echo $rs_1[honame]; ?></td>
		<? 
				$sql="select  if(count(rec_id) is null,'0',count(rec_id)) as crec_id, if(sum(sum_m)is null,'0',sum(sum_m))as stotal1
		    	, if(sum(total) is null,'0',sum(total)) as total1,
		    	 if(sum(vat)is null,'0',sum(vat))as vat1, if(sum(m_amt) is null,'0',sum(m_amt))as m_amt1
				from house left join meter m on hocode = mid(mcode,1,2) and myear = '" .$year. "' and monthh = ".$month."
    			and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก' ";
				$sql.= " and p_date  like  '" .$p_date_1. "%'  
			     where  hocode = '" .$rs_1[hocode]."'  group by mid(mcode,1,2) ";
				$result = mysql_query($sql);
				if($result)
				while($rs=mysql_fetch_array($result)){
				////////////////////////////////////////////////////////////////////////
				$sql2=" select if(count(rec_id) is null,'0',count(rec_id))as crec_id ,if(sum(sum_m) is null,'0',sum(sum_m)) as  stotal2
				, if(sum(total) is null,'0',sum(total)) as total2,
		    	 if(sum(vat)is null,'0',sum(vat))as vat2, if(sum(m_amt) is null,'0',sum(m_amt))as m_amt2
				 from house left join meter m on hocode = mid(mcode,1,2)
				 and rec_id <> '' and rec_id is not null  and  p_date like  '" .$p_date_1. "%' and p_date <> '1111-11-11'  and  ";
				 $ex = substr($month,0,1);
				if($ex =='0') $monthh = substr($month,1);	
				else $monthh = $month;	 
						if($month  <> '' and $monthh <=9 ){		 
							$sql2.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql2.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}
				 $sql2.=  " or myear < '" .$year. "') and rec_status is not null and rec_status <> 'ยกเลิก' 
				 where hocode = '" .$rs_1[hocode]."' ";
				 $sql2.=  " group by hocode order by hocode ";			
				$result2= mysql_query($sql2);
				if($result2)
				while($rs2=mysql_fetch_array($result2)){
			//////////////////////////////////หา ค่ามาตา /ค่าภาษี / ค่าน้ำ //////////////////////////////////////
			$sql3="select  h.hocode,honame,if(sum(sum_m) is null ,'0',sum(sum_m)) as sum_m, if(sum(total) is null,'0',sum(total)) as total,
			 if(sum(vat)is null,'0',sum(vat))as vat, if(sum(m_amt) is null,'0',sum(m_amt))as m_amt
			from house h ,meter m  where h.hocode = mid(mcode,1,2)
			and  rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก'
            and  p_date like  '" .$p_date_1. "%' and p_date <> '1111-11-11'  
			and hocode = '" .$rs_1[hocode]."' group by hocode order by hocode ";			
				$result3= mysql_query($sql3);
				if($result3)
				while($rs3=mysql_fetch_array($result3)){
				$stotal1 =  $stotal1 +$rs[stotal1];
				$stotal2 =  $stotal2 +$rs2[stotal2];
				$stotal3 =  $stotal3 +($rs[stotal1]+$rs2[stotal2]);
				$stotal4 =  $stotal4 +$rs3[m_amt];
				$stotal5 =  $stotal5 +$rs3[total];
				$stotal6 =  $stotal6 +$rs3[vat];
				$VIn = $VIn+$rs[vat1];
				$VOut = $VOut+$rs2[vat2];
				$MIn = $MIn+$rs[m_amt1];
				$MOut = $MOut+$rs2[m_amt2];
				$TIn = $TIn+$rs[total1];
				$TOut = $TOut+$rs2[total2];
				$SumInVT = $VIn + $TIn;
				$SumOutVT =$VOut + $TOut;
				?>
		<td  height="25"   align="center">&nbsp;<? echo number_format($rs[stotal1],2); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format($rs2[stotal2],2); ?></td>
        <td  align="center" bgcolor="#FFCC66" >&nbsp;<? echo number_format($rs[stotal1]+$rs2[stotal2],2); ?> </td>
		<td  height="25"   align="center">&nbsp;<? echo number_format($rs3[m_amt],2); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format($rs3[total],2); ?></td>
        <td  align="center">&nbsp;<? echo number_format($rs3[vat],2); ?> </td> 
		<?  }}}?>     
		  </tr>
			<?
			  }
			   ?>
      <tr class="body1"  bgcolor="#FFCC66" >
        <td  height="25" colspan="2"  align="center">&nbsp;<strong>รวม</strong></td>
        <td  height="25"  align="center">&nbsp;<? echo number_format($stotal1,2); ?></td>
        <td  align="center">&nbsp;<? echo number_format($stotal2,2); ?></td>
        <td  align="center"  bgcolor="#FF9900">&nbsp;<? echo number_format($stotal3,2); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format($stotal4,2); ?></td>
        <td  align="center">&nbsp;<? echo number_format($stotal5,2); ?></td>
        <td  align="center">&nbsp;<? echo number_format($stotal6,2); ?></td>
        </tr>
<tr class="body1" bgcolor="#DEE4EB"onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25" colspan="2"  align="center"><strong>รวมค่าน้ำ + ค่าภาษี </strong></td>
        <td  height="25" align="center" >&nbsp;<? echo number_format($SumInVT,2); ?></td>
        <td  align="center">&nbsp;<? echo number_format($SumOutVT,2); ?></td>
        <td  align="center" bgcolor="#FFCC66" >&nbsp;<? echo number_format(($SumInVT+$SumOutVT),2); ?></td>
         <td  align="center">&nbsp;</td>
		 <td  align="center">&nbsp;</td>
		 <td  align="center">&nbsp;</td>
      </tr> 
	  <tr class="body1" bgcolor="#DEE4EB" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25" colspan="2"  align="center"><strong>รวมค่าบริการ</strong></td>
        <td  height="25"  align="center">&nbsp;<? echo number_format($MIn,2); ?></td>
        <td  align="center">&nbsp;<? echo number_format($MOut,2); ?></td>
        <td  align="center"bgcolor="#FFCC66" >&nbsp;<? echo number_format(($MIn+$MOut),2); ?></td>
         <td  align="center">&nbsp;</td>
		 <td  align="center">&nbsp;</td>
		  <td  align="center">&nbsp;</td>
      </tr>

    </table></td>
    </tr>
  </table>
</form>
</body>
</html>

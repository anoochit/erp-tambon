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
 <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1" >
  <tr>
    <td  colspan="2" ><table width="97%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
      <tr class="header">
        <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;<strong>รายงานสรุปยอดตั้งเก็บและเก็บได้ประจำเดือน  <?=mounth3($month)?>&nbsp;<?=$year?></strong></div></td>
      </tr>
      <tr class="body1"  bgcolor="#DEE4EB">
        <td width="7%"  height="31" align="center"><strong>หมู่ที่</strong></td>
        <td width="24%"  height="31" align="center"><strong>ชื่อหมู่บ้าน</strong></td>
        <td width="14%"  height="31" align="center"><strong>ยอดค้างยกมา</strong></td>
        <td width="11%"  align="center"><strong>ยอดตั้งเก็บ</strong></td>
        <td width="9%"  align="center"><strong>ยอดรวม</strong></td>
		 <td width="12%"  align="center"><strong>ยอดเก็บได้</strong></td>
		  <td width="14%"  align="center"><strong>ยอดค้างยกไป</strong></td>
		 <td width="9%"  align="center"><strong>%เก็บได้</strong></td>
      </tr>
<?
if($search <>'')
$SumMtotal = 0;
$stotal3 = 0; 
$stotal = 0;
$stotal4 = 0;
$stotal5 = 0;
$stotal6 = 0;
$stotal7 = 0;
$sql_1="select mid(mcode,1,2) as mcode, honame, sum(total)as stotal  from receive, house where rec_status is not null and rec_status <> 'ยกเลิก' 
	and hocode = mid(mcode,1,2) and myear = '" .$year. "' and monthh = ".$month."
	group by mid(mcode,1,2) order by mid(mcode,1,2) ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
		    //////////////////////////////////หายอดเงินที่เก็บได้ในเดือน///////////////////////////////////
				$sql="select  count(rec_id), if(sum(total)is null,'0',sum(total))as stotal1
				from house left join receive m on hocode = mid(mcode,1,2) and myear = '" .$year. "' and monthh = ".$month."
    			and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก' ";
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
						 $sql.= " and p_date  like  '" .$p_date_1. "%'  
				          where  hocode = '" .$rs_1[mcode]."'  group by mid(mcode,1,2) ";
				$result = mysql_query($sql);
				while($rs=mysql_fetch_array($result)){
							//////////////////////////////ยอดเก้บได้คงค้าง//////////////////////////////////////////
				$sql2=" select count(rec_id),if(sum(total) is null,'0',sum(total)) as  stotal2 from house left join receive m on hocode = mid(mcode,1,2)
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
				 where hocode = '" .$rs_1[mcode]."' ";
				 $sql2.=  " group by hocode order by hocode ";			
				$result2= mysql_query($sql2);
				while($rs2=mysql_fetch_array($result2)){
					$SumMtotal =  $rs[stotal1]+$rs2[stotal2];
					///////////////////////////////////ยอดเงินคงค้างยกมา/////////////////////////////////////////////
					$p_date_2 = ($Yr-543)."-".($month)."-31";
					$sql3=" select  if(sum(total) is null,'0',sum(total)) as stotal3 from house left join receive on hocode = mid(mcode,1,2)
				 and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' )
				 or p_date >  '" .$p_date_2. "'  ) and  ";
				 $ex = substr($month,0,1);
				if($ex =='0') $monthh = substr($month,1);	
				else $monthh = $month;	 
						if($month  <> '' and $monthh <=9 ){		 
							$sql3.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql3.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}
				 $sql3.=  " or myear < '" .$year."')
				 where hocode = '" .$rs_1[mcode]."' ";
				 $sql3.=  "  group by hocode ";			
				$result3= mysql_query($sql3);
				
				while($rs3=mysql_fetch_array($result3)){
				$stotal3 = $stotal3 + $rs3[stotal3];
				$stotal = $stotal  + $rs_1[stotal];
				$stotal4 =  $stotal4 + $rs3[stotal3]+ $rs_1[stotal];
				$stotal5 = $stotal5 + $SumMtotal ;
				$stotal6 = $stotal6 + (($rs3[stotal3]+$rs_1[stotal])-$SumMtotal);
			?>
 <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<? echo $rs_1[mcode]; ?></td>
        <td  height="25"   align="left">&nbsp;<? echo $rs_1[honame]; ?></td>
		<td  height="25"   align="center">&nbsp;<? echo number_format($rs3[stotal3]); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format($rs_1[stotal]); ?></td>
        <td  align="center">&nbsp;<? echo number_format($rs3[stotal3]+$rs_1[stotal]); ?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format($SumMtotal); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(($rs3[stotal3]+$rs_1[stotal])-$SumMtotal); ?></td>
        <td  align="center">&nbsp;<?  echo number_format(($SumMtotal*100)/($rs3[stotal3]+$rs_1[stotal]),2); ?> </td>
		  </tr>
			<?
			   }}}}
			   ?>
      <tr class="body1" bgcolor="#DEE4EB"  onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe' " onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '' ">
        <td  height="25"  align="center">&nbsp;<strong>รวม</strong></td>
        <td  height="25"   align="left">&nbsp;</td>
        <td  height="25"  align="center">&nbsp;<strong><?=number_format($stotal3)?></strong></td>
        <td  align="center">&nbsp;<strong><?=number_format($stotal)?></strong></td>
        <td  align="center">&nbsp;<strong><?=number_format($stotal4)?></strong></td>
        <td  align="center">&nbsp;<strong><?=number_format($stotal6)?></strong></td>
        <td  align="center">&nbsp;<strong><?=number_format($stotal5)?></strong></td>
        <td  align="center">&nbsp;<strong><? if($stotal4 > 0) echo number_format((($stotal5*100)/$stotal4),2)?></strong></td>
	      </tr>
    </table></td>
    </tr>
  </table>
</form>
<div align="center">
</center></div> 
</body>
</html>

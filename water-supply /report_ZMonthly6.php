
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
<table  width="50%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0" cellspacing="1" cellpadding="1" >
	<tr align="left">
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
<? 
if($search <>''){
?>
<table  width="650" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="650"  colspan="2" >
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
      <tr class="lgBar">
        <td  height="28" colspan="14" style="border: #7292B8 1px solid;" ><div  align="left">&nbsp;&nbsp;<strong>รายงานสรุปยอดบิลค้างชำระประจำเดือน</strong></div></td>
      </tr>
<?
$sqlM="select honame  from house  where hocode = ".$HOCODE." "; 
 //echo  $sqlM."<br>";
$resultM = mysql_query($sqlM);
if ($resultM)
$rsM=mysql_fetch_array($resultM) ;
$honame = $rsM[honame];
?>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="69"  height="31" align="center"style="border: #7292B8 1px solid;" ><strong>เขต</strong></td>
        <td width="93"  height="31" align="center"style="border: #7292B8 1px solid;" ><strong>จำนวน(ราย)</strong></td>
		<td width="111"  height="31" align="center"style="border: #7292B8 1px solid;" ><strong>จำนวน(เงิน)</strong></td>
        <? 
$sql_1="select mid(rec_date,1,4) as myear ,monthh,myear as myear2 ,mid(m.mcode,1,2) as moo,mid(m.mcode,3,1) as z_id ,sum(sum_m)  as sum1
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
$sql_1.=  " or myear < '" .$year. "') and mid(m.mcode,1,2) = ".$HOCODE." group by  myear, monthh order by rec_date, m.mcode ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
    $z_id = substr($rs_1[z_id],0,1);
	if($z_id =='0') $z_id = substr($rs_1[z_id],1);	
	else $z_id = $rs_1[z_id];	
?>

<td width="20"  height="31" align="center" style="border: #7292B8 1px solid;" ><strong>
  <?
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
$sql2="select z_id,if(count(rec_id)is null,'',count(rec_id))as countrec, 
if(sum(sum_m)is null,'',sum(sum_m))as sumtotal2 
from (house h,zone z)left join meter on z_id = mid(mcode,3,1) 
and z.hocode = mid(mcode,1,2)
and (((rec_id = '' or rec_id is null or p_date ='1111-11-11') 
and rec_status = 'ค้างชำระ') ";
	$sql2.= " or p_date  >  '" .$p_date_2. "' ) and ";
	if($month  <> '' and $month <=9 ){		 
		$sql2.= "  ((myear = '" .$year. "' and monthh < ".$month.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
	}elseif($month  <> '' and $month > 9 ){	
		$sql2.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$month.") ";
	}
$sql2.=  " or myear < '" .$year. "')
where z.hocode = '".$HOCODE."' and h.hocode = z.hocode
 group by z_id order by z_id    ";
$result2 = mysql_query($sql2);
if ($result2)
while($rs2=mysql_fetch_array($result2)){

				$SumMtotal = $SumMtotal + $rs2[sumtotal2];
			    $Sumrec = $Sumrec +  $rs2[countrec];

?>
 <tr class="bmText" >
        <td  height="25"  align="center"style="border: #7292B8 1px solid;" >&nbsp;<strong><?=$rs2[z_id]?></a></strong></td>
        <td  height="25"   align="right"style="border: #7292B8 1px solid;" ><font size="1">
		<strong><?=number_format($rs2[countrec])?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
		<td  height="25"   align="right"style="border: #7292B8 1px solid;" ><font size="1"></font><font size="1">
		<strong><?=number_format($rs2[sumtotal2],2)?></strong>&nbsp;&nbsp;</font></td>
		
<? 

$sql_1="select mid(rec_date,1,4) as myear ,myear as Y1,monthh, mid(m.mcode,1,2) as moo,mid(m.mcode,3,1) as z_id,sum(sum_m )  as sum1
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
$sql_1.=  " or myear < '" .$year. "') and mid(m.mcode,1,2) = ".$HOCODE."  group by  myear, monthh order by rec_date, m.mcode ";
//echo $sql_1."<br>";
$result_1 = mysql_query($sql_1);
if ($result_1 )
$total = 0;
while($rs_1=mysql_fetch_array($result_1)){

    $z_id1 = substr($rs_1[z_id],0,1);
	if($z_id1 =='0') $z_id = substr($rs_1[z_id],1);	
	else $z_id = $rs_1[z_id];	
?>
<td width="20"  height="31" align="center"style="border: #7292B8 1px solid;" >&nbsp;
<a href="report_ZMonthly6_2.php?HOCODE=<?=$HOCODE?>&honame=<?=$honame?>&ZID=<?=$rs2[z_id]?>&month=<?=$month?>&year=<?=$year?>&month2=<?=$rs_1[monthh]?>&year2=<?=($rs_1[Y1])?>" target="_blank">
<?
		//////////////////////////////หาค้างชำระแค่ละหมู่////////////////////////////////
$sql1=" select z_id,if(monthh is null,'',monthh)as monthh,if(mid(rec_date,1,4)is null,'',
mid(rec_date,1,4)) as myear,if(sum(sum_m)is null,'',sum(sum_m))as sumtotal
From zone,meter where hocode = mid(mcode,1,2) and z_id = mid(mcode,3,1)
and (((rec_id = '' or rec_id is null or p_date ='1111-11-11') 
and rec_status = 'ค้างชำระ') ";

	$sql1.= " or p_date  >  '" .$p_date_2. "' ) and z_id = '".$rs2[z_id]."'  and ";
	if($month  <> '' and $month <=9 ){		 
		$sql1.= "  ((myear = '" .$year. "' and monthh < ".$month.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
	}elseif($month  <> '' and $month > 9 ){	
		$sql1.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$month.") ";
	}
$sql1.=  "  or myear < '" .$year. "') and mid(mcode,1,2) = ".$HOCODE."
 group by myear, monthh,z_id order by z_id ";
$result1 = mysql_query($sql1);

if ($result1)
while($rs1=mysql_fetch_array($result1)){
if(trim($rs_1[monthh]) ==  trim($rs1[monthh]) and trim($rs_1[myear]) ==  trim($rs1[myear])){
echo number_format($rs1[sumtotal],2)?>
<? }else{?>
<? }?>
<? 		
		}
?></a></td>
<? }
?>
 </tr>
			<?
			   }
			   ?>
      <tr class="bmText" bgcolor="#DEE4EB"  onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe' " onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '' ">
        <td  height="25"  align="center" style="border: #7292B8 1px solid;" >&nbsp;<strong>รวม</strong></td>
        <td  height="25"   align="right" style="border: #7292B8 1px solid;" >
		<strong><?=number_format($Sumrec)?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		 <td  height="25"   align="right" style="border: #7292B8 1px solid;" ><strong><?=number_format($SumMtotal,2)?></strong>&nbsp;&nbsp;&nbsp;</td>
 <? 
$sql_5="select mid(rec_date,1,4) as myear ,monthh, mid(m.mcode,1,2) as moo,mid(m.mcode,3,1) as z_id,sum(sum_m )  as sum1
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
$sql_5.=  " or myear < '" .$year. "') 
and mid(m.mcode,1,2) = ".$HOCODE." group by  myear, monthh order by rec_date, m.mcode ";

$result_5 = mysql_query($sql_5);
if ($result_5 )
while($rs_5=mysql_fetch_array($result_5)){

?>
<td width="241"  height="31" align="center"style="border: #7292B8 1px solid;" ><strong>&nbsp;<?
echo number_format($rs_5[sum1],2)
?></strong></td>
    
	 	<?
 }
?> </tr>
    </table>
	</td>
</tr>
    </table>
	<? }?>
	</strong>
	<br>
	<br>
	<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report21.php?month=<?=$month?>&year=<?=$year?>&year2=<?=$Yr?>&HOCODE=<?=$HOCODE?>&honame=<?=$honame?>')"/ class="buttom">

</FONT></center></div> 

</form>

</body>
</html>

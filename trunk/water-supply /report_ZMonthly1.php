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
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
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
 <table  width="95%"   border="0" align="center" cellpadding="1" cellspacing="1" >
  <tr class="lgBar">
    <td  colspan="2" >
	<table width="100%"align="center" cellpadding="0" cellspacing="0"  style="border: #999999 1px solid;"  border="1" >
  <tr  class="lgBar" bgcolor="#DEE4EB" >
    <td width="4%" rowspan="2"><div align="center">เขต</div></td>
    <td width="16%" rowspan="2"><div align="center"><strong>ชื่อเขต</strong></div></td>
	<td width="16%" rowspan="2"><div align="center"><strong>เลขที่ใบเสร็จ</strong></div></td>
    <td height="37" colspan="4"><div align="center"><strong>ประจำเดือน</strong></div></td>
    <td colspan="5"><div align="center"><strong>ค้างชำระ</strong></div></td>
    <td width="7%" rowspan="2"><div align="center"><strong>คงเหลือ<p>ยกไป</p></strong></div></td>
  </tr>
  
  <tr class="lgBar" bgcolor="#DEE4EB">
    <td width="4%" height="48"><div align="center"><strong>จำนวน<p>(ราย)</p></strong></div></td>
    <td width="8%"><div align="center"><strong>จำนวน(เงิน)</strong></div></td>
    <td width="7%"><div align="center"><strong>จำนวนเงิน<p>ที่เก็บได้</p></strong></div></td>
    <td width="7%"><div align="center"><strong>คงเหลือ</strong></div></td>
    <td width="20%"><div align="center"><strong>รวมเดือน</strong></div></td>
    <td width="5%"><div align="center"><strong>จำนวน<p>(ราย)</p></strong></div></td>
    <td width="7%"><div align="center"><strong>จำนวน(เงิน)</strong></div></td>
    <td width="8%"><div align="center"><strong>จำนวนเงิน<p>ที่เก็บได้</p></strong></div></td>
    <td width="7%"><div align="center"><strong>คงเหลือ</strong></div></td>
    </tr>
<?
if($search <>'')
$SumMtotal = 0;
$SumNum1 = 0;
$SumNum2 = 0;
$stotal3 = 0; 
$stotal = 0;
$stotal4 = 0;
$stotal5 = 0;
$stotal6 = 0;
$stotal7 = 0;
$sql_1="select  honame,mid(mcode,3,1) as mcode, z_name, sum(sum_m)as stotal ,count(rec_id)as num1 
from house h,meter m, zone z where rec_status is not null and rec_status <> 'ยกเลิก' and z.hocode = mid(mcode,1,2)
	and z.hocode =" .$HOCODE." and z_id = mid(mcode,3,1) and myear = '" .$year. "' and monthh = ".$month."
	and z.hocode = h.hocode
	group by mid(mcode,3,1) order by mid(mcode,3,1) ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
	
		    //////////////////////////////////หายอดเงินที่เก็บได้ในเดือน///////////////////////////////////
			$sql="select  z_id,if(count(rec_id) is null,'0',count(rec_id))as CRec, if(sum(sum_m)is null,'0',sum(sum_m))as stotal1
				from zone left join meter m on z_id = mid(mcode,3,1)  and myear = '" .$year. "' and monthh = ".$month." and hocode = mid(mcode,1,2)
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
				          where  z_id = '" .$rs_1[mcode]."' and hocode =" .$HOCODE."  group by z_id ";

				$result = mysql_query($sql);
				if($result)
				while($rs=mysql_fetch_array($result)){

		//////////////////////////////ยอดเก้บได้คงค้าง//////////////////////////////////////////
				$sql2=" select z_id,if(count(rec_id) is null ,'0',count(rec_id)) as CRec2,if(sum(sum_m) is null,'0',sum(sum_m)) as  stotal2 from zone left join meter m  on z_id = mid(mcode,3,1)  and hocode = mid(mcode,1,2)
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
				 where  z_id = '" .$rs_1[mcode]."' and hocode =" .$HOCODE."  ";
				 $sql2.=  " group by mid(mcode,3,1) order by mid(mcode,3,1) ";			

				$result2= mysql_query($sql2);
				if($result2)
				while($rs2=mysql_fetch_array($result2)){

					$SumMtotal =  $rs[stotal1]+$rs2[stotal2];
			////////////////////////////////ยอดเงินคงค้างยกมา/////////////////////////////////////////////
					$p_date_2 = ($Yr-543)."-".($month)."-31";
					$sql3=" select  if(sum(sum_m) is null,'0',sum(sum_m)) as stotal3,if(count(rec_id) is null,'0',count(rec_id)) as num1 
					from zone left join  meter on z_id = mid(mcode,3,1)  
				 and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' )
				 or p_date >  '" .$p_date_2. "'  ) and hocode = mid(mcode,1,2) and  ";
				 $ex = substr($month,0,1);
				if($ex =='0') $monthh = substr($month,1);	
				else $monthh = $month;	 

						if($month  <> '' and $monthh <=9 ){		 
							$sql3.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql3.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}
				 $sql3.=  " or myear < '" .$year."')
				 where z_id = '" .$rs_1[mcode]."' and hocode =" .$HOCODE." ";
				 $sql3.=  "  group by mid(mcode,3,1) ";			

				$result3= mysql_query($sql3);
				if($result3)
				while($rs3=mysql_fetch_array($result3)){
		////////////////////////////////////เลขที่ใบเสร็จตั้งต้น////////////////////////////////////
				$sqlR1="select mid(rec_id,1,4) as rec1 from meter where myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$HOCODE."' and rec_id <> '' and rec_id is not null and rec_status is not null 
				and mid(mcode,3,1) = '" .$rs_1[mcode]."'
				and rec_status <> 'ยกเลิก'  group by mid(rec_id,1,4)";

				$resultR1 = mysql_query($sqlR1);
				if ($resultR1 )
				while($rsR1=mysql_fetch_array($resultR1)){

		  ///////////////////////////////เลขตั้งแต่ -- ถึง//////////////////////////////////////
				$sqlR2=" select min(rec_id) as minrec, max(rec_id) as maxrec, sum(sum_m) as stotal1,sum(total) as stotal2 from meter 
				where rec_id like '" .$rs[rec1]. "%' and myear = '" .$year. "' and monthh = ".$month."
				and mid(mcode,3,1) = '" .$rs_1[mcode]."'
    			and mid(mcode,1,2) = '" .$HOCODE."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก'  ";

				$resultR2= mysql_query($sqlR2);
				if($resultR2)
				while($rsR2=mysql_fetch_array($resultR2)){

		   ///////////////////////////////จำนวน/////////////////////////////////////////
				$sqlR3=" select  count(rec_id) as summem  from meter 
				where  rec_id like '" .$rs[rec1]. "%'  and myear = '" .$year. "' and monthh = ".$month."
				and mid(mcode,3,1) = '" .$rs_1[mcode]."'
    			and mid(mcode,1,2) = '" .$HOCODE."' and rec_id <> '' and rec_id is not null 
				and rec_status is not null and rec_status <> 'ยกเลิก' group by mid(rec_id,1,4)";

				$resultR3 = mysql_query($sqlR3);
				if($resultR3)
				while($rsR3=mysql_fetch_array($resultR3)){

				$stotal3 = $stotal3 + $rs3[stotal3];
				$stotal = $stotal  + $rs_1[stotal];
				$stotal4 =  $stotal4 + $rs2[stotal2];
				$stotal5 = $stotal5 + $rs[stotal1];
				$stotal6 = $stotal6 + (($rs3[stotal3]+$rs_1[stotal])-$SumMtotal);
				$SumNum1 = $SumNum1 + $rs_1[num1];
				$SumNum2 = $SumNum2 + $rs3[num1];
				$HONAME = $rs_1[honame];

			?>
 <tr class="bmText" bgcolor="#FFFFFF" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
    <td height="25"  align="center"><font size="1">&nbsp;<? echo $rs_1[mcode]; ?></font></td>
    <td height="25"  align="left"><font size="1">&nbsp;<? echo $rs_1[z_name]; ?></font></td>
    <td height="25"  align="left"><font size="1">&nbsp;
	<?  if($rsR2[minrec]  == $rsR2[maxrec]){		 
             echo substr($rsR1[rec1]."/".$rsR2[minrec],5); 
}else{	
            echo substr($rsR1[rec1]."/".$rsR2[minrec],5)."-" .substr($rsR2[maxrec],5);
}
		?></font></td>
    <td align="center">&nbsp;<? echo number_format($rs_1[num1]); ?></td>
    <td align="center">&nbsp;<? echo number_format($rs_1[stotal],2); ?></td>
    <td align="center">&nbsp;<?=number_format($rs[stotal1],2);?></td>
    <td align="center">&nbsp;<? echo number_format($rs_1[stotal]-$rs[stotal1],2); ?></td>
    <td align="center">&nbsp;<? echo Chk_Monthh($rs_1[mcode],$year,$month,$Yr,$HOCODE);?>
</td>
    <td align="center">&nbsp;<? echo number_format($rs3[num1]); ?></td>
    <td align="center">&nbsp;<? echo number_format($rs3[stotal3],2); ?></td>
    <td align="center">&nbsp;<?=number_format($rs2[stotal2],2);?></td>
    <td align="center">&nbsp;<? echo number_format($rs3[stotal3]-$rs2[stotal2],2); ?></td>
    <td align="center">&nbsp;<? echo number_format(($rs3[stotal3]+$rs_1[stotal])-$SumMtotal,2); ?></td>
  </tr>
  <?
			   }}}}}}}
			   ?>
  <tr  class="lgBar"  bgcolor="#DEE4EB">
    <td height="25"  align="center">&nbsp;</td>
    <td>&nbsp;</td>
	 <td><div align="center">รวม</div></td>
     <td align="center">&nbsp;<?=number_format($SumNum1);?></td>
    <td align="center">&nbsp;<?=number_format($stotal,2);?></td>
    <td align="center">&nbsp;<?=number_format($stotal5,2);?></td>
    <td align="center"><? echo number_format($stotal-$stotal5,2); ?></td>
    <td>&nbsp;</td>
    <td align="center">&nbsp; <?=number_format($SumNum2);?></td>
    <td align="center">&nbsp;<?=number_format($stotal3,2);?></td>
    <td align="center">&nbsp;<?=number_format($stotal4,2);?></td>
    <td align="center">&nbsp;<?=number_format($stotal3-$stotal4,2);?></td>
    <td align="center">&nbsp;<?=number_format($stotal6,2);?></td>
  </tr>
</table>

	</td>
  </tr>
  </table>
 </form>
<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report1_Z.php?month=<?=$month?>&year=<?=$year?>&year2=<?=$Yr?>&HOCODE=<?=$HOCODE?>&HONAME=<?=$HONAME?>')"/ class="buttom">

</FONT></center></div> 
</body>
</html>
<?
function Chk_Monthh($mcode,$year,$month,$Yr,$HOCODE){
$X = 0;
$Min = "";
$Max = "";
$Min2 = "";
$Max2 = "";
$YMin = "";
$str ='';
$total = 0 ;
$Yr_old ='';
$Yr_New ='';
$total2 ='0';
///////////////////////////////////หาเดือนคงค้าง/////////////////////////////////////////////
$p_date_2 = ($Yr-543)."-".($month)."-31";
					$sql4=" select mid(rec_date,1,4)as Yr,min(monthh)as MinM,max(monthh)as MaxM,count(*)as CRec
					from  meter where  mid(mcode,3,1) = '" .$mcode."' and  mid(mcode,1,2) = '" .$HOCODE."'
				 and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' )
				 or p_date >  '" .$p_date_2. "'  ) and  ";
				 $ex = substr($month,0,1);
				if($ex =='0') $monthh = substr($month,1);	
				else $monthh = $month;	 
	
						if($month  <> '' and $monthh <=9 ){		 
							$sql4.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql4.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}
				 $sql4.=  " or myear < '" .$year."')
				 group by mid(rec_id,1,4) order by rec_date";			
	
				$result4= mysql_query($sql4);
				if($result4)	
				$i=1;
				while($rs4=mysql_fetch_array($result4)){
				$X = mysql_num_rows($result4);
			
				if($rs4[MinM] == $rs4[MaxM]  and $i ==1  ){
						$Yr_old = $rs4[Yr];	
						 $Yr_New = $Yr_old;
						$total = $total + $rs4[CRec];
						$Max = $rs4[MaxM];
						$Min = $rs4[MinM];
				}
			    if( $rs4[MinM] == $rs4[MaxM] and $Yr_old == $rs4[Yr] and $i >1  ){
							$total = $total + $rs4[CRec];
							$Max = $rs4[MaxM];
							$Yr_old = $rs4[Yr];	
				}elseif( $rs4[MinM] == $rs4[MaxM] and $Yr_old <> $rs4[Yr] ){
						  $total2 = $total2 + $rs4[CRec];
						  $Yr_New = $rs4[Yr];	
						  $Min2 = $rs4[MinM];
						  $Max2 = $rs4[MaxM];
						  $B=1;
				}elseif( $rs4[MinM] == $rs4[MaxM] and $Yr_New == $rs4[Yr] and $B>1){
							$total2 = $total2 + $rs4[CRec];
							$Max2 = $rs4[MaxM];
							$Yr_New = $rs4[Yr];		
							$B++;	  
				}		
				$i++;
				}

				if($X==0){ //ไม่มีข้อมูล
						echo "-";
				}elseif ($Min == $Max and $total2 == "0"){ //ค้าง 1 เดือน ปีเดียว
						echo mounth2($Min)." ".substr($Yr_old +543,2)."(".$total.")";
				}elseif ($Min <> $Max and $total2 == "0"){
						echo mounth2($Min)."-".mounth2($Max)." ".substr($Yr_old +543,2)."(".$total.")";
				}elseif  ($Min == $Max and $Min2 == $Max2 and $total2 > "0" ){
						echo mounth2($Min)." ".substr($Yr_old +543,2)."(".$total.") / " .mounth2($Max2)." ".substr($Yr_new +543,2)."(".$total2.")";
				}elseif  ($Min <> $Max and $Min2 == $Max2 and $total2 > "0" ){
						echo mounth2($Min)."-".mounth2($Max)." ".substr($Yr_old +543,2)."(".$total.") / " .mounth2($Max2)." ".substr($Yr_New +543,2)."(".$total2.")";
				}elseif  ($Min == $Max and $Min2 <> $Max2 and $total2 > "0"){
						echo mounth2($Min)." ".substr($Yr_old +543,2)."(".$total.") / " .mounth2($Min2)."-" .mounth2($Max2).substr($Yr_New +543,2)."(".$total2.")";
				}

			}
?>
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
<table  width="60%"   border="0" align="center" cellpadding="1" cellspacing="1">
  </table>
<table  width="80%"   border="0" align="center" cellpadding="1" cellspacing="1">
    </table>
  <br>
  <?
$p_date_1 = ($YY-543)."-".$month."-"."31"; 
$sql_1="select r.mcode, concat(pren,name,' ',surn) as name1, concat(hno1,'/',hno) as addr1, rec_id, total, rec_date,r.monthh ,r.myear ,amt_1
            from m_bin b, member m, receive r  where r.mcode = b.mcode and b.mem_id = m.mem_id 
            and mid(r.mcode,1,2) = '" .$hocode."' and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' ) 
            or  p_date >'".$p_date_1."' ) and ";
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
		if($month  <> '' and $monthh <=9 ){		 
            $sql_1.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
		}elseif($month  <> '' and $monthh > 9 ){	
            $sql_1.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
		}
if($month  <> '' ) $sql_1 .=  " or myear < '" .$year. "' ";
 $sql_1 .=  "  ) order by rec_date, r.mcode   ";	
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
 /////////////เช็คหมู่//////////////////
			 $moo1 = substr($hocode,0,1);
			 if($moo1=='0') $moo2 = substr($hocode,1);
			else $moo2 = $hocode;	 
?>
  <table  width="90%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr  class="header">
      <td  height="35" colspan="14" ><div  align="left" >ข้อมูลบิลค้างชำระ หมู่ที่ <?=$moo2."   " .$honame?> 
          ประจำเดือน&nbsp;
        <?=mounth3($month)."  ".$year?>
     </div></td>
          </tr>
 <tr >
      <td  height="10" colspan="14"><hr></td>
    </tr>
  <tr>
    <td  colspan="2" >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
  <tr  class="body1">
        <td width="11%"  height="25" align="center"><strong>ที่</strong></td>
		<td width="13%"  height="25" align="center"><strong>เลขทะเบียน</strong></td>
		<td width="24%"  height="25" align="center"><p><strong>ชื่อ - สกุล</strong></p>		  </td>
    	 <td width="10%"  align="center"><strong>เลขที่บิล</strong></td>
		 <td width="14%"  align="center"><strong>เงินตามบิล</strong></td>
	  <td width="15%"  align="center"><p><strong>ประจำเดือน</strong></p>	    </td> 
          </tr>
		  <tr ><td height="10" colspan="7" align="center"><hr ></td>
          </tr>  
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
$total  = 0;
$total_qty = 0;
$total_total= 0;
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	$total_qty  = $total_qty  + ($rs_1[total]/$rs_1[amt_1]);
	$total_total  = $total_total  + $rs_1[total];
	//////////////////เช็คปี/////////////////////
	if ($rs_1[monthh] == '10' or $rs_1[monthh] == '11' or $rs_1[monthh] == '12' ) {
							$Yr = ($rs_1[myear]-1);
				}else{
							$Yr = ($rs_1[myear]);
				}		
?>       
<tr  bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''"  class="body1">
 <td  height="31"  align="center">&nbsp;<? echo $i; ?></td>
 <td  height="31"   align="center">&nbsp;<? echo $rs_1[mcode]; ?></td>
 <td  height="31"  align="left">&nbsp;<? echo $rs_1[name1]; ?></td>
 <td  align="center">&nbsp;<?=$rs_1[rec_id];  ?></td>
 <td > <div align="center">&nbsp;<? echo number_format($rs_1[total]); ?></div></td>
  <td > <div align="center">&nbsp;<? echo mounth2($rs_1[monthh])." ".$Yr;?></div></td>
</tr>
 <? 
	}
?>
 <tr ><td height="10" colspan="7" align="center"><hr ></td>
 </tr>  
<tr  class="body1">
 <td  height="31"  align="center"><strong>รวม</strong></td>
  <td  height="31"   align="left">&nbsp;</td>
  <td  height="31"  align="center">&nbsp;</td>
 <td  align="center">&nbsp;</td>
 <td > <div align="center">&nbsp;<?=number_format($total_total)?></div></td>
 <td > <div align="center">&nbsp; </div></td>
 </tr>
  <tr ><td height="10" colspan="7" align="center"><hr ></td>
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
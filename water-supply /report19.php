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
<table  width="90%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
  <td>
  <table width="100%" cellspacing="0"  cellpadding="0" border="0"  style="border-collapse:collapse;">
			 <tr>
            <td  height="42">&nbsp;รายงานสรุปค่าน้ำประปาค้างชำระ&nbsp;&nbsp;หมู่ที่ : <?=$HOCODE." " .$honame?>&nbsp;ประจำเดือน :&nbsp;<?=mounth3($month)."  ".$year?>
            </strong>
            <div align="center" class="style1"></div></td>
            </tr>
						 <tr>
            <td width="890"  height="15"><hr></td>
            </tr>

      </table>		
  </td></tr>
  <table  width="90%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2"   ><table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
        <tr class="body1"  bgcolor="#DEE4EB">
        <td width="10%"  height="31" align="center"><strong>เขตที่</strong></td>
        <td width="40%"  height="31" align="center"><strong>ชื่อเขต</strong></td>
        <td width="15%"  height="31" align="center"><strong>จำนวนราย</strong></td>
        <td width="15%"  align="center"><strong>จำนวนบิล</strong></td>
        <td width="19%"  align="center"><strong>จำนวนเงิน (บาท)</strong></td>
      </tr>
   <?
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1=" select z.hocode,honame,z_id,z_name, if(count(rec_id)is null,'0',count(rec_id)) as total1 , 
if(sum(sum_m)is null,'0',sum(sum_m)) as total2 from (house h,zone z)left join meter on z_id = mid(mcode,3,1)
and z.hocode = mid(mcode,1,2) 
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
 $sql_1 .=  "  )  where z.hocode = '".$HOCODE."' and h.hocode = z.hocode
 group by z_id order by z_id    ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
$total  = 0;
$sumtotal1  = 0;
$sumtotal2  = 0;
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#ffffff';
		$sumtotal1 = $sumtotal1  + $rs_1[total1];
		$sumtotal2  = $sumtotal2  + $rs_1[total2];
		$total_mem  = $total_mem  +  Find_mem($rs_1[z_id],$year,$month,$HOCODE);
?>
      <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<? echo $rs_1[z_id]; ?></td>
        <td  height="25"   align="left">&nbsp;<? echo $rs_1[z_name]; ?></td>
        <td  height="25"  align="center">&nbsp;<? echo Find_mem($rs_1[z_id],$year,$month,$HOCODE); ?></td>
        <td  align="center">&nbsp;<? echo $rs_1[total1]; ?></td>
        <td  align="center">&nbsp;
            <?=number_format($rs_1[total2],2);?></td>
      </tr>
      <? 
	}
?>
      <tr class="body1" bgcolor="#DEE4EB" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center"><strong>รวม</strong></td>
        <td  height="25"   align="left">&nbsp;</td>
        <td  height="25"  align="center"><strong>&nbsp;
              <?=number_format($total_mem)?>
        </strong></td>
        <td  align="center"><strong>&nbsp;
              <?=number_format($sumtotal1)?>
        </strong></td>
        <td  align="center"><strong>&nbsp;
              <?=number_format($sumtotal2,2)?>
        </strong></td>
      </tr>
    </table></td>
  </tr>
  </table>
</form>
</body>
</html>
<? function Find_mem($zid,$year,$month,$HOCODE){
			$p_date_1 = ($year-543)."-".$month."-"."31";
             $sql_2=" select sum_m ,if(count(mem_id) is null,'0',count(mem_id))as total3 , mem_id from meter m ,q_water q 
        Where mid(m.mcode, 3, 1) = '".$zid."' 
        and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status is not null and rec_status <> 'ยกเลิก' )
        or p_date > '".$p_date_1."'  ) and m.mcode = q.mcode " ;
		if($month  <> '' and $month <=9 ){		 
					$sql_2.= " and ((myear = '" .$year. "' and monthh < ".$month.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
		}elseif($month  <> '' and $month > 9 ){	
					$sql_2.= " and ((myear = '".$year."' and monthh >= 10 and monthh < ".$month.") ";
		}
		if($month  <> '' ) $sql_2 .=  " or  myear < '" .$year. "' ";
		 $sql_2 .=  "  ) and  mid(m.mcode, 1, 2) = '".$HOCODE."' group by mem_id order by m.mcode ";
		$result_2 = mysql_query($sql_2);
		if($result_2)
		$rs_2=mysql_fetch_array($result_2);
		return mysql_num_rows($result_2);
}
?>
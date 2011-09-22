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
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;สรุปรายงานประจำเดือน</div>	</td>
	</tr>
</table>	</td>
	</tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
                    <td width="16%"><strong>&nbsp;&nbsp;หมู่บ้าน</strong></td>
			
                    <td width="84%"><div><?
			$query  ="select * from house  order by HOCODE";
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
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
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
              <option value="11" <? if($month =='11') echo "selected"?>>พฤศจิกายน </option>
              <option value="12" <? if($month =='12') echo "selected"?>>ธันวาคม </option>
            </select>&nbsp;&nbsp;ปีงบประมาณ</strong>
			<? $queryMyear  ="select myear from start ";
			$result_Myear=mysql_query($queryMyear);
			if($result_Myear)
			$Myear =mysql_fetch_array($result_Myear);
			//echo $Myear[myear];
			?>
            <select name="year"><? if($year ==''  ) $year =$Myear[myear];?>
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
  <tr class="bmText" height="25">
                    <td width="16%"><strong>&nbsp;&nbsp;สถานะ</strong></td>
			
                    <td width="84%"><div><select name="status"  >
	<option value=""		<? if($status == ''  ) echo "selected";?>>----ทั้งหมด----</option>
    <option value="ชำระแล้ว"<? if($status =='ชำระแล้ว' ) echo "selected";?>>ชำระแล้ว</option>
	<option value="ค้างชำระ"<? if($status =='ค้างชำระ' ) echo "selected";?>>ค้างชำระ</option>
</select></div>				</td>
          </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>
<br>
<?
if($search <>''){
if($month  <> '' and $month <=9 ){
$p_date_1 = ($year-543)."-".$month."-"."31";
$YY=$year;
}else{
$p_date_1 = (($year-1)-543)."-".$month."-"."31";
$YY=$year-1;
}
$p_date_1 = ($YY-543)."-".$month."-"."31";
$sql="select  count(*) as rec,sum(total)as total  from receive m
 where (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' ) 
             or  p_date >'".$p_date_1."' )  ";
			 
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
if($month  <> '' and $monthh <=8 ){		 
		$sql .=  " and ((myear = '".$year. "' and monthh < ".$monthh.")  or (myear = '" .$year. "' and monthh >= 10 and monthh <=12) ";
}elseif($month  <> '' and $monthh > 8 ){	
        $sql .=  "  and ((myear =  '".$year. "'  and monthh >= 10 and monthh < ".$monthh.") ";
}
 $sql .=  "   or myear < ".$year. ")   ";
if($HOCODE <>'') $sql .=  "  and  mid(MCODE,1,2)  = '".$HOCODE."' ";
  $sql .=  "  group by  mid(mcode,1,2)   ";
$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);
if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;
$Num_Pages = (int)$Num_Pages;
if(($Page>$Num_Pages) || ($Page<0))
print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
}
$result1 = mysql_query($sql);
?>
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="7"><div  align="left">&nbsp;&nbsp;ยอดยกมา</div></td>
          </tr>
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
if($result1)
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#ffffff';
?>       
<tr class="bmText" bgcolor="#b9c9fe" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td width="34%"  height="25"  align="center">&nbsp;ยอดยกมา   <? echo $rs[rec]; ?> บิล</td>
  <td width="23%"  height="25"  align="center">&nbsp;<? echo $rs[total]; ?> บาท</td>
 <td width="19%"  align="center"><a href="view_detail.php?hocode=<?=$HOCODE?>&month=<?=$month?>&year=<?=$year?>&YY=<?=$YY?>"   target="_blank">รายละเอียด</a></td>
</tr>
 <? 
	}
?>
        </table>
	  </td>
    </tr>
  </table>
  <br>
  <?
if($search <>''){
if($month  <> '' and $month <=9 ){
$p_date_1 = ($year-543)."-".$month."-"."31";
$YY=$year;
}else{
$p_date_1 = (($year-1)-543)."-".$month."-"."31";
$YY=$year-1;
}
$sql_1=" Select  m.mem_id,concat(pren,m.name,' ',m.surn)as name,mb.mem_id,mb.MCODE,mb.RDATE,mb.HNO1,mb.HNO,mb.moo,mb.qty,mb.amt,mb.type1,";
$sql_1 .=  "  r.rec_id,r.MCODE,r.MYEAR,r.MONTHH,r.rec_date,r.TOTAL,p_date,r.rec_status ";
$sql_1 .=  "  from member m,m_bin mb,receive r ";
$sql_1 .=  "  where  mb.MCODE = r.MCODE and m.mem_id = mb.mem_id  ";
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
if($month  <> '' ) $sql_1 .=  " and monthh =".$monthh." and  myear = '" .$year. "' ";
if($HOCODE <>'') $sql_1 .=  "  and  mb.HOCODE  = '".$HOCODE."' ";
if($status <>'') $sql_1 .=  "  and rec_status   = '".$status."' ";
  $sql_1 .=  "  order by mb.MCODE   ";
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
}
$result_1 = mysql_query($sql_1);
?>
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;สรุปรายงานประจำเดือน</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="7%"  height="31" align="center"><strong>ที่</strong></td>
		<td width="18%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
		<td width="8%"  height="31" align="center"><p><strong>เลขที่</strong></p>
		  <p><strong>ใบเสร็จ</strong></p></td>
         <td width="7%"  align="center"><strong>ปริมาณ(ลิตร)</strong></td>
		 <td width="7%"  align="center"><strong>ราคา</strong></td>
		<td width="6%"  align="center"><strong>ประเภท</strong></td>
         <td width="8%"  align="center"><p><strong>วันที่ออก</strong></p>
           <p><strong>ใบเสร็จ</strong></p></td>
    <td width="7%"  align="center"><p><strong>รวม</strong></p>
      <p><strong>เป็นเงิน</strong></p></td> 
	  <td width="6%"  align="center"><p><strong>คงค้าง</strong></p>
	    <p><strong>ยกมา</strong></p></td> 
	    <td width="4%"  align="center"><strong>รวม</strong></td> 
		  <td width="8%"  align="center"><p><strong>วันที่</strong></p>
		    <p><strong>ชำระ</strong></p></td> 
		  <td width="8%"  align="center"><p><strong>จำนวนเงิน</strong></p>
		    <p><strong>ที่ชำระ</strong></p></td> 
<td width="6%"  align="center"><p><strong>คงค้าง</strong></p>
  <p><strong>ยกไป</strong></p></td> 
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
$total_Find_Remain = 0;
$total_all = 0;
$total_Find_SumPay = 0;
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total_qty  = $total_qty  + $rs_1[qty];
	$total_total  = $total_total  + $rs_1[TOTAL];
	$total_Find_Remain  = $total_Find_Remain  +  Find_Remain($rs_1[MCODE],$YY,$month,$year);
	$total_all = $total_all  + $rs_1[TOTAL] + Find_Remain($rs_1[MCODE],$YY,$month,$year);
	$total_Find_SumPay  = $total_Find_SumPay  +  Find_SumPay($rs_1[MCODE],$YY,$month);
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
  <td  height="25"  align="center">&nbsp;<? echo $rs_1[rec_id]; ?></td>
   <td  align="center">&nbsp;<?=$rs_1[qty];  ?></td>
 <td  align="center">&nbsp;<?=$rs_1[TOTAL];  ?></td>
 <td > <div align="center">&nbsp;<? echo $rs_1[type1];  ?> </div></td>
 <td > <div align="center">&nbsp; <? echo date_2($rs_1[rec_date]);  ?>   </div></td>
 <td > <div align="center">&nbsp;<? echo $rs_1[TOTAL];  ?></div></td>
 <td align="center">&nbsp;<?
 if (Find_Remain($rs_1[MCODE],$YY,$month,$year) == 0) {
 echo "";
 }else{
  echo Find_Remain($rs_1[MCODE],$YY,$month,$year);
   }?></td>
  <td > <div align="center">&nbsp; <? echo  $rs_1[TOTAL] + Find_Remain($rs_1[MCODE],$YY,$month,$year)?>     </div></td>
 <td > <div align="center">&nbsp;
   <? if($rs_1[p_date] !='1111-11-11') echo date_2($rs_1[p_date]); else ''; ?> 
  </div></td>
 <td > <div align="center">&nbsp; <? echo Find_SumPay($rs_1[MCODE],$YY,$month);  ?>     </div></td>
 <td > <div align="center">&nbsp; <? echo $rs_1[TOTAL] + Find_Remain($rs_1[MCODE],$YY,$month,$year)  - Find_SumPay($rs_1[MCODE],$YY,$month);  ?>     </div></td></tr>
 <? 
	}
?>
<tr class="bmText"  bgcolor="#DEE4EB">
 <td  height="25"  align="center"><strong>รวม</strong></td>
  <td  height="25"   align="center">&nbsp;<?=$i?> <strong>รายการ</strong></td>
  <td  height="25"  align="center">&nbsp;</td>
   <td  align="center">&nbsp;<?=$total_qty ?></td>
 <td  align="center">&nbsp;<?=number_format($total_total,2)?></td>
 <td > <div align="center">&nbsp; </div></td>
 <td > <div align="center">&nbsp; </div></td>
 <td > <div align="center">&nbsp; <?=number_format($total_total,2)?></div></td>
 <td > <div align="center">&nbsp; <?=number_format($total_Find_Remain)?></div></td>
 <td > <div align="center">&nbsp; <?=number_format($total_all,2)?></div></td>
 <td > <div align="center">&nbsp; </div></td>
 <td > <div align="center">&nbsp; <?=number_format($total_Find_SumPay,2)?></div></td>
 <td > <div align="center">&nbsp; <?=number_format(($total_all-$total_Find_SumPay),2)?></div></td></tr>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report_17_print.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE ?>')"/ class="buttom">
</center></div> 
</body>
</html>
<?
function Find_Remain($mcode,$YY,$month,$year){
		$p_date_1 = ($YY-543)."-".$month."-"."31";
        $sql =  "select sum(total)as total  from receive m  where mcode = '".$mcode."' and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' ) or  p_date >'".$p_date_1."' )   ";
		$ex = substr($month,0,1);
		if($ex =='0') $monthh = substr($month,1);	
		else $monthh = $month;	 
		if($month  <> '' and $monthh <=8 ){		 
				$sql .=  " and ((myear =  '".$year. "' and monthh <  ".$monthh.")  or (myear =  '" .$year. "' and monthh >= 10 and monthh <=12) ";
		}elseif($month  <> '' and $monthh > 8 ){	
				$sql .=  "  and ((myear =  '".$year. "'  and monthh >= 10 and monthh < ".$monthh.") ";
		}
		$sql .=  " or myear <  '".$year. "')  ";
		$sql .=  " group by mcode  order by rec_date, mcode ";
		$result = mysql_query($sql);
		if($result)
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
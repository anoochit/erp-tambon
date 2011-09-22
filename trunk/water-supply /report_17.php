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
                    <td width="84%"><div><select name="HOCODE" onChange="dochange('ZONE', this.value)" ><?
			$query  ="select * from house  order by HOCODE";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?>
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
                    <td width="16%"><strong>&nbsp;&nbsp;เขต</strong></td>
                    <td width="84%"><div id = "ZONE">
                      <?
		if($HOCODE ==''){
        $query  ="select z_id,z_name from zone z,house h where z.hocode = h.hocode  and z.hocode = '".min_hocode( )."' order by z.hocode ";
		 $result = mysql_query($query);
  ?>
           <select name="z_id"  >
		       <option value="">-------ทั้งหมด--------</option>
  <?
		while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[z_id];?>"
		<?
		if($z_id == $d[z_id] ) echo "selected";
		?>
		><? echo $d[z_name];?></option>
	            <? }?>
	    </select>
		<? }else{
		        $query1  ="select z_id,z_name from zone z,house h where z.hocode = h.hocode  and z.hocode = '".$HOCODE."' order by z.hocode ";
		 $result1 = mysql_query($query1);
  ?>
           <select name="z_id"  >
		       <option value="">-------ทั้งหมด--------</option>
  <?
		while($d1 =mysql_fetch_array($result1)){
	?>
	    <option value="<? echo $d1[z_id];?>"
		<?
		if($z_id == $d1[z_id] ) echo "selected";
		?>
		><? echo $d1[z_name];?></option>
	            <? }?>
	    </select>
		<? }?>
                    </div></td>
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
</select></div></td>
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
$sql="select  count(*) as rec,sum(sum_m)as total  from meter m
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
if($z_id <>'') $sql .=  "  and  mid(MCODE,3,1)  = '".$z_id."' ";
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
 <td width="34%"  height="25"  align="center">&nbsp;ยอดยกมา   <? echo number_format($rs[rec]); ?> บิล</td>
  <td width="24%"  height="25"   align="left">&nbsp;<? echo number_format($rs[total],2); ?></td>
  <td width="23%"  height="25"  align="center">&nbsp;<? echo number_format($rs[total],2); ?></td>

 <td width="19%"  align="center"><a href="view_detail.php?hocode=<?=$HOCODE?>&month=<?=$month?>&year=<?=$year?>&ZID=<?=$z_id?>&YY=<?=$YY?>"   target="_blank">รายละเอียด</a></td>
</tr>
	 <? }?>
       </table>
	  </td>
    </tr>
  </table>
  <br>
  <?
if($search <>''){
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_2="Select  q.MCODE,concat(pren,name,'  ',surn) as name,moo,HNO1,HNO,if(total is null,'',total) as total,
if(sum_m is null,'',sum_m)as sum_m,if(rec_id is null,'',rec_id) as rec_id,if(amount is null,'',amount)as amount 
,if(m2.m_date is null,'',m2.m_date) as m_date,if(vat is null,'',vat)as vat,rec_date,amount , p_date,
if(m_rate is null,'',m_rate)as m_rate,if(m_amt is null,'',m_amt)as m_amt,q.mno as m_meter,m2.mno as m_new
 from (member m,q_water q) left join meter m2 on q.MCODE = m2.MCODE 
 where q.mem_id = m.mem_id  ";
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
if($month  <> '' ) $sql_2 .=  " and monthh =".$monthh." and  myear = '" .$year. "' ";
if($HOCODE <>'') $sql_2 .=  " and  q.HOCODE = '".$HOCODE."' ";
if($z_id <>'') $sql_2 .=  " and mid(q.MCODE,3,1) = '".$z_id."' ";
$sql_2.=" group by q.MCODE order by MCODE ";
$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$result_2= mysql_query($sql_2);
$Page_start = ($Per_Page*$Page)-$Per_Page;
if($result_2)
$Num_Rows = mysql_num_rows($result_2);
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
$result_2 = mysql_query($sql_2);
?>  
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="19"><div  align="left">&nbsp;&nbsp;สรุปรายงานประจำเดือน</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="5%"  height="31" align="center"><strong>ที่</strong></td>
		<td width="13%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
		<td width="6%"  height="31" align="center"><p><strong>บ้านเลขที่</strong></p>		  </td>
         <td width="5%"  align="center"><p><strong>เลขที่</strong></p>
           <p><strong>ใบเสร็จ</strong></p></td>
		 <td width="5%"  align="center"><strong>เลขมาตร</strong></td>
		 <td width="4%"  align="center"><strong>จาก</strong></td>
         <td width="5%"  align="center"><p><strong>ถึง</strong></p>           </td>
    	 <td width="6%"  align="center"><p><strong>จำนวน<p>หน่วย</p></strong><strong></strong></p>      </td> 
		 <td width="6%"  align="center"><p><strong>คิดเป็นเงิน</strong><strong></strong></p>	    </td> 
	     <td width="5%"  align="center"><strong><p>ภาษี </p>7% </strong></td> 
		 <td width="5%"  align="center"><p><strong>ค่าบริการ</strong></p>		    </td> 
		 <td width="6%"  align="center"><p><strong>รวมเป็นเงิน</strong><strong></strong></p>		    </td> 
		 <td width="5%"  align="center"><p><strong>คงค้าง</strong></p>
		  <p><strong>ยกมา</strong></p></td> 
		<td width="5%"  align="center"><p><strong>รวม</strong><strong></strong></p>	    </td> 
		<td width="7%"  align="center"><strong>วันที่ชำระ </strong></td> 
		<td width="6%"  align="center"><strong><p>จำนวนเงิน</p>ที่ชำระ</strong>		    </td> 
		<td width="6%"  align="center"><strong><p>คงค้าง</p>ยกไป</strong><strong></strong>		    </td> 
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
$total_Find_SumRemain = 0;
if($result_2)
while($rs_2=mysql_fetch_array($result_2)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total_qty  = $total_qty  + $rs_2[amount];
	$total_total  = $total_total  + $rs_2[m_amt];
	$total_vat  = $total_vat  + $rs_2[vat];
	$total_m_amt  = $total_m_amt  + $rs_2[m_amt];
	$total_sum_m  = $total_sum_m  + $rs_2[sum_m];
	$total_Find_Remain  = $total_Find_Remain  +  Find_Remain($rs_2[MCODE],$YY,$month,$year);
	$total_all = $total_all  + $rs_2[sum_m] + Find_Remain($rs_2[MCODE],$YY,$month,$year);
	$total_Find_SumPay  = $total_Find_SumPay  +  Find_SumPay($rs_2[MCODE],$YY,$month);
	$total_Find_SumRemain  = $total_Find_SumRemain  +  ($rs_2[sum_m] + Find_Remain($rs_2[MCODE],$YY,$month,$year)  - Find_SumPay($rs_2[MCODE],$YY,$month));

?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
   <td  height="25"  align="center">&nbsp;<? echo $rs_2[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_2[name]; ?></td>
  <td  height="25"  align="center">&nbsp;
    <?
 if ($rs_2[HNO1]==""or $rs_2[HNO1]=="-") { 
 echo $rs_2[HNO];
 }elseif ($rs_2[HNO]=="0"){ 
 echo "";
 }else{ 
 echo $rs_2[HNO]."/".$rs_2[HNO1];}
 ?></td>
 <td  align="center">&nbsp;<?=$rs_2[rec_id]?></td>
 <td  align="center">&nbsp;<?=$rs_2[m_meter]?></td>
 <td align="center">&nbsp;<?=$rs_2[m_new]-$rs_2[amount]?></td>
 <td align="center">&nbsp;<?=$rs_2[m_new]?></td>
 <td align="center">&nbsp;<?=number_format($rs_2[amount])?></td>
 <td align="center" >&nbsp;<?=number_format($rs_2[total])?></td>
 <td align="center">&nbsp;<?=number_format($rs_2[vat],2)?></td>
 <td align="center">&nbsp;<?=number_format($rs_2[m_amt])?></td>
 <td align="center">&nbsp;<?=number_format($rs_2[sum_m],2)?></td>
 <td align="center">&nbsp;<?
 if (Find_Remain($rs_2[MCODE],$YY,$month,$year) == 0) {
 echo "";
 }else{
  echo number_format(Find_Remain($rs_2[MCODE],$YY,$month,$year),2);
   }?></td>
 <td align="center">&nbsp;<? echo  number_format($rs_2[sum_m] + Find_Remain($rs_2[MCODE],$YY,$month,$year),2)?></td>
 <td align="center">&nbsp;<?
  if((Find_DatePay($rs_2[MCODE],$YY,$month) !='1111-11-11') and (Find_DatePay($rs_2[MCODE],$YY,$month) !=''))  {
  echo date_2(Find_DatePay($rs_2[MCODE],$YY,$month)); 
  }else{
   echo "" ;
   } ?></td>
 <td align="center">&nbsp;<?
 if (Find_SumPay($rs_2[MCODE],$YY,$month)<=0) {
 	echo "";
}else{
  echo number_format(Find_SumPay($rs_2[MCODE],$YY,$month),2); 
}  
   ?></td>
 <td align="center" >&nbsp;<? 
 
 if (($rs_2[sum_m] + Find_Remain($rs_2[MCODE],$YY,$month,$year)  - Find_SumPay($rs_2[MCODE],$YY,$month))<=0) {
 	echo "";
}else{
 echo number_format(($rs_2[sum_m] + Find_Remain($rs_2[MCODE],$YY,$month,$year)  - Find_SumPay($rs_2[MCODE],$YY,$month)),2);
 }
 ?></td>
 </tr>
 <? 
}
?>
<tr class="bmText"  bgcolor="#DEE4EB">
<td  height="25"  align="center"><strong>รวม</strong></td>
<td  height="25"   align="center">&nbsp;<?=$i?> <strong>รายการ</strong></td>
<td  height="25"  align="center">&nbsp;</td>
 <td  align="center">&nbsp;</td>
 <td  align="center">&nbsp;</td>
 <td >&nbsp;</td>
 <td >&nbsp;</td>
 <td  align="center">&nbsp;<?=number_format($total_qty) ?></td>
 <td  align="center">&nbsp;<?=number_format($total_total)?></td>
 <td align="center" >&nbsp;<?=number_format($total_vat)?></td>
 <td  align="center">&nbsp;<?=number_format($total_m_amt)?></td>
 <td  align="center">&nbsp;<?=number_format($total_sum_m)?></td>
 <td align="center" >&nbsp;<?=number_format($total_Find_Remain,2)?></td>
 <td align="center">&nbsp;<?=number_format($total_all,2)?></td>
 <td >&nbsp;</td>
 <td  align="center">&nbsp; <?=number_format($total_Find_SumPay,2)?></td>
 <td align="center" >&nbsp;<?=number_format($total_Find_SumRemain,2)?></td>
 </tr>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center">
<input  type="button" name="print" value=" พิมพ์ "  onclick="window.open('report_17_print.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE ?>&z_id=<?=$z_id?>')"/ class="buttom">
</center></div> 
</body>
</html>
<?
function Find_Remain($mcode,$YY,$month,$year){
		$p_date_1 = ($YY-543)."-".$month."-"."31";
        $sql =  "select sum(sum_m)as total  from meter m  where mcode = '".$mcode."' and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' ) or  p_date >'".$p_date_1."' ) and  ";
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
        $sql =  "select mcode,mid(p_date,1,7),sum(sum_m) as T,p_date from meter m 
            where p_date like '" .$MMM ."' and mcode = '" .$mcode. "' and rec_status is not null and rec_status <> 'ยกเลิก' 
			group by mid(mcode,1,2) order by mcode   ";
		//echo $sql."<br>";
		$result = mysql_query($sql);
		if($result)
		$rs_1=mysql_fetch_array($result);
		return $rs_1[T];
}
function Find_DatePay($mcode,$year,$month){
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

        $sqlD =  "select mcode,p_date from meter m 
            where p_date like '" .$MMM ."' and mcode = '" .$mcode. "' and rec_status is not null and rec_status <> 'ยกเลิก' 
			group by mid(mcode,1,2) order by mcode   ";
		$resultD = mysql_query($sqlD);
		if($resultD)
		$rs_D=mysql_fetch_array($resultD);
		return $rs_D[p_date];
}
?>
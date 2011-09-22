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
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function print_1(theForm) 
	{
		   if (  document.print_1.start.value=='' || document.print_1.start.value==' ' )
           {
				   alert("กรุณากรอกเลขเริ่มต้น");
				   document.print_1.start.focus();           
				   return false;
           }
		      if (  document.print_1.end.value=='' || document.end.start.value==' ' )
           {
				   alert("กรุณากรอกเลขเริ่มต้น");
				   document.print_1.end.focus();           
				   return false;
           }
		 if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}
	}
</script>
<link href="style2.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<body>
<form action="" method="post" name="search">
<table  width="80%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="4"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle"><!--<img src="PNG-32/Bar Chart.png" align="absmiddle"> -->&nbsp;&nbsp;&nbsp;ใบเสร็จรับเงิน	</td>
	</tr>
</table>	</td>
	</tr> 
	<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="15%"><strong>&nbsp;&nbsp;ปีงบประมาณ</strong></td>
            <? $queryMyear  ="select myear from start ";
			$result_Myear=mysql_query($queryMyear);
			if($result_Myear)
			$Myear =mysql_fetch_array($result_Myear);
			?>
		    <td width="31%"  ><div>&nbsp;&nbsp;<select name="year">
	<?
	if($year =='') $year = $Myear[myear];
	for($i=-10;$i<=2;$i++){
	?>
	<option value="<?=date("Y") + 543+$i?>" <? if($year ==(date("Y") + 543+$i) ) echo "selected"?>><?=date("Y") + 543+$i?></option>
	<?
	}
	?>
	</select>
	</td>
	 <td width="10%"  ><strong>&nbsp;&nbsp;เดือน</strong></td>
	  <td width="44%"  ><div>&nbsp;&nbsp;
	    <select name="month" >
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
            </select>
  </td>
                  </tr>
     <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
				   <td  >
				  <strong>&nbsp;&nbsp;หมู่บ้าน</strong>
				  </td>
				  <td ><div>&nbsp;&nbsp;<?
			$query  ="select * from house  order by HOCODE";
			$result=mysql_query($query);
			?><select name="HOCODE" onChange="dochange('ZONE', this.value)"  >
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[HOCODE];?>"
		<?
		if($HOCODE == $d[HOCODE]) echo "selected";
		?>
		><? echo $d[HONAME];?></option>
                        <? }?>
            </select>				</td>

				   <td  >
				  <strong>&nbsp;&nbsp;เขต</strong>
				  </td>
				  <td ><div id = "ZONE">&nbsp;&nbsp;
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
		<? }?>			</div>	</td>

          </tr>
          <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
    <td colspan="4" align="center" height="35" ><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>
</form>
<form action="rep_print_1.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE?>&z_id=<?=$z_id?>" method="post" name="f22" target="_blank" onSubmit="return check(this);"> 
<br>
  <?
if($search <>''){
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
$sql_ex =" Select  q.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo,q.mno, ";
$sql_ex  .=  " if(m2.mno is null,' ',m2.mno) as M ,s.amt ,if(rec_status is null,'ค้างชำระ',rec_status) as rec_status,r.amt as rate,if(rec_id is null,'',rec_id)as rec_id, ";
$sql_ex  .=  " if(p_date is null,'',p_date)as p_date,if(amount is null,'',amount)as amount ,if(m2.m_date is null,'',m2.m_date) as m_date,if(m2.m_rate is null,'',m2.m_rate) as m_rate,if(m2.m_amt is null,'',m2.m_amt) as m_amt,print_status,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo, if(rec_date is null,'',rec_date)as rec_date ";
$sql_ex  .=  " from member m,service1 s,rate_water r,q_water q left join meter m2 on q.MCODE = m2.MCODE";
$sql_ex  .=  " Where q.mem_id = m.mem_id And s.scode = q.scode And r.tmcode = q.tmcode ";
$sql_ex  .=  " and q.status = 'ปกติ'  and  hocode ='" .$HOCODE. "'   ";
$sql_ex  .=  " and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
if($z_id <> '' ) $sql_ex  .=  "  and mid(q.MCODE,3,1) = '" .$z_id. "'  ";
$sql_ex  .=  "  group by q.MCODE ";
$Per_Page = 20;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$result_1= mysql_query($sql_ex );
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
$sql_ex  .= " LIMIT $Page_start , $Per_Page";
}
$result_1 = mysql_query($sql_ex );
$aa = explode("*" ,rate_water($HOCODE) );
?>
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="17"><div  align="left">&nbsp;&nbsp;&nbsp;&nbsp;ใบเสร็จรับเงิน  &nbsp;
	  </td>
	  </tr>	
	<?  if($search <>''){  ?>
	  <tr class="lgBar">
      <td  height="30" colspan="9" > 
	&nbsp;&nbsp;<input  type="button" name="print" value=" เลขที่ใบเสร็จ "  onclick="javascript:popup('add_rep.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE?>&z_id=<?=$z_id?>','',400,300)"/ class="buttom">
     	  &nbsp;<input  type="button" name="print" value=" รายงานใบกำกับบิล "  onclick="window.open('rep_bill.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE?>&z_id=<?=$z_id?>')"/ class="buttom">
		  &nbsp;<input  type="button" name="print" value=" ตรวจสอบใบจดมาตร "  onclick="window.open('rep_bill_2.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE?>&z_id=<?=$z_id?>')"/ class="buttom">
		    &nbsp;<input  type="button" name="print" value="ใบเสร็จคงค้าง"  onclick="window.open('rep_bill_stay.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE?>&z_id=<?=$z_id?>')"/ class="buttom"><br>
			</td> 
			<td  height="28" colspan="9"><fieldset>
            <legend align="left" ><strong>พิมพ์ใบเสร็จรับเงิน</strong> </legend>
 หมายเหตุ  <input name="memo" type="text" id="memo" value="<?=$memo?>"  size="35"><br>
              ตั้งแต่ลำดับที่  &nbsp;&nbsp;<input name="start" type="text" size="5" maxlength="4"  class="text" >
         &nbsp;&nbsp;ถึง &nbsp;&nbsp;<input name="end" type="text" size="5" maxlength="4"  class="text" > &nbsp;&nbsp;<input  type="submit" name="print" value="  พิมพ์ "  class="buttom">
            </fieldset>
	   </td>
          </tr> 
		  <? }?>
  <tr class="bmText"  bgcolor="#DEE4EB">
				<td width="2%"  height="31" align="center"><strong>ที่</strong></td>
				<td width="6%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
				<td width="10%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
				<td width="6%"  height="31" align="center"><strong>บ้านเลขที่</strong>		</td>
				 <td width="8%"  align="center"><strong>เลขที่ใบเสร็จ</strong></td>
				 <td width="10%"  align="center"><strong>วันที่ออกใบเสร็จ</strong></td>
				<td width="3%"  align="center"><strong>ใช้น้ำ</strong></td>
		    <td width="6%"  align="center"><strong>จำนวนเงิน</strong></td>
		    <td width="6%"  align="center"><strong>ภาษี</strong></td>
		    <td width="7%"  align="center"><strong>ค่าเช่ามาตร</strong></td>
		    <td width="5%"  align="center"><strong>รวมเงิน</strong></td> 
		    <td width="4%"  align="center"><strong>สถานะ</strong></td> 
		    <td width="6%"  align="center"><strong>วันที่รับเงิน</strong></td>
		    <td width="3%"  align="center"><strong>พิมพ์</strong></td> 
				<td width="3%"  align="center"><strong>ครั้งที่</strong></td> 
			<td width="3%"  align="center"><strong>หมายเหตุ</strong></td> 
          </tr>
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
$total=0;
if($result_1)	
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $i; ?><input type="hidden" name="num<?=$i?>" value="<?=$i?>"></td>
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
   <td  align="center">&nbsp;<?
   if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1]?></td> 
   <td  height="25"  align="center">&nbsp;<?  if($rs_1[rec_id] =='') echo "";
 else echo $rs_1[rec_id]; ?></td>
 <td  align="center"> &nbsp;<?
 if($rs_1[rec_id] =='') echo date_2(date("Y-m-d")); 
 else echo date_2($rs_1[rec_date]);
   ?> </td>
 <td > &nbsp; <? echo $rs_1[amount];  ?>   </td>
 <td  align="center"> &nbsp; <? 
	if($rs_1[amount] <= 100) {
			$amount =$rs_1[amount]  *$aa[0];
			if($amount == 0 )	$amount  = S_Min();
	}elseif( $rs_1[amount]  > 100 and  $rs_1[amount] <=300){
			$amount =100 *$aa[0];
			$amount = $amount + (($rs_1[amount] - 100) *$aa[1]);
	}else{
			$amount =100 *$aa[0];
			$amount =$amount  +(200 *$aa[1]) ;
			$amount = $amount + (($rs_1[amount] - 300) *$aa[2]);
	}
	
echo number_format($amount,2)  ;
 ?>     </td>
 <td > &nbsp;  <?   
	 $vat = ($amount *VAT()) / 100; 
	 echo ($amount *VAT()) / 100; ?>      </td>
 <td > &nbsp;
<?  
echo rent();
 ?>   
  </td>
 <td > <div  align="right"><?  echo number_format($amount + rent()  +  $vat,2) ;  ?> &nbsp;  </div></td>
  <td  align="center"> &nbsp;   <? echo $rs_1[rec_status];  ?>  </td>
 <td  align="center"> &nbsp; <?  if($rs_1[p_date] =='1111-11-11' or $rs_1[p_date] !='') echo "";
 else echo date_2($rs_1[p_date]);?>     </td>
 <td > &nbsp; <?   if($rs_1[print_status] =='1') echo "P";
 else echo "";?>     </td>
 <td > &nbsp;
   <?  echo $rs_1[p_num];  ?> 
  </td>
 <td > &nbsp; <?  echo $rs_1[memo];  ?>     </td>
</tr>
 <? 
	}
?>
	  <?
	   if($search <> ''){?>
	<? }?>
        </table>
	  </td>
    </tr>
  </table>
</form>
<span class="bmText" >
<center>จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=frm_receive&search=$search&Page=$Prev_Page&year=$year&month=$month&HOCODE=$HOCODE&z_id=$z_id&search=$search'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=frm_receive&search=$search&Page=$i&year=$year&month=$month&HOCODE=$HOCODE&z_id=$z_id&z_id=$z_id&search=$search'>$i</a>]";
else 
echo "<b> $i </b>";
}

if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=frm_receive&search=$search&Page=$Next_Page&year=$year&month=$month&HOCODE=$HOCODE&z_id=$z_id&search=$search'> หน้าถัดไป>> </a>";

?>
</center><br>
</span> 
</body>
</html>
<?
function Find_rep($monthh,$year,$HOCODE){
				$i = 0 ;
				$sql_ex =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo, ";
				$sql_ex  .=  "  if(rec_status is null,'ค้างชำระ',rec_status) as rec_status, ";
				$sql_ex  .=  "  if(rec_id is null,'',rec_id)as rec_id, ";
				$sql_ex  .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
				$sql_ex  .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
				$sql_ex  .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
				$sql_ex  .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
				$sql_ex  .=  "  Where b.mem_id = m.mem_id and b.status = 'ปกติ'   ";
				$sql_ex  .=  "  and  hocode = '" .$HOCODE. "'   ";
				$sql_ex  .=  "  group by b.MCODE ";
				$result_1 = mysql_query($sql_ex );
				if($result_1)
				while($rs_1=mysql_fetch_array($result_1)){
						 if($rs_1[rec_id] =='') {
						 		$i++;
						}
				}
				return $i;
}
function Find_rep_1($monthh,$year,$HOCODE){
				$i = 0 ;
				$sql_ex =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo, ";
				$sql_ex  .=  "  if(rec_status is null,'ค้างชำระ',rec_status) as rec_status, ";
				$sql_ex  .=  "  if(rec_id is null,'',rec_id)as rec_id, ";
				$sql_ex  .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
				$sql_ex  .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
				$sql_ex  .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
				$sql_ex  .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
				$sql_ex  .=  "  Where b.mem_id = m.mem_id and b.status = 'ปกติ'   ";
				$sql_ex  .=  "  and  hocode = '" .$HOCODE. "'   ";
				$sql_ex  .=  "  group by b.MCODE ";
				$result_1 = mysql_query($sql_ex );
				if($result_1)
				while($rs_1=mysql_fetch_array($result_1)){
						 if($rs_1[rec_id] <>'') {
						 		$i++;
						}
				}
				return $i;
}
?><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function check(theForm) 
	{
		if (  document.f22.start.value=='' || document.f22.start.value==' ' )
           {
           alert("กรุณากรอกเลขที่เริ่มต้น");
           document.f22.start.focus();           
           return false;
           }
		      if (  document.f22.end.value=='' || document.f22.end.value==' ' )
           {
           alert("กรุณากรอกเลขที่สิ้นสุด");
           document.f22.end.focus();      
           return false;
           }
		 
		   if (confirm("คุณต้องการพิมพ์ข้อมูล ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}
}
</script>
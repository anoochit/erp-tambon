<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<? 
if($save <>''){
			for ($i=1;$i<$total_t;$i++) {
					if($chk_t[$i] <>''){
								$amount = $chk_t[$i] - $ch_k_t[$i];
								$sql = "replace into meter(myear,monthh,mcode,m_date,mno,amount)
								values ( '".$year."' , '".$month."' ,'".$mcode[$i]."'  ,  '".date_format_sql($m_date)."' , '".$chk_t[$i]."' ,'".$amount."')"; 
								$dbquery = mysql_query($sql);
					}
			}
		echo "<br><br><center><font color=red  size=3>บันทึกข้อมูลเรียบร้อยแล้ว</font>		</center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=frm_meter2&HOCODE=$HOCODE&search=$search&month=$month&year=$year\">\n";
}
?>
<script language="JavaScript" type="text/javascript">
//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 	{

		  var j = 1;	
		for(i=1;i<=eval(document.form_1.total_t.value);i++){ 
				if(document.form_1['chk_t['+i+']'].value  !=''){
					if(eval(document.form_1['chk_t['+i+']'].value)< eval(document.form_1['ch_k_t['+i+']'].value) ){
								alert("มาตรน้ำที่กรอกต่ำกว่ามาตรน้ำเดิม  กรุณากรอกใหม่");
								document.form_1['chk_t['+i+']'].focus();  
								return false;
						}else{
							j++;
						}
				}
	}
	 if( j  > 1 ){
				 if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
					{
						return true;
					}else{
							return false;
					}
		}
			return false;
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
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;ข้อมูลการค้นหา</td>
	</tr>
</table>	</td>
	</tr> 
	<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="15%"><strong>&nbsp;&nbsp;ปีงบประมาณ</strong>
			</td>
			<? $queryMyear  ="select myear from start ";
			$result_Myear=mysql_query($queryMyear);
			if($result_Myear)
			$Myear =mysql_fetch_array($result_Myear);
			?>
			<td width="31%"  ><div>&nbsp;&nbsp;<select name="year">
                          <? if($year ==''  ) $year =$Myear[myear];?>
                          <?
	for($i=-2;$i<=2;$i++){
	?>
                          <option value="<?=date("Y") + 543+$i?>" <?	if($year ==(date("Y") + 543+$i) ) echo "selected" ;
	?>>
                            <?=date("Y") + 543+$i?>
                          </option>
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
          </tr>
		  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
    <td colspan="4" align="center" height="35" ><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>
</form>
<form action="#" method="post" name="form_1"  onSubmit="return validate()" > 
<input type="hidden" name="year" value="<?=$year?>">
<input type="hidden" name="month" value="<?=$month?>">
<input type="hidden" name="HOCODE" value="<?=$HOCODE?>">
<input type="hidden" name="search" value="<?=$search?>">
<br>
  <?
if($search <>''){
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
	$sql_ex =" Select  q.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,if(m2.mno is null,'',m2.mno) as M ,";
    $sql_ex  .=  "  if(amount is null,'',amount)as amount ,if(m2.m_date is null,'',m2.m_date) as m_date";
    $sql_ex  .=  " , if(rec_id  is null,'',rec_id) as recid,q.mno as no  ";
    $sql_ex  .=  " from member m,q_water q left join meter m2 on q.MCODE = m2.MCODE ";
    $sql_ex  .=  " where q.mem_id = m.mem_id  and  hocode = '" .$HOCODE. "'" ;
	$sql_ex  .=  " and status ='ปกติ'   ";
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
}
$result_1 = mysql_query($sql_ex );
?>
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="30" colspan="17"><div  align="left">&nbsp;&nbsp;&nbsp;&nbsp;บันทึกมาตรวัดน้ำประจำเดือน&nbsp;	  &nbsp;&nbsp;วันที่วัดมาตรน้ำ&nbsp;&nbsp;    <input name="m_date" type="text" id="m_date" value="<? if($m_date =='') echo date("d/m/Y") ;else echo $m_date;?>"  size="10" /class="text"  >
                  &nbsp; <img  src="images/calculator_add.png" onClick="showCalendar('m_date','DD/MM/YYYY')" align="absmiddle"   />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="submit" name="save"   value=" บันทึก "  class="buttom" ></div> </td>
	  </tr>	
  <tr class="bmText"  bgcolor="#DEE4EB">
				<td width="6%"  height="31" align="center"><strong>ที่</strong></td>
				<td width="13%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
				<td width="29%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
				<td width="10%"  height="31" align="center"><strong>บ้านเลขที่</strong>		</td>
				 <td width="10%"  align="center"><strong>มาตรเดิม</strong></td>
				 <!--<td width="12%"  align="center"><strong>วันที่วัดมาตรใหม่</strong></td> -->
				<td width="9%"  align="center"><strong>มาตรใหม่</strong></td>
				 <td width="11%"  align="center"><strong>จำนวนที่ใช้น้ำ</strong></td>
          </tr>
<?
$total=0;
$i = 0;
$j =  0 ;
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
   <td  height="25"  align="center">&nbsp;<? echo Showdata_LastMonth($rs_1[MCODE] , $month , $year )?></td>
 <td > <div align="center">&nbsp; 
   <? 
 $dd = explode("," , Showdata_LastMonth_2($rs_1[MCODE] , $month , $year));
 if( $dd[2] >0){
		echo $dd[0];
 }else{
 	$j++;
  ?> 
  <input type="hidden" name="mcode[<? echo $j?>]" value="<?=$rs_1[MCODE]?>">
  <input  type="hidden"name="ch_k_t[<? echo $j?>]" value="<? echo Showdata_LastMonth_3($rs_1[MCODE] , $month , $year )?>">
   <input type="text" name="chk_t[<? echo $j?>]" value=""  size="8"  onKeyDown="document.onkeydown=check_number">
   <? }?>  
 </div></td>
  <td><div align="center">
    <? 
 if( $dd[2] >0){
		echo $dd[1];
}
 ?>
  </div></td>
</tr>
 <? 
	}
?>
        </table>
	  </td>
    </tr>
  </table>
   <input type="hidden" name="total_t" value="<? echo  $j?>"> 
</form>
</body>
</html>
<script type="text/javascript">  
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
<?
function Showdata_LastMonth($MCODE , $month , $year){
				$sql_ex =" Select  mno, if(rec_id is null,'-',rec_id), mno-amount  as mno2 from meter where mcode = '".  $MCODE ."' ";
				 if ($month >= '10' ) {
						 if ($month == '10' ) {
								$sql_ex  .=  "  and  monthh = '" .$month. "' and  myear = '" . ($year - 1) ."' ";
						}else{
								$sql_ex  .=  "  and  monthh = '" .$month. "' and  myear = '" . $year ."' ";
						}
				}else{
						$sql_ex  .=  "  and  monthh = '" .$month. "' and  myear = '" . $year ."' ";
				}
				$result_1 = mysql_query($sql_ex );
				if($result_1)
				$arr  = mysql_fetch_array($result_1);
				$num =  mysql_num_rows($result_1) ;
				if($num<=0){
							if(Showdata_LastMonth_1($MCODE , $month , $year) <=0){
									return "<font color=red><b>".q_water($MCODE) ."</b></font>";
							}else{
									return  Showdata_LastMonth_1($MCODE , $month , $year) ;
							}		
				}else{
					return   $arr[mno2];
				}
}
function Showdata_LastMonth_1($MCODE , $month , $year ){
			$monthh = $month -1 ;
			$sql_ex_1 =" Select  mno, if(rec_id is null,'-',rec_id), mno-amount from meter where mcode = '".  $MCODE ."' ";
			if($monthh <> '0' ) {
							 if ($month >= '10' ) {
									 if ($month == '10' ) {
											$sql_ex_1  .=  "  and  monthh = '" .($month -1). "' and  myear = '" . ($year - 1) ."' ";
									}else{
											$sql_ex_1  .=  "  and  monthh = '" .($month -1) . "' and  myear = '" . $year ."' ";
									}
							}else{
									$sql_ex_1 .=  "  and  monthh = '" .($month -1) . "' and  myear = '" . $year ."' ";
							}
				}else{
						$sql_ex_1  .=  "  and monthh = '12' and  myear = '" .$year. "' ";
				}
				$result_1_1 = mysql_query($sql_ex_1 );
				$arr_1  = mysql_fetch_array($result_1_1);
				return $arr_1[mno];
}
function Showdata_LastMonth_2($MCODE , $month , $year){
				$sql_ex_2=" Select  mno, if(rec_id is null,'-',rec_id), mno-amount  as mno2 , amount from meter where mcode = '".  $MCODE ."' ";
				 if ($month >= '10' ) {
						 if ($month == '10' ) {
								$sql_ex_2 .=  "  and  monthh = '" .$month. "' and  myear = '" . ($year - 1) ."' ";
						}else{
								$sql_ex_2  .=  "  and  monthh = '" .$month. "' and  myear = '" . $year ."' ";
						}
				}else{
						$sql_ex_2  .=  "  and  monthh = '" .$month. "' and  myear = '" . $year ."' ";
				}
				$result_1_2 = mysql_query($sql_ex_2 );
				if($result_1_2)
				$arr_2  = mysql_fetch_array($result_1_2);	
				return   $arr_2[mno].",".$arr_2[amount].",".mysql_num_rows($result_1_2);
}
function Showdata_LastMonth_3($MCODE , $month , $year){
				$sql_ex =" Select  mno, if(rec_id is null,'-',rec_id), mno-amount  as mno2 from meter where mcode = '".  $MCODE ."' ";
				 if ($month >= '10' ) {
						 if ($month == '10' ) {
								$sql_ex  .=  "  and  monthh = '" .$month. "' and  myear = '" . ($year - 1) ."' ";
						}else{
								$sql_ex  .=  "  and  monthh = '" .$month. "' and  myear = '" . $year ."' ";
						}
				}else{
						$sql_ex  .=  "  and  monthh = '" .$month. "' and  myear = '" . $year ."' ";
				}
				$result_1 = mysql_query($sql_ex );
				$arr  = mysql_fetch_array($result_1);
				if($result_1)
				if(mysql_num_rows($result_1) <=0){
							if(Showdata_LastMonth_1($MCODE , $month , $year) <=0){
									return q_water($MCODE) ;
							}else{
									return  Showdata_LastMonth_1($MCODE , $month , $year) ;
							}		
				}else{
					return   $arr[mno2];
				}
}
function q_water($mcode){
			$sql_ex =" select m_total from q_water where mcode like   '".  $mcode ."' ";			
			$result_1 = mysql_query($sql_ex );
			if($result_1)
			$arr  = mysql_fetch_array($result_1);
			return $arr[m_total];
}
?>
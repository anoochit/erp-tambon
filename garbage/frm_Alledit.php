<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($save_as <>''){
		if($type ==1){
						if($total <> '' and $chk <>''){ //แก้ไขวันที่ออกใบเสร็จ
							for ($i=0;$i<=$total;$i++) {
								if ($chk[$i] != "") { 
										$k = explode("*",$chk[$i]);
										$sql_insert="update receive  set rec_date = '".date_format_sql($RDATE)."' where mcode = '".$k[0]. "' and  rec_id ='".$k[1]. "'  ";
										$result_insert  = mysql_query($sql_insert); 
								}
							}	
						}
			}elseif($type ==2){ // แก้ไขวันที่ชำระเงิน 
					if($total <> '' and $chk <>''){
							for ($i=0;$i<=$total;$i++) {
								if ($chk[$i] != "") { 
										$k = explode("*",$chk[$i]);
										$sql_insert="update receive  set p_date = '".date_format_sql($RDATE)."' where mcode = '".$k[0]. "' and  rec_id ='".$k[1]. "'  ";
										$result_insert  = mysql_query($sql_insert); 
								}
							}	
						}
			}elseif($type ==3){ // ยกเลิกการชำระเงิน
					if($total <> '' and $chk <>''){
							for ($i=0;$i<=$total;$i++) {
								if ($chk[$i] != "") { 
										$k = explode("*",$chk[$i]);
										$sql_insert="update receive  set rec_status ='ค้างชำระ' ,  p_date ='1111-11-11'  where mcode = '".$k[0]. "' and  rec_id ='".$k[1]. "'  ";
										$result_insert  = mysql_query($sql_insert); 
								}
							}	
						}
			}
				echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
				echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการบันทึกข้อมูล</font></center><br><br>";
		 		print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=frm_Alledit&search=$search&year=$year&month=$month&HOCODE=$HOCODE&status=$status\">\n";
	}
?>
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};
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
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};
function dochange1(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_3.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}
</script>
<link href="style2.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<body>
<form action="" method="post" name="f22">
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="4"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;แก้ไขข้อมูล</div>	</td>
	</tr>
</table>	</td>
	</tr> 
	<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="20%"><strong>&nbsp;&nbsp;ปีงบประมาณ</strong>
			<? $queryMyear  ="select myear from start ";
			$result_Myear=mysql_query($queryMyear);
			if($result_Myear)
			$Myear =mysql_fetch_array($result_Myear);
			?>
			</td>
                    <td width="44%"  ><div>&nbsp;&nbsp;<select name="year">
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
	</div></td>
	 <td width="10%"  ><strong>&nbsp;&nbsp;เดือน</strong></td>
	  <td width="26%"  >&nbsp;&nbsp;<select name="month" >
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
  </div></td>
                  </tr>
     <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
				   <td  >
				  <strong>&nbsp;&nbsp;หมู่บ้าน</strong>
				  </td>
				  <td >&nbsp;&nbsp;<?
			$query  ="select * from house  order by HOCODE";
			$result=mysql_query($query);
			?><select name="HOCODE"  >
       <option value=''>----------ทั้งหมด----------</option> 
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[HOCODE];?>"
		<?
		if($HOCODE == $d[HOCODE]) echo "selected";
		?>
		><? echo $d[HONAME];?></option>
                        <? }?>
            </select></div></td>
			 <td  >
				  <strong>&nbsp;&nbsp;สถานะ</strong>
				  </td>
				  <td >&nbsp;&nbsp;<select name="status"  >
	<option value=""		<? if($status == ''  ) echo "selected";?>>----ทั้งหมด----</option>
    <option value="ชำระแล้ว"<? if($status =='ชำระแล้ว' ) echo "selected";?>>ชำระแล้ว</option>
	<option value="ค้างชำระ"<? if($status =='ค้างชำระ' ) echo "selected";?>>ค้างชำระ</option>
</select></div></div>				</td>
          </tr>
				  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
    <td colspan="4" align="center" height="35" ><input   type="submit"  name="search" value=" ค้นหา "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>
<br>
</form>
<form action="" method="post" name="pay"> 
  <?
if($search <>''){
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
$sql_ex =" Select  c.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO, rec_status,rec_id,rec_date,  qty , total ";
$sql_ex  .=  "  from member m,m_bin b, receive c  Where b.mem_id = m.mem_id  ";
$sql_ex  .=  "  and c.MCODE = b.MCODE ";
$sql_ex  .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
if($HOCODE <>'')$sql_ex  .=  "  and hocode  = '" .$HOCODE. "'   ";
				if($status <>''){
							if( $status =='ชำระแล้ว' ){
												$sql_ex  .= " and monthh = '" .$monthh. "' and  mid(rec_date,1,4) = '" . ($year  - 543). "' ";
												$sql_ex  .= " and rec_status = '" .$status. "' ";
							}elseif( $status =='ค้างชำระ' ){
												$sql_ex  .= " and monthh = '" .$monthh. "' and  mid(rec_date,1,4) = '" .($year - 543) . "' ";
							}
				}
	$sql_ex  .=  "  order by rec_id ";
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
<?  if($Num_Rows >0){?>
  <tr class="bmText"  bgcolor="#b9c9fe">
  <td width="8%"  height="35"  align="left" colspan="9"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="70%"><table name="add" cellpadding="1" cellspacing="1" border="0" width="100%">
				  <tr class="bmText" height="25">
              <td width="49%"  height="35"><strong>&nbsp;&nbsp;เงื่อนไขการแก้ไขข้อมูล</strong></td>
                    <td width="51%"><div>&nbsp;&nbsp;
			<select name="type" onChange="dochange1('Z1', this.value)" >
			  <option value="" <? //if($type =='') echo "selected"?> >--------------ประเภทการแก้ไขข้อมูล--------------</option>
              <option value="1" <? //if($type =='1') echo "selected"?> >แก้ไขวันที่ออกใบเสร็จ </option>
              <option value="2" <? //if($type =='2') echo "selected"?> >แก้ไขวันที่ชำระเงิน </option>
              <option value="3" <? //if($type =='3') echo "selected"?>>ยกเลิกการชำระเงิน </option>
            </select>
		    </div></td>
			</tr>
			<tr    class="bmText">
			<td id="Z1"  colspan="2">
			</td></tr>	  
              </table></td>
			  <td width="30%">
				  	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<input  type="submit" name="save_as" value="  บันทึก "  onClick="return validate();"class="buttom" >
					 <input type="hidden" name="year" value="<?=$year?>">
					 <input type="hidden" name="month" value="<?=$month?>">
					 <input type="hidden" name="HOCODE" value="<?=$HOCODE?>">
					 <input type="hidden" name="search" value="<?=$search?>">
			  </td>
  </tr>
</table>
</td>
    <td>&nbsp;</td>
  </tr>
</table>
				  </td></tr>
<? }?>
  <tr class="bmText"  bgcolor="#DEE4EB">
  <td width="8%"  height="31" align="center"><strong>เลือกทั้งหมด<br>
  <input name="allbox" onClick="selectall();" type="checkbox">
</strong></td>
        <td width="4%"  height="31" align="center"><strong>ที่</strong></td>
		<td width="17%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
		<td width="26%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
		<td width="8%"  height="31" align="center"><strong>บ้านเลขที่</strong>		</td>
         <td width="11%"  align="center"><strong>เลขที่ใบเสร็จ</strong></td>
		 <td width="11%"  align="center"><strong>วันที่ออกใบเสร็จ</strong></td>
         <td width="7%"  align="center"><p><strong>จำนวนเงิน</strong></p></td>
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
	$total=$total + ($rs_1[qty]*MONEY());
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<input  type="checkbox" name='chk[<?=$i?>]' value="<? echo $rs_1[MCODE]."*".$rs_1[rec_id]?>" <? if($chk[$i] <>'$rs_1[MCODE]*$rs_1[rec_id]') echo "selected" ?>></td>
 <td  height="25"  align="center">&nbsp;<? echo $i; ?><input type="hidden" name="num<?=$i?>" value="<?=$i?>"></td>
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
   <td  align="center">&nbsp;<?
   if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1]?></td> 
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[rec_id]; ?></td>
 <td > <div align="center">&nbsp;<?
 if($rs_1[rec_id] =='') echo date_2(date("Y-m-d"));
 else echo date_2($rs_1[rec_date]);
   ?> </div></td>
 <td > <div align="center">&nbsp; <? echo $rs_1[qty];  ?>   </div></td>
</tr>
 <? 
	}
?>
<?  if($Num_Rows >0){?>
<tr class="style4">
		<td colspan="12" height="40" class="style5"  valign="middle"><div align="center">จำนวนบิล <span class="style6">&nbsp;&nbsp;&nbsp;&nbsp;<?=$i?>&nbsp;&nbsp;&nbsp;&nbsp; </span> บิล
		&nbsp;&nbsp;&nbsp;&nbsp;จำนวนเงิน&nbsp;&nbsp;&nbsp;&nbsp; <span class="style6"><?=number_format($total)?> </span> &nbsp;&nbsp;&nbsp;&nbsp;บาท
		<br><input type="hidden" name="total" value="<?=$i?>">
		</div></td>
	</tr>
	<? }?>
        </table>
	  </td>
    </tr>
  </table>
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
      function checkAll(field) {
      if(document.pay.CheckAll.checked)
      {
      for (i = 0; i < field.length; i++)
      field[i].checked = true;
      }
      else
      {
      for (i = 0; i < field.length; i++)
      field[i].checked = true;
      }
      }
function selectall(){
	for (var i=0;i<document.pay.elements.length;i++)
	{
		var e = document.pay.elements[i];
		if (e.name != 'allbox')
			e.checked = document.pay.allbox.checked;
	}
}
function validate(theForm) 
	{
		if (  document.pay.type.value=='' || document.pay.type.value==' ' )
           {
           alert("กรุณาเลือกเงื่อนไขในการแก้ไขข้อมูล");
           document.pay.type.focus();           
           return false;
           }
		   if (  document.pay.type.value=='1'  && (document.pay.RDATE.value==' ' || document.pay.RDATE.value=='' ) )
           {
           alert("กรุณากรอกวันที่ออกใบเสร็จ");
           document.pay.RDATE.focus();           
           return false;
           }
		      if (  document.pay.type.value=='2'  && (document.pay.RDATE.value==' ' || document.pay.RDATE.value=='' ) )
           {
           alert("กรุณากรอกวันที่ชำระเงิน");
           document.pay.RDATE.focus();           
           return false;
           }
		var j =0;
		
		var v8 = document.pay.total.value;
		for (i=1;i<= eval(v8) ;++i) {
			if(document.pay["chk["+i+"]"].checked == true){
				j++;
			}
		 }
		 if( j <= 0){
			alert("กรุณาเลือกรายการที่ต้องการแก้ไข");
			return (false);
		}
		  	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่")){
					return true;
			}else{
					return false;
			}
	}
</script>
<script language="JavaScript" type="text/javascript">
		document.getElementById('show1').style.display='none';
</script> 
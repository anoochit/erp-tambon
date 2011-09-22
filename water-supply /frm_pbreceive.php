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
<form action="" method="post" name="f22">
<table  width="80%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="4"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;พิมพ์ใบเสร็จรับเงินย้อนหลัง</div>	</td>
	</tr>
</table>	</td>
	</tr> 
	<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="15%"><strong>&nbsp;&nbsp;ชื่อ -สกุล</strong></td>
                    <td width="28%"  ><div>&nbsp;&nbsp;<input type="text" name="nsurn" value="<?=$nsurn?>" size="20">
	</div></td>
	 <td width="14%"  ><strong>&nbsp;&nbsp;เลขทะเบียน</strong></td>
	  <td width="43%"  >&nbsp;&nbsp;
	    <input type="text" name="MCODE" value="<?=$MCODE?>" size="20">
  </div></td>
                  </tr>
     <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
				   <td  >
				  <strong>&nbsp;&nbsp;เลขที่ใบเสร็จ</strong>
				  </td>
				  <td colspan="4">&nbsp;&nbsp;<input type="text" name="rec_id" value="<?=$rec_id?>" size="20"></div>				</td>
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
if($search <>'' and ($nsurn <>''or $MCODE <>'' or $rec_id <>'')){
    					$sql_ex  = " Select  q.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,q.mno,";
						$sql_ex  .=  "  if(m2.mno is null,' ',m2.mno) as M ,s.amt ,rec_status,r.amt as rate,";
						$sql_ex  .=  " if(rec_id is null,'',rec_id)as rec_id,m2.rec_date , m2.sum_m,";
						$sql_ex  .=  "  p_date ,if(amount is null,'',amount)as amount ,if(total is null,'',total)as total  ,if(sum_m is null,'',sum_m)as sum_m ,if(vat is null,'',vat)as vat ,";
						$sql_ex  .=  " m2.m_date,if(m_rate  is null,'',m_rate)as m_rate,";
						$sql_ex  .=  " if(m_amt is null,'',m_amt) as m_amt,m2.myear,m_date,monthh";
						$sql_ex  .=  "  from member m,service1 s,rate_water r,q_water q left join meter m2 on q.MCODE = m2.MCODE";
						$sql_ex  .=  "  Where q.mem_id = m.mem_id And s.scode = q.scode And r.tmcode = q.tmcode";
						$sql_ex  .=" and print_status = '1'";
					if($nsurn <> ''){ 
							$sql_ex  .=  "  and (name like  '%" .$nsurn. "%'   ";
							$sql_ex  .=  "  or surn  like  '%" .$nsurn. "%' )  ";
					}
					if($MCODE <> '') $sql_ex  .=  "  and m2.MCODE  like   '" .$MCODE. "'   ";
					if($rec_id <> '') $sql_ex  .=  "  and rec_id  like     '" .$rec_id. "'   ";
					$sql_ex  .=  "  order by m2.MCODE   ";
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
?>
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">

  <tr class="bmText"  bgcolor="#DEE4EB">

        <td width="4%"  height="31" align="center"><strong>ที่</strong></td>
		<td width="8%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
		<td width="16%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
		<td width="8%"  height="31" align="center"><strong>บ้านเลขที่</strong>		</td>
         <td width="26%"  align="center"><strong>ข้อมูลใบเสร็จ</strong></td>
		 <td width="8%"  align="center"><p><strong>สถานะ</strong></p></td>
    <td width="7%"  align="center"><p><strong>วันที่รับเงิน</strong></p></td> 
	<td width="8%"  align="center"><p><strong>เลขมาตร</strong></p></td>
	<td width="7%"  align="center"><p><strong>วันที่วัดมาตร</strong></p></td>
	<td width="5%"  align="center"><p><strong>มาตรเดิม</strong></p></td>
 <td width="3%"  align="center"><p><strong>พิมพ์</strong></p></td> 
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
	$total=$total + $rs_1[sum_m];
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
<td  height="25"  align="center">&nbsp;<? echo $i; ?><input type="hidden" name="num<?=$i?>" value="<?=$i?>"></td>
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
   <td  align="center">&nbsp;<?
   if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1]?></td> 
   <td  height="25"  align="left">&nbsp;เลขที่ใบเสร็จ&nbsp; <font color="#FF0000">:<? echo $rs_1[rec_id]; ?></font><br>
   &nbsp;วันที่ออกใบเสร็จ&nbsp; <font color="#FF0000">: <?  if($rs_1[rec_id] =='') echo date_2(date("Y-m-d"));
 else echo date_2($rs_1[rec_date]);?></font><br>
   &nbsp;จำนวนน้ำที่ใช้&nbsp; <font color="#FF0000">: <? echo $rs_1[amount];  ?></font> หน่วย<br>
   &nbsp;จำนวนเงิน&nbsp; <font color="#FF0000">: <?=number_format($rs_1[total],2)?> </font>บาท<br>
   &nbsp;ภาษี&nbsp; <font color="#FF0000">: <?=$rs_1[vat]?></font> บาท<br>
   &nbsp;ค่าเช่ามาตร&nbsp; <font color="#FF0000">: <?=rent() ?></font> บาท<br>
&nbsp;รวมเงิน&nbsp; <font color="#FF0000">:    <strong><? echo number_format($rs_1[sum_m],2)?></strong></font> บาท<br>
   </td>
     <td  align="center"> &nbsp;   <? echo $rs_1[rec_status];  ?>  </td>
	 <td  align="center"> &nbsp; <?  if($rs_1[p_date] =='1111-11-11' or $rs_1[p_date] =='') echo "";
 else echo date_2($rs_1[p_date]);?>     </td>
   <td  align="center"> &nbsp;   <? echo $rs_1[mno];  ?>  </td>
   <td  align="center"> &nbsp; <?  
	//echo $rs_1[m_date]."<br>";
	if($rs_1[m_date] =='1111-11-11' or $rs_1[m_date] =='') echo "";
 else echo date_2($rs_1[m_date]);?>     </td>
 <td align="center" > &nbsp; <?  echo $rs_1[M];?>     </td>
 <td align="center" ><a href="#" onClick="window.open('rep_print_2.php?MCODE1=<?=$rs_1[MCODE]?>&rec_id1=<?=$rs_1[rec_id]?>')"><img   src="images/print_16.png"border="0" /></a></td>
</tr>

 <? 
	}
?>
<?  if($Num_Rows >0){?>
<tr class="style4">

		<td colspan="12" height="40" class="style5"  valign="middle"><div align="center">จำนวนบิล <span class="style6">&nbsp;&nbsp;&nbsp;&nbsp;<?=$i?>&nbsp;&nbsp;&nbsp;&nbsp; </span> บิล
		&nbsp;&nbsp;&nbsp;&nbsp;จำนวนเงิน&nbsp;&nbsp;&nbsp;&nbsp; <span class="style6"><?=number_format($total,2)?> </span> &nbsp;&nbsp;&nbsp;&nbsp;บาท
		<br><input type="hidden" name="total" value="<?=$i?>">

		</div></td>
	</tr>
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
echo " <a href='$PHP_SELF?action=frm_pbreceive&search=$search&Page=$Prev_Page&nsurn=$nsurn&MCODE=$MCODE&rec_id=$rec_id'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=frm_pbreceive&search=$search&Page=$i&nsurn=$nsurn&MCODE=$MCODE&rec_id=$rec_id'>$i</a>]";
else 
echo "<b> $i </b>";
}

if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=frm_pbreceive&search=$search&Page=$Next_Page&nsurn=$nsurn&MCODE=$MCODE&rec_id=$rec_id'> หน้าถัดไป>> </a>";

?>
</center><br>
</span> 
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
<?
  
?>
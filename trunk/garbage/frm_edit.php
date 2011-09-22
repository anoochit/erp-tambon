<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
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
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;แก้ไขข้อมูลใบเสร็จรับเงิน</div>	</td>
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
if($search <>'' and ($nsurn <>''or $MCODE <>'' or  $rec_id <>'') ){
$sql_ex =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,rec_status, ";
$sql_ex  .=  "  if(rec_id is null,'',rec_id)as rec_id,rec_date,";
$sql_ex  .=  "  if(qty is null,'0',qty)as qty ,if(total is null,'0',total)as total , r.myear,p_date,monthh ";
$sql_ex  .=  "   from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
$sql_ex  .=  "  Where b.mem_id = m.mem_id and b.status = 'ปกติ' and rec_status <> 'ยกเลิก'   ";
if($nsurn <> ''){ 
		$sql_ex  .=  "  and (name like  '%" .$nsurn. "%'   ";
		$sql_ex  .=  "  or surn  like  '%" .$nsurn. "%' )  ";
}
if($MCODE <> '') $sql_ex  .=  "  and b.MCODE  like   '" .$MCODE. "'   ";
if($rec_id <> '') $sql_ex  .=  "  and rec_id  like     '" .$rec_id. "'   ";

$sql_ex  .=  "  order by b.MCODE,rec_date   ";
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
        <td width="5%"  height="31" align="center"><strong>ที่</strong></td>
		<td width="10%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
		<td width="21%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
		<td width="9%"  height="31" align="center"><strong>บ้านเลขที่</strong>		</td>
         <td width="9%"  align="center"><strong>เลขที่ใบเสร็จ</strong></td>
		 <td width="12%"  align="center"><strong>วันที่ออกใบเสร็จ</strong></td>
         <td width="5%"  align="center"><p><strong>จำนวนเงิน</strong></p></td>
		 <td width="9%"  align="center"><p><strong>สถานะ</strong></p></td>
    <td width="11%"  align="center"><p><strong>วันที่รับเงิน</strong></p></td> 
 <td width="5%"  align="center"><p><strong>แก้ไข</strong></p></td> 
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
<td > <div align="center">&nbsp; <? echo $rs_1[rec_status]?>     </div></td> 
 <td > <div align="center">&nbsp;<?
 if($rs_1[p_date] =='1111-11-11') echo "-";
 else echo date_2($rs_1[p_date]);
   ?> </div></td>
   <td align="center" ><a href="#" onClick="javascript:popup('add_edit.php?MCODE1=<?=$rs_1[MCODE]?>&rec_id1=<?=$rs_1[rec_id]?>','',550,350)"> <img  src="images/pencil_16.png"border="0" /></a></td>
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
<span class="bmText" >
<center>จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า :  
<? /* สร้างปุ่มย้อนกลับ */

if($Prev_Page) 
echo " <a href='$PHP_SELF?action=frm_edit&search=$search&Page=$Prev_Page&nsurn=$nsurn&MCODE=$MCODE&rec_id=$rec_id'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)
echo "[<a href='$PHP_SELF?action=frm_edit&search=$search&Page=$i&nsurn=$nsurn&MCODE=$MCODE&rec_id=$rec_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=frm_edit&search=$search&Page=$Next_Page&nsurn=$nsurn&MCODE=$MCODE&rec_id=$rec_id'> หน้าถัดไป>> </a>";
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
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function check(theForm) 
	{
		if (  document.f22.type.value=='' || document.f22.type.value==' ' )
           {
           alert("กรุณาเลือกเงื่อนไขในการยกเลิก");
           document.f22.type.focus();           
           return false;
           }
		if (  document.f22.type.value=='1'  && (document.f22.new_rec_id.value==' ' || document.f22.new_rec_id.value=='' ) )
           {
           alert("กรุณากรอกเลขที่ใบเสร็จใหม่");
           document.f22.new_rec_id.focus();           
           return false;
           }
		   if (  document.f22.type.value=='1'  && (document.f22.RDATE.value==' ' || document.f22.RDATE.value=='' ) )
           {
           alert("กรุณากรอกวันที่ออกใบเสร็จ");
           document.f22.RDATE.focus();           
           return false;
           }
		   if (confirm("คุณต้องการเพิ่มข้อมูล ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}
}
</script>
<script language="JavaScript" type="text/javascript">
		document.getElementById('show1').style.display='none';
</script> 
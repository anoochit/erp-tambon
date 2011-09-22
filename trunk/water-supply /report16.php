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
<form name="f12" method="post"  action=""   >
<body>
<form name="f12" method="post"  action=""   >
<br>
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
  </table>
  <table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" ><table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
      <tr class="body1" bgcolor="#DEE4EB">
        <td  height="28" colspan="14"><div  align="left"><strong>&nbsp;&nbsp;รายงานตรวจสอบเลขมาตรคงที่ประจำเดือน
          <?=mounth3($month)?>
          &nbsp;
          <?=$year?>
        </strong></div></td>
      </tr>
      <tr class="body1"  bgcolor="#DEE4EB">
        <td width="7%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
        <td width="16%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
        <td width="6%"  height="31" align="center"><p><strong>บ้านเลขที่</strong><strong></strong></p></td>
        <td width="4%"  align="center"><p><strong>หมู่</strong></p></td>
        <td width="9%"  align="center"><p><strong>เลขมาตร</strong></p></td>
        <td width="8%"  align="center"><p><strong>มาตรเดิม</strong></p></td>
        <td width="8%"  align="center"><p><strong>ปัจจุบัน</strong></p></td>
        <td width="6%"  align="center"><p><strong>ใช้น้ำ</strong></p></td>
        <td width="6%"  align="center"><p><strong>ค่าหน่วย </strong></p></td>
        <td width="6%"  align="center"><p><strong>ภาษี</strong></p></td>
        <td width="8%"  align="center"><p><strong>ค่าเช่ามาตร</strong></p></td>
        <td width="7%"  align="center"><p><strong>รวมทั้งสิ้น</strong></p></td>
        <td width="9%"  align="center"><p><strong>เลขที่ใบเสร็จ </strong></p></td>
      </tr>
      <?
  $sql_1=" Select  q.MCODE,concat(pren,name,'  ',surn) as name,moo,q.mno,HNO1,HNO,if(m2.mno is null,'m_total',m2.mno) as M
  ,if(rec_id is null,'',rec_id)as rec_id,if(rec_status is null,'ค้างชำระ',rec_status)as rec_status,rec_date,p_date
 ,if(amount is null,'',amount)as amount ,  if(m2.m_date is null,'',m2.m_date) as m_daterec_id,rec_date,amount , m_date, if(m_rate is null,'',m_rate)as m_rate,if(m_amt is null,'',m_amt)as m_amt,monthh,myear from member m,q_water q ,meter m2 
 where  q.MCODE = m2.MCODE and q.mem_id = m.mem_id  and amount = '0' ";
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
if($month  <> '' ) $sql_1 .=  " and monthh =".$monthh." and  myear = '" .$year. "' ";
if($HOCODE <>'') $sql_1 .=  " and  q.HOCODE = '".$HOCODE."' ";
if($z_id <>'') $sql_1 .=  " and mid(q.MCODE,3,1) = '".$z_id."' ";
$sql_1.=" group by q.MCODE order by MCODE ";
$result_1= mysql_query($sql_1);
$total1  = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;
$total5 = 0;
$i = 0;
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total3 = $total3 + $rs_1[m_amt] ;
	$total5 = $total5 + $rs_1[amount] ;
?>
      <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
        <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
        <td  height="25"  align="center">&nbsp;
            <?
 if ($rs_1[HNO1]==""or $rs_1[HNO1]=="-") { 
 echo $rs_1[HNO];
 }elseif ($rs_1[HNO]=="0"){ 
 echo "";
 }else{ 
 echo $rs_1[HNO]."/".$rs_1[HNO1];}
 ?>        </td>
        <td ><div align="center">&nbsp;<? echo ($rs_1[moo]);  ?> </div></td>
        <td ><div align="center">&nbsp;<? echo ($rs_1[mno]);  ?></div></td>
        <td ><div align="center">&nbsp; <? echo ($rs_1[M]-$rs_1[amount]);  ?> </div></td>
        <td ><div align="center">&nbsp;<? echo ($rs_1[M]);  ?> </div></td>
        <td ><div align="center">&nbsp;<? echo ($rs_1[amount]);  ?> </div></td>
        <td ><div align="center">&nbsp;
              <?
 		 if($rs_1[amount] == "0" ){
					echo S_Min();
					$A = S_Min();
		}else{
					echo number_format(($rs_1[m_rate] * $rs_1[amount]));
					$A = ($rs_1[m_rate] * $rs_1[amount]);
		} ?>
        </div></td>
        <td ><div align="center">&nbsp;
                <?

 		 if($rs_1[amount] == "0" ){
					echo number_format((S_Min()* VAT())/100,2);
					$B=(S_Min()* VAT())/100;
		}else{
					echo number_format((($rs_1[m_rate] * $rs_1[amount])* VAT())/100,2);
					$B=(($rs_1[m_rate] * $rs_1[amount])* VAT())/100;
		} ?>
        </div></td>
        <td ><div align="center">&nbsp;<? echo ($rs_1[m_amt]);  ?> </div></td>
        <td ><div align="center">&nbsp;
              <?
 		 if($rs_1[amount] == "0" ){
					echo number_format(((S_Min()+((S_Min()* VAT())/100))+$rs_1[m_amt]),2);
					$C = ((S_Min()+((S_Min()* VAT())/100))+$rs_1[m_amt]);
		}else{
					echo number_format((($rs_1[m_rate] * $rs_1[amount])+((($rs_1[m_rate] * $rs_1[amount])* VAT())/100)+$rs_1[m_amt]),2);
					$C = (($rs_1[m_rate] * $rs_1[amount])+((($rs_1[m_rate] * $rs_1[amount])* VAT())/100)+$rs_1[m_amt]);
		} ?>
        </div></td>
        <td ><div align="center">&nbsp;<? echo ($rs_1[rec_id]);  ?></div></td>
      </tr>
      <? 	
  $total1 = $total1 + $A ;
  $total2 = $total2 + $B ;
  $total4 = $total4 + $C ;
	}
?>
      <tr class="body1"  bgcolor="#DEE4EB">
        <td width="7%"  height="25" align="center"><strong>รวม</strong></td>
        <td width="16%"  height="25" align="center"><strong>&nbsp;<? echo $i; ?>&nbsp;&nbsp;&nbsp;รายการ </strong></td>
        <td width="6%"  height="25" align="center">&nbsp;</td>
        <td width="4%"  align="center">&nbsp;</td>
        <td width="9%"  align="center">&nbsp;</td>
        <td width="8%"  align="center">&nbsp;</td>
        <td width="8%"  align="center">&nbsp;</td>
        <td width="6%"  align="center">&nbsp;<? echo number_format($total5,2);?></td>
        <td width="6%"  align="center">&nbsp;<? echo number_format($total1,2);?></td>
        <td width="6%"  align="center">&nbsp;<? echo number_format($total2,2);?></td>
        <td width="8%"  align="center">&nbsp;<? echo number_format($total3,2);?></td>
        <td width="7%"  align="center">&nbsp;<? echo number_format($total4,2);?></td>
        <td width="9%"  align="center"><p>&nbsp;</p></td>
      </tr>
    </table></td>
    </tr>
 </table>
</form>
</body>
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
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
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
 <? 
	}
?>
  </table>
  <table  width="95%"   border="0" align="center" cellpadding="1" cellspacing="1" >
  <tr>
    <td  colspan="2" >
<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
<tr class="header" bgcolor="#DEE4EB">
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;รายงานรายชื่อผู้ใช้บริการจัดเก็บขยะมูลฝอยหมู่ &nbsp;<?=honame($hocode)?> ประจำเดือน <?=mounth3($month)?>&nbsp;<?=$year?></div></td>
        </tr>
  <tr class="body1"  bgcolor="#DEE4EB">
        <td width="12%"  height="31" align="center"><strong>เลขทะเบียน</strong></td>
		<td width="35%"  height="31" align="center"><strong>ชื่อ - สกุล</strong></td>
		<td width="12%"  height="31" align="center"><p><strong>บ้านเลขที่</strong><strong></strong></p></td>
         <td width="9%"  align="center"><p><strong>หมู่</strong></p></td>
         <td width="9%"  align="center"><p><strong>ปริมาณ(ลิตร) </strong></p></td>
		 <td width="8%"  align="center"><p><strong>ราคา(บาท)</strong></p></td>
		 <td width="15%"  align="center"><p><strong>เลขที่ใบเสร็จ</strong></p></td>
	    </tr>
<?
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1=" Select  m.mem_id,concat(pren,m.name,' ',m.surn)as name,mb.mem_id,mb.MCODE,mb.RDATE,mb.HNO1,mb.HNO,mb.moo,mb.qty,mb.amt,mb.type1,
r.rec_id,r.MCODE,r.MYEAR,r.MONTHH,r.rec_date,r.TOTAL,p_date,r.rec_status ,trname
from member m,m_bin mb,receive r ,type_rece t
where  mb.MCODE = r.MCODE and m.mem_id = mb.mem_id and cost = qty and  mb.HOCODE  = '".$hocode."'
 and monthh =".$month." and  myear = '" .$year. "' order by mb.MCODE   ";
$result_1= mysql_query($sql_1);
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
	$total_qty = $total_qty + $rs_1[qty];
	$total_total  = $total_total  + $rs_1[TOTAL];
?>       
<tr class="body1" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
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
 ?>
  </td>
 <td > <div align="center">&nbsp; <? echo ($rs_1[moo]);  ?>   </div></td>
  <td > <div align="center">&nbsp;<? echo ($rs_1[trname]);  ?></div></td>
 <td > <div align="center">&nbsp; <? echo ($rs_1[amt]);  ?>   </div></td>
  <td > <div align="center">&nbsp; <? echo ($rs_1[rec_id]);  ?>   </div></td>
 </tr>
 <? 	
	}
?>
	  </table>
<table  width="100%"   border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666">	  
<tr  width='70%' class="body1"  bgcolor="#DEE4EB">
<td width="47%"  height="25"  align="left"><strong>&nbsp;จำนวนผู้ขอใช้ :: &nbsp; <?=number_format($i)?> &nbsp; ราย</strong></td>
<td width="30%"  height="25"  align="left"></td>
<td width="23%"  height="25"  align="left"><strong>&nbsp;รวมเป็นเงิน :: &nbsp; <?=number_format($total_total)?> &nbsp; บาท</strong></td>
</tr>
</table>
	  </td>
    </tr>
 </table>
</form>
</body>
</html>
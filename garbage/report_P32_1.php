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
<style type="text/css">
</style>
<body>
<form name="f12" method="post"  action=""   >
<table  width="80%"   border="0" align="center" cellpadding="0" cellspacing="0">
  </table>
<table  width="100%"   border="0" align="center" cellpadding="0" cellspacing="0">
  </table>
  <table  width="80%"   border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td  colspan="2"   >
<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#000000" >
<tr  class="header" bgcolor="#DEE4EB" >
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;ใบนำส่งเงิน ประจำวันที่  <?=date_2($p_date)?></div></td>
          </tr>
  <tr class="body1"  bgcolor="#DEE4EB">
        <td width="26%"  height="31" align="center"><strong>ลำดับที่</strong></td>
		<td width="21%"  height="31" align="center"><strong>ประจำเดือน</strong></td>
		<td width="12%"  height="31" align="center"><p><strong>หมู่</strong></p>		  </td>
         <td width="21%"  align="center"><strong>จำนวนเงิน</strong></td>
		 <td width="20%"  align="center"><strong>รวมเป็นเงิน</strong></td>
          </tr>
    <?
  $i = 1;
  $total  = 0;
  $Mold  = 0;
   $Summoney  = 0;
    $sql_1=" select rec_date,monthh,myear,moo, sum(total) as money from receive r ,m_bin m 
        where  r.mcode = m.mcode and p_date = '".$p_date."' 
         and  rec_id <> '' and rec_id is not null  
         and rec_status is not null and rec_status <> 'ยกเลิก' 
         group by monthh,myear ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
$bg ='#e8edff';
		    //////////////////////////////////หายอดเงินที่เก็บได้ในเดือน///////////////////////////////////
			$sql=" select rec_date,monthh,myear,mid(m.mcode,1,2) as m1, sum(total) as money1 from receive r ,m_bin m 
        where  r.mcode = m.mcode and p_date = '".$p_date."' 
         and  rec_id <> '' and rec_id is not null and  myear = '".$rs_1[myear]."' and monthh = '".$rs_1[monthh]."'
        and rec_status is not null and rec_status  <> 'ยกเลิก' 
         group by rec_date,mid(m.mcode,1,2) order by abs(m.mcode)";
				$result = mysql_query($sql);
				while($rs=mysql_fetch_array($result)){
			if ($rs_1[monthh] == '10' or $rs_1[monthh] == '11' or $rs_1[monthh] == '12' ) {
							$Yr = ($rs_1[myear]-1);
				}else{
							$Yr = ($year);
				}		
		$stotal  = $stotal  + ($rs[money1]);
?>
<tr class="body1" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;
  <? 
 if($rs_1[monthh]==$Mold) {
   echo ""; 
 }else{ 
		echo $i;
		$bg ='#FFFFCC';
}
?> </td>
 <td  height="25"   align="center">&nbsp;
 <?
 if($rs_1[monthh]==$Mold) {
   echo ""; 
 }else{ 
		echo mounth3($rs_1[monthh])."  ".$Yr;
$i++;
}
  ?> </td>
 <td  height="25"  align="center">&nbsp;
 <?
 if(substr($rs[m1],0,1)<>'0') {
   echo $rs[m1]; 
}else{ echo substr($rs[m1],1,1); 
}
 ?> </td>
 <td  align="center">&nbsp;<?=number_format($rs[money1]);  ?></td>
 <td  align="center">&nbsp;
 <?
 if($rs_1[monthh]==$Mold and $rs_1[money]==$Summoney) {
   echo ""; 
 }else{ 
		echo number_format($rs_1[money]);
}
  ?>
 </td>
</tr>
 <? 
 	$Mold =  $rs_1[monthh];
	$Summoney =  $rs_1[money];
 	}
	}
?>
<tr class="body1"  bgcolor="#DEE4EB">
 <td  height="25"  align="center"><strong>รวมจำนวนเงินที่ส่ง</strong></td>
  <td  height="25"   align="left">&nbsp;</td>
  <td  height="25"  align="center">&nbsp;</td>
   <td  align="center">&nbsp;<? echo number_format($stotal);?></td>
 <td  align="center">&nbsp;</td>
 </tr>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center">
</center></div> 
</body>
</html>

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
<body>
<form name="f12" method="post"  action=""   >
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  </table>
 <table  width="90%"   border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td  colspan="2" ><table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
      <tr class="header">
        <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;<strong>รายงานสรุปการยอดตั้งเก็บประจำเดือน <?=mounth3($month)?>&nbsp;<?=$year?> </strong> </div></td>
      </tr>
      <tr class="body1"  bgcolor="#DEE4EB">
        <td width="6%"  height="31" align="center"><strong>หมู่ที่</strong></td>
        <td width="24%"  height="31" align="center"><strong>ชื่อหมู่บ้าน</strong></td>
        <td width="9%"  height="31" align="center"><strong>ค่าเช่ามาตร</strong></td>
        <td width="9%"  align="center"><strong>ค่าน้ำ</strong></td>
        <td width="12%"  align="center"><strong>ค่าภาษี</strong></td>
		<td width="12%"  align="center"><strong>รวมเป็นเงิน</strong></td>
		<td width="12%"  align="center"><strong>จำนวนราย</strong></td>
		<td width="8%"  align="center"><strong>ออกบิล</strong></td>
		<td width="8%"  align="center"><strong>ยกเลิก</strong></td>
      </tr>
<?
if($search <>'')
$summem = 0;
$stotal1 = 0;
$stotal2 = 0;
$stotal3 = 0;
$stotal4 = 0;
$stotal5 = 0;
$stotal6 = 0;
$stotal7 = 0;
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1="select mid(mcode,1,2) as mcode, honame, sum(sum_m)as stotal ,sum(vat) as vat,sum(total) as total,sum(m_amt) as m_amt
 from meter, house where rec_status is not null and rec_status <> 'ยกเลิก' 
	and hocode = mid(mcode,1,2) and myear = '" .$year. "' and monthh = ".$month."
	group by mid(mcode,1,2) order by mid(mcode,1,2) ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
		    /////////////////////////////////////////////////////////////////////
				$sql="select if (count(rec_id) is null,0,count(rec_id)) as countr   from meter where myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[mcode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก' 
			    group by mid(mcode,1,2) ";
				$result = mysql_query($sql);
				if($result)
				while($rs=mysql_fetch_array($result)){
							////////////////////////////////////////////////////////////////////////
				$sql2=" select count(mid(mcode,1,2)) as droupm ,HOCODE 
				FROM house left join cancel_reg on HOCODE =  mid(mcode,1,2)
				and  cyear = '" .$year. "' and cmonth = ".$month."
    			where  HOCODE = '" .$rs_1[mcode]."' group by HOCODE  ";
				$result2= mysql_query($sql2);
				if($result2)
				while($rs2=mysql_fetch_array($result2)){
				$summem =  $rs[countr]-$rs2[droupm];
				$stotal1 =  $stotal1 +$rs_1[m_amt];
				$stotal2 =  $stotal2 +$rs_1[total];
				$stotal3 =  $stotal3 +$rs[countr];
				$stotal4 =  $stotal4 +$summem;
				$stotal5 =  $stotal5 +$rs2[droupm];
			    $stotal6 =  $stotal6 +$rs_1[vat];
				$stotal7 =  $stotal7 +$rs_1[stotal];
			?>
 <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<? echo $rs_1[mcode]; ?></td>
        <td  height="25"   align="left">&nbsp;<? echo $rs_1[honame]; ?></td>
		<td  align="center">&nbsp;<? echo number_format($rs_1[m_amt],2); ?></td>
        <td  align="center">&nbsp;<? echo number_format($rs_1[total],2);?> </td>
		<td  align="center">&nbsp;<? echo number_format($rs_1[vat],2); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format($rs_1[stotal],2); ?></td>
		<td  align="center">&nbsp;<? echo number_format($rs[countr]); ?></td>
        <td  align="center">&nbsp;<? echo number_format($summem);?> </td>
        <td  align="center">&nbsp;<? echo number_format($rs2[droupm]);?></td>
		  </tr>
			<?
			   }}}
			   ?>
      <tr class="body1" bgcolor="#DEE4EB"  onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<strong>รวม</strong></td>
        <td  height="25"   align="left">&nbsp;</td>
        <td  height="25"  align="center"><? echo number_format($stotal1,2); ?></td>
        <td  align="center"><? echo number_format($stotal2,2); ?></td>
        <td  align="center"><? echo number_format($stotal6,2); ?></td>
		<td  align="center"><? echo number_format($stotal7,2); ?></td>
		<td  align="center"><? echo number_format($stotal3); ?></td>
		<td  align="center"><? echo number_format($stotal4); ?></td>
		<td  align="center"><? echo number_format($stotal5); ?></td>
      </tr>
        </table></td>
    </tr>
  </table>
</form>
 </body>
</html>

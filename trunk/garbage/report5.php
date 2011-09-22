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
        <td width="7%"  height="31" align="center"><strong>หมู่ที่</strong></td>
        <td width="33%"  height="31" align="center"><strong>ชื่อหมู่บ้าน</strong></td>
        <td width="13%"  align="center"><strong>จำนวนเงิน</strong></td>
        <td width="12%"  align="center"><strong>จำนวนราย</strong></td>
		<td width="12%"  align="center"><strong>ออกบิล</strong></td>
		<td width="9%"  align="center"><strong>ยกเลิก</strong></td>
      </tr>
<?
if($search <>'')
$summem = 0;
$stotal1 = 0;
$stotal2 = 0;
$stotal3 = 0;
$stotal4 = 0;
$stotal5 = 0;
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1="select mid(mcode,1,2) as mcode, honame, sum(total)as stotal ,  if(sum(amt_1)is null,'0',amt_1) as amt_1
  from receive, house where rec_status is not null and rec_status <> 'ยกเลิก' 
	and hocode = mid(mcode,1,2) and myear = '" .$year. "' and monthh = ".$month."
	group by mid(mcode,1,2) order by mid(mcode,1,2) ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
		    /////////////////////////////////////////////////////////////////////
				$sql="select if (count(rec_id) is null,0,count(rec_id)) as countr   from receive where myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[mcode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก' 
			    group by mid(mcode,1,2) ";
				$result = mysql_query($sql);
				while($rs=mysql_fetch_array($result)){
							////////////////////////////////////////////////////////////////////////
				$sql2=" select count(mid(mcode,1,2)) as droupm ,HOCODE 
				FROM house left join cancel_reg on HOCODE =  mid(mcode,1,2)
				and  cmyear = '" .$year. "' and cmonth = ".$month."
    			where  HOCODE = '" .$rs_1[mcode]."' group by HOCODE  ";
				$result2= mysql_query($sql2);
				while($rs2=mysql_fetch_array($result2)){
				$summem =  $rs[countr]-$rs2[droupm];
				$stotal1 =  $stotal1 +($rs_1[stotal]/$rs_1[amt_1]);
				$stotal2 =  $stotal2 +$rs_1[stotal];
				$stotal3 =  $stotal3 +$rs[countr];
				$stotal4 =  $stotal4 +$summem;
				$stotal5 =  $stotal5 +$rs2[droupm];
			?>
 <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<? echo $rs_1[mcode]; ?></td>
        <td  height="25"   align="left">&nbsp;<? echo $rs_1[honame]; ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format($rs_1[stotal]); ?></td>
		<td  align="center">&nbsp;<? echo number_format($rs[countr]); ?></td>
        <td  align="center">&nbsp;<? echo number_format($summem);?> </td>
        <td  align="center">&nbsp;<? echo number_format($rs2[droupm]);?></td>
		  </tr>
			<?
			   }}}
			   ?>
      <tr class="body1"  onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<strong>รวม</strong></td>
        <td  height="25"   align="left">&nbsp;</td>
        <td  align="center"><? echo number_format($stotal2); ?></td>
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

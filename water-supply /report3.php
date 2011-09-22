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
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
<tr><td>
 <table width="100%" cellspacing="0"  cellpadding="0" border="0"  style="border-collapse:collapse;">
			 <tr class="header">
            <td  height="42">&nbsp;<strong>รายงานสรุปการใช้ใบเสร็จ ประจำเดือน
              <?=mounth3($month)?>&nbsp;<?=$year?>
            </strong>
<div align="center" class="style1"></div></td>
            </tr>
			<tr><td width="890"  height="15"><hr></td>
            </tr>
			<tr class="body1">
			  <td width="890"  height="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;งานด้านพัฒนาและจัดเก็บรายได้ ดำเนินการพิมพ์ใบเสร็จค่าน้ำประปา ประจำเดือน <strong><?=mounth3($month)?>&nbsp;<?=$year?></strong> เพื่อนำไปจัดเก็บ ค่าน้ำประปากับผู้ใช้น้ำประปา จำนวน  
		      <strong><?=number_format($Sumbill)?></strong> ราย จำนวนเงิน <strong><?= number_format($SumMoney,2)?> </strong>บาท ตามรายละเอียดที่แนบมา ดังนี้</td>
            </tr>
			
        </table>		
</td></tr>
  <tr>
    <td  colspan="2" >
<br>
 <table  width="100%"   border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td  colspan="2"  ><table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
      
      <tr class="body1"  bgcolor="#DEE4EB">
        <td width="6%"  height="31" align="center"><strong>หมู่ที่</strong></td>
        <td width="14%"  height="31" align="center"><strong>ชื่อหมู่บ้าน</strong></td>
        <td width="12%"  height="31" align="center"><strong>เล่มที่ใบเสร็จ</strong></td>
        <td width="13%"  align="center"><strong>เลขที่ใบเสร็จ</strong></td>
        <td width="13%"  align="center"><strong>จำนวนบิล</strong></td>
		<td width="13%"  align="center"><strong>จำนวนราย</strong></td>
		<td width="13%"  align="center"><strong>จำนวนเงิน</strong></td>
      </tr>
	  <?
$sumtotal1 = 0;
$sumtotal2=0;
$sumtotal3=0;
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1="select hocode, honame from house  order by HOCODE";
$result_1 = mysql_query($sql_1);
while($rs_1=mysql_fetch_array($result_1)){
		    /////////////////////////////////////////////////////////////////////
				$sql="select mid(rec_id,1,4) as rec1 from meter where myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[hocode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก'  group by mid(rec_id,1,4)";
				$result = mysql_query($sql);
				if ($result )
				while($rs=mysql_fetch_array($result)){
			////////////////////////////////////////////////////////////////////////
				$sql2=" select min(rec_id) as minrec, max(rec_id) as maxrec, sum(sum_m) as stotal1,sum(total) as stotal2 from meter 
				where rec_id like '" .$rs[rec1]. "%' and myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[hocode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก'  ";
				$result2= mysql_query($sql2);
				if($result2)
				while($rs2=mysql_fetch_array($result2)){
		   ////////////////////////////////////////////////////////////////////////
				$sql3=" select  count(rec_id) as summem  from meter 
				where  rec_id like '" .$rs[rec1]. "%'  and myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[hocode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> 'ยกเลิก' group by mid(rec_id,1,4)";
				$result3 = mysql_query($sql3);
				while($rs3=mysql_fetch_array($result3)){
				$sumtotal1 = $sumtotal1 + $rs2[stotal1];
				$sumtotal2 = $sumtotal2 +$rs3[summem];
			    $sumtotal3 = $sumtotal3 + $rs2[stotal2];		
				$total_mem  = $total_mem  +  Find_mem($rs_1[hocode],$year,$month);
		?>
	 <tr class="body1" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<? echo $rs_1[hocode]; ?></td>
        <td  height="25"   align="left">&nbsp;<? echo $rs_1[honame]; ?></td>
		<td  height="25"   align="center">&nbsp;<? echo $rs[rec1]; ?></td>
		<td  height="25"  align="center">&nbsp;
		<?  if($rs2[minrec]  == $rs2[maxrec]){		 
             echo substr($rs2[minrec],5); 
}else{	
            echo substr($rs2[minrec],5)."-" .substr($rs2[maxrec],5);
}
		?></td>
        <td  align="center">&nbsp; <? echo number_format($rs3[summem]); ?></td>
        <td  align="center">&nbsp;<? echo number_format(Find_mem($rs_1[hocode],$year,$month)); ?></td>
        <td  align="center">&nbsp;<?=number_format($rs2[stotal1],2);?></td>
		  </tr>
			<?
			   }}}}
			   ?>
      <tr class="body1" bgcolor="#DEE4EB" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<strong>รวม</strong></td>
        <td  height="25"   align="left">&nbsp;</td>
        <td  height="25"  align="center">&nbsp;</td>
        <td  align="center">&nbsp;</td>
        <td  align="center">&nbsp;
          <?=number_format($sumtotal2)?></td>
		<td  align="center">&nbsp;<strong><?=number_format($total_mem)?></strong></td>
		<td  align="center">&nbsp;<strong><?=number_format($sumtotal1,2)?></strong></td>
      </tr>
        </table>
		</td>
    </tr>
	  </table>
</td>
</tr>
</table>
</form>
</body>
</html>
<?
function Find_mem($hocode,$year,$month){
$sql_2="select rec_id as summem ,mem_id from meter m,q_water q
where rec_id like '" .$rs[rec1]. "%' and myear = '" .$year. "' and monthh =  ".$month." and mid(m.mcode,1,2) =  '" .$hocode."' 
and rec_id <> '' and rec_id is not null and rec_status is not null
and rec_status <> 'ยกเลิก' and m.mcode = q.mcode 
group by q.mcode  order by q.mcode  ";
$result_2 = mysql_query($sql_2);
if($result_2)
$rs_2=mysql_fetch_array($result_2);
return mysql_num_rows($result_2);
}
?>
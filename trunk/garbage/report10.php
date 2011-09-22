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
<link href="style.css" rel="stylesheet" type="text/css">
<body>
<form name="f12" method="post"  action=""   >
  <table  width="90%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
  <td>
  <table width="100%" cellspacing="0"  cellpadding="0" border="0"  style="border-collapse:collapse;">
  <tr>
  <td>
  <table width="100%" cellspacing="0"  cellpadding="0" border="0"  style="border-collapse:collapse;">
			 <tr class="body1">
            <td  height="31">&nbsp;เรื่อง&nbsp;แจ้งให้ชำระค่าธรรมเนียมขยะมูลฝอย</td>
            </tr>
        </table>		
  </td></tr>
			 <tr class="body1">
            <td  height="31">&nbsp;เรียน&nbsp;
              <u><strong><?=$name?></strong></u>
              <div align="center" class="style1"></div></td>
            </tr>
        </table>		
  </td></tr>
  <tr class="body1" >
        <td  height="40" colspan="14"><div  align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ขอใช้บริการจัดเก็บขยะมูลฝอยกับทาง<? echo check_start_name( )?>  ได้ดำเนินการตรวจสอบพบว่าท่านค้างชำระเงินค่าธรรมเนียมขยะมูลฝอยดังนี้</div></td>
      </tr>
  <tr>
    <td height="106" colspan="2"   >
	<table width="70%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#999999">
      <tr class="body1" >
        <td width="18%"  height="31"  align="center"><strong>รายการที่</strong>&nbsp;&nbsp;</td>
        <td width="21%"  height="31"  align="center"><strong>เลขที่ใบเสร็จ</strong></td>
	    <td width="23%"  align="center"><strong>ประจำเดือน</strong></td>
        <td width="22%"  align="center"><strong>จำนวนเงิน</strong></td>
      </tr>
<?
		$sql_1 =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,rec_status,
		 if(rec_id is null,'',rec_id)as rec_id,rec_date,
		 if(qty is null,'0',qty)as qty ,if(total is null,'0',total)as total , r.myear,p_date,monthh
		 from member m,m_bin b left join receive r on b.MCODE = r.MCODE
		 Where b.mem_id = m.mem_id and rec_status = 'ค้างชำระ' 
		and b.MCODE = '" .$mcode."' 
	 	order by rec_date ";
$result_1 = mysql_query($sql_1);
$total  = 0;
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){

	$i++;
		$total = $total  + $rs_1[total];
//////////////////เช็คปี/////////////////////
	if ($rs_1[monthh] == '10' or $rs_1[monthh] == '11' or $rs_1[monthh] == '12' ) {
							$Yr = ($rs_1[myear]-1);
				}else{
							$Yr = ($rs_1[myear]);
				}		
				?>
<tr class="body1">
        <td  height="31"  align="center">&nbsp;<? echo $i;?></td>
        <td  height="31"  align="center">&nbsp;<? echo $rs_1[rec_id];?></td>
       <td  align="center">&nbsp;<? echo mounth2($rs_1[monthh])." ".$Yr;?></td>
		<!--<td  align="center">&nbsp;<? echo $rs_1[qty];  ?></td> -->
       <td  align="center">&nbsp;<? echo $rs_1[total]  ?></td>
      </tr> 
	  <? } ?>
    </table>
    </td>
    </tr>
	<tr class="body1">
	  <td height="34">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวมเป็นเงิน  <strong><? echo number_format($total) ?></strong> บาท  นั้น </td>
	</tr>
	<tr class="body1">
	  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ดังนั้น จึงขอให้ท่านนำเงินจำนวนดังกล่าวไปชำระ ณ  <? echo check_start_name( )?> ภายใน 7 วัน นับตั้งแต่วันที่ได้รับหนังสือฉบับนี้ หากพ้นกำหนดระยะเวลาดังกล่าว ทาง <? echo check_start_name( )?> จะดำเนินการทางกฎหมายต่อไป </td>
	</tr>
	<tr class="body1">
	  <td height="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดทราบและพิจารณาดำเนินการ</td>
	</tr>	
	<tr class="body1">
	  <td height="45" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอแสดงความนับถือ</td>
	</tr>	
  </table>
</form>
</body>
</html>
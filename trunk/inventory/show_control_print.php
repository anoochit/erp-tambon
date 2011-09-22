<?
include("config.inc.php");
include("date_time.php");
ob_start();
?>
<?
	$sql="SELECT  r.*,rd.*,c.* from receive r,receive_detail rd,code c 
 WHERE  r.r_id = rd.r_id and c.rd_id = rd.rd_id   and c.c_id ='$c_id'";
	echo 	$sql."<br>";
	$result1 = mysql_query($sql);
	$rs=mysql_fetch_array($result1);
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
<!--
.style4 { font-family:"Microsoft Sans Serif" font-size: 7px; }
.style13 {font-family: "Microsoft Sans Serif"; font-size: 12px; }
-->
</style>
<body>
<table name="add" cellpadding="0" cellspacing="0" border="0"  width="100%">
 
	<tr >
    <td width="100%" height="30">
<table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
 
	<tr >
    <td width="6%" height="30"><span class="style13">ประเภท</span></td>
    <td width="19%"><div class="style13"><?=$rs[type]?></div></td>
	    <td width="5%"><span class="style13">รหัส</span></td>
    <td width="17%"><div class="style13"><? echo $rs[code];?>
      </div></td>
   <td width="14%" height="30"><span class="style13">ลักษณะ / คุณสมบัติ</span></td>
    <td width="14%"><div class="style13"><? //echo $rs[open_date];?></div> </td>
				   <td width="8%"><span class="style13">รุ่น / แบบ</span></td>
    <td width="17%"><div class="style13"><? //echo $rs[paper_id];?></div></td>
  </tr>
  </table>
  </td></tr>
  	<tr >
    <td width="100%" height="30">
  <table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
  <tr >
    <td width="21%" height="30" ><span class="style13">สถานที่ตั้ง/หน่วยงานที่รับผิดชอบ</span></td>
    <td width="30%" ><div class="style13"><? if($rs[room_id] <>'') echo room($rs[room_id]);?></div></td>
   <td width="17%" height="30" ><span class="style13">ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</span></td>
    <td width="32%" ><div class="style13"><? echo shop_name($rs[shop_id]);?></div> </td>
  </tr>
      </table>
</td></tr>			
	<tr >
    <td width="100%" height="30">
	<table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
  <tr >
    <td width="5%" height="30" ><span class="style13">ที่อยู่</span></td>
    <td width="95%" ><div class="style13"><? echo shop_addr($rs[shop_id]);?></div></td>
  </tr>
      </table>
</td></tr>			
			<tr >
    <td width="100%" height="30">
	<table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
  <tr >
    <td width="10%" height="30" ><span class="style13">ประเภทเงิน</span></td>
    <td width="90%"  valign="middle"><div class="style13">
	<input type="checkbox" name="m1" value="" <? if($rs[mon_type] == "เงินงบประมาณ") echo "checked"?>>&nbsp;&nbsp;เงินงบประมาณ&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m2" value=""  <? if($rs[mon_type] == "เงินนอกงบประมาณ") echo "checked"?>>&nbsp;&nbsp;เงินนอกงบประมาณ&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m3" value=""  <? if($rs[mon_type] == "เงินบริจาค/เงินช่วยเหลือ") echo "checked"?>>&nbsp;&nbsp;เงินบริจาค/เงินช่วยเหลือ&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m4" value=""  <? if($rs[mon_type] == "อื่นๆ") echo "checked"?>>&nbsp;&nbsp;อื่นๆ&nbsp;&nbsp;&nbsp;
	</div></td>
  </tr>
      </table>
</td>
</tr>
	<tr >
    <td width="100%" height="30">
				<table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
  <tr >
    <td width="10%" height="30" ><span class="style13">วิธีการได้มา</span></td>
    <td width="90%" valign="middle" ><div class="style13">
	<input type="checkbox" name="m1" value="" <? if($rs[come_in] == "ตกลงราคา") echo "checked"?>>&nbsp;&nbsp;ตกลงราคา&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m2" value=""  <? if($rs[come_in] == "สอบราคา") echo "checked"?>>&nbsp;&nbsp;สอบราคา&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m3" value=""  <? if($rs[come_in] == "ประกวดราคา") echo "checked"?>>&nbsp;&nbsp;ประกวดราคา&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m4" value=""  <? if($rs[come_in] == "วิธีพิเศษ") echo "checked"?>>&nbsp;&nbsp;วิธีพิเศษ&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m5" value=""  <? if($rs[come_in] == "รับบริจาค") echo "checked"?>>&nbsp;&nbsp;รับบริจาค&nbsp;&nbsp;&nbsp;
	</div></td>
  </tr>
            </table>
	  </td></tr></table>
</td>
</tr>
</table>
<br>



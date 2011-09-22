
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<?
//----------ลบ--------------
if($del =='del'){
$sql = "DELETE FROM  passwd WHERE pwd_username ='$u_ser' ";
   $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>กรุณารอสักครู่ระบบกำลังทำการลบข้อมูล</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=user\">\n";
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<?
//-----------แสดงข้อมูล-------------------
    $sql=" Select * from start    ";
		$result=mysql_query($sql);
		
		$d =mysql_fetch_array($result);
		?><table width="90%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
		<tr bgcolor="#99CCFF" class="lgBar">				
    <td height="35"  colspan="4"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp; ข้อมูลเริ่มต้น <a href="?action=add_start" > <img src="images/Modify.png" border="0"  align="absmiddle"/>แก้ไข</a></div></td> 
	 </tr>
  <tr>
    <td width="21%" height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;ปีงบประมาณ</td>
    <td  class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[MYEAR]?>
    </strong></td>
	    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;อัตราภาษี(%)  </td>
    <td width="32%" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[VAT]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;ค่าใช้น้ำขั้นต่ำ  </td>
    <td width="27%" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[mins]?>
    </strong></td>
    <td width="20%" class="lgBar"  style="border: #000000 1px solid;">&nbsp;ค่าบริการ/ค่าเช่ามาตร  </td>
    <td width="32%" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp; 
      <?=$d[rent]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;ชื่อสำนักงาน</td>
    <td colspan="3" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[NAME]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;เลขที่</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[HNO]?>
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;">&nbsp;หมู่ที่</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[MOO]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar"  style="border: #000000 1px solid;">&nbsp;ชื่อหมู่บ้าน</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[HOUSE]?>
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;">&nbsp;ถนน</td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[ROAD]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;ตำบล/แขวง</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[TUMBOL]?>
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;">&nbsp;อำเภอ/เขต</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[AMPHER]?>
    </strong></td>
  </tr>
    <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;จังหวัด</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[PROVINCE]?>
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;">&nbsp;รหัสไปรษณีย์</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[ZIPCODE]?>
    </strong></td>
  </tr>
    <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;โทรศัพท์</td>
    <td  class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[TEL]?>
    </strong></td>
 
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;ตำแหน่งผู้ตรวจสอบข้อมูล</td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[h_position]?>
    </strong></td>
  </tr>
  <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;เลขประจำตัวผู้เสียภาษี</td>
    <td  class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[tax]?>
    </strong></td>
 
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;ชื่อหัวหน้าส่วนการคลัง</td>
    <td  class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <?=$d[head_klung]?>
    </strong></td>
  </tr>
    <tr>
    <td height="30" class="lgBar" style="border: #000000 1px solid;">&nbsp;พนักงานเก็บเงิน</td>
    <td  class="bmText_1" style="border: #000000 1px solid;" colspan="3"><strong>&nbsp;
      <?=$d[receive_name]?>
    </strong></td>
 

  </tr>
</table>

		</body>
</html>

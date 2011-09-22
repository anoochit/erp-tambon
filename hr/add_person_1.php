<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ทะเบียนประวัติพนักงาน</title>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0">
    <tr>
      <td width="100%" >
	  <div align="right" >
        <table width="11%" height="112" border="1">
        <tr>
          <td width="90"><div align="center">รูปถ่าย</div></td>
        </tr>
	  </table>  </div>
	  <br></br>
      <table width="100%" height="91" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="19%" height="89">
            <br>
            <div align="center" class="style2"> รหัสแบบฟอร์ม     </div></br>   
			        <br>
            </br></td>
          <td width="49%"><div align="center" >ทะเบียนประวัติพนักงาน</div></td>
          <td width="32%"><div align="left"><br>
            &nbsp;&nbsp;เริ่มใช้วันที่............................. </br><br>
&nbsp;&nbsp;ปรับปรุงครั้งที่......เมื่อ..............</br>
                      </div></td>
        </tr>
      </table>      
      <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="4" height="30">ส่วนที่ 1 : ข้อมูลส่วนตัว </td>
          </tr>
        <tr>
          <td height="30">วันที่บรรจุ &nbsp;&nbsp;
              <? if ($date=='') $date=$now; ?>
              <? include ('function_calendar.php');?>
              <input type="text" name="date" value="<?php echo $date; ?>"  size="10" />
&nbsp;<img src='images/calendar.gif'  onclick="popupCalender('date');"  width='19'  height='19' /></td>
          <td width="204">วันที่เริ่มงาน</td>
          <td colspan="2">เลขที่พนักงาน 
              <label>
              <input name="textfield" type="text" size="20" maxlength="5" />
              </label>
          </td>
          </tr>
        <tr>
          <td colspan="3">ชื่อ-สกุล  
            <label>
            <input name="radiobutton" type="radio" value="radiobutton" />
            นาย            </label>
              <label>
              <input name="radiobutton" type="radio" value="radiobutton" />
นาง
<input name="radiobutton" type="radio" value="radiobutton" />
นางสาว
<input name="name" type="text" id="name" value="" size="50" maxlength="100" />
            </label>
          </td>
          <td width="173">วัน เดือน ปี เกิด </td>
        </tr>
        <tr>
          <td width="235" height="30">เลขประจำตัวประชาชน</td>
          <td colspan="2">เลขประจำตัวผู้เสียภาษี</td>
          <td>เลขประจำตัวบัตรประกันสังคม</td>
        </tr>
        <tr>
          <td height="30">ที่อยู่ที่ติดต่อได้ เลขที่ </td>
          <td colspan="2">ถนน</td>
          <td>ซอย</td>
        </tr>
        <tr>
          <td height="30">ตำบล</td>
          <td colspan="2" >อำเภอ</td>
          <td >จังหวัด</td>
        </tr>
        <tr>
          <td height="30">รหัสไปรษณีย์</td>
          <td colspan="3" ><span class="style10">โทรศัพท์</td>
          </tr>
        <tr>
          <td colspan="4" height="30">ที่อยู่ตามทะเบียนบ้าน</td>
        </tr>
        <tr>
          <td width="235" height="30">กรุ๊ปเลือด</td>
          <td width="204">เชื้อชาติ</td>
          <td width="146">สัญชาติ</td>
          <td width="173">ศาสนา</td>
        </tr>
        <tr>
          <td colspan="2" height="30">ชื่อคู่สมรส
              <label>
              <input name="textfield22" type="text" size="50" maxlength="100" />
              </label>
          </td>
          <td colspan="2">เบอร์โทรศัพท์</td>
          </tr>
        <tr>
          <td colspan="2" height="30">สถานที่ทำงาน</td>
          <td colspan="2">ตำแหน่ง</td>
          </tr>
        <tr>
          <td height="30">วันที่สิ้นสุดการทำงาน</td>
          <td colspan="2">ประเภทการออก 
            <label>
            <input name="radiobutton" type="radio" value="radiobutton" />
            ลาออก 
             <input name="radiobutton" type="radio" value="radiobutton" />
ลาออก</label></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>      
      <p>&nbsp;</p></td>
    </tr>
  </table>
</form>
</body>
</html>

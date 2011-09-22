
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="Yetii/custom.css">
<link rel="stylesheet" type="text/css" href="Yetii/white.css">
<script type="text/javascript" src="Yetii/yetii-min.js"></script>
<script language="JavaScript" src="include/calendar.js"></script>


<style type="text/css">
<!--
.style9 {font-family: Tahoma; font-size: 14px; }
.style3 {font-family: Tahoma; font-weight: bold; font-size: 18px; }
.style6 {font-family: Tahoma; font-size: 16px; }
-->
</style>


<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<title>ทะเบียนประวัติพนักงาน</title>
<style type="text/css">
<!--
.style12 {font-size: 22px}
.style14 {font-size: 16}
.style15 {
	font-size: 16px;
	font-weight: bold;
}
.style17 {font-size: 14px}
.style20 {font-family: AngsanaUPC, "Angsana New"; font-weight: bold; font-size: 20px; }
.style21 {
	font-family: AngsanaUPC, "Angsana New";
	font-size: 18px;
}
-->
</style>
<div class="demolayout" id="demo">
<input name="user_id" type="hidden" id="user_id" value="<?=$user_id?>" />
<table width="100%" border="0">
        <tr>
          <td width="100%">

  <ul class="demolayout" id="demo-nav">
    <li><a href="#tab1">ข้อมูลส่วนตัว</a> </li>
    <li><a href="#tab2">ข้อมูลบุตร</a> </li>
    <li><a href="#tab3">การศึกษา</a> </li>
    <li><a href="#tab4">การทำงาน</a> </li>
    <li><a href="#tab5">การฝึกอบรม</a></li>
	 <li><a href="#tab6">การลา</a></li>
	  <li><a href="#tab7">บทลงโทษทางวินัย</a></li>
	  </ul>  
  <div class="tabs-container">
    <div class="tab" id="tab1" style="text-align:;">
      <form id="form1" name="form1" method="post" action="">
  <div align="right">
        <table width="100%" height="112" border="0">
        <tr>
          <td><div align="right">
            <table width="90" height="100" border="1" align="right">
            <tr>
              <td><div align="center">รูปถ่าย</div></td>
            </tr>
          </table></div>
          </td>
        </tr>
	  </table>  </div>
	  <br></br>
	  <?
	  //-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM person WHERE user_id=$user_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
 ?>
	  <table width="100%" border="1">
        <tr>
          <td width="20%"><br>
              <div align="center" class="style3">รหัสแบบฟอร์ม</div>
                </br>   
			        <br>
            </br></td>
          <td width="53%"><div align="center"><span class="style3 style12">ทะเบียนประวัติพนักงาน</span></div></td>
          <td width="27%"><br>
&nbsp;<span class="style9">&nbsp;<span class="style14">เริ่มใช้วันที่...................... </br>
<br>
&nbsp;&nbsp;ปรับปรุงครั้งที่......เมื่อ..........</span></span></td>
        </tr>
      </table>
        <table width="100%" border="1">
          <tr>
            <td colspan="2"><span class="style9"><br>
              <span class="style15">ส่วนที่ 1 : ข้อมูลส่วนตัว </span></span></td>
            </tr>
          <tr>
            <td width="369"><span class="style9"><br>
                วันที่บรรจุ </span>&nbsp;&nbsp;
              <input type="text" name="date_contain" value="<? if($date_contain =='') echo date("d/m/Y") ;else echo $date_contain;?>"  size="10" />
&nbsp; <img src="images/calendar.png" onclick="showCalendar('date_contain','DD/MM/YYYY')"   width='19'  height='19' /> </td>
            <td width="411"><span class="style9"><br>วันที่เข้าทำงาน &nbsp;&nbsp; </span>
              <? ?>
              <input type="text" name="start_work" value="<? if($start_work =='') echo date("d/m/Y") ;else echo $start_work;?>"  size="10" />
&nbsp; <img src="images/calendar.png" onclick="showCalendar('start_work','DD/MM/YYYY')"   width='19'  height='19' /></td>
          </tr>
          <tr>
            <td><span class="style9"><br>เลขที่พนักงาน &nbsp;&nbsp;
                <label>
                <input name="per_id" type="text" id="per_id" size="20" maxlength="5" value="<?=$d[per_id]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>วัน เดือน ปี เกิด
        &nbsp;&nbsp;
        <?  ?>
        <input type="text" name="birthday" value="<? if($birthday =='') echo date("d/m/Y") ;else echo $birthday;?>"  size="10" />
&nbsp; <img src="images/calendar.png" onclick="showCalendar('birthday','DD/MM/YYYY')"   width='19'  height='19' /></span></td>
          </tr>
          <tr>
            <td colspan="2"><span class="style9"><br>ชื่อ-สกุล
                <label>
                <input name="article" type="radio" value="article" />
นาย </label>
                <label>
                <input name="article" type="radio" value="article" />
นาง
<input name="article" type="radio" value="article" />
นางสาว &nbsp;&nbsp;
<input name="name" type="text" id="name" size="50" maxlength="100" value="<?=$d[name]?>"/>
                </label>
            </span></td>
            </tr>
          <tr>
            <td><span class="style9"><br>กรุ๊ปเลือด  &nbsp;&nbsp;
                <label> </label>
                <input name="blood" type="text" size="10" value="<?=$d[blood]?>" />
            </span></td>
            <td><span class="style9"><br>เลขประจำตัวประชาชน</span><span class="style9"> &nbsp;&nbsp;
                <label>
                <input name="id_person" type="text" size="30" maxlength="13" value="<?=$d[id_person]?>" />
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>เลขประจำตัวผู้เสียภาษี  &nbsp;&nbsp;
                <label>
                <input name="tax_id" type="text" size="20"  value="<?=$d[tax_id]?>"/>
                </label>
            </span></td>
            <td><span class="style9"><br>เลขประจำตัวบัตรประกันสังคม&nbsp;&nbsp;
                <label>
                <input name="ss_id" type="text" size="20" value="<?=$d[ss_id]?>" />
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>ที่อยู่ที่ติดต่อได้ เลขที่  &nbsp;&nbsp;
                <label>
                <input name="number" type="text" size="10" value="<?=$d[number]?>" />
                </label>
            </span><span class="style9">
            <label></label>
            </span></td>
            <td><span class="style9"><br>ซอย  &nbsp;&nbsp;
                <label>
                <input name="alley" type="text" size="20" value="<?=$d[alley]?>"/>
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>ถนน  &nbsp;&nbsp;
                <label>
                <input name="road" type="text" size="30" value="<?=$d[road]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>ตำบล  &nbsp;&nbsp;
                <label>
                <input name="district" type="text" size="20" value="<?=$d[district]?>" />
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>อำเภอ  &nbsp;&nbsp;
                <label>
                <input name="prefecture" type="text" size="20" value="<?=$d[prefecture]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>จังหวัด<font  size="2"> &nbsp;&nbsp;
                  <label> </label><?=$d[province]?>
                  <select name="province">
                    <option value="00"  >---- เลือกจังหวัด ----</option>
                    <option value='กรุงเทพมหานคร'>กรุงเทพมหานคร</option>
                    <option value='กระบี่'>กระบี่</option>
                    <option value='กาญจนบุรี'>กาญจนบุรี</option>
                    <option value='กาฬสินธุ์'>กาฬสินธุ์</option>
                    <option value='กำแพงเพชร'>กำแพงเพชร</option>
                    <option value='ขอนแก่น'>ขอนแก่น</option>
                    <option value='จันทบุรี'>จันทบุรี</option>
                    <option value='ฉะเชิงเทรา'>ฉะเชิงเทรา</option>
                    <option value='ชลบุรี'>ชลบุรี</option>
                    <option value='ชัยนาท'>ชัยนาท</option>
                    <option value='ชัยภูมิ'>ชัยภูมิ</option>
                    <option value='ชุมพร'>ชุมพร</option>
                    <option value='เชียงราย'>เชียงราย</option>
                    <option value='เชียงใหม่'>เชียงใหม่</option>
                    <option value='ตรัง'>ตรัง</option>
                    <option value='ตราด'>ตราด</option>
                    <option value='ตาก'>ตาก</option>
                    <option value='นครนายก'>นครนายก</option>
                    <option value='นครปฐม'>นครปฐม</option>
                    <option value='นครพนม'>นครพนม</option>
                    <option value='นครราชสีมา'>นครราชสีมา</option>
                    <option value='นครศรีธรรมราช'>นครศรีธรรมราช</option>
                    <option value='นครสวรรค์'>นครสวรรค์</option>
                    <option value='นนทบุรี'>นนทบุรี</option>
                    <option value='นราธิวาส'>นราธิวาส</option>
                    <option value='น่าน'>น่าน</option>
                    <option value='บุรีรัมย์'>บุรีรัมย์</option>
                    <option value='ปทุมธานี'>ปทุมธานี</option>
                    <option value='ประจวบคีรีขันธ์'>ประจวบคีรีขันธ์</option>
                    <option value='ปราจีนบุรี'>ปราจีนบุรี</option>
                    <option value='ปัตตานี'>ปัตตานี</option>
                    <option value='พระนครศรีอยุธยา'>พระนครศรีอยุธยา</option>
                    <option value='พะเยา'>พะเยา</option>
                    <option value='พังงา'>พังงา</option>
                    <option value='พัทลุง'>พัทลุง</option>
                    <option value='พิจิตร'>พิจิตร</option>
                    <option value='พิษณุโลก'>พิษณุโลก</option>
                    <option value='เพชรบุรี'>เพชรบุรี</option>
                    <option value='เพชรบูรณ์'>เพชรบูรณ์</option>
                    <option value='แพร่'>แพร่</option>
                    <option value='ภูเก็ต'>ภูเก็ต</option>
                    <option value='มหาสารคาม'>มหาสารคาม</option>
                    <option value='มุกดาหาร'>มุกดาหาร</option>
                    <option value='แม่ฮ่องสอน'>แม่ฮ่องสอน</option>
                    <option value='ยโสธร'>ยโสธร</option>
                    <option value='ยะลา'>ยะลา</option>
                    <option value='ร้อยเอ็ด'>ร้อยเอ็ด</option>
                    <option value='ระนอง'>ระนอง</option>
                    <option value='ระยอง'>ระยอง</option>
                    <option value='ราชบุรี'>ราชบุรี</option>
                    <option value='ลพบุรี'>ลพบุรี</option>
                    <option value='ลำปาง'>ลำปาง</option>
                    <option value='ลำพูน'>ลำพูน</option>
                    <option value='เลย'>เลย</option>
                    <option value='ศรีสะเกษ'>ศรีสะเกษ</option>
                    <option value='สกลนคร'>สกลนคร</option>
                    <option value='สงขลา'>สงขลา</option>
                    <option value='สตูล'>สตูล</option>
                    <option value='สมุทรปราการ'>สมุทรปราการ</option>
                    <option value='สมุทรสงคราม'>สมุทรสงคราม</option>
                    <option value='สมุทรสาคร'>สมุทรสาคร</option>
                    <option value='สระแก้ว'>สระแก้ว</option>
                    <option value='สระบุรี'>สระบุรี</option>
                    <option value='สิงห์บุรี'>สิงห์บุรี</option>
                    <option value='สุโขทัย'>สุโขทัย</option>
                    <option value='สุพรรณบุรี'>สุพรรณบุรี</option>
                    <option value='สุราษฎร์ธานี'>สุราษฎร์ธานี</option>
                    <option value='สุรินทร์'>สุรินทร์</option>
                    <option value='หนองคาย'>หนองคาย</option>
                    <option value='หนองบัวลำภู'>หนองบัวลำภู</option>
                    <option value='อ่างทอง'>อ่างทอง</option>
                    <option value='อำนาจเจริญ'>อำนาจเจริญ</option>
                    <option value='อุดรธานี'>อุดรธานี</option>
                    <option value='อุตรดิตถ์'>อุตรดิตถ์</option>
                    <option value='อุทัยธานี'>อุทัยธานี</option>
                    <option value='อุบลราชธานี'>อุบลราชธานี</option>
                  </select>
            </font></span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>รหัสไปรษณีย์  &nbsp;&nbsp;
                <label>
                <input name="zip_code" type="text" size="20" value="<?=$d[zip_code]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>โทรศัพท์ &nbsp;&nbsp;
                <input name="phone" type="text" id="phone" size="50" value="<?=$d[phone]?>" />
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>อยู่ตามทะเบียนบ้าน  <label>                </label>
                <label>
                <textarea name="address" cols="30" rows="5" id="address" value="<?=$d[address]?>"></textarea>
                </label>
</span><span class="style9"><br>&nbsp;&nbsp;
                <label></label>
            </span></td>
            <td><span class="style9"><br>เชื้อชาติ  &nbsp;&nbsp;
                <label> </label>
                <input name="race" type="text" size="15" value="<?=$d[race]?>" />
            </span></td>
          </tr>
          <tr>
            <td><span class="style6"><br>สัญชาติ &nbsp;&nbsp;
                <label> </label>
                <input name="nationality" type="text" size="15" value="<?=$d[nationality]?>" />
            </span></td>
            <td><span class="style9"><br>ศาสนา</span><span class="style9"> &nbsp;&nbsp;
                <label> </label>
                <input name="faith" type="text" size="15" value="<?=$d[faith]?>" />
            </span></td>
          </tr>
          <tr>
            <td colspan="2"><span class="style9"><br>ชื่อคู่สมรส
                <label>
                <input name="mate_name" type="text" size="50" maxlength="100" value="<?=$d[mate_name]?>" />
                </label>
            </span></td>
            </tr>
          <tr>
            <td colspan="2"><span class="style9"><br>สถานที่ทำงาน
                <input name="office" type="text" size="40" maxlength="255"value="<?=$d[office]?>" />
            </span></td>
            </tr>
          <tr>
            <td><span class="style9"><br>ตำแหน่ง
                <input name="ruck" type="text" size="40" maxlength="255" value="<?=$d[ruck]?>" />
            </span></td>
            <td><span class="style9"><br>เบอร์โทรศัพท์
                <input name="tel" type="text" size="30" maxlength="100" value="<?=$d[tel]?>" />
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>วันที่สิ้นสุดการทำงาน&nbsp;&nbsp;
                <input type="text" name="work_cease" value="<? if($work_cease =='') echo date("d/m/Y") ;else echo $work_cease;?>"  size="10" />
&nbsp; <img src="images/calendar.png" onclick="showCalendar('work_cease','DD/MM/YYYY')"   width='19'  height='19' />
<label></label>
            </span></td>
            <td><span class="style9"><br>ประเภทการออก
                <label>
                <input name="type_issuing" type="radio" value="<?=$d[radiobutton]?>" />
ลาออก
<input name="type_issuing" type="radio" value="<?=$d[radiobutton]?>" />
เกษียรณ์</label>
            </span>
              <label></label>
              <label></label></td>
          </tr>
          <tr>
            <td><span class="style9"><br>เงินบำเน็จ  &nbsp;&nbsp;
                <label>
                <input name="pension" type="text" size="10" value="<?=$d[pension]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>ข้อมูลเงินที่ต้องหักทุกเดือน(เงินสะสม)  &nbsp;&nbsp;
                <label>
                <input name="savings" type="text" size="20" value="<?=$d[savings]?>" />
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>เงินสะสมตั้งต้น  &nbsp;&nbsp;
                <label>
                <input name="start_savings" type="text" size="20" value="<?=$d[start_savings]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>ประกันสังคม
                <label>
                <input name="social_security" type="radio" value="radiobutton"/>
หัก
<input name="social_security" type="radio" value="radiobutton"/>
ไม่หัก</label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>เงินกู้สวัสดิการ  &nbsp;&nbsp;
                <label>
                <input name="welfare_loan" type="text" size="20" value="<?=$d[welfare_loan]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>สินค้าการตลาด  &nbsp;&nbsp;
                <label>
                <input name="corgo_marketing" type="text" id="corgo_marketing" size="30"  value="<?=$d[corgo_marketing]?>"/>
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>สมาคม  &nbsp;&nbsp;
                <label>
                <input name="guild" type="text" id="guild" size="20" value="<?=$d[guild]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>ออมสิน  &nbsp;&nbsp;
                <label>
                <input name="saving" type="text" id="saving" size="20" value="<?=$d[saving]?>" />
                </label>
            </span></td>
          </tr>
          <tr>
            <td colspan="2"><span class="style9">
              <label><br>
              อื่นๆ   &nbsp;&nbsp;
<input name="another" type="text" id="another" size="50" value="<?=$d[another]?>" />
              </label>
            </span></td>
          </tr>
          <tr>
            <td height="32" colspan="2">             
              <span class="style9">
              <label></label>
              <div align="center">
                <input type='submit' name='send' value='บันทึกข้อมูล' />
                <input type='reset' name='reset' value='ยกเลิก' />
                </div>
              </span></td>
            </tr>
        </table>
        </form>
    </div>
	<?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM shop order by shop_name ";
	$Per_Page =10;
	if(!$Page){$Page=1;} 
	$Prev_Page = $Page-1;
	$Next_Page = $Page+1;

	$result = mysql_query($sql);
	$Page_start = ($Per_Page*$Page)-$Per_Page;
	$Num_Rows = mysql_num_rows($result);

	if($Num_Rows<=$Per_Page)
	$Num_Pages =1;
	else if(($Num_Rows % $Per_Page)==0)
	$Num_Pages =($Num_Rows/$Per_Page) ;
	else 
	$Num_Pages =($Num_Rows/$Per_Page) +1;

	$Num_Pages = (int)$Num_Pages;

	if(($Page>$Num_Pages) || ($Page<0))

	print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
	$sql .= " LIMIT $Page_start , $Per_Page";
	$result1 = mysql_query($sql);
		?>
    <div class="tab" id="tab2" style="text-align:center;">
      <form id="form1" name="form1" method="post" action="">
	  
        <table width="100%" border="0">
          <tr>
            <td colspan="4"><p class="style6"><strong>ส่วนที่ 2 : ข้อมูลบุตร </strong></p>
			<center>
			</center>
              <p>&nbsp;</p></td>
            </tr>
          <tr>
            <td width="274" bgcolor="#33CC99"><div align="center" class="style6">ชื่อ-สกุล</div></td>
            <td width="118" bgcolor="#33CC99"><div align="center" class="style6">วันเกิด</div></td>
            <td width="192" bgcolor="#33CC99"><div align="center" class="style6">สถานศึกษา</div></td>
            <td width="188" bgcolor="#33CC99"><div align="center" class="style6">ที่ทำงาน</div></td>
          </tr>
          <tr>
            <td><?=$d[name]?></td>
            <td><?=$d[birthday]?></td>
            <td><?=$d[lyceum]?></td>
            <td><?=$d[office]?></td>
          </tr>
		  <? // }?>
        </table>
		   
        <? 
		mysql_close();	
?>
      </form>
    </div>
	
	
	<div class="tab" id="tab3" style="text-align:center;">
	  <form id="form1" name="form1" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td colspan="5"><p class="style6"><strong>ส่วนที่ 3 : ข้อมูลการศึกษา</strong>			  </p>
			  <p>
			            <?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM education  ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
	            </p></td>
            </tr>
          <tr>
            <td width="277" bgcolor="#33CC99"><div align="center"><span class="style6">ระดับการศึกษา(วุฒิ)</span></div></td>
            <td width="341" bgcolor="#33CC99"><div align="center"><span class="style6">ชื่อสถานศึกษา</span></div></td>
            <td width="160" bgcolor="#33CC99"><div align="center"><span class="style6">ปีการศึกษาที่จบ</span></div></td>
          </tr>
          <tr>
            <td><?=$d[graed]?></td>
            <td><?=$d[academy]?></td>
            <td><?=$d[year]?></td>
          </tr>
		     <? // }?>
        </table>
          
        <? 
		mysql_close();	
?>
	  </form>
      </div>
	
	<div class="tab" id="tab4" style="text-align:center;">
      <form id="form1" name="form1" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td colspan="5"><p class="style6"><strong>ส่วนที่ 4 : ข้อมูลการทำงาน</strong>			  </p>
			  <p>
                <?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM work  ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
              </p></td>
            </tr>
          <tr>
            <td width="127" bgcolor="#33CC99"><div align="center"><span class="style6">วันที่เริ่มทำงาน</span></div></td>
            <td width="213" bgcolor="#33CC99"><div align="center"><span class="style6">ตำแหน่ง</span></div></td>
            <td width="194" bgcolor="#33CC99"><div align="center"><span class="style6">ฝ่าย</span></div></td>
            <td width="122" bgcolor="#33CC99"><div align="center"><span class="style6">ระดับ</span></div></td>
            <td width="110" bgcolor="#33CC99"><div align="center"><span class="style6">เงินเดือน</span></div></td>
          </tr>
          <tr>
            <td><?=$d[start_work]?></td>
            <td><?=$d[ruck]?></td>
            <td><?=$d[part]?></td>
            <td><?=$d[grade]?></td>
            <td><?=$d[pay]?></td>
          </tr>
		     <? //}?>
        </table>
        <? 
		mysql_close();	
?>
      </form>
    </div>
    <div class="tab" id="tab5" style="text-align:center;">
      <form id="form1" name="form1" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td colspan="3"><p class="style6"><strong>ส่วนที่ 5 : ข้อมูลการฝึกอบรม </strong></p>
			  <center>
			    <p align="left">
                <?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM training  ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
              </p>
			  </center></td>
          </tr>
          <tr bgcolor="#33CC99">
            <td width="249"><div align="center"><span class="style6">ช่วงวันที่ฝึก</span></div></td>
            <td width="274" bgcolor="#33CC99"><div align="center"><span class="style6">สถานที่</span></div></td>
            <td width="255"><div align="center"><span class="style6">วุฒิที่ได้รับ</span></div></td>
          </tr>
          <tr>
            <td><?=$d[duration]?></td>
            <td><?=$d[place]?></td>
            <td><?=$d[qualification]?></td>
          </tr>
		     <? //}?>
        </table> 
           
      <? 
		mysql_close();	
?>
      </form> 
    </div>
    <div class="tab" id="tab6" style="text-align:left;">
      <form id="vacation" name="vacation" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td class="bmText" colspan="5"><p class="style6"><strong>ส่วนที่ 6 : ข้อมูลการลา</strong></p>

	            <p>
	              <?
if($search <>''){
	$sql="SELECT  p.*,v.* from personnel p,vacation v   WHERE 1 = 1 
and p.user_id = v.user_id ";

if($date_begin <> '' ){
	$sql .= " AND v.date_begin like '%$date_begin%'  ";
}
if($date_end <> '' ){
	$sql .= " AND v.date_end like '%$date_end%'  ";
}
if($num <> '' ){
	$sql .= " AND v.num like '%$num%'  ";
}
if($leave_type <> '' ){
	$sql .= " AND v.leave_type like '%$leave_type%'  ";
}
if($note <> '' ){
	$sql .= " AND v.note like '%$note%'  ";
}

$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))

print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql .= " LIMIT $Page_start , $Per_Page";

}
$result1 = mysql_query($sql);

?>
	            </p>              </td>
            </tr>
          <tr bgcolor="#33CC99">
            <td width="152" class="bmText"><div align="center"><span class="style6 style17">วันที่เริ่ม</span></div></td>
            <td width="156" bgcolor="#33CC99" class="bmText"><div align="center"><span class="style6 style17">ถึงวันที่</span></div></td>
            <td width="91" class="bmText"><div align="center" class="style9">จำนวนวันลา</div></td>
            <td width="187" class="bmText"><div align="center"><span class="style6 style17">ประเภทการลา</span></div></td>
            <td width="192" class="bmText"><div align="center"><span class="style6 style17">หมายเหตุ</span></div></td>
          </tr>
		  <?
$i = 0;
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>     
<a href="?action=add_vacation&v_id=<?=$rs[v_id]?>"  >
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#FFCC00'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">

            <td><? echo $rs[date_begin];  ?></td>
            <td><? echo $rs[date_end]?></td>
            <td><? echo $rs[num]?></td>
            <td><? echo $rs[leave_type]?></td>
            <td><? echo $rs[note]?></td>
          </tr>
		  </a>
		     <? }?>
        </table>
        <center>
          <font size="2" class="bmText" ><span class="style21">จำนวน ทั้งหมด <b>
          <?= $Num_Rows;?>
          </b>&nbsp;ฉบับ&nbsp;&nbsp;
          แยกเป็น : <b>
          <?=$Num_Pages;?>
          </b>&nbsp;หน้า<br />
&nbsp; หน้า :
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=personnel_story&search=$search&Page=$Prev_Page&date_begin=$date_begin&date_end=$date_end'&num=$num&leave_type=$leave_type'&note=$note'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=personnel_story&search=$search&Page=$i&date_begin=$date_begin&date_end=$date_end'&num=$num&leave_type=$leave_type'&note=$note'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=personnel_story&search=$search&Page=$Next_Page&date_begin=$date_begin&date_end=$date_end'&num=$num&leave_type=$leave_type'&note=$note'> หน้าถัดไป>> </a>";

?>
          </span></font>
        </center> </form>
	  </div>         
	       

	  <div class="tab" id="tab7" style="text-align:center;">	
	  <form id="form1" name="form1" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td colspan="3"><p class="style6"><strong>ส่วนที่ 7 : ข้อมูลบทลงโทษทางวินัย</strong></p>
			  <center>
              <table width="401" border="1">
                <tr>
                  <td width="101"><span class="style9">วันที่</span></td>
                  <td width="284"><span class="style9">
                    <? ?>
                    <input name="date_punish" type="text" id="date_punish" value="<? if($birthday =='') echo date("d/m/Y") ;else echo $birthday;?>"  size="10" />
&nbsp; <img src="images/calendar.png" onclick="showCalendar('birthday','DD/MM/YYYY')"   width='19'  height='19' /></span></td>
                </tr>
                <tr>
                  <td><span class="style9">รายการ</span></td>
                  <td><span class="style9">
                    <input name="li_st" type="text" id="li_st" size="40" maxlength="255" />
                  </span></td>
                </tr>
                <tr>
                  <td><span class="style9">เอกสารอ้างอิง</span></td>
                  <td><span class="style9">
                    <input name="refer" type="text" id="refer" size="40" maxlength="255" />
                  </span></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="center">
                    <input type='submit' name='send7' value='บันทึกข้อมูล' />
                    <input type='reset' name='reset7' value='ยกเลิก' />
                  </div></td>
                  </tr>
              </table>          
			  </center>
			      <p>
			        <?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM punish  ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
			      </p></td>
            </tr>
          <tr>
            <td width="151" bgcolor="#33CC99"><div align="center"><span class="style6">วันที่</span></div></td>
            <td width="367" bgcolor="#33CC99"><div align="center"><span class="style6">รายการ</span></div></td>
            <td width="260" bgcolor="#33CC99"><div align="center"><span class="style6">เอกสารอ้างอิง</span></div></td>
          </tr>
          <tr>
            <td><?=$d[date_punish]?></td>
            <td><?=$d[li_st]?></td>
            <td><?=$d[refer]?></td>
          </tr>
		     <? //}?>
        </table>
          
        <? 
		mysql_close();	
?>
	  </form>
	  </div>
	  </div>
<SCRIPT type=text/javascript>var tabber1 = new Yetii({
id: 'demo'
});

</SCRIPT>

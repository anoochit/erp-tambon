<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css">
<style type="text/css">
.login {
	font-family: Tahoma;
	font-size: 12pt;
	color: #2E578A;
	font-weight: lighter;
	line-height: normal;
}
.style22 {color: #000000}
</style>
<table width='242' border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width='242' height="0" border="0" cellpadding="0" cellspacing="0" >
      <tr>
        <td  align="left"><img src="images/DM1/images/GM_01.jpg" width="242" height="135" /></td>
      </tr>
      <tr>
        <td ><table width='242' height="0" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td><table id="Table_01" width="242" height="237" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="38" background="images/DM1/images/DM_03.jpg"><img src="images/DM1/images/DM_03.jpg" width="38" height="431" /></td>
                <td width="204" valign="top" background="images/DM1/images/DM_04.jpg"><table width="204" border="0" cellpadding="0" cellspacing="0" background="images/IM/images/IM_04.jpg">
                  <tr>
                    <td  height="25" align="center" class="topic1">หน้าหลัก</td>
                  </tr>
                  <tr>
                    <td height="25"  align="left" background="images/DM1/images/IM_04.jpg">&nbsp; &nbsp;<a href="index.php"  class="catLink">กลับสู่หน้าหลัก</a></td>
                  </tr>
                  <? if($_SESSION["username"] != "" ){?>
                  <tr>
                    <td width="137"  height="25" align="center"  class="topic1">ระบบควบคุม</td>
                  </tr>
                  <tr valign="middle"  >
                    <td   height="25"background="images/DM1/images/DM_04.jpg" bgcolor="#9ED174" ><font size="-1"  color="#420f8d"> <? echo "<div><b> ".$_SESSION["username"]."</b> เจ้าหน้าที่  <b>".find_dep_name($_SESSION[de_part])."</b>";
		?></font></td>
                  </tr>
                </table>
                          <br />
                          <div>
                            <? }?>
                            <? 	if($_SESSION["username"] != "" && $_SESSION['de_part'] == "1") { ?>
                            <table name="menu" cellpadding="0" cellspacing="0" width="" align="center">
							  <tr>
                                <td  width="195" height="27" align="center" class="topic1">&nbsp;&nbsp;จัดการเอกสาร&nbsp;&nbsp;</td>
                              </tr>
                              <tr>
                                <td  width="195" height="27">&nbsp;&nbsp;<a href='index.php?action=add' align="center">[เพิ่มเอกสาร]</a>&nbsp;&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left"  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=list_sendStamp'>[อนุมัติแล้ว
                                  <?
																		 if(count_stamp()  >0 ){
  																		echo	"(" . count_stamp()   ." ฉบับ)";
																		}
																		?>
                                  ]</a></td>
                              </tr>
                              <tr>
                                <td  align="left"  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=list_end'>[รอดำเนินการ
                                  <?
 if(find_end($_SESSION[de_part]) >0){
  echo	"(" . find_end($_SESSION[de_part]) ." ฉบับ)";
}
?>
                                  ]</a></td>
                              </tr>

							  <tr>
                                <td  width="195" height="27" align="center" class="topic1">&nbsp;&nbsp;ปฏิทินกิจกรรม&nbsp;&nbsp;</td>
                              </tr>
                              <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=add_calander' align="center">[เพิ่มปฏิทินกิจกรรม]</a>&nbsp;&nbsp;</td>
                              </tr> 
							   <tr>
                                <td  width="195" height="27" align="center" class="topic1">&nbsp;&nbsp;รายงาน&nbsp;&nbsp;</td>
                              </tr>
							  <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=report_alert' align="center">[รายงานการแจ้งเตือน]</a>&nbsp;&nbsp;</td>
                              </tr>
							  <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=borrow_manage' align="center">[รายงานยืมเอกสาร]</a>&nbsp;&nbsp;</td>
                              </tr>
                              <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=not_receive' align="center">[รายงานเอกสารยังไม่ได้ลงรับ]</a></td>
                              </tr>
                              <tr>
                                <td align="left"  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=add_access' align="center">[รายงานเอกสารรอดำเนินการ]</a></td>
                              </tr>
                              <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=add_receive_1' align="center">[รายงานเอกสารลงรับประจำวัน]</a>&nbsp;&nbsp;</td>
                              </tr>
							   
                              <? if ($_SESSION["username"] =='admin' ||  $_SESSION['de_part'] == 1){?>
							   <tr>
                                <td  width="195" height="27" align="center" class="topic1">&nbsp;&nbsp;ตั้งค่า&nbsp;&nbsp;</td>
                              </tr>
							  
                                <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=dep_manage' align="center">[กอง]</a>&nbsp;&nbsp;</td>
                              </tr>
                              <tr >
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=setup' align="center">[ผู้ใช้งาน]</a>&nbsp;&nbsp;</td>
                              </tr>
							  
                              <? }?>
                              <tr>
                                <td align="center" width="197" height="27"><a href='logout.php' class="news"><strong>ออกจากระบบ</strong></a></td>
                              </tr>
                            </table>
                            <?
			echo "<br>เข้าใช้งานเมื่อ ".$_SESSION["login_date"]."<BR>";
		echo "เวลา ".$_SESSION["login_time"]." น. <BR><br>";
		}elseif($_SESSION["username"] != "" && $_SESSION["username"] != "admin"){
			?>
                            <table name="menu" cellpadding="0" cellspacing="0" width="195" align="center">
                              <? if ($_SESSION['department'] == "all"){?>
                              <? }elseif ($_SESSION['department'] == 2){?>
                              <tr>
                                <td  width="196" height="27">&nbsp;<a href='index.php?action=list_stamp'>[เอกสารรออนุมัติ
                                      <?
 if(find_stamp($_SESSION[de_part]) >0){
  echo	"(" . find_stamp($_SESSION[de_part]) ." ฉบับ)";
}
?>
                                  ]</a></td>
                              </tr>
                              <? }elseif ($_SESSION['department'] <> 'all'){?>
                              <tr>
                                <td  width="197" height="27">&nbsp;<a href='index.php?action=list_receive'>[รอลงทะเบียนรับ
                                      <?
 if(find_receive($_SESSION[de_part]) >0){
  echo	"(" . find_receive($_SESSION[de_part]) ." ฉบับ)";
}
?>
                                  ]</a></td>
                              </tr>
                              <tr>
                                <td width="197" height="27">&nbsp;<a href='index.php?action=list_end'>[รอดำเนินการ
                                      <?
 if(find_end($_SESSION[de_part]) >0){
  echo	"(" . find_end($_SESSION[de_part]) ." ฉบับ)";
}
?>
                                  ]</a></td>
                              </tr>
                              <? }?>
                              <tr>
                                <td align="center" width="197" height="27"><a href='logout.php' class="news"><strong>ออกจากระบบ</strong></a></td>
                              </tr>
                            </table>
                            <?
		echo "<br>เข้าใช้งานเมื่อ ".$_SESSION["login_date"]."<BR>";
		echo "เวลา ".$_SESSION["login_time"]." น. <BR><br>";
		
		}else {
	include("login_form.php");
	
	}
	
	include("calendar.php");
	?>
                        </div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td ><img src="images/DM1/images/DM_08.jpg" width="242" height="48" ></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

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
                    <td  height="25" align="center" class="topic1">˹����ѡ</td>
                  </tr>
                  <tr>
                    <td height="25"  align="left" background="images/DM1/images/IM_04.jpg">&nbsp; &nbsp;<a href="index.php"  class="catLink">��Ѻ���˹����ѡ</a></td>
                  </tr>
                  <? if($_SESSION["username"] != "" ){?>
                  <tr>
                    <td width="137"  height="25" align="center"  class="topic1">�к��Ǻ���</td>
                  </tr>
                  <tr valign="middle"  >
                    <td   height="25"background="images/DM1/images/DM_04.jpg" bgcolor="#9ED174" ><font size="-1"  color="#420f8d"> <? echo "<div><b> ".$_SESSION["username"]."</b> ���˹�ҷ��  <b>".find_dep_name($_SESSION[de_part])."</b>";
		?></font></td>
                  </tr>
                </table>
                          <br />
                          <div>
                            <? }?>
                            <? 	if($_SESSION["username"] != "" && $_SESSION['de_part'] == "1") { ?>
                            <table name="menu" cellpadding="0" cellspacing="0" width="" align="center">
							  <tr>
                                <td  width="195" height="27" align="center" class="topic1">&nbsp;&nbsp;�Ѵ����͡���&nbsp;&nbsp;</td>
                              </tr>
                              <tr>
                                <td  width="195" height="27">&nbsp;&nbsp;<a href='index.php?action=add' align="center">[�����͡���]</a>&nbsp;&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left"  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=list_sendStamp'>[͹��ѵ�����
                                  <?
																		 if(count_stamp()  >0 ){
  																		echo	"(" . count_stamp()   ." ��Ѻ)";
																		}
																		?>
                                  ]</a></td>
                              </tr>
                              <tr>
                                <td  align="left"  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=list_end'>[�ʹ��Թ���
                                  <?
 if(find_end($_SESSION[de_part]) >0){
  echo	"(" . find_end($_SESSION[de_part]) ." ��Ѻ)";
}
?>
                                  ]</a></td>
                              </tr>

							  <tr>
                                <td  width="195" height="27" align="center" class="topic1">&nbsp;&nbsp;��ԷԹ�Ԩ����&nbsp;&nbsp;</td>
                              </tr>
                              <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=add_calander' align="center">[������ԷԹ�Ԩ����]</a>&nbsp;&nbsp;</td>
                              </tr> 
							   <tr>
                                <td  width="195" height="27" align="center" class="topic1">&nbsp;&nbsp;��§ҹ&nbsp;&nbsp;</td>
                              </tr>
							  <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=report_alert' align="center">[��§ҹ�������͹]</a>&nbsp;&nbsp;</td>
                              </tr>
							  <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=borrow_manage' align="center">[��§ҹ����͡���]</a>&nbsp;&nbsp;</td>
                              </tr>
                              <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=not_receive' align="center">[��§ҹ�͡����ѧ�����ŧ�Ѻ]</a></td>
                              </tr>
                              <tr>
                                <td align="left"  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=add_access' align="center">[��§ҹ�͡����ʹ��Թ���]</a></td>
                              </tr>
                              <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=add_receive_1' align="center">[��§ҹ�͡���ŧ�Ѻ��Ш��ѹ]</a>&nbsp;&nbsp;</td>
                              </tr>
							   
                              <? if ($_SESSION["username"] =='admin' ||  $_SESSION['de_part'] == 1){?>
							   <tr>
                                <td  width="195" height="27" align="center" class="topic1">&nbsp;&nbsp;��駤��&nbsp;&nbsp;</td>
                              </tr>
							  
                                <tr>
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=dep_manage' align="center">[�ͧ]</a>&nbsp;&nbsp;</td>
                              </tr>
                              <tr >
                                <td  width="197" height="27">&nbsp;&nbsp;<a href='index.php?action=setup' align="center">[�����ҹ]</a>&nbsp;&nbsp;</td>
                              </tr>
							  
                              <? }?>
                              <tr>
                                <td align="center" width="197" height="27"><a href='logout.php' class="news"><strong>�͡�ҡ�к�</strong></a></td>
                              </tr>
                            </table>
                            <?
			echo "<br>�����ҹ����� ".$_SESSION["login_date"]."<BR>";
		echo "���� ".$_SESSION["login_time"]." �. <BR><br>";
		}elseif($_SESSION["username"] != "" && $_SESSION["username"] != "admin"){
			?>
                            <table name="menu" cellpadding="0" cellspacing="0" width="195" align="center">
                              <? if ($_SESSION['department'] == "all"){?>
                              <? }elseif ($_SESSION['department'] == 2){?>
                              <tr>
                                <td  width="196" height="27">&nbsp;<a href='index.php?action=list_stamp'>[�͡�����͹��ѵ�
                                      <?
 if(find_stamp($_SESSION[de_part]) >0){
  echo	"(" . find_stamp($_SESSION[de_part]) ." ��Ѻ)";
}
?>
                                  ]</a></td>
                              </tr>
                              <? }elseif ($_SESSION['department'] <> 'all'){?>
                              <tr>
                                <td  width="197" height="27">&nbsp;<a href='index.php?action=list_receive'>[��ŧ����¹�Ѻ
                                      <?
 if(find_receive($_SESSION[de_part]) >0){
  echo	"(" . find_receive($_SESSION[de_part]) ." ��Ѻ)";
}
?>
                                  ]</a></td>
                              </tr>
                              <tr>
                                <td width="197" height="27">&nbsp;<a href='index.php?action=list_end'>[�ʹ��Թ���
                                      <?
 if(find_end($_SESSION[de_part]) >0){
  echo	"(" . find_end($_SESSION[de_part]) ." ��Ѻ)";
}
?>
                                  ]</a></td>
                              </tr>
                              <? }?>
                              <tr>
                                <td align="center" width="197" height="27"><a href='logout.php' class="news"><strong>�͡�ҡ�к�</strong></a></td>
                              </tr>
                            </table>
                            <?
		echo "<br>�����ҹ����� ".$_SESSION["login_date"]."<BR>";
		echo "���� ".$_SESSION["login_time"]." �. <BR><br>";
		
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

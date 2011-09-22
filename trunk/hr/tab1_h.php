<?
session_start();
include('config.inc.php');

if($cancel <>''){
		$sql = "UPDATE person SET status = 1 where user_id = '$user_id'";
		$result= mysql_query($sql);
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=find_person\">\n";
}


?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="Yetii/custom.css">
<link rel="stylesheet" type="text/css" href="Yetii/white.css">
<script type="text/javascript" src="Yetii/yetii-min.js"></script>

<style type="text/css">
<!--
.style_h{
	color: #3300FF;
	font-size: 13px;
	font-family: Tahoma;
}
BODY {
	color:#000000;
	background-color: #FFFFFF;
	margin: 0px;
	font-size:14px;
	font-family:Tahoma;
}
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
.style6 {font-size: 13px}
.style_l {
	font-family: Tahoma;
	font-size: 13px;
	color: #990000;
	text-decoration: none;
	
	
}
-->
</style>

<link href="style.css" rel="stylesheet" type="text/css">
<body>

  <?
	  //-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM person p , ps_tname_ref ps WHERE p.ps_tname_id = ps.ps_tname_id and p.user_id=$user_id ";
  //echo $sql ;
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
 ?>
<form id="form1" name="form1" method="post" action="">
<div align="center">
<p class="style6" align="center"><strong>ส่วนที่ 1 : ข้อมูลส่วนตัว</strong></p>
	<table width="100%"  cellpadding="1" cellspacing="1" border="0"  >
	<tr>
        <td colspan="10" height="30" align="center">		[ <a href="#" class="style_l"onClick="javascript:popup('pop_edit_his_h.php?user_id=<?=$user_id?>','',750,700)"   >แก้ไขข้อมูล</a> ]  &nbsp; [ <a href="#" class="style_l" onClick="window.open('print_tab1_h.php?user_id=<?=$user_id?>')"   >พิมพ์ส่วนนี้</a> ]
		</td>
      </tr>
	<tr>
	<td width="300" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left"> ชื่อ-สกุล
  
      &nbsp;&nbsp; </div></td>
      <td colspan="3" bgcolor="#B2DFEE" class="style6"   ><div align="left">&nbsp;<?
		  if($d[ps_tname_id] <>'00') echo $d[ps_tname_item];
		  else " ";
		   ?>  <?=$d[name]?></div></td>
  <td width="470"  rowspan="5"   align="center">
			  <? if($d[image] <>''){?>
			  			<img src="files/<?=$d[image]?>"  width="102" height="121"  border="1"/>
				<? }else{?>	
						<img  src="images/noimage.gif"  border="1" width="102" height="121"  />
				<? }?>					</td>
	</tr>
	<tr>
	<td width="300" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">วัน เดือน ปี เกิด </div></td>
  <td  colspan="3" bgcolor="#B2DFEE" class="style6" ><div align="left">&nbsp;<? if($d[birthday]<>"" and $d[birthday]<>"0000-00-00"  ){echo date_2($d[birthday]);}else{echo "";} ?>&nbsp;</div></td>
	</tr>
		
	<tr>
	 <td width="300"  height="30" bgcolor="#dcdcdc" class="style_h" ><div align="left">เลขประจำตัวประชาชน</div></td>
        <td bgcolor="#B2DFEE" class="style6" colspan="3"><div align="left">&nbsp;<? echo $d[id_person] ?>
        </div></td>
	</tr>
<tr>
	  <td  height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">สัญชาติ</div></td>
        <td bgcolor="#B2DFEE" class="style6" colspan="3"><div align="left">&nbsp;<? echo $d[nationality] ?>
        </div></td>
	</tr>
	<tr>
	  <td width="300" height="28" bgcolor="#dcdcdc" class="style_h"><div align="left">เชื้อชาติ</div></td>
        <td bgcolor="#B2DFEE" class="style6" colspan="3"><div align="left">&nbsp;<? echo $d[race] ?>

        </div></td>
	</tr>
      <tr>
        <td height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">ศาสนา</div></td>
        <td width="354" bgcolor="#B2DFEE" class="style6"><div align="left">&nbsp;<? echo $d[faith] ?>
   
        </div></td>
        <td width="189" bgcolor="#dcdcdc" class="style_h" ><div align="left">กรุ๊ปแลือด</div></td>
        <td bgcolor="#B2DFEE" class="style6" colspan="2"><div align="left">&nbsp;<? echo $d[blood] ?>
   
        </div></td>
      </tr>
	  <tr>
		<td width="300" height="28" bgcolor="#dcdcdc" class="style_h"><div align="left">เพศ</div></td>
                <td bgcolor="#B2DFEE" class="style6"  ><div align="left">&nbsp;<? echo $d[sex] ?>
         
        </div></td> 
		<td width="189" bgcolor="#dcdcdc" class="style_h" ><div align="left">สถานภาพครอบครัว</div></td>
        <td bgcolor="#B2DFEE" class="style6" colspan="2"><div align="left">&nbsp;<? echo $d[status_ma] ?>
   

	  </tr>
	       <tr>
        <td height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">อาชีพเดิม</div></td>
        <td width="354" bgcolor="#B2DFEE" class="style6"><div align="left">&nbsp;<? echo $d[occu_old] ?>
   
        </div></td>
        <td bgcolor="#dcdcdc" class="style_h" ><div align="left">อาชีพใหม่</div></td>
        <td bgcolor="#B2DFEE" class="style6"colspan="2"><div align="left">&nbsp;<? echo $d[occu_new] ?>
   
        </div></td>
      </tr>
		  <tr>
	  <td width="300" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">สถานะ </div></td>
        <td  height="30"  colspan="4" class="style6" bgcolor="#B2DFEE"><div align="left"><input  type="radio" name="status" value="0"<? if($d[status] =='0') echo "checked"?> /> &nbsp;&nbsp;ปกติ&nbsp;&nbsp;
		    <input type="radio" name="status" value="1" <? if($d[status] =='1') echo "checked"?>/> &nbsp;&nbsp;ลาออก&nbsp;&nbsp;
		    <input type="radio" name="status" value="2" <? if($d[status] =='2') echo "checked"?>/> &nbsp;&nbsp;ไล่ออก&nbsp;&nbsp;
		    <input type="radio" name="status" value="3" <? if($d[status] =='3') echo "checked"?>/> &nbsp;&nbsp;เกษียณ&nbsp;&nbsp;
		    <input type="radio" name="status" value="4" <? if($d[status] =='4') echo "checked"?>/> &nbsp;&nbsp;ย้าย&nbsp;&nbsp;
			<input type="radio" name="status" value="5" <? if($d[status] =='5') echo "checked"?>/> &nbsp;&nbsp;หมดวาระ&nbsp;&nbsp;
		  </div>		  </td>
		  </tr>
		  <tr><td colspan="5">
		  <table width="100%" cellpadding="1" cellspacing="1" border="0" >
  <tr>
     <td width="181" height="28" bgcolor="#dcdcdc"  class="style_h"><div align="left">บิดาชื่อ</div></td>
    <td width="264" bgcolor="#B2DFEE" class="style6"><div align="left">&nbsp;<?=$d[fa_name]?></div></td>
     <td width="149" bgcolor="#dcdcdc"  class="style_h"><div align="left">สัญชาติ</div></td>
    <td width="150" bgcolor="#B2DFEE" class="style6">&nbsp;<?=$d[fa_nation]?></td>
      <td width="149" bgcolor="#dcdcdc"  class="style_h"><div align="left">ศาสนา</div></td>
    <td width="149" bgcolor="#B2DFEE" class="style6">&nbsp;<?=$d[fa_faith]?></td>
     <td width="135" bgcolor="#dcdcdc"  class="style_h"><div align="left">อาชีพ</div></td>
    <td width="121" bgcolor="#B2DFEE" class="style6">&nbsp;<?=$d[fa_occu]?></td>
  </tr>
  <tr>
     <td width="181" height="28" bgcolor="#dcdcdc"  class="style_h"><div align="left">มารดาชื่อ</div></td>
    <td width="264" bgcolor="#B2DFEE" class="style6"><div align="left">&nbsp;<?=$d[mo_name]?></div></td>
     <td width="149" bgcolor="#dcdcdc"  class="style_h"><div align="left">สัญชาติ</div></td>
    <td width="150" bgcolor="#B2DFEE" class="style6">&nbsp;<?=$d[mo_nation]?></td>
      <td width="149" bgcolor="#dcdcdc"  class="style_h"><div align="left">ศาสนา</div></td>
    <td width="149" bgcolor="#B2DFEE" class="style6">&nbsp;<?=$d[mo_faith]?></td>
     <td width="135" bgcolor="#dcdcdc"  class="style_h"><div align="left">อาชีพ</div></td>
    <td width="121" bgcolor="#B2DFEE" class="style6">&nbsp;<?=$d[mo_occu]?></td>
  </tr>
  <tr>
     <td width="181" height="28" bgcolor="#dcdcdc"  class="style_h"><div align="left">คู่สมรสชื่อ</div></td>
    <td width="264" bgcolor="#B2DFEE" class="style6"><div align="left">&nbsp;<?=$d[mate_name]?></div></td>
     <td width="149" bgcolor="#dcdcdc"  class="style_h"><div align="left">สัญชาติ</div></td>
    <td width="150" bgcolor="#B2DFEE" class="style6">&nbsp;<?=$d[mate_nation]?></td>
      <td width="149" bgcolor="#dcdcdc"  class="style_h"><div align="left">ศาสนา</div></td>
    <td width="149" bgcolor="#B2DFEE" class="style6">&nbsp;<?=$d[mate_faith]?></td>
     <td width="135" bgcolor="#dcdcdc"  class="style_h"><div align="left">อาชีพ</div></td>
    <td width="121" bgcolor="#B2DFEE" class="style6">&nbsp;<?=$d[mate_occu]?></td>
  </tr>
</table>
		  </td></tr>
		  <tr>
        <td colspan="5" ><br />
            <fieldset>
            <legend align="left" > <span class="logout"  >ภูมิลำเนาเดิม</span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="13%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">เลขที่ </div></td>
                <td width="14%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[num_address_old] ?>
                </div></td>
                <td width="12%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">หมู่ที่</div></td>
                <td width="23%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[moo_old] ?>
                </div></td>
                <td width="11%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">ถนน</div></td>
                <td width="27%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[road_old] ?>
                </div></td>
              </tr>
              <tr>
                <td width="13%" bgcolor="#dcdcdc" class="style_h"><div align="left">ตำบล </div></td>
                <td width="14%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[subdistrict_old] ?>
 
                </div></td>
                <td width="12%" bgcolor="#dcdcdc" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="23%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[district_old] ?>
       
                </div></td><td width="11%" bgcolor="#dcdcdc" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="27%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[county_old] ?>
                </div></td>
              </tr>
              <tr> 
                <td width="13%" bgcolor="#dcdcdc" class="style_h"><div align="left">โทรศัพท์หมายเลข</div></td>
                <td  bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[phone_old] ?>
 
                </div></td>  <td width="12%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">มือถือ</div></td>
                <td bgcolor="#B2DFEE" class="style6" colspan="3"><div align="left"><? echo $d[mobile_old] ?>
                </div></td>
              </tr>
            </table>
            </fieldset></td>
      </tr>
      <tr>
        <td colspan="5" ><br />
            <fieldset>
            <legend align="left" > <span class="logout"  >ภูมิลำเนาปัจจุบัน </span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="13%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">เลขที่ </div></td>
                <td width="14%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[num_address] ?>
                </div></td>
                <td width="12%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">หมู่ที่</div></td>
                <td width="23%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[moo] ?>
                </div></td>
                <td width="11%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">ถนน</div></td>
                <td width="27%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[road] ?>
                </div></td>
              </tr>
              <tr>
                <td width="13%" bgcolor="#dcdcdc" class="style_h"><div align="left">ตำบล </div></td>
                <td width="14%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[subdistrict] ?>
                </div></td>
                <td width="12%" bgcolor="#dcdcdc" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="23%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[district] ?>
                </div></td><td width="11%" bgcolor="#dcdcdc" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="27%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[county] ?>
     
                </div></td>
              </tr>
              <tr> 
                <td width="13%" bgcolor="#dcdcdc" class="style_h"><div align="left">โทรศัพท์หมายเลข</div></td>
                <td  bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[phone] ?>
 
                </div></td>  <td width="12%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">มือถือ</div></td>
                <td bgcolor="#B2DFEE" class="style6" colspan="3"><div align="left"><? echo $d[mobile] ?>
                </div></td>
              </tr>
            </table>
            </fieldset></td>
      </tr>
	   <tr>
        <td colspan="5" class="logout" ><br />
            <fieldset>
            <legend align="left" > <span class="logout"  >สถานที่ที่สามารถติดต่อได้สะดวก</span> </legend>
              <br /><table width="100%" border="0" cellspacing="1" cellpadding="1">
			  <tr>
                <td height="30" bgcolor="#dcdcdc" class="style_h" colspan="2"><div align="left">สถานที่ที่สามารถติดต่อได้สะดวก</div></td>
                 <td bgcolor="#B2DFEE" class="style6" colspan="4"><div align="left"><? echo $d[place_con] ?>
                </div></td> 
              </tr>
              <tr>
                <td width="13%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">เลขที่ </div></td>
                <td width="14%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[num_address_con] ?>
                </div></td>
                <td width="12%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">หมู่ที่</div></td>
                <td width="23%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[moo_con] ?>
                </div></td>
                <td width="11%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">ถนน</div></td>
                <td width="27%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[road_con] ?>
                </div></td>
              </tr>
              <tr>
                <td width="13%" bgcolor="#dcdcdc" class="style_h"><div align="left">ตำบล </div></td>
                <td width="14%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[subdistrict_con] ?>
 
                </div></td>
                <td width="12%" bgcolor="#dcdcdc" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="23%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[district_con] ?>
       
                </div></td><td width="11%" bgcolor="#dcdcdc" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="27%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[county_con] ?>
     
                </div></td>
              </tr>
              <tr> 
              
                <td width="13%" bgcolor="#dcdcdc" class="style_h"><div align="left">โทรศัพท์หมายเลข</div></td>
                <td  bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[phone_con] ?>
 
                </div></td>  <td width="12%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">มือถือ</div></td>
                <td bgcolor="#B2DFEE" class="style6" colspan="3"><div align="left"><? echo $d[mobile_con] ?>
       
                </div></td>
              </tr>
            </table>
            </fieldset></td>
      </tr>
</table>
	<br>
</div>
      </form>
<script language="JavaScript" type="text/javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
		
	}
		return false;
}
</script>


</body><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
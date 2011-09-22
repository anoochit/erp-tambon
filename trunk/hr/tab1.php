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
        <td colspan="10" height="30" align="center">		[ <a href="#" class="style_l"onClick="javascript:popup('pop_edit_his.php?user_id=<?=$user_id?>','',750,700)"   >แก้ไขข้อมูล</a> ]  &nbsp; [ <a href="#" class="style_l" onClick="window.open('print_tab1.php?user_id=<?=$user_id?>')"   >พิมพ์ส่วนนี้</a> ]
		  </td>
      </tr>
	<tr>
	<td width="205" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left"> ชื่อ-สกุล
  
      &nbsp;&nbsp; </div></td>
      <td colspan="2" bgcolor="#B2DFEE" class="style6"   ><div align="left"><?
		  if($d[ps_tname_id] <>'00') echo $d[ps_tname_item];
		  else " ";
		   ?>  <?=$d[name]?></div></td>
  <td  rowspan="5"   align="left" >
			  <? if($d[image] <>''){?>
			  			<img src="files/<?=$d[image]?>"  width="102" height="121"  border="1"/>
				<? }else{?>	
						<img  src="images/noimage.gif"  border="1" width="102" height="121"  />
				<? }?>					</td>
	</tr>
	<tr>
	<td width="205" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">วัน เดือน ปี เกิด </div></td>
  <td  colspan="2" bgcolor="#B2DFEE" class="style6" ><div align="left"><? if($d[birthday]<>"" and $d[birthday]<>"0000-00-00"  ){echo date_2($d[birthday]);}else{echo "";} ?>&nbsp;</div></td>
	</tr>
		<tr>
	<td width="205" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">วันที่บรรจุ  </div></td>
  <td  colspan="2" bgcolor="#B2DFEE" class="style6" ><div align="left"><? if($d[date_contain]<>"" and $d[date_contain]<>"0000-00-00"  ){echo date_2($d[date_contain]);}else{echo "";} ?>&nbsp;</div></td>
	</tr>
	<tr>
	<td width="205" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">วันเริ่มปฏิบัติราชการ  </div></td>
  <td  colspan="2" bgcolor="#B2DFEE" class="style6" ><div align="left"><? if($d[date_start]<>"" and $d[date_start]<>"0000-00-00"  ){echo date_2($d[date_start]);}else{echo "";} ?>&nbsp;</div></td>
	</tr>
	<tr>
	<td width="205" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">วันครบเกษียนอายุ </div></td>
  <td  colspan="2" bgcolor="#B2DFEE" class="style6" ><div align="left"><?
   if($d[birthday]<>"0000-00-00"  ){
		$k =explode("-",$d[birthday]) ;
		if($k[1] <10){
			 $bb = $k[0] + 60;
			 echo date_2($bb."-09-30");
		}else {
				$bb = $k[0]  + 61;
				echo date_2($bb."-09-30");
		}
	}
   ?>&nbsp;</div></td>
	</tr>
	<tr>
	 <td width="205"  height="30" bgcolor="#dcdcdc" class="style_h" ><div align="left">เลขประจำตัวประชาชน</div></td>
        <td bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[id_person] ?>
        </div></td>
	
	 <td width="249"  height="30" bgcolor="#dcdcdc" class="style_h" ><div align="left">เลขบัตรข้าราชการ</div></td>
        <td bgcolor="#B2DFEE"  class="style6"><div align="left"><? echo $d[id_serv] ?>
        </div></td>
	
	</tr>
	 <td width="205"  height="30" bgcolor="#dcdcdc" class="style_h" ><div align="left">ประเภทข้าราชการ</div></td>
        <td  colspan="2" bgcolor="#B2DFEE"  class="style6"><div align="left"><? echo $d[type_work] ?>
        </div></td>
	</tr>

      <tr>
        <td height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">เลขประจำตัวผู้เสียภาษี</div></td>
        <td width="234" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[tax_id] ?>
        </div></td>
        <td width="249" bgcolor="#dcdcdc" class="style_h"><div align="left">เลขประจำตัวบัตรประกันสังคม</div></td>
        <td width="278" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[ss_id] ?>      </div></td>
      </tr>
      <tr>
        <td  height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">สัญชาติ</div></td>
        <td width="234" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[nationality] ?>
        </div></td>
        <td width="249" bgcolor="#dcdcdc" class="style_h"><div align="left">เชื้อชาติ</div></td>
        <td width="278" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[race] ?>

        </div></td>
      </tr>
      <tr>
        <td height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">ศาสนา</div></td>
        <td width="234" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[faith] ?>
   
        </div></td>
        <td width="249" bgcolor="#dcdcdc" class="style_h"><div align="left">กรุ๊ปแลือด</div></td>
        <td width="278" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[blood] ?>
   
        </div></td>
      </tr>
      <tr>
        <td width="205" bgcolor="#dcdcdc" class="style_h"><div align="left">ชื่อบิดา</div></td>
                <td bgcolor="#B2DFEE" class="style6"  ><div align="left"><? echo $d[fa_name] ?>
       
        </div></td>
	    <td width="249" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">ชื่อมารดา</div></td>
                <td bgcolor="#B2DFEE" class="style6"  ><div align="left"><? echo $d[mo_name] ?>
         
        </div></td>
      </tr>
		<tr>
	  <td width="205" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">สมัคร กบข. </div></td>
        <td  height="30"  colspan="3" bgcolor="#B2DFEE" class="style6"><div align="left"><input  type="radio" name="reseve" value="Y"<? if($d[reseve] =='Y') echo "checked"?> /> &nbsp;&nbsp;สะสม&nbsp;&nbsp;
		    <input type="radio" name="reseve" value="N" <? if($d[reseve] =='N') echo "checked"?>/> &nbsp;&nbsp;ไม่สะสม&nbsp;&nbsp;
		  </div>		  </td>
	    </tr>
		  <tr>
	  <td width="205" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">สถานะ </div></td>
        <td  height="30"  colspan="3" class="style6" bgcolor="#B2DFEE"><div align="left"><input  type="radio" name="status" value="0"<? if($d[status] =='0') echo "checked"?> /> &nbsp;&nbsp;ปกติ&nbsp;&nbsp;
		    <input type="radio" name="status" value="1" <? if($d[status] =='1') echo "checked"?>/> &nbsp;&nbsp;ลาออก&nbsp;&nbsp;
		    <input type="radio" name="status" value="2" <? if($d[status] =='2') echo "checked"?>/> &nbsp;&nbsp;ไล่ออก&nbsp;&nbsp;
		    <input type="radio" name="status" value="3" <? if($d[status] =='3') echo "checked"?>/> &nbsp;&nbsp;เกษียณ&nbsp;&nbsp;
		    <input type="radio" name="status" value="4" <? if($d[status] =='4') echo "checked"?>/> &nbsp;&nbsp;ย้าย&nbsp;&nbsp;
		  </div>		  </td>
		  </tr>
      <tr>
        <td colspan="4" ><br />
            <fieldset>
            <legend align="left" > <span class="pageName"  >ที่อยู่ตามทะเบียนบ้าน</span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="19%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">เลขที่ </div></td>
                <td width="17%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[num_address] ?>
                </div></td>
                <td width="11%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">ถนน</div></td>
                <td width="15%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[road] ?>
                </div></td>
                <td width="11%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">ซอย</div></td>
                <td width="27%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[soi] ?>
     
                </div></td>
              </tr>
              <tr>
                <td width="19%" bgcolor="#dcdcdc" class="style_h"><div align="left">ตำบล </div></td>
                <td width="17%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[subdistrict] ?>
 
                </div></td>
                <td width="11%" bgcolor="#dcdcdc" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="15%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[district] ?>
       
                </div></td>
                <td width="11%" bgcolor="#dcdcdc" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="27%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[county] ?>
     
                </div></td>
              </tr>
              <tr>
                <td width="19%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">รหัสไปรษณีย์</div></td>
                <td width="17%" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[zip_code] ?>
       
                </div></td>
                <td width="11%" bgcolor="#dcdcdc" class="style_h"><div align="left">โทรศัพท์</div></td>
                <td colspan="2" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[phone] ?>
 
                </div></td>

                <td width="27%" class="style6"><div align="left"></div></td>
              </tr>
              <tr>
                <td width="19%" height="30" bgcolor="#dcdcdc" class="style_h"><div align="left">ที่อยู่ที่ติดต่อได้</div></td>
                <td  colspan="5" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[address] ?>

                </div></td>
              </tr>
            </table>
            </fieldset></td>
      </tr>
	   <tr>
        <td colspan="4" ><br />
            <fieldset>
            <legend align="left" > <span class="pageName"  >ข้อมูลคู่สมรส</span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
        <td width="134"  height="30" bgcolor="#dcdcdc" class="style_h"><div align="left"> ชื่อคู่สมรส &nbsp;&nbsp; </div></td>
        <td width="308" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[mate_name] ?>
        </div></td>
		<td width="168" bgcolor="#dcdcdc" class="style_h" ><div align="left">สถานที่ทำงาน</div>		</td>
		<td width="324" bgcolor="#B2DFEE" class="style6" ><div align="left"><? echo $d[office] ?></div>           </td>
      </tr>
              <tr>
        <td  height="30" bgcolor="#dcdcdc" class="style_h"><div align="left"> ตำแหน่ง&nbsp;&nbsp; </div></td>
        <td width="308" bgcolor="#B2DFEE" class="style6"><div align="left"><? echo $d[ruck] ?>
        </div></td>
		<td bgcolor="#dcdcdc" class="style_h" ><div align="left">เบอร์โทร</div>		</td>
		<td bgcolor="#B2DFEE" class="style6" ><div align="left"><? echo $d[tel] ?></div>           </td>
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
<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css"> 

<? 

if($del =='del'){
	 	$sql_del = "DELETE FROM move WHERE m_id=$m_id";
		//echo $sql_del;
		$result_del = mysql_query($sql_del);
		
		$sql_up = "UPDATE code SET m_id = '".find_move_id($c_id)."' WHERE c_id = '$c_id' ";
		echo "\$sql_up  ".$sql_up."<br>";
		$result_up  = mysql_query($sql_up); 
		
		echo "<meta http-equiv='refresh' content='0; url=show_control.php?c_id=$c_id'>";
}
if($del =='del1'){
	 	$sql_del = "DELETE FROM useful WHERE u_id=$use_id";
		//echo $sql_del;
		$result_del = mysql_query($sql_del);
		echo "<meta http-equiv='refresh' content='0; url=show_control.php?c_id=$c_id'>";
}



	$sql="SELECT  r.*,rd.* from receive r,receive_detail rd
 WHERE  r.r_id = rd.r_id and  rd.rd_id ='$rd_id' ";
//echo 	$sql."<br>";
$result1 = mysql_query($sql);
$rs=mysql_fetch_array($result1);
?>
<style type="text/css">
<!--
.style3 {
	font-size: 12px;
	font-weight: normal;
}
.style5 {font-size: 12px; font-weight: bold; }
.style6 {font-size: 12px; color: #CC33CC; }
-->
</style>
<form name="save"  method="post" enctype="multipart/form-data" action="#">
<table width="114%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td colspan="2" align="center" style="border: #FFFFFF 1px solid;">
<table width="114%" border="0" cellpadding="0" cellspacing="0" >
	<tr align="left" >
	<td  height="25"  >
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
          <tr>
            <td width="1045" height="30"><div align="center" class="tbHeadText">ทะเบียนครุภัณฑ์ที่ดินและสิ่งก่อสร้าง</div></td>
            <td width="172"><div align="center">
              <table width="90" border="0" cellpadding="0" cellspacing="0" >
                  <tr >
                    <td style="border: #000000 1px solid;" ><div align="center" class="textnew" >พ.ด.1&nbsp;</div></td>
                  </tr>
                      </table>
            </div></td>
          </tr>
          <tr>
            <td height="30" ></td>
            <td><div align="center">
              <table width="90" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="90" style="border: #000000 1px solid;" ><div align="center" class="textnew" >1&nbsp;</div></td>
                  </tr>
              </table>
            </div></td>
          </tr>
	          </table>
				<table width="100%" cellpadding="0" cellspacing="0" border="0" >
          <tr >
        <td width="6%" height="30" class="TextNew" >ประเภท</td>
        <td width="62%" bgcolor="#FFFFFF" ><span class="TextNew2">
          <?=fild_type($rs[type_id])?>
        </span></td>
        <td width="9%" class="TextNew">เลขรหัสพัสดุ</td>
        <td width="23%"  bgcolor="#FFFFFF" ><span class="TextNew2">
          <?=$rs[rd_name]?>
        </span></td>
      </tr>
	        </table></td>
	</tr>
</table></td>
</tr>
</table>
<table width="114%" height="592" border="0">
  <tr>
    <td width="100%" height="570"><table width="100%" height="100%" cellpadding="0" cellspacing="0" style="border: #000000 1px solid;">
      <tr>
        <td width="33%" height="319" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: #000000 1px solid;">
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;" >&nbsp;ชื่อพัสดุ<span class="TextNew2">
:              
            <span class="TextNew2">
            <?=$rs[rd_name]?>
            </span></span></td>
          </tr>
          <tr>
            <td height="26" colspan="2"  class="TextNew" style="border: #000000 1px solid;" >&nbsp;ที่ตั้งพัสดุ : </td>
          </tr>
          <tr>
            <td height="26" colspan="2" style="border: #000000 1px solid;"  class="TextNew">&nbsp;ซื้อ/จ้าง/ได้มา เมื่อวันที่ :<span class="TextNew2">
              <?=date_2($rs["date_receive"])?>
            </span></td>
          </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;เลขที่หนังสืออนุมัติ/ลงวันที่ : </td>
          </tr>
		    <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="36%" height="24" class="TextNew">&nbsp;ราคา :&nbsp;<span class="TextNew2"><? echo number_format($rs["price"],2)?></span></td>
                <td width="64%"height="24" class="TextNew">บาท  ใช้งบประมาณของ :<span class="TextNew2">
                  <? 
	if($rs["come_in"] =='0')echo 'รายได้' ;
	else if($rs["come_in"] =='1')echo 'อุดหนุน' ;
	else if($rs["come_in"] =='2')echo 'บริจาค' ;
	else if($rs["come_in"] =='3')echo 'เงินกู้' ;
	else if($rs["come_in"] =='4')echo 'อื่นๆ' ;
	?>
                </span></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;เอกสารสิทธิ์พัสดุ : </td>
          </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;ชื่อผู้รับจ้าง/ผู้ขาย/ผู้ให้ :<span class="TextNew2">
              <? //=date_2($rs["date_receive"])?>
            </span></td>
          </tr>
          <tr>
            <td width="77" height="26" class="TextNew"style="border: #000000 1px solid;">&nbsp;ที่ดิน</td>
			<td width="258" height="26" class="TextNew" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="31%">&nbsp;เนื้อที่ : </td>
                  <td width="24%">ไร่</td>
				  <td width="28%">งาน</td>
				  <td width="17%">ตารางวา</td>
               </tr>
              </table></td>
          </tr>
          <tr>
            <td height="26" class="TextNew" style="border: #000000 1px solid;">&nbsp;โรงเรือน</td>
			<td width="258" height="26" class="TextNew" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="TextNew" valign="middle">
                <td width="47%">&nbsp;<img src="images/block.jpg" width="20" height="18" />&nbsp;อาคารเดี่ยว</td>
                <td width="53%">&nbsp;<img src="images/block.jpg" width="20" height="18" />&nbsp;อาคารแถว</td>
              </tr>
            </table></td>
          </tr>
          <tr class="TextNew">
            <td height="26" class="TextNew" style="border: #000000 1px solid;">&nbsp;</td>
			<td width="258" height="26" class="TextNew" style="border: #000000 1px solid;"><table width="100%"border="0" cellpadding="0" cellspacing="0">
              <tr class="TextNew" valign="middle">
                <td width="29%">&nbsp;<img src="images/block.jpg" width="20" height="18" />&nbsp;ตึก</td>
                <td width="29%">&nbsp;<img src="images/block.jpg" width="20" height="18" />&nbsp;ไม้</td>
                <td width="42%">&nbsp;<img src="images/block.jpg" width="20" height="18" />&nbsp;ครึ่งตึกครึ่งไม้</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="26" class="TextNew" style="border: #000000 1px solid;">&nbsp;</td>
			<td width="258" height="26" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="47%">&nbsp;จำนวน</td>
                  <td width="53%">ชั้น</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td height="26" class="TextNew" style="border: #000000 1px solid;">&nbsp;อื่นๆ</td>
			<td width="258" height="26" class="TextNew" style="border: #000000 1px solid;">&nbsp;ลักษณะ/ชนิด : </td>
          </tr>
          <tr>
            <td height="26" style="border: #000000 1px solid;">&nbsp;</td>
			<td width="258" height="26" class="TextNew" style="border: #000000 1px solid;">&nbsp;ขนาด : </td>
          </tr>
        </table></td>
        <td height="26" width="31%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: #000000 1px solid;">
          <tr>
            <td height="26" class="TextNew" style="border: #000000 1px solid;">&nbsp;ค่าเสื่อมราคา</td>
            <td height="26" class="TextNew" style="border: #000000 1px solid;">&nbsp;มูลค่าพิ่มขึ้นทุก 4 ปี </td>
          </tr>
          <tr>
            <td height="26" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="32%">&nbsp;ปีที่ 1 : </td>
                  <td width="53%">&nbsp;</td>
				   <td width="15%">%</td>
               </tr>
              </table></td>
            <td height="26" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="36%">&nbsp;พ.ศ.</td>
                  <td width="49%">:</td>
				   <td width="15%">%</td>
               </tr>
              </table></td>
          </tr>
          <tr>
            <td height="26" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="32%">&nbsp;ปีที่ 2 : </td>
                  <td width="53%">&nbsp;</td>
				   <td width="15%">%</td>
                </tr>
              </table></td>
            <td height="26"  style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="36%">&nbsp;พ.ศ.</td>
                  <td width="49%">:</td>
				   <td width="15%">%</td>
               </tr>
              </table></td>
          </tr>
          <tr>
            <td height="26" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="32%">&nbsp;ปีที่ 3 : </td>
                  <td width="53%">&nbsp;</td>
				   <td width="15%">%</td>
                </tr>
              </table></td>
            <td height="26" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="36%">&nbsp;พ.ศ.</td>
                  <td width="49%">:</td>
				   <td width="15%">%</td>
               </tr>
              </table></td>
          </tr>
          <tr>
            <td height="26" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="32%">&nbsp;ปีที่ 4 : </td>
                  <td width="53%">&nbsp;</td>
				   <td width="15%">%</td>
               </tr>
              </table></td>
            <td height="26" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="36%">&nbsp;พ.ศ.</td>
                  <td width="49%">:</td>
				   <td width="15%">%</td>
               </tr>
              </table></td>
          </tr>
          <tr>
            <td height="26"  style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
               <tr class="TextNew">
                  <td width="32%">&nbsp;ปีที่ 5 : </td>
                  <td width="53%">&nbsp;</td>
				   <td width="15%">%</td>
               </tr>
              </table></td>
            <td height="26" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="36%">&nbsp;พ.ศ.</td>
                  <td width="49%">:</td>
				   <td width="15%">%</td>
               </tr>
              </table></td>
          </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;"><div align="center"><b>&nbsp;การจำหน่าย</b></div></td>
            </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;วันที่จำหน่าย :<span class="TextNew2">
              <?
	if($rs["sale_date1"] <>'0000-00-00') echo date_2($rs["sale_date1"]);
	else "&nbsp;";?>
            </span></td>
            </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;วิธีจำหน่าย :<span class="TextNew2">&nbsp;<? echo $rs[sale_way1];?></span></td>
            </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;เลขที่หนังสืออนุมัติ/ลงวันที่ :&nbsp;<span class="TextNew2"><? echo $rs[sale_num1];?></span></td>
            </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;ราคาจำหน่าย :&nbsp;<span class="TextNew2"><? echo number_format($rs[sale_price1],2);?></span></td>
            </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;กำไร / ขาดทุน :&nbsp;<span class="TextNew2"><? echo number_format($rs[sale_benefit1],2);?></span></td>
            </tr>
          <tr>
            <td height="26" colspan="2" style="border: #000000 1px solid;">&nbsp;</td>
            </tr>
        </table></td>
        <td width="36%" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse;" >
            <tr  >
              <td height="26" colspan="6"  align="center"  style="border: #000000 1px solid;" ><span class="TextNew"><b>ชื่อผู้ใช้ - ดูแล - รับผิดชอบพัสดุ</b></span></td>
            </tr>
            <tr class="TextNew" >
              <td width="13%" height="26"  align="center"  style="border: #000000 1px solid;" > พ.ศ.</td>
              <td width="44%" align="center"  style="border: #000000 1px solid;" > ชื่อส่วนราชการ</td>
              <td width="43%" align="center"  style="border: #000000 1px solid;" > ชื่อหัวหน้าส่วนราชการ</td>
            </tr>
            <?
  $sql = "SELECT * FROM move Where c_id = '$c_id' order by  m_id ";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#FFFFFF';
elseif( $i%2 ==1) $bg ='#CCCCCC';

  ?>
            <tr bgcolor="<?=$bg?>" class="TextNew2">
              <td  height="26"  align="center"  style="border: #000000 1px solid;" >&nbsp;
                <?=$rs1[year]?></td>
              <td class="TextNew2"  style="border: #000000 1px solid;" >&nbsp;<span class="style3" style="border: #000000 1px solid;">
                <?  echo $rs1["department"]?>
              </span></td>
                  <td  style="border: #000000 1px solid;" >&nbsp;
                  <?=$rs1["name_head"]?></td>
            </tr>
            <? 
  	$i++;
  }?>
        </table></td>
      </tr>
	  <tr>
        <td height="243" colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: #000000 1px solid;">
            <tr  >
              <td height="26" colspan="5"  align="center"  style="border: #000000 1px solid;"  valign="top"><span class="TextNew"><b>การหาผลประโยชน์ในพัสดุ</b></span></td>
            </tr>
            <tr class="TextNew" >
              <td width="16%" height="26" align="center"  style="border: #000000 1px solid;" > พ.ศ.</td>
              <td width="23%" align="center" style="border: #000000 1px solid;" > รายการ</td>
              <td width="42%" align="center" style="border: #000000 1px solid;" >ผลประโยชน์ (บาท) ที่ได้รับเป็นรายเดือนหรือรายปี</td>
              
            </tr>
            <?
 $sql = "SELECT * FROM useful where c_id = '$c_id' order by year ";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#FFFFFF';
elseif( $i%2 ==1) $bg ='#CCCCCC';

  ?>
            <tr bgcolor="<?=$bg?>" class="TextNew2">
              <td  height="26"  align="center" style="border: #000000 1px solid;" >&nbsp;
                <?=$rs1[year]?></td>
              <td  style="border: #000000 1px solid;" >&nbsp;
                <?  echo $rs1["item"]?></td>
              <td style="border: #000000 1px solid;" >&nbsp;
                <?=$rs1["useful"]?></td>
              
            </tr>
            <? 
  	$i++;
  }?>
        </table></td>
        <td valign="top" ><table width="100%" height="100%" border="0" cellpadding="0"  cellspacing="0" style="border: #000000 1px solid;">
          <tr>
            <td height="28" ><span class="TextNew"> &nbsp;รูปถ่าย (ถ้ามี) และหรือแผนผังที่ตั้งพัสดุ</span></td>
          </tr>
          <tr>
            <td height="213">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</div>
<script language="JavaScript" type="text/javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("คุณต้องการลบข้อมูลทั้งหมดนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<?
function find_move_id($c_id) {
	
		$sql = "Select max(m_id) as max  from move  where c_id ='$c_id' ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		return $recn['max'];
	}
?>
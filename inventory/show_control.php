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
		$result_del = mysql_query($sql_del);
		$sql_up = "UPDATE code SET m_id = '".find_move_id($c_id)."' WHERE c_id = '$c_id' ";
		echo "\$sql_up  ".$sql_up."<br>";
		$result_up  = mysql_query($sql_up); 
		echo "<meta http-equiv='refresh' content='0; url=show_control.php?c_id=$c_id'>";
}
if($del =='del1'){
	 	$sql_del = "DELETE FROM useful WHERE u_id=$use_id";
		$result_del = mysql_query($sql_del);
		echo "<meta http-equiv='refresh' content='0; url=show_control.php?c_id=$c_id'>";
}
	$sql="SELECT  r.*,rd.*,c.* from receive r,receive_detail rd,code c 
 WHERE  r.r_id = rd.r_id and c.rd_id = rd.rd_id   and c.c_id ='$c_id' ";
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
<br />
<form name="save"  method="post" enctype="multipart/form-data" action="#">
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td colspan="2" align="center" bgcolor="#66CC99" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left" >
	<td  height="25"  >
		ทะเบียนครุภัณฑ์</td>
	</tr>
</table></td>
</tr>
</table><br />
<center><input type="submit" name="print" value=" พิมพ์ทะเบียนครุภัณฑ์" onclick="window.open('show_data_print.php?c_id=<?=$c_id?>');" class="buttom"/> &nbsp;&nbsp;&nbsp;<input type="submit" name="show_ser" value=" ดูประวัติซ่อม " onclick="window.open('list_repair2.php?c_id=<?=$rs["c_id"]?>')" class="buttom"/> &nbsp;&nbsp;&nbsp;<input type="button" name="edit_" value=" แก้ไขข้อมูล " onClick="javascript:popup('sample_11.php?c_id=<?=$rs[c_id]?>','',500,550);" class="buttom"/></center>
<br />
<table width="100%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table name="add" cellpadding="1" cellspacing="1" border="0"  bgcolor="#C7E3F1" width="100%">
 <tr >
    <td width="19%" height="30"><span class="style3">ประเภท</span></td>
    <td width="33%" bgcolor="#FFFFFF" class="style3"><div class="style6"><?=fild_type($rs[type_id])?></div></td>
	    <td width="22%"><span class="style3">เลขรหัสครุภัณฑ์</span></td>
    <td width="26%" bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo $rs[code];?>
      </div></td>
  </tr>
	<tr >
    <td width="19%" height="30"><span class="style3">ชื่อครุภัณฑ์</span></td>
    <td width="33%" bgcolor="#FFFFFF" class="style3"><div class="style6"><?=$rs[rd_name]?></div></td>
	    <td><span class="style3">ซื้อ / จ้าง / ได้มา จาก</span></td>
    <td bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo $rs[shop_name] //shop_name($rs[shop_id]);?>
		</div></td>
  </tr>
  <tr >
    <td width="19%" height="30"><span class="style3">ใบส่งของที่</span></td>
    <td width="33%" bgcolor="#FFFFFF" class="style3"><div class="style6"><? echo $rs[num_id]?></div></td>
	    <td><span class="style3">ซื้อ / จ้าง / ได้มา วันที่</span></td>
    <td bgcolor="#FFFFFF" class="style6"><div class="style3"><?=date_2($rs["date_receive"])?>
		</div></td>
  </tr>
    <tr >
    <td width="19%" height="30"><span class="style3">ชื่อ / ยี่ห้อผู้ทำหรือผลิต</span></td>
    <td width="33%" bgcolor="#FFFFFF" class="style3"><div class="style6"><? echo $rs["brand_name"]?></div></td>
	    <td><span class="style3">แบบ / ชนิด / ลักษณะ</span></td>
    <td bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo $rs["type_name"]?>
		</div></td>
  </tr>
	    <tr >
		<td><span class="style3">ราคา</span></td>
    <td bgcolor="#FFFFFF" class="style3"><div class="style6"><? echo number_format($rs["price"],2)?>
		</div></td>
      <td width="22%" height="30"><span class="style3">ใช้งบประมาณของ</span></td>
    <td  bgcolor="#FFFFFF" class="style6"><div class="style3"><? 
	if($rs["come_in"] =='0')echo 'รายได้' ;
	else if($rs["come_in"] =='1')echo 'อุดหนุน' ;
	else if($rs["come_in"] =='2')echo 'บริจาค' ;
	else if($rs["come_in"] =='3')echo 'เงินกู้' ;
	else if($rs["come_in"] =='4')echo 'อื่นๆ' ;
	?></div></td>
  </tr>
      <tr >
    <td width="19%" height="30"><span class="style3">หมายเลขลำดับ</span></td>
    <td width="33%" bgcolor="#FFFFFF" class="style3"><div class="style6"><?=$rs[serial]?></div></td>
	    <td><span class="style3">หมายเลขเครื่อง</span></td>
    <td bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo $rs[num_machine];?>
		</div></td>
  </tr>
        <tr >
    <td width="19%" height="30"><span class="style3">หมายเลขกรอบ</span></td>
    <td width="33%" bgcolor="#FFFFFF" class="style3"><div class="style6"><?=$rs[num_box]?></div></td>
	    <td><span class="style3">หมายเลขจดทะเบียน</span></td>
        <td bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo $rs[num_stamp];?>
		</div></td>
  </tr>
        <tr >
    <td width="19%" height="30"><span class="style3">สีของครุภัณฑ์</span></td>
    <td width="33%" bgcolor="#FFFFFF" class="style3"><div class="style6"><?=$rs[colour]?></div></td>
	    <td><span class="style3">หมายเลขจอ</span></td>
        <td bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo $rs[screen];?>
		</div></td>
  </tr>
  <tr >
    <td width="19%" height="30"><span class="style3">รูปถ่ายครุภัณฑ์ุ(ถ้ามี) หรือตำหนิรูปพรรณ</span></td>
    <td width="33%" bgcolor="#FFFFFF" ><div class="style6"><? if($rs['pic'] <>''){?>
	<a href="file_data/<?=$rs['pic']?>" target="_blank">คลิ๊กที่นี้</a>&nbsp;&nbsp;เพื่อดูภาพ
	<? }?>
	</div></td>
	    <td><span class="style3">อื่นๆ</span></td>
        <td bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo $rs[remark];?>
		</div></td>
  </tr>
  <tr >
    <td width="19%" height="30"><span class="style3">สภาพ</span></td>
    <td  bgcolor="#FFFFFF"  colspan="3"><div class="style6">
	<input type="radio" name="status" value="0"  <? if($rs['status']==0) echo "checked"?>/> ดี 
	<input type="radio" name="status" value="1"  <? if($rs['status']==1) echo "checked"?>/>  พอใช้
	<input type="radio" name="status" value="2"  <? if($rs['status']==2) echo "checked"?>/> ชำรุด
	<input type="radio" name="status" value="3"  <? if($rs['status']==3) echo "checked"?>/> สิ้นสภาพ &nbsp;&nbsp;&nbsp;
	<input type="button" name="edit_" value=" แก้ไข " onClick="javascript:popup('add_status.php?c_id=<?=$c_id?>','',350,220);"  class="buttom"></div></td>
  </tr>
  <tr class="lgBar" >
    <td height="30" colspan="2" align="center"><span class="style5">เงื่อนไข - การประกัน</span></td>
	 <td height="30" colspan="2"  align="center"><span class="style5">การจำหน่าย</span></td>
  </tr>
        <tr >
    <td width="19%" height="30"><span class="style3">ครุภัณฑ์ุรับประกันถึงวันที่</span></td>
    <td width="33%" bgcolor="#FFFFFF" class="style3"><div class="style6"><?
	if($rs["endDate_garan"] <>'0000-00-00') echo date_2($rs["endDate_garan"]);
	else "&nbsp;";?></div></td>
	    <td><span class="style3">วันที่จำหน่าย</span></td>
        <td bgcolor="#FFFFFF" class="style6"><div class="style3"><?
	if($rs["sale_date"] <>'0000-00-00') echo date_2($rs["sale_date"]);
	else "&nbsp;";?>
		</div></td>
  </tr>
  <tr >
    <td width="19%" height="30"><span class="style3">วันที่ประกันครุภัณฑ์</span></td>
    <td width="33%" bgcolor="#FFFFFF"  class="style3"><div class="style6"><?
	if($rs["date_garan"]<>'0000-00-00') echo date_2($rs["date_garan"]);
	else "&nbsp;";?>
	</div></td>
	    <td><span class="style3">วิธีจำหน่าย</span></td>
        <td bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo $rs[sale_way];?>
		</div></td>
  </tr>
   <tr >
  <td height="28"><span class="style3">ครุภัณฑ์ุประกันไว้ที่บริษัท</span></td>
        <td bgcolor="#FFFFFF" class="style3"><div class="style6"><? echo $rs[garan_at];?>
		</div></td>
		<td><span class="style3">เลขที่หนังสืออนุมัติ</span></td>
        <td bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo $rs[sale_num];?>
		</div></td>
	</tr>
<tr >
  <td height="28" colspan="2"  bgcolor="#FFFFFF">&nbsp;</td>
		<td><span class="style3">ราคาจำหน่าย</span></td>
        <td bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo number_format($rs[sale_price],2);?>
		</div></td>
	</tr>
	<tr >
 <td height="28" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
		<td><span class="style3">กำไร / ขาดทุน</span></td>
        <td bgcolor="#FFFFFF" class="style6"><div class="style3"><? echo number_format($rs[sale_benefit],2);?>
		</div></td>
	</tr>
  <tr >
    <td height="30"  bgcolor="#FFFFFF"colspan="2" align="center" valign="top">
	<table width="100%" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse;">
	  <tr  >
    <td height="30" colspan="6" class="lgBar" align="center"  style="border: #000000 1px solid;" ><span class="style5">ชื่อผู้ใช้ - ดูแล - รับผิดชอบครุภัณฑ์&nbsp;&nbsp;[ <a href="#" onClick="javascript:popup('sample_12.php?c_id=<?=$c_id?>&tab=add','',450,350)">เพิ่ม</a> ]</span></td>
  </tr>
  <tr class="style3" bgcolor="#33CCFF">
    <td width="10%" height="28"  align="center"  style="border: #000000 1px solid;" >
     พ.ศ.</td>
    <td width="22%" align="center"  style="border: #000000 1px solid;" >
     ชื่อส่วนราชการ</td>
    <td width="24%" align="center"  style="border: #000000 1px solid;" >
      ชื่อผู้ใช้ครุภัณฑ์</td>
    <td width="27%" align="center"  style="border: #000000 1px solid;" >
   ชื่อหัวหน้าส่วนราชการ</td>
	  <td width="10%" align="center"  style="border: #000000 1px solid;" >&nbsp;แก้ไข</td>
	    <td width="7%" align="center"  style="border: #000000 1px solid;" >&nbsp;ลบ</td>
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
  <tr bgcolor="<?=$bg?>" class="style3">
    <td  height="28"  align="center"  style="border: #000000 1px solid;" >&nbsp;<?=$rs1[year]?></td>
    <td class="style3"  style="border: #000000 1px solid;" >&nbsp;<?  echo find_div_name($rs1["department"]) //$rs1["department"]?></td>
    <td  style="border: #000000 1px solid;" >&nbsp;<?=$rs1["user"]?></td>
    <td  style="border: #000000 1px solid;" >&nbsp;<?=$rs1["name_head"]?></td>
	<td align="center"  style="border: #000000 1px solid;" ><a href="#" onClick="javascript:popup('sample_12.php?m_id=<?=$rs1["m_id"]?>&tab=edit','',450,350);"><img src="images/Modify.png" border="0" /></a></td>
    <td align="center"  style="border: #000000 1px solid;" ><a  href="?del=del&m_id=<?=$rs1["m_id"]?>&c_id=<?=$c_id?>" onClick="return godel();"><img src="images/Delete.png" border="0" /></a></td>
  </tr>
  <? 
  	$i++;
  }?>
</table></td>
<td colspan="2" bgcolor="#FFFFFF" valign="top">
<table width="100%" border="0" cellspacing="1" cellpadding="0" style="border-collapse:collapse;">
  <tr  >
    <td height="30" colspan="5" bgcolor="#FFFF99" align="center"  class="lgBar" style="border: #000000 1px solid;" ><span class="style5">การหาผลประโยชน์ในครุภัณฑ์ุ &nbsp;&nbsp;[ <a href="#" onClick="javascript:popup('sample_13.php?c_id=<?=$c_id?>&tab=add','',450,300);">เพิ่ม</a> ]</span></td>
  </tr>
  <tr class="style3" bgcolor="#33CCFF">
    <td width="16%" height="28" align="center"  style="border: #000000 1px solid;" >
 พ.ศ.</td>
    <td width="23%" align="center" style="border: #000000 1px solid;" >
    รายการ</td>
    <td width="42%" align="center" style="border: #000000 1px solid;" >ผลประโยชน์ (บาท) ที่ได้รับ<br />เป็นรายเดือนหรือรายปี</td>

	  <td width="9%" align="center" style="border: #000000 1px solid;" >&nbsp;แก้ไข</td>
	    <td width="10%" align="center" style="border: #000000 1px solid;" >&nbsp;ลบ</td>
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
  <tr bgcolor="<?=$bg?>" class="style3">
    <td  height="28"  align="center" style="border: #000000 1px solid;" >&nbsp;<?=$rs1[year]?></td>
    <td  style="border: #000000 1px solid;" >&nbsp;<?  echo $rs1["item"]?></td>
    <td style="border: #000000 1px solid;" >&nbsp;<?=$rs1["useful"]?></td>
	<td align="center" style="border: #000000 1px solid;" ><a href="#" onClick="javascript:popup('sample_13.php?u_id=<?=$rs1["u_id"]?>&tab=edit','',450,300);"><img src="images/Modify.png" border="0" /></a></td>
    <td align="center" style="border: #000000 1px solid;" >&nbsp;<a  href="?del=del1&use_id=<?=$rs1["u_id"]?>&c_id=<?=$c_id?>" onClick="return godel();"><img src="images/Delete.png" border="0" /></a></td>
  </tr>
  <? 
  	$i++;
  }?>
</table></td>
  </tr>      
        </table>
</td>
</tr>

</table>
<br />
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
?><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  

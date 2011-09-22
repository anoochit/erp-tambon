<?
include('config.inc.php');

if($Go <> ''){
			$query="select *  from work where user_id  ='$user_id' ";
				$result=mysql_query($query);
				while($d =mysql_fetch_array($result)){
						$sql_status= "UPDATE work SET w_status = 1  where user_id ='$user_id' ";
						echo $sql_status."<br>";
						$result_status = mysql_query($sql_status);
				}
			if($year1<>'') $start_work = ($year1-543)."-".$month1."-".$date1;
			if($year2<>'') $date_command = ($year2-543)."-".$month2."-".$date2;
		$sql = "INSERT INTO work (user_id,div_id, sub_id, per_id  ,class,pay,pay_live,pay_special,pay_posi,remark,
		start_work , cat_id , type_id , position , pay_child , place , command ,date_command ) 
		VALUES('$user_id','$div_id' , '$sub_id' ,  '".trim($per_id)."'  ,'$class','$pay','$pay_live','$pay_special','$pay_posi','$remark' ,'".$start_work."','$cat_id','$type_id','$position', '$pay_child' , '$place' , '$command' ,'$date_command' )";
		
		echo $sql."<br>";
		$result= mysql_query($sql);
		
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>   
		<?
}
if($Go_1 <> ''){
		if($year1<>'') $start_work = ($year1-543)."-".$month1."-".$date1;
		if($year2<>'') $date_command = ($year2-543)."-".$month2."-".$date2;
		$sql_order = "UPDATE work SET div_id ='$div_id'  , sub_id = '$sub_id' , 
		 per_id= '".trim($per_id)."'  , class ='$class' ,
		pay ='$pay' ,pay_live = '$pay_live',pay_special = '$pay_special',pay_posi = '$pay_posi',remark ='$remark' ,
		cat_id = '$cat_id', type_id = '$type_id'   ,start_work ='".
		 $start_work."' , div_id ='$div_id'  , sub_id = '$sub_id' , pos_id = '$pos_id' , per_id= '".trim($per_id)."'  ,position ='$position',pay_child ='$pay_child'
		  , place = '$place' , command = '$command' ,date_command = '$date_command'
		where w_id ='$w_id' ";
		echo $sql_order."<br>";
		$result_open = mysql_query($sql_order);
		
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 
		
		<?
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style2.css">
<script language="JavaScript" src="calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<style type="text/css">
<!--
.style2 {
	font-size: 12;
	font-family: Tahoma;
}
.style5 {font-size: 12px; font-family: Tahoma; }
.style6 {font-family: Tahoma}
-->
</style>
<script language="javascript">
// เริ่ม XmlHttp Object
function uzXmlHttp(){
var xmlhttp = false;
try{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
try{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}catch(e){
xmlhttp = false;
}
}

if(!xmlhttp && document.createElement){
xmlhttp = new XMLHttpRequest();
}
return xmlhttp;
}
function result1(){
		var num1 =document.f22.div_id.value;
		var num2 =document.f22.pos_id.value;
		var url = 'ajax_1.php?num1=' + num1+'&num2='+num2; 
		xmlhttp = uzXmlHttp();
		xmlhttp.open("GET", url, false);
		xmlhttp.send(null); 
		result = xmlhttp.responseText;
 		p =result.split(',')

		document.f22.per_id1.value  = p[0];
		document.f22.per_id.value  = p[1];
	}


</script>
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<body>
<br><center>
<font face="MS Sans Serif" color="red"><span style="font-size:11pt;" >* ใส่เครื่องหมาย < dd > เพื่อย่อหน้าใหม่ < br > เพื่อนขึ้นบันทัดใหม่<br>
</span></font>
</center>
<form action="" method="post" name="f22" >
<? if($action=='add'){?>

<input type="hidden" name="user_id" value="<?=$user_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; เพิ่ม ข้อมูลการทำงาน</td>
  			</tr>
			
			<tr>
			<td  ><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
		  <tr class="tbETitle_1">
        <td width="387" class="style5"  rowspan="2">&nbsp;คำสั่ง</td>
        <td width="899" height="30" ><div class="style5"> เลขที่ <input type="text" name="command" size="25"> &nbsp;&nbsp;</div>
       </td>
      </tr>
	  
	  <tr class="tbETitle_1">
       
        <td width="899" height="30" ><div class="style5"> ลงวันที่ 
            <select name="date2" id="date2">
          <option value=1 selected>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
          <option value=6>6</option>
          <option value=7>7</option>
          <option value=8>8</option>
          <option value=9>9</option>
          <option value=10>10</option>
          <option value=11>11</option>
          <option value=12>12</option>
          <option value=13>13</option>
          <option value=14>14</option>
          <option value=15>15</option>
          <option value=16>16</option>
          <option value=17>17</option>
          <option value=18>18</option>
          <option value=19>19</option>
          <option value=20>20</option>
          <option value=21>21</option>
          <option value=22>22</option>
          <option value=23>23</option>
          <option value=24>24</option>
          <option value=25>25</option>
          <option value=26>26</option>
          <option value=27>27</option>
          <option value=28>28</option>
          <option value=29>29</option>
          <option value=30>30</option>
          <option value=31>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month2" id="month2">
          <option value="01" selected>มกราคม</option>
          <option value=02>กุมภาพันธ์</option>
          <option value=03>มีนาคม</option>
          <option value=04>เมษายน</option>
          <option value=05>พฤษภาคม</option>
          <option value=06>มิถุนายน</option>
          <option value=07>กรกฎาคม</option>
          <option value=08>สิงหาคม</option>
          <option value=09>กันยายน</option>
          <option value=10>ตุลาคม</option>
          <option value=11>พฤศจิกายน</option>
          <option value=12>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year2" type="text" id="year2" size="5"></div></td>
      </tr>
	  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
		<tr class="tbETitle_1">
        <td width="387" class="style5" >&nbsp;วันที่เริ่มงาน</td>
        <td width="899" height="30" ><div class="style5">วันที่ 
        <select name="date1" id="date1">
          <option value=1 selected>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
          <option value=6>6</option>
          <option value=7>7</option>
          <option value=8>8</option>
          <option value=9>9</option>
          <option value=10>10</option>
          <option value=11>11</option>
          <option value=12>12</option>
          <option value=13>13</option>
          <option value=14>14</option>
          <option value=15>15</option>
          <option value=16>16</option>
          <option value=17>17</option>
          <option value=18>18</option>
          <option value=19>19</option>
          <option value=20>20</option>
          <option value=21>21</option>
          <option value=22>22</option>
          <option value=23>23</option>
          <option value=24>24</option>
          <option value=25>25</option>
          <option value=26>26</option>
          <option value=27>27</option>
          <option value=28>28</option>
          <option value=29>29</option>
          <option value=30>30</option>
          <option value=31>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month1" id="month1">
          <option value="01" selected>มกราคม</option>
          <option value=02>กุมภาพันธ์</option>
          <option value=03>มีนาคม</option>
          <option value=04>เมษายน</option>
          <option value=05>พฤษภาคม</option>
          <option value=06>มิถุนายน</option>
          <option value=07>กรกฎาคม</option>
          <option value=08>สิงหาคม</option>
          <option value=09>กันยายน</option>
          <option value=10>ตุลาคม</option>
          <option value=11>พฤศจิกายน</option>
          <option value=12>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year1" type="text" id="year1" size="5"></div></td>
      </tr>
	  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	  <tr class="tbETitle_1">
	<td width="387"  class="style5" >&nbsp;สังกัด</td>
	<td><div class="style2">
	<input type="text" name="place" size="40"></div>	</td>
</tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
			<tr class="tbETitle_1">
	<td width="387"  class="style5" >&nbsp;กอง /ส่วน </td>
	<td class="tbETitle_1"><div class="style2">
	<select name="div_id"  onchange="dochange('sub_div_1', this.value);">
<?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?><option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
?>
  <option value="<? echo $d[div_id];?>"
		<?
		if($div_id == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select> <input   type="submit" name="add_div"  value="เพิ่มกอง" onClick="MM_openBrWindow('add_div.php?action=add','','resizable=yes,width=350,height=250')"> <br>
เพิ่มข้อมูลย้อนหลัง ไม่ต้องเพิ่ม กอง  ค่ะ</div>	</td>
</tr>
<tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	<tr class="tbETitle_1">
	<td width="387"  class="style5" >&nbsp;ฝ่าย / งาน	</td>
	<td>
	<table width="100%" border="0">
  <tr class="tbETitle_1">
    <td width="42%"><div id="sub_div_1"    ><?
	if($div_id <>''){
			      $query  ="select *  from division d,subdivision s
        where  1 = 1 and d.div_id = s.div_id
        and d.div_id like '%$div_id%' 
		group by s.sub_name
        order by s.sub_id ";
		 $result = mysql_query($query);
          echo "<select name='sub_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[sub_id]' ";
		if($sub_id ==   $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select>\n";  
}else{
	 ?>
	 <select name='sub_id' >
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select>
<? }?>	  </div></td>
    <td width="58%"  class="style2">&nbsp;
      <input   type="submit" name="add_sub"  value="เพิ่มฝ่าย" onClick="MM_openBrWindow('add_div.php?action=sub_add','','resizable=yes,width=350,height=250')">
	   <br>
เพิ่มข้อมูลย้อนหลัง ไม่ต้องเพิ่ม ฝ่าย  ค่ะ </td>
  </tr>
</table>
</td>
</tr>
<tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
			<tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;ตำแหน่ง</td>
    <td width="899" class="style5" ><div >
           		 <input type="text" name="position" size="30">
				 </div></td>
				 </tr>
				 <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
			    <tr>
				 <td width="387" class="style5" >&nbsp;เลขที่ตำแหน่ง				  </td>
				 <td width="899" class="style5" ><div > 
			      <input type="text" name="per_id" size="30"></div></td>
  </tr>
<tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
	<td width="387"  class="style5" >&nbsp;ประเภท </td>
	<td><div class="style2">
	<?
			$query="select *  from category order by cat_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
?><select name="cat_id"  onchange="dochange('cat_1', this.value);">
<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
				
?>
  <option value="<? echo $d[cat_id];?>"
		<?
		if($cat_id == $d[cat_id] ) echo "selected";
		?>
		><? echo $d[cat_name];?></option>
  <? }?>
</select> <input   type="submit" name="add_cat"  value="เพิ่มประเภท" onClick="MM_openBrWindow('add_cat.php?action=add','','resizable=yes,width=350,height=200')"></div>	</td>
</tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	<tr class="tbETitle_1">
	<td width="387"  class="style5" >&nbsp;ระดับ / หมวด</td>
	<td>
	<table width="100%" border="0">
  <tr>
    <td width="43%">
	<div id="cat_1" ><?
	if($cat_id <>''){
		 $query  ="select *  from type
        where  cat_id like '%$cat_id%' 
		group by type_name
        order by type_id";
		 $result = mysql_query($query);
          echo "<select name='type_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
          while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[type_id]' ";
		if($type_id ==   $fetcharr['type_id'] ) echo "selected";
			    echo " >$fetcharr[type_name]</option> \n" ;
          }
		 echo "</select></font>\n";  
}else{
	 ?>
	<select name='type_id' >
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select> 
	 <? }?>
		</div></td>
    <td width="57%">&nbsp;
      <input   type="submit" name="add_type"  value="เพิ่มระดับ / หมวด" onClick="MM_openBrWindow('add_cat.php?action=sub_add','','resizable=yes,width=350,height=250')"></td>
  </tr>
</table>
</td>
</tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  	<tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;เงินเดือน</td>
    <td width="899"><div class="style2"><input name="pay" type="text"  size="10"  value="" onKeyDown="document.onkeydown=check_number"/>
                  &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  	<tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;ค่าครองชีพชั่วคราว</td>
    <td width="899"><div class="style2"><input name="pay_live" type="text"  size="10"  value="" onKeyDown="document.onkeydown=check_number"/>
                  &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  	<tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;ค่าตอบแทนพิเศษ</td>
    <td width="899"><div class="style2"><input name="pay_special" type="text"  size="10"  value="" onKeyDown="document.onkeydown=check_number"/>
                  &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;เงินประจำตำแหน่ง</td>
    <td width="899"><div class="style2"><input name="pay_posi" type="text"  size="10"  value="" onKeyDown="document.onkeydown=check_number"/>
                  &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;เงินค่าเล่าเรียนบุตร</td>
    <td width="899"><div class="style2"><input name="pay_child" type="text"  size="10"  value="" onKeyDown="document.onkeydown=check_number"/>
                  &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td><span class="style5">&nbsp;หมายเหตุ</span></td>
    <td><div class="style6"><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr><td colspan="4" align="center" height="35"><span class="style6">
    <!--clsControlObject('f','write'); id="btnSub"  -->
    <input   type="submit" name="Go" value=" บันทึก " onClick="return godel();" >
&nbsp;&nbsp;
  </span></td>
  </tr>      
            </table></td>
			</tr>
		</table>
	</td>
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>
<? }elseif($action=='edit'){?>


<?

$sql = "SELECT * FROM work WHERE w_id= $w_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?>
<input type="hidden" name="w_id" value="<?=$w_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; แก้ไข ข้อมูลการทำงาน</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
		    <tr class="tbETitle_1">
        <td width="387" class="style5"  rowspan="2">&nbsp;คำสั่ง</td>
        <td width="899" height="30" ><div class="style5"> เลขที่ <input type="text" name="command"  value="<?=$rs[command]?>"size="25"> &nbsp;&nbsp;</div>
</td>
      </tr>
	  
	  <tr class="tbETitle_1">
       
        <td width="899" height="30" ><div class="style5"> ลงวันที่ 
          <?  if($rs[date_command] <>'0000-00-00') $j2 = explode("-",$rs[date_command]); ?>วันที่ 
        <select name="date2" id="date2">
          <option value=1 <? if($j2[2] =='1') echo "selected"?> >1</option>
          <option value=2 <? if($j2[2] =='2') echo "selected"?>>2</option>
          <option value=3 <? if($j2[2] =='3') echo "selected"?>>3</option>
          <option value=4 <? if($j2[2] =='4') echo "selected"?>>4</option>
          <option value=5 <? if($j2[2] =='5') echo "selected"?>>5</option>
          <option value=6 <? if($j2[2] =='6') echo "selected"?>>6</option>
          <option value=7 <? if($j2[2] =='7') echo "selected"?>>7</option>
          <option value=8 <? if($j2[2] =='8') echo "selected"?>>8</option>
          <option value=9 <? if($j2[2] =='9') echo "selected"?>>9</option>
          <option value=10 <? if($j2[2] =='10') echo "selected"?>>10</option>
          <option value=11 <? if($j2[2] =='11') echo "selected"?>>11</option>
          <option value=12 <? if($j2[2] =='12') echo "selected"?>>12</option>
          <option value=13 <? if($j2[2] =='13') echo "selected"?>>13</option>
          <option value=14 <? if($j2[2] =='14') echo "selected"?>>14</option>
          <option value=15 <? if($j2[2] =='15') echo "selected"?>>15</option>
          <option value=16 <? if($j2[2] =='16') echo "selected"?>>16</option>
          <option value=17 <? if($j2[2] =='17') echo "selected"?>>17</option>
          <option value=18 <? if($j2[2] =='18') echo "selected"?>>18</option>
          <option value=19 <? if($j2[2] =='19') echo "selected"?>>19</option>
          <option value=20 <? if($j2[2] =='20') echo "selected"?>>20</option>
          <option value=21 <? if($j2[2] =='21') echo "selected"?>>21</option>
          <option value=22 <? if($j2[2] =='22') echo "selected"?>>22</option>
          <option value=23 <? if($j2[2] =='23') echo "selected"?>>23</option>
          <option value=24 <? if($j2[2] =='24') echo "selected"?>>24</option>
          <option value=25 <? if($j2[2] =='25') echo "selected"?>>25</option>
          <option value=26 <? if($j2[2] =='26') echo "selected"?>>26</option>
          <option value=27 <? if($j2[2] =='27') echo "selected"?>>27</option>
          <option value=28 <? if($j2[2] =='28') echo "selected"?>>28</option>
          <option value=29 <? if($j2[2] =='29') echo "selected"?>>29</option>
          <option value=30 <? if($j2[2] =='30') echo "selected"?>>30</option>
          <option value=31 <? if($j2[2] =='31') echo "selected"?>>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month2" id="month2">
          <option value="01" <? if($j2[1] =='01') echo "selected"?>>มกราคม</option>
          <option value=02  <? if($j2[1] =='02') echo "selected"?>>กุมภาพันธ์</option>
          <option value=03  <? if($j2[1] =='03') echo "selected"?>>มีนาคม</option>
          <option value=04  <? if($j2[1] =='04') echo "selected"?>>เมษายน</option>
          <option value=05  <? if($j2[1] =='05') echo "selected"?>>พฤษภาคม</option>
          <option value=06  <? if($j2[1] =='06') echo "selected"?>>มิถุนายน</option>
          <option value=07  <? if($j2[1] =='07') echo "selected"?>>กรกฎาคม</option>
          <option value=08  <? if($j2[1] =='08') echo "selected"?>>สิงหาคม</option>
          <option value=09  <? if($j2[1] =='09') echo "selected"?>>กันยายน</option>
          <option value=10  <? if($j2[1] =='10') echo "selected"?>>ตุลาคม</option>
          <option value=11  <? if($j2[1] =='11') echo "selected"?>>พฤศจิกายน</option>
          <option value=12  <? if($j2[1] =='12') echo "selected"?>>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year2" type="text" id="year2" size="5" value="<? if($j2[0] <>'') echo $j2[0]+543?>"></div></td>
      </tr>
	  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
		<tr class="tbETitle_1">
        <td width="288" class="style5" >&nbsp;วันที่เริ่มงาน</td>
        <td width="642" height="30"><div align="left">  <?  if($rs[start_work] <>'0000-00-00') $j1 = explode("-",$rs[start_work]); ?>วันที่ 
        <select name="date1" id="date1">
          <option value=1 <? if($j1[2] =='1') echo "selected"?> >1</option>
          <option value=2 <? if($j1[2] =='2') echo "selected"?>>2</option>
          <option value=3 <? if($j1[2] =='3') echo "selected"?>>3</option>
          <option value=4 <? if($j1[2] =='4') echo "selected"?>>4</option>
          <option value=5 <? if($j1[2] =='5') echo "selected"?>>5</option>
          <option value=6 <? if($j1[2] =='6') echo "selected"?>>6</option>
          <option value=7 <? if($j1[2] =='7') echo "selected"?>>7</option>
          <option value=8 <? if($j1[2] =='8') echo "selected"?>>8</option>
          <option value=9 <? if($j1[2] =='9') echo "selected"?>>9</option>
          <option value=10 <? if($j1[2] =='10') echo "selected"?>>10</option>
          <option value=11 <? if($j1[2] =='11') echo "selected"?>>11</option>
          <option value=12 <? if($j1[2] =='12') echo "selected"?>>12</option>
          <option value=13 <? if($j1[2] =='13') echo "selected"?>>13</option>
          <option value=14 <? if($j1[2] =='14') echo "selected"?>>14</option>
          <option value=15 <? if($j1[2] =='15') echo "selected"?>>15</option>
          <option value=16 <? if($j1[2] =='16') echo "selected"?>>16</option>
          <option value=17 <? if($j1[2] =='17') echo "selected"?>>17</option>
          <option value=18 <? if($j1[2] =='18') echo "selected"?>>18</option>
          <option value=19 <? if($j1[2] =='19') echo "selected"?>>19</option>
          <option value=20 <? if($j1[2] =='20') echo "selected"?>>20</option>
          <option value=21 <? if($j1[2] =='21') echo "selected"?>>21</option>
          <option value=22 <? if($j1[2] =='22') echo "selected"?>>22</option>
          <option value=23 <? if($j1[2] =='23') echo "selected"?>>23</option>
          <option value=24 <? if($j1[2] =='24') echo "selected"?>>24</option>
          <option value=25 <? if($j1[2] =='25') echo "selected"?>>25</option>
          <option value=26 <? if($j1[2] =='26') echo "selected"?>>26</option>
          <option value=27 <? if($j1[2] =='27') echo "selected"?>>27</option>
          <option value=28 <? if($j1[2] =='28') echo "selected"?>>28</option>
          <option value=29 <? if($j1[2] =='29') echo "selected"?>>29</option>
          <option value=30 <? if($j1[2] =='30') echo "selected"?>>30</option>
          <option value=31 <? if($j1[2] =='31') echo "selected"?>>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month1" id="month1">
          <option value="01" <? if($j1[1] =='01') echo "selected"?>>มกราคม</option>
          <option value=02  <? if($j1[1] =='02') echo "selected"?>>กุมภาพันธ์</option>
          <option value=03  <? if($j1[1] =='03') echo "selected"?>>มีนาคม</option>
          <option value=04  <? if($j1[1] =='04') echo "selected"?>>เมษายน</option>
          <option value=05  <? if($j1[1] =='05') echo "selected"?>>พฤษภาคม</option>
          <option value=06  <? if($j1[1] =='06') echo "selected"?>>มิถุนายน</option>
          <option value=07  <? if($j1[1] =='07') echo "selected"?>>กรกฎาคม</option>
          <option value=08  <? if($j1[1] =='08') echo "selected"?>>สิงหาคม</option>
          <option value=09  <? if($j1[1] =='09') echo "selected"?>>กันยายน</option>
          <option value=10  <? if($j1[1] =='10') echo "selected"?>>ตุลาคม</option>
          <option value=11  <? if($j1[1] =='11') echo "selected"?>>พฤศจิกายน</option>
          <option value=12  <? if($j1[1] =='12') echo "selected"?>>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year1" type="text" id="year1" size="5" value="<? if($j1[0] <>'') echo $j1[0]+543?>"><</div></td>
      </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	  <tr class="tbETitle_1">
	<td width="270"  class="style5" >&nbsp;สังกัด</td>
	<td><div class="style2">
	<input type="text" name="place"  value="<?=$rs[place]?>"size="40"></div>	</td>
</tr>
<tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
			<tr class="tbETitle_1">
	<td width="288"  class="style5" >&nbsp;กอง / ส่วน </td>
	<td><div class="style2">
	<?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?><select name="div_id"  onchange="dochange('sub_div_1', this.value);">
<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
?>
  <option value="<? echo $d[div_id];?>"
		<?
		if($rs['div_id']== $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select> <input   type="submit" name="add_div"  value="เพิ่มกอง" onClick="MM_openBrWindow('add_div.php?action=add','','resizable=yes,width=350,height=250')"></div>	</td>
</tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	<tr class="tbETitle_1">
	<td width="288"  class="style5" >&nbsp;ฝ่าย 	/ งาน</td>
	<td>  
	<table width="100%" border="0">
  <tr>
    <td width="51%"><div id="sub_div_1" >
	<?
			$query  ="select *  from division d,subdivision s
        where  1 = 1 and d.div_id = s.div_id
		and s.div_id = '$rs[div_id]'
		group by s.sub_name
        order by s.sub_id ";
		 $result = mysql_query($query);
          echo "<select name='sub_id' >";
         echo "<option value=''>กรุณาเลือกฝ่าย</option>\n";
          while($fetcharr = mysql_fetch_array($result)) { 
               $label = $fetcharr['sub_id'];
              echo "<option value=\"$label\" ";
		if($rs['sub_id']  ==  $label ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select></font>\n";  

	 ?>
		</div></td>
    <td width="49%">&nbsp;
      <input   type="submit" name="add_sub"  value="เพิ่มฝ่าย" onClick="MM_openBrWindow('add_div.php?action=sub_add','','resizable=yes,width=350,height=250')"></td>
  </tr>
</table>

	</td>
</tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
			<tr class="tbETitle_1">
   <td width="288" class="style5" >&nbsp;ตำแหน่ง</td>
    <td width="642" class="style5" ><div >
           		 <input type="text" name="position" size="30" value="<?=$rs['position']?>">
		</div></td>
		</tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
		<tr>
		<td width="288" class="style5" >&nbsp;เลขที่ในตำแหน่ง		</td>
		<td width="642" class="style5" ><div >
		<input type="text" name="per_id" size="30" value="<?=$rs['per_id']?>"></div></td>
		
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	<tr class="tbETitle_1">
	<td width="288"  class="style5" >&nbsp;ประเภท </td>
	<td><div class="style2">
	<?
			$query="select *  from category order by cat_id";
			$result=mysql_query($query);
?><select name="cat_id"  onchange="dochange('cat_1', this.value);">
<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
?>
  <option value="<? echo $d[cat_id];?>"
		<?
		if($rs['cat_id'] == $d[cat_id] ) echo "selected";
		?>
		><? echo $d[cat_name];?></option>
  <? }?>
</select> <input   type="submit" name="add_cat"  value="เพิ่มประเภท" onClick="MM_openBrWindow('add_cat.php?action=add','','resizable=yes,width=350,height=200')"></div>	</td>
</tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	<tr class="tbETitle_1">
	<td width="288"  class="style5" >&nbsp;ระดับ	</td>
	<td>  
	<table width="100%" border="0">
  <tr>
    <td width="46%"><div id="cat_1" >
	<?
			$query  ="select *  from type
        where  1 = 1 and cat_id = '$rs[cat_id]'
		group by type_name
        order by type_id ";
		 $result = mysql_query($query);
          echo "<select name='type_id' >";
         echo "<option value=''>กรุณาเลือกฝ่าย</option>\n";
          while($fetcharr = mysql_fetch_array($result)) { 
               $label = $fetcharr['type_id'];
              echo "<option value=\"$label\" ";
		if($rs['type_id']  ==  $label ) echo "selected";
			    echo " >$fetcharr[type_name]</option> \n" ;
          }
		 echo "</select></font>\n";  
	 ?>
		</div></td>
    <td width="54%">&nbsp;
      <input   type="submit" name="add_type"  value="เพิ่มระดับ / หมวด" onClick="MM_openBrWindow('add_cat.php?action=sub_add','','resizable=yes,width=350,height=250')"></td>
  </tr>
</table>
	</td>
</tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  	<tr class="tbETitle_1">
   <td width="288" class="style5" >&nbsp;เงินเดือน</td>
    <td width="642"><div class="style2">
      <input name="pay" type="text"  size="10"   value="<?=$rs[pay]?>" onKeyDown="document.onkeydown=check_number"/>
      &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  	<tr class="tbETitle_1">
   <td width="288" class="style5" >&nbsp;ค่าครองชีพชั่วคราว</td>
    <td width="642"><div class="style2"><input name="pay_live" type="text"  size="10"   value="<?=$rs[pay_live]?>" onKeyDown="document.onkeydown=check_number"/>
                  &nbsp; </div></td>
  </tr>
  	<tr class="tbETitle_1">
   <td width="288" class="style5" >&nbsp;ค่าตอบแทนพิเศษ</td>
    <td width="642"><div class="style2"><input name="pay_special" type="text"  size="10"   value="<?=$rs[pay_special]?>" onKeyDown="document.onkeydown=check_number"/>
                  &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td width="288" class="style5" >&nbsp;เงินประจำตำแหน่ง</td>
    <td width="642"><div class="style2"><input name="pay_posi" type="text"  size="10"  value="<?=$rs[pay_posi]?>" onKeyDown="document.onkeydown=check_number"/>
                  &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td width="288" class="style5" >&nbsp;เงินค่าเล่าเรียนบุตร</td>
    <td width="642"><div class="style2"><input name="pay_child" type="text"  size="10"  value="<?=$rs[pay_child]?>" onKeyDown="document.onkeydown=check_number"/>
                  &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td><span class="style5">&nbsp;หมายเหตุ</span></td>
    <td><div class="style6"><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr><td colspan="4" align="center" height="35"><span class="style6">
    <input   type="submit" name="Go_1" value=" บันทึก " onClick="return godel_1();" >
&nbsp;&nbsp;
  </span></td>
  </tr>      
            </table></td>
			</tr>
			
		</table>

	</td>

   
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>

<? }?>
</form> 
</body>
</html>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
window.open(theURL,winName,features);
}
//-->
</script>

<script language="javascript">

function godel()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("คุณต้องการบันทึกข้อมูลที่แก้ไข ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>

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
			if($year3<>'') $confirm_date = ($year3-543)."-".$month3."-".$date3; // วันที่ กกต รับรอง
			if($year4<>'') $end_work = ($year4-543)."-".$month4."-".$date4; // วันที่ ครบวาระ
		$sql = "INSERT INTO work (user_id,pay,pay_live,pay_special,pay_posi,remark, start_work , position , pay_child , place , command ,date_command , confirm_date , end_work , pay_month  ) 
		VALUES('$user_id', '$pay','$pay_live','$pay_special','$pay_posi','$remark' ,'".$start_work."','$position', '$pay_child' , '$place' , '$command' ,'$date_command' , '$confirm_date' , '$end_work' , '$pay_month' )";
		
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
			if($year3<>'') $confirm_date = ($year3-543)."-".$month3."-".$date3; // วันที่ กกต รับรอง
			if($year4<>'') $end_work = ($year4-543)."-".$month4."-".$date4; // วันที่ ครบวาระ
		$sql_order = "UPDATE work SET pay  ='$pay' ,pay_live = '$pay_live' ,pay_special = '$pay_special',pay_posi ='$pay_posi' ,remark = '$remark' , start_work ='".$start_work."'  , position = '$position' , pay_child  ='$pay_child' , 
		place = '$place' , command = '$command',date_command =  '$date_command', confirm_date = '$confirm_date', end_work = '$end_work'  , pay_month ='$pay_month'  
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
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; เพิ่ม ข้อมูลการดำรงตำแหน่ง</td>
  			</tr>
			
			<tr>
			<td  ><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">

		<tr class="tbETitle_1">
        <td width="387" class="style5" >&nbsp;วันที่ได้รับการเลือกตั้ง</td>
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
        <td width="387" class="style5" >&nbsp;วันที่ กกต รับรอง</td>
        <td width="899" height="30" ><div class="style5">วันที่ 
        <select name="date3" id="date3">
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
        <select name="month3" id="month3">
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
        <input name="year3" type="text" id="year3" size="5"></div></td>
      </tr>
	  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	  <tr class="tbETitle_1">
        <td width="387" class="style5" >&nbsp;วันที่ ครบ วาระ</td>
        <td width="899" height="30" ><div class="style5">วันที่ 
        <select name="date4" id="date4">
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
        <select name="month4" id="month4">
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
        <input name="year4" type="text" id="year4" size="5"></div></td>
      </tr>
<tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
			<tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;ตำแหน่ง</td>
    <td width="899" class="style5" ><div >
           		 <input type="text" name="position" size="30" >
				 </div></td>
				 </tr>
				 <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  
		  <tr class="tbETitle_1">
        <td width="387" class="style5"  rowspan="2">&nbsp;โดยวิธีการ</td>
        <td width="899" height="30" ><div class="style5"> ตามคำสั่งเลขที่ 
          <input type="text" name="command" size="25"> 
          &nbsp;&nbsp;</div>    </td>
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
   <td width="387" class="style5" >&nbsp;เงินเดือน</td>
    <td width="899"><div class="style2"><input name="pay" type="text"  size="10"  value=""/>
                  &nbsp; </div></td>
  </tr>
  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;ค่าประจำตำแหน่ง</td>
    <td width="899"><div class="style2"><input name="pay_posi" type="text"  size="10"  value=""/>
                  &nbsp; </div></td>
  </tr>
  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;ค่าตอบแทนรายเดือน</td>
    <td width="899"><div class="style2"><input name="pay_month" type="text"  size="10"  value=""/>
                  &nbsp; </div></td>
  </tr>
  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  	<tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;ค่าครองชีพชั่วคราว</td>
    <td width="899"><div class="style2"><input name="pay_live" type="text"  size="10"  value=""/>
                  &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  	<tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;ค่าตอบแทนพิเศษ</td>
    <td width="899"><div class="style2"><input name="pay_special" type="text"  size="10"  value=""/>
                  &nbsp; </div></td>
  </tr>
  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;เงินค่าเล่าเรียนบุตร</td>
    <td width="899"><div class="style2"><input name="pay_child" type="text"  size="10"  value=""/>
                  &nbsp; </div></td>
  </tr>
	  
	  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	  
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
        <td width="288" class="style5" >&nbsp;วันที่ได้รับการเลือกตั้ง</td>
        <td width="642" height="30" class="style5" ><div align="left">  <?  if($rs[start_work] <>'0000-00-00') $j1 = explode("-",$rs[start_work]); ?>วันที่ 
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
        <input name="year1" type="text" id="year1" size="5" value="<? if($j1[0] <>'') echo $j1[0]+543?>"></div></td>
      </tr>
	  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	  
	  <tr class="tbETitle_1">
        <td width="387" class="style5" >&nbsp;วันที่ กกต รับรอง</td>
        <td width="899" height="30" ><div class="style5"> <?  if($rs[confirm_date] <>'0000-00-00') $j3 = explode("-",$rs[confirm_date]); ?>วันที่ 
        <select name="date3" id="date3">
          <option value=1 <? if($j3[2] =='1') echo "selected"?> >1</option>
          <option value=2 <? if($j3[2] =='2') echo "selected"?>>2</option>
          <option value=3 <? if($j3[2] =='3') echo "selected"?>>3</option>
          <option value=4 <? if($j3[2] =='4') echo "selected"?>>4</option>
          <option value=5 <? if($j3[2] =='5') echo "selected"?>>5</option>
          <option value=6 <? if($j3[2] =='6') echo "selected"?>>6</option>
          <option value=7 <? if($j3[2] =='7') echo "selected"?>>7</option>
          <option value=8 <? if($j3[2] =='8') echo "selected"?>>8</option>
          <option value=9 <? if($j3[2] =='9') echo "selected"?>>9</option>
          <option value=10 <? if($j3[2] =='10') echo "selected"?>>10</option>
          <option value=11 <? if($j3[2] =='11') echo "selected"?>>11</option>
          <option value=12 <? if($j3[2] =='12') echo "selected"?>>12</option>
          <option value=13 <? if($j3[2] =='13') echo "selected"?>>13</option>
          <option value=14 <? if($j3[2] =='14') echo "selected"?>>14</option>
          <option value=15 <? if($j3[2] =='15') echo "selected"?>>15</option>
          <option value=16 <? if($j3[2] =='16') echo "selected"?>>16</option>
          <option value=17 <? if($j3[2] =='17') echo "selected"?>>17</option>
          <option value=18 <? if($j3[2] =='18') echo "selected"?>>18</option>
          <option value=19 <? if($j3[2] =='19') echo "selected"?>>19</option>
          <option value=20 <? if($j3[2] =='20') echo "selected"?>>20</option>
          <option value=21 <? if($j3[2] =='21') echo "selected"?>>21</option>
          <option value=22 <? if($j3[2] =='22') echo "selected"?>>22</option>
          <option value=23 <? if($j3[2] =='23') echo "selected"?>>23</option>
          <option value=24 <? if($j3[2] =='24') echo "selected"?>>24</option>
          <option value=25 <? if($j3[2] =='25') echo "selected"?>>25</option>
          <option value=26 <? if($j3[2] =='26') echo "selected"?>>26</option>
          <option value=27 <? if($j3[2] =='27') echo "selected"?>>27</option>
          <option value=28 <? if($j3[2] =='28') echo "selected"?>>28</option>
          <option value=29 <? if($j3[2] =='29') echo "selected"?>>29</option>
          <option value=30 <? if($j3[2] =='30') echo "selected"?>>30</option>
          <option value=31 <? if($j3[2] =='31') echo "selected"?>>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month3" id="month3">
          <option value="01" <? if($j3[1] =='01') echo "selected"?>>มกราคม</option>
          <option value=02  <? if($j3[1] =='02') echo "selected"?>>กุมภาพันธ์</option>
          <option value=03  <? if($j3[1] =='03') echo "selected"?>>มีนาคม</option>
          <option value=04  <? if($j3[1] =='04') echo "selected"?>>เมษายน</option>
          <option value=05  <? if($j3[1] =='05') echo "selected"?>>พฤษภาคม</option>
          <option value=06  <? if($j3[1] =='06') echo "selected"?>>มิถุนายน</option>
          <option value=07  <? if($j3[1] =='07') echo "selected"?>>กรกฎาคม</option>
          <option value=08  <? if($j3[1] =='08') echo "selected"?>>สิงหาคม</option>
          <option value=09  <? if($j3[1] =='09') echo "selected"?>>กันยายน</option>
          <option value=10  <? if($j3[1] =='10') echo "selected"?>>ตุลาคม</option>
          <option value=11  <? if($j3[1] =='11') echo "selected"?>>พฤศจิกายน</option>
          <option value=12  <? if($j3[1] =='12') echo "selected"?>>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year3" type="text" id="year3" size="5" value="<? if($j3[0] <>'') echo $j3[0]+543?>"></div></td>
      </tr>
	  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
	  <tr class="tbETitle_1">
        <td width="387" class="style5" >&nbsp;วันที่ ครบ วาระ</td>
        <td width="899" height="30" ><div class="style5"> <?  if($rs[end_work] <>'0000-00-00') $j4 = explode("-",$rs[end_work]); ?>วันที่ 
        <select name="date4" id="date4">
          <option value=1 <? if($j4[2] =='1') echo "selected"?> >1</option>
          <option value=2 <? if($j4[2] =='2') echo "selected"?>>2</option>
          <option value=3 <? if($j4[2] =='3') echo "selected"?>>3</option>
          <option value=4 <? if($j4[2] =='4') echo "selected"?>>4</option>
          <option value=5 <? if($j4[2] =='5') echo "selected"?>>5</option>
          <option value=6 <? if($j4[2] =='6') echo "selected"?>>6</option>
          <option value=7 <? if($j4[2] =='7') echo "selected"?>>7</option>
          <option value=8 <? if($j4[2] =='8') echo "selected"?>>8</option>
          <option value=9 <? if($j4[2] =='9') echo "selected"?>>9</option>
          <option value=10 <? if($j4[2] =='10') echo "selected"?>>10</option>
          <option value=11 <? if($j4[2] =='11') echo "selected"?>>11</option>
          <option value=12 <? if($j4[2] =='12') echo "selected"?>>12</option>
          <option value=13 <? if($j4[2] =='13') echo "selected"?>>13</option>
          <option value=14 <? if($j4[2] =='14') echo "selected"?>>14</option>
          <option value=15 <? if($j4[2] =='15') echo "selected"?>>15</option>
          <option value=16 <? if($j4[2] =='16') echo "selected"?>>16</option>
          <option value=17 <? if($j4[2] =='17') echo "selected"?>>17</option>
          <option value=18 <? if($j4[2] =='18') echo "selected"?>>18</option>
          <option value=19 <? if($j4[2] =='19') echo "selected"?>>19</option>
          <option value=20 <? if($j4[2] =='20') echo "selected"?>>20</option>
          <option value=21 <? if($j4[2] =='21') echo "selected"?>>21</option>
          <option value=22 <? if($j4[2] =='22') echo "selected"?>>22</option>
          <option value=23 <? if($j4[2] =='23') echo "selected"?>>23</option>
          <option value=24 <? if($j4[2] =='24') echo "selected"?>>24</option>
          <option value=25 <? if($j4[2] =='25') echo "selected"?>>25</option>
          <option value=26 <? if($j4[2] =='26') echo "selected"?>>26</option>
          <option value=27 <? if($j4[2] =='27') echo "selected"?>>27</option>
          <option value=28 <? if($j4[2] =='28') echo "selected"?>>28</option>
          <option value=29 <? if($j4[2] =='29') echo "selected"?>>29</option>
          <option value=30 <? if($j4[2] =='30') echo "selected"?>>30</option>
          <option value=31 <? if($j4[2] =='31') echo "selected"?>>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month4" id="month4">
          <option value="01" <? if($j4[1] =='01') echo "selected"?>>มกราคม</option>
          <option value=02  <? if($j4[1] =='02') echo "selected"?>>กุมภาพันธ์</option>
          <option value=03  <? if($j4[1] =='03') echo "selected"?>>มีนาคม</option>
          <option value=04  <? if($j4[1] =='04') echo "selected"?>>เมษายน</option>
          <option value=05  <? if($j4[1] =='05') echo "selected"?>>พฤษภาคม</option>
          <option value=06  <? if($j4[1] =='06') echo "selected"?>>มิถุนายน</option>
          <option value=07  <? if($j4[1] =='07') echo "selected"?>>กรกฎาคม</option>
          <option value=08  <? if($j4[1] =='08') echo "selected"?>>สิงหาคม</option>
          <option value=09  <? if($j4[1] =='09') echo "selected"?>>กันยายน</option>
          <option value=10  <? if($j4[1] =='10') echo "selected"?>>ตุลาคม</option>
          <option value=11  <? if($j4[1] =='11') echo "selected"?>>พฤศจิกายน</option>
          <option value=12  <? if($j4[1] =='12') echo "selected"?>>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year4" type="text" id="year4" size="5" value="<? if($j4[0] <>'') echo $j4[0]+543?>"></div></td>
      </tr>
	  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
			<tr class="tbETitle_1">
   <td width="288" class="style5" >&nbsp;ตำแหน่ง</td>
    <td width="642" class="style5" ><div >
           		 <input type="text" name="position" size="30" value="<?=$rs['position']?>">
		</div></td>
		</tr>
		<tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
		    <tr class="tbETitle_1">
        <td width="387" class="style5"  rowspan="2">&nbsp;โดยวิธีการ</td>
        <td width="899" height="30" ><div class="style5"> ตามคำสั่งเลขที่ <input type="text" name="command"  value="<?=$rs[command]?>"size="25"> &nbsp;&nbsp;</div>
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
   <td width="288" class="style5" >&nbsp;เงินเดือน</td>
    <td width="642"><div class="style2">
      <input name="pay" type="text"  size="10"   value="<?=$rs[pay]?>"/>
      &nbsp; </div></td>
  </tr>
  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;ค่าประจำตำแหน่ง</td>
    <td width="899"><div class="style2"><input name="pay_posi" type="text"  size="10"  value="<?=$rs[pay_posi]?>"/>
                  &nbsp; </div></td>
  </tr>
  <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td width="387" class="style5" >&nbsp;ค่าตอบแทนรายเดือน</td>
    <td width="899"><div class="style2"><input name="pay_month" type="text"  size="10"  value="<?=$rs[pay_month]?>"/>
                  &nbsp; </div></td>
  </tr>
    <tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  	<tr class="tbETitle_1">
   <td width="288" class="style5" >&nbsp;ค่าครองชีพชั่วคราว</td>
    <td width="642"><div class="style2"><input name="pay_live" type="text"  size="10"   value="<?=$rs[pay_live]?>"/>
                  &nbsp; </div></td>
  </tr>
  	<tr class="tbETitle_1">
   <td width="288" class="style5" >&nbsp;ค่าตอบแทนพิเศษ</td>
    <td width="642"><div class="style2"><input name="pay_special" type="text"  size="10"   value="<?=$rs[pay_special]?>"/>
                  &nbsp; </div></td>
  </tr><tr><td  background="images/htbar.gif" height="1" colspan="2"></td></tr>
  <tr class="tbETitle_1">
   <td width="288" class="style5" >&nbsp;เงินค่าเล่าเรียนบุตร</td>
    <td width="642"><div class="style2"><input name="pay_child" type="text"  size="10"  value="<?=$rs[pay_child]?>"/>
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


<SCRIPT language=JavaScript>
    function check_number(e) {
        var key;

        if (window.event) key = window.event.keyCode; // ใช้กับ IE
        else if (e) key = e.which; // ใช้กับ Firefox
        if (key = 13 && key != 8 && key != 9 && key != 16 && key != 17 && key != 20 && key != 35 && key != 36 &&  key != 68 && (key < 46) || (key > 57) && (key < 96) ||(key > 110) && key != 116  ) {
            	return false;
        }
    }

</SCRIPT> 
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
		$sql = "INSERT INTO work (user_id,div_id, sub_id,pos_id , per_id  ,class,pay,pay_live,pay_special,pay_posi,remark,date_contain ,
		start_work , cat_id , type_id) 
		VALUES('$user_id','$div_id' , '$sub_id' , '$pos_id' , '".trim($per_id1)."'  ,'$class','$pay','$pay_live','$pay_special','$pay_posi','$remark' ,'".date_format_sql($date_contain)."' ,'".date_format_sql($start_work)."','$cat_id','$type_id'  )";
		
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

		$sql_order = "UPDATE work SET div_id ='$div_id'  , sub_id = '$sub_id' , pos_id = '$pos_id' ,
		 per_id= '".trim($per_id1)."'  , class ='$class' ,
		pay ='$pay' ,pay_live = '$pay_live',pay_special = '$pay_special',pay_posi = '$pay_posi',remark ='$remark' ,
		cat_id = '$cat_id', type_id = '$type_id'  ,date_contain = '".date_format_sql($date_contain)."' ,start_work ='".
		 date_format_sql($start_work)."' , div_id ='$div_id'  , sub_id = '$sub_id' , pos_id = '$pos_id' , per_id= '".trim($per_id1)."' 
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

<form action="" method="post" name="f22" >
<? if($action=='add'){?>
<br>
<input type="hidden" name="user_id" value="<?=$user_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; เพิ่ม ข้อมูลการทำงาน</td>
  			</tr>
			
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
			<tr  class="tbETitle_1">
        <td height="30" class="style5" >&nbsp;วันที่บรรจุ </td>
        <td width="513" height="30"><div align="left"><? if ($date=='') $date=$now; ?><input type="text" name="date_contain" value="<?php echo $date_contain; ?>"  size="10" />
          &nbsp;<img src='images/calendar.gif'   onClick="showCalendar('date_contain','DD/MM/YYYY')"  width='19'  height='19' /></div></td>
		  </tr>
		<tr class="tbETitle_1">
        <td width="225" class="style5" >&nbsp;วันที่เริ่มงาน</td>
        <td width="513" height="30"><div align="left"><? if ($date=='') $date=$now; ?><input type="text" name="start_work" value="<?php echo $start_work; ?>"  size="10" />
          &nbsp;<img src='images/calendar.gif'  onClick="showCalendar('start_work','DD/MM/YYYY')"  width='19'  height='19' /></div></td>
      </tr>
			<tr class="tbETitle_1">
	<td width="225"  class="style5" >&nbsp;กอง  </td>
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
		if($div_id == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select></div>	</td>
</tr><tr>
	<tr class="tbETitle_1">
	<td width="225"  class="style5" >&nbsp;ฝ่าย 	</td>
	<td><div id="sub_div_1" >
	<select name='sub_id' >
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select><?
			
	 ?>
		</div></td>
</tr>
			<tr class="tbETitle_1">
   <td width="225" class="style5" >&nbsp;ตำแหน่ง</td>
    <td width="513" class="style5" ><div ><?
			$query="select *  from  ps_position_ref  where 1=1 ";
			$query .= " order by ps_posid ";
			$result=mysql_query($query);
			?>
			<select name="pos_id"  onchange="result1();">
			<option value="" >-----เลือกตำแหน่ง -----</option>
              <?
			while($d =mysql_fetch_array($result)){
				
	?>
              <option value="<? echo $d[ps_posid];?>"
		<?
		if($pos_id == $d[ps_posid]) echo "selected";
		?>
		><? echo $d[ps_positem];?></option>
              <? }?>
			
            </select>
          
                  &nbsp; <br>
				  เลขที่ในตำแหน่ง <input type="text" name="per_id1" size="10"></div></td>
  </tr>


  <tr class="tbETitle_1">
	<td width="225"  class="style5" >&nbsp;ประเภท </td>
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
</select></div>	</td>
</tr><tr>
	<tr class="tbETitle_1">
	<td width="225"  class="style5" >&nbsp;ระดับ	</td>
	<td><div id="cat_1" >
	<select name='type_id' >
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select><?
			
	 ?>
		</div></td>
</tr>
  	<tr class="tbETitle_1">
   <td width="225" class="style5" >&nbsp;เงินเดือน</td>
    <td width="513"><div class="style2"><input name="pay" type="text"  size="10"  value="" onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}"/>
                  &nbsp; </div></td>
  </tr>
  	<tr class="tbETitle_1">
   <td width="225" class="style5" >&nbsp;ค่าครองชีพชั่วคราว</td>
    <td width="513"><div class="style2"><input name="pay_live" type="text"  size="10"  value="" onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}"/>
                  &nbsp; </div></td>
  </tr>
  	<tr class="tbETitle_1">
   <td width="225" class="style5" >&nbsp;ค่าตอบแทนพิเศษ</td>
    <td width="513"><div class="style2"><input name="pay_special" type="text"  size="10"  value="" onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}"/>
                  &nbsp; </div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="225" class="style5" >&nbsp;เงินประจำตำแหน่ง</td>
    <td width="513"><div class="style2"><input name="pay_posi" type="text"  size="10"  value="" onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}"/>
                  &nbsp; </div></td>
  </tr>
  
  <tr class="tbETitle_1">
   <td><span class="style5">&nbsp;หมายเหตุ</span></td>
    <td><div class="style6"><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
  </tr>
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
?><br>
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
			<tr  class="tbETitle_1">
        <td height="30" class="style5" >&nbsp;วันที่บรรจุ </td>
        <td width="513" height="30"><div align="left"><input type="text" name="date_contain" value="<?=date_format_th($rs[date_contain])?>"  size="10" />
          &nbsp;<img src='images/calendar.gif'   onClick="showCalendar('date_contain','DD/MM/YYYY')"  width='19'  height='19' /></div></td>
		  </tr>
		<tr class="tbETitle_1">
        <td width="225" class="style5" >&nbsp;วันที่เริ่มงาน</td>
        <td width="513" height="30"><div align="left"><input type="text" name="start_work" value="<?=date_format_th($rs[start_work])?>"  size="10" />
          &nbsp;<img src='images/calendar.gif'  onClick="showCalendar('start_work','DD/MM/YYYY')"  width='19'  height='19' /></div></td>
      </tr>
			<tr class="tbETitle_1">
	<td width="142"  class="style5" >&nbsp;กอง  </td>
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
</select></div>	</td>
</tr><tr>
	<tr class="tbETitle_1">
	<td width="142"  class="style5" >&nbsp;ฝ่าย 	</td>
	<td><div id="sub_div_1" >
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
</tr>
			<tr class="tbETitle_1">
   <td width="32%" class="style5" >&nbsp;ตำแหน่ง</td>
    <td width="68%"><div class="style2"><?
			$query="select *  from  ps_position_ref  where 1=1 ";
			$query .= " order by ps_posid ";
			$result=mysql_query($query);
			?>
            <select name="pos_id"   onchange="result1();">
			<option value="" >-----เลือกตำแหน่ง -----</option>
              <?
			while($d =mysql_fetch_array($result)){
				
	?>
              <option value="<? echo $d[ps_posid];?>"
		<?
		if($rs['pos_id'] == $d[ps_posid]) echo "selected";
		?>
		><? echo $d[ps_positem];?></option>
              <? }?>
			
            </select>
                  &nbsp; <? 
			$k ='';
			for($i=0;$i<(3-strlen(trim($rs[per_id])));$i++){
			$k .="0" ;
			} ?>&nbsp;&nbsp;<input type="text" name="per_id1" size="10" value="<?=$k.$rs[per_id]?>">
			</div></div></td>
  </tr>
	<tr class="tbETitle_1">
	<td width="225"  class="style5" >&nbsp;ประเภท </td>
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
</select></div>	</td>
</tr><tr>
	<tr class="tbETitle_1">
	<td width="225"  class="style5" >&nbsp;ระดับ	</td>
	<td><div id="cat_1" >
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
</tr>
  	<tr class="tbETitle_1">
   <td width="32%" class="style5" >&nbsp;เงินเดือน</td>
    <td width="68%"><div class="style2">
      <input name="pay" type="text"  size="10"   value="<?=$rs[pay]?>" onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}"/>
      &nbsp; </div></td>
  </tr>
  	<tr class="tbETitle_1">
   <td width="32%" class="style5" >&nbsp;ค่าครองชีพชั่วคราว</td>
    <td width="68%"><div class="style2"><input name="pay_live" type="text"  size="10"   value="<?=$rs[pay_live]?>" onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}"/>
                  &nbsp; </div></td>
  </tr>
  	<tr class="tbETitle_1">
   <td width="32%" class="style5" >&nbsp;ค่าตอบแทนพิเศษ</td>
    <td width="68%"><div class="style2"><input name="pay_special" type="text"  size="10"   value="<?=$rs[pay_special]?>" onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}"/>
                  &nbsp; </div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="32%" class="style5" >&nbsp;เงินประจำตำแหน่ง</td>
    <td width="68%"><div class="style2"><input name="pay_posi" type="text"  size="10"  value="<?=$rs[pay_posi]?>" onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}"/>
                  &nbsp; </div></td>
  </tr>
  <tr class="tbETitle_1">
   <td><span class="style5">&nbsp;หมายเหตุ</span></td>
    <td><div class="style6"><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
  </tr>
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

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();
if($_POST[save] <>''){
	//echo $_GET[r_id] ."vvv".$_GET[rd_id]."<br>";
		if( check_num($num_id) ==''){
				$o_id = max_id1();
				$sql_open="INSERT INTO open (o_id,num_id,paper_id,open_date,mon_type,s_id,room_id) 
				VALUES ('$o_id','$num_id','$paper_id','".date_format_sql($open_date)."','$mon_type','$s_id','$room_id')";
				//echo "\$sql_open  ".$sql_open."<br>";
				$result_open  = mysql_query($sql_open); 
					
				for ($i=0;$i<=$total;$i++) {
						if ($chk[$i] != "") { 
						
								$sql_up = "UPDATE code SET o_id = '$o_id' WHERE c_id =$chk[$i] ";
								//echo "\$sql_up  ".$sql_up."<br>";
								$result_up  = mysql_query($sql_up); 
								
								$sql_mo = "INSERT INTO move (c_id,date_move,s_id,r_id,detail,remark,o_id) 
				VALUES ('$chk[$i]','".date_format_sql($open_date)."','$s_id','$room_id','','','$o_id') ";
								//echo "\$sql_mo  ".$sql_mo."<br>";
								$result_mo  = mysql_query($sql_mo); 
						}
				}
				echo "<br><center><font color=red size=3>บันทึกข้อมูลเรียบร้อยแล้ว</font></center><br>";	
				print "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?action=seach_move\">\n";
		}elseif( check_num($num_id) <>''){
			echo "<br><center><font color=red size=3>เลขที่ใบเบิกซ้ำ กรุณากรอกข้อมูลใหม่</font></center><br>";			
			print "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?action=add_move&o_id=$_GET[o_id]\">\n";
		}	
}

	?>
	<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {}
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} 
   try { return new XMLHttpRequest();          } catch(e) {}
   alert("XMLHttpRequest not supported");
   return null;
};

function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} 
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} 
   try { return new XMLHttpRequest();          } catch(e) {}
   alert("XMLHttpRequest not supported");
   return null;
};

function dochange(src, val) {

     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; 
               } 
          }
     };
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); 
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
     req.send(null); 

}

function selectall(){


if(document.f5.allbox.checked == true){
	for (var i=0;i<document.f5.total.value;i++)
	{
			 document.f5["chk["+i+"]"].checked = true;
	}
}else{
	for (var i=0;i<document.f5.total.value;i++)
	{
			 document.f5["chk["+i+"]"].checked = false;
	}
}
}
function q_confirm()
{
	if (confirm("ยืนยันการเบิก ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<script language="JavaScript" type="text/JavaScript">
	function check_1(theForm) 
	{
		if(document.f5.num_id.value == ''){
			alert("กรุณากรอกเลขที่ใบเบิก");
			document.f5.num_id.focus();      
			return (false);
		}
		if(document.f5.paper_id.value == ''){
			alert("กรุณากรอกเลขที่เอกสาร");
			document.f5.paper_id.focus();      
			return (false);
		}
		if(document.f5.s_id.value == ''){
			alert("กรุณาเลือกแผนก");
			document.f5.s_id.focus();   
			return (false);
		}
		if(document.f5.room_id.value == ''){
			alert("กรุณาเลือกห้อง");
			document.f5.room_id.focus();   
			return (false);
		}
		var j = 0;	
			for (i=0;i<eval(document.f5.total.value);++i) {
			
					if(document.f5["chk["+i+"]"].checked == true ){
							j++;
					}
			 }
			if( j <= 0){
				alert("กรุณาเลือกรายการที่ต้องการย้าย");
				return (false);
			}
	
		return (true);
	}
	</script>
<div align="center">

<form name="f5"  method="post" enctype="multipart/form-data" onsubmit="return check_1(this);">
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td colspan="2" align="center" bgcolor="#66CC99" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		เพิ่ม   การย้ายครุภัณฑ์</td>
	</tr>
</table></td>
</tr>
</table><br />


<table width="100%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;" >
	<?
	$o_id = $_REQUEST["o_id"] ;

$sql = "SELECT * FROM open WHERE o_id= $o_id";

$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
	$o_id = $rs[o_id];
	?>
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"   colspan="2">
		ใบย้ายเดิม</td>
	</tr>

<tr align="left" >
	<td width="42%" height="25"   >	<b><font color="#FF0066" size="2" face="Tahoma">เลขที่ใบเบิก</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<font size="2"><? echo $rs["num_id"]?></font>
	</td><td width="58%">
	<b><font color="#FF0066" size="2" face="Tahoma">เลขที่เอกสาร </font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><? echo $rs["paper_id"]?></font>
	</td>
	</tr>
	<tr align="left" >
	<td  height="25"  >
	<b><font color="#FF0066" size="2" face="Tahoma">วันที่เบิก</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><?=date_2($rs["open_date"])?></font>
	</td><td>
	<b><font color="#FF0066" size="2" face="Tahoma">ประเภทเงิน </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><? echo $rs["mon_type"]?></font>
	</td>
	<tr align="left" >
	<td   height="25" colspan="2" >
	<b><font color="#FF0066" size="2" face="Tahoma">แผนก / ห้อง </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><? echo room($rs["room_id"])?></font>
	
</td>
</table> 
 	</td>
</tr></table><br />

 <table width="100%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="center">
<tr><td colspan="2"  class="lgBar1" height="30">

		ใบย้ายใหม่

</td>
</tr>


<tr><td colspan="2">
<table width="100%">
<tr class="bmText">
<td width="11%" height="30">เลขที่ใบเบิก</td>
    <td width="42%"><div><input type="text" name="num_id" value="<?=$num_id?>" />  <font color="#FF0000" ></font></div></td>
	    <td width="13%">ทะเบียนเอกสาร</td>
    <td width="34%"><div><input name="paper_id" type="text" value="<? echo $paper_id;?>"  />
                 </div></td>
  </tr>
  <tr class="bmText">
   <td width="11%">วันที่ย้าย</td>
    <td width="42%"><div><input name="open_date" type="text" id="open_date" value="<? if($open_date =='') echo date("d/m/Y") ;else echo $open_date;?>"  size="10" <? if($new1 =='old')  echo "disabled='disabled'"?>/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('open_date','DD/MM/YYYY')"   width='19'  height='19'></div></td>
				   <td width="13%">ประเภทเงิน</td>
    <td width="34%"><div><? echo $rs["mon_type"]?><input type="hidden" name="mon_type"  value="<?=$mon_type?>"/></div></td>
  </tr>
  <tr class="bmText">
    <td>แผนก</td>
    <td><div><?
			$query  ="select * from section ";
		
			$query  .=" order by sec_name ";
		
			$result=mysql_query($query);
			?><select name="s_id" onchange="dochange('roomId', this.value)" <? if($new1 =='old')  echo "disabled='disabled'"?>>
		   <option value=""> - - - - กรุณาเลือก - - - - - </option>
	    <?
			while($d =mysql_fetch_array($result)){
				
	?>
	    <option value="<? echo $d[s_id];?>"
		<?
		if($s_id == $d[s_id] ) echo "selected";
		?>
		><? echo $d[sec_name];?></option>
	            <? }?>
	    </select></div></td>
	    <td>ห้อง</td>
    <td><div  id="roomId"  ><? 
	//echo $room_id."sss<br>";
	if($room_id == ''){?><select name="room_id" <? if($new1 =='old')  echo "disabled='disabled'"?>>
			<option value=""> - - - - กรุณาเลือก - - - - -</option>
	    </select>
		<? }else{?>
		<?
			$query  ="select * from room ";
		
			$query  .=" order by room ";

			$result=mysql_query($query);
			?><select name="room_id" <? if($new1 =='old')  echo "disabled='disabled'"?>>
		   <option value=""> - - - - กรุณาเลือก - - - - - </option>
	    <?
			while($d =mysql_fetch_array($result)){
				
	?>
	    <option value="<? echo $d[r_id];?>"
		<?
		if($room_id == $d[r_id] ) echo "selected";
		?>
		><? echo $d[room]." / ".$d[room_name];?></option>
	            <? }?>
	    </select>
		<? }?>
		</div></td>
</tr>
</table>
</td>
</tr>
<tr class="bmText"  bgcolor="#46B5AF">
<td width="140" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">เลือกทั้งหมด<br />
<input type="checkbox" name="allbox" onClick="selectall();" ></font></span></b> </div></td> 
              <td width="796" height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">เลขครุภัณฑ์</font></span></b> </div></td>

            </tr>
<?
$sql = "SELECT * FROM code ,receive_detail
 Where  code.rd_id = receive_detail.rd_id
 and code.o_id ='$o_id' and receive_detail.rd_id ='$rd_id'
 ";
$result = mysql_query($sql);
$i = 0;
$total_vat = 0;

while($rs1=mysql_fetch_array($result)){

$bg ='#FFFFFF';

?>
<tr  class="bmText" bgcolor="<?=$bg?>"  >
<td align="center" height="30">&nbsp;<input type='checkbox' name='chk[<?=$i?>]' value="<? echo $rs1["c_id"]?>"></td>
	<td ><div align="left">
	  <?=$rs1[code]?>
    </div></td>

</tr>
<? 

	$i++;
}?>
 <input type="hidden" name="total" value="<? echo $i?>">
<tr bgcolor="#CCCCCC"><td style="border-width:0; border-color:white; border-style:solid;"  colspan="7"  align="center" height="30"><strong><font size="2">
	  <input   type="submit" name='save' value="บันทึก"   onclick="return q_confirm();">&nbsp;&nbsp;
	  <input   type="button"  name='cancel' value="ยกเลิก"  onclick="javascript:window.location='index.php?action=seach_move&o_id=<?=$o_id?>';">
</font></strong></td></tr>

</table>
	</td>
</tr></table>





</form>
</div>
</center>


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
function check_num($num_id){
	$sql = "SELECT * FROM open  Where num_id = '$num_id'  ";
	$result = mysql_query($sql);
	$rs=mysql_fetch_array($result);
	return $rs[num_id];
}
function max_id1(){
	$sql = "Select max(o_id) as max  from  open ";
			$result = mysql_query($sql); 
			$recn = mysql_fetch_array($result) ;
			$max = $recn[max];
			if($max == NULL or $max == ''){
				$id = "1";
			} else{
				$id =  $max + 1; 
			}
		return $id;
}
?>
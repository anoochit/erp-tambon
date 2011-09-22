<?
if($tab <>'') $ac = 'view_detail';
else $ac = 'add_open';
if($_POST[save] <>''){
		if($_POST[new1] =='old'){
				$o_id = $_POST[o_id];
						for ($i=0;$i<=$total;$i++) {
							if ($chk[$i] != "") { 
								$sql_up = "UPDATE code SET o_id = '$o_id' WHERE c_id =$chk[$i] ";
								$result_up  = mysql_query($sql_up); 
								$x = explode("^",fild_detail_open($o_id));
								$sql_mo = "INSERT INTO move (c_id,date_move,div_id,sub_id,detail,remark,o_id) 
				VALUES ('$chk[$i]','$x[0]','$x[1]','$x[2]','$x[3]','$x[4]','$o_id') ";
								$result_mo  = mysql_query($sql_mo); 
								
						}
				}
				print "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?action=$ac&r_id=$_GET[r_id]&rd_id=$rd_id\">\n";
		}elseif($_POST[new1] =='new' and check_num($paper_id) ==''){
				$o_id = max_id1();
				$sql_open="INSERT INTO open (o_id,num_id,paper_id,open_date,mon_type,div_id,sub_id , name_head,detail ) 
				VALUES ('$o_id','$num_id','$paper_id','".date_format_sql($open_date)."','$mon_type','$div_id','$sub_id' , '$name_head','$detail' )";
				$result_open  = mysql_query($sql_open); 
				
				for ($i=0;$i<=$total;$i++) {
						if ($chk[$i] != "") { 
						
								$sql_up = "UPDATE code SET o_id = '$o_id' WHERE c_id =$chk[$i] ";
								$result_up  = mysql_query($sql_up); 
								
								$sql_mo = "INSERT INTO move (c_id,date_move,div_id,sub_id , name_head,detail,remark,o_id) 
				VALUES ('$chk[$i]','".date_format_sql($open_date)."','$div_id','$sub_id' , '$name_head','$detail','','$o_id') ";
								$result_mo  = mysql_query($sql_mo); 
						}
				}
					print "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?action=$ac&r_id=$_GET[r_id]&rd_id=$rd_id\">\n";
		}elseif($_POST[new1] =='new' and check_num($paper_id) <>''){
			echo "<br><center><font color=red size=3>เลขที่ทะเบียนเอกสารซ้ำ กรุณากรอกข้อมูลใหม่</font></center><br>";			
			print "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?action=open_detail&r_id=$_GET[r_id]&rd_id=$rd_id\">\n";

		}
				
}


if($del <>''){

	$sql = "DELETE FROM open   WHERE o_id ='$o_id'";
	$result = mysql_query($sql);
	
	$sql_up = "UPDATE code SET o_id = '' WHERE o_id ='$o_id' ";
	$result_up = mysql_query($sql_up);
	
	print "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?action=open_detail&r_id=$r_id&rd_id=$rd_id\">\n";

}
?>

<script language="JavaScript">
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

function check_num(){
	if( document.f5.n_seach.length == 0 ){
		alert("กรุณากรอกเลขที่ใบเบิก");
		return (false);
	}
		return (true);
}
function ch($first) {
	if ($first =='N') {
		document.f5.n_seach.disabled = true;
		document.f5.search1.disabled = true;
		document.f5.add_div.disabled =false;
		document.f5.add_sub.disabled = false;
		document.f5.num_id.value = "";
		document.f5.paper_id.value = "";
		document.f5.open_date.value = "";
		document.f5.mon_type.value = "";
		document.f5.div_id.value  = "";
		document.f5.sub_id.value = "";
		document.f5.name_head.value  = "";
		document.f5.detail.value  = "";
		document.f5.num_id.disabled = false;
		document.f5.paper_id.disabled = false;
		document.f5.open_date.disabled = false;
		document.f5.mon_type.disabled = false;
		document.f5.div_id.disabled = false;
		document.f5.sub_id.disabled = false;
		document.f5.name_head.disabled = false;
		document.f5.detail.disabled = false;
		
		
	} if ($first =='O') {
		document.f5.n_seach.disabled = false;
		document.f5.search1.disabled = false;
		document.f5.add_div.disabled =true;
		document.f5.add_sub.disabled = true;
		document.f5.num_id.disabled = true;
		document.f5.paper_id.disabled = true;
		document.f5.open_date.disabled = true;
		document.f5.mon_type.disabled = true;
		document.f5.div_id.disabled  = true;
		document.f5.sub_id.disabled  = true;
		document.f5.name_head.disabled  = true;
		document.f5.detail.disabled   = true;
	} 

}
</script>
<script language="JavaScript" type="text/JavaScript">
	function check_1(theForm) 
	{
		if(document.f5.new1[1].checked == true && document.f5.num_id.value == ''){
			alert("กรุณาค้นหาใบเบิก");
			 document.f5.n_search.focus();      
			return (false);
		}
		if(document.f5.new1[0].checked == true && document.f5.num_id.value == ''){
			alert("กรุณากรอกเลขที่ใบเบิก");
			document.f5.num_id.focus();      
			return (false);
		}
		if(document.f5.open_date.value == ''){
			alert("กรุณาเลือกวันที่");
			document.f5.open_date.focus();      
			return (false);
		}
		if(document.f5.mon_type.value == ''){
			alert("กรุณาเลือกประเภทเงิน");
			document.f5.mon_type.focus();      
			return (false);
		}
		if(document.f5.div_id.value == ''){
			alert("กรุณาเลือกกอง");
			document.f5.div_id.focus();   
			return (false);
		}
		if(document.f5.sub_id.value == ''){
			alert("กรุณาเลือกฝ่าย");
			document.f5.sub_id.focus();   
			return (false);
		}
		if(document.f5.name_head.value == ''){
			alert("กรุณากรอกชื่อหัวหน้ากอง");
			document.f5.name_head.focus();   
			return (false);
		}
	
		var j = 0;	
			for (i=0;i<eval(document.f5.total.value);++i) {
					if(document.f5["chk["+i+"]"].checked == true ){
							j++;
					}
			 }
			if( j <= 0){
				alert("กรุณาเลือกรายการที่ต้องการเบิก");
				return (false);
			}
			if (confirm("ยืนยันการเบิก ใช่หรือไม่")){
				return true;
			}else{
				return false;
			}
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
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="default.css">
<form name="f5" method="post"  action=""   onsubmit="return check_1(this);"   >
<input type="hidden" name="r_id" value="<?=$r_id?>" />
<input type="hidden" name="rd_id" value="<?=$rd_id?>" />
<br />
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td align="center" colspan="2" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div >ใบเบิกครุภัณฑ์ </div>	</td>
	</tr>
</table></td>
</tr>
</table>
<br />	

		<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25"><div>&nbsp;&nbsp;&nbsp;ข้อมูลการเบิก</div></td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
    <tr>
	<td width="935">
	<table width="100%" align="center">
<tr class="bmText"  bgcolor="#46B5AF">
<td width="8%"  height="30" align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">เลขที่ใบเบิก</font></span></b> </td>
<td width="18%"  align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">แผนก / ห้อง</font></span></b></td>
<td width="11%"  align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">วันที่</font></span></b></td>
                                          
 <td width="23%"  align="center"><b><span style="font-size:9pt;"><font face="Tahoma">ครุภัณฑ์เลขที่</font></span></b></td>
  <td width="12%"  align="center"><b><span style="font-size:9pt;"><font face="Tahoma">ประเภทเงิน</font></span></b></td>
     <td width="8%"  align="center"><b><span style="font-size:9pt;"><font face="Tahoma">ราคา/หน่วย</font></span></b></td>
	 <td width="6%" align="center" ><b><span style="font-size:9pt;"><font face="Tahoma">จำนวน</font></span></b></td>
	 <td width="6%" align="center" ><b><span style="font-size:9pt;"><font face="Tahoma">หน่วยนับ</font></span></b></td>
	 <td width="8%" align="center" ><b><span style="font-size:9pt;"><font face="Tahoma">รวมเงิน</font></span></b></td>
                  </tr>
<?
$sql = "SELECT * ,count(code) as c_code FROM code ,receive_detail,open
 Where  code.rd_id = receive_detail.rd_id
 and code.o_id = open.o_id
and  receive_detail.rd_id = '$rd_id'  
group by num_id 
order by abs(code) ";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
$bg ='#FFFFFF';
?>
<tr  class="bmText" bgcolor="<?=$bg?>" >
	<td height="25" align="left">&nbsp;
	  <?=$rs1[num_id]?>
    </td>
	<td height="25" align="center">
	  <?=room($rs1[room_id])?>
    </td>
	<td align="center">
	  <? echo date_2($rs1["open_date"]);   ?>
    </td>
		<td align="left">&nbsp;
	   <? 
	   echo 	code_open_all($rs1["o_id"],$rd_id);
	  ?>
   </td>

	<td   align="center">
	  <?=$rs1["mon_type"]?>
    </td>
	<td align="center">
	  <?=$rs1["price"]?>
    </td>
	<td align="center">
	  <?=$rs1["c_code"]?>
    </td>
		<td  align="center" >
	  <?=$rs1["unit"]?>&nbsp;
    </td>
	<td   align="right">
	  <?=number_format($rs1["c_code"]*$rs1["price"],"")?>&nbsp;
   </td>
</tr>
<? 
	$total = $total + ($rs1["c_code"]*$rs1["price"]);
	$i++;
}?>
<tr bgcolor="#CCCCCC"><td style="border-width:0; border-color:white; border-style:solid;"  colspan="11" align="right" height="25"><strong><font size="2">รวมทั้งสิ้น</font></strong> &nbsp;&nbsp;<font size="2"><? echo number_format($total,""); ?>&nbsp;&nbsp;บาท</font></td>
                                                </tr>
</table>	</td></tr>
	
	
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>

<br>
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
    <tr>
	<td width="935">
	<table width="100%" align="center">
	<tr class="lgBar">
  		  		<td  height="30" colspan="4"><div>รายการเบิก</div></td>
  			</tr>
	<tr  bgcolor="#C1E0FF">
<td colspan="7" height="30"><div  align="left"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr class="bmText">
    <td  colspan="4" height="40"><br />
	<input type="radio" name="new1" value="new" <? if($new1 =='' or $new1 =='new') echo "checked='checked'"?> onClick="ch('N');" /> ใบเบิกใหม่  &nbsp;&nbsp;
	<input type="radio" name="new1" value="old" <? if($new1 =='old')  echo "checked='checked'"?> onClick="ch('O');"  /> 
	ใบเบิกเก่า  &nbsp;&nbsp;
	ค้นหาเลขทะเบียนเอกสาร &nbsp;&nbsp;<input type="text" name="n_seach" value="<?=$n_seach?>" 
	<? if($new1 <>'old')  echo "disabled='disabled'"?>
	 >
	  <input  type="button" name="search1" value=" ค้นหา "     onclick="submit();"<? if($new1 <> 'old')  echo "disabled='disabled'"?>  />	<br />
	   <?
  if($n_seach <>'' ){
  		$sql  ="select  * from open  where paper_id ='$n_seach'";
		$re = mysql_query($sql);
		if(mysql_num_rows($re) > 0){
			$rs =mysql_fetch_array($re);
			$o_id = $rs[o_id];
			$open_date = date_format_th($rs[open_date]);
			$num_id = $rs[num_id];
			$paper_id = $rs[paper_id];
			$mon_type = $rs[mon_type];
			$div_id = $rs[div_id];
			$sub_id = $rs[sub_id];
			$name_head = $rs[name_head];
			$detail = $rs[detail];
		}else{
			echo "<font color=red>ไม่มีเลขที่ทะเบียนเอกสารนี้ กรุณาค้นหาใหม่</font>";
		}
  }else  if($search1 <>'' and $n_seach =='' ){
 	 echo "<font color=red>กรุณากรอกทะเบียนเอกสาร</font>";
  }
  ?>
  <?  if($n_seach <>'' ){ ?>
  <input type="hidden" name="o_id" value="<?=$o_id?>" />
  <? }?>
	 <br /></td>
  </tr>

  <tr class="bmText">
    <td width="11%" height="30">เลขที่ใบเบิก</td>
    <td width="42%"><div><input type="text" name="num_id" value="<?=$num_id?>" <? if($new1 =='old')  echo "disabled='disabled'"?>/></div></td>
	    <td width="13%">ทะเบียนเอกสาร</td>
    <td width="34%"><div><input name="paper_id" type="text" value="<? echo $paper_id;?>" <? if($new1 =='old')  echo "disabled='disabled'"?> />
                 </div></td>
  </tr>
  <tr class="bmText">
   <td width="11%">วันที่เบิก</td>
    <td width="42%"><div><input name="open_date" type="text" id="open_date" value="<? if($open_date =='') echo date("d/m/Y") ;else echo $open_date;?>"  size="10" <? if($new1 =='old')  echo "disabled='disabled'"?>/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('open_date','DD/MM/YYYY')"   width='19'  height='19'></div></td>
				   <td width="13%">ประเภทเงิน</td>
    <td width="34%"><div><select name="mon_type" <? if($new1 =='old')  echo "disabled='disabled'"?>>
	  <option value='' <? if($mon_type =="") echo "selected"?>> - - - - กรุณาเลือก - - - - -</option>
	  <option value='เงินงบประมาณ' <? if($mon_type =='เงินงบประมาณ') echo "selected"?>>เงินงบประมาณ</option>
	  <option value='เงินนอกงบประมาณ' <? if($mon_type =='เงินนอกงบประมาณ') echo "selected"?>>เงินนอกงบประมาณ</option>
	  <option value='เงินบริจาค/เงินช่วยเหลือ' <? if($mon_type =='เงินบริจาค/เงินช่วยเหลือ') echo "selected"?>>เงินบริจาค/เงินช่วยเหลือ</option>
	   <option value='อื่นๆ' <? if($mon_type =='อื่นๆ') echo "selected"?>>อื่นๆ</option>
	  </select></div></td>
  </tr>
  <tr class="bmText">
    <td>กอง</td>
    <td><div><?
			$query="select div_id,div_name from division order by div_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
?><select name="div_id"  onchange="dochange('sub_div_1', this.value);" <? if($new1 =='old')  echo "disabled='disabled'"?>>
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
</select> <br /><input    type="button"name="add_div"  value="เพิ่มกอง" onClick="javascript:window.open('add_div.php?action=add','','resizable=yes,width=350,height=250');" <? if($new1 =='old')  echo "disabled='disabled'"?>></div></td>
	    <td>ฝ่าย</td>
    <td><div id="sub_div_1"    ><?
	if($sub_id <>''){
			      $query  ="select *  from division d,subdivision s
        where  1 = 1 and d.div_id = s.div_id
        and d.div_id like '%$div_id%' 
		group by s.sub_name
        order by s.sub_id ";
		 $result = mysql_query($query);
          echo "<select name='sub_id' ";
		   if($new1 =='old')  echo "disabled='disabled'";
		   echo ">";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[sub_id]' ";
		if($sub_id ==   $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select>\n";  



}else{
	 ?>
	 <select name='sub_id' <? if($new1 =='old')  echo "disabled='disabled'"?>>
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select>
<? }?>	  </div><input   type="button"  name="add_sub"  value="เพิ่มฝ่าย" onClick="javascript:window.open('add_div.php?action=sub_add','','resizable=yes,width=350,height=250');" <? if($new1 =='old')  echo "disabled='disabled'"?>>
		</td>
  </tr>
  <tr class="bmText">
    <td width="11%" height="30">หัวหน้าส่วน</td>
    <td width="42%"><div><input type="text" name="name_head" value="<?=$name_head?>" <? if($new1 =='old')  echo "disabled='disabled'"?> size="25"/></div></td>
	    <td width="13%">อื่นๆ</td>
    <td width="34%"><div><input name="detail" type="text" value="<? echo $detail;?>" <? if($new1 =='old')  echo "disabled='disabled'"?> size="25"/>
                 </div></td>
  </tr>
</table>

</div></td>
<tr class="bmText"  bgcolor="#46B5AF">
<td width="221" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">เลือกทั้งหมด<br />
<input type="checkbox" name="allbox" onClick="selectall();" ></font></span></b> </div></td> 
                    <td width="692" height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">เลขครุภัณฑ์</font></span></b> </div></td>

                  </tr>
<?
$sql = "SELECT * FROM code ,receive_detail
 Where  code.rd_id = receive_detail.rd_id
 and (code.o_id =0 or code.o_id ='')
and  receive_detail.rd_id = '$rd_id'    ";
$result = mysql_query($sql);
$i = 0;
$total_vat = 0;

while($rs1=mysql_fetch_array($result)){

$bg ='#FFFFFF';

?>
<tr  class="bmText" bgcolor="<?=$bg?>"  >
<td align="center">&nbsp;<input type='checkbox' name='chk[<?=$i?>]' value="<? echo $rs1["c_id"]?>"></td>
	<td ><div align="left"><a href="#" onClick="javascript:window.open('Sample_11.php?c_id=<?=$rs1[c_id]?>','xxx','scrollbars=yes,width=450,height=400')">
	  <?=$rs1[code]?></a>
    </div></td>

</tr>
<? 
	$tatal_vat = $r_cost_1[$i] + $tatal_vat;
	$i++;
	}

?>
 <input type="hidden" name="total" value="<? echo $i?>">
<? if($in_vat <>'' || $ex_vat <>'' ){?>
<tr bgcolor="#CCCCCC"><td style="border-width:0; border-color:white; border-style:solid;"  colspan="7" align="right" height="25"><strong><font size="2">รวมทั้งสิ้น</font></strong> &nbsp;&nbsp;<font size="2"><? echo number_format($tatal_vat,2); ?>&nbsp;&nbsp;บาท</font></td>
</tr>
<? }?>
<tr >
      <td colspan="5"><div align="center"><!--onclick="return q_confirm();" -->
	  <input   type="submit" name='save' value="บันทึก"   >&nbsp;&nbsp;
	  <input   type="button"  name='cancel' value="ยกเลิก"  onclick="javascript:window.location='index.php?action=add_open&r_id=<?=$r_id?>&rd_id=<?=$rd_id?>';">
	  </div></td>
    </tr>
</table>	</td></tr>
	
	
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>
</form>
<script language="javascript">
function q_confirm()
{
	if (confirm("ยืนยันการเบิก ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

function godel()
{
	if (confirm("คุณต้องการลบข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>

<?
function check_num($paper_id){
	$sql = "SELECT * FROM open  Where paper_id = '$paper_id'  ";
	$result = mysql_query($sql);
	$rs=mysql_fetch_array($result);
	return $rs[num_id];
}
function max_id1(){
	$sql = "Select max(o_id) as max  from  open ";
			$result = mysql_query($sql); 
			$recn = mysql_fetch_array($result) ;
			$max = $recn[max];
			if($max == NULL or $max == ''){ //ถ้าว่าง
				$id = "1";
			} else{
				$id =  $max + 1; //gene ค่า sale_id 
			}
		return $id;
}
?>
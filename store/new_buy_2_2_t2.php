<? 
session_start();
?>
<?	
if($del =='del'){
	unset($dd2[$array1]); 
	session_unregister("dd2[$array1]");
	echo "<meta http-equiv='refresh' content='0; url=?action=new_buy_2_2_t2&type_id=$type_id'>";
}

if($save <>''){
if(check_paper($pay_id,$paper_id) <=0){
		$p_id = find_maxid();
		$sql_r = "INSERT INTO pay (p_id,pay_id,pay_date,paper_id, detail,open_name , pay_type) 
		VALUES('$p_id','$pay_id','".date_format_sql($pay_date)."', '$paper_id' , '$detail' , '$open_name' , '$pay_type')";
		$result_r = mysql_query($sql_r);
		
	//บันทึกลง pay_detail
	for($o=0;$o<=$pointer_array;$o++){
	
		$data = split(",", $dd2[$o]); 
		if($data[0]<>''){

		if($data[1] =='') $data[1] = $data[2];
				//-------------------------บันทึกลง pay_detail ---------------------------------------
				$pd_id1 = find_max_pd_id($p_id);
				
				$a_mount = $data[3] * $data[6];
				
				$sql_add = "INSERT INTO pay_detail (p_id , pd_id  , product_id  , amount,unit    ) 
				VALUES('$p_id', '$pd_id1' ,'$data[5]','$data[3]','$data[4]' )";
				$result_add = mysql_query($sql_add); 
				//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card
				$k = explode(",",check_stock_1(date_format_sql($pay_date),$data[5]));
				// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
				update_stock(date_format_sql($pay_date),$a_mount,$data[5]);
				
				$amount_1 =  $k[0] -  $a_mount;
				$sql_add2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain ) 
				VALUES('".date_format_sql($pay_date)."',NOW() , '$pd_id1' , 'P' ,'$data[5]','-$a_mount','$amount_1' )";
				$result_add2 = mysql_query($sql_add2);  
			
				unset($dd2[$o]); 
				session_unregister("dd2[$o]");
			} 
		}
	unset($seri); 
	session_unregister("seri");
	echo " <center><br><br>ระบบกำลังบันทึกข้อมูล กรุณารอสักครู่  <br><br>";
	echo "<meta http-equiv='refresh' content='2; url=?action=view_detail_t2&p_id=$p_id&type_id=$type_id'>";
	echo "</center>";
	}else{ 
	echo " <center><br><br>ทะเบียนเอกสารซ้ำ <br><br>";
	echo "</center>";
	}
}
	
if($btnSub <>''){ // ยกเลิก
	unset($data); 
	session_unregister("data");
	
	unset($dd2); 
	session_unregister("dd2");
	
	unset($pointer_array); 
	session_unregister("pointer_array");
	
	unset($seri); 
	session_unregister("seri");

}
if($OK <> '' ){
		session_register("seri");
		$seri = $pay_id."~".$pay_date."~".$paper_id."~".$open_name."~".$pay_type."~".$detail;
	}else{	
		$seri = explode("~",$_SESSION[seri]);
		$pay_id=$seri[0];
		$pay_date = $seri[1];
		$paper_id =$seri[2];
		$open_name =$seri[3];
		$pay_type =$seri[4];
		$detail =$seri[5];
		 $seri = $seri[0]."~".$seri[1]."~".$seri[2]."~".$seri[3]."~".$seri[4]."~".$seri[5]; 
	}
?>

<title>ใบส่งของ</title>
<script type="text/javascript" src="myAjax.js" ></script>
<script language="javascript">
	var CompleteDataUrl ="completeData.php";
	//ค้นหาคำใกล้เคียง
	function getHint(){
		var param = "product=" + document.getElementById("product").value;
		postDataReturnText(CompleteDataUrl,param,displayHint);
		
	}
	
	//แสดงผลลัพท์การค้นหา
 	function displayHint(text){
		document.getElementById("hint").innerHTML = text;
	}

	function populateName(text){
		var r;
		var ret = text;
		
		r =ret.split('@')
		document.getElementById("shop_id").value = r[0];
		document.getElementById("product").value = r[1];
		document.getElementById("hint").innerHTML = '';
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
                    document.getElementById(src).innerHTML=req.responseText; //เบิกค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<script language="JavaScript" type="text/JavaScript">
function del_confirm(num)
{
	var x=window.confirm("ต้องการลบชื่อครุภัณฑ์ที่เลือก ใช่หรือไม่");
	return (x);
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="default.css">
<link href="style.css" rel="stylesheet" type="text/css">
<link href="style2.css" rel="stylesheet" type="text/css">
<body  >
<? 
if($type_id ==10){
	$na = 'วัสดุสำนักงาน';
}elseif($type_id ==11){
	$na = 'วัสดุงานบ้านงานครัว';
}
?>
<form name="f12" method="post"  action="#"  >
<br>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td colspan="2" align="center"  style="border: #7292B8 1px solid;" >
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		ทะเบียนเบิก<?=$na?></td>
	</tr>
</table></td>
</tr>
</table>
<br>
        <table  border="0" cellpadding="1" cellspacing="1"  width="88%" align="center">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25"><div>&nbsp;&nbsp;&nbsp;เบิก<?=$na?></div></td>
  			</tr>
			<tr>
			
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" width="100%">
			  <tr class="bmText">
                <td height="30"><div>เลขที่เบิก</div></td>
                <td ><div><input type="text" name="pay_id" value="<?=$pay_id?>"  size="15" /></div>                 </td>
			      <td width="111"><div>วันที่เบิก&nbsp;</div></td>
                <td width="236"><div>
                  <input type="text" name="pay_date" value="<? if($pay_date =='') echo date("d/m/Y") ;else echo $pay_date;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('pay_date','DD/MM/YYYY')"   width='19'  height='19'></div></td>
              </tr>
			  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
			    <td><div>ทะเบียนเลขที่เบิก</div></td>
			    <td  ><div><? 
			if( date("m") > '09')	{
					$year = substr((date("Y") + 543+1),2);
			}else{
					$year = substr((date("Y") + 543),2);
			}

				?>
			      <input name="paper_id" type="text"  value="<?=$paper_id?>" size="20" maxlength="50"></div>				  </td>
		      <td><div>ชื่อผู้เบิก&nbsp; </div></td>
                <td><div><input type="text" name="open_name" value="<?=$open_name?>"  size="20" /></div>                  </td>
</tr>
<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
	<td width="140" height="30"><div>
		ประเภทการเบิก
		</div>	</td>
	<td  colspan="3"><div >
		<select name="pay_type"  >
          	<option  value="0" <? if($pay_type == 0) echo "selected"?>>การเบิกจ่ายใช้งานตามปกติ</option>
		 	<option  value="1" <? if($pay_type == 1) echo "selected"?>>การโอนให้</option>
		  	<option  value="2" <? if($pay_type == 2) echo "selected"?>>การยืมและการคืน</option>
		</select>
</div></td>

</tr>         

<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr>
	<td width="140" class="bmText"><div>
		รายละเอียด
		</div>	</td>
	<td  colspan="3"><div ><textarea name="detail" cols="50" rows="4"><?=$detail?>
</textarea>
	</div></td>
</tr>
<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="ตกลง"   onClick="return check(this)" class="buttom">&nbsp;&nbsp;
                    <input   type="button" name="formbutton2" value="ยกเลิก" class="buttom">    </td>
                </tr>
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>
<br><center>

<a href="#" onClick="javascript:popup('add_new_2.php?action=add&OK=OK&type_id=<?=$type_id?>','',600,280);window.navigate('?action=new_buy_2_2_t2&type_id=<?=$type_id?>');">เพิ่มรายการ
</a>
</center>
<br>

		<br>
		<table width="98%" align="center"cellspacing="1" border="0" style="border-collapse:collapse;">
       <tr class="bmText"  bgcolor="#C9D4E1">
            <td width="54%"  align="center" height="28" style="border: #000000 1px solid;"><b>รายการ<?=$na?></b> </td>

            <td width="18%"  align="center" style="border: #000000 1px solid;"><b>จำนวนเบิก</b></td>
            <td width="19%"  align="center" style="border: #000000 1px solid;"><b>หน่วยนับ</b></td>
            <td width="9%"  align="center" style="border: #000000 1px solid;"><b>ลบ</b></td>
          </tr>
          <?
$total = 0;
for($m=0;$m<$pointer_array;$m++){
	$data = split(",", $dd2[$m]); 
$total = $total + ($data[3]*$data[2]);

if($data[5]<>''){
		 ?>
          <tr bgcolor="#e8edff">

            <td height="28"style="border: #000000 1px solid;" align="left"><font size="2">&nbsp;<? echo $data[0]; ?></font></td>

            <td style="border: #000000 1px solid;" align="center"><font size="2">&nbsp;<? echo $data[3];  ?>&nbsp;</font></td>
            <td style="border: #000000 1px solid;" align="center"><font size="2">&nbsp;<? echo $data[4];  ?>&nbsp;</font></td>
            <td style="border: #000000 1px solid;"><p align="center"><b>
            <a  	href="?action=new_buy_2_2_t2&del=del&array1=<?=$m?>&type_id=<?=$type_id?>"  onclick="return godel()">
                                                      <img src="images/Delete.png" border="0"  > </a></font></span></b></p></td>
          </tr>
          <? }
}
?>
          <tr>
            <td colspan="4" align="center"  height="32" style="border: #000000 1px solid;"><font face="MS Sans Serif">
              <input type="hidden" name="user_open" value="<?=$user_open?>">
              <input type="submit" name="save" value="ยืนยันการเบิก" onClick="return validate();"  class="buttom">
              &nbsp;</font> </td>
          </tr>
        </table>
</form>
</body>

</html>
<script language="javascript">
function doNext(el)
{
	if (el.value.length < el.getAttribute('maxlength')) 
	return;

	var f = el.form;
	var els = f.elements;
	var x, nextEl;
	for (var i=0, len=els.length; i<len; i++){
		x = els[i];
		if (el == x && (nextEl = els[i+1]))
		{
			nextEl.value="";
			if (nextEl.focus) 
			nextEl.value="";
			nextEl.focus();

		}
	}
}
function godel()
{
	if (confirm("คุณต้องการลบข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}


function q_cencel()
{
	if (confirm("คุณต้องการยกเลิก ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function q_cencel()
{
	if (confirm("คุณต้องการยกเลิก ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>

<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		    if (  document.f12.paper_id.value=='' || document.f12.paper_id.value==' ' )
           {
           alert("กรุณากรอกเลขที่เบิก");
           document.f12.paper_id.focus();           
           return false;
           }
		    if (  document.f12.pay_date.value=='' || document.f12.pay_date.value==' ' )
           {
           alert("กรุณากรอกวันที่เบิก");
           document.f12.pay_date.focus();           
           return false;
           }
		    if (  document.f12.open_name.value=='' || document.f12.open_name.value==' ' )
           {
           alert("กรุณากรอกชื่อผู้เบิก");
           document.f12.open_name.focus();           
           return false;
           }
		   if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}
			
	}
</script>

<?
function insert_code($pd_id,$code){
		$sql_add = "INSERT INTO code (pd_id,code) 
		VALUES('$pd_id','$code')";
		$result_add = mysql_query($sql_add); 
}
function find_maxid() {
	
		$sql = "Select max(p_id) as max  from pay ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$p_id = "1";
		} else{
			$p_id =  $max + 1; //gene ค่า
		}
		return $p_id;
	}
	
	function find_max_pd_id($p_id) {
	
		$sql = "Select max(pd_id) as max  from pay_detail  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$pd_id = "1";
		} else{
			$pd_id =  $max + 1; //gene ค่า 
		}
		return $pd_id;
	}
	function check_product_1($product){
		$sql = "Select *  from product  where pro_name ='$product' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[pro_name];
}
	function check_paper($pay_id,$paper_id){
		$sql = "Select *  from pay  where paper_id = '$paper_id'";
		$result = mysql_query($sql); 
		$recn=mysql_num_rows($result);
		return $recn;
}
function check_stock($p_id){
		$sql = "Select * from stock_card  where p_id = '$p_id' ";
		$result = mysql_query($sql); 
		$arr =mysql_num_rows($result);
		return $arr;
}
function check_stock_1($s_date,$p_id){
		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		group by id
		order by s_date desc ,id desc   limit 1  ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];
}
	function check_product_2($p_id){
		$sql = "Select *  from product  where p_id ='$p_id' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[amount];
}
function amount($id){
		$sql = "Select amount  from stock_card  where id = '$id' ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['amount'];

}

function update_stock(  $s_date , $amount , $p_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0  ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - $amount ;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' and status = 0 ";
				$result_up = mysql_query($sql_up); 
		}
}
?>
<script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
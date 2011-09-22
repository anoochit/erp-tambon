<? 
session_start();
?>
<?	
if($del =='del'){
	unset($dd[$array1]); 
	session_unregister("dd[$array1]");
	echo "<meta http-equiv='refresh' content='0; url=?action=new_buy_t1&type_id=$type_id'>";
}

if($save <>''){
if(check_paper($num_id,$paper_id) <=0){
		$r_id = find_maxid();
		$sql_r = "INSERT INTO receive (r_id,num_id,shop_id,date_receive,come_in , paper_id, remark  ) 
		VALUES('$r_id','$num_id','$shop_id','".date_format_sql($date_receive)."','$come_in' , '$paper_id' , '$remark')";
		$result_r = mysql_query($sql_r);
		
	//บันทึกลง receive_detail

	for($o=0;$o<=$pointer_array;$o++){
		$data = split(",", $dd[$o]); 
		if($data[0]<>''){

		if($data[1] =='') $data[1] = $data[2];
				//-------------------------บันทึกลง receive_detail----------------------------------------
				$rd_id1 = find_max_rd_id($r_id);
				
				$sql_add = "INSERT INTO receive_detail (r_id , rd_id  , p_id  , amount , cost , a_cost ,unit  ) 
				VALUES('$r_id', '$rd_id1' ,'$data[5]','$data[3]','$data[2]','$data[1]' ,'$data[4]')";
				$result_add = mysql_query($sql_add); 
				
				//-------------------------บันทึกลง stock_card----------------------------------------
				
				$k = explode(",",check_stock_1(date_format_sql($date_receive),$data[5]));
				// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
				$a_mount = $data[3] * $data[6];
				update_stock(date_format_sql($date_receive),$a_mount ,$data[5]);
				
				$amount_1 =  $k[0] + $a_mount;
				$sql_add2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain ) 
				VALUES('".date_format_sql($date_receive)."',NOW() , '$rd_id1' , 'R' ,'$data[5]','$a_mount', '$amount_1')";
				$result_add2 = mysql_query($sql_add2); 
			
				unset($dd[$o]); 
				session_unregister("dd[$o]");
			} 
		} 
	unset($seri); 
	session_unregister("seri");
	echo " <center><br><br>ระบบกำลังบันทึกข้อมูล กรุณารอสักครู่  <br><br>";
	echo "<meta http-equiv='refresh' content='1; url=?action=view_detail_t1&r_id=$r_id&type_id=$type_id'>";
	echo "</center>";
	}else{ 
	echo " <center><br><br>ทะเบียนเอกสารซ้ำ <br><br>";
	echo "</center>";
	}
}
	
if($btnSub <>''){ // ยกเลิก
	unset($data); 
	session_unregister("data");
	
	unset($dd); 
	session_unregister("dd");
	
	unset($pointer_array); 
	session_unregister("pointer_array");
	
	unset($seri); 
	session_unregister("seri");

}
if($OK <> '' ){
		session_register("seri");
		$seri = $num_id."~".$shop_id."~".$date_receive."~".$come_in."~".$paper_id."~".$product."~".$remark;

	}else{	
		$seri = explode("~",$_SESSION[seri]);
		$num_id =$seri[0];
		$shop_id = $seri[1];
		$date_receive =$seri[2];
		$come_in =$seri[3];
		$paper_id =$seri[4];
		$product =$seri[5];
		$remark =$seri[6];
		 $seri = $seri[0]."~".$seri[1]."~".$seri[2]."~".$seri[3]."~".$seri[4]."~".$seri[5]."~".$seri[6]; 
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
		document.getElementById("shop_id").value = r[1];
		document.getElementById("product").value = r[0];
		document.getElementById("hint").innerHTML = '';
		//window.close();
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
		ทะเบียนรับ<?=$na?></td>
	</tr>
</table></td>
</tr>
</table>
<br>
        <table  border="0" cellpadding="1" cellspacing="1"  width="75%" align="center">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="86%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr>
	  		  <td  height="25"  class="lgBar">&nbsp; ใบส่งของ</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0"  width="561">
 
			  <tr class="bmText">
			    <td height="28">ใบส่งของที่</td>
			    <td width="396">
			      <input name="num_id" type="text" id="num_id" value="<?=$num_id?>" size="20" maxlength="50">		   </td>
		      </tr>
			   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
			    <td height="28">ทะเบียนเอกสาร</td>
			    <td width="396">
			      <input name="paper_id" type="text"  value="<?=$paper_id?>" size="20" maxlength="50">
				  </td>
		      </tr>
			   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
                <td>จากร้าน</td>
				
                <td>
		
				<input type="text" name="product" size="60" value="<?=$product ?>" onKeyUp="getHint()" >
				<div id="hint"></div>
				  <input type="hidden" name="shop_id" value="<?=$shop_id?>" >		 </td>
              </tr>
			   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr>
                <td width="158" height="25" class="bmText">วันที่รับ</td>
                <td><input name="date_receive" type="text" id="date_receive" value="<? if($date_receive =='') echo date("d/m/Y") ;else echo $date_receive;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive','DD/MM/YYYY')"   width='19'  height='19'>  </td>
              </tr>
			   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr>
                <td width="158" class="bmText"> หมายเหตุ</td>
                <td><textarea cols="50" rows="3" name="remark"><?=$remark?></textarea>
 </td>
              </tr>      
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>
<br><center>
<a href="#" onClick="javascript:popup('add_new.php?action=add&OK=OK&type_id=<?=$type_id?>','',550,300);window.navigate('?action=new_buy_t1&type_id=<?=$type_id?>');">เพิ่มรายการ
</a>

</center>
<br>

		<br>
		<table width="98%" align="center"cellspacing="1" border="0" style="border-collapse:collapse;">
                                                <tr class="bmText"  bgcolor="#C9D4E1">
                                 
                                                  <td width="29%"  align="center" height="28" style="border: #000000 1px solid;" > <div align="center"><strong>รายละเอียดพัสดุที่ขอซื้อ </strong></div></td>
                                               
                                                  <td width="16%" style="border: #000000 1px solid;"  ><div align="center"><strong>ราคา/หน่วย
                                                  </strong></div></td>
                                                  <td width="14%"  align="center" style="border: #000000 1px solid;" ><div align="center"><strong>จำนวน</strong></div></td>
                                                  <td width="17%"  align="center" style="border: #000000 1px solid;" ><div align="center"><strong>หน่วยนับ</strong></div></td>
                                                  <td width="17%" align="center" style="border: #000000 1px solid;" ><div align="center"><strong>รวมเงิน</strong></div></td>
                                                  <td width="7%"  align="center" style="border: #000000 1px solid;" ><strong>ลบ</strong></td>
          </tr>
                                                <?

$total = 0;
for($m=0;$m<$pointer_array;$m++){
	$data = split(",", $dd[$m]); 
$total = $total + ($data[3]*$data[2]);

if($data[5]<>''){
		 ?>
                                                <tr  bgcolor="#e8edff">
                                                  
<td style="border: #000000 1px solid;" align="left" height="28"><font size="2">&nbsp;<? echo $data[0]; ?></font></td>
                                           
                                                  <td style="border: #000000 1px solid;" align="right"><font size="2">&nbsp;<? echo number_format($data[2],2);  ?>&nbsp;</font></td>
                                                  <td style="border: #000000 1px solid;" align="center"><font size="2">&nbsp;<? echo $data[3];  ?>&nbsp;</font></td>
                                                  <td style="border: #000000 1px solid;" align="center"><font size="2">&nbsp;<? echo $data[4];  ?>&nbsp;</font></td>
                                                  <td style="border: #000000 1px solid;" ><p align="right"><font size="2"><? echo number_format($data[3]*$data[2],2);  ?>&nbsp;</font></td>
                                                  <td style="border: #000000 1px solid;" ><p align="center"><b><span style="font-size:11pt;"><font face="MS Sans Serif">
                                                   
                                                   <a href="?action=new_buy_t1&del=del&array1=<?=$m?>&type_id=<?=$type_id?>"  onclick="return godel()">
                                                      <img src="images/Delete.png" border="0"  > </a></font></span></b></p></td>
                                                </tr>
                                                <? }
}
?><tr >
                                                  <td style="border: #000000 1px solid;"  align="right"colspan="4" height="28">รวมทั้งสิ้น&nbsp;</td>
                                                  <td style="border: #000000 1px solid;" ><p align="right"><font size="2"><? echo number_format($total,2);  ?>&nbsp;</font></td>
                                                  <td style="border: #000000 1px solid;" ><p align="center"><b><span style="font-size:11pt;"><font face="MS Sans Serif">
                                                    &nbsp;</font></span></b></p></td>
                                                </tr>
                                                <tr>
                                                  <td colspan="6" align="center"  height="32" style="border: #000000 1px solid;" ><font face="MS Sans Serif">
                                                    <input type="hidden" name="user_open" value="<?=$user_open?>">
                                                    <input type="submit" name="save" value="ยืนยันการตรวจรับ" onClick="return validate();" class="buttom">
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
		   if (  document.f12.product.value=='' || document.f12.product.value==' ' )
           {
           alert("กรุณากรอกรับจากที่");
           document.f12.product.focus();           
           return false;
           }
		    if (  document.f12.date_receive.value=='' || document.f12.date_receive.value==' ' )
           {
           alert("กรุณากรอกวันที่รับ");
           document.f12.date_receive.focus();           
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
function insert_code($rd_id,$code){
		$sql_add = "INSERT INTO code (rd_id,code) 
		VALUES('$rd_id','$code')";
		$result_add = mysql_query($sql_add); 

}
function find_maxid() {
	
		$sql = "Select max(r_id) as max  from receive ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$r_id = "1";
		} else{
			$r_id =  $max + 1; //gene ค่า 
		}
		return $r_id;
	}
	
	function find_max_rd_id($r_id) {
	
		$sql = "Select max(rd_id) as max  from receive_detail  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1; //gene ค่า 
		}
		return $rd_id;
	}
	function check_product_1($product){
		$sql = "Select *  from product  where pro_name ='$product' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[pro_name];
}
	function check_paper($num_id,$paper_id){
		$sql = "Select *  from receive  where paper_id = '$paper_id' ";
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
		order by s_date desc ,id desc   limit 1 ";
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
		$sql = "Select remain  from stock_card  where id = '$id' ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'];

}
function update_stock(  $s_date , $amount , $p_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0 ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] + $amount ;
				$sql_up = " UPDATE stock_card SET  remain = '$amount_1'  where id ='$recn[id]' and status = 0 ";
				$result_up = mysql_query($sql_up); 
		}
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

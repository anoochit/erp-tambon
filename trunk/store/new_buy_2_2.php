<? 
session_start();
?>
<?	
if($del =='del'){
	unset($dd2[$array1]); 
	session_unregister("dd2[$array1]");
	echo "<meta http-equiv='refresh' content='0; url=?action=new_buy_2_2'>";
}

if($save <>''){
if(check_paper($pay_id,$paper_id ,$_SESSION[div_id]) <=0){
		$p_id = find_maxid();
		$sql_r = "INSERT INTO pay (p_id,pay_id,pay_date,paper_id, detail,open_name , pay_type , div_id ,dep_name) 
		VALUES('$p_id','$pay_id','".date_format_sql($pay_date)."', '$paper_id' , '$detail' , '$open_name' , '$pay_type' , '$_SESSION[div_id]' ,'$div_id1' )";
		$result_r = mysql_query($sql_r);

if($_SESSION[div_id] =='0'){

		$r_id = find_max_r_id();		
		update_store_dep(date_format_sql($pay_date),$pointer_array,$pay_id,$paper_id,$div_id1,$r_id,$p_id);
}	

	for($o=0;$o<=$pointer_array;$o++){
		$data = split(",", $dd2[$o]); 
		if($data[0]<>''){

		if($data[1] =='') $data[1] = $data[2];
				//-------------------------บันทึกลง pay_detail----------------------------------------
					
				$pd_id1 = find_max_pd_id($p_id);
				$a_mount = $data[3] * $data[6];
				
				$sql_add = "INSERT INTO pay_detail (p_id , pd_id  , product_id  , amount,unit    ) 
				VALUES('$p_id', '$pd_id1' ,'$data[5]','$data[3]','$data[4]' )";
				$result_add = mysql_query($sql_add); 
				//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card
				$k = explode(",",check_stock_1(date_format_sql($pay_date),$data[5] ,$_SESSION[div_id]));
				
				// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
				update_stock(date_format_sql($pay_date),$a_mount,$data[5] ,$_SESSION[div_id] );
				
				$amount_1 =  $k[0] -  $a_mount;
				$sql_add2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain , div_id) 
				VALUES('".date_format_sql($pay_date)."',NOW() , '$pd_id1' , 'P' ,'$data[5]','-$a_mount','$amount_1' ,'$_SESSION[div_id]' )";
				$result_add2 = mysql_query($sql_add2);  

				
				if($_SESSION[div_id] =='0'){
						$rd_id1 = find_max_rd_id($r_id);		
						$sql_add = "INSERT INTO receive_detail (r_id , rd_id  , p_id  , amount , cost , a_cost ,unit ,pd_id ) 
						VALUES('$r_id', '$rd_id1' ,'$data[5]','$data[3]','$data[2]','$data[1]' ,'$data[4]' ,'$pd_id1')";
						$result_add = mysql_query($sql_add); 
				
						$k = explode(",",check_stock_2(date_format_sql($pay_date),$data[5] , $div_id1));
						// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
						update_stock_2(date_format_sql($pay_date),$data[3] ,$data[5] , $div_id1);
						$amount_1 =  $k[0] + $data[3];
						$sql_add_2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain ,div_id ) 
						VALUES('".date_format_sql($pay_date)."',NOW() , '$rd_id1' , 'R' ,'$data[5]','$data[3]', '$amount_1' ,'$div_id1')";
						
						$result_add_2 = mysql_query($sql_add_2); 
	
				}
				unset($dd2[$o]); 
				session_unregister("dd2[$o]");
			} 
		} 
		
	unset($seri); 
	session_unregister("seri");
	echo " <center><br><br>ระบบกำลังบันทึกข้อมูล กรุณารอสักครู่  <br><br>";
	echo "<meta http-equiv='refresh' content='2; url=?action=view_detail_2&p_id=$p_id'>";
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
		$seri = $pay_id."~".$pay_date."~".$paper_id."~".$open_name."~".$pay_type."~".$detail."~".$div_id1;
	}else{	
		$seri = explode("~",$_SESSION[seri]);
		$pay_id=$seri[0];
		$pay_date = $seri[1];
		$paper_id =$seri[2];
		$open_name =$seri[3];
		$pay_type =$seri[4];
		$detail =$seri[5];
		$div_id1 =$seri[6];
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

<form name="f12" method="post"  action="#"  >

<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td colspan="2" align="center"  style="border: #7292B8 1px solid;" >
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		ทะเบียนเบิกพัสดุ</td>
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
  		  		<td  height="25"><div>&nbsp;&nbsp;&nbsp;เบิกพัสดุ</div></td>
  			</tr>
			<tr>
			
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" width="100%">
			  <tr class="bmText">
                <td height="30"><div>เลขที่เบิก</div></td>
                <td width="210" ><div><input type="text" name="pay_id" value="<?=$pay_id?>"  size="15" /></div>                 </td>
			      <td width="95"><div>วันที่เบิก&nbsp;</div></td>
				<? //$date_d = date("d")."/".date("m")."/".(date("Y") + 543)?>
                <td width="238"><div>
                   <input name="pay_date" type="text" id="pay_date" value="<? if($pay_date =='') echo date("d/m/Y") ;else echo $pay_date;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('pay_date','DD/MM/YYYY')"   width='19'  height='19'> </div></td>
              </tr>
			  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
			    <td><div>ทะเบียนเลขที่เบิก</div></td>
			    <td  ><div><? 
				$year  = substr((date("Y") + 543),2);
				$paper_id = check_paper_id($year,$_SESSION[div_id]);
				?>
			      <input name="paper_id" type="text"  value="<?=$paper_id?>" size="20" maxlength="50"></div>				  </td>
				  	  <? if($_SESSION[div_id] =='0'){?>
				  <td><div>หน่วยงานที่&nbsp; </div></td>
                <td><div><?
		$query="select * from division order by div_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?>
	    <select name="div_id1"  >
          <option  value=""> - - - - กรุณาเลือก - - - -</option>
          <? while($d =mysql_fetch_array($result)){		?>
          <option value="<? echo $d[div_id];?>"
		<?
		if($div_id1 == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
          <? }?>
        </select></div>                  </td>
		     <? }?>
</tr>
<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
	<td width="101" height="30"><div>
		ประเภทการเบิก
		</div>	</td>
	<td  ><div >
		<select name="pay_type"  >
          	<option  value="0" <? if($pay_type == 0) echo "selected"?>>การเบิกจ่ายใช้งานตามปกติ</option>
		 	<option  value="1" <? if($pay_type == 1) echo "selected"?>>การโอนให้</option>
		  	<option  value="2" <? if($pay_type == 2) echo "selected"?>>การยืมและการคืน</option>
		</select>
</div></td>
 <td><div>ชื่อผู้เบิก&nbsp; </div></td>
                <td><div><input type="text" name="open_name" value="<?=$open_name?>"  size="20" /></div>                  </td>
</tr>         

<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr>
	<td width="101" class="bmText"><div>
		รายละเอียด
		</div>	</td>
	<td  colspan="3"><div ><textarea name="detail" cols="50" rows="4"><?=$detail?>
</textarea>
	</div></td>
</tr>
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>
<br><center>

<a href="#" onClick="javascript:popup('add_new_2.php?action=add&OK=OK','',600,280);window.navigate('index.php?action=new_buy_2_2')">เพิ่มรายการ
</a>
</center>
<br>

		<br>
		<table width="98%" align="center"cellspacing="1" border="0" style="border-collapse:collapse;">
       <tr class="bmText"  bgcolor="#C9D4E1">
            <td width="54%"  align="center" height="28" style="border: #000000 1px solid;"><b>รายการพัสดุ</b> </td>

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
            <a  	href="?action=new_buy_2_2&del=del&array1=<?=$m?>"  onclick="return godel()">
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
		    if (  document.f12.div_id1.value=='' || document.f12.div_id1.value==' ' )
           {
           alert("กรุณาเลือกหน่วยงานที่เบิก");
           document.f12.div_id1.focus();           
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
	function check_paper($pay_id,$paper_id , $div_id ){
		$sql = "Select *  from pay  where paper_id = '$paper_id' and div_id = '$div_id' ";
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
function check_stock_1($s_date,$p_id ,$div_id){
		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		and div_id = '$div_id'
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

function update_stock(  $s_date , $amount , $p_id , $div_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0 and div_id = '$div_id' ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - $amount ;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' and status = 0 ";
				$result_up = mysql_query($sql_up); 
		}
}

function update_store_dep($date_receive,$pointer_array,$pay_id,$paper_id,$div_id,$r_id,$p_id){

		$tk ="อ้างถึงใบเบิกที่ " .$pay_id;
		$sql_r = "INSERT INTO receive (r_id,date_receive,come_in ,num_id, paper_id, remark, div_id ,pay_id ) 
		VALUES('$r_id','".$date_receive."','$come_in' , '$tk' ,'".paper_id($div_id)."', '$pay_id' ,'$div_id' , '$p_id')";
		$result_r = mysql_query($sql_r);
}
function update_store_dep2($date_receive,$pointer_array,$pay_id,$paper_id,$div_id){
	for($o=0;$o<=$pointer_array;$o++){

		$data = split(",", $dd[$o]); 
		if($data[0]<>''){

		if($data[1] =='') $data[1] = $data[2];
				//-------------------------บันทึกลง receive_detail----------------------------------------
				$rd_id1 = find_max_rd_id($r_id);
				
				$sql_add = "INSERT INTO receive_detail (r_id , rd_id  , p_id  , amount , cost , a_cost ,unit  ) 
				VALUES('$r_id', '$rd_id1' ,'$data[5]','$data[3]','$data[2]','$data[1]' ,'$data[4]')";
				$result_add = mysql_query($sql_add); 
				
				$k = explode(",",check_stock_2($date_receive,$data[5] ));
				// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
				update_stock_2($date_receive,$data[3] ,$data[5]);

				$amount_1 =  $k[0] + $data[3];
				$sql_add2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain ) 
				VALUES('".date_format_sql($date_receive)."',NOW() , '$rd_id1' , 'R' ,'$data[5]','$data[3]', '$amount_1')";
				$result_add2 = mysql_query($sql_add2); 
			}
	}

}
function check_stock_2($s_date,$p_id ,$div_id ){

		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		and  div_id = '$div_id'
		group by id
		order by s_date desc ,id desc   limit 1 ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];

}
function update_stock_2(  $s_date , $amount , $p_id ,$div_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0  and div_id = '$div_id'";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] + $amount ;
				$sql_up = " UPDATE stock_card SET  remain = '$amount_1'  where id ='$recn[id]' and status = 0 ";
				$result_up = mysql_query($sql_up); 
		}

}
function find_max_r_id() {
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
	function paper_id($div_id){
				if( date("m") > '09')	{
					$year = substr((date("Y") + 543+1),2);
			}else{
					$year = substr((date("Y") + 543),2);
			}

					$paper_id = check_paper_id($year , $div_id);
					return $paper_id;
	}
function check_paper_id($year ,$div_id){
		$sql = "Select *  from pay  where paper_id like '%$year%' and  div_id ='$div_id'  order by abs(mid(paper_id,4)) desc  limit 1  ";
		$result = mysql_query($sql); 
		$arr=mysql_fetch_array($result);
		$aa = explode("/",$arr[paper_id]);
		return $year."/".($aa[1] + 1);
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
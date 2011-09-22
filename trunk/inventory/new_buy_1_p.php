
<? 
session_start();
?>
<?	

if($del =='del'){
	unset($dd[$array1]); 
	session_unregister("dd[$array1]");
	echo "<meta http-equiv='refresh' content='0; url=?action=new_buy'>";
}

if($savess2 <>''){
if(check_paper($num_id,$paper_id) <=0){
		$r_id = find_maxid();
		$sql_r = "INSERT INTO receive (r_id,num_id,shop_id,date_receive,come_in , paper_id ) 
		VALUES('$r_id','$num_id','$shop_id','".date_format_sql($date_receive)."','$come_in' , '$paper_id')";
		$result_r = mysql_query($sql_r);
	for($o=0;$o<=$pointer_array;$o++){
		$data = split(",", $dd[$o]); 
		if($data[1]<>''){
				$rd_id1 = find_max_rd_id($r_id);
				$sql_add = "INSERT INTO receive_detail (r_id , rd_id , type_id , rd_name , amount , price , unit , brand_name , type_name , endDate_garan , garan_at , date_garan ) 
				VALUES('$r_id','$rd_id1','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]' ,'$data[6]' ,'$data[7]' ,
				'".date_format_sql($data[8])."','$data[9]' ,
				'".date_format_sql($data[10])."')";
				$result_add = mysql_query($sql_add); 
				if($data[2] >1){
					$cc = "";
					$a = explode("-",$data[5]);
					$code_max = $a[0]."-".$a[1]."-".$a[2]."-";
					for($f=0;$f<$data[2] ;$f++){
						$code_l = $a[3] + $f ;		
						if(strlen($a[3]) >strlen($code_l) ){
								$num = strlen($a[3])-strlen($code_l);
								for($j=0;$j<$num ;$j++){
										$cc .= "0";
								}
								$code_last = $cc.$code_l;
								$code_use = $code_max.$code_last ;
						}else{
								$code_last = $code_l;
								$code_use = $code_max.$code_last ;
						}
							insert_code($rd_id1,$code_use);
						$cc = "";
					} 	
				}elseif($data[2] ==1){ 
					$code_use = $data[5] ;
					insert_code($rd_id1,$code_use);
				}
				unset($dd[$o]); 
				session_unregister("dd[$o]");
			}
		} 
	unset($seri); 
	session_unregister("seri");
	echo " <center><br><br>ระบบกำลังบันทึกข้อมูล กรุณารอสักครู่  <br><br>";
	echo "<meta http-equiv='refresh' content='2; url=?action=view_detail&r_id=$r_id'>";
	echo "</center>";
	}else{
	echo " <center><br><br>เลขที่ใบส่งของ และ ทะเบียนเอกสารซ้ำ <br><br>";
	echo "</center>";
	}
}
if($btnSub <>''){ 
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
		$seri = $num_id."~".$shop_id."~".$date_receive."~".$come_in."~".$paper_id."~".$product;
	}else{	
		$seri = explode("~",$_SESSION[seri]);
		$num_id =$seri[0];
		$shop_id = $seri[1];
		$date_receive =$seri[2];
		$come_in =$seri[3];
		$paper_id =$seri[4];
		$product =$seri[5];
		 $seri = $seri[0]."~".$seri[1]."~".$seri[2]."~".$seri[3]."~".$seri[4]."~".$seri[5]; 
	}
?>

<title>ใบส่งของ</title>
<script type="text/javascript" src="myAjax.js" ></script>
<script language="javascript">
	var CompleteDataUrl ="completeData.php";
	function getHint(){
		var param = "product=" + document.getElementById("product").value;
		postDataReturnText(CompleteDataUrl,param,displayHint);
	}
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
<body  >
<form name="f166" method="post"  action="?action=new_buy_p"  onSubmit="return check(this);"  >
<br>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center"    >
  <tr>
    <td align="center" colspan="2" style="border: #66CCFF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		ทะเบียนอสังหาริมทรัพย์</td>
	</tr>
</table></td>
</tr>
</table>
<br>
        <table  border="0" cellpadding="1" cellspacing="1"  width="68%" align="center">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="85%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
	  		  <td  height="25" >&nbsp; เพิ่มทะเบียนอสังหาริมทรัพย์	</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="650">
			  <tr class="bmText">
			    <td>ทะเบียนเลขที่รับ</td>
			    <td width="505">
				<? 
			if( date("m") > '09')	{
					$year = substr((date("Y") + 543+1),2);
			}else{
					$year = substr((date("Y") + 543),2);
			}

					$paper_id = check_paper_id($year);
				?>
			      <input name="paper_id" type="text"  value="<?=$paper_id?>" size="20" maxlength="50">				  </td>
		      </tr>
			  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr>
                <td width="138" class="bmText">วันที่ได้กรรมสิทธิ์</td>
                <td><input name="date_receive" type="text" id="date_receive" value="<? if($date_receive =='') echo date("d/m/Y") ;else echo $date_receive;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive','DD/MM/YYYY')"   width='19'  height='19'>  </td>
              </tr>
			  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr>
	<td width="138" class="bmText">
		วิธีการได้มา</td>
	<td>
	  <select name="come_in">
	  <option value='' <? if($come_in =='') echo "selected"?>>----------กรุณาเลือก----------</option>
	  <option value='0' <? if($come_in =='0') echo "selected"?>>รายได้</option>
	  <option value='1' <? if($come_in =='1') echo "selected"?>>อุดหนุน</option>
	    <option value='2' <? if($come_in =='2') echo "selected"?>>บริจาค</option>
		  <option value='3' <? if($come_in =='3') echo "selected"?>>เงินกู้</option>
	  <option value='4' <? if($come_in =='4') echo "selected"?>>อื่นๆ</option>
		</select></td>
</tr>      
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="ตกลง"   onClick="return check(this)" class="buttom">&nbsp;
                    <input type="reset" name="formbutton2" value="ยกเลิก" class="buttom">    </td>
                </tr> 
            </table></td>
			</tr>
		</table>

	</td>
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

</script>

<script language="JavaScript" type="text/javascript">
	function check(theForm) 
	{
		if (  document.f166.num_id.value=='' || document.f166.num_id.value==' ' )
           {
           alert("กรุณากรอกใบส่งของ");
           document.f166.num_id.focus();           
           return false;
           }
		   if (  document.f166.product.value=='' || document.f166.product.value==' ' )
           {
           alert("กรุณากรอกการซื้อ / จ้าง / ได้มา จาก");
           document.f166.product.focus();           
           return false;
           }
		    if (  document.f166.date_receive.value=='' || document.f166.date_receive.value==' ' )
           {
           alert("กรุณากรอกวันที่ ซื้อ / จ้าง / ได้มา");
           document.f166.date_receive.focus();           
           return false;
           }
		    if (  document.f166.come_in.value=='' || document.f166.come_in.value==' ' )
           {
           alert("กรุณากรอกการใช้งบ");
           document.f166.come_in.focus();           
           return false;
           }
				return true;

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
		if($max == NULL or $max == ''){ 
			$r_id = "1";
		} else{
			$r_id =  $max + 1; 
		}
		return $r_id;
	}
	
	function find_max_rd_id($r_id) {
	
		$sql = "Select max(rd_id) as max  from receive_detail  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ 
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1; 
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
		$sql = "Select *  from receive  where (num_id = '$num_id' or paper_id = '$paper_id')  ";
		$result = mysql_query($sql); 
		$recn=mysql_num_rows($result);
		return $recn;
}
function check_paper_id($year){
		$sql = "Select *  from receive  where paper_id like '%$year%' and type = 1 order by abs(paper_id) desc  limit 1  ";
		$result = mysql_query($sql); 
		$arr=mysql_fetch_array($result);
		$aa = explode("-",$arr[paper_id]);
		return ($aa[0] + 1)."-".$year;
}
?>

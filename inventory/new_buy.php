
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
		$sql_r = "INSERT INTO receive (r_id,num_id,shop_id,date_receive,come_in , paper_id,type ,planname,project ,rep_id , shop_name ) 
		VALUES('$r_id','$num_id','','".date_format_sql($date_receive)."','$come_in' , '$paper_id' ,'0' ,'$planname', '$project','$rep_id','$shop_id')";
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
	echo "<meta http-equiv='refresh' content='2; url=?action=view_detail_1&r_id=$r_id'>";
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
		$seri = $num_id."~".$shop_id."~".$date_receive."~".$come_in."~".$paper_id."~".$product."~".$planname."~". $project."~".$rep_id;
	}else{	
		$seri = explode("~",$_SESSION[seri]);
		$num_id =$seri[0];
		$date_receive =$seri[2];
		$come_in =$seri[3];
		$paper_id =$seri[4];
		$product =$seri[5];
		$planname =$seri[6];
		$project =$seri[7];
		$rep_id =$seri[8];
		$seri = $seri[0]."~".$seri[1]."~".$seri[2]."~".$seri[3]."~".$seri[4]."~".$seri[5]."~".$seri[6]."~".$seri[7]."~".$seri[8]; 
	}
?>

<title>ใบส่งของ</title>
<script type="text/javascript" src="myAjax.js" ></script>
<script language="JavaScript" src="calendar.js"></script>
<script language="javascript">
	var CompleteDataUrl ="completeData.php";
	function getHint(){
		var param = "product=" +  document.f12.product.value;
		postDataReturnText(CompleteDataUrl,param,displayHint);
		
	}
	
 	function displayHint(text){
		document.getElementById("hint").innerHTML = text;
	}
	
	function populateName(text){
		var r;
		var ret = text;
		
		r =ret.split('@')
		document.f12.shop_id.value = r[1];
		document.f12.product.value = r[0];
		document.getElementById("hint").innerHTML = '';
		//window.close();
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
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
     req.send(null); 

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
<link href="style2.css" rel="stylesheet" type="text/css">
<body  >

<form name="f12" method="post"  action="#"  >
<br>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center"    >
  <tr>
    <td align="center" colspan="2" style="border: #66CCFF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		ทะเบียนรับครุภัณฑ์	</td>
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
	  		  <td  height="25" >&nbsp; ใบสั่งของ</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="650">
 
			  <tr class="bmText">
			    <td height="30">ใบส่งของที่</td>
			    <td width="222">
			      <input name="num_id" type="text" id="num_id" value="<?=$num_id?>" size="20" maxlength="50"><!--<input type="hidden" name="num_id" value="<?=$num_id?>" > -->			   </td>
		      
			    <td>ทะเบียนเอกสาร</td>
			    <td width="249"><? 
				?>
			      <input name="paper_id" type="text"  value="<?=$paper_id?>" size="20" maxlength="50">
				  </td>
		      </tr>
			  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
                <td height="30">จากร้าน</td>
				
                <td colspan="3">
		
				<!--<select name="shop_id"  >
                    <option value='' <? if( $shop_id == '') echo "selected"?>>----------กรุณาเลือก----------</option>
				<?
			$query  ="select * from shop group by id order  by shop_name ";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?>
                    <?
			while($d =mysql_fetch_array($result)){
				
	?>
                    <option value="<? echo $d[id];?>"
		<?
		if($shop_id== $d[id]) echo "selected";
		?>
		><? echo $d[shop_name]." <font color='red'>&nbsp;&nbsp; ที่อยู่ &nbsp;&nbsp;</font>".$d[shop_address] ;?></option>
                    <? }?>
                  </select> -->
				  <input type="text" name="shop_id" size="40" value="<?=$shop_id?>" >
				<!--<input type="text" name="product" size="60" value="<?=$product ?>" onKeyUp="getHint()" >
				<div id="hint"></div>
				  <input type="hidden" name="shop_id" value="<?=$shop_id?>" > -->		
				   </td>
              </tr>
			  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
			  <tr>
                <td width="73" height="30" class="bmText">วันที่รับ</td>
                <td><input name="date_receive" type="text" id="date_receive" value="<? if($date_receive =='') echo date("d/m/Y") ;else echo $date_receive;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive','DD/MM/YYYY')"   width='19'  height='19'>  </td>
         
	<td width="93" class="bmText">
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
<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
			    <td height="30">แผนงาน</td>
			    <td width="222">
			      <input name="planname" type="text" id="planname" value="<?=$planname?>" size="30" >			   </td>
		 
		

			    <td>โครงการ</td>
			    <td width="249">
			      <input name="project" type="text"  value="<?=$project?>" size="30" >
				  </td>
				  
		      </tr>
			  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
			    <td height="30">เลขที่สัญญา</td>
			    <td  colspan="3">
			      <input name="rep_id" type="text" id="rep_id" value="<?=$rep_id?>" size="20"  maxlength="50">		   </td>  
		      </tr>
			
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>
<? //if($OK <>''){ ?>
<br><center>

<a href="#" onClick="javascript:popup('add_new.php?action=add&OK=OK','',750,450);">เพิ่มรายการ
</a>


</center>
<br>

		<br>
		<table width="98%"  align="center" cellspacing="0">
                                                    <tr>
                                                        <td  >        

                                          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="100%" align="center">
											  <table width="100%" align="center"cellspacing="1" border="0" style="border-collapse:collapse;">
                                                <tr class="bmText"  bgcolor="#C1E0FF">
 
                                                  <td width="18%" height="30" align="center" style="border: #000000 1px solid;">ประเภท</td>
                                                  <td width="27%"  align="center" style="border: #000000 1px solid;">ชื่อครุภัณฑ์</td>
												  <!--<td width="13%"  align="center">อายุการใช้งาน</td> -->
                                                  <td width="7%"  align="center" style="border: #000000 1px solid;">จำนวน</td>
                                                  <td width="11%"   align="center" style="border: #000000 1px solid;">ราคา / หน่วย</td>
											      <td width="8%"   align="center" style="border: #000000 1px solid;">หน่วย</td>
                                                  <td width="22%"  align="center" style="border: #000000 1px solid;">เลขครุภัณฑ์</td>
                                                  <td width="7%"  align="center" style="border: #000000 1px solid;"> ลบ</td>
                                                </tr>
                                                <?





for($m=0;$m<=$pointer_array;$m++){



	$data = split(",", $dd[$m]); 
if($data[1]  <>""){

	if($data[2] >1){
		$cc = "";
		$a = explode("-",$data[5]);
		$code_l = ($a[3] + $data[2] -1) ;			
	
		if(strlen($a[3]) >strlen($code_l) ){
			$num = strlen($a[3])-strlen($code_l);
			for($aa=0;$aa<$num ;$aa++){
					$cc .= "0";
			}
			$code_last = $cc.$code_l;
			$cc = "";
		}else{
			$code_last = $code_l;
		}
	
	}
		 ?>
                                                <tr bgcolor="#e8edff">
                                                  <td style="border: #000000 1px solid;" align="left"><font size="2">&nbsp;<? echo fild_type($data[0]); ?></font></td>
                                                  <td style="border: #000000 1px solid;"><font size="2">&nbsp;<? echo $data[1]; ?>
	 <input  type="hidden" name='chk[<?=$i?>]' value="<? echo $data[1]?>"></font></td>
                                                  <td style="border: #000000 1px solid;"  align="center"><font size="2">&nbsp;<? echo $data[2];  ?></font></td>
                                                  <td style="border: #000000 1px solid;" align="center"><font size="2">&nbsp;<? echo $data[3];  ?></font></td>
                                              <td style="border: #000000 1px solid;" align="center"><font size="2">&nbsp;<? echo $data[4];  ?></font></td>
                                                 <td style="border: #000000 1px solid;" align="left"><font size="2">&nbsp;<? 
	echo $data[5];
	if($data[2] >1) echo " ถึง ".$code_last;
												  ?></font></td>
                                                  <td align="center" style="border: #000000 1px solid;"><font size="2"><a  href="?action=new_buy&del=del&array1=<?=$m?>" onClick="return godel();">
                                                    <img src="images/Delete.png" border="0" /> </a></font></td>
                                                </tr>
                                                <? 
											

	}
}
?><input  type="hidden"  name="total" value="<?=$m?>">
                                                <tr>
                                                  <td colspan="7" align="center"  height="32" style="border: #000000 1px solid;"><font face="MS Sans Serif">
<input type="submit" name="savess2" value=" ยืนยันการตรวจรับ "  onClick="return validate();"  class="buttom">
                                                  &nbsp; 
<input name="btnSub"  type="submit" value=" ยกเลิก " onClick="return q_cencel()" class="buttom">
                                                 
                                                  &nbsp;</font> </td>
                                                </tr>
                                              </table></td>
                                            </tr>
            </table> 
                    </td>
                                            </tr>
  </table>
<? //}?>
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
	function validate(theForm) 
	{
		if (  document.f12.num_id.value=='' || document.f12.num_id.value==' ' )
           {
           alert("กรุณากรอกเลขที่ใบส่งของ");
           document.f12.num_id.focus();           
           return false;
           }
		    if (  document.f12.shop_id.value=='' || document.f12.shop_id.value==' ' )
           {
           alert("กรุณากรอกการชื่อร้าน");
           document.f12.shop_id.focus();           
           return false;
           }
		    if (  document.f12.date_receive.value=='' || document.f12.date_receive.value==' ' )
           {
           alert("กรุณากรอกวันที่ซื้อ");
           document.f12.date_receive.focus();           
           return false;
           }
		    if (  document.f12.come_in.value=='' || document.f12.come_in.value==' ' )
           {
           alert("กรุณากรอกการใช้งบ");
           document.f12.come_in.focus();           
           return false;
           }
		   if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่")){
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
		$sql = "Select *  from receive  where (num_id = '$num_id' and paper_id = '$paper_id') and type = 0 ";
		$result = mysql_query($sql); 
		$recn=mysql_num_rows($result);
		return $recn;
}

function check_paper_id($year){
		$sql = "Select *  from receive  where paper_id like '%$year%' and type = 0 order by abs(mid(paper_id,4)) desc limit 1  ";
		$result = mysql_query($sql); 
		$arr=mysql_fetch_array($result);
		$aa = explode("/",$arr[paper_id]);
		return $year."/".($aa[1] + 1);
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

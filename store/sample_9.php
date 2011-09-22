<?
session_start();
include('config.inc.php');

if($OK <> '' ){
				$date_receive = $date_receive;
				$rd_id1 = find_max_rd_id($r_id);		
				if($sel == 0) {
						$unit = $unit1;
						$a_unit = $a_unit1;
				}
				if($sel == 1){
						$unit = $unit2;
						$a_unit = $a_unit2;
				}
				
					$pd_id1 = find_max_pd_id($pay_id);	
					
				// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
				$a_amount = $amount * $a_unit;
				
				update_stock($date_receive,$a_amount,$p_id , $_SESSION[div_id]);
				//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card
				$k = explode(",",check_stock_1($date_receive,$p_id , $_SESSION[div_id] ));
				$amount_1 =  $k[0] + $a_amount;
				$sql_add2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain,div_id  ) 
				VALUES('".$date_receive."',NOW() , '$rd_id1' , 'R' ,'$p_id','$a_amount','$amount_1','$_SESSION[div_id]' )";
				$result_add2 = mysql_query($sql_add2); 
				
				$sql_add = "INSERT INTO receive_detail (r_id , rd_id  , p_id  , amount , cost , a_cost , unit   , pd_id) 
				VALUES('$r_id', '$rd_id1' ,'$p_id','$amount','$cost','$c_cost','$unit' , '$pd_id1' )";
				$result_add = mysql_query($sql_add); 
				
				
				if($pay_id <>'0' ){
							update_stock_2($date_receive,$a_amount,$p_id , '0');
							//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card
							$k = explode(",",check_stock_2($date_receive,$p_id ,'0'));

							$amount_1 =  $k[0] - $amount;
							$sql_add2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain , div_id  ) 
							VALUES('".$date_receive."',NOW() , '$pd_id1' , 'P' ,'$p_id','-$a_amount','$amount_1' ,'0' )";
							$result_add2 = mysql_query($sql_add2); 
				
							$sql_add = "INSERT INTO pay_detail (p_id , pd_id  , product_id  , amount  , unit ) 
							VALUES('$pay_id', '$pd_id1' ,'$p_id','$amount' ,'$unit'  )";
			    			$result_add = mysql_query($sql_add); 
				
				}
				
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
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<link rel="stylesheet" type="text/css" href="default.css">
<script type="text/javascript" src="myAjax.js" ></script>
<script language="javascript">
	var CompleteDataUrl ="completeData_2.php";
	//ค้นหาคำใกล้เคียง
	function getHint(){
		var param = "product=" + document.f22.product.value;  
		postDataReturnText(CompleteDataUrl,param,displayHint);
		
	}
	
	//แสดงผลลัพท์การค้นหา
 	function displayHint(text){
		document.getElementById("hint").innerHTML = text;
	}
	
	function populateName(text){
		var r;
		var ret = text;
		
		r =ret.split('^')
			document.f22.product.value = r[0];
		document.f22.unit1.value = r[1];
		document.f22.unit2.value = r[2];
		document.f22.p_id.value = r[3];
		document.f22.a_unit1.value = r[4];
		document.f22.a_unit2.value = r[5];
		document.f22.sel[1].checked = true;
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

//dochange จะถูกเรียกเมื่อมีการเลือก รายการ Combobox ซึ่งจะทำให้ไปเรียก AJAX เพื่อร้องขอข้อมูลถัดไปจาก Server
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
function time(val){

var result;
var url = 'ajax_1.php?p_id=' + val; 
xmlhttp = uzXmlHttp();
xmlhttp.open("GET", url, false);
xmlhttp.send(null); 
result = xmlhttp.responseText;
r =result.split('^');
		document.f22.product.value = r[0];
		document.f22.unit1.value = r[1];
		document.f22.unit2.value = r[2];
		document.f22.p_id.value = r[3];
		document.f22.a_unit1.value = r[4];
		document.f22.a_unit2.value = r[5];
		document.f22.sel[1].checked = true;

}
</script>
<body>

<form action="" method="post" name="f22"  onSubmit="return check(this);" >
<br>
<input type="hidden" name="r_id" value="<?=$r_id?>">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
      <tr> 
        <td  colspan="2" style="border: #7292B8 1px solid;"  >
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr class="lgBar">
			   <td  height="32"><div>&nbsp;&nbsp;&nbsp;รายละเอียดพัสดุ</div></td> 
            </tr>
			
            <tr>
              <td  valign="top"><table name="add" cellpadding="1" cellspacing="1" border="0" width="100%">
				<tr class="bmText_1" height="25">
                    <td width="20%"><div>ประเภทพัสดุ</div></td>
			
                    <td width="80%"><div><?
			$query  ="select * from type where status =0  group by p_type  order by t_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?><select name="type_id"  onchange="dochange('product2', this.value);">
        <option value=''>----------กรุณาเลือก----------</option>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[t_id];?>"
		<?
		if($type_id == $d[t_id]) echo "selected";
		?>
		><? echo $d[p_type];?></option>
                        <? }?>
            </select></div>				</td>
    </tr>
	 <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
    <td height="30"><div>ชื่อพัสดุ</div></td>
    <td><div id="product2"    ><?	
          echo "<select name='p_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        
		 echo "</select>\n";  
?>

	</div>	</td>
  </tr> 
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="327" class="bmText_1"><div> ราคา/หน่วย</div></td>
                    <td><div>
                      <input name="cost" type="text" id="cost" value="" >
</div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="327" class="bmText_1"><div> จำนวน </div></td>
                    <td><div>
                        <input name="amount" type="text" id="amount" value="" size="10" maxlength="10" >
                    </div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="327" class="bmText_1"><div> หน่วยนับ </div></td>
                    <td width="399"><div id='dep_id1'><input type="radio" name="sel" value="0"  id="sel">&nbsp;
					  <input name="unit1" type="text" id="unit1" value="" size="10"  >
					  <input name="a_unit1"  type="hidden" id="a_unit1"  >
					&nbsp;  <input type="radio" name="sel" value="1">&nbsp;
					  <input name="unit2" type="text" id="unit2" value="" size="10">
					  <input name="a_unit2"  type="hidden" id="a_unit2"  >
					  <input type="hidden" name="product" value="<?=$product?>" id="product">
					
                    </div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="ตกลง"   class="buttom">
                    &nbsp;&nbsp;<input type="reset" name="formbutton2" value="ยกเลิก" class="buttom">    </td>
                </tr>
              </table>
              </td>
            </tr>
        </table></td>
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

function godel()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>
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
</script>
  <script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function check(theForm) 
	{
		if (  document.f22.product.value=='' || document.f22.product.value==' ' )
           {
           alert("กรุณากรอกรายละเอียดพัสดุที่ขอซื้อ");
           document.f22.product.focus();           
           return false;
           }
		      if (  document.f22.p_id.value=='' || document.f22.p_id.value==' ' )
           {
           alert("กรุณากรอกรายละเอียดพัสดุที่ขอซื้อให้ถูกต้อง");
           document.f22.product.focus();      
           return false;
           }
		   if (  document.f22.cost.value=='' || document.f22.cost.value==' ' )
           {
          	 alert("กรุณากรอกราคาต่อหน่วย");
          	 document.f22.cost.focus();           
          	 return false;
           }
		   if (  document.f22.amount.value=='' || document.f22.amount.value==' ' )
           {
          	 alert("กรุณากรอกจำนวน");
          	 document.f22.amount.focus();           
          	 return false;
           }
		   if (  document.f22.sel[0].checked == false  && document.f22.sel[1].checked == false)
           {
          	 alert("กรุณาเลือกหน่วยนับ");          
          	 return false;
           }
		   if (confirm("คุณต้องการเพิ่มข้อมูล ใช่หรือไม่"))
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
	
	function update_stock( $s_date , $amount , $p_id , $div_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0 and div_id = '$div_id' ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] + $amount ;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' and status = 0";
				$result_up = mysql_query($sql_up); 
		}
}
function check_stock_1($s_date,$p_id,$div_id){
		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		 and div_id ='$div_id'
		group by id
		order by s_date desc ,id desc   limit 1 ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];
}

function check_stock_2($s_date,$p_id ,$div_id){
		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		and div_id = '$div_id'
		group by id
		order by s_date desc ,id desc   limit 1  ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];
}

function update_stock_2(  $s_date , $amount , $p_id , $div_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0 and div_id = '$div_id' ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - $amount ;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' and status = 0 ";
				$result_up = mysql_query($sql_up); 
		}
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
?>
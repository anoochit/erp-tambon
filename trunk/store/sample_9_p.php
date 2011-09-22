<?
session_start();
include('config.inc.php');

if($OK <> '' ){
				$pay_date = $pay_date;
				$pd_id1 = find_max_pd_id($p_id);		
				
				$unit = $unit1;
				$a_unit = $a_unit1;
				
				// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
				$amount = $amount * $a_unit;
				
				update_stock($pay_date,$amount,$product_id , $_SESSION[div_id]);
				//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card
				$k = explode(",",check_stock_1($pay_date,$product_id ,$_SESSION[div_id]));
				$amount_1 =  $k[0] - $amount;
				$sql_add2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain , div_id  ) 
				VALUES('".$pay_date."',NOW() , '$pd_id1' , 'P' ,'$product_id','-$amount','$amount_1' ,'$_SESSION[div_id]' )";
				$result_add2 = mysql_query($sql_add2); 

				
				$sql_add = "INSERT INTO pay_detail (p_id , pd_id  , product_id  , amount  , unit ) 
				VALUES('$p_id', '$pd_id1' ,'$product_id','$amount' ,'$unit'  )";
			    $result_add = mysql_query($sql_add); 
				
	
				$r_id = r_id($p_id);	
				$rd_id1 = find_max_rd_id($r_id);	
				update_stock_2($pay_date,$amount,$product_id , $div_id1);
				//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card
				$k = explode(",",check_stock_2($pay_date,$product_id , $div_id1));

				$amount_1 =  $k[0] + $amount;
				$sql_add2 = "INSERT INTO stock_card ( s_date , s_time , num_id , s_type , p_id , amount ,remain ,div_id  ) 
				VALUES('".$pay_date."',NOW() , '$rd_id1' , 'R' ,'$product_id','$amount','$amount_1' , '$div_id1' )";
				$result_add2 = mysql_query($sql_add2); 

				
				$sql_add = "INSERT INTO receive_detail (r_id ,rd_id , p_id  , amount , cost , a_cost , unit , pd_id   ) 
				VALUES('$r_id'  , '$rd_id1' ,'$product_id','$amount','$cost','$c_cost','$unit','$pd_id1' )";
				$result_add = mysql_query($sql_add); 

				
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
		document.f22.product_id.value = r[3];
		document.f22.a_unit1.value = r[4];
		document.f22.a_unit2.value = r[5];
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
		document.f22.a_unit1.value = r[4];
		document.f22.a_unit2.value = r[5];
		document.f22.amount1.value = r[6];
		document.f22.amount2.value = r[6];
}
</script>

<body>

<form action="" method="post" name="f22"  onSubmit="return check(this);" >
<br>
<input type="hidden" name="p_id" value="<?=$p_id?>">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
      <tr> 
        <td  colspan="2" style="border: #7292B8 1px solid;"  >
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr class="lgBar">
			   <td  height="32"><div>&nbsp;&nbsp;&nbsp;รายละเอียดพัสดุ</div></td> 
            </tr>
			
            <tr>
              <td ><table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
                 
				  <tr class="bmText_1" height="25">
                    <td width="153"><div>ประเภทพัสดุ</div></td>
			
                    <td width="569"><div><?
			$query  ="select * from type where status =0  group by p_type  order by t_id";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?><select name="type_id"  onchange="dochange('product3', this.value);">
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
    <td><div id="product3"    ><?	
          echo "<select name='product_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        
		 echo "</select>\n";  
?>

	</div>	</td>
  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr class="bmText_1">
                    <td width="153"><div> จำนวนที่เบิก </div></td>
                    <td><div>
                        <input name="amount" type="text" id="amount" value="" size="10" maxlength="10" >
						 จำนวนคงเหลือ <input name="amount1"  type="text"   value="" id="amount1" disabled="disabled"   size="5">
					    <input type="hidden" name="amount2" value="<?=$amount1?>"  id="amount2" > 
                    </div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="153" class="bmText_1"><div> หน่วยนับ </div></td>
                    <td width="569"><div id='dep_id1'>
                    <input name="unit1" type="text" id="unit1" value="" size="30" maxlength="255">
					  <input name="a_unit1"  type="hidden" id="a_unit1"  >
					  <input name="unit2" type="hidden" id="unit2" value="" size="10">
					  <input name="a_unit2"  type="hidden" id="a_unit2"  >
					    <input type="hidden" name="product" value="<?=$product?>" id="product">
                    </div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="ตกลง"  >
                    <input type="reset" name="formbutton2" value="ยกเลิก">    </td>
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
	
		     if (  document.f22.type_id.value=='' || document.f22.type_id.value==' ' )
           {
           alert("กรุณาเลือกประเภทพัสดุ");
           document.f22.type_id.focus();           
           return false;
           }
		   if (  document.f22.product_id.value=='' || document.f22.product_id.value==' ' )
           {
           alert("กรุณาเลือกพัสดุ");
           document.f22.product_id.focus();           
           return false;
           }
		   if (  document.f22.amount.value=='' || document.f22.amount.value==' ' )
           {
           alert("กรุณากรอกจำนวน");
           document.f22.amount.focus();           
           return false;
           }
		    	if(eval(document.f22.amount.value) > eval(document.f22.amount2.value) ){
					alert("จำนวนที่เบิกมากกว่าจำนวนคงเหลือ");
					document.f22.amount.focus();  
					return false;
			}
		   if (confirm("คุณต้องการบันทึก ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}

}
</script>
<?

function find_max_pd_id($r_id) {
	
		$sql = "Select max(pd_id) as max  from pay_detail  ";
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
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0 and div_id ='$div_id'";

		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - $amount ;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' ";
	
				$result_up = mysql_query($sql_up); 
		}
}
function check_stock_1($s_date,$p_id , $div_id ){

		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		and div_id ='$div_id'
		group by id
		order by s_date desc ,id desc   limit 1";

		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];
}

	function update_stock_2( $s_date , $amount , $p_id , $div_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0  and div_id ='$div_id' ";

		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] + $amount ;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' and status = 0";

				$result_up = mysql_query($sql_up); 
		}
}
function check_stock_2($s_date,$p_id ,$div_id ){

		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		and div_id = '$div_id'
		group by id
		order by s_date desc ,id desc   limit 1 ";

		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];
}

function r_id($p_id) {
	
		$sql = "Select r_id  from receive where pay_id = '$p_id' ";

		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		return $recn[r_id];
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
?>

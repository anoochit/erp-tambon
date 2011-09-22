<?
include('config.inc.php');

if($Go <> '' ){
				$rd_id1 = find_max_rd_id($r_id);
				$sql_add = "INSERT INTO receive_detail (r_id , rd_id , type_id , rd_name , amount , price , unit , brand_name , type_name , endDate_garan , garan_at , date_garan) 
				VALUES('$r_id','$rd_id1','$type','$rd_name','$amount','$price','$unit' , '$brand_name' , '$type_name' , '".date_format_sql($endDate_garan)."' , '$garan_at' ,  '".date_format_sql($date_garan)."')";
				$result_add = mysql_query($sql_add); 
				echo $sql_add."<br>";
				
				$code = $_POST[code1]."-".$_POST[code2]."-".$_POST[code3]."-".$_POST[code4];
				if($amount >1){
					$cc = "";
					$a = explode("-",$code);
					$code_max = $a[0]."-".$a[1]."-".$a[2]."-";
					for($f=0;$f<$amount ;$f++){
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
				}elseif($amount ==1){ 
					$code_use = $code ;
					insert_code($rd_id1,$code_use);
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
<script language="JavaScript" src="include/calendar.js"></script>
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

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
<script language="JavaScript">
	function dochange(src) {
					val = document.f22.code1.value;
					val1 = document.f22.code2.value;
					val2 = document.f22.code3.value;
			window.open("sample_3_1.php?code1="+val +"&code2="+ val1+"&code3="+ val2,"xxx111","toolbar=yes,location=yes,status=yes, menubar=yes,scrollbars=yes,width=400,height=450");
	}
</script>  
<body>

<form action="" method="post" name="f22" >
<br>
<input type="hidden" name="r_id" value="<?=$r_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="100%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr  >
		      <td  height="32" bgcolor="#FFCC99" class="tbETitle">&nbsp;&nbsp;&nbsp;เพิ่มรายการครุภัณฑ์</td> 
            </tr>
            <tr>
              <td height="191"><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
                  <tr class="bmText_1" height="25">
                    <td>ประเภท</td>
			
                    <td>
					
					  <?
			$query  ="select * from type where  type_id =0  group by type_name  order by t_id";
			$result=mysql_query($query);
			?>
        <select name="type"  >
        <option value='0'>----------กรุณาเลือก----------</option>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[t_id];?>"
		<?
		if($type == $d[t_id]) echo "selected";
		?>
		><? echo $d[type_name];?></option>
                        <? }?>
                      </select>
				</td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="184" class="bmText_1"height="25">ชื่อครุภัณฑ์ </td>
                    <td class="bmText_1">
                      <input type="text"  id="rd_name" name="rd_name" size="60" maxlength="255" value="<?=$rd_name?>" >                        
                     
                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="184" class="bmText_1" height="25">จำนวนที่รับ </td>
                    <td>
                      <input name="amount" type="text"  value="<?=$amount?>"  size="10" maxlength="7" >
</td>
                  </tr>
				   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="184" class="bmText_1" height="25">ราคา/หน่วย </td>
                    <td>
					   <input name="price" type="text" value="<?=$price?>"  >
                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr class="bmText_1">
                    <td  height="25">หน่วย </td>
                    <td><input name="unit" type="text" value="<?=$unit?>"  ></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr class="bmText_1" height="25">
                    <td width="184">เลขครุภัณฑ์</td>
                    <td width="552"><input type="text" name="code1" size="6" onKeyUp="doNext(this);"  maxlength="3" value="<?=$code1?>"  >
-
<input type="text" name="code2" size="6" onKeyUp="doNext(this);" maxlength="3"   value="<?=$code2?>"  >
-
<input type="text" name="code3" size="6" onKeyUp="doNext(this);"  maxlength="2"  value="<?=$code3?>"  > 
-
เลขที่เริ่มต้น
<input type="text" name="code4"  size="6"  value="<?=$code4?>"   > &nbsp;<input type="submit" name="find" value="หาเลขครุภัณฑ์"  onClick="dochange('find_in');"><br></td>
 </tr>
 <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
                    <td width="184" class="bmText_1"height="25">ชื่อ / ยี่ห้อผู้ทำหรือผลิต</td>
                    <td class="bmText_1">
                      <input type="text"  id="brand_name" name="brand_name" size="50" maxlength="255"  value="<?=$brand_name?>"  >                        
                     
                    </td>
                </tr>
				<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="184" class="bmText_1"height="25">แบบ / ชนิด / ลักษณะ</td>
                    <td class="bmText_1">
                      <input type="text"  id="type_name" name="type_name" maxlength="255"  value="<?=$type_name?>">                        
                     
                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="184" class="bmText_1"height="25">พัสดุรับประกันถึงวันที่</td>
                    <td class="bmText_1">
                    <input name="endDate_garan" type="text" id="endDate_garan" value="<? if($endDate_garan =='') echo date("d/m/Y") ;else echo $endDate_garan;?>"  size="10" />
			
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('endDate_garan','DD/MM/YYYY')"   width='19'  height='19'>                   
                     
                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="184" class="bmText_1"height="25">พัสดุประกันไว้ที่บริษัท</td>
                    <td class="bmText_1">
                      <input type="text"  id="garan_at" name="garan_at" size="50" maxlength="255"  value="<?=$garan_at?>">                        
                     
                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="184" class="bmText_1"height="25">วันที่ประกันพัสดุ </td>
                    <td class="bmText_1">
                      <input name="date_garan" type="text" id="date_garan" value="<? if($date_garan =='') echo date("d/m/Y") ;else echo $date_garan;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_garan','DD/MM/YYYY')"   width='19'  height='19'>                         
                     
                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="Go" value=" บันทึก "  onClick="return godel();" class="buttom">&nbsp;
                    </td>
                </tr>
              </table>
              </td>
            </tr>
        </table></td>

	</td>

   
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

<?
function insert_code($rd_id,$code){
		$sql_add = "INSERT INTO code (rd_id,code) 
		VALUES('$rd_id','$code')";
		echo $sql_add."<br>";
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
			$rd_id =  $max + 1; //gene ค่า sale_id 
		}
		return $rd_id;
	}
?>
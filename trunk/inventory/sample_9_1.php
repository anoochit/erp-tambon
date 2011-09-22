<?
include('config.inc.php');

if($Go <> '' ){
				$rd_id1 = find_max_rd_id($r_id);
				$sql_add = "INSERT INTO receive_detail (r_id , rd_id , type_id , rd_name , amount , price , unit , brand_name , type_name , endDate_garan , garan_at , date_garan) 
				VALUES('$r_id','$rd_id1','$type','$rd_name','$amount','$price','$unit' , '$brand_name' , '$type_name' , '".date_format_sql($endDate_garan)."' , '$garan_at' ,  '".date_format_sql($date_garan)."')";
				$result_add = mysql_query($sql_add); 
				echo $sql_add."<br>";
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
			window.open("sample_3_1.php?code1="+val +"&code2="+ val1+"&code3="+ val2,"xxx111","toolbar=yes,location=yes,status=yes, menubar=yes,scrollbars=yes,width=300,height=450");
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
		      <td  height="32" bgcolor="#FFCC99" class="tbETitle">&nbsp;&nbsp;&nbsp;ข้อมูลทะเบียนอสังหาริมทรัพย์ </td> 
            </tr>
            <tr>
              <td ><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
                  <tr class="bmText_1" height="25">
                    <td>ประเภททรัพย์สิน</td>
			
                    <td width="406">
					
					  <?
			$query  ="select * from type where type_id =1  group by type_name  order by t_id";
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
                    </select>				</td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="330" class="bmText_1"height="25">ชื่ออสังหาริมทรัพย์ </td>
                    <td class="bmText_1">
                      <input type="text"  id="rd_name" name="rd_name" size="60" maxlength="255" value="<?=$rd_name?>" >                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="330" class="bmText_1" height="25">ราคา/หน่วย </td>
                    <td>                    
					   <input name="price" type="text" value="<?=$price?>"  >                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
                    <td width="330" class="bmText_1"height="25">ยี่ห้อ ชนิด แบบ ขนาด</td>
                    <td class="bmText_1">
                      <input type="text"  id="brand_name" name="brand_name" size="50" maxlength="255" value="<?=$brand_name?>" >                    </td>
                </tr>
				<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				<tr>
                    <td width="330" class="bmText_1"height="25">ใช้ประจำที่</td>
                    <td class="bmText">
                      <input type="text"  id="garan_at" name="garan_at" size="50" maxlength="255" value="<?=$garan_at?>" >                    </td>
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
		if($max == NULL or $max == ''){ 
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1; 
		}
		return $rd_id;
	}
?>
<? 
session_start();
?>
<?
include('config.inc.php');

if($OK11 <>'' ) {
	if(empty($pointer_array)){
			$pointer_array=0;
	} 
		$pointer_array =$pointer_array + 1;
	
		session_register("dd");
		session_register("pointer_array");
		
		$code = $_POST[code1]."-".$_POST[code2]."-".$_POST[code3]."-".$_POST[code4];

	
		
		$dd[] = "$_POST[type],$_POST[rd_name],$_POST[amount],$_POST[price],$_POST[unit],$code,$_POST[brand_name],$_POST[type_name],$_POST[endDate_garan],$_POST[garan_at],$_POST[date_garan]";
		

?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 
<?	
}
?>
<script language="JavaScript">
	function dochange(src) {
					val = document.from12.code1.value;
					val1 = document.from12.code2.value;
					val2 = document.from12.code3.value;
			window.open("sample_3_1.php?code1="+val +"&code2="+ val1+"&code3="+ val2,"xxx111","toolbar=yes,location=yes,status=yes, menubar=yes,scrollbars=yes,width=400,height=450");
	}
</script>  

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css"> 
<script language="JavaScript" src="include/calendar.js"></script>

<link rel="stylesheet" type="text/css" href="default.css">
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<body>
<br />
<form name="from12" method="post"  action="#"  >
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
      <tr> 
        <td  colspan="2" style="border: #7292B8 1px solid;"  >
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr class="lgBar">
		      <td  height="32" bgcolor="#3366CC">&nbsp;&nbsp;&nbsp;ข้อมูลรายการของ</td> 
            </tr>
            <tr>
              <td height="191"><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
                  <tr class="bmText" height="25">
                    <td>ประเภททรัพย์สิน</td>
			
                    <td>
					
					  <?
			$query  ="select * from type where type_id =0  group by type_name  order by t_id";
			//echo $query."666<br>";
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
                    <td width="147" class="bmText"height="25">ชื่อครุภัณฑ์ </td>
                    <td class="bmText">
                      <input type="text"  id="rd_name" name="rd_name" size="80" maxlength="255" value="<?=$rd_name?>" >                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="147" class="bmText" height="25">จำนวนที่รับ </td>
                    <td>
                      <input name="amount" type="text"  value="<?=$amount?>"  size="10" maxlength="7" ></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="147" class="bmText" height="25">ราคา/หน่วย </td>
                    <td>                   
					   <input name="price" type="text" value="<?=$price?>"  >                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr class="bmText">
                    <td  height="25">หน่วย </td>
                    <td><input name="unit" type="text"  value="<?=$unit?>" ></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr class="bmText" height="25">
                    <td width="147">รหัสครุภัณฑ์</td>
                    <td width="579"><input type="text" name="code1" size="8" onKeyUp="doNext(this);"  maxlength="3" value="<?=$code1?>">
-
<input type="text" name="code2" size="8" onKeyUp="doNext(this);" maxlength="4" value="<?=$code2?>" >
-
<input type="text" name="code3" size="8" onKeyUp="doNext(this);"  maxlength="4" value="<?=$code3?>" > 
-
เลขที่เริ่มต้น
<input type="text" name="code4"  size="8"  id="code4"value="<?=$code4?>" > 
&nbsp;&nbsp;
<input type="submit" name="find" value="หาเลขครุภัณฑ์"  onClick="dochange('find_in');" class="buttom">

<br></td>
 </tr>
 <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
                    <td width="147" class="bmText"height="25">ชื่อ / ยี่ห้อผู้ทำหรือผลิต</td>
                    <td class="bmText">
                      <input type="text"  id="brand_name" name="brand_name" size="50" maxlength="255" value="<?=$brand_name?>" >                    </td>
                </tr>
				<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="147" class="bmText"height="25">แบบ / ชนิด / ลักษณะ</td>
                    <td class="bmText">
                      <input type="text"  id="type_name" name="type_name" maxlength="255" value="<?=$type_name?>">                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="147" class="bmText"height="25">พัสดุรับประกันถึงวันที่</td>
                    <td class="bmText">
                    <input name="endDate_garan" type="text" id="endDate_garan" value="<? //if($endDate_garan =='') echo date("d/m/Y") ;else echo $endDate_garan;?>"  size="10" />
			
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('endDate_garan','DD/MM/YYYY')"   width='19'  height='19'>                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="147" class="bmText"height="25">พัสดุประกันไว้ที่บริษัท</td>
                    <td class="bmText">
                      <input type="text"  id="garan_at" name="garan_at" size="50" maxlength="255" value="<?=$garan_at?>">                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="147" class="bmText"height="25">วันที่ประกันพัสดุ </td>
                    <td class="bmText">
                      <input name="date_garan" type="text" id="date_garan" value="<? //if($date_garan =='') echo date("d/m/Y") ;else echo $date_garan;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_garan','DD/MM/YYYY')"   width='19'  height='19'>                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK11" value=" ตกลง "   onClick="return q_confirm()"  class="buttom">&nbsp;&nbsp;
                    <input type="reset" name="formbutton2" value=" ยกเลิก" class="buttom">    </td>
                </tr>
              </table>
              </td>
            </tr>
        </table></td>
      </tr>
  </table>
  </form>
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

function q_confirm()
{
	if (confirm("คุณต้องการเพิ่มข้อมูล ใช่หรือไม่"))
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


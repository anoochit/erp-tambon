<? 
session_start();
?>
<?
include('config.inc.php');

if($OK =='ตกลง' ) {
	if(empty($pointer_array)){
			$pointer_array=0;
	} 
		$pointer_array =$pointer_array + 1;
	
		session_register("dd");
		session_register("pointer_array");
		
		$code = $_POST[code1]."-".$_POST[code2]."-".$_POST[code3]."-".$_POST[code4];

		
		$dd[] = "$_POST[type]^$_POST[rd_name]^$_POST[amount]^$_POST[price]^$_POST[unit]^$code^$_POST[brand_name]^$_POST[type_name]^$_POST[endDate_garan]^$_POST[garan_at]^$_POST[date_garan]^$_POST[remark]";
		
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
			window.open("sample_3_1.php?code1="+val +"&code2="+ val1+"&code3="+ val2,"xxx111","toolbar=yes,location=yes,status=yes, menubar=yes,scrollbars=yes,width=300,height=450");
	}
</script>  
	<?

?>


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
		      <td  height="32" bgcolor="#3366CC">&nbsp;&nbsp;&nbsp;ข้อมูลทะเบียนอสังหาริมทรัพย์ </td> 
            </tr>
            <tr>
              <td  valign="top"><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
                  <tr class="bmText" height="25">
                    <td>ประเภททรัพย์สิน</td>
			
                    <td width="579">
					
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
                    <td width="147" class="bmText"height="25">ชื่ออสังหาริมทรัพย์ </td>
                    <td class="bmText">
                      <input type="text"  id="rd_name" name="rd_name" size="80" maxlength="255" value="<?=$rd_name?>" >                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="147" class="bmText" height="25">ราคา/หน่วย </td>
                    <td>                   
					   <input name="price" type="text" value="<?=$price?>"  >                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
                    <td width="147" class="bmText"height="25">ยี่ห้อ ชนิด แบบ ขนาด</td>
                    <td class="bmText">
                      <input type="text"  id="brand_name" name="brand_name" size="50" maxlength="255" value="<?=$brand_name?>" >                    </td>
                </tr>
				<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			<tr>
                    <td width="147" class="bmText"height="25">ใช้ประจำที่</td>
                    <td class="bmText">
                      <input type="text"  id="garan_at" name="garan_at" size="50" maxlength="255" value="<?=$garan_at?>" >                    </td>
                </tr>	
					<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				<tr>
                    <td width="147" class="bmText"height="25">หมายเหตุ</td>
                    <td class="bmText">
                      <input type="text"  id="remark" name="remark" size="50" maxlength="255" value="<?=$remark?>" >                    </td>
                </tr>
				<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="ตกลง"   onClick="return q_confirm()" class="buttom">&nbsp;&nbsp;
                    <input type="reset" name="formbutton2" value="ยกเลิก" class="buttom">    </td>
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


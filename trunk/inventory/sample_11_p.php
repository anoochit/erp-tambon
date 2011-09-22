<?
include('config.inc.php');
if($OK <>'' ){

		
					$query="UPDATE  receive_detail SET sale_date1 =  '".date_format_sql($sale_date1)."'  ,sale_way1 = '$sale_way1' ,sale_num1 = '$sale_num1' ,sale_price1 = '$sale_price1' ,sale_benefit1 = '$sale_benefit1' WHERE rd_id='$rd_id' LIMIT 1";
					$result=mysql_query($query);	
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 
<?
}

if($del <> ''){
	$c_id = $_REQUEST["c_id"];
	unlink("file_data/$pic"); 
	$sql_del = "Update code SET pic =''   WHERE  c_id ='$c_id'";
	$result_del = mysql_query($sql_del);
	echo "<div  align=center><font face='tahoma' size='2'>ลบข้อมูลเรียบร้อยแล้ว</font>\n";

}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" src="include/calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<link rel="stylesheet" type="text/css" href="default.css">
<style type="text/css">
<!--
.style2 {font-size: 12px; font-family: Tahoma; }
.style3 {font-size: 12px}
-->
</style>
<script language="JavaScript">
function del_confirm()
{
	if (confirm("คุณต้องการลบไฟล์นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<link href="style2.css" rel="stylesheet" type="text/css">
<body>
<?
$sql = "SELECT * FROM receive_detail
Where  rd_id = '$rd_id' 
group by rd_id ";
//echo $sql ."<br>";
$result = mysql_query($sql);
$rs1=mysql_fetch_array($result);

?>
<form action="" method="post" name="f22" enctype="multipart/form-data" >
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center">
<tr class="lgBar" >
			   <td  height="32" colspan="9" align="center"><div class="style2">&nbsp;&nbsp;&nbsp;<strong>รายละเอียดเลขครุภัณฑ์</strong></div></td> 
    </tr>
<tr class="bmText"  >
<td width="41%"  height="30" ><div align="center" class="style2">
  <div align="left"><b>ชื่อพัสดุ</b></div>
</div></td>
	<td width="59%" height="30"><div align="left" class="style2">&nbsp;
	<?=$rs1[rd_name]?>  
    </div></td>
</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
	<tr class="bmText" >
	<td width="41%"   height="30"><div align="center" class="style2">
	  <div align="left"><b>วันที่จำหน่าย</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
	    
	      <div align="left">
		  <? //echo $rs1[sale_date1]."hhh";?>
	        <input name="sale_date1" type="text" id="sale_date1" value="<? 
			 if($rs1[sale_date1]<>'0000-00-00')   echo date_format_th($rs1[sale_date1]);
			 else echo "&nbsp;" ?> "  size="10" />
			
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('sale_date1','DD/MM/YYYY')"   width='19'  height='19'>	        </div>
	</div></td>
	</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
	  <td width="41%"    height="30"><div align="center" class="style2">
	    <div align="left"><b>วิธีจำหน่าย</b></div>
	  </div></td>
	  <td height="30"><div align="left" class="style2">
	
	    <div align="left">
	      <input  type="text" name="sale_way1" value="<?=$rs1[sale_way1]?>" size="30">
	        </div>
	  </div></td>
	  </tr>
	  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
	  <tr class="bmText"  >
	<td width="41%"  height="30"><div align="center" class="style2">
	  <div align="left"><b>เลขที่หนังสืออนุมัติ</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
	
	  <div align="left">
	    <input  type="text" name="sale_num1" value="<?=$rs1[sale_num1]?>" size="30">
	    </div>
	</div></td>
	</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
	<tr class="bmText" >
	<td width="41%"   height="30"><div align="center" class="style2">
	  <div align="left"><b>ราคาจำหน่าย</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
	    
	      <div align="left">
	        <input  type="text" name="sale_price1" value="<?=$rs1[sale_price1]?>" size="30" >
	        </div>
	</div></td>
	</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
	  <td width="41%"    height="30"><div align="center" class="style2">
	    <div align="left"><b>กำไร / ขาดทุน</b></div>
	  </div></td>
	  <td height="30"><div align="left" class="style2">
	
	    <div align="left">
	      <input  type="text" name="sale_benefit1" value="<?=$rs1[sale_benefit1]?>" size="30"  onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}">
	        </div>
	  </div></td>
	  </tr>
	  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value=" บันทึก "  onClick="return godel();"   class="buttom">&nbsp;
                    <input type="reset" name="formbutton2" value="ยกเลิก" onClick="window.close();" class="buttom">    </td>
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
<?
function pro_name($od_id){
	$sql1 ="select  *  from order1_detail where od_id =  '$od_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[product];
}
function r_amount($id){
	$sql1 ="select  *  from receive_order1 where id =  '$id' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[r_amount];
}
function amount($pro_name){
	$sql1 ="select  *  from product where pro_name =  '$pro_name'  and status = 0";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs[amount];
}
?>


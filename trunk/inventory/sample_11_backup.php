<?
include('config.inc.php');
if($OK <>'' ){
		$n_file=$_FILES['n_file']['name'];
		$n_file_size = $_FILES['n_file']['size'];
		if (trim($n_file) <> "" and  $n_file_size <= 2000000) { // แทรกไฟล์

			# หาชื่อภาพที่จะลบ
			$query="SELECT * FROM code WHERE c_id=$c_id";
			//echo $query."<br>";
			$result=mysql_query($query);
			$news=mysql_fetch_array($result);

			if ($news["pic"] <> "") {
				unlink("file_data/".$news["pic"]); // ลบไฟล์
				//echo "ทำการลบไฟล์ : ".$news["pic"]."<br>\n";
			}
					include("include/add_news_files1.php");
					$query="UPDATE code SET pic='$n_file' WHERE c_id='$c_id' LIMIT 1";
					echo $query."<br>";
					$result=mysql_query($query);	
		}else {	
						$sql_insert="UPDATE code SET  serial ='".$serial."',num_machine ='".$num_machine."'
						,num_box ='".$num_box."',num_stamp ='".$num_stamp."',colour ='".$colour."',remark ='".$remark."' ,screen = '$screen'
						, sale_date =  '".date_format_sql($sale_date)."'  ,sale_way = '$sale_way' ,sale_num = '$sale_num' ,sale_price = '$sale_price' ,sale_benefit = '$sale_benefit'
						where c_id = '".$c_id." '
						";
						echo "\$sql_insert  ".$sql_insert."<br>";
						$result_insert  = mysql_query($sql_insert); 
			}
			
		?>
<!--<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>   -->
<?
}

if($del <> ''){
	$c_id = $_REQUEST["c_id"];
	
	unlink("file_data/$pic"); 
	$sql_del = "Update code SET pic =''   WHERE  c_id ='$c_id'";
	$result_del = mysql_query($sql_del);
	//echo $sql_del;
	echo "<div  align=center><font face='tahoma' size='2'>ลบข้อมูลเรียบร้อยแล้ว</font>\n";
	//print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?add_news=edit&n_id&n_id=$n_id\">\n";

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
$sql = "SELECT * FROM code
Where  c_id = '$c_id' 
group by code order by code";
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
  <div align="left"><b>เลขครุภัณฑ์ที่</b></div>
</div></td>
	<td width="59%" height="30"><div align="left" class="style2">&nbsp;
	<?=$rs1[code]?>  
    </div></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText"  >
	<td width="41%"  height="30"><div align="center" class="style2">
	  <div align="left"><b>หมายเลขลำดับ</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
  
      <div align="left">
        <input  type="text" name="serial" value="<?=$rs1[serial]?>" size="30"> 
          </div>
	</div></td>
</tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText" >
	<td width="41%"  height="30" ><div align="center" class="style2">
	  <div align="left"><b>หมายเลขเครื่อง   (ถ้ามี)</b></div>
	</div></td>
		<td height="30"><div align="left" class="style2">
	    
	      <div align="left">
	        <input  type="text" name="num_machine" value="<?=$rs1[num_machine]?>" size="30">  
	        </div>
		</div></td>
	</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText" >
	<td width="41%"   height="30"><div align="center" class="style2">
	  <div align="left"><b>หมายเลขกรอบ    (ถ้ามี)</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
	    
	      <div align="left">
	        <input  type="text" name="num_box" value="<?=$rs1[num_box]?>" size="30">
	        </div>
	</div></td>
	</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
	  <td width="41%"    height="30"><div align="center" class="style2">
	    <div align="left"><b>หมายเลขจดทะเบียน     (ถ้ามี)</b></div>
	  </div></td>
	  <td height="30"><div align="left" class="style2">
	
	    <div align="left">
	      <input  type="text" name="num_stamp" value="<?=$rs1[num_stamp]?>" size="30">
	        </div>
	  </div></td>
	  </tr>
	  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
	  <tr class="bmText"  >
	<td width="41%"  height="30"><div align="center" class="style2">
	  <div align="left"><b>หมายเลขจอ</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
	
	  <div align="left">
	    <input  type="text" name="screen" value="<?=$rs1[screen]?>" size="30">
	    </div>
	</div></td>
	</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText"  >
	<td width="41%"  height="30"><div align="center" class="style2">
	  <div align="left"><b>สีของพัสดุ</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
	
	  <div align="left">
	    <input  type="text" name="colour" value="<?=$rs1[colour]?>" size="30">
	    </div>
	</div></td>
	</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText"  >
	<td width="41%"  height="30"><div align="center" class="style2">
	  <div align="left"><b>อื่นๆ(ถ้ามีระบุ)</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
  
	  <div align="left">
	    <input  type="text" name="remark" value="<?=$rs1[remark]?>" size="30">
	    </div>
	</div></td>
	</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText"  >
	<td width="41%"  height="30"><div align="center" class="style2">
	  <div align="left"><b>รูปถ่ายพัสดุ(ถ้ามี) หรือตำหนิรูปพรรณ</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
  
	  <div align="left">
	    <input type='file' name='n_file'  value=""  size='30' maxlength='255'>
		     <?
			if($rs1[pic] != ""){
					echo "ไฟล์เดิม : <a href=\"file_data/$rs1[pic]\" target=\"_blank\" > ".$rs1[pic] ."</a>";
					echo " <a href=\"?del=delete&c_id=$c_id&pic=$rs1[pic]\" target=\"_self\" onClick=\"return del_confirm();\">[ ลบไฟล์ ]</a>";
				}
				?>
	    </div>
	</div></td>
	</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
	<tr class="bmText" >
	<td width="41%"   height="30"><div align="center" class="style2">
	  <div align="left"><b>วันที่จำหน่าย</b></div>
	</div></td>
	<td height="30"><div align="left" class="style2">
	    
	      <div align="left">
		  <? //echo $rs1[sale_date]."hhh";?>
	        <input name="sale_date" type="text" id="sale_date" value="<? 
			 if($rs1[sale_date]<>'0000-00-00')   echo date_format_th($rs1[sale_date]);
			 else echo "&nbsp;" ?> "  size="10" />
			
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('sale_date','DD/MM/YYYY')"   width='19'  height='19'>               
	        </div>
	</div></td>
	</tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr class="bmText">
	  <td width="41%"    height="30"><div align="center" class="style2">
	    <div align="left"><b>วิธีจำหน่าย</b></div>
	  </div></td>
	  <td height="30"><div align="left" class="style2">
	    <div align="left">
	      <input  type="text" name="sale_way" value="<?=$rs1[sale_way]?>" size="30">
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
	    <input  type="text" name="sale_num" value="<?=$rs1[sale_num]?>" size="30">
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
	        <input  type="text" name="sale_price" value="<?=$rs1[sale_price]?>" size="30" onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}">
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
	      <input  type="text" name="sale_benefit" value="<?=$rs1[sale_benefit]?>" size="30"  onKeyPress=" if (event.keyCode < 46 || event.keyCode > 57 ){ alert('ใช้ได้แต่ตัวเลขเท่านั้น'); event.returnValue = false;}else if(event.keyCode == 13){event.submit();event.returnValue = true;}">
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


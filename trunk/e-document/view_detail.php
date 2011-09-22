<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style.css" rel="stylesheet" type="text/css">
<?
session_start();
$file_id = $_REQUEST["file_id"] ;

$sql = "SELECT * FROM documentary WHERE file_id='$file_id'";

$result=mysql_query($sql);
while($rs=mysql_fetch_array($result)){
if($rs["permission"] != "all") {

			$access_for = explode(",",$rs["permission"]);
			$num =count($access_for) ;

			for($i=0;$i < $num;$i++) {
			
				if(trim($_SESSION["de_part"]) == trim($access_for[$i])){
					$access = "yes";
				}
			}
		}elseif(trim($rs["permission"]) == "all") {
					$access = "yes";
		}else{
					$access = "";
		}
	?>
<br><div align="center">
<?
	if($_SESSION["department"] == "admin"  ||  $_SESSION['de_part'] == 1 ) {	
	?>
<a href="index.php?action=edit_doc&file_id=<?echo $rs["file_id"]?>">[แก้ไขเอกสารนี้]</a> 
<a href="index.php?action=del_doc&file_id=<?echo $rs["file_id"]?>" onClick="return del_confirm1();">[ลบเอกสารนี้]</a>
<?
	if($rs["finish_date"] != "" &&  $rs["warning"] == "yes"){
		?>
	<a href="index.php?action=cancle_warning&file_id=<?echo $rs["file_id"]?>">[ยกเลิกการแจ้งเตือน]</a>
	<?
			}
	?>
<br><br>
<? }?>
<table width="60%" border="0">
	<tr>
	<td bgcolor="#C1E0FF">
		<div ><b>เรื่อง </b><span class="topic1"><?echo $rs["topic"]?></span></div>
	</td>
	</tr>
	<tr><td height="20"><div><b>ประเภทเอกสาร  </b><? 
	echo $rs["type_doc"] ;
	?></div></td></tr>
	<tr><td height="20"><div><b>กอง </b><? 
	echo find_dep_name1($rs["dep_id"]) ;
	?></div></td></tr>
	<tr><td height="20"><div><b>เลขที่เอกสาร </b><? echo $rs["doc_id"]?></div></td></tr>
	<tr><td height="20"><div><b>ลงวันที่ </b><? echo date_time($rs["put_date_on"])?></div></td></tr>
	<? if($rs["type_doc"] =='รับเข้า'){?>
	<tr><td height="20"><div><b>เลขที่รับเอกสาร  </b><? echo $rs["receive_id"]?></div></td></tr>
	<tr><td height="20"><div><b>วันที่รับ </b>
	  <?
		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--")	{
			echo " - ";
		}else {
			echo date_time($rs["recieve_date"]);
		}
		?>
	</div></td></tr>

	<tr><td height="20"><div><b>อ้างถึง  </b><? echo $rs["rep_from"]?></div></td></tr>
	<tr><td height="20"><div><b>ส่งที่ส่งมาด้วย / หมายเหตุ  </b><? echo $rs["send_from"]?></div></td></tr>
	<tr><td height="20"><div><b>วันที่สิ้นสุด </b><?
		if($rs["finish_date"] == "" || $rs["finish_date"] == "--" || $rs["finish_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["finish_date"]);
		}
		?></div></td></tr>
			
		<tr><td height="20"><div><b>จากหน่วยงาน </b><?echo $rs["dep_ref"]?></div></td></tr>
		<? }?>
		<tr><td height="20"><div><b>สถานะเอกสาร [ปกติ / ยกเลิก]</b> &nbsp;&nbsp;<? if($rs["status"] =='ยกเลิก')
		echo "<font color=red>".$rs["status"]."</font>";
		else
		echo $rs["status"];?></div></td></tr>
		<? if($rs["type_doc"] =='รับเข้า'){?>
		<tr><td height="20"><div><b>ความเร็วเอกสาร </b><?echo $rs["a_status"]?></div></td></tr>
		<tr><td height="20"><div><b>ระดับความลับ </b><?echo $rs["c_status"]?></div></td></tr>
		<? }?>
		<tr><td><?
			$file_sql = "SELECT * FROM file_record WHERE file_id='$file_id'";
			$result2=mysql_query($file_sql);
			while($rs2=mysql_fetch_array($result2)){
		?>
<br>
	<div align="left"><b>ไฟล์ที่แนบมา </b><? 
	if($rs2["name_file"] <>'') echo $rs2["name_file"];
	else echo $rs2["file_name"];
	?></div>
	
	<div align="center">
	<?
	// สิทธิ์การเข้าดาวน์โหลดไฟล์ไปใช้งาน				
		if($access == "yes"  ||  $_SESSION["username"] == "admin"  ||  $_SESSION["department"] == "all"  ||  $_SESSION['department'] == 1  ||  $_SESSION["department"] ==2){
	?>

	<a href="files_data/<?echo $rs2["file_name"]?>" target="_blank" ><IMG src="images/download2.gif" width="46" height="46" border="0" alt=""><br>เปิดอ่าน หรือดาวน์โหลดไฟล์นี้ <br> 
	</a><br>
<?
		$sql_b = "SELECT COUNT(b_id) FROM borrow_list WHERE carryback='no' AND file_name='". $rs2["file_name"]."'";
		$result_b = mysql_query($sql_b);
		$found_item = mysql_result($result_b,0);
	if($found_item > 0){
		$sql_b2 = "SELECT*FROM borrow_list WHERE file_name='". $rs2["file_name"]."'";
		$result_b2 = mysql_query($sql_b2);
		$rs_b2 = mysql_fetch_array($result_b2);
	?>
	เอกสารถูกยืมโดย <? echo $rs_b2["b_name"]?> เมื่อวันที่ <?echo date_time($rs_b2["b_date"])?> 
	<br><a href="index.php?action=carryback&file_name=<?echo $rs2["file_name"]?>&file_id=<?echo $file_id?>"> คืนเอกสาร </a> <br><br>
	<?
	}	elseif($_SESSION["username"] == "admin"  ||  $_SESSION['de_part'] == 1 ){	
	?>
	<a href="index.php?action=borrow&file_name=<?echo $rs2["file_name"]?>&file_id=<?echo $file_id?>"> ยืมเอกสาร </a><br><br>
	<a href="del_file.php?file_name=<? echo $rs2["file_name"]?>&file_id=<? echo $file_id?>" onClick="return del_confirm();"><font color='red'>ลบไฟล์นี้</font></a>

	<? }?>
	<? }else{?>
	<br>****เอกสารเฉพาะกอง คุณไม่สามารถอ่านได้****<br> 
	<? }?></div>
	<?
			}?>			
	</td>
	</tr>
</table>
	</div>
<? if(find_num($file_id) > 0){?>
<table width="98%" align="center">
<tr  bgcolor="#C1E0FF"><td width="16%"><div align="center"><strong>หน่วยงาน</strong></div></td>
<td width="14%"><div align="center"><strong>วันที่ส่ง</strong></div></td>
<td width="23%"><div align="center"><strong>วันที่ลงรับ / ดำเนินการเสร็จ</strong></div></td>
<td width="14%"><div align="center"><strong>วันที่ดำเนินการ</strong></div></td>
<td width="14%"><div align="center"><strong>สถานะ</strong></div></td>
<td width="19%"><div align="center"><strong>ข้อความต่อท้าย</strong></div></td>
</tr>
<?
$sql = "SELECT * FROM send_doc s
Where file_id = '$file_id' 
 group by id 
ORDER BY send_id desc ";
//echo $sql ."<br>";
$result = mysql_query($sql);
$i = 0;
while($rs=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
?>
<tr  bgcolor="<?=$bg?>" >
	<td><div align="left">
	  <?
	  if($rs[send_id] ==0) echo "ปลัด"  ;
	  else echo	  find_dep_name($rs[send_id])?>
    </div></td>
	<td><div  align="center">
	  <?
	  if($rs["send_date"] <>'0000-00-00'){
	  		echo date_time($rs["send_date"]);
	    }else{
			  echo  "-";
		  }
	  ?>
    </div></td>
		<td><div align="center">
	  <?
	   if($rs["stamp_date"] <>'0000-00-00'){
		 		 echo date_time($rs["stamp_date"]) ;
				 $time = explode(" ",$rs["stamp_dateTime"]);
				 echo "&nbsp;/&nbsp;".$time[1];
		  }else{
			  echo  "-";
		  }
	  ?>
    </div></td>
		<td><div  align="center">
	  <?
	  if($rs["access_date"] <>'0000-00-00') echo date_time($rs["access_date"]);
	  else "-";
	  ?>
    </div></td>
		<?
	if($rs["status"] =='รออนุมัติ')  $bg = '#ff9966';
	if($rs["status"] =='อนุมัติแล้ว')  $bg = '#66FFCC';
	if($rs["status"] =='ยังไม่ได้ลงรับ')  $bg = '#F59299';
	if($rs["status"] =='ลงรับแล้ว' or $rs["status"] =='ดำเนินการแล้ว' )  $bg = '#66CC99';
	if($rs["status"] =='กำลังดำเนินการ')  $bg = '#FFCC33';
	?>
	<td  bgcolor="<?=$bg?>" ><div align="left">
	  <?=$rs["status"]?>
    </div></td>
		<td><div align="left">
	  <?=$rs["remark"]?>
    </div></td>
</tr>
<? 
	$i++;
}?>
</table> 
<? }?>
<br>
</center>
	<?
}
?><script language="JavaScript" type="text/javascript">
function del_confirm()
{
	if (confirm("คุณต้องการลบไฟล์นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}


function del_confirm1()
{
	if (confirm("คุณต้องการลบเอกสารนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
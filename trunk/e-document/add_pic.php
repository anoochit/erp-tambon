<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($send <>''){
	$file_att1=$_FILES['file_att1']['name'];
	if ($file_att1 <> "") include("include/add_news_files1.php");
		// แทรกไฟล์
		$query="INSERT INTO file_record (file_id,  file_name, file_type, file_size,name_file ) VALUES('$file_id','$file_att1','$file_att_type1',',$file_att_size1','$name_file1')";
		$result=mysql_query($query);	
?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>
<?
}
if($del <> ''){
	$n_file = $_REQUEST["n_file"];
	$n_id = $_REQUEST["n_id"];
	
	unlink("file/$n_file"); 
	$sql_del = "Update news SET n_file =''   WHERE  n_id ='$n_id'";
	$result_del = mysql_query($sql_del);
	echo "<br><br><br><div  align=center><font face='tahoma' size='2'>ลบข้อมูลเรียบร้อย</font><br><br><br>\n";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_file&add=edit&n_id&n_id=$n_id&type=$type\">\n";
}
?>
<script language="JavaScript" src="calendar.js" type="text/javascript"></script>
<style type="text/css">
.style3 {
	font-family: "MS Sans Serif";
	font-weight: bold;
	font-size: 10;
}
.style7 {font-family: "MS Sans Serif"; font-size: 10; }
</style>
<table border="0" width="100%" align="center" >
<tr align="left">
<td width="100%" style="border: #CACACA 1px solid;" >
<form name='add_data_itc' action='' method='post' enctype="multipart/form-data" onsubmit="return check()">
<? if($add=='add'){?>
<table name='add_data_itc' cellpadding='0' cellspacing='3' border='0' width='100%'>
<tr height="30">
<td  height='30'  colspan="2" bgcolor="#C9D4E1" style="border: #FFFFFF 1px solid;"> 
<div class="style3"  style='color: #000099;'>&nbsp;&nbsp;&nbsp;เพิ่มไฟล์</div></td></tr>
		<tr>
			<td width='222'>
		    <div align="right" class="style7">ไฟล์ภาพ :			    </div>			</td>
			<td width='1071'>
			  <div align="left" class="style7">
			    <input type="file" name="file_att1" value="" size="30" maxlength="255">
	      	&nbsp;ชื่อไฟล์&nbsp; <input type="text" name="name_file1"  size="20" maxlength="100">  </div>		</td>
		</tr>
</table>
<br />
<center>
<input name='type_n' type='hidden'  value='<?echo $type_n?>'>
<input type='submit' name='send' value='เพิ่มข้อมูล'>
<input type='reset' name='reset' value='เคลียร์'>
</center>
<? }elseif($add=='edit'){
	$query="SELECT * FROM news WHERE n_id=$n_id";

	$result=mysql_query($query);
	$news=mysql_fetch_array($result);
	$n_file_old = $news["n_file"] ;
?>
<table name='add_data_itc' cellpadding='0' cellspacing='3' border='0' width='100%'>
<tr height="30">
<td  height='30'  colspan="2"background="images/b3.jpg" bgcolor="#FF99CC" style="border: #FFFFFF 1px solid;"> 
<div  style='color: #000099;'><b>แก้ไขรูปภาพ</b></div></td></tr>
		<tr>
			<td width='435'>
			  <div align="right">ไฟล์แนบ :			    </div>			</td>
			<td width='512'>
			  <div align="left">
			    <input type='file' name='n_file' value=''  size='45' maxlength='255'>
				  <?
			if($n_file_old != ""){
					echo "<br>ไฟล์เดิม : <a href=\"file/$n_file_old\" target=\"_blank\" > ".$n_file_old ."</a>";
					echo " <a href=\"?action=add_file&del=delete&n_id=$n_id&n_file=$n_file_old&add=edit&type=$type\" target=\"_self\" onClick=\"return del_confirm();\">[ ลบไฟล์ ]</a>";
				}
				?>
		      </div>			</td>
		</tr>
</table>

<center>
<input name='type_n' type='hidden'  value='<?echo $type_n?>'>
<input type='submit' name='edit' value='เพิ่มข้อมูล'>
<input type='reset' name='reset' value='เคลียร์'>
</center>

<? }?>
</form>
</td></tr></table>
<script language="JavaScript" type="text/javascript">
<!--
function check()
{
      var v1 = document.add_data_itc.file_att1.value;      
        if ( v1.length==0)
           {
           alert("กรุณาเลือกไฟล์");
           document.add_data_itc.file_att1.focus();           
           return false;
           }
        if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่")){
					return true;
			}else{
					return false;
			}
}

function open_windows(theURL,winName,features) { 
  window.open(theURL,winName,features);
}
function del_confirm()
{
	if (confirm("คุณต้องการลบไฟล์นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
//---------------------------------------------------------------------------------------------------------- บันทึกข้อมูล
if($_REQUEST["b_submit"] != "") {
	$drive_letter = $_REQUEST["drive_letter"];
	?>
	<div id="wait" style="position:absolute; left:359px; top:222px; width:358px; height:13px; z-index:1; background-color: <?echo $body['bgcolor']?>; layer-background-color: <?echo $body['bgcolor']?>; border:  0px none ;"> 
  <table width="100%" border="0" cellspacing="2" cellpadding="0">
    <tr>
      <td><div align="center"><img src="images/loading.gif" width="32" height="32" border="0" alt="">    
          กรุณารอสักครู่ระบบกำลังประมวลผล ....</div>
</td>
    </tr>
  </table>
</div>

<?
function copyr($source, $dest){
// Simple copy for a file
if (is_file($source)) {
$c = copy($source, $dest);
chmod($dest, 0777);
return $c;
}
 
// Make destination directory
if (!is_dir($dest)) {
$oldumask = umask(0);
mkdir($dest, 0777);
umask($oldumask);
}
 
// Loop through the folder
$dir = dir($source);
while (false !== $entry = $dir->read()) {
// Skip pointers
if ($entry == "." || $entry == "..") {
continue;
}
 
// Deep copy directories
if ($dest !== "$source/$entry") {
copyr("$source/$entry", "$dest/$entry");
}
}
 
// Clean up
$dir->close();
return true;
}

if (is_dir($drive_letter."/backup_mis/") =='') {
	$new1 = @mkdir($drive_letter."/backup_mis/");
} 
$dirnew = $drive_letter."/backup_mis/backup[date".date("d")."-".date("m")."-".date("y")." time ".date("H.i.s")."]";
if (@mkdir($dirnew)) {
} else {
}


$source1 = source1();
$source=source();

$dest1=$dirnew."/mis/";
$dest=$dirnew."/files/";

$max2 = copyr($source1, $dest1)  or die("เกิดความผิดพลาดระหว่างการสำรองข้อมูล");
$max = copyr($source, $dest) or die("เกิดความผิดพลาดระหว่างการสำรองข้อมูล");

//-------------------------------------------------------------------
	?>
	<script language="JavaScript" type="text/javascript">
		document.getElementById('wait').style.visibility='hidden';
	</script> 
	<center>
	
<table width="90%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar_1">
			<td>
  		  		<center>
<br>
<b><font color="#0000CC" >ดำเนินการเรียบร้อยแล้ว<br>
สำรองข้อมูลไว้ที่ <? echo $dirnew;?>
</font></b>
<br><br>
</center>

	</td>
</tr>
</table>
<?
}else {

?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="100%"><b><font  size="+1">
สำรองข้อมูล วันที่ <?echo DATE('d/m/Y');?></font></b>
		</td>
	</tr>
</table>
<div align="center">
<form action="index.php?action=backup" method="post" name="borrow" id="borrow">

<br>
<br>
<table width="600">
<tr>
	<td colspan="2" align="center">
	<?
$drive_arr = array("C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");	

$sum_arr = COUNT($drive_arr);
echo "<font size='-1'>เลือกไดร์ฟที่ท่านต้องการสำรองข้อมูล</font> <select name='drive_letter'>";
for($x=0;$x<$sum_arr;$x++){
	if(is_dir($drive_arr[$x].":")){
		echo "<option value='".$drive_arr[$x].":'>".$drive_arr[$x].":</option>";
	}
}
echo "</select>";

?><br><br>
	<input type="submit" name="b_submit" value="บันทึก">
	</td>
</tr>
</table>


</form>
</div>
	</td>
	
</tr>
</table>
</center>
<? }?>

<?
function source1(){
$drive_ = array("C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");	

$sumArr = COUNT($drive_);
	for($x=0;$x<$sumArr;$x++){
		if( is_dir($drive_[$x].":Appserv/mysql/data/mis/")){
			$source1 =$drive_[$x].":Appserv/mysql/data/mis/";
			return $source1;
		}
	}
}
function source(){
$drive_ = array("C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$sumArr = COUNT($drive_);
for($x=0;$x<$sumArr;$x++){
	if( is_dir($drive_[$x].":Appserv/www/mis/files/")){
		$source=$drive_[$x].":Appserv/www/mis/files"; 
		return $source;
	}
}

}

?>

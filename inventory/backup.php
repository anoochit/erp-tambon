<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($_REQUEST["b_submit"] != "") {
	$drive_letter = $_REQUEST["drive_letter"];
	?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<br />
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
if (is_file($source)) {
$c = copy($source, $dest);
chmod($dest, 0777);
return $c;
}
 
if (!is_dir($dest)) {
$oldumask = umask(0);
mkdir($dest, 0777);
umask($oldumask);
}
 
$dir = dir($source);
while (false !== $entry = $dir->read()) {
if ($entry == "." || $entry == "..") {
continue;
}
 
if ($dest !== "$source/$entry") {
copyr("$source/$entry", "$dest/$entry");
}
}
 
$dir->close();
return true;
}

if (is_dir($drive_letter."/backup_e-inven_pyao/") =='') {
	$new1 = @mkdir($drive_letter."/backup_e-inven_pyao/");
} 
$dirnew = $drive_letter."/backup_e-inven_pyao/backup[date".date("d")."-".date("m")."-".date("y")." time ".date("H.i.s")."]";
if (@mkdir($dirnew)) {
} else {
}


$source1 = source1();
$source=source();


$dest1=$dirnew."/e-inven_pyao/";

$dest=$dirnew."/file_data/";

$max1 = copyr($source1, $dest1)  or die("เกิดความผิดพลาดระหว่างการสำรองข้อมูล");
$max = copyr($source, $dest) or die("เกิดความผิดพลาดระหว่างการสำรองข้อมูล");

	?>
	<script language="JavaScript" type="text/javascript">
		document.getElementById('wait').style.visibility='hidden';
	</script> 
	<center><br />
  		  		<center>
<br><br>
<b><font color="#0000CC" >ดำเนินการเรียบร้อยแล้ว<br>
สำรองข้อมูลไว้ที่ <? echo $dirnew;?>
</font></b>
<br><br>
</center>

<?
}else {

?><br><br>
		<center><b><font  size="+1">
สำรองข้อมูล วันที่ <?echo DATE('d/m/Y');?></font></b></center>
<div align="center">
<form action="index.php?action=backup" method="post" name="borrow" id="borrow">

<br>
<br>
	<center>
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
	<input type="submit" name="b_submit" value="บันทึก" class="buttom">
	</center>


</form>
</div>

</center>
<? }?>

<?
function source1(){
$drive_ = array("C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");	

$sumArr = COUNT($drive_);
	for($x=0;$x<$sumArr;$x++){
		if( is_dir($drive_[$x].":mysql/data/e-inven_pyao/")){
			$source1 =$drive_[$x].":mysql/data/e-inven_pyao/";
			return $source1;
		}
	}
}
function source(){
$drive_ = array("C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$sumArr = COUNT($drive_);
for($x=0;$x<$sumArr;$x++){
	if( is_dir($drive_[$x].":Appserv/www/e-inven_pyao/file_data/")){
		$source=$drive_[$x].":Appserv/www/e-inven_pyao/file_data/"; 
		return $source;
	}
}

}

?>

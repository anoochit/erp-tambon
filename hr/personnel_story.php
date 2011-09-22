<?

if($cancel <>''){
		$sql = "UPDATE person SET status = 1 where user_id = '$user_id'";
		$result= mysql_query($sql);
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=find_person\">\n";
}

if($del == 'del'){
	if($image <>'') unlink("files/$image"); 
	$sql_p= "DELETE FROM person WHERE user_id ='$user_id'";
	$result= mysql_query($sql_p);
	
	$sql_c= "DELETE FROM children WHERE user_id ='$user_id'";
	$result= mysql_query($sql_c);
	
	$sql_e= "DELETE FROM education WHERE user_id ='$user_id'";
	$result= mysql_query($sql_e);
	
	$sql_m= "DELETE FROM medal WHERE user_id ='$user_id'";
	$result= mysql_query($sql_m);
	
	$sql_w = "DELETE FROM work WHERE user_id ='$user_id'";
	$result= mysql_query($sql_w);
	
	$sql_t = "DELETE FROM training WHERE user_id ='$user_id'";
	$result= mysql_query($sql_t);
	
	$sql_v = "DELETE FROM vacation WHERE user_id ='$user_id'";
	$result= mysql_query($sql_v);
	
	$sql_cl = "DELETE FROM come_late WHERE user_id ='$user_id'";
	$result= mysql_query($sql_cl);
	
	$sql_l = "DELETE FROM law  WHERE user_id ='$user_id'";
	$result= mysql_query($sql_l);
	
	$sql_co = "DELETE FROM coin  WHERE user_id ='$user_id'";
	$result= mysql_query($sql_co);
	
	$sql_d = "DELETE FROM dep_sec  WHERE user_id ='$user_id'";
	$result= mysql_query($sql_d);
	
	$sql_tp = "DELETE FROM time_plus  WHERE user_id ='$user_id'";
	$result= mysql_query($sql_tp);
	echo "<br><center><font color=red  size=3><b>ระบบกำลังทำการลบข้อมูล</b></font></center><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=find_person\">\n";
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="Yetii/custom.css">
<link rel="stylesheet" type="text/css" href="Yetii/white.css">
<script type="text/javascript" src="Yetii/yetii-min.js"></script>
<script language="JavaScript" src="include/calendar.js"></script>
<script language="javascript">

function godel_10()
{
	if (confirm("คุณต้องยกเลิกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel()
{
	if (confirm("คุณต้องลบข้อมูลทั้งหมด ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>




<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<title>ทะเบียนประวัติพนักงาน</title>
<style type="text/css">
<!--
.style12 {font-size: 22px}
.style14 {font-size: 16}
.style15 {
	font-size: 16px;
	font-weight: bold;
}
.style17 {font-size: 14px}
.style20 {font-family: AngsanaUPC, "Angsana New"; font-weight: bold; font-size: 20px; }
.style21 {
	font-family: AngsanaUPC, "Angsana New";
	font-size: 18px;
}
.style6 {font-size: 12px}
-->
</style>

<link href="style.css" rel="stylesheet" type="text/css" />
<div class="demolayout" id="demo">
<input name="user_id" type="hidden" id="user_id" value="<?=$user_id?>" />
  <?
	  //-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM person p , ps_tname_ref ps WHERE p.ps_tname_id = ps.ps_tname_id and p.user_id=$user_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
 ?><br />
 <center> <font size="+1" color="#CC6633"><strong><?
		  if($d[ps_tname_id] <>'00') echo $d[ps_tname_item];
		  else " ";
		   ?>  <?=$d[name]?></strong></font></center><br />
		   <center>
[ <a href="?action=personnel_story&del=del&user_id=<?=$user_id?>&image=<?=$d[image]?>"   class="style_l" onclick="return godel()">ลบข้อมูลทั้งหมด</a> ]
</center><br />

  <ul class="demolayout" id="demo-nav" >
 <? if($_SESSION['pivilage'] == '1' ) {?>
     <li><a href="#tab1">&nbsp; &nbsp; ข้อมูลทั่วไป &nbsp;&nbsp; </a> </li>
     <li><a href="#tab2">&nbsp;&nbsp; ข้อมูลบุตร &nbsp;&nbsp; </a> </li>
     <li><a href="#tab3">&nbsp; &nbsp; ประวัติการศึกษา&nbsp; &nbsp;</a> </li>
	 <li><a href="#tab4">&nbsp; &nbsp; เครื่องราชอิสริยาภรณ์ &nbsp;&nbsp;</a>
     <li><a href="#tab5">&nbsp; &nbsp; ประวัติการทำงานราชการ &nbsp;&nbsp; </a> </li>
     <li><a href="#tab6">&nbsp;&nbsp; ประวัติการฝึกอบรม &nbsp;&nbsp;</a></li>
	 <? } 
	 if($_SESSION['pivilage'] == '1'  or $_SESSION['pivilage'] == '0') { ?>
	 <li><a href="#tab7">&nbsp;ประวัติลา&nbsp;</a></li>
	 <li><a href="#tab8"> &nbsp;ประวัติมาสาย / ขาด&nbsp; </a></li>
	 <? }?>
	 <? 
	 if($_SESSION['pivilage'] == '1' ) { ?>
	 <li><a href="#tab9">&nbsp;ประวัติลงโทษ&nbsp;</a></li>
	 <li><a href="#tab10">&nbsp;ประวัติรับเหรียญพระราชทาน&nbsp;</a></li>
	 <li><a href="#tab11">&nbsp;ประวัติปฎิบัติราชการใช้กฎอัยการศึก&nbsp;</a></li>
	 <li><a href="#tab12">&nbsp;เวลาราชการทวีคุณ&nbsp;</a></li>
	 <li><a href="#tab13">&nbsp;ภาระงาน&nbsp;</a></li>
	 <? }?>
	  </ul>  
  <div class="tabs-container">
  	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	  	<tr>
		  <td width="100%" align="center"style="border: #7292B8 1px solid;" valign="top" >
 <? if($_SESSION['pivilage'] == '1' ) {?>
    <div class="tab" id="tab1" style="text-align:;">
	<iframe name="tab1" src="tab1.php?user_id=<?=$user_id?>" align="left" width="100%" height="650" frameborder="0" ></iframe> 
    </div>
    <div class="tab" id="tab2" style="text-align:center;">
		<iframe name="tab2" src="tab2.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe> 
    </div>

	
	<div class="tab" id="tab3" style="text-align:center;">
	  <iframe name="tab3" src="tab3.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe> 
    </div>
	<div class="tab" id="tab4" style="text-align:center;">
	    <iframe name="tab4" src="tab4.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe> 
    </div>
	<div class="tab" id="tab5" style="text-align:center;">
     <iframe name="tab5" src="tab5.php?user_id=<?=$user_id?>" align="left" width="100%" height="600" frameborder="0" ></iframe> 
    </div>
    <div class="tab" id="tab6" style="text-align:center;">
      <iframe name="tab6" src="tab6.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe>
    </div>
	 <? } 
	 if($_SESSION['pivilage'] == '1'  or $_SESSION['pivilage'] == '0') { ?>
<div class="tab" id="tab7" style="text-align:left;">
      <iframe name="tab7" src="tab7.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe>
</div>
<div class="tab" id="tab8" style="text-align:center;">	
	 <iframe name="tab8" src="tab8.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe>
	</div> 
		 <? }?>
	 <? 
	 if($_SESSION['pivilage'] == '1' ) { ?>
<div class="tab" id="tab9" style="text-align:center;">
 <iframe name="tab9" src="tab9.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe>
</div>	  
<div class="tab" id="tab10" style="text-align:center;">
<iframe name="tab10" src="tab10.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe>
</div>	  
<div class="tab" id="tab11" style="text-align:center;">
<iframe name="tab11" src="tab11.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe>	
</div>	  
<div class="tab" id="tab12" style="text-align:center;">
<iframe name="tab12" src="tab12.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe>	
</div>	 
<div class="tab" id="tab13" style="text-align:center;">
<iframe name="tab13" src="tab13.php?user_id=<?=$user_id?>" align="left" width="100%" height="500" frameborder="0" ></iframe>	
</div>	 
<? }?>
</td>
	</tr>
	</table>
	 
	  
	  
</div>
<SCRIPT type=text/javascript>var tabber1 = new Yetii({
id: 'demo'
});

</SCRIPT>


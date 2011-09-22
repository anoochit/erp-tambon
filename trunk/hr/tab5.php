<?
session_start();
include('config.inc.php');
if($w_id <>''){
		$sql = "DELETE From  work where w_id = '$w_id'";
		$result= mysql_query($sql);
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="Yetii/custom.css">
<link rel="stylesheet" type="text/css" href="Yetii/white.css">
<script type="text/javascript" src="Yetii/yetii-min.js"></script>
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
	if (confirm("คุณต้องลบข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>
<style type="text/css">
<!--
.style_h{
	color: #3300FF;
	font-size: 13px;
	font-family: Tahoma;
}
BODY {
	color:#000000;
	background-color: #FFFFFF;
	margin: 0px;
	font-size:14px;
	font-family:Tahoma;
}
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
.style6 {font-size: 13px}
.style_l {
	font-family: Tahoma;
	font-size: 13px;
	color: #990000;
	text-decoration: none;
	}
-->
</style>

<body>

 <form id="form5" name="form5" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td colspan="5" align="center"><p class="style6" align="center"><strong>ส่วนที่ 5 : ข้อมูลประวัติการทำงานราชการ</strong>			  </p>
			&nbsp; [ <a href="#" class="style_l" onClick="window.open('print_tab5.php?user_id=<?=$user_id?>')"   >พิมพ์ส่วนนี้</a> ]
				<br /><br />
			<a href="#" class="style20"   onClick="javascript:popup('add_work.php?user_id=<?=$user_id?>&action=add','',550,680)" >เพิ่มข้อมูลประวัติการทำงานราชการ</a>
			<br />
			<br />
			  </td>
            </tr>
		</table>
		           <?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM work where user_id ='$user_id' order by start_work  desc , w_id desc";
$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))
print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql .= " LIMIT $Page_start , $Per_Page";
		$result=mysql_query($sql);
		
		?>
		<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
	  	<tr>
		  <td width="100%" align="left"  valign="top" >
		 <table width="100%" bordercolor="#666666" cellspacing="1" style="border-collapse:collapse;">
          <tr> 

		  <td width="122" bgcolor="#33CC99" align="center" height="30" style="border: #000000 1px solid;" ><span class="style6">วันที่เริ่มงาน</span></td> 
		  <td width="122" bgcolor="#33CC99" align="center" height="30" style="border: #000000 1px solid;" ><span class="style6">สังกัด</span></td> 
		  <td width="512" height="25" bgcolor="#33CC99" align="center" style="border: #000000 1px solid;" ><span class="style6">กอง / ฝ่าย / ตำแหน่ง / ระดับหรือหมวด / เลขที่พนักงาน</span></td>
            <td width="93" bgcolor="#33CC99" align="center" style="border: #000000 1px solid;" ><span class="style6">เงินเดือน</span></td>
			<td width="43" bgcolor="#33CC99" style="border: #000000 1px solid;" ><div align="center" class="style6">&nbsp;</div></td>
			<td width="32" bgcolor="#33CC99" style="border: #000000 1px solid;" ><div align="center" class="style6">&nbsp;</div></td>
          </tr>
	<? while($d = mysql_fetch_array($result)){
	?>
          <tr>
		<td align="center" class="style6" height="30" style="border: #000000 1px solid;" ><?
		if($d[start_work]<>"0000-00-00" ) echo date_2($d[start_work])?>&nbsp;</td>
		  <td class="style6" style="border: #000000 1px solid;" >&nbsp;<?=$d[place]?></td>
		  <td height="25" class="style6" style="border: #000000 1px solid;" >&nbsp;<?="<b><font color=blue>หน่วยงาน&nbsp;:&nbsp;</font></b>".find_div_name1($d[div_id])." <br><b><font color=blue>&nbsp;ฝ่าย : </font></b>".find_sub_name1($d[sub_id])."<br>";
		  echo "<b><font color=blue>&nbsp;ตำแหน่ง : </font></b>".$d[position] . " <br><b><font color=blue>&nbsp;ระดับ : </font></b>".find_type_name($d[type_id])."  <br><b><font color=blue>&nbsp;เลขที่พนักงาน : </font></b>".$d[per_id];
		  ?></td>
            <td align="center" class="style6" style="border: #000000 1px solid;" ><?=number_format($d[pay],2)?>&nbsp;</td>
	        <td align="center" class="style6" style="border: #000000 1px solid;" ><a href="#"   onClick="javascript:popup('add_work.php?w_id=<?=$d[w_id]?>&action=edit','',550,680)" >แก้ไข</a></td>
			  <td align="center" class="style6" style="border: #000000 1px solid;" ><a href="?action=personnel_story&user_id=<?=$d[user_id]?>&w_id=<?=$d[w_id]?>"  onClick="return godel();" >ลบ</a></td>
          </tr>
		     <? }?>
        </table>
</td>
</tr>
</table>
    <div align="center"><br>
<center>
  <FONT size="2" >จำนวน ทั้งหมด  
<B><?= $Num_Rows;?></B>&nbsp;&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? 
if($Prev_Page) 
echo " <a href='$PHP_SELF?Page=$Prev_Page&user_id=$user_id'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo " [<a href='$PHP_SELF?Page=$i&user_id=$user_id'>$i</a>] ";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?Page=$Next_Page&user_id=$user_id'> หน้าถัดไป>> </a>";

?>
</font>
</center>
</div>   
      </form>
<br>
</body><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
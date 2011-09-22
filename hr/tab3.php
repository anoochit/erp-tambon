<?
session_start();
include('config.inc.php');
if($e_id <>''){
		$sql = "DELETE From  education where e_id = '$e_id'";
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

  <?
	  //-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM person p , ps_tname_ref ps WHERE p.ps_tname_id = ps.ps_tname_id and p.user_id=$user_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
 ?>
<form id="form3" name="form3" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td colspan="5" align="center"><p class="style6" align="center"><strong>ส่วนที่ 3 : ข้อมูลการศึกษา </strong> 	  </p>
			  &nbsp; [ <a href="#" class="style_l" onClick="window.open('print_tab3.php?user_id=<?=$user_id?>')"   >พิมพ์ส่วนนี้</a> ]
				<br /><br />
			<a href="#" class="style20"   onClick="javascript:popup('add_edu.php?user_id=<?=$user_id?>&action=add','',450,400)" >เพิ่มข้อมูลการศึกษา</a>
			<br />
			<br />
			            <?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM education  where user_id ='$user_id'  order by year desc";
	$Per_Page =5;
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
            </td>
            </tr>
			</table>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
	  	<tr>
		  <td width="100%" align="left"  valign="top" >
		 <table width="100%" bordercolor="#666666" cellspacing="1" style="border-collapse:collapse;">
          <tr>   
		   <td width="284" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center"><span class="style6">ระดับการศึกษา</span></div></td>
	  	    <td width="400" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center"><span class="style6">วุฒิที่ได้รับ</span></div></td>
		    <td  height="25"width="339" bgcolor="#33CC99" style="border: #000000 1px solid;"> <div align="center"><span class="style6">สถาบัน</span></div></td>
            <td width="99" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center"><span class="style6">ปีที่สำเร็จ</span></div></td>
         <td width="81" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center"><span class="style6">ประเทศ</span></div></td>
		
           <td width="52" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center" class="style6">&nbsp;</div></td>
			<td width="47" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center" class="style6">&nbsp;</div></td>
          </tr>
		  <?
		  while($d=mysql_fetch_array($result)){
		  ?>
          <tr>  
		  <td class="style6" style="border: #000000 1px solid;">&nbsp;<?=find_edu($d[ps_edu_id])?></td>	
		  <td class="style6" style="border: #000000 1px solid;">&nbsp;<?=$d[grade]?></td>
		  <td height="25" class="style6" style="border: #000000 1px solid;">&nbsp;<?=$d[academy]?></td>
            <td class="style6" style="border: #000000 1px solid;" align="center">&nbsp;<?=$d[year]?></td>
            <td class="style6" style="border: #000000 1px solid;">&nbsp;<?=$d[land]?></td>
		
          <td align="center" class="style6" style="border: #000000 1px solid;">
			   <a href="#"   onClick="javascript:popup('add_edu.php?e_id=<?=$d[e_id]?>&action=edit','',450,400)" >แก้ไข</a></td>
			  <td align="center" class="style6" style="border: #000000 1px solid;"><a href="?action=personnel_story&user_id=<?=$d[user_id]?>&e_id=<?=$d[e_id]?>"  onClick="return godel();" >ลบ</a>&nbsp;</td>
          </tr>
		     <?  }?>
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
</body><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
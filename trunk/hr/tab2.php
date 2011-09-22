<?
session_start();
include('config.inc.php');
if($cd_id <>''){
		$sql = "DELETE From  children where cd_id = '$cd_id'";
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
	<?

//-----------แสดงข้อมูล-------------------
    $sql="SELECT * FROM children where user_id = '$user_id' ";
	$result1 = mysql_query($sql);
		?>
      <form id="form2" name="form2" method="post" action="">

        <table width="100%" border="0">
          <tr>
            <td colspan="4" align="center">
			<p class="style6" align="center"><strong>ส่วนที่ 2 : ข้อมูลบุตร </strong></p>
			&nbsp; [ <a href="#" class="style_l" onclick="window.open('print_tab2.php?user_id=<?=$user_id?>')"   >พิมพ์ส่วนนี้</a> ]
				<br /><br />
	
			<a href="#" class="style20"   onClick="javascript:popup('add_c.php?user_id=<?=$user_id?>&action=add','',450,450)" >เพิ่มข้อมูลบุตร</a>
			<br />
			<br />
			</td>
            </tr>
			</table>
 <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
	  	<tr>
		  <td width="100%" align="left" valign="top" >
		 <table width="100%" bordercolor="#666666" cellspacing="1" style="border-collapse:collapse;">
	<tr>
            <td width="230" height="25" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center" class="style6">ชื่อ-สกุล</div></td>
            <td width="152" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center" class="style6">วัน เดือน ปีเกิด</div></td>
            <td width="201" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center" class="style6">สถานศึกษา / ที่ทำงาน</div></td>
           <td width="185" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center" class="style6">หมายเหตุ</div></td>
			<td width="79" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center" class="style6">&nbsp;</div></td>
			<td width="77" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center" class="style6">&nbsp;</div></td>
          </tr>
<? while ($d = mysql_fetch_array($result1)){?>
          <tr>
            <td height="25" class="style6" style="border: #000000 1px solid;"><?=$d[name]?></td>
            <td align="center" class="style6" style="border: #000000 1px solid;">&nbsp;<?
			if($d[birthday] <>"0000-00-00" ) echo date_format_th_1($d[birthday])?></td>
            <td class="style6" style="border: #000000 1px solid;">&nbsp;<?=$d[office]?></td> 
			<td class="style6" style="border: #000000 1px solid;">&nbsp;<?=$d[remark]?></td>
			 <td align="center" class="style6" style="border: #000000 1px solid;">
			   <a href="#"   onClick="javascript:popup('add_c.php?cd_id=<?=$d[cd_id]?>&action=edit','',450,450)" >แก้ไข</a></td>
			  <td align="center" class="style6" style="border: #000000 1px solid;"><a href="?action=personnel_story&user_id=<?=$d[user_id]?>&cd_id=<?=$d[cd_id]?>"  onClick="return godel();" >ลบ</a>&nbsp;</td>
          </tr>
<?  }?>
        </table>
	</td>
	</tr>
	</table>	   
 
      </form><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
<? ob_start();?>
<?
include("config.inc.php");
ob_start();
header('Content-type: application/ms-word');
header('Content-Disposition: attachment; filename="testing.doc"'); 
?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
<!--
.style1 {
	font-family: "Angsana New";
	font-weight: bold;
	font-size: 20px;
}
.style2 {
	font-family: "Angsana New";
	font-size: 18px;
}
-->
</style>
<body>

<table width="100%" border="1"  bordercolor="#000000" cellpadding="0" cellspacing="0">
          <tr>
		   <td width="58" height="25" ><div align="center" class="style2">ลำดับที่</div></td>
            <td width="286" height="25" ><div align="center" class="style2">ชื่อ-สกุล</div></td>
            <td width="187" ><div align="center" class="style2">วัน เดือน ปีเกิด</div></td>
            <td width="251" ><div align="center" class="style2">สถานศึกษา / ที่ทำงาน</div></td>
           <td width="152" ><div align="center" class="style2">หมายเหตุ</div></td>
			
          </tr>
<? 
    $sql="SELECT * FROM children where user_id = '$user_id' ";
	$result1 = mysql_query($sql);
	$i = 0;
while ($d = mysql_fetch_array($result1)){
$i++;
?>
          <tr>
		  <td height="25" class="style2" align="center">&nbsp;<?=$i?></td>
            <td height="25" class="style2">&nbsp;<?=$d[name]?></td>
            <td align="center" class="style2">&nbsp;<?
			if($d[birthday] <>"0000-00-00" ) echo date_format_th_1($d[birthday])?></td>
            <td class="style2">&nbsp;<?=$d[office]?></td> 
			<td class="style2">&nbsp;<?=$d[remark]?></td>
	
          </tr>
		  
		     <?
			 $year_old =$year ;
			  }?>
			 
        </table>

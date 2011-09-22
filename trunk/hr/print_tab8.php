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
		  <td width="57" height="25" ><div align="center" class="style2">ลำดับที่</div></td>
            <td width="144" height="25" ><div align="center"><span class="style2">วันที่ </span></div></td>
            <td width="216" ><div align="center"><span class="style2">ประเภท</span></div></td>
            <td width="519" ><div align="center"><span class="style2">หมายเหตุ</span></div></td>
		
          </tr>
		<? 
		$sql="SELECT * FROM come_late  where user_id = '$user_id'  order by date_late desc ";

$result1 = mysql_query($sql);
$i = 0;
while($rs=mysql_fetch_array($result1)){
	$i++;

	
		?>
		
          <tr  >
		  <td height="25" class="style2" align="center">&nbsp;<?=$i?></td>
            <td height="25" align="center" class="style2">&nbsp;<? if($rs[date_late]<>"0000-00-00" ) echo  date_format_th_1($rs[date_late])?></td>
            <td align="center" class="style2">&nbsp;<? if($rs[time_late] == 0) echo "สาย" ;else echo "ขาด"?></td>
            <td class="style2">&nbsp;<?=$rs[remark]?></td>

          </tr>
		  
		     <?
			  }?>
			 
        </table>

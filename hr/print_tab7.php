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
          <tr >
		  <td width="57" height="25" ><div align="center" class="style2">ลำดับที่</div></td>
		   <td width="262"  height="25"><div align="center"><span class="style2">ประเภทการลา</span></div></td>
            <td width="154" ><div align="center"><span class="style2">ตั้งแต่วันที่</span></div></td>
            <td width="202"  ><div align="center"><span class="style2">ถึงวันที่</span></div></td>
            <td width="259" ><div align="center"><span class="style2">หมายเหตุ</span></div></td>
		
          </tr>
		  <?
		  
$sql="SELECT * from vacation    WHERE 1 = 1 and user_id = '$user_id' 
order by date_begin desc";
$result1 = mysql_query($sql);
$i = 0;
while($rs=mysql_fetch_array($result1)){
	$i++;
?>     

<tr >
 <td height="25" class="style2" align="center">&nbsp;<?=$i?></td>
		 <td height="25" class="style2">&nbsp;<? echo find_la($rs[ps_latype_id])?></td>
            <td align="center" class="style2">&nbsp;<?  if($d[date_begin]<>"0000-00-00" ) echo   date_format_th_1($rs[date_begin]);  ?></td>                                                              
            <td align="center" class="style2">&nbsp;<?  if($d[date_end]<>"0000-00-00" ) echo  date_format_th_1($rs[date_end])?></td>
            <td class="style2">&nbsp;<? echo $rs[remark]?></td>

          </tr>
		  
		     <?
			  }?>
			 
        </table>

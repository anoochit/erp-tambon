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
	<td width="50" height="30" align="center"  class="style2"><span class="style6">ปีที่</span></td> 
		  <td width="135" height="30" align="center"  class="style2"><span class="style6">วัน เดือน ปี</span></td> 
		  <td width="214" height="25" align="center"  class="style2"><span class="style2">ตำแหน่ง </span></td>
		 
            <td width="87" align="center"  class="style2"><span class="style6">เงินเดือน</span></td>
    <td width="238" align="center"  class="style2"><span class="style6">หมายเหตุ</span></td>
          </tr>
	<? 
	 $sql="SELECT * FROM work where user_id ='$user_id' order by start_work  asc";
	  $result=mysql_query($sql);
	$i = 1;
	while($d = mysql_fetch_array($result)){
	$dd = explode("-",$d[start_work]);
	$year = $dd[0];
	?>
          <tr>
		  <td align="center" class="style2" height="30"><?
		if($year<>$year_old){ 
			echo $i;
			$i++;
		}
		?>&nbsp;</td>
		  <td align="center" class="style2" height="30"><?
		if($d[start_work]<>"0000-00-00" ) echo date_format_th_1($d[start_work])?>&nbsp;</td>
		  <td height="25" class="style2">&nbsp;<?=$d[position] . " <br>&nbsp;".$d[place];
		  ?></td>
			 
            <td align="center" class="style2"><?=number_format($d[pay],2)?>&nbsp;</td>
			<td   align="left"class="style2" >&nbsp;<?=$d[remark]?></td>
          </tr>
		  
		     <?
			 $year_old =$year ;
			  }?>
			 
        </table>

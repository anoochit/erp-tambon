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
		  <td width="52" height="25" ><div align="center" class="style2">ลำดับที่</div></td>
		  <td  height="30"width="141" ><div align="center"><span class="style2">วันที่</span></div></td>
		  <td  height="25"width="157" ><div align="center"><span class="style2">รายละเอียด</span></div></td>
            <td width="586" ><div align="center"><span class="style2">หมายเหตุ</span></div></td>
     
          </tr>
		  <?
 $sql="SELECT * FROM coin  where user_id ='$user_id'  order by co_id desc";
$result1 = mysql_query($sql);
$i = 0;

while($d=mysql_fetch_array($result1)){
	$i++;
		  ?>
          <tr>  
		  <td height="25" class="style2" align="center">&nbsp;<?=$i?></td
		  ><td height="30" align="center" class="style2">&nbsp;<?  if($d[co_date]<>"0000-00-00" ) echo   date_format_th_1($d[co_date]);  ?>
		  </td>
		  <td height="25" class="style2">&nbsp;<?=$d[detail]?></td>
            <td class="style2">&nbsp;<?=$d[remark]?></td>
        
          </tr>
         
          </tr>
		  
		     <?
			  }?>
			 
        </table>

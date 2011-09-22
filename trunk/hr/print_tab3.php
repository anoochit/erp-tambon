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
		   <td width="202" ><div align="center"><span class="style2">ระดับการศึกษา</span></div></td>
		  	 <td width="194" ><div align="center"><span class="style2">สาขา</span></div></td>
			 <td  height="25"width="202" ><div align="center"><span class="style2">สถาบัน</span></div></td>
            <td width="136" ><div align="center"><span class="style2">ปีที่สำเร็จ</span></div></td>
         <td width="146" ><div align="center"><span class="style2">ประเทศ</span></div></td>

          </tr>
		  <?
		  $i =0;
		   $sql="SELECT * FROM education  where user_id ='$user_id'  order by e_id desc";
		   $result=mysql_query($sql);
		  while($d=mysql_fetch_array($result)){
		  $i++;
		  ?>
          <tr>  
		   <td height="25" class="style2" align="center">&nbsp;<?=$i?></td>
		  <td class="style2">&nbsp;<?=find_edu($d[ps_edu_id])?></td>	
		  <td class="style2">&nbsp;<?=$d[grade]?></td>
		  <td height="25" class="style2">&nbsp;<?=$d[academy]?></td>
            <td class="style2">&nbsp;<?=$d[year]?></td>
            <td class="style2">&nbsp;<?=$d[land]?></td>
	
          </tr>
		  
		     <?
			  }?>
			 
        </table>

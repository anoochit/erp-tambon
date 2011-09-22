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
		   <td  height="25"width="116" ><div align="center"><span class="style2">วันที่</span></div></td>
		  <td  height="25"width="185" ><div align="center"><span class="style2">ประเภทเหรียญ</span></div></td>
		
		 
            <td width="637" ><div align="center"><span class="style2">หมายเหตุ</span></div></td>
     
      
          </tr>
		   <?
		  $i =0;
		   $sql="SELECT * FROM medal  where user_id ='$user_id'  order by m_id desc";
		   $result=mysql_query($sql);
		  while($d=mysql_fetch_array($result)){
		  $i++;
		  ?>
          <tr>  
		   <td height="25" class="style2" align="center">&nbsp;<?=$i?></td>
		  <td height="25" align="center" class="style2">&nbsp;<? 
		  if($d[date_add]<>"0000-00-00" ) echo date_format_th_1($d[date_add]) ;  ?>		  </td>  
		  <td height="30" class="style2">&nbsp;<?=find_medal_name($d[ps_medid])?></td>
		 
		 
            <td class="style2">&nbsp;<?=$d[remark]?></td>
     
          </tr>
		  
		     <?
			  }?>
			 
        </table>

<?
include("config.inc.php");
include("date_time.php");
ob_start();
header('Content-type: application/ms-word');
header('Content-Disposition: attachment; filename="testing.doc"'); 
?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<style type="text/css">
<!--
.style4 { font-family:"Microsoft Sans Serif" font-size: 7px; }
.style13 {font-family: "Microsoft Sans Serif"; font-size: 12px; }
-->
</style>
<body>
<?
$sql="SELECT  r.*,rd.* from receive r,receive_detail rd,code c  WHERE 1 = 1 
and r.r_id = rd.r_id and c.rd_id = rd.rd_id";
$sql .= " AND r.date_receive >= '".date_format_sql($date_receive)."' AND r.date_receive <= '".date_format_sql($date_receive1)."'  ";
$sql .= " group by r.num_id ";
$sql .= " order by r.date_receive desc ";

//echo $sql;
$result1 = mysql_query($sql);

?>
<table width="100%" align="center" border="1" acellpadding="0" cellspacing="0" bordercolor="#000000">
                                                <tr class="lgBar">
                                                  <td width="10%"  height="31"><div align="center"> <b><span style="font-size:8pt;"><font face="tahoma">เลขที่ใบส่งของ</font></span></b> </div></td>
                                                  <td width="33%" ><div align="center">
                                                      <b><span style="font-size:8pt;"><font face="tahoma">ร้านค้า</font></span></b>
                                                  </div></td>
                                                  <td width="13%" ><div align="center">
                                                     <b><span style="font-size:8pt;"><font face="tahoma">วันที่รับ</font></span></b>
                                                  </div></td>
                                                  <td width="13%"  align="center"><b><span style="font-size:8pt;"><font face="tahoma">วิธีการได้มา</font></span></b></td>
 <td width="31%"  align="center"><b><span style="font-size:8pt;"><font face="tahoma">รายการ / ครุภัณฑ์</font></span></b></td>
                                                </tr>
<?
$i = 0;
while($rs=mysql_fetch_array($result1)){
$i++;
if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';

?>   
<tr >
 <td  height="25"  align="center"><font size="2">&nbsp;<? echo $rs[num_id]; ?></font></td>
 <td ><div   align="left"><font size="2">&nbsp;<? echo shop_id2($rs[shop_id]); ?></font></div></td>
<td  align="center"><font size="2">&nbsp;<? echo date_2($rs[date_receive]);  ?> </font> </td>
<td align="center" ><font size="2"><? echo $rs[come_in];  ?></font></td>
<td  ><div   align="left"><font size="2"><?=code_1($rs[r_id])?></font></div></td>
</tr>
												</a>
                                                <? }
?>
                                              </table>

<?
include("config.inc.php");
ob_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
@media print { 
div.page { 
height: 100%;
margin: 0px 0px 0px 0px;
} 
}
</style>
<style type="text/css">
</style><body topmargin="0" onLoad="javascript:print();" >
<?
if($start <>'' and $end <>'')
$i = 0;
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
$sql_ex =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo, ";
$sql_ex  .=  "  if(rec_status is null,'ค้างชำระ',rec_status) as rec_status, ";
$sql_ex  .=  "  if(rec_id is null,'',rec_id)as rec_id, ";
$sql_ex  .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
$sql_ex  .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
$sql_ex  .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
$sql_ex  .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
$sql_ex  .=  "  Where b.mem_id = m.mem_id and b.status = 'ปกติ'   ";
$sql_ex  .=  "  and  hocode = '" .$HOCODE. "'   ";
$sql_ex  .=  "  group by b.MCODE ";
$sql_ex  .= " LIMIT $start , $end";
$result_1 = mysql_query($sql_ex );
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
if($rs_1[rec_id] <>''){
				if($rs_1[p_num] >=1 ) $p_num = $rs_1[p_num] +1;
				else $p_num = 1;
				$sql_3 = " update receive  set print_status ='1',p_num ='" .$p_num ."' ,memo = '" .$memo. "'   where mcode = '" .$rs_1[MCODE]. "' and   rec_id = '" . $rs_1[rec_id]."'     ";
		echo "<table width='70%'  cellpadding='0' cellspacing='0' border='0' bgcolor='#FFFFFF' align='center'  >";
		echo "<tr  class=style4 >";
		echo "<td valign=top align=center > ";
		echo "<table width=50% border=1 cellspacing=0 cellpadding=0 bordercolor=#000000>";
  		echo "<tr>";
    	echo "<td width=78% height=30 align='center' lass='style5' >&nbsp; ใบเสร็จรับเงินค่าขยะมูลฝอย </td>";
	    echo "</tr>";
	    echo "</table>";
 	    echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
  	    echo "<tr>";
        echo "<td height='25' class='style3'>&nbsp;&nbsp;<span class='style1'>".check_start_name( )."</span>&nbsp;&nbsp;&nbsp;<?=check_start_address( )?></td>";
  	   echo "</tr>";
       echo "<tr>";
       echo "<td height='25' class='style3'>&nbsp;&nbsp;เลขประจำตัวผู้เสียภาษี &nbsp;&nbsp;&nbsp;".tax()."</td>";
       echo "</tr>";
       echo "</table>";
       echo "<table width='70%' border='0' cellspacing='0' cellpadding='0' align='center' >";
       echo "<tr>";
       echo " <td width='49%' height='25' class='style3'>&nbsp;เลขที่ผู้ใช้ บ. &nbsp;&nbsp;".$rs_1[MCODE]."</td>";
	   echo "<td width='51%' class='style3'>&nbsp;เขต</td>";
       echo " </tr>";
	   echo " <tr>";
	   echo "   <td height='26' class='style3'>&nbsp;ใบเสร็จรับเงินเลขที่ &nbsp;&nbsp;".$rs_1[rec_id]."</td>";
	   echo "<td class='style3'>&nbsp;&nbsp;&nbsp;</td>";
       echo "</tr>";
       echo "  <tr>";
	   echo "   <td height='30'  colspan='2' class='style3'>";
	   echo "<table width='85%' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'  align='center'>";
       echo "<tr class='style3'>";
       echo " <td height='28'>&nbsp; ค่าขยะมูลฝอยประจำเดือน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".mounth3($month)."&nbsp;&nbsp;".$year ."&nbsp;  </td>";
  echo "</tr>";
  echo "</table>";
  echo "</td>";
 echo " </tr>";
echo "</table>";
echo "<table width='80%' border='0' cellspacing='0' cellpadding='0' align='center'>";
echo " <tr>";
 echo "  <td width='15%' height='25' class='style2'>&nbsp;<strong>ที่อยู่</strong></td>";
echo " <td width='85%' class='style2'>&nbsp;".$rs_1[name]." </td>";
echo " </tr>";
echo "<tr>";
echo "   <td height='28' class='style2'>&nbsp;</td>";
echo "<td height='28' class='style2'>&nbsp;";
	 if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
 	 else echo $rs_1[HNO] ."/" .$rs_1[HNO1] ;
	echo " หมู่ที่ ".$rs_1[moo]."&nbsp;&nbsp;&nbsp;".check_start_address_mem( ) ."</td>";
  echo "</tr>";
echo "</table>";
echo "<table width='60%' border='1' cellspacing='0' cellpadding='0' align='center' bordercolor='#000000'>";
  echo "<tr>";
  echo "  <td height='29' class='style2'  >";
   echo "   <div align='center'><strong>&nbsp;จำนวน (ถัง)</strong></div></td>";
	echo "<td class='style2'  ><div align='center'><strong>&nbsp; จำนวน (เงิน)</strong></div></td>";
  echo "</tr>";
  echo "<tr>";
   echo " <td height='35'  > <div  align='center'>".$rs_1[qty]."&nbsp;&nbsp;&nbsp;&nbsp; ";
     echo "</div></td>";
	echo " <td height='35'  > <div align='right'>".$rs_1[total]."&nbsp;&nbsp;&nbsp;&nbsp; ";
    echo " </div></td>";
 echo " </tr>";
echo "  <tr>";
  echo " <td height='29'  colspan='2'  > <div  align='left'>&nbsp;&nbsp;&nbsp;&nbsp;<span class='style7'>ตัวอักษร</span>
  	&nbsp;&nbsp;&nbsp;<span class='style2'>&nbsp;(";
      echo   num2string_2digit($rs_1[total]) ."บาทถ้วน )";
    echo " </span></div></td>";
  echo "</tr>";
echo "</table>";
echo "<table width='98%' border='0' cellspacing='0' cellpadding='0' align='center'>";
  echo "<tr valign='bottom'>";
 echo "   <td width='37%' height='72.5'>";
   echo "   <div align='center'><span class='style2'>......................................<br>";
    echo "      <strong>หัวหน้าส่วนการคลัง</strong><br>( ".head_khung()." )</span></div></td>";
   echo " <td width='38%'>";
    echo "  <div align='center'><span class='style2'>......................................<br>";
   echo "     <strong>พนักงานเก็บเงิน</strong><br>";
    echo "    ( ".receive_name()." )</span></div></td>";
    echo "<td width='25%' >";
     echo " <div align='center'><span class='style2'>......................................<br>";
      echo "  <strong>วันที่</strong><br>&nbsp;</span></div></td>";
  echo "</tr>
</table>
    </td>
	  </tr>  
</table>";
	}
}
?>
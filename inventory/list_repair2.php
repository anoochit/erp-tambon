<? 
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style2.css"> 
<div align="center">
<table width="114%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr><td colspan="2" align="center" style="border: #FFFFFF 1px solid;"><table width="114%" border="0" cellpadding="0" cellspacing="0" >
	<tr align="left" >
	<td  height="25"  >
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
          <tr>
            <td width="1288" height="39"><div align="center" class="tbHeadText"><b>บันทึกการซ่อมปรับปรุงแก้ไขครุภัณฑ์</b><!--<? echo fild_code_detail($c_id) ?> --></div></td>
            <td width="116"><div align="center">
              <table width="90" border="0" cellpadding="0" cellspacing="0" >
                  <tr >
                    <td style="border: #000000 1px solid;" height="30" ><div align="center" class="tbHeadText" >2&nbsp;</div></td>
                  </tr>
                  </table>
            </div></td>
          </tr>  
		  
          </table>
			  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: #000000 1px solid;" >
                <tr>
                  <td width="5%" rowspan="2" style="border: #000000 1px solid;" ><div align="center" class="TextNew" >ครั้งที่&nbsp;&nbsp;&nbsp;</div></td>
                  <td colspan="2" style="border: #000000 1px solid;" ><div align="center"class="TextNew">หนังสืออนุมัติ&nbsp;&nbsp;</div></td>
                  <td width="40%" rowspan="2" style="border: #000000 1px solid;" ><div align="center" class="TextNew">รายการซ่อม/ปรับปรุงแก้ไข&nbsp;&nbsp;</div></td>
                  <td width="8%" rowspan="2" style="border: #000000 1px solid;" ><div align="center" class="TextNew">จำนวนเงิน&nbsp;&nbsp;</div></td>
                  <td width="15%" rowspan="2" style="border: #000000 1px solid;" ><div align="center" class="TextNew">
                    ชื่อบุคคล - บริษัท<br />
					ผู้ซ่อม/ปรับปรุง
					
                    </div></td>
                  <td width="14%" rowspan="2" style="border: #000000 1px solid;" ><div align="center" class="TextNew">หมายเหตุ&nbsp;&nbsp;</div></td>
                </tr>
                <tr>
                  <td width="9%" style="border: #000000 1px solid;" ><div align="center" class="TextNew">เลขที่หนังสือ&nbsp;&nbsp;</div></td>
                  <td width="9%" style="border: #000000 1px solid;" ><div align="center" class="TextNew">ลงวันที่&nbsp;&nbsp;</div></td>
                </tr>
				<?
$sql = "SELECT * FROM service Where c_id = '$c_id'   order by date_ser  desc";
$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))

print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql .= " LIMIT $Page_start , $Per_Page";

$result = mysql_query($sql);
$i = 1;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
?>
                <tr class="TextNew2" height="28">
                  <td height="28" style="border: #000000 1px solid;" ><div align="center"><? echo  $i?>&nbsp;&nbsp;</div></td>
                  <td style="border: #000000 1px solid;" >&nbsp;</td>
                  <td style="border: #000000 1px solid;" ><div align="center"><?=date_2($rs1[date_ser])?>&nbsp;&nbsp;</div></td>
                  <td style="border: #000000 1px solid;" >&nbsp;&nbsp;<? echo $rs1[detail];   ?>&nbsp;</td>
                  <td style="border: #000000 1px solid;" ><div align="center"><? echo number_format($rs1[cost],".");   ?>&nbsp;</div></td>
                  <td style="border: #000000 1px solid;" >&nbsp;</td>
                  <td style="border: #000000 1px solid;" >&nbsp;<?  echo $rs1[remark];	  ?>&nbsp;</td>
                </tr>
			<? 

	$i++;
}?>	
                
    </table></td></tr></table>
</td></tr></table></div>


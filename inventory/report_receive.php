<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body>
<br>
<form name="f12" method="post"  action=""   >
<table  width="70%" height="82"  border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
  		  		<td  height="25"><div>&nbsp;&nbsp;&nbsp;��§ҹ �Ѻ����ѳ��</div></td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
    <tr>
	<td ><table  border="0" align="center" cellpadding="1" cellspacing="1"  width="100%">
	<tr class="bmText" >
  <td width="26%" align="center">�ѹ����Ѻ</td>
    <td width="74%"   ><input type="text" name="date_receive" value="<?  if($date_receive =='') echo date("d/m/Y") ;else echo $date_receive;//echo $date_receive?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive','DD/MM/YYYY')"   width='19'  height='19'>  &nbsp;  �֧ &nbsp; <input type="text" name="date_receive1" value="<?  if($date_receive1 =='') echo date("d/m/Y") ;else echo $date_receive1; //echo $date_receive1?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive1','DD/MM/YYYY')"   width='19'  height='19'>	  </td>
	</tr>
	<tr class="bmText" >
  <td  colspan="2"align="center" height="40"><input type="submit" name="search" value=" ���� "></td>
	</tr>
  </table></td></tr>
	
	
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>
<br>
<?
if($search <>''){
$sql="SELECT  r.*,rd.* from receive r,receive_detail rd,code c  WHERE 1 = 1 
and r.r_id = rd.r_id and c.rd_id = rd.rd_id";

if($date_receive <> '' and $date_receive1 <>''){
	$sql .= " AND r.date_receive >= '".date_format_sql($date_receive)."' AND r.date_receive <= '".date_format_sql($date_receive1)."'  ";
}
$sql .= " group by r.num_id ";
$sql .= " order by r.date_receive desc ";

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

print "<center><b>�ӹǹ $Page �ҡ���� $Num_Pages �ѧ����բ�ͤ���<b></center>";
$sql .= " LIMIT $Page_start , $Per_Page";
}
$result1 = mysql_query($sql);

?>

<table width="100%"   border="1"align="center" cellspacing="0"  cellpadding="0" >
                                                <tr class="lgBar">
                                                  <td width="10%"  height="31"><div align="center"> <b><span style="font-size:8pt;"><font face="tahoma">�Ţ�����觢ͧ</font></span></b> </div></td>
                                                  <td width="33%" ><div align="center">
                                                      <b><span style="font-size:8pt;"><font face="tahoma">��ҹ���</font></span></b>
                                                  </div></td>
                                                  <td width="13%" ><div align="center">
                                                     <b><span style="font-size:8pt;"><font face="tahoma">�ѹ����Ѻ</font></span></b>
                                                  </div></td>
                                                  <td width="13%"  align="center"><b><span style="font-size:8pt;"><font face="tahoma">�Ըա������</font></span></b></td>
 <td width="31%"  align="center"><b><span style="font-size:8pt;"><font face="tahoma">��¡�� / ����ѳ��</font></span></b></td>
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

                                                <? }
?>
                                              </table>

</form>
<div align="center"><br>
<center><FONT size="2" >�ӹǹ ������
<B><?= $Num_Rows;?></B>&nbsp;��¡��&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� : 
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=report_buy&search=$search&Page=$Prev_Page&date_receive=$date_receive&date_receive1=$date_receive1'><< ��͹��Ѻ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=report_buy&search=$search&Page=$i&date_receive=$date_receive&date_receive1=$date_receive1'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=report_buy&search=$search&Page=$Next_Page&date_receive=$date_receive&date_receive1=$date_receive1'> ˹�ҶѴ�>> </a>";

?><br><br>
<input type="submit" name="print" value=" �����" onclick="window.open('report_receive_print.php?date_receive=<?=$date_receive?>&date_receive1=<?=$date_receive1?>')"/>
</FONT></center></div>
</body>
</html>

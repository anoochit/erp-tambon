
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style2.css" rel="stylesheet" type="text/css">
<body>
<form name="f12" method="post"  action=""   >
<br>
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="25">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div><img src="images/Search.png"  align="absmiddle">&nbsp;&nbsp;��§ҹ����ѳ���������</div>	</td>
	</tr>
</table>
	</td>
	</tr>

   <tr class="bmText">
    <td width="20%" height="28"><strong>&nbsp;&nbsp;�ѹ����������</strong></td>
    <td width="80%"><div>&nbsp;<input name="endDate_garan" type="text" id="endDate_garan" value="<? echo $endDate_garan;?>"  size="10" />
            &nbsp; <img src="images/calendar.png" onClick="showCalendar('endDate_garan','DD/MM/YYYY')"   width='19'  height='19'> &nbsp;&nbsp;�֧�ѹ���&nbsp;&nbsp;<input name="endDate_garan1" type="text" id="endDate_garan1" value="<? echo $endDate_garan1;?>"  size="10" />
            &nbsp; <img src="images/calendar.png" onClick="showCalendar('endDate_garan1','DD/MM/YYYY')"   width='19'  height='19'></div></td>
  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ���� "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>

<br>
<?

if($search <>''){

$sql="SELECT c.code, c.num_machine , c.screen,rd.rd_name ,rd.endDate_garan , c.c_id as c_id1  from (receive r ,code c)
left  join receive_detail rd on  r.r_id = rd.r_id 
WHERE 1 = 1  and c.rd_id = rd.rd_id ";

if($endDate_garan <> '' and $endDate_garan <> ''){
		$sql .= " AND rd.endDate_garan >= '".date_format_sql($endDate_garan)."'  AND rd.endDate_garan <= '".date_format_sql($endDate_garan1)."'  ";
}else{
		$sql .= "  AND rd.endDate_garan <= '".date("Y-d-m")."'  ";
}
$sql .= " and r.type = 0 ";
$sql .= " group by c.c_id ";
$sql .= "  order by   rd.rd_name,abs(mid(c.code,9) ) desc ";
$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
if($result)
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
$result = mysql_query($sql);

?>
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr class="lgBar">
      <td  height="28" colspan="7" style="border: #000000 1px solid;" ><div  align="left">&nbsp;&nbsp;��§ҹ����ѳ���������</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#C1E0FF">
        <td width="5%"  height="31" style="border: #000000 1px solid;"  align="center"><strong>���</strong></td>
		<td width="20%" style="border: #000000 1px solid;"  align="center"><strong>���ͤ���ѳ��</strong></td>
         <td width="18%" style="border: #000000 1px solid;"  align="center"><strong>���ʤ���ѳ��</strong></td>
		 <td width="15%" style="border: #000000 1px solid;"  align="center"><strong>�ѹ����������</strong></td>
	<td width="13%"  align="center" style="border: #000000 1px solid;" ><strong>�����Ţ����ͧ</strong></td> 
         <td width="13%" style="border: #000000 1px solid;"  align="center"><strong>�����Ţ��</strong></td>
    <td width="16%"  align="center" style="border: #000000 1px solid;" ><strong>�����˵�</strong></td> 
          </tr>
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
if($result)
while($rs=mysql_fetch_array($result)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>       
<a href="show_control.php?c_id=<?=$rs[c_id1]?>" target="_blank" >
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#FFCC00'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center" style="border: #000000 1px solid;" ><font size="2">&nbsp;<font size="2"><font size="2"><? echo $i; ?></font></font></font></td>
 <td  height="25" align="left" style="border: #000000 1px solid;" ><font size="2">&nbsp;<font size="2"><? echo $rs[rd_name]; ?></font></font></td> 
 <td  align="left" style="border: #000000 1px solid;" >&nbsp;<font size="2"> <a href="show_control.php?c_id=<?=$rs[c_id1]?>" target="_blank"  ><? echo $rs[code];  ?></a></font></td>
 <td  height="25" align="center" style="border: #000000 1px solid;" >&nbsp;<font size="2"><? echo date_2($rs[endDate_garan]); ?></font></td> 
   <td align="center" style="border: #000000 1px solid;" >&nbsp;<font size="2"><? echo $rs[num_machine];  ?> </font> </td>
              <td  align="center" style="border: #000000 1px solid;" >&nbsp;<font size="2"><?=$rs[screen]?></font></td>                                 
 <td  style="border: #000000 1px solid;" >&nbsp;<font size="2"><?=$rs[remark]?></font></td>
          </tr>
</a>
 <? 

	}
?>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center">

<input  type="button" name="print" value=" ����� "  onclick="window.open('report_end_garan_print.php?num_id=<?=$num_id?>&code1=<?=$code1?>&endDate_garan=<?=$endDate_garan?>&endDate_garan1=<?=$endDate_garan1?>')" class="buttom"/> 
<br><br>
<center><FONT size="2" >�ӹǹ ������
<B><?= $Num_Rows;?></B>&nbsp;��¡��&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� :  
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=report_send&search=$search&Page=$Prev_Page&endDate_garan=$endDate_garan&endDate_garan1=$endDate_garan1'><< ��͹��Ѻ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=report_send&search=$search&Page=$i&num_id=$num_id&endDate_garan=$endDate_garan&endDate_garan1=$endDate_garan1'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=report_send&search=$search&Page=$Next_Page&num_id=$num_id&endDate_garan=$endDate_garan&endDate_garan1=$endDate_garan1'> ˹�ҶѴ�>> </a>";

?>
</FONT></center></div> 
</body>
</html>

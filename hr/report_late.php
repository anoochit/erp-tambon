
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //�Ѻ��ҡ�Ѻ��
               } 
          }
     };
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}

</script>
<form name="save" action=""  method="post" enctype="multipart/form-data">
<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#F4F7F9">
 		 	<tr  class="lgBar1" >
  		  		<td  height="25" colspan="4" ><div>��§ҹ��������</div></td>
  			</tr>
			    <tr >
                <td width="106" class="style_h"><div> �ѹ��� </div></td>
                <td width="164" ><div> <input name="date_late1" type="text" id="date_late1" 
	value="<? if($date_late1=='') echo date("d/m/Y"); else echo $date_late1;?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_late1','DD/MM/YYYY')"   width='19'  height='19'></div>           </td>
				  <td width="104" class="style_h"><div> �֧�ѹ��� </div></td>
                <td width="207" ><div> <input name="date_late2" type="text" id="date_late2" 
	value="<? if($date_late2=='') echo date("d/m/Y") ;else echo $date_late2;?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_late2','DD/MM/YYYY')"   width='19'  height='19'></div>           </td>
              </tr>
			  <tr><td colspan="4" height="35" align="center"><input type="submit" name="go_search" value="����"></td></tr>
</table>

	</td>
</tr>
</table>
<br />
<table width="98%" border="0" cellspacing="1" cellpadding="1"  align="center">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table name="body" width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td width="100%" valign="top">

<table width="100%" cellpadding="0" cellspacing="0" border="1" align="center"  bordercolor="#FFFFFF">

	<tr  bgcolor="#60c0ff">
		<td  align="center" height="25" width="181"> �Ţ��边ѡ�ҹ	</td>
		<td  align="center" height="25" width="229"> ���� - ʡ��</td>
		<td align="center" height="25" width="170"> �ѹ��������</td>
		<td   align="center" height="25" width="137">����</td>

	</tr>
	
<?
if($go_search  <> ""){
$sql="SELECT * FROM person  p, ps_tname_ref ps , come_late c  WHERE 
p.user_id =c.user_id and p.ps_tname_id = ps.ps_tname_id ";

if($date_late1 <> '' and $date_late2 <>''){
	$sql .= " AND c.date_late >= '".date_format_sql($date_late1)."' AND c.date_late <= '".date_format_sql($date_late2)."'  ";
}
$sql .= " AND p.status =0  ";

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
$result1 = mysql_query($sql);
}
$x = 1;
$i = 0;
while($rs=mysql_fetch_array($result1)){

if($i%2 == 0) $bg ='#CCCCCC';
elseif($i%2 ==1) $bg ='#FFFFFF';
$i++;
?>

<tr bgcolor="<? echo $bg?>" >
		
		<td align="left" height="25" width="181">&nbsp; <? echo $rs[div_id]."-".$rs[pos_id]."-";
		$k = "";
		for($i=0;$i<(3-strlen(trim($rs[per_id])));$i++){
			$k .="0" ;
		}
		echo $k.$rs[per_id]?></td>
		
		<td   align="left"height="25" width="229" >&nbsp; <? 
		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo $rs["name"]?></td>
		
		<td  align="left" height="25" width="170">&nbsp; <? echo date_2($rs[date_late])?></td>
		<td  align="left" height="25" width="137">&nbsp; <? echo $rs[time_late]?></td>

	</tr>  

	<?$x = $x +1;  }?>	

</table>
			</td>
</tr>
</table>
</td></tr> </table>
<div align="center"><br>
<center><FONT size="2" >�ӹǹ ������
<B><?= $Num_Rows;?></B>&nbsp;��Ѻ&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� : 
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='?action=report_late&Page=$Prev_Page&go_search=$go_search&date_late1=$date_late1&date_late2=$date_late2'><< ��͹��Ѻ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='?action=report_late&Page=$i&go_search=$go_search&date_late1=$date_late1&date_late2=$date_late2'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='?action=report_late&Page=$Next_Page&go_search=$go_search&date_late1=$date_late1&date_late2=$date_late2'> ˹�ҶѴ�>> </a>";

?>
<br />

</font>
</center>
</div>
</form>
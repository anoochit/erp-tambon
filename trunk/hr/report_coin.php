
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
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="save" action="#"  method="post" enctype="multipart/form-data">
<table width="95%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#F4F7F9">
 		 	<tr  class="lgBar1" >
  		  		<td  height="25" colspan="4" ><div>��§ҹ����ѵ��Ѻ����­����Ҫ�ҹ</div></td>
  			</tr>
			    <tr >
                <td width="59" class="style_h"><div> �ѹ��� </div></td>
                <td width="337" ><div> <input name="date_begin1" type="text" id="date_begin1" 
	value="<? if($date_begin1=='') echo date("d/m/Y"); else echo $date_begin1;?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_begin1','DD/MM/YYYY')"   width='19'  height='19'></div>           </td>
				  <td width="79" class="style_h"><div> �֧�ѹ��� </div></td>
                <td width="357" ><div> <input name="date_begin2" type="text" id="date_begin2" 
	value="<? if($date_begin2=='') echo date("d/m/Y") ;else echo $date_begin2;?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_begin2','DD/MM/YYYY')"   width='19'  height='19'></div>           </td>
              </tr>
			  <tr>      
        <td   class="style_h" height="30" ><div align="left"> �ͧ </div></td>
		<td class="style_h"><div align="left">
           <?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?><select name="div_id"  onchange="dochange('sub_div_1', this.value);">
<option value="">- - - - - - - - -��س����͡- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
				
?>
  <option value="<? echo $d[div_id];?>"
		<?
		if($div_id == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select>
</div>
</td>
 <td   class="style_h" ><div align="left">���� </div></td>
<td><div id="sub_div_1" align="left" >
<?
	if($div_id <>'' ){
		$query  ="select *  from division d,subdivision s
        where  1 = 1 and d.div_id = s.div_id
        and d.div_id = '$div_id'
		group by s.sub_name
        order by s.sub_id ";
		 $result = mysql_query($query);
          echo "<select name='sub_id' >";
         echo "<option value=''>- - - - - - - - -��س����͡- - - - - - - - -</option>\n";
          while($fetcharr = mysql_fetch_array($result)) { 

              echo "<option value='$fetcharr[sub_id]' ";
		if($sub_id ==  $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select></font>\n";  
}else{
?>
<select name='sub_id' >
	<option value="">- - - - - - - - -��س����͡- - - - - - - - - </option> 
	</select>
	<?
}
	 ?>
		</div>
        </td>
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
		<td  align="center" height="25" width="109"> �Ţ��边ѡ�ҹ	</td>
		<td  align="center" height="25" width="195"> ���� - ʡ��</td>
		<td  align="center" height="25" width="243"> ���˹�</td>
		<td align="center" height="25" width="146"> �ѹ���</td>
		<td   align="center" height="25" width="214">������</td>


	</tr>
	
<?
if($go_search  <> ""){
$sql="SELECT p.*,l.* ,w.per_id,ps.ps_tname_item,w.user_id as user_id1,w.position FROM (person  p, ps_tname_ref ps , coin l)
 left join  work w  on w.user_id =p.user_id    ";
if($div_id <>''  or $sub_id <>'' or $cat_id <>''  or   $type_id <>'' ) $sql .= " and w.w_id in(".find_w_id().") "; 
$sql .= " WHERE p.user_id =l.user_id  and p.ps_tname_id = ps.ps_tname_id ";

if($date_begin1 <> '' and $date_begin2 <>''){
	$sql .= " AND l.co_date >= '".date_format_sql($date_begin1)."' AND l.co_date <= '".date_format_sql($date_begin2)."'  ";
}
if($div_id <>''){
	$sql .= " and w.div_id = '$div_id'  ";
}
if($sub_id <>''){
	$sql .= " and w.sub_id = '$sub_id'  ";
}
$sql .= "  and p.type_mem = 0  group by l.co_id  order by  w.per_id ";

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
if($result1)
while($rs=mysql_fetch_array($result1)){

if($i%2 == 0) $bg ='#CCCCCC';
elseif($i%2 ==1) $bg ='#FFFFFF';
$i++;
?>

<tr bgcolor="<? echo $bg?>" >
		
		<td align="left" height="25" width="109">&nbsp; <?
		echo $rs[per_id]?></td>
		
		<td   align="left"height="25" width="195" >&nbsp; <a href="index.php?action=personnel_story&user_id=<? echo $rs["user_id1"]?>"  target="_blank"><? 

		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo $rs["name"]?></a></td>
		<td    align="left"height="25" width="243">&nbsp; <?=$rs[position]?></td>
		<td   align="center" height="25" width="146">&nbsp; <? if($rs[co_date] <>'0000-00-00')echo date_2($rs[co_date]);else echo ""; ?></td>
		<td   align="left"height="25" width="214">&nbsp; <?=$rs[detail]?></td>

	</tr>  

	<?$x = $x +1;  }?>	

</table>
			</td>
</tr>
</table>
</td></tr> </table>
<div align="center"><br>
<center><FONT size="2" >�ӹǹ ������ <B><?= $Num_Rows;?></B>&nbsp; ��¡��&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� : 
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='?action=report_coin&Page=$Prev_Page&go_search=$go_search&date_begin1=$date_begin1&date_begin2=$date_begin2&div_id=$div_id&sub_id=$sub_id'><< ��͹��Ѻ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='?action=report_coin&Page=$i&go_search=$go_search&date_begin1=$date_begin1&date_begin2=$date_begin2&div_id=$div_id&sub_id=$sub_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='?action=report_coin&Page=$Next_Page&go_search=$go_search&date_begin1=$date_begin1&date_begin2=$date_begin2&div_id=$div_id&sub_id=$sub_id'> ˹�ҶѴ�>> </a>";

?>

</font>
</center>
</div>
</form>
<center>
<input type="submit" name="print" value=" �����" onclick="window.open('report_coin_print.php?date_begin1=<?=$date_begin1?>&date_begin2=<?=$date_begin2?>&div_id=<?=$div_id?>&sub_id=<?=$sub_id?>')"/>
</center>
<?
function find_w_id(){
			$sql2="select max(start_work) as start_work ,user_id from work group by user_id ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd ="";
				while($rs2=mysql_fetch_array($result2)){
							 $sql="select  user_id,w_id from work where start_work = '$rs2[start_work]' and user_id ='$rs2[user_id]'  group by user_id ";
									$result1 = mysql_query($sql);
									if($result1)
									$rs1=mysql_fetch_array($result1);
											if($rs1[w_id] <>''){
												$dd .= $rs1[w_id].",";
											}
					}
					return substr($dd,0,strlen($dd)-1) ;
}
?>
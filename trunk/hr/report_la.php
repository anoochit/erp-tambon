
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
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="save" action=""  method="post" enctype="multipart/form-data">
<table width="95%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#F4F7F9">
 		 	<tr  class="lgBar1" >
  		  		<td  height="25" colspan="4" ><div>รายงานการลา</div></td>
  			</tr>
			    <tr >
                <td width="82" class="style_h"><div> วันที่ </div></td>
                <td width="321" ><div> <input name="date_begin1" type="text" id="date_begin1" 
	value="<? if($date_begin1=='') echo date("d/m/Y"); else echo $date_begin1;?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_begin1','DD/MM/YYYY')"   width='19'  height='19'></div>           </td>
				  <td width="116" class="style_h"><div> ถึงวันที่ </div></td>
                <td width="361" ><div> <input name="date_begin2" type="text" id="date_begin2" 
	value="<? if($date_begin2=='') echo date("d/m/Y") ;else echo $date_begin2;?>"  size="10"/>
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_begin2','DD/MM/YYYY')"   width='19'  height='19'></div>           </td>
              </tr>
			  <tr>      
        <td   class="style_h" height="30" ><div align="left"> กอง </div></td>
		<td class="style_h"><div align="left">
           <?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?><select name="div_id"  onchange="dochange('sub_div_1', this.value);">
<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
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
 <td   class="style_h" ><div align="left">ฝ่าย </div></td>
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
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - -</option>\n";
          while($fetcharr = mysql_fetch_array($result)) { 

              echo "<option value='$fetcharr[sub_id]' ";
		if($sub_id ==  $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select></font>\n";  
}else{
?>
<select name='sub_id' >
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select>
	<?
}
	 ?>
		</div>
        </td>
      </tr>
	 <tr>      
        <td   class="style_h" height="30" ><div align="left"> ประเภท</div></td>
		<td class="style_h"><div align="left">
          <?
			$query="select *  from category order by cat_id";
			$result=mysql_query($query);
?><select name="cat_id"  onchange="dochange('cat_1', this.value);">
<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
?>
  <option value="<? echo $d[cat_id];?>"
		<?
		if($cat_id == $d[cat_id] ) echo "selected";
		?>
		><? echo $d[cat_name];?></option>
  <? }?>
</select>
</div>
</td>
 <td   class="style_h" ><div align="left">ระดับ/หมวด </div></td>
<td><div id="cat_1" align="left" >
<? if($cat_id <>''){?>
<?
			$query  ="select *  from type
        where  1 = 1 and cat_id = '$cat_id'
		group by type_name
        order by type_id ";
		 $result = mysql_query($query);
          echo "<select name='type_id' >";
         echo "<option value=''>กรุณาเลือกฝ่าย</option>\n";
          while($fetcharr = mysql_fetch_array($result)) { 
               $label = $fetcharr['type_id'];
              echo "<option value=\"$label\" ";
		if($type_id  ==  $label ) echo "selected";
			    echo " >$fetcharr[type_name]</option> \n" ;
          }
		 echo "</select></font>\n";  

 }else{?>
	<select name='type_id' >
	<option value="">- - - - - - - - -กรุณาเลือก- - - - - - - - - </option> 
	</select>
<? }?>
		</div>
        </td>
      </tr> 
			  <tr><td colspan="4" height="35" align="center"><input type="submit" name="go_search" value="ค้นหา"></td></tr>
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
	<td width="100%" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="1" align="center"  bordercolor="#FFFFFF">
      <tr  bgcolor="#60c0ff">
        <td  align="center" height="25" width="46" rowspan="2">ที่ </td>
        <td  align="center" height="25" width="171" rowspan="2"> ชื่อ - ตำแหน่ง </td>
        <td  align="center" height="25" width="53" rowspan="2"> จำนวน<br />
          ครั้งที่ลา</td>
        <td align="center" height="25"   colspan="7"> จำนวนวันลา</td>
		<td width="83" height="25"   rowspan="2"   align="center">ขาด ครั้ง </td>
        <td width="83" height="25"   rowspan="2"   align="center">มาสาย ครั้ง </td>
      </tr>
      <tr  bgcolor="#60c0ff">
        <? 
	$sql1 ="SELECT * FROM ps_latype where status = 0 order by ps_latype_id";

		$result1 = mysql_query($sql1);
		while($rs1=mysql_fetch_array($result1)){
	
	?>
        <td  align="center" height="25"><?=$rs1[ps_latype_item]?>
          &nbsp; </td>
        <? }?>
        <td   align="center" height="25" > รวมวันลา </td>
      </tr>
      <?
if($go_search  <> ""){
$sql="SELECT *,p.user_id as user_id1 FROM (person p, ps_tname_ref ps)
left join  work w  on w.user_id =p.user_id  ";
if($div_id <>''  or $sub_id <>'' or $cat_id <>''  or   $type_id <>'' ) $sql .= " and w.w_id in(".find_w_id().") "; 
$sql .= " left join vacation v on v.user_id =p.user_id
left join come_late c on c.user_id = p.user_id
WHERE  p.ps_tname_id = ps.ps_tname_id   ";

if($div_id  <>'')$sql .= " AND w.div_id ='$div_id' ";
if($sub_id  <>'')$sql .= " AND w.sub_id ='$sub_id' ";
if($cat_id  <>'')$sql .= " AND w.cat_id ='$cat_id' ";
if($type_id  <>'')$sql .= " AND w.type_id ='$type_id' ";

if($date_begin1 <> '' and $date_begin2 <>''){
	$sql .= " 
	AND ((v.date_begin >= '".date_format_sql($date_begin1)."'  AND v.date_begin <=  '".date_format_sql($date_begin2)."'  )
	 or (c.date_late >='".date_format_sql($date_begin1)."' AND c.date_late <=  '".date_format_sql($date_begin2)."'  ))
 ";
}

$sql .= "	 AND p.status =0  ";
$sql .= "	 and p.type_mem = 0  group by p.user_id  ";

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

print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อมูล<b></center>";
$result = mysql_query($sql);
}
$x = 1;
$i = 0;
	if($Page >= 2 ){
			$i=$Page_start ;
		}else{
			$i =0;
		}
if($result)
while($rs=mysql_fetch_array($result)){

if($i%2 == 0) $bg ='#CCCCCC';
elseif($i%2 ==1) $bg ='#FFFFFF';
$i++;
?>
      <tr bgcolor="<? echo $bg?>" >
        <td   align="center" height="25" width="46">&nbsp; <? echo $i?></td>
        <td align="left" height="25" width="171">&nbsp; <a href="index.php?action=personnel_story&user_id=<? echo $rs["user_id1"]?>"  target="_blank">
          <? 
		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo $rs["name"]?>
          </a><br />
          <? echo $rs["position"]?></td>
        <td  align="center"height="25" width="53" >&nbsp;
            <? 
		echo find_la_all($rs[user_id1],$date_begin1,$date_begin2)?></td>
        <? 
	$sql2 ="SELECT * FROM ps_latype where status = 0 order by ps_latype_id";

		$result2 = mysql_query($sql2);
		$total_all = 0;
		while($rs2=mysql_fetch_array($result2)){
		$total_all =$total_all + find_la_all_sub($rs[user_id1],$date_begin1,$date_begin2,$rs2[ps_latype_id]);
	?>
        <td   align="center" height="25" width="91">&nbsp; <? echo find_la_all_sub($rs[user_id1],$date_begin1,$date_begin2,$rs2[ps_latype_id])?></td>
        <? }?>
        <td  align="center" height="25" width="87">&nbsp; <? echo $total_all?></td>
		<td width="36" height="25"   align="center" >&nbsp; <? echo find_late_all1($rs[user_id1],$date_begin1,$date_begin2)?></td>
        <td width="36" height="25"   align="center" >&nbsp; <? echo find_late_all2($rs[user_id1],$date_begin1,$date_begin2)?></td>
      </tr>
      <?$x = $x +1;  }?>
    </table></td>
</tr>
</table>
</td></tr> </table>
</form>
<center>
<br>
<input type="submit" name="print" value=" พิมพ์" onclick="window.open('report_la_print.php?date_begin1=<?=$date_begin1?>&date_begin2=<?=$date_begin2?>&div_id=<?=$div_id?>&sub_id=<?=$sub_id?>&cat_id=<?=$cat_id?>&type_id=<?=$type_id?>')"/>
</center>

<?
function find_la_all($user_id,$date_begin,$date_end){
		$sql1="SELECT count(*) as sum FROM vacation  where user_id ='$user_id' 
		AND (date_begin >= '".date_format_sql($date_begin)."'  AND date_begin <=  '".date_format_sql($date_end)."'  ) ";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	$rs1[sum];
}
function find_la_all_sub($user_id,$date_begin,$date_end,$la_type){
		$sql1="SELECT *,TO_DAYS(date_end) - TO_DAYS(date_begin) as sum FROM vacation  where user_id ='$user_id' 
		and ps_latype_id ='$la_type'
		AND date_begin >= '".date_format_sql($date_begin)."'  AND date_begin <=  '".date_format_sql($date_end)."'   ";
		$result1 = mysql_query($sql1);
		$sum = 0;
		while($rs1=mysql_fetch_array($result1)){
				$sum = $sum + ($rs1[sum] + 1);
		}
		return 	$sum;
}

function find_late_all1($user_id,$date_begin,$date_end){
		$sql1="SELECT count(*) as sum FROM come_late  where user_id ='$user_id' 
		AND (date_late >= '".date_format_sql($date_begin)."'  AND date_late <=  '".date_format_sql($date_end)."'  )  and time_late = 1 ";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	$rs1[sum];
}
function find_late_all2($user_id,$date_begin,$date_end){
		$sql1="SELECT count(*) as sum FROM come_late  where user_id ='$user_id' 
		AND (date_late >= '".date_format_sql($date_begin)."'  AND date_late <=  '".date_format_sql($date_end)."'  )  and time_late = 0";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	$rs1[sum];
}
function find_late_all($user_id,$date_begin,$date_end){
		$sql1="SELECT count(*) as sum FROM come_late  where user_id ='$user_id' 
		AND (date_late >= '".date_format_sql($date_begin)."'  AND date_late <=  '".date_format_sql($date_end)."'  )  ";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	$rs1[sum];
}
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
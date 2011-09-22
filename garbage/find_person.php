<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};
//dochange จะถูกเรียกเมื่อมีการเลือก รายการ Combobox ซึ่งจะทำให้ไปเรียก AJAX เพื่อร้องขอข้อมูลถัดไปจาก Server
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
<form name="save" action=""  method="post" enctype="multipart/form-data">
<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#F4F7F9">
 		 	<tr  class="lgBar1" >
  		  		<td  height="25" colspan="2" ><div>ค้นหาบุคคลากร</div></td>
  			</tr>
			    <tr >
                <td width="166" class="style_h"><div> กอง </div></td>
                <td width="409" ><div> <?
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
</select>     </div>           </td>
              </tr>
			  <tr >
                <td width="166" class="style_h"><div> ฝ่าย </div></td>
                <td width="409" ><div id="sub_div_1" align="left" >
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
		</div>        </td>
              </tr>
<tr>
	<td width="166" class="style_h"><div>
		เลขที่พนักงาน
		</div>	</td>
	<td><div><input type="text" name="per_id" value="<? echo $per_id?>" size="20" maxlength="100" />
	</div></td>
</tr>
<tr>
	<td width="166" class="style_h"><div>
		ชื่อ - สกุล
		</div>	</td>
	<td><div><input type="text" name="name" value="<? echo $name?>" size="20" maxlength="100" />
</div></td>
</tr>
			  <tr><td colspan="2" height="35" align="center"><input type="submit" name="go_search" value="ค้นหา"></td></tr>
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
		<td  align="center" height="25" width="126"> เลขที่พนักงาน	</td>
		<td  align="center" height="25" width="238"> ชื่อ - สกุล</td>
		<td align="center" height="25" width="190"> กอง</td>
		<td   align="center" height="25" width="157">ฝ่าย</td>
		<td   align="center" height="25" width="196"> ตำแหน่ง	</td>
	</tr>
<? 
if($go_search  <> ""){
 $sql="SELECT *,p.user_id as user_id1 FROM person p, ps_tname_ref ps ";
 if($div_id  <>'' or find_w_id($div_id,$sub_id,$pos_id,$name,$per_id) <>'') $sql .= "  , work w ";
	$sql .= "  WHERE 1=1 ";
  if($div_id  <>'')$sql .= "  and w.user_id =p.user_id ";
	$sql .= " and p.status =0
and p.ps_tname_id = ps.ps_tname_id ";
if($div_id  <>'')$sql .= " AND w.div_id ='$div_id' ";
if($sub_id  <>'')$sql .= " AND w.sub_id ='$sub_id' ";
if($pos_id  <>'')$sql .= " AND w.pos_id ='$pos_id' ";
if(trim($name)  <>'')$sql .= " AND p.name  like '%".trim($name)."%' ";
if($per_id <>''){
	$sql .= " AND w.per_id ='$per_id' ";
}
if(find_w_id($div_id,$sub_id,$pos_id,$name,$per_id) <>''){
	$sql .= " and w.w_id in(".find_w_id($div_id,$sub_id,$pos_id,$name,$per_id).") 
	and w.user_id =p.user_id ";
}
$sql .= "	 group by p.user_id  ";
$Per_Page =20;
if(!$Page){$Page=1;}//if($go_search=="ค้นหา"){$Page=1;}
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
<a href="index.php?action=personnel_story&user_id=<? echo $rs["user_id1"]?>" > 
<tr bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onmouseout="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
		
		<td align="left" height="25" width="126">&nbsp; <? 
		echo $rs[per_id]?></td>
		<td   align="left"height="25" width="238" >&nbsp; <a href="index.php?action=personnel_story&user_id=<? echo $rs["user_id1"]?>" > <? 
		 if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		  echo $rs["name"]?></td></a>
		<td  align="left" height="25" width="190">&nbsp; <? echo find_div_name1($rs[div_id])?></td>
		<td  align="left" height="25" width="157">&nbsp; <? echo find_sub_name1($rs[sub_id])?></td>
		<td  align="left" height="25" width="196">&nbsp; <? echo $rs[position] //find_posi_name1($rs[pos_id])?></td>
	</tr>  
		</a>
	<?$x = $x +1;  }?>	
</table>
			</td>
</tr>
</table>
</td></tr> </table>
<div align="center"><br>
<center><FONT size="2" >มีจำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp;คน&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='?action=find_person&Page=$Prev_Page&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&pos_id=$pos_id&per_id=$per_id&name=$name'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)
echo "[<a href='?action=find_person&Page=$i&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&pos_id=$pos_id&per_id=$per_id&name=$name'>$i</a>]";
else 
echo "<b> $i </b>";
}
if($Page!=$Num_Pages)
echo "<a href ='?action=find_person&Page=$Next_Page&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&pos_id=$pos_id&per_id=$per_id&name=$name'> หน้าถัดไป>> </a>";
?>
<br />
</font>
</center>
</div>
</form>
<?
function find_w_id($div_id,$sub_id,$pos_id,$name,$per_id){
 $sql="SELECT max(w.w_id)as w_id 
FROM person p, ps_tname_ref ps, work w  
WHERE 1=1 
and w.user_id =p.user_id  
and p.status =0
and p.ps_tname_id = ps.ps_tname_id
 ";
if($div_id  <>'')$sql .= " AND w.div_id ='$div_id' ";
if($sub_id  <>'')$sql .= " AND w.sub_id ='$sub_id' ";
if($pos_id  <>'')$sql .= " AND w.pos_id ='$pos_id' ";
if($name  <>'')$sql .= " AND p.name  like '%$name%' ";
if($per_id <>''){
	$sql .= " AND w.per_id ='$per_id' ";
}
		$sql .= "	 group by p.user_id  ";
		$sql .= "  order by  w.w_id ";
		$result1 = mysql_query($sql);
		$dd ="";
		while($rs1=mysql_fetch_array($result1)){
				if($rs1[w_id] <>''){
					$dd .= $rs1[w_id].",";
				}
		}
		return substr($dd,0,strlen($dd)-1) ;
}
?>
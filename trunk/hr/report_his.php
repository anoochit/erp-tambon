
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
<form name="save" action="report_his_result.php"  target="_blank" method="post" enctype="multipart/form-data">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#F4F7F9">
 		 	<tr  class="lgBar1" >
  		  		<td  height="25" colspan="4" ><div>รายงานข้อมูลทะเบียนประวัติ</div></td>
  			</tr>
			  <tr>      
        <td width="59" height="30"   class="style_h" ><div align="left"> กอง </div></td>
		<td width="271" class="style_h"><div align="left">
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
</div></td>
 <td width="96"   class="style_h" ><div align="left">ฝ่าย </div></td>
<td width="278"><div id="sub_div_1" align="left" >
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
        <td   class="style_h" height="30" ><div align="left"> ประเภท</div></td>
		<td class="style_h"><div align="left">
          <?
			$query="select *  from category order by cat_id";
			$result=mysql_query($query);
?>
		  <select name="cat_id"  onchange="dochange('cat_1', this.value);">
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
		</div></td>
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
		</div>        </td>
      </tr> 
	  <tr>      
        <td   class="style_h" height="30" ><div align="left">สถานะ</div></td>
		<td class="style_h"><div align="left">
 <select name="status" >
<option value="0" <? if($status =='0' or $status =='') echo "selected"?> > ปกติ</option>
<option value="1" <? if($status =='1') echo "selected"?> > ลาออก</option>
 <option value="2" <? if($status =='2') echo "selected"?> > ไล่ออก</option>
<option value="3" <? if($status =='3') echo "selected"?> >เกษียณ</option>
<option value="4" <? if($status =='4') echo "selected"?> > ย้าย</option>
</select>
</div></td>
      </tr>
			  <tr><td colspan="4" height="35" align="center"><input type="submit" name="go_search" value="ค้นหา"></td></tr>
</table>

	</td>
</tr>
</table>
<br />
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
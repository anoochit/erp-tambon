
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
<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#F4F7F9">
 		 	<tr  class="lgBar1" >
  		  		<td  height="25" colspan="2" ><div>ค้นหาบุคคลากรข้าราชการ/ลูกจ้าง/พนักงาน</div></td>
  			</tr>
			    <tr >
                <td width="285" class="style_h"><div> กอง </div></td>
                <td width="750" ><div> <?
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
                <td width="285" class="style_h"><div> ฝ่าย </div></td>
                <td width="750" ><div id="sub_div_1" align="left" >
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
	<td width="285" class="style_h"><div>
		เลขที่พนักงาน
		</div>	</td>
	<td><div><input type="text" name="per_id" value="<? echo $per_id?>" size="20" maxlength="100" />
	<!--ex. 51001-01-001  -->
	</div></td>
</tr>
<tr>
	<td width="285" class="style_h"><div>
		ชื่อ - สกุล
		</div>	</td>
	<td><div><input type="text" name="name" value="<? echo $name?>" size="20" maxlength="100" /></div></td>
</tr>
<tr>
	<td width="285" class="style_h"><div>
		ปีที่มีการปรับระดับ
		</div>	</td>
	<td><div><select name="year"><? ?>
<option value="" <? if($year =='' ) echo "selected"?>>- - เลือก - -</option> 
	<?
	for($i=-20;$i<=1;$i++){
	?>
	<option value="<?=date("Y") + 543+$i?>" <?	if($year ==(date("Y") + 543+$i) ) echo "selected" ;
	?>><?=date("Y") + 543+$i?></option>
	<?
	}
	?>
	</select></div></td>
</tr>
			  <tr><td colspan="2" height="35" align="center"><input type="submit" name="go_search" value="ค้นหา"></td></tr>
</table>

	</td>
</tr>
</table>
<br />
<table width="19%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center"><a href="index.php?action=add_person" >เพิ่มบุคคลากร </a></td>
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
		<td  align="center" height="25" width="187"> เลขที่พนักงาน	</td>
		<td  align="center" height="25" width="312"> ชื่อ - สกุล</td>
		<td   align="center" height="25" width="419">ข้อมูล</td>
		<td   align="center" height="25" width="348"> ตำแหน่ง	</td>

	</tr>
	
<? 
if($go_search  <> ""){

 $sql="SELECT *,p.user_id as user_id1 FROM (person p, ps_tname_ref ps)
 left outer join  work w  on w.user_id =p.user_id  ";
if(($div_id <>''  or $sub_id <>'' or $per_id <>'' or $year =='') and find_w_id() <>'' )$sql .= " and w.w_id in(".find_w_id().") "; 
$sql .= "  WHERE 1=1 and p.status =0 and p.ps_tname_id = ps.ps_tname_id";

	$sql .= "  and p.ps_tname_id = ps.ps_tname_id ";
if($div_id  <>'')$sql .= " AND w.div_id ='$div_id' ";
if($sub_id  <>'')$sql .= " AND w.sub_id ='$sub_id' ";
if($pos_id  <>'')$sql .= " AND w.pos_id ='$pos_id' ";
if($year <>'') $sql .=" AND year(w.start_work) = '".($year-543)."' ";
if(trim($name)  <>'')$sql .= " AND p.name  like '%".trim($name)."%' ";

if($per_id <>''){
	$sql .= " AND w.per_id ='$per_id' ";
}
$sql .= "	 and p.type_mem = 0 group by p.user_id  ";
$Per_Page =20;
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
<tr bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onmouseout="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
		
		<td align="left" height="25" width="187">&nbsp; <? 
		echo $rs[per_id]?></td>
		
		<td   align="left"height="25" width="312" >&nbsp; <a href="index.php?action=personnel_story&user_id=<? echo $rs["user_id1"]?>"> <? 
		 if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]."";
		  else "";
		  echo $rs["name"]?></a></td>
		<td  align="left" height="25" width="419">&nbsp; <? 
		if($rs[div_id]) echo "<b>กอง : </b>".find_div_name1($rs[div_id]);
		if($rs[sub_id]) echo "<br>&nbsp; <b>ฝ่าย : </b>".find_sub_name1($rs[sub_id]);
		if($year <>''){
				$tt = explode(",",find_command($rs["user_id1"] , $year ));
				if($tt[0] <>'' )	 echo find_command_show($tt[0] , "1");
				if($tt[1]  <>'')  echo find_command_show($tt[1] , "2");
		}else{
				$tt1 = explode(",",find_max_id($rs["user_id1"]));
				echo find_command_show($tt1[0], "1");
				echo find_command_show($tt1[1] , "2");
		}
		
		?></td>
		
		<td  align="left" height="25" width="348">&nbsp; <? echo $rs[position]?></td>

	</tr>  
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
echo " <a href='?action=find_person&Page=$Prev_Page&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&pos_id=$pos_id&per_id=$per_id&name=$name&year=$year'><< ย้อนกลับ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='?action=find_person&Page=$i&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&pos_id=$pos_id&per_id=$per_id&name=$name&year=$year'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='?action=find_person&Page=$Next_Page&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&pos_id=$pos_id&per_id=$per_id&name=$name&year=$year'> หน้าถัดไป>> </a>";

?>
<br />

</font>
</center>
</div>
</form>
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

function find_max_id($user_id){
					
				$sql2="select max(start_work) as start_work ,user_id,w_id from work where user_id = '$user_id' and  command <>''
				group by start_work order by start_work  desc , w_id desc limit 3 ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd ="";
				while($rs2=mysql_fetch_array($result2)){
						$dd .= $rs2[w_id].",";
					}
					return substr($dd,0,strlen($dd)-1) ;
}


function find_command($user_id , $year ){
					
				 $sql2="SELECT * FROM work  where  user_id ='$user_id'   AND year(start_work) = '".($year-543)."' and  command <>'' order by start_work  desc , w_id desc limit 3 ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd ="";
				while($rs2=mysql_fetch_array($result2)){
						$dd .= $rs2[w_id].",";
						
				}
				return substr($dd,0,strlen($dd)-1) ;
}
function find_command_show($w_id , $num){
	
				 $sql2="SELECT * FROM work  where  w_id ='$w_id'  group by w_id  limit 1 ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd2 ='';
				while($rs2=mysql_fetch_array($result2)){
				if($num == '1'){  $ss = "ปรับระดับ"; }
				if($num == '2'){  $ss = "ปรับระดับก่อน";}
				
					if($rs2[command] <>'')   $dd2 .=  "<br>&nbsp; <b>$ss : </b>  คำสั่งเลขที่ ".$rs2[command];
					if($rs2[date_command] <>'0000-00-00') $dd2 .= " ลงวันที่ ".date_2($rs2[date_command]);
				}

				return $dd2 ;
}
function find_command_show2($w_id){

				 $sql2="SELECT * FROM work  where  w_id ='$w_id'  group by w_id  limit 1 ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd2 ='';
				while($rs2=mysql_fetch_array($result2)){
					if($rs2[command] <>'')  $dd2 .=  "<br>&nbsp; <b>การปรับระดับก่อนหน้า : </b>  คำสั่งเลขที่ ".$rs2[command];
					if($rs2[date_command] <>'0000-00-00') $dd2 .= " ลงวันที่ ".date_2($rs2[date_command]);
				}
				return $dd2 ;
}
?>
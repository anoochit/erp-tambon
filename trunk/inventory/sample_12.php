<?
include('config.inc.php');

if($Go <> ''){
		$m_id = find_max_m_id();
		$sql_order = "INSERT INTO move (year,department,name_head,remark,user,c_id , m_id) 
		VALUES('$year','$department','$name_head','$remark','$user' , '$c_id' , '$m_id')";
		echo $sql_order."<br>";
		$result_open = mysql_query($sql_order);
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>    
		<?
}
if($Go1 <> ''){

		$sql_order = "UPDATE move SET year = '$year' ,department = '$department',name_head = '$name_head',remark ='$remark'
		,user = '$user' where m_id = '$m_id' ";
		echo $sql_order."<br>";
		$result_open = mysql_query($sql_order);
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>
		<?
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style2.css">
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<script language="JavaScript" src="include/calendar.js"></script>
<body>
<br>
<form action="" method="post" name="f22" >
<? if($tab=='add'){?>
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; เพิ่ม ชื่อผู้ใช้ - ดูแล -รับผิดชอบพัสดุ </td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
			<tr class="bmText_1">
   <td width="31%">พ.ศ.</td>
   <? $year = date("Y") + 543 ?>
    <td width="69%"><div><input name="year" type="text" id="year" value="<? echo $year?>"  maxlength="4" size="10"/>
                 </div></td>
  </tr>
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
    <td>ชื่อส่วนราชการ</td>
    <td><div><?
		$query="select * from division order by div_id";
			$result=mysql_query($query);
			?>
	    <select name="department"  >
          <option  value=""> - - - - กรุณาเลือก - - - -</option>
          <? while($d =mysql_fetch_array($result)){		?>
          <option value="<? echo $d[div_id];?>"
		<?
		if($department == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
          <? }?>
        </select></div></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
    <td>ชื่อผู้ใช้พัสดุ</td>
    <td><div><input name="user" type="text"  size="40" value="<?=$user?>"></div></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
    <td>ชื่อหัวหน้าส่วนราชการ</td>
    <td><div><input name="name_head" type="text"  size="40" value="<?=$name_head?>"></div></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
   <td>หมายเหตุ</td>
    <td><div><textarea rows="5" cols="40" name="remark"  ><?=$remark?></textarea></div></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr><td colspan="4" align="center" height="35"><!--clsControlObject('f','write'); id="btnSub"  -->
    <input   type="submit" name="Go" value=" บันทึก " onClick="return godel_a();" > &nbsp;&nbsp;
</td>
  </tr>      
            </table></td>
			</tr>
		</table>
	</td>
            </table></td>
			</tr>
		</table>
	</td>
</tr>
</table>
<? }elseif($tab=='edit'){
$sql = "SELECT * FROM move WHERE m_id= $m_id ";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?>
<input type="hidden" name="m_id" value="<?=$m_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#FFCC99" class="tbETitle">&nbsp; แก้ไข ชื่อผู้ใช้ - ดูแล -รับผิดชอบพัสดุ</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
 <tr class="bmText_1">
   <td width="31%">พ.ศ.</td>
   <? //$year = date("Y") + 543 ?>
    <td width="69%"><div><input name="year" type="text" id="year" value="<? echo $rs[year]?>"  maxlength="4" size="10"/>
                 </div></td>
  </tr>
      <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
    <td>ชื่อส่วนราชการ</td>
    <td><div><?
		$query="select * from division order by div_id";
			$result=mysql_query($query);
			?>
	    <select name="department"  >
          <option  value=""> - - - - กรุณาเลือก - - - -</option>
          <? while($d =mysql_fetch_array($result)){		?>
          <option value="<? echo $d[div_id];?>"
		<?
		if($rs[department] == $d[div_id]  or $department == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
          <? }?>
        </select></div></td>
  </tr>
      <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
    <td>ชื่อผู้ใช้พัสดุ</td>
    <td><div><input name="user" type="text"  size="40" value="<?=$rs[user]?>"></div></td>
  </tr>
      <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
    <td>ชื่อหัวหน้าส่วนราชการ</td>
    <td><div><input name="name_head" type="text"  size="40" value="<?=$rs[name_head]?>"></div></td>
  </tr>
      <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1">
   <td>หมายเหตุ</td>
    <td><div><textarea rows="5" cols="40" name="remark"  ><?=$rs[remark]?></textarea></div></td>
  </tr>
      <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr><td colspan="4" align="center" height="35">
    <input   type="submit" name="Go1" value=" บันทึก " onClick="return godel();" > &nbsp;&nbsp;
</td>
  </tr>      
            </table></td>
			</tr>
		</table>
	</td>
            </table></td>
			</tr>
		</table>
	</td>
</tr>
</table>
<? }?>
</form> 
</body>
</html>
<script language="javascript">
function godel_a()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

function godel()
{
	if (confirm("คุณต้องการแก้ไขข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>
<?
	function find_max_m_id() {
	
		$sql = "Select max(m_id) as max  from move  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$m_id = "1";
		} else{
			$m_id =  $max + 1; //gene ค่า sale_id 
		}
		return $m_id;
	}
?>
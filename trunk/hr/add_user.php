<?
include('config.inc.php');

if($Go <> ''){
	if(find_user($u_username) <=0){
		$sql = "INSERT INTO admin (username , password , name , pivilage) 
		VALUES('$u_username' , '$u_pass' , '$u_name' , '$pivilage' )";
		
		echo $sql."<br>";
		$result= mysql_query($sql);
		
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 

		<?
	}else{
			echo "<br><center><font color=darkgreen>Username ซ้ำบันทึกข้อมูลใหม่</font></center><br>";
	}
}

if($Go_1 <> ''){
	if(find_user2($u_username,$u_id) <=0){
		$sql_order = "UPDATE admin SET username ='$u_username'  , password = '$u_pass', name = '$u_name', pivilage = '$pivilage'
		where u_id ='$u_id' ";
		echo $sql_order."<br>";
		$result_open = mysql_query($sql_order);
		
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script> 
		
		<?
		}else{
		echo "<br><center><font color=darkgreen>Username ซ้ำบันทึกข้อมูลใหม่</font></center><br>";
		}
		
}
?>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		   
		    if (  document.f22.u_username.value=='' || document.f22.u_username.value==' ' )
           {
           alert("กรุณากรอก ชื่อที่ใช้ในการล็อกอิน");
           document.f22.u_username.focus();           
           return false;
           }
		   if (  document.f22.u_pass.value=='' || document.f22.u_pass.value==' ' )
           {
           alert("กรุณากรอก รหัสผ่าน");
           document.f22.u_pass.focus();           
           return false;
           }
		    if (  document.f22.u_name.value=='' || document.f22.u_name.value==' ' )
           {
           alert("กรุณากรอก ชื่อ - สกุล ผู้ใช้");
           document.f22.u_name.focus();           
           return false;
           }
			if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
			{
					return true;
			}
				return false;
	}
</script>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style2.css">
<script language="JavaScript" src="calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<style type="text/css">
<!--
.style2 {
	font-size: 12;
	font-family: Tahoma;
}
.style5 {font-size: 12px; font-family: Tahoma; }
.style6 {font-family: Tahoma}
-->
</style>
<body>

<form action="" method="post" name="f22" >
<? if($action=='add'){?>
<br>
<input type="hidden" name="user_id" value="<?=$user_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; เพิ่ม ข้อมูลผู้ใช้</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
  
  <tr class="tbETitle_1">
   <td width="35%"><span class="style5">&nbsp;ชื่อที่ใช้ในการล็อกอิน : Username</span></td>
    <td width="65%"><div class="style6" ><input type="text" name="u_username" value="<?=$u_username?>" size="20" maxlength="20">
		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="35%"><span class="style5">&nbsp;รหัสผ่าน : Password</span></td>
    <td width="65%"><div class="style6" ><input type="text" name="u_pass" value="<?=$u_pass?>" size="20" maxlength="20">
		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="35%"><span class="style5">&nbsp;ชื่อ - สกุล</span></td>
    <td width="65%"><div class="style6" ><input type="text" name="u_name" value="<?=$u_name?>" size="40" >
		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="35%"><span class="style5">&nbsp;ระดับการใช้งาน</span></td>
    <td width="65%"><div class="style6" ><select name="pivilage">
	<option value="0">ทั่วไป</option>
	<option value="1">ทั้งหมด</option>
	<option value="2">ดูรายงาน</option>
	</select>
		</div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><span class="style6">
    <input   type="submit" name="Go" value=" บันทึก " onClick="return validate()">
&nbsp;&nbsp;
  </span></td>
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
<? }elseif($action=='edit'){?>
<?
$sql = "SELECT * FROM admin WHERE u_id= $u_id";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
?><br>
<input type="hidden" name="u_id" value="<?=$u_id?>">
<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #ff9966 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" bgcolor="#ff9966" class="tbETitle">&nbsp; แก้ไข ข้อมูลผู้ใช้</td>
  			</tr>
			<tr>
			<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffcc99" class="calDay" name="add">
			<tr class="tbETitle_1">
   <td width="35%"><span class="style5">&nbsp;ชื่อที่ใช้ในการล็อกอิน : Username</span></td>
    <td width="65%"><div class="style6" ><input type="text" name="u_username" value="<?=$rs[username]?>" size="20" maxlength="20">
		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="35%"><span class="style5">&nbsp;รหัสผ่าน : Password</span></td>
    <td width="65%"><div class="style6" ><input type="text" name="u_pass" value="<?=$rs[password]?>" size="20" maxlength="20">
		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="35%"><span class="style5">&nbsp;ชื่อ - สกุล</span></td>
    <td width="65%"><div class="style6" ><input type="text" name="u_name" value="<?=$rs[name]?>" size="40" >
		</div></td>
  </tr>
  <tr class="tbETitle_1">
   <td width="35%"><span class="style5">&nbsp;ระดับการใช้งาน</span></td>
    <td width="65%"><div class="style6" ><select name="pivilage">
	<option value="0" <? if($rs[pivilage] ==0 ) echo "selected" ?>>ทั่วไป</option>
	<option value="1" <? if($rs[pivilage] ==1 ) echo "selected" ?>>ทั้งหมด</option>
	<option value="2" <? if($rs[pivilage] ==2 ) echo "selected" ?>>ดูรายงาน</option>
	</select>
		</div></td>
  </tr>
  <tr><td colspan="4" align="center" height="35"><span class="style6">
    <input   type="submit" name="Go_1" value=" บันทึก "  onClick="return validate()">
&nbsp;&nbsp;
  </span></td>
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

function godel()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("คุณต้องการบันทึกข้อมูลที่แก้ไข ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>
<?
function find_user($u_username){
	$sql1 ="select * from admin where username= '$u_username'  ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}


function find_user2($u_username,$u_id){
	$sql1 ="select * from admin where username= '$u_username' and u_id !='$u_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
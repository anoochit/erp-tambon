<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?php
session_start() ;
$Submit = $_POST['Submit']; 
$ok = $_POST['ok'];
if($Submit <>''){
		$sql = "update user set  firstname='$firstname' ,lastname ='$lastname'  where u_id = '$_SESSION[u_id]'" ;
		$result = mysql_query($sql) or die("ERR PROGRAME") ;
				$status = "<center><font face='MS Sans Serif' size='3' color='red'><b>บันทึกข้อมูลเรียบร้อยแล้วครับ</b></font></center>";
				echo $status;
			 echo "<meta http-equiv='refresh' content='2'>" ;
}
 $sql="SELECT * FROM user WHERE u_id=$_SESSION[u_id]";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
   $firstname = $d["firstname"];
   $lastname = $d["lastname"];
?>
<form action="" method="post" name="checkForm" onSubmit="return check()">
  <table width="258" cellspacing="1" border="0" style="border-collapse:collapse;" align="center"  >
  <tr > 
      <td width="59" height="30"  style="border: #7292B8 1px solid;"   class="bmText">&nbsp;&nbsp;ชื่อ</td>
      <td width="224"  style="border: #7292B8 1px solid;"  > 
        <input  type="text"name="firstname" size="20" value="<?=$firstname?>">      </td>
    </tr>
		<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
	<tr > 
      <td height="30" style="border: #7292B8 1px solid;"  class="bmText">&nbsp;&nbsp;สกุล</td>
      <td style="border: #7292B8 1px solid;" > 
        <input  type="text"name="lastname" size="20" value="<?=$lastname?>">      </td>
    </tr>
	<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <tr > 
      <td height="30" colspan="2" style="border: #7292B8 1px solid;" > 
        <div align="center"> 
          <input type="submit" name="Submit" value=" ยืนยัน ">
          &nbsp; 
          <input type="reset" name="Submit2" value=" ยกเลิก ">
          <input name="ok" type="hidden" id="ok" value="ok">
      </div></td>
    </tr>
  </table>
 </form>
</body>
</html>

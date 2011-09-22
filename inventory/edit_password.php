
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?php
session_start() ;
$login_true = $_SESSION['login_true'];
$old_pwd = $_POST['old_pwd'];
$new_pwd1 = $_POST['new_pwd1'];
$new_pwd2 = $_POST['new_pwd2']; 
$Submit = $_POST['Submit']; 
$ok = $_POST['ok'];



if($Submit ){

$sql = "select * from user where username ='".$_SESSION[username]."' and password='$old_pwd'" ;
$result = mysql_query($sql) ;
$row = mysql_num_rows($result) ;
if($row<=0){
$status = "<center><font face='MS Sans Serif' size='3' color='red'><b>รหัสผ่านไม่ถูกต้องครับ</b></font></center>" ;
echo "<br>".$status;

}
else {
if($new_pwd1==$new_pwd2){
$sql = "update user set  password='$new_pwd1' where username ='".$_SESSION[username]."' " ;
$result = mysql_query($sql) or die("ERR PROGRAME") ;
if($result){
$status = "<center><font face='MS Sans Serif' size='3' color='red'><b>เปลี่ยนรหัสผ่านเรียบร้อยแล้วครับ</b></font></center>";
echo "<meta http-equiv='refresh' content='2'>" ;
echo "<br>".$status;
}
}
else{
$status = "<center><font face='MS Sans Serif' size='3' color='red'><b>กรุณายืนยันรหัสผ่านใหม่ให้ถูกต้องด้วยครับ</b></font></center>";
echo "<br>".$status;
echo "<meta http-equiv='refresh' content='2'>" ;

}
}
}
else {
$status = NULL ;
session_register("status") ;
}

 $sql="SELECT * FROM user WHERE u_id=$_SESSION[u_id]";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
   $username1 = $d["username"];

?>

<form action="" method="post" name="checkForm" onSubmit="return check()">
  <table width="290" cellspacing="1" border="0" style="border-collapse:collapse;"align="center"  >
    <tr > 
      <td height="30"  style="border: #7292B8 1px solid;"class="bmText">&nbsp;&nbsp;รหัสผ่านเดิม</td>
      <td  style="border: #7292B8 1px solid;"> 
        <input type="password" name="old_pwd" size="20">      </td>
    </tr>
    <tr > 
      <td height="30"  style="border: #7292B8 1px solid;"class="bmText">&nbsp;&nbsp;รหัสผ่านใหม่</td>
      <td  style="border: #7292B8 1px solid;"> 
        <input type="password" name="new_pwd1" size="20">      </td>
    </tr>
    <tr > 
      <td height="30"  style="border: #7292B8 1px solid;"class="bmText">&nbsp;&nbsp;ยืนยันรหัสผ่านใหม่</td>
      <td  style="border: #7292B8 1px solid;"> 
        <input type="password" name="new_pwd2" size="20">      </td>
    </tr>
    <tr > 
      <td height="30" colspan="2"  style="border: #7292B8 1px solid;"> 
        <div align="center"> 
          <input type="submit" name="Submit" value=" ยืนยัน ">
          &nbsp; 
          <input type="reset" name="Submit2" value=" ยกเลิก ">
          <input name="ok" type="hidden" id="ok" value="ok">
      </div></td>
    </tr>
  </table>
  <script language = "javascript">
function check(){
var v1 = document.checkForm.old_pwd.value;
var v2 = document.checkForm.new_pwd1.value;
var v3 = document.checkForm.new_pwd2.value;

if(v1.length==0){
alert("กรุณากรอกรหัสผ่านเก่าอีกครั้งด้วยครับ");
document.checkForm.old_pwd.focus();
return false ;
}
else if(v2.length==0){
alert("กรุณากรอกรหัสผ่านใหม่ด้วยครับ");
document.checkForm.new_pwd1.focus();
return false ;
}
else if(v2 != v3 ){
alert("กรุณายืนยันรหัสผ่านใหม่ให้ถูต้องด้วยครับ");
document.checkForm.new_pwd2.focus();
return false ;
}
else if(v3.length==0){
alert("กรุณายืนยันรหัสผ่านใหม่ด้วยครับ");
document.checkForm.new_pwd2.focus();
return false ;
}
else 
return true ;
}
  </script>
</form>
</body>
</html>
<?
function find_user_u($div_id,$username,$user_id){
	$sql1 ="select * from user where (username= '$username' or div_id = '$div_id') and u_id != '$user_id' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}

?>
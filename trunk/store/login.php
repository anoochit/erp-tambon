<? ob_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?

session_start();
include('config.inc.php');
$user_name = $_POST['user_name'] ;
$password = $_POST['password'] ;

$query="SELECT * FROM user WHERE username  ='$user_name' ";
$result=mysql_query($query);
$arr=mysql_fetch_array($result);

$uName= "ผู้ใช้ : ".$arr['firstname'] ."  ".$arr['lastname']."<br>หน่วยงาน : ".find_div_name($arr['div_id']);
$username = $arr['username'];
$u_id  = $arr['u_id'];
$div_id  = $arr['div_id'];

if ($user_name== trim($arr['username'])   and  $password == trim($arr['password']) ) { // Check User 
	session_register("username");
	session_register("u_id");
	session_register("uName");
	session_register("div_id");
	header("Location: index.php?action=center");

}else {
	print "<br><br><div align='center'><font color='red'>Login หรือ Password  ไม่ถูกต้อง <br></font></div>\n";
	print "<br><div align='center'><font color='red'><a href='index.php?action=center'>ลองใหม่</a><br></font></div>\n";
}


?>
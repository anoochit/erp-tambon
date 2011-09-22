<? ob_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();
include('config.inc.php');
$pwd_username = $_POST['pwd_username'] ;
$pwd_passwd = $_POST['pwd_passwd'] ;
$query="SELECT * FROM passwd WHERE pwd_username  ='$pwd_username'  ";
$result=mysql_query($query);
$arr=mysql_fetch_array($result);
$username= $arr['pwd_username'];
$pass = $arr['pwd_passwd'];
$pwd_priv = $arr['pwd_priv'];
if ($pwd_username == trim($arr['pwd_username'])   and  $pwd_passwd == trim($arr['pwd_passwd']) ) { // Check User & 
	session_register("username");
	session_register("pwd_passwd");
	session_register("pwd_priv");
	header("Location: index.php");
}else {
	print "<br><br><div align='center'><font color='red'>Login หรือ Password  ไม่ถูกต้อง <br></font></div>\n";
	print "<br><div align='center'><font color='red'><a href='index.php?action=center'>ลองใหม่ </a> หรือ กรุณารอสักครู่<br></font></div>\n";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php\">\n";
}
?>
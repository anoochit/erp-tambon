<? ob_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?

session_start();
include('config.inc.php');
$user_name = $_POST['user_name'] ;
$password = $_POST['password'] ;

$query="SELECT * FROM admin WHERE username  ='$user_name'  ";
$result=mysql_query($query);
$arr=mysql_fetch_array($result);
$username = $arr['username'];
$u_name = $arr['name'];
$pivilage = $arr['pivilage'];
if ($user_name== trim($arr['username'])   and  $password == trim($arr['password']) ) { // Check User & 
	$result=mysql_query($query);	

	session_register("username");
	session_register("pivilage");
	header("Location: index.php");
}else {
	print "<br><br><div align='center'><font color='red'>Login หรือ Password  ไม่ถูกต้อง <br></font></div>\n";
	print "<br><div align='center'><font color='red'><a href='index.php?action=center'>ลองใหม่</a><br></font></div>\n";
}


?>
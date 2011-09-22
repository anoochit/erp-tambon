<?
ob_start();
include('config.inc.php');
$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname);

if($u_id <>''){
	$u_id = $_REQUEST["u_id"];
	$user_name = $_REQUEST["user_name"];
	$user_pwd = $_REQUEST["user_pwd"];
	$firstname = $_REQUEST["firsname"];
	$surname = $_REQUEST["surname"];
	$dep_id = $_REQUEST["dep_id"];
echo $u_id."sdfsdfsdf" .$user_name;
if(find_user1($user_name,$u_id) <> ''){
	echo "<center><br><br><br> <br><br><br> ชื่อซ้ำไม่สามารถใช้ได้<br><br><br> </center>";
	echo "<meta http-equiv='refresh' content='1; url=index.php?action=setup_edit&u_id=$u_id'>";
}else{

	$query="Update  user_account set  username = '$user_name',user_pwd ='$user_pwd',firsname ='$firstname',
	surname ='$surname',dep_id = '$dep_id' Where user_id = '$u_id'		";
	$result=mysql_query($query);	
	header("Location: index.php?action=setup");
}
}else{
	$user_name = $_REQUEST["user_name"];
	$user_pwd = $_REQUEST["user_pwd"];
	$firstname = $_REQUEST["firsname"];
	$surname = $_REQUEST["surname"];
	$dep_id = $_REQUEST["dep_id"];

	if(find_user($user_name) <> ''){
				echo "<br><br><br> <br><br><br> <center>ชื่อซ้ำไม่สามารถใช้ได้<br><br><br> </center>";
				echo "<meta http-equiv='refresh' content='1; url=index.php?action=setup_add'>";
		}else{

			$query="Insert  user_account (  username  ,user_pwd ,firsname ,surname ,dep_id) values ( '$user_name' , '$user_pwd' , '$firstname' , '$surname' , '$dep_id' )	";
			$result=mysql_query($query);	
			header("Location: index.php?action=setup");
	}
}


//}
?>
<?

function find_user($user_name){

	$sql1 = "SELECT  *   FROM user_account  where username = '$user_name'  ";
	$result1 = mysql_query($sql1);
	$rs1 = mysql_fetch_array($result1);
	return $rs1["username"] ;
}
function find_user1($user_name,$u_id){

	$sql1 = "SELECT  *   FROM user_account  where username = '$user_name'  and  user_id != '$u_id'";

	$result1 = mysql_query($sql1);
	$rs1 = mysql_fetch_array($result1);
	return $rs1["username"] ;
}
?>

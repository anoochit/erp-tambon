<?
ob_start();
include("config.inc.php");
$user = $_REQUEST["user"];
$pwd = $_REQUEST["pwd"];
			if (getenv(HTTP_X_FORWARDED_FOR)) {							
				$ip = getenv(HTTP_X_FORWARDED_FOR); 
			} else { 
				$ip = getenv(REMOTE_ADDR);
			}
if($user != "" && $pwd != "") {
	$sql1 = "SELECT COUNT(user_id) FROM user_account WHERE username='$user'";
	$result1 = mysql_query($sql1);
	$found = mysql_result($result1,0);
	if($found > 0) {
		$sql = "SELECT * FROM user_account WHERE username='$user' ";
		$result = mysql_query($sql);
		$rs = mysql_fetch_array($result);
	if ($pwd ==$rs['user_pwd']) { 
			# Add Session
			$de_part = $rs["dep_id"];
			$sess_userid = session_id();
			session_register("sess_userid");
			session_register("de_part");
			$_SESSION['username'] = $user;
			if( $rs["dep_id"] =='สำนักปลัด' or $rs["dep_id"] =='สำนักงานปลัด')$_SESSION['department'] = 1;
			if( $rs["dep_id"] =='ปลัด')$_SESSION['department'] = 2;
			if( $rs["dep_id"] =='all')$_SESSION['department'] = 'all';
			$_SESSION['user_id'] = $rs["user_id"];
			$_SESSION['f_name'] = $rs["firsname"];
			$_SESSION['login_date'] = DATE(d."/".m."/".Y) ;
			$_SESSION['login_time'] = number_format(DATE(H) - 1). " : " .DATE(i);

			$_SESSION["ip_login"] = $ip;
			
			header("Location: index.php");
		}else {
		$err_header = "คุณกำลังพยายามที่จะเข้าใช้งานส่วนของผู้ดูแลระบบ";
		$err_detail = "รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบ";
		header("Location: index.php?action=err_found&err_header=$err_header&err_detail=$err_detail");
		}
	}else {
		$err_header = "คุณกำลังพยายามที่จะเข้าใช้งานส่วนของผู้ดูแลระบบ";
		$err_detail = "ไม่พบชื่อผู้ใช้งานนี้ในระบบ";
		header("Location: index.php?action=err_found&err_header=$err_header&err_detail=$err_detail");
	}

}


?>
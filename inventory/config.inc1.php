
<?
	$host = "localhost";
	$user = "root";
	$password = "444253";
	$database = "ajax";

$connect=mysql_connect($host,$user,$password) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($database) ;
mysql_query("SET NAMES 'tis620' ");


?>
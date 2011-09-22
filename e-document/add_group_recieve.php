<?
include("config.inc.php");
$group_name = $_REQUEST["group_name"];
if($_REQUEST["save_group"] != ""){
	$sql = "INSERT INTO grouptype (group_name)  VALUES('$group_name')";
	$result=mysql_query($sql);

	header("Location: index.php?action=success");

}

?>
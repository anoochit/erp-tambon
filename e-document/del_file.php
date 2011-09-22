<?
ob_start();
include("config.inc.php");
$file_name = $_REQUEST["file_name"];
$file_id = $_REQUEST["file_id"];
	unlink("files_data/$file_name"); 
$sql_del = "DELETE FROM file_record WHERE file_name='$file_name'";
$result_del = mysql_query($sql_del);
//echo $sql_del;
header("Location: index.php?action=view&file_id=$file_id");


?>
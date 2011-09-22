<?


include("config.inc.php");


$sql = "SELECT COUNT(file_name) FROM documentary WHERE file_id = 1";
$result = mysql_query($sql);
$totals = mysql_result($result,0);

for($i=0; $i < $totals;$i++){
	$sql_max = "SELECT MAX(file_id) FROM documentary";
	$result_max = mysql_query($sql_max);
	$max_id = mysql_result($result_max,0);
	$sql_gen = "UPDATE documentary SET file_id='".number_format($i+1)."' WHERE file_id = 1 LIMIT 1";
	$result_gen = mysql_query($sql_gen);
	
	echo $sql_gen."<br>";
}
echo $totals;

$sql = "SELECT file_id,file_name,file_type,file_size FROM documentary ORDER BY file_id";
$result = mysql_query($sql);
while($rs = mysql_fetch_array($result)){
	$sql_get = "SELECT COUNT(file_id) FROM file_record WHERE file_id='".$rs["file_id"]."'";
	$result_get = mysql_query($sql_get);
	$x = mysql_result($result_get,0);
	if($x < 1){
		$sql_add = "INSERT INTO file_record (file_id,file_name,file_type,file_size) VALUES('".$rs["file_id"]."','".$rs["file_name"]."','".$rs["file_type"]."','".$rs["file_size"]."')";
		echo $sql_add."<br>";
		$query = mysql_query($sql_add);
	}
}

echo "เรียบร้อยแล้ว";
?>
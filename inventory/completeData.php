<? ob_start();?>
<?
    header("content-type: application/x-javascript; charset=TIS-620");
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<?
	include("config.inc.php");
	 header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
     header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
     header ("Cache-Control: no-cache, must-revalidate");
     header ("Pragma: no-cache");
	header("Content-type: text/html; charset=windows-874");


if($n_seach != ""){
	$sql_1 = "SELECT * FROM open WHERE num_id LIKE '" . utf8_to_tis620(trim($_POST["n_seach"])) . "%'  ";
	
	$result_1 = mysql_query($sql_1) ;
	if(mysql_num_rows($result_1) > 0){
	?>
		<table id=search class="table_body">
		<?
		while($row = mysql_fetch_array($result_1)){
			$title = $row['num_id'];
			?>
			<tr bgcolor="#FFFFFF" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''" ><td  class="td_body"onclick='populateName(this.innerHTML)'>
			<?
			echo  stripslashes($title)."</td></tr>";
		}
		echo "<table>";
	}

}

if($product != ""){
	$sql_1 = "select * from shop  where shop_name LIKE '" . utf8_to_tis620(trim($_POST["product"])) . "%' group by id order  by shop_name ";
	
	$result_1 = mysql_query($sql_1) ;
	if(mysql_num_rows($result_1) > 0){
	?>
		<table id=search class="table_body">
		<?
		while($row = mysql_fetch_array($result_1)){
			$title = $row['pre_shop_name']." ".$row['shop_name']." ".$row['shop_address']."@ ". $row['id'];
			?>
			<tr bgcolor="#FFFFFF" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''" ><td  class="td_body"onclick='populateName(this.innerHTML)'>
			<?
			echo  stripslashes($title)."</td></tr>";
		}
		echo "<table>";
	}

}
?><?
function utf8_to_tis620($string)
{
    $str = $string;
    $res = "";
    for ($i = 0; $i < strlen($str); $i++) {
      if (ord($str[$i]) == 224) {
        $unicode = ord($str[$i+2]) & 0x3F;
        $unicode |= (ord($str[$i+1]) & 0x3F) << 6;
        $unicode |= (ord($str[$i]) & 0x0F) << 12;
        $res .= chr($unicode-0x0E00+0xA0);
        $i += 2;
      } else {
        $res .= $str[$i];
      }
    }
    return $res;
}
?>
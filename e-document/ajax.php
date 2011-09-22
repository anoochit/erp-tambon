<?
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    	header ("Cache-Control: no-cache, must-revalidate");
   		header ("Pragma: no-cache");
	 	header("content-type: application/x-javascript; charset=tis-620");
   		header("Content-type: text/html; charset=windows-874");

     //ค่าที่ถูกส่งมาด้วยจาก AJAX
	  $data=$_GET['data'];
     $val=$_GET['val'];
	include("config.inc.php"); //ค่ากำหนดของ ฐานข้อมูล
     if ($data=='catagory') { 
          $sql="select  * from catagory where dep_name = '$val'";
          $result = mysql_query($sql);
          $recn = mysql_fetch_array($result);
			$p = $recn[cat_name];
     } 
?>



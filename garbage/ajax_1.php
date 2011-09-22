<?
	ob_start();
     header("content-type: application/x-javascript; charset=tis-620");
?>
<?
	include("config.inc.php");
     //กำหนดให้ IE อ่าน page นี้ทุกครั้ง ไม่ไปเอาจาก cache
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
     header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
     header ("Cache-Control: no-cache, must-revalidate");
     header ("Pragma: no-cache");
	 header("Content-type: text/html; charset=windows-874");
     //ค่าที่ถูกส่งมาด้วยจาก AJAX
	 $data=$_GET['data'];
     $val=$_GET['val'];
     if ($data=='hocode') { //เมื่อมีการโหลดครั้งแรก อ่านข้อมูล อำเภอ
         $query  ="SELECT mid(max(mcode),4) as max1 FROM m_bin where  mid(mcode,1,2) = '" .$val."'";
		 $result = mysql_query($query);
         $rs = mysql_fetch_array($result);
           if($rs[max1] =='' or $rs[max1] == NULL ){
		   		print "0001";
		   }else{
		   		$max = $rs[max1]+1;
				$st ='';
				if(strlen($max) <4){
						for($i=0;$i<(4- strlen($max));$i++){
								$st .="0";
						}
						$max = $st.$max;
				}
				print $val."^".$max ;	
		   }
	}
 ?>


<? ob_start()?>
<?
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



	  $data=$_GET['data'];
     $val=$_GET['val'];
if($num1 <> '' and $num2 <>'' ){


			if(find_id_lost($num1,$num2) <>''){
					$val =  find_id_lost($num1,$num2) ;
			}else{
					$sql="select  max(per_id) as max from work  where div_id = '$num1'  and pos_id = '$num2' ";
					$result = mysql_query($sql);
					$recn=mysql_fetch_array($result);
					$max1  = $recn["max"];
					
				$val =  $max1 + 1;
				
		}
		$k = "";
		for($i=0;$i<(3-strlen(trim($val)));$i++){
			$k .="0" ;
		}

		print $k.$val.",".$val;
 }
	 
	 
 function find_id_lost($num1,$num2){

	$sql1 = "SELECT  per_id FROM work where  div_id = '$num1' and pos_id = '$num2' and w_status != 0 order by per_id  ";
	$result1 = mysql_query($sql1);
	while($rs1 = mysql_fetch_array($result1)){
			$sql2 = "SELECT  per_id FROM work where  div_id ='$num1' and pos_id = '$num2' and per_id = ".trim($rs1[per_id])." and w_status = 0  ";
			$result2= mysql_query($sql2);
			$rs2 = mysql_fetch_array($result2);
			if($rs2[per_id] ==''){
				return $rs1["per_id"];
				exit();
			}
	}
}
if($num3 <> '' ){
		
		$max =find_max_div($num3);
		$sql="select  max(sub_id) as max from subdivision where div_id like  '%$num3%'  ";
		$result = mysql_query($sql);
		$recn=mysql_fetch_array($result);
		$max1  = $recn["max"];
		if($max1 ==''  or $max1  ==NULL or $max1 =='-'){
			$a =explode("/",$max);
			$no_book = $a[0].".1";
		}else{
			$a =explode(".",$max1);
			$no_book = $a[0].".".($a[1] + 1);
	}
	print $no_book;
}
function  find_max_div($num3){
		$query="select  *  from division where div_id='$num3' ";
		$result=mysql_query($query);
		$recn=mysql_fetch_array($result);
		return $recn[div_id];
}
 ?>


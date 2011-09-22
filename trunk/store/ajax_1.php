<? 
ob_start();
session_start();?>
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

  if ($data=='product' or $data=='product1' ) { 

         $query  ="select *  from product
        where  t_id ='$val'  and status = 0
        order by pro_name ";
		 $result = mysql_query($query);
          echo "<select name='p_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[p_id]' ";
		if($p_id ==   $fetcharr['p_id'] ) echo "selected";
			    echo " >$fetcharr[pro_name]</option> \n" ;
          }
		 echo "</select>\n";  
		 
     }
	 
  if ($data=='product2' ) { 

         $query  ="select *  from product
        where  t_id ='$val'  and status = 0
        order by pro_name ";
		 $result = mysql_query($query);
          echo "<select name='p_id'   onchange=\"time(this.value)\" >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[p_id]' ";
		if($p_id ==   $fetcharr['p_id'] ) echo "selected";
			    echo " >".$fetcharr[pro_name]."</option> \n" ;
          }
		 echo "</select>\n";  
		 
     }
	 if ($data=='product3' ) { 

         $query  ="select *  from product
        where  t_id ='$val'  and status = 0
        order by pro_name ";
		 $result = mysql_query($query);
          echo "<select name='product_id'   onchange=\"time(this.value)\" >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[p_id]' ";
		if($p_id ==   $fetcharr['p_id'] ) echo "selected";
			    echo " >".$fetcharr[pro_name]."</option> \n" ;
          }
		 echo "</select>\n";  
		 
     }
	  if ($p_id <> '' ) { 

        	 	$sql_1 = "SELECT * FROM product WHERE p_id = '$p_id' and status = 0  limit 1 ";
				$result_1 = mysql_query($sql_1) ;
				$row = mysql_fetch_array($result_1);
				
				$product =$row['pro_name']."^".$row['unit1']."^".$row['unit2']."^".$row['p_id']."^".$row['a_unit1']."^".$row['a_unit2']."^".find_stock($p_id , $_SESSION[div_id]);
				print $product;
			}
	function find_stock($p_id , $div_id){
		$sql = "Select * from stock_card  where p_id = '$p_id' and status = 0 
		and div_id ='".$div_id."'
		group by id order by s_date desc ,id desc   limit 1";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		if($recn[remain] =='') return '0';
		else return $recn[remain];
}
?>



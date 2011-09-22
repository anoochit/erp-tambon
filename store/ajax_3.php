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
	  if ($data=='dep_id2') { 
	 		$d = explode("^",$val);
          	$sql="select c1_id,c1_name,dep_id,budget_year from cat1 
			where dep_id = '$d[0]' 
			and budget_year = '$d[1]' 
			order by c1_id ";
          $result = mysql_query($sql);
          echo "<select name='c1_id' onchange=\"dochange2('dep_id4', this.value)\" > ";

          while($fetcharr = mysql_fetch_array($result)) { 
               $val = $fetcharr['c1_name'];
              	$label =$fetcharr['dep_id']. "^".$fetcharr['budget_year']. "^".$fetcharr['c1_id'];
               echo "<option value=\"$label\"";
			    if($c1_id ==$fetcharr['c1_id']){echo "selected";}
			   echo ">$val</option> \n" ;
          }
		  echo "</select>\n";  
     }
	   if ($data=='dep_id4') { 
	 		$d = explode("^",$val);
          	$sql="select c2_id,c2_name, dep_id, c1_id,budget_year from cat2 
        	where dep_id = $d[0] and budget_year = '$d[1]'
        	and c1_id =  '$d[2]'
			order by c2_id ";
          $result = mysql_query($sql);
          echo "<select name='c2_id' > ";

         while($fetcharr = mysql_fetch_array($result)) { 
               $val = $fetcharr['c2_name'];
              	$label = $fetcharr['dep_id']. "^".$fetcharr['budget_year']. "^".$fetcharr['c1_id']. "^".$fetcharr['c2_id'];
               echo "<option value=\"$label\"";
			    if($c2_id ==$label){echo "selected";}
			   echo ">$val</option> \n" ;
          }
		  echo "</select>\n";  
     }
	  if ($data=='dep_id3') { 
	 		$d = explode("^",$val);
          	$sql="select c2_id,c2_name, dep_id, c1_id,budget_year  from cat2 
        	where dep_id = $d[2] and budget_year = '$d[1]'
        	and c1_id = $d[0]
			order by c2_id ";
          $result = mysql_query($sql);
          echo "<select name='c2_id' > ";

          while($fetcharr = mysql_fetch_array($result)) { 
               $val = $fetcharr['c2_name'];
              	$label = $fetcharr['dep_id']. "^".$fetcharr['budget_year']. "^".$fetcharr['c1_id']. "^".$fetcharr['c2_id'];
               echo "<option value=\"$label\"";
			    if($c2_id ==$label){echo "selected";}
			   echo ">$val</option> \n" ;
          }
		  echo "</select>\n";  
     }
	?>



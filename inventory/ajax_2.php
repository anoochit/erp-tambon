<?
    header("content-type: application/x-javascript; charset=tis-620");
?>
<?
	session_start();
	include("config.inc.php");
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
     header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
     header ("Cache-Control: no-cache, must-revalidate");
     header ("Pragma: no-cache");
	header("Content-type: text/html; charset=windows-874");

	  $data=$_GET['data'];
     $val=$_GET['val'];
	
	  if ($data=='sub_div') { //
        $query  ="select *  from division d,subdivision s
        where  1 = 1 and d.div_id = s.div_id
        and d.div_id like '%$val%' 
		group by s.sub_name
        order by s.sub_id ";
		 $result = mysql_query($query);
          echo "<select name='sub_id1' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
          while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[sub_id]' ";
		if($sub_id ==   $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select></font>\n";  
     }
	    if ($data=='sub_div_1') { //
        $query  ="select *  from division d,subdivision s
        where  1 = 1 and d.div_id = s.div_id
        and d.div_id like '%$val%' 
		group by s.sub_name
        order by s.sub_id ";
		 $result = mysql_query($query);
          echo "<select name='sub_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
          while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[sub_id]' ";
		if($sub_id ==   $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select></font>\n";  
     }
 if ($data=='cat_1') { //
        $query  ="select *  from type
        where  cat_id like '%$val%' 
		group by type_name
        order by type_id";
		 $result = mysql_query($query);
          echo "<select name='type_id' >";
         echo "<option value=''>- - - - - - - - -กรุณาเลือก- - - - - - - - - </option>\n";
          while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[type_id]' ";
		if($type_id ==   $fetcharr['type_id'] ) echo "selected";
			    echo " >$fetcharr[type_name]</option> \n" ;
          }
		 echo "</select></font>\n";  
     }
	
 ?>


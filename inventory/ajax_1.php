<? ob_start();?>
<?
     header("content-type: application/x-javascript; charset=tis-620");
?>
<?
	include("config.inc.php");
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
     header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
     header ("Cache-Control: no-cache, must-revalidate");
     header ("Pragma: no-cache");
	header("Content-type: text/html; charset=windows-874");

	  $data=$_GET['data'];
     $val=$_GET['val'];
     if ($data=='job_plan') { 
          $query  ="select concat(jd_name,' (',jr.account_id,')') as name ,jr.account_id as job_id  from 2job_ref j, 3job_detail_ref jr 
        	where j_name like '$val' and 
       		mid(jr.account_id,1,4) = mid(j.account_id,1,4) 
            order by jr.account_id ";
		 $result = mysql_query($query);
          echo "&nbsp;<select name='job_id' >";
          while($fetcharr = mysql_fetch_array($result)) { 
               $val = $fetcharr['job_id'];
               $label = $fetcharr['name'];
              echo "<option value=\"$val\" ";
		if($job_id ==  $val ) echo "selected";
			    echo " >$label</option> \n" ;
          }
		 echo "</select></font>\n";  
     }
	 if ($data=='roomId') { 

          $sql="select * from room where s_id ='$val' ";
          $result = mysql_query($sql);
		  ?><select name='room_id'  >
		  <option value=""> - - - - กรุณาเลือก - - - - - </option>
		  <?
          while($fetcharr = mysql_fetch_array($result)) { 
               $val = $fetcharr['room']." / ".$fetcharr[room_name];
              	$label = $fetcharr['r_id'];
               echo "<option value=\"$label\"";
			   echo ">$val</option> \n" ;
          }
		  echo "</select>\n";  
     }
	 if ($data=='roomId1') { 

          $sql="select * from room where s_id ='$val' ";
          $result = mysql_query($sql);
		  ?><select name='room_id1'>
		  <option value=""> - - - - กรุณาเลือก - - - - - </option>
		  <?
          while($fetcharr = mysql_fetch_array($result)) { 
               $val = $fetcharr['room']." / ".$fetcharr[room_name];
              	$label = $fetcharr['r_id'];
               echo "<option value=\"$label\"";
			   echo ">$val</option> \n" ;
          }
		  echo "</select>\n";  
     }
	 
	 if ($data=='type_') { 

         $query  ="select * from type where type_id = '$val'  group by type_name  order by type_id";
			$result=mysql_query($query);
		  ?>&nbsp;
		  <select name='t_id'  >
		  <option value=""> - - - - กรุณาเลือก - - - - - </option>
		  <?
          while($fetcharr = mysql_fetch_array($result)) { 
               $val = $fetcharr['type_name'];
              	$label = $fetcharr['t_id'];
               echo "<option value=\"$label\"";
			   echo ">$val</option> \n" ;
          }
		  echo "</select>\n";  
     }
 ?>


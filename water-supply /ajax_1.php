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
     if ($data=='ZONE') { //เมื่อมีการโหลดครั้งแรก อ่านข้อมูล อำเภอ
          $query  ="select z_id,z_name from zone z,house h where z.hocode = h.hocode  and z.hocode = '".$val."' order by z.hocode ";
		 $result = mysql_query($query);
  ?>
           &nbsp;<select name="z_id"  >
		   <option value="">-------ทั้งหมด--------</option>
  <?
		while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[z_id];?>"
		<?
		if($z_id == $d[z_id] ) echo "selected";
		?>
		><? echo $d[z_name];?></option>
	            <? }?>
	    </select>
		<?
	}
 ?>
 <?
   if ($data=='hocode1') { //เมื่อมีการโหลดครั้งแรก
          $query  =" SELECT max(z_id) as max1 FROM zone  where  hocode = '" .$val. "'  ";
		 $result = mysql_query($query);
         $rs = mysql_fetch_array($result);
		 if($rs[max1] =='' or $rs[max1] == NULL ){
		   		$bb =  "1";
		   }else{
		   		$bb =  $rs[max1]+1;
			}
		print $bb;
	}
	  if ($data=='ZONE1') { //เมื่อมีการโหลดครั้งแรก อ่านข้อมูล อำเภอ
          $query  ="select z_id,z_name from zone z,house h where z.hocode = h.hocode  and z.hocode = '".$val."' order by z.hocode ";
		 $result = mysql_query($query);
  ?>
         &nbsp; <select name="z_id" onChange="result1('z_id1', this.value);"  class="text"  >
  <?
		while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[z_id];?>"
		<?
		if($z_id == $d[z_id] ) echo "selected";
		?>
		><? echo $d[z_name];?></option>
	            <? }?>
	    </select>
		<?
	}
	   if ($data=='z_id1') { //เมื่อมีการโหลดครั้งแรก อ่านข้อมูล อำเภอ
          $query  ="SELECT mid(max(mcode),5) as max1 FROM q_water where  mid(mcode,1,3)  = '" .$val."' ";
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
				print trim($val."^".$max) ;	
		   }
	}
	   if ($data=='zone_1') { //เมื่อมีการโหลดครั้งแรก อ่านข้อมูล อำเภอ
          $query  ="SELECT mid(max(mcode),5) as max1 FROM q_water where  mid(mcode,1,3)  = '" .$val."' ";
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
				print trim($val."^".$max) ;	
		   }
	}
 ?>

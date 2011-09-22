<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?php
	$action = $_REQUEST["action"];
	if($_REQUEST["n_month"] != "") {
		$n_month =  $_REQUEST["n_month"];
	}else {
		$n_month = date("m");
	}
	if($_REQUEST["thisyear"] != ""){
		$thisyear = $_REQUEST["thisyear"] ;
	}else{
		$thisyear = date( "Y" );
	}
	if($n_month < 1) {
		$n_month  = 12 - $n_month;
		$thisyear = $thisyear - 1;
	}elseif($n_month > 12){
		$n_month = $n_month % 12;
		$thisyear = $thisyear + 1;
	}

    $numdaysinmonth = cal_days_in_month( CAL_GREGORIAN, $n_month, $thisyear );   
	
	$jd = cal_to_jd( CAL_GREGORIAN, $n_month,date( 1 ), $thisyear );
	
    $startday = jddayofweek( $jd , 0 );
	$months = ("มกราคม,กุมภาพันธ์,มีนาคม,เมษายน,พฤษภาคม,มิถุนายน,กรกฎาคม,สิงหาคม,กันยายน,ตุลาคม,พฤษจิกายน,ธันวาคม") ;
	$m_arr = explode(",",$months);
	$monthname = $m_arr[number_format($n_month - 1 )];
?>
<table cellpadding="1" cellspacing="1" border="1" bordercolor="#333333" width="194" >
    <tr>
        <td colspan="7"><div align="center"><a href='?action=<?echo $action?>&n_month=<?echo $n_month - 1?>&thisyear=<?echo $thisyear?>'>&lt;&lt;&lt;</a> <strong><?= $monthname . " ". $thisyear ?></strong> <a href='?action=<?echo $action?>&n_month=<?echo $n_month +1?>&thisyear=<?echo $thisyear?>'>&gt;&gt;&gt;</a></div></td>
    </tr>
    <tr>
        <td align='center' width="22" bgcolor='#339900'><strong> อา .</strong></td>
        <td align='center' width="22"><strong> จ .</strong></td>
        <td align='center' width="22"><strong>อ.</strong></td>
        <td align='center' width="22"><strong> พ. </strong></td>
        <td align='center' width="22"><strong>พฤ.</strong></td>
        <td align='center' width="26"><strong> ศ. </strong></td>
        <td align='center' width="23"><strong> ส. </strong></td>
    </tr>
    <tr>
<?php
    $emptycells = 0;
    for( $counter = 0; $counter <  $startday; $counter ++ ) {
		if( $counter == 0) {
			echo "\t\t<td align='center' bgcolor='#339900'>-</td>\n";
		}else{
        echo "\t\t<td align='center'>-</td>\n";
		}
        $emptycells ++;
    
    }
    $rowcounter = $emptycells;
    $numinrow = 7;
    
    for( $counter = 1; $counter <= $numdaysinmonth; $counter ++ ) {  
        $rowcounter ++;
			//--------------------------------------------------------------------------------------------------------------------------- หา Event
		$ac_date = date( "Y" )."-".$n_month ."-". $counter;
			$sql ="SELECT count(a_id) FROM activity WHERE ac_date='$ac_date'";
			$result = mysql_query($sql);
			$found = mysql_result($result,0);

		if( $rowcounter == 1) {
			if($found > 0) {
				echo "\t\t<td align='right' bgcolor='#339900'><a href='index.php?action=view_ac&ac_date=$counter/$n_month/$thisyear'  class='news'>$counter </a></td>\n";
			}else {
				echo "\t\t<td align='right' bgcolor='#339900'>$counter</td>\n";
			}		
		}else{        
			if($found > 0) {
				echo "\t\t<td align='right'><a href='index.php?action=view_ac&ac_date=$counter/$n_month/$thisyear' class='news'>$counter </a></td>\n";
			}else {
				echo "\t\t<td align='right'>$counter </td>\n";
			}
		
		}
      
        if( $rowcounter % $numinrow == 0 ) {
            echo "\t</tr>\n";     
            if( $counter < $numdaysinmonth ) {
                echo "\t<tr>\n"; 
            }
            $rowcounter = 0; 
        }
    }
    $numcellsleft = $numinrow - $rowcounter;
    
    if( $numcellsleft != $numinrow ) {
        for( $counter = 0; $counter < $numcellsleft; $counter ++ ) {
            echo "\t\t<td>-</td>\n";
            $emptycells ++;
        } 
    }
?>
    </tr>
</table>
</center>


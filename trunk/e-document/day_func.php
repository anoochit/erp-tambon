<?
function count_day($s_date, $e_date) {
	$s_array = array();
	$e_array = array();
	$s_array = explode("/", $s_date);
	$e_array = explode("/", $e_date);
	$del_month = 0;
	$del_year = 0;
	
	// นับจำนวนวัน
	if($e_array[0] < $s_array[0]){
		$num_day = ($e_array[0]+30) - $s_array[0] ;
		$del_month = 1;
	}elseif($e_array[0] == $s_array[0]){
		$num_day = 0;
	}else {
		$num_day = $e_array[0] - $s_array[0] ;
	}
	
//นับจำนวนเดือน 
	if($e_array[1] < $s_array[1]){
		$num_month = ($e_array[1]+12) - $s_array[1] ;
		$del_year = 1;
	}elseif($e_array[1] == $s_array[1]){
		$num_month = 0;
	}else {
		$num_month = $e_array[1] - $s_array[1] ;
	}

//นับจำนวนปี
	if($e_array[2] < $s_array[2]){
		$total_day = "Error!!!";
	}else{
		$num_year = $e_array[2] - $s_array[2];
	}

	if($total_day != "Error!!!"){
		$total_day = ($num_day + (($num_month - $del_month) * 30) + (($num_year - $del_year) * 365) );
	}

	return $total_day;
}

function green_day($e_date,$total_date){
	$green_line = ($total_date * 50) / 100 ;
	$del_month = 0;
	$e_array = explode("/",$e_date);
	if($e_array[0] < $green_line){
		$g_day = ($e_array[0] + 30) - $green_line ;
		$del_month = 1;
	}else{
		$g_day = $e_array[0] - $green_line ;
	}
	$g_month = $e_array[1] - $del_month;
	if($g_month < 1){
		$g_month = 12;
		$g_year = $e_array[2] - 1;
	}else {
		$g_year = $e_array[2] ;
	}
	$line_day = number_format($g_day,0)."/".$g_month."/".$g_year;
	return $line_day;
}
function orange_day($e_date,$total_date){
	$green_line = ($total_date * 30) / 100 ;
	$del_month = 0;
	$e_array = explode("/",$e_date);
	if($e_array[0] < $green_line){
		$g_day = ($e_array[0] + 30) - $green_line ;
		$del_month = 1;
	}else{
		$g_day = $e_array[0] - $green_line ;
	}
	$g_month = $e_array[1] - $del_month;
	if($g_month < 1){
		$g_month = 12;
		$g_year = $e_array[2] - 1;
	}else {
		$g_year = $e_array[2] ;
	}
	$line_day = number_format($g_day,0)."/".$g_month."/".$g_year;
	return $line_day;
}

function red_day($e_date,$total_date){
	$green_line = ($total_date * 20) / 100 ;
	$del_month = 0;
	$e_array = explode("/",$e_date);
	if($e_array[0] < $green_line){
		$g_day = ($e_array[0] + 30) - $green_line ;
		$del_month = 1;
	}else{
		$g_day = $e_array[0] - $green_line ;
	}
	$g_month = $e_array[1] - $del_month;
	if($g_month < 1){
		$g_month = 12;
		$g_year = $e_array[2] - 1;
	}else {
		$g_year = $e_array[2] ;
	}
	$line_day = number_format($g_day,0)."/".$g_month."/".$g_year;
	return $line_day;
}

function date_diff1($d1 , $d2){
	$d_array1 = explode("/",$d1);
	$a = $d_array1[0];
	$b = $d_array1[1];
	$c = $d_array1[2];
	$d_array2 = explode("/",$d2);
	$x = $d_array2[0];
	$y = $d_array2[1];
	$z = $d_array2[2];
	$s_m = number_format(($b - $y) * 30);
	$s_y = number_format(($c - $z) * 365);
	$s_d = number_format($a - $x);
	$sum1 = number_format($s_m + $s_y + $s_d);
	
	return $sum1;
}
?>
<?
if($data[3] >1){
		$a = explode("-",$data[6]);
		$code_l = $a[3] + $data[3] ;			
		if(strlen($a[3]) >strlen($code_l) ){
			$num = strlen($a[3])-strlen($code_l);
			for($m=0;$m<$num ;$m++){
					$cc .= "0";
			}
			$code_last = $cc.$code_l;
		}else{
			$code_last = $code_l;
		}
	}
	?>
<a href="#" onClick="javascript:window.open('add_new.php?action=add&seri=<?=$seri?>&num_id=<?=$num_id?>&OK=OK','xxx','scrollbars=yes,width=750,height=450')">เพิ่มรายการ
</a>
</center>
<br>

		<br>
		<table width="98%"  align="center" cellspacing="0">
                                                    <tr>
                                                        <td  >        

                                          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="100%" align="center">
											  <table width="99%" align="center" cellspacing="1" >
                                                <tr class="bmText"  bgcolor="#C1E0FF">
 
                                                  <td width="17%" height="30" align="center" >ประเภท</td>
                                                  <td width="23%"  align="center">ชื่อครุภัณฑ์</td>
                                                  <td width="8%"  align="center">จำนวน</td>
                                                  <td width="13%"   align="center">ราคา / หน่วย</td>
											      <td width="9%"   align="center">หน่วย</td>
                                                  <td width="23%"  align="center">เลขครุภัณฑ์</td>
                                                  <td width="7%"  align="center"></td>
                                                </tr>
                                                <?





for($m=0;$m<=$pointer_array;$m++){



	$data = split(",", $dd[$m]); 
if($data[1]  <>""){

	if($data[2] >1){
		$cc = "";
		$a = explode("-",$data[5]);
		$code_l = ($a[3] + $data[2] -1) ;			
		if(strlen($a[3]) >strlen($code_l) ){
			$num = strlen($a[3])-strlen($code_l);
			for($aa=0;$aa<$num ;$aa++){
					$cc .= "0";
			}
			$code_last = $cc.$code_l;
			$cc = "";
		}else{
			$code_last = $code_l;
		}
	
	}
		 ?>
                                                <tr>
                                                  <td style="border-width:2; border-color:white; border-style:solid;" align="left"><font size="2">&nbsp;<? echo fild_type($data[0]); ?></font></td>
                                                  <td style="border-width:2; border-color:white; border-style:solid;"><font size="2">&nbsp;<? echo $data[1]; ?></font></td>
                                                  <td style="border-width:2; border-color:white; border-style:solid;" align="right"><font size="2">&nbsp;<? echo $data[2];  ?></font></td>
                                                  <td style="border-width:2; border-color:white; border-style:solid;" align="center"><font size="2">&nbsp;<? echo $data[3];  ?></font></td>
                                              <td style="border-width:2; border-color:white; border-style:solid;" align="center"><font size="2">&nbsp;<? echo $data[4];  ?></font></td>
                                                 <td style="border-width:2; border-color:white; border-style:solid;"  align="left"><font size="2">&nbsp;<? 
	echo $data[5];
	if($data[2] >1) echo " ถึง ".$code_last;
												  ?></font></td>
                                                  <td align="center" style="border-width:2; border-color:white; border-style:solid;"><font size="2"><a  href="?action=new_buy&del=del&array1=<?=$m?>" onClick="return godel();">
                                                     ลบ </a></font></td>
                                                </tr>
                                                <? 
												

	}
}
?>
                                                <tr>
                                                  <td colspan="9" align="center"  height="32"><font face="MS Sans Serif">
<input type="submit" name="savess2" value=" ยืนยันการตรวจรับ " onClick="return q_confirm()" >
                                                  &nbsp; 
<input name="btnSub"  type="submit" value=" ยกเลิก " onClick="return q_cencel()" >
                                                 
                                                  &nbsp;</font> </td>
                                                </tr>
                                              </table></td>
                                            </tr>
            </table> 
                    </td>
                                            </tr>
  </table>
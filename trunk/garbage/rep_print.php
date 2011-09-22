<?
session_start();
include('config.inc.php');
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<form action="rep_print_1.php" method="post" name="f22"  onSubmit="return check(this);" >
<br>
   <input type="hidden" name="HOCODE" value="<?=$HOCODE?>">
					<input type="hidden" name="month" value="<?=$month?>">
					<input type="hidden" name="year" value="<?=$year?>">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
      <tr> 
        <td  colspan="2" style="border: #7292B8 1px solid;"  >
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr class="lgBar">
			   <td  height="32"><div>&nbsp;&nbsp;&nbsp;พิมพ์ใบเสร็จรับเงิน</div></td> 
            </tr>
            <tr>
              <td  valign="top"><table name="add" cellpadding="1" cellspacing="1" border="0" width="100%">
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
       <tr>
                  <td width="23%" class="bmText_1"><div> หมายเหตุ</div></td>
                    <td width="77%"><div>
                      <input name="memo" type="text" id="memo" value="<?=$memo?>"  size="50">
</div></td>
                </tr>
                  <tr class="bmText_1">
                    <td width="23%"><div>ตั้งแต่ลำดับที่ </div></td>
                    <td width="77%"><div>
                    <input name="start" type="text" id="start" value="<?=$start?>"  size="5">&nbsp;&nbsp;ถึง&nbsp;&nbsp;<input name="end" type="text" id="end" value="<?=$end?>" size="5"  > 
             <input type="hidden" name="HOCODE" value="<?=$HOCODE?>">
					<input type="hidden" name="month" value="<?=$month?>">
					<input type="hidden" name="year" value="<?=$year?>">
					</div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="พิมพ์"   class="buttom">
                    &nbsp;&nbsp;<input type="reset" name="formbutton2" value="ยกเลิก" class="buttom">    </td>
                </tr>
              </table>
              </td>
            </tr>
        </table></td>
      </tr>
  </table></td>
			</tr>
		</table>
	</td>
</tr>
</table>
</form> 
</body>
</html>
<script language="javascript">
function godel()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
  <script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function check(theForm) 
	{
		if (  document.f22.start.value=='' || document.f22.start.value==' ' )
           {
           alert("กรุณากรอกเลขที่เริ่มต้น");
           document.f22.start.focus();           
           return false;
           }
		      if (  document.f22.end.value=='' || document.f22.end.value==' ' )
           {
           alert("กรุณากรอกเลขที่สิ้นสุด");
           document.f22.end.focus();      
           return false;
           }
		 
		   if (confirm("คุณต้องการพิมพ์ข้อมูล ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}
}
</script>
<?
function insert_code($rd_id,$code){
		$sql_add = "INSERT INTO code (rd_id,code) 
		VALUES('$rd_id','$code')";
		echo $sql_add."<br>";
		$result_add = mysql_query($sql_add); 
}
function find_max_rd_id($r_id) {
	
		$sql = "Select max(rd_id) as max  from receive_detail  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1; //gene ค่า sale_id 
		}
		return $rd_id;
	}
	function update_stock( $s_date , $amount , $p_id , $div_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0 and div_id = '$div_id' ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] + $amount ;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' and status = 0";
				$result_up = mysql_query($sql_up); 
		}
}
function check_stock_1($s_date,$p_id,$div_id){
		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		 and div_id ='$div_id'
		group by id
		order by s_date desc ,id desc   limit 1 ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];
}
function check_stock_2($s_date,$p_id ,$div_id){
		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		and div_id = '$div_id'
		group by id
		order by s_date desc ,id desc   limit 1  ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];
}
function update_stock_2(  $s_date , $amount , $p_id , $div_id){
		$sql = "Select *  from stock_card  where p_id ='$p_id' and s_date > '$s_date'  and status = 0 and div_id = '$div_id' ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - $amount ;
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]' and status = 0 ";
				echo $sql_up."<br>";
				$result_up = mysql_query($sql_up); 
		}
}
function find_max_pd_id($p_id) {
		$sql = "Select max(pd_id) as max  from pay_detail  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //ถ้าว่าง
			$pd_id = "1";
		} else{
			$pd_id =  $max + 1; //gene ค่า sale_id 
		}
		return $pd_id;
	}
?>
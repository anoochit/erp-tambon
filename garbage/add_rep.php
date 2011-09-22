<?
session_start();
include('config.inc.php');
if($OK <> '' ){
			$jj = 0 ;
			$ex = substr($month,0,1);
			if($ex =='0') $monthh = substr($month,1);	
			else $monthh = $month;	 
			$sql_ex =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo, ";
			$sql_ex  .=  "  if(rec_status is null,'ค้างชำระ',rec_status) as rec_status, ";
			$sql_ex  .=  "  if(rec_id is null,'',rec_id)as rec_id, ";
			$sql_ex  .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
			$sql_ex  .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total,
			if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
			$sql_ex  .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
			$sql_ex  .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
			$sql_ex  .=  "  Where b.mem_id = m.mem_id and b.status = 'ปกติ'   ";
			$sql_ex  .=  "  and  hocode = '" .$HOCODE. "'   ";
			$sql_ex  .=  "  group by b.MCODE ";
			$result_1 = mysql_query($sql_ex );
			while($rs_1=mysql_fetch_array($result_1)){
						if($rs_1[rec_id] =='' or $rs_1[rec_id] == NULL ) {
						 		$arr = explode("/",$rec_id2);
									$s = $arr[1] + $jj;
									$st = '';
						 			if(strlen($s) <4){
											for($i=0;$i<(4- strlen($s));$i++){
													$st .="0";
											}
											$id = $st.$s;
									}else{
											$id = $s;
									}
									$rec_id = $arr[0]."/".$id;
								
									$sql_add2 = " replace into receive(myear,monthh,mcode,rec_id,rec_date,total , amt_1)
									values ('$year','$month' , '" .$rs_1[MCODE]. "' ,'".$rec_id."', '" .date_format_sql($RDATE). "',
									'" .$rs_1[qty]*MONEY()."' ,'".MONEY()."' )";
									$result_add2 = mysql_query($sql_add2); 
								$jj++;
						}
				}
		?>
		<script language="JavaScript">
			window.opener.location.reload();
			window.close();
		</script> 
		<?
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<script language="JavaScript" src="calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<body>
<form action="" method="post" name="f22"  onSubmit="return check(this);" >
<br>
<input type="hidden" name="r_id" value="<?=$r_id?>">
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
      <tr> 
        <td  colspan="2" style="border: #7292B8 1px solid;"  >
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr class="lgBar" >
			   <td  height="32"><div>&nbsp;&nbsp;&nbsp;กรอกข้อมูลเลขที่ใบเสร็จเริ่มต้น</div></td> 
            </tr>
            <tr>
              <td  valign="top"><table name="add" cellpadding="1" cellspacing="1" border="0" width="100%">
  			<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
		    <tr class="bmText" height="25">
              <td width="28%"><strong>&nbsp;&nbsp;วันที่ออกใบเสร็จ</strong></td>
              <td width="72%"><div>&nbsp;&nbsp;<input name="RDATE" type="text" id="RDATE" value="<? if($RDATE =='') echo date("d/m/Y") ;else echo $RDATE;?>"  size="10" >
                  &nbsp; <img  src="images/calculator_add.png" onClick="showCalendar('RDATE','DD/MM/YYYY')" align="absmiddle"   />
		    </div></td>
			</tr>
		    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
            <tr class="bmText" height="25">
              <td width="28%"><strong>&nbsp;&nbsp;เลขที่ใบเสร็จ</strong></td>
                    <td width="72%"><div>&nbsp;&nbsp;<?
						$sql_ex =" SELECT mid(max(rec_id),6) as maxi FROM receive  where mid(rec_id,1,2) like '" .substr($year,2) . "' 
						and mid(rec_id,3,2) = '".$month."'";
						$result_1= mysql_query($sql_ex );
						$rs_1=mysql_fetch_array($result_1);
						if($rs_1[maxi] == NULL or $rs_1[maxi] == ''){
								$rec_id = substr($year,2).$month."/0001";
						}else{
									$max = $rs_1[maxi]+1;
									$st ='';
								if(strlen($max) <4){
										for($i=0;$i<(4- strlen($max));$i++){
												$st .="0";
										}
												$max = $st.$max;
								}
							$rec_id = substr($year,2).$month."/".$max;
						}
					?><input name="rec_id1" type="text" id="rec_id1" value="<? echo   $rec_id;?>"  size="10"   disabled="disabled">
					<input name="rec_id2"  type="hidden" id="rec_id2" value="<? echo   $rec_id;?>"  size="10"   >
					&nbsp;&nbsp; ตัวอย่าง 001/0001
                  &nbsp; 
		    </div></td>
			</tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="ตกลง"   class="buttom">
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
<script language="javascript">
function doNext(el)
{
	if (el.value.length < el.getAttribute('maxlength')) 
	return;
	var f = el.form;
	var els = f.elements;
	var x, nextEl;
	for (var i=0, len=els.length; i<len; i++){
		x = els[i];
		if (el == x && (nextEl = els[i+1]))
		{
			nextEl.value="";
			if (nextEl.focus) 
			nextEl.value="";
			nextEl.focus();
		}
	}
}
</script>
  <script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function check(theForm) 
	{
		if (  document.f22.rec_id1.value=='' || document.f22.rec_id1.value==' ' )
           {
           alert("กรุณากรอกเลขที่ใบเสร็จตั้งต้น");
           document.f22.rec_id1.focus();           
           return false;
           }
		    
		   if (confirm("คุณต้องการเพิ่มข้อมูล ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}
}
</script>
<?
function check_stock_2($s_date,$p_id ,$div_id){
		$sql = "Select s_date ,max(id),remain from stock_card  where p_id = '$p_id' and s_date <= '$s_date' and status = 0
		and div_id = '$div_id'
		group by id
		order by s_date desc ,id desc   limit 1  ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['remain'].",".$arr['id'];
}
?>
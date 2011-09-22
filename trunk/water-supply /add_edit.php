<?
session_start();
include('config.inc.php');
if($OK <> '' ){
		if($type == '0' ){
				$aa = explode("*" ,rate_water($HOCODE) );
				if($new_rec_id == ''){
						$amount1 = $n_mno - $o_mno;
						if($amount1 <= 100) {
									$amount =$amount1  *$aa[0];
									if($amount == 0 )	$amount  = S_Min();
							}elseif( $amount1  > 100 and  $amount1 <=300){
									$amount =100 *$aa[0];
									$amount = $amount + (($amount1 - 100) *$aa[1]);
							}else{
									$amount =100 *$aa[0];
									$amount =$amount  +(200 *$aa[1]) ;
									$amount = $amount + (($amount1 - 300) *$aa[2]);
							}
							 	$vat = ($amount *VAT()) / 100; 
								$sum_m = $amount + rent(); +  $vat;
							$sql_update = " update meter  set mno ='" .$n_mno. "' , ";
                            $sql_update .= " total ='" .$amount. "' ,";
                            $sql_update .= " amount ='" .$amount1 ."' ,";
                            $sql_update .= " vat ='" .$vat. "' ,";
                            $sql_update .= " sum_m ='" .$sum_m. "' ";             
							$sql_update .= " m_amt ='" .rent()  . "' ,";
                            $sql_update .= " where mcode = '" .$MCODE. "' and  ";
                            $sql_update .= " monthh ='" .$monthh. "' and ";
                            $sql_update .= " myear ='" .$myear. "' ";
              			  echo "\$sql_update   ".$sql_update ."<br>";
							$result_insert  = mysql_query($sql_update); 
				}else{
							$amount = $n_mno - $o_mno;
							$min = $amount * $rate; 
							$vat = ($min*VAT()) / 100; 
							$sum_m = $min + $amt  +  $vat;
							$sql_update = " update meter  set mno ='" .$n_mno. "' , ";
                            $sql_update .= " total ='" .$min. "' ,";
                            $sql_update .= " amount ='" .$amount. "' ,";
                            $sql_update .= " vat ='" .$vat. "' ,";
                            $sql_update .= " sum_m ='" .$sum_m. "' ";
                           $sql_update .=  " where mcode = '" .$MCODE. "' and  ";
							$sql_update .=  " rec_id ='" .$rec_id_old. "' ";
              			  echo "\$sql_update   ".$sql_update ."<br>";
						$result_insert  = mysql_query($sql_update); 
				}
								?>
							<script language="JavaScript">
										window.opener.location.reload();
										window.close();
								</script>  
								<?
			}elseif($type == '1' ){
										$sql_update = " update meter  set rec_id ='" .$new_rec_id. "' , ";
										$sql_update .=  " rec_date ='" .date_format_sql($RDATE). "' ";
										$sql_update .=  " where mcode = '" .$MCODE. "' and  ";
										$sql_update .=  " rec_id ='" .$rec_id_old. "' ";
										echo "\$sql_update  ".$sql_update."<br>";
										$result_insert  = mysql_query($sql_update); 
							if($result_insert){
										$sql_insert = "insert into cancel_receipt(myear,monthh,mcode,orec_id,orec_date,nrec_id,nrec_date,remark)";
										$sql_insert .=  " values ('" .$myear. "','" .$monthh. "' ,";
										$sql_insert .=  " '" .$MCODE. "','" .$rec_id_old. "' ,";
										$sql_insert .=  " '"  .date_format_sql($RDATE).  "','" .$new_rec_id. "' ,";
										$sql_insert .=  " '" .$rec_date_old. "','ยกเลิก' )";
										echo "\$sql_insert   ".$sql_insert ."<br>";
										$result_insert  = mysql_query($sql_update); 
								?>
									<script language="JavaScript">
										window.opener.location.reload();
										window.close();
								</script>  
								<?
							}else{
									echo "<br><center><font color=darkgreen>ข้อมูลผิดพลาดกรุณากรอกข้อมูลใหม่</font></center><br>";
							}
			}elseif($type == '2' ){
							$sql_update = "update meter  set rec_status  ='ค้างชำระ' , ";
							$sql_update .=  " p_date ='1111-11-11' ";
							$sql_update .=  "  where mcode = '" .$MCODE. "' and ";
							$sql_update .=  " rec_id ='" .$rec_id_old. "'";
							echo "\$sql_update  ".$sql_update."<br>";
							$result_insert  = mysql_query($sql_update); 
							?>
					<script language="JavaScript">
										window.opener.location.reload();
										window.close();
									</script>   
						<?			
				}elseif($type == '3' ){
							$sql_update = "update meter  set rec_status  ='ยกเลิก' ,  ";
							$sql_update .=  " p_date ='1111-11-11'  ";
							$sql_update .=  "  where mcode = '" .$MCODE. "' and   ";
							$sql_update .=  " rec_id ='" .$rec_id_old. "'";
							echo "\$sql_update  ".$sql_update."<br>";
							$result_insert  = mysql_query($sql_update); 
							?>
							<script language="JavaScript">
										window.opener.location.reload();
										window.close();
									</script>
						<?			
					}
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<script language="JavaScript" src="calendar.js"></script>
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};
//dochange จะถูกเรียกเมื่อมีการเลือก รายการ Combobox ซึ่งจะทำให้ไปเรียก AJAX เพื่อร้องขอข้อมูลถัดไปจาก Server
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_3.php?data="+src+"&val="+val+"&year="+document.f22.myear.value+"&month="+document.f22.monthh.value); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}
</script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<body>
<form action="" method="post" name="f22"  onSubmit="return check(this);" >
<br>
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
      <tr> 
        <td  colspan="2" style="border: #7292B8 1px solid;"  ><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr class="lgBar" >
            <td  height="32"><div>&nbsp;&nbsp;&nbsp;กรอกข้อมูลเลขที่ใบเสร็จเริ่มต้น</div></td>
          </tr>
          <tr>
            <td  valign="top"><table name="add" cellpadding="1" cellspacing="1" border="0" width="100%">
                <tr>
                  <td colspan="2" background="images/hdot2.gif"></td>
                </tr>
                <tr class="bmText" height="25">
                  <td width="28%"><strong>&nbsp;&nbsp;เงื่อนไขการแก้ไขข้อมูล</strong></td>
                  <td width="72%"><div>&nbsp;&nbsp;
                        <select name="type" onChange="dochange('Z', this.value)" >
                            <option value="" <? if($type =='') echo "selected"?> >--------------ประเภทการแก้ไขข้อมูล--------------</option>
                            <option value="0" <? if($type =='0') echo "selected"?> >กรอกเลขมาตรผิด</option>
                            <option value="1" <? if($type =='1') echo "selected"?> >ยกเลิกใบเสร็จรับเงิน(ออกใบใหม่) </option>
                            <option value="2" <? if($type =='2') echo "selected"?> >ยกเลิกการชำระเงิน </option>
                            <option value="3" <? if($type =='3') echo "selected"?> >ยกเลิกใบเสร็จรับเงิน </option>
                          </select>
                  </div></td>
                </tr>
                <tr >
                  <td colspan="2" background="images/hdot2.gif"></td>
                </tr>
                <tr   class="bmText">
                  <td colspan="2" id="Z" ></td>
                </tr>
                <tr class="bmText" height="25">
                  <td colspan="2"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                      <?
			  	$sql_ex  = " Select  q.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,q.mno, HOCODE ,";
				$sql_ex  .=  "  if(m2.mno is null,' ',m2.mno) as M ,s.amt ,rec_status,r.amt as rate,";
				$sql_ex  .=  " if(rec_id is null,'',rec_id)as rec_id,m2.rec_date ,";
				$sql_ex  .=  "  p_date ,if(amount is null,'',amount)as amount ,if(total is null,'',total)as total  ,if(sum_m is null,'',sum_m)as sum_m ,if(vat is null,'',vat)as vat ,";
				$sql_ex  .=  " m2.m_date,if(m_rate  is null,'',m_rate)as m_rate,";
				$sql_ex  .=  " if(m_amt is null,'',m_amt) as m_amt,m2.myear,m_date,monthh , m2.sum_m , m2.total ";
				$sql_ex  .=  "  from member m,service1 s,rate_water r,q_water q left join meter m2 on q.MCODE = m2.MCODE";
				$sql_ex  .=  "  Where q.mem_id = m.mem_id And s.scode = q.scode And r.tmcode = q.tmcode";
				$sql_ex  .=  " and q.status = 'ปกติ' and rec_status <> 'ยกเลิก' ";
				$sql_ex  .=  "  and q.MCODE  like   '" .$MCODE1. "'   ";
				$sql_ex  .=  "  and rec_id  like     '" .$rec_id1. "'   ";
			$result_1 = mysql_query($sql_ex );
			$rs_1=mysql_fetch_array($result_1);
			  ?>
                      <tr class="bmText" >
                        <td width="18%" height="25"><strong>&nbsp;&nbsp;เลขทะเบียน</strong></td>
                        <td width="37%">&nbsp;
                            <input type="text" name="MCODE1" value="<?=$rs_1[MCODE]?>" size="10"class="text"    />
                            <input type="hidden" name="MCODE" value="<?=$rs_1[MCODE]?>" size="10"class="text"    />
							 <input type="hidden" name="HOCODE" value="<?=$rs_1[HOCODE]?>" size="10"class="text"    />
                            <input type="hidden" name="myear" value="<?=$rs_1[myear]?>" size="10"class="text"    />
                            <input type="hidden" name="monthh" value="<?=$rs_1[monthh]?>" size="10"class="text"    />                        </td>
                        <td width="24%" height="25"><strong>&nbsp;&nbsp;จำนวนเงิน</strong></td>
                        <td width="21%">&nbsp;
                            <input type="text" name="rec_id1" value="<?=$rs_1[total]?>" size="5"class="text"    />
                            <input type="hidden" name="rec_id_old" value="<?=$rs_1[rec_id]?>" ></td>
                      </tr>
                      <tr >
                        <td colspan="4" background="images/hdot2.gif"></td>
                      </tr>
                      <tr class="bmText" >
                        <td width="18%" height="25"><strong>&nbsp;&nbsp;ชื่อ</strong></td>
                        <td>&nbsp;
                            <input type="text" name="name" value="<?=$rs_1[name]?>" size="20"class="text"    /></td>
                        <td width="24%" height="25"><strong>&nbsp;&nbsp;ภาษี</strong></td>
                        <td>&nbsp;
                            <input type="text" name="rec_date" value="<?=$rs_1[vat]   ?>" size="5"class="text"    />
                          <input type="hidden" name="rec_date_old" value="<?=$rs_1[rec_date]?>" size="10"class="text"    /></td>
                      </tr>
                      <tr >
                        <td colspan="4" background="images/hdot2.gif"></td>
                      </tr>
                      <tr class="bmText" >
                        <td width="18%" height="25"><strong>&nbsp;&nbsp;บ้านเลขที่</strong></td>
                        <td>&nbsp;
                            <input type="text" name="name" value="<?  if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1]?>" size="10"class="text"    /></td>
                        <td width="24%" height="25"><strong>&nbsp;&nbsp;ค่าเช่ามาตร</strong></td>
                        <td>&nbsp;
                            <input type="text" name="name" value="<?=rent()?>" size="5"class="text"    /><input type="hidden" name="amt" value="<?=$amt?>"></td>
                      </tr>
                      <tr >
                        <td colspan="4" background="images/hdot2.gif"></td>
                      </tr>
                      <tr class="bmText" >
                        <td width="18%" height="25"><strong>&nbsp;&nbsp;เลขประจำมาตร</strong></td>
                        <td>&nbsp;
                            <input type="text" name="mno" value="<?=$rs_1[mno]; ?>" size="10"class="text"    /></td>
                        <td width="24%" height="25"><strong>&nbsp;&nbsp;รวมเป็นเงิน</strong></td>
                        <td>&nbsp;
                            <input type="text" name="rec_id" value="<?   echo $rs_1[sum_m] ;
   ?>" size="5"class="text"    /></td>
                      </tr>
                      <tr >
                        <td colspan="4" background="images/hdot2.gif"></td>
                      </tr>
                      <tr class="bmText" >
                        <td width="18%" height="25"><strong>&nbsp;&nbsp;วันที่วัดมาตร</strong></td>
                        <td>&nbsp;
                            <input type="text" name="rec_id" value="<?	if($rs_1[m_date] =='1111-11-11' or $rs_1[m_date] =='') echo "";
 else echo date_2($rs_1[m_date]);?>" size="10"class="text"    /></td>
                        <td width="24%" height="25"><strong>&nbsp;&nbsp;เลขที่ใบเสร็จ</strong></td>
                        <td width="21%">&nbsp;
                            <input type="text" name="rec_id1" value="<?=$rs_1[rec_id]?>" size="10"class="text"    />
                            <input type="hidden" name="rec_id_old" value="<?=$rs_1[rec_id]?>" ></td>
                      </tr>
                      <tr >
                        <td colspan="4" background="images/hdot2.gif"></td>
                      </tr>
                      <tr class="bmText" >
                        <td width="18%" height="25"><strong>&nbsp;&nbsp;เลขมาตรที่วัดได้</strong></td>
                        <td>&nbsp;
                            <input type="text" name="rec_id" value="<?=$rs_1[M]?>" size="5"class="text"    />
                          เลขมาตรเดิม
                          <?=$rs_1[M]-$rs_1[amount]?>
                          <input type="hidden" name="o_mno" value="<?=$rs_1[M]- $rs_1[amount]?>" ></td>
                        <td width="24%" height="25"><strong>&nbsp;&nbsp;วันที่ออกใบเสร็จ</strong></td>
                        <td>&nbsp;<?//=$rs_1[rec_date]?>
                            <input type="text" name="rec_date" value="<?  if($rs_1[rec_id] =='') echo "";
 else echo date_2($rs_1[p_date]);
   ?>" size="10"class="text"    />
                          <input type="hidden" name="rec_date_old" value="<?=$rs_1[rec_date]?>" size="10"class="text"    /></td>
                      </tr>
                      <tr >
                        <td colspan="4" background="images/hdot2.gif"></td>
                      </tr>
                      <tr class="bmText" >
                        <td width="18%" height="25"><strong>&nbsp;&nbsp;จำนวนน้ำที่ใช้</strong></td>
                        <td>&nbsp;
                            <input type="text" name="rec_id" value="<?=$amount1?>" size="5"class="text"    /></td>
                        <td width="24%" height="25"><strong>&nbsp;&nbsp;สถานะ</strong></td>
                        <td>&nbsp;
                            <input type="text" name="name" value="<? echo $rs_1[rec_status]?>" size="10"class="text"    /></td>
                      </tr>
                      <tr >
                        <td colspan="4" background="images/hdot2.gif"></td>
                      </tr>
                      <tr class="bmText" >
                        <td width="24%" height="25"><strong>&nbsp;&nbsp;วันที่ชำระเงิน</strong></td>
                        <td>&nbsp;
                            <input type="text" name="rec_id" value="<?  if($rs_1[p_date] =='1111-11-11') echo "-";
 else echo date_2($rs_1[p_date]);
   ?>" size="10"class="text"    /></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="2" background="images/hdot2.gif"></td>
                </tr>
                <tr>
                  <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="ตกลง"   class="buttom">
                    &nbsp;&nbsp;
                    <input type="reset" name="formbutton2" value="ยกเลิก" class="buttom">                  </td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
  </table>
</td>
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
		if (  document.f22.type.value=='' || document.f22.type.value==' ' )
           {
           alert("กรุณาเลือกเงื่อนไขในการยกเลิก");
           document.f22.type.focus();           
           return false;
           } 
		   if (  document.f22.type.value=='0'  && (document.f22.n_mno.value == '' || document.f22.n_mno.value == ' ' ) )
           {
				   alert("กรุณากรอกเลขมาตรใหม่");
				   document.f22.n_mno.focus();           
				   return false;
           }
		 if (  document.f22.type.value=='0'  && (eval(document.f22.n_mno.value)  < eval(document.f22.o_mno.value)) )
           {
				   alert("มาตรน้ำที่กรอกต่ำกว่ามาตรน้ำเดิม  กรุณากรอกใหม่");
				   document.f22.n_mno.focus();           
				   return false;
           }
		if (  document.f22.type.value=='1'  && (document.f22.new_rec_id.value==' ' || document.f22.new_rec_id.value=='' ) )
           {
           alert("กรุณากรอกเลขที่ใบเสร็จใหม่");
           document.f22.new_rec_id.focus();           
           return false;
           }
		   if (  document.f22.type.value=='1'  && (document.f22.RDATE.value==' ' || document.f22.RDATE.value=='' ) )
           {
           alert("กรุณากรอกวันที่ออกใบเสร็จ");
           document.f22.RDATE.focus();           
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
<script language="JavaScript" type="text/javascript">
		document.getElementById('show1').style.display='none';
</script> 
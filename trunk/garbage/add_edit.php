<?
session_start();
include('config.inc.php');
if($OK <> '' ){
			if($type == '1' and $new_rec_id <>''){
										$sql_update = " update receive  set rec_id ='" .$new_rec_id. "' , ";
										$sql_update .=  " rec_date ='" .date_format_sql($RDATE). "' ";
										$sql_update .=  " where mcode = '" .$MCODE. "' and  ";
										$sql_update .=  " monthh ='" .$monthh. "' and ";
										$sql_update .=  " myear ='".$myear."' and";
										$sql_update .=  " rec_id ='" .$rec_id_old. "' ";
										echo "\$sql_update  ".$sql_update."<br>";
										$result_insert  = mysql_query($sql_update); 
							if($result_insert){
										$sql_insert = "insert into cancel_receipt(myear,monthh,mcode,orec_id,orec_date,nrec_id,nrec_date,remark)";
										$sql_insert .=  " values ('" .$myear. "','" .$monthh. "' ,";
										$sql_insert .=  " '" .$MCODE. "','" .$rec_id_old. "' ,";
										$sql_insert .=  " '"  .date_format_sql($RDATE).  "','" .$new_rec_id. "' ,";
										$sql_insert .=  " '" .$rec_date_old. "','¡��ԡ' )";
										echo "\$sql_insert   ".$sql_insert ."<br>";
										$result_insert  = mysql_query($sql_update); 
								?>
			<script language="JavaScript">
										window.opener.location.reload();
										window.close();
								</script> 
								<?
							}else{
									echo "<br><center><font color=darkgreen>�����żԴ��Ҵ��سҡ�͡����������</font></center><br>";
							}
			}elseif($type == '2' ){
							$sql_update = "update receive  set rec_status ='��ҧ����' , ";
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
							$sql_update = "update receive  set rec_status ='¡��ԡ' ,  ";
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
//dochange �ж١���¡������ա�����͡ ��¡�� Combobox ��觨з��������¡ AJAX ������ͧ�͢����ŶѴ仨ҡ Server
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //�Ѻ��ҡ�Ѻ��
               } 
          }
     };
     req.open("GET", "ajax_3.php?data="+src+"&val="+val+"&year="+document.f22.myear.value+"&month="+document.f22.monthh.value); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}
</script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<body>
<form action="" method="post" name="f22"  onSubmit="return check(this);" >
<br>
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
      <tr> 
        <td  colspan="2" style="border: #7292B8 1px solid;"  >
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr class="lgBar" >
			   <td  height="32">��䢢�����������Ѻ�Թ</td> 
            </tr>
            <tr>
              <td  valign="top"><table name="add" cellpadding="1" cellspacing="1" border="0" width="100%">
  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
              <td width="28%"><strong>&nbsp;&nbsp;���͹䢡����䢢�����</strong></td>
                    <td width="72%"><div>&nbsp;&nbsp;<select name="type" onChange="dochange('Z', this.value)" >
		      <option value="" <? if($type =='') echo "selected"?> >--------------�����������䢢�����--------------</option>
              <option value="1" <? if($type =='1') echo "selected"?> >¡��ԡ������Ѻ�Թ(�͡�����) </option>
              <option value="2" <? if($type =='2') echo "selected"?>>¡��ԡ��ê����Թ </option>
              <option value="3" <? if($type =='3') echo "selected"?> >¡��ԡ����� </option>
            </select>
		    </div></td>
			</tr>
	  <tr ><td colspan="2" background="images/hdot2.gif"> </td></tr> 
			<tr   class="bmText">
			<td colspan="2"  id="Z"  >
			</td>
			</tr>
		  <tr class="bmText" height="25">
              <td colspan="2">
			  <table width="100%" border="0" cellspacing="1" cellpadding="1">
			  <?
			$sql_ex =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,rec_status, ";
			$sql_ex  .=  "  if(rec_id is null,'',rec_id)as rec_id,rec_date,";
			$sql_ex  .=  "  if(qty is null,'0',qty)as qty ,if(total is null,'0',total)as total , r.myear,p_date,monthh ";
			$sql_ex  .=  "   from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
			$sql_ex  .=  "  Where b.mem_id = m.mem_id and b.status = '����' and rec_status <> '¡��ԡ'   ";
			$sql_ex  .=  "  and b.MCODE  like   '" .$MCODE1. "'   ";
			 $sql_ex  .=  "  and rec_id  like     '" .$rec_id1. "'   ";
			$sql_ex  .=  "  order by b.MCODE,rec_date   ";
			$result_1 = mysql_query($sql_ex );
			$rs_1=mysql_fetch_array($result_1);
			  ?>
  <tr class="bmText" >
    <td width="16%" height="25"><strong>&nbsp;&nbsp;�Ţ����¹</strong></td>
    <td width="39%">&nbsp;<input type="text" name="MCODE1" value="<?=$rs_1[MCODE]?>" size="10"class="text"    />
	<input type="hidden" name="MCODE" value="<?=$rs_1[MCODE]?>" size="10"class="text"    />
	<input type="hidden" name="myear" value="<?=$rs_1[myear]?>" size="10"class="text"    />
	<input type="hidden" name="monthh" value="<?=$rs_1[monthh]?>" size="10"class="text"    />
	</td>
    <td width="24%" height="25"><strong>&nbsp;&nbsp;�Ţ��������</strong></td>
    <td width="21%">&nbsp;<input type="text" name="rec_id1" value="<?=$rs_1[rec_id]?>" size="10"class="text"    />
	<input type="hidden" name="rec_id_old" value="<?=$rs_1[rec_id]?>" ></td>
  </tr>
   <tr ><td colspan="4" background="images/hdot2.gif"> </td></tr> 
  <tr class="bmText" >
     <td width="16%" height="25"><strong>&nbsp;&nbsp;����</strong></td>
    <td>&nbsp;<input type="text" name="name" value="<?=$rs_1[name]?>" size="20"class="text"    /></td>
    <td width="24%" height="25"><strong>&nbsp;&nbsp;�ѹ����͡�����</strong></td>
    <td>&nbsp;<input type="text" name="rec_date" value="<? echo date_2($rs_1[rec_date]);
   ?>" size="10"class="text"    /><input type="hidden" name="rec_date_old" value="<?=$rs_1[rec_date]?>" size="10"class="text"    /></td>
  </tr>
      <tr ><td colspan="4" background="images/hdot2.gif"> </td></tr> 
  <tr class="bmText" >
       <td width="16%" height="25"><strong>&nbsp;&nbsp;��ҹ�Ţ���</strong></td>
    <td>&nbsp;<input type="text" name="name" value="<?  if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1]?>" size="10"class="text"    /></td>
    <td width="24%" height="25"><strong>&nbsp;&nbsp;ʶҹ�</strong></td>
    <td>&nbsp;<input type="text" name="name" value="<? echo $rs_1[rec_status]?>" size="10"class="text"    /></td>
  </tr>
      <tr ><td colspan="4" background="images/hdot2.gif"> </td></tr> 
  <tr class="bmText" >
       <td width="16%" height="25"><strong>&nbsp;&nbsp;�ӹǹ�Թ</strong></td>
    <td>&nbsp;<input type="text" name="rec_id" value="<?=$rs_1[qty]?>" size="5"class="text"    /></td>
    <td width="24%" height="25"><strong>&nbsp;&nbsp;�ѹ�������Թ</strong></td>
    <td>&nbsp;<input type="text" name="rec_id" value="<?  if($rs_1[p_date] =='1111-11-11') echo "-";
 else echo date_2($rs_1[p_date]);
   ?>" size="10"class="text"    /></td>
  </tr>
 </table>
		      </td>
			</tr>
			  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="��ŧ"   class="buttom">
                    &nbsp;&nbsp;<input type="reset" name="formbutton2" value="¡��ԡ" class="buttom">    </td>
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
	if (confirm("�س��ͧ��úѹ�֡������ ���������"))
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
	//------------------------------function  ����Ҩҡ form-------------------------
	function check(theForm) 
	{
		if (  document.f22.type.value=='' || document.f22.type.value==' ' )
           {
           alert("��س����͡���͹�㹡��¡��ԡ");
           document.f22.type.focus();           
           return false;
           }
		 
		if (  document.f22.type.value=='1'  && (document.f22.new_rec_id.value==' ' || document.f22.new_rec_id.value=='' ) )
           {
           alert("��سҡ�͡�Ţ������������");
           document.f22.new_rec_id.focus();           
           return false;
           }
		   if (  document.f22.type.value=='1'  && (document.f22.RDATE.value==' ' || document.f22.RDATE.value=='' ) )
           {
           alert("��سҡ�͡�ѹ����͡�����");
           document.f22.RDATE.focus();           
           return false;
           }
		    
		   if (confirm("�س��ͧ������������� ���������"))
			{
					return true;
			}else{
					return false;
			}
}
</script>
<script language="JavaScript" type="text/javascript">
document.getElementById('show2').style.display='none';
</script> 
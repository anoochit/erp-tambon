<?
include('config.inc.php');

if($OK <> ''){

			//-------------------------�ѹ�֡ŧ order1_detail----------------------------------------
			$sql_add = "UPDATE receive_detail SET type_id ='$type' ,rd_name ='$rd_name' 
			,amount ='$amount' ,price ='$price' ,unit ='$unit' , brand_name = '$brand_name'   , type_name = '$type_name' , endDate_garan  = '".date_format_sql($endDate_garan)."', garan_at  = '$garan_at' , date_garan =  '".date_format_sql($date_garan)."' WHERE rd_id = $rd_id";
			echo $sql_add."<br>";
			$result_add = mysql_query($sql_add); 
if($code1<>'' or $code2<>'' or $code3<>''){			
		$sql_del= "DELETE FROM code WHERE rd_id = $rd_id";
		echo $sql_del."<br>";
		$result_del = mysql_query($sql_del); 

			if($amount >1){
					$cc = "";
					$code_max = $code1."-".$code2."-".$code3."-";
					for($f=0;$f<$amount ;$f++){
						$code_l = $code4 + $f ;		
						if(strlen($code4) >strlen($code_l) ){
								$num = strlen($code4)-strlen($code_l);
								for($j=0;$j<$num ;$j++){
										$cc .= "0";
								}
								$code_last = $cc.$code_l;
								$code_use = $code_max.$code_last ;
						}else{
								$code_last = $code_l;
								$code_use = $code_max.$code_last ;
						}
							insert_code($rd_id,$code_use);
						$cc = "";
					}
				}elseif($amount ==1){
					$code_use = $code1."-".$code2."-".$code3."-".$code4 ;
					insert_code($rd_id,$code_use);
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
<link rel="stylesheet" type="text/css" href="style2.css"> 
<script language="JavaScript" src="include/calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<link rel="stylesheet" type="text/css" href="default.css">
<body>
<br />
<form action="" method="post" name="f22" >
<?
$sql = "SELECT * FROM receive r,receive_detail rd
 Where r.r_id = rd.r_id
 and  rd_id = '$rd_id'   ";
$result = mysql_query($sql);
$i = 0;
$total = 0;
$rs=mysql_fetch_array($result);
?>

<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr  >
		      <td  height="32" class="tbETitle"><div >&nbsp;&nbsp;&nbsp;�����¡�ä���ѳ��</div></td> 
            </tr>
            <tr>
              <td height="191"><table name="add" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f7f9"  width="100%">
			  <tr class="bmText_1">
                    <td><div>�Ţ�����觢ͧ </div></td>
			
                    <td><div><? echo $rs["num_id"]?>&nbsp;
                    </div></td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="228" class="bmText_1"><div> �ѹ��� <font color="#FF0000"></font></div></td>
                    <td class="bmText_1"><div><?=date_2($rs["date_receive"])?>&nbsp;
                    </div></td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr class="bmText_1">
                    <td><div>��ҹ���</div></td>
                    <td>
                     <div><? echo  $rs["shop_name"]//shop_id($rs["shop_id"])?>&nbsp;</div></td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr class="bmText_1">
                    <td width="228"><div> �Ըա������</div></td>
                    <td><div>
                      <? 
	if($rs["come_in"] =='0')echo '�����' ;
	else if($rs["come_in"] =='1')echo '�ش˹ع' ;
	else if($rs["come_in"] =='2')echo '��ԨҤ' ;
	else if($rs["come_in"] =='3')echo '�Թ���' ;
	else if($rs["come_in"] =='4')echo '����' ;
	?>&nbsp;
</div></td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr  class="bmText_1" height="25">
                    <td><div>������</div></td>
			
                    <td><div><?
			$query  ="select * from type where type_id =0 group by type_name order by t_id  ";
			$result=mysql_query($query);
			?><select name="type"  >
        <option value='0'>----------��س����͡----------</option>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[t_id];?>"
		<?
		if($rs["type_id"]== $d[t_id]) echo "selected";
		?>
		><? echo $d[type_name];?></option>
                        <? }?>
                      </select></div>
				</td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="228"  class="bmText_1"height="25"><div>���ͤ���ѳ��</div> </td>
                    <td  class="bmText_1"><div><input type="text"  id="rd_name" name="rd_name" size="60" maxlength="255" value="<? echo $rs["rd_name"]?>">                        
                    </div> 
                    </td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="228"  class="bmText_1" height="25"><div>�ӹǹ </div></td>
                    <td><div><input name="amount" type="text"   size="10" maxlength="7"  value="<? echo $rs["amount"]?>"></div>
</td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="228"  class="bmText_1" height="25"><div>�Ҥ�/˹���</div> </td>
                    <td><div><input name="price" type="text"  value="<? echo $rs["price"]?>" ></div>
                    </td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr  class="bmText_1">
                    <td  height="25"><div>˹���</div> </td>
                    <td><div><input name="unit" type="text"  value="<? echo $rs["unit"]?>"></div></td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr  class="bmText_1" height="25">
                    <td width="228"><div>�Ţ����ѳ�����</div></td>
                    <td width="505"><div><?=code($rs[rd_id])?>&nbsp;</div>
 </td>
 </tr>
   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr  class="bmText_1" height="25">
                    <td width="228"><div>����Ţ����ѳ��</div></td>
                    <td width="505"><div><input type="text" name="code1" size="8" onKeyUp="doNext(this);"  maxlength="3">
-
<input type="text" name="code2" size="8" onKeyUp="doNext(this);" maxlength="3" >
-
<input type="text" name="code3" size="8" onKeyUp="doNext(this);"  maxlength="2"> 
-
�Ţ����������
<input type="text" name="code4" size="8" ><br></div>
 </td>
 </tr>
   <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
 <tr>
                  <td width="228" class="bmText_1"height="25"><div>���� / �����ͼ������ͼ�Ե</div></td>
                    <td class="bmText_1"><div><input type="text"  id="brand_name" name="brand_name"  value="<? echo $rs["brand_name"]?>"size="50" maxlength="255"></div>                        
                     
                    </td>
                </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="228" class="bmText_1"height="25"><div>Ẻ / ��Դ / �ѡɳ�</div></td>
                    <td class="bmText_1"><div><input type="text"  id="type_name" name="type_name"  value="<? echo $rs["type_name"]?>"maxlength="255">      </div>                  
                     
                    </td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="228" class="bmText_1"height="25"><div>��ʴ��Ѻ��Сѹ�֧�ѹ��� </div></td>
                    <td class="bmText_1"><div><input name="endDate_garan" type="text" id="endDate_garan" value="<? if($rs[endDate_garan]<>'0000-00-00')   echo date_format_th($rs[endDate_garan]) //if($rs[endDate_garan] =='') echo date("d/m/Y") ;else echo date_format_th($rs[endDate_garan]);?>"  size="10" />
			
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('endDate_garan','DD/MM/YYYY')"   width='19'  height='19'>                   </div>
                     
                    </td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="228" class="bmText_1"height="25"><div>��ʴػ�Сѹ��������ѷ </div></td>
                    <td class="bmText_1"><div><input type="text"  id="garan_at" name="garan_at" size="50" value="<? echo $rs["garan_at"]?>"maxlength="255"></div>                        
                     
                    </td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr>
                    <td width="228" class="bmText_1"height="25"><div>�ѹ����Сѹ��ʴ� </div></td>
                    <td class="bmText_1"><div><input name="date_garan" type="text" id="date_garan" value="<?  if($rs[date_garan]<>'0000-00-00')   echo date_format_th($rs[date_garan]) //if($rs[date_garan] =='') echo date("d/m/Y") ;else echo date_format_th($rs[date_garan]);?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_garan','DD/MM/YYYY')"   width='19'  height='19'>  </div>                       
                     
                    </td>
                  </tr>
				    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value=" �ѹ�֡ "  onClick="return godel();"  >&nbsp;
                    <input type="reset" name="formbutton2" value="¡��ԡ" onClick="window.close();">    </td>
                </tr>
              </table>
              </td>
            </tr>
        </table></td>
      </tr>
  </table>

</form> 
</body>
</html>
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
function godel()
{
	if (confirm("�س��ͧ��úѹ�֡������ ���������"))
	{
		return true;
	}
		return false;
}

</script>
<?
function insert_code($rd_id,$code){
		$sql_add = "INSERT INTO code (rd_id,code) 
		VALUES('$rd_id','$code')";
		echo $sql_add."<br>";
		$result_add = mysql_query($sql_add); 

}


?>


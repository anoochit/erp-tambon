
<? 
session_start();
?>
<?	

if($del =='del'){
	unset($dd[$array1]); 
	session_unregister("dd[$array1]");
	echo "<meta http-equiv='refresh' content='0; url=?action=new_buy_p'>";
}

if($savess2 <>''){
if(check_paper($paper_id) <=0){
		$r_id = find_maxid();
		$sql_r = "INSERT INTO receive (r_id,num_id,shop_id,date_receive,come_in , paper_id,type ) 
		VALUES('$r_id','$num_id','$shop_id','".date_format_sql($date_receive)."','$come_in' , '$paper_id' ,'1')";
		$result_r = mysql_query($sql_r);
	for($o=0;$o<=$pointer_array;$o++){
		$data = explode("^", $dd[$o]); 
		if($data[1]<>''){
				$rd_id1 = find_max_rd_id($r_id);
				$sql_add = "INSERT INTO receive_detail (r_id , rd_id , type_id , rd_name , amount , price , unit , brand_name , type_name , endDate_garan , garan_at , date_garan,remark ) 
				VALUES('$r_id','$rd_id1','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]' ,'$data[6]' ,'$data[7]' ,
				'".date_format_sql($data[8])."','$data[9]' ,
				'".date_format_sql($data[10])."' ,'$data[11]' )";
				$result_add = mysql_query($sql_add); 
				unset($dd[$o]); 
				session_unregister("dd[$o]");
				

			}
		}
	unset($seri); 
	session_unregister("seri");
	echo " <center><br><br>�к����ѧ�ѹ�֡������ ��س����ѡ����  <br><br>";
	echo "<meta http-equiv='refresh' content='1; url=?action=view_detail_1_p&r_id=$r_id'>";
	echo "</center>";
	}else{
	echo " <center><br><br>����¹�͡��ë�� <br><br>";
	echo "</center>";
	}
}

if($btnSub <>''){ 
	unset($data); 
	session_unregister("data");
	
	unset($dd); 
	session_unregister("dd");
	
	unset($pointer_array); 
	session_unregister("pointer_array");
	
	unset($seri); 
	session_unregister("seri");

}
if($OK <> '' ){
		session_register("seri");
		$seri = $num_id."~".$shop_id."~".$date_receive."~".$come_in."~".$paper_id."~".$product;
	}else{	
		$seri = explode("~",$_SESSION[seri]);
		$num_id =$seri[0];
		$shop_id = $seri[1];
		$date_receive =$seri[2];
		$come_in =$seri[3];
		$paper_id =$seri[4];
		$product =$seri[5];
		 $seri = $seri[0]."~".$seri[1]."~".$seri[2]."~".$seri[3]."~".$seri[4]."~".$seri[5]; 
	}
?>

<title>��觢ͧ</title>
<script type="text/javascript" src="myAjax.js" ></script>
<script language="javascript">
	var CompleteDataUrl ="completeData.php";
	function getHint(){
		var param = "product=" + document.getElementById("product").value;
		postDataReturnText(CompleteDataUrl,param,displayHint);
		
	}
 	function displayHint(text){
		document.getElementById("hint").innerHTML = text;
	}
	function populateName(text){
		var r;
		var ret = text;
		
		r =ret.split('@')
		document.getElementById("shop_id").value = r[0];
		document.getElementById("product").value = r[1];
		document.getElementById("hint").innerHTML = '';
	}
</script>
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} 
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} 
   try { return new XMLHttpRequest();          } catch(e) {} 
   alert("XMLHttpRequest not supported");
   return null;
};

function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; 
               } 
          }
     };
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); 
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
     req.send(null); 
}

</script>
<script language="JavaScript" type="text/JavaScript">
	
function del_confirm(num)
{
	var x=window.confirm("��ͧ���ź���ͤ���ѳ�������͡ ���������");
	return (x);
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="default.css">
<body  >

<form name="f12" method="post"  action="#"  >
<br>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center"    >
  <tr>
    <td align="center" colspan="2" style="border: #66CCFF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		����¹��ѧ�������Ѿ��	</td>
	</tr>
</table></td>
</tr>
</table>
<br>
        <table  border="0" cellpadding="1" cellspacing="1"  width="68%" align="center">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="85%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr class="lgBar">
	  		  <td  height="25" >&nbsp; ����¹��ѧ�������Ѿ��</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="650">
			  <tr class="bmText">
			    <td>����¹�Ţ����Ѻ</td>
			    <td width="505">
				
			      <input name="paper_id" type="text"  value="<?=$paper_id?>" size="20" maxlength="50">				  </td>
		      </tr>
			  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr>
                <td width="138" class="bmText"> �ѹ���������Է���</td>
                <td><input name="date_receive" type="text" id="date_receive" value="<? if($date_receive =='') echo date("d/m/Y") ;else echo $date_receive;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive','DD/MM/YYYY')"   width='19'  height='19'>  </td>
              </tr>
			  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr>
	<td width="138" class="bmText">
		�Ըա������</td>
	<td>
	  <select name="come_in">
	  <option value='' <? if($come_in =='') echo "selected"?>>----------��س����͡----------</option>
	  <option value='0' <? if($come_in =='0') echo "selected"?>>�����</option>
	  <option value='1' <? if($come_in =='1') echo "selected"?>>�ش˹ع</option>
	    <option value='2' <? if($come_in =='2') echo "selected"?>>��ԨҤ</option>
		  <option value='3' <? if($come_in =='3') echo "selected"?>>�Թ���</option>
	  <option value='4' <? if($come_in =='4') echo "selected"?>>����</option>
		</select></td>
</tr>      
            </table></td>
			</tr>
		</table>

	</td>
</tr>
</table>
<? //if($OK <>''){ ?>
<br><center>

<a href="#" onClick="javascript:popup('add_new_p.php?action=add&OK=OK','',750,300);">������¡��
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
											  <table width="100%" align="center" cellspacing="1" border="0" style="border-collapse:collapse;">
                                                <tr class="bmText"  bgcolor="#C1E0FF">
 
                                                  <td width="14%" height="30" align="center" style="border: #000000 1px solid;">������</td>
                                                  <td width="20%"  align="center" style="border: #000000 1px solid;">������ѧ�������Ѿ��</td>
												
                                                  <td width="14%"   align="center" style="border: #000000 1px solid;">�Ҥ� / ˹���</td>
											      
                                                  <td width="19%"  align="center" style="border: #000000 1px solid;">������ ��Դ Ẻ ��Ҵ</td>
											      <td width="17%"  align="center" style="border: #000000 1px solid;">���Шӷ��</td>
												  <td width="11%"  align="center" style="border: #000000 1px solid;">�����˵�</td>
                                                  <td width="5%"  align="center" style="border: #000000 1px solid;">&nbsp;</td>
                                                </tr>
                                                <?






for($m=0;$m<=$pointer_array;$m++){
	$data = explode("^", $dd[$m]); 
if($data[1]  <>""){
		 ?>
                                                <tr bgcolor="#e8edff">
                                                  <td style="border: #000000 1px solid;" align="left"><font size="2">&nbsp;<? echo fild_type($data[0]); ?></font></td>
                                                  <td style="border: #000000 1px solid;"><font size="2">&nbsp;<? echo $data[1]; ?>
	 <input  type="hidden" name='chk[<?=$i?>]' value="<? echo $data[1]?>"></font></td>
                                                 
                                                  <td style="border: #000000 1px solid;"  align="right"><font size="2"><? echo number_format($data[3],2);  ?>&nbsp;</font></td>
                                             
                                                 <td style="border: #000000 1px solid;"  align="left"><font size="2">&nbsp;<? 
	echo $data[6];

												  ?></font></td>
												  <td style="border: #000000 1px solid;"  align="left"><font size="2">&nbsp;<? 
	echo $data[9];

												  ?></font></td>
												  <td style="border: #000000 1px solid;"  align="left"><font size="2">&nbsp;<? 
	echo $data[11];

												  ?></font></td>
                                                  <td align="center" style="border: #000000 1px solid;"><font size="2"><a  href="?action=new_buy_p&del=del&array1=<?=$m?>" onClick="return godel();">
                                                     <img src="images/Delete.png" border="0" /> </a></font></td>
                                                </tr>
                                                <? 

	}
}
?><input  type="hidden"  name="total" value="<?=$m?>">
                                                <tr>
                                                  <td colspan="7" align="center"  height="32" style="border: #000000 1px solid;"><font face="MS Sans Serif">
<input type="submit" name="savess2" value=" �׹�ѹ��õ�Ǩ�Ѻ "  onClick="return validate();" class="buttom">
                                                  &nbsp; 
<input name="btnSub"  type="submit" value=" ¡��ԡ " onClick="return q_cencel()" class="buttom">
                                                 
                                                  &nbsp;</font> </td>
                                                </tr>
                                              </table></td>
                                            </tr>
            </table> 
                    </td>
                                            </tr>
  </table>
<? //}?>
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
	if (confirm("�س��ͧ���ź������ ���������"))
	{
		return true;
	}
		return false;
}


function q_cencel()
{
	if (confirm("�س��ͧ���¡��ԡ ���������"))
	{
		return true;
	}
		return false;
}

</script>

<script language="JavaScript" type="text/javascript">
	function validate(theForm) 
	{
		  if (  document.f12.paper_id.value=='' || document.f12.paper_id.value==' ' )
           {
           alert("��سҡ�͡����¹�Ţ����Ѻ");
           document.f12.paper_id.focus();           
           return false;
           }
		    if (  document.f12.date_receive.value=='' || document.f12.date_receive.value==' ' )
           {
           alert("��سҡ�͡ �ѹ���������Է���");
           document.f12.date_receive.focus();           
           return false;
           }
		    if (  document.f12.come_in.value=='' || document.f12.come_in.value==' ' )
           {
           alert("��سҡ�͡����駺");
           document.f12.come_in.focus();           
           return false;
           }
		   if (confirm("�س��ͧ��úѹ�֡������ ���������")){
				return true;
			}else{
				 return false;
			}
	}
</script>
<script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script> 


<?
function insert_code($rd_id,$code){
		$sql_add = "INSERT INTO code (rd_id,code) 
		VALUES('$rd_id','$code')";
		$result_add = mysql_query($sql_add); 

}
function find_maxid() {
	
		$sql = "Select max(r_id) as max  from receive ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ 
			$r_id = "1";
		} else{
			$r_id =  $max + 1; 
		}
		return $r_id;
	}
	
	function find_max_rd_id($r_id) {
	
		$sql = "Select max(rd_id) as max  from receive_detail  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ 
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1; 
		}
		return $rd_id;
	}
	function check_product_1($product){
		$sql = "Select *  from product  where pro_name ='$product' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[pro_name];
}
	function check_paper($paper_id){
		$sql = "Select *  from receive  where paper_id = '$paper_id' and type = 1 ";
		$result = mysql_query($sql); 
		$recn=mysql_num_rows($result);
		return $recn;
}

?>

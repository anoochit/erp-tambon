<? 
session_start();
?>
<?	
if($del =='del'){
	unset($dd[$array1]); 
	session_unregister("dd[$array1]");
	echo "<meta http-equiv='refresh' content='0; url=?action=new_buy'>";
}


if($formbutton2 <>''){
	unset($seri); 
	session_unregister("seri");

}
	
if($btnSub <>''){ // ¡��ԡ
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
		$seri = $num_id."~".$shop_id."~".$date_receive."~".$come_in."~".$paper_id."~".$product."~".$remark;
	}else{	
		$seri = explode("~",$_SESSION[seri]);
		$num_id =$seri[0];
		$shop_id = $seri[1];
		$date_receive =$seri[2];
		$come_in =$seri[3];
		$paper_id =$seri[4];
		$product =$seri[5];
		$remark=$seri[6];
		 $seri = $seri[0]."~".$seri[1]."~".$seri[2]."~".$seri[3]."~".$seri[4]."~".$seri[5]."~".$seri[6]; 
	}
?>

<title>��觢ͧ</title>
<script type="text/javascript" src="myAjax.js" ></script>
<script language="javascript">
	var CompleteDataUrl ="completeData.php";
	//���Ҥ������§
	function getHint(){
		var param = "product=" +  document.f166.product.value ;
		postDataReturnText(CompleteDataUrl,param,displayHint);
		
	}
	//�ʴ����Ѿ���ä���
 	function displayHint(text){
		document.getElementById("hint").innerHTML = text;
	}
	function populateName(text){
		var r;
		var ret = text;
		
		r =ret.split('@')
		 document.f166.shop_id.value = r[1];
		 document.f166.product.value = r[0];
		document.getElementById("hint").innerHTML = '';
	}
</script>
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

//dochange �ж١���¡������ա�����͡ ���ͤ���ѳ�� Combobox ��觨з��������¡ AJAX ������ͧ�͢����ŶѴ仨ҡ Server
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //�Ѻ��ҡ�Ѻ��
               } 
          }
     };
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
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
<form name="f166" method="post"  action="?action=new_buy"   >

<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
        <td colspan="2" align="center"  style="border: #7292B8 1px solid;">
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		����¹�Ѻ��ʴ�</td>
	</tr>
</table></td>
</tr>
</table>
<br>
        <table  border="0" cellpadding="1" cellspacing="1"  width="76%" align="center">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="85%" border="0" cellspacing="1" cellpadding="1">
 		 	<tr >
	  		  <td  height="25" class="lgBar">&nbsp; ���觢ͧ</td>
  			</tr>
			<tr>
			<td><table name="add" cellpadding="1" cellspacing="1" border="0"  width="556">
 
			  <tr class="bmText">
			    <td height="28">��觢ͧ���</td>
			    <td width="397">
			      <input name="num_id" type="text" id="num_id" value="<?=$num_id?>" size="20" maxlength="50">	   </td>
		      </tr>
			     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
			    <td height="28">����¹�Ţ����Ѻ</td>
			    <td width="397">
				<? 
					$year  = substr((date("Y") + 543),2);
					$paper_id = check_paper_id($year,$_SESSION[div_id]);
				?>
			      <input name="paper_id" type="text"  value="<?=$paper_id?>" size="20" maxlength="50">				  </td>
		      </tr>
			     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
			  <tr class="bmText">
                <td height="28">�ҡ��ҹ</td>
				
                <td height="28">
		
				  <input type="text" name="shop_id" size="60" value="<?=$shop_id?>" >
				   </td>
              </tr>
			     <tr><td colspan="2" background="images/hdot2.gif"> </td>
			     </tr>
			  <tr>
                <td width="152" height="28" class="bmText"> �ѹ����Ѻ</td>
                <td height="28"><input name="date_receive" type="text" id="date_receive" value="<? if($date_receive =='') echo date("d/m/Y") ;else echo $date_receive;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('date_receive','DD/MM/YYYY')"   width='19'  height='19'>  </td>
              </tr>      
			     <tr><td colspan="2" background="images/hdot2.gif"> </td>
			     </tr>
			  <tr>
                <td width="152" height="28" class="bmText"> �����˵�</td>
                <td height="28"><textarea cols="50" rows="3" name="remark"><?=$remark?></textarea>
 </td>
              </tr>
			     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value="��ŧ"   onClick="return check(this)" class="buttom">&nbsp;&nbsp;
                    <input   type="button" name="formbutton2" value="¡��ԡ" class="buttom">    </td>
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
	//------------------------------function  ����Ҩҡ form-------------------------
	function check(theForm) 
	{
		       if (  document.f166.shop_id.value=='' || document.f166.product.value==' ' )
           {
           alert("��سҡ�͡������ҹ��� ���� - ");
           document.f166.shop_id.focus();           
           return false;
           }
		    if (  document.f166.date_receive.value=='' || document.f166.date_receive.value==' ' )
           {
           alert("��سҡ�͡�ѹ��� ���� / ��ҧ / ����");
           document.f166.date_receive.focus();           
           return false;
           }
				return true;

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
		if($max == NULL or $max == ''){ //�����ҧ
			$r_id = "1";
		} else{
			$r_id =  $max + 1; //gene ��� 
		}
		return $r_id;
	}
	
	function find_max_rd_id($r_id) {
	
		$sql = "Select max(rd_id) as max  from receive_detail  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //�����ҧ
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1; //gene ��� 
		}
		return $rd_id;
	}
	function check_product_1($product){
		$sql = "Select *  from product  where pro_name ='$product' ";
		$result = mysql_query($sql); 
		$recn=mysql_fetch_array($result);
		return $recn[pro_name];
}
	function check_paper($num_id,$paper_id,$div_id){
		$sql = "Select *  from receive  where (num_id = '$num_id' or paper_id = '$paper_id') and div_id ='$div_id' ";
		$result = mysql_query($sql); 
		$recn=mysql_num_rows($result);
		return $recn;
}
function check_paper_id($year,$div_id){
		$sql = "Select *  from receive  where paper_id like '%$year%' and  div_id ='$div_id' order by abs(mid(paper_id,4)) desc  limit 1  ";
		$result = mysql_query($sql); 
		$arr=mysql_fetch_array($result);
		$aa = explode("/",$arr[paper_id]);
		return $year."/".($aa[1] + 1);
}
?>

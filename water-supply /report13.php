<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
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
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}
</script>
<form name="f12" method="post"  action=""   >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
if($result1)
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#ffffff';
?>
 <? 
	}
?>
  </table>
  <table  width="95%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" >
<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
<tr class="header" bgcolor="#DEE4EB">
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;��§ҹ��ª��ͼ��¡��ԡ���ӻ�л� ��Ш���͹  <?=mounth3($month)?>&nbsp;<?=$year?></div></td>
        </tr>
  <tr class="body1"  bgcolor="#DEE4EB">
        <td width="8%"  height="31" align="center"><strong>�Ţ����¹</strong></td>
		<td width="24%"  height="31" align="center"><strong>���� - ʡ��</strong></td>
		<td width="7%"  align="center"><strong>��ҹ�Ţ���</strong></td>
		 <td width="4%"  align="center"><strong>������</strong></td>
		 <td width="16%"  align="center"><strong>��</strong><strong>���ҹ</strong></td>
		<td width="15%"  height="31" align="center"><strong>ࢵ</strong></td>
         <td width="13%"  align="center"><strong>�Ţ������</strong></td>
		 <td width="13%"  align="center"><strong>�ѹ������ش��</strong></td>
	    </tr>
<?
$sql_1 =" Select  q.MCODE,concat(pren,name,'  ',surn) as name,moo,q.mno,HNO1,
 HNO,if(c_date is null,'',c_date) as c_date,cmonth,cyear,honame,z_name,c_status
 ,c_date,cmonth,cyear,honame,z_name,c_status
 from member m,q_water q ,cancel_reg c,house h ,zone z
 Where q.mem_id = m.mem_id and q.MCODE = c.MCODE and q.hocode = h.hocode
 and q.pvcode = h.pvcode and q.amcode = h.amcode
 and q.tucode = h.tucode and h.hocode = z.hocode and mid(q.MCODE,3,1) = z_id ";
 $ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
if($month  <> '' ) $sql_1 .=  " and mid(c_date,6,2) = '".$month."'  and  mid(c_date,1,4) = '".($year-543)."'  ";
 if($HOCODE  <> ""){ 	$sql_1.=" and q.HOCODE = '".$HOCODE."'  "; }
 if($z_id <>'') $sql_1 .=  " and mid(q.MCODE,3,1) = '".$z_id."' ";
$sql_1.=" order by MCODE ";
$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$result_1= mysql_query($sql_1);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result_1);
if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;
$Num_Pages = (int)$Num_Pages;
if(($Page>$Num_Pages) || ($Page<0))
print "<center><b>�ӹǹ $Page �ҡ���� $Num_Pages �ѧ����բ�ͤ���<b></center>";
$result_1 = mysql_query($sql_1);
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
$total  = 0;
$total_qty = 0;
$total_total= 0;
$total_Find_Remain = 0;
$total_all = 0;
$total_Find_SumPay = 0;
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total_qty = $total_qty + $rs_1[qty];
	$total_total  = $total_total  + $rs_1[TOTAL];
?>       
<tr class="body1" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
  <td  height="25"  align="center">&nbsp;<?
 if ($rs_1[HNO1]==""or $rs_1[HNO1]=="-") { 
 echo $rs_1[HNO];
 }elseif ($rs_1[HNO]=="0"){ 
 echo "";
 }else{ 
 echo $rs_1[HNO]."/".$rs_1[HNO1];}
 ?></td>
 <td > <div align="center">&nbsp;<? echo $rs_1[moo];?></div></td>
  <td > <div align="left">&nbsp;<? echo $rs_1[honame];?></div></td>
 <td > <div align="left">&nbsp; <? echo ($rs_1[z_name]);  ?></div></td>
  <td > <div align="left">&nbsp; <? echo ($rs_1[mno]);  ?></div></td>
  <td > <div align="center">&nbsp; <? echo date_2($rs_1[c_date]);  ?></div></td>
 </tr>
 <? 
	}
?>
      </table>
<table  width="100%"   border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666">	  
<tr  width='70%' class="body1"  bgcolor="#DEE4EB">
<td  height="25"  align="left"><strong>&nbsp;&nbsp;�ӹǹ����¡��ԡ :: &nbsp; <?=$i ?> &nbsp; ���</strong></td>
</tr>
</table>	
	  </td>
    </tr>
 </table>
</form>
</body>
</html>

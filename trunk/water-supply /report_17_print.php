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
<body>
<form name="f12" method="post"  action=""   >
<?
$sqlM="select honame  from house  where hocode = ".$HOCODE." "; 
$resultM = mysql_query($sqlM);
if ($resultM)
$rsM=mysql_fetch_array($resultM) ;
$honame = $rsM[honame];
if($z_id <>'') {
$sqlZ="select z_name  from zone  where hocode = ".$HOCODE." and z_id = ".$z_id." "; 
$resultZ = mysql_query($sqlZ);
if ($resultZ)
$rsZ=mysql_fetch_array($resultZ) ;
		$Zname = "  ࢵ : ".$z_id." ".$rsZ[z_name];
}else{
		$Zname = "";
}
?>
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td align="center" colspan="2" >
<table width="100%" border="0">
	<tr align="left">
	<td  class="header" height="25"  >
		<div ><b>��§ҹ �. 17 &nbsp;������ : <?=$HOCODE." " .$honame?><?=$Zname?>&nbsp;��Ш���͹ : <?=mounth3($month)?>&nbsp;<?=$year?></b></div>	</td>
	</tr>
</table></td>
</tr>
</table>

	  </td>
    </tr>
  </table>
<?
if($month  <> '' and $month <=9 ){
$p_date_1 = ($year-543)."-".$month."-"."31";
$YY=$year;
}else{
$p_date_1 = (($year-1)-543)."-".$month."-"."31";
$YY=$year-1;
}
$sql_2="Select  q.MCODE,concat(pren,name,'  ',surn) as name,moo,HNO1,HNO,if(total is null,'',total) as total,
if(sum_m is null,'',sum_m)as sum_m,if(rec_id is null,'',rec_id) as rec_id,if(amount is null,'',amount)as amount 
,if(m2.m_date is null,'',m2.m_date) as m_date,if(vat is null,'',vat)as vat,rec_date,amount , p_date,
if(m_rate is null,'',m_rate)as m_rate,if(m_amt is null,'',m_amt)as m_amt,q.mno as m_meter,m2.mno as m_new
 from (member m,q_water q) left join meter m2 on q.MCODE = m2.MCODE 
 where q.mem_id = m.mem_id  ";
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
if($month  <> '' ) $sql_2 .=  " and monthh =".$monthh." and  myear = '" .$year. "' ";
if($HOCODE <>'') $sql_2 .=  " and  q.HOCODE = '".$HOCODE."' ";
if($z_id <>'') $sql_2 .=  " and mid(q.MCODE,3,1) = '".$z_id."' ";
$sql_2.=" group by q.MCODE order by MCODE ";
$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$result_2= mysql_query($sql_2);
$Page_start = ($Per_Page*$Page)-$Per_Page;
if($result_2)
$Num_Rows = mysql_num_rows($result_2);
if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;
$Num_Pages = (int)$Num_Pages;
if(($Page>$Num_Pages) || ($Page<0))
print "<center><b>�ӹǹ $Page �ҡ���� $Num_Pages �ѧ����բ�ͤ���<b></center>";
$result_2 = mysql_query($sql_2);
?>  
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" >
<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1">
<tr class="header">
      <td  height="28" colspan="19"><div  align="left">&nbsp;&nbsp;��ػ��§ҹ��Ш���͹</div></td>
          </tr>
  <tr class="body1"  bgcolor="#DEE4EB">
        <td width="5%"  height="31" align="center"><strong>���</strong></td>
		<td width="13%"  height="31" align="center"><strong>���� - ʡ��</strong></td>
		<td width="6%"  height="31" align="center"><p><strong>��ҹ�Ţ���</strong></p>		  </td>
         <td width="5%"  align="center"><p><strong>�Ţ���</strong></p>
           <p><strong>�����</strong></p></td>
		 <td width="5%"  align="center"><strong>�Ţ�ҵ�</strong></td>
		 <td width="4%"  align="center"><strong>�ҡ</strong></td>
         <td width="5%"  align="center"><p><strong>�֧</strong></p>           </td>
    	 <td width="6%"  align="center"><p><strong>�ӹǹ<p>˹���</p></strong><strong></strong></p>      </td> 
		 <td width="6%"  align="center"><p><strong>�Դ���Թ</strong><strong></strong></p>	    </td> 
	     <td width="5%"  align="center"><strong><p>���� </p>7% </strong></td> 
		 <td width="5%"  align="center"><p><strong>��Һ�ԡ��</strong></p>		    </td> 
		 <td width="6%"  align="center"><p><strong>������Թ</strong><strong></strong></p>		    </td> 
		 <td width="5%"  align="center"><p><strong>����ҧ</strong></p>
		  <p><strong>¡��</strong></p></td> 
		<td width="5%"  align="center"><p><strong>���</strong><strong></strong></p>	    </td> 
		<td width="7%"  align="center"><strong>�ѹ������ </strong></td> 
		<td width="6%"  align="center"><strong><p>�ӹǹ�Թ</p>������</strong>		    </td> 
		<td width="6%"  align="center"><strong><p>����ҧ</p>¡�</strong><strong></strong>		    </td> 
          </tr>
<?
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
$total_Find_SumRemain = 0;
if($result_2)
while($rs_2=mysql_fetch_array($result_2)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total_qty  = $total_qty  + $rs_2[amount];
	$total_total  = $total_total  + $rs_2[m_amt];
	$total_vat  = $total_vat  + $rs_2[vat];
	$total_m_amt  = $total_m_amt  + $rs_2[m_amt];
	$total_sum_m  = $total_sum_m  + $rs_2[sum_m];
	$total_Find_Remain  = $total_Find_Remain  +  Find_Remain($rs_2[MCODE],$YY,$month,$year);
	$total_all = $total_all  + $rs_2[sum_m] + Find_Remain($rs_2[MCODE],$YY,$month,$year);
	$total_Find_SumPay  = $total_Find_SumPay  +  Find_SumPay($rs_2[MCODE],$YY,$month);
	$total_Find_SumRemain  = $total_Find_SumRemain  +  ($rs_2[sum_m] + Find_Remain($rs_2[MCODE],$YY,$month,$year)  - Find_SumPay($rs_2[MCODE],$YY,$month));
?>       
<tr class="body1" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
   <td  height="25"  align="center">&nbsp;<? echo $rs_2[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_2[name]; ?></td>
  <td  height="25"  align="center">&nbsp;
    <?
 if ($rs_2[HNO1]==""or $rs_2[HNO1]=="-") { 
 echo $rs_2[HNO];
 }elseif ($rs_2[HNO]=="0"){ 
 echo "";
 }else{ 
 echo $rs_2[HNO]."/".$rs_2[HNO1];}
 ?></td>
 <td  align="center">&nbsp;<?=$rs_2[rec_id]?></td>
 <td  align="center">&nbsp;<?=$rs_2[m_meter]?></td>
 <td align="center">&nbsp;<?=$rs_2[m_new]-$rs_2[amount]?></td>
 <td align="center">&nbsp;<?=$rs_2[m_new]?></td>
 <td align="center">&nbsp;<?=number_format($rs_2[amount])?></td>
 <td align="center" >&nbsp;<?=number_format($rs_2[total])?></td>
 <td align="center">&nbsp;<?=number_format($rs_2[vat],2)?></td>
 <td align="center">&nbsp;<?=number_format($rs_2[m_amt])?></td>
 <td align="center">&nbsp;<?=number_format($rs_2[sum_m],2)?></td>
 <td align="center">&nbsp;<?
 if (Find_Remain($rs_2[MCODE],$YY,$month,$year) == 0) {
 echo "";
 }else{
  echo number_format(Find_Remain($rs_2[MCODE],$YY,$month,$year),2);
   }?></td>
 <td align="center">&nbsp;<? echo  number_format($rs_2[sum_m] + Find_Remain($rs_2[MCODE],$YY,$month,$year),2)?></td>
 <td align="center">&nbsp;<?
  if((Find_DatePay($rs_2[MCODE],$YY,$month) !='1111-11-11') and (Find_DatePay($rs_2[MCODE],$YY,$month) !=''))  {
  echo date_2(Find_DatePay($rs_2[MCODE],$YY,$month)); 
  }else{
   echo "" ;
   } ?></td>
 <td align="center">&nbsp;<?
 if (Find_SumPay($rs_2[MCODE],$YY,$month)<=0) {
 	echo "";
}else{
  echo number_format(Find_SumPay($rs_2[MCODE],$YY,$month),2); 
}  
   ?></td>
 <td align="center" >&nbsp;<? 
 if (($rs_2[sum_m] + Find_Remain($rs_2[MCODE],$YY,$month,$year)  - Find_SumPay($rs_2[MCODE],$YY,$month))<=0) {
 	echo "";
}else{
 echo number_format(($rs_2[sum_m] + Find_Remain($rs_2[MCODE],$YY,$month,$year)  - Find_SumPay($rs_2[MCODE],$YY,$month)),2);
 }
 ?></td>
 </tr>
 <? 
}
?>
<tr class="body1"  bgcolor="#DEE4EB">
<td  height="25"  align="center"><strong>���</strong></td>
<td  height="25"   align="center">&nbsp;<?=$i?> <strong>��¡��</strong></td>
<td  height="25"  align="center">&nbsp;</td>
 <td  align="center">&nbsp;</td>
 <td  align="center">&nbsp;</td>
 <td >&nbsp;</td>
 <td >&nbsp;</td>
 <td  align="center">&nbsp;<?=number_format($total_qty) ?></td>
 <td  align="center">&nbsp;<?=number_format($total_total)?></td>
 <td align="center" >&nbsp;<?=number_format($total_vat)?></td>
 <td  align="center">&nbsp;<?=number_format($total_m_amt)?></td>
 <td  align="center">&nbsp;<?=number_format($total_sum_m)?></td>
 <td align="center" >&nbsp;<?=number_format($total_Find_Remain,2)?></td>
 <td align="center">&nbsp;<?=number_format($total_all,2)?></td>
 <td >&nbsp;</td>
 <td  align="center">&nbsp; <?=number_format($total_Find_SumPay,2)?></td>
 <td align="center" >&nbsp;<?=number_format($total_Find_SumRemain,2)?></td>
 </tr>
        </table>
	  </td>
    </tr>
  </table>
</form>
</body>
</html>
<?
function Find_Remain($mcode,$YY,$month,$year){
		$p_date_1 = ($YY-543)."-".$month."-"."31";
        $sql =  "select sum(sum_m)as total  from meter m  where mcode = '".$mcode."' and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = '��ҧ����' ) or  p_date >'".$p_date_1."' ) and  ";
		$ex = substr($month,0,1);
		if($ex =='0') $monthh = substr($month,1);	
		else $monthh = $month;	 
		if($month  <> '' and $monthh <=8 ){		 
				$sql .=  " ((myear =  '".$year. "' and monthh <  ".$monthh.")  or (myear =  '" .$year. "' and monthh >= 10 and monthh <=12) ";
		}elseif($month  <> '' and $monthh > 8 ){	
				$sql .=  "  and ((myear =  '".$year. "'  and monthh >= 10 and monthh < ".$monthh.") ";
		}
		$sql .=  " or myear <  '".$year. "')  ";
		$sql .=  " group by mcode  order by rec_date, mcode ";
		$result = mysql_query($sql);
		if($result)
		$rs_1=mysql_fetch_array($result);
		return $rs_1[total];
}
function Find_SumPay($mcode,$year,$month){
		$p_date_1 = ($year-543)."-".$month."-"."31";
		if($month == 12){ 	// �������͹�ѹ�Ҥ�
				$MMM = ($year - 542) . "-01-%"; 
		}else  {
				$MMM = ($year - 543). "-";
				if(strlen(($month+1)) == 1 ) $MMM .= "0".($month+1);
				else $MMM .= $month+1;
				 $MMM .= "-%";
		}
		 // �������͹���� �ǡ�ա 1 ���͹����͹�Ѵ�
        $sql =  "select mcode,mid(p_date,1,7),sum(sum_m) as T,p_date from meter m 
            where p_date like '" .$MMM ."' and mcode = '" .$mcode. "' and rec_status is not null and rec_status <> '¡��ԡ' 
			group by mid(mcode,1,2) order by mcode   ";
		$result = mysql_query($sql);
		if($result)
		$rs_1=mysql_fetch_array($result);
		return $rs_1[T];
}
function Find_DatePay($mcode,$year,$month){
		$p_date_1 = ($year-543)."-".$month."-"."31";
		if($month == 12){ 	// �������͹�ѹ�Ҥ�
				$MMM = ($year - 542) . "-01-%"; 
		}else  {
				$MMM = ($year - 543). "-";
				if(strlen(($month+1)) == 1 ) $MMM .= "0".($month+1);
				else $MMM .= $month+1;
				 $MMM .= "-%";
		}
		 // �������͹���� �ǡ�ա 1 ���͹����͹�Ѵ�
        $sqlD =  "select mcode,p_date from meter m 
            where p_date like '" .$MMM ."' and mcode = '" .$mcode. "' and rec_status is not null and rec_status <> '¡��ԡ' 
			group by mid(mcode,1,2) order by mcode   ";
		$resultD = mysql_query($sqlD);
		if($resultD)
		$rs_D=mysql_fetch_array($resultD);
		return $rs_D[p_date];
}
?>
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
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  </table>
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  </table>
  <?
$p_date_1 = ($year2-543)."-".$month."-"."31"; 
$sql_1="select r.mcode, concat(pren,name,' ',surn) as name1, concat(hno,'/',hno1) as addr1, HNO,HNO1,rec_id, total, rec_date,r.monthh ,r.myear  ,  amt_1
            from m_bin b, member m, receive r  where r.mcode = b.mcode and b.mem_id = m.mem_id 
            and mid(r.mcode,1,2) = '" .$hocode."' and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = '��ҧ����' ) 
            or  p_date >'".$p_date_1."' ) and ";
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
				if ($month2 == '10' or $month2 == '11' or $month2 == '12' ) {
							$Yr = ($year2+1);
				}else{
							$Yr = ($year2);
				}		

		if($month  <> '' and $monthh <=9 ){		 
            $sql_1.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
		}elseif($month  <> '' and $monthh >9 ){	
            $sql_1.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
		}
if($month  <> '' ) $sql_1 .=  " or myear < '" .$year. "' ";
 $sql_1 .=  "  )  and monthh = ".$month2."  and  myear = '".$Yr."' order by rec_date, r.mcode   ";	
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
?>
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" >
<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
<tr class="header">
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;�����ź�Ť�ҧ���� ������   <?=$hocode."    " .$honame?>   ��Ш���͹&nbsp;
        <?=mounth3($month)."  ".$year?>
      </div></td>
          </tr>
  <tr class="body1"  bgcolor="#DEE4EB">
        <td width="7%"  height="31" align="center"><strong>���</strong></td>
		<td width="10%"  height="31" align="center"><strong>�Ţ����¹</strong></td>
		<td width="23%"  height="31" align="center"><p><strong>���� - ʡ��</strong></p>		  </td>
         <td width="8%"  align="center"><strong>��ҹ�Ţ���</strong></td>
		 <td width="10%"  align="center"><strong>�Ţ�����</strong></td>
		 <td width="8%"  align="center"><strong>�ӹǹ�Թ</strong></td>
         <td width="17%"  align="center"><p><strong>�ѹ����͡</strong></p>
           <p><strong>�����</strong></p></td>
    <td width="9%"  align="center"><p><strong>��Ш���͹</strong><strong></strong></p>      </td> 
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
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total_qty  = $total_qty  + ($rs_1[total]/$rs_1[amt_1]);
	$total_total  = $total_total  + $rs_1[total];
?>       
<tr class="body1" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $i; ?></td>
 <td  height="25"   align="center">&nbsp;<? echo $rs_1[mcode]; ?></td>
 <td  height="25"  align="left">&nbsp;<? echo $rs_1[name1]; ?></td>
 <td  align="center">&nbsp;<?
   if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1]?></td>
 <td  align="center">&nbsp;<?=$rs_1[rec_id];  ?></td>
 <td > <div align="center">&nbsp;<? echo number_format($rs_1[total]);  ?> </div></td>
 <td > <div align="center">&nbsp; <? echo date_2($rs_1[rec_date]);  ?>   </div></td>
 <td > <div align="center">&nbsp;  <? echo mounth2($rs_1[monthh])." ".$year2;  ?> </div></td>
</tr>
 <? 
	}
?>
<tr class="body1"  bgcolor="#DEE4EB">
 <td  height="25"  align="center"><strong>���</strong></td>
  <td  height="25"   align="left">&nbsp;</td>
  <td  height="25"  align="center">&nbsp;</td>
   <td  align="center">&nbsp;</td>
 <td  align="center">&nbsp;</td>
 <td > <div align="center">&nbsp; <strong><?=number_format($total_total)?></strong></div></td>
 <td > <div align="center">&nbsp; </div></td>
 <td > <div align="center">&nbsp;</div></td>
 </tr>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center">
</center></div> 
</body>
</html>
<?
function Find_Remain($mcode,$year,$month){
		$p_date_1 = ($year-543)."-".$month."-"."31";
        $sql =  "select sum(total)as total  from receive m  where mcode = '".$mcode."' and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = '��ҧ����' ) or  p_date >'".$p_date_1."' ) and  ";
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

        $sql =  "select mcode,mid(p_date,1,7),sum(total) as T,p_date from receive m 
            where p_date like '" .$MMM ."' and mcode = '" .$mcode. "' and rec_status is not null and rec_status <> '¡��ԡ' 
			group by mid(mcode,1,2) order by mcode   ";
		$result = mysql_query($sql);
		$rs_1=mysql_fetch_array($result);
		return $rs_1[T];
}
?>
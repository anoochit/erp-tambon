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
<style type="text/css">
<!--
.header {
	color: #000000;
	font-size:14px;
	font-family: tahoma;
	font-weight: bold;
}
.body1{
	color: #000000;
	font-family: tahoma;
	font-size:13px;
}
-->
</style>
<body>
<form name="f12" method="post"  action=""   >
<table  width="80%"   border="0" align="center" cellpadding="0" cellspacing="0">
		<tr class="header" align="left" >
        <td  height="28" colspan="14"  ><u><div  align="left">&nbsp;<strong>��§ҹ(�.32)&nbsp;&nbsp;������ : <?=$HOCODE." " .$honame?>&nbsp;ࢵ : <?=$ZID." " .$Zname?>&nbsp;&nbsp;��Ш��ѹ��� <?=date_2($p_date)?></strong></div>
        </u>
		</td>
      </tr>
  </table>


  
  <table  width="80%"   border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  colspan="2"   >
	<br>
<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
<tr class="header">
      <td  height="28" colspan="14"><div  align="left">&nbsp;��§ҹ���բ�� / ��§ҹ�.32 [�ӹѡ�ҹ]</div></td>
          </tr>
  <tr class="body1"  bgcolor="#DEE4EB">
        <td width="12%"  height="31" align="center"><strong>�ӴѺ���</strong></td>
		<td width="16%"  height="31" align="center"><strong>�Ţ����¹</strong></td>
		<td width="21%"  height="31" align="center"><p><strong>�Ţ��������</strong></p>		  </td>
         <td width="15%"  align="center"><strong>�Թ������</strong></td>
		 <td width="15%"  align="center"><strong>�Թ�������</strong></td>
		 <td width="20%"  align="center"><strong>��Ш���͹</strong></td>
          </tr>
<?
$stotal1 = 0;
$i=0;

              	$sql2=" select myear, monthh,  mcode, rec_id, rec_date, sum_m, if(p_date='1111-11-11','-',p_date) as pdate  from meter
                   where  p_date like  '" .$p_date."' and mid(mcode,1,2) like '" .$HOCODE."' and mid(mcode,3,1) like '" .$ZID."' 
				   and  rec_id <> '' and rec_id is not null  and p_date <> '1111-11-11' and ";
				 $ex = substr($month,0,1);
				if($ex =='0') $monthh = substr($month,1);	
				else $monthh = $month;	 
				if ($rs_1[monthh] == '10' or $rs_1[monthh] == '11' or $rs_1[monthh] == '12' ) {
							$Yr = ($rs_1[myear]-1);
				}else{
							$Yr = ($year);
				}		
						if($month  <> '' and $monthh <=9 ){		 
							$sql2.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql2.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}
				 $sql2.=  " or myear < '" .$year. "') and rec_status is not null and rec_status <> '¡��ԡ' order by mcode,rec_id ";			
				$result2= mysql_query($sql2);
				while($rs2=mysql_fetch_array($result2)){
				$i++;
	     		if($i%2 ==0) $bg ='#e8edff';
				elseif( $i%2 ==1) $bg ='#ffffff';
				$stotal1 =$stotal1 + $rs2[sum_m];
?>       
<tr class="body1" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $i; ?></td>
 <td  height="25"   align="center">&nbsp;<? echo $rs2[mcode];?></td>
 <td  height="25"  align="center">&nbsp;<? echo $rs2[rec_id];?></td>
 <td  align="center">&nbsp;<?=number_format($rs2[sum_m],2);?></td>
 <td  align="center">&nbsp;<?=number_format($rs2[sum_m],2);?></td>
 <td  height="25"   align="center">&nbsp;
 <? if ($rs2[monthh] == '10' or $rs2[monthh] == '11' or $rs2[monthh] == '12' ) {
	 echo mounth3($rs2[monthh])."  ".($rs2[myear]-1); 
	}else{
	 echo mounth3($rs2[monthh])."  ".$rs2[myear]; 
	}		
 ?>
</td>

<? 
	}
?>

<tr class="body1"  bgcolor="#DEE4EB">
 <td  height="25"  align="center"><strong>������ </strong></td>
  <td  height="25"   align="center">&nbsp;
  <?
  if($i==0){ 
  echo "";
  }else{
  echo number_format($i)."  ���";
  }
  ?>
  
  </td>
  <td  height="25"  align="left"><div align="center"><strong>������Թ</strong></div></td>
   <td  align="center">&nbsp;<?=number_format($stotal1,2)?></td>
 <td  align="center">&nbsp;<?=number_format($stotal1,2)?></td>
 <td >&nbsp; </td>
 
 </tr>
        </table>
	  </td>
    </tr>
  </table>
  <br>
  <br>
  <br>
  <table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  </table>

  <table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  
  </table>
  
  <table  width="80%"   border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  colspan="2"   >
<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
<tr class="header">
      <td  height="28" colspan="14"><div  align="left">&nbsp;��§ҹ���բ�� / ��§ҹ�.32 [����]&nbsp;&nbsp;������ : <?=$HOCODE." " .$honame?>&nbsp;��Ш���͹ : <?=mounth3($month)?>&nbsp;<?=$year?></div></td>
          </tr>
  <tr class="body1"  bgcolor="#DEE4EB">
        <td width="10%"  height="31" align="center"><strong>�ӴѺ���</strong></td>
		<td width="13%"  height="31" align="center"><strong>�Ţ����¹</strong></td>
		<td width="18%"  height="31" align="center"><p><strong>�Ţ��������</strong></p>		  </td>
         <td width="15%"  align="center"><strong>�Թ������</strong></td>
		 <td width="17%"  align="center"><strong>�Թ�������</strong></td>
		 <td width="15%"  align="center"><strong>�Թ����ҧ����</strong></td>
         </tr>
<?
$Y=0;
$a=0;
$b=0;
$stotal2 = 0;
$stotal3 = 0;
$stotal4 = 0;

    $sql_1="select myear, monthh,  mcode, rec_id, rec_date, sum_m, p_date as pdate
                    from meter where  mid(mcode,1,2) like '" .$HOCODE."' and mid(mcode,3,1) like '" .$ZID."' 
                    and rec_status is not null and rec_status <> '¡��ԡ' 
                    and myear = '" .$year. "' and monthh = ".$monthh."
                    and (p_date like '1111-11-11' or  p_date >=  '" .$p_date."')  
                    order by mcode, rec_id";
$result_1 = mysql_query($sql_1);
while($rs_1=mysql_fetch_array($result_1)){
	if($Y%2 ==0) $bg ='#e8edff';
	elseif( $Y%2 ==1) $bg ='#ffffff';
	$stotal2 =$stotal2 + $rs_1[sum_m];
	$Y++;
?> 
<tr class="body1" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $Y; ?></td>
 <td  height="25"   align="center">&nbsp;<? echo $rs_1[mcode]; ?></td>
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[rec_id]; ?></td>
 <td  align="center">&nbsp;<?=number_format($rs_1[sum_m],2);  ?></td>
 <td  align="center">&nbsp;<?
 if($rs_1[pdate]<>'1111-11-11' and $rs_1[pdate]==$p_date) {
   echo number_format($rs_1[sum_m],2); 
   $stotal3 =$stotal3 + $rs_1[sum_m];
   $a++;
}else{ echo "-"; 
}
 ?></td>
  <td  align="center">&nbsp;<?
 if($rs_1[pdate]=='1111-11-11' or $rs_1[pdate]> $p_date) {
   echo number_format($rs_1[sum_m],2); 
   $stotal4 =$stotal4 + $rs_1[sum_m];
   $b++;
}else{ 
echo "-"; 
}
 ?></td>
 </tr>
  <?
 }
 ?>
<tr class="body1"  bgcolor="#DEE4EB">
 <td  height="25"  align="center"><strong>������</strong></td>
  <td  height="25"   align="center">&nbsp;
  <? if($Y==0){
   echo "";
  }else{
  echo number_format($Y)."  ���";
  }
  ?></td>
  <td  height="25"  align="center">&nbsp;����Թ (<?=number_format($a)."/".number_format($b)?>)</td>
   <td  align="center">&nbsp;<?=number_format($stotal2,2)?></td>
 <td  align="center">&nbsp;<?=number_format($stotal3,2)?></td>
 <td align="center">&nbsp;<?=number_format($stotal4,2)?></td>
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
        $sql =  "select sum(sum_m)as total  from meter m  where  mid(mcode,1,2) like '" .$HOCODE."' and mid(mcode,3,1) like '" .$ZID."'
		 and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = '��ҧ����' ) or  p_date >'".$p_date_1."' ) and  ";
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

        $sql =  "select mcode,mid(p_date,1,7),sum(sum_m) as T,p_date from meter m 
            where p_date like '" .$MMM ."' and mid(mcode,1,2) like '" .$HOCODE."' and mid(mcode,3,1) like '" .$ZID."'
			 and rec_status is not null and rec_status <> '¡��ԡ' 
			group by mid(mcode,1,2) order by mcode   ";
		//echo $sql."<br>";
		$result = mysql_query($sql);
		$rs_1=mysql_fetch_array($result);
		return $rs_1[T];
}
?>
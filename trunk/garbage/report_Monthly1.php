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
<link href="style2.css" rel="stylesheet" type="text/css">
<body>
<form name="f12" method="post"  action=""   >
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;����</div>	</td>
	</tr>
</table>	</td>
	</tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="16%"><strong>&nbsp;&nbsp;��͹</strong></td>
                    <td  ><div><strong><select name="month" >
					<? if($month=='') $month =date("m")?>
              <option value="01" <? if($month =='01') echo "selected"?>>���Ҥ� </option>
              <option value="02" <? if($month =='02') echo "selected"?>>����Ҿѹ�� </option>
              <option value="03" <? if($month =='03') echo "selected"?>>�չҤ� </option>
              <option value="04" <? if($month =='04') echo "selected"?>>����¹ </option>
              <option value="05" <? if($month =='05') echo "selected"?>>����Ҥ� </option>
              <option value="06" <? if($month =='06') echo "selected"?>>�Զع�¹ </option>
              <option value="07" <? if($month =='07') echo "selected"?>>�á�Ҥ� </option>
              <option value="08" <? if($month =='08') echo "selected"?>>�ԧ�Ҥ� </option>
              <option value="09" <? if($month =='09') echo "selected"?>>�ѹ��¹ </option>
              <option value="10" <? if($month =='10') echo "selected"?>>���Ҥ� </option>
              <option value="11" <? if($month =='11') echo "selected"?>>��Ȩԡ�¹ </option>
              <option value="12" <? if($month =='12') echo "selected"?>>�ѹ�Ҥ� </option>
            </select>&nbsp;&nbsp;�է�����ҳ</strong>
			<? $queryMyear  ="select myear from start ";
			$result_Myear=mysql_query($queryMyear);
			if($result_Myear)
			$Myear =mysql_fetch_array($result_Myear);
			?>
                      <select name="year"><? if($year ==''  ) $year =$Myear[myear];?>
	<?
	for($i=-2;$i<=2;$i++){
	?>
	<option value="<?=date("Y") + 543+$i?>" <?	if($year ==(date("Y") + 543+$i) ) echo "selected" ;
	?>><?=date("Y") + 543+$i?></option>
	<?
	}
	?>
	</select></div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ���� "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>
  <?
$p_date_1 = ($year-543)."-".$month."-"."31"; 
///////////////////////���Ţ��������//////////////////////////////
$sql_1="select if(max(rec_id) is null,'',max(rec_id)) as maxrecid, if(min(rec_id) is null,'',min(rec_id)) as minrecid
			, if(sum(total) is null,'0',sum(total)) as sumtotal ,if(sum(total) is null,'0',sum(total)/amt_1) as sumqty, if(count(rec_id) is null,'0',count(rec_id)) as numR 
    		from receive where 1=1 "; 
    $ex = substr($month,0,1);
	if($ex =='0') $monthh = substr($month,1);	
	else $monthh = $month;	 
	if ($month == '10' or $month == '11' or $month == '12' ) {
							$Yr = ($year-1);
				}else{
							$Yr = ($year);
				}		
					if($month  <> '' and $month =='12' ){	
					    $ex2 = "01";
						$p_date_1 = ($Yr-542)."-".($ex2)."-";
				}else if ($month  <> '' and $month<'12' ){	
		        $ex2 = $month+1;
			    if($ex2 =='0') $ex2 = substr($ex2,1);	
				else $ex2 = $ex2;	
				$ex2 ="0".$ex2 ;
		    	if (strlen($ex2) =='3') $ex2 = substr($ex2,1);	
				 else $ex2 =$ex2;	
							$p_date_1 = ($Yr-543)."-".($ex2)."-";
				}
 $sql_1.= "  and myear = '".$year."' and monthh = ".$month." ";
 $sql_1 .= "and rec_status <> '¡��ԡ' ";
$result_1 = mysql_query($sql_1);
if($result_1)
$rs1 =mysql_fetch_array($result_1);
///////////////////////�Ҩӹǹ�ѧ / �ӹǹ�Թ����ҧ//////////////////////////////
$sql="select  if(sum(total)is null,'0',sum(total)/amt_1) as total1 , if(sum(total) is null,'0',sum(total)) as total2 ,if(count(rec_id) is null,'0',count(rec_id)) as numR
 from house left join receive on hocode = mid(mcode,1,2) 
 and (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = '��ҧ����')" ;
			$p_date_4 = ($Yr-543)."-".($month)."-31";	
			$sql.= "or p_date > '".$p_date_4."' )  and " ; 
						if($month  <> '' and $monthh <=9 ){		 
							$sql.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}if($month  <> '' ) $sql .=  " or  myear < '" .$year. "' )";
$result2 = mysql_query($sql);
if($result2)
$rs2 =mysql_fetch_array($result2);
///////////////////////�Ҩӹǹ�ѧ / �ӹǹ�Թ���͹(����)//////////////////////////////
$sql3="select  if(sum(total)is null,'0',sum(total)/amt_1) as total3 , if(sum(total) is null,'0',sum(total)) as total4 , if(count(rec_id) is null,'0',count(rec_id)) as numR  from  receive where 1=1 ";
$p_date_2 = ($Yr-543)."-".$month."-"."01"; 
$p_date_3 = ($Yr-543)."-".$month."-"."31"; 
$sql3 .=  "and myear = '".$year."' and monthh = ".$monthh." ";
$sql3 .= "and p_date between date_add('".$p_date_2."', INTERVAL 1 MONTH) and date_add('".$p_date_3."', INTERVAL 1 MONTH) and rec_status <> '¡��ԡ'" ;
$result3 = mysql_query($sql3);
if($result3)
$rs3 =mysql_fetch_array($result3);
//////////////////////////////�Ҩӹǹ�ѧ / �ӹǹ�Թ����ҧ(����)//////////////////////////////////////////
				$sql4=" select if(sum(total) is null,'0',sum(total)) as  total5, if(sum(total)is null,'0',sum(total)/amt_1) as total6 , if(count(rec_id) is null,'0',count(rec_id)) as numR  from  receive  where  rec_id <> '' and rec_id is not null  and p_date <> '1111-11-11'   ";
						 $sql4.= " and p_date  like  '" .$p_date_1. "%' and ";
						 	 $ex = substr($month,0,1);
				if($ex =='0') $monthh = substr($month,1);	
				else $monthh = $month;	 
						if($month  <> '' and $monthh <=9 ){		 
							$sql4.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql4.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}
				 $sql4.=  " or myear < '" .$year. "') and rec_status is not null and rec_status <> '¡��ԡ' ";
				$result4 = mysql_query($sql4);
				if($result4)
				$rs4 =mysql_fetch_array($result4);
?><br>
 <table  width="95%"   border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;" >
  <tr>
    <td  colspan="2"  >
		<table width="100%" align="center" cellspacing="0"  cellpadding="0" border="0"  style="border-collapse:collapse;" >
      <tr class="lgBar" bgcolor="#DEE4EB" >
        <td  height="28" colspan="7"  cellspacing="0"  cellpadding="0" ><div  align="left"><strong>&nbsp;&nbsp;��§ҹ��ػ��Ҹ������������Ž�»�Ш���͹</strong></div></td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td  height="31" colspan="6" align="center" style="border: #000000 1px solid;" cellspacing="0"  cellpadding="0" ><div align="left">&nbsp;&nbsp;�ҹ��ҹ�Ѳ����ШѴ������� ����Թ��èѴ���Թ��Ҹ������������Ž�»�Ш���͹  <?=mounth3($month)?>  �.�.<?=$Yr?> ��ػ��ѧ���</div></td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="65%"  height="31" align="center" style="border: #000000 1px solid;" cellspacing="0"  cellpadding="0" ><div align="left">&nbsp;&nbsp;��Ҹ������������Ž�»�Ш���͹ <?=mounth3($monthh)?>  �.�.<?=$Yr?> ��������������� <?=$rs1[minrecid]?> �֧ <?=$rs1[maxrecid]?></div></td>
        <td width="6%" colspan="-6"  align="center" style="border: #000000 1px solid;">�ӹǹ</td>
        <td width="6%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">&nbsp;<?=number_format($rs1[numR])?></td>
        <td width="9%"  align="center" style="border: #000000 1px solid;">���     ���Թ</td>
        <td width="8%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;"><?=number_format($rs1[sumtotal])?></td>
        <td width="6%"  align="center" style="border: #000000 1px solid;">�ҷ&nbsp;</td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td  height="31" align="left" style="border: #000000 1px solid;">&nbsp;&nbsp;��Ҹ������������Ž�¤�ҧ������͹ 
		<? 
		if($month  <> '' and $month ==1 ){		 
			echo "�ѹ�Ҥ�  �.�.".($Yr-1);
		}else{	
		    echo (mounth3($month-1))." �.�.".($Yr);
		}
		 ?>		 </td>
        <td width="6%" colspan="-6"  align="center" style="border: #000000 1px solid;">�ӹǹ</td>
        <td width="6%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">&nbsp;<?=number_format($rs2[numR])?></td>
        <td width="9%"  align="center" style="border: #000000 1px solid;">���     ���Թ</td>
        <td width="8%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">&nbsp;<?=number_format($rs2[total2])?></td>
        <td width="6%"  align="center" style="border: #000000 1px solid;">�ҷ</td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td  height="31" align="center" style="border: #000000 1px solid;"><div align="right" ><strong>���&nbsp;&nbsp;</strong></div></td>
        <td width="6%" colspan="-6"  align="center" style="border: #000000 1px solid;">�ӹǹ</td>
        <td width="6%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">
		<strong>&nbsp;<?=number_format($rs1[numR]+$rs2[numR]);?></strong></td>
        <td width="9%"  align="center" style="border: #000000 1px solid;">���     ���Թ</td>
        <td width="8%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">
		<strong>&nbsp;<?=number_format($rs1[sumtotal]+$rs2[total2]);?></strong></td>
        <td width="6%"  align="center" style="border: #000000 1px solid;">�ҷ</td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td  height="31" align="left" style="border: #000000 1px solid;">&nbsp;&nbsp;�ӹǹ�Թ������� ��͹  <?=mounth3($month)?>  �.�.<?=$Yr?></td>
        <td width="6%" colspan="-6"  align="center" style="border: #000000 1px solid;">�ӹǹ</td>
        <td width="6%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">&nbsp;<?=number_format($rs3[numR])?></td>
        <td width="9%"  align="center" style="border: #000000 1px solid;">���     ���Թ</td>
        <td width="8%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">&nbsp;<?=number_format($rs3[total4])?></td>
        <td width="6%"  align="center" style="border: #000000 1px solid;">�ҷ</td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td  height="31" align="center" style="border: #000000 1px solid;"><div align="left">&nbsp;&nbsp;�ӹǹ�Թ��ҧ���з������</div></td>
        <td width="6%" colspan="-6"  align="center" style="border: #000000 1px solid;">�ӹǹ</td>
        <td width="6%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">&nbsp;<?=number_format($rs4[numR])?></td>
        <td width="9%"  align="center" style="border: #000000 1px solid;">���     ���Թ</td>
        <td width="8%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">&nbsp;<?=number_format($rs4[total5])?></td>
        <td width="6%"  align="center" style="border: #000000 1px solid;">�ҷ</td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td  height="31" align="center" style="border: #000000 1px solid;"><div align="left">&nbsp;&nbsp;����ӹǹ�Թ���Ѵ���������</div></td>
        <td width="6%" colspan="-6"  align="center" style="border: #000000 1px solid;">�ӹǹ</td>
        <td width="6%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">&nbsp;
          <?=number_format($rs3[numR]+$rs4[numR]);?></td>
        <td width="9%"  align="center" style="border: #000000 1px solid;">���     ���Թ</td>
        <td width="8%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;">&nbsp;<?=number_format($rs3[total4]+$rs4[total5]);?></td>
        <td width="6%"  align="center" style="border: #000000 1px solid;">�ҷ</td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td  height="31" align="center" style="border: #000000 1px solid;"><div align="right"><strong>�ʹ����ҧ¡�&nbsp;&nbsp;</strong></div></td>
        <td width="6%" colspan="-6"  align="center" style="border: #000000 1px solid;">�ӹǹ</td>
        <td width="6%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;"><strong>
		&nbsp;<?=number_format(($rs1[numR]+$rs2[numR])-($rs3[numR]+$rs4[numR]));?></strong></td>
        <td width="9%"  align="center" style="border: #000000 1px solid;">���     ���Թ</td>
        <td width="8%"  align="center" bgcolor="#FFFFFF" style="border: #000000 1px solid;"><strong>&nbsp;
          <?=number_format(($rs1[sumtotal]+$rs2[total2])-($rs3[total4]+$rs4[total5]));?></strong></td>
        <td width="6%"  align="center" style="border: #000000 1px solid;">�ҷ</td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td  height="31"  align="right" style="border: #000000 1px solid;"><strong>����ѡ��&nbsp;&nbsp;</strong></td>
        <td colspan="5"  align="center"  bgcolor="#FFFFFF" style="border: #000000 1px solid;">
		<strong><?= num_to_char(($rs1[sumtotal]+$rs2[total2])-($rs3[total4]+$rs4[total5]));?></strong></td>
      </tr>
    </table></td>
  </tr>
  </table>
 </form>
<div align="center">
<input  type="button" name="print" value=" ����� "  onclick="window.open('report1.php?month=<?=$month?>&year=<?=$year?>&year2=<?=$Yr?>')"/ class="buttom">
</FONT></center></div> 
</body>
</html>

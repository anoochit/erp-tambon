
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
<link href="style.css" rel="stylesheet" type="text/css">
<body>
<form name="f12" method="post"  action=""   >
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0" cellspacing="1" cellpadding="1" >
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;����</div>	</td>
	</tr>
</table>	</td>
	</tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
	<tr class="bmText" height="25">
                    <td width="16%"><strong>&nbsp;&nbsp;�����ҹ</strong></td>
			
                    <td width="84%"><div><?
			$query  ="select * from house  order by HOCODE";
			//echo $query."666<br>";
			$result=mysql_query($query);
			?><select name="HOCODE"  >
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[HOCODE];?>"
		<?
		if($HOCODE == $d[HOCODE]) echo "selected";
		?>
		><? echo $d[HONAME];?></option>
                        <? }?>
            </select></div>				</td>
          </tr>
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
              <option value="11" <? if($month =='11') echo "selected"?>>�Ȩԡ�¹ </option>
              <option value="12" <? if($month =='12') echo "selected"?>>�ѹ�Ҥ� </option>
            </select>&nbsp;&nbsp;�է�����ҳ</strong>
                      <select name="year"><? if($year ==''  ) $year =(date("Y") + 543);?>
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
<br>
<? 
if($search <>''){
		if ($month == '10' or $month == '11' or $month == '12' ) {
							$Yr0 = ($year-1);
		}else{
							$Yr0 = ($year);
		}		
				if($month  <> '' and $month =='12' ){	
					    $ex0 = "01";
						$p_date0 = ($Yr0-542)."-".($ex0)."-";
				}else if ($month  <> '' and $month<'12' ){	
		        $ex0 = $month+1;
			    if($ex0 =='0') $ex0 = substr($ex0,1);	
				else $ex0 = $ex0;	
				$ex0 ="0".$ex0 ;
		    	if (strlen($ex0) =='3') $ex0 = substr($ex0,1);	
				 else $ex0 =$ex0;	
							$p_date0 = ($Yr0-543)."-".($ex0)."-";
				}
?>
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" >
<?
$sqlM="select honame  from house  where hocode = ".$HOCODE." "; 
$resultM = mysql_query($sqlM);
if ($resultM)
$rsM=mysql_fetch_array($resultM) ;
$honame = $rsM[honame];
?>
				<tr class="bmText">
				  <td align="center" width="50%"  height="31" bgcolor="#FFFFCC"style="border: #7292B8 1px solid;" >
				  <a href="report_Zinmonth.php?HOCODE=<?=$HOCODE?>&honame=<?=$honame?>&month=<?=$month?>&year=<?=$year?>&p_date0=<?=$p_date0?>"   target="_blank"><strong>�������ʹ����(੾�����͹)</strong></a></td>
						<td align="center" width="50%" height="31" bgcolor="#FFFFCC" style="border: #7292B8 1px solid;"><a href="report_Zoutmonth.php?HOCODE=<?=$HOCODE?>&honame=<?=$honame?>&month=<?=$month?>&year=<?=$year?>&p_date0=<?=$p_date0?>"   target="_blank"><strong>�������ʹ����(੾���ӹѡ�ҹ)</strong></a></td>
				</tr>
		</table>
<br>
<table  width="98%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td  colspan="2" >
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
      <tr class="lgBar">
        <td  height="28" colspan="14" style="border: #7292B8 1px solid;" ><div  align="left">&nbsp;&nbsp;<strong>��§ҹ��ػ�ʹ�����Ш���͹ (�.32)</strong></div></td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="109"  height="31" align="center"style="border: #7292B8 1px solid;" ><strong>�ѹ/��͹/��</strong></td>
        <td width="106"  height="31" align="center"style="border: #7292B8 1px solid;" ><strong>�ӹǹ�Թ�����</strong></td>
<? 
$sql_1="select z_id,h.hocode,honame from zone z,house h where z.hocode = ".$HOCODE." and z.hocode = h.hocode order by z_id ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
    $z_id1 = substr($rs_1[z_id],0,1);
	if($z_id1 =='0') $z_id = substr($rs_1[z_id],1);	
	else $z_id = $rs_1[z_id];	
	$honame = $rs_1[honame];
?>

<td width="12%"  height="31" align="center" style="border: #7292B8 1px solid;" ><strong>
ࢵ <?=$z_id?>
</strong></td>
<? }
?>
      </tr>
<?
$SumMtotal = 0;
$sql1="select  p_date,sum(sum_m)as stotal,hocode from meter, zone 
where rec_status is not null and rec_status <> '¡��ԡ' and z_id = mid(mcode,3,1) 
and mid(mcode,1,2) = ".$HOCODE." and hocode = mid(mcode,1,2)  ";
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

$sql1.= " and p_date  like  '" .$p_date_1. "%'  group by p_date "; 
$result1 = mysql_query($sql1);
if ($result1 )
while($rs1=mysql_fetch_array($result1)){
				$SumMtotal = $SumMtotal + $rs1[stotal];

?>
 <tr class="bmText" >
        <td  height="25"  align="center"style="border: #7292B8 1px solid;" ><font size="1">&nbsp;
		<strong><?=date_2($rs1[p_date])?></strong></font></td>
        <td  height="25"   align="right"style="border: #7292B8 1px solid;" ><font size="1">
		<strong><?=number_format($rs1[stotal],2)?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
<? 
$sql2="select  if(sum(sum_m)is null,'',sum(sum_m))as sumtotal,z_id,z_name 
from (house h,zone z)left join meter on z_id = mid(mcode,3,1) and z.hocode = mid(mcode,1,2)
and rec_status is not null and rec_status <> '¡��ԡ' 
and p_date = '" .$rs1[p_date]. "' 
where z.hocode = ".$HOCODE." and h.hocode = z.hocode
group by z_id order by z_id  ";

$result2 = mysql_query($sql2);
if ($result2 )
while($rs2=mysql_fetch_array($result2)){
  ?>
<td width="724"  height="31" align="center"style="border: #7292B8 1px solid;" >&nbsp;
<a href="report_ZP32_2.php?HOCODE=<?=$HOCODE?>&honame=<?=$honame?>&month=<?=$month?>&year=<?=$Yr?>&p_date=<?=$rs1[p_date]?>&ZID=<?=$rs2[z_id]?>&Zname=<?=$rs2[z_name]?>"   target="_blank"><?
if($rs2[sumtotal]>0){
echo number_format($rs2[sumtotal],2);
}else{ 
	echo "" ;
}?></a></td>
<?
 }
?>
		  </tr>
			<?
			   }
			   ?>
      <tr class="bmText" bgcolor="#DEE4EB"  onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe' " onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '' ">
        <td  height="25"  align="center" style="border: #7292B8 1px solid;" >&nbsp;<strong>���</strong></td>
        <td  height="25"   align="right" style="border: #7292B8 1px solid;" >
		<strong><?=number_format($SumMtotal,2)?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <? 
$sql3="select  if(sum(sum_m)is null,'',sum(sum_m))as sumtotal2,z_id
from (house h,zone z)left join meter on z_id = mid(mcode,3,1) 
and z.hocode = mid(mcode,1,2)
and rec_status is not null and rec_status <> '¡��ԡ' 
and p_date  like  '" .$p_date_1. "%' 
where z.hocode = ".$HOCODE." and h.hocode = z.hocode
 group by z_id order by z_id  ";

$result3 = mysql_query($sql3);
if ($result3 )
while($rs3=mysql_fetch_array($result3)){

?>
<td width="724"  height="31" align="center"style="border: #7292B8 1px solid;" ><strong>&nbsp;<?
if($rs3[sumtotal2]>0){
echo number_format($rs3[sumtotal2],2);
}else{ 
	echo "" ;
} ?></strong></td>
<?
 }
?>
	      </tr>
		  
    </table>
	<br>
	<br>
	<div align="center">
<input  type="button" name="print" value=" ����� "  onclick="window.open('report18.php?month=<?=$month?>&year=<?=$year?>&year2=<?=$Yr?>&HOCODE=<?=$HOCODE?>&honame=<?=$honame?>')"/ class="buttom">

</FONT></center></div> 
	<?
 }
?>
	</td>
    </tr>
  </table>
</form>

</body>
</html>

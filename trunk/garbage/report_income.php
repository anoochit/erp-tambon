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
<link href="style2.css" rel="stylesheet" type="text/css"><body>
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
		<div > <img src="images/Search.png" align="absmiddle"><!--<img src="PNG-32/Bar Chart.png" align="absmiddle"> -->&nbsp;&nbsp;&nbsp;����</div>	</td>
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
			//echo $Myear[myear];
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
 <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  ><table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
      <tr class="lgBar">
        <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;<strong>��§ҹ��ػ����ʹ����纻�Ш���͹</strong></div></td>
      </tr>
      <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="6%"  height="31" align="center"><strong>������</strong></td>
        <td width="14%"  height="31" align="center"><strong>���������ҹ</strong></td>
        <td width="13%"  align="center"><strong>�ӹǹ�Թ</strong></td>
        <td width="13%"  align="center"><strong>�ӹǹ���</strong></td>
		<td width="13%"  align="center"><strong>�͡���</strong></td>
		<td width="13%"  align="center"><strong>¡��ԡ</strong></td>
      </tr>
<?
if($search <>'')
$summem = 0;
$stotal1 = 0;
$stotal2 = 0;
$stotal3 = 0;
$stotal4 = 0;
$stotal5 = 0;
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1="select mid(mcode,1,2) as mcode, honame, sum(total)as stotal  ,  if(sum(amt_1)is null,'0',amt_1) as amt_1
from receive, house 
where rec_status is not null and rec_status <> '¡��ԡ' 
	and hocode = mid(mcode,1,2) and myear = '" .$year. "' and monthh = ".$month."
	group by mid(mcode,1,2) order by mid(mcode,1,2) ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
		    /////////////////////////////////////////////////////////////////////
				$sql="select if (count(rec_id) is null,0,count(rec_id)) as countr   from receive where myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[mcode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> '¡��ԡ' 
			    group by mid(mcode,1,2) ";
				$result = mysql_query($sql);
				while($rs=mysql_fetch_array($result)){
							////////////////////////////////////////////////////////////////////////
				$sql2=" select count(mid(mcode,1,2)) as droupm ,HOCODE 
				FROM house left join cancel_reg on HOCODE =  mid(mcode,1,2)
				and  cmyear = '" .$year. "' and cmonth = ".$month."
    			where  HOCODE = '" .$rs_1[mcode]."' group by HOCODE  ";
				$result2= mysql_query($sql2);
				while($rs2=mysql_fetch_array($result2)){
				$summem =  $rs[countr]-$rs2[droupm];
				$stotal1 =  $stotal1 +($rs_1[stotal]/$rs_1[amt_1]);
				$stotal2 =  $stotal2 +$rs_1[stotal];
				$stotal3 =  $stotal3 +$rs[countr];
				$stotal4 =  $stotal4 +$summem;
				$stotal5 =  $stotal5 +$rs2[droupm];
			?>
 <tr class="bmText" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center"><font size="1">&nbsp;<? echo $rs_1[mcode]; ?></font></td>
        <td  height="25"   align="left"><font size="1">&nbsp;<? echo $rs_1[honame]; ?></font></td>
		<td  height="25"  align="center"><font size="1">&nbsp;<? echo number_format($rs_1[stotal]); ?></font></td>
		<td  align="center"><font size="1">&nbsp;<? echo number_format($rs[countr]); ?></font></td>
        <td  align="center"><font size="1">&nbsp;<? echo number_format($summem);?> </font></td>
        <td  align="center"><font size="1">&nbsp;<? echo number_format($rs2[droupm]);?></font></td>
		  </tr>
			<?
			   }}}
			   ?>
      <tr class="bmText" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<strong>���</strong></td>
        <td  height="25"   align="left">&nbsp;</td>
        <td  align="center"><? echo number_format($stotal2); ?></td>
        <td  align="center"><? echo number_format($stotal3); ?></td>
		<td  align="center"><? echo number_format($stotal4); ?></td>
		<td  align="center"><? echo number_format($stotal5); ?></td>
      </tr>
    </table></td>
    </tr>
  </table>
</form>
<div align="center">
<input  type="button" name="print" value=" ����� "  onclick="window.open('report5.php?month=<?=$month?>&year=<?=$year?>&year2=<?=$Yr?>')"/ class="buttom">

</FONT></center></div> 
</body>
</html>

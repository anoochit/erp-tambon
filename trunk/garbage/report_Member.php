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
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;����</div>	</td>
	</tr>
</table>	</td>
	</tr> 
     <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
                    <td width="16%"><strong>&nbsp;&nbsp;�����ҹ</strong></td>
                    <td width="84%"><div><?
			$query  ="select * from house  order by HOCODE";
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
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="16%"><strong>&nbsp;&nbsp;��͹</strong></td>
                    <td  ><div><strong>
                      <select name="month" >
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
                      </select>
                    &nbsp;&nbsp;�է�����ҳ</strong>
					<? $queryMyear  ="select myear from start ";
					$result_Myear=mysql_query($queryMyear);
					if($result_Myear)
					$Myear =mysql_fetch_array($result_Myear);
					//echo $Myear[myear];
					?>
                        <select name="year">
                          <? if($year ==''  ) $year =$Myear[myear];?>
                          <?
	for($i=-2;$i<=2;$i++){
	?>
                          <option value="<?=date("Y") + 543+$i?>" <?	if($year ==(date("Y") + 543+$i) ) echo "selected" ;
	?>>
                            <?=date("Y") + 543+$i?>
                          </option>
                          <?
	}
	?>
                        </select>
                        </div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ���� "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>
<br>
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
  </table>
  <br>
  <table  width="95%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;��§ҹ��ª��ͼ�����ԡ�èѴ�红����Ž��</div></td>
        </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="14%"  height="31" align="center"><strong>�Ţ����¹</strong></td>
		<td width="25%"  height="31" align="center"><strong>���� - ʡ��</strong></td>
		<td width="12%"  height="31" align="center"><p><strong>��ҹ�Ţ���</strong><strong></strong></p></td>
         <td width="7%"  align="center"><p><strong>����</strong></p></td>
         <td width="14%"  align="center"><p><strong>����ҳ (�Ե�)</strong></p></td>
		 <td width="12%"  align="center"><p><strong>�Ҥ� (�ҷ) </strong></p></td>
		 <td width="16%"  align="center"><p><strong>�Ţ��������</strong></p></td>
	    </tr>
  <?
if($search <>''){
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1=" Select  m.mem_id,concat(pren,m.name,' ',m.surn)as name,mb.mem_id,mb.MCODE,mb.RDATE,mb.HNO1,mb.HNO,mb.moo,mb.qty,mb.amt,mb.type1,";
$sql_1 .=  "  r.rec_id,r.MCODE,r.MYEAR,r.MONTHH,r.rec_date,r.TOTAL,p_date,r.rec_status,trname ";
$sql_1 .=  "  from member m,m_bin mb,receive r,type_rece t ";
$sql_1 .=  "  where  mb.MCODE = r.MCODE and m.mem_id = mb.mem_id and cost = qty  ";
	 
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
if($month  <> '' ) $sql_1 .=  " and monthh =".$monthh." and  myear = '" .$year. "' ";
if($HOCODE <>'') $sql_1 .=  "  and  mb.HOCODE  = '".$HOCODE."' ";
if($status <>'') $sql_1 .=  "  and rec_status   = '".$status."' ";
 $sql_1 .=  "  order by mb.MCODE   ";
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
$total_all = 0;
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total_qty = $total_qty + $rs_1[qty];
	$total_total  = $total_total  + $rs_1[TOTAL];
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
  <td  height="25"  align="center">&nbsp;
  <?
 if ($rs_1[HNO1]==""or $rs_1[HNO1]=="-") { 
 echo $rs_1[HNO];
 }elseif ($rs_1[HNO]=="0"){ 
 echo "";
 }else{ 
 echo $rs_1[HNO]."/".$rs_1[HNO1];}
 ?>
  </td>
 <td > <div align="center">&nbsp; <? echo ($rs_1[moo]);  ?>   </div></td>
  <td > <div align="center">&nbsp;<? echo ($rs_1[trname]);  ?></div></td>
 <td > <div align="center">&nbsp; <? echo ($rs_1[amt]);  ?>   </div></td>
  <td > <div align="center">&nbsp; <? echo ($rs_1[rec_id]);  ?>   </div></td>
 </tr>
 <? 	
	}}
?>
</table>
<table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">	  
<tr  width='100%' class="bmText"  bgcolor="#DEE4EB">
<td width="39%"  height="25"  align="left"><strong>�ӹǹ������ :: &nbsp; <?=number_format($i)?> &nbsp; ���</strong></td>
<td width="33%"  height="25"  align="left"></td>
<td width="28%"  height="25"  align="left"><strong>������Թ :: &nbsp; <?=number_format($total_total)?> &nbsp; �ҷ</strong></td>
</tr>
</table>
	  </td>
    </tr>
 </table>
</form>
<div align="center">
  <input  type="button" name="print" value=" ����� "  onclick="window.open('report11.php?month=<?=$month?>&year=<?=$year?>&hocode=<?=$HOCODE ?>&honame=<?=$d[HONAME]?>')"/ class="buttom">
 </center></div> 
</body>
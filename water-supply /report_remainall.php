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
<link href="style.css" rel="stylesheet" type="text/css"><body>
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
			?><select name="HOCODE" onChange="dochange('ZONE', this.value)" >
           <option value=''>----------������----------</option>
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
                    <td width="16%" height="38"><strong>&nbsp;&nbsp;ࢵ</strong></td>
                    <td width="84%"><div id = "ZONE">
                      <?
		if($HOCODE ==''){
        $query  ="select z_id,z_name from zone z,house h where z.hocode = h.hocode  and z.hocode = '".min_hocode( )."' order by z.hocode ";
		 $result = mysql_query($query);
  ?>
           <select name="z_id"  >
		       <option value="">-------������--------</option>
  <?
		while($d =mysql_fetch_array($result)){
				
	?>
	    <option value="<? echo $d[z_id];?>"
		<?
		if($z_id == $d[z_id] ) echo "selected";
		?>
		><? echo $d[z_name];?></option>
	            <? }?>
	    </select>
		<? }else{
		        $query1  ="select z_id,z_name from zone z,house h where z.hocode = h.hocode  and z.hocode = '".$HOCODE."' order by z.hocode ";
		 $result1 = mysql_query($query1);
  ?>
           <select name="z_id"  >
		       <option value="">-------������--------</option>
  <?
		while($d1 =mysql_fetch_array($result1)){
				
	?>
	    <option value="<? echo $d1[z_id];?>"
		<?
		if($z_id == $d1[z_id] ) echo "selected";
		?>
		><? echo $d1[z_name];?></option>
	            <? }?>
	    </select>
		<? }?>
                    </div></td>
          </tr>
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
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;��§ҹ����������稤�ҧ���з�����</div></td>
        </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="7%"  height="31" align="center"><strong>�Ţ����¹</strong></td>
		<td width="11%"  height="31" align="center"><strong>���� - ʡ��</strong></td>
		<td width="6%"  height="31" align="center"><p><strong>��ҹ�Ţ���</strong><strong></strong></p></td>
         <td width="3%"  align="center"><p><strong>����</strong></p></td>
         <td width="7%"  align="center"><p><strong>�Ţ�ҵ�</strong></p></td>
		 <td width="6%"  align="center"><p><strong>�ҵ����</strong></p></td>
		 <td width="6%"  align="center"><p><strong>�Ѩ�غѹ</strong></p></td>
		 <td width="6%"  align="center"><p><strong>����</strong></p></td>
		 <td width="6%"  align="center"><p><strong>���˹��� </strong></p></td>
		 <td width="7%"  align="center"><p><strong>����</strong></p></td>
		  <td width="7%"  align="center"><p><strong>�������ҵ�</strong></p></td>
		 <td width="6%"  align="center"><p><strong>���������</strong></p></td>
		 <td width="13%"  align="center"><p><strong>�Ţ�������� </strong></p></td>
	    <td width="9%"  align="center"><p><strong>��Ш���͹</strong></p></td>
	    </tr>
  <?
if($search <>''){
$sql_1="Select  q.MCODE,concat(pren,name,'  ',surn) as name,moo,q.mno,HNO1,HNO,if(m2.mno is null,'m_total',m2.mno) as M ,
 if(rec_id is null,'',rec_id)as rec_id,if(rec_status is null,'��ҧ����',rec_status)as rec_status,rec_date,p_date,if(amount is null,'',amount)as amount ,
 if(m2.m_date is null,'',m2.m_date) as m_daterec_id,rec_date,amount , m_date, if(m_rate is null,'',m_rate)as m_rate,
  if(m_amt is null,'',m_amt)as m_amt,monthh,myear,if(total is null,'',total)as total
 from member m,q_water q ,meter m2 
 where  q.MCODE = m2.MCODE and q.mem_id = m.mem_id  ";
if($HOCODE <>'') $sql_1 .=  " and  q.HOCODE = '".$HOCODE."' ";
if($z_id <>'') $sql_1 .=  " and mid(q.MCODE,3,1) = '".$z_id."' ";
$sql_1.=" and rec_status = '��ҧ����' order by rec_id ";
$result_1= mysql_query($sql_1);
$total1  = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;
$total5 = 0;
$i = 0;
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total3 = $total3 + $rs_1[m_amt] ;
	$total5 = $total5 + $rs_1[amount] ;
	//////////////////�礻�/////////////////////
	if ($rs_1[monthh] == '10' or $rs_1[monthh] == '11' or $rs_1[monthh] == '12' ) {
							$Yr = ($rs_1[myear]-1);
				}else{
							$Yr = ($rs_1[myear]);
				}		
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
 ?>  </td>
 <td > <div align="center">&nbsp;<? echo ($rs_1[moo]);  ?>   </div></td>
  <td > <div align="center">&nbsp;<? echo ($rs_1[mno]);  ?></div></td>
 <td > <div align="center">&nbsp; <? echo ($rs_1[M]-$rs_1[amount]);  ?>   </div></td>
  <td > <div align="center">&nbsp;<? echo ($rs_1[M]);  ?>   </div></td>
   <td > <div align="center">&nbsp;<? echo ($rs_1[amount]);  ?>   </div></td>
  <td > <div align="center">&nbsp;<?
 		 if($rs_1[amount] == "0" ){
					echo S_Min();
					$A = S_Min();
		}else{
					echo number_format(($rs_1[total]));
					$A = ($rs_1[total]);
		} ?>   </div></td>
 <td > <div align="center">&nbsp; <?
 		 if($rs_1[amount] == "0" ){
					echo number_format((S_Min()* VAT())/100,2);
					$B=(S_Min()* VAT())/100;
		}else{
					echo number_format((($rs_1[total])* VAT())/100,2);
					$B=(($rs_1[total])* VAT())/100;
		} ?>   </div></td>
  <td > <div align="center">&nbsp;<? echo ($rs_1[m_amt]);  ?>   </div></td>
 <td > <div align="center">&nbsp;<?
 		 if($rs_1[amount] == "0" ){
					echo number_format(((S_Min()+((S_Min()* VAT())/100))+$rs_1[m_amt]),2);
					$C = ((S_Min()+((S_Min()* VAT())/100))+$rs_1[m_amt]);
		}else{
					echo number_format((($rs_1[total])+((($rs_1[total])* VAT())/100)+$rs_1[m_amt]),2);
					$C = (( $rs_1[total])+((($rs_1[total])* VAT())/100)+$rs_1[m_amt]);
		} ?></div></td>
  <td > <div align="center">&nbsp;<? echo ($rs_1[rec_id]);  ?></div></td>
  <td > <div align="center">&nbsp;<? echo mounth2($rs_1[monthh])." ".substr($Yr,2);?></div></td>
 </tr>
 <? 	
  $total1 = $total1 + $A ;
  $total2 = $total2 + $B ;
  $total4 = $total4 + $C ;
	}}
?>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="7%"  height="25" align="center"><strong>���</strong></td>
		<td width="11%"  height="25" align="center"><strong>&nbsp;<? echo number_format($i); ?>&nbsp;&nbsp;&nbsp;��¡�� </strong></td>
		<td width="6%"  height="25" align="center">&nbsp;</td>
		<td width="3%"  align="center">&nbsp;</td>
		<td width="7%"  align="center">&nbsp;</td>
		<td width="6%"  align="center">&nbsp;</td>
		<td width="6%"  align="center">&nbsp;</td>
		<td width="6%"  align="center">&nbsp;<? echo number_format($total5,2);?></td>
		<td width="6%"  align="center">&nbsp;<? echo number_format($total1,2);?></td>
		 <td width="7%"  align="center">&nbsp;<? echo number_format($total2,2);?></td>
		  <td width="7%"  align="center">&nbsp;<? echo number_format($total3,2);?></td>
		 <td width="6%"  align="center">&nbsp;<? echo number_format($total4,2);?></td>
		 <td width="13%"  align="center"><p>&nbsp;</p></td>
		 <td  align="center"><p>&nbsp;</p></td>
	    </tr>
</table>
	  </td>
    </tr>
 </table>
</form>
<div align="center">
  <input  type="button" name="print" value=" ����� "  onclick="window.open('report15.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE ?>&z_id=<?=$z_id?>')"/ class="buttom">
 </center></div> 
</body>
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
                    <td width="16%"><strong>&nbsp;&nbsp;ࢵ</strong></td>
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
	 //echo $query1."<br>";
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
                    &nbsp;&nbsp;�� </strong>
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
  <br>
    <table  width="95%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;��§ҹ��ª��ͼ�����ӻ�л� (�������)</div></td>
        </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="9%"  height="31" align="center"><strong>�ӴѺ���</strong></td>
		<td width="27%"  height="31" align="center"><strong>���� - ʡ��</strong></td>
		<td width="13%"  height="31" align="center"><p><strong>�Ţ����¹</strong><strong></strong></p></td>
         <td width="18%"  align="center"><p><strong>�ѹ�����Ѻ��ԡ��</strong></p></td>
         <td width="11%"  align="center"><p><strong>��ҹ�Ţ���</strong></p></td>
		 <td width="10%"  align="center"><p><strong>����</strong></p></td>
		 <td width="12%"  align="center"><p><strong>�Ţ�ҵ�</strong></p></td>
	    </tr>
<?
if($search <>''){
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1 =" Select  m.mem_id,concat(pren,m.name,'   ',m.surn) as name, b.TMCODE,b.MCODE,b.mem_id,b.RDATE,b.HNO,b.HNO1,b.MOO,b.HOCODE,b.mno,moo
from member m,q_water b left join meter m2 on b.MCODE = m2.MCODE 
where b.mem_id = m.mem_id ";
 $ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
if($month  <> '' ) $sql_1 .=  "and month(rdate) = '".$month."'  and  year(rdate) = '".($year-543)."'  ";
if($month  == '1' ){
$sql_1 .= "and rdate >=  ".($year- 544)."-12-01"." ";
   }else{
$sql_1 .= " and month(rdate) >= '".$month."' and year(rdate) = '".($year-543)."' ";
}
  if($HOCODE  <> ""){ 	$sql_1.="and b.HOCODE = '".$HOCODE."'  "; }
  if($z_id <>'') $sql_1 .=  " and mid(b.MCODE,3,1) = '".$z_id."' ";
$sql_1.=" group by b.MCODE order by rdate,MCODE  ";
$result_1= mysql_query($sql_1);
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
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $i; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
  <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
 <td > <div align="center">&nbsp; <? echo substr($rs_1[RDATE],8,2)."  ".mounth3(substr($rs_1[RDATE],5, 2))."  ".(substr($rs_1[RDATE],0,4)+543); ?></div></td>
  <td > <div align="center">&nbsp;<?
 if ($rs_1[HNO1]==""or $rs_1[HNO1]=="-") { 
 echo $rs_1[HNO];
 }elseif ($rs_1[HNO]=="0"){ 
 echo "";
 }else{ 
 echo $rs_1[HNO]."/".$rs_1[HNO1];}
 ?></div></td>
 <td > <div align="center">&nbsp; <? echo ($rs_1[moo]);  ?></div></td>
  <td > <div align="center">&nbsp; <? echo ($rs_1[mno]);  ?></div></td>
 </tr>
 <? 
	}}
?>
      </table>
<table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">	  
<tr  width='70%' class="bmText"  bgcolor="#DEE4EB">
<td  height="25"  align="left"><strong>&nbsp;&nbsp;�ӹǹ������ :: &nbsp; <?=$i ?> &nbsp; ���</strong></td>
</tr>
</table>	
	  </td>
    </tr>
 </table>
</form>
<div align="center">
<input  type="button" name="print" value=" ����� "  onclick="window.open('report12.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE ?>&z_id=<?=$z_id?>')"/ class="buttom">
</center></div> 
</body>
</html>

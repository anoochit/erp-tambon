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
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}
</script>
<link href="style.css" rel="stylesheet" type="text/css" /><form name="save" action=""  method="post" enctype="multipart/form-data">
<table width="50%" border="0" cellspacing="1" cellpadding="1" align="center" >
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
			<td width="24%"><strong>&nbsp;&nbsp;�Ţ����¹</strong></td>
                    <td  ><div><input type="text" size="10" name="mcode_1" value="<?=$mcode_1?>"  /> - <input type="text" size="10" name="mcode_2"   value="<?=$mcode_2?>"/></div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
                    <td width="24%"><strong>&nbsp;&nbsp;���� - ʡ�� </strong></td>
            <td width="76%"><div><input type="text" size="15" name="name" value="<?=$name?>"  /> - <input type="text" size="15" name="surn"  value="<?=$surn?>" /></div>				</td>
          </tr>
		  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ���� "  class="buttom"></td>
  </tr>
</table>
	</td>
</tr>
</table>
<br>
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;����������稤�ҧ����</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="5%"  height="31" align="center"><strong>�ӴѺ���</strong></td>	
        <td width="9%"  height="31" align="center"><strong>�Ţ����¹</strong></td>
		<td width="22%"  height="31" align="center"><strong>���� - ʡ��</strong></td>
         <td width="12%"  align="center"><strong>��ҹ�Ţ���</strong></td>
		 <td width="12%"  align="center"><strong>�Ţ��������</strong></td>
		 <td width="13%"  align="center"><strong>�ѹ����͡�����</strong></td>
         <td width="8%"  align="center"><strong>�ӹǹ˹���</strong></td>
		 <td width="10%"  align="center"><strong>�ӹǹ�Թ</strong></td>
         <td width="9%"  align="center"><strong>��Ш���͹</strong></td>
          </tr>
		   <?
if($search <>''){
$mname = "" ;
$mcode1 = "";
   $sql_1 =" Select  b.MCODE,pren,name,surn,HNO1,HNO,rec_status,
    if(rec_id is null,'',rec_id)as rec_id,rec_date,
    if(amount is null,'0',amount)as amount ,if(sum_m is null,'0',sum_m)as sum_m , r.myear,p_date,monthh
    from member m,q_water b left join meter r on b.MCODE = r.MCODE
    Where b.mem_id = m.mem_id and rec_status = '��ҧ����' ";
		if($mcode_1 <>'') $sql_1 .="  	and mid(b.MCODE,1,3) = '" .$mcode_1."'  ";
		if($mcode_2 <>'') $sql_1 .="  	and mid(b.MCODE,5) = '" .$mcode_2. "'  ";
		if($name  <> '' ) $sql_1 .=  " and m.name like   '%".$name."' ";
		if($surn  <> '' ) $sql_1 .=  " and m.surn like   '%".$surn."' ";
	 	$sql_1 .= "order by rec_date ";
}
$result_1 = mysql_query($sql_1);
?>
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
if($result_1)
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	//////////////////�礻�/////////////////////
	if ($rs_1[monthh] == '10' or $rs_1[monthh] == '11' or $rs_1[monthh] == '12' ) {
							$Yr = ($rs_1[myear]-1);
				}else{
							$Yr = ($rs_1[myear]);
				}		
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo number_format($i); ?></td>
 <td  height="25"   align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
 <td  height="25"   align="left">&nbsp;<? echo $rs_1[pren] ."".$rs_1[name] ."  ".$rs_1[surn]; ?></td>
 <td  align="center">&nbsp;<?
 if ($rs_1[HNO1]==""or $rs_1[HNO1]=="-") { 
 echo $rs_1[HNO];
 }elseif ($rs_1[HNO]=="0"){ 
 echo "";
 }else{ 
 echo $rs_1[HNO]."/".$rs_1[HNO1];}
 ?></td>
 <td align="center">&nbsp;<? echo $rs_1[rec_id];  ?></td>
  <td  align="center">&nbsp;<? echo date_2($rs_1[rec_date])  ?></td>
 <td align="center">&nbsp;<? echo $rs_1[amount];  ?></td>
 <td  align="center">&nbsp;<? echo number_format($rs_1[sum_m],2)  ?></td>
 <td align="center">&nbsp;<? echo mounth2($rs_1[monthh])." ".substr($Yr,2);?></td>
 <? 
 $mcode1 = $rs_1[MCODE];
 $mname =  $rs_1[pren] ."".$rs_1[name] ."  ".$rs_1[surn];
	}
?>
        </table>
	  </td>
    </tr>
  </table>
</form>
<div align="center">
<input  type="button" name="print" value=" ����� "  onclick="window.open('report10.php?name=<? echo $mname; ?>&mcode=<?=$mcode1?>')"/ class="buttom">

</FONT></center></div> 
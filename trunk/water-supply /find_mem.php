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
		<div > <img src="images/Search.png" align="absmiddle"><!--<img src="PNG-32/Bar Chart.png" align="absmiddle"> -->&nbsp;&nbsp;&nbsp;����¹�������ԡ��</div>	</td>
	</tr>
</table>	</td>
	</tr> 
	<tr class="bmText" height="25">
                    <td width="16%"><strong>&nbsp;&nbsp;�����ҹ</strong></td>
			
                    <td width="84%"><div><?
			$query  ="select * from house  order by HOCODE";
			$result=mysql_query($query);
			?><select name="HOCODE" onChange="dochange('ZONE', this.value)"  >
   <option value=''>----------������---------</option> 
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
			<td width="27%"><strong>&nbsp;&nbsp;�Ţ����¹</strong></td>
                    <td  ><div><input type="text" size="10" name="mcode_1" value="<?=$mcode_1?>"  />- <input type="text" size="10" name="mcode_2"   value="<?=$mcode_2?>"/></div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
                    <td width="27%"><strong>&nbsp;&nbsp;���� - ʡ�� </strong></td>
			
            <td width="73%"><div><input type="text" size="15" name="name" value="<?=$name?>"  />- <input type="text" size="15" name="surn"  value="<?=$surn?>" /></div>				</td>
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
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;�����ż������ԡ��&nbsp;&nbsp;&nbsp;[ <a href="?action=add_mem" class="catLink1">	��������� </a> ]</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="13%"  height="31" align="center"><strong>�Ţ�ͷ����</strong></td>	
        <td width="12%"  height="31" align="center"><strong>�ӹ�˹�Ҫ���</strong></td>
		<td width="21%"  height="31" align="center"><strong>���� - ʡ��</strong></td>
         <td width="14%"  align="center"><strong>�ѹ������</strong></td>
		 <td width="11%"  align="center"><strong>�Ţ�ҵ�</strong></td>
		 <td width="17%"  align="center"><strong>ʶҹ�</strong></td>
         <td width="12%"  align="center"><strong></strong></td>
          </tr>
		   <?
if($search <>''){
		$sql_1 =" Select  q.TMCODE,MCODE,q.mem_id,pren,name,surn,q.RDATE,HNO,MNO,HNO1,MOO,ROAD,";
  		$sql_1 .=" SOI,q.HOCODE,TEL,status,m_total,LINE1,REGIEN,q.scode,honame,tmname,sname";
		$sql_1 .=" from q_water q,member m,house h,type_mem t ,service1 s";
    	$sql_1 .=" where q.mem_id = m.mem_id and q.hocode = h.hocode and t.tmcode = q.tmcode and q.scode = s.scode  ";
		if($HOCODE <>'') $sql_1 .="  	and q.HOCODE = '" .$HOCODE."'  ";
		if($z_id <>'') $sql_1 .=  " and mid(q.MCODE,3,1) = '".$z_id."' ";
		if($mcode_1 <>'') $sql_1 .="  	and mid(MCODE,1,3)= '" .$mcode_1."'  ";
		if($mcode_2 <>'') $sql_1 .="  	and mid(MCODE,5) = '" .$mcode_2. "'  ";
		if($name  <> '' ) $sql_1 .=  " and m.name like   '%".$name."' ";
		if($surn  <> '' ) $sql_1 .=  " and m.surn like   '%".$surn."' ";
	 	$sql_1 .="  order by MCODE  ";
$Per_Page =20;
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
$sql_1 .= " LIMIT $Page_start , $Per_Page";
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
?>       
<a href="?action=view_detail_mem&mcode=<?=$rs_1[MCODE]?>&mem_id=<?=$rs_1[mem_id]?>"  >  
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[pren]; ?></td>
<td  height="25"   align="left">&nbsp;<? echo $rs_1[name] ."  ".$rs_1[surn]; ?></td>
 <td  align="center">&nbsp;<?=date_2($rs_1[RDATE])  ?></td>
 <td > <div align="center">&nbsp;<? echo $rs_1[MNO];  ?> </div></td>
 <td > <div align="center">&nbsp; <? if($rs_1[status] == '¡��ԡ') echo "<font color=red>".$rs_1[status]."</font>";
 else  echo $rs_1[status] ?>   </div></td>
<td  align="center"><a href="?action=view_detail_mem&mcode=<?=$rs_1[MCODE]?>&MNO=<?=$rs_1[MNO]?>" >��� / ¡��ԡ </td></tr></a>
 <? 
	}
?>
        </table>
	  </td>
    </tr>
  </table>
<div align="center"><br>
<center>
  <FONT size="2" >�ըӹǹ ������
<B><?= $Num_Rows;?></B>&nbsp;��¡��&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� : 
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='?action=find_mem&search=$search&Page=$Prev_Page&mcode_1=$mcode_1&mcode_2=$mcode_2&name=$name&surn=$surn&HOCODE=$HOCODE&z_id=$z_id'><< ��͹��Ѻ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)
echo "[<a href='?action=find_mem&search=$search&Page=$i&mcode_1=$mcode_1&mcode_2=$mcode_2&name=$name&surn=$surn&HOCODE=$HOCODE&z_id=$z_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='?action=find_mem&search=$search&Page=$Next_Page&mcode_1=$mcode_1&mcode_2=$mcode_2&name=$name&surn=$surn&HOCODE=$HOCODE&z_id=$z_id'> ˹�ҶѴ�>> </a>";
?>
<br />
</font>
</center>
</div>
</form>

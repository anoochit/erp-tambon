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
<script language="JavaScript" type="text/javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function print_1(theForm) 
	{
		   if (  document.print_1.start.value=='' || document.print_1.start.value==' ' )
           {
				   alert("��سҡ�͡�Ţ�������");
				   document.print_1.start.focus();           
				   return false;
           }
		      if (  document.print_1.end.value=='' || document.end.start.value==' ' )
           {
				   alert("��سҡ�͡�Ţ�������");
				   document.print_1.end.focus();           
				   return false;
           }
		
		if (confirm("�س��ͧ��úѹ�֡������ ���������"))
			{
					return true;
			}else{
					return false;
			}
	}
</script>
<link href="style2.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css"><body>
<form action="" method="post" name="search">
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="4"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;������Ѻ�Թ</div>	</td>
	</tr>
</table>	</td>
	</tr> 
	<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="20%"><strong>&nbsp;&nbsp;�է�����ҳ</strong></td>
			<? $queryMyear  ="select myear from start ";
			$result_Myear=mysql_query($queryMyear);
			if($result_Myear)
			$Myear =mysql_fetch_array($result_Myear);
			?>
                    <td width="24%"  ><div>&nbsp;&nbsp;<select name="year">
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
	 <td width="15%"  ><strong>&nbsp;&nbsp;��͹</strong></td>
	  <td width="41%"  >&nbsp;&nbsp;
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
  </div></td>
                  </tr>
     <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
				   <td  >
				  <strong>&nbsp;&nbsp;�����ҹ</strong>
				  </td>
				  <td >&nbsp;&nbsp;<?
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
			<td  >
				  <strong>&nbsp;&nbsp;��¨Ѵ��</strong>
				  </td>
			 <td >&nbsp;&nbsp;<?
			$query  ="select * from m_bin where line1 != '' group by line1 order by line1";
			$result=mysql_query($query);
			?><select name="line1"  >
  <option value=''>-------������-------</option> 
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[line1];?>"
		<?
		if($line1 == $d[line1]) echo "selected";
		?>
		><? echo $d[line1];?></option>
                        <? }?>
            </select></div>				</td>
          </tr>
				  <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
    <td colspan="4" align="center" height="35" ><input   type="submit"  name="search" value=" ���� "  class="buttom"></td>
  </tr>
</table>
</td></tr></table>
</form>
<form action="rep_print_1.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE?>" method="post" name="f22" onSubmit="return check(this);"  target="_blank"> 
<br>
  <?
if($search <>''){
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
$sql_ex =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo, ";
$sql_ex  .=  "  if(rec_status is null,'��ҧ����',rec_status) as rec_status, ";
$sql_ex  .=  "  if(rec_id is null,'',rec_id)as rec_id, ";
$sql_ex  .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
$sql_ex  .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
$sql_ex  .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
$sql_ex  .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
$sql_ex  .=  "  Where b.mem_id = m.mem_id and b.status = '����'   ";
$sql_ex  .=  "  and  hocode = '" .$HOCODE. "'   ";
if($line1 <>'') $sql_ex  .=  "  and  b.line1 = '" .$line1. "'  ";
$sql_ex  .=  "  group by b.MCODE ";
$Per_Page = 20;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$result_1= mysql_query($sql_ex );
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
}
$result_1 = mysql_query($sql_ex );
?>
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="12" ><div  align="left">&nbsp;&nbsp;&nbsp;&nbsp;������Ѻ�Թ  &nbsp;
	  </div></td>
	  </tr>	
	<?  if($search <>''){  ?>
	  <tr class="lgBar">
      <td  height="30" colspan="12" >
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class="lgBar">
      <td  height="30" colspan="5" ><div   align="center">  
	  <?	   if(Find_rep($monthh,$year,$HOCODE) > 0){?>
	&nbsp;&nbsp;<input  type="button" name="print" value=" �Ţ�������� "  onclick="javascript:popup('add_rep.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE?>','',350,200)"/ class="buttom">
	<? }?>
	  	  &nbsp;<input  type="button" name="print" value=" ��§ҹ㺡ӡѺ��� "  onclick="window.open('rep_bill.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE?>&line1=<?=$line1?>')"/ class="buttom">
		    &nbsp;<input  type="button" name="print" value="����稤���ҧ"  onclick="window.open('rep_bill_stay.php?month=<?=$month?>&year=<?=$year?>&HOCODE=<?=$HOCODE?>&line1=<?=$line1?>')"/ class="buttom"><br>
			</div></td> 
			<td  height="28" colspan="7">
			<? if(Find_rep_1($monthh,$year,$HOCODE) > 0 and $search <>''){ ?><fieldset>
            <legend align="left" ><strong>�����������Ѻ�Թ</strong> </legend>
 �����˵�  <input name="memo" type="text" id="memo" value="<?=$memo?>"  size="35"><br>
              ������ӴѺ���  &nbsp;&nbsp;<input name="start" type="text" size="5" maxlength="4"  class="text" >
         &nbsp;&nbsp;�֧ &nbsp;&nbsp;<input name="end" type="text" size="5" maxlength="4"  class="text" > &nbsp;&nbsp;<input  type="submit" name="print" value="  ����� "  class="buttom" >
            </fieldset>
	  </div> <? }?></td>
          </tr>
</table>
	  </td>
          </tr> 
		  <? }?>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="3%"  height="31" align="center"><strong>���</strong></td>
		<td width="8%"  height="31" align="center"><strong>�Ţ����¹</strong></td>
		<td width="16%"  height="31" align="center"><strong>���� - ʡ��</strong></td>
		<td width="7%"  height="31" align="center"><strong>��ҹ�Ţ���</strong>		</td>
         <td width="9%"  align="center"><strong>�Ţ��������</strong></td>
		 <td width="11%"  align="center"><strong>�ѹ����͡�����</strong></td>
		<td width="12%"  align="center"><strong>����ҳ(�Ե�)</strong></td>
         <td width="9%"  align="center"><p><strong>�ӹǹ�Թ</strong></p></td>
    <td width="8%"  align="center"><p><strong>ʶҹ�</strong></p></td> 
	  <td width="5%"  align="center"><p><strong>�����</strong></p></td> 
	    <td width="5%"  align="center"><strong>���駷��</strong></td> 
		  <td width="7%"  align="center"><p><strong>�����˵�</strong></p></td> 
          </tr>
<?
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
$total=0;
if($result_1)	
while($rs_1=mysql_fetch_array($result_1)){
	$i++;
	if($i%2 ==0) $bg ='#e8edff';
	elseif( $i%2 ==1) $bg ='#FFFFCC';
	$total=$total + ($rs_1[qty]*MONEY());
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $i; ?><input type="hidden" name="num<?=$i?>" value="<?=$i?>"></td>
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
   <td  align="center">&nbsp;<?
   if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1]?></td> 
   <td  height="25"  align="center">&nbsp;<?  if($rs_1[rec_id] =='') echo "";
 else echo $rs_1[rec_id]; ?></td>
 <td > <div align="center">&nbsp;<?
 if($rs_1[rec_id] =='') echo date_2(date("Y-m-d"));
 else echo date_2($rs_1[rec_date]);
   ?> </div></td>
 <td > <div  align="left">&nbsp; <? echo type_name($rs_1[qty]);  ?>   </div></td>
 <td > <div align="center">&nbsp;   <? echo $rs_1[qty];//$rs_1[qty]*MONEY();  ?>  </div></td>
 <td > <div align="center">&nbsp; <? echo $rs_1[rec_status]?>     </div></td>
 <td > <div align="center">&nbsp; <?   if($rs_1[print_status] =='1') echo "P";
 else echo "";?>     </div></td>
 <td > <div align="center">&nbsp;
   <?  echo $rs_1[p_num];  ?> 
  </div></td>
 <td > <div align="center">&nbsp; <?  echo $rs_1[memo];  ?>     </div></td>
</tr>
 <? 
	}
?>
	  <?
	   if($search <> ''){?>
<tr class="style4">
		<td colspan="12" height="40"  valign="middle"><div align="center" class="bmText_1">�ӹǹ��� &nbsp;&nbsp;&nbsp;&nbsp;<?=$i?>&nbsp;&nbsp;&nbsp;&nbsp;  ���
		&nbsp;&nbsp;&nbsp;&nbsp;�ӹǹ�Թ&nbsp;&nbsp;&nbsp;&nbsp; <?=number_format($total)?>  &nbsp;&nbsp;&nbsp;&nbsp;�ҷ
		</div></td>
	</tr>
	<? }?>
        </table>
	  </td>
    </tr>
  </table>
</form>
</body>
</html>
<?
function Find_rep($monthh,$year,$HOCODE){
				$i = 0 ;
				$sql_ex =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo, ";
				$sql_ex  .=  "  if(rec_status is null,'��ҧ����',rec_status) as rec_status, ";
				$sql_ex  .=  "  if(rec_id is null,'',rec_id)as rec_id, ";
				$sql_ex  .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
				$sql_ex  .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
				$sql_ex  .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
				$sql_ex  .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
				$sql_ex  .=  "  Where b.mem_id = m.mem_id and b.status = '����'   ";
				$sql_ex  .=  "  and  hocode = '" .$HOCODE. "'   ";
				$sql_ex  .=  "  group by b.MCODE ";
				$result_1 = mysql_query($sql_ex );
				while($rs_1=mysql_fetch_array($result_1)){
						 if($rs_1[rec_id] =='') {
						 		$i++;
						}
				}
				return $i;
}
function Find_rep_1($monthh,$year,$HOCODE){
				$i = 0 ;
				$sql_ex =" Select  b.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO,moo, ";
				$sql_ex  .=  "  if(rec_status is null,'��ҧ����',rec_status) as rec_status, ";
				$sql_ex  .=  "  if(rec_id is null,'',rec_id)as rec_id, ";
				$sql_ex  .=  "  if(p_date is null,'',p_date)as p_date,rec_date,";
				$sql_ex  .=  "  if(qty is null,'',qty)as qty,print_status, if(total is null,'',total)as total,if(p_num is null,'',p_num) as p_num,if(memo is null,'',memo) as memo ";
				$sql_ex  .=  "  from member m,m_bin b left join receive r on b.MCODE = r.MCODE ";
				$sql_ex  .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
				$sql_ex  .=  "  Where b.mem_id = m.mem_id and b.status = '����'   ";
				$sql_ex  .=  "  and  hocode = '" .$HOCODE. "'   ";
				$sql_ex  .=  "  group by b.MCODE ";
				$result_1 = mysql_query($sql_ex );
				while($rs_1=mysql_fetch_array($result_1)){
						 if($rs_1[rec_id] <>'') {
						 		$i++;
						}
				}
				return $i;
}
?><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
<script language="JavaScript" type="text/javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function check(theForm) 
	{
		if (  document.f22.start.value=='' || document.f22.start.value==' ' )
           {
           alert("��سҡ�͡�Ţ����������");
           document.f22.start.focus();           
           return false;
           }
		      if (  document.f22.end.value=='' || document.f22.end.value==' ' )
           {
           alert("��سҡ�͡�Ţ�������ش");
           document.f22.end.focus();      
           return false;
           }
		 
		   if (confirm("�س��ͧ��þ��������� ���������"))
			{
					return true;
			}else{
					return false;
			}
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($save_as <>''){
			if($total <> '' and $chk <>''){
				for ($i=0;$i<=$total;$i++) {
					if ($chk[$i] != "") { 
							$k = explode("*",$chk[$i]);
							$sql_insert="update receive  set rec_status ='��������' , p_date = '".date_format_sql($pdate)."' where mcode = '".$k[0]. "' and  rec_id ='".$k[1]. "'  ";
							$result_insert  = mysql_query($sql_insert); 
					}
				}	
						echo "<center><img src=\"images/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
						echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ�úѹ�֡������</font></center><br><br>";
		 				print "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?action=frm_pay&year=$year&month=$month&HOCODE=$HOCODE&search=$search\">\n";
			}
	}
?>
<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};
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
<form action="" method="post" name="f22">
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="4"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;�׹�ѹ������Ѻ�Թ����������</div>	</td>
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
<br>
</form>
<form action="" method="post" name="pay"> 
  <?
if($search <>''){
$ex = substr($month,0,1);
if($ex =='0') $monthh = substr($month,1);	
else $monthh = $month;	 
$sql_ex =" Select  c.MCODE,concat(pren,name,'  ',surn) as name,HNO1,HNO, ";
$sql_ex  .=  "  rec_status,rec_id,rec_date, ";
$sql_ex  .=  "  qty , total ";
$sql_ex  .=  "   from member m,m_bin b, receive c ";
$sql_ex  .=  "  Where b.mem_id = m.mem_id  ";
$sql_ex  .=  "  and rec_status = '��ҧ����' and c.MCODE = b.MCODE ";
$sql_ex  .=  "  and monthh = '" .$monthh. "' and myear = '" .$year. "'   ";
$sql_ex  .=  "  and hocode  = '" .$HOCODE. "'   ";
if($line1 <>'') $sql_ex  .=  "  and  b.line1 = '" .$line1. "'  ";
$sql_ex  .=  "  order by rec_id";
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
<?  if($Num_Rows >0){?>
  <tr class="bmText"  bgcolor="#b9c9fe">
  <td width="8%"  height="31"  align="left" colspan="9"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѹ������
      <input name="pdate" type="text" id="pdate" value="<? if($pdate =='') echo date("d/m/Y") ;else echo $pdate;?>"  size="10" /class="text"  >

                  &nbsp; <img  src="images/calculator_add.png" onClick="showCalendar('pdate','DD/MM/YYYY')" align="absmiddle"   />
				  	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<input  type="submit" name="save_as" value="  �ѹ�֡ "  onClick="return validate();"class="buttom" >
					 <input type="hidden" name="year" value="<?=$year?>">
					 <input type="hidden" name="month" value="<?=$month?>">
					  <input type="hidden" name="HOCODE" value="<?=$HOCODE?>">
					  <input type="hidden" name="search" value="<?=$search?>">
				  </td></tr>
<? }?>
  <tr class="bmText"  bgcolor="#DEE4EB">
  <td width="8%"  height="31" align="center"><strong>���͡������<br>
  <input name="allbox" onClick="selectall();" type="checkbox">
</strong></td>
        <td width="4%"  height="31" align="center"><strong>���</strong></td>
		<td width="17%"  height="31" align="center"><strong>�Ţ����¹</strong></td>
		<td width="26%"  height="31" align="center"><strong>���� - ʡ��</strong></td>
		<td width="8%"  height="31" align="center"><strong>��ҹ�Ţ���</strong>		</td>
         <td width="11%"  align="center"><strong>�Ţ��������</strong></td>
		 <td width="11%"  align="center"><strong>�ѹ����͡�����</strong></td>
		<td width="8%"  align="center"><strong>�ӹǹ�Թ</strong></td>
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
 <td  height="25"  align="center">&nbsp;<input  type="checkbox" name='chk[<?=$i?>]' value="<? echo $rs_1[MCODE]."*".$rs_1[rec_id]?>"></td>
 <td  height="25"  align="center">&nbsp;<? echo $i; ?><input type="hidden" name="num<?=$i?>" value="<?=$i?>"></td>
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[MCODE]; ?></td>
  <td  height="25"   align="left">&nbsp;<? echo $rs_1[name]; ?></td>
   <td  align="center">&nbsp;<?
   if($rs_1[HNO1] =='' or $rs_1[HNO1] =='-') echo $rs_1[HNO]  ;  
   else echo $rs_1[HNO] ."/" .$rs_1[HNO1]?></td> 
   <td  height="25"  align="center">&nbsp;<? echo $rs_1[rec_id]; ?></td>

 <td > <div align="center">&nbsp;<?
 if($rs_1[rec_id] =='') echo date_2(date("Y-m-d"));
 else echo date_2($rs_1[rec_date]);
   ?> </div></td>
 <td > <div align="center">&nbsp; <? echo $rs_1[qty];  ?>   </div></td>
</tr>
 <? 
	}
?>
<?  if($Num_Rows >0){?>
<tr class="style4">
		<td colspan="12" height="40" class="style5"  valign="middle"><div align="center">�ӹǹ��� <span class="style6">&nbsp;&nbsp;&nbsp;&nbsp;<?=$i?>&nbsp;&nbsp;&nbsp;&nbsp; </span> ���
		&nbsp;&nbsp;&nbsp;&nbsp;�ӹǹ�Թ&nbsp;&nbsp;&nbsp;&nbsp; <span class="style6"><?=number_format($total)?> </span> &nbsp;&nbsp;&nbsp;&nbsp;�ҷ
		<br><input type="hidden" name="total" value="<?=$i?>">
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
<script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
<script language="JavaScript" type="text/javascript">
function CheckAll() {
			for (var i = 0; i < document.pay.elements.length; i++) {
					if(document.pay.elements[i].type == 'checkbox'){
							document.pay.elements[i].checked = !(document.pay.elements[i].checked);
					}
			}
}
      function checkAll(field) {
      if(document.pay.CheckAll.checked)
      {
      for (i = 0; i < field.length; i++)
      field[i].checked = true;
      }
      else
      {
      for (i = 0; i < field.length; i++)
      field[i].checked = true;
      }
      }
	 
function selectall(){
	for (var i=0;i<document.pay.elements.length;i++)
	{
		var e = document.pay.elements[i];
		if (e.name != 'allbox')
			e.checked = document.pay.allbox.checked;
	}
}

function validate(theForm) 
	{
		if (  document.pay.pdate.value=='' || document.pay.pdate.value==' ' )
           {
           alert("��سҡ�͡�ѹ������");
           document.pay.pdate.focus();           
           return false;
           }
		var j =0;
		
		var v8 = document.pay.total.value;
		for (i=1;i<= eval(v8) ;++i) {
			if(document.pay["chk["+i+"]"].checked == true){
				j++;
			}
		 }
		 if( j <= 0){
			alert("��س����͡��¡�÷������Թ");
			return (false);
		}


		  	if (confirm("�س��ͧ��úѹ�֡������ ���������")){
					return true;
			}else{
					return false;
			}
	}
</script>
</script>

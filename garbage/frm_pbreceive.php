<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
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
<table  width="80%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="1" cellpadding="1" align="center">
<tr class="bmText">
    <td  colspan="4"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar" height="25"  >
		<div > <img src="images/Search.png" align="absmiddle">&nbsp;&nbsp;&nbsp;�����������Ѻ�Թ��͹��ѧ</div>	</td>
	</tr>
</table>	</td>
	</tr> 
	<tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText" height="25">
			<td width="15%"><strong>&nbsp;&nbsp;���� -ʡ��</strong></td>
                    <td width="28%"  ><div>&nbsp;&nbsp;<input type="text" name="nsurn" value="<?=$nsurn?>" size="20">
	</div></td>
	 <td width="14%"  ><strong>&nbsp;&nbsp;�Ţ����¹</strong></td>
	  <td width="43%"  >&nbsp;&nbsp;
	    <input type="text" name="MCODE" value="<?=$MCODE?>" size="20">
  </div></td>
                  </tr>
     <tr><td colspan="4" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText" height="25">
    
				   <td  >
				  <strong>&nbsp;&nbsp;�Ţ��������</strong>
				  </td>
				  <td colspan="4">&nbsp;&nbsp;<input type="text" name="rec_id" value="<?=$rec_id?>" size="20"></div>				</td>
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
if($search <>'' and ($nsurn <>''or $MCODE <>'' or $rec_id <>'')){
$sql_ex =" select m2.MCODE,concat(pren,name,'  ',surn) as name, rec_id,rec_date, ";
$sql_ex  .=  "  qty,total,MYEAR, MONTHH,HNO1,HNO,moo ";
$sql_ex  .=  "  FROM m_bin m2,member m,receive r  ";
$sql_ex  .=  "   Where m2.mem_id = m.mem_id ";
$sql_ex  .=  "  and m2.mcode = r.mcode and m2.status = '����' and rec_status <> '¡��ԡ'   ";
if($nsurn <> ''){ 
		$sql_ex  .=  "  and (name like  '%" .$nsurn. "%'   ";
		$sql_ex  .=  "  or surn  like  '%" .$nsurn. "%' )  ";
}
if($MCODE <> '') $sql_ex  .=  "  and m2.MCODE  like   '" .$MCODE. "'   ";
if($rec_id <> '') $sql_ex  .=  "  and rec_id  like     '" .$rec_id. "'   ";
$sql_ex  .=  "  order by m2.MCODE   ";
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
$sql_ex  .= " LIMIT $Page_start , $Per_Page";
}
$result_1 = mysql_query($sql_ex );
?>
  <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="7%"  height="31" align="center"><strong>���</strong></td>
		<td width="12%"  height="31" align="center"><strong>�Ţ����¹</strong></td>
		<td width="23%"  height="31" align="center"><strong>���� - ʡ��</strong></td>
		<td width="11%"  height="31" align="center"><strong>��ҹ�Ţ���</strong>		</td>
        <td width="11%"  align="center"><strong>�Ţ��������</strong></td>
		<td width="14%"  align="center"><strong>�ѹ����͡�����</strong></td>
         <td width="11%"  align="center"><p><strong>�ӹǹ�Թ</strong></p></td>
 <td width="5%"  align="center"><p><strong>�����</strong></p></td> 
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
 <td  height="25"  align="center">&nbsp;<? echo $rs_1[rec_id]; ?></td>
 <td > <div align="center">&nbsp;<?
 if($rs_1[rec_id] =='') echo date_2(date("Y-m-d"));
 else echo date_2($rs_1[rec_date]);
   ?> </div></td>
 <td > <div align="center">&nbsp; <? echo $rs_1[qty];  ?>   </div></td>
 <td align="center" ><a href="#" onClick="window.open('rep_print_2.php?MCODE1=<?=$rs_1[MCODE]?>&rec_id1=<?=$rs_1[rec_id]?>')"><img   src="images/print_16.png"border="0" /></a></td>
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
<span class="bmText" >
<center>�ӹǹ ������
<B><?= $Num_Rows;?></B>&nbsp;��¡��&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� :  
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=frm_pbreceive&search=$search&Page=$Prev_Page&nsurn=$nsurn&MCODE=$MCODE&rec_id=$rec_id'><< ��͹��Ѻ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)
echo "[<a href='$PHP_SELF?action=frm_pbreceive&search=$search&Page=$i&nsurn=$nsurn&MCODE=$MCODE&rec_id=$rec_id'>$i</a>]";
else 
echo "<b> $i </b>";
}
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=frm_pbreceive&search=$search&Page=$Next_Page&nsurn=$nsurn&MCODE=$MCODE&rec_id=$rec_id'> ˹�ҶѴ�>> </a>";
?>
</center><br>
</span> 
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

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($_POST[save] <>''){
	//echo $_GET[r_id] ."vvv".$_GET[rd_id]."<br>";
		if( check_num($paper_id) ==''){
				$o_id = max_id1();
				$sql_open="INSERT INTO open (o_id,num_id,paper_id,open_date,mon_type,div_id,sub_id,detail) 
				VALUES ('$o_id','$num_id','$paper_id','".date_format_sql($move_date)."','$mon_type','$div_id','$sub_id','$detail')";
				//echo "\$sql_open  ".$sql_open."<br>";
				$result_open  = mysql_query($sql_open); 
					
				for ($i=0;$i<=$total;$i++) {
						if ($chk[$i] != "") { 
						
								$sql_up = "UPDATE code SET o_id = '$o_id' WHERE c_id =$chk[$i] ";
								//echo "\$sql_up  ".$sql_up."<br>";
								$result_up  = mysql_query($sql_up); 
								
								$sql_mo = "INSERT INTO move (c_id,date_move,div_id,r_id,detail,o_id) 
				VALUES ('$chk[$i]','".date_format_sql($move_date)."','$div_id','$sub_id','$remark','$o_id') ";
								//echo "\$sql_mo  ".$sql_mo."<br>";
								$result_mo  = mysql_query($sql_mo); 
						}
				}
				echo "<br><center><font color=red size=3>�ѹ�֡���������º��������</font></center><br>";	
				print "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?action=seach_move\">\n";
		}elseif( check_num($paper_id) <>''){
			echo "<br><center><font color=red size=3>�Ţ����¹�͡��ë�� ��سҡ�͡����������</font></center><br>";			
			print "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?action=seach_move&o_id=$_GET[o_id]\">\n";
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

function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

//dochange �ж١���¡������ա�����͡ ��¡�� Combobox ��觨з��������¡ AJAX ������ͧ�͢����ŶѴ仨ҡ Server
function dochange(src, val) {

	//alert(val);
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //�Ѻ��ҡ�Ѻ��
               } 
          }
     };
	//alert(val);
	//window.open( "ajax_1.php?data="+src+"&val="+val);
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
	 //alert(val);
}
function selectall(){
	//alert(document.f5.total.value);

if(document.f5.allbox.checked == true){
	for (var i=0;i<document.f5.total.value;i++)
	{
			 document.f5["chk["+i+"]"].checked = true;
	}
}else{
	for (var i=0;i<document.f5.total.value;i++)
	{
			 document.f5["chk["+i+"]"].checked = false;
	}
}
}
function q_confirm()
{
	if (confirm("�׹�ѹ������� ���������"))
	{
		return true;
	}
		return false;
}
</script>
<script language="JavaScript" type="text/JavaScript">
	function check_1(theForm) 
	{
		if(document.f5.num_id.value == ''){
			alert("��سҡ�͡�Ţ�����ԡ");
			document.f5.num_id.focus();      
			return (false);
		}
		if(document.f5.paper_id.value == ''){
			alert("��سҡ�͡�Ţ����͡���");
			document.f5.paper_id.focus();      
			return (false);
		}
		if(document.f5.div_id.value == ''){
			alert("��س����͡Ἱ�");
			document.f5.div_id.focus();   
			return (false);
		}
		if(document.f5.sub_id.value == ''){
			alert("��س����͡��ͧ");
			document.f5.sub_id.focus();   
			return (false);
		}
		var j = 0;	
			for (i=0;i<eval(document.f5.total.value);++i) {
				//alert(document.f5["chk["+i+"]"].checked );
					if(document.f5["chk["+i+"]"].checked == true ){
							j++;
					}
			 }
			if( j <= 0){
				alert("��س����͡��¡�÷���ͧ�������");
				return (false);
			}
		return (true);
	}
	</script>
</script>
<body><br>
<form name="f_5" method="post"  action=""  >
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td align="center" colspan="2" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div >������¤���ѳ��</div>	</td>
	</tr>
</table></td>
</tr>
</table>
<br>
<table width="98%" border="1" cellspacing="0" cellpadding="3" align="center">
  <tr class="bmText">
    <td width="14%" height="30"><strong>&nbsp;���ͤ���ѳ��</strong></td>
    <td width="86%">&nbsp;&nbsp;<input type="text" name="rd_name" value="<?=$rd_name?>" size="30"></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;�Ţ����ѳ��</strong></td>
    <td>&nbsp;&nbsp;<input type="text" name="code1" value="<?=$code1?>" size="30"></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;�ͧ</strong></td>
    <td><div><?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?><select name="div_id1"  onchange="dochange('sub_div', this.value);" >
<option value="">- - - - - - - - -��س����͡- - - - - - - - - </option> 
  <?
			while($d =mysql_fetch_array($result)){
				
?>
  <option value="<? echo $d[div_id];?>"
		<?
		if($div_id1 == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select> <br /></div></td>
  </tr>
  <tr class="bmText">
    <td height="30"><strong>&nbsp;����</strong></td>
    <td><div id="sub_div"    ><?
	if($div_id1 <>''){
			      $query  ="select *  from division d,subdivision s
        where  1 = 1 and d.div_id = s.div_id
        and d.div_id like '%$div_id1%' 
		group by s.sub_name
        order by s.sub_id ";
		 $result = mysql_query($query);
          echo "<select name='sub_id1' ";
		   echo ">";
         echo "<option value=''>- - - - - - - - -��س����͡- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[sub_id]' ";
		if($sub_id1 ==   $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select>\n";  



}else{
	 ?>
	 <select name='sub_id1' >
	<option value="">- - - - - - - - -��س����͡- - - - - - - - - </option> 
	</select>
<? }?>	
		</div></td>
  </tr>
  
  <tr class="bmText" >
  <td width="14%" ><strong>&nbsp;�ѹ����ԡ</strong></td>
    <td width="86%"   >&nbsp;&nbsp;<input type="text" name="open_date" value="<?  if($open_date<>'') echo $open_date// if($open_date =='') echo date("d/m/Y") ;else echo $open_date;?>"  size="10" />
                  &nbsp; <img src="images/calendar.png" onClick="showCalendar('open_date','DD/MM/YYYY')"   width='19'  height='19'>  &nbsp;  �֧ &nbsp; <input type="text" name="open_date1" value="<? if($open_date1<>'')  echo $open_date1 //if($open_date1 =='') echo date("d/m/Y") ;else echo $open_date1; ?>"  size="10" />
      &nbsp; <img src="images/calendar.png" onClick="showCalendar('open_date1','DD/MM/YYYY')"   width='19'  height='19'>	  </td>
	</tr>
  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ���� " ></td>
  </tr>
</table>
</form>
<? if($search <>''){?>
<form name="f5" method="post"  action=""  onsubmit="return check_1(this);" >
<br>
<?

	$sql="SELECT * from receive r,receive_detail rd,code c  ,open o
 WHERE 1 = 1 and r.r_id = rd.r_id and c.rd_id = rd.rd_id  and c.o_id = o.o_id ";
if($div_id1 <> '' ){
	$sql .= " AND o.div_id= '$div_id1'  ";
}
if($sub_id1 <> '' ){
	$sql .= " AND o.sub_id = '$sub_id1'  ";
}
if($rd_name <> '' ){
	$sql .= " AND rd.rd_name like '$rd_name%'  ";
}
if($code1 <> '' ){
	$sql .= " AND c.code like '$code1%'  ";
}
if($open_date <> '' and $open_date1 <>''){
	$sql .= " AND o.open_date >= '".date_format_sql($open_date)."' AND o.open_date <= '".date_format_sql($open_date1)."'  ";
}
if($type <> '' ){
	$sql .= " AND rd.type_id = '$type'  ";
}
$sql .= " order by o.open_date,c.code  ";

$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows = mysql_num_rows($result);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))

print "<center><b>�ӹǹ $Page �ҡ���� $Num_Pages �ѧ����բ�ͤ���<b></center>";
$result1 = mysql_query($sql);

?>
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  ><table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
      <tr class="lgBar">
        <td  height="28" colspan="6"><div  align="left">&nbsp;&nbsp;����  ������¤���ѳ��</div></td>
      </tr>
      <tr>
        <td colspan="6"><table width="100%">
            <tr class="bmText">
              <td width="15%" height="30">�Ţ�������� / �ԡ</td>
              <td width="35%"><div>
                <input type="text" name="num_id" value="<?=$num_id?>" />
                <font color="#FF0000" ></font></div></td>
              <td width="16%">����¹�͡���</td>
              <td width="34%"><div>
                <input name="paper_id" type="text" value="<? echo $paper_id;?>"  />
              </div></td>
            </tr>
            <tr class="bmText">
              <td width="15%">�ѹ�������</td>
              <td width="35%"><div>
                <input name="move_date" type="text" id="move_date" value="<? if($move_date =='') echo date("d/m/Y") ;else echo $move_date;?>"  size="10" />
                &nbsp; <img src="images/calendar.png" onClick="showCalendar('move_date','DD/MM/YYYY')"   width='19'  height='19'></div></td>
              <td>�ͧ</td>
              <td><div>
                <?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?>
                <select name="div_id"  onChange="dochange('sub_div_1', this.value);" >
                    <option value="">- - - - - - - - -��س����͡- - - - - - - - - </option>
                    <?
			while($d =mysql_fetch_array($result)){
				
?>
                    <option value="<? echo $d[div_id];?>"
		<?
		if($div_id == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
                    <? }?>
                  </select>
                  <br />
              </div></td>
            </tr>
            <tr class="bmText">
              <td >����</td>
              <td colspan="3"><div id="sub_div_1"    >
                <?
	if($sub_id <>''){
			      $query  ="select *  from division d,subdivision s
        where  1 = 1 and d.div_id = s.div_id
        and d.div_id like '%$div_id%' 
		group by s.sub_name
        order by s.sub_id ";
		 $result = mysql_query($query);
          echo "<select name='sub_id' ";
		   if($new1 =='old')  echo "disabled='disabled'";
		   echo ">";
         echo "<option value=''>- - - - - - - - -��س����͡- - - - - - - - - </option>\n";
        while($fetcharr = mysql_fetch_array($result)) { 
              echo "<option value='$fetcharr[sub_id]' ";
		if($sub_id ==   $fetcharr['sub_id'] ) echo "selected";
			    echo " >$fetcharr[sub_name]</option> \n" ;
          }
		 echo "</select>\n";  
}else{
	 ?>
                  <select name='sub_id' >
                    <option value="">- - - - - - - - -��س����͡- - - - - - - - - </option>
                  </select>
                  <? }?>
              </div></td>
            </tr>
            <tr class="bmText">
              <td width="13%">�������Թ</td>
              <td width="34%"><div>
                <select name="mon_type" <? if($new1 =='old')  echo "disabled='disabled'"?>>
                    <option value='' <? if($mon_type =="") echo "selected"?>> - - - - ��س����͡ - - - - -</option>
                    <option value='�Թ������ҳ' <? if($mon_type =='�Թ������ҳ') echo "selected"?>>�Թ������ҳ</option>
                    <option value='�Թ�͡������ҳ' <? if($mon_type =='�Թ�͡������ҳ') echo "selected"?>>�Թ�͡������ҳ</option>
                    <option value='�Թ��ԨҤ/�Թ���������' <? if($mon_type =='�Թ��ԨҤ/�Թ���������') echo "selected"?>>�Թ��ԨҤ/�Թ���������</option>
                    <option value='����' <? if($mon_type =='����') echo "selected"?>>����</option>
                  </select>
              </div></td>
			     <td width="13%">����</td>
              <td width="34%"><div>
               <input type="text" name="detail" value="<?=$detail?>">
              </div></td>
            </tr>
        </table></td>
      </tr>
      <tr class="bmText"  bgcolor="#C1E0FF">
        <td width="69" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">���͡������<br />
                      <input type="checkbox" name="allbox" onClick="selectall();" >
        </font></span></b> </div></td>
        <td width="100"  align="center" height="30"><strong>�ѹ����ԡ</strong></td>
        <td width="194"  align="center" height="30"><strong>���ͤ���ѳ�� </strong></td>
        <td width="242"  align="center" height="30"><strong>�Ţ����ѳ��</strong></td>
        <td width="94"  align="center" height="30"><strong>&nbsp;</strong></td>
      </tr>
      <?
$i = 0;
while($rs=mysql_fetch_array($result1)){
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>
      <tr class="bmText" bgcolor="<? echo $bg?>" >
        <td align="center" height="30">&nbsp;
            <input type='checkbox' name='chk[<?=$i?>]' value="<? echo $rs["c_id"]?>"></td>
        <td  align="center"><font size="2">&nbsp;<? 
 echo date_2($rs[open_date]) ;
  ?>
        </font></td>
        <td ><div align="left"><font size="2">&nbsp;
                <? 
	    echo $rs[rd_name];
 ?>
        </font></div></td>
        <td ><div align="left"><font size="2">&nbsp;<a href="#" onClick="javascript:window.open('Sample_11.php?c_id=<?=$rs[c_id]?>','xxx','scrollbars=yes,width=450,height=400');window.navigate('?action=seach_move&rd_name=<?=$rd_name?>&code1=<?=$code1?>&div_id1=<?=$div_id1?>&sub_id1=<?=$sub_id1?>&open_date=<?=$open_date?>&open_date1=<?=$open_date1?>&search=<?=$search?>');"><? echo $rs["code"] ;
 ?></a></font></div></td>
        <td  align="center"><font size="2">&nbsp;<a href="#" onClick="javascript:window.open('show_move.php?c_id=<?=$rs["c_id"]?>','xxx','scrollbars=yes,width=650,height=400')" >��������´</a></font></td>
      </tr>
      <? 

	$i++;
}?>
      <input type="hidden" name="total" value="<? echo $i?>">
      <tr bgcolor="#CCCCCC">
        <td style="border-width:0; border-color:white; border-style:solid;"  colspan="7"  align="center" height="30"><strong><font size="2">
          <input   type="submit" name='save' value="�ѹ�֡"   onClick="return q_confirm();">
          &nbsp;&nbsp;
          <input   type="button"  name='cancel' value="¡��ԡ"  onClick="javascript:window.location='index.php?action=seach_move&o_id=<?=$o_id?>';">
        </font></strong></td>
      </tr>
    </table></td>
    </tr>
  </table>
</form>
<? 
}?>
</body>
</html>
<?
function check_num($paper_id){
	$sql = "SELECT * FROM open  Where paper_id = '$paper_id'  ";
	$result = mysql_query($sql);
	$rs=mysql_fetch_array($result);
	return $rs[num_id];
}
function max_id1(){
	$sql = "Select max(o_id) as max  from  open ";
			$result = mysql_query($sql); 
			$recn = mysql_fetch_array($result) ;
			$max = $recn[max];
			if($max == NULL or $max == ''){ //�����ҧ
				$id = "1";
			} else{
				$id =  $max + 1; //gene ��� sale_id 
			}
		return $id;
}
?>
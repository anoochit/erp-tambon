
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
function godel()
{
	if (confirm("�س��ͧ���¡��ԡ��¡�ù�� ���������"))
	{
		return true;
	}
		return false;
}
</script>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
		   if (  document.type.type_name.value.length == 0 || document.type.type_name.value==' ' )
           {
           alert("��سҡ�͡���ͻ�������Ѿ���Թ");
           document.type.type_name.focus();           
           return false;
           }
			return true;
	}
</script>
<?

//-----------�ѹ�֡-------------------
if($save_add <>'' and  find_id($type_name) <=0){
	$t_id = find_max_id();
	$query=" INSERT INTO type (t_id,type_name,time_use,degen,type_id)
		 VALUES ('$t_id','$type_name','$time_use','$degen' , '$type_id' )";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ�úѹ�֡������</font></center><br><br>";
        print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_type\">\n";
		mysql_close($connect);	
}elseif($save_add <>'' and  find_id($type_name) > 0){//end save
	echo "<br><br><center><font color=darkgreen>���ͻ�������Ѿ���Թ��Ӻѹ�֡����������</font></center><br><br>";
     print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_type\">\n";
}


//----------ź--------------
if($del =='del'){
	 	$sql="DELETE FROM  type   WHERE  t_id = $t_id";
  		 $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ����䢢�����</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_type\">\n";
		mysql_close();	

}

?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<br />
<form name="type"  method="post">
<table width="75%" border="0" cellspacing="0" cellpadding="0" align="center">
  
      <tr>
        <td align="center"><input type="text" name="word" value="<?=$word?>" />&nbsp;<input type="submit" name="search" value=" ���� "  class="buttom"/></td>
      </tr>
  </table><br />
<table width="70%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2"><div>������������Ѿ���Թ</div></td>
  			</tr>
			<tr>
              <td width="30%" align="right"  class="bmText" a>��Ǵ</td>
              <td width="70%" align="left">&nbsp;&nbsp;
<select name="type_id">
<option value="0" <? if($type_id == 0) echo "selected"?>>�ѧ�������Ѿ��</option>
<option value="1" <? if($type_id == 1) echo "selected"?>>��ѧ�������Ѿ��</option>
</select>
</td>
            </tr>
			<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
            <tr>
              <td a align="right"  class="bmText">��������Ѿ���Թ</td>
              <td width="70%" align="left">&nbsp;&nbsp;
<input name="type_name" type="text" id="type_name" value="<?=$type_name?>" size="30" maxlength="255" /></td>
            </tr>
<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
<tr>
	<td height="54" colspan="3" align="center">
	  
<input name="save_add" type="submit"  value="�ѹ�֡������"  onClick="return validate()" class="buttom"/>	  &nbsp;
	  <input type="reset" name="reset" value=" ¡��ԡ " onClick="window.navigate('?action=add_type')" class="buttom">
     </td>
</tr>
</table>
</td></tr></table>
</form>
<?

//-----------�ʴ�������-------------------
   $sql="SELECT * FROM type  ";
   if($search <>'' and $word <>''){
		$sql .=" where type_name like '%$word%' ";
	}
	 $sql .=" order by  type_id,t_id ";
   
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
$sql .= " LIMIT $Page_start , $Per_Page";
	
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
<table  width="80%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
  <tr bgcolor="#99CCFF" class="lgBar">
    <td width="20%" style="border: #000000 1px solid;"><div align="center">��Ǵ</div></td>
	<td width="34%" style="border: #000000 1px solid;"><div align="center">��������Ѿ���Թ</div></td>
    <td width="7%" style="border: #000000 1px solid;"><div align="center">&nbsp;</div></td>
  </tr>
  <?
	 $r=0;
		while ($d =mysql_fetch_array($result)){
	$r++;
	?>
  <tr class="bmText">
   <td  align="left" height="30" style="border: #000000 1px solid;">&nbsp;
        <? if($d[type_id] == 0) echo "�ѧ�������Ѿ��" ;
		if($d[type_id] == 1) echo "��ѧ�������Ѿ��" ;
		 ?></td>
    <td  align="left" height="30" style="border: #000000 1px solid;">&nbsp;
        <?=$d[type_name]?></td>
    <td align="center" style="border: #000000 1px solid;"><? // if($d[status]==0){?>
        <a href="?action=edit_type&t_id=<? echo $d[t_id] ?>">���</a>
        <? // }?></td>
  </tr>
  <? }?>
</table>
</td>
</tr></table>
<? 
		mysql_close();	
?>
<div align="center"><br>
<center><FONT size="2" >�ӹǹ ������<b>
<?= $Num_Rows;?>
</b>&nbsp;��¡��&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� :  
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=add_type&Page=$Prev_Page&type_name=$type_name&search=$search&word=$word'><< ��͹��Ѻ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=add_type&Page=$i&type_name=$type_name&search=$search&word=$word'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=add_type&Page=$Next_Page&type_name=$type_name&search=$search&word=$word'> ˹�ҶѴ�>> </a>";

?>
</FONT>
</center></div> 
</body>

</html>
<?
function find_id($type_name){
	$sql1 ="select * from type where  type_name= '$type_name' ";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
	function find_max_id() {
	
		$sql = "Select max(t_id) as max  from type  ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		$max = $recn[max];
		if($max == NULL or $max == ''){ //�����ҧ
			$rd_id = "1";
		} else{
			$rd_id =  $max + 1; //gene ��� sale_id 
		}
		return $rd_id;
	}
?>
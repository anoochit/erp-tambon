<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();

if($delete_1 <> ''){

	$sql = "DELETE FROM receive WHERE r_id=$r_id";
	$result = mysql_query($sql);
	$sql_del = "DELETE FROM receive_detail WHERE r_id=$r_id";
	$result_del = mysql_query($sql_del);
	
	
	echo "<br><br><center><font color=darkgreen >�к��ӡ��ź���������º��������</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=seach_edit_2\">\n";
}

if($del == 'del'){

	$sql_del = "DELETE FROM receive_detail WHERE rd_id=$rd_id";
	$result_del = mysql_query($sql_del);
	echo "<br><br><center><font color=darkgreen >�к��ӡ��ź���������º��������</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=view_detail_1_p&r_id=$r_id\">\n";
}
	?>
<div align="center">
<?
?><br />
<form name="save"  method="post" enctype="multipart/form-data">
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center"    >
  <tr>
    <td align="center" colspan="2" style="border: #66CCFF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		��� / ź ����¹��ѧ�������Ѿ�� </td>
	</tr>
</table></td>
</tr>
</table><br />

<table width="98%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;" >
	<?
	$r_id = $_REQUEST["r_id"] ;

$sql = "SELECT * FROM receive WHERE r_id= $r_id";
//echo $sql."<br>";
$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
	$r_id = $rs[r_id];
	?>
	<div><b><font color="#FF0066" size="2" face="Tahoma">����¹�͡���</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<font size="2"><? echo $rs["paper_id"]?></font></div>
	<div><b><font color="#FF0066" size="2" face="Tahoma">�ѹ���������Է���</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><?=date_2($rs["date_receive"])?></font></div>
	<div><b><font color="#FF0066" size="2" face="Tahoma">�Ըա������ </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<font size="2"><? 
	if($rs["come_in"] =='0')echo '�����' ;
	else if($rs["come_in"] =='1')echo '�ش˹ع' ;
	else if($rs["come_in"] =='2')echo '��ԨҤ' ;
	else if($rs["come_in"] =='3')echo '�Թ���' ;
	else if($rs["come_in"] =='4')echo '����' ;
	?>
	</font></div>
	</font>
<div align="center"><input   type="button" name="add" value=" ��� " onClick="javascript:popup('sample_1_1.php?r_id=<?=$rs["r_id"]?>','',400,200)" class="buttom">
<? 
	if(find_code_open_all($rs["r_id"]) =="true"){
	?>
&nbsp;&nbsp;&nbsp;<input   type="submit" name="delete_1" value="¡��ԡ㺵�Ǩ�Ѻ"  onclick="return godel_1();" class="buttom">
<?
 		}
 ?>
</div>
	</td>
	</tr>
</table>
<br />
<table width="98%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;">
<table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
<tr bgcolor="#C1E0FF"   ><td colspan="9" height="35" style="border: #000000 1px solid;" class="lgBar">&nbsp;&nbsp;[ 
 <a href="#" onClick="javascript:popup('sample_9_1.php?r_id=<?=$rs["r_id"]?>','',550,250)"  class="bar_add">������¡��</a>  ]
</td></tr>
<tr class="bmText"  bgcolor="#C1E0FF" >
              <td height="28"width="13%" style="border: #000000 1px solid;" ><div align="center"> <b><span style="font-size:9pt;"><font face="tahoma">������</font></span></b> </div></td>
                                                  <td width="15%" style="border: #000000 1px solid;" ><div align="center">
                                                     <b><span style="font-size:9pt;"><font face="tahoma">������ѧ�������Ѿ��</font></span></b>
              </div></td>
                                                  
                                                  <td width="12%"  align="center" style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">�Ҥ�</font></span></b>  </td>
              <td width="13%" style="border: #000000 1px solid;" ><div align="center"><b><span style="font-size:9pt;"><font face="tahoma">������ ��Դ Ẻ ��Ҵ</font></span></b></div></td> 
			  <td width="13%" style="border: #000000 1px solid;" ><div align="center"><b><span style="font-size:9pt;"><font face="tahoma">���Шӷ��</font></span></b></div></td>
			  <td width="11%" style="border: #000000 1px solid;" ><div align="center"><b><span style="font-size:9pt;"><font face="tahoma">�����˵�</font></span></b></div></td>	
			  <td width="11%" style="border: #000000 1px solid;" ><div align="center"><b><span style="font-size:9pt;"><font face="tahoma">��¡��<br />����¹�ŧ</font></span></b></div></td>							
                    <td width="6%" align="center" style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">���</font></span></b></td> 
<td width="6%" align="center" style="border: #000000 1px solid;" ><b><span style="font-size:9pt;"><font face="tahoma">ź</font></span></b></td> 
            </tr>
<?
$sql = "SELECT * FROM receive_detail Where r_id = '$r_id'   ";
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

$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#FFFFFF';
elseif( $i%2 ==1) $bg ='#CCCCCC';
?>
<tr  class="bmText"  bgcolor="<?=$bg ?>">
	<td height="25" style="border: #000000 1px solid;" >&nbsp;
	  <?=fild_type($rs1[type_id])?>
   </td>
	<td height="25" style="border: #000000 1px solid;" >&nbsp;
	  <?=$rs1[rd_name]?>
  </td>

		<td align="center" style="border: #000000 1px solid;" >
	   <?  echo number_format($rs1[price],2);	  ?>&nbsp;
    </td>

	<td  style="border: #000000 1px solid;" >&nbsp;<?=$rs1[brand_name]?>
    </td>
<td  style="border: #000000 1px solid;" >&nbsp;<?=$rs1[garan_at]?>
    </td>
<td  style="border: #000000 1px solid;" >&nbsp;<?=$rs1[remark]?>
    </td>
	<td  style="border: #000000 1px solid;" >&nbsp;<?=$rs1[list_edit]?>
    </td>
		<td align="center" style="border: #000000 1px solid;" >
		<a href="#" onClick="javascript:popup('sample_2_1.php?r_id=<?=$r_id?>&rd_id=<?=$rs1["rd_id"]?>','',550,380)"><img src="images/Modify.png" border="0" /></a>
    </td>
		<td   align="center" style="border: #000000 1px solid;" >

		<a href="?action=view_detail_1_p&del=del&r_id=<?=$r_id?>&rd_id=<?=$rs1["rd_id"]?>"  onclick="return godel()"><img src="images/Delete.png" border="0" /></a>
    </td>
</tr>
<? 

	$i++;
}?>
</table>
	</td>
</tr></table>
</form>

</div>
<div align="center"><br>
<center><FONT size="2" >�ӹǹ ������
<B><?= $Num_Rows;?></B>&nbsp;��¡��&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� : 
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=view_detail_1_p&r_id=$r_id&Page=$Prev_Page'><< ��͹��Ѻ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=view_detail_1_p&r_id=$r_id&Page=$i'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=view_detail_1_p&r_id=$r_id&Page=$Next_Page'> ˹�ҶѴ�>> </a>";

?><br>

</FONT></center></div>
</center>


<script language="JavaScript" type="text/javascript">
function godel()
{
	if (confirm("�س��ͧ���ź�����Ź�� ���������"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("�س��ͧ���ź�����ŷ�������� ���������"))
	{
		return true;
	}
		return false;
}
</script><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  


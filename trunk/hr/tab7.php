<?
session_start();
include('config.inc.php');
if($v_id <>''){
		$sql = "DELETE From  vacation where v_id = '$v_id'";
		$result= mysql_query($sql);
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="Yetii/custom.css">
<link rel="stylesheet" type="text/css" href="Yetii/white.css">
<script type="text/javascript" src="Yetii/yetii-min.js"></script>
<script language="javascript">

function godel_10()
{
	if (confirm("�س��ͧ¡��ԡ������ ���������"))
	{
		return true;
	}
		return false;
}
function godel()
{
	if (confirm("�س��ͧź������ ���������"))
	{
		return true;
	}
		return false;
}

</script>
<style type="text/css">
<!--
.style_h{
	color: #3300FF;
	font-size: 13px;
	font-family: Tahoma;
}
BODY {
	color:#000000;
	background-color: #FFFFFF;
	margin: 0px;
	font-size:14px;
	font-family:Tahoma;
}
.style12 {font-size: 22px}
.style14 {font-size: 16}
.style15 {
	font-size: 16px;
	font-weight: bold;
}
.style17 {font-size: 14px}
.style20 {font-family: AngsanaUPC, "Angsana New"; font-weight: bold; font-size: 20px; }
.style21 {
	font-family: AngsanaUPC, "Angsana New";
	font-size: 18px;
}
.style6 {font-size: 13px}
.style_l {
	font-family: Tahoma;
	font-size: 13px;
	color: #990000;
	text-decoration: none;
	}
-->
</style>

<body>

   <form id="vacation" name="vacation" method="post" action="#"  onclick="Javascript: tab7.style.visibility='visible';" >
        <table width="100%" border="0">
          <tr>
            <td colspan="6" align="center">
			<p class="style6" align="center"><strong>��ǹ��� 7 : �����š���� </strong>			  </p>
		&nbsp; [ <a href="#" class="style_l" onClick="window.open('print_tab7.php?user_id=<?=$user_id?>')"   >�������ǹ���</a> ]
				<br /><br />
			
			<a href="#" class="style20"   onClick="javascript:popup('add_la.php?user_id=<?=$user_id?>&action=add','',500,500)" >���������š����</a>
			<br />
			<br />
           </td>
          </tr>
	    </table>
		  <table width="100%"  border="0" cellpadding="1" cellspacing="1">
	  	<tr>
		  <td width="100%" align="left" valign="top" >
		 <table width="100%" bordercolor="#666666" cellspacing="1" style="border-collapse:collapse;">

          <tr bgcolor="#33CC99">
		   <td width="240"  height="25" style="border: #000000 1px solid;"><div align="center"><span class="style6 style17">�����������</span></div></td>
            <td width="141" style="border: #000000 1px solid;"><div align="center"><span class="style6 style17">������ѹ���</span></div></td>
            <td width="179" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center"><span class="style6 style17">�֧�ѹ���</span></div></td>
            <td width="241" style="border: #000000 1px solid;"><div align="center"><span class="style6 style17">�����˵�</span></div></td>
			<td width="70" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center" class="style6">&nbsp;</div></td>
			<td width="53" bgcolor="#33CC99" style="border: #000000 1px solid;"><div align="center" class="style6">&nbsp;</div></td>
          </tr>
		  <?
$sql="SELECT * from vacation    WHERE 1 = 1 and user_id = '$user_id' 

order by date_begin desc";
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
$result1 = mysql_query($sql);
$i = 0;
while($rs=mysql_fetch_array($result1)){
	$i++;
?>     

<tr >
		 <td height="25" class="style6" style="border: #000000 1px solid;">&nbsp;<? echo find_la($rs[ps_latype_id])?></td>
		   <!-- <td align="center">&nbsp;<? echo date_format_th_1($rs[date_add]);  ?></td> -->
            <td align="center" class="style6" style="border: #000000 1px solid;">&nbsp;<?  if($d[date_begin]<>"0000-00-00" ) echo   date_format_th_1($rs[date_begin]);  ?></td>                                                              
            <td align="center" class="style6" style="border: #000000 1px solid;">&nbsp;<?  if($d[date_end]<>"0000-00-00" ) echo  date_format_th_1($rs[date_end])?></td>
            <td class="style6" style="border: #000000 1px solid;">&nbsp;<? echo $rs[remark]?></td>
			  <td align="center" class="style6" style="border: #000000 1px solid;">
		      <a href="#"   onClick="javascript:popup('add_la.php?v_id=<?=$rs[v_id]?>&action=edit','',500,500)" >���</a></td>
			  <td align="center" class="style6" style="border: #000000 1px solid;"><a href="?action=personnel_story&user_id=<?=$rs[user_id]?>&v_id=<?=$rs[v_id]?>"  onClick="return godel();" >ź</a></td>
          </tr>
		     <? }?>
        </table>
</td>
</tr>
</table>
<div align="center"><br>
<center>
  <FONT size="2" >�ӹǹ ������
<B><?= $Num_Rows;?></B>&nbsp;&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� : 
<?
if($Prev_Page) 
echo " <a href='$PHP_SELF?Page=$Prev_Page&user_id=$user_id'><< ��͹��Ѻ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo " [<a href='$PHP_SELF?Page=$i&user_id=$user_id'>$i</a>] ";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?Page=$Next_Page&user_id=$user_id'> ˹�ҶѴ�>> </a>";

?>
</font>
</center>
</div>
</form>

</body><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
<?
session_start();
include('config.inc.php');
if($w_id <>''){
		$sql = "DELETE From  work where w_id = '$w_id'";
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

 <form id="form5" name="form5" method="post" action="">
	
        <table width="100%" border="0">
          <tr>
            <td colspan="5" align="center"><p class="style6" align="center"><strong>��ǹ��� 5 : �����Ż���ѵԡ�÷ӧҹ</strong>			  </p>
			<a href="#" class="style20"   onClick="javascript:popup('add_work_h.php?user_id=<?=$user_id?>&action=add','',600,680)" >���������Ż���ѵԡ�ô�ç���˹�</a>
			<br />
			<br />
		    </td>
            </tr>
		</table>
		           <?

//-----------�ʴ�������-------------------
    $sql="SELECT * FROM work where user_id ='$user_id' order by start_work  desc , w_id desc";
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
		
		?>
		<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
	  	<tr>
		  <td width="100%" align="left"  valign="top" >
		 <table width="100%" bordercolor="#666666" cellspacing="1" style="border-collapse:collapse;">
          <tr> 

		  <td width="147" bgcolor="#33CC99" align="center" height="30" style="border: #000000 1px solid;" ><span class="style6">�ѹ������Ѻ������͡���</span></td> 
		  <td width="156" bgcolor="#33CC99" align="center" height="30" style="border: #000000 1px solid;" ><span class="style6">�ѹ��� ��� �Ѻ�ͧ</span></td> 
			<td width="149" bgcolor="#33CC99" align="center" height="30" style="border: #000000 1px solid;" ><span class="style6">�ѹ���ú����</span></td> 
			<td width="414" bgcolor="#33CC99" align="center" height="30" style="border: #000000 1px solid;" ><span class="style6">���Ըա��</span></td> 
            <td width="121" bgcolor="#33CC99" align="center" style="border: #000000 1px solid;" ><span class="style6">�Թ��͹</span></td>
			<td width="113" bgcolor="#33CC99" align="center" style="border: #000000 1px solid;" ><span class="style6">��һ�Шӵ��˹�</span></td>
			<td width="113" bgcolor="#33CC99" align="center" style="border: #000000 1px solid;" ><span class="style6">��ҵͺ᷹�����͹</span></td>
			<td width="45" bgcolor="#33CC99" style="border: #000000 1px solid;" ><div align="center" class="style6">&nbsp;</div></td>
			<td width="38" bgcolor="#33CC99" style="border: #000000 1px solid;" ><div align="center" class="style6">&nbsp;</div></td>
          </tr>
	<? while($d = mysql_fetch_array($result)){
	?>
          <tr>
		<td align="center" class="style6" height="30" style="border: #000000 1px solid;" ><? if($d[start_work]<>"0000-00-00" ) echo date_format_th_1($d[start_work])?>&nbsp;</td>
		<td align="center" class="style6" height="30" style="border: #000000 1px solid;" ><? if($d[confirm_date]<>"0000-00-00" ) echo date_format_th_1($d[confirm_date])?>&nbsp;</td>
		<td align="center" class="style6" height="30" style="border: #000000 1px solid;" ><? if($d[end_work]<>"0000-00-00" ) echo date_format_th_1($d[end_work])?>&nbsp;</td>
		  <td height="25" class="style6" style="border: #000000 1px solid;" >&nbsp;<? if($d[command] <>'')  echo "<font color=blue>&nbsp;������Ţ��� : </font></b>".$d[command];
		if($d[date_command] <>'0000-00-00') echo  " <b>&nbsp;ŧ�ѹ��� : </b>".date_format_th_1($d[date_command]);
		  ?></td>		 
		  <td align="center" class="style6" style="border: #000000 1px solid;" ><?=number_format($d[pay],2)?>&nbsp;</td>
		  <td align="center" class="style6" style="border: #000000 1px solid;" ><?=number_format($d[pay_posi],2)?>&nbsp;</td>	 
           
			<td align="center" class="style6" style="border: #000000 1px solid;" ><?=number_format($d[pay_month],2)?>&nbsp;</td>
	        <td align="center" class="style6" style="border: #000000 1px solid;" ><a href="#"   onClick="javascript:popup('add_work_h.php?w_id=<?=$d[w_id]?>&action=edit','',550,680)" >���</a></td>
			  <td align="center" class="style6" style="border: #000000 1px solid;" ><a href="?action=personnel_story&user_id=<?=$d[user_id]?>&w_id=<?=$d[w_id]?>"  onClick="return godel();" >ź</a></td>
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

<br>

</body><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
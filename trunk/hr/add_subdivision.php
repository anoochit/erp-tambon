
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
// ����� XmlHttp Object
function uzXmlHttp(){
var xmlhttp = false;
try{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
try{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}catch(e){
xmlhttp = false;
}
}

if(!xmlhttp && document.createElement){
xmlhttp = new XMLHttpRequest();
}
return xmlhttp;
}
function result2(){
var num3 =document.subdivision.div_id.value;
var result;
var url = 'ajax_1.php?num3=' + num3; 
xmlhttp = uzXmlHttp();
xmlhttp.open("GET", url, false);
xmlhttp.send(null); 
result = xmlhttp.responseText;

document.subdivision.no_book.value = result;

}

</script>
<script language="javascript">
function godel()
{
	if (confirm("�س��ͧ���ź�����Ź�� ���������"))
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
		if (  document.subdivision.no_book.value=='' || document.subdivision.no_book.value==' ' )
           {
           alert("��سҡ�͡���ʽ���");
           document.subdivision.no_book.focus();           
           return false;
           }
		   if (  document.subdivision.sub_name.value=='' || document.subdivision.sub_name.value==' ' )
           {
           alert("��سҡ�͡���ͽ���");
           document.subdivision.sub_name.focus();           
           return false;
           }
			return true;
	}
</script>
<?

//-----------�ѹ�֡-------------------
if($save_add <>'' and  find_sub_name($no_book,$sub_name) <=0){
		$query=" INSERT INTO subdivision (div_id,sub_name,sub_id)
		 VALUES ('$div_id','$sub_name','$no_book')";
		$result=mysql_query($query);
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ�úѹ�֡������</font></center><br><br>";
       	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_subdivision\">\n";
		mysql_close($connect);	
}elseif($save_add <>'' and   find_sub_name($no_book,$sub_name) > 0){//end save
		echo "<br><br><center><font color=darkgreen>�������ͪ��ͽ��«�Ӻѹ�֡����������</font></center><br><br>";
}

//----------ź--------------
if($del =='del'){

		 $sql_sub="DELETE FROM  subdivision WHERE sub_id='$sub_id' ";
  	 	$result_sub=mysql_query($sql_sub);
		
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ��ź������</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_subdivision\">\n";

}
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="subdivision"  method="post">
  <br />
  <table width="80%" border="1" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td  colspan="2" style="border: #00000 1px solid;"    >
		<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#f4f7f9">
 		 	<tr class="lgBar">
  		  		<td  height="25" colspan="2" bgcolor="#60c0ff"><div >&nbsp;&nbsp;<span class="bTitleLink">���ҽ���</span></div></td>
  			</tr>
	<tr>
 <td a align="right" width="40%"  >
    ���ͧ͡  
  </div>
  <td align="left">
&nbsp;&nbsp;
<?
			$query="select div_id,div_name from division order by div_id";
			$result=mysql_query($query);
?>
<select name="div_id"   >
  <?
			while($d =mysql_fetch_array($result)){
				
?>
  <option value="<? echo $d[div_id];?>"
		<?
		if($div_id == $d[div_id] ) echo "selected";
		?>
		><? echo $d[div_name];?></option>
  <? }?>
</select></td>
</tr>
<tr>
  <td a align="right" width="40%"  >���ͽ���</div></td>
	<td align="left">&nbsp;&nbsp;
	<input type="text" name="word" value="<?=$word?>" size="30" maxlength="100" /></td>
</tr>

<tr>
	<td height="44" colspan="3" align="center"><!--onClick="return validate()"/ -->
	  <input name="search" type="submit"  value="����" >	  &nbsp;&nbsp;
	  	  </td>
</tr>
</table>
</td>
</tr>
</table>
</form><br />
<?
//-----------�ʴ�������-------------------

	if(!isset($start)){
		$start = 0;
		}
		$limit = '20'; // �ʴ���˹���С����Ǣ��
	
		
		
    $sql  ="SELECT * FROM  division d , subdivision s  ";
	 $sql  .=" where 1 = 1  and d.div_id = s.div_id ";
	if($search <>'' and $word <>'') $sql .= " and ( d.div_name like '%$word%'  or s.sub_name like '%$word%' ) ";
	if($search <>'' and $div_id <>'') $sql .= " and d.div_id = '$div_id'  ";
	$sql .= " group by s.sub_id order by s.div_id asc,s.sub_id asc ";
	$dbquery=mysql_query($sql);
	$total = mysql_num_rows($dbquery); // �Ҩӹǹ record 
	
	$sql .= " LIMIT $start,$limit";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table cellpadding="0" cellspacing="0" border="1" width="100%" style="border: #00000 1px solid;"   align="center"	>
	<tr  bgcolor="#60c0ff"  >
   <td width="12%" bgcolor="#60c0ff" class="font_1"><div align="center" ><strong>���ʽ���</strong></div></td>
     <td width="25%" bgcolor="#60c0ff" class="font_1"><div align="center" ><strong>���ͧ͡</strong></div></td>
	 <td width="48%" bgcolor="#60c0ff" class="font_1"><div align="center"><strong>���ͽ���</strong></div></td>
    <td width="15%" bgcolor="#60c0ff"><div align="center">&nbsp;<a href="#" class="catLink1" onClick="javascript:popup('add_sub.php?type=1&add=add','',400,250);">[ ���� ]</a></div></td>
	
	 </tr>
	 <?
	if(mysql_num_rows($result) <>0){
	 $r=0;
		while ($d =mysql_fetch_array($result)){
	$r++;
	?>
		<tr >
	<td  height="30" align="center" >&nbsp;&nbsp;<?=$d[sub_id]?>&nbsp;&nbsp;</td> 
	   <td   height="30" align="left" >&nbsp;&nbsp;<?=$d[div_name]?></td>
	    <td  align="left" >&nbsp;&nbsp;<?=$d[sub_name]?></td>
		 <td align="center" ><a href="#" onclick="javascript:popup('add_sub.php?add=edit&sub_id=<? echo $d["sub_id"]?>','',450,250);"  class="catLink1">[ ��� ]</a> <a href="index.php?action=add_subdivision&del=del&div_id=<? echo $d["div_id"]?>&sub_id=<? echo $d["sub_id"]?>" onClick="return del_confirm1();">[ ź ]</a> </td>

   	   </tr>
	   <? }?>
	   <tr  ><td height="40" colspan="20"> 
  
    <?

	 echo "<center>";
	$page = ceil($total/$limit); // ��� record ������ ��ô��� �ӹǹ�����ʴ��ͧ����˹��
	/* ��Ҽ���� ��ǹ �繵���Ţ ���§�ѹ �� ���ص��������� 3 ������š���� 1 2 3 */
	for($i=1;$i<=$page;$i++){
		if($_GET['page']==$i){ //��ҵ���� page �ç �Ѻ �Ţ���ǹ��
			echo "[<a href='?action=add_subdivision&start=".$limit*($i-1)."&page=$i&j=$j&search=$search&word=$word&div_id=$div_id'> $i </A>]"; //��駤� ��˹�� ���͹䢷�� 1
		}else{
			echo "[ <a href='?action=add_subdivision&start=".$limit*($i-1)."&page=$i&j=$j&search=$search&word=$word&div_id=$div_id'> $i </A> ]"; //��駤� ��˹�� ���͹䢷�� 2
		}
	}
?>
&nbsp;&nbsp;
<?
echo "</center>";
?>
  </td>
  </tr>
   <? } else{?>
    <tr class="style6"><td colspan="10"> <div align="center">��辺������</div></td>
 </tr>
 <? }?>
</table>
</td></tr></table>
<? 
function find_sub_name($no_book,$sub_name){
	$sql1 ="select * from subdivision where (sub_name = '$sub_name' and  div_id = '$no_book' )";
	$result = mysql_query($sql1);
	$rs = mysql_num_rows($result);
	return $rs;
}
?>
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
</script>  <script language="JavaScript" type="text/javascript">
function del_confirm1()
{
	if (confirm("�س��ͧ���ź���� ��� ���������"))
	{
		return true;
	}
		return false;
}
</script>
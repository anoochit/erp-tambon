
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
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
<?
if($del =='del'){
$sql = "DELETE FROM  user WHERE user_id=$user_id";
   $result = mysql_query($sql);
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ��ź������</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=add_user\">\n";
		mysql_close();	
}
?>
<style type="text/css">
<!--
.style2 {font-size: 16}
.style3 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
<br />
<?
		$sql =" SELECT * FROM admin  where username != 'admin' ";
		$result=mysql_query($sql);
		$total=mysql_num_rows($result);
		?>
		<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
	 <table width="100%" border="1" cellpadding="0" cellspacing="0"   bgcolor="#FFFFFF"align="center">
	 <tr  bgcolor="#60c0ff"   align="left">				
     <td colspan="10" height="30">&nbsp;&nbsp;<span class="style2">&nbsp;<span class="style3">�����ҹ</span></span></td>
	 </tr>
	 <tr  bgcolor="#60c0ff"   align="center">				
     <td colspan="10" height="30"><a href="#" class="style20"   onClick="javascript:window.open('add_user.php?action=add','xxx','scrollbars=yes,width=600,height=300')" >���������</a></div></td>
	 </tr>
     <tr bgcolor="#60c0ff"  align="center" class="font_1">				
     <td width="9%" height="30"><strong>�ӴѺ���
         </div>
     </strong></td>
	  <td width="25%"><strong>����-���ʡ��
	      </div>
	  </strong></td>
	  <td width="16%"><strong>Username
	      </div>
	  </strong></td>
	  <td width="18%"><strong>Password
	      </div>
	  </strong></td>
	  <td width="18%"><strong>�дѺ�����ҹ
	      </div>
	  </strong></td>
     <td width="8%">&nbsp;</div></td>
	 </tr>
	 <?
	if($total >0){
	if($start == 0) $r=0;
	else $r = $start ;
	$i = 0;
		while ($d =mysql_fetch_array($result)){
		$r++;
		if($i%2 == 0) $bg ='#CCCCCC';
		elseif($i%2 ==1) $bg ='#FFFFFF';
	$i++;
	?>
		<tr bgcolor="<?=$bg?>" >
	   <td  align="center"  height="30">&nbsp;&nbsp;<?php echo $r?>&nbsp;&nbsp;</td>
	   <td   align="left">&nbsp;&nbsp;<?=$d[name]?>&nbsp;&nbsp;</td>
	   
	   <td   align="center" >&nbsp;&nbsp;<?=$d[username]?></td>
	   <td   align="center" >&nbsp;&nbsp;<?=$d[password]?></td>
	   <td   align="center" >&nbsp;&nbsp;<?
	   if($d[pivilage] ==0) echo "�����";
	    if($d[pivilage] ==1) echo "������";
	    if($d[pivilage] == 2) echo "����§ҹ";
	   ?></td>
	    <td align="center" > <a href="#"   onClick="javascript:window.open('add_user.php?u_id=<?=$d[u_id]?>&action=edit','xxx','scrollbars=yes,width=600,height=300')" > ���</a></td>
   	   </tr>
	   <? }?>
   <? } elseif($total <=0){?>
    <tr class="style6"><td colspan="10"> <div align="center">��辺������</div></td>
 </tr>
 <? }?>
	 </table>
</td>
</tr>
</table>
<? 
		mysql_close();	
?>
</body>
</html>

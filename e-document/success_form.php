<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">
<tr>

	<td width="657" valign="top" >
	<table cellpadding="0" cellspacing="0" border="0" height="100%" background="images/bg_1.gif" width="100%">
		<tr>
		<td colspan="3" align="center" height="100%"><br>
		
<? if($_REQUEST["u_id"] != "" ){
		echo "<center>���ͫ���������ö����<br><br><a href='index.php?action=setup_edit&u_id=$u_id'>��Ѻ����</a></center>";
	}else{
	echo "<b><font color='#0000CC'>���Թ������º��������</font></b>";
	}
	if($_REQUEST["file_id"] != ""){
?>
<br><br><a href="index.php?action=view&file_id=<? echo $_REQUEST["file_id"]?>" >�٢�����</a>&nbsp;&nbsp;&nbsp;&nbsp;�������ѡ����<br>
<meta http-equiv="Refresh" content="3;URL=index.php?action=view&file_id=<? echo $_REQUEST["file_id"]?>">
<? } /*elseif($_REQUEST["user_id"] != "" and $_REQUEST["action"] == 'setup'){
?>
 <center><br><br><a href='index.php?action=setup'>�٢�����</a></center>";
<? }*/?>
<br><br><br><br>
		 </td>
		</tr>
		</table>
	</td>
	
</tr>
</table>

</center>







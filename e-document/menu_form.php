<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
	if($_SESSION["username"] != "" ) {
		?>
		<table name="menu1" cellpadding="0" cellspacing="0" width="230">
		<tr>
			<td width="100%" height="25" background="images/bar.gif" >
		<?
		echo "<div><b> ".$_SESSION["username"]."</b> ���˹�ҷ��  <b>".find_dep_name($_SESSION[de_part])."</b>";
		?>
		</td>
		<td width="10"><IMG src="images/nbar.gif" width="1" height="25" border="0" alt=""></td>
		</tr>
		</table><br><div>
		<? }?>
	<? if($_SESSION["username"] != "" && $_SESSION['de_part'] == "1") {?>
		<table name="menu" cellpadding="0" cellspacing="0" width="209">
		<tr>
			<td width="3"><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=add' align="center">[�����͡���]</a>&nbsp;&nbsp;</td>
			<td width="10"><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
				 		  <tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif"  align="left" width="201">&nbsp;&nbsp;<a href='home.php?action=list_sendStamp'>[͹��ѵ�����<?
 if(count_stamp()  >0 ){
  echo	"(" . count_stamp()   ." ��Ѻ)";
}
?>]</a></td>

 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
<tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif"  align="left" width="201">&nbsp;&nbsp;<a href='home.php?action=list_end'>[�ʹ��Թ���<?
 if(find_end($_SESSION[de_part]) >0){
  echo	"(" . find_end($_SESSION[de_part]) ." ��Ѻ)";
}
?>]</a></td>

 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
			<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=dep_manage' align="center">[�Ѵ��â����šͧ]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=borrow_manage' align="center">[��¡������͡���]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=add_calander' align="center">[������ԷԹ�Ԩ����]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=not_receive' align="center">[��§ҹ�ѧ�����ŧ�Ѻ]</a></td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
			<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif" align="left">&nbsp;&nbsp;<a href='home.php?action=add_access' align="center">[��§ҹ�ʹ��Թ���]</a></td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=add_receive_1' align="center">[��§ҹŧ�Ѻ]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
	
		<? if ($_SESSION["username"] =='admin' ||  $_SESSION['de_part'] == 1){?>
				<tr >
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif">&nbsp;&nbsp;<a href='home.php?action=setup' align="center">[�����ҹ]</a>&nbsp;&nbsp;</td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
		<? }?>
		<tr>
			<td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
			<td background="images/bt02.gif" align="center"><a href='logout.php'>�͡�ҡ�к�</a></td>
			<td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
		</tr>
</table>
		<?
		echo "<br>�����ҹ����� ".$_SESSION["login_date"]."<BR>";
		echo "���� ".$_SESSION["login_time"]." �. <BR><br>";
		}elseif($_SESSION["username"] != "" && $_SESSION["username"] != "admin"){
			?>
			<div>
		 <table name="menu" cellpadding="0" cellspacing="0" width="199">
		 <? if ($_SESSION['department'] == "all"){?>
		<? }elseif ($_SESSION['department'] == 2){?>
			  <tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif"  align="left" width="191">&nbsp;<a href='home.php?action=list_stamp'>[�͡�����͹��ѵ�<?
 if(find_stamp($_SESSION[de_part]) >0){
  echo	"(" . find_stamp($_SESSION[de_part]) ." ��Ѻ)";
}
?>]</a></td>

 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
		
		<? }elseif ($_SESSION['department'] <> 'all'){?>
		  <tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif"  align="left" width="191">&nbsp;<a href='home.php?action=list_receive'>[��ŧ����¹�Ѻ<?
 if(find_receive($_SESSION[de_part]) >0){
  echo	"(" . find_receive($_SESSION[de_part]) ." ��Ѻ)";
}
?>]</a></td>

 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
 		  <tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif"  align="left" width="191">&nbsp;<a href='home.php?action=list_end'>[�ʹ��Թ���<?
 if(find_end($_SESSION[de_part]) >0){
  echo	"(" . find_end($_SESSION[de_part]) ." ��Ѻ)";
}
?>]</a></td>

 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
 <? }?>
 <tr>
 <td><IMG src="images/bt01.gif" width="3" height="27" border="0" alt=""></td>
 <td background="images/bt02.gif" align="center" width="191"><a href='logout.php'>�͡�ҡ�к�</a></td>
 <td><IMG src="images/bt03.gif" width="3" height="27" border="0" alt=""></td>
 </tr>
 
</table>

	<?
			echo "<br>�����ҹ����� ".$_SESSION["login_date"]."<BR>";
		echo "���� ".$_SESSION["login_time"]." �. <BR><br>";
		
		}else {
	include("login_form.php");
	
	}
	
	include("calendar.php");
	?>
		<div>
	<table>
	<tr><td height="40" valign="top">*** �����˵��дѺ�������͹ </td></tr>
	<tr>
		<td bgcolor="#B0FFB0" align="center">
		��������͹ ��͹���з�� 1
		</td>
	</tr>
	<tr>
		<td bgcolor="#FFFFAA" align="center">
		������ͧ ��͹���з�� 2
		</td>
	</tr>
	<tr>
		<td bgcolor="#FFD6C1" align="center">
		����� ��͹���з�� 3 �����������ش
		</td>
	</tr>
	<tr>
		<td bgcolor="#FF9191" align="center">
		��ᴧ ��͹��¡�˹�������������ش
		</td>
	</tr>

		<tr>
		<td align="center" bordercolor="#999999">
		<a href="help_doc.pdf" target="_blank"><img src="images/manual.jpg" border="1" /></a>
		</td>
	</tr>
	</table>
   </div>
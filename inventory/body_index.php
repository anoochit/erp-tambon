<? ob_start();?>
<?
session_start();
include('config.inc.php');
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css"> 

<script language="JavaScript" src="include/calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
</head>


<link rel="stylesheet" type="text/css" href="style.css">


<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
      
        <tr>
          <td width="100%"  align="center" valign="top"  >
	<?
	echo $action ."hhh<br>";
 if($_SESSION[u_id] <>''){
 
		if($action == 'new_buy') include("new_buy.php"); //
		elseif($action == 'division') include('division.php'); // �ͧ
		elseif($action == 'new_buy_1') include("new_buy_1.php"); //
		elseif($action == 'new_buy_p') include("new_buy_p.php"); //
		elseif($action == 'new_buy_1_p') include("new_buy_1_p.php"); //
		elseif($action == 'view_detail_1_p') include("view_detail_1_p.php"); // ��䢵�Ǩ�Ѻ
		elseif($action == 'view_detail') include("view_detail.php"); // �Ѻ�����ԡ
		elseif($action == 'view_detail_1') include("view_detail_1.php"); // ��䢵�Ǩ�Ѻ
		elseif($action == 'open_detail') include("open_detail.php"); //
		elseif($action == 'seach_edit_1') include("seach_edit_1.php"); //������䢵�Ǩ�Ѻ
		elseif($action == 'seach_open') include("seach_open.php"); //���������ԡ
		elseif($action == 'add_open') include("add_open.php"); //���� / ����ԡ
		elseif($action == 'seach_edit_open') include("seach_edit_open.php"); //���������ԡ
		elseif($action == 'edit_open') include("edit_open.php"); // ��䢡���ԡ
		elseif($action == 'seach_move') include("seach_move.php"); //�������ͺѹ�֡�¡����
		elseif($action == 'add_move') include("add_move.php"); //����
		elseif($action == 'seach_service') include("seach_service.php"); //�������ͺѹ�֡�������ا
		elseif($action == 'add_service') include("add_service.php"); //����
		//-------------------------� � � �� � � �� �-------------------------------
		elseif($action == 'seach_control') include("seach_control.php"); //����
		elseif($action == 'show_control') include("show_control.php"); //����
		//------------------------��§ҹ--------------------------------------
		elseif($action == 'report_receive') include("report_receive.php"); //��§ҹ����Ѻ����ѳ��
		elseif($action == 'report_open') include("report_open.php"); //��§ҹ����Ѻ����ѳ��
		elseif($action == 'report_send') include("report_send.php"); //��§ҹ�Ѵ��ä���ѳ��
		elseif($action == 'report_all') include("report_all.php"); //��§ҹ
		elseif($action == 'report_all_1') include("report_all_1.php"); //��§ҹ
		elseif($action == 'report_all_p') include("report_all_p.php"); //��§ҹ
		//------------------------��駤��--------------------------------------
		elseif($action == 'add_type') include("add_type.php"); //��������Ѿ���Թ
		elseif($action == 'edit_type') include("edit_type.php"); //��䢻�������Ѿ���Թ
		elseif($action == 'add_shop') include("add_shop.php"); //��ҹ���
		elseif($action == 'edit_shop') include("edit_shop.php"); //�����ҹ���
		elseif($action == 'add_sec') include("add_sec.php"); //Ἱ�
		elseif($action == 'edit_sec') include("edit_sec.php"); //���Ἱ�
		elseif($action == 'add_room') include("add_room.php"); //��ͧ
		elseif($action == 'edit_room') include("edit_room.php"); //�����ͧ
		
		elseif($action == 'seach_all') include("seach_all.php"); //��§ҹ����ԡ
		elseif($action == 'report_open') include("report_open.php"); //��§ҹ����Ѻ����ѳ��
		
		
		
		elseif($_REQUEST["action"] == "backup")include("backup.php"); // backup ������
		elseif($_REQUEST["action"] == "")include("seach_edit_1.php"); //������䢵�Ǩ�Ѻ
		elseif($_REQUEST["action"] == "seach_edit_2")include("seach_edit_2.php"); //������䢵�Ǩ�Ѻ
	}elseif($_SESSION['u_id'] == '' ) {
	?><br>
			<br>
	<form name="ff" action="login.php" method="post">
	<table width="300" border="0" cellspacing="1" cellpadding="1" align="center"  height="200" background="images/login_1.jpg">
  <tr>
    <td align="center" width="100%" height="100%" colspan="2" valign="top">
	<table width="100%" height="100%" border="0" align="center" cellpadding="1" cellspacing="0"   >
  <tr>
    <td height="61" colspan="2" align="center" ><strong>
			�������к�	</strong></td>
  </tr>
    <tr>
    <td width="40%" align="center" height="24" class="login">
	���;�ѡ�ҹ	</td>
	 <td width="60%" align="center" >
<input  type="text" name="user_name"></td>
  </tr>
      <tr class="login">
    <td width="40%" align="center" height="24" >
	���ʼ�ҹ	</td>
	 <td width="60%" align="center">
	<input type="password"name="password" >	</td>
  </tr>
  <tr>
	 <td  align="center"  colspan="2" height="50">
<input type="submit" name="go"  value="�������к�">&nbsp;&nbsp;
<input  type="reset" name="ffff" value="¡��ԡ"></td>
  </tr>
</table></td>
  </tr>
</table>
</form>
			<?
	} 
	?>
<br><br><br><br>
	<?// }?>	</td>
        </tr>
    </table>
<script language="javascript">
function Q_confirm()
{
	if (confirm("�س��ͧ���ź�����Ź�� ���������"))
	{
		return true;
	}
		return false;
}
</script>
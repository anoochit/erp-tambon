<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>
<html>
<head>
<title><?=$site?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

</head>
<script language="JavaScript" src="include/calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<table width="900" border='0' cellpadding='0' cellspacing='0'  align="center">
<tr>
	<td  align='center' ><table id='body' width='100%' border="0" cellpadding="0" cellspacing="0" >
<tr>
  <td  width="241"  height="100%"rowspan="2" valign="top"  background="images/IM/images/IM_03.jpg">
    <? include('menu.php')?></td>
	
		<td height="75" colspan="2" valign="top" background="images/IM/images/IM_03.jpg">
  <?include('header.php')?></td></tr>
<tr>
  <td   width="657" height="447" valign="top" background="images/IM/images/IM_03.jpg"><?
	//echo $action ."<br>";
 if($_SESSION[u_id] <>''){
		if($action == 'new_buy') include("new_buy.php"); //
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
		
		elseif($action == 'edit_password')include("edit_password.php"); //���
		
		elseif($_REQUEST["action"] == "dep_manage")include("dep_manage.php");
		//-------------------------� � � �� � � �� �-------------------------------
		elseif($action == 'seach_control') include("seach_control.php"); //����
		elseif($action == 'show_control') include("show_control.php"); //����
		
		elseif($action == 'seach_control_p') include("seach_control_p.php"); //����
		elseif($action == 'show_control_p') include("show_control_p.php"); //����
		//------------------------��§ҹ--------------------------------------
		elseif($action == 'report_receive') include("report_receive.php"); //��§ҹ����Ѻ����ѳ��
		elseif($action == 'report_open') include("report_open.php"); //��§ҹ����Ѻ����ѳ��
		elseif($action == 'report_send') include("report_send.php"); //��§ҹ�Ѵ��ä���ѳ��
		elseif($action == 'report_all') include("report_all.php"); //��§ҹ
		elseif($action == 'report_all_1') include("report_all_1.php"); //��§ҹ
		elseif($action == 'report_all_p') include("report_all_p.php"); //��§ҹ
		elseif($action == 'report_end_garan')include("report_end_garan.php"); //��§ҹ�������
		//------------------------��駤��--------------------------------------
		elseif($action == 'division') include('division.php'); // �ͧ
		elseif($action == 'add_division') include('add_division.php'); // �ͧ
		elseif($action == 'edit_division') include('edit_division.php'); // �ͧ
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
		elseif($_REQUEST["action"] == "" or $_REQUEST["action"] == "center") echo "<center><br><br><br><br><br><br><br><span class='style3'>�Թ�յ�͹�Ѻ�������к�</span></center>"; //
		elseif($_REQUEST["action"] == "seach_edit_2")include("seach_edit_2.php"); //������䢵�Ǩ�Ѻ
	}elseif($_SESSION['u_id'] == '' ) {
	?><br>
			<br>
	<form name="ff" action="login.php" method="post">
	<table width="300" border="0" cellspacing="1" cellpadding="1" align="center"  height="200" background="images/login.png">
  <tr>
    <td align="center" width="100%" height="100%" colspan="2" valign="top">
	<table width="100%" height="100%" border="0" align="center" cellpadding="1" cellspacing="0"   >
  <tr>
    <td height="70" colspan="2" align="center" ><strong>
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
	
	?>			</td>
</tr>

<tr><td colspan="3" valign="top" background="images/IM/images/IM_03.jpg"><img src="images/IM1/images/GM_18.jpg" width="943" height="115" ></td>
</tr>
</table>

</td>
</tr>
</table>
</body>
</html>
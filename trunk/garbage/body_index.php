<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="100%"  align="center" valign="top"  ><?
 if($_SESSION[username] <>''){
		if($action == 'new_buy') include("new_buy.php"); //
		elseif($action == 'user') include("user.php"); //�����ż����
		elseif($action == 'add_user') include("add_user.php"); //���������ż����
		elseif($action == 'edit_user') include("edit_user.php"); //��䢢����ż����
		
		elseif($action == 'mooban') include("mooban.php"); //�����������ҹ
		elseif($action == 'add_mooban') include("add_mooban.php"); //���������������ҹ
		elseif($action == 'edit_mooban') include("edit_mooban.php"); //��䢢����������ҹ
		
		elseif($action == 'type_rec') include("type_rec.php"); //�����Ż���������Ѻ
		elseif($action == 'add_type_rec') include("add_type_rec.php"); //���������Ż���������Ѻ
		elseif($action == 'edit_type_rec') include("edit_type_rec.php"); //��䢢����Ż���������Ѻ
		
		elseif($action == 'type_mem') include("type_mem.php"); //�����Ż������������ԡ��
		elseif($action == 'add_type_mem') include("add_type_mem.php"); //���������Ż������������ԡ��
		elseif($action == 'edit_type_mem') include("edit_type_mem.php"); //��䢢����Ż������������ԡ��
		
		elseif($action == 'start') include("start.php"); //�����Ż������������ԡ��
		elseif($action == 'add_start') include("add_start.php"); //���������Ż������������ԡ��
		elseif($action == 'edit_start') include("edit_start.php"); //��䢢����Ż������������ԡ��
		
		//--------------------------��§ҹ----------------------------
		elseif($action == 'report_17') include("report_17.php"); //
		elseif($action == 'Rep_Monthly0') include("Rep_Monthly0.php"); //�����§ҹ��ػ�Ѵ�纻�Ш���͹
		elseif($action == 'report_Monthly1') include("report_Monthly1.php");//��§ҹ��ػ�Ѵ�纻�Ш���͹���
		elseif($action == 'report_remain') include("report_remain.php"); //��§ҹ��Ť���ҧ
		elseif($action == 'report_receipt') include("report_receipt.php"); //��§ҹ�������
		elseif($action == 'report_income') include("report_income.php"); //��§ҹ�ʹ�����
		elseif($action == 'report_sumincome') include("report_sumincome.php"); //��§ҹ�ʹ���� �ӹѡ�ҹ + 㹵͹
		elseif($action == 'report_Monthly7') include("report_Monthly7.php");//��§ҹ�ʹ�������������Ш���͹
		elseif($action == 'report_Monthly8') include("report_Monthly8.php");//��§ҹ��ҧ�����¡�����͹/��
		elseif($action == 'report_Monthly8_2') include("report_Monthly8_2.php");//��§ҹ��ҧ�����¡�����͹/��
		elseif($action == 'report_Member') include("report_Member.php"); //��§ҹ��ª��ͼ�����ԡ�èѴ��
		elseif($action == 'report_NewMember') include("report_NewMember.php"); //��§ҹ��ª��ͼ�����ԡ�èѴ�� (�������)
		elseif($action == 'report_P32') include("report_P32.php"); //��§ҹ �.32
		elseif($action == 'report_year') include("report_year.php"); //��§ҹ��ػ��Шӻ�
		elseif($action == 'report_MemDrop') include("report_MemDrop.php"); //��§ҹ��ª��ͼ���¡��ԡ���ԡ�èѴ��
		elseif($action == 'find_remain') include("find_remain.php"); //��§ҹ�١˹�餧��ҧ+��������˹��
		elseif($action == 'report_CancelRep') include("report_CancelRep.php"); //��§ҹ¡��ԡ�����
		//----------------------------------- �͡����� ---------------------------------------------
		elseif($action =='frm_receive') include ("frm_receive.php");
		//----------------------------------- �׹�ѹ������Ѻ�Թ����������---------------------------------------------
		elseif($action =='frm_pay') include ("frm_pay.php");
		
		//----------------------------------- ��䢢�����������Ѻ�Թ--------------------------------------------
		elseif($action =='frm_edit') include ("frm_edit.php");
		//----------------------------------- ����������͹��ѧ-------------------------------------------
		elseif($action =='frm_pbreceive') include ("frm_pbreceive.php");
		//----------------------------------- ��䢢�����------------------------------------------
		elseif($action =='frm_Alledit') include ("frm_Alledit.php");		
				
		//----------------------------------- ��Ҫԡ ---------------------------------------------
		elseif($action == 'add_mem') include("add_mem.php"); //��������¹�������ԡ��
		elseif($action == 'edit_mem') include("edit_mem.php"); //��䢷���¹�������ԡ��
		elseif($action == 'view_detail_mem') include("view_detail_mem.php"); //��䢷���¹�������ԡ��
		elseif( $action =='find_mem') include("find_mem.php"); //
		elseif($action == '' or $action == 'center') echo "<center><br><br><br><br><br><br><br><span class='TextWellcome'>�Թ�յ�͹�Ѻ�������к�</span></center>"; //

	}elseif($_SESSION['username'] == '' ) {
	?>
        <br>
        <br>
        <form name="ff" action="login.php" method="post">
          <table width="352" border="0" cellspacing="1" cellpadding="1" align="center"  height="212" background="images/GM/images/login.png">
            <tr>
              <td align="center" width="100%" height="100%" colspan="2" valign="top">
                  <table width="100%" height="100%" border="0" align="center" cellpadding="1" cellspacing="0"   >
                    <tr>
                      <td height="70" colspan="2" align="center" class="login" ><span class="style7">�������к�</span></td>
                    </tr>
                    <tr>
                      <td width="40%" height="32" align="center" class="login"> ���;�ѡ�ҹ </td>
                      <td width="60%" align="center" ><div align="left">
                          <input  type="text" name="pwd_username" size="15">
                      </div></td>
                    </tr>
                    <tr class="login">
                      <td width="40%" align="center" height="33" ><span class="login">���ʼ�ҹ</span> </td>
                      <td width="60%" align="center"><div align="left">
                          <input type="password"name="pwd_passwd"  size="15">
                      </div></td>
                    </tr>
                    <tr>
                      <td height="50"  colspan="2"  align="center" valign="middle"><input type="submit" name="go"  value="�������к�">
                        &nbsp;&nbsp;
                      <input  type="reset" name="ffff" value="¡��ԡ"></td>
                    </tr>
                </table></td>
            </tr>
          </table>
        </form>
      <?
	} 
	
	?>
        <br>
      <br>
      <br>
      <br>
    </td>
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
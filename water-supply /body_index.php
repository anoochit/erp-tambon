<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<table width="100%"   height="400" border="0" cellpadding="0" cellspacing="0" align="center"  >
 <tr valign="top" >
    <td width="100%"  height="400" align="left" valign="top" ><br><?
 if($_SESSION[username] <>''){
		if($action == 'new_buy') include("new_buy.php"); //
		elseif($action == 'user') include("user.php"); //�����ż����
		elseif($action == 'add_user') include("add_user.php"); //���������ż����
		elseif($action == 'edit_user') include("edit_user.php"); //��䢢����ż����
		
		elseif($action == 'mooban') include("mooban.php"); //�����������ҹ
		elseif($action == 'add_mooban') include("add_mooban.php"); //���������������ҹ
		elseif($action == 'edit_mooban') include("edit_mooban.php"); //��䢢����������ҹ
		
		elseif($action == 'zone') include("zone.php"); //������ࢵ
		elseif($action == 'add_zone') include("add_zone.php"); //����������ࢵ
		elseif($action == 'edit_zone') include("edit_zone.php"); //��䢢�����ࢵ
		
		elseif($action == 'type_rec') include("type_rec.php"); //�����Ż���������Ѻ
		elseif($action == 'add_type_rec') include("add_type_rec.php"); //���������Ż���������Ѻ
		elseif($action == 'edit_type_rec') include("edit_type_rec.php"); //��䢢����Ż���������Ѻ
		
		elseif($action == 'type_mem') include("type_mem.php"); //�����Ż������������ԡ��
		elseif($action == 'add_type_mem') include("add_type_mem.php"); //���������Ż������������ԡ��
		elseif($action == 'edit_type_mem') include("edit_type_mem.php"); //��䢢����Ż������������ԡ��
		
		elseif($action == 'service') include("service.php"); // �������ҵù��(�ػ�ó�)
		elseif($action == 'add_service') include("add_service.php"); //���� �������ҵù��(�ػ�ó�)
		elseif($action == 'edit_service') include("edit_service.php"); //��� �������ҵù��(�ػ�ó�)
		
		elseif($action == 'rate') include("rate.php"); // �ѵ�Ҥ�ҹ�ӻл�
		elseif($action == 'add_rate') include("add_rate.php"); //���� �ѵ�Ҥ�ҹ�ӻл�
		elseif($action == 'edit_rate') include("edit_rate.php"); //��� �ѵ�Ҥ�ҹ�ӻл�
		
		elseif($action == 'start') include("start.php"); //�����Ż������������ԡ��
		elseif($action == 'add_start') include("add_start.php"); //���������Ż������������ԡ��
		elseif($action == 'edit_start') include("edit_start.php"); //��䢢����Ż������������ԡ��
		
		//--------------------------��§ҹ----------------------------
		elseif($action == 'report_17') include("report_17.php"); //��§ҹ�.17 
		//elseif($action == 'view_detail') include("view_detail.php")//����ҧ�ҡ �.17
		elseif($action == 'Rep_Monthly0') include("Rep_Monthly0.php"); //�����§ҹ��ػ�Ѵ�纻�Ш���͹����
		elseif($action == 'Rep_Monthly0_2') include("Rep_Monthly0_2.php"); //�����§ҹ��ػ�Ѵ�纻�Ш���͹ࢵ
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
		elseif($action == 'report_remainall') include("report_remainall.php"); //��§ҹ����稤�ҧ����
		elseif($action == 'Rep_FindMeter0') include("Rep_FindMeter0.php"); //��§ҹ�ҵ� 0 
		elseif($action == 'Rep_FindMeterMax') include("Rep_FindMeterMax.php"); //��§ҹ�ҵ��٧
		elseif($action == 'report_ZMonthly1') include("report_ZMonthly1.php");//��§ҹ��ػ�Ѵ�纻�Ш���͹���ࢵ
		elseif($action == 'report_ZMonthly2') include("report_ZMonthly2.php");//��§ҹ��ػ��ҧ����
		elseif($action == 'report_ZMonthly3') include("report_ZMonthly3.php");//��§ҹ�.32 ࢵ
		elseif($action == 'report_ZMonthly4') include("report_ZMonthly4.php");//��§ҹ��ŵѴ���
   		elseif($action == 'report_ZMonthly5') include("report_ZMonthly5.php");//��§ҹ��ػ�ʹ����纻�Ш�ࢴ
		elseif($action == 'report_ZMonthly6') include("report_ZMonthly6.php");//��§ҹ��ػ�ʹ��ҧ����(�¡ࢵ)
		//----------------------------------- �͡����� ---------------------------------------------
		elseif($action =='frm_receive') include ("frm_receive.php");
		
		//----------------------------------- �ѹ�֡�ҵ��Ѵ��ӻ�Ш���͹ ---------------------------------------------
		elseif($action =='frm_meter2') include ("frm_meter2.php");
		
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
		elseif($action =='find_mem') include("find_mem.php"); 
	    elseif($action == '' or $action == 'center') echo "<center><br><br><br><br><br><br><br><span class='TextWellcome'>�Թ�յ�͹�Ѻ�������к�</span></center>"; 
	}elseif($_SESSION['username'] == '' ) {
	?>
        <br>
        <br>
        <form name="ff" action="login.php" method="post">
          <table width="352" border="0" cellspacing="1" cellpadding="1" align="center"  height="233" background="images/PM1/Blue2.png">
            <tr>
              <td align="center" width="100%" height="231" colspan="2" valign="top">
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
	} //elseif($_SESSION[username] <>'' and $action == 'center'){
	?>
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
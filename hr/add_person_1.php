<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>����¹����ѵԾ�ѡ�ҹ</title>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0">
    <tr>
      <td width="100%" >
	  <div align="right" >
        <table width="11%" height="112" border="1">
        <tr>
          <td width="90"><div align="center">�ٻ����</div></td>
        </tr>
	  </table>  </div>
	  <br></br>
      <table width="100%" height="91" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="19%" height="89">
            <br>
            <div align="center" class="style2"> ����Ẻ�����     </div></br>   
			        <br>
            </br></td>
          <td width="49%"><div align="center" >����¹����ѵԾ�ѡ�ҹ</div></td>
          <td width="32%"><div align="left"><br>
            &nbsp;&nbsp;��������ѹ���............................. </br><br>
&nbsp;&nbsp;��Ѻ��ا���駷��......�����..............</br>
                      </div></td>
        </tr>
      </table>      
      <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="4" height="30">��ǹ��� 1 : ��������ǹ��� </td>
          </tr>
        <tr>
          <td height="30">�ѹ����è� &nbsp;&nbsp;
              <? if ($date=='') $date=$now; ?>
              <? include ('function_calendar.php');?>
              <input type="text" name="date" value="<?php echo $date; ?>"  size="10" />
&nbsp;<img src='images/calendar.gif'  onclick="popupCalender('date');"  width='19'  height='19' /></td>
          <td width="204">�ѹ���������ҹ</td>
          <td colspan="2">�Ţ��边ѡ�ҹ 
              <label>
              <input name="textfield" type="text" size="20" maxlength="5" />
              </label>
          </td>
          </tr>
        <tr>
          <td colspan="3">����-ʡ��  
            <label>
            <input name="radiobutton" type="radio" value="radiobutton" />
            ���            </label>
              <label>
              <input name="radiobutton" type="radio" value="radiobutton" />
�ҧ
<input name="radiobutton" type="radio" value="radiobutton" />
�ҧ���
<input name="name" type="text" id="name" value="" size="50" maxlength="100" />
            </label>
          </td>
          <td width="173">�ѹ ��͹ �� �Դ </td>
        </tr>
        <tr>
          <td width="235" height="30">�Ţ��Шӵ�ǻ�ЪҪ�</td>
          <td colspan="2">�Ţ��Шӵ�Ǽ����������</td>
          <td>�Ţ��Шӵ�Ǻѵû�Сѹ�ѧ��</td>
        </tr>
        <tr>
          <td height="30">���������Դ����� �Ţ��� </td>
          <td colspan="2">���</td>
          <td>���</td>
        </tr>
        <tr>
          <td height="30">�Ӻ�</td>
          <td colspan="2" >�����</td>
          <td >�ѧ��Ѵ</td>
        </tr>
        <tr>
          <td height="30">������ɳ���</td>
          <td colspan="3" ><span class="style10">���Ѿ��</td>
          </tr>
        <tr>
          <td colspan="4" height="30">�������������¹��ҹ</td>
        </tr>
        <tr>
          <td width="235" height="30">�������ʹ</td>
          <td width="204">���ͪҵ�</td>
          <td width="146">�ѭ�ҵ�</td>
          <td width="173">��ʹ�</td>
        </tr>
        <tr>
          <td colspan="2" height="30">���ͤ������
              <label>
              <input name="textfield22" type="text" size="50" maxlength="100" />
              </label>
          </td>
          <td colspan="2">�������Ѿ��</td>
          </tr>
        <tr>
          <td colspan="2" height="30">ʶҹ���ӧҹ</td>
          <td colspan="2">���˹�</td>
          </tr>
        <tr>
          <td height="30">�ѹ�������ش��÷ӧҹ</td>
          <td colspan="2">����������͡ 
            <label>
            <input name="radiobutton" type="radio" value="radiobutton" />
            ���͡ 
             <input name="radiobutton" type="radio" value="radiobutton" />
���͡</label></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>      
      <p>&nbsp;</p></td>
    </tr>
  </table>
</form>
</body>
</html>


<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="Yetii/custom.css">
<link rel="stylesheet" type="text/css" href="Yetii/white.css">
<script type="text/javascript" src="Yetii/yetii-min.js"></script>
<script language="JavaScript" src="include/calendar.js"></script>


<style type="text/css">
<!--
.style9 {font-family: Tahoma; font-size: 14px; }
.style3 {font-family: Tahoma; font-weight: bold; font-size: 18px; }
.style6 {font-family: Tahoma; font-size: 16px; }
-->
</style>


<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<title>����¹����ѵԾ�ѡ�ҹ</title>
<style type="text/css">
<!--
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
-->
</style>
<div class="demolayout" id="demo">
<input name="user_id" type="hidden" id="user_id" value="<?=$user_id?>" />
<table width="100%" border="0">
        <tr>
          <td width="100%">

  <ul class="demolayout" id="demo-nav">
    <li><a href="#tab1">��������ǹ���</a> </li>
    <li><a href="#tab2">�����źص�</a> </li>
    <li><a href="#tab3">����֡��</a> </li>
    <li><a href="#tab4">��÷ӧҹ</a> </li>
    <li><a href="#tab5">��ý֡ͺ��</a></li>
	 <li><a href="#tab6">�����</a></li>
	  <li><a href="#tab7">��ŧ�ɷҧ�Թ��</a></li>
	  </ul>  
  <div class="tabs-container">
    <div class="tab" id="tab1" style="text-align:;">
      <form id="form1" name="form1" method="post" action="">
  <div align="right">
        <table width="100%" height="112" border="0">
        <tr>
          <td><div align="right">
            <table width="90" height="100" border="1" align="right">
            <tr>
              <td><div align="center">�ٻ����</div></td>
            </tr>
          </table></div>
          </td>
        </tr>
	  </table>  </div>
	  <br></br>
	  <?
	  //-----------���¡������-------------------
   $sql="SELECT * FROM person WHERE user_id=$user_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
 ?>
	  <table width="100%" border="1">
        <tr>
          <td width="20%"><br>
              <div align="center" class="style3">����Ẻ�����</div>
                </br>   
			        <br>
            </br></td>
          <td width="53%"><div align="center"><span class="style3 style12">����¹����ѵԾ�ѡ�ҹ</span></div></td>
          <td width="27%"><br>
&nbsp;<span class="style9">&nbsp;<span class="style14">��������ѹ���...................... </br>
<br>
&nbsp;&nbsp;��Ѻ��ا���駷��......�����..........</span></span></td>
        </tr>
      </table>
        <table width="100%" border="1">
          <tr>
            <td colspan="2"><span class="style9"><br>
              <span class="style15">��ǹ��� 1 : ��������ǹ��� </span></span></td>
            </tr>
          <tr>
            <td width="369"><span class="style9"><br>
                �ѹ����è� </span>&nbsp;&nbsp;
              <input type="text" name="date_contain" value="<? if($date_contain =='') echo date("d/m/Y") ;else echo $date_contain;?>"  size="10" />
&nbsp; <img src="images/calendar.png" onclick="showCalendar('date_contain','DD/MM/YYYY')"   width='19'  height='19' /> </td>
            <td width="411"><span class="style9"><br>�ѹ�����ҷӧҹ &nbsp;&nbsp; </span>
              <? ?>
              <input type="text" name="start_work" value="<? if($start_work =='') echo date("d/m/Y") ;else echo $start_work;?>"  size="10" />
&nbsp; <img src="images/calendar.png" onclick="showCalendar('start_work','DD/MM/YYYY')"   width='19'  height='19' /></td>
          </tr>
          <tr>
            <td><span class="style9"><br>�Ţ��边ѡ�ҹ &nbsp;&nbsp;
                <label>
                <input name="per_id" type="text" id="per_id" size="20" maxlength="5" value="<?=$d[per_id]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>�ѹ ��͹ �� �Դ
        &nbsp;&nbsp;
        <?  ?>
        <input type="text" name="birthday" value="<? if($birthday =='') echo date("d/m/Y") ;else echo $birthday;?>"  size="10" />
&nbsp; <img src="images/calendar.png" onclick="showCalendar('birthday','DD/MM/YYYY')"   width='19'  height='19' /></span></td>
          </tr>
          <tr>
            <td colspan="2"><span class="style9"><br>����-ʡ��
                <label>
                <input name="article" type="radio" value="article" />
��� </label>
                <label>
                <input name="article" type="radio" value="article" />
�ҧ
<input name="article" type="radio" value="article" />
�ҧ��� &nbsp;&nbsp;
<input name="name" type="text" id="name" size="50" maxlength="100" value="<?=$d[name]?>"/>
                </label>
            </span></td>
            </tr>
          <tr>
            <td><span class="style9"><br>�������ʹ  &nbsp;&nbsp;
                <label> </label>
                <input name="blood" type="text" size="10" value="<?=$d[blood]?>" />
            </span></td>
            <td><span class="style9"><br>�Ţ��Шӵ�ǻ�ЪҪ�</span><span class="style9"> &nbsp;&nbsp;
                <label>
                <input name="id_person" type="text" size="30" maxlength="13" value="<?=$d[id_person]?>" />
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>�Ţ��Шӵ�Ǽ����������  &nbsp;&nbsp;
                <label>
                <input name="tax_id" type="text" size="20"  value="<?=$d[tax_id]?>"/>
                </label>
            </span></td>
            <td><span class="style9"><br>�Ţ��Шӵ�Ǻѵû�Сѹ�ѧ��&nbsp;&nbsp;
                <label>
                <input name="ss_id" type="text" size="20" value="<?=$d[ss_id]?>" />
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>���������Դ����� �Ţ���  &nbsp;&nbsp;
                <label>
                <input name="number" type="text" size="10" value="<?=$d[number]?>" />
                </label>
            </span><span class="style9">
            <label></label>
            </span></td>
            <td><span class="style9"><br>���  &nbsp;&nbsp;
                <label>
                <input name="alley" type="text" size="20" value="<?=$d[alley]?>"/>
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>���  &nbsp;&nbsp;
                <label>
                <input name="road" type="text" size="30" value="<?=$d[road]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>�Ӻ�  &nbsp;&nbsp;
                <label>
                <input name="district" type="text" size="20" value="<?=$d[district]?>" />
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>�����  &nbsp;&nbsp;
                <label>
                <input name="prefecture" type="text" size="20" value="<?=$d[prefecture]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>�ѧ��Ѵ<font  size="2"> &nbsp;&nbsp;
                  <label> </label><?=$d[province]?>
                  <select name="province">
                    <option value="00"  >---- ���͡�ѧ��Ѵ ----</option>
                    <option value='��ا෾��ҹ��'>��ا෾��ҹ��</option>
                    <option value='��к��'>��к��</option>
                    <option value='�ҭ������'>�ҭ������</option>
                    <option value='����Թ���'>����Թ���</option>
                    <option value='��ᾧྪ�'>��ᾧྪ�</option>
                    <option value='�͹��'>�͹��</option>
                    <option value='�ѹ�����'>�ѹ�����</option>
                    <option value='���ԧ���'>���ԧ���</option>
                    <option value='�ź���'>�ź���</option>
                    <option value='��¹ҷ'>��¹ҷ</option>
                    <option value='�������'>�������</option>
                    <option value='�����'>�����</option>
                    <option value='��§���'>��§���</option>
                    <option value='��§����'>��§����</option>
                    <option value='��ѧ'>��ѧ</option>
                    <option value='��Ҵ'>��Ҵ</option>
                    <option value='�ҡ'>�ҡ</option>
                    <option value='��ù�¡'>��ù�¡</option>
                    <option value='��û��'>��û��</option>
                    <option value='��þ��'>��þ��</option>
                    <option value='����Ҫ����'>����Ҫ����</option>
                    <option value='�����ո����Ҫ'>�����ո����Ҫ</option>
                    <option value='������ä�'>������ä�</option>
                    <option value='�������'>�������</option>
                    <option value='��Ҹ����'>��Ҹ����</option>
                    <option value='��ҹ'>��ҹ</option>
                    <option value='���������'>���������</option>
                    <option value='�����ҹ�'>�����ҹ�</option>
                    <option value='��ШǺ���բѹ��'>��ШǺ���բѹ��</option>
                    <option value='��Ҩչ����'>��Ҩչ����</option>
                    <option value='�ѵ�ҹ�'>�ѵ�ҹ�</option>
                    <option value='��й�������ظ��'>��й�������ظ��</option>
                    <option value='�����'>�����</option>
                    <option value='�ѧ��'>�ѧ��</option>
                    <option value='�ѷ�ا'>�ѷ�ا</option>
                    <option value='�ԨԵ�'>�ԨԵ�</option>
                    <option value='��ɳ��š'>��ɳ��š</option>
                    <option value='ྪú���'>ྪú���</option>
                    <option value='ྪú�ó�'>ྪú�ó�</option>
                    <option value='���'>���</option>
                    <option value='����'>����</option>
                    <option value='�����ä��'>�����ä��</option>
                    <option value='�ء�����'>�ء�����</option>
                    <option value='�����ͧ�͹'>�����ͧ�͹</option>
                    <option value='��ʸ�'>��ʸ�</option>
                    <option value='����'>����</option>
                    <option value='�������'>�������</option>
                    <option value='�йͧ'>�йͧ</option>
                    <option value='���ͧ'>���ͧ</option>
                    <option value='�Ҫ����'>�Ҫ����</option>
                    <option value='ž����'>ž����</option>
                    <option value='�ӻҧ'>�ӻҧ</option>
                    <option value='�Ӿٹ'>�Ӿٹ</option>
                    <option value='���'>���</option>
                    <option value='�������'>�������</option>
                    <option value='ʡŹ��'>ʡŹ��</option>
                    <option value='ʧ���'>ʧ���</option>
                    <option value='ʵ��'>ʵ��</option>
                    <option value='��طû�ҡ��'>��طû�ҡ��</option>
                    <option value='��ط�ʧ����'>��ط�ʧ����</option>
                    <option value='��ط��Ҥ�'>��ط��Ҥ�</option>
                    <option value='������'>������</option>
                    <option value='��к���'>��к���</option>
                    <option value='�ԧ�����'>�ԧ�����</option>
                    <option value='��⢷��'>��⢷��</option>
                    <option value='�ؾ�ó����'>�ؾ�ó����</option>
                    <option value='����ɮ��ҹ�'>����ɮ��ҹ�</option>
                    <option value='���Թ���'>���Թ���</option>
                    <option value='˹ͧ���'>˹ͧ���</option>
                    <option value='˹ͧ�������'>˹ͧ�������</option>
                    <option value='��ҧ�ͧ'>��ҧ�ͧ</option>
                    <option value='�ӹҨ��ԭ'>�ӹҨ��ԭ</option>
                    <option value='�شøҹ�'>�شøҹ�</option>
                    <option value='�صôԵ��'>�صôԵ��</option>
                    <option value='�ط�¸ҹ�'>�ط�¸ҹ�</option>
                    <option value='�غ��Ҫ�ҹ�'>�غ��Ҫ�ҹ�</option>
                  </select>
            </font></span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>������ɳ���  &nbsp;&nbsp;
                <label>
                <input name="zip_code" type="text" size="20" value="<?=$d[zip_code]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>���Ѿ�� &nbsp;&nbsp;
                <input name="phone" type="text" id="phone" size="50" value="<?=$d[phone]?>" />
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>����������¹��ҹ  <label>                </label>
                <label>
                <textarea name="address" cols="30" rows="5" id="address" value="<?=$d[address]?>"></textarea>
                </label>
</span><span class="style9"><br>&nbsp;&nbsp;
                <label></label>
            </span></td>
            <td><span class="style9"><br>���ͪҵ�  &nbsp;&nbsp;
                <label> </label>
                <input name="race" type="text" size="15" value="<?=$d[race]?>" />
            </span></td>
          </tr>
          <tr>
            <td><span class="style6"><br>�ѭ�ҵ� &nbsp;&nbsp;
                <label> </label>
                <input name="nationality" type="text" size="15" value="<?=$d[nationality]?>" />
            </span></td>
            <td><span class="style9"><br>��ʹ�</span><span class="style9"> &nbsp;&nbsp;
                <label> </label>
                <input name="faith" type="text" size="15" value="<?=$d[faith]?>" />
            </span></td>
          </tr>
          <tr>
            <td colspan="2"><span class="style9"><br>���ͤ������
                <label>
                <input name="mate_name" type="text" size="50" maxlength="100" value="<?=$d[mate_name]?>" />
                </label>
            </span></td>
            </tr>
          <tr>
            <td colspan="2"><span class="style9"><br>ʶҹ���ӧҹ
                <input name="office" type="text" size="40" maxlength="255"value="<?=$d[office]?>" />
            </span></td>
            </tr>
          <tr>
            <td><span class="style9"><br>���˹�
                <input name="ruck" type="text" size="40" maxlength="255" value="<?=$d[ruck]?>" />
            </span></td>
            <td><span class="style9"><br>�������Ѿ��
                <input name="tel" type="text" size="30" maxlength="100" value="<?=$d[tel]?>" />
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>�ѹ�������ش��÷ӧҹ&nbsp;&nbsp;
                <input type="text" name="work_cease" value="<? if($work_cease =='') echo date("d/m/Y") ;else echo $work_cease;?>"  size="10" />
&nbsp; <img src="images/calendar.png" onclick="showCalendar('work_cease','DD/MM/YYYY')"   width='19'  height='19' />
<label></label>
            </span></td>
            <td><span class="style9"><br>����������͡
                <label>
                <input name="type_issuing" type="radio" value="<?=$d[radiobutton]?>" />
���͡
<input name="type_issuing" type="radio" value="<?=$d[radiobutton]?>" />
����ó�</label>
            </span>
              <label></label>
              <label></label></td>
          </tr>
          <tr>
            <td><span class="style9"><br>�Թ����  &nbsp;&nbsp;
                <label>
                <input name="pension" type="text" size="10" value="<?=$d[pension]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>�������Թ����ͧ�ѡ�ء��͹(�Թ����)  &nbsp;&nbsp;
                <label>
                <input name="savings" type="text" size="20" value="<?=$d[savings]?>" />
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>�Թ������駵�  &nbsp;&nbsp;
                <label>
                <input name="start_savings" type="text" size="20" value="<?=$d[start_savings]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>��Сѹ�ѧ��
                <label>
                <input name="social_security" type="radio" value="radiobutton"/>
�ѡ
<input name="social_security" type="radio" value="radiobutton"/>
����ѡ</label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>�Թ������ʴԡ��  &nbsp;&nbsp;
                <label>
                <input name="welfare_loan" type="text" size="20" value="<?=$d[welfare_loan]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>�Թ��ҡ�õ�Ҵ  &nbsp;&nbsp;
                <label>
                <input name="corgo_marketing" type="text" id="corgo_marketing" size="30"  value="<?=$d[corgo_marketing]?>"/>
                </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="style9"><br>��Ҥ�  &nbsp;&nbsp;
                <label>
                <input name="guild" type="text" id="guild" size="20" value="<?=$d[guild]?>" />
                </label>
            </span></td>
            <td><span class="style9"><br>����Թ  &nbsp;&nbsp;
                <label>
                <input name="saving" type="text" id="saving" size="20" value="<?=$d[saving]?>" />
                </label>
            </span></td>
          </tr>
          <tr>
            <td colspan="2"><span class="style9">
              <label><br>
              ����   &nbsp;&nbsp;
<input name="another" type="text" id="another" size="50" value="<?=$d[another]?>" />
              </label>
            </span></td>
          </tr>
          <tr>
            <td height="32" colspan="2">             
              <span class="style9">
              <label></label>
              <div align="center">
                <input type='submit' name='send' value='�ѹ�֡������' />
                <input type='reset' name='reset' value='¡��ԡ' />
                </div>
              </span></td>
            </tr>
        </table>
        </form>
    </div>
	<?

//-----------�ʴ�������-------------------
    $sql="SELECT * FROM shop order by shop_name ";
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
	$result1 = mysql_query($sql);
		?>
    <div class="tab" id="tab2" style="text-align:center;">
      <form id="form1" name="form1" method="post" action="">
	  
        <table width="100%" border="0">
          <tr>
            <td colspan="4"><p class="style6"><strong>��ǹ��� 2 : �����źص� </strong></p>
			<center>
			</center>
              <p>&nbsp;</p></td>
            </tr>
          <tr>
            <td width="274" bgcolor="#33CC99"><div align="center" class="style6">����-ʡ��</div></td>
            <td width="118" bgcolor="#33CC99"><div align="center" class="style6">�ѹ�Դ</div></td>
            <td width="192" bgcolor="#33CC99"><div align="center" class="style6">ʶҹ�֡��</div></td>
            <td width="188" bgcolor="#33CC99"><div align="center" class="style6">���ӧҹ</div></td>
          </tr>
          <tr>
            <td><?=$d[name]?></td>
            <td><?=$d[birthday]?></td>
            <td><?=$d[lyceum]?></td>
            <td><?=$d[office]?></td>
          </tr>
		  <? // }?>
        </table>
		   
        <? 
		mysql_close();	
?>
      </form>
    </div>
	
	
	<div class="tab" id="tab3" style="text-align:center;">
	  <form id="form1" name="form1" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td colspan="5"><p class="style6"><strong>��ǹ��� 3 : �����š���֡��</strong>			  </p>
			  <p>
			            <?

//-----------�ʴ�������-------------------
    $sql="SELECT * FROM education  ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
	            </p></td>
            </tr>
          <tr>
            <td width="277" bgcolor="#33CC99"><div align="center"><span class="style6">�дѺ����֡��(�ز�)</span></div></td>
            <td width="341" bgcolor="#33CC99"><div align="center"><span class="style6">����ʶҹ�֡��</span></div></td>
            <td width="160" bgcolor="#33CC99"><div align="center"><span class="style6">�ա���֡�ҷ�診</span></div></td>
          </tr>
          <tr>
            <td><?=$d[graed]?></td>
            <td><?=$d[academy]?></td>
            <td><?=$d[year]?></td>
          </tr>
		     <? // }?>
        </table>
        ��
        <? 
		mysql_close();	
?>
	  </form>
      </div>
	
	<div class="tab" id="tab4" style="text-align:center;">
      <form id="form1" name="form1" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td colspan="5"><p class="style6"><strong>��ǹ��� 4 : �����š�÷ӧҹ</strong>			  </p>
			  <p>
                <?

//-----------�ʴ�������-------------------
    $sql="SELECT * FROM work  ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
              </p></td>
            </tr>
          <tr>
            <td width="127" bgcolor="#33CC99"><div align="center"><span class="style6">�ѹ���������ӧҹ</span></div></td>
            <td width="213" bgcolor="#33CC99"><div align="center"><span class="style6">���˹�</span></div></td>
            <td width="194" bgcolor="#33CC99"><div align="center"><span class="style6">����</span></div></td>
            <td width="122" bgcolor="#33CC99"><div align="center"><span class="style6">�дѺ</span></div></td>
            <td width="110" bgcolor="#33CC99"><div align="center"><span class="style6">�Թ��͹</span></div></td>
          </tr>
          <tr>
            <td><?=$d[start_work]?></td>
            <td><?=$d[ruck]?></td>
            <td><?=$d[part]?></td>
            <td><?=$d[grade]?></td>
            <td><?=$d[pay]?></td>
          </tr>
		     <? //}?>
        </table>
        <? 
		mysql_close();	
?>
      </form>
    </div>
    <div class="tab" id="tab5" style="text-align:center;">
      <form id="form1" name="form1" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td colspan="3"><p class="style6"><strong>��ǹ��� 5 : �����š�ý֡ͺ�� </strong></p>
			  <center>
			    <p align="left">
                <?

//-----------�ʴ�������-------------------
    $sql="SELECT * FROM training  ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
              </p>
			  </center></td>
          </tr>
          <tr bgcolor="#33CC99">
            <td width="249"><div align="center"><span class="style6">��ǧ�ѹ���֡</span></div></td>
            <td width="274" bgcolor="#33CC99"><div align="center"><span class="style6">ʶҹ���</span></div></td>
            <td width="255"><div align="center"><span class="style6">�زԷ�����Ѻ</span></div></td>
          </tr>
          <tr>
            <td><?=$d[duration]?></td>
            <td><?=$d[place]?></td>
            <td><?=$d[qualification]?></td>
          </tr>
		     <? //}?>
        </table> 
      �    
      <? 
		mysql_close();	
?>
      </form> 
    </div>
    <div class="tab" id="tab6" style="text-align:left;">
      <form id="vacation" name="vacation" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td class="bmText" colspan="5"><p class="style6"><strong>��ǹ��� 6 : �����š����</strong></p>

	            <p>
	              <?
if($search <>''){
	$sql="SELECT  p.*,v.* from personnel p,vacation v   WHERE 1 = 1 
and p.user_id = v.user_id ";

if($date_begin <> '' ){
	$sql .= " AND v.date_begin like '%$date_begin%'  ";
}
if($date_end <> '' ){
	$sql .= " AND v.date_end like '%$date_end%'  ";
}
if($num <> '' ){
	$sql .= " AND v.num like '%$num%'  ";
}
if($leave_type <> '' ){
	$sql .= " AND v.leave_type like '%$leave_type%'  ";
}
if($note <> '' ){
	$sql .= " AND v.note like '%$note%'  ";
}

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

}
$result1 = mysql_query($sql);

?>
	            </p>              </td>
            </tr>
          <tr bgcolor="#33CC99">
            <td width="152" class="bmText"><div align="center"><span class="style6 style17">�ѹ��������</span></div></td>
            <td width="156" bgcolor="#33CC99" class="bmText"><div align="center"><span class="style6 style17">�֧�ѹ���</span></div></td>
            <td width="91" class="bmText"><div align="center" class="style9">�ӹǹ�ѹ��</div></td>
            <td width="187" class="bmText"><div align="center"><span class="style6 style17">�����������</span></div></td>
            <td width="192" class="bmText"><div align="center"><span class="style6 style17">�����˵�</span></div></td>
          </tr>
		  <?
$i = 0;
while($rs=mysql_fetch_array($result1)){

	$i++;
	if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
?>     
<a href="?action=add_vacation&v_id=<?=$rs[v_id]?>"  >
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#FFCC00'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">

            <td><? echo $rs[date_begin];  ?></td>
            <td><? echo $rs[date_end]?></td>
            <td><? echo $rs[num]?></td>
            <td><? echo $rs[leave_type]?></td>
            <td><? echo $rs[note]?></td>
          </tr>
		  </a>
		     <? }?>
        </table>
        <center>
          <font size="2" class="bmText" ><span class="style21">�ӹǹ ������ <b>
          <?= $Num_Rows;?>
          </b>&nbsp;��Ѻ&nbsp;&nbsp;
          �¡�� : <b>
          <?=$Num_Pages;?>
          </b>&nbsp;˹��<br />
&nbsp; ˹�� :
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=personnel_story&search=$search&Page=$Prev_Page&date_begin=$date_begin&date_end=$date_end'&num=$num&leave_type=$leave_type'&note=$note'><< ��͹��Ѻ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=personnel_story&search=$search&Page=$i&date_begin=$date_begin&date_end=$date_end'&num=$num&leave_type=$leave_type'&note=$note'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=personnel_story&search=$search&Page=$Next_Page&date_begin=$date_begin&date_end=$date_end'&num=$num&leave_type=$leave_type'&note=$note'> ˹�ҶѴ�>> </a>";

?>
          </span></font>
        </center> </form>
	  </div>         
	       

	  <div class="tab" id="tab7" style="text-align:center;">	
	  <form id="form1" name="form1" method="post" action="">
        <table width="100%" border="0">
          <tr>
            <td colspan="3"><p class="style6"><strong>��ǹ��� 7 : �����ź�ŧ�ɷҧ�Թ��</strong></p>
			  <center>
              <table width="401" border="1">
                <tr>
                  <td width="101"><span class="style9">�ѹ���</span></td>
                  <td width="284"><span class="style9">
                    <? ?>
                    <input name="date_punish" type="text" id="date_punish" value="<? if($birthday =='') echo date("d/m/Y") ;else echo $birthday;?>"  size="10" />
&nbsp; <img src="images/calendar.png" onclick="showCalendar('birthday','DD/MM/YYYY')"   width='19'  height='19' /></span></td>
                </tr>
                <tr>
                  <td><span class="style9">��¡��</span></td>
                  <td><span class="style9">
                    <input name="li_st" type="text" id="li_st" size="40" maxlength="255" />
                  </span></td>
                </tr>
                <tr>
                  <td><span class="style9">�͡�����ҧ�ԧ</span></td>
                  <td><span class="style9">
                    <input name="refer" type="text" id="refer" size="40" maxlength="255" />
                  </span></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="center">
                    <input type='submit' name='send7' value='�ѹ�֡������' />
                    <input type='reset' name='reset7' value='¡��ԡ' />
                  </div></td>
                  </tr>
              </table>          
			  </center>
			      <p>
			        <?

//-----------�ʴ�������-------------------
    $sql="SELECT * FROM punish  ";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
			      </p></td>
            </tr>
          <tr>
            <td width="151" bgcolor="#33CC99"><div align="center"><span class="style6">�ѹ���</span></div></td>
            <td width="367" bgcolor="#33CC99"><div align="center"><span class="style6">��¡��</span></div></td>
            <td width="260" bgcolor="#33CC99"><div align="center"><span class="style6">�͡�����ҧ�ԧ</span></div></td>
          </tr>
          <tr>
            <td><?=$d[date_punish]?></td>
            <td><?=$d[li_st]?></td>
            <td><?=$d[refer]?></td>
          </tr>
		     <? //}?>
        </table>
        ��
        <? 
		mysql_close();	
?>
	  </form>
	  </div>
	  </div>
<SCRIPT type=text/javascript>var tabber1 = new Yetii({
id: 'demo'
});

</SCRIPT>

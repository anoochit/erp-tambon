<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css"> 

<? 

if($del =='del'){
	 	$sql_del = "DELETE FROM move WHERE m_id=$m_id";
		$result_del = mysql_query($sql_del);
		
		$sql_up = "UPDATE code SET m_id = '".find_move_id($c_id)."' WHERE c_id = '$c_id' ";
		echo "\$sql_up  ".$sql_up."<br>";
		$result_up  = mysql_query($sql_up); 
		
		echo "<meta http-equiv='refresh' content='0; url=show_control.php?c_id=$c_id'>";
}
if($del =='del1'){
	 	$sql_del = "DELETE FROM useful WHERE u_id=$use_id";
		$result_del = mysql_query($sql_del);
		echo "<meta http-equiv='refresh' content='0; url=show_control.php?c_id=$c_id'>";
}



	$sql="SELECT  r.*,rd.*,c.* from receive r,receive_detail rd,code c 
 WHERE  r.r_id = rd.r_id and c.rd_id = rd.rd_id   and c.c_id ='$c_id' ";
$result1 = mysql_query($sql);
$rs=mysql_fetch_array($result1);
?>
<style type="text/css">
<!--
.style3 {
	font-size: 12px;
	font-weight: normal;
}
.style5 {font-size: 12px; font-weight: bold; }
.style6 {font-size: 12px; color: #CC33CC; }
-->
</style>
<form name="save"  method="post" enctype="multipart/form-data" action="#">
<!--<input type="hidden" name="o_id" value="<?=$o_id?>"> -->
<table width="114%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td colspan="2" align="center" style="border: #FFFFFF 1px solid;">
<table width="114%" border="0" cellpadding="0" cellspacing="0" >
	<tr align="left" >
	<td  height="25"  >
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
          <tr>
            <td width="1045" height="30"><div align="center" class="tbHeadText">����¹����ѳ��</div></td>
            <td width="172"><div align="center">
              <table width="90" border="0" cellpadding="0" cellspacing="0" >
                  <tr >
                    <td style="border: #000000 1px solid;" ><div align="center" class="textnew" >�.�.2&nbsp;</div></td>
                  </tr>
                          </table>
            </div></td>
          </tr>
          <tr>
            <td height="30" ></td>
            <td><div align="center">
              <table width="90" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="90" style="border: #000000 1px solid;" ><div align="center" class="textnew" >1&nbsp;</div></td>
                  </tr>
              </table>
            </div></td>
          </tr>
	          </table>
				<table width="100%" cellpadding="0" cellspacing="0" border="0" >
          <tr >
        <td width="6%" height="28" class="TextNew" >������</td>
        <td width="62%" bgcolor="#FFFFFF" ><span class="style6">
          <?=fild_type($rs[type_id])?>
        </span></td>
        <td width="9%" class="TextNew">�Ţ���ʾ�ʴ�</td>
        <td width="23%" class="TextNew2" bgcolor="#FFFFFF" ><? echo $rs[code];?> </td>
      </tr>
          
	        </table></td>
	</tr>
</table></td>
</tr>
</table>
<table width="114%" border="0">
  <tr>
    <td width="100%" height="600" ><table width="100%" cellpadding="0" cellspacing="0" style="border: #000000 1px solid;">
      <tr>
        <td width="29%" height="319" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: #000000 1px solid;" >
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;" >&nbsp;���ͤ���ѳ���<span class="TextNew2">
:              <?=$rs[rd_name]?>
            </span></td>
          </tr>
          <tr>
            <td height="26" colspan="2"  class="TextNew" style="border: #000000 1px solid;" >&nbsp;��觢ͧ��� : <span class="TextNew2"><? echo $rs[num_id]?></span></td>
          </tr>
          <tr>
            <td height="26" colspan="2" style="border: #000000 1px solid;"  class="TextNew">&nbsp;���� / �����ͼ������ͼ�Ե : 
             <span class="TextNew2"><?=date_2($rs["date_receive"])?></span>            </td>
          </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;Ẻ / ��Դ / �ѡɳ� : <span class="TextNew2"><? echo $rs["type_name"]?></span></td>
          </tr>
		  <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;�����Ţ�ӴѺ : <span class="TextNew2">
              <?=$rs[serial]?>
            </span></td>
          </tr>
		   <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;�����Ţ����ͧ (�����) : <span class="TextNew2"><? echo $rs[num_machine];?></span></td>
          </tr>
		   <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;�����Ţ��ͺ (�����) : <span class="TextNew2">
              <?=$rs[num_box]?>
            </span></td>
          </tr>
		   <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;�����Ţ������¹(�����) : <span class="TextNew2"><? echo $rs[num_stamp];?></span></td>
          </tr>
		   <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;�բͧ����ѳ�� : <span class="TextNew2">
              <?=$rs[colour]?>
            </span></td>
          </tr>
		   <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;���� (������к�) : <span class="TextNew2"><? echo $rs[remark];?></span></td>
          </tr>
		   <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���͹� - ��û�Сѹ</td>
          </tr>
		   <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;����ѳ����Ѻ��Сѹ�֧�ѹ��� : <span class="TextNew2">
              <?
	if($rs["endDate_garan"] <>'0000-00-00') echo date_2($rs["endDate_garan"]);
	else "&nbsp;";?>
            </span></td>
          </tr>
		   <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;����ѳ���Сѹ��������ѷ : <span class="TextNew2"><? echo $rs[garan_at];?></span></td>
          </tr>
		   <tr>
		     <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;�ѹ����Сѹ����ѳ��� : <span class="TextNew2">
		       <?
	if($rs["date_garan"]<>'0000-00-00') echo date_2($rs["date_garan"]);
	else "&nbsp;";?>
		     </span></td>
		     </tr>
		   <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;</td>
          </tr>
        </table></td>
        <td height="26" width="28%" valign="top" ><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: #000000 1px solid;">
           <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;���� / ��ҧ / ���� �ҡ :<span class="TextNew2">
              <?
	if($rs["sale_date"] <>'0000-00-00') echo date_2($rs["sale_date"]);
	else "&nbsp;";?>
            </span></td>
            </tr> <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;���� / ��ҧ / ���� �ѹ��� :<span class="TextNew2">
              <?
	if($rs["sale_date"] <>'0000-00-00') echo date_2($rs["sale_date"]);
	else "&nbsp;";?>
            </span></td>
            </tr>
			 <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="34%" height="24" class="TextNew">&nbsp;�Ҥ� : <span class="TextNew2"><? echo number_format($rs["price"],2)?></span></td>
                <td width="66%"height="24" class="TextNew">�ҷ  �駺����ҳ�ͧ :<span class="TextNew2">
                  <? 
	if($rs["come_in"] =='0')echo '�����' ;
	else if($rs["come_in"] =='1')echo '�ش˹ع' ;
	else if($rs["come_in"] =='2')echo '��ԨҤ' ;
	else if($rs["come_in"] =='3')echo '�Թ���' ;
	else if($rs["come_in"] =='4')echo '����' ;
	?>
                </span></td>
              </tr>
            </table></td>
            </tr>
		  <tr>
            <td colspan="2" height="26" class="TextNew" style="border: #000000 1px solid;"><div align="center">����������Ҥ�</div></td>
          </tr>
		    <tr>
            <td colspan="2" height="26" class="TextNew" style="border: #000000 1px solid;">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="15%">&nbsp;�շ�� 1 : </td>
                  <td width="14%">&nbsp;</td>
			      <td width="33%">% ��������Ҥ�</td>
			      <td width="28%">&nbsp;</td>
				  <td width="10%">�ҷ</td>
               </tr>
              </table></td>
          </tr>
		    <tr>
            <td colspan="2" height="26" class="TextNew" style="border: #000000 1px solid;">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="15%">&nbsp;�շ�� 2 : </td>
                  <td width="14%">&nbsp;</td>
			      <td width="33%">% ��������Ҥ�</td>
			      <td width="28%">&nbsp;</td>
				  <td width="10%">�ҷ</td>
               </tr>
              </table></td>
          </tr>
		    <tr>
            <td colspan="2" height="26" class="TextNew" style="border: #000000 1px solid;">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="15%">&nbsp;�շ�� 3 : </td>
                  <td width="14%">&nbsp;</td>
			      <td width="33%">% ��������Ҥ�</td>
			      <td width="28%">&nbsp;</td>
				  <td width="10%">�ҷ</td>
               </tr>
              </table></td>
	      </tr>
          <tr>
            </tr>
		   <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="15%">&nbsp;�շ�� 4 : </td>
                  <td width="14%">&nbsp;</td>
			      <td width="33%">% ��������Ҥ�</td>
			      <td width="28%">&nbsp;</td>
				  <td width="10%">�ҷ</td>
               </tr>
              </table></td>
            </tr>
			 <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="15%">&nbsp;�շ�� 5 : </td>
                  <td width="14%">&nbsp;</td>
			      <td width="33%">% ��������Ҥ�</td>
			      <td width="28%">&nbsp;</td>
				  <td width="10%">�ҷ</td>
               </tr>
              </table>
			</td>
            </tr>
           <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;"><div align="center"><b>&nbsp;��è�˹���</b></div></td>
            </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;�ѹ����˹��� :<span class="TextNew2">
              <?
	if($rs["sale_date"] <>'0000-00-00') echo date_2($rs["sale_date"]);
	else "&nbsp;";?>
            </span></td>
            </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;�Ըը�˹��� : <span class="TextNew2"><? echo $rs[sale_way];?></span></td>
            </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">&nbsp;�Ţ���˹ѧ���͹��ѵ� :  <span class="TextNew2"><? echo $rs[sale_num];?></span></td>
            </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="32%">&nbsp;�ҤҨ�˹��� :  </td>
                  <td width="55%"><span class="TextNew2"><? echo number_format($rs[sale_price],2);?></span></td>
				  <td width="13%">�ҷ</td>
               </tr>
              </table></td>
            </tr>
          <tr>
            <td height="26" colspan="2" class="TextNew" style="border: #000000 1px solid;">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="TextNew">
                  <td width="32%">&nbsp;����/�Ҵ�ع : </td>
                  <td width="55%"><span class="TextNew2"><? echo number_format($rs[sale_benefit],2);?></span></td>
				  <td width="13%">�ҷ</td>
               </tr>
              </table></tr>
        </table></td>
        <td width="43%" valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: #000000 1px solid;">
            <tr  >
              <td height="26" colspan="6"  align="center"  style="border: #000000 1px solid;" ><span class="TextNew"><b>���ͼ���� - ���� - �Ѻ�Դ�ͺ����ѳ��</b></span></td>
            </tr>
            <tr class="TextNew" >
              <td width="9%" height="26"  align="center"  style="border: #000000 1px solid;" > �.�.</td>
              <td width="30%" align="center"  style="border: #000000 1px solid;" > ������ǹ�Ҫ���</td>
			  <td width="29%" align="center"  style="border: #000000 1px solid;" > ���ͼ�������ѳ��</td>
              <td width="32%" align="center"  style="border: #000000 1px solid;" > �������˹����ǹ�Ҫ���</td>
              
            </tr>
            <?
  $sql = "SELECT * FROM move Where c_id = '$c_id' order by  m_id ";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#FFFFFF';
elseif( $i%2 ==1) $bg ='#CCCCCC';

  ?>
            <tr bgcolor="<?=$bg?>" class="TextNew2">
              <td  height="26"  align="center"  style="border: #000000 1px solid;" >&nbsp;
                  <?=$rs1[year]?></td>
              <td class="TextNew2"  style="border: #000000 1px solid;" >&nbsp;
                  <?  echo $rs1["department"]?></td>
                  <td  style="border: #000000 1px solid;" >&nbsp;
                  <?=$rs1["user"]?></td>
              <td  style="border: #000000 1px solid;" >&nbsp;
                  <?=$rs1["name_head"]?></td>
            </tr>
            <? 
  	$i++;
  }?>
        </table></td>
      </tr>
	  <tr>
        <td height="195" colspan="2" valign="top"><table width="100%" cellspacing="0" cellpadding="0" style="border: #000000 1px solid;">
            <tr  >
              <td height="26" colspan="5"  align="center"  style="border: #000000 1px solid;"  valign="top"><span class="TextNew"><b>����ҼŻ���ª��㹤���ѳ��</b></span></td>
            </tr>
            <tr class="TextNew" >
              <td width="16%" height="26" align="center"  style="border: #000000 1px solid;" > �.�.</td>
              <td width="23%" align="center" style="border: #000000 1px solid;" > ��¡��</td>
              <td width="42%" align="center" style="border: #000000 1px solid;" >�Ż���ª�� (�ҷ) ������Ѻ�������͹������»�</td>             
            </tr>
            <?
 $sql = "SELECT * FROM useful where c_id = '$c_id' order by year ";
//echo $sql ."<br>";
$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){
if($i%2 ==0) $bg ='#FFFFFF';
elseif( $i%2 ==1) $bg ='#CCCCCC';

  ?>
            <tr bgcolor="<?=$bg?>" class="TextNew2">
              <td  height="26"  align="center" style="border: #000000 1px solid;" >&nbsp;
                  <?=$rs1[year]?></td>
              <td  style="border: #000000 1px solid;" >&nbsp;
                  <?  echo $rs1["item"]?></td>
              <td style="border: #000000 1px solid;" >&nbsp;
                  <?=$rs1["useful"]?></td>
              
            </tr>
            <? 
  	$i++;
  }?>
        </table></td>
        <td valign="top"><table width="100%" height="55%" border="0" cellpadding="0"  cellspacing="0" style="border: #000000 1px solid;" >
          <tr>
            <td height="28" ><span class="TextNew"> &nbsp;�ٻ���� (�����) �������Ἱ�ѧ����駤���ѳ��</span></td>
          </tr>
          <tr>
            <td height="165">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  </table>
</form>
</div>
<script language="JavaScript" type="text/javascript">
function godel()
{
	if (confirm("�س��ͧ���ź�����Ź�� ���������"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("�س��ͧ���ź�����ŷ�������� ���������"))
	{
		return true;
	}
		return false;
}
</script>
<?
function find_move_id($c_id) {
	
		$sql = "Select max(m_id) as max  from move  where c_id ='$c_id' ";
		$result = mysql_query($sql); 
		$recn = mysql_fetch_array($result) ;
		return $recn['max'];
	}
?>
<?
include("config.inc.php");
include("date_time.php");
ob_start();
?>
<?
	$sql="SELECT  r.*,rd.*,c.* from receive r,receive_detail rd,code c 
 WHERE  r.r_id = rd.r_id and c.rd_id = rd.rd_id   and c.c_id ='$c_id'";
	echo 	$sql."<br>";
	$result1 = mysql_query($sql);
	$rs=mysql_fetch_array($result1);
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
<!--
.style4 { font-family:"Microsoft Sans Serif" font-size: 7px; }
.style13 {font-family: "Microsoft Sans Serif"; font-size: 12px; }
-->
</style>
<body>
<table name="add" cellpadding="0" cellspacing="0" border="0"  width="100%">
 
	<tr >
    <td width="100%" height="30">
<table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
 
	<tr >
    <td width="6%" height="30"><span class="style13">������</span></td>
    <td width="19%"><div class="style13"><?=$rs[type]?></div></td>
	    <td width="5%"><span class="style13">����</span></td>
    <td width="17%"><div class="style13"><? echo $rs[code];?>
      </div></td>
   <td width="14%" height="30"><span class="style13">�ѡɳ� / �س���ѵ�</span></td>
    <td width="14%"><div class="style13"><? //echo $rs[open_date];?></div> </td>
				   <td width="8%"><span class="style13">��� / Ẻ</span></td>
    <td width="17%"><div class="style13"><? //echo $rs[paper_id];?></div></td>
  </tr>
  </table>
  </td></tr>
  	<tr >
    <td width="100%" height="30">
  <table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
  <tr >
    <td width="21%" height="30" ><span class="style13">ʶҹ�����/˹��§ҹ����Ѻ�Դ�ͺ</span></td>
    <td width="30%" ><div class="style13"><? if($rs[room_id] <>'') echo room($rs[room_id]);?></div></td>
   <td width="17%" height="30" ><span class="style13">���ͼ����/����Ѻ��ҧ/����ԨҤ</span></td>
    <td width="32%" ><div class="style13"><? echo shop_name($rs[shop_id]);?></div> </td>
  </tr>
      </table>
</td></tr>			
	<tr >
    <td width="100%" height="30">
	<table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
  <tr >
    <td width="5%" height="30" ><span class="style13">�������</span></td>
    <td width="95%" ><div class="style13"><? echo shop_addr($rs[shop_id]);?></div></td>
  </tr>
      </table>
</td></tr>			
			<tr >
    <td width="100%" height="30">
	<table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
  <tr >
    <td width="10%" height="30" ><span class="style13">�������Թ</span></td>
    <td width="90%"  valign="middle"><div class="style13">
	<input type="checkbox" name="m1" value="" <? if($rs[mon_type] == "�Թ������ҳ") echo "checked"?>>&nbsp;&nbsp;�Թ������ҳ&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m2" value=""  <? if($rs[mon_type] == "�Թ�͡������ҳ") echo "checked"?>>&nbsp;&nbsp;�Թ�͡������ҳ&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m3" value=""  <? if($rs[mon_type] == "�Թ��ԨҤ/�Թ���������") echo "checked"?>>&nbsp;&nbsp;�Թ��ԨҤ/�Թ���������&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m4" value=""  <? if($rs[mon_type] == "����") echo "checked"?>>&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;
	</div></td>
  </tr>
      </table>
</td>
</tr>
	<tr >
    <td width="100%" height="30">
				<table name="add" cellpadding="1" cellspacing="1" border="0"  width="100%">
  <tr >
    <td width="10%" height="30" ><span class="style13">�Ըա������</span></td>
    <td width="90%" valign="middle" ><div class="style13">
	<input type="checkbox" name="m1" value="" <? if($rs[come_in] == "��ŧ�Ҥ�") echo "checked"?>>&nbsp;&nbsp;��ŧ�Ҥ�&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m2" value=""  <? if($rs[come_in] == "�ͺ�Ҥ�") echo "checked"?>>&nbsp;&nbsp;�ͺ�Ҥ�&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m3" value=""  <? if($rs[come_in] == "��СǴ�Ҥ�") echo "checked"?>>&nbsp;&nbsp;��СǴ�Ҥ�&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m4" value=""  <? if($rs[come_in] == "�Ըվ����") echo "checked"?>>&nbsp;&nbsp;�Ըվ����&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="m5" value=""  <? if($rs[come_in] == "�Ѻ��ԨҤ") echo "checked"?>>&nbsp;&nbsp;�Ѻ��ԨҤ&nbsp;&nbsp;&nbsp;
	</div></td>
  </tr>
            </table>
	  </td></tr></table>
</td>
</tr>
</table>
<br>



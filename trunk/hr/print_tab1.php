<? ob_start();?>
<?
include("config.inc.php");
//session_start();
ob_start();
header('Content-type: application/ms-word');
header('Content-Disposition: attachment; filename="testing.doc"'); 
?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
<!--
.style1 {
	font-family: "Angsana New";
	font-weight: bold;
	font-size: 20px;
}
.style2 {
	font-family: "Angsana New";
	font-size: 18px;
}
-->
</style>
<body>

<table width="100%" align="center" border="0" acellpadding="0" cellspacing="0" bordercolor="#000000">
                                                <tr class="lgBar">
                                                  <td  height="31" colspan="2"><div align="center" class="style1"> Ẻ���Ѻ�������ͺӹҭ</div></td>
                                             
                                                  
                                                </tr>
<?
$sql=" SELECT * FROM person p , ps_tname_ref ps WHERE p.ps_tname_id = ps.ps_tname_id and p.user_id=$user_id ";
$result1 = mysql_query($sql);
$rs=mysql_fetch_array($result1);
$n = explode(" ",$rs[name]);
$birthday  = $rs[birthday] ;
?>   
<tr >
 <td  height="30"   align="right" colspan="2"><span class="style2">�.�.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>
</tr>
<tr >
 <td  height="30"  colspan="2"align="center"><span class="style2">&nbsp;����ͧ���Ѻ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="checkbox" size="10" name="check">&nbsp;&nbsp;���˹稻���
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="checkbox" size="10" name="check">&nbsp;&nbsp;�ӹҭ����
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="checkbox" size="10" name="check">&nbsp;&nbsp;�ӹҭ�����
 </span></td>
</tr>
<tr >
 <td width="48%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;<?=$n[0] ?>
 </span></td>
  <td width="52%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;ʡ��&nbsp;&nbsp;&nbsp;&nbsp;<?=$n[1] .$n[2].$n[3].$n[4].$n[5].$n[6]?>  
 </span></td>
</tr>
<tr >
 <td  height="30"   colspan="2"align="left"><span class="style2">&nbsp;&nbsp;���˹��ش����&nbsp;&nbsp;&nbsp;&nbsp;<?=work_max($user_id) ?>
 </span></td>

</tr>
<tr >
 <td  height="30"  align="left"><span class="style2">&nbsp;&nbsp;1. �������&nbsp;&nbsp;&nbsp;&nbsp;<?//=$n[0] ?>
 </span></td>
  <td  height="30"  align="left"><span class="style2">&nbsp;&nbsp;����ʡ�����&nbsp;&nbsp;&nbsp;&nbsp;<?//=$n[1] ?>  
 </span></td>
</tr>
<tr >
 <td  height="30"  align="left" colspan="2"><span class="style2">&nbsp;&nbsp;2. �Դ�ѹ���&nbsp;&nbsp;&nbsp;&nbsp;<? if($birthday<>"" and $birthday<>"0000-00-00"  ){echo date_2($birthday);}else{echo "";} ?> &nbsp;&nbsp;&nbsp;&nbsp;
 �ç�Ѻ�ѹ &nbsp;&nbsp;<? 
 $d = explode("-",$birthday);
 echo date("L", mktime(0, 0, 0,  $d[1],  $d[2], $d[0])); ?>
 </span></td>
</tr>
<tr >
 <td width="48%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;3. ���ͺԴ�&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs[fa_name] ?>
 </span></td>
  <td width="52%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;������ô�&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs[mo_name] ?>
 </span></td>
</tr>
<tr >
 <td  colspan="2"height="30"  align="left"><span class="style2">&nbsp;&nbsp;4. ���ŧ��¡���������������Ѻ�Ҫ��� �ѧ���&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>

</tr> 
<? $sql1 = "SELECT * FROM work WHERE user_id=$user_id order by  start_work asc limit 1";
   		$result1 = mysql_query($sql1);
   		$d1 =mysql_fetch_array($result1);
?>
<tr >
 <td  colspan="2"height="30"  align="left">

 <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�. ���˹� &nbsp;&nbsp;<?=$d1[position]?>
 </span></td>

</tr>
<tr >
 <td  colspan="2"height="30"  align="left">

 <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�. �ѧ�Ѵ &nbsp;&nbsp;<?=$d1[place]?>
 </span></td>

</tr>
<tr >
 <td  colspan="2"height="30"  align="left">

 <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�. ������ѹ��� &nbsp;&nbsp;<?=date_2($d1[start_work])?>
 </span></td>

</tr>
<tr >
 <td  colspan="2"height="30"  align="left">

 <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�. ���� &nbsp;&nbsp;<?
 echo number_format((strtotime("$d1[start_work]") - strtotime("$birthday"))/  ( 60 * 60 * 24 *365)); 
?> &nbsp;��
 </span></td>

</tr>
<tr >
 <td  colspan="2"height="30"  align="left">

 <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�. ���Ѻ�Թ��͹ �����Թ������� ��͹������ <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Ѻ�Թ��͹&nbsp;&nbsp; ��͹��
  <? echo number_format($d1[pay]); ?> &nbsp;&nbsp;�ҷ
 </span></td>

</tr>
<tr >
 <td  colspan="2"height="30"  align="left"><span class="style2">&nbsp;&nbsp;5. �����ҧ����Ѻ�Ҫ���&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>

</tr>
                                              </table>
  <?
function work_max($user_id){
  	 	$sql="SELECT * FROM work WHERE user_id=$user_id order by  start_work desc limit 1";
   		$result = mysql_query($sql);
   		$d =mysql_fetch_array($result);
   		return $d[position]." ".find_type_name($d[type_id])." ".find_div_name1($d[div_id])." "."ͧ���ú�������ǹ�ѧ��Ѵ�����  �ѧ��Ѵ�����";
  }
 ?>
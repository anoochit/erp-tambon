<? ob_start();?>
<?
include("config.inc.php");
ob_start();
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
<?
$sql=" SELECT * FROM person p , ps_tname_ref ps WHERE p.ps_tname_id = ps.ps_tname_id and p.user_id=$user_id ";
$result1 = mysql_query($sql);
$rs=mysql_fetch_array($result1);
$n = explode(" ",$rs[name]);
$birthday  = $rs[birthday] ;
?>   
<table width="100%" align="center" border="0" acellpadding="0" cellspacing="0" bordercolor="#000000">
                                                <tr class="lgBar">
                                                  <td  height="31" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="69%"><div align="center" class="style1"> ����¹����ѵ� <? ?></div></td>
    <td width="31%"><? if($rs[image] <>''){?>
			  			<img src="files/<?=$rs[image]?>"  width="102" height="121"  border="1"/>
		  <? }?></td>
  </tr>
</table></td>
                                                </tr>

<tr >
 <td  height="30"    align="left"colspan="2"><span class="style2">&nbsp;&nbsp;<strong>����ѵԷ����</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>
</tr>
<tr >
 <td width="35%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;����-ʡ�� / �� &nbsp;&nbsp;&nbsp;&nbsp;<?
		  if($d[ps_tname_id] <>'00') echo $rs[ps_tname_item];
		  else " ";
		   ?><?=$rs[name]?>
 </span></td>
  <td width="65%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;�ѭ�ҵ�&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[nationality]?>
 </span></td>
</tr>
<tr >
 <td  height="30"   colspan="2"align="left"><span class="style2">&nbsp;&nbsp;�Դ�ѹ���&nbsp;&nbsp;&nbsp;&nbsp;<? 
 if($rs[birthday]<>"" and $rs[birthday]<>"0000-00-00"  ){
 		$day = explode("-",$rs[birthday]);
 		echo $day[2]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��͹&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".thai_month1($day[1])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�.�.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".($day[0]+543);
 }else{
	 echo "";
} ?>
 </span></td>
</tr>
<tr >
 <td  height="30"   align="left"><span class="style2">&nbsp;&nbsp;�Ţ���ѵû�ЪҪ�&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[id_person] ?> </span></td>
  <td width="65%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;�������ʹ&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[blood]?>
 </span></td>
</tr>
<tr > 
 <td  height="30"   align="left" colspan="2"><span class="style2">&nbsp;&nbsp;ʶҹ�Ҿ��ͺ����&nbsp;&nbsp;&nbsp;&nbsp;<?
if($rs[status_ma] == '�ʴ') echo "<img src='images/check.jpg' width='20' height='20'>&nbsp;&nbsp;&nbsp;&nbsp;�ʴ&nbsp;&nbsp;&nbsp;&nbsp;";else echo "<img src='images/no_check.jpg' width='20' height='20'>&nbsp;&nbsp;&nbsp;&nbsp;�ʴ&nbsp;&nbsp;&nbsp;&nbsp;";
if($rs[status_ma] == '����') echo "<img src='images/check.jpg' width='20' height='20'>&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;";else echo "<img src='images/no_check.jpg' width='20' height='20'>&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;";
if($rs[status_ma] == '�����') echo "<img src='images/check.jpg' width='20' height='20'>&nbsp;&nbsp;&nbsp;&nbsp;�����&nbsp;&nbsp;&nbsp;&nbsp;";else echo "<img src='images/no_check.jpg' width='20' height='20'>&nbsp;&nbsp;&nbsp;&nbsp;�����&nbsp;&nbsp;&nbsp;&nbsp;";
if($rs[status_ma] == '������ҧ') echo "<img src='images/check.jpg' width='20' height='20'>&nbsp;&nbsp;&nbsp;&nbsp;������ҧ&nbsp;&nbsp;&nbsp;&nbsp;";else echo "<img src='images/no_check.jpg' width='20' height='20'>&nbsp;&nbsp;&nbsp;&nbsp;������ҧ&nbsp;&nbsp;&nbsp;&nbsp;";
 ?> </span></td>
</tr>
<tr > 
 <td  height="30"   align="left" colspan="2"><span class="style2">&nbsp;&nbsp;�����������&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;�Ţ��� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[num_address_old]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[moo_old]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[road_old]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Ӻ� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[subdistrict_old]?><br>
                &nbsp;&nbsp;�����&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[district_old]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѧ��Ѵ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[county_old]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Ѿ�������Ţ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[phone_old]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ͷ��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[mobile_old]?>&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>
</tr> 
<tr > 
 <td  height="30"   align="left" colspan="2"><span class="style2">&nbsp;&nbsp;�������һѨ�غѹ&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;�Ţ��� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[num_address]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[moo]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[road]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Ӻ� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[subdistrict]?><br>
                &nbsp;&nbsp;�����&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[district]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѧ��Ѵ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[county]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Ѿ�������Ţ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[phone]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ͷ��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[mobile]?>&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>

</tr><tr > 
 <td  height="30"   align="left" colspan="2"><span class="style2">&nbsp;&nbsp;ʶҹ���������ö�Դ������дǡ&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[place_con]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Ţ��� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[num_address_con]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[moo_con]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
				&nbsp;&nbsp;���&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[road_con]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Ӻ� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[subdistrict_con]?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[district_con]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ѧ��Ѵ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[county_con]?>&nbsp;&nbsp;&nbsp;&nbsp;<br>
				&nbsp;&nbsp;���Ѿ�������Ţ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[phone_con]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ͷ��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[mobile_con]?>&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>

</tr>
<tr > 
 <td  height="30"   align="left" colspan="2"><span class="style2"><table width="100%" cellpadding="1" cellspacing="1" border="0" >
  <tr>
     <td width="179" height="28" ><div align="left">&nbsp;&nbsp;�ԴҪ���</div></td>
    <td width="260"  ><div align="left">&nbsp;<?=$rs[fa_name]?></div></td>
     <td width="90" ><div align="left">�ѭ�ҵ�</div></td>
    <td width="205"  >&nbsp;<?=$rs[fa_nation]?></td>
      <td width="90" ><div align="left">��ʹ�</div></td>
    <td width="204"  >&nbsp;<?=$rs[fa_faith]?></td>
     <td width="90" ><div align="left">�Ҫվ</div></td>
    <td width="165"  >&nbsp;<?=$rs[fa_occu]?></td>
  </tr>


  <tr>
     <td width="179" height="28" ><div align="left">&nbsp;&nbsp;��ôҪ���</div></td>
    <td width="260"  ><div align="left">&nbsp;<?=$rs[mo_name]?></div></td>
     <td width="90" ><div align="left">�ѭ�ҵ�</div></td>
    <td width="205"  >&nbsp;<?=$rs[mo_nation]?></td>
      <td width="90" ><div align="left">��ʹ�</div></td>
    <td width="204"  >&nbsp;<?=$rs[mo_faith]?></td>
     <td width="90" ><div align="left">�Ҫվ</div></td>
    <td width="165"  >&nbsp;<?=$rs[mo_occu]?></td>
  </tr>

  <tr>
     <td width="179" height="28" ><div align="left">&nbsp;&nbsp;������ʪ���</div></td>
    <td width="260"  ><div align="left">&nbsp;<?=$rs[mate_name]?></div></td>
     <td width="90" ><div align="left">�ѭ�ҵ�</div></td>
    <td width="205"  >&nbsp;<?=$rs[mate_nation]?></td>
      <td width="90" ><div align="left">��ʹ�</div></td>
    <td width="204"  >&nbsp;<?=$rs[mate_faith]?></td>
     <td width="90" ><div align="left">�Ҫվ</div></td>
    <td width="165"  >&nbsp;<?=$rs[mate_occu]?></td>
  </tr>
</table>
 </span></td>

</tr>
<tr >
 <td  height="30"    align="left"colspan="2"><span class="style2">&nbsp;&nbsp;<strong>����ѵԡ���֡��</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>
</tr>
<tr >
 <td  height="30"    align="left"colspan="2"><span class="style2"><table width="100%"  cellspacing="1" style="border-collapse:collapse;">
          <tr>   		   
		   <td  height="25"width="362" style="border: #000000 1px solid;"> <div align="center"><strong>ʶҹ����֡��</strong></div></td>
		   <td width="290" style="border: #000000 1px solid;"><div align="center"><strong>�����֧ (��͹��)</strong></div></td>
		   <td width="644" style="border: #000000 1px solid;"><div align="center"><strong>�زԷ�����Ѻ �к��Ң��Ԫ��͡</strong></div></td>
          </tr>
		  <?
		  $sql_1 ="SELECT * FROM education  where user_id ='$user_id'  order by year asc";
		  $result_1 = mysql_query($sql_1);
		  while($d=mysql_fetch_array($result_1)){
		  ?>
          <tr>    
		  <td height="25"  style="border: #000000 1px solid;">&nbsp;<?=$d[academy]?></td>  
		  <td  style="border: #000000 1px solid;" align="center">&nbsp;<?=$d[year]?></td>
		  <td  style="border: #000000 1px solid;">&nbsp;<?=find_edu($d[ps_edu_id]);
		  if($d[grade] <>'' and $d[grade] <>'-') echo "(". $d[grade].")"?></td>	
          </tr>
		     <?  }?>
        </table>
 </span></td></tr>
 <tr >
 <td  height="20"    align="left"  colspan="2"></td>

</tr>
 <tr >
 <td  height="30"    align="left"><span class="style2">&nbsp;&nbsp;<strong>�Ҫվ���</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>
   <td width="65%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[occu_old]?>
 </span></td>
</tr>
<tr >
 <td  height="30"    align="left"><span class="style2">&nbsp;&nbsp;<strong>�Ҫվ�Ѩ�غѹ</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>
   <td width="65%"  height="30"  align="left"><span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;<?=$rs[occu_new]?>
 </span></td>
</tr>
<tr >
 <td  height="20"    align="left"  colspan="2"></td>

</tr>
 <tr >
 <td  height="30"    align="left"colspan="2"><span class="style2">&nbsp;&nbsp;<strong>����ͧ�Ҫ��������ó������Ѻ</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>
</tr>
<tr >
 <td  height="30"    align="left"colspan="2"><span class="style2"><table width="100%"  cellspacing="1" style="border-collapse:collapse;">
          <tr>   
		   <td  height="25"width="187"  style="border: #000000 1px solid;"><div align="center"><strong>�ѹ������Ѻ</strong></div></td>
		  <td  height="25"width="249"  style="border: #000000 1px solid;"><div align="center"><strong>����������­</strong></div></td>
		
		 
            <td width="860"  style="border: #000000 1px solid;"><div align="center"><strong>��������´</strong></div></td>
          </tr>
		  <?
		  $sql_2="SELECT * FROM medal  where user_id ='$user_id'  order by m_id desc";
		  $result_2 = mysql_query($sql_2);
		  while($dd =mysql_fetch_array($result_2)){
		  ?>
          <tr>    
		   <td height="25" align="center" style="border: #000000 1px solid;">&nbsp;<? 
		  if($dd[date_add]<>"0000-00-00" ) echo date_format_th_1($dd[date_add]) ;  ?>		  </td>
		  <td height="30"  style="border: #000000 1px solid;">&nbsp;<?=find_medal_name($dd[ps_medid])?></td>
            <td  style="border: #000000 1px solid;">&nbsp;<?=$dd[remark]?></td>
          </tr>
		     <?  }?>
        </table>
 </span></td></tr>
 <tr >
 <td  height="20"    align="left"  colspan="2"></td>

</tr>
 <tr >
 <td  height="30"    align="left"colspan="2"><span class="style2">&nbsp;&nbsp;<strong>��ô�ç���˹�</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>
</tr>
<tr >
 <td  height="30"    align="left"colspan="2"><span class="style2"><table width="100%"  cellspacing="1" style="border-collapse:collapse;">
          <tr> 
  <td width="138"  align="center" height="30" style="border: #000000 1px solid;" ><strong>���駷��</strong></td> 
		  <td width="408"  align="center" height="30" style="border: #000000 1px solid;" ><strong>��������㹡�ô�ç���˹�</strong></td> 
			<td width="750"  align="center" height="30" style="border: #000000 1px solid;" ><strong>���Ըա��</strong></td> 
          </tr>
	<? 
	 $sql_3="SELECT * FROM work where user_id ='$user_id' order by start_work  desc , w_id asc";
	$result_3 = mysql_query($sql_3);
	$i = 0;
	while($d_3 = mysql_fetch_array($result_3)){
	$i++;
		?>
          <tr>
		  <td align="center"  height="30" style="border: #000000 1px solid;" ><?  echo $i?>&nbsp;</td>
		<td align="left" height="30" style="border: #000000 1px solid;" >&nbsp;&nbsp;<? if($d_3[confirm_date]<>"0000-00-00" ) echo date_format_th_1($d_3[confirm_date])?> &nbsp;&nbsp;�֧&nbsp;&nbsp;<? if($d[end_work]<>"0000-00-00" ) echo date_format_th_1($d_3[end_work])?></td>
		  <td height="25"  style="border: #000000 1px solid;" >&nbsp;<? if($d_3[command] <>'')  echo "&nbsp;������Ţ��� : ".$d_3[command];
		if($d_3[date_command] <>'0000-00-00') echo  " <b>&nbsp;ŧ�ѹ��� : </b>".date_format_th_1($d_3[date_command]);
		  ?></td>		
          </tr>
		  
		     <? }?>
			 
        </table>
 </span></td></tr>
 <tr >
 <td  height="20"    align="left"  colspan="2"></td>

</tr>
 <tr >
 <td  height="30"    align="left"colspan="2"><span class="style2">&nbsp;&nbsp;<strong>���Ѻ��ҵͺ᷹/�Թ��Шӵ��˹�/�Թ��͹</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 </span></td>
</tr>
<tr >
 <td  height="30"    align="left"colspan="2"><span class="style2"><table width="100%"  cellspacing="1" style="border-collapse:collapse;">
          <tr> 
  <td width="151"  align="center" height="30" style="border: #000000 1px solid;" ><strong>�ѹ ��͹ ��</strong></td> 
		  <td width="473"  align="center" height="30" style="border: #000000 1px solid;" ><strong>���˹觷�����Ѻ�觵��</strong></td> 
			<td width="222"  align="center" height="30" style="border: #000000 1px solid;" ><strong>�Թ��͹</strong></td> 
			<td width="222"  align="center" height="30" style="border: #000000 1px solid;" ><strong>��һ�Шӵ��˹�</strong></td> 
			<td width="222"  align="center" height="30" style="border: #000000 1px solid;" ><strong>��ҵͺ᷹�����͹</strong></td> 
          </tr>
	<? 
	 $sql_4="SELECT * FROM work where user_id ='$user_id' order by start_work  desc , w_id asc";
	$result_4 = mysql_query($sql_4);
	$i = 0;
	while($d_4 = mysql_fetch_array($result_4)){
	$i++;
		?>
          <tr>
		  <td align="left" height="30" style="border: #000000 1px solid;" >&nbsp;&nbsp;<? if($d_4[confirm_date]<>"0000-00-00" ) echo date_format_th_1($d_4[confirm_date])?></td>
		<td align="left" height="30" style="border: #000000 1px solid;" >&nbsp;&nbsp;<? echo $d_4[position]?></td>
		  <td height="25"  style="border: #000000 1px solid;" align="center" >
&nbsp;
		      <?=number_format($d_4[pay],2)?>
	        </td>		
		  <td height="25"  style="border: #000000 1px solid;"  align="center">
		   &nbsp;
		      <?=number_format($d_4[pay_posi],2)?>
	       </td>		
		  <td height="25"  style="border: #000000 1px solid;"  align="center">
		   &nbsp;
		      <?=number_format($d_4[pay_month],2)?>
	      </td>		
          </tr>
		  
		     <? }?>
			 
        </table>
 </span></td></tr>
                                              </table>
											  
  <?
function work_max($user_id){
  	 	$sql="SELECT * FROM work WHERE user_id=$user_id order by  start_work desc limit 1";
   		$result = mysql_query($sql);
   		$d =mysql_fetch_array($result);
   		return $d[position]." ".find_type_name($d[type_id])." ".find_div_name1($d[div_id])." "."ͧ���ú�������ǹ�ѧ��Ѵ�����  �ѧ��Ѵ�����";
  }
 ?>
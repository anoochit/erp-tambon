<? ob_start()?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<? 
session_start();
include('config.inc.php');
?>

<style type="text/css">

.style14 {font-family: Tahoma; font-size: 12; }
.style15 {font-family: Tahoma; font-size: 14; }

-->
</style>
  <br />
  <center>
    <span class="style15">��§ҹ����¹����ѵ� ����Ҫ���/�١��ҧ/��ѡ�ҹ <br />
</span>
  </center>
  <br />
<table width="1500" border="0"  >
  <tr>
    <td width="100%"  style="border: #7292B8 1px solid;"  >
<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td width="100%" >
	<table width="100%" cellpadding="0" cellspacing="0" border="1"   bordercolor="#FFFFFF">
      <tr  bgcolor="#60c0ff" class="style14" >
        <td   width="48" rowspan="2"  ><div align="center">�ӴѺ��� </div></td>
        <td   colspan="4" height="30" ><div align="center">�����źؤ�� </div></td>
        <td   colspan="3"> <div align="center">����֡��</div></td>
        <td  colspan="6" > <div align="center">��ԺѵԺѵ��Ҫ���</div></td>
        <td  colspan="2"><div align="center">�ɷҧ�Թ��</div></td>
        <td  colspan="2"  align="center"><div align="center">����ͧ�Ҫ�</div></td>
      </tr>
	  <tr  bgcolor="#60c0ff"  class="style14">
        <td width="56"  height="30"><div align="center">�ӹ�<br />
          ˹�Ҫ���</div></td> 
        <td width="120"   ><div align="center">���� - ʡ�� </div></td>
        <td width="81"     > <div align="center">�Ţ��Шӵ��<br>
          ��ЪҪ�</div></td>
        <td width="92" ><div align="center">�/�/�/�Դ</div></td>
        <td width="114" ><div align="center">�زԡ���֡��</div></td>
		<td width="44"  ><div align="center">�Ң�</div></td>
		<td width="86"  ><div align="center">�ҡʶҺѹ</div></td>
		<td width="71"  ><div align="center">���˹�<br>
		  �Ѩ�غѹ</div></td>
		<td width="111"   ><div align="center">�/�/������� <br>
		  ����ç���˹�</div></td>
		<td width="42"   ><div align="center">�дѺ</div></td>
		<td width="66"     ><div align="center">�Թ��͹</div></td>
		<td width="122"  ><div align="center">�/�/� ������ <br>
		  �������Ѻ�Ҫ���</div></td>
		<td width="74"   ><div align="center">�����³ <br />
		  �.�.</div></td>
		<td width="82" ><div align="center">�����ç / <br />
		  ��������ç</div></td>
		<td width="76" ><div align="center">�/�/����<br />
		  �١ŧ��</div></td>
		<td width="61"   ><div align="center">�Ѻ���<br />
		  �٧�ش</div></td>
		<td width="102"  ><div align="center">�Ѻ����� <br />
		  (�Ҫ�Ԩ��)</div></td>
      </tr>
      <?
if($go_search  <> "" ){
		$sql1="SELECT *,p.user_id as user_id1 FROM (person p, ps_tname_ref ps)
			left outer join  work w on w.user_id =p.user_id   ";
		if($div_id <>''  or $sub_id <>'' or $per_id <>'' or $cat_id <>''  or $type_id <>'' )$sql1 .= " and w.w_id in(".find_w_id().") "; 
			$sql1 .= " WHERE 1=1  
			and p.ps_tname_id = ps.ps_tname_id"; 

					if($status <>'') $sql1 .="  and  p.status = $status ";
					if($div_id <>'') $sql1 .= " and w.div_id ='$div_id' ";
					if($sub_id <>'') $sql1 .= " and  w.sub_id ='$sub_id' ";
					if($cat_id <>'') $sql1 .= " and  w.cat_id ='$cat_id' ";
					if($type_id <>'') $sql1 .= " and  w.type_id ='$type_id' ";
 					$sql1 .=" and p.type_mem = 0 group by p.user_id  ";

		
$Per_Page =20;
if(!$Page){$Page=1;}
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql1);
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

print "<center><b>�ӹǹ $Page �ҡ���� $Num_Pages �ѧ����բ�����<b></center>";
$sql1 .= " LIMIT $Page_start , $Per_Page";
			$result1 = mysql_query($sql1);
	if($Page >= 2 ){
			$i=$Page_start ;
		}else{
			$i =0;
		}
		
	while($rs=mysql_fetch_array($result1)){
			if($i%2 == 0) $bg ='#CCCCCC';
			elseif($i%2 ==1) $bg ='#FFFFFF';
			$i++;
?>
    <tr  bgcolor="<?=$bg?>" class="style14">
	<td   height="30" align="center"><?=$i?></td>
      <td  align="center"  >&nbsp;<? 
		if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]." ";
		  else " ";
		echo ""?></td> 
        <td   >&nbsp;<a href="index.php?action=personnel_story&user_id=<? echo $rs["user_id1"]?>"  target="_blank"><? 
		?><?=$rs[name]?></a></td>
        <td    align="center"> &nbsp;<?=$rs[id_person]?></td>
        <td   align="center"> <? if($rs[birthday]<>"" and $rs[birthday]<>"0000-00-00"  ){echo date_format_th_1($rs[birthday]);}else{echo "";}?>&nbsp;</td>
		<? 
		$ed = find_edu1($rs[user_id1]);
		?>
        <td  align="center"  >&nbsp;<?=$ed[0]?></td>
        <td      >&nbsp;<?=$ed[1]?>&nbsp;</td>
		<td   >&nbsp;<?=$ed[2]?>&nbsp;</td>
		<? 		$w = find_work($rs[user_id1]); ?>
		<td   ><?=$w[0]?>&nbsp;</td>
		<td    align="center"><? if($w[1]<>"" and $w[1]<>"0000-00-00"  ){echo date_format_th_1($w[1]);}else{echo "";} ?>&nbsp;</td>
		<td   align="center" ><?=find_type_name($w[2])?>&nbsp;</td>
		<td   align="center" ><?=$w[3]?>&nbsp;</td>
		<td   align="center" ><? if($rs[date_contain]<>"" and $rs[date_contain]<>"0000-00-00"  ){echo date_format_th_1($rs[date_contain]);}else{echo "";} ?>&nbsp;</td>
		<td   align="center" ><?
	if($rs[birthday]<>"0000-00-00"  ){
		$k =explode("-",$rs[birthday]) ;
		if($k[1] <10){
			 $bb = $k[0] + 60;
			 echo $bb + 543 ;
		}else {
				$bb = $k[0]  + 61;
				echo $bb + 543;
		}
	}
		?>&nbsp;</td>
		<? $law = find_law($rs[user_id1]);?>
		<td   ><?=find_wrong_name($law[0])?>&nbsp;</td>
		<td    align="center"><? if($law[1] <>'0000-00-00' and $law[1] <>''  )echo date_format_th_1($law[1])?>&nbsp;</td>
		<? $me = find_me($rs[user_id1]);?>
		<td   >&nbsp;<?=find_medal_name($me[0])?>&nbsp;</td>
		<td   align="center"><? if($me[1]<>"" and $me[1]<>"0000-00-00"  ){echo date_format_th_1($me[1]);}else{echo "";} ?>&nbsp;</td>
      </tr>  
      <? 
	  }
} 
	 
	 ?>
	     <tr  bgcolor="#60c0ff" class="style14" >
	<td   height="30" align="center">���</td>
        <td    align="center">&nbsp;<?=$i?></td>
        <td    align="center">&nbsp;�� </td>
        <td   align="center">&nbsp;</td>
		<? 
		$ed = find_edu1($rs[user_id1]);
		?>
        <td  align="center"  >&nbsp;</td>
        <td      >&nbsp;&nbsp;</td>
		<td   >&nbsp;&nbsp;</td>
		<? 		$w = find_work($rs[user_id1]); ?>
		<td   >&nbsp;</td>
		<td    align="center">&nbsp;</td>
		<td   align="center" >&nbsp;</td>
		<td   align="center" >&nbsp;</td>
		<td   align="center" >&nbsp;</td>
		<td   align="center" >&nbsp;</td>
		<td   >&nbsp;</td>
		<td    align="center">&nbsp;</td>
		<td   >&nbsp;&nbsp;</td>
		<td   align="center">&nbsp;</td>
		<td   align="center">&nbsp;</td>
      </tr>  
    </table></td>
</tr>
</table>
</td></tr> 
</table>
<div ><br>
<center><FONT size="2" >�ӹǹ ������ <B><?= $Num_Rows;?></B>&nbsp;��¡��&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� : 
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='report_his_result.php?Page=$Prev_Page&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&cat_id=$cat_id&type_id=$type_id&status=$status'><< ��͹��Ѻ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='report_his_result.php?Page=$i&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&cat_id=$cat_id&type_id=$type_id&status=$status'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='report_his_result.php?Page=$Next_Page&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&cat_id=$cat_id&type_id=$type_id&status=$status'> ˹�ҶѴ�>> </a>";

?>
<br />
</font>
</center>
</div>
</form>
<center>
<br>
<input type="submit" name="print" value=" �����" onclick="window.open('report_his_print.php?div_id=<?=$div_id?>&sub_id=<?=$sub_id?>&cat_id=<?=$cat_id?>&type_id=<?=$type_id?>&status=<?=$status?>')"/>
</center>
<?
function find_edu1($user_id){
		$sql1="SELECT  *  FROM education, ps_edu_ref where education.ps_edu_id = ps_edu_ref.ps_edu_id and education.user_id ='$user_id'  order by  education.ps_edu_id desc limit 1";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	array($rs1[ps_edu_item],$rs1[grade],$rs1[academy]);
}
function find_work($user_id){
		$sql1="SELECT  *  FROM work  where user_id ='$user_id'  order by start_work desc limit 1";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	array($rs1[position],$rs1[start_work],$rs1[type_id],number_format($rs1[pay]));
}
function find_law($user_id){
		$sql1="SELECT * FROM law  where user_id ='$user_id'  order by date_add desc limit 1";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	array($rs1[ps_wrong_id],$rs1[date_add]);
}
function find_me($user_id){
		$sql1="SELECT * FROM medal  where user_id ='$user_id'  order by date_add desc limit 1";
		$result1 = mysql_query($sql1);
		$rs1=mysql_fetch_array($result1);
		return 	array($rs1[ps_medid],$rs1[date_add]);
}

function find_w_id(){
					
				$sql2="select max(start_work) as start_work ,user_id from work group by user_id ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd ="";
				while($rs2=mysql_fetch_array($result2)){
							 $sql="select  user_id,w_id from work where start_work = '$rs2[start_work]' and user_id ='$rs2[user_id]'  group by user_id ";
									$result1 = mysql_query($sql);
									if($result1)
									$rs1=mysql_fetch_array($result1);
											if($rs1[w_id] <>''){
												$dd .= $rs1[w_id].",";
											}
					}
					return substr($dd,0,strlen($dd)-1) ;
}


?>
<?
	ob_start();
     header("content-type: application/x-javascript; charset=tis-620");
?>
<?
	include("config.inc.php");
     //��˹���� IE ��ҹ page ���ء���� ������Ҩҡ cache
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
     header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
     header ("Cache-Control: no-cache, must-revalidate");
     header ("Pragma: no-cache");
	header("Content-type: text/html; charset=windows-874");
     //��ҷ��١���Ҵ��¨ҡ AJAX
	  $data=$_GET['data'];
      $val=$_GET['val'];
if($data == 'Z' and $val == '1' ) {
?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr    class="bmText">
			<td><strong>&nbsp;&nbsp;�Ţ������������</strong></td>
			<?
						$year = $year; 
						$month = $month ;
						$sql_ex =" SELECT mid(max(rec_id),6) as maxi FROM receive  where mid(rec_id,1,2) like '" .substr($year,2) . "' 
						and mid(rec_id,3,2) = '".$month."'";
						$result_1= mysql_query($sql_ex );
						$rs_1=mysql_fetch_array($result_1);
						if($rs_1[maxi] == NULL or $rs_1[maxi] == ''){
								$rec_id = substr($year,2).$month."/0001";
						}else{
									$max = $rs_1[maxi]+1;
									$st ='';
								if(strlen($max) <4){
										for($i=0;$i<(4- strlen($max));$i++){
												$st .="0";
										}
												$max = $st.$max;
								}
							$rec_id = substr($year,2).$month."/".$max;
						}
					?>
			<td>&nbsp;&nbsp;<input type="text" name="new_rec_id" value="<?=$rec_id?>" size="10"></td>
			</tr>
			<tr ><td colspan="2" background="images/hdot2.gif"> </td></tr> 
			<tr    class="bmText">
			<td><strong>&nbsp;&nbsp;�ѹ����͡�����</strong></td>
			<td width="72%"><div>&nbsp;&nbsp;<input name="RDATE" type="text" id="RDATE" value="<? if($RDATE =='') echo date("d/m/Y") ;else echo $RDATE;?>"  size="10">
                  &nbsp; <img  src="images/calculator_add.png" onClick="showCalendar('RDATE','DD/MM/YYYY')" align="absmiddle">
		    </div></td>
			</tr>
 <tr ><td colspan="2" background="images/hdot2.gif"> </td></tr> 
</table>
<?
}
if($data == 'Z1' and ($val == '1' or $val == '2') ) {
if($val == '1')$ss = '�ѹ����͡�����';
if($val == '2')$ss = '�ѹ�������Թ';
 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  	<tr    class="bmText">
			<td><strong>&nbsp;&nbsp;<?=$ss ?></strong></td>
			<td width="51%"><div>&nbsp;&nbsp;<input name="RDATE" type="text" id="RDATE" value="<? if($RDATE =='') echo date("d/m/Y") ;else echo $RDATE;?>"  size="10">
                  &nbsp; <img  src="images/calculator_add.png" onClick="showCalendar('RDATE','DD/MM/YYYY')" align="absmiddle">
		    </div></td>
			</tr>
</table>
<? }?>

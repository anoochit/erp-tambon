<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

//dochange �ж١���¡������ա�����͡ ��¡�� Combobox ��觨з��������¡ AJAX ������ͧ�͢����ŶѴ仨ҡ Server
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //�Ѻ��ҡ�Ѻ��
               } 
          }
     };
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}
</script>
<body>
<form name="f12" method="post"  action=""   >
<table  width="98%"   border="0" align="center" cellpadding="1" cellspacing="1">
<tr><td>
 <table width="100%" cellspacing="0"  cellpadding="0" border="0"  style="border-collapse:collapse;">
			 <tr class="header">
            <td  height="42">&nbsp;<strong>��§ҹ��ػ���������� ��Ш���͹
              <?=mounth3($month)?>&nbsp;<?=$year?>
            </strong>
<div align="center" class="style1"></div></td>
            </tr>
			<tr><td width="890"  height="15"><hr></td>
            </tr>
			<tr class="body1">
			  <td width="890"  height="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ҹ��ҹ�Ѳ����ШѴ������� ���Թ��þ��������稤�Ң����Ž�� ��Ш���͹ <strong><?=mounth3($month)?>&nbsp;<?=$year?></strong> ���͹�仨Ѵ�� ��Ң����Ž�¡Ѻ�����ѧ��� <!--�ӹǹ  
		      <strong><?=$Sumbin?></strong> �ѧ --> �ӹǹ�Թ <strong><?=$SumMoney?> </strong>�ҷ �����������´���Ṻ�� �ѧ���</td>
            </tr>
			
        </table>		
</td></tr>
  <tr>
    <td  colspan="2" >
<br>
 <table  width="100%"   border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td  colspan="2"  ><table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1">
      
      <tr  class="body1">
        <td width="8%"  height="31" align="center"><strong>������</strong></td>
        <td width="25%"  height="31" align="center"><strong>���������ҹ</strong></td>
        <td width="14%"  height="31" align="center"><strong>������������</strong></td>
        <td width="15%"  align="center"><strong>�Ţ��������</strong></td>
        <!--<td width="12%"  align="center"><strong>�ӹǹ�ѧ</strong></td> -->
		<td width="12%"  align="center"><strong>�ӹǹ���</strong></td>
		<td width="15%"  align="center"><strong>�ӹǹ�Թ</strong></td>
        <!--<td width="14%"  align="center"><strong>&nbsp;</strong></td>  -->
      </tr>
	  <?
if($search <>'')
$sumtotal1 = 0;
$sumtotal2=0;
$sumtotal3=0;
$p_date_1 = ($year-543)."-".$month."-"."31";
$sql_1="select hocode, honame from house  order by HOCODE";
$result_1 = mysql_query($sql_1);
while($rs_1=mysql_fetch_array($result_1)){
		    /////////////////////////////////////////////////////////////////////
				$sql="select mid(rec_id,1,4) as rec1 from receive where myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[hocode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> '¡��ԡ'  group by mid(rec_id,1,4)";
				$result = mysql_query($sql);
				if ($result )
				while($rs=mysql_fetch_array($result)){
			////////////////////////////////////////////////////////////////////////
				$sql2=" select min(rec_id) as minrec, max(rec_id) as maxrec, sum(total)/amt_1 as stotal1,sum(total) as stotal2 from receive 
				where rec_id like '" .$rs[rec1]. "%' and myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[hocode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> '¡��ԡ'  ";
				$result2= mysql_query($sql2);
				while($rs2=mysql_fetch_array($result2)){
		   ////////////////////////////////////////////////////////////////////////
				$sql3=" select  count(rec_id) as summem  from receive 
				where  rec_id like '" .$rs[rec1]. "%'  and myear = '" .$year. "' and monthh = ".$month."
    			and mid(mcode,1,2) = '" .$rs_1[hocode]."' and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> '¡��ԡ' group by mid(rec_id,1,4)";
				$result3 = mysql_query($sql3);
				while($rs3=mysql_fetch_array($result3)){
				$sumtotal1 = $sumtotal1 + $rs2[stotal1];
				$sumtotal2 = $sumtotal2 +$rs3[summem];
			    $sumtotal3 = $sumtotal3 + $rs2[stotal2];		
		?>
	 <tr class="body1">
        <td  height="25"  align="center">&nbsp;<? echo $rs_1[hocode]; ?></td>
        <td  height="25"   align="left">&nbsp;<? echo $rs_1[honame]; ?></td>
		<td  height="25"   align="center">&nbsp;<? echo $rs[rec1]; ?></td>
		<td  height="25"  align="center">&nbsp;
		<?  if($rs2[minrec]  == $rs2[maxrec]){		 
             echo substr($rs2[minrec],5); 
}else{	
            echo substr($rs2[minrec],5)."-" .substr($rs2[maxrec],5);
}
		?></td>
        <td  align="center">&nbsp;<? echo $rs3[summem]; ?></td>
        <td  align="center">&nbsp;<?=number_format($rs2[stotal2]);?></td>
		  </tr>
			<?
			   }}}}
			   ?>
      <tr class="body1">
        <td  height="38"  align="center">&nbsp;</td>
        <td  height="38"   align="left">&nbsp;</td>
        <td  height="38"  align="center">&nbsp;</td>
        <td  align="center"><strong>���������</strong></td>
		<td  align="center">&nbsp;<strong><?=number_format($sumtotal2)?></strong></td>
		<td  align="center">&nbsp;<strong><?=number_format($sumtotal3)?></strong></td>
      </tr>
        </table>
		</td>
    </tr>
	  </table>
</td>
</tr>
</table>
</form>
 
</body>
</html>

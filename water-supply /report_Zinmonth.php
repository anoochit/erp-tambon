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
<style>
.bmText {
	color: #000000;
	font-family: Tahoma;
	font-size: 13px;
}
.menuBar {
	color:#000000;
	font-size: 13px;
	font-family: Tahoma;
	font-weight: bold;
}
.lgBar {
	color: #000000;
	font-size: 13px;
	font-weight: bold;
	font-family: Tahoma;
 	padding: 3px;
}

</style>
<body>
<form name="f12" method="post"  action=""   >

<br>
<table  width="98%" border="0" align="center" cellpadding="0" cellspacing="0"  bordercolor="#000000" >
  <tr>
    <td  colspan="2" >
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0"  bordercolor="#000000">
      <tr class="lgBar">
        <td  height="28" colspan="14"  ><div  align="left">&nbsp;&nbsp;<strong>��§ҹ��ػ�ʹ�������͹ [�.32]&nbsp;&nbsp;������ : <?=$HOCODE." " .$honame?>&nbsp;��Ш���͹ : <?=mounth3($month)?>&nbsp;<?=$year?>
        </strong> </div></td>
      </tr>
      <tr class="bmText"  >
        <td width="109"  height="31" align="center" ><strong>�ѹ/��͹/��</strong></td>
        <td width="106"  height="31" align="center" ><strong>�ӹǹ�Թ�����</strong></td>
<? 
$sql_1="select z_id,h.hocode,honame from zone z,house h where z.hocode = ".$HOCODE." and z.hocode = h.hocode order by z_id ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){

    $z_id1 = substr($rs_1[z_id],0,1);
	if($z_id1 =='0') $z_id = substr($rs_1[z_id],1);	
	else $z_id = $rs_1[z_id];	
?>

<td width="10%"  height="31" align="center"  ><strong>
ࢵ <?=$z_id?>
</strong></td>
<? }
?>
      </tr>
<?
$SumMtotal = 0;
$sql1="select  p_date,sum(sum_m)as stotal,z_id from meter, zone
 where rec_status is not null and rec_status <> '¡��ԡ' ";
if ($month == '10' or $month == '11' or $month == '12' ) {
							$Yr = ($year-1);

				}else{
							$Yr = ($year);
				}		

					if($month  <> '' and $month =='12' ){	
					    $ex2 = "01";
						$p_date_1 = ($Yr-542)."-".($ex2)."-";
				}else if ($month  <> '' and $month<'12' ){	
		        $ex2 = $month+1;
			    if($ex2 =='0') $ex2 = substr($ex2,1);	
				else $ex2 = $ex2;	
				$ex2 ="0".$ex2 ;

		    	if (strlen($ex2) =='3') $ex2 = substr($ex2,1);	
				 else $ex2 =$ex2;	
							$p_date_1 = ($Yr-543)."-".($ex2)."-";
						}
						
$sql1.= " and p_date  like  '" .$p_date_1. "%'  
and rec_status is not null and rec_status <> '¡��ԡ'   and z_id = mid(mcode,3,1) and hocode = mid(mcode,1,2)
and myear = '".$year."' and monthh = '".$month."'
and (p_date like '1111-11-11' or p_date >=  '" .$p_date_1. "%')
and mid(mcode,1,2) = ".$HOCODE." 
group by p_date order by p_date";

$result1 = mysql_query($sql1);
if ($result1 )
while($rs1=mysql_fetch_array($result1)){
				$SumMtotal = $SumMtotal + $rs1[stotal];

?>
 <tr class="bmText" >
        <td  height="25"  align="center" >&nbsp;
		<?=date_2($rs1[p_date])?></td>
        <td  height="25"   align="right" >
		<strong><?=number_format($rs1[stotal],2)?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<? 
$sql2="select  if(sum(sum_m)is null,'',sum(sum_m))as sumtotal,h.hocode,z_id,z_name 
from (house h,zone z)left join meter on z_id = mid(mcode,3,1) 
and z.hocode = mid(mcode,1,2) and rec_status is not null and rec_status <> '¡��ԡ'  and p_date = '" .$rs1[p_date]. "'
and myear = '".$Yr."' and monthh = '".$month."' and (p_date like '1111-11-11' or p_date >=  '" .$rs1[p_date]. "')
where z.hocode = '".$HOCODE."' and h.hocode = z.hocode group by z_id order by z_id  ";

$result2 = mysql_query($sql2);
if ($result2 )
while($rs2=mysql_fetch_array($result2)){
  ?>
<td width="724"  height="31" align="center" >&nbsp;<?
if($rs2[sumtotal]>0){
echo number_format($rs2[sumtotal],2);
}else{ 
	echo "" ;
}?></td>
<?
 }
?>
		  </tr>
			<?
			   }
			   ?>
      <tr class="bmText"   onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe' " onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '' ">
        <td  height="25"  align="center"  >&nbsp;<strong>���</strong></td>
        <td  height="25"   align="right"  >
		<strong><?=number_format($SumMtotal,2)?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <? 
$sql3="select  if(sum(sum_m)is null,'',sum(sum_m))as sumtotal2,h.hocode,z_id 
from (house h,zone z)left join meter on z_id = mid(mcode,3,1) 
and z.hocode = mid(mcode,1,2) and rec_status is not null and rec_status <> '¡��ԡ' 
and p_date like  '" .$p_date_1. "%'
and myear = '".$year."' and monthh = '".$month."' and (p_date like '1111-11-11' or p_date >=  '" .$p_date_1. "%')
where z.hocode = '".$HOCODE."' and h.hocode = z.hocode
 group by z_id order by z_id  ";
//echo $sql3;
$result3 = mysql_query($sql3);
if ($result3 )
while($rs3=mysql_fetch_array($result3)){

?>
<td width="724"  height="31" align="center" ><strong>&nbsp;<?
if($rs3[sumtotal2]>0){
echo number_format($rs3[sumtotal2],2);
}else{ 
	echo "" ;
} ?></strong></td>
<?
 }
?>
	      </tr>
    </table></td>
    </tr>
  </table>
</form>
 
</body>
</html>

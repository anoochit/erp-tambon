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
 <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" ><table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1" bordercolor="#666666">
      <tr class="header">
        <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;<strong>��§ҹ��ػ����ʹ�Ѵ�����Ш���͹  <?=mounth3($month)?>&nbsp;<?=$year?></strong></div></td>
      </tr>
      <tr class="body1"  bgcolor="#DEE4EB">
        <td width="9%"  height="31" align="center"><strong>������</strong></td>
        <td width="27%"  height="31" align="center"><strong>���������ҹ</strong></td>
        <td width="20%"  height="31" align="center"><strong>�ӹǹ�Թ㹵͹</strong></td>
        <td width="20%"  align="center"><strong>�ӹǹ�Թ�ӹѡ�ҹ</strong></td>
        <td width="24%"  align="center"><strong>������Թ</strong></td>
      </tr>
<?
if($search <>'')
$stotal1 = 0;
$stotal2 = 0;
$stotal3 = 0;
$sql_1="select mid(mcode,1,2) as mcode, honame, sum(total)as stotal  from receive, house where rec_status is not null and rec_status <> '¡��ԡ' 
	and hocode = mid(mcode,1,2) and myear = '" .$year. "' and monthh = ".$month."
	group by mid(mcode,1,2) order by mid(mcode,1,2) ";
$result_1 = mysql_query($sql_1);
if ($result_1 )
while($rs_1=mysql_fetch_array($result_1)){
		    /////////////////////////////////////////////////////////////////////
				$sql="select  count(rec_id), if(sum(total)is null,'0',sum(total))as stotal1
				from house left join receive m on hocode = mid(mcode,1,2) and myear = '" .$year. "' and monthh = ".$month."
    			and rec_id <> '' and rec_id is not null and rec_status is not null and rec_status <> '¡��ԡ' ";
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
						 $sql.= " and p_date  like  '" .$p_date_1. "%'  
				          where  hocode = '" .$rs_1[mcode]."'  group by mid(mcode,1,2) ";
				$result = mysql_query($sql);
				while($rs=mysql_fetch_array($result)){
							////////////////////////////////////////////////////////////////////////
				$sql2=" select count(rec_id),if(sum(total) is null,'0',sum(total)) as  stotal2 from house left join receive m on hocode = mid(mcode,1,2)
				 and rec_id <> '' and rec_id is not null  and  p_date like  '" .$p_date_1. "%' and p_date <> '1111-11-11'  and  ";
				 $ex = substr($month,0,1);
				if($ex =='0') $monthh = substr($month,1);	
				else $monthh = $month;	 
						if($month  <> '' and $monthh <=9 ){		 
							$sql2.= "  ((myear = '" .$year. "' and monthh < ".$monthh.")  or (myear = '".$year."' and monthh >= 10 and monthh <=12) ";
						}elseif($month  <> '' and $monthh > 9 ){	
							$sql2.= "  ((myear = '".$year."' and monthh >= 10 and monthh < ".$monthh.") ";
						}
				 $sql2.=  " or myear < '" .$year. "') and rec_status is not null and rec_status <> '¡��ԡ' 
				 where hocode = '" .$rs_1[mcode]."' ";
				 $sql2.=  " group by hocode order by hocode ";			
				$result2= mysql_query($sql2);
				while($rs2=mysql_fetch_array($result2)){
				$stotal1 =  $stotal1 +$rs[stotal1];
				$stotal2 =  $stotal2 +$rs2[stotal2];
				$stotal3 =  $stotal3 +($rs[stotal1]+$rs2[stotal2]);
			?>
 <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<? echo $rs_1[mcode]; ?></td>
        <td  height="25"   align="left">&nbsp;<? echo $rs_1[honame]; ?></td>
		<td  height="25"   align="center">&nbsp;<? echo number_format($rs[stotal1]); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format($rs2[stotal2]); ?></td>
        <td  align="center">&nbsp;<? echo number_format($rs[stotal1]+$rs2[stotal2]); ?> </td>
		  </tr>
			<?
			   }}}
			   ?>
      <tr class="body1" bgcolor="#DEE4EB" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;<strong>���</strong></td>
        <td  height="25"   align="left">&nbsp;</td>
        <td  height="25"  align="center"><strong><? echo number_format($stotal1); ?></strong></td>
        <td  align="center"><strong><? echo number_format($stotal2); ?></strong></td>
        <td  align="center"><strong><? echo number_format($stotal3); ?></strong></td>
      </tr>
    </table></td>
    </tr>
  </table>
</form>
<div align="center">
</center></div> 
</body>
</html>

<?
include('config.inc.php');
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css"> 
<style type="text/css">
<!--
.style2 {font-size: 12px; font-family: Tahoma; }
.style3 {font-size: 12px}
-->
</style>
<script language="JavaScript" src="include/calendar.js"></script>

<link rel="stylesheet" type="text/css" href="../store/default.css">
<body>
<br />
<form action="" method="post" name="f22" >
<table  width="70%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  style="border: #7292B8 1px solid;"  >
<table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
<tr class="bmText">
    <td  colspan="2"height="30">
	<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="28"   colspan="2">
<div ><img src="images/Search.png"  align="absmiddle">&nbsp;&nbsp;ครุภัณฑ์</div></td> 
            </tr>
  <tr  class="bmText_1" >
    <td width="47%" height="30"><strong>&nbsp;ชื่อครุภัณฑ์</strong></td>
    <td width="53%">&nbsp;&nbsp;<input type="text" name="rd_name" value="<?=$rd_name?>" size="30"></td>
  </tr>
    <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr class="bmText_1" >
    <td height="30"><strong>&nbsp;เลขครุภัณฑ์</strong></td>
    <td>&nbsp;&nbsp;<input type="text" name="code1" value="<? echo $code1//if($code1<>'' and $code2<>'') echo $code1."-".$code2?>" size="30"></td>
  </tr>
	  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
  <tr>
    <td colspan="2" align="center" height="35"><input   type="submit"  name="search" value=" ค้นหา "    class="buttom"></td>
  </tr>
</table>
</td></tr></table>
</td></tr></table>
<br>
<table width="98%"  align="center" cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <td  >        

                                          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="100%" align="center">
											  <table width="100%" align="center" cellspacing="1" style="border-collapse:collapse;">
                                                <tr class="bmText_1"  bgcolor="#C1E0FF">
   <td width="49%"  align="center" style="border: #000000 1px solid;" >ชื่อครุภัณฑ์</td>
                                                  <td width="51%" height="30" align="center" style="border: #000000 1px solid;" >เลขครุภัณฑ์</td>
                                                
                                                </tr>
<?
if($search <>''){
$sql = "SELECT mid(code.code,1,3)  as c1,mid(code.code,5,3) as c2,mid(code.code,12) as c3  ,
receive_detail.rd_name  ,code.code
 FROM code ,receive_detail
 Where  code.rd_id = receive_detail.rd_id ";
	if($code1 <>'') $sql .= " and code.code like '%".trim($code1)."%'";
	  if($rd_name <>'') $sql .= " and receive_detail.rd_name like '%$rd_name%'  ";
	$sql .= " order by   receive_detail.rd_name,abs(mid(code.code,9) ) desc ";
} 
$result = mysql_query($sql);
$i = 0;
$total_vat = 0;
if($result)
while($rs1=mysql_fetch_array($result)){

	if($i%2 ==0) $bg ='#FFFFFF';
	elseif( $i%2 ==1) $bg ='#CCCCCC';
	$i++;
		 ?>
<tr  bgcolor="<? echo $bg?>" >
                                                  <td align="left" height="30" style="border: #000000 1px solid;" ><font size="2">&nbsp;<? echo $rs1[rd_name]; ?></font></td>
                                                  <td style="border: #000000 1px solid;" ><font size="2">&nbsp;<?
												  echo $rs1[code];
												   ?></font></td>
                                                </tr>
<? 
	}
?>
                                              </table></td>
                                            </tr>
            </table> 
                    </td>
                                            </tr>
  </table>
</form> 
</body>
</html>

<?
function find_maxCode($code1,$code2){
	$sql = "SELECT * FROM code c ,receive_detail  rd Where  c.code  like '%$code1-$code2%' 
and c.rd_id = rd.rd_id 
order by abs(mid(c.code,12))  desc limit 1";
	$result = mysql_query($sql);
	$rs1=mysql_fetch_array($result);
	return $rs1[code];
}


?>


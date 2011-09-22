<?
include('config.inc.php');
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style2.css">
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<script language="JavaScript" src="include/calendar.js"></script>
<body>
<form action="" method="post" name="f22" >
<?
$sql = "SELECT * FROM open o ,code c,move m 
WHERE o.o_id = m.o_id and c.c_id = m.c_id
and m.c_id = $c_id order by m.date_move  desc";
$result=mysql_query($sql);
?><br>
<table width="99%" align="center" cellspacing="1" >
 <tr class="bmText_1"  bgcolor="#C1E0FF">
       <td  colspan="5" height="30"  align="left" >&nbsp;<? echo fild_code_detail($c_id) ?>
	   </td>
	   </tr>
              <tr class="bmText_1"  bgcolor="#C1E0FF">
              <td width="17%" height="30" align="center" >วันที่ เบิก / ย้าย</td>
			  <td width="25%"  align="center">เลขที่เบิก / ทะเบียนเอกสาร</td>
               <td width="58%"  align="center">กอง / ฝ่าย</td>
                             </tr>
 <? 
 $i = 0;
 while($rs=mysql_fetch_array($result)){
 if($i%2 ==0) $bg ='#CCCCCC';
	elseif( $i%2 ==1) $bg ='#FFFFFF';
 ?>      
                                                <tr  bgcolor="<? echo $bg?>" >
                                                  <td  align="center" height="30"><font size="2">&nbsp;<? echo date_2($rs[date_move]); ?></font></td>
                                                  <td ><font size="2">&nbsp;<? echo $rs[num_id]." / ".$rs[paper_id]; ?></font></td>
                                                  <td align="left"><font size="2">&nbsp;<? echo find_div($rs["div_id"])." / ".find_sub($rs["sub_id"]) ?></font> </font> </td>
                                                  
  </tr>
<? 
	$i++;
}
?>
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
<script language="javascript">

function godel()
{
	if (confirm("คุณต้องการแก้ไขข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>



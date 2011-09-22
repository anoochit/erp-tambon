<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
session_start();

if($delete_1 <> ''){

		$sql = "Select *  from receive_detail  where r_id=$r_id  ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
		
				$amount = find_amount($rd_id);
				
				$sql = "UPDATE stock_card SET status = 1  WHERE num_id=$recn[rd_id] and s_type = 'R' ";
				$result = mysql_query($sql);
				
				
				$sql_in = "INSERT delete_detail (id , date_time , type ) values ( '$recn[rd_id]' , NOW() , 'R' )  ";
				$result = mysql_query($sql_in);
					
				$sql_del = "DELETE FROM receive_detail WHERE rd_id= $recn[rd_id]";
				$result_del = mysql_query($sql_del);
		}
			$sql = "DELETE FROM receive WHERE r_id=$r_id";
			$result = mysql_query($sql);
	echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=seach_edit_t1&type_id=$type_id\">\n";
}

if($del == 'del'){

	$sql_del = "DELETE FROM receive_detail WHERE rd_id=$rd_id";
	$result_del = mysql_query($sql_del);
	
	// --------------------เพิ่มจำนวนหลังวันที่เพิ่ม----------------------
	$id = check_id($rd_id);
	$amount = find_amount($rd_id);
	update_stock($date_receive,$amount,$p_id , $rd_id , $id);
	//- - - -- - -- - -- - - - - - - - -บันทึกลง stock_card			
	$sql = "UPDATE stock_card SET status = 1  WHERE num_id=$rd_id and s_type = 'R' ";
	$result = mysql_query($sql);
	
	$sql_in = "INSERT delete_detail (id , date_time , type ) values ( '$rd_id' , NOW() , 'R' )  ";
	$result = mysql_query($sql_in);
	echo "<br><br><center><font color=darkgreen >ระบบทำการลบข้อมูลเรียบร้อยแล้ว</font></center><br><br>";
	print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=view_detail_t1&r_id=$r_id&type_id=$type_id\">\n";
}
	?>
<link href="style2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-family: "MS Sans Serif";
	font-weight: bold;
}
-->
</style><br />
<div align="center">
<? 
if($type_id ==10){
	$na = 'วัสดุสำนักงาน';
}elseif($type_id ==11){
	$na = 'วัสดุงานบ้านงานครัว';
}
?>
<form name="save"  method="post" enctype="multipart/form-data">
<input type="hidden" name="o_id" value="<?=$o_id?>">
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td colspan="2" align="center"  style="border: #7292B8 1px solid;" >
<table width="100%" border="0">
	<tr align="left" >
	<td  class="lgBar1" height="25"  >
		แก้ไข / ลบ รับ<?=$na?></td>
	</tr>
</table></td>
</tr>
</table>
<br />

<table width="98%" border="0" cellspacing="1" cellpadding="3" align="center" >
  <tr align="left">
	<td  style="border: #7292B8 1px solid;" >
	<?
	$r_id = $_REQUEST["r_id"] ;

$sql = "SELECT * FROM receive WHERE r_id= $r_id";

$result=mysql_query($sql);
$rs=mysql_fetch_array($result);
	$r_id = $rs[r_id];
	?>
	
	<div><b><font color="#FF0066" >ใบส่งของที่</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["num_id"]?></div>
	<div><b><font color="#FF0066" >ทะเบียนเอกสาร</font></b>
	&nbsp;&nbsp;&nbsp;&nbsp;<? echo $rs["paper_id"]?></div>
	<div><b><font color="#FF0066" >จากร้าน</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<? 
	echo shop_id($rs["shop_id"])?></div>
	<div><b><font color="#FF0066" >วันที่รับ</font> </b>&nbsp;&nbsp;&nbsp;&nbsp;
	<?=date_2($rs["date_receive"])?></div>
	<div><b><font color="#FF0066" >หมายเหตุ </font></b>&nbsp;&nbsp;&nbsp;&nbsp;
	<? echo $rs["remark"] ;?></div>


<div align="center"><input   type="button" name="add" value=" แก้ไข " onClick="javascript:popup('sample_1.php?r_id=<?=$rs["r_id"]?>','',600,280)" class="buttom"> &nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;

</div>


	</td>
	</tr>
</table>
<br />
<table width="98%" align="center" cellspacing="1" border="0" style="border-collapse:collapse;">
<tr bgcolor="#C9D4E1"   ><td colspan="6" height="30" style="border: #000000 1px solid;"  align="left">&nbsp;&nbsp;[ 
 <a href="#" onClick="javascript:popup('sample_9.php?r_id=<?=$rs["r_id"]?>&date_receive=<?=$rs["date_receive"]?>&type_id=<?=$type_id?>','',550,280)"  class="bar_add">เพิ่มรายการ</a> ]
</td></tr>
<tr class="bmText"  bgcolor="#DEE4EB">
                                                  <td width="29%"  height="28" style="border: #000000 1px solid;" ><div align="center">
                                                     <b>ชื่อ<?=$na?></b>
        </div></td>
			  <td width="14%"  align="center" style="border: #000000 1px solid;" ><b>ราคา</b>  </td>
                                                  <td width="14%" style="border: #000000 1px solid;" align="center" >
                                                      <b>จำนวน</b>        </td>
                                                  
              <td width="16%"  align="center" style="border: #000000 1px solid;" ><b>หน่วยนับ</b></td>
	 <td width="18%"  align="center" style="border: #000000 1px solid;" ><b>รวมเงิน</b></td>
<td width="9%" align="center" style="border: #000000 1px solid;" ><b>&nbsp;ลบ</b></td> 
      </tr>
<?

$connect=mysql_connect($host,$rootadmin,$rootpassword) or die("Could not connect: " . mysql_error());
$select=mysql_select_db($dbname) ;
$sql = "Select rd.*,p.pro_name,rd.unit from receive_detail rd
left outer join product p on  p.p_id = rd.p_id
where rd.r_id ='$r_id'  ";

$result = mysql_query($sql);
$i = 0;
$total = 0;
while($rs1=mysql_fetch_array($result)){

if($i%2 ==0) $bg ='#CCCCCC';
elseif( $i%2 ==1) $bg ='#FFFFFF';
$total = $total + ($rs1[cost] * $rs1[amount] );
?>
<tr  class="bmText"  >
	<td height="25" align="left" style="border: #000000 1px solid;">&nbsp;&nbsp;
	  <?=$rs1[pro_name]?>
    </td>		
	<td style="border: #000000 1px solid;" align="center">&nbsp;
	   <?  echo number_format($rs1[cost],2);	  ?>
    </td>
	<td style="border: #000000 1px solid;" align="center">&nbsp;
	  <? echo $rs1[amount];   ?>
    </td>


	<td  style="border: #000000 1px solid;" align="center">
	  <?=$rs1[unit]?>&nbsp;
    </td>
	<td style="border: #000000 1px solid;"  align="right"><?=number_format($rs1[cost] * $rs1[amount],2)?>&nbsp;
   </td>

		<td  style="border: #000000 1px solid;" align="center">
		<a href="?action=view_detail_t1&del=del&r_id=<?=$r_id?>&rd_id=<?=$rs1["rd_id"]?>&date_receive=<?=$rs["date_receive"]?>&p_id=<?=$rs1[p_id]?>&type_id=<?=$type_id?>"  onclick="return godel()"><img src="images/Delete.png" border="0" /></a>

</td>
</tr>
<? 

	$i++;
}?>
<tr class="bmText"  bgcolor="#DEE4EB">
 <td align="right"colspan="4" height="25" style="border: #000000 1px solid;"><b>รวมทั้งสิ้น&nbsp;</b></td>
<td style="border: #000000 1px solid;"><p align="right"><b><? echo number_format($total,2);  ?>&nbsp;</b></td>
<td style="border: #000000 1px solid;"><p align="right"><font size="2">&nbsp;</font></td>
                                                </tr>
</table>
</form>

</div>

</center>


<script language="JavaScript" type="text/javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("คุณต้องการลบข้อมูลทั้งหมดนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<?
function check_stock_1($s_date,$p_id){
		$sql = "Select s_date ,max(id),amount from stock_card  where p_id = '$p_id' and s_date <= '$s_date' group by amount
		order by s_date desc ,id desc  limit 1";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['amount'].",".$arr['id'];
}
function check_id($num_id){
		$sql = "Select id from stock_card  where num_id = '$num_id' and s_type = 'R' ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['id'];
}
function find_amount($num_id){
		$sql = "Select amount from stock_card  where num_id = '$num_id' and s_type = 'R' ";
		$result = mysql_query($sql); 
		$arr =mysql_fetch_array($result);
		return $arr['amount'];
}
	function update_stock( $s_date , $amount , $p_id ,$num_id , $id  ){ 
		$sql = "Select *  from stock_card  where p_id ='$p_id' and 
		((s_date = '$s_date' and id >  $id) or s_date > '$s_date' )
		 and status = 0   ";
		$result = mysql_query($sql); 
		while($recn=mysql_fetch_array($result)){
				$amount_1 = $recn[remain] - ($amount );
				$sql_up = " UPDATE stock_card SET  remain ='$amount_1'  where id ='$recn[id]'  and status = 0 ";
				$result_up = mysql_query($sql_up); 
		}
}


?><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  

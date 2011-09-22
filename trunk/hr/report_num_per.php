
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}

</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="save" action=""  method="post" enctype="multipart/form-data">
  <br />
<table width="80%" border="0" cellspacing="1" cellpadding="1"  align="center">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table name="body" width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td width="100%" valign="top">

<table width="100%" cellpadding="0" cellspacing="0" border="1" align="center"  bordercolor="#FFFFFF">
	<tr  bgcolor="#60c0ff">
		<td align="center" height="30" colspan="2"> <strong>รายงานจำนวนบุคลากร</strong></td>


	</tr>
	<tr  bgcolor="#60c0ff">
		<td align="center" height="25" width="605"> กอง / ฝ่าย</td>
		<td   align="center" height="25" width="138"> จำนวน</td>
	</tr>
<?

$total_all = 0;
$sql="SELECT * FROM division  group by div_id order by div_id ";
$result = mysql_query($sql);
while($rs=mysql_fetch_array($result)){
		$total_all  = $total_all+find_div($rs[div_id]);
?>
	<tr   bgcolor="#CCCCCC">
		<td  align="left" height="25" width="605"><? echo $rs[div_name]?>&nbsp;</td>
		<td   align="center" height="25" width="138"><? echo find_div($rs[div_id])?>&nbsp;</td>
	</tr>  
		<?
		$sql1 ="SELECT * FROM subdivision where div_id ='$rs[div_id]'   group by sub_id order by sub_id ";

		$result1 = mysql_query($sql1);
		while($rs1=mysql_fetch_array($result1)){
		?>
				<tr   bgcolor="#FFFFCC">
				<td  align="left" height="25" width="605">&nbsp;&nbsp;&nbsp; <? echo find_sub_name1($rs1[sub_id])?></td>
				<td   align="center" height="25" width="138"><? echo find_sub($rs1[sub_id])?>&nbsp;</td>
			</tr>  
	<? } 
	}?>	
<tr   bgcolor="#CCCCCC">
				<td  align="center"height="30" width="605"><strong>รวมทั้งหมด</strong></td>
				<td   align="center" height="30" width="138"><strong><? echo $total_all?>&nbsp;</strong></td>
			</tr>  
</table>
			</td>
</tr>
</table>
</td></tr> </table>
<center>
<br>
<input type="submit" name="print" value=" พิมพ์" onclick="window.open('report_num_per_print.php')"/>
</center>
</form>
<?
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
function  find_div($div_id){
		$sql="SELECT * FROM person p
		left outer join  work w  on w.user_id =p.user_id  ";
		$sql .= " and w.w_id in(".find_w_id().") ";
		$sql .= "  WHERE 1=1 ";			
 		$sql .="  and  p.status = 0 "; 
		$sql .= " AND w.div_id ='$div_id' ";
		$sql .= "	 AND p.status =0 group by w.user_id  ";
		$result1 = mysql_query($sql);
		if($result1 )
		return mysql_num_rows($result1) ;
}
function find_sub($sub_id){
		$sql="SELECT * FROM person p left outer join  work w  on w.user_id =p.user_id  ";
		$sql .= " and w.w_id in(".find_w_id().") ";
		$sql .= "   WHERE 1=1 ";
		$sql .= " AND w.sub_id ='$sub_id' ";
		$sql .= "	 AND p.status =0 group by w.user_id  ";
		$result1 = mysql_query($sql);
			if($result1 )
		return mysql_num_rows($result1) ;
}
?>
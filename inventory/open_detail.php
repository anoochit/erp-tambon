<?
?>

<script language="JavaScript">
function selectall(){

if(document.f5.allbox.checked == true){
	for (var i=0;i<document.f5.total.value;i++)
	{
			 document.f5["chk["+i+"]"].checked = true;
	}
}else{
	for (var i=0;i<document.f5.total.value;i++)
	{
			 document.f5["chk["+i+"]"].checked = false;
	}
}
}

function check_num(){
	if( document.f5.n_seach.length == 0 ){
		alert("กรุณากรอกเลขที่ใบเบิก");
		return (false);
	}
		return (true);
}
function ch($first) {
	if ($first =='N') {
		document.f5.n_seach.disabled = true;
		document.f5.search1.disabled = true;
		document.f5.add_div.disabled =false;
		document.f5.add_sub.disabled = false;
		document.f5.num_id.value = "";
		document.f5.paper_id.value = "";
		document.f5.open_date.value = "";
		document.f5.mon_type.value = "";
		document.f5.div_id.value  = "";
		document.f5.sub_id.value = "";
		document.f5.name_head.value  = "";
		document.f5.detail.value  = "";
		document.f5.num_id.disabled = false;
		document.f5.paper_id.disabled = false;
		document.f5.open_date.disabled = false;
		document.f5.mon_type.disabled = false;
		document.f5.div_id.disabled = false;
		document.f5.sub_id.disabled = false;
		document.f5.name_head.disabled = false;
		document.f5.detail.disabled = false;
	} if ($first =='O') {
		document.f5.n_seach.disabled = false;
		document.f5.search1.disabled = false;
		document.f5.add_div.disabled =true;
		document.f5.add_sub.disabled = true;
		document.f5.num_id.disabled = true;
		document.f5.paper_id.disabled = true;
		document.f5.open_date.disabled = true;
		document.f5.mon_type.disabled = true;
		document.f5.div_id.disabled  = true;
		document.f5.sub_id.disabled  = true;
		document.f5.name_head.disabled  = true;
		document.f5.detail.disabled   = true;
	} 

}
</script>
<script language="JavaScript" type="text/JavaScript">
	function check_1(theForm) 
	{
		if(document.f5.new1[1].checked == true && document.f5.num_id.value == ''){
			alert("กรุณาค้นหาใบเบิก");
			 document.f5.n_search.focus();      
			return (false);
		}
		if(document.f5.new1[0].checked == true && document.f5.num_id.value == ''){
			alert("กรุณากรอกเลขที่ใบเบิก");
			document.f5.num_id.focus();      
			return (false);
		}
		if(document.f5.open_date.value == ''){
			alert("กรุณาเลือกวันที่");
			document.f5.open_date.focus();      
			return (false);
		}
		if(document.f5.mon_type.value == ''){
			alert("กรุณาเลือกประเภทเงิน");
			document.f5.mon_type.focus();      
			return (false);
		}
		if(document.f5.div_id.value == ''){
			alert("กรุณาเลือกกอง");
			document.f5.div_id.focus();   
			return (false);
		}
		if(document.f5.sub_id.value == ''){
			alert("กรุณาเลือกฝ่าย");
			document.f5.sub_id.focus();   
			return (false);
		}
		if(document.f5.name_head.value == ''){
			alert("กรุณากรอกชื่อหัวหน้ากอง");
			document.f5.name_head.focus();   
			return (false);
		}
	
		var j = 0;	
			for (i=0;i<eval(document.f5.total.value);++i) {
					if(document.f5["chk["+i+"]"].checked == true ){
							j++;
					}
			 }
			if( j <= 0){
				alert("กรุณาเลือกรายการที่ต้องการเบิก");
				return (false);
			}
			if (confirm("ยืนยันการเบิก ใช่หรือไม่")){
				return true;
			}else{
				return false;
			}
	}
	</script>

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
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
     req.send(null); //ส่งค่า
}

</script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="default.css">
<form name="f5" method="post"  action=""   onsubmit="return check_1(this);"   >
<input type="hidden" name="r_id" value="<?=$r_id?>" />
<input type="hidden" name="rd_id" value="<?=$rd_id?>" />
<br />
<table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td align="center" colspan="2" style="border: #0000FF 1px solid;">
<table width="100%" border="0">
	<tr align="left">
	<td  class="lgBar1" height="25"  >
		<div >จัดสรรครุภัณฑ์</div>	</td>
	</tr>
</table></td>
</tr>
</table>
<br />
<br>
<table  border="0" align="center" cellpadding="0" cellspacing="0"  width="98%">
  <tr>
    <td   style="border: #7292B8 1px solid;"  ><table border="1" width="100%" align="center" cellpadding="0" cellspacing="0"    bordercolor="#CCCCCC">

      <tr class="bmText"  bgcolor="#46B5AF">
        <td width="22%"  height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">รหัสครุภัณฑ์</font></span></b> </div></td>
		<td width="26%" height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">ชื่อส่วนราชการ</font></span></b> </div></td>
        <td width="26%" height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">ชื่อผู้ใช้พัสดุ</font></span></b> </div></td>
        <td width="28%" height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">หมายเลขเครื่อง</font></span></b> </div></td>
        <td width="24%" height="30" ><div align="center"> <b><span style="font-size:9pt;"><font face="Tahoma">จอ</font></span></b> </div></td>
      </tr>
      <?
 $i = 0;
$total_vat = 0;
$sql = "SELECT * FROM code 
 Where   rd_id = '$rd_id'  group by c_id  ";

$Per_Page =10;
if(!$Page){$Page=1;} 
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);
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

print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql .= " LIMIT $Page_start , $Per_Page";
$result=mysql_query($sql);
if($Page >= 2 ){
			$i=$Page_start ;
}else{
			$i =0;
}
while($rs1=mysql_fetch_array($result)){
	$i++;
$bg ='#FFFFFF';

?>
      <tr  class="bmText" bgcolor="<?=$bg?>"  >
        <td  height="28"><div align="left"><a href="#" onclick="javascript:window.open('Sample_11.php?c_id=<?=$rs1[c_id]?>','xxx','scrollbars=yes,width=450,height=400')">
            <?=$rs1[code]?>
        </a> </div></td>
		 <td align="center" >&nbsp;<input  type="text" name="department[<?=$i?>]" value="<?=$rs1[department]?>" size="10">
           </td>
        <td align="center" >&nbsp;<input  type="text" name="place[<?=$i?>]" value="<?=$rs1[place]?>" size="10">
           </td>
        <td  align="center">&nbsp;<input  type="text" name="num_machine[<?=$i?>]" value="<?=$rs1[num_machine]?>" size="10"><? //=$rs1[num_machine]?>
           </td>
        <td  align="center">&nbsp;<input  type="text" name="remark[<?=$i?>]" value="<?=$rs1[remark]?>" size="10"><? //=$rs1[screen]?>
           </td>
      </tr>
      <? 
	$tatal_vat = $r_cost_1[$i] + $tatal_vat;

	}

?>
      <input type="hidden" name="total" value="<? echo $i?>" />
      <tr >
        <td colspan="5"><div align="center">
            <input   type="submit" name='save' value="บันทึก"  onclick="return q_confirm();" />
          &nbsp;&nbsp;
          <input   type="button"  name='cancel' value="ยกเลิก"  onclick="javascript:window.location='index.php?action=add_open&r_id=<?=$r_id?>&rd_id=<?=$rd_id?>';" />
        </div></td>
      </tr>
	  	<tr>
				<td colspan="10">
				<div align="center"><br>
<center><FONT size="2" >จำนวน ทั้งหมด
<B><?= $Num_Rows;?></B>&nbsp; รายการ&nbsp;&nbsp;
แยกเป็น : <b> 
<?=$Num_Pages;?></b>&nbsp;หน้า<BR>
&nbsp; หน้า : 
<? /* สร้างปุ่มย้อนกลับ */
if($Prev_Page) 
echo " <a href='$PHP_SELF?action=open_detail&r_id=$r_id&rd_id=$rd_id&tab=tab&Page=$Prev_Page'><< ย้อนกลับ </a>";
for($i=1; $i<$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='$PHP_SELF?action=open_detail&Page=$i&r_id=$r_id&rd_id=$rd_id&tab=tab'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
echo "<a href ='$PHP_SELF?action=open_detail&Page=$Next_Page&r_id=$r_id&rd_id=$rd_id&tab=tab'> หน้าถัดไป>> </a>";

?><br><br>
</FONT></center></div>
				</td>
				</tr>
    </table></td>
</tr>
</table>
</form>
<script language="javascript">
function q_confirm()
{
	if (confirm("ท่านต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

function godel()
{
	if (confirm("คุณต้องการลบข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>

<?
function check_num($paper_id){
	$sql = "SELECT * FROM open  Where paper_id = '$paper_id'  ";
	$result = mysql_query($sql);
	$rs=mysql_fetch_array($result);
	return $rs[num_id];
}
function max_id1(){
	$sql = "Select max(o_id) as max  from  open ";
			$result = mysql_query($sql); 
			$recn = mysql_fetch_array($result) ;
			$max = $recn[max];
			if($max == NULL or $max == ''){ 
				$id = "1";
			} else{
				$id =  $max + 1; 
			}
		return $id;
}
?>
<?
include('config.inc.php');

if($OK <> ''){

			//-------------------------บันทึกลง order1_detail----------------------------------------
			$sql_add = "UPDATE receive_detail SET type_id ='$type' ,rd_name ='$rd_name' 
			,price ='$price' ,brand_name = '$brand_name' ,garan_at = '$garan_at' ,remark = '$remark', list_edit = '$list_edit'
			 WHERE rd_id = $rd_id";
			echo $sql_add."<br>";
			$result_add = mysql_query($sql_add); 
		?>
	<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>  
	<?
}
?>





<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style2.css"> 
<script language="JavaScript" src="include/calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 

<link rel="stylesheet" type="text/css" href="default.css">
<body>
<br />
<form action="" method="post" name="f22" >
<?
$sql = "SELECT * FROM receive r,receive_detail rd
 Where r.r_id = rd.r_id
 and  rd_id = '$rd_id'   ";
$result = mysql_query($sql);
$i = 0;
$total = 0;
$rs=mysql_fetch_array($result);
?>

<table  border="0" align="center" cellpadding="1" cellspacing="1"  width="98%">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr  >
		      <td  height="32" class="tbETitle"><div >&nbsp;&nbsp;&nbsp;แก้ไขรายการอสังหาริมทรัพย์</div></td> 
            </tr>
            <tr>
              <td height="191"><table name="add" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f7f9"  width="100%">
			  <tr class="bmText_1" >
                    <td height="25"><div>ทะเบียนเอกสาร </div></td>
			
                    <td width="458"><div><? echo $rs["paper_id"]?>&nbsp;
                  </div></td>
                </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr class="bmText_1" >
                    <td width="275" height="25"><div>วันที่ได้กรรมสิทธิ์</div></td>
                    <td><div>
                      <?=date_2($rs["date_receive"])?>&nbsp;
</div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				  <tr class="bmText_1">
                    <td width="275" height="25"><div> วิธีการได้มา</div></td>
                    <td><div>
                      <? 
	if($rs["come_in"] =='0')echo 'รายได้' ;
	else if($rs["come_in"] =='1')echo 'อุดหนุน' ;
	else if($rs["come_in"] =='2')echo 'บริจาค' ;
	else if($rs["come_in"] =='3')echo 'เงินกู้' ;
	else if($rs["come_in"] =='4')echo 'อื่นๆ' ;
	?>&nbsp;
</div></td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr  class="bmText_1" height="25">
                    <td><div>ประเภท</div></td>
			
                    <td><div><?
			$query  ="select * from type where type_id =1 group by type_name order by t_id  ";
			$result=mysql_query($query);
			?><select name="type"  >
        <option value='0'>----------กรุณาเลือก----------</option>
        <?
			while($d =mysql_fetch_array($result)){		
		?>
         <option value="<? echo $d[t_id];?>"
		<?
		if($rs["type_id"]== $d[t_id]) echo "selected";
		?>
		><? echo $d[type_name];?></option>
                        <? }?>
                      </select></div>				</td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="275"  class="bmText_1"height="25"><div>ชื่อครุภัณฑ์</div> </td>
                    <td  class="bmText_1"><div><input type="text"  id="rd_name" name="rd_name" size="50" maxlength="255" value="<? echo $rs["rd_name"]?>">                        
                    </div>                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td width="275"  class="bmText_1" height="25"><div>ราคา/หน่วย</div> </td>
                    <td><div><input name="price" type="text"  value="<? echo $rs["price"]?>" ></div>                    </td>
                  </tr>
				  <tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
 <tr>
                  <td width="275" class="bmText_1"height="25"><div>ยี่ห้อ ชนิด แบบ ขนาด</div></td>
                    <td class="bmText_1"><div><input type="text"  id="brand_name" name="brand_name"  value="<? echo $rs["brand_name"]?>"size="50" maxlength="255"></div>                    </td>
                </tr>
				<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				<tr>
                  <td width="275" class="bmText_1"height="25"><div>ใช้ประจำที่ </div></td>
                    <td class="bmText"><div>
                      <input type="text"  id="garan_at" name="garan_at" size="50" maxlength="255" value="<?=$rs[garan_at]?>" ></div>                    </td>
                </tr>
				<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				<tr>
                  <td width="275" class="bmText_1"height="25"><div>หมายเหตุ </div></td>
                    <td class="bmText"><div>
                      <input type="text"  id="remark" name="remark" size="50"  value="<?=$rs[remark]?>" ></div>                    </td>
                </tr>
				<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
				<tr>
                  <td width="275" class="bmText_1"height="25"><div>รายการเปลี่ยนแปลง</div></td>
                    <td class="bmText"><div>
                      <input type="text"  id="list_edit" name="list_edit" size="50"  value="<?=$rs[list_edit]?>" ></div>                    </td>
                </tr>
				<tr><td colspan="2" background="images/hdot2.gif"> </td></tr>
                  <tr>
                    <td height="30"  align="center" colspan="10"><input type="submit" name="OK" value=" บันทึก "  onClick="return godel();"  class="buttom" >&nbsp;
                    <input type="reset" name="formbutton2" value="ยกเลิก" onClick="window.close();"  class="buttom">    </td>
                </tr>
              </table>
              </td>
            </tr>
        </table></td>
      </tr>
  </table>

</form> 
</body>
</html>
<script language="javascript">
function doNext(el)
{
	if (el.value.length < el.getAttribute('maxlength')) 
	return;

	var f = el.form;
	var els = f.elements;
	var x, nextEl;
	for (var i=0, len=els.length; i<len; i++){
		x = els[i];
		if (el == x && (nextEl = els[i+1]))
		{
			nextEl.value="";
			if (nextEl.focus) 
			nextEl.value="";
			nextEl.focus();

		}
	}
}
function godel()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}

</script>
<?
function insert_code($rd_id,$code){
		$sql_add = "INSERT INTO code (rd_id,code) 
		VALUES('$rd_id','$code')";
		$result_add = mysql_query($sql_add); 

}


?>


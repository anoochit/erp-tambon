<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($del <>''){
			$query = "  delete from  bin_detail  where regno ='$regno'  and mcode ='$mcode' ";
			$result=mysql_query($query);
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="add_user_1"  method="post" action="#">
<?
//-----------แสดงข้อมูล-------------------
			$sql=" Select q.TMCODE,MCODE,q.mem_id,pren,name,surn,q.RDATE,HNO,HNO1,MOO,ROAD,SOI,q.HOCODE,TEL,
			LINE1,REGIEN,qty,amt,type1,status,honame,tmname   
			from m_bin q,member m,house h,type_mem t  
			where q.mem_id = m.mem_id and q.hocode = h.hocode and t.tmcode = q.tmcode and MCODE = '$mcode' 
			order by MCODE";
			$result=mysql_query($sql);
			$rs =mysql_fetch_array($result);
		?>
<table width="95%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
	<table width="100%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
		<tr bgcolor="#99CCFF" class="lgBar">				
    <td height="35"  colspan="4"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp; ทะเบียนผู้ขอใช้บริการ</div></td> 
	  
<!--		 <td width="5%">&nbsp;</td> -->
	 </tr>
  <tr>
    <td width="255" height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">ประเภทผู้ขอใช้บริการ :  </div></td>
    <td class="bmText_1"   colspan="3"style="border: #000000 1px solid;"><strong>&nbsp;
	<input type="text" name="tmname" value="<?=$rs[tmname]?>" size="45"class="text"    />
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">ชื่อหมู่บ้าน :  </div></td>
    <td colspan="3" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<input type="text" name="honame" value="<?=$rs[honame]?>" size="30"class="text"    />
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">เลขทะเบียน :  </div></td>
    <td width="452" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<?
		$dd = explode("-",$mcode);
		$mcode_1 = $dd[0];
		$mcode_2 = $dd[1];
		?>
      <input type="text" name="mcode_1" value="<?=$mcode_1?>" size="3"  id="mcode_1" maxlength="2"  class="text"  /> - 
	   <input type="text" name="mcode_2" value="<?=$mcode_2?>" size="5"  id="mcode_2" class="text"   />
    </strong></td>
    <td width="160" class="lgBar"  style="border: #000000 1px solid;"><div align="right">คำนำหน้าชื่อ :  </div></td>
    <td width="359" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<input name="pren" type="text" id="pren" value="<? echo $rs[pren] ?>"  size="10" /class="text"  >
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">ชื่อ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"  ><strong>&nbsp;
      <input type="text" name="name" value="<?=$rs[name]?>" size="25"  class="text"  />
 		<input  type="hidden" name="mem_id" value="<?=$mem_id?>"     />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;" ><div align="right">นามสกุล :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;" ><strong>&nbsp;
    <input type="text" name="surn" value="<?=$rs[surn]?>" size="20" class="text"  />	  
    </strong></td>
  </tr>
  <tr >
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">วันที่สมัคร :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input name="RDATE" type="text" id="RDATE" value="<? echo date_format_th($rs[RDATE]) ?>"  size="10" /class="text"  >
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">บ้านเลขที่ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
    <input type="text" name="HNO" value="<?=$rs[HNO]?>" size="3" class="text"   /> / <input type="text" name="HNO1" value="<?=$rs[HNO1]?>" size="3"  class="text"  />
    </strong></td>
  </tr>
  <tr onMouseOut="document.getElementById('hint').innerHTML = '';">
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">หมู่ที่ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="MOO" value="<?=$rs[MOO]?>" size="20"  class="text"  />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">ซอย :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
    <input type="text" name="SOI" value="<?=$rs[SOI]?>" size="20"class="text"    />
    </strong></td>
  </tr>
  <tr onMouseOut="document.getElementById('hint').innerHTML = '';">
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">ถนน :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
     <input type="text" name="ROAD" value="<?=$rs[ROAD]?>" size="20"  class="text"  />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">โทรศัพท์ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="TEL" value="<?=$rs[TEL]?>" size="10" class="text"   />
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">เขต :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="REGIEN" value="<?=$rs[REGIEN]?>" size="20"  class="text"  />
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;"><div align="right">สายจัดเก็บ :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="LINE1" value="<?=$rs[LINE1]?>" size="20"  class="text"  />
    </strong></td>
  </tr>
    <tr>
    <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">จำนวนถัง :  </div></td>
    <td class="bmText_1"  colspan="4"style="border: #000000 1px solid;"><strong>&nbsp;
<select name="qty" class="text"  >	<?
			$query  ="select * from type_rece  order by trcode";
			//echo $query."666<br>";
			$result=mysql_query($query);
			while($d =mysql_fetch_array($result)){
	?>
	    <option value="<? echo $d[cost];?>"
		<?
		if($rs[qty] == $d[cost]) echo "selected";
		?>
		><? echo $d[TRNAME] ." ราคา ".$d[cost] ." บาท ";?></option>
	            <? }?>
	    </select>
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">ชำระเงิน :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input  type="radio" name="type1" value="รายเดือน" size="20" class="text"   <? if($rs[type1] =='รายเดือน' or $type1 =='' ) echo "checked"?> /> รายเดือน
	  <input  type="radio" name="type1" value="รายปี" size="20"  class="text"  <? if($rs[type1] =='รายปี') echo "checked"?> /> รายปี
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;"><div align="right">สถานะ :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
	<input type="text" name="status" value="<?=$rs[status]?>" size="10" class="text"   />
     </strong></td>
  </tr>
  <tr>
	<td colspan="4" align="center" class="lgBar" style="border: #000000 1px solid;">
	  <input name="save_add"  type="button" value="แก้ไขข้อมูล" onClick="javascript:popup('edit_mem.php?mcode=<?=$mcode?>&mem_id=<?=$rs[mem_id]?>','',650,350)" />	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input name="save_add"  type="button" value="ยกเลิกบริการ" onClick="javascript:popup('cancel_mem.php?mcode=<?=$mcode?>&mem_id=<?=$rs[mem_id]?>','',650,450)" />	 
  </td>
</tr>
 </table>
 </td></tr></table>
 </form>
 <br />
 <table  width="60%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table width="100%" align="center" cellspacing="1"  cellpadding="1" border="0">
<tr class="lgBar">
      <td  height="28" colspan="14"><div  align="left">&nbsp;&nbsp;เลขทะเบียนถัง&nbsp;&nbsp;&nbsp;[ <a href="#" onClick="javascript:popup('add_bin_detail.php?mcode=<?=$mcode?>&add=add','',400,200)" class="catLink1">	เพิ่ม</a>]</div></td>
          </tr>
  <tr class="bmText"  bgcolor="#DEE4EB">
        <td width="16%"  height="31" align="center"><strong>ลำดับที่</strong></td>	
        <td width="41%"  height="31" align="center"><strong>เลขทะเบียนถัง</strong></td>
         <td width="13%"  align="center"><strong>แก้ไข</strong></td>
		<td width="12%"  align="center"><strong>ลบ</strong></td>
          </tr>
		   <?
		$sql_1 =" Select  * from bin_detail where mcode = '$mcode '   order by regno ";
		$result_1 = mysql_query($sql_1);
		if($result_1)
	while($rs_1=mysql_fetch_array($result_1)){
			$i++;
			if($i%2 ==0) $bg ='#e8edff';
			elseif( $i%2 ==1) $bg ='#FFFFCC';
?>       
<tr class="bmText" bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <td  height="25"  align="center">&nbsp;<? echo $i; ?></td>
  <td  height="25"   align="center">&nbsp;<? echo $rs_1[regno]; ?></td>
<td  align="center"><a href="#" onClick="javascript:popup('add_bin_detail.php?mcode=<?=$mcode?>&regno=<?=$rs_1[regno]?>&edit=edit','',400,200)"class="catLink1"><img src="images/Modify.png" border="0"   /></a></td>
<td  align="center"><a href="?action=view_detail_mem&mcode=<?=$mcode?>&regno=<?=$rs_1[regno]?>&del=del"   onClick="return godel()"><img  src="images/Delete.png" border="0" /></a></td>
</tr>
 <? 
	}
?>
        </table>
	  </td>
    </tr>
  </table>
</body>
</html>
<script language="javascript">
function godel()
{
	if (confirm("คุณต้องการลบข้อมูลนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  
<script language="JavaScript" type="text/javascript">
	//------------------------------function  นี้มาจาก form-------------------------
	function validate(theForm) 
	{
		    if (  document.add_user.honame.value=='' || document.add_user.honame.value==' ' )
           {
           alert("กรุณากรอกชื่อหมู่บ้าน");
           document.add_user.honame.focus();           
           return false;
           }
		 if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
			{
					return true;
			}else{
					return false;
			}
	}
</script>
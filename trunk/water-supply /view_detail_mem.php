<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($del <>''){
			$query = "  delete from  bin_detail  where regno ='$regno'  and mcode ='$mcode' ";
			$result=mysql_query($query);
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="add_user_1"  method="post">
<?
//-----------�ʴ�������-------------------
			$sql=" Select  q.TMCODE,MCODE,q.mem_id,pren,name,surn,q.RDATE,HNO,MNO,HNO1,MOO,ROAD,
			SOI,q.HOCODE,TEL,status,m_total,LINE1,REGIEN,q.scode,honame,tmname,sname
			from q_water q,member m,house h,type_mem t ,service1 s
			where q.mem_id = m.mem_id and q.hocode = h.hocode and t.tmcode = q.tmcode and q.scode = s.scode
			and q.mcode = '" .$mcode. "'  
			order by MCODE ";
			$result=mysql_query($sql);
			$rs =mysql_fetch_array($result);
		?>
<table width="95%" border="0" cellspacing="1" cellpadding="1" align="center"  bgcolor="#FFFFFF">
 <tr >
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
	<table width="100%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
		<tr bgcolor="#99CCFF" class="lgBar">				
    <td height="35"  colspan="4"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp; ����¹�������ԡ��</div></td> 
	 </tr>
	 <tr>
    <td width="262" height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�Ţ��Ш��ҵ��Ѵ��� :  </div></td>
    <td class="bmText_1"   colspan="3"style="border: #000000 1px solid;"><strong>&nbsp;
   <input type="text" name="MNO" value="<?=$rs[MNO]?>" size="20" class="text"  />	  
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">���������ҹ :  </div></td>
    <td colspan="3" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<input type="text" name="honame" value="<?=$rs[honame]?>" size="30"class="text"    />
    </strong></td>
  </tr>
    <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">ࢵ:  </div></td>
    <td colspan="3" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<? 
	$dd = explode("-",$rs[MCODE]);
	//echo substr($dd[0], strlen($rs[HOCODE]));
	?>
	<input type="text" name="honame" value="<?=zone_name($rs[HOCODE],substr($dd[0], strlen($rs[HOCODE])))?>" size="30"class="text"    />
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�Ţ����¹ :  </div></td>
    <td width="450" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<?
		$dd = explode("-",$mcode);
		$mcode_1 = $dd[0];
		$mcode_2 = $dd[1];
		?>
      <input type="text" name="mcode_1" value="<?=$mcode_1?>" size="3"  id="mcode_1" maxlength="2"  class="text"  /> - 
	   <input type="text" name="mcode_2" value="<?=$mcode_2?>" size="5"  id="mcode_2" class="text"   />
    </strong></td>
    <td width="172" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�ӹ�˹�Ҫ��� :  </div></td>
    <td width="349" class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
	<input name="pren" type="text" id="pren" value="<? echo $rs[pren] ?>"  size="10" /class="text"  >
      </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">���� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"  ><strong>&nbsp;
      <input type="text" name="name" value="<?=$rs[name]?>" size="25"  class="text"  />
 		<input  type="hidden" name="mem_id" value="<?=$mem_id?>"     />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;" ><div align="right">���ʡ�� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;" ><strong>&nbsp;
    <input type="text" name="surn" value="<?=$rs[surn]?>" size="20" class="text"  />	  
    </strong></td>
  </tr>
  <tr>
    <td width="255" height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�������������ԡ�� :  </div></td>
    <td class="bmText_1"   colspan="3"style="border: #000000 1px solid;"><strong>&nbsp;
	<input type="text" name="tmname" value="<?=$rs[tmname]?>" size="35"class="text"    />
    </strong></td>
  </tr>
  <tr >
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�ѹ�����Ѥ� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input name="RDATE" type="text" id="RDATE" value="<? echo date_format_th($rs[RDATE]) ?>"  size="10" /class="text"  >
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">��ҹ�Ţ��� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
    <input type="text" name="HNO" value="<?=$rs[HNO]?>" size="3" class="text"   /> / <input type="text" name="HNO1" value="<?=$rs[HNO1]?>" size="3"  class="text"  />
    </strong></td>
  </tr>
  <tr onMouseOut="document.getElementById('hint').innerHTML = '';">
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">������ :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="MOO" value="<?=$rs[MOO]?>" size="20"  class="text"  />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">��� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
    <input type="text" name="SOI" value="<?=$rs[SOI]?>" size="20"class="text"    />
    </strong></td>
  </tr>
  <tr onMouseOut="document.getElementById('hint').innerHTML = '';">
    <td height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">��� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
     <input type="text" name="ROAD" value="<?=$rs[ROAD]?>" size="20"  class="text"  />
    </strong></td>
    <td class="lgBar"  style="border: #000000 1px solid;"><div align="right">���Ѿ�� :  </div></td>
    <td class="bmText_1"  style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="TEL" value="<?=$rs[TEL]?>" size="10" class="text"   />
    </strong></td>
  </tr>
  <tr>
    <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">ࢵ :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="REGIEN" value="<?=$rs[REGIEN]?>" size="20"  class="text"  />
    </strong></td>
    <td class="lgBar" style="border: #000000 1px solid;"><div align="right">��¨Ѵ�� :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="LINE1" value="<?=$rs[LINE1]?>" size="20"  class="text"  />
    </strong></td>
  </tr>
    <tr>
    <td width="262" height="20" class="lgBar"  style="border: #000000 1px solid;"><div align="right">�ѵ�Ҥ������ҵù�� :  </div></td>
    <td class="bmText_1"   colspan="3"style="border: #000000 1px solid;"><strong>&nbsp;
	<input type="text" name="sname" value="<?=$rs[sname]?>" size="30"class="text"    />
    </strong></td>
  </tr>
  <tr>
   
    <td class="lgBar" style="border: #000000 1px solid;"><div align="right">ʶҹ� :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
	<input type="text" name="status" value="<?=$rs[status]?>" size="10" class="text"   />
    </strong></td> <td height="20" class="lgBar" style="border: #000000 1px solid;"><div align="right">�Ţ�ҵõ�駵� :  </div></td>
    <td class="bmText_1" style="border: #000000 1px solid;"><strong>&nbsp;
      <input type="text" name="m_total" value="<?=$rs[m_total]?>" size="20"  class="text"  />
    </strong></td>
  </tr>
  <tr>
	<td colspan="4" align="center" class="lgBar" style="border: #000000 1px solid;">
	  <input name="save_add"  type="button" value="��� / ¡��ԡ ������" onClick="javascript:popup('edit_mem.php?mcode=<?=$mcode?>&mem_id=<?=$rs[mem_id]?>','',680,430)" />	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <input name="save_add"  type="button" value="¡��ԡ����" onClick="javascript:popup('cancel_mem.php?mcode=<?=$mcode?>&mem_id=<?=$rs[mem_id]?>','',680,500)" />	
 </td>
</tr>
 </table>
 </td></tr></table>
 </form>
</body>
</html>
<script language="javascript">
function godel()
{
	if (confirm("�س��ͧ���ź�����Ź�� ���������"))
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
	//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
		
		    if (  document.add_user.honame.value=='' || document.add_user.honame.value==' ' )
           {
           alert("��سҡ�͡���������ҹ");
           document.add_user.honame.focus();           
           return false;
           }
		 if (confirm("�س��ͧ��úѹ�֡������ ���������"))
			{
					return true;
			}else{
					return false;
			}
	}
</script>
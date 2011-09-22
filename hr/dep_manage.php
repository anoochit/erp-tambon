<? ?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($del <>''){

		$sql = "DELETE FROM division WHERE div_id='$div_id' ";
		$result = mysql_query($sql);
		
		$sql_1 = "DELETE FROM  subdivision WHERE div_id=$div_id";
  		 $result_1 = mysql_query($sql_1);
		 
		print "<meta http-equiv=\"refresh\" content=\"0;URL=?action=dep_manage\">\n";

}
?><table width="98%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table cellpadding="0" cellspacing="0" border="1" width="100%" style="border: #00000 1px solid;"   align="center"	>
	<tr  bgcolor="#60c0ff" class="font_1" >
<td width="270" height="25" align="center" style="border: #00000 1px solid;"  	><strong> รหัสกอง		</strong></td>
		<td width="754" height="25" align="center" style="border: #00000 1px solid;"  	><strong> กอง		</strong></td>

		<td width="258" height="25" align="center"style="border: #00000 1px solid;"  ><div><!--<a href="index.php?action=add_cat">  --><a href="#" onClick="javascript:popup('add_dep1.php?type=1&add=add','',400,160);">[เพิ่มใหม่] </a></div>	  </td>
	</tr>
	<?
	$sql="SELECT * FROM division group by div_id ORDER BY div_id ";
	$result = mysql_query($sql);

	while($rs=mysql_fetch_array($result)){
			if((($x)%2) == 1) {
				$color = "#FFFFFF";
			}else {
				$color = "#f4f7f9";
			}
	?>
<tr bgcolor="<?echo $color?>" onmouseover="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onmouseout="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
	<td  align="center"height="28"  style="border: #00000 1px solid;"  >&nbsp; &nbsp;<? echo $rs["div_id"]?>		</td>
		<td align="left" height="28"  style="border: #00000 1px solid;"  >&nbsp; &nbsp;<? echo $rs["div_name"]?>		</td>
		<td  height="25"  align="center" style="border: #00000 1px solid;"  > <div><a href="#" onclick="javascript:popup('add_dep1.php?add=edit&div_id=<? echo $rs["div_id"]?>','',400,160);" > [แก้ไข]</a> <a href="index.php?action=dep_manage&del=del&div_id=<? echo $rs["div_id"]?>" onClick="return del_confirm1();">[ ลบ ]</a> </div>		</td>
		</tr>
	<? $x = $x +1; }
	?>
  </table>
</td></tr></table>
	<script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  

<script language="JavaScript" type="text/javascript">
function del_confirm1()
{
	if (confirm("คุณต้องการลบกอง นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($del <>''){

		$sql = "DELETE FROM catagory WHERE cat_id='$cat_id'";
		$result = mysql_query($sql);

		$sql = "UPDATE  documentary SET cat_id = '' WHERE cat_id='$cat_id'";
		$result = mysql_query($sql);

		header("Location: index.php?action=cat_manage");

}
?>
<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="250"> กอง
		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="350"> ชื่อแฟ้มเอกสาร
		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">
		</td>
		<td background="images/bar.gif" align="center" height="25" width="200"><div><!--<a href="index.php?action=add_cat">  --><a href="#" onClick="javascript:popup('add_cat1.php?add=add','',450,180);" >[เพิ่มใหม่] </a></div>
		</td>
	</tr>
	<?
	$sql="SELECT catagory.cat_id,catagory.cat_name,department.dep_name FROM catagory INNER JOIN(department) WHERE department.dep_id = catagory.dep_id ORDER BY department.dep_name";
	$result = mysql_query($sql);

	while($rs=mysql_fetch_array($result)){
			if((($x)%2) == 1) {
				$color = "#FFFFFF";
			}else {
				$color = "#f4f7f9";
			}
	?>
<tr bgcolor="<? echo $color?>" onMouseOver="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
		<td align="center" height="25" width="1">
		</td>
		<td align="left" height="25" >&nbsp; &nbsp;<? echo $rs["dep_name"]?>
		</td>
		<td align="center" height="25" width="1">
		</td>
		<td  align="left" height="25" > <? echo $rs["cat_name"]?>
		</td>
		<td align="center" height="25" width="1">
		</td>
		<td  height="25"  align="center"> <div><a href="#" onClick="javascript:popup('add_cat1.php?add=edit&cat_id=<? echo $rs["cat_id"]?>','',450,180);" > [แก้ไข]</a> <a href="index.php?action=cat_manage&del=del&cat_id=<? echo $rs["cat_id"]?>" onclick="return del_confirm1();">[ ลบ ]</a></div>
		</td>
	<?$x = $x +1; }?>
	</table>
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
	if (confirm("คุณต้องการลบแฟ้มงานนี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
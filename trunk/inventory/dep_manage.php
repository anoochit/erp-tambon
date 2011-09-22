<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($del <>''){

		$sql = "DELETE FROM department WHERE dep_id='$dep_id' ";
		echo $sql."<br>";
		$result = mysql_query($sql);
		
		$sql_1 = "UPDATE  documentary SET dep_id = '' WHERE dep_id='$dep_id'";
		echo $sql_1."<br>";
		$result_1= mysql_query($sql_1);
		
		header("Location: index.php?action=dep_manage");

}
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>

		<td width="901" height="25" align="center" background="images/bar.gif" > กอง		</td>
		<td width="422" height="25" align="center" background="images/bar.gif" ><div><a href="#" onClick="javascript:popup('add_dep.php?type=1&add=add','',400,150);">[เพิ่มใหม่] </a></div>
	  </td>
	</tr>
	<?
	$sql="SELECT * FROM department group by dep_id ORDER BY dep_name";
	$result = mysql_query($sql);

	while($rs=mysql_fetch_array($result)){
			if((($x)%2) == 1) {
				$color = "#FFFFFF";
			}else {
				$color = "#f4f7f9";
			}
	?>
<tr bgcolor="<?echo $color?>" onmouseover="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onmouseout="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
	
		<td align="left" height="28" >&nbsp; &nbsp;<? echo $rs["dep_name"]?>		</td>
		<td  height="25"  align="center"> <div><a href="#" onclick="javascript:popup('add_dep.php?add=edit&dep_id=<? echo $rs["dep_id"]?>','',450,180);" > [แก้ไข]</a> <a href="index.php?action=dep_manage&del=del&dep_id=<? echo $rs["dep_id"]?>" onClick="return del_confirm1();">[ ลบ ]</a> </div>
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
	if (confirm("คุณต้องการลบกอง นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
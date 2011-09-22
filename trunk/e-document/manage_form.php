<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<center>
<table name="body" width="600" cellpadding="0" cellspacing="0">
<tr>
	<td width="100%" valign="top" align="center">
<?
if($_REQUEST["action"] == "cat_manage"){
	include("cat_table.php");
}elseif($_REQUEST["action"] == "dep_manage"){
	include("dep_manage.php");
}elseif($_REQUEST["action"] == "group_manage"){
	include("group_table.php");
}elseif($_REQUEST["action"] == "add"){
	include("addnew_doc.php");
}elseif($_REQUEST["action"] == "edit_doc"){
	include("edit_doc.php");
}elseif($_REQUEST["action"] == "add_cat"){
	include("add_cat.php");
}elseif($_REQUEST["action"] == "add_group"){
	include("add_group.php");
}elseif($_REQUEST["action"] == "edit_cat"){
	include("edit_cat.php");
}elseif($_REQUEST["action"] == "edit_group"){
	include("edit_group.php");
}elseif($_REQUEST["action"] == "setup"){
	include("setup.php");
}elseif($_REQUEST["action"] == "setup_edit"){
	include("setup_edit.php");
}elseif($_REQUEST["action"] == "setup_add"){
	include("setup_add.php");
}

?>	</td>
	
</tr>
</table>
</center>







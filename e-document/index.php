<? 
ob_start();
session_start();
include('config.inc.php');
?>
<html>
<head>
<title><?=$site?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link rel="stylesheet" type="text/css" href="style.css">
<script language="JavaScript" src="calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
</head>

<body >
<table border='0' cellpadding='0' cellspacing='0'  align="center">
<tr>
	<td valign="top" >
	<table id='body'  border="0" cellpadding="0" cellspacing="0" >
<tr >
  <td  width="242" rowspan="2" valign="top"   background="images/DM/images/DM_03.jpg"  ><!-- ส่วนเมนูด้านซ้าย -->
    <? include('menu.php')?></td>
		<td  width="657"   height="241"colspan="2" valign="top"  ><!-- ส่วนเมนูด้านบน -->
  <? include('header.php')?></td>
</tr>
<tr  valign="top">
  <td   valign="top" width="657"   height="600" background="images/DM/images/DM_03.jpg" >
<?
if($_REQUEST["action"] == "search" && $_REQUEST["advance_search"] == "yes") {
	include("adv_search_form.php");
}
elseif($_REQUEST["action"] == "advance_search") {
	include("adv_search_form.php");
}else {

?>
<form  action="index.php" method="get" name="search" id="search"  >
<input type="hidden" name="action" value="search"><br>
<table name="body" width="657"   cellpadding="0" cellspacing="0" border="0">
<tr>
	<td width="657"  height="30"valign="top"  >&nbsp;<a href="index.php">[หน้าแรก]</a>	</td>
	
	<td align="right" valign="top" width="348">ค้นหา 
	  <input type="text" name="key" value="<? if($_REQUEST["key"] != ""){echo $_REQUEST["key"];} ?>">&nbsp;	</td>
	<td align="right" width="31" valign="top"> <input type="image" src="images/search_icon.gif" width="19" height="19" name="go_search" vspace="1" onClick="submit();">&nbsp;	</td>
</tr>
</table>
</form>
<table name="body" width="657"  height="25"cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="right" valign="top"><div style="margin-right:10px;"><a href="index.php?action=advance_search">ค้นหาแบบละเอียด</a></div>
	</td>
</tr>
</table>
<?}?>
<table name="body"  width="657"  cellpadding="0" cellspacing="0" border="0"  background="images/DM/images/DM_03.jpg">
	<tr valign="top" >
		<td   valign="top" style="border:#b3b9c3 1px solid;" >
<?
if($_REQUEST["action"] == "add" ) {
	include("manage_form.php");
}elseif($_REQUEST["action"] == "success"){
	include("success_form.php");
}elseif($_REQUEST["action"] == "view") {
	include("view_detail.php");
}elseif($_REQUEST["action"] == "search") {
	include("index_table.php");
}elseif($_REQUEST["action"] == "err_found"){
	include("found_error.php");
}elseif($_REQUEST["action"] == "edit_doc"){
	include("manage_form.php");
}elseif($_REQUEST["action"] == "cat_manage"){
	include("manage_form.php");
}elseif($_REQUEST["action"] == "dep_manage"){
	include("manage_form.php");
}elseif($_REQUEST["action"] == "group_manage"){
	include("manage_form.php");
}elseif($_REQUEST["action"] == "add_cat" || $_REQUEST["action"] == "add_group"  
|| $_REQUEST["action"] == "edit_cat" || $_REQUEST["action"] == "edit_group"){
	include("manage_form.php");
}elseif($_REQUEST["action"] == "del_group"){
	include("del_group.php");
}elseif($_REQUEST["action"] == "del_cat"){
	include("del_cat.php");
}elseif($_REQUEST["action"] == "del_doc"){
	include("del_doc.php");
}elseif($_REQUEST["action"] == "borrow"){
	include("borrow.php");
}elseif($_REQUEST["action"] == "borrow_manage"){
	include("borrow_manage.php");
}elseif($_REQUEST["action"] == "carryback"){
	include("carryback.php");
}elseif($_REQUEST["action"] == "cancle_warning"){
	include("cancle_warning.php");
}elseif($_REQUEST["action"] == "add_calander"){
	include("add_activity.php");
}elseif($_REQUEST["action"] == "view_ac"){
	include("view_activity.php");
}elseif($_REQUEST["action"] == "edit_ac"){
	include("edit_activity.php");
}elseif($_REQUEST["action"] == "del_ac"){
	include("del_ac.php");
}elseif($_REQUEST["action"] == "backup"){
	include("backup.php");
}elseif($_REQUEST["action"] == "setup2"){
	include("setup_.php");
}elseif($_REQUEST["action"] == "setup" or $_REQUEST["action"] == "setup_edit" or $_REQUEST["action"] == "setup_add"){
	include("manage_form.php");
}elseif($_REQUEST["action"] == "list_receive" ){
	include("list_receive.php");
}elseif($_REQUEST["action"] == "list_end" ){
	include("list_end.php");
}elseif($_REQUEST["action"] == "list_stamp" ){
	include("list_stamp.php");
}elseif($_REQUEST["action"] == "list_sendStamp" ){
	include("list_sendStamp.php");
}elseif($_REQUEST["action"] == "not_receive" ){
	include("not_receive.php");
}elseif($_REQUEST["action"] == "add_receive" ){
	include("add_receive.php");
}elseif($_REQUEST["action"] == "add_receive_1" ){
	include("add_receive_1.php");
}elseif($_REQUEST["action"] == "add_access" ){
	include("add_access.php");
}elseif($_REQUEST["action"] == "report_alert"){
	include("report_alert.php");
}elseif($_REQUEST["action"] == "show_index" ){
	if($_SESSION['department'] <>'2'){
		include("show_index.php");
	}else{
		include("list_stamp.php");
	}
}elseif($_REQUEST["action"] == '')
	include("body_index.php");

?>
</td>
</tr>
</table>
	  </td>
</tr>

<tr><td colspan="3"   width="900" valign="top" background="images/DM/images/DM_03.jpg"><img src="images/DM1/images/GM_18.jpg" width="943" height="115" ></td>
</tr>
</table>

</td>
</tr>
</table>
</body>
</html>
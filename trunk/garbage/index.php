<? ob_start();?>
<?
set_time_limit(0);
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
<body   onLoad="Javascript: show1.style.display = 'none'; ">
<table width="950" border='0' cellpadding='0' cellspacing='0'  align="center">
<tr>
  <td  height="100%"rowspan="2" valign="top"  background="images/GM/images/GM_03-04.jpg"><? include('menu.php')?></td>
  <td height="75"  valign="top" background="images/GM/images/GM_03-04.jpg" ><? include('header.php')?></td>
</tr>
<tr>
  <td   width="717" height="447" valign="top"  background="images/GM/images/GM_03-04.jpg"><br><? include('body_index.php')?></td>
</tr>
<tr><td colspan="3" valign="top" background="images/GM/images/GM_03-04.jpg"><?include('footer.php')?></td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
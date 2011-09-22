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
<body  >
<table width="950" border='0' cellpadding='0' cellspacing='0'  align="center">
<tr><td height="100%"rowspan="2" valign="top" background="images/PM1/images/PM_03.jpg" ><? include('menu.php')?></td>
<td background="images/PM1/images/PM_03.jpg" valign="top"  height="241"><? include('header.php')?></td></tr>
<tr ><td  width="717"  height="717" valign="top" background="images/PM1/images/PM_03.jpg" ><? include('body_index.php')?></td></tr>
<tr><td colspan="3" valign="top"   background="images/PM1/images/PM_03.jpg" ><? include('footer.php')?></td></tr>
</table>
</body>
</html>
<SCRIPT language=JavaScript>
    function check_number(e) {
        var key;
        if (window.event) key = window.event.keyCode; // ใช้กับ IE
        else if (e) key = e.which; // ใช้กับ Firefox
        if (key = 13 && key != 8 && key != 9 && key != 16 && key != 17 && key != 20 && key != 35 && key != 36 &&  key != 68 && (key < 46) || (key > 57) && (key < 96) ||(key > 110) && key != 116  ) {
            	return false;
        }
    }
</SCRIPT> 
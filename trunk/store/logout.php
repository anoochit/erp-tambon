<?
ob_start();
session_start();
include('config.inc.php');
session_destroy();
header("Location: index.php?action=center");
?>

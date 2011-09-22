<?
ob_start();
session_start();
include('config.inc.php');
session_destroy();
# Show Good Bye
header("Location: index.php?action=center");
?>

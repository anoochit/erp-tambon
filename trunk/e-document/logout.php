<?
session_start();
include('config.inc.php');
session_destroy();
print "<meta http-equiv=\"refresh\" content=\"0;URL=./\">\n";
?>

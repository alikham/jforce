<?php
session_start(); 
session_destroy();
header("location:/feedapp/index.php"); 
exit();

?>
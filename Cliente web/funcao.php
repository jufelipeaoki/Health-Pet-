<?php
session_start();
session_destroy();
header("Location:../Logon.old/login2.0.php");
exit();
?>
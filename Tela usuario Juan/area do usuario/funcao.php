<?php
session_start();
session_destroy();
header("location: ../../Logon.old/login2.0.php");
?>
<?php
session_start();
$_SESSION = array(); //tömmer alla sessionsvariabler
session_regenerate_id(true);
header("Location: admin.php");
?>
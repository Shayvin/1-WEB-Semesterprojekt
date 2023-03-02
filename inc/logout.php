<?php
session_start(); // Session start
session_destroy(); // Löscht alle Daten die in der Session waren und killt sie
header("Location: /inc/login.php"); // Weiterleitung an login.php
 ?>
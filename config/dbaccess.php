<?php
$host = "127.0.0.1";
$name = "hotel";
$user = "hoteladm"; // hoteladm hat insert, update, file & select Rechte (Minimale Rechte). Der User muss aber extra angelegt werden.
$password = "BH00N!H4zxW]E99!";

$mysql = new PDO("mysql:host=$host;dbname=$name", $user, $password);
// PDO (PHP Data Object), ist eine Schnittstelle von der man auf eine SQL Datenbank
// zugreifen kann
?>


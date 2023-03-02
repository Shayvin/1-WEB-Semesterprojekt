<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control panel</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="/res/admin.css">
    <link rel="stylesheet" href="/res/main.css">
</head>
<body>
<?php
  include "nav.php"; // Navigationbar wird inkludiert
?>
<h1>User</h1>
<table>
    <tr>
    <th>ID</th>
    <th>Username</th>
    <th>First name</th>
    <th>Last name</th>
    <th>Rolle</th>
    <th>Edit</th>
    </tr>
<?php
//Verbindung zur Datenbank herstellen
require("../config/dbaccess.php");
// Anzeige aller Datensätze der Tabelle
$stmt = $mysql->prepare("SELECT * FROM accounts");
$stmt->execute();
while($row = $stmt->fetch()){
    ?>
    <tr>
      <td><?php echo $row["ID"] ?></td>
      <td><?php echo $row["USERNAME"] ?></td>
      <td><?php echo $row["FIRST_NAME"] ?></td>
      <td><?php echo $row["LAST_NAME"] ?></td>
      <td><?php echo $row["GROUP"] ?></td>
      <td><a href="useredit.php?id=<?php echo $row["USERNAME"]?>"><i class="fa-solid fa-user-pen"></i></td>
      </tr>
      <?php
}
?> 
</table>

<h1>Booking history</h1>
<table>
    <tr>
    <th>Room ID</th>
    <th>Room type</th>
    <th>Username</th>
    <th>Checkin date</th>
    <th>Checkout date</th>
    <th>Edit</th>
    </tr>
<?php
//Verbindung zur Datenbank herstellen
require("../config/dbaccess.php");

// Anzeige aller Datensätze der Tabelle
$stmt = $mysql->prepare("SELECT * FROM rooms");
$stmt->execute();
while($row = $stmt->fetch()){
    ?>
    <tr>
      <td><?php echo $row["ROOM_ID"] ?></td>
      <td><?php echo $row["ROOM_TYPE"] ?></td>
      <td><?php echo $row["USERNAME"] ?></td>
      <td><?php echo $row["CHECKIN_DATE"] ?></td>
      <td><?php echo $row["CHECKOUT_DATE"] ?></td>
      <td><a href="bookingedit.php?id=<?php echo $row["ROOM_ID"]?>"><i class="fa-regular fa-pen-to-square"></i></td>
      </tr>
      <?php
}
?> 
</table>

</body>
</html>
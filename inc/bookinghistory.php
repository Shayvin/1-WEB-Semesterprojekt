<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/res/admin.css">
    <link rel="stylesheet" href="/res/main.css">
    <title>Booking History</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <?php
  include "nav.php"; // Navigationbar wird inkludiert
?>

<h1>Booking history</h1>
        <table>
            <tr>
            <th>Room ID</th>
            <th>Room type</th>
            <th>Checkin date</th>
            <th>Checkout date</th>
            <th>Breakfast</th>
            <th>Parking spot</th>
            <th>Pet</th>
            <th>Reservation status</th>
            </tr>
        <?php
        if(isset($_GET["id"]))
        {
              //Verbindung zur Datenbank herstellen
              require("../config/dbaccess.php");

              // Anzeige aller Datensätze der Tabelle
              $stmt = $mysql->prepare("SELECT * FROM rooms WHERE USERNAME = :id");
              $stmt->execute(array(":id" => $_GET["id"]));
              while($row = $stmt->fetch()){
                  ?>
                  <tr>
                    <td><?php echo $row["ROOM_ID"] ?></td>
                    <td><?php echo $row["ROOM_TYPE"] ?></td>
                    <td><?php echo $row["CHECKIN_DATE"] ?></td>
                    <td><?php echo $row["CHECKOUT_DATE"] ?></td>
                    <td><?php echo $row["BREAKFAST"] ?></td>
                    <td><?php echo $row["PARKING"] ?></td>
                    <td><?php echo $row["PET"] ?></td>
                    <td><?php echo $row["STAT"] ?></td>
                    </tr>
                    <?php
              }
            }
        ?> 
        </table>


</body>
</html>
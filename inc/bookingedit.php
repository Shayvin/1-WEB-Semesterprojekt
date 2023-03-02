<!DOCTYPE html>
<html lang="en">
<?php
session_start(); // Session start
?>
<head>
    <link rel="stylesheet" href="/res/main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Reservationediting</title>
</head>
<body>
<?php
  include "nav.php"; // Navigationbar wird inkludiert
  ?>
  <?php
if(isset($_GET["id"])) // Wenn get variable in der URL gesetzt
{
  if(!empty($_GET["id"])) // & wenn sie nicht leer ist
  {
      require("../config/dbaccess.php"); // DB Connector eingebunden
      if(isset($_POST["submit"])) // Wenn submit gedrückt wurde
      {
          $stmt = $mysql->prepare("UPDATE rooms SET STAT = :stat WHERE ROOM_ID = :id"); // Prepare SQL Statement
          $stmt->bindParam(":id", $_GET["id"]); 
          $stmt->bindParam(":stat", $_POST["stat"]); // Binded POST an die lokale Variable 
          $stmt->execute(); // execute
          
          echo "The status setting has changed.";
          
      }
      $stmt = $mysql->prepare("SELECT * FROM rooms WHERE ROOM_ID = :id"); // Check RoomID
      $stmt->execute(array(":id" => $_GET["id"])); // Setze GET gleich mit lokaler Variable und führe aus
      $row = $stmt->fetch(); // Nimmt die nächste Reihe vom ergebnis vorhin
    }
  }
      ?>
     <form action="bookingedit.php?id=<?php echo $_GET["id"] ?>" method="post">
                <h1 class="h3 mb-3 fw-normal">Booking Information</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="roomid" value="<?php echo $row["ROOM_ID"] ?>" require>
                <label for="roomID">Room ID</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-select" name="roomtype" value="<?php echo $row["ROOM_TYPE"] ?>" require>
                <label for="roomType">Room Type</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="firstname" value="<?php echo $row["GUEST_FIRSTNAME"] ?>" require>
                <label for="firstName">First Name</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="lastname" value="<?php echo $row["GUEST_LASTNAME"] ?>" require>
                <label for="lastName">Last Name</label>
            </div>
            <div class="form-floating">
                <input type="date" class="form-control" name="checkin" value="<?php echo $row["CHECKIN_DATE"] ?>" require>
                <label for="checkIn">CheckIn Date</label>
            </div>
            <div class="form-floating">
                <input type="date" class="form-control" name="checkout" value="<?php echo $row["CHECKOUT_DATE"] ?>" require>
                <label for="checkOut">CheckOut Date</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="breakfast" value="<?php echo $row["BREAKFAST"] ?>" require>
                <label for="breakfast">Breakfast</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="parking" value="<?php echo $row["PARKING"] ?>" require>
                <label for="parkingSpot">Parking Spot</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="pet" value="<?php echo $row["PET"] ?>" require>
                <label for="pet">Any Pets</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="user" value="<?php echo $row["USERNAME"] ?>" require>
                <label for="user">Username</label>
            </div>
            <div class="form-floating">
                <select class="form-select" name="stat">
                <option value="New">New</option>
                <option value="Confirm">Confirm</option>
                <option value="Canceled">Canceled</option>
                </select>
                <label for="stat">Change Reservation from <?php echo $row["STAT"] ?> to:</label>
            </div>

            <div class="col-auto button">
            <button class="w-100 btn" name="submit" type="submit">Change the Status</button>
            </div>
      </form>

</body>
</html>

